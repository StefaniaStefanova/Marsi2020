import { useBlockProps, RichText } from '@wordpress/block-editor';
import { FeatureListMarkup, ButtonMarkup } from './markup';

export default function save( { attributes } ) {
	const blockProps = useBlockProps.save( {
		className: 'gkit-pricing-table',
	} );
	const { GkitIcon, GkitImage } = window.gutenkit.components;
	const {
		titleText,
		subTitleText,
		headerIcon,
		headerImage,
		headerIconOrImage,
		htmlTag,
		currency,
		price,
		duration,
		currencyPosition,
		featuresStyle,
		featuresText,
	} = attributes;

	return (
		<div { ...blockProps }>
			<div className="gkit-single-pricing  ">
				<div className="gkit-pricing-header">
					{ headerIconOrImage === 'icon' && headerIcon && (
						<span>
							<GkitIcon icon={ headerIcon } />
						</span>
					) }
					{ headerIconOrImage === 'image' && headerImage && (
						<GkitImage image={ headerImage } />
					) }
					{ titleText?.length > 0 && (
						<RichText.Content
							identifier="title"
							tagName={ htmlTag }
							value={ titleText }
							className="gkit-pricing-title"
						/>
					) }
					{ subTitleText?.length > 0 && (
						<RichText.Content
							identifier="subtitle"
							tagName="p"
							value={ subTitleText }
							className="gkit-pricing-subtitle"
						/>
					) }
				</div>

				{ currency && price && (
					<div className="gkit-pricing-price-wraper">
						<div className="gkit-pricing-tag"></div>
						<div className="gkit-pricing-price">
							{ currencyPosition !== 'end' && (
								<RichText.Content
									identifier="currency-before"
									tagName="sup"
									value={ currency }
									className="currency"
								/>
							) }
							<RichText.Content
								identifier="price-tag"
								tagName="span"
								value={ price }
								className="price"
							/>
							{ currencyPosition === 'end' && (
								<RichText.Content
									identifier="currency-after"
									tagName="sup"
									value={ currency }
									className="currency"
								/>
							) }
							<RichText.Content
								identifier="duration"
								tagName="sub"
								value={ duration }
								className="period"
							/>
						</div>
					</div>
				) }

				{ featuresStyle !== 'list' ? (
					<div className="gkit-pricing-content ">
						{ featuresText && (
							<RichText.Content
								identifier="price-paragraph"
								tagName="p"
								value={ featuresText }
							/>
						) }
					</div>
				) : (
					<FeatureListMarkup attributes={ attributes } />
				) }

				<ButtonMarkup attributes={ attributes } isEdit={ false } />
			</div>
		</div>
	);
}
