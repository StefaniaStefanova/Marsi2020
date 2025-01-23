<?php

namespace Gutenkit\Helpers;

defined( 'ABSPATH' ) || exit;

/**
 * Global helper class.
 *
 * @since 1.0.0
 */

class Utils {

	/**
	 * Returns an array of allowed HTML tags and attributes for SVG elements.
	 *
	 * @return array The array of allowed HTML tags and attributes.
	 */
	public static function svg_allowed_html() {
		$allowed_svg_tags = [
			'svg' => [
				'xmlns' => true,
				'width' => true,
				'height' => true,
				'viewBox' => true,
				'viewbox' => true,
				'fill' => true,
				'class' => true,
				'aria-hidden'     => true,
				'aria-labelledby' => true,
				'role'            => true,
				'preserveaspectratio' => true,
				'version'         => true,
			],
			'title'         => array( 'title' => true ),
			'g' => [
				'transform' => true,
				'style' => true,
				'id' => true,
			],
			'path' => [
				'd' => true,
				'fill' => true,
				'fill-rule' => true,
				'transform' => true,
				'style' => true,
				'opacity' => true,
				'stroke' => true,
				'stroke-width' => true,
				'stroke-miterlimit' => true,
				'stroke-linecap' => true,
				'stroke-linejoin' => true,
				'fill-opacity' => true,
			],
			'circle' => [
				'cx' => true,
				'cy' => true,
				'r' => true,
				'fill' => true,
				'stroke' => true,
				'stroke-width' => true,
			],
			'ellipse' => [
				'cx' => true,
				'cy' => true,
				'rx' => true,
				'ry' => true,
				'fill' => true,
				'stroke' => true,
				'stroke-width' => true,
			],
			'line' => [
				'x1' => true,
				'y1' => true,
				'x2' => true,
				'y2' => true,
				'stroke' => true,
				'stroke-width' => true,
			],
			'polygon' => [
				'points' => true,
				'fill' => true,
				'stroke' => true,
				'stroke-width' => true,
			],
			'polyline' => [
				'points' => true,
				'fill' => true,
				'stroke' => true,
				'stroke-width' => true,
			],
			'rect' => [
				'x' => true,
				'y' => true,
				'width' => true,
				'height' => true,
				'fill' => true,
				'stroke' => true,
				'stroke-width' => true,
			],
			'text' => [
				'x' => true,
				'y' => true,
				'dx' => true,
				'dy' => true,
				'text-anchor' => true,
				'style' => true,
			],
			'tspan' => [
				'x' => true,
				'y' => true,
				'dx' => true,
				'dy' => true,
				'text-anchor' => true,
				'style' => true,
			],
			'defs' => [],
			'lineargradient' => [
				'id' => true,
				'x1' => true,
				'y1' => true,
				'x2' => true,
				'y2' => true,
				'gradientunits' => true,
			],
			'stop' => [
				'offset' => true,
				'style' => true,
				'stop-color' => true,
				'stop-opacity' => true,
			],
			'radialgradient' => [
				'id' => true,
				'cx' => true,
				'cy' => true,
				'r' => true,
				'gradientunits' => true,
				'gradienttransform' => true,
			],
		];

		return apply_filters( 'gutenkit_allowed_svg_attrs_tags', $allowed_svg_tags );
	}

