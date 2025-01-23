import { useBlockProps } from '@wordpress/block-editor';
import classnames from 'classnames'
import Markup from './parts/markup';

export default function save({ attributes }) {
	const blockProps = useBlockProps.save({
		className: classnames({[`gkit-animation-${attributes?.hoverAnimation?.effect?.value}`]: attributes?.hoverAnimationSwitch}),
	});

	return (
		<div {...blockProps} data-team-popup={attributes.enablePopup}>
			<Markup attributes={attributes}  isEdit={false} teamRef={null}/>
		</div>
	);
}
