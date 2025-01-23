<?php

namespace Gutenkit\Config;
use Gutenkit\Helpers\Utils;

defined( 'ABSPATH' ) || exit;

/**
 * Register blocks class
 *
 * @since 0.1.0
 * @return void
 */

class Blocks {

	use \Gutenkit\Traits\Singleton;

	// class initilizer method
	public function __construct() {
		add_action( 'init', array( $this, 'register_blocks' ) );
		add_action( 'block_categories_all', array( $this, 'register_block_categories' ), 10, 2 );
		add_filter( 'render_block', array( $this, 'save_element' ), 10, 3 );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
		add_filter( 'block_type_metadata', array( $this, 'block_metadata' ), 10 );
	}

	// register blocks
	public function register_blocks() {
		global $pagenow;
		
		$is_editor = $pagenow === 'post.php' || $pagenow === 'post-new.php' || $pagenow === 'site-editor.php' || $pagenow === 'widgets.php';
		$args = array(
			'handle' => 'gutenkit-blocks-editor-global',
			'src'    => GUTENKIT_PLUGIN_URL . 'build/gutenkit/components.css',
			'deps'   => array(),
			'ver'    => GUTENKIT_PLUGIN_VERSION,
			'media'  => 'all',
		);

		$blocks_list = \Gutenkit\Config\BlockList::instance()->get_list( 'active' );
		$is_register = Utils::is_local() ? Utils::is_local() : Utils::status() === 'valid';

		if ( ! empty( $blocks_list ) ) {
			foreach ( $blocks_list as $key => $block ) {
				$package = isset($block['package']) ? $block['package'] : '';
				$blocks_dir = '';
				$plugin_dir = '';
				$plugin_slug = '';

				if ( !empty( $package ) &&  $package === 'free') {
					$plugin_dir = GUTENKIT_PLUGIN_DIR;
					$blocks_dir = GUTENKIT_BLOCKS_DIR . $key;
					$plugin_slug = 'gutenkit-blocks-addon';
				}
				
				if ( !empty( $package ) &&  $package === 'pro' && defined( 'GUTENKIT_PRO_BLOCKS_DIR' ) && $is_register ) {
					$plugin_dir = rtrim( GUTENKIT_PLUGIN_DIR, '/' ) . '-pro';
					$blocks_dir = $plugin_dir . '/build/blocks/' . $key;
					$plugin_slug = 'gutenkit-blocks-addon-pro';
				}

				if(isset($block['source']['blocks_dir'], $block['source']['plugin_dir'], $block['source']['plugin_slug'])) {
					extract($block['source'], EXTR_PREFIX_ALL, 'source');
					$plugin_dir = $source_plugin_dir;
					$blocks_dir = $source_blocks_dir . $key;
					$plugin_slug = $source_plugin_slug;
				}
				
				if ( ! file_exists( $blocks_dir ) ) {
					continue;
				}

				register_block_type( $blocks_dir );

				wp_set_script_translations( "{$plugin_slug}-{$key}-editor-script", $plugin_slug, $plugin_dir . 'languages' );

				if ( $is_editor ) {
					wp_enqueue_block_style( "{$plugin_slug}/{$key}", $args );
				}
			}
		}
	}

	// register block categories
	public function register_block_categories( $categories, $post ) {
		return array_merge(
			array(
				array(
					'slug'  => 'gutenkit',
					'title' => __( 'GutenKit', 'gutenkit-blocks-addon' ),
					'icon'  => 'wordpress',
				),
			),
			$categories
		);
	}

	// admin scripts
	public function admin_scripts( $screen ) {
		$editor_template_library = include_once GUTENKIT_PLUGIN_DIR . 'build/template-library/template-library.asset.php';

		if ( $screen === 'post.php' || $screen === 'post-new.php' || $screen === 'site-editor.php' ) {
			wp_enqueue_script(
				'gutenkit-editor-template-library',
				GUTENKIT_PLUGIN_URL . 'build/template-library/template-library.js',
				$editor_template_library['dependencies'],
				$editor_template_library['version'],
				true
			);

			// Conditionally enqueue the RTL stylesheet
			if ( is_rtl() ) {
				wp_enqueue_style(
					'gutenkit-editor-template-library-rtl',
					GUTENKIT_PLUGIN_URL . 'build/template-library/template-library-rtl.css',
					array(),
					$editor_template_library['version']
				);
			}else{
				wp_enqueue_style(
					'gutenkit-editor-template-library',
					GUTENKIT_PLUGIN_URL . 'build/template-library/template-library.css',
					array(),
					$editor_template_library['version']
				);
			}

			// Google Roboto Font
			// phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
			wp_enqueue_style(
				'gutenkit-google-fonts',
				'https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap'
			);
		}
	}

	public function save_element( $block_content, $parsed_block, $instance ) {
		if ( !empty($block_content) && Utils::is_gkit_block($block_content, $parsed_block, 'blockClass') ) {
			$block_content = new \WP_HTML_Tag_Processor($block_content);
			$block_content->next_tag();

			if(empty($block_content->get_attribute('id'))) {
				$block_content->set_attribute('id', "block-" . $parsed_block['attrs']['blockID']);
			}

			if(empty($block_content->get_attribute('data-block'))) {
				$block_content->set_attribute('data-block', $parsed_block['blockName']);
			}

			if(empty($block_content->get_attribute('data-post-id')) && !empty($instance->context['postId'])) {
				$block_content->set_attribute('data-post-id', $instance->context['postId']);
			}
			
			$block_content->add_class($parsed_block['attrs']['blockClass']);
			$block_content->add_class('gutenkit-block');
			
			$before_markup = apply_filters( 'gutenkit/save_element_markup_before', "", $parsed_block );
			$after_markup = apply_filters( 'gutenkit/save_element_markup_after', "", $parsed_block );
			$block_content = apply_filters('gutenkit_save_element_markup', $block_content, $parsed_block, $instance);

			if ( method_exists( $block_content, 'get_updated_html' ) ) {
				$block_content = $block_content->get_updated_html();
			}

			return sprintf('%1$s %2$s %3$s', $before_markup, $block_content, $after_markup);
		}

		return $block_content;
	}

	/**
	 * block_metadata
	 * 
	 * @since 1.0.0
	 */
	public function block_metadata( $metadata ) {
		if (strstr($metadata['name'], 'gutenkit')) {
			// Ensure 'usesContext' is set and is an array
			if (!isset($metadata['usesContext'])) {
				$metadata['usesContext'] = array();
			}
	
			// Merge 'postType' and 'postId' into 'usesContext'
			$metadata['usesContext'] = array_merge($metadata['usesContext'], array('postType', 'postId'));
		}
		return $metadata;
	}	
}
