<?php

namespace Gutenkit\Config;

defined( 'ABSPATH' ) || exit;
class ModuleList extends \Gutenkit\Core\ConfigList {

	protected $type = 'modules';
	
	protected function set_required_list() {
		$this->required_list = array(
			'icon-pack' => array(
				'slug'          => 'icon-pack',
				'title'         => 'Icon Pack',
				'package'       => 'free',
				'auto_enqueue'  => true,
				'attributes'    => array( 'new' ),
			),
			'page-settings' => array(
				'slug'          => 'page-settings',
				'title'         => 'Page Settings',
				'package'       => 'free',
				'auto_enqueue'  => false,
				'attributes'    => array( 'new' ),
			),
			'breakpoints' => array(
				'slug'          => 'breakpoints',
				'title'         => 'Breakpoints',
				'package'       => 'free',
				'auto_enqueue'  => false,
				'attributes'    => array( 'new' ),
			),
		);
	}

	protected function set_optional_list() {
		$this->optional_list = apply_filters(
			'gutenkit/modules/list',
			array(
				'icon-pack' => array(
					'slug'			=> 'icon-pack',
					'title'			=> esc_html__('Icon Pack', 'gutenkit-blocks-addon'),
					'package'		=> 'free',
					'auto_enqueue'	=> true,
					'attributes'	=> array( 'new' ),
					'status'		=> 'active',
					'required'		=> true,
				),
				'copy-paste-style' => array(
					'slug'			=> 'copy-paste-style',
					'title'			=> esc_html__('Copy Paste Style', 'gutenkit-blocks-addon'),
					'package'		=> 'free',
					'auto_enqueue'	=> true,
					'status'		=> 'active',
				),
				'visibility' => array(
					'slug'			=> 'visibility',
					'title'			=> esc_html__('Visibility', 'gutenkit-blocks-addon'),
					'package'		=> 'free',
					'auto_enqueue'	=> true,
					'status'		=> 'active',
				),
				'page-settings' => array(
					'slug'			=> 'page-settings',
					'title'			=> esc_html__('Page Settings', 'gutenkit-blocks-addon'),
					'package'		=> 'free',
					'auto_enqueue'	=> false,
					'attributes'	=> array( 'new' ),
					'status'		=> 'active',
					'required'		=> true,
				),
				'scrolling-effects' => array(
					'slug'          => 'scrolling-effects',
					'title'         => esc_html__('Scrolling Effects (Parallax)', 'gutenkit-blocks-addon'),
					'package'       => 'pro',
					'auto_enqueue'  => true,
					'attributes'    => array( 'new' ),
					'status'        => 'active',
				),
				'glass-morphism' => array(
					'slug'			=> 'glass-morphism',
					'title'			=> esc_html__('Glass Morphism', 'gutenkit-blocks-addon'),
					'package'		=> 'pro',
					'auto_enqueue'	=> true,
					'attributes'	=> array( 'new' ),
					'status'		=> 'active',
				),
				'css-transform' => array(
					'slug'			=> 'css-transform',
					'title'			=> esc_html__('CSS Transform', 'gutenkit-blocks-addon'),
					'package'		=> 'pro',
					'auto_enqueue'	=> true,
					'attributes'	=> array( 'new' ),
					'status'		=> 'active',
				),
				'advanced-tooltip' => array(
					'slug'			=> 'advanced-tooltip',
					'title'			=> esc_html__('Advanced Tooltip', 'gutenkit-blocks-addon'),
					'package'		=> 'pro',
					'auto_enqueue'	=> true,
					'attributes'	=> array( 'new' ),
					'status'		=> 'active',
				),
				'one-page-scroll' => array(
					'slug'			=> 'one-page-scroll',
					'title'			=> esc_html__('One Page Scroll', 'gutenkit-blocks-addon'),
					'package'		=> 'pro',
					'auto_enqueue'	=> true,
					'attributes'	=> array( 'new' ),
					'status'		=> 'active',
				),
				'dynamic-content' => array(
					'slug'			=> 'dynamic-content',
					'title'			=> esc_html__('Dynamic Content', 'gutenkit-blocks-addon'),
					'package'		=> 'pro',
					'auto_enqueue'	=> true,
					'attributes'	=> array( 'new' ),
					'status'		=> 'inactive',
					'badge'			=> ['new', 'beta'],
				),
				'sticky' => array(
					'slug'			=> 'sticky',
					'title'			=> esc_html__('Sticky', 'gutenkit-blocks-addon'),
					'package'		=> 'pro',
					'auto_enqueue'	=> true,
					'attributes'	=> array( 'new' ),
					'status'		=> 'active',
				),
				'entrance-animation' => array(
					'slug'			=> 'entrance-animation',
					'title'			=> esc_html__('Entrance Animation', 'gutenkit-blocks-addon'),
					'package'		=> 'free',
					'auto_enqueue'	=> true,
					'attributes'	=> array( 'new' ),
					'status'		=> 'active',
				),
				'mouse-tilt' => array(
					'slug'			=> 'mouse-tilt',
					'title'			=> esc_html__('Mouse Tilt', 'gutenkit-blocks-addon'),
					'package'		=> 'pro',
					'auto_enqueue'	=> true,
					'attributes'	=> array( 'new' ),
					'status'		=> 'active',
				),
				'mouse-track' => array(
					'slug'			=> 'mouse-track',
					'title'			=> esc_html__('Mouse Track', 'gutenkit-blocks-addon'),
					'package'		=> 'pro',
					'auto_enqueue'	=> true,
					'attributes'	=> array( 'new' ),
					'status'		=> 'active',
				),
				'masking' => array(
					'slug'			=> 'masking',
					'title'			=> esc_html__('Masking', 'gutenkit-blocks-addon'),
					'package'		=> 'pro',
					'auto_enqueue'	=> true,
					'attributes'	=> array( 'new' ),
					'status'		=> 'active',
					'badge'			=> ['new'],
				),
				'custom-css' => array(
					'slug'			=> 'custom-css',
					'title'			=> esc_html__('Custom CSS', 'gutenkit-blocks-addon'),
					'package'		=> 'pro',
					'auto_enqueue'	=> true,
					'attributes'	=> array( 'new' ),
					'status'		=> 'active',
					'badge'			=> ['new'],
				),
				'display-conditions' => array(
					'slug'			=> 'display-conditions',
					'title'			=> 'Display Conditions',
					'package'		=> 'pro',
					'auto_enqueue'	=> true,
					'attributes'	=> array( 'new' ),
					'status'		=> 'active',
					'badge'			=> ['new'],
				),
				'smooth-scroll' => array(
					'slug'			=> 'smooth-scroll',
					'title'			=> esc_html__('Smooth Scroll', 'gutenkit-blocks-addon'),
					'package'		=> 'pro',
					'auto_enqueue'	=> true,
					'attributes'	=> array( 'new' ),
					'status'		=> 'active',
					'badge'			=> ['new'],
				),
				'interactions' => array(
					'slug'			=> 'interactions',
					'title'			=> esc_html__('Interactions', 'gutenkit-blocks-addon'),
					'package'		=> 'pro',
					'auto_enqueue'	=> false,
					'attributes'	=> array( 'new' ),
					'status'		=> 'active',
					'badge'			=> ['new'],
				),
				'breakpoints' => array(
					'slug'			=> 'breakpoints',
					'title'			=> 'Breakpoints',
					'package'		=> 'free',
					'auto_enqueue'	=> false,
					'attributes'	=> array( 'new' ),
					'status'		=> 'inactive',
					'badge'			=> ['new', 'beta'],
				),
				'particle' => array(
					'slug'			=> 'particle',
					'title'			=> 'Particle',
					'package'		=> 'pro',
					'auto_enqueue'	=> false,
					'attributes'	=> array( 'new' ),
					'status'		=> 'inactive',
					'badge'			=> ['new'],
				),
			)
		);
	}
}
