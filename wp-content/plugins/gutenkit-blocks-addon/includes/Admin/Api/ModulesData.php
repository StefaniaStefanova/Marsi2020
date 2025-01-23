<?php 

namespace Gutenkit\Admin\Api;

defined( 'ABSPATH' ) || exit;

class ModulesData {
	public $prefix  = '';
	public $param   = '';
	public $request = null;

	public function __construct() {
		add_action('rest_api_init', function() {
			register_rest_route('gutenkit/v1', 'modules', 
				array(
					'methods'  => \WP_REST_Server::READABLE,
					'callback' => array( $this, 'action_get_modules' ),
					'permission_callback' => '__return_true',
					),
				);
			}
		);

		add_action('rest_api_init', function() {
			register_rest_route('gutenkit/v1', 'modules',
				array(
					'methods'             => \WP_REST_Server::EDITABLE,
					'callback'            => array( $this, 'action_edit_modules' ),
					'permission_callback' => '__return_true',
					),
				);
			}
		);
	}

	public function action_get_modules( $request ) {
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

		$result_data = get_option( 'gutenkit_modules_list' );

		return array(
			'status'    => 'success',
			'modules'      => $result_data,
			'message'   => array(
				'Modules list has been fetched successfully.',
			),
		);
	}

	public function action_edit_modules( $request ) {
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
		if ( array_key_exists( 'modules', $req_data ) ) {
			$data      = $req_data['modules'];
			$array_get = update_option( 'gutenkit_modules_list', $data );

			return array(
				'status'  => 'success',
				'modules' => $array_get,
				'message' => array(
					'Modules list has been Updated successfully.',
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
