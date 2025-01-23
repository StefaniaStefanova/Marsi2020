import { __ } from '@wordpress/i18n';
import './editor.scss';
import Settings from './settings';
import classnames from 'classnames'
import {
	useBlockProps
} from '@wordpress/block-editor';

export default function Edit({ attributes, setAttributes, clientId, advancedControl }) {
	const { GkitStyle, GkitIcon } = window.gutenkit.components;
	const { useDeviceType } = window.gutenkit.helpers;
	const device = useDeviceType();
	const blockProps = useBlockProps({
		className: classnames({
			[`gkit-dual-button-middle-text`]: attributes?.gkitShowButtonMiddleText,
		}),
	});

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
				<div className="gkit-dual-btn-container">
					<div className="gkit-dual-btn-wrapper">
						<a className="gkit-dual-btn gkit-dual-btn-first" href="#">
							{
								attributes?.gkitButtonOneIconsShow && attributes?.gkitButtonOneIcons && attributes?.gkitDoubleButtonOneIconPosition === "before" && (
									<GkitIcon icon={attributes?.gkitButtonOneIcons} />
								)
							}
							{
								attributes?.gkitButtonOneText && (
									<span className='gkit-dual-btn-text'>{__(attributes?.gkitButtonOneText, 'gutenkit')}</span>
								)
							}
							{
								attributes?.gkitButtonOneIconsShow && attributes?.gkitButtonOneIcons && attributes?.gkitDoubleButtonOneIconPosition === "after" && (
									<GkitIcon icon={attributes?.gkitButtonOneIcons} />
								)
							}
						</a>
						{
							attributes?.gkitShowButtonMiddleText && attributes?.gkitButtonMiddleText && (
								<span className="gkit-dual-btn-middle-text">{__(attributes?.gkitButtonMiddleText, 'gutenkit')}</span>
							)
						}
						<a className="gkit-dual-btn gkit-dual-btn-second" href="#">
							{
								attributes?.gkitButtonTwoIconsShow && attributes?.gkitButtonTwoIcons && attributes?.gkitDoubleButtonTwoIconPosition === "before" && (
									<GkitIcon icon={attributes?.gkitButtonTwoIcons} />
								)
							}
							{
								attributes?.gkitButtonTwoText && (
									<span className='gkit-dual-btn-text'>{__(attributes?.gkitButtonTwoText, 'gutenkit')}</span>
								)
							}
							{
								attributes?.gkitButtonTwoIconsShow && attributes?.gkitButtonTwoIcons && attributes?.gkitDoubleButtonTwoIconPosition === "after" && (
									<GkitIcon icon={attributes?.gkitButtonTwoIcons} />
								)
							}
						</a>
					</div>
				</div>
			</div>
		</>
	);
}
