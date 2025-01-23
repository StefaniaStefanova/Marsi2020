
import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import Markup from './markup';
export default function save({ attributes }) {

	const blockProps = useBlockProps.save();

	return (
		<div {...blockProps}>
			<Markup attributes={attributes} />
		</div>
	);
}
