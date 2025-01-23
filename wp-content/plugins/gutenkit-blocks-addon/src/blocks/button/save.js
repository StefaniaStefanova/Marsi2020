import { useBlockProps } from '@wordpress/block-editor';
import classNames from 'classnames';
import Markup from './markup';

export default function save({ attributes }) {
	const { linkGenerator } = window.gutenkit.helpers;
	const { url, btnClass, btnID } = attributes;
	const blockProps = useBlockProps.save();
	let buttonProps = {
		className: classNames('gkit-btn', { [btnClass]: btnClass })
	}
	btnID ? buttonProps.id = btnID : '';
	const linkAttributes = linkGenerator(url);

	return (
		<div {...blockProps}>
			<div className="gkit-btn-wraper">
				<a className='gkit-btn' {...linkAttributes} {...buttonProps}>
					<Markup attributes={attributes} />
				</a>
			</div>
		</div>
	);
}
