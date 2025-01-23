import { __ } from '@wordpress/i18n';
import './editor.scss';
import Settings from './settings';
import classnames from 'classnames'
import {
	useBlockProps,
	RichText
} from '@wordpress/block-editor';

export default function Edit({ attributes, setAttributes, clientId, advancedControl }) {
	const { GkitStyle, GkitIcon } = window.gutenkit.components;
	const { useDeviceType } = window.gutenkit.helpers;
	const device = useDeviceType();
	const HtmlTag = (attributes?.iconBoxShowGlobalLink && !attributes?.iconBoxShowButton) ? 'a' : 'div';
	const wrapperLinkAttributes = (attributes?.iconBoxShowGlobalLink && !attributes?.iconBoxShowButton) ? { href: '#' } : {};

	const blockProps = useBlockProps({
		className: classnames({
			[`gkit-icon-box`]: true,
			[`gkit-icon-box-equal-height`]: attributes?.enableEqualHeight,
			[`gkit-icon-box-hover-background-animation`]: attributes?.iconBoxContainerHoverBackgroundAnimation,
			[`gkit-animation-${attributes?.iconBoxContainerHoverAnimation?.effect?.value}`]: attributes?.iconBoxContainerHoverAnimationSwitch
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

			<HtmlTag {...wrapperLinkAttributes} {...blockProps}>
				{
					attributes?.iconBoxShowHeaderIcon &&
					<div className="gkit-icon-box-header">
						<div className="gkit-icon-box-header-icon">
							<GkitIcon icon={attributes?.iconBoxHeaderIcon} />
						</div>
					</div>
				}

				<div className="gkit-icon-box-body">
					<RichText
						identifier="title"
						tagName={attributes?.iconBoxTitleTag || 'h3'}
						value={attributes?.iconBoxTitleText}
						onChange={(content) => {
							setAttributes({ iconBoxTitleText: content })
						}}
						placeholder={__('Enter your title here...')}
						className='gkit-icon-box-title'
					/>

					<RichText
						identifier="content"
						tagName={'p'}
						value={attributes?.iconBoxDescriptionText}
						onChange={(content) => {
							setAttributes({ iconBoxDescriptionText: content })
						}}
						placeholder={__('Enter your description here...')}
						className='gkit-icon-box-description'
					/>
					{
						attributes?.iconBoxShowButton && (
							<div className={classnames({
								'gkit-icon-box-button-wrapper': attributes?.iconBoxShowButton,
								[`gkit-icon-box-button-hover`]: attributes?.iconBoxEnableHoverBtn
							})}>
								<a href="#" className="gkit-icon-box-button gkit-btn">
									{
										attributes?.iconBoxShowBtnIcon && attributes?.iconBoxBtnIconPosition === "before" &&
										<span className='gkit-btn-left-icon'><GkitIcon icon={attributes?.iconBoxBtnIcon} /></span>
									}
									<span className="gkit-icon-box-button-text">{__(attributes?.iconBoxBtnText, 'gutenkit')}</span>
									{
										attributes?.iconBoxShowBtnIcon && attributes?.iconBoxBtnIconPosition === "after" &&
										<span className='gkit-btn-right-icon'> <GkitIcon icon={attributes?.iconBoxBtnIcon} /></span>
									}
								</a>
							</div>
						)
					}
				</div>
				{
					attributes?.iconBoxEnableWaterMark && attributes?.iconBoxWaterMarkIcon && (
						<div className="gkit-icon-box-watermark">
							<GkitIcon icon={attributes?.iconBoxWaterMarkIcon} />
						</div>
					)
				}
				{
					attributes?.iconBoxShowBadge &&
					<div className='gkit-icon-box-badge'>
						<span className="gkit-icon-box-badge-text">{__(attributes?.iconBoxBadgeTitle, 'gutenkit')}</span>
					</div>
				}
			</HtmlTag>
		</>
	);
}
