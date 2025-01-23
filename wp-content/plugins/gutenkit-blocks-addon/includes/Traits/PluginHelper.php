<?php

namespace Gutenkit\Traits;

/**
 * Trait for making singleton instance
 * This is a factory singleton
 *
 * @package Gutenkit\Traits
 */
trait PluginHelper{
    public static function is_plugin_active( $plugin ) {
		return in_array( $plugin, (array) get_option( 'active_plugins', array() ), true ) || self::is_plugin_active_for_network( $plugin );
	}

    /**
     * Check for network plugin active
     */
	public static function is_plugin_active_for_network( $plugin ) {
		if ( ! is_multisite() ) {
			return false;
		}
	
		$plugins = get_site_option( 'active_sitewide_plugins' );
		if ( isset( $plugins[ $plugin ] ) ) {
			return true;
		}
	
		return false;
	}
}