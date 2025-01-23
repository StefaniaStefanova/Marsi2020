<?php
namespace Gutenkit\Core;

defined('ABSPATH') || exit;

class BuildSettings {

	/**
	 * Collection of default widgets.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private $settings;

	/**
	 * The name of the option used to store the list of blocks in Gutenkit.
	 *
	 * @since 1.0.0
	 * @access private
	 * @var string
	 */
	private $option_name = 'gutenkit_settings_list';

	public function __construct() {
		$this->settings = \Gutenkit\Config\SettingsList::instance()->get_list();

		$saved_settings = get_option($this->option_name);

		if (!$saved_settings || empty($saved_settings)) {
			add_option($this->option_name, $this->settings);
		} else {
			$differences = wp_parse_args($this->settings, $saved_settings);
			foreach ($saved_settings as $key => $block) {
				if (!isset($this->settings[$key])) {
					unset($differences[$key]);
				} else {
					// ignore api-integration category for update status
					if(isset($block['category']) && $block['category'] != 'api-integration') {
						$differences[$key]['status'] = isset($saved_settings[$key]['status']) ? $saved_settings[$key]['status'] : 'inactive';
					}

					// check if fields are exists then update the value
					$fields = isset($saved_settings[$key]['fields']) ? $saved_settings[$key]['fields'] : array();
					if($fields) {
						foreach ($fields as $field_key => $field) {
							if (!isset($this->settings[$key]['fields'][$field_key])) {
								unset($differences[$key]['fields'][$field_key]);
							} else {
								$differences[$key]['fields'][$field_key]['value'] = isset($saved_settings[$key]['fields'][$field_key]['value']) ? $saved_settings[$key]['fields'][$field_key]['value'] : '';
							}
						}
					}

					// check if value are exists then update the value
					$value = isset($saved_settings[$key]['value']) ? $saved_settings[$key]['value'] : '';
					if($value) {
						if(is_array($value)) {
							foreach ($value as $value_key => $v) {
								if (!isset($this->settings[$key]['value'][$value_key])) {
									unset($differences[$key]['value'][$value_key]);
								} else {
									$differences[$key]['value'][$value_key] = isset($saved_settings[$key]['value'][$value_key]) ? $saved_settings[$key]['value'][$value_key] : '';
								}
							}
						} else {
							if (!isset($this->settings[$key]['value'])) {
								unset($differences[$key]['value']);
							} else {
								$differences[$key]['value'] = isset($saved_settings[$key]['value']) ? $saved_settings[$key]['value'] : '';
							}
						}
					}
				}
			}

			// check if $differences & $saved_blocks has no difference then return otherwise update option
			if (serialize($differences) === serialize($saved_settings)) {
				return;
			} else {
				update_option($this->option_name, $differences);
			}
		}
	}
}