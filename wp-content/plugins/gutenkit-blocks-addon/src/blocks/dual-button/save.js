
import { useBlockProps } from '@wordpress/block-editor';
import classnames from 'classnames';
import { __ } from '@wordpress/i18n';

export default function save({ attributes }) {
	const { GkitIcon } = window.gutenkit.components;
	const { linkGenerator } = window.gutenkit.helpers;
	const blockProps = useBlockProps.save({
		className: classnames({
			[`gkit-dual-button-middle-text`]: attributes?.gkitShowButtonMiddleText,
		}),
		id: attributes?.blockID
	});

	return (
		<div {...blockProps}>
			<div className="gkit-dual-btn-container">
				<div className="gkit-dual-btn-wrapper">
					<a className="gkit-dual-btn gkit-dual-btn-first" {...linkGenerator(attributes?.gkitButtonOneLink)}>
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
					<a className="gkit-dual-btn gkit-dual-btn-second" {...linkGenerator(attributes?.gkitButtonTwoLink)}>
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
	);
}
