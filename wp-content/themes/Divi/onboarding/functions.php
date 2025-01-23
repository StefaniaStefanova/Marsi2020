<?php
/**
 * Onboarding functions.php file.
 *
 * @package Divi
 * @subpackage onboarding
 *
 * @since ??
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Trigger redirect to onboarding page after theme activation.
 *
 * @return void
 */
function et_onboarding_trigger_redirect() {
	if ( ! class_exists( 'ET_Onboarding' ) ) {
		// ET_BUILDER_PLUGIN_DIR is defined in DBP.
		$path = defined( 'ET_BUILDER_PLUGIN_ACTIVE' ) ? ET_BUILDER_PLUGIN_DIR : get_template_directory();
		require_once $path . '/onboarding/onboarding.php';
	}

	ET_Onboarding::redirect_to_onboarding_page();
}

add_action(
	'after_switch_theme',
	'et_onboarding_trigger_redirect'
);
