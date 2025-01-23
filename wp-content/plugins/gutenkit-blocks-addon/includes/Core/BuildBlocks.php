<?php
namespace Gutenkit\Core;

defined('ABSPATH') || exit;

/**
 * Block registrar.
 *
 * Call assosiated classes of every blocks.
 *
 * @since 1.0.0
 * @access public
 */
class BuildBlocks {

	/**
	 * Collection of default blocks.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private $blocks;

	/**
	 * The name of the option used to store the list of blocks in Gutenkit.
	 *
	 * @since 1.0.0
	 * @access private
	 * @var string
	 */
	private $option_name = 'gutenkit_blocks_list';

	/**
	 * Hold the block list.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 */
	public function __construct() {
		$this->blocks = \Gutenkit\Config\BlockList::instance()->get_list();

		$saved_blocks = get_option($this->option_name);

		if (!$saved_blocks || empty($saved_blocks)) {
			add_option($this->option_name, $this->blocks);
		} else {
			$differences = wp_parse_args($this->blocks, $saved_blocks);

			foreach ($saved_blocks as $key => $block) {
				if (!isset($this->blocks[$key])) {
					unset($differences[$key]);
				} else {
					$differences[$key]['status'] = isset($saved_blocks[$key]['status']) ? $saved_blocks[$key]['status'] : 'inactive';
				}
			}

			// check if $differences & $saved_blocks has no difference then return otherwise update option
			if (serialize($differences) === serialize($saved_blocks)) {
				return;
			} else {
				update_option($this->option_name, $differences);
			}
		}
	}
}