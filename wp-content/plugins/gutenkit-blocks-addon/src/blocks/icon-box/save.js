
import { useBlockProps, RichText } from '@wordpress/block-editor';
import classnames from 'classnames';
import { __ } from '@wordpress/i18n';
export default function save({ attributes }) {
	const { GkitIcon } = window.gutenkit.components;
	const { linkGenerator } = window.gutenkit.helpers;
	const HtmlTag = (attributes?.iconBoxShowGlobalLink && !attributes?.iconBoxShowButton) ? 'a' : 'div';
	const buttonLinkAttributes = linkGenerator(attributes?.iconBoxBtnUrl);
	const wrapperLinkAttributes = (attributes?.iconBoxShowGlobalLink && !attributes?.iconBoxShowButton) ? linkGenerator(attributes?.iconBoxGlobalLinkUrl) : '';
	const blockProps = useBlockProps.save({
		className: classnames({
			[`gkit-icon-box`]: true,
			[`gkit-icon-box-equal-height`]: attributes?.enableEqualHeight,
			[`gkit-icon-box-hover-background-animation`]: attributes?.iconBoxContainerHoverBackgroundAnimation,
			[`gkit-animation-${attributes?.iconBoxContainerHoverAnimation?.effect?.value}`]: attributes?.iconBoxContainerHoverAnimationSwitch
		}),
		id: attributes?.blockID
	});

	return (
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
				{attributes?.iconBoxTitleText &&
					<RichText.Content
						identifier="title"
						tagName={attributes?.iconBoxTitleTag || 'h3'}
						value={attributes?.iconBoxTitleText}
						className='gkit-icon-box-title'
					/>
				}
				{attributes?.iconBoxDescriptionText &&
					<RichText.Content
						identifier="content"
						tagName={'p'}
						value={attributes?.iconBoxDescriptionText}
						className='gkit-icon-box-description'
					/>
				}
				{
					attributes?.iconBoxShowButton && (
						<div className={classnames({
							'gkit-icon-box-button-wrapper': attributes?.iconBoxShowButton,
							[`gkit-icon-box-button-hover`]: attributes?.iconBoxEnableHoverBtn
						})}>
							<a {...buttonLinkAttributes} className="gkit-icon-box-button gkit-btn">
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
	);
}
