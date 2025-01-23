<?php

namespace Gutenkit\Traits;

/**
 * Trait for making singleton instance
 * This is a factory singleton
 *
 * @package Gutenkit\Traits
 */
trait Singleton {
	/**
	 * The Singleton's instance is stored in a static field. This field is an
	 * array, because we'll allow our Singleton to have subclasses. Each item in
	 * this array will be an instance of a specific Singleton's subclass. You'll
	 * see how this works in a moment.
	 */
	private static $instances = array();

	/**
	 * This is the static method that controls the access to the singleton
	 * instance. On the first run, it creates a singleton object and places it
	 * into the static field. On subsequent runs, it returns the client existing
	 * object stored in the static field.
	 *
	 * This implementation lets you subclass the Singleton class while keeping
	 * just one instance of each subclass around.
	 *
	 * @return object
	 * @since 1.0.0
	 */
	public static function instance() {
		$class = get_called_class();
		if ( ! isset( self::$instances[$class] ) ) {
			self::$instances[$class] = new $class();
		}
		return self::$instances[$class];
	}
}
