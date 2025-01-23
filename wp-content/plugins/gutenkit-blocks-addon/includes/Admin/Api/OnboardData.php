<?php

namespace Gutenkit\Admin\Api;
use Gutenkit\Admin\Onboard\Onboard;

defined( 'ABSPATH' ) || exit;

class OnboardData {
	public $prefix  = '';
	public $param   = '';
	public $request = null;

	public function __construct() {
		add_action('rest_api_init', function() {
			register_rest_route('gutenkit/v1', 'onboard', 
				array(
					'methods'  => \WP_REST_Server::READABLE,
					'callback' => array( $this, 'action_get_onboard' ),
					'permission_callback' => '__return_true',
					),
				);
			}
		);

		add_action('rest_api_init',
			function () {
				register_rest_route('gutenkit/v1','onboard',
					array(
					'methods'             => \WP_REST_Server::EDITABLE,
					'callback'            => array( $this, 'post_save_onboard' ),
					'permission_callback' => '__return_true',
					),
				);
			}
		);
	}

	public function action_get_onboard( $request ) {
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

		$status = get_option( 'gutenkit_onboard_status' );
		$email = get_option( 'gutenkit_onboard_email' );

		return array(
			'status'    => 'success',
			'onboard'      => array(
				'status' => $status,
				'email' => $email,
			),
			'message'   => array(
				'Onboard data has been fetched successfully.',
			),
		);
	}

	public function post_save_onboard( $request ) {
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

		$data    = $request->get_params();
		$onboard = new Onboard();
		return $onboard->submit($data);
	}
}