	/**
	 * Returns an array of allowed JSON attribute tags.
	 *
	 * This function defines an array of allowed JSON attribute tags and their corresponding properties.
	 * The array includes tags such as 'object', 'array', 'string', 'number', 'integer', 'boolean', 'null',
	 * 'enum', 'const', 'oneOf', 'allOf', 'anyOf', 'not', 'if', 'then', 'else', and 'format'.
	 *
	 * @return array The array of allowed JSON attribute tags.
	 */
	public static function allowed_json_attrs_tags() {
		$allowed_json_tags = [
			'object' => [
				'type' => true,
				'properties' => true,
				'required' => true,
				'additionalProperties' => true,
				'propertyNames' => true,
				'dependencies' => true,
				'minProperties' => true,
				'maxProperties' => true,
			],
			'array' => [
				'type' => true,
				'items' => true,
				'minItems' => true,
				'maxItems' => true,
				'uniqueItems' => true,
			],
			'string' => [
				'type' => true,
				'minLength' => true,
				'maxLength' => true,
				'pattern' => true,
				'format' => true,
				'contentEncoding' => true,
				'contentMediaType' => true,
			],
			'number' => [
				'type' => true,
				'minimum' => true,
				'maximum' => true,
				'exclusiveMinimum' => true,
				'exclusiveMaximum' => true,
				'multipleOf' => true,
			],
			'integer' => [
				'type' => true,
				'minimum' => true,
				'maximum' => true,
				'exclusiveMinimum' => true,
				'exclusiveMaximum' => true,
			],
			'boolean' => [
				'type' => true,
			],
			'null' => [
				'type' => true,
			],
			'enum' => [
				'type' => true,
				'enum' => true,
			],
			'const' => [
				'type' => true,
				'const' => true,
			],
			'oneOf' => [
				'type' => true,
				'oneOf' => true,
			],
			'allOf' => [
				'type' => true,
				'allOf' => true,
			],
			'anyOf' => [
				'type' => true,
				'anyOf' => true,
			],
			'not' => [
				'type' => true,
				'not' => true,
			],
			'if' => [
				'type' => true,
				'if' => true,
			],
			'then' => [
				'type' => true,
				'then' => true,
			],
			'else' => [
				'type' => true,
				'else' => true,
			],
			'format' => [
				'type' => true,
				'format' => true,
			],
			'title' => true,
			'description' => true,
			'default' => true,
			'examples' => true,
			'$ref' => true,
			'$id' => true,
			'$schema' => true,
			// Adding Lottie-specific keys
			'v' => true,
			'meta' => true,
			'fr' => true,
			'ip' => true,
			'op' => true,
			'w' => true,
			'h' => true,
			'nm' => true,
			'ddd' => true,
			'assets' => true,
			'layers' => true,
			'markers' => true,
			// Particle Module specific keys
			'autoPlay' => true,
			'background' => true,
			'backgroundMask' => true,
			'clear' => true,
			'defaultThemes' => true,
			'delay' => true,
			'fullScreen' => true,
			'detectRetina' => true,
			'duration' => true,
			'fpsLimit' => true,
			'interactivity' => true,
			'manualParticles' => true,
			'particles' => true,
			'pauseOnBlur' => true,
			'pauseOnOutsideViewport' => true,
			'responsive' => true,
			'smooth' => true,
			'style' => true,
			'themes' => true,
			'zLayers' => true,
			'name' => true,
			'emitters' => true,
			'motion' => true
		];
	
		return apply_filters('gutenkit_allowed_json_attrs_tags', $allowed_json_tags);
	}

	public static function iframe_allowed_html() {
		return array(
			'iframe' => array(
				'src' => true,
				'name' => true,
				'sandbox' => true,
				'width' => true,
				'height' => true,
				'marginheight' => true,
				'marginwidth' => true,
				'scrolling' => true,
				'allowfullscreen' => true,
				'frameborder' => true,
				'title' => true,
				'id' => true,
				'class' => true,
				'style' => true,
				'tabindex' => true,
				'allow' => true,
			),
		);
	}

	public static function gdc_allowed_html()
	{
		return array(
			'gdc' => array(
				'selectedpath' => true,
				'class' => true,
				'id' => true,
				'fallback' => true,
				'postcustomfield' => true,
				'postcustomfieldkey' => true,
				'postdatetype' => true,
				'dateformat' => true,
				'customdateformat' => true,
				'excerptlength' => true,
				'tagindex' => true,
				'timetype' => true,
				'timeformat' => true,
				'customtimeformat' => true,
				'categoryindex' => true,
				'nocomment' => true,
				'singlecomment' => true,
				'multicomments' => true,
				'currentdateformat' => true,
				'customcurrentdateformat' => true,
				'currenttimeformat' => true,
				'customcurrenttimeformat' => true,
				'authorinfo' => true,
				'currentuserinfo' => true,
				'acfgroup' => true,
				'acffield' => true,
			),
		);
	}

	

