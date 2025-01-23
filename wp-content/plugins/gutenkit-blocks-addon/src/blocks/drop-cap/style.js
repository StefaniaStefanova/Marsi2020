const DropCapStyle = (attributes) => {
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
				selector: `.${WRAPPER} .gkit-dropcap-content`,
				'color': attributes.contentColor,
				...getTypographyValue(attributes.contentTypography, 'Desktop'),
			},
			{
				selector: `.${WRAPPER} .gkit-dropcap-content:first-child:first-letter`,
				'color': attributes.contentDropcapsColor,
				...getTypographyValue(attributes.contentDropcapsTypography, 'Desktop'),
				'background': backgroundGenerator(attributes?.contentDropcapsBackground).background,
				'padding': getBoxValue(attributes.contentDropcapsPaddingDesktop),
				'margin': getBoxValue(attributes.contentDropcapsMarginDesktop),
				...getBorderValue(attributes.contentDropcapsBorder),
				'border-radius': getBoxValue(attributes.contentDropcapsBorderRadiusDesktop),
			},
		],
		tablet: [
			{
				selector: `.${WRAPPER} .gkit-dropcap-content`,
				...getTypographyValue(attributes.contentTypography, 'Tablet'),
			},
			{
				selector: `.${WRAPPER} .gkit-dropcap-content:first-child:first-letter`,
				...getTypographyValue(attributes.contentDropcapsTypography, 'Tablet'),
				'padding': getBoxValue(attributes.contentDropcapsPaddingTablet),
				'margin': getBoxValue(attributes.contentDropcapsMarginTablet),
				'border-radius': getBoxValue(attributes.contentDropcapsBorderRadiusTablet),
			},
		],
		mobile: [
			{
				selector: `.${WRAPPER} .gkit-dropcap-content`,
				...getTypographyValue(attributes.contentTypography, 'Mobile'),
			},
			{
				selector: `.${WRAPPER} .gkit-dropcap-content:first-child:first-letter`,
				...getTypographyValue(attributes.contentDropcapsTypography, 'Mobile'),
				'padding': getBoxValue(attributes.contentDropcapsPaddingMobile),
				'margin': getBoxValue(attributes.contentDropcapsMarginMobile),
				'border-radius': getBoxValue(attributes.contentDropcapsBorderRadiusMobile),
			},
		]
	}
	return parseCSS(rawSyle);
}

export default DropCapStyle;
