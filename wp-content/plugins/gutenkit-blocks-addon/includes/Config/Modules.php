<?php

namespace Gutenkit\Config;
use Gutenkit\Helpers\Utils;

defined( 'ABSPATH' ) || exit;

class Modules {

	use \Gutenkit\Traits\Singleton;

	/**
	 * @var array List of used modules
	 */
	private $used_modules = array();

	/**
	 * @var array Settings of used modules
	 */
	private $used_modules_settings = array();

	/**
	 * Modules constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_filter( 'render_block_data', [ $this, 'block_data' ], 10, 3 );
		add_action( 'enqueue_block_assets', [ $this, 'block_assets' ] );
		add_action( 'block_type_metadata_settings', [ $this, 'metadata_settings' ], 10, 2 );
	}

	/**
	 * Returns the keys of the modules.
	 *
	 * @return string[] Array of module keys
	 * @since 1.0.0
	 */
	protected function module_keys() {
		return ['entranceAnimation', 'mouseTiltEffects', 'mouseTrackEffects', 'isScrollingEffect', 'enableTooltip', 'isOnePageScrollSection', 'stickyPosition', 'interactions', 'enableParticleEffect'];
	}

	/**
	 * Handles the 'render_block_data' filter.
	 *
	 * @param array $parsed_block The block data.
	 * @param array $source_block The original block.
	 * @param array $parent_block The parent block.
	 * @return array The modified block data.
	 * @since 1.0.0
	 */
	public function block_data( $parsed_block, $source_block, $parent_block ) {
		if( isset($parsed_block['blockName']) && strstr($parsed_block['blockName'], 'gutenkit') && isset($parsed_block['attrs']) ) {
			$attrs = $parsed_block['attrs'];
			$module_keys = $this->module_keys();
			$modules_list = self::get_active_modules_list();

			foreach ($module_keys as $key) {
				if( in_array($key, $this->used_modules) ) {
					continue;
				}

				// check if Entrance Animation is enabled
				if ($key == 'entranceAnimation' && !empty($attrs[$key]['effect'])) {
					$this->used_modules[] = $key; // to check only add the module if it's used
					$this->used_modules_settings['entrance-animation'] = $modules_list['entrance-animation'] ?? array();
				}

				// check if Mouse Tilt Effects is enabled
				if ($key == 'mouseTiltEffects'  && isset($attrs[$key]) && !empty($attrs[$key])) {
					$this->used_modules[] = $key; // to check only add the module if it's used
					$this->used_modules_settings['mouse-tilt'] = $modules_list['mouse-tilt'] ?? array();
				}

				// check if Mouse Track Effects is enabled
				if ($key == 'mouseTrackEffects'  && isset($attrs[$key]) && !empty($attrs[$key])) {
					$this->used_modules[] = $key; // to check only add the module if it's used
					$this->used_modules_settings['mouse-track'] = $modules_list['mouse-track'] ?? array();
				}

				// check if Scrolling Effects is enabled
				if( $key == 'isScrollingEffect' && (!empty($attrs['isImageScrollingEffect']) || !empty($attrs['isScrollingEffect'])) ) {
					$this->used_modules[] = $key; // to check only add the module if it's used
					$this->used_modules_settings['scrolling-effects'] = $modules_list['scrolling-effects'] ?? array();
				}

				// check if isOnePageScrollSection is enabled
				if( $key == 'isOnePageScrollSection' && isset($attrs[$key]) && !empty($attrs[$key]) ) {
					$this->used_modules[] = $key; // to check only add the module if it's used
					$this->used_modules_settings['one-page-scroll'] = $modules_list['one-page-scroll'] ?? array();
				}
				
				// check if Tooltip is enabled
				if( $key == 'enableTooltip' && isset($attrs[$key]) && !empty($attrs[$key]) ) {
					$this->used_modules[] = $key; // to check only add the module if it's used
					$this->used_modules_settings['advanced-tooltip'] = $modules_list['advanced-tooltip'] ?? array();
				}

				// check if sticky is enabled
				if( $key == 'stickyPosition' && isset($attrs[$key]) && $attrs[$key] !== 'none') {
					$this->used_modules[] = $key; // to check only add the module if it's used
					$this->used_modules_settings['sticky'] = $modules_list['sticky'] ?? array();
				}

				// check if interactions is enabled
				if( $key == 'interactions' && isset($attrs[$key]) && !empty($attrs[$key]) ) {
					$this->used_modules[] = $key; // to check only add the module if it's used
					$this->used_modules_settings['interactions'] = $modules_list['interactions'] ?? array();
				}

				// check if interactions is enabled
				if( $key == 'enableParticleEffect' && isset($attrs[$key]) && !empty($attrs[$key]) ) {
					$this->used_modules[] = $key; // to check only add the module if it's used
					$this->used_modules_settings['particle'] = $modules_list['particle'] ?? array();

				}
			}
		}

		return $parsed_block;
	}

	/**
	 * Handles the 'enqueue_block_assets' action.
	 *
	 * @since 1.0.0
	 */
	public function block_assets() {
		global $post;

		// If the theme is not a block theme, parse the blocks and set the CSS.
		if( ! wp_is_block_theme() && ! empty($post->post_content) ) {
			do_blocks($post->post_content);
		}

		// Enqueue the assets for the used modules
		$this->register_modules(is_admin() ? self::get_active_modules_list() : array_filter($this->used_modules_settings), is_admin());
	}

