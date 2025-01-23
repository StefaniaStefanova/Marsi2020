/* eslint-disable */
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

	let tabPositionDesktop = {};
	let tabPositionTablet = {};
	let tabPositionMobile = {};

	if(attributes?.tabPositionDesktop === 'horizontal') {
		tabPositionDesktop['flex-direction'] = 'row';
		tabPositionDesktop['justify-content'] = attributes?.tabAlignmentDesktop;
		tabPositionDesktop['flex-wrap'] = 'wrap';
	} else {
		tabPositionDesktop['justify-content'] = attributes?.tabJustifyDesktop;
	}

	if(attributes?.tabPositionTablet === 'horizontal') {
		tabPositionTablet['flex-direction'] = 'row';
		tabPositionTablet['justify-content'] = attributes?.tabAlignmentTablet;
		tabPositionTablet['flex-wrap'] = 'wrap';
	} else {
		tabPositionTablet['justify-content'] = attributes?.tabJustifyTablet;
	}

	if(attributes?.tabPositionMobile === 'horizontal') {
		tabPositionMobile['flex-direction'] = 'row';
		tabPositionMobile['justify-content'] = attributes?.tabAlignmentMobile;
		tabPositionMobile['flex-wrap'] = 'wrap';
	} else {
		tabPositionMobile['justify-content'] = attributes?.tabJustifyMobile;
	}

	const rawCSS = {
		desktop: [
			{
				selector: `.${WRAPPER} .post--tab .tab-header .tab__list`,
				...getBorderValue(attributes?.tabContainerBorder),
				'background': backgroundGenerator(attributes?.tabContainerBackground).background,
				...getBoxValue(attributes?.tabContainerMarginDesktop, "margin"),
				...getBoxValue(attributes?.tabContainerPaddingDesktop, "padding")
			},
			{
				selector: `.${WRAPPER} .post--tab .tab-header .tab__list .tab__list__item`,
				...getBorderValue(attributes?.itemBorder),
				...getTypographyValue(attributes?.itemTypography, 'Desktop'),
				'background': backgroundGenerator(attributes?.itemBgColor).background,
				...getBoxValue(attributes?.itemPaddingDesktop, "padding"),
				...getBoxValue(attributes?.itemMarginDesktop, "margin"),
				'color': attributes?.itemTextColor,
				...getBoxValue(attributes?.itemBorderRadiusDesktop, "border-radius"),
				'box-shadow': getBoxShadowValue(attributes?.itemShadow),
			},
			{
				selector: `.${WRAPPER} .post--tab .tab-header .tab__list .tab__list__item:hover`,
				...getBorderValue(attributes?.itemHoverBorder),
				'background': backgroundGenerator(attributes?.itemHoverBgColor).background,
				'color': attributes?.itemHoverColor,
				...getBoxValue(attributes?.itemHoverBorderRadiusDesktop, "border-radius"),
				'box-shadow': getBoxShadowValue(attributes?.itemHoverShadow),
			},
			{
				selector: `.${WRAPPER} .post--tab .tab-header .tab__list .tab__list__item.active`,
				...getBorderValue(attributes?.itemActiveBorder),
				'background': backgroundGenerator(attributes?.itemActiveBgColor).background,
				'color': attributes?.itemActiveColor,
				...getBoxValue(attributes?.itemActiveBorderRadiusDesktop, "border-radius"),
				'box-shadow': getBoxShadowValue(attributes?.itemActiveShadow),
			},
			{
				selector: `.${WRAPPER} .gkit--tab__post__details .tab__post__single--item:hover .tab__post--header > img`,
				'transform': attributes?.disableHoverEffect && 'none'
			},
			{
				selector: `.${WRAPPER} .gkit--tab__post__details .tab__post--header>img`,
				'width': getSliderValue(attributes?.imageWidthDesktop),
				'height': getSliderValue(attributes?.imageHeightDesktop),
			},
			{
				selector: `.${WRAPPER} .gkit--tab__post__details .tab__post--header`,
				'justify-content': attributes?.contentAlignmentDesktop,
			},
			{
				selector: `.${WRAPPER} .gkit--tab__post__details .tab__post--title > a`,
				'color': attributes?.titleColor,
			},
			{
				selector: `.${WRAPPER} .tab__post__single--item:hover .tab__post--title > a`,
				'color': attributes?.titleHoverColor,
			},
			{
				selector: `.${WRAPPER} .gkit--tab__post__details .tab__post--title`,
				...getTypographyValue(attributes?.titleTypography, 'Desktop'),
				...getBoxValue(attributes?.titleMarginDesktop, "margin"),
				'text-align': attributes?.contentAlignmentDesktop,
			},
			{
				selector: `.${WRAPPER} .gkit--tab__post__details .tab__post__single--item`,
				'width': attributes?.selectColumnDesktop,
			},
			{
				selector: `.${WRAPPER} .gkit-post-tab--horizontal .tab__list`,
				'justify-content': attributes?.tabPosition === 'horizontal' && attributes?.tabAlignmentDesktop,
			},
			{
				selector: `.${WRAPPER} .post--tab .tab-header  .tab__list`,
				...tabPositionDesktop
			},
			{
				selector: `.${WRAPPER} .post--tab`,
				'display': attributes?.tabPositionDesktop === 'horizontal' && 'block'
			},
			{
				selector: `.${WRAPPER} .post--tab .tab-header`,
				'align-items': attributes?.tabJustifyDesktop
			}
		],
		tablet: [
			{
				selector: `.${WRAPPER} .post--tab .tab-header .tab__list`,
				...getBoxValue(attributes?.tabContainerMarginTablet, "margin"),
				...getBoxValue(attributes?.tabContainerPaddingTablet, "padding"),
			},
			{
				selector: `.${WRAPPER} .post--tab .tab-header .tab__list .tab__list__item`,
				...getTypographyValue(attributes?.itemTypography, 'Tablet'),
				...getBoxValue(attributes?.itemMarginTablet, "margin"),
				...getBoxValue(attributes?.itemPaddingTablet, "padding"),
				...getBoxValue(attributes?.itemBorderRadiusTablet, "border-radius"),
			},
			{
				selector: `.${WRAPPER} .post--tab .tab-header .tab__list .tab__list__item:hover`,
				...getBoxValue(attributes?.itemHoverBorderRadiusTablet, "border-radius"),
			},
			{
				selector: `.${WRAPPER} .post--tab .tab-header .tab__list .tab__list__item.active`,
				...getBoxValue(attributes?.itemActiveBorderRadiusTablet, "border-radius"),
			},
			{
				selector: `.${WRAPPER} .gkit--tab__post__details .tab__post--title`,
				...getTypographyValue(attributes?.titleTypography, 'Tablet'),
				...getBoxValue(attributes?.titleMarginTablet, "margin"),
				'text-align': attributes?.contentAlignmentTablet,
			},
			{
				selector: `.${WRAPPER} .gkit--tab__post__details .tab__post__single--item`,
				'width': attributes?.selectColumnTablet,
			},
			{
				selector: `.${WRAPPER} .gkit-post-tab--horizontal .tab__list`,
				'justify-content': attributes?.tabPosition === 'horizontal' && attributes?.tabAlignmentTablet,
			},
			{
				selector: `.${WRAPPER} .post--tab .tab-header  .tab__list`,
				...tabPositionTablet
			},
			{
				selector: `.${WRAPPER} .post--tab`,
				'display': attributes?.tabPositionTablet === 'horizontal' && 'block'
			},
			{
				selector: `.${WRAPPER} .gkit--tab__post__details .tab__post--header>img`,
				'width': getSliderValue(attributes?.imageWidthTablet),
				'height': getSliderValue(attributes?.imageHeightTablet),
			},
			{
				selector: `.${WRAPPER} .gkit--tab__post__details .tab__post--header`,
				'justify-content': attributes?.contentAlignmentTablet,
			},
			{
				selector: `.${WRAPPER} .post--tab .tab-header`,
				'align-items': attributes?.tabJustifyTablet
			}
		],
		mobile: [
			{
				selector: `.${WRAPPER} .post--tab .tab-header .tab__list`,
				...getBoxValue(attributes?.tabContainerMarginMobile, "margin"),
				...getBoxValue(attributes?.tabContainerPaddingMobile, "padding"),
			},
			{
				selector: `.${WRAPPER} .post--tab .tab-header .tab__list .tab__list__item`,
				...getTypographyValue(attributes?.itemTypography, 'Mobile'),
				...getBoxValue(attributes?.itemBorderRadiusMobile, "border-radius"),
				...getBoxValue(attributes?.itemPaddingMobile, "padding"),
				...getBoxValue(attributes?.itemMarginMobile, "margin"),
			},
			{
				selector: `.${WRAPPER} .post--tab .tab-header .tab__list .tab__list__item:hover`,
				...getBoxValue(attributes?.itemHoverBorderRadiusMobile, "border-radius"),
			},
			{
				selector: `.${WRAPPER} .post--tab .tab-header .tab__list .tab__list__item.active`,
				...getBoxValue(attributes?.itemActiveBorderRadiusMobile, "border-radius"),
			},
			{
				selector: `.${WRAPPER} .gkit--tab__post__details .tab__post--title`,
				...getTypographyValue(attributes?.titleTypography, 'Mobile'),
				...getBoxValue(attributes?.titleMarginMobile, "margin"),
				'text-align': attributes?.contentAlignmentMobile,
			},
			{
				selector: `.${WRAPPER} .gkit--tab__post__details .tab__post__single--item`,
				'width': attributes?.selectColumnMobile,
			},
			{
				selector: `.${WRAPPER} .post--tab .tab-header  .tab__list`,
				...tabPositionMobile
			},
			{
				selector: `.${WRAPPER} .post--tab`,
				'display': attributes?.tabPositionMobile === 'horizontal' && 'block'
			},
			{
				selector: `.${WRAPPER} .gkit--tab__post__details .tab__post--header>img`,
				'width': getSliderValue(attributes?.imageWidthMobile),
				'height': getSliderValue(attributes?.imageHeightMobile),
			},
			{
				selector: `.${WRAPPER} .gkit--tab__post__details .tab__post--header`,
				'justify-content': attributes?.contentAlignmentMobile,
			},
			{
				selector: `.${WRAPPER} .post--tab .tab-header`,
				'align-items': attributes?.tabJustifyMobile
			}
		]
	}

	return parseCSS(rawCSS);
}

export { gutenkitCSS };
