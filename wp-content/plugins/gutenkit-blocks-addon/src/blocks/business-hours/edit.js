import { __ } from '@wordpress/i18n';
import './editor.scss';
import Settings from './settings';
import {
	useBlockProps,
} from '@wordpress/block-editor';
import Markup from './markup';

export default function Edit({ attributes, setAttributes, clientId, advancedControl }) {
	const { GkitStyle } = window.gutenkit.components;
	const { useDeviceType } = window.gutenkit.helpers;
	const device = useDeviceType();
	const blockProps = useBlockProps();

	return (
		<>
			<GkitStyle
				blocksCSS={attributes?.blocksCSS}
			/>

			<Settings
				attributes={attributes}
				setAttributes={setAttributes}
				device={device}
				advancedControl={advancedControl}
			/>

			<div {...blockProps}>
				<Markup attributes={attributes} />
			</div>
		</>
	);
}
