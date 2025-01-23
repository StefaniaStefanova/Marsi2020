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
		src: <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="45" height="32" viewBox="0 0 45 32"> <title>faq</title> <path d="M16 0c-8.774 0-16 7.226-16 16 0 0.31 0.206 0.516 0.516 0.516s0.516-0.206 0.516-0.516c0-8.258 6.71-14.968 14.968-14.968s14.968 6.71 14.968 14.968v14.968h-14.968c-5.471 0-10.529-2.994-13.11-7.845-0.103-0.206-0.413-0.31-0.723-0.206-0.206 0.103-0.31 0.413-0.206 0.723 2.787 5.161 8.155 8.361 14.039 8.361h16v-16c0-8.774-7.226-16-16-16z"></path> <path d="M43.974 10.219c-0.103-0.31-0.413-0.413-0.619-0.31-0.31 0.103-0.413 0.413-0.31 0.619 0.619 1.755 1.032 3.51 1.032 5.368 0 5.471-2.994 10.529-7.845 13.11-0.206 0.103-0.31 0.413-0.206 0.723 0.103 0.206 0.31 0.31 0.413 0.31s0.206 0 0.206-0.103c5.161-2.787 8.361-8.155 8.361-14.039 0.103-1.858-0.31-3.819-1.032-5.677z"></path> <path d="M27.768 1.032c4.129-0.31 8.258 1.032 11.252 3.819 0.103 0.103 0.206 0.103 0.31 0.103s0.31-0.103 0.413-0.206c0.206-0.206 0.206-0.516 0-0.723-3.303-2.994-7.639-4.439-12.077-4.026-0.31 0-0.516 0.31-0.516 0.516 0.103 0.413 0.413 0.619 0.619 0.516z"></path> <path d="M17.445 16.31c1.652-0.619 2.684-2.271 2.684-4.026 0-2.271-1.858-4.129-4.232-4.232-1.652 0-3.2 0.929-3.923 2.374-0.103 0.206 0 0.516 0.206 0.723 0.206 0.103 0.516 0 0.723-0.206 0.516-1.135 1.652-1.858 2.994-1.858 1.755 0 3.2 1.445 3.2 3.2 0 1.342-0.723 2.581-1.961 2.994-1.032 0.413-1.755 1.445-1.755 2.684v1.239c0 0.31 0.206 0.516 0.516 0.516s0.516-0.206 0.516-0.516v-1.239c-0.103-0.723 0.31-1.445 1.032-1.652z"></path> <path d="M15.794 21.781c-0.31 0-0.516 0.206-0.516 0.516v1.032c0 0.31 0.206 0.516 0.516 0.516s0.516-0.206 0.516-0.516v-1.032c0-0.206-0.206-0.516-0.516-0.516z"></path> </svg>,
	},

	/**
	 * @see ./save.js
	 */
	save,
});