	/**
	 * Returns the allowed HTML tags and attributes for the img element.
	 *
	 * @return array The allowed HTML tags and attributes.
	 */
	public static function img_allowed_html() {
		return array(
			'img' => array(
				'alt' => true,
				'src' => true,
				'srcset' => true,
				'class' => true,
				'height' => true,
				'width' => true,
			)
		);
	}

	/**
	 * Returns the allowed HTML tags and attributes for the style element.
	 *
	 * @return array The allowed HTML tags and attributes.
	 */
	public static function style_allowed_html() {
		return array(
			'style' => array(
				'class' => true,
				'id' => true,
			)
		);
	}

	public static function get_device_list()
	{
		$default_device_list = [
			[
				'label' => 'Desktop',
				'slug' => 'Desktop',
				'value' => 'base',
				'direction' => 'max',
				'isActive' => true,
				'isRequired' => true,
			],
			[
				'label' => 'Tablet',
				'slug' => 'Tablet',
				'value' => '1024',
				'direction' => 'max',
				'isActive' => true,
				'isRequired' => true,
			],
			[
				'label' => 'Mobile',
				'slug' => 'Mobile',
				'value' => '767',
				'direction' => 'max',
				'isActive' => true,
				'isRequired' => true,
			]
		];

		$active_modules = \Gutenkit\Config\Modules::get_active_modules_list();
		if ( ! empty( $active_modules['breakpoints'] ) ) {
			$custom_breakpoints = get_option( 'gutenkitBreakpoints' );
			if($custom_breakpoints) {
				$custom_breakpoints = json_decode($custom_breakpoints, true);
				$custom_breakpoints = array_filter($custom_breakpoints, function($device) {
					return !empty($device['isActive']);
				});
				usort($custom_breakpoints, function($a, $b) {
					return (int)$b['value'] - (int)$a['value'];
				});
				return array_merge( [$default_device_list[0]], $custom_breakpoints );
			} else {
				return $default_device_list;
			}
		}

		return $default_device_list;
	}

	/**
	 * Adds class to SVG
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public static function add_class_to_svg( $svg ) {
		$originalString = $svg;
		$substringToAdd = "class='gkit-icon' ";
	
		$position = strpos( $originalString, '<svg' );
		
		if ( $position !== false ) {
			$svg = substr_replace( $originalString, $substringToAdd, $position + 5, 0 );
			return $svg;
		}
	
		return $svg;
	}

	/**
	 * Retrieves the dynamic block wrapper attributes.
	 *
	 * This function retrieves the wrapper attributes for a dynamic block.
	 * It checks if the function "get_block_wrapper_attributes" exists and if the block is not empty.
	 * If both conditions are met, it retrieves the block attributes, including the block ID.
	 * It then merges the required attributes with any extra attributes provided.
	 * Finally, it applies the "gutenkit/dynamic_block_wrapper_attributes" filter and returns the wrapper attributes.
	 *
	 * @param object $block The dynamic block object.
	 * @param array $extra_attrs Additional attributes to be merged with the required attributes.
	 * @return string The wrapper attributes for the dynamic block.
	 */
	public static function get_dynamic_block_wrapper_attributes($block, $extra_attrs = array()) {
		if(function_exists("get_block_wrapper_attributes") && !empty($block)) {
			$block_attrs = $block->attributes;
			$block_id = $block_attrs['blockID'];
			$required_attrs = array(
				'id' => 'block-' . $block_id
			);
			$wrapper_attrs = apply_filters('gutenkit/dynamic_block_wrapper_attributes', array_merge($required_attrs, $extra_attrs), $block);
			return get_block_wrapper_attributes($wrapper_attrs);
		}
	}
	
	/**
	 * Extends the allowed HTML tags for post content.
	 *
	 * @return array The extended array of allowed HTML tags.
	 */
	public static function post_kses_extend_allowed_html() {
		$default_post_allowed_html = wp_kses_allowed_html( 'post' );

		$post_allowed_html = array_merge( $default_post_allowed_html, self::svg_allowed_html(), self::iframe_allowed_html(), self::gdc_allowed_html(), self::style_allowed_html() );

		return $post_allowed_html;
	}

