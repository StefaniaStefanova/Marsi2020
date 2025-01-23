const gutenkitCSS = (attributes) => {
	const {
		parseCSS,
		backgroundGenerator,
		getBoxShadowValue,
		getBoxValue,
		getBorderValue,
		getTypographyValue,
		getSliderValue
	} = window.gutenkit.helpers;

	const WRAPPER = attributes.blockClass;
	const rawCSS = {
		desktop: [
			{
				selector: `.${WRAPPER}`,
				'text-align': attributes.alignDesktop,
			},
			{
				selector: `.${WRAPPER} span`,
				'width': attributes.widthDesktop ? getSliderValue(attributes.widthDesktop) : undefined,
				'height': attributes.heightDesktop ? getSliderValue(attributes.heightDesktop) : undefined,
				'color': attributes.textColor,
				'background': backgroundGenerator(attributes?.bgColor).background,
				...getBorderValue(attributes?.borderDesktop),
				'border-radius': getBoxValue(attributes?.borderRadiusDesktop),
				'box-shadow': getBoxShadowValue(attributes.boxShadow)
			},
			{
				selector: `.${WRAPPER} span:hover`,
				'color': attributes.hoverColor,
				'background': backgroundGenerator(attributes?.bgHoverColor).background,
				...getBorderValue(attributes?.hoverBorderDesktop),
				'border-radius': getBoxValue(attributes?.hoverBorderRadiusDesktop),
				'box-shadow': getBoxShadowValue(attributes.hoverBoxShadow)
			},
			{
				selector: `.${WRAPPER} .icon-wrapper`,
				'font-size': attributes.iconSizeDesktop ? getSliderValue(attributes.iconSizeDesktop) : undefined,
			},
			{
				selector: `.${WRAPPER}.text-only span`,
				...getTypographyValue(attributes.typography, 'Desktop'),
			},
		],
		tablet: [
			{
				selector: `.${WRAPPER}`,
				'text-align': attributes?.alignTablet,
			},
			{
				selector: `.${WRAPPER} span`,
				'width': attributes.widthTablet ? getSliderValue(attributes.widthTablet) : undefined,
				'height': attributes.heightTablet ? getSliderValue(attributes.heightTablet) : undefined,
				...getBorderValue(attributes?.borderTablet),
				'border-radius': getBoxValue(attributes?.borderRadiusTablet),
			},
			{
				selector: `.${WRAPPER} span:hover`,
				...getBorderValue(attributes?.hoverBorderTablet),
				'border-radius': getBoxValue(attributes?.hoverBorderRadiusTablet),
			},
			{
				selector: `.${WRAPPER} .icon-wrapper`,
				'font-size': attributes.iconSizeTablet ? getSliderValue(attributes.iconSizeTablet) : undefined,
			},
			{
				selector: `.${WRAPPER}.text-only span`,
				...getTypographyValue(attributes.typography, 'Tablet'),
			},
		],
		mobile: [
			{
				selector: `.${WRAPPER}`,
				'text-align': attributes.alignMobile,
			},
			{
				selector: `.${WRAPPER} span`,
				'width': attributes.widthMobile ? getSliderValue(attributes.widthMobile) : undefined,
				'height': attributes.heightMobile ? getSliderValue(attributes.heightMobile) : undefined,
				...getBorderValue(attributes?.borderMobile),
				'border-radius': getBoxValue(attributes?.borderRadiusMobile),
			},
			{
				selector: `.${WRAPPER} span:hover`,
				...getBorderValue(attributes?.hoverBorderMobile),
				'border-radius': getBoxValue(attributes?.hoverBorderRadiusMobile),
			},
			{
				selector: `.${WRAPPER} .icon-wrapper`,
				'font-size': attributes.iconSizeMobile ? getSliderValue(attributes.iconSizeMobile) : undefined,
			},
			{
				selector: `.${WRAPPER}.text-only span`,
				...getTypographyValue(attributes.typography, 'Mobile'),
			},
		]
	}

	return parseCSS(rawCSS);
}

export { gutenkitCSS };
