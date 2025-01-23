<?php
namespace Gutenkit\Core;

defined( 'ABSPATH' ) || exit;

/**
 * Module registrar.
 *
 * Call assosiated classes of every modules.
 *
 * @since 1.0.0
 * @access public
 */
class BuildModules {

	/**
	 * Collection of default modules.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private $modules;

	/**
	 * The name of the option used to store the list of modules in Gutenkit.
	 *
	 * @since 1.0.0
	 * @access private
	 * @var string
	 */
	private $option_name = 'gutenkit_modules_list';

	/**
	 * Hold the module list.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 */
	public function __construct() {
		$this->modules = \Gutenkit\Config\ModuleList::instance()->get_list();

		$saved_modules = get_option($this->option_name);

		if (!$saved_modules || empty($saved_modules)) {
			add_option($this->option_name, $this->modules);
		} else {
			$differences = wp_parse_args($this->modules, $saved_modules);

			foreach ($saved_modules as $key => $block) {
				if (!isset($this->modules[$key])) {
					unset($differences[$key]);
				} else {
					$differences[$key]['status'] = isset($saved_modules[$key]['status']) ? $saved_modules[$key]['status'] : 'inactive';
				}
			}

			// check if $differences & $saved_blocks has no difference then return otherwise update option
			if (serialize($differences) === serialize($saved_modules)) {
				return;
			} else {
				update_option($this->option_name, $differences);
			}
		}
	}
}