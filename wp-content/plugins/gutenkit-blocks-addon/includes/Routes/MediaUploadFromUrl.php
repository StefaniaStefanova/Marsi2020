<?php

namespace Gutenkit\Routes;

defined('ABSPATH') || exit;

class MediaUploadFromUrl {
	use \Gutenkit\Traits\Singleton;

	public function __construct() {
		add_action( 'rest_api_init', array( $this, 'register_media_upload_from_url_route' ) );
	}

	public function register_media_upload_from_url_route() {
		register_rest_route(
			'gutenkit/v1',
			'/media-upload-from-url',
			array(
			'methods'             => 'POST',
			'callback'            => array( $this, 'handle_media_upload_from_url_request' ),
			'permission_callback' => array( $this, 'media_upload_from_url_permission_check' ),
			)
		);
	}

	public function handle_media_upload_from_url_request( $request ) {
		$image = $request->get_json_params();

		if ( empty( $image ) ) {
			return new \WP_Error( 'empty_data', 'No image provided.', array( 'status' => 400 ) );
		}

		if ( ! function_exists( 'download_url' ) ) {
			require_once ABSPATH . 'wp-admin/includes/file.php';
		}

		if ( ! function_exists( 'media_handle_sideload' ) ) {
			require_once ABSPATH . 'wp-admin/includes/media.php';
		}

		if ( ! function_exists( 'wp_read_image_metadata' ) ) {
			require_once ABSPATH . 'wp-admin/includes/image.php';
		}
		$uploaded_image = $this->upload_image( $image );
		$uploaded_media = ! empty( $uploaded_image ) ? $uploaded_image : array();

		// Send a JSON response
		return \wp_send_json( $uploaded_media );
	}

	public function media_upload_from_url_permission_check() {
		return current_user_can( 'upload_files' );
	}

	public function upload_image( $image ) {
		if ( isset( $image['url'] ) && ! empty( $image['id'] ) && ! empty( $image['filename'] ) ) {
			$attachment_id = $this->get_attachment_id_by_origin( $image['url'] );
			if ( empty( $attachment_id ) ) {
				$downloaded_file = \download_url( $image['url'] );
				if ( ! is_wp_error( $downloaded_file ) ) {
					$file_array = array(
						'name'     => basename( $image['filename'] ),
						'tmp_name' => $downloaded_file,
					);

					$attachment             = wp_handle_sideload( $file_array, array( 'test_form' => false ) );
					if ( ! empty( $attachment['error'] ) ) {
						return false;
					} else {
						$uploaded_attachment_id = wp_insert_attachment(
							array(
								'guid'           => $attachment['url'],
								'post_mime_type' => $attachment['type'],
								'post_title'     => basename( $attachment['file'] ),
								'post_content'   => 'Uploaded From demo site',
								'post_status'    => 'inherit',
							),
							$attachment['file']
						);
						update_post_meta( $uploaded_attachment_id, 'origin_from', $image['url'] );
						wp_update_attachment_metadata(
							$uploaded_attachment_id,
							wp_generate_attachment_metadata( $uploaded_attachment_id, $attachment['file'] )
						);
						$uploaded_attachment = wp_prepare_attachment_for_js( $uploaded_attachment_id );
						wp_reset_postdata();
						return $uploaded_attachment;
					}
				}
			} else {
				$uploaded_attachment = wp_prepare_attachment_for_js( $attachment_id );
				wp_reset_postdata();
				return $uploaded_attachment;
			}
		}
	}

	private function get_attachment_id_by_origin( $origin_url ) {
		if ( empty( $origin_url ) ) {
			return false;
		}

		$args = array(
			'post_type'   => 'attachment',
			'post_status' => 'inherit',
			// phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_query
			'meta_query'  => array(
				array(
					'key'   => 'origin_from',
					'value' => $origin_url,
				),
			),
			'fields'      => 'ids',
		);

		$query = new \WP_Query( $args );
		if ( $query->have_posts() ) {
			return $query->posts[0];
		}

		wp_reset_postdata();

		return false;
	}
}
