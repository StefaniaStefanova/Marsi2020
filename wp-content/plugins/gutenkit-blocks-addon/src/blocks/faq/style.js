const FaqStyle = (attributes) => {
	const {
		parseCSS,
		backgroundGenerator,
		getBoxValue,
		getBorderValue,
		getTypographyValue,
	} = window.gutenkit.helpers;

	const WRAPPER = attributes?.blockClass;

	const rawSyle = {
		desktop: [
			{
				selector: `.${WRAPPER} .gkit-faq .gkit-faq-item .gkit-faq-item-header`,
				'color': attributes?.gkitFaqTitleColor,
				'background': backgroundGenerator(attributes?.gkitFaqTitleBackgroundGroup, "Desktop").background,
				'background-size': backgroundGenerator(attributes?.gkitFaqTitleBackgroundGroup, "Desktop").size,
				...getBorderValue(attributes?.gkitFaqTitleBorderGroup),
				...getTypographyValue(attributes?.gkitFaqTitleTypographyGroup, "Desktop"),
				'border-radius': getBoxValue(attributes?.gkitFaqBorderRadiusDesktop),
				'padding': getBoxValue(attributes?.gkitFaqTitlePaddingDesktop),
				'margin': getBoxValue(attributes?.gkitFaqTitleMarginDesktop),
			},
			{
				selector: `.${WRAPPER} .gkit-faq .gkit-faq-item .gkit-faq-item-body`,
				'color': attributes?.gkitFaqContentColor,
				'background': backgroundGenerator(attributes?.gkitFaqContentBackgroundGroup, "Desktop").background,
				'background-size': backgroundGenerator(attributes?.gkitFaqContentBackgroundGroup, "Desktop").size,
				...getBorderValue(attributes?.gkitFaqContentBorderGroup),
				...getTypographyValue(attributes?.gkitFaqContentTypographyGroup, "Desktop"),
				'border-radius': getBoxValue(attributes?.gkitFaqContentBorderRadiusDesktop),
				'padding': getBoxValue(attributes?.gkitFaqContentPaddingDesktop),
				'margin': getBoxValue(attributes?.gkitFaqContentMarginDesktop),
			},
		],
		tablet: [
			{
				selector: `.${WRAPPER} .gkit-faq .gkit-faq-item .gkit-faq-item-header`,
				'background': backgroundGenerator(attributes?.gkitFaqTitleBackgroundGroup, "Tablet").background,
				'background-size': backgroundGenerator(attributes?.gkitFaqTitleBackgroundGroup, "Tablet").size,
				...getTypographyValue(attributes?.gkitFaqTitleTypographyGroup, "Tablet"),
				'border-radius': getBoxValue(attributes?.gkitFaqBorderRadiusTablet),
				'padding': getBoxValue(attributes?.gkitFaqTitlePaddingTablet),
				'margin': getBoxValue(attributes?.gkitFaqTitleMarginTablet),
			},
			{
				selector: `.${WRAPPER} .gkit-faq .gkit-faq-item .gkit-faq-item-body`,
				'background': backgroundGenerator(attributes?.gkitFaqContentBackgroundGroup, "Tablet").background,
				'background-size': backgroundGenerator(attributes?.gkitFaqContentBackgroundGroup, "Tablet").size,
				...getTypographyValue(attributes?.gkitFaqContentTypographyGroup, "Tablet"),
				'border-radius': getBoxValue(attributes?.gkitFaqContentBorderRadiusTablet),
				'padding': getBoxValue(attributes?.gkitFaqContentPaddingTablet),
				'margin': getBoxValue(attributes?.gkitFaqContentMarginTablet),
			},
		],
		mobile: [
			{
				selector: `.${WRAPPER} .gkit-faq .gkit-faq-item .gkit-faq-item-header`,
				'background': backgroundGenerator(attributes?.gkitFaqTitleBackgroundGroup, "Mobile").background,
				'background-size': backgroundGenerator(attributes?.gkitFaqTitleBackgroundGroup, "Mobile").size,
				...getTypographyValue(attributes?.gkitFaqTitleTypographyGroup, "Mobile"),
				'border-radius': getBoxValue(attributes?.gkitFaqBorderRadiusMobile),
				'padding': getBoxValue(attributes?.gkitFaqTitlePaddingMobile),
				'margin': getBoxValue(attributes?.gkitFaqTitleMarginMobile),
			},
			{
				selector: `.${WRAPPER} .gkit-faq .gkit-faq-item .gkit-faq-item-body`,
				'background': backgroundGenerator(attributes?.gkitFaqContentBackgroundGroup, "Mobile").background,
				'background-size': backgroundGenerator(attributes?.gkitFaqContentBackgroundGroup, "Mobile").size,
				...getTypographyValue(attributes?.gkitFaqContentTypographyGroup, "Mobile"),
				'border-radius': getBoxValue(attributes?.gkitFaqContentBorderRadiusMobile),
				'padding': getBoxValue(attributes?.gkitFaqContentPaddingMobile),
				'margin': getBoxValue(attributes?.gkitFaqContentMarginMobile),
			},
		]
	}
	return parseCSS(rawSyle);
}

export default FaqStyle;
