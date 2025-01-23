import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';
import classNames from 'classnames';

export default function save({ attributes }) {
	const blockProps = useBlockProps.save({
		className: classNames(
			[attributes?.containerWidth],
			{ 'gkit-motion-effects animate__animated': attributes?.motionEffects?.effect }
		),
		id: attributes?.blockID,
	});
	const innerBlocksProps = useInnerBlocksProps.save();
	innerBlocksProps.className = 'gkit-block__inner';

	const HtmlTag = `${attributes?.htmlTag}`;

	let animationData = {};
	animationData.className = attributes?.motionEffects?.effect?.value ? `animate__${attributes?.motionEffects?.effect?.value}` : '';
	animationData.speed = attributes?.motionEffects?.effect?.value && attributes?.motionEffects?.speed ? attributes?.motionEffects?.speed : '';

	let dataAnimation = {}
	animationData?.className && (dataAnimation['data-animation'] = JSON.stringify(animationData));

	return (
		<HtmlTag {...blockProps} {...dataAnimation}>
			{
				attributes?.containerBackground?.backgroundType === 'video' &&
				<div className="gkit-block-video-wrap">
					<video loop autoPlay muted>
						<source src={attributes?.containerBackground?.backgroundVideo?.url} type={attributes?.containerBackground?.backgroundVideo?.mime} />
					</video>
				</div>
			}
			{
				attributes?.showContainerOverlay && <div className='gkit-container-overlay'></div>
			}
			<div {...innerBlocksProps} />
		</HtmlTag>
	);
}
