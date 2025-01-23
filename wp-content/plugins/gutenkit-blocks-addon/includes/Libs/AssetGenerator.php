<?php
namespace Gutenkit\Libs;

defined('ABSPATH') || exit;

class AssetGenerator {

	use \Gutenkit\Traits\Singleton;

	/**
	 * Defining css
	 */
	protected $css = '';

	/**
	 * Defining fonts
	 */
	protected $fonts = array();

	/**
	 * AssetGenerator class constructor.
	 * private for singleton
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'save_post', array( $this, 'save_post_hook' ), 10, 3 );
		add_filter( 'render_block_data', array( $this, 'set_blocks_css' ), 10 );
		add_filter( 'wp_resource_hints', array( $this, 'fonts_resource_hints' ), 10, 2 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 10 );
		add_action( 'enqueue_block_assets', array( $this, 'block_assets' ), 10 );
	}

	/**
	 * Filters an array of blocks and returns only those where the block name contains 'gutenkit'.
	 *
	 * @param array $blocks An array of blocks. Each block is an associative array that must contain a 'blockName' key. Default is an empty array.
	 * @return array Returns an array of blocks where the block name contains 'gutenkit'. If no such blocks are found, or if the input is not an array, an empty array is returned.
	 */
	public function filter_blocks( $blocks = array() ) {
		$filtered_blocks = [];

		foreach ($blocks as $block) {
			if (isset($block['blockName']) && strpos($block['blockName'], 'gutenkit') !== false) {
				$filtered_blocks[] = $block;
			}

			if (!empty($block['innerBlocks'])) {
				$filtered_blocks = array_merge($filtered_blocks, $this->filter_blocks($block['innerBlocks']));
			}
		}

		return $filtered_blocks;
	}

