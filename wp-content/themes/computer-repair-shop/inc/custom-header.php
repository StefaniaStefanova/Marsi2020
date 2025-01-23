<?php
/**
 * Custom header implementation
 */

function computer_repair_shop_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'computer_repair_shop_custom_header_args', array(
		'default-text-color' => 'fff',
		'header-text' 	     =>	false,
		'width'              => 1200,
		'height'             => 100,
		'flex-width'         => true,
		'flex-height'        => true,
		'wp-head-callback'   => 'computer_repair_shop_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'computer_repair_shop_custom_header_setup' );

if ( ! function_exists( 'computer_repair_shop_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see computer_repair_shop_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'computer_repair_shop_header_style' );
function computer_repair_shop_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .topbar {
			background-image:url('".esc_url(get_header_image())."');
			background-position: bottom center;
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'computer-repair-shop-basic-style', $custom_css );
	endif;
}
endif; // computer_repair_shop_header_style