
import { useBlockProps, RichText } from '@wordpress/block-editor';
import classnames from 'classnames'
import Top from './parts/top';
import Bottom from './parts/bottom';

export default function save({ attributes }) {
	const { linkGenerator } = window.gutenkit.helpers;
	const blockProps = useBlockProps.save({
		className: classnames({
			[`gkit-heading-has-border`]: attributes?.showBorder,
			[`gkit-heading-border-position-${attributes?.borderPosition}`]: attributes?.borderPosition,
		}),
		id: 'block-' + attributes?.blockID,
	});

	const SubtitleTag = attributes?.subtitleHtmlTag || 'h3';
	const subTitleProps = {};
	subTitleProps.className = classnames({
		[`gkit-heading-subtitle`]: attributes?.showSubtitle,
		[`gkit-heading-subtitle-has-border`]: attributes?.borderSubtitle,
		[`gkit-heading-subtitle-has-outline`]: attributes?.showOutline,
		[`gkit-heading-subtitle-has-text-fill`]: attributes?.subtitleUseTextFill
	})

	const linkAttributes = attributes?.linkSwitch ? linkGenerator(attributes?.link) : '';

	return (
		<div {...blockProps}>
			<Top attributes={attributes} SubtitleTag={SubtitleTag} subTitleProps={subTitleProps} />
			{
				attributes?.linkSwitch ? (
					<a {...linkAttributes}>
						<RichText.Content
							tagName={attributes?.htmlTag}
							value={attributes?.content}
							className={classnames({
								[`gkit-heading-title`]: true,
								[`gkit-heading-title-text-fill`]: attributes?.focusedTitleUseTextFill
							})}
						/>
					</a>
				) : (
					<RichText.Content
						tagName={attributes?.htmlTag}
						value={attributes?.content}
						className={classnames({
							[`gkit-heading-title`]: true,
							[`gkit-heading-title-text-fill`]: attributes?.focusedTitleUseTextFill
						})}
					/>
				)
			}
			<Bottom attributes={attributes} SubtitleTag={SubtitleTag} subTitleProps={subTitleProps} />
		</div>
	);
}