	/**
	 * Registers the modules.
	 *
	 * @param array $modules The modules to register.
	 * @param bool $is_editor Whether the current request is for the editor.
	 * @since 1.0.0
	 */
	protected function register_modules( $modules = [], $is_editor = false ) {
		$is_register = Utils::is_local() ? Utils::is_local() : Utils::status() === 'valid';

		foreach( $modules as $key => $module ) {
			$package = isset($module['package']) ? $module['package'] : 'free';
			$editor_asset_path = self::get_asset($key, $package, 'editor.asset.php', 'path');
			$common_asset_path = self::get_asset($key, $package, 'common.asset.php', 'path');

			if($package == 'pro' && !$is_register) {
				continue;
			}

			if( $is_editor && file_exists( $editor_asset_path ) ) {
				$this->register_asset($key, $package, 'editor', include $editor_asset_path);
			}

			if( file_exists( $common_asset_path ) ) {
				$this->register_asset($key, $package, 'common', include $common_asset_path);
			}
		}
	}

	/**
	 * Registers an asset.
	 *
	 * @param string $key The module key.
	 * @param string $package The package type.
	 * @param string $type The asset type.
	 * @param array $asset_data The asset data.
	 * @since 1.0.0
	 */
	protected function register_asset($key, $package, $type, $asset_data) {
		if( file_exists( self::get_asset($key, $package, "{$type}.js", 'path') ) ) {
			wp_register_script(
				"gutenkit-{$key}-{$type}-scripts",
				self::get_asset($key, $package, "{$type}.js"),
				$asset_data['dependencies'],
				$asset_data['version'],
				true
			);
		}

		if( file_exists( self::get_asset($key, $package, "{$type}.css", 'path') ) ) {
			wp_register_style(
				"gutenkit-{$key}-{$type}-styles",
				self::get_asset($key, $package, "{$type}.css"),
				array(),
				$asset_data['version']
			);
		}
	}

	/**
	 * Handles the 'block_type_metadata_settings' action.
	 *
	 * @param array $settings The block settings.
	 * @param array $metadata The block metadata.
	 * @return array The modified block settings.
	 * @since 1.0.0
	 */
	public function metadata_settings( $settings, $metadata ) {
		if( strstr( $metadata['name'], 'gutenkit' ) ) {
			$modules = self::get_active_modules_list();
			if ( $modules ) {
				foreach ( $modules as $key => $module ) {
					if(isset($module['auto_enqueue']) && $module['auto_enqueue'] === false) {
						continue;
					}

					$package = isset($module['package']) ? $module['package'] : 'free';
					if(is_admin()){
						$settings = $this->enqueue_assets($settings, $key, $metadata, $package, 'editor');
					}

					$settings = $this->enqueue_assets($settings, $key, $metadata, $package, 'common');
				}
			}
		}

		return $settings;
	}

	/**
	 * Enqueues the assets.
	 *
	 * @param array $settings The block settings.
	 * @param string $key The module key.
	 * @param array $metadata The block metadata.
	 * @param string $package The package type.
	 * @param string $type The asset type.
	 * @return array The modified block settings.
	 * @since 1.0.0
	 */
	protected function enqueue_assets($settings, $key, $metadata, $package, $type) {
		$settings["script_handles"] = !empty($settings["script_handles"]) ? $settings["script_handles"] : array();
		$settings["script_handles"] = array_unique(apply_filters("gutenkit-{$key}-{$type}-3rd-party-scripts", $settings["script_handles"], $key, $metadata));

		if( file_exists( self::get_asset($key, $package, "{$type}.js", 'path') ) ) {
			$settings["script_handles"][] = "gutenkit-{$key}-{$type}-scripts";
		}

		$settings["style_handles"] = !empty($settings["style_handles"]) ? $settings["style_handles"] : array();
		$settings["style_handles"] =  array_unique(apply_filters("gutenkit-{$key}-{$type}-3rd-party-styles", $settings["style_handles"], $key, $metadata));

		if( file_exists( self::get_asset($key, $package, "{$type}.css", 'path') ) ) {
			$settings["style_handles"][] = "gutenkit-{$key}-{$type}-styles";
		}

		return $settings;
	}

	/**
	 * Returns the asset URL or path.
	 *
	 * @param string $module The module name.
	 * @param string $package The package type.
	 * @param string $file_name The file name.
	 * @param string $return_type The return type ('url' or 'path').
	 * @return string The asset URL or path.
	 * @since 1.0.0
	 */
	public static function get_asset($module, $package = 'free', $file_name = 'common.js', $return_type = 'url') {
		$assets = [
			'url' => GUTENKIT_PLUGIN_URL . 'build/modules/' . $module . '/',
			'path' => GUTENKIT_PLUGIN_DIR . 'build/modules/' . $module . '/',
		];

		if( $package !== 'free' ) {
			$assets = apply_filters("gutenkit_{$package}_{$module}_assets", $module);
		}

		if( !isset($assets['url']) || !isset($assets['path']) ) {
			return '';
		}

		$asset_dir = ($return_type === 'url') ? $assets['url'] : $assets['path'];

		return $asset_dir . $file_name;
	}

	/**
	 * Returns the active modules.
	 *
	 * @return array The active modules.
	 * @since 1.0.0
	 * @deprecated 1.5.1
	 * @todo Will be reomoved
	 */
	public function get_active_modules() {
		$modules_list = get_option('gutenkit_modules_list');
		$active_modules = array();

		foreach ($modules_list as $key => $module) {
			if( $module['status'] === 'active' ) {
				$active_modules[$key] = $module;
			}
		}

		return $active_modules;
	}

	/**
	 * Returns the active modules list.
	 *
	 * @return array The active modules.
	 * @since 1.5.1
	 */
	public static function get_active_modules_list() {
		$modules_list = get_option('gutenkit_modules_list');
		$active_modules = array();

		if (is_array($modules_list) || is_object($modules_list)) {
			foreach ($modules_list as $key => $module) {
				if ($module['status'] === 'active') {
					$active_modules[$key] = $module;
				}
			}
		}

		return $active_modules;
	}
}