	/**
	 * Retrieves the settings from the specified key in the options table.
	 *
	 * @param string $key The key of the settings in the options table.
	 * @param string $list Optional. The specific list within the settings to retrieve.
	 * @param string $option Optional. The specific option within the list to retrieve.
	 * @return mixed The retrieved settings, or false if the list or option is not found.
	 */
	public static function get_settings($key = '', $field = 'status', $inner_field = '' ) {
		$settings = get_option( 'gutenkit_settings_list' );

		// check if $key & $field both empty
		if ( empty($key) && empty($field) ) {
			return $settings;
		}
	
		// check for primary key
		if ( !empty($key) && !empty($settings[$key]) ) {
			$settings = $settings[$key];
		}

		// check for primary field
		if( !empty($field) ) {
			if( $field === 'status' && !empty($settings[$field]) ) {
				return ($settings[$field] === 'active') ? true : false;
			} else {
				$settings = !empty($settings[$field]) ? $settings[$field] : false;
			}
		}

		// check for inner field
		if( !empty($inner_field) ) {
			if( isset($settings[$inner_field]['value']) ) {
				$settings = $settings[$inner_field]['value'];
			} else {
				$settings = !empty($settings[$inner_field]) ? $settings[$inner_field] : false;
			}
		}
	
		return $settings;
	}


	/**
	 * Returns an array representing the border value based on the given key.
	 *
	 * @param mixed $key The key used to determine the border value.
	 * @return array An array representing the border value. The array contains the following keys:
	 *               - 'border': The border value, or null if the key is null.
	 */
	public static function get_border_value($key) {
	
		
		if (!is_array($key)) {
			return ['border' => null];
		}
	
		$keyLength = count($key);


		if ($keyLength < 3) {
			$properties = ['style', 'color', 'width'];
			$borderParts = [];
		
			foreach ($properties as $property) {
				if (isset($key[$property])) {
					$borderParts[] = $key[$property];
				}
			}

			
			return ['border' => implode(' ', $borderParts)];
			
		}
		
	
		if ($keyLength === 3) {
			if (isset($key['style'])) {
				return ['border' => "{$key['width']} {$key['style']} {$key['color']}"];
			}
		}
	
		if ($keyLength === 4 || $keyLength === 3) {
			$border = [];
			foreach ($key as $direction => $value) {
				if (isset($value['style'])) {
					$border["border-{$direction}"] = "{$value['width']} {$value['style']} {$value['color']}";
				}
			}
			return $border;
		}
	}

	/**
	 * get box value
	 * 
	 * Similar to getBoxValue in gutenkit js helper
	 * @param array $key
	 * @param string $property
	 */

	public static function get_box_value($key = [], $property = "") {
		$top = isset($key['top']) ? $key['top'] : null;
		$right = isset($key['right']) ? $key['right'] : null;
		$bottom = isset($key['bottom']) ? $key['bottom'] : null;
		$left = isset($key['left']) ? $key['left'] : null;

		$boxObject = ['top' => $top, 'right' => $right, 'bottom' => $bottom, 'left' => $left];
		$count = count(array_filter($boxObject, function ($value) {
			return $value !== null;
		}));

		if ($count === 0) return [$property => null];

		if ($count === 4) {
			$boxValues = '';

			if ($top === $bottom && $top === $right && $top === $left) {
				$boxValues = $top;
			} elseif ($top === $bottom && $left === $right) {
				$boxValues = "{$top} {$right}";
			} else {
				$boxValues = "{$top} {$right} {$bottom} {$left}";
			}

			return [$property => $boxValues];
		}

		$finalBox = [];

		if ($property !== "border-radius") {
			foreach ($boxObject as $direction => $value) {
				$finalBox["{$property}-{$direction}"] = isset($key[$direction]) ? $key[$direction] : null;
			}

			return $finalBox;
		}

		if ($property === "border-radius") {
			$finalBox["border-top-left-radius"] = $top;
			$finalBox["border-top-right-radius"] = $right;
			$finalBox["border-bottom-right-radius"] = $bottom;
			$finalBox["border-bottom-left-radius"] = $left;

			return $finalBox;
		}
	}