	/**
	 * Minify css
	 * condense white space
	 * remove comments
	 *
	 * @param string $css
	 * @return string minified css
	 */
	public function minimize_css( $input ) {
		if ( trim( $input ) === '' ) {
			return $input;
		}

		return preg_replace(
			array(
				// Remove comment(s)
				'#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')|\/\*(?!\!)(?>.*?\*\/)|^\s*|\s*$#s',
				// Remove unused white-space(s)
				'#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/))|\s*+;\s*+(})\s*+|\s*+([*$~^|]?+=|[{};,>~]|\s(?![0-9\.])|!important\b)\s*+|([[(:])\s++|\s++([])])|\s++(:)\s*+(?!(?>[^{}"\']++|"(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')*+{)|^\s++|\s++\z|(\s)\s+#si',
				// Replace `0(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)` with `0`
				'#(?<=[\s:])(0)(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)#si',
				// Replace `:0 0 0 0` with `:0`
				'#:(0\s+0|0\s+0\s+0\s+0)(?=[;\}]|\!important)#i',
				// Replace `background-position:0` with `background-position:0 0`
				'#(background-position):0(?=[;\}])#si',
				// Replace `0.6` with `.6`, but only when preceded by `:`, `,`, `-` or a white-space
				'#(?<=[\s:,\-])0+\.(\d+)#s',
				// Minify string value
				'#(\/\*(?>.*?\*\/))|(?<!content\:)([\'"])([a-z_][a-z0-9\-_]*?)\2(?=[\s\{\}\];,])#si',
				'#(\/\*(?>.*?\*\/))|(\burl\()([\'"])([^\s]+?)\3(\))#si',
				// Minify HEX color code
				// '#(?<=[\s:,\-]\#)([a-f0-6]+)\1([a-f0-6]+)\2([a-f0-6]+)\3#i',
				// Replace `(border|outline):none` with `(border|outline):0`
				'#(?<=[\{;])(border|outline):none(?=[;\}\!])#',
				// Remove empty selector(s)
				'#(\/\*(?>.*?\*\/))|(^|[\{\}])(?:[^\s\{\}]+)\{\}#s',
			),
			array(
				'$1',
				'$1$2$3$4$5$6$7',
				'$1',
				':0',
				'$1:0 0',
				'.$1',
				'$1$3',
				'$1$2$4$5',
				'$1$2$3',
				'$1:0',
				'$1$2',
			),
			$input
		);
	}

	/**
	 * Fires once a post has been saved.
	 *
	 * @param id           $post_id
	 * @param WP_Post post
	 * @return bool $update
	 */
	public function save_post_hook( $post_id, $post, $update ) {
		// bail out if is draft
		if ( isset( $post->post_status ) && 'auto-draft' == $post->post_status ) {
			return;
		}

		// bail out if it's a post revision
		if ( false !== wp_is_post_revision( $post_id ) ) {
			return;
		}

		// bail out if this is an autosave
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// Whether this is an existing post being updated
		if ( ! $update ) {
			return;
		}

		// get post blocks
		$post = get_post( $post_id );
		$parse_blocks = $this->filter_blocks( parse_blocks( $post->post_content ) );

		if( $parse_blocks ) {
			$fse = in_array($post->post_type, ['wp_template_part', 'wp_template']);
			if($fse) {
				$this->set_fonts( null, $this->generate_fse_assets(), true );
			} else {
				$this->set_fonts( $post_id, $parse_blocks );
			}
		}
	}

	/**
	 * Generate asset for templates
	 *
	 * @return $result null
	 */
	protected function generate_fse_assets() {
		$args = array(
			'post_type'      => array( 'wp_template_part', 'wp_template' ),
			'posts_per_page' => -1,
		);

		$posts         = get_posts( $args );
		$merged_blocks = array();

		foreach ( $posts as $post ) {
			$merged_blocks = array( ...$merged_blocks, ...parse_blocks( $post->post_content ) );
		}

		return $this->filter_blocks( $merged_blocks );
	}

	/**
	 * Sets the fonts for a given post or Full Site Editing (FSE) template.
	 *
	 * This function iterates over an array of blocks, and for each block, it checks if it has any typography attributes.
	 * If it does, it extracts the font family and weight and stores them in an array.
	 * After all blocks have been processed, it updates the post meta or option with the collected fonts.
	 *
	 * @param int $post_id The ID of the post or FSE template.
	 * @param array $blocks An array of blocks. Each block is an associative array that should contain an 'attrs' key, which is also an associative array of attributes.
	 * @param bool $fse Optional. Whether the function is being used for a Full Site Editing template. Default is false.
	 * @return void
	 */
	protected function set_fonts( $post_id, $blocks, $fse = false ) {
		$fonts = [];

		foreach ($blocks as $block) {
			if ( isset( $block['attrs'] ) ) {
				$typographies = array_filter(
					$block['attrs'],
					function ( $key ) {
						return str_contains( strtolower( $key ), 'typography' );
					},
					ARRAY_FILTER_USE_KEY
				);

				if ( ! empty( $typographies ) ) {
					foreach ( $typographies as $typography ) {
						$font_weight = ! empty( $typography['fontWeight']['value'] ) ? $typography['fontWeight']['value'] : 400;
						! empty( $typography['fontFamily']['value'] ) ? $fonts[$typography['fontFamily']['value']][] = $font_weight : '';
					}
				}
			}
		}

		// updating fonts
		if(!empty($fonts)) {
			if ( $fse ) {
				update_option( 'gutenkit_fse_fonts', $fonts );
			} else {
				update_post_meta( $post_id, 'gutenkit_posts_fonts', $fonts );
			}
		} else {
			if ( $fse ) {
				delete_option( 'gutenkit_fse_fonts', $fonts );
			} else {
				delete_post_meta( $post_id, 'gutenkit_posts_fonts' );
			}
		}
	}

	/**
	 * recursively combine blocks assets based on used blocks
	 *
	 * @param array $blocks
	 * @return $result array | $blocks_data
	 */
	protected function combine_blocks_asstes( $parsed_block = array() ) {
		// combine blocks assets
		$blocks_css = [];

		if( isset($parsed_block['blockName']) && strpos($parsed_block['blockName'], 'gutenkit') !== false ) {
			// block css
			$active_modules = \Gutenkit\Config\Modules::get_active_modules_list();
			$has_dynamic_background = false;
			// Check if 'backgroundTracker' exists before using it
			if (isset($parsed_block['attrs']['backgroundTracker'])) {
				foreach ($parsed_block['attrs']['backgroundTracker'] as $background) {
					if (empty($background['isDynamicContent']) || empty($background['dynamicContentType'])) {
						continue;
					}

					$has_dynamic_background = true;
					break; // Stop loop once a match is found
				}
			}
			if ( isset( $parsed_block['attrs']['blocksCSS'] ) && (empty( $active_modules['dynamic-content'] ) || !$has_dynamic_background ) ) {
				foreach ( $parsed_block['attrs']['blocksCSS'] as $device => $css ) {
					if (!isset($blocks_css[$device])) {
						$blocks_css[$device] = '';
					}

					if (is_string($css)) {
						$blocks_css[$device] .= $css;
					}
				}
			}

			// block typographies
			if ( isset( $parsed_block['attrs'] ) ) {
				$typographies = array_filter(
					$parsed_block['attrs'],
					function ( $key ) {
						return str_contains( strtolower( $key ), 'typography' );
					},
					ARRAY_FILTER_USE_KEY
				);

				if ( ! empty( $typographies ) ) {
					foreach ( $typographies as $typography ) {
						$font_weight = ! empty( $typography['fontWeight']['value'] ) ? $typography['fontWeight']['value'] : 400;
						! empty( $typography['fontFamily']['value'] ) ? $this->fonts[$typography['fontFamily']['value']][] = $font_weight : '';
					}
				}
			}

			// block common style
			if ( isset( $parsed_block['attrs']['commonStyle'] ) && (empty( $active_modules['dynamic-content'] ) || !$has_dynamic_background) ) {
				foreach ( $parsed_block['attrs']['commonStyle'] as $device => $css ) {
					if (!isset($blocks_css[$device])) {
						$blocks_css[$device] = '';
					}

					$blocks_css[$device] .= $css;
				}
			}
		}

		// concate css/js content into a single file
		$css_content = '';
		$is_custom_styles_added = false;
		$device_list = \Gutenkit\Helpers\Utils::get_device_list();

		if (!empty($blocks_css)) {
			foreach ($device_list as $device) {
				foreach ($blocks_css as $key => $block) {
					if (!empty($block) && trim($block) !== '') {
						$direction = isset($device['direction']) ? $device['direction'] : 'max';
						$width = isset($device['value']) ? $device['value'] : '';
						$device_key = isset($device['slug']) ? strtolower($device['slug']) : '';

						if (isset($device['value']) && $device['value'] == 'base' && $key == 'desktop') {
							$css_content .= $block;
						} elseif (!empty($direction) && !empty($width) && $device_key == $key) {
							$css_content .= '@media (' . $direction . '-width: ' . $width . 'px) {' . trim($block) . '}';
						}

						if ($key == 'customStyles' && !$is_custom_styles_added) {
							$is_custom_styles_added = true;
							$css_content .= $block;
						}
					}
				}
			}
		}

		return $css_content;
	}

	/**
	 * Generate Google Font URL
	 * Combine multiple google font in one URL
	 *
	 * @return string|bool
	 */
	protected function generate_fonts_url() {
		if ( ! empty( $this->fonts ) ) {
			$font_families = array();
			$font_url      = 'https://fonts.googleapis.com/css2?family=';

			// Remove duplicate values and sort the arrays
			$all_fonts = array_map(function($arr) {
				$arr = array_unique($arr);
				sort($arr);
				return $arr;
			}, $this->fonts);

			foreach ( $all_fonts as $font => $weights ) {
				$weights = array_map( function( $weight ) {
					$invalid_list = array( 'normal', 'inherit', 'initial');
					if ( in_array( $weight, $invalid_list ) ) {
						return '400';
					}
					return $weight;
				}, $weights );
				sort( $weights );
				$font_families[] = str_replace( ' ', '+', $font ) . ':wght@' . implode( ';', array_unique( $weights ) );
			}

			$font_url .= implode( '&family=', $font_families );
			$font_url .= '&display=swap';

			return $font_url;
		}

		return false;
	}

	/**
	 * Sets the CSS for the blocks.
	 *
	 * @param array $parsed_block The parsed block data.
	 * @return array The modified parsed block data.
	 */
	public function set_blocks_css( $parsed_block ) {
		$parsed_block = apply_filters( 'gutenkit/collected_css', $parsed_block );
		$css_content = $this->combine_blocks_asstes( $parsed_block );
		if(!empty($css_content)) {
			$this->css .= $css_content;
		}

		return $parsed_block;
	}

	/**
	 * Add preconnect for Google Fonts.
	 *
	* @param array  $urls URLs to print for resource hints.
	* @param string $relation_type The relation type the URLs are printed.
	* @return array
	*/
	public function fonts_resource_hints( $urls, $relation_type ) {
		if ( wp_style_is( 'gkit-google-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
			$urls[] = array(
				'href' => 'https://fonts.gstatic.com',
				'crossorigin',
			);
		}

		return $urls;
	}

	/**
	 * Enqueues the Google Fonts stylesheet if available.
	 * Enqueues inline styles for the Gutenkit frontend.
	 */
	public function enqueue_scripts() {
		global $post;

		// If the theme is not a block theme, parse the blocks and set the CSS.
		if( ! wp_is_block_theme() && ! empty($post->post_content) ) {
			do_blocks($post->post_content);
		}

		// This checks if the $css property is not empty and adds it as inline styles to the 'gutenkit-frontend-common' stylesheet.
		$generated_css = apply_filters( 'gutenkit/generated_css', $this->css );
		if(!empty($generated_css)) {
			wp_add_inline_style( 'gutenkit-frontend-common', $this->minimize_css( $generated_css ) );
		}
	}

	/**
	 * Enqueues the block assets, including Google Fonts.
	 *
	 * @return void
	 */
	public function block_assets() {
		// Enqueue Google Fonts
		$fonts_url = $this->generate_fonts_url();
		if ( $fonts_url ) {
			$style_version = false ? GUTENKIT_PLUGIN_VERSION : null;
			wp_enqueue_style( 'gkit-google-fonts', $fonts_url, array(), $style_version );
		}
	}
}
