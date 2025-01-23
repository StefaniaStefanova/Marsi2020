<?php
namespace Gutenkit\Core;

defined( 'ABSPATH' ) || exit;

use Gutenkit\Helpers\Utils;

/**
 * Enqueue registrar.
 *
 * @since 1.0.0
 * @access public
 */
class Enqueue {

	use \Gutenkit\Traits\Singleton;

	/**
	 * class constructor.
	 * private for singleton
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
		add_action( 'enqueue_block_assets', array( $this, 'blocks_scripts' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'blocks_editor_scripts' ), 5 );
		add_action( 'wp_head', array( $this, 'print_device_script_for_window' ) );
	}

	/**
	 * Enqueues necessary scripts and localizes data for the admin area.
	 *
	 * @param string $hook The current page.
	 * @return void
	 * @since 1.0.0
	 */
	public function admin_scripts( $hook ) {
		wp_localize_script(
			'wp-block-editor',
			'gutenkit',
			array(
				'plugin_url'    => GUTENKIT_PLUGIN_URL,
				'screen'        => $hook,
				'api_url'       => GUTENKIT_API_URL,
				'root_url'		=> esc_url( home_url( '/' ) ),
				'use_only_global_styles_fonts' => Utils::get_settings('use_only_global_styles_fonts'),
				'version'     => GUTENKIT_PLUGIN_VERSION,
				'modules'     => \Gutenkit\Config\Modules::get_active_modules_list(),
				'has_pro'     => defined( 'GUTENKIT_PRO_PLUGIN_VERSION'),
				'generalSettingsUrl'   => admin_url('options-general.php'),
				'activeTheme' => wp_get_theme()->get('Name'),
			)
		);
	}
	
	/**
	 * Enqueues the necessary scripts and styles for the blocks.
	 *
	 * Registers and enqueues various scripts and styles required for the blocks.
	 * This function is called to enqueue the scripts and styles when needed.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return void
	 */
	public function blocks_scripts() {
		// Register the global styles and scripts
		wp_register_style( 'animate', GUTENKIT_PLUGIN_URL . 'assets/css/animate.min.css', array(), GUTENKIT_PLUGIN_VERSION );
		wp_register_style( 'gkit-animate', GUTENKIT_PLUGIN_URL . 'assets/css/gkit-animate.css', array(), GUTENKIT_PLUGIN_VERSION );
		wp_register_script( 'fancybox', GUTENKIT_PLUGIN_URL . 'assets/js/fancybox.js', array(), GUTENKIT_PLUGIN_VERSION, [ 'strategy' => 'defer', 'in_footer' => true ] );
		wp_register_style( 'fancybox', GUTENKIT_PLUGIN_URL . 'assets/css/fancybox.css', array(), GUTENKIT_PLUGIN_VERSION );
		wp_register_style( 'hover-animations', GUTENKIT_PLUGIN_URL . 'assets/css/hover-animations.min.css', array(), GUTENKIT_PLUGIN_VERSION );
		wp_register_script( 'goodshare', GUTENKIT_PLUGIN_URL . 'assets/js/goodshare.js', array(), GUTENKIT_PLUGIN_VERSION, [ 'strategy' => 'defer', 'in_footer' => true ] );
		wp_register_script( 'easy-piechart', GUTENKIT_PLUGIN_URL . 'assets/js/easy-piechart.js', array(), GUTENKIT_PLUGIN_VERSION, [ 'strategy' => 'defer', 'in_footer' => true ] );
		wp_register_script( 'odometer', GUTENKIT_PLUGIN_URL . 'assets/js/odometer.min.js', array(), GUTENKIT_PLUGIN_VERSION, [ 'strategy' => 'defer', 'in_footer' => true ] );
		wp_register_style( 'odometer', GUTENKIT_PLUGIN_URL . 'assets/css/odometer-theme-default.css', array(), GUTENKIT_PLUGIN_VERSION );
		wp_register_script('swiper', GUTENKIT_PLUGIN_URL . 'assets/js/swiper.js', array(), GUTENKIT_PLUGIN_VERSION, [ 'strategy' => 'defer', 'in_footer' => true ]);
		wp_register_style('swiper', GUTENKIT_PLUGIN_URL . 'assets/css/swiper.css', array(), GUTENKIT_PLUGIN_VERSION, 'all');
		wp_register_script('img-comparison', GUTENKIT_PLUGIN_URL . 'assets/js/img-comparison.js', array(), GUTENKIT_PLUGIN_VERSION, [ 'strategy' => 'defer', 'in_footer' => true ]);
		wp_register_style('img-comparison', GUTENKIT_PLUGIN_URL . 'assets/css/img-comparison.css', array(), GUTENKIT_PLUGIN_VERSION, 'all');
		wp_register_script('vanilla-tilt', GUTENKIT_PLUGIN_URL . 'assets/js/vanilla-tilt.js', array(), GUTENKIT_PLUGIN_VERSION, [ 'strategy' => 'defer', 'in_footer' => true ]);
		wp_register_script('lenis', GUTENKIT_PLUGIN_URL . 'assets/js/lenis.js', array(), GUTENKIT_PLUGIN_VERSION, [ 'strategy' => 'defer', 'in_footer' => true ]);

		// frontend common css
		$common_styles_dir = GUTENKIT_PLUGIN_DIR . 'build/gutenkit/frontend-common.asset.php';
		if ( file_exists( $common_styles_dir ) ) {
			$common_styles = include_once $common_styles_dir;
			if ( isset( $common_styles['version'] ) ) {
				wp_enqueue_style(
					'gutenkit-frontend-common',
					GUTENKIT_PLUGIN_URL . 'build/gutenkit/frontend-common.css',
					array(),
					$common_styles['version']
				);
			}
		}

		// Register the global styles custom properties
		wp_register_style('gutenkit-global-styles-css-custom-properties', false, array(), true, true);
		$global_custom_properties = Utils::get_settings('transition') ? Utils::get_settings('transition', 'value') : [];
		$converted_custom_properties = !empty($this->convert_custom_properties($global_custom_properties)) ? $this->convert_custom_properties($global_custom_properties) : "";
		if( ! empty($converted_custom_properties) ) {
			wp_add_inline_style('gutenkit-global-styles-css-custom-properties', $converted_custom_properties);
			wp_enqueue_style('gutenkit-global-styles-css-custom-properties');
		}
	}

