import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import classnames from 'classnames';
import Settings from './settings';
import './editor.scss';
import { FeatureListMarkup, ButtonMarkup } from './markup';

export default function Edit( { attributes, setAttributes, advancedControl } ) {
	const { GkitStyle, GkitIcon, GkitImage } = window.gutenkit.components;
	const { useDeviceType } = window.gutenkit.helpers;
	const device = useDeviceType();
	const editor = wp?.editor;

	const blockProps = useBlockProps( {
		className: classnames( { [ `gkit-pricing-table` ]: true } ),
	} );

	const {
		titleText,
		subTitleText,
		headerIcon,
		headerImage,
		headerIconOrImage,
		htmlTag,
		featuresStyle,
		featuresText,
		currency,
		price,
		duration,
		currencyPosition,
	} = attributes;

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
				<div className="gkit-single-pricing  ">
					<div className="gkit-pricing-header">
						{ headerIconOrImage === 'icon' && headerIcon && (
							<span>
								<GkitIcon icon={ headerIcon } />
							</span>
						) }
						{ headerIconOrImage === 'image' && (
							<GkitImage image={ headerImage } />
						) }
						<RichText
							identifier="title"
							tagName={ htmlTag }
							value={ titleText }
							onChange={ ( value ) => {
								setAttributes( { titleText: value } );
							} }
							placeholder={ __( 'Enter your title here…' ) }
							className="gkit-pricing-title"
						/>

						<RichText
							identifier="subtitle"
							tagName="p"
							value={ subTitleText }
							onChange={ ( value ) => {
								setAttributes( { subTitleText: value } );
							} }
							placeholder={ __( 'Enter your subtitle here…' ) }
							className="gkit-pricing-subtitle"
						/>
					</div>

					<div className="gkit-pricing-price-wraper">
						<div className="gkit-pricing-tag"></div>
						<div className="gkit-pricing-price">
							{ currencyPosition !== 'end' && (
								<RichText
									identifier="currency-before"
									placeholder={ __( '$' ) }
									tagName="sup"
									value={ currency }
									onChange={ ( value ) => {
										setAttributes( { currency: value } );
									} }
									className="currency"
								/>
							) }
							<RichText
								identifier="price-tag"
								tagName="span"
								placeholder={ __( '5.99' ) }
								value={ price }
								onChange={ ( value ) => {
									setAttributes( { price: value } );
								} }
								className="price"
							/>
							{ currencyPosition === 'end' && (
								<RichText
									identifier="currency-after"
									tagName="sup"
									placeholder={ __( '$' ) }
									value={ currency }
									onChange={ ( value ) => {
										setAttributes( { currency: value } );
									} }
									className="currency"
								/>
							) }
							<RichText
								identifier="duration"
								tagName="sub"
								placeholder={ __( 'month' ) }
								value={ duration }
								onChange={ ( value ) => {
									setAttributes( { duration: value } );
								} }
								className="period"
							/>
						</div>
					</div>

					{ featuresStyle !== 'list' ? (
						<div className="gkit-pricing-content ">
							<RichText
								identifier="price-paragraph"
								tagName="p"
								value={ featuresText }
								placeholder={ __( 'Enter your content here…' ) }
								onChange={ ( value ) => {
									setAttributes( { featuresText: value } );
								} }
							/>
						</div>
					) : (
						<FeatureListMarkup
							attributes={ attributes }
							editor={ editor }
						/>
					) }

					<ButtonMarkup attributes={ attributes } isEdit={ true } />
				</div>
			</div>
		</>
	);
}
