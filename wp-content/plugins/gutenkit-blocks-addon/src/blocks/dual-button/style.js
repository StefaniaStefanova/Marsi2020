const DualButtonStyle = (attributes) => {
	const {
		parseCSS,
		backgroundGenerator,
		getBoxShadowValue,
		getBoxValue,
		getBorderValue,
		getTypographyValue,
		getSliderValue
	} = window.gutenkit.helpers;

	const WRAPPER = attributes?.blockClass;
	const rawSyle = {
		desktop: [
			{
				selector: `.${WRAPPER} .gkit-dual-btn-container`,
				'justify-content': attributes?.gkitDoubleButtonAlignDesktop,
			},
			{
				selector: `.${WRAPPER} .gkit-dual-btn-wrapper`,
				'width': getSliderValue(attributes?.gkitDualButtonWidthDesktop),
				'gap': getSliderValue(attributes?.gkitDualButtonGapDesktop),
			},
			{
				selector: `.${WRAPPER} .gkit-dual-btn-wrapper .gkit-dual-btn-first`,
				'color': attributes?.gkitDoubleButtonOneColor,
				'fill': attributes?.gkitDoubleButtonOneColor,
				'background': backgroundGenerator(attributes?.gkitDoubleButtonOneBackground).background,
				'background-size': backgroundGenerator(attributes?.gkitDoubleButtonOneBackground).size,
				'box-shadow': getBoxShadowValue(attributes?.gkitDoubleButtonOneBoxShadow),
				...getBorderValue(attributes?.gkitDoubleButtonOneBorder),
				...getTypographyValue(attributes?.gkitDoubleButtonOneTypography, 'Desktop'),
				'gap': getSliderValue(attributes?.gkitDoubleButtonOneIconSpecingDesktop),
				'border-radius': getBoxValue(attributes?.gkitDoubleButtonOneBorderRadiusDesktop),
				'padding': getBoxValue(attributes?.gkitDoubleButtonOnePaddingDesktop),
				'margin': getBoxValue(attributes?.gkitDoubleButtonOneMarginDesktop),
				'justify-content': attributes?.gkitDoubleButtonOneAlignDesktop
			},
			{
				selector: `.${WRAPPER} .gkit-dual-btn-wrapper .gkit-dual-btn-first:hover`,
				'color': attributes?.gkitDoubleButtonOneHoverColor,
				'fill': attributes?.gkitDoubleButtonOneHoverColor,
				'border-color': attributes?.gkitDoubleButtonOneHoverBorderColor,
				'background': backgroundGenerator(attributes?.gkitDoubleButtonOneHoverBackground).background,
				'background-size': backgroundGenerator(attributes?.gkitDoubleButtonOneHoverBackground).size,
				'box-shadow': getBoxShadowValue(attributes?.gkitDoubleButtonOneHoverBoxShadow),
				'border-radius': getBoxValue(attributes?.gkitDoubleButtonOneHoverBorderRadiusDesktop),
			},
			{
				selector: `.${WRAPPER} .gkit-dual-btn-wrapper .gkit-dual-btn-second`,
				'color': attributes?.gkitDoubleButtonTwoColor,
				'fill': attributes?.gkitDoubleButtonTwoColor,
				'background': backgroundGenerator(attributes?.gkitDoubleButtonTwoBackground).background,
				'background-size': backgroundGenerator(attributes?.gkitDoubleButtonTwoBackground).size,
				'box-shadow': getBoxShadowValue(attributes?.gkitDoubleButtonTwoBoxShadow),
				...getBorderValue(attributes?.gkitDoubleButtonTwoBorder),
				...getTypographyValue(attributes?.gkitDoubleButtonTwoTypography, 'Desktop'),
				'gap': getSliderValue(attributes?.gkitDoubleButtonTwoIconSpecingDesktop),
				'border-radius': getBoxValue(attributes?.gkitDoubleButtonTwoBorderRadiusDesktop),
				'padding': getBoxValue(attributes?.gkitDoubleButtonTwoPaddingDesktop),
				'margin': getBoxValue(attributes?.gkitDoubleButtonTwoMarginDesktop),
				'justify-content': attributes?.gkitDoubleButtonTwoAlignDesktop
			},
			{
				selector: `.${WRAPPER} .gkit-dual-btn-wrapper .gkit-dual-btn-second:hover`,
				'color': attributes?.gkitDoubleButtonTwoHoverColor,
				'fill': attributes?.gkitDoubleButtonTwoHoverColor,
				'border-color': attributes?.gkitDoubleButtonTwoHoverBorderColor,
				'background': backgroundGenerator(attributes?.gkitDoubleButtonTwoHoverBackground).background,
				'background-size': backgroundGenerator(attributes?.gkitDoubleButtonTwoHoverBackground).size,
				'box-shadow': getBoxShadowValue(attributes?.gkitDoubleButtonTwoHoverBoxShadow),
				'border-radius': getBoxValue(attributes?.gkitDoubleButtonTwoHoverBorderRadiusDesktop),
			},
			{
				selector: `.${WRAPPER} .gkit-dual-btn-wrapper .gkit-dual-btn-middle-text`,
				'color': attributes?.gkitDoubleButtonMiddletextColor,
				...getTypographyValue(attributes?.gkitDoubleButtonMiddletextTypography, 'Desktop'),
				...getBorderValue(attributes?.gkitDoubleButtonMiddletextBorder),
				'border-radius': getBoxValue(attributes?.gkitDoubleButtonMiddletextBorderRadiusDesktop),
				'background': backgroundGenerator(attributes?.gkitDoubleButtonMiddletextBackground).background,
				'background-size': backgroundGenerator(attributes?.gkitDoubleButtonMiddletextBackground).size,
				'box-shadow': getBoxShadowValue(attributes?.gkitDoubleButtonMiddletextBoxShadow),
				'width': getSliderValue(attributes?.gkitDoubleButtonMiddletextWidthDesktop),
				'height': getSliderValue(attributes?.gkitDoubleButtonMiddletextHeightDesktop)
			}
		],
		tablet: [
			{
				selector: `.${WRAPPER} .gkit-dual-btn-container`,
				'justify-content': attributes?.gkitDoubleButtonAlignTablet,
			},
			{
				selector: `.${WRAPPER} .gkit-dual-btn-wrapper`,
				'width': getSliderValue(attributes?.gkitDualButtonWidthTablet),
				'gap': getSliderValue(attributes?.gkitDualButtonGapTablet),
			},
			{
				selector: `.${WRAPPER} .gkit-dual-btn-wrapper .gkit-dual-btn-first`,
				'gap': getSliderValue(attributes?.gkitDoubleButtonOneIconSpecingTablet),
				...getTypographyValue(attributes?.gkitDoubleButtonOneTypography, 'Tablet'),
				'border-radius': getBoxValue(attributes?.gkitDoubleButtonOneBorderRadiusTablet),
				'padding': getBoxValue(attributes?.gkitDoubleButtonOnePaddingTablet),
				'margin': getBoxValue(attributes?.gkitDoubleButtonOneMarginTablet),
				'justify-content': attributes?.gkitDoubleButtonOneAlignTablet,
				'background': backgroundGenerator(attributes?.gkitDoubleButtonOneBackground, 'Tablet').background,
				'background-size': backgroundGenerator(attributes?.gkitDoubleButtonOneBackground, 'Tablet').size,
			},
			{
				selector: `.${WRAPPER} .gkit-dual-btn-wrapper .gkit-dual-btn-first:hover`,
				'border-radius': getBoxValue(attributes?.gkitDoubleButtonOneHoverBorderRadiusTablet),
				'background': backgroundGenerator(attributes?.gkitDoubleButtonOneHoverBackground, 'Tablet').background,
				'background-size': backgroundGenerator(attributes?.gkitDoubleButtonOneHoverBackground, 'Tablet').size,
			},
			{
				selector: `.${WRAPPER} .gkit-dual-btn-wrapper .gkit-dual-btn-second`,
				'gap': getSliderValue(attributes?.gkitDoubleButtonTwoIconSpecingTablet),
				...getTypographyValue(attributes?.gkitDoubleButtonTwoTypography, 'Tablet'),
				'border-radius': getBoxValue(attributes?.gkitDoubleButtonTwoBorderRadiusTablet),
				'padding': getBoxValue(attributes?.gkitDoubleButtonTwoPaddingTablet),
				'margin': getBoxValue(attributes?.gkitDoubleButtonTwoMarginTablet),
				'justify-content': attributes?.gkitDoubleButtonTwoAlignTablet,
				'background': backgroundGenerator(attributes?.gkitDoubleButtonTwoBackground, 'Tablet').background,
				'background-size': backgroundGenerator(attributes?.gkitDoubleButtonTwoBackground, 'Tablet').size,
			},
			{
				selector: `.${WRAPPER} .gkit-dual-btn-wrapper .gkit-dual-btn-second:hover`,
				'border-radius': getBoxValue(attributes?.gkitDoubleButtonTwoHoverBorderRadiusTablet),
				'background': backgroundGenerator(attributes?.gkitDoubleButtonTwoHoverBackground, 'Tablet').background,
				'background-size': backgroundGenerator(attributes?.gkitDoubleButtonTwoHoverBackground, 'Tablet').size,
			},
			{
				selector: `.${WRAPPER} .gkit-dual-btn-wrapper .gkit-dual-btn-second:hover`,
				'border-radius': getBoxValue(attributes?.gkitDoubleButtonTwoHoverBorderRadiusTablet),
			},
			{
				selector: `.${WRAPPER} .gkit-dual-btn-wrapper .gkit-dual-btn-middle-text`,
				...getTypographyValue(attributes?.gkitDoubleButtonMiddletextTypography, 'Tablet'),
				'border-radius': getBoxValue(attributes?.gkitDoubleButtonMiddletextBorderRadiusTablet),
				'width': getSliderValue(attributes?.gkitDoubleButtonMiddletextWidthTablet),
				'height': getSliderValue(attributes?.gkitDoubleButtonMiddletextHeightTablet),
				'background': backgroundGenerator(attributes?.gkitDoubleButtonMiddletextBackground, 'Tablet').background,
				'background-size': backgroundGenerator(attributes?.gkitDoubleButtonMiddletextBackground, 'Tablet').size,
			}
		],
		mobile: [
			{
				selector: `.${WRAPPER} .gkit-dual-btn-container`,
				'justify-content': attributes?.gkitDoubleButtonAlignMobile,
			},
			{
				selector: `.${WRAPPER} .gkit-dual-btn-wrapper`,
				'width': getSliderValue(attributes?.gkitDualButtonWidthMobile),
				'gap': getSliderValue(attributes?.gkitDualButtonGapMobile),
			},
			{
				selector: `.${WRAPPER} .gkit-dual-btn-wrapper .gkit-dual-btn-first`,
				'gap': getSliderValue(attributes?.gkitDoubleButtonOneIconSpecingMobile),
				...getTypographyValue(attributes?.gkitDoubleButtonOneTypography, 'Mobile'),
				'border-radius': getBoxValue(attributes?.gkitDoubleButtonOneBorderRadiusMobile),
				'padding': getBoxValue(attributes?.gkitDoubleButtonOnePaddingMobile),
				'margin': getBoxValue(attributes?.gkitDoubleButtonOneMarginMobile),
				'justify-content': attributes?.gkitDoubleButtonOneAlignMobile,
				'background': backgroundGenerator(attributes?.gkitDoubleButtonOneBackground, 'Mobile').background,
				'background-size': backgroundGenerator(attributes?.gkitDoubleButtonOneBackground, 'Mobile').size,
			},
			{
				selector: `.${WRAPPER} .gkit-dual-btn-wrapper .gkit-dual-btn-first:hover`,
				'border-radius': getBoxValue(attributes?.gkitDoubleButtonOneHoverBorderRadiusMobile),
				'background': backgroundGenerator(attributes?.gkitDoubleButtonOneHoverBackground, 'Mobile').background,
				'background-size': backgroundGenerator(attributes?.gkitDoubleButtonOneHoverBackground, 'Mobile').size,
			},
			{
				selector: `.${WRAPPER} .gkit-dual-btn-wrapper .gkit-dual-btn-second`,
				'gap': getSliderValue(attributes?.gkitDoubleButtonTwoIconSpecingMobile),
				...getTypographyValue(attributes?.gkitDoubleButtonTwoTypography, 'Mobile'),
				'border-radius': getBoxValue(attributes?.gkitDoubleButtonTwoBorderRadiusMobile),
				'padding': getBoxValue(attributes?.gkitDoubleButtonTwoPaddingMobile),
				'margin': getBoxValue(attributes?.gkitDoubleButtonTwoMarginMobile),
				'justify-content': attributes?.gkitDoubleButtonTwoAlignMobile,
				'background': backgroundGenerator(attributes?.gkitDoubleButtonTwoBackground, 'Mobile').background,
				'background-size': backgroundGenerator(attributes?.gkitDoubleButtonTwoBackground, 'Mobile').size,
			},
			{
				selector: `.${WRAPPER} .gkit-dual-btn-wrapper .gkit-dual-btn-second:hover`,
				'border-radius': getBoxValue(attributes?.gkitDoubleButtonTwoHoverBorderRadiusMobile),
				'background': backgroundGenerator(attributes?.gkitDoubleButtonTwoHoverBackground, 'Mobile').background,
				'background-size': backgroundGenerator(attributes?.gkitDoubleButtonTwoHoverBackground, 'Mobile').size,
			},
			{
				selector: `.${WRAPPER} .gkit-dual-btn-wrapper .gkit-dual-btn-second:hover`,
				'border-radius': getBoxValue(attributes?.gkitDoubleButtonTwoHoverBorderRadiusMobile),
			},
			{
				selector: `.${WRAPPER} .gkit-dual-btn-wrapper .gkit-dual-btn-middle-text`,
				...getTypographyValue(attributes?.gkitDoubleButtonMiddletextTypography, 'Mobile'),
				'border-radius': getBoxValue(attributes?.gkitDoubleButtonMiddletextBorderRadiusMobile),
				'width': getSliderValue(attributes?.gkitDoubleButtonMiddletextWidthMobile),
				'height': getSliderValue(attributes?.gkitDoubleButtonMiddletextHeightMobile),
				'background': backgroundGenerator(attributes?.gkitDoubleButtonMiddletextBackground, 'Mobile').background,
				'background-size': backgroundGenerator(attributes?.gkitDoubleButtonMiddletextBackground, 'Mobile').size,
			}
		]
	}
	return parseCSS(rawSyle);
}

export default DualButtonStyle;
