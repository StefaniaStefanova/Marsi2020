/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
import { registerBlockType } from '@wordpress/blocks';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './style.scss';

/**
 * Internal dependencies
 */
import Edit from './edit';
import save from './save';
import metadata from './block.json';

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
registerBlockType(metadata.name, {
	/**
	 * @see ./edit.js
	 */
	edit: Edit,

	/**
	 * Block icon
	 */
	icon: {
		src: <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="28" height="32" viewBox="0 0 28 32"> <title>heading-style</title> <path d="M4.059 27.551c-0.156 0.156-0.156 0.39 0 0.546l1.249 1.249h-1.873c-1.483 0-2.654-1.249-2.654-2.654v-21.307c0-1.483 1.171-2.732 2.654-2.732h12.41c0.234 0 0.39-0.156 0.39-0.39s-0.156-0.39-0.39-0.39h-12.41c-1.873 0-3.434 1.561-3.434 3.512v21.307c0 1.873 1.561 3.434 3.434 3.434h1.873l-1.249 1.249c-0.156 0.156-0.156 0.39 0 0.546 0.078 0.078 0.234 0.078 0.312 0.078s0.234 0 0.312-0.078l2.185-2.185-2.185-2.185c-0.234-0.156-0.468-0.156-0.624 0z"></path> <path d="M24.741 1.873h-2.888l1.249-1.249c0.156-0.156 0.156-0.39 0-0.546s-0.39-0.156-0.546 0l-2.185 2.185 2.185 2.185c0.078 0.078 0.156 0.078 0.312 0.078s0.234 0 0.312-0.078c0.156-0.156 0.156-0.39 0-0.546l-1.327-1.249h2.888c1.483 0 2.654 1.171 2.654 2.654v21.307c0 1.483-1.171 2.654-2.654 2.654h-13.659c-0.234 0-0.39 0.156-0.39 0.39s0.156 0.39 0.39 0.39h13.659c1.873 0 3.434-1.561 3.434-3.434v-21.229c0-1.951-1.561-3.512-3.434-3.512z"></path> <path d="M16.234 11.473c0-0.234-0.156-0.39-0.39-0.39h-7.571c-0.234 0-0.39 0.156-0.39 0.39s0.156 0.39 0.39 0.39h7.571c0.156 0 0.39-0.234 0.39-0.39z"></path> <path d="M11.629 13.268v7.259c0 0.234 0.156 0.39 0.39 0.39s0.39-0.156 0.39-0.39v-7.259c0-0.234-0.156-0.39-0.39-0.39s-0.39 0.234-0.39 0.39z"></path> <path d="M15.141 15.298c0 0.234 0.156 0.39 0.39 0.39h4.371c0.234 0 0.39-0.156 0.39-0.39s-0.156-0.39-0.39-0.39h-4.371c-0.234 0-0.39 0.156-0.39 0.39z"></path> <path d="M17.327 16.78v3.746c0 0.234 0.156 0.39 0.39 0.39s0.39-0.156 0.39-0.39v-3.746c0-0.234-0.156-0.39-0.39-0.39s-0.39 0.156-0.39 0.39z"></path> </svg>
	},

	/**
	 * @see ./save.js
	 */
	save,
});
