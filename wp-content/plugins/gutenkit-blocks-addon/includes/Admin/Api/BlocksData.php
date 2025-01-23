<?php

namespace Gutenkit\Admin\Api;

defined( 'ABSPATH' ) || exit;

class BlocksData {
	public $prefix  = '';
	public $param   = '';
	public $request = null;

	public function __construct() {
		add_action(
			'rest_api_init',
			function () {
				register_rest_route(
					'gutenkit/v1',
					'blocks',
					array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( $this, 'action_get_blocks' ),
					'permission_callback' => '__return_true',
					),
				);
			}
		);

		add_action('rest_api_init', function () {
			register_rest_route('gutenkit/v1', 'blocks',
				array(
					'methods'             => \WP_REST_Server::EDITABLE,
					'callback'            => array( $this, 'action_edit_blocks' ),
					'permission_callback' => '__return_true',
					),
				);
			}
		);
	}

	public function action_get_blocks( $request ) {
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

		$result_data = get_option( 'gutenkit_blocks_list' );

		return array(
			'status'  => 'success',
			'blocks' => $result_data,
			'message' => array(
				'Blocks list has been fetched successfully.',
			),
		);
	}

	public function action_edit_blocks( $request ) {
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
		
		if (array_key_exists('blocks', $req_data)) {
			$data = $req_data['blocks'];

			update_option('gutenkit_blocks_list', $data);

			return array(
				'status'  => 'success',
				'blocks' => $data,
				'message' => [
					'Blocks list has been updated successfully',
				]
			);
		} else {
			wp_send_json_error( esc_html__( 'Something went wrong.', 'gutenkit-blocks-addon' ), 500 );
		}
	}
}