	/**
	 * Retrieves the color based on the given type and color.
	 *
	 * @param string $type The type of color to retrieve. Can be either 'gradient' or 'color'.
	 * @param string $color The color value.
	 * @return string The retrieved color.
	 */
	public static function get_color($type, $color) {

		if (empty($color) || strpos($color, "linear-gradient(") === 0 || strpos($color, "radial-gradient(") === 0 || strpos($color, '#') === 0) {
			return $color;
		}
		
		$color_parts = explode(',', $color, 2);
		

		$color_parts1 = $color_parts[0];
		$color_parts2 = $color_parts[1];

		$bg_color = "";

		if($type == 'gradient'){
			$bg_color = "var(--wp--preset--gradient--".$color_parts1.",".$color_parts2.")";
			
		} else {
			$bg_color = "var(--wp--preset--color--".$color_parts1.",". $color_parts2.")";
		}
		return $bg_color;
	}

	/**
	 * fill_background_generator
	 * 
	 * Similar to fillBackgroundGenerator in gutenkit js helper
	 * 
	 * @param array $background
	 * @param string $device
	 */

	public static function fill_background_generator($background, $device = "Desktop") {
		
		$fillBackground = [
			'background-image' => '',
		];

		if (isset($background['backgroundType']) && $background['backgroundType'] === 'classic') {
			$fillBackground['background-color'] =  isset($background['backgroundColor']) ? self::get_color('color', $background['backgroundColor']) : '';
		}

		if (isset($background['backgroundType']) && $background['backgroundType'] === 'gradient' && !empty($background['gradient'])) {
			
			$fillBackground['background-image'] =  isset($background['gradient']) ? (self::get_color('gradient',$background['gradient']) ?? '') : '';
		}

		if (isset($background['backgroundType']) && $background['backgroundType'] === 'image' && !empty($background['backgroundImage'])) {
			if (!empty($background['backgroundImage']['imageUrl'])) {
				$fillBackground['background-image'] = "url({$background['backgroundImage']['imageUrl']})";
			}

			if (!empty($background['backgroundAttachment'])) {
				$fillBackground['background-attachment'] = $background['backgroundAttachment'];
			}

			if (!empty($background['backgroundPosition'][$device]) && $background['backgroundPosition'][$device] !== "custom") {
				$fillBackground['background-position'] = $background['backgroundPosition'][$device];
			}

			if (
				!empty($background['backgroundPosition'][$device]) && $background['backgroundPosition'][$device] === "custom" &&
				!empty($background['customPositionX'][$device]) && !empty($background['customPositionY'][$device])
			) {
				$fillBackground['background-position'] = self::get_slider_value($background['customPositionX'][$device]) . ' ' . self::get_slider_value($background['customPositionY'][$device]);
			}

			if (!empty($background['backgroundSize']) && $background['backgroundSize'] !== "custom") {
				$fillBackground['background-size'] = $background['backgroundSize'];
			}

			if (
				!empty($background['backgroundSize']) && $background['backgroundSize'] === "custom" &&
				!empty($background['customSize'][$device])
			) {
				$fillBackground['background-size'] = self::get_slider_value($background['customSize'][$device]) . ' auto';
			}

			if (!empty($background['backgroundRepeat'])) {
				$fillBackground['background-repeat'] = $background['backgroundRepeat'];
			}
		}

		return $fillBackground;
	}

