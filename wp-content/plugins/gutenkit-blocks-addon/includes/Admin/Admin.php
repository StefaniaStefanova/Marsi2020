<?php

namespace Gutenkit\Admin;
use Gutenkit\Traits\PluginHelper;

defined( 'ABSPATH' ) || exit;

/**
 * The admin class
 */
class Admin {
	use \Gutenkit\Traits\Singleton;
	use PluginHelper;

	/**
	 * @access private
	 * @var string slug of the admin menu
	 * @since 1.0.0
	 */
	private $menu_slug = 'gutenkit';
	private $menu_link_part;
	private $is_popup_active = false;
	private $popup_link_part;

	/**
	 * Initialize the class
	 */
	public function __construct() {
		$this->menu_link_part = admin_url('admin.php?page=gutenkit');
		// Check if a specific Popup Builder Block is active or not
		$active_plugin = new \Gutenkit\Admin\Api\ActivePluginData;
		if ( $active_plugin->is_plugin_active('popup-builder-block/popup-builder-block.php')) {
			$this->is_popup_active = true;
		}

		// Register Default Blocks
		new \Gutenkit\Core\BuildBlocks();

		// Register Default Modules
		new \Gutenkit\Core\BuildModules();

		// Register Default Settings
		new \Gutenkit\Core\BuildSettings();

		// Register Modules API
		new Api\ModulesData();

		// Register Blocks API
		new Api\BlocksData();

		// Register Settings API
		new Api\SettingsData();

		// Register Active Plugin API
		new Api\ActivePluginData();

		// Register Favorite Templates API
		new Api\FavoriteTemplates();

		// Register Onboard API
		new Api\OnboardData();

		add_action( 'admin_menu', [$this, 'add_admin_menu']);
		add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_scripts']);
		add_action('admin_enqueue_scripts', [$this, 'enqueue_popup_scripts']);
	}

	public function get_onboard_status() {
		return get_option('gutenkit_onboard_status') && get_option('gutenkit_onboard_status') == 'onboarded';
	}

	public function add_admin_menu() {
		add_menu_page(
			esc_html__( 'Gutenkit', 'gutenkit-blocks-addon' ),
			esc_html__( 'Gutenkit', 'gutenkit-blocks-addon' ),
			'manage_options',
			$this->menu_slug,
			[$this, 'admin_menu_callback'],
			GUTENKIT_PLUGIN_URL . 'assets/icons/admin-menu.svg',
			27
		);

		add_submenu_page(
			$this->menu_slug,
			esc_html__('Welcome', 'gutenkit-blocks-addon'),
			esc_html__('Welcome', 'gutenkit-blocks-addon'),
			'manage_options',
			$this->menu_link_part . '#welcome',
			'',
			1
		);

		add_submenu_page(
			$this->menu_slug,
			esc_html__('Blocks', 'gutenkit-blocks-addon'),
			esc_html__('Blocks', 'gutenkit-blocks-addon'),
			'manage_options',
			$this->menu_link_part . '#blocks',
			'',
			2
		);

		add_submenu_page(
			$this->menu_slug,
			esc_html__('Modules', 'gutenkit-blocks-addon'),
			esc_html__('Modules', 'gutenkit-blocks-addon'),
			'manage_options',
			$this->menu_link_part . '#modules',
			'',
			3
		);

		add_submenu_page(
            $this->menu_slug,
            esc_html__('Popups', 'gutenkit-blocks-addon'),
            esc_html__('Popups', 'gutenkit-blocks-addon'),
            'manage_options',
            $this->is_popup_active ? 'edit.php?post_type=gutenkit-popup' : 'popup-builder-block',
            $this->is_popup_active ? '' : [$this, 'popup_callback'],
			4
        );

		add_submenu_page(
			$this->menu_slug,
			esc_html__('Settings', 'gutenkit-blocks-addon'),
			esc_html__('Settings', 'gutenkit-blocks-addon'),
			'manage_options',
			$this->menu_link_part . '#settings'
		);

		$this->add_license_page_menu();
	}

