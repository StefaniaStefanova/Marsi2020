<?php

namespace Gutenkit\Admin\Api;

defined( 'ABSPATH' ) || exit;

class SettingsData {
	public $prefix  = '';
	public $param   = '';
	public $request = null;

	public function __construct() {
		add_action('rest_api_init', function() {
			register_rest_route('gutenkit/v1', 'settings',
				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( $this, 'action_get_settings' ),
					'permission_callback' => '__return_true',
					),
				);
			}
		);

		add_action('rest_api_init', function() {
			register_rest_route('gutenkit/v1', 'settings',
				array(
					'methods'             => \WP_REST_Server::EDITABLE,
					'callback'            => array( $this, 'action_edit_settings' ),
					'permission_callback' => '__return_true',
					),
				);
			}
		);
	}

	public function action_get_settings( $request ) {
		/**
		* turn on this section when fully functional from frontend and need Nonce check Permission check 
		*/
		if ( ! wp_verify_nonce( $request->get_header( 'X-WP-Nonce' ), 'wp_rest' ) ) {
			return array(
				'status'  => 'fail',
				'message' => array( 'Nonce mismatch.' ),
			);
		}

		if ( ! is_user_logged_in() || ! current_user_can( 'manage_options' ) ) {
			return array(
				'status'  => 'fail',
				'message' => array( 'Access denied.' ),
			);
		}

		$result_data = get_option( 'gutenkit_settings_list' );

		return array(
			'status'  => 'success',
			'settings' => $result_data,
			'message' => array(
				'Settings list has been fetched successfully.',
			),
		);
	}
	public function action_edit_settings( $request ) {
		/**
		* turn on this section when fully functional from frontend and need Nonce check Permission check 
		*/
		if ( ! wp_verify_nonce( $request->get_header( 'X-WP-Nonce' ), 'wp_rest' ) ) {
			return array(
				'status'  => 'fail',
				'message' => array( 'Nonce mismatch.' ),
			);
		}

		if ( ! is_user_logged_in() || ! current_user_can( 'manage_options' ) ) {
			return array(
				'status'  => 'fail',
				'message' => array( 'Access denied.' ),
			);
		}

		$req_data = $request->get_params();

		if ( array_key_exists( 'settings', $req_data ) ) {
			$data      = $req_data['settings'];
			$array_get = update_option( 'gutenkit_settings_list', $data );

			return array(
				'status'  => 'success',
				'settings' => $array_get,
				'message' => array(
					'Settings list has been Updated successfully.',
				),
			);
		} else {
			return array(
				'status'  => 'fail',
				'message' => array( 'Something went wrong.' ),
			);
		}
	}
}
