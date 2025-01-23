import { registerBlockType } from '@wordpress/blocks';
import './style.scss';

/**
 * Internal dependencies
 */
import Edit from './edit';
import save from './save';
import metadata from './block.json';
import transforms from './transform';


registerBlockType( metadata.name, {
	/**
	 * Icon for the block.
	 */
	icon: {
		src: <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" color='red'>
			<g>
				<path d="M42,10V38H6V10H42m2-4H4A2,2,0,0,0,2,8V40a2,2,0,0,0,2,2H44a2,2,0,0,0,2-2V8a2,2,0,0,0-2-2Z" />
				<path d="M12,14a2,2,0,0,0-2,2V32a2,2,0,0,0,4,0V16a2,2,0,0,0-2-2Z" />
				<path d="M20,14a2,2,0,0,0-2,2V32a2,2,0,0,0,4,0V16a2,2,0,0,0-2-2Z" />
				<path d="M28,14a2,2,0,0,0-2,2V32a2,2,0,0,0,4,0V16a2,2,0,0,0-2-2Z" />
				<path d="M36,14a2,2,0,0,0-2,2V32a2,2,0,0,0,4,0V16a2,2,0,0,0-2-2Z" />
			</g>
		</svg>
	},
	/**
	 * @see ./edit.js
	 */
	edit: Edit,

	/**
	 * @see ./save.js
	 */
	save,
	/**
	 * @see ./transform.js
	 */
	transforms,
} );
