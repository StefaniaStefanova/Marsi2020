<?php
namespace Gutenkit\Hooks;

defined( 'ABSPATH' ) || exit;

use Gutenkit\Helpers\Utils;

class ImageOptimizer {

	use \Gutenkit\Traits\Singleton;

	/**
	 * class constructor.
	 * private for singleton
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function __construct() {
		add_filter( "gutenkit_save_element_markup", array( $this, 'add_image_optimizer_attributes_on_save' ), 10, 2 );
	}

	public function add_image_optimizer_attributes_on_save( $block_content, $parsed_block ) {

        if ( Utils::is_gkit_block( $block_content, $parsed_block ) && empty( $parsed_block['attrs']['disableImageLazyLoading'] ) && !empty( Utils::get_settings( 'image_lazy_loading' ) ) ) {
            while ($block_content->next_tag(['tag_name' => 'img'])) {
                $block_content->set_attribute('loading', 'lazy');
            }
            return $block_content;
        }

        return $block_content;
	}
}
