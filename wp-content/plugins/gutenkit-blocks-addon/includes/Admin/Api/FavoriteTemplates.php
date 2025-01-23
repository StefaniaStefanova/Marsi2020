<?php

namespace Gutenkit\Admin\Api;

defined( 'ABSPATH' ) || exit;

/**
 * Favorite Templates for Template Library
 * 
 * @since 1.0.2
 */
class FavoriteTemplates {
	public $prefix  = '';
	public $param   = '';
	public $request = null;

    /**
     * FavoriteTemplates constructor.
     * 
     * @access public
     * @return void
     */
	public function __construct() {
		add_action('rest_api_init', function() {
			register_rest_route('gutenkit/v1', 'favorite-templates',
				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( $this, 'action_get_favorite_templates' ),
					'permission_callback' => '__return_true',
					),
				);
			}
		);

		add_action('rest_api_init', function() {
			register_rest_route('gutenkit/v1', 'favorite-templates',
				array(
					'methods'             => \WP_REST_Server::EDITABLE,
					'callback'            => array( $this, 'action_edit_favorite_templates' ),
					'permission_callback' => '__return_true',
					),
				);
			}
		);
	}

    /**
     * Get Favorite Templates
     * 
     * @param array $request
     * @access public
     * @return array
     */
	public function action_get_favorite_templates( $request ) {

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

		$result_data = get_option( 'gutenkit_favorite_templates' );

		return array(
			'status'  => 'success',
			'data' => $result_data,
			'message' => array(
				'Favorite templates has been fetched successfully.',
			),
		);
	}

    /**
     * Edit Favorite Templates
     * 
     * @param array $request
     * @access public
     * @return array
     */
	public function action_edit_favorite_templates( $request ) {

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
        $saved_data= get_option('gutenkit_favorite_templates') ? get_option('gutenkit_favorite_templates') : [];


		if ( array_key_exists( 'template_list', $req_data ) ) {
			$data      = $req_data['template_list'];
            $favorite_id = isset($data['id']) ? $data['id'] : '';
            $is_favorite = isset($data['isFavorite']) ? $data['isFavorite'] : false;
            $saved_data[$favorite_id]['isFavorite'] = $is_favorite;
   
			$array_get = update_option( 'gutenkit_favorite_templates', $saved_data );            

			return array(
				'status'  => 'success',
				'data' => $array_get,
				'message' => array(
					'Favorite templates has been Updated successfully.',
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
