<?php
namespace Gutenkit\Hooks;

defined( 'ABSPATH' ) || exit;

use Gutenkit\Helpers\Utils;

class EntranceAnimation {

	use \Gutenkit\Traits\Singleton;

	/**
	 * class constructor.
	 * private for singleton
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function __construct() {
		add_filter( "gutenkit-entrance-animation-editor-3rd-party-styles", array( $this, 'load_entrance_animation_editor_styles' ), 10, 3 );
		add_filter( "render_block_data", array( $this, 'load_entrance_animation_3rd_party_frontend_script_on_demand' ), 10, 3 );
		add_filter( "gutenkit_save_element_markup", array( $this, 'add_entrance_animation_attributes_on_save' ), 10, 3 );
	}

	public function load_entrance_animation_editor_styles( $styles, $module_name, $metadata ) {
		if($module_name == 'entrance-animation' && is_admin()) {
			$styles = array_merge($styles, array('animate'));
			$styles = array_merge($styles, array('gkit-animate'));
		}
		return $styles;
	}

	public function load_entrance_animation_3rd_party_frontend_script_on_demand( $parsed_block, $source_block, $parent_block ) {
		if( Utils::is_gkit_block('gkit', $parsed_block, 'entranceAnimation', 'effect') ) {
			wp_enqueue_style("animate");
			wp_enqueue_style("gkit-animate");
		}
		return $parsed_block;
	}

	public function add_entrance_animation_attributes_on_save( $block_content, $parsed_block, $instance ) {
		if ( Utils::is_gkit_block($block_content, $parsed_block, 'entranceAnimation', 'effect') ) {
			$block_content->add_class('gkit-motion-effects');
			$block_content->add_class('animate__animated');
			$settings = [
				'className' => isset($parsed_block['attrs']['entranceAnimation']['effect']['value']) ? "animate__".$parsed_block['attrs']['entranceAnimation']['effect']['value'] : '',
				'speed' => isset($parsed_block['attrs']['entranceAnimation']['speed']) ? $parsed_block['attrs']['entranceAnimation']['speed'] : '',
				'delay' => isset($parsed_block['attrs']['entranceAnimation']['delay']) ? $parsed_block['attrs']['entranceAnimation']['delay'] : '',
				'loop' => isset($parsed_block['attrs']['loopAnimation']) && $parsed_block['attrs']['loopAnimation'] === true ? "infinite" : "1",
				'direction' => isset($parent_block['attrs']['AnimationDirection']) ? $parent_block['attrs']['AnimationDirection'] : "normal",
			];
			$block_content->set_attribute('data-motion-effects', wp_json_encode($settings));
		}

		return $block_content;
	}
}
