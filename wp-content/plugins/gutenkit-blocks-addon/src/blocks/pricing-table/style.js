/* eslint-disable */

const gutenkitCSS = (attributes) => {
	const helpers = window.gutenkit.helpers;

	const { parseCSS, backgroundGenerator, getBoxShadowValue, getBoxValue, getBorderValue, getTypographyValue, getSliderValue, orderSortedValue } = helpers;
	const WRAPPER = attributes.blockClass;


	const getRepeaterValue = ( repeaterKey ) => {
		const repeaterValue = repeaterKey?.map( ( key, index ) => {
			return [
				{
					selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-content .gkit-pricing-content-icon-${index} `,
					fill: `${key?.featureIconColor} `,
					
				},
			];
		} );
		let CSSVALUE = [];
		repeaterValue.forEach( ( item ) => {
			CSSVALUE = [ ...CSSVALUE, ...item ];
		} );

		return CSSVALUE;
	};

	const rawCSS = {
		desktop: [
			//content
			...getRepeaterValue( attributes?.featuresItems ),
			{
				selector: `.${WRAPPER} .gkit-single-pricing`,
				'text-align': attributes.pricingContainerAlignmentDesktop,
				background: backgroundGenerator(attributes?.pricingContainerColor).background,
			},
			{
				selector: `.${WRAPPER} .gkit-single-pricing .gkit-pricing-header`,
				'text-align': attributes.pricingContainerAlignmentDesktop,
			},
			//  Title
			{
				selector: `.${WRAPPER} .gkit-single-pricing .gkit-pricing-title`,
				margin: getBoxValue(attributes.titleMarginDesktop),
				padding: getBoxValue(attributes.titlePaddingDesktop),
				'text-align': attributes.titleAlignmentDesktop,
				color: attributes.titleTextColor,
				...getTypographyValue(attributes.titleTypography, 'Desktop'),
				...getBorderValue(attributes?.titleBorder),
				'border-radius': getBoxValue(attributes?.titleBorderRadiusDesktop),
			},
			{
				selector: `.${WRAPPER} .gkit-single-pricing:hover .gkit-pricing-title`,
				color: attributes.titleTextHoverColor,
				...getBorderValue(attributes?.titleHoverBorder),
			},
			// Subtitle
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-subtitle`,
				'text-align': attributes.subTitleAlignmentDesktop,
				padding: getBoxValue(attributes.subTitlePaddingDesktop),
				...getBorderValue(attributes?.subTitleBorder),
				'border-radius': getBoxValue(attributes?.subTitleBorderRadiusDesktop),
				...getTypographyValue(attributes.subTitleTypography, 'Desktop'),
				color: attributes.subTitleTextColor,
			},
			{
				selector: `.${WRAPPER} .gkit-single-pricing:hover .gkit-pricing-subtitle`,
				color: attributes.subTitleTextHoverColor,
				...getBorderValue(attributes?.subTitleHoverBorder),

			},
			// price Tags
			{
				selector: `.${WRAPPER} .gkit-single-pricing .gkit-pricing-price-wraper `,
				margin: getBoxValue(attributes.priceTagMarginDesktop),
				padding: getBoxValue(attributes.priceTagPaddingDesktop),
			},
			{
				selector: `.${WRAPPER} .gkit-single-pricing .gkit-pricing-price-wraper .gkit-pricing-tag`,
				right: getSliderValue(attributes?.priceTagContainerDesktop),
				width: getSliderValue(attributes.priceTagWidthDesktop),
				background: backgroundGenerator(attributes?.currencySymbolBgColor).background,
				...getBorderValue(attributes?.priceTagBorder),
				'border-radius': getBoxValue(attributes?.priceTagBorderRadiusDesktop),
				'box-shadow': getBoxShadowValue(attributes.priceTagBoxShadow),
			},
			{
				selector: `.${WRAPPER} .gkit-single-pricing .gkit-pricing-price-wraper .gkit-pricing-price .price`,
				...getTypographyValue(attributes.priceTagTypography, 'Desktop'),
				color: attributes?.currencySymbolTextColor,
			},
			{
				selector: `.${WRAPPER} .gkit-single-pricing:hover .gkit-pricing-price .price`,
				color: attributes?.currencySymbolTextHoverColor,
			},
			{
				selector: `.${WRAPPER} .gkit-single-pricing .gkit-pricing-price .currency`,
				color: attributes.currencySymbolTextColor,
			},
			{
				selector: `.${WRAPPER} .gkit-single-pricing:hover .currency`,
				color: attributes.currencySymbolTextHoverColor,
			},
			{
				selector: `.${WRAPPER} .gkit-single-pricing .gkit-pricing-price .period`,
				color: attributes.priceTagColor,
				...getTypographyValue(attributes.priceTagDurationTypography, 'Desktop'),
				'vertical-align': attributes.priceTagPositionDesktop,
			},
			{
				selector: `.${WRAPPER} .gkit-single-pricing:hover .gkit-pricing-tag`,
				background: backgroundGenerator(attributes?.currencySymbolHoverBgColor).background,
				...getBorderValue(attributes?.priceTagHoverBorder),
			},
			{
				selector: `.${WRAPPER} .gkit-single-pricing:hover .gkit-pricing-price .period`,
				color: attributes.priceTagHoverColor,
			},
			{
				selector: `.${WRAPPER} .gkit-single-pricing .gkit-pricing-price .currency`,
				'vertical-align': attributes.currencySignAlignmentDesktop,
			},

			// Features
			{
				selector: `.${WRAPPER} .gkit-single-pricing .gkit-pricing-content `,
				'text-align': attributes.featuresAlignmentDesktop,
				...getTypographyValue(attributes.featureTypography, 'Desktop'),
				color: attributes.featureTextColor,
				...getBorderValue(attributes?.featuresBorder),
				padding: getBoxValue(attributes.featuresPaddingDesktop),
				margin: getBoxValue(attributes.featuresMarginDesktop),
				'border-radius': getBoxValue(attributes?.featuresBorderRadiusDesktop),
			},
			{
				selector: `.${WRAPPER} .gkit-single-pricing .gkit-pricing-content ul li`,
				...getTypographyValue(attributes.featureTypography, 'Desktop'),
				'justify-content': attributes?.featuresStyle === 'list' && attributes.featuresAlignmentDesktop,
				color: attributes.featureTextColor,
			},
			{
				selector: `.${WRAPPER} .gkit-single-pricing ul li`,
				'justify-content': attributes?.featuresStyle === 'list' && attributes.pricingContainerAlignmentDesktop,
			},
			{
				selector: `.${WRAPPER} .gkit-single-pricing .gkit-pricing-content ul li:not(:last-child)`,
				'margin-bottom': getSliderValue(attributes?.featureListGapDesktop),
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-content .gkit-pricing-content-icon `,
				'margin-right': getSliderValue(attributes?.featuresSpacingDesktop),
				fill: attributes?.featureIconColor,
				'font-size': getSliderValue(attributes?.featureIconSizeDesktop),
			},
			{
				selector: `.${WRAPPER} .gkit-single-pricing:hover .gkit-pricing-content`,
				color: attributes.featureTextHoverColor,
				...getBorderValue(attributes?.featuresHoverBorder),

			},
			{
				selector: `.${WRAPPER} .gkit-single-pricing:hover .gkit-pricing-content ul li`,
				color: attributes.featureTextHoverColor,
			},
			//button
			{
				selector: `.${WRAPPER} .gkit-pricing-btn-wraper .gkit-pricing-btn`,
				width: getSliderValue(attributes.buttonWidthDesktop),
				background: backgroundGenerator(attributes?.buttonBgColor).background,
				padding: getBoxValue(attributes.buttonPaddingDesktop),
				...getBorderValue(attributes?.buttonBorder),
				...getTypographyValue(attributes.buttonTypography, 'Desktop'),
				'box-shadow': getBoxShadowValue(attributes.buttonBoxShadow),
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-btn`,
				'border-radius': getBoxValue(attributes?.buttonBorderRadiusDesktop),
			},

			{
				selector: `.${WRAPPER} .gkit-pricing-btn-wraper `,
				'text-align': attributes.buttonAlignmentDesktop,
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .right`,
				'margin-right': getSliderValue(attributes.pricingTableButtonSpacingDesktop),
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .left`,
				'margin-left': getSliderValue(attributes.pricingTableButtonSpacingDesktop),
			},
			{
				selector: `.${WRAPPER} .gkit-pricing-btn-wraper .gkit-pricing-btn:hover`,
				'border-color': attributes.buttonBorderHoverColor,
				background: backgroundGenerator(attributes?.buttonHoverBgColor).background,
				'box-shadow': getBoxShadowValue(attributes.buttonBoxShadowHover),
				...getBorderValue(attributes?.buttonHoverBorder),
			},
			{
				selector: `.${WRAPPER} .gkit-pricing-btn-wraper .gkit-pricing-btn svg`,
				'font-size': attributes.priceBtnIconSizeDesktop
					? getSliderValue(attributes.priceBtnIconSizeDesktop)
					: undefined,
				fill: attributes.buttonTextColor,
			},
			{
				selector: `.${WRAPPER}  .gkit-pricing-btn span`,
				color: attributes.buttonTextColor,
			},
			{
				selector: `.${WRAPPER}  .gkit-pricing-btn:hover span`,
				color: attributes.buttonHoverTextColor,
			},
			{
				selector: `.${WRAPPER}  .gkit-pricing-btn:hover svg`,
				fill: attributes.buttonHoverTextColor,
			},

			// for custom ordering
			...orderSortedValue(attributes?.orderItems, attributes?.customOrdering, attributes.blockClass),
		],
		tablet: [
			// content
			{
				selector: `.${WRAPPER}  .gkit-single-pricing`,
				'text-align': attributes.pricingContainerAlignmentTablet,
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-header`,
				'text-align': attributes.pricingContainerAlignmentTablet,
			},
			// title
			{
				selector: `.${WRAPPER}   .gkit-single-pricing .gkit-pricing-title`,
				'text-align': attributes.titleAlignmentTablet,
				...getTypographyValue(attributes.titleTypography, 'Tablet'),
				padding: getBoxValue(attributes.titlePaddingTablet),
				margin: getBoxValue(attributes.titleMarginTablet),
				'border-radius': getBoxValue(attributes?.titleBorderRadiusTablet),
			},
			// subtitle
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-subtitle`,
				'text-align': attributes.subTitleAlignmentTablet,
				padding: getBoxValue(attributes.subTitlePaddingTablet),
				'border-radius': getBoxValue(attributes?.subTitleBorderRadiusTablet),
				...getTypographyValue(attributes.subTitleTypography, 'Tablet'),
			},
			// price Tags
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-price-wraper .gkit-pricing-tag`,
				right: getSliderValue(attributes?.priceTagContainerTablet),
				width: `${getSliderValue(attributes.priceTagWidthTablet)}`,
				'border-radius': getBoxValue(attributes?.priceTagBorderRadiusTablet),
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-price-wraper`,
				padding: getBoxValue(attributes.priceTagPaddingTablet),
				margin: getBoxValue(attributes.priceTagMarginTablet),
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-price-wraper .gkit-pricing-price .price`,
				...getTypographyValue(attributes.priceTagTypography, 'Tablet'),
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-price .period`,
				color: attributes.priceTagColor,
				...getTypographyValue(attributes.priceTagDurationTypography, 'Tablet'),
				'vertical-align': attributes.priceTagPositionTablet,
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-price .currency`,
				'vertical-align': attributes.currencySignAlignmentTablet,
			},

			// Features
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-content `,
				'text-align': attributes.featuresAlignmentTablet,
				...getTypographyValue(attributes.featureTypography, 'Tablet'),
				padding: getBoxValue(attributes.featuresPaddingTablet),
				margin: getBoxValue(attributes.featuresMarginTablet),
				'border-radius': getBoxValue(attributes?.featuresBorderRadiusTablet),
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-content .gkit-pricing-content-icon `,
				'margin-right': getSliderValue(attributes?.featuresSpacingTablet),
				'font-size': getSliderValue(attributes?.featureIconSizeTablet),
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-content ul li`,
				...getTypographyValue(attributes.featureTypography, 'Tablet'),
				'justify-content': attributes?.featuresStyle === 'list' && attributes.featuresAlignmentTablet,
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-content ul li:not(:last-child)`,
				'margin-bottom': getSliderValue(attributes?.featureListGapTablet),
			},
			//button
			{
				selector: `.${WRAPPER} .gkit-pricing-btn-wraper .gkit-pricing-btn`,
				width: getSliderValue(attributes.buttonWidthTablet),
				padding: getBoxValue(attributes.buttonPaddingTablet),
				...getTypographyValue(attributes.buttonTypography, 'Tablet'),
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-btn`,
				'border-radius': getBoxValue(attributes?.buttonBorderRadiusTablet),
			},
			{
				selector: `.${WRAPPER} .gkit-pricing-btn-wraper `,
				'text-align': attributes.buttonAlignmentTablet,
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .right`,
				'margin-right': getSliderValue(attributes.pricingTableButtonSpacingTablet),
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .left`,
				'margin-left': getSliderValue(attributes.pricingTableButtonSpacingTablet),
			},
			{
				selector: `.${WRAPPER} .gkit-pricing-btn-wraper .gkit-pricing-btn svg`,
				'font-size': attributes.priceBtnIconSizeTablet
					? getSliderValue(attributes.priceBtnIconSizeTablet)
					: '',
			},
		],
		mobile: [
			//content
			{
				selector: `.${WRAPPER}  .gkit-single-pricing`,
				'text-align': attributes.pricingContainerAlignmentMobile,
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-header`,
				'text-align': attributes.pricingContainerAlignmentMobile,
			},
			// title
			{
				selector: `.${WRAPPER}   .gkit-single-pricing .gkit-pricing-title`,
				'text-align': attributes.titleAlignmentMobile,
				padding: getBoxValue(attributes.titlePaddingMobile),
				margin: getBoxValue(attributes.titleMarginMobile),
				...getTypographyValue(attributes.titleTypography, 'Mobile'),
				'border-radius': getBoxValue(attributes?.titleBorderRadiusMobile),
			},
			// Subtitle
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-subtitle`,
				'text-align': attributes.subTitleAlignmentMobile,
				padding: getBoxValue(attributes.subTitlePaddingMobile),
				'border-radius': getBoxValue(attributes?.subTitleBorderRadiusMobile),
				...getTypographyValue(attributes.subTitleTypography, 'Mobile'),
			},
			// price Tags
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-price-wraper`,
				padding: getBoxValue(attributes.priceTagPaddingMobile),
				margin: getBoxValue(attributes.priceTagMarginMobile),
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-price-wraper .gkit-pricing-tag`,
				right: getSliderValue(attributes?.priceTagContainerMobile),
				width: getSliderValue(attributes.priceTagWidthMobile),
				'border-radius': getBoxValue(attributes?.priceTagBorderRadiusMobile),
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-price-wraper .gkit-pricing-price .price`,
				...getTypographyValue(attributes.priceTagTypography, 'Mobile'),
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-price .period`,
				color: attributes.priceTagColor,
				...getTypographyValue(attributes.priceTagDurationTypography, 'Mobile'),
				'vertical-align': attributes.priceTagPositionMobile,
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-price .currency`,
				'vertical-align': attributes.currencySignAlignmentMobile,
			},
			// Features
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-content `,
				'text-align': attributes.featuresAlignmentMobile,
				'justify-content': attributes?.featuresStyle === 'list' && attributes.featuresAlignmentMobile,
				...getTypographyValue(attributes.featureTypography, 'Mobile'),
				padding: getBoxValue(attributes.featuresPaddingMobile),
				margin: getBoxValue(attributes.featuresMarginMobile),
				'border-radius': getBoxValue(attributes?.featuresBorderRadiusMobile),
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-content .gkit-pricing-content-icon `,
				'margin-right': getSliderValue(attributes?.featuresSpacingMobile),
				'font-size': getSliderValue(attributes?.featureIconSizeMobile),
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-content ul li`,
				...getTypographyValue(attributes.featureTypography, 'Mobile'),
				'justify-content': attributes?.featuresStyle === 'list' && attributes.featuresAlignmentMobile,
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-content ul li:not(:last-child)`,
				'margin-bottom': getSliderValue(attributes?.featureListGapMobile),
			},
			//button
			{
				selector: `.${WRAPPER} .gkit-pricing-btn-wraper .gkit-pricing-btn`,
				width: getSliderValue(attributes.buttonWidthMobile),
				padding: getBoxValue(attributes.buttonPaddingMobile),
				...getTypographyValue(attributes.buttonTypography, 'Mobile'),
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .gkit-pricing-btn`,
				'border-radius': getBoxValue(attributes?.buttonBorderRadiusMobile),
			},
			{
				selector: `.${WRAPPER} .gkit-pricing-btn-wraper `,
				'text-align': attributes.buttonAlignmentMobile,
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .right`,
				'margin-right': getSliderValue(attributes.pricingTableButtonSpacingMobile),
			},
			{
				selector: `.${WRAPPER}  .gkit-single-pricing .left`,
				'margin-left': getSliderValue(attributes.pricingTableButtonSpacingMobile),
			},
			{
				selector: `.${WRAPPER} .gkit-pricing-btn-wraper .gkit-pricing-btn svg`,
				'font-size': attributes.priceBtnIconSizeMobile
					? getSliderValue(attributes.priceBtnIconSizeMobile)
					: undefined,
			},
		],
	};

	return parseCSS(rawCSS);
};

export { gutenkitCSS };
