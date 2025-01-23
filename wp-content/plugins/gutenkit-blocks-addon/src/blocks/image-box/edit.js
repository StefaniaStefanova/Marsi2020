import { __ } from '@wordpress/i18n';
import { useBlockProps,RichText } from '@wordpress/block-editor';
import Settings from './settings';
import classNames from 'classnames'
import './editor.scss';

export default function Edit({ attributes, setAttributes, clientId, advancedControl }) {
	const { GkitStyle, GkitIcon,GkitImage } = window.gutenkit.components;
	const { useDeviceType } = window.gutenkit.helpers;
	const { contentTextAlign, imageSize, image, imageBoxStyle, borderHoverBackgroundDirection, enableLink, titleText, frontTitleIconsSwitch, frontTitleIcons, frontTitleIconPosition, titleSize, descriptionText, enableBtn, btnText, iconsSwitch, icons, iconAlign } = attributes;
	const blockProps = useBlockProps();
	const device = useDeviceType();

	const wrapperProps = {
		className: classNames(
			'gkit-info-image-box',
			'gkit-image-box',
			[imageBoxStyle],
		)
	}

	const innerWrapperProps = {
		className: classNames('gkit-box-header')
	}

	const bodyProps = {
		className: classNames(
			'gkit-box-body',
			'gkit-image-box-body',
			{ [`gkit-box-body--hover-${borderHoverBackgroundDirection}`]: imageBoxStyle == 'hover-border-bottom' }
		)
	}

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
				<div {...wrapperProps}>
					{(!enableLink && attributes?.image?.url) &&
						<div {...innerWrapperProps}>
							 <GkitImage image={image} />
						</div>
					}
					{(enableLink && attributes?.image?.url ) &&
						<a href='#'>
							<div {...innerWrapperProps}>
								<GkitImage image={image} />
							</div>
						</a>
					}

					<div {...bodyProps}>
						<div className="gkit-box-content gkit-image-box-body-inner">
							<div className='gkit-info-box'>
								{frontTitleIconsSwitch && frontTitleIconPosition == 'left' && imageBoxStyle == 'floating-style' &&
									<GkitIcon icon={attributes?.frontTitleIcons} classes={'icon-left'} />
								}
								<RichText
									identifier="imageBox-heading"
									tagName={titleSize}
									value={ titleText }
									placeholder={ __( 'Enter your heading...' ) }
									className='gkit-info-box-title'
									onChange={ ( value ) => {
										setAttributes( { titleText: value } );
									} }
								/>
								{frontTitleIconsSwitch && frontTitleIconPosition == 'right' && imageBoxStyle == 'floating-style' &&
									<GkitIcon icon={attributes?.frontTitleIcons} classes={'icon-right'} />
								}
							</div>

								<RichText
									identifier="imageBox-description"
									tagName='div'
									value={ descriptionText }
									placeholder={ __( 'Enter Your Description...' ) }
									className='gkit-box-style-content'
									onChange={ ( value ) => {
										setAttributes( { descriptionText: value } );
									} }
								/>

							{enableBtn &&
								<div className="gkit-box-footer">
									<a className='gkit-btn' href="#">
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
		</>
	);
}
