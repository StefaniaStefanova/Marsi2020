import { RichText } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

const Markup = ( { attributes, setAttributes, isEdit, animationData } ) => {
	const { GkitIcon } = window.gutenkit.components;

	return (
		<>
			{ attributes.enableVerticalBorder && (
				<div className="vertical-bar"></div>
			) }
			<div
				id={ `gkit-funfact-${ attributes?.blockID }` }
				className="gkit-funfact-inner"
				data-animation={ JSON.stringify( animationData ) }
			>
				{ attributes?.addIcon && (
					<div className="funfact-icon">
						<GkitIcon icon={ attributes.icon } />
					</div>
				) }
				<div className="funfact-content">
					<div className="number-percentage-wraper">
						<span className="number-percentage">0</span>
						{ isEdit && attributes.enablePrefix && (
							<RichText
								identifier="prefix"
								tagName="span"
								value={ attributes?.prefix }
								onChange={ ( value ) => {
									setAttributes( { prefix: value } );
								} }
								placeholder={ __( '$', 'gutenkit' ) }
								className="prefix"
							/>
						) }
						{ ! isEdit && attributes.enablePrefix && (
							<RichText.Content
								identifier="prefix"
								tagName="span"
								value={ attributes?.prefix }
								className="prefix"
							/>
						) }
						{ isEdit && attributes.enableSuffix && (
							<RichText
								identifier="suffix"
								tagName="span"
								value={ attributes?.suffix }
								onChange={ ( value ) => {
									setAttributes( { suffix: value } );
								} }
								placeholder={ __( 'M', 'gutenkit' ) }
								className="suffix"
							/>
						) }
						{ ! isEdit && attributes.enableSuffix && (
							<RichText.Content
								identifier="suffix"
								tagName="span"
								value={ attributes?.suffix }
								className="suffix"
							/>
						) }
						{ isEdit && attributes.enableSuper && (
							<RichText
								identifier="super"
								tagName="span"
								value={ attributes?.super }
								onChange={ ( value ) => {
									setAttributes( { super: value } );
								} }
								placeholder={ __( '+', 'gutenkit' ) }
								className="super"
							/>
						) }
						{ ! isEdit && attributes.enableSuper && (
							<RichText.Content
								identifier="super"
								tagName="span"
								value={ attributes?.super }
								className="super"
							/>
						) }
					</div>
					{ isEdit && attributes.enableHeading && (
						<RichText
							identifier="heading"
							tagName={ attributes?.headerTag }
							value={ attributes?.heading }
							onChange={ ( value ) => {
								setAttributes( { heading: value } );
							} }
							placeholder={ __(
								'This is the heading',
								'gutenkit'
							) }
							className="funfact-title"
						/>
					) }
					{ ! isEdit && attributes.enableHeading && (
						<RichText.Content
							identifier="heading"
							tagName={ attributes?.headerTag }
							value={ attributes?.heading }
							className="funfact-title"
						/>
					) }
				</div>
			</div>
		</>
	);
};

export default Markup;
