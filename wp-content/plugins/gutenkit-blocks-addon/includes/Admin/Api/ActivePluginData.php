<?php

namespace Gutenkit\Admin\Api;

class ActivePluginData {
	public $request = null;

	public function __construct() {
		add_action('rest_api_init', function() {
			register_rest_route('gutenkit/v1', 'active-plugin',
				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => [$this, 'action_get_active_plugin'],
					'permission_callback' => '__return_true',
				),
			);
		});

		add_action('rest_api_init', function() {
			register_rest_route('gutenkit/v1', 'install-active-plugin',
				array(
					'methods'             => \WP_REST_Server::EDITABLE,
					'callback'            => [$this, 'install_and_activate_plugin_from_external'],
					'permission_callback' => '__return_true',
				),
			);
		});
	}

	public function action_get_active_plugin($request) {
		/**
		* turn on this section when fully functional from frontend and need Nonce check Permission check 
		*/
		if (!wp_verify_nonce($request->get_header('X-WP-Nonce'), 'wp_rest')) {
			return [
				'status'  => 'fail',
				'message' => 'Nonce mismatch.',
			];
		}

		if (!is_user_logged_in() || !current_user_can('manage_options')) {
			return [
				'status'  => 'fail',
				'message' => 'Access denied.',
			];
		}

		$plugin_name = $request->get_param('plugin');
		
		$result_data = $this->is_plugin_active($plugin_name.'/'.$plugin_name.'.php');

		return [
			'status'  => 'success',
			'is_active' => $result_data,
			'message' => 'Plugin active data fetched successfully.',
		];
	}

	public function is_plugin_active( $plugin ) {
		return in_array( $plugin, (array) get_option( 'active_plugins', array() ), true ) || $this->is_plugin_active_for_network( $plugin );
	}

	public function is_plugin_active_for_network( $plugin ) {
		if ( ! is_multisite() ) {
			return false;
		}
	
		$plugins = get_site_option( 'active_sitewide_plugins' );
		if ( isset( $plugins[ $plugin ] ) ) {
			return true;
		}
	
		return false;
	}

	public function install_and_activate_plugin_from_external($request) {
		// Check if the user has the required capability
		if (!current_user_can('install_plugins')) {
			wp_send_json_error('You do not have permission to install plugins.');
			return;
		}
	
		// The external plugin URL
		$plugin_url = esc_url_raw($request->get_param('plugin'));
		$slug = sanitize_text_field($request->get_param('slug'));
		$plugin_slug = "$slug/$slug.php";
		$plugin_dir = WP_PLUGIN_DIR;  // This points to wp-content/plugins

		require_once ABSPATH . 'wp-admin/includes/file.php';
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
		require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
	
		WP_Filesystem();
	
		// Download the plugin ZIP file
		$temp_file = download_url($plugin_url);
		if (is_wp_error($temp_file)) {
			wp_send_json_error('Failed to download plugin. Error: ' . $temp_file->get_error_message());
			return;
		}

		// Unzip the plugin into the wp-content/plugins directory
		$unzip_result = unzip_file($temp_file, $plugin_dir);
	
		// Delete the temporary file after unzipping
		wp_delete_file($temp_file);
	
		if (is_wp_error($unzip_result)) {
			wp_send_json_error('Failed to unzip plugin. Error: ' . $unzip_result->get_error_message());
			return;
		}
	
		// Check if the plugin directory exists
		$plugin_path = $plugin_dir . '/' . $plugin_slug;
	
		if (!file_exists($plugin_path)) {
			wp_send_json_error('The plugin directory does not exist after unzipping.');
			return;
		} else {
			wp_send_json_success('Plugin installed successfully!');
		}
	}
}