	/**
	 * get_typography_value
	 * 
	 * Similar to getTypographyValue in gutenkit js helper
	 */
	public static function get_typography_value($key, $device) {
		if ($device === 'Desktop') {
			return [
				'font-family' => isset($key['fontFamily']['value']) ? $key['fontFamily']['value'] : null,
				'font-size' => isset($key['fontSize'][$device]['size']) && isset($key['fontSize'][$device]['unit']) 
					? $key['fontSize'][$device]['size'] . $key['fontSize'][$device]['unit'] 
					: null,
				'font-style' => isset($key['fontStyle']) ? $key['fontStyle'] : null,
				'font-weight' => isset($key['fontWeight']['value']) ? $key['fontWeight']['value'] : null,
				'text-decoration' => isset($key['textDecoration']) ? $key['textDecoration'] : null,
				'text-transform' => isset($key['textTransform']) ? $key['textTransform'] : null,
				'line-height' => isset($key['lineHeight'][$device]['size']) && isset($key['lineHeight'][$device]['unit']) 
					? $key['lineHeight'][$device]['size'] . $key['lineHeight'][$device]['unit'] 
					: null,
				'letter-spacing' => isset($key['letterSpacing'][$device]['size']) && isset($key['letterSpacing'][$device]['unit']) 
					? $key['letterSpacing'][$device]['size'] . $key['letterSpacing'][$device]['unit'] 
					: null,
				'word-spacing' => isset($key['wordSpacing'][$device]['size']) && isset($key['wordSpacing'][$device]['unit']) 
					? $key['wordSpacing'][$device]['size'] . $key['wordSpacing'][$device]['unit'] 
					: null,
			];
		} else {
			return [
				'font-size' => isset($key['fontSize'][$device]['size']) && isset($key['fontSize'][$device]['unit']) 
					? $key['fontSize'][$device]['size'] . $key['fontSize'][$device]['unit'] 
					: null,
				'line-height' => isset($key['lineHeight'][$device]['size']) && isset($key['lineHeight'][$device]['unit']) 
					? $key['lineHeight'][$device]['size'] . $key['lineHeight'][$device]['unit'] 
					: null,
				'letter-spacing' => isset($key['letterSpacing'][$device]['size']) && isset($key['letterSpacing'][$device]['unit']) 
					? $key['letterSpacing'][$device]['size'] . $key['letterSpacing'][$device]['unit'] 
					: null,
				'word-spacing' => isset($key['wordSpacing'][$device]['size']) && isset($key['wordSpacing'][$device]['unit']) 
					? $key['wordSpacing'][$device]['size'] . $key['wordSpacing'][$device]['unit'] 
					: null,
			];
		}
	}
	

	/**
	 * get slider value
	 * 
	 * Similar to getSliderValue function in JS helper
	 * @param string $value
	 * @return string
	 */

	public static function get_slider_value($key) {
		$value = '';

		if (!empty($key['size']) && !empty($key['unit'])) {
			$value = $key['size'] . $key['unit'];
		} elseif (!empty($key['size']) && empty($key['unit'])) {
			$value = $key['size'];
		} else {
			$value = null;
		}

		return $value;
	}

	/**
	 * parse css
	 * 
	 * @param string $css
	 * @return string
	 */

	public static function parse_css($raw_css) {
		
		$styles = [];
		$device_list = ['desktop', 'tablet', 'mobile', 'tabletlandscape', 'mobilelandscape', 'laptop', 'widescreen'];

		foreach ($device_list as $device) {
			$deviceStyles = $raw_css[$device] ?? [];

			$styles[$device] = array_map(function ($style) {
				if (!is_array($style) || !isset($style['selector'])) {
					return '';
				}

				$selector = $style['selector'];
				$cssValues = array_filter($style, function ($value, $key) {
					return $key !== 'selector' && $value !== null && $value !== '' && !is_numeric($value) && !in_array($value, ['px', 'em', 'rem', '%', 'vh', 'vw']) && strpos($value, 'undefined') === false;
				}, ARRAY_FILTER_USE_BOTH);

				if (empty($cssValues)) {
					return '';
				}

				return "{$selector} { " . implode(' ', array_map(function ($key, $value) {
					return "{$key}: {$value};";
				}, array_keys($cssValues), $cssValues)) . " }";
			}, $deviceStyles);
		}
		
		$device_styles = array_map(function ($style) {
			return implode("\n", $style);
		}, $styles);

		return $device_styles;
	}

	/**
	 * Check if the block is a GutenKit block.
	 * 
	 * @param string $attrs
	 * @return bool
	 */
	public static function is_gkit_block($block_content, $parsed_block, $attrs = '', $attrs2 = '') {
		// Check if $block_content is not empty
		$hasBlockContent = !empty($block_content);

		// Check if $block['blockName'] is not empty and contains 'gutenkit'
		$hasValidBlockName = !empty($parsed_block['blockName']) && strpos($parsed_block['blockName'], 'gutenkit') !== false;

		// Check if $block['attrs']['blockClass'] is not empty
		$hasBlockClass = !empty($attrs) && !empty($attrs2) 
			? !empty($parsed_block['attrs'][$attrs][$attrs2]) 
			: !empty($parsed_block['attrs'][$attrs] ?? '');

		if(empty($attrs) && empty($attrs2)) {
			$hasBlockClass = true;
		}

		// Return true if all conditions are met
		return $hasBlockContent && $hasValidBlockName && $hasBlockClass;
	}


