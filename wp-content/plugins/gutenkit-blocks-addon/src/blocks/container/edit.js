import { __ } from '@wordpress/i18n';
import { useBlockProps, InnerBlocks, useInnerBlocksProps, store as blockEditorStore } from '@wordpress/block-editor';
import { useEffect, useState, useRef } from '@wordpress/element';
import { useSelect, useDispatch } from '@wordpress/data';
import { createBlock } from '@wordpress/blocks';
import classNames from 'classnames'
import Settings from './settings';
import './editor.scss';
import getAnimation from './animation';
import ContainerResizeHandler from './resize-handler';


export default function Edit({ attributes, setAttributes, clientId, advancedControl, isSelected }) {
	const components = window.gutenkit.components;
	const helpers = window.gutenkit.helpers;
	const { GkitStyle, GkitContainerPlaceholder } = components;
	const { useDeviceType, onScrollAnimate, onScrollAnimateIframe, gkitResponsiveValue, responsiveHelper } = helpers;
	const device = useDeviceType();
	const videoRef = useRef(null);
	const HtmlTag = `${attributes?.htmlTag}`;
	const { replaceInnerBlocks } = useDispatch('core/block-editor');
	const [dataAnimation, setDataAnimation] = useState({'data-animation': undefined});

	const { hasChildBlocks, hasParent, isParent } = useSelect(
		(select) => {
			const { getBlockOrder, getBlockParentsByBlockName } = select(blockEditorStore);
			return {
				hasChildBlocks: getBlockOrder(clientId).length > 0,
				hasParent: getBlockParentsByBlockName(clientId, 'gutenkit/container').length > 0 ? true : false,
				isParent: getBlockParentsByBlockName(clientId, 'gutenkit/container').length === 0 ? true : false
			};
		},
		[clientId]
	);

	const blockProps = useBlockProps({
		className: classNames(
			[attributes?.containerWidth],
			{ 'gkit-motion-effects animate__animated': attributes?.motionEffects?.effect },
			{ 'gkit-has-inner-children': hasChildBlocks },
		),
		id: attributes?.blockID
	});

	const innerBlocksProps = useInnerBlocksProps(
		{
			className: classNames(
				{ 'gkit-container-parent gkit-block__inner': isParent },
				{ 'gkit-container-child gkit-block__inner': !isParent },
				{ 'gkit-has-children': hasChildBlocks }
			)
		},
		{
			renderAppender: hasChildBlocks
				? undefined
				: InnerBlocks.ButtonBlockAppender,
		}
	);

	useEffect(() => {
		if (hasParent) setAttributes({ variationSeleted: true });
	}, []);

	useEffect(() => {
		let animationData = {};
		animationData.className = attributes?.motionEffects?.effect?.value ? `animate__${attributes?.motionEffects?.effect?.value}` : '';
		animationData.speed = attributes?.motionEffects?.effect?.value && attributes?.motionEffects?.speed ? attributes?.motionEffects?.speed : '';
		animationData?.className && setDataAnimation({'data-animation': JSON.stringify(animationData)});
		
		
		if(window.gutenkit.screen === "site-editor.php") {
			onScrollAnimateIframe('.gkit-motion-effects', getAnimation);
		} else {
			// function for detecting markup in the viewport and execute the callback
			onScrollAnimate('.gkit-motion-effects', getAnimation);

			// for responsive only
			if(device === 'Tablet' || device === 'Mobile') onScrollAnimateIframe('.gkit-motion-effects', getAnimation);
		}
		
	},[attributes?.motionEffects, device]);

	useEffect(() => {
		if(videoRef.current) {
			videoRef.current.load();
		}
	}, [attributes?.containerBackground?.backgroundVideo]);

	const handleColumn = (nextVariation) => {
		if (nextVariation.attributes) {
			setAttributes(nextVariation.attributes);
		}

		if (nextVariation.innerBlocks && '100' !== nextVariation.name) {
			setAttributes({ variationSeleted: true })
			replaceInnerBlocks(
				clientId,
				createBlocksFromInnerBlocksTemplate(nextVariation.innerBlocks)
			);
		} else {
			setAttributes({ variationSeleted: true })
			replaceInnerBlocks(
				clientId,
				createBlocksFromInnerBlocksTemplate([])
			);
		}

	}

	const createBlocksFromInnerBlocksTemplate = (innerBlocksTemplate) => {

		return innerBlocksTemplate.map(
			([name, attributes, innerBlocks = []]) =>
				createBlock(
					name,
					attributes,
					createBlocksFromInnerBlocksTemplate(innerBlocks)
				)
		);
	};

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

			<HtmlTag {...blockProps} {...dataAnimation}>
				{
					!attributes?.variationSeleted && isParent && <GkitContainerPlaceholder onSelect={handleColumn} />
				}
				{
					attributes?.containerBackground?.backgroundType === 'video' &&
					<div className="gkit-block-video-wrap">
						<video loop autoPlay muted ref={videoRef}>
							<source src={attributes?.containerBackground?.backgroundVideo?.url} type={attributes?.containerBackground?.backgroundVideo?.mime} />
						</video>
					</div>
				}
				{
					attributes?.variationSeleted && attributes?.showContainerOverlay && <div className='gkit-container-overlay'></div>
				}
				{
					attributes?.variationSeleted && <div {...innerBlocksProps}></div>
				}
				{
					attributes?.containerWidth == "gkit-block-custom-wide" && (
						<>
							{
								attributes?.variationSeleted ? (
									<>
										<ContainerResizeHandler showHandle={isSelected} className={'gkit-container-resize-handler gkit-container-resize-handler-right'} currentWidth={gkitResponsiveValue(attributes, "customWidth", device)} responsiveHelper={responsiveHelper} device={device} setAttributes={setAttributes} isParent={isParent}/>
										<ContainerResizeHandler showHandle={isSelected} className='gkit-container-resize-handler gkit-container-resize-handler-left' currentWidth={gkitResponsiveValue(attributes, "customWidth", device)} responsiveHelper={responsiveHelper} device={device} setAttributes={setAttributes} isParent={isParent}/>
									</>
								) : null
							}
						</>
					)
				}
			</HtmlTag>
		</>
	);
}
