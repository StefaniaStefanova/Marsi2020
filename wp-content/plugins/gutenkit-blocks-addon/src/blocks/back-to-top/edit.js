import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { useRef, useEffect } from '@wordpress/element';
import Settings from './settings';
import classNames from 'classnames'
import './editor.scss';
import { clickHandler, scrollHandler, progressBarHandler } from './Event';
import Markup from './markup';


export default function Edit({ attributes, setAttributes, clientId, advancedControl }) {
	const { GkitStyle, GkitIcon } = window.gutenkit.components;
	const { useDeviceType } = window.gutenkit.helpers;

	const { btnAppearance, btnIcon, btnText, offsetTop, showBtnOnScroll, scrolledValue, lineFgColor, lineBgColor } = attributes;

	const options = {
		style: btnAppearance,
		offset_top: offsetTop,
		show_scroll: showBtnOnScroll,
		show_after: scrolledValue,
		foreground: lineFgColor,
		background: lineBgColor,
	};

	const ref = useRef(null);

	const blockProps = useBlockProps({
		className: classNames(
			btnAppearance,
			{
				[`show-on-scroll`]: showBtnOnScroll
			}
		),
		ref
	});

	const device = useDeviceType();

	useEffect(() => {
		// Get a relative document object from `ref`.
		const { ownerDocument } = ref.current;
		const btn = ref.current.querySelector('span');

		// click event
		btn.addEventListener('click', (e) => {
			clickHandler(btn, options);
		});

		// on scroll event
		ownerDocument.addEventListener('scroll', (e) => {
			if (options?.show_scroll) {
				scrollHandler(btn, options);
			}

			if (options?.style === 'progress-indicator') {
				progressBarHandler(btn, options);
			}
		}, true);

		// trigger on initial render
		if (options?.style === 'progress-indicator') {
			progressBarHandler(btn, options);
		}
	}, [btnAppearance, offsetTop, showBtnOnScroll, scrolledValue, lineFgColor, lineBgColor]);

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
				<Markup attributes={attributes} options={options} clientId={clientId}/>
			</div>
		</>
	);
}