	public function admin_menu_callback() {
		$data_admin = $this->get_onboard_status() ? 'dashboard' : 'onboard';
		?>
		<div class="wrap">
			<div class="gutenkit-admin-dashboard" data-admin="<?php echo esc_attr($data_admin); ?>"></div>
		</div>
		<?php
	}

	public function enqueue_admin_scripts( $hook ) {
		if(in_array($hook, array('toplevel_page_gutenkit'))) {
			$data_admin = $this->get_onboard_status() ? 'dashboard' : 'onboard';

			if($data_admin == 'onboard') {
				$onboard_assets = include GUTENKIT_PLUGIN_DIR . 'build/admin/onboard/index.asset.php';
				wp_enqueue_script(
					'gutenkit-onboard',
					GUTENKIT_PLUGIN_URL . 'build/admin/onboard/index.js',
					$onboard_assets['dependencies'],
					$onboard_assets['version'],
					true
				);

				wp_enqueue_style(
					'gutenkit-onboard',
					GUTENKIT_PLUGIN_URL . 'build/admin/onboard/index.css',
					array('wp-components'),
					GUTENKIT_PLUGIN_VERSION
				);
			} else {
				$dashboard_assets = include GUTENKIT_PLUGIN_DIR . 'build/admin/dashboard/index.asset.php';
				if (!empty($dashboard_assets)) {
					wp_enqueue_script(
						'gutenkit-dashboard',
						GUTENKIT_PLUGIN_URL . 'build/admin/dashboard/index.js',
						$dashboard_assets['dependencies'],
						$dashboard_assets['version'],
						true
					);

					wp_enqueue_style(
						'gutenkit-dashboard',
						GUTENKIT_PLUGIN_URL . 'build/admin/dashboard/index.css',
						array('wp-components'),
						$dashboard_assets['version']
					);
				}

				wp_localize_script(
					'gutenkit-dashboard',
					'gutenkit_admin_localize',
					array(
						'version' => GUTENKIT_PLUGIN_VERSION,
						'api_url' => GUTENKIT_API_URL,
						'admin_url' => admin_url(),
						'is_block_theme' => wp_is_block_theme() ? true : false,
						'is_pro_active' => self::is_plugin_active('gutenkit-blocks-addon-pro/gutenkit-blocks-addon-pro.php'),
						'pro_version' => defined('GUTENKIT_PRO_PLUGIN_VERSION') ? GUTENKIT_PRO_PLUGIN_VERSION : '',
					)
				);

				// Google Roboto Font
				// phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
				wp_enqueue_style(
					'gutenkit-google-fonts',
					'https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap'
				);
			}
		}
	}

	/**
	 * License page will be active when pro plugin is available
	 */
	private function add_license_page_menu(){
		if(self::is_plugin_active('gutenkit-blocks-addon-pro/gutenkit-blocks-addon-pro.php')){
			add_submenu_page(
				$this->menu_slug,
				esc_html__('License', 'gutenkit-blocks-addon'),
				esc_html__('License', 'gutenkit-blocks-addon'),
				'manage_options',
				$this->menu_link_part . '#license'
			);
		}
	}

	public function popup_callback() {
		?>
		<div class="gutenkit-admin-popup-builder"></div>
		<?php
	}

	public function enqueue_popup_scripts($hook) {
		if(in_array($hook, array('gutenkit_page_popup-builder-block')) && !$this->is_popup_active) {
			$popup_assets = include GUTENKIT_PLUGIN_DIR . 'build/admin/popup-builder/index.asset.php';
			wp_enqueue_script(
				'gutenkit-admin-popup-builder',
				GUTENKIT_PLUGIN_URL . 'build/admin/popup-builder/index.js',
				$popup_assets['dependencies'],
				$popup_assets['version'],
				true
			);

			wp_enqueue_style(
				'gutenkit-admin-popup-builder',
				GUTENKIT_PLUGIN_URL . 'build/admin/popup-builder/index.css',
				array('wp-components'),
				$popup_assets['version']
			);
		}
	}
}
