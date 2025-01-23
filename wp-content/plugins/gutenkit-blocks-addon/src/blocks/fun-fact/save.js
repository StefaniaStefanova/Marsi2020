import { useBlockProps } from '@wordpress/block-editor';
import Markup from './markup';

export default function save( { attributes } ) {
	const blockProps = useBlockProps.save( {
		className: 'gkit-funfact',
	} );

	const animationData = {
		endTime: attributes.number,
		duration: attributes?.duration?.size,
		style: attributes?.style,
	};

	return (
		<div { ...blockProps }>
			<Markup
				attributes={ attributes }
				isEdit={ false }
				animationData={ animationData }
			/>
		</div>
	);
}
