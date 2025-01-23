import { useBlockProps } from '@wordpress/block-editor';
import classNames from 'classnames';
import Markup from './markup';

export default function save({ attributes, clientId }) {
	const { GkitIcon } = window.gutenkit.components;
	const { btnAppearance, btnIcon, btnText, offsetTop, showBtnOnScroll, scrolledValue, lineFgColor, lineBgColor, blockID } = attributes;

	const options = {
		style: btnAppearance,
		offset_top: offsetTop,
		show_scroll: showBtnOnScroll,
		show_after: scrolledValue,
		foreground: lineFgColor,
		background: lineBgColor,
	};

	const blockProps = useBlockProps.save({
		className: classNames(
			btnAppearance,
			{
				[`show-on-scroll`]: showBtnOnScroll
			}
		)
	});

	return (
		<div {...blockProps}>
			<Markup attributes={attributes} options={options} clientId={clientId}/>
		</div>
	);
}