	/**
	 * Retrieves the link attributes based on the provided attribute array.
	 *
	 * @param array $attribute The attribute array containing the link data.
	 * @return string The generated link attributes as a string.
	 */
	public static function get_link_attributes($attribute) {
		if (empty($attribute['url'])) return '';

		$link_data = [];

		$link_data['href'] = esc_url($attribute['url'], wp_allowed_protocols());

		(isset($attribute['newTab']) && $attribute['newTab']) ? $link_data['target'] = '_blank' : '';

		(isset($attribute['noFollow']) && $attribute['noFollow']) ? $link_data['rel'] = "nofollow" : '';

		if (isset($attribute['customAttributes']) && gettype($attribute['customAttributes']) == 'array') {
			foreach ($attribute['customAttributes'] as $key => $value) {
				if (!empty($value)) {
					$attr_key_value = explode('|', $value);

					$attr_key = mb_strtolower($attr_key_value[0]);

					// Not allowed characters are removed.
					preg_match('/[-_a-z0-9]+/', $attr_key, $attr_key_matches);

					if (empty($attr_key_matches[0])) {
						continue;
					}

					$attr_key = $attr_key_matches[0];

					// Javascript events and unescaped href are avoided.
					if ('href' === $attr_key || 'on' === substr($attr_key, 0, 2)) {
						continue;
					}

					if (isset($attr_key_value[1])) {
						$attr_value = trim($attr_key_value[1]);
					} else {
						$attr_value = '';
					}

					$link_data[$attr_key] = $attr_value;
				}
			}
		}

		$link_attributes = '';
		foreach ($link_data as $key => $value) {
			$link_attributes .= sprintf('%s="%s" ', $key, esc_attr($value));
		}

		return $link_attributes;
	}

	public static function get_placeholder_image() {
		return GUTENKIT_PLUGIN_URL . 'assets/images/placeholder.jpg';
	}

	public static function status() {

		$cached = wp_cache_get('gutenkit__license_status');

		if(false !== $cached) {
			return $cached;
		}

		$oppai  = get_option('__gutenkit_oppai__', '');
		$key    = get_option('__gutenkit_license_key__', '');
		$status = 'invalid';

		if($oppai != '' && $key != '') {
			$status = 'valid';
		}

		wp_cache_set('gutenkit__license_status', $status);

		return $status;
	}

