import { __ } from '@wordpress/i18n';
import './editor.scss';
import Settings from './settings';
import classnames from 'classnames'
import {
	RichText,
	useBlockProps,
} from '@wordpress/block-editor';
import Top from './parts/top';
import Bottom from './parts/bottom';

export default function Edit({ attributes, setAttributes, clientId, advancedControl }) {
	const { GkitStyle } = window.gutenkit.components;
	const { useDeviceType, gkitResponsiveValue } = window.gutenkit.helpers;
	const device = useDeviceType();
	const alignmentClass = gkitResponsiveValue(attributes, "generalTextAlignment", device);
	const blockProps = useBlockProps({
		className: classnames({
			[`has-text-align-${alignmentClass}`]: alignmentClass,
			[`gkit-heading-has-border`]: attributes?.showBorder,
			[`gkit-heading-border-position-${attributes?.borderPosition}`]: attributes?.borderPosition
		})
	});
	const SubtitleTag = attributes?.subtitleHtmlTag || 'h3';
	const subTitleProps = {};
	subTitleProps.className = classnames({
		[`gkit-heading-subtitle`]: attributes?.showSubtitle,
		[`gkit-heading-subtitle-has-border`]: attributes?.borderSubtitle,
		[`gkit-heading-subtitle-has-outline`]: attributes?.showOutline,
		[`gkit-heading-subtitle-has-text-fill`]: attributes?.subtitleUseTextFill
	})

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
				<Top attributes={attributes} SubtitleTag={SubtitleTag} subTitleProps={subTitleProps} />
				{
					attributes.linkSwitch ? (
						<a href='#'>
							<RichText
								identifier="content"
								tagName={attributes?.htmlTag}
								value={attributes?.content}
								onChange={(content) => {
									setAttributes({ content })
								}}
								placeholder={__('Enter your heading here...')}
								className={classnames({
									[`gkit-heading-title`]: true,
									[`gkit-heading-title-text-fill`]: attributes?.focusedTitleUseTextFill
								})}
							/>
						</a>
					) : (
						<RichText
							identifier="content"
							tagName={attributes?.htmlTag}
							value={attributes?.content}
							onChange={(content) => {
								setAttributes({ content })
							}}
							placeholder={__('Enter your heading here...')}
							className={classnames({
								[`gkit-heading-title`]: true,
								[`gkit-heading-title-text-fill`]: attributes?.focusedTitleUseTextFill
							})}
						/>
					)
				}
				<Bottom attributes={attributes} SubtitleTag={SubtitleTag} subTitleProps={subTitleProps} />
			</div>
		</>
	);
}
