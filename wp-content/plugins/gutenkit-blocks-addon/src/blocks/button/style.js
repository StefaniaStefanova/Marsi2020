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
			//content
			{
				selector: `.${WRAPPER} .gkit-btn-wraper`,
				'text-align': attributes?.alignDesktop,
			},
			//button
			{
				selector: `.${WRAPPER} .gkit-btn-wraper .gkit-btn`,
				'width': getSliderValue(attributes.widthDesktop),
				'padding': getBoxValue(attributes.textPaddingDesktop),
				...getTypographyValue(attributes.typography, 'Desktop'),
				'text-shadow': getBoxShadowValue(attributes.shadow),
				'color': attributes.textColor,
				'fill': attributes.textColor,
				'background': backgroundGenerator(attributes?.bgColor).background,
				'background-size': backgroundGenerator(attributes?.bgColor).size,
				...getBorderValue(attributes?.borderDesktop),
				'border-radius': getBoxValue(attributes.borderRadiusDesktop),
				'box-shadow': getBoxShadowValue(attributes.boxShadowGroup)
			},
			{
				selector: `.${WRAPPER} .gkit-btn-wraper .gkit-btn:hover`,
				'color': attributes.hoverColor,
				'fill': attributes.hoverColor,
				'background': backgroundGenerator(attributes?.bgHoverColor).background,
				'background-size': backgroundGenerator(attributes?.bgHoverColor).size,
				...getBorderValue(attributes?.hoverBorderDesktop),
				'border-radius': getBoxValue(attributes?.hoverBorderRadiusDesktop),
			},
			//icon
			{
				selector: `.${WRAPPER} .gkit-btn-wraper .gkit-btn > .gkit-icon`,
				'transform': `translateY(${getSliderValue(attributes?.normalIconVerticalAlignDesktop)})`
			},
			{
				selector: `.${WRAPPER} .gkit-btn-wraper .gkit-btn > .icon-left`,
				'margin-right': getSliderValue(attributes?.normalIconPaddingDesktop),
				'margin-left': '0',
			},
			{
				selector: `.${WRAPPER} .gkit-btn-wraper .gkit-btn > .icon-right`,
				'margin-left': getSliderValue(attributes?.normalIconPaddingDesktop),
				'margin-right': '0',
			},
			{
				selector: `.rtl .${WRAPPER} .gkit-btn-wraper .gkit-btn > .icon-left`,
				'margin-right': '0',
				'margin-left': getSliderValue(attributes?.normalIconPaddingDesktop),
			},
			{
				selector: `.rtl .${WRAPPER} .gkit-btn-wraper .gkit-btn > .icon-right`,
				'margin-left': '0',
				'margin-right': getSliderValue(attributes?.normalIconPaddingDesktop),
			},


		],
		tablet: [
			// content
			{
				selector: `.${WRAPPER} .gkit-btn-wraper`,
				'text-align': attributes?.alignTablet,
			},
			//button
			{
				selector: `.${WRAPPER} .gkit-btn-wraper .gkit-btn`,
				'width': getSliderValue(attributes.widthTablet),
				'padding': getBoxValue(attributes.textPaddingTablet),
				...getTypographyValue(attributes.typography, 'Tablet'),
				...getBorderValue(attributes?.borderTablet),
				'border-radius': getBoxValue(attributes.borderRadiusTablet),

			},
			{
				selector: `.${WRAPPER} .gkit-btn-wraper .gkit-btn:hover`,
				...getBorderValue(attributes?.hoverBorderTablet),
				'border-radius': getBoxValue(attributes.hoverBorderRadiusTablet),
			},
			//icon
			{
				selector: `.${WRAPPER} .gkit-btn-wraper .gkit-btn > .gkit-icon`,
				'transform': `translateY(${getSliderValue(attributes.normalIconVerticalAlignTablet)})`
			},
			{
				selector: `.${WRAPPER} .gkit-btn-wraper .gkit-btn > .icon-left`,
				'margin-right': getSliderValue(attributes.normalIconPaddingTablet),
				'margin-left': '0',
			},
			{
				selector: `.${WRAPPER} .gkit-btn-wraper .gkit-btn > .icon-right`,
				'margin-left': getSliderValue(attributes.normalIconPaddingTablet),
				'margin-right': '0',
			},
			{
				selector: `.rtl .${WRAPPER} .gkit-btn-wraper .gkit-btn > .icon-left`,
				'margin-right': '0',
				'margin-left': getSliderValue(attributes?.normalIconPaddingTablet),
			},
			{
				selector: `.rtl .${WRAPPER} .gkit-btn-wraper .gkit-btn > .icon-right`,
				'margin-left': '0',
				'margin-right': getSliderValue(attributes?.normalIconPaddingTablet),
			},
		],
		mobile: [
			//content
			{
				selector: `.${WRAPPER} .gkit-btn-wraper`,
				'text-align': attributes?.alignMobile,
			},
			//button
			{
				selector: `.${WRAPPER} .gkit-btn-wraper .gkit-btn`,
				'width': getSliderValue(attributes.widthMobile),
				'padding': getBoxValue(attributes.textPaddingMobile),
				...getTypographyValue(attributes.typography, 'Mobile'),
				...getBorderValue(attributes?.borderMobile),
				'border-radius': getBoxValue(attributes.borderRadiusMobile),

			},
			{
				selector: `.${WRAPPER} .gkit-btn-wraper .gkit-btn:hover`,
				...getBorderValue(attributes?.hoverBorderMobile),
				'border-radius': getBoxValue(attributes.hoverBorderRadiusMobile),
			},
			//icon
			{
				selector: `.${WRAPPER} .gkit-btn-wraper .gkit-btn > .gkit-icon`,
				'transform': `translateY(${getSliderValue(attributes.normalIconVerticalAlignMobile)})`
			},
			{
				selector: `.${WRAPPER} .gkit-btn-wraper .gkit-btn > .icon-left`,
				'margin-right': getSliderValue(attributes.normalIconPaddingMobile),
				'margin-left': '0',
			},
			{
				selector: `.${WRAPPER} .gkit-btn-wraper .gkit-btn > .icon-right`,
				'margin-left': getSliderValue(attributes.normalIconPaddingMobile),
				'margin-right': '0',
			},
			{
				selector: `.rtl .${WRAPPER} .gkit-btn-wraper .gkit-btn > .icon-left`,
				'margin-right': '0',
				'margin-left': getSliderValue(attributes.normalIconPaddingMobile),
			},
			{
				selector: `.rtl .${WRAPPER} .gkit-btn-wraper .gkit-btn > .icon-right`,
				'margin-left': '0',
				'margin-right': getSliderValue(attributes.normalIconPaddingMobile),
			},

		]
	}

	return parseCSS(rawCSS);
}

export { gutenkitCSS };
