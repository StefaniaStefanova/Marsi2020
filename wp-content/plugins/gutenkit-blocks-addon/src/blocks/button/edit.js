import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import Settings from './settings';
import classNames from 'classnames'
import './editor.scss';
import Markup from './markup';

export default function Edit({ attributes, setAttributes, clientId, advancedControl }) {
	const { GkitStyle, GkitIcon } = window.gutenkit.components;
	const { useDeviceType } = window.gutenkit.helpers;
	const { btnText, btnClass, btnID, iconsSwitch, icons, iconAlign } = attributes;
	const blockProps = useBlockProps();
	const device = useDeviceType();
	let buttonProps = {
		className: classNames('gkit-btn', { [btnClass]: btnClass })
	}

	btnID ? buttonProps.id = btnID : '';

	return (
		<>
			<GkitStyle 
				blocksCSS ={attributes?.blocksCSS}
			/>

			<Settings
				attributes={attributes}
				setAttributes={setAttributes}
				device={device}
				advancedControl={advancedControl}
			/>

			<div {...blockProps}>
				<div className="gkit-btn-wraper">
					<a href='#' {...buttonProps}>
						<Markup attributes={attributes} />
					</a>
				</div>
			</div>
		</>
	);
}
