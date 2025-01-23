
import { useBlockProps, RichText } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
export default function save({ attributes }) {
	const { dropcapsText } = attributes;
	const blockProps = useBlockProps.save();

	return (
		<div {...blockProps}>
			<RichText.Content
				identifier="content"
				tagName='p'
				value={dropcapsText}
				className='gkit-dropcap-content'
			/>
		</div>
	);
}
