import { __ } from '@wordpress/i18n';
import './editor.scss';
import Settings from './settings';
import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function Edit({ attributes, setAttributes, clientId, advancedControl }) {
	const { GkitStyle } = window.gutenkit.components;
	const { useDeviceType } = window.gutenkit.helpers;
	const { dropcapsText } = attributes;
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
				<RichText
					identifier="content"
					tagName='p'
					value={dropcapsText}
					onChange={(value) => { setAttributes({ dropcapsText: value }) }}
					placeholder={__('Enter your title here...')}
					className='gkit-dropcap-content'
				/>
			</div>
		</>
	);
}
