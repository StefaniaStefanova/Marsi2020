import { useBlockProps, RichText } from '@wordpress/block-editor';
import classNames from 'classnames'
import Link from './Link';

export default function save({ attributes }) {
	const { GkitIcon, GkitImage } = window.gutenkit.components;
	const { linkGenerator } = window.gutenkit.helpers;
	const { contentTextAlign, imageSize, image, imageBoxStyle, borderHoverBackgroundDirection, enableLink, websiteLink, titleText, frontTitleIconsSwitch, frontTitleIcons, frontTitleIconPosition, titleSize, descriptionText, enableBtn, btnUrl, iconsSwitch, icons, iconAlign, btnText } = attributes;
	const blockProps = useBlockProps.save();
	const wrapperProps = {
		className: classNames(
			'gkit-info-image-box',
			'gkit-image-box',
			[imageBoxStyle],
			{ [borderHoverBackgroundDirection]: imageBoxStyle == 'hover-border-bottom' }
		)
	}

	const innerWrapperProps = {
		className: classNames(
			'gkit-box-header',
			[`image-box-img-${contentTextAlign}`],
		)
	}

	const bodyProps = {
		className: classNames(
			'gkit-box-body',
			'gkit-image-box-body',
			{ [`gkit-box-body--hover-${borderHoverBackgroundDirection}`]: imageBoxStyle == 'hover-border-bottom' }
		)
	}

	const linkAttributes = linkGenerator(btnUrl);

	return (
		<div {...blockProps}>
			<div {...wrapperProps}>
				{!enableLink &&(attributes?.image?.url || attributes?.image?.placeholderUrl) &&
					<div {...innerWrapperProps}>
						<GkitImage image={image} />
					</div>
				}
				{enableLink && (attributes?.image?.url || attributes?.image?.placeholderUrl) &&
					<Link url={websiteLink}>
						<div {...innerWrapperProps}>
							<GkitImage image={image} />
						</div>
					</Link>
				}

				<div {...bodyProps}>
					<div className="gkit-box-content gkit-image-box-body-inner">
						{titleText &&
							<div className='gkit-info-box'>
								{frontTitleIconsSwitch && frontTitleIconPosition == 'left' && imageBoxStyle == 'floating-style' &&
									<GkitIcon icon={attributes?.frontTitleIcons} classes={'icon-left'} />
								}
								<RichText.Content
									identifier="imageBox-heading"
									tagName={titleSize}
									value={ titleText }
									className='gkit-info-box-title'
								/>
								{frontTitleIconsSwitch && frontTitleIconPosition == 'right' && imageBoxStyle == 'floating-style' &&
									<GkitIcon icon={attributes?.frontTitleIcons} classes={'icon-right'} />
								}
							</div>
						}
						{descriptionText &&
							<RichText.Content
								identifier="imageBox-description"
								tagName='div'
								value={ descriptionText }
								className='gkit-box-style-content'

							/>
						}
						{enableBtn &&
							<div className="gkit-box-footer">
								<a className='gkit-btn' {...linkAttributes}>
									{iconsSwitch && iconAlign == 'left' &&
										<GkitIcon icon={attributes?.icons} classes={'icon-left'} />
									}
									{btnText}
									{iconsSwitch && iconAlign == 'right' &&
										<GkitIcon icon={attributes?.icons} classes={'icon-right'} />
									}
								</a>
							</div>
						}
					</div>
				</div>
			</div>
		</div>
	);
}
