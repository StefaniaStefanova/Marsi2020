<?php
namespace Gutenkit\Hooks;

defined( 'ABSPATH' ) || exit;

use Gutenkit\Helpers\Utils;

class Visibility {

	use \Gutenkit\Traits\Singleton;

	/**
	 * class constructor.
	 * private for singleton
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function __construct() {
		if(!is_admin()) {
			add_filter("gutenkit/collected_css", function($block) {
				$block = $this->add_gutenkit_block_visibility( $block );
				return $block;
			}, 10);
		}
	}

	public function add_gutenkit_block_visibility($block) {
		if (!isset($block['blockName']) || !strstr($block['blockName'], 'gutenkit')) {
			return $block;
		}
		
		$attributes = $block['attrs'];
		$module_css = [];

		$hide_devices = [
			'desktop' => 'commonBlockHideDesktop',
			'tablet' => 'commonBlockHideTablet',
			'mobile' => 'commonBlockHideMobile',
			'tabletlandscape' => 'commonBlockHideTabletLandscape',
			'mobilelandscape' => 'commonBlockHideMobileLandscape',
			'laptop' => 'commonBlockHideLaptop',
			'widescreen' => 'commonBlockHideWideScreen',
		];
		foreach ($hide_devices as $device => $key) {
			if (!empty($attributes[$key])) {
				$module_css[$device] = ".gutenkit-frontend :where(.{$block['attrs']['blockClass']}) { display: none; }";
			}
		}

		$device_list = Utils::get_device_list() ?? [];
		$mediaQueries = $this->make_media_query_string($device_list) ?? [];

		$css_content = [];
		foreach ($device_list as $device) {
			$device = strtolower($device['slug']);
			if (empty($css_content[$device])) {
				$css_content[$device] = "";
			}
			
			if (!empty($module_css[$device])) {
				$css_content[$device] .= $module_css[$device];
			}
		}

		// Initialize the result CSS string
		$cssString = '';

		// Loop through the commonStyle array
		foreach ($css_content as $device => $cssRule) {
			// If there is a CSS rule defined, wrap it with the appropriate media query
			if (!empty($cssRule) && isset($mediaQueries[$device])) {
				$cssString .= $mediaQueries[$device] . " {\n" . $cssRule . "\n}\n";
			}
		}

		if (!isset($block['attrs']['blocksCSS']['customStyles'])) {
			$block['attrs']['blocksCSS']['customStyles'] = '';
		}

		if(!empty($cssString)){
			$block['attrs']['blocksCSS']['customStyles'] .= $cssString;
		}
		
		return $block;
	}

	/**
	 * Creates an array of media queries based on the given device list.
	 * @param array $device_list The list of devices to create media queries for.
	 * @return array The array of media queries.
	 */
	public function make_media_query_string($device_list){
		$isWideScreen = false;
		$hasWideScreen = array_filter($device_list, function($item) {
			return $item['slug'] === 'WideScreen';
		});
		if(!empty($hasWideScreen)) { $isWideScreen = true; }
		

		$mediaQueries = [];
		


		// creating an array of media queries
		//example of array element: [desktop] => @media (min-width: 1367px) and (max-width: 2399px)
		foreach ($device_list as $key => $device) {
			// Handle the "WideScreen" case with only min-width
			if ($device['slug'] === 'WideScreen') {
				$mediaQueries[strtolower($device['slug'])] = "@media (min-width: {$device['value']}px)";
				continue;
			}
			// Handle the "Desktop" case with dynamic min-width and max-width
			if ($device['value'] == 'base') {
				$minWidth = null;
				$maxWidth = null;

				// Find min and max width for desktop if widescreen is enabled
				foreach ($device_list as $i => $bp) {
					if ($isWideScreen == true && $bp['slug'] === 'WideScreen') {
						$maxWidth = $bp['value'];
						$minWidth = isset($device_list[$i + 1]) ? $device_list[$i + 1]['value'] : null;
					}
				}

				// Find min width for desktop if widescreen is disabled
				if($isWideScreen == false) {
					$minWidth = isset($device_list[$key + 1]) ? $device_list[$key + 1]['value'] : null;
				}
				
				//creating the media query for desktop
				if ($isWideScreen == true) {
					$mediaQueries[strtolower($device['slug'])] = "@media (min-width: " . ($minWidth + 1) . "px) and (max-width: " . ($maxWidth - 1) ."px)";
				} else {
					$mediaQueries[strtolower($device['slug'])] = "@media (min-width: " . ($minWidth + 1) . "px)";
				}
			} else {
				// Other breakpoints: dynamically get min-width and max-width based on previous and next device
				$minWidth = isset($device_list[$key + 1]) ? $device_list[$key + 1]['value'] : null;
				$maxWidth = $device['value'];
		
				if ($minWidth) {
					$mediaQueries[strtolower($device['slug'])] = "@media (min-width: " . ($minWidth + 1) . "px) and (max-width: {$maxWidth}px)";
				} else {
					$mediaQueries[strtolower($device['slug'])] = "@media (max-width: {$maxWidth}px)";
				}
			}
		}

		return $mediaQueries;
	}
}
