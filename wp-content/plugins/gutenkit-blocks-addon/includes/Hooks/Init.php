<?php
namespace Gutenkit\Hooks;

defined( 'ABSPATH' ) || exit;

/**
 * Enqueue registrar.
 *
 * @since 1.0.0
 * @access public
 */
class Init {

	use \Gutenkit\Traits\Singleton;

	/**
	 * class constructor.
	 * private for singleton
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function __construct() {
		// Third Party Compatibility
		\Gutenkit\Hooks\ThirdPartyCompatibility::instance();

		// Module Hooks
		\Gutenkit\Hooks\PageSettings::instance();
		\Gutenkit\Hooks\EntranceAnimation::instance();
		\Gutenkit\Hooks\Visibility::instance();
		\Gutenkit\Hooks\ImageOptimizer::instance();
	}
}
