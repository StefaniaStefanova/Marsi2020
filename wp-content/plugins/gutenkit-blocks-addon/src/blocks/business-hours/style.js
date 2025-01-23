const BlockStyle = (attributes) => {
	const {
		parseCSS,
		backgroundGenerator,
		getBoxValue,
		getBorderValue,
		getTypographyValue,
	} = window.gutenkit.helpers;
	const WRAPPER = attributes.blockClass;
	const getRepeaterValue = (repeaterKey) => {
		const repeaterValue = repeaterKey.map((key, index) => {
			return [
				{
					selector: `.${WRAPPER} .gkit-business-hours .gkit-single-day-item-${Number(index)}.gkit-highlight-this-day`,
					'background': key['gkitSingleBusinessBackgroundColor'],
				},
				{
					selector: `.${WRAPPER} .gkit-business-hours .gkit-single-day-item-${Number(index)}.gkit-highlight-this-day .gkit-business-day`,
					'color': key['gkitSingleBusinessDayColor'],
				},
				{
					selector: `.${WRAPPER} .gkit-business-hours .gkit-single-day-item-${Number(index)}.gkit-highlight-this-day .gkit-business-time`,
					'color': key['gkitSingleBusinessTimeColor'],
				},
			]
		})
		let CSSVALUE = [];
		repeaterValue.forEach((item) => {
			CSSVALUE = [...CSSVALUE, ...item];
		})

		return CSSVALUE;
	}

	const rawSyle = {
		desktop: [
			{
				selector: `.${WRAPPER}.wp-block-gutenkit-business-hours .gkit-business-hours .gkit-single-day`,
				...getBoxValue(attributes?.gkitBusinessItemMarginDesktop, "margin"),
				...getBoxValue(attributes?.gkitBusinessItemPaddingDesktop, "padding"),
				...backgroundGenerator(attributes?.gkitBusinessItemBackground, "Desktop"),
				...getBoxValue(attributes?.gkitBusinessItemItemRadiusDesktop, "border-radius"),
				...getBorderValue(attributes?.gkitBusinessItemBorder),
			},
			...getRepeaterValue(attributes?.gkitBusinessOpendayList),
			{
				selector: `.${WRAPPER} .gkit-business-hours .gkit-single-day .gkit-business-day`,
				'color': attributes?.gkitBusinessDayColor,
				...getTypographyValue(attributes?.gkitBusinessDayTypography, "Desktop"),
				...backgroundGenerator(attributes?.gkitBusinessDayBackground, "Desktop"),
				...getBoxValue(attributes?.gkitBusinessItemDayRadiusDesktop, "border-radius"),
				...getBoxValue(attributes?.gkitBusinessItemDayPaddingDesktop, "padding"),
			},
			{
				selector: `.${WRAPPER} .gkit-business-hours .gkit-single-day .gkit-business-time`,
				'color': attributes?.gkitBusinessTimeColor,
				...getTypographyValue(attributes?.gkitBusinessTimeTypography, "Desktop"),
				...backgroundGenerator(attributes?.gkitBusinessTimeBackground, "Desktop"),
				...getBoxValue(attributes?.gkitBusinessItemTimeRadiusDesktop, "border-radius"),
				...getBoxValue(attributes?.gkitBusinessItemTimePaddingDesktop, "padding"),
			},
		],
		tablet: [
			{
				selector: `.${WRAPPER} .gkit-business-hours .gkit-single-day`,
				...getBoxValue(attributes?.gkitBusinessItemMarginTablet, "margin"),
				...getBoxValue(attributes?.gkitBusinessItemPaddingTablet, "padding"),
				...backgroundGenerator(attributes?.gkitBusinessItemBackground, "Tablet"),
				...getBoxValue(attributes?.gkitBusinessItemItemRadiusTablet, "border-radius"),
			},
			{
				selector: `.${WRAPPER} .gkit-business-hours .gkit-single-day .gkit-business-day`,
				...getTypographyValue(attributes?.gkitBusinessDayTypography, "Tablet"),
				...backgroundGenerator(attributes?.gkitBusinessDayBackground, "Tablet"),
				...getBoxValue(attributes?.gkitBusinessItemDayRadiusTablet, "border-radius"),
				...getBoxValue(attributes?.gkitBusinessItemDayPaddingTablet, "padding"),
			},
			{
				selector: `.${WRAPPER} .gkit-business-hours .gkit-single-day .gkit-business-time`,
				...getTypographyValue(attributes?.gkitBusinessTimeTypography, "Tablet"),
				...backgroundGenerator(attributes?.gkitBusinessTimeBackground, "Tablet"),
				...getBoxValue(attributes?.gkitBusinessItemTimeRadiusTablet, "border-radius"),
				...getBoxValue(attributes?.gkitBusinessItemTimePaddingTablet, "padding"),
			},
		],
		mobile: [
			{
				selector: `.${WRAPPER} .gkit-business-hours .gkit-single-day`,
				...getBoxValue(attributes?.gkitBusinessItemMarginMobile, "margin"),
				...getBoxValue(attributes?.gkitBusinessItemPaddingMobile, "padding"),
				...backgroundGenerator(attributes?.gkitBusinessItemBackground, "Mobile"),
				...getBoxValue(attributes?.gkitBusinessItemItemRadiusMobile, "border-radius"),
			},
			{
				selector: `.${WRAPPER} .gkit-business-hours .gkit-single-day .gkit-business-day`,
				...getTypographyValue(attributes?.gkitBusinessDayTypography, "Mobile"),
				...backgroundGenerator(attributes?.gkitBusinessDayBackground, "Mobile"),
				...getBoxValue(attributes?.gkitBusinessItemDayRadiusMobile, "border-radius"),
				...getBoxValue(attributes?.gkitBusinessItemDayPaddingMobile, "padding"),
			},
			{
				selector: `.${WRAPPER} .gkit-business-hours .gkit-single-day .gkit-business-time`,
				...getTypographyValue(attributes?.gkitBusinessTimeTypography, "Mobile"),
				...backgroundGenerator(attributes?.gkitBusinessTimeBackground, "Mobile"),
				...getBoxValue(attributes?.gkitBusinessItemTimeRadiusMobile, "border-radius"),
				...getBoxValue(attributes?.gkitBusinessItemTimePaddingMobile, "padding"),
			},
		]
	}

	return parseCSS(rawSyle);
}

export default BlockStyle;