	/**
	 * enqueue block editor assets
	 * loads styles and scripts for block editor
	 * 
	 * @return void
	 * @since 1.0.0
	 */
	public function blocks_editor_scripts()
	{
		global $pagenow;

		// Define paths to asset files
		$asset_files = [
			'components' => GUTENKIT_PLUGIN_DIR . 'build/gutenkit/components.asset.php',
			'helpers' => GUTENKIT_PLUGIN_DIR . 'build/gutenkit/helpers.asset.php',
			'global' => GUTENKIT_PLUGIN_DIR . 'build/gutenkit/global.asset.php',
		];
		
		// Enqueue components script
		$this->enqueue_assets($asset_files['components'], 'gutenkit-blocks-editor-components', 'components.js');

		// Enqueue helpers script
		$this->enqueue_assets($asset_files['helpers'], 'gutenkit-blocks-editor-helpers', 'helpers.js');

		// Enqueue global script
		$this->enqueue_assets($asset_files['global'], 'gutenkit-blocks-editor-global', 'global.js');

		// Conditional enqueue for page settings
		if ($this->should_enqueue_page_settings($pagenow)) {
			wp_enqueue_script('gutenkit-page-settings-editor-scripts');
		}

		// Enqueue breakpoint scripts and styles
		wp_enqueue_script('gutenkit-breakpoints-editor-scripts');
		wp_enqueue_style('gutenkit-breakpoints-editor-styles');
	}

	private function enqueue_assets($asset_file, $handle, $script_file)
	{
		if (file_exists($asset_file)) {
			$asset_data = include_once $asset_file;
			if (isset($asset_data['version'])) {
				wp_enqueue_script(
					$handle,
					GUTENKIT_PLUGIN_URL . "build/gutenkit/{$script_file}",
					$asset_data['dependencies'],
					$asset_data['version'],
					false
				);
				return true; // Successfully enqueued
			}
		}
		return false; // Failed to enqueue
	}

	private function should_enqueue_page_settings($pagenow) {
		$is_support_meta = post_type_supports(get_post_type(), 'custom-fields');
		return $is_support_meta && $pagenow !== 'site-editor.php' && ($pagenow === 'post.php' || $pagenow === 'post-new.php');
	}
	

	/**
	 * Converts custom properties to CSS rules for global presets.
	 *
	 * @param array $global_css The array of global CSS properties.
	 * @return string The generated CSS rules.
	 */
	public function convert_custom_properties( $global_css ) {
		// Check if the global CSS array is empty
		if(empty($global_css)) return "";

		$css = [];
		$result = "";

		// Loop through each key-value pair in the global CSS array
		foreach ($global_css as $key => $value) {
			// Check if the value is not empty
			if (!empty($value)) {
				// Add the CSS rule to the $css array
				$css[] = "--gutenkit-preset-global-" . $key . ": " . $value;
			}
		}

		// Check if the $css array is not empty
		if(!empty($css)) {
			// Generate the CSS rules for the body element
			$result = "body {" . join(';', $css) . "}";
		}

		// Return the generated CSS rules
		return $result;
	}

	public function print_device_script_for_window()
	{
		if (!is_admin()) {
			$devices = Utils::get_device_list();
			if (is_string($devices)) {
				$devices = html_entity_decode($devices, ENT_QUOTES, 'UTF-8');
			} elseif (is_array($devices)) {
				foreach ($devices as $key => $value) {
					if (! is_scalar($value)) {
						continue;
					}

					$devices[$key] = html_entity_decode((string) $value, ENT_QUOTES, 'UTF-8');
				}
			}

			$script = "var breakpoints = " . wp_json_encode($devices) . ';';

			/* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
			echo "<script type='text/javascript'>" . $script . "</script>";
		}
	}
}
