<?php
/**
 * Alpha Business Startup: Block Patterns
 *
 * @since Alpha Business Startup 1.0
 */

function alpha_business_startup_register_block_patterns() {

	$patterns = array();

	$block_pattern_categories = array(
		'alpha-business-startup' => array( 'label' => __( 'Alpha Business Startup', 'alpha-business-startup' ) )
	);
	$block_pattern_categories = apply_filters( 'alpha_business_startup_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}
}
add_action( 'init', 'alpha_business_startup_register_block_patterns', 9 );