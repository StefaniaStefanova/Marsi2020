import { useBlockProps } from '@wordpress/block-editor';
import { useEffect, useState } from '@wordpress/element';
import Settings from './settings';
import classNames from 'classnames';
import './editor.scss';
import Markup from './markup';
import handleAnimation from './Event';

export default function Edit( { attributes, setAttributes, advancedControl } ) {
	const { GkitStyle } = window.gutenkit.components;
	const { useDeviceType, onScrollAnimateIframe, onScrollAnimate } =
		window.gutenkit.helpers;
	const device = useDeviceType();
	const [ animationData, setAnimationData ] = useState( {
		endTime: attributes.number?.size,
		duration: attributes?.duration?.size,
		style: attributes?.style,
	} );
	const blockProps = useBlockProps( {
		className: classNames(
			{ 'style-border-bottom': attributes.enableHoverBorder },
			{
				hover_from_left:
					attributes.enableHoverBorder &&
					attributes.hoverBorderDirection === 'left',
			},
			'gkit-funfact'
		),
	} );

	useEffect( () => {
		const debounceDelay = 300;
		let timer;

		// Debounced version of the update function
		const debouncedUpdate = ( endTime, duration, style ) => {
			clearTimeout( timer );
			timer = setTimeout( () => {
				setAnimationData( {
					endTime,
					duration,
					style,
				} );

				if ( document.getElementsByTagName( 'iframe' ).length > 0 ) {
					// function for detecting markup in the viewport of iframe and execute the callback
					onScrollAnimateIframe( '.gkit-funfact-inner', ( entry ) => {
						handleAnimation( entry, true );
					} );
				} else {
					// function for detecting markup in the viewport and execute the callback
					onScrollAnimate( '.gkit-funfact-inner', ( entry ) => {
						handleAnimation( entry, true );
					} );
				}
			}, debounceDelay );
		};

		// Call the debounced function with the updated value
		debouncedUpdate(
			attributes.number,
			attributes.duration?.size,
			attributes.style
		);

		// Cleanup function to cancel the debounce timer on unmount
		return () => {
			clearTimeout( timer );
		};
	}, [
		attributes.number,
		attributes.duration?.size,
		attributes.style,
		device,
	] );

	return (
		<>
			<GkitStyle blocksCSS={ attributes?.blocksCSS } />

			<Settings
				attributes={ attributes }
				setAttributes={ setAttributes }
				device={ device }
				advancedControl={ advancedControl }
			/>

			<div { ...blockProps }>
				<Markup
					attributes={ attributes }
					setAttributes={ setAttributes }
					isEdit={ true }
					animationData={ animationData }
				/>
			</div>
		</>
	);
}