	public static function is_local() {
		$valid_domains = [
			".academy", ".accountant", ".accountants", ".actor", ".adult", ".africa", ".agency", ".airforce",
			".apartments", ".app", ".army", ".art", ".asia", ".associates", ".attorney", ".auction", ".audio",
			".auto", ".baby", ".band", ".bar", ".bargains", ".beer", ".berlin", ".best", ".bid", ".bike",
			".bingo", ".bio", ".biz", ".black", ".blackfriday", ".blog", ".blue", ".boston", ".boutique",
			".build", ".builders", ".business", ".buzz", ".cab", ".cafe", ".cam", ".camera", ".camp",
			".capital", ".car", ".cards", ".care", ".careers", ".cars", ".casa", ".cash", ".casino",
			".catering", ".center", ".ceo", ".chat", ".cheap", ".christmas", ".church", ".city", ".claims",
			".cleaning", ".click", ".clinic", ".clothing", ".cloud", ".club", ".coach", ".codes", ".coffee",
			".college", ".com", ".community", ".company", ".computer", ".condos", ".construction",
			".consulting", ".contact", ".contractors", ".cooking", ".cool", ".country", ".coupons",
			".courses", ".credit", ".creditcard", ".cricket", ".cruises", ".cymru", ".cyou", ".dance",
			".date", ".dating", ".day", ".deals", ".degree", ".delivery", ".democrat", ".dental",
			".dentist", ".desi", ".design", ".dev", ".diamonds", ".diet", ".digital", ".direct", ".directory",
			".discount", ".doctor", ".dog", ".domains", ".download", ".earth", ".eco", ".education",
			".email", ".energy", ".engineer", ".engineering", ".enterprises", ".equipment", ".estate",
			".events", ".exchange", ".expert", ".exposed", ".express", ".fail", ".faith", ".family",
			".fans", ".farm", ".fashion", ".feedback", ".film", ".finance", ".financial", ".fish",
			".fishing", ".fit", ".fitness", ".flights", ".florist", ".flowers", ".football", ".forsale",
			".foundation", ".fun", ".fund", ".furniture", ".futbol", ".fyi", ".gallery", ".game", ".games",
			".garden", ".gay", ".gdn", ".gift", ".gifts", ".gives", ".glass", ".global", ".gmbh", ".gold",
			".golf", ".graphics", ".gratis", ".green", ".gripe", ".group", ".guide", ".guitars", ".guru",
			".hamburg", ".haus", ".health", ".healthcare", ".help", ".hiphop", ".hockey", ".holdings",
			".holiday", ".horse", ".host", ".hosting", ".house", ".how", ".icu", ".immo", ".immobilien",
			".inc", ".industries", ".info", ".ink", ".institute", ".insure", ".international", ".investments",
			".irish", ".jetzt", ".jewelry", ".juegos", ".kaufen", ".kim", ".kitchen", ".kiwi", ".krd",
			".kyoto", ".land", ".lat", ".lawyer", ".lease", ".legal", ".lgbt", ".life", ".lighting",
			".limited", ".limo", ".link", ".live", ".llc", ".loan", ".loans", ".lol", ".london", ".love",
			".ltd", ".ltda", ".luxury", ".maison", ".management", ".market", ".marketing", ".mba", ".media",
			".melbourne", ".memorial", ".men", ".menu", ".miami", ".mobi", ".moda", ".moe", ".mom", ".money",
			".monster", ".mortgage", ".movie", ".nagoya", ".name", ".navy", ".net", ".network", ".new",
			".news", ".ninja", ".nyc", ".observer", ".okinawa", ".one", ".onl", ".online", ".org", ".osaka",
			".page", ".paris", ".partners", ".parts", ".party", ".photo", ".photography", ".photos", ".pics",
			".pictures", ".pink", ".pizza", ".place", ".plumbing", ".plus", ".poker", ".porn", ".press",
			".pro", ".productions", ".properties", ".property", ".protection", ".pub", ".racing", ".realty",
			".recipes", ".red", ".rehab", ".reise", ".reisen", ".rent", ".rentals", ".repair", ".report",
			".republican", ".rest", ".restaurant", ".review", ".reviews", ".rip", ".rocks", ".rodeo",
			".run", ".ryukyu", ".sale", ".sarl", ".school", ".schule", ".science", ".security", ".services",
			".sex", ".sexy", ".shiksha", ".shoes", ".shop", ".shopping", ".show", ".singles", ".site",
			".ski", ".soccer", ".social", ".software", ".solar", ".solutions", ".soy", ".space", ".storage",
			".store", ".stream", ".studio", ".study", ".style", ".sucks", ".supplies", ".supply", ".support",
			".surf", ".surgery", ".sydney", ".systems", ".tattoo", ".tax", ".taxi", ".team", ".tech",
			".technology", ".tel", ".tennis", ".theater", ".theatre", ".tienda", ".tips", ".tires", ".today",
			".tokyo", ".tools", ".top", ".tours", ".town", ".toys", ".trade", ".training", ".travel",
			".tube", ".university", ".uno", ".vacations", ".vegas", ".ventures", ".vet", ".viajes", ".video",
			".villas", ".vin", ".vip", ".vision", ".vodka", ".vote", ".voting", ".voto", ".voyage", ".wales",
			".watch", ".webcam", ".website", ".wedding", ".wiki", ".win", ".wine", ".work", ".works",
			".world", ".wtf", ".xn--3ds443g", ".xn--6frz82g", ".xxx", ".xyz", ".yoga", ".yokohama", ".zone"
		];

		$host = isset($_SERVER['HTTP_HOST']) ? sanitize_text_field(wp_unslash($_SERVER['HTTP_HOST'])) : '';

		// get the domain
		$domain = explode('.', $host);
		if(count($domain) >= 2) {
			$domain = '.' . $domain[count($domain) - 1];
		} else {
			$domain = null;
		}

		return !in_array($domain, $valid_domains);
	}
}
