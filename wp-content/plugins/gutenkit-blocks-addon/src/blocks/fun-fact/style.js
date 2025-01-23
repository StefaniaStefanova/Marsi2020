const BlockStyle = ( attributes ) => {
	const helpers = window.gutenkit.helpers;
	const {
		parseCSS,
		backgroundGenerator,
		getBoxShadowValue,
		getBoxValue,
		getBorderValue,
		getTypographyValue,
		getSliderValue,
	} = helpers;
	const WRAPPER = attributes.blockClass;

	const rawSyle = {
		desktop: [
			{
				selector: `.${ WRAPPER } .gkit-funfact-inner`,
				'flex-direction': attributes?.iconDirection,
			},
			{
				selector: `.${ WRAPPER }.gkit-funfact`,
				'justify-content': attributes?.contentAlignDesktop,
				'text-align': attributes?.contentAlignDesktop,
			},
			{
				selector: `.${ WRAPPER }.gkit-funfact .funfact-content .number-percentage-wraper`,
				'justify-content': attributes?.contentAlignDesktop,
			},
			{
				selector: `.${ WRAPPER } .funfact-icon`,
				'font-size': getSliderValue( attributes?.iconWidthDesktop ),
				fill: attributes?.iconColor,
			},
			{
				selector: `.${ WRAPPER }:hover .funfact-icon svg`,
				background: backgroundGenerator(
					attributes?.iconHoverBackground
				).background,
				'border-color': attributes?.iconHoverBorderColor,
				'border-radius': getBoxValue(
					attributes?.iconHoverBorderRadiusDesktop
				),
			},
			{
				selector: `.${ WRAPPER }:hover .funfact-icon`,
				fill: attributes?.iconHoverColor,
			},
			{
				selector: `.${ WRAPPER } .funfact-icon svg`,
				transform: `rotate(${ getSliderValue(
					attributes?.iconRotateDesktop
				) })`,
				background: backgroundGenerator( attributes?.iconBackground )
					.background,
				...getBorderValue( attributes?.iconBorder ),
				'border-radius': getBoxValue(
					attributes?.iconBorderRadiusDesktop
				),
				...getBoxValue( attributes?.iconMarginDesktop, 'margin' ),
				padding: getSliderValue( attributes?.iconPaddingDesktop ),
				'box-shadow': getBoxShadowValue( attributes.iconBoxShadow ),
			},
			{
				selector: `.${ WRAPPER } .funfact-content`,
				...getBoxValue( attributes?.contentMarginDesktop, 'margin' ),
			},
			{
				selector: `.${ WRAPPER }.gkit-funfact .funfact-content .number-percentage-wraper`,
				color: attributes?.numberColor,
				...getTypographyValue(
					attributes?.numberTypography,
					'Desktop'
				),
				'margin-bottom': getSliderValue(
					attributes?.numberBottomSpaceDesktop
				),
			},
			{
				selector: `.${ WRAPPER } .number-percentage-wraper .number-percentage`,
				'margin-right': getSliderValue(
					attributes?.numberRightSpaceDesktop
				),
			},
			{
				selector: `.${ WRAPPER } .funfact-title`,
				color: attributes?.titleColor,
				...getTypographyValue( attributes?.titleTypography, 'Desktop' ),
				...getBoxValue( attributes?.titlePaddingDesktop, 'padding' ),
			},
			{
				selector: `.${ WRAPPER } .super`,
				color: attributes?.superColor,
				...getTypographyValue( attributes?.superTypography, 'Desktop' ),
				top: getSliderValue( attributes?.superTopPostionDesktop ),
				'left': getSliderValue(
					attributes?.superHorizontalPostionDesktop
				),
			},
			{
				selector: `.${ WRAPPER }.style-border-bottom.gkit-funfact::before`,
				'background-color': attributes?.hoverBorderColor,
				height: getSliderValue( attributes?.hoverBorderHeight ),
			},
			{
				selector: `.${ WRAPPER }.gkit-funfact:has(.vertical-bar)`,
				'align-items': attributes?.verticalBorderAlignment,
				'flex-direction': attributes?.verticalBorderDirection,
			},
			{
				selector: `.${ WRAPPER } .vertical-bar`,
				'background-color': attributes?.verticalBorderColor,
				height: getSliderValue( attributes?.verticalBorderHeight ),
				width: getSliderValue( attributes?.verticalBorderWidth ),
			},
		],
		tablet: [
			{
				selector: `.${ WRAPPER }.gkit-funfact`,
				'justify-content': attributes?.contentAlignTablet,
				'text-align': attributes?.contentAlignTablet,
			},
			{
				selector: `.${ WRAPPER }.gkit-funfact .funfact-content .number-percentage-wraper`,
				'justify-content': attributes?.contentAlignTablet,
			},
			{
				selector: `.${ WRAPPER } .funfact-icon`,
				'font-size': getSliderValue( attributes?.iconWidthTablet ),
			},
			{
				selector: `.${ WRAPPER }:hover .funfact-icon svg`,
				'border-radius': getBoxValue(
					attributes?.iconHoverBorderRadiusTablet
				),
			},
			{
				selector: `.${ WRAPPER } .funfact-icon svg`,
				transform: `rotate(${ getSliderValue(
					attributes?.iconRotateTablet
				) })`,
				'border-radius': getBoxValue(
					attributes?.iconBorderRadiusTablet
				),
				padding: getSliderValue( attributes?.iconPaddingTablet ),
				...getBoxValue( attributes?.iconMarginTablet, 'margin' ),
			},
			{
				selector: `.${ WRAPPER } .funfact-content`,
				...getBoxValue( attributes?.contentMarginTablet, 'margin' ),
			},
			{
				selector: `.${ WRAPPER }.gkit-funfact .funfact-content .number-percentage-wraper`,
				...getTypographyValue( attributes?.numberTypography, 'Tablet' ),
				'margin-bottom': getSliderValue(
					attributes?.numberBottomSpaceTablet
				),
			},
			{
				selector: `.${ WRAPPER } .number-percentage-wraper .number-percentage`,
				'margin-right': getSliderValue(
					attributes?.numberRightSpaceTablet
				),
			},
			{
				selector: `.${ WRAPPER } .funfact-title`,
				...getTypographyValue( attributes?.titleTypography, 'Tablet' ),
				...getBoxValue( attributes?.titlePaddingTablet, 'padding' ),
			},
			{
				selector: `.${ WRAPPER } .super`,
				...getTypographyValue( attributes?.superTypography, 'Tablet' ),
				top: getSliderValue( attributes?.superTopPostionTablet ),
				'margin-left': getSliderValue(attributes?.superHorizontalPostionTablet),
			},
		],
		mobile: [
			{
				selector: `.${ WRAPPER }.gkit-funfact`,
				'justify-content': attributes?.contentAlignMobile,
				'text-align': attributes?.contentAlignMobile,
			},
			{
				selector: `.${ WRAPPER }.gkit-funfact .funfact-content .number-percentage-wraper`,
				'justify-content': attributes?.contentAlignMobile,
			},
			{
				selector: `.${ WRAPPER } .funfact-icon`,
				'font-size': getSliderValue( attributes?.iconWidthMobile ),
			},
			{
				selector: `.${ WRAPPER }:hover .funfact-icon svg`,
				'border-radius': getBoxValue(
					attributes?.iconHoverBorderRadiusMobile
				),
			},
			{
				selector: `.${ WRAPPER } .funfact-icon svg`,
				transform: `rotate(${ getSliderValue(attributes?.iconRotateMobile) })`,
				'border-radius': getBoxValue(attributes?.iconBorderRadiusMobile),
				padding: getSliderValue( attributes?.iconPaddingMobile ),
				...getBoxValue( attributes?.iconMarginMobile, 'margin' ),
			},
			{
				selector: `.${ WRAPPER } .funfact-content`,
				...getBoxValue( attributes?.contentMarginMobile, 'margin' ),
			},
			{
				selector: `.${ WRAPPER }.gkit-funfact .funfact-content .number-percentage-wraper`,
				...getTypographyValue( attributes?.numberTypography, 'Mobile' ),
				'margin-bottom': getSliderValue(
					attributes?.numberBottomSpaceMobile
				),
			},
			{
				selector: `.${ WRAPPER } .number-percentage-wraper .number-percentage`,
				'margin-right': getSliderValue(
					attributes?.numberRightSpaceMobile
				),
			},
			{
				selector: `.${ WRAPPER } .funfact-title`,
				...getTypographyValue( attributes?.titleTypography, 'Mobile' ),
				...getBoxValue( attributes?.titlePaddingMobile, 'padding' ),
			},
			{
				selector: `.${ WRAPPER } .super`,
				...getTypographyValue( attributes?.superTypography, 'Mobile' ),
				top: getSliderValue( attributes?.superTopPostionMobile ),
				'margin-lefts': getSliderValue(
					attributes?.superHorizontalPostionMobile
				),
			},
		],
	};

	return parseCSS( rawSyle );
};

export default BlockStyle;
