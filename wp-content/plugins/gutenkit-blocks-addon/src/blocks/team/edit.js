import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import Settings from './settings';
import './editor.scss';
import Markup from './parts/markup';
import { useRef, useEffect } from '@wordpress/element';
import { useMergeRefs } from '@wordpress/compose';
import classnames from 'classnames'
import {handleEvent} from './Event';

export default function Edit({ attributes, setAttributes, advancedControl }) {
	const { GkitStyle } = window.gutenkit.components;
	const { useDeviceType } = window.gutenkit.helpers;
	const teamRef = useRef(null);
	const blockProps = useBlockProps({
		className: classnames({[`gkit-animation-${attributes?.hoverAnimation?.effect?.value}`]: attributes?.hoverAnimationSwitch}),
		ref: useMergeRefs([teamRef]),
	});
	const device = useDeviceType();

	useEffect(() => {
		const team = teamRef.current;

		if (attributes.enablePopup) {
			handleEvent(team, true, true);
		} else {
			handleEvent(team, false, true);
		}
	}, [attributes.enablePopup, attributes.style]);

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

			<div {...blockProps} data-team-popup={attributes.enablePopup}>
				<Markup attributes={attributes} isEdit={true} teamRef={teamRef}/>
			</div>
		</>
	);
}
