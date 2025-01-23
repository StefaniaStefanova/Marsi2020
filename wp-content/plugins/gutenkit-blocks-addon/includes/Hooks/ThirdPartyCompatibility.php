<?php
namespace Gutenkit\Hooks;

defined( 'ABSPATH' ) || exit;

class ThirdPartyCompatibility {

	use \Gutenkit\Traits\Singleton;

	// 3rd party themes
	private $third_party_themes = array(
		'kadence',
		'generatepress',
		'bricks',
	);

	/**
	 * Defining Css Vars
	 */
	private $css_vars = array();

	public function __construct() {
		// Otter blocks plugin compatibility
		add_action( 'wp_head', array( $this, 'otter_blocks_compatibility' ) );
		add_action( 'admin_head', array( $this, 'otter_blocks_compatibility' ) );

		// Return if block theme
		if( wp_is_block_theme() ) {
			return;
		}

		// Add custom body classes
		add_filter( 'body_class', array( $this, 'custom_body_classes' ) );

		// Kadence theme compatibility
		add_action( 'wp_enqueue_scripts', array( $this, 'blocks_compatibility' ) );
		add_action('enqueue_block_editor_assets', array( $this, 'blocks_editor_compatibility' ) );

		// WPForms plugin compatibility
		add_filter( 'wpforms_frontend_css_vars_init_vars', array( $this, 'wpforms_frontend_css_vars_init_vars' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'wpforms_frontend_css' ), 11 );
	}

	/**
	 * Adds compatibility for Otter Blocks plugin.
	 *
	 * This function checks if the Otter Blocks plugin is active. If it is active,
	 * it adds custom CSS to ensure compatibility with the GutenKit blocks.
	 *
	 * @return void
	 */
	public function otter_blocks_compatibility() {
		// check if otter blocks plugin is active
		$is_plugin_active = in_array('otter-blocks/otter-blocks.php', apply_filters('active_plugins', get_option('active_plugins')));
		if ($is_plugin_active) {
			$custom_css = '.gkit-block__inner [class^="wp-block-themeisle-blocks-"]{flex-basis: 100%;}';
			echo '<style>' . $custom_css . '</style>';
		}
	}

	/**
	 * Adds custom body classes based on the active theme.
	 *
	 * This function checks the currently active theme and adds a corresponding
	 * class to the body classes array if the theme is recognized.
	 *
	 * @param array $classes An array of body class names.
	 * @return array Modified array of body class names.
	 */
	public function custom_body_classes( $classes ) {
		// Get the current theme
		$current_theme = wp_get_theme();

		// check if kadence theme is active
		if ( $current_theme->get('TextDomain') == 'kadence' ) {
			$classes[] = 'gutenkit-kadence';
		}

		// check if generatepress theme is active
		if ( $current_theme->get('TextDomain') == 'generatepress' ) {
			$classes[] = 'gutenkit-generatepress';
		}

		// check if bricks theme is active
		if ( $current_theme->get('TextDomain') == 'bricks' ) {
			$classes[] = 'gutenkit-bricks';
		}

		return $classes;
	}

	/**
	 * Function to handle compatibility with third-party blocks.
	 *
	 * This function checks if a specific theme is active and enqueues the necessary CSS file for compatibility.
	 *
	 * @since 2.0.1
	 * @TODO: This should be removed in future
	 */
	public function blocks_compatibility() {
		// Get the current theme
		$current_theme = wp_get_theme();

		// check specific theme is active or not
		if ( in_array( $current_theme->get('TextDomain'), $this->third_party_themes ) ) {
			$compatibility_assets = include_once GUTENKIT_PLUGIN_DIR . 'build/compatibility/frontend.asset.php';
			wp_enqueue_style(
				'gutenkit-third-party-compatibility',
				GUTENKIT_PLUGIN_URL . 'build/compatibility/frontend.css',
				$compatibility_assets['dependencies'],
				$compatibility_assets['version']
			);
		}
	}

	/**
	 * Checks the compatibility of the blocks editor with the current theme.
	 *
	 * @since 2.0.1
	 * @TODO: This should be removed in future
	 * @return void
	 */
	public function blocks_editor_compatibility() {
		$current_theme = wp_get_theme();

		// check specific theme is active or not
		if ($current_theme->get('TextDomain') == 'kadence') {
			$compatibility_editor_assets = include_once GUTENKIT_PLUGIN_DIR . 'build/compatibility/editor.asset.php';
			wp_enqueue_style(
				'gutenkit-third-party-editor-compatibility',
				GUTENKIT_PLUGIN_URL . 'build/compatibility/editor.css',
				$compatibility_editor_assets['dependencies'],
				$compatibility_editor_assets['version']
			);
		}
	}

	/**
	 * Initializes the CSS variables for the WPForms frontend.
	 *
	 * @param array $vars The CSS variables to be initialized.
	 * @return array The initialized CSS variables.
	 */
	public function wpforms_frontend_css_vars_init_vars( $vars ) {
		$this->css_vars = $vars;
		return $vars;
	}

	/**
	 * Hook function for adding WPForms frontend CSS.
	 *
	 * This function is responsible for adding WPForms frontend CSS if the block theme is not active
	 * and the WPForms\Frontend\CSSVars class exists. It checks if the CSS variables for the :root selector
	 * are set and not empty, and then outputs the selector variables using the CSSVars class.
	 *
	 * @return void
	 */
	public function wpforms_frontend_css() {
		if( class_exists('WPForms\Frontend\CSSVars') ) {
			if (isset($this->css_vars[':root']) && !empty($this->css_vars[':root'])) {
				$override_wp_forms = new \WPForms\Frontend\CSSVars();
				$override_wp_forms->output_selector_vars(':root', $this->css_vars[':root']);
			}
		}
	}
}