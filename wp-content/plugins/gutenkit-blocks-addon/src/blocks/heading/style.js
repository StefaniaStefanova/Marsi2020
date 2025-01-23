const HeadingStyle = (attributes) => {
	const {
		parseCSS,
		backgroundGenerator,
		fillBackgroundGenerator,
		getBoxValue,
		getBorderValue,
		getTypographyValue,
		getSliderValue,
		getTextShadowValue
	} = window.gutenkit.helpers;

	const WRAPPER = attributes.blockClass;

	const rawSyle = {
		desktop: [
			{
				selector: `.${WRAPPER}`,
				'text-align': attributes?.generalTextAlignmentDesktop,
			},
			{
				selector: `.${WRAPPER} .gkit-heading-description`,
				'max-width': getSliderValue(attributes?.descriptionMaxWidthDesktop),
				'color': attributes?.descriptionColor,
				...getTypographyValue(attributes?.descriptionTypography, 'Desktop'),
				'margin': getBoxValue(attributes?.descriptionMarginDesktop),
			},
			{
				selector: `.${WRAPPER} .gkit-heading-title`,
				'color': attributes?.titleColor,
				'text-shadow': getTextShadowValue(attributes?.titleTextShadow),
				'margin': getBoxValue(attributes?.titleMarginDesktop),
				...getTypographyValue(attributes?.titleTypography, 'Desktop'),
			},
			{
				selector: `.${WRAPPER} .gkit-heading-title strong`,
				'color': attributes?.focusedTitleColor,
				...getTypographyValue(attributes?.focusedTitleTypography, 'Desktop'),
				'text-decoration-color': attributes?.focusedTitleTextDecorationColor,
				'text-shadow': getTextShadowValue(attributes?.focusedTitleTextShadow),
				'padding': getBoxValue(attributes?.focusedTitlePaddingDesktop),
				'background': backgroundGenerator(attributes?.focusedTitleBackgroundColor).background,
				'border-radius': getBoxValue(attributes?.focusedTitleBorderRadius),
			},
			{
				selector: `.${WRAPPER} .gkit-heading-title.gkit-heading-title-text-fill strong`,
				...fillBackgroundGenerator(attributes?.focusedTitleTextFillBackground),
			},
			{
				selector: `.${WRAPPER} .gkit-heading-title:hover strong`,
				'color': attributes?.focusedTitleHoverColor,
			},
			{
				selector: `.${WRAPPER} .gkit-heading-title:hover`,
				'color': attributes?.titleHoverColor
			},
			{
				selector: `.${WRAPPER}.gkit-heading-has-border .gkit-heading-title::before`,
				'width': getSliderValue(attributes?.titleBorderWidth),
				'height': getSliderValue(attributes?.titleBorderHeight),
				'top': getSliderValue(attributes?.titleBorderVerticalPosition),
				'background': attributes?.titleBorderBackground
			},
			{
				selector: `.${WRAPPER}.gkit-heading-has-border .gkit-heading-title, .${WRAPPER}.gkit-heading-has-border .gkit-heading-separetor`,
				'padding-left': attributes?.borderPosition === 'start' ? getSliderValue(attributes?.titleBorderRightGap) : undefined,
				'padding-right': attributes?.borderPosition === 'end' ? getSliderValue(attributes?.titleBorderLeftGap) : undefined
			},
			{
				selector: `.${WRAPPER} .gkit-heading-subtitle`,
				'color': attributes?.subtitleColor,
				...getTypographyValue(attributes?.subtitleTypography, 'Desktop'),
				'margin': getBoxValue(attributes?.subtitleMarginDesktop),
			},
			{
				selector: `.${WRAPPER} .gkit-heading-subtitle.gkit-heading-subtitle-has-text-fill`,
				...fillBackgroundGenerator(attributes?.subtitleTextFillBackground),
			},
			{
				selector: `.${WRAPPER} .gkit-heading-subtitle-has-border::before`,
				'background': backgroundGenerator(attributes?.subtitleBorderLeftBackground).background,
				'width': getSliderValue(attributes?.subtitleBorderLeftWidthDesktop),
				'margin': getBoxValue(attributes?.subtitleBorderLeftMarginDesktop),
			},
			{
				selector: `.${WRAPPER} .gkit-heading-subtitle-has-border::after`,
				'background': backgroundGenerator(attributes?.subtitleBorderRightBackground).background,
				'width': getSliderValue(attributes?.subtitleBorderRightWidthDesktop),
				'margin': getBoxValue(attributes?.subtitleBorderRightMarginDesktop),
			},
			{
				selector: `.${WRAPPER} .gkit-heading-subtitle-has-border::after, .${WRAPPER} .gkit-heading-subtitle-has-border::before`,
				'height': getSliderValue(attributes?.subtitleBorderRightHeightDesktop),
				'transform': `translateY(${getSliderValue(attributes?.subtitleBorderRightVerticalPositionDesktop)})`
			},
			{
				selector: `.${WRAPPER}.wp-block-gutenkit-heading .gkit-heading-separetor`,
				'margin': getBoxValue(attributes?.separatorMarginDesktop),
			},
			{
				selector: `.${WRAPPER}.wp-block-gutenkit-heading .gkit-heading-separetor .gkit-heading-separetor-divider`,
				'width': getSliderValue(attributes?.separatorWidthDesktop),
				'height': getSliderValue(attributes?.separatorHeightDesktop),
				'color': attributes?.separatorColor,
				'margin-left': attributes?.generalTextAlignmentDesktop === 'right' ? 'auto' : undefined,
				'margin-right': attributes?.generalTextAlignmentDesktop === 'center' ? 'auto' : attributes?.generalTextAlignmentDesktop === 'right' ? '0' : undefined,
				'margin': attributes?.generalTextAlignmentDesktop === 'center' ? '0 auto' : undefined,
			},
			{
				selector: `.${WRAPPER}.wp-block-gutenkit-heading .gkit-heading-separetor .gkit-heading-separetor-divider::before`,
				'height': getSliderValue(attributes?.separatorHeightDesktop),
			},
			{
				selector: `.${WRAPPER} .gkit-heading-shadow-text`,
				'top': attributes?.shadowTextPositionDesktop?.top,
				'left': attributes?.shadowTextPositionDesktop?.left,
				...getTypographyValue(attributes?.shadowTextTypography, 'Desktop'),
				'-webkit-text-fill-color': attributes?.shadowTextColor,
				'-webkit-text-stroke-width': getSliderValue(attributes?.shadowTextStrokeWidth),
				'-webkit-text-stroke-color': attributes?.shadowTextStrokeColor
			},
			{
				selector: `.${WRAPPER} .gkit-heading-subtitle-has-outline:not(.gkit-heading-subtitle-has-border)`,
				...getBorderValue(attributes?.subtitleOutlineBorder),
				'border-radius': getBoxValue(attributes?.subtitleOutlineBorderRadiusDesktop),
				'padding': getBoxValue(attributes?.subtitlePaddingDesktop),
			}
		],
		tablet: [
			{
				selector: `.${WRAPPER}`,
				'text-align': attributes?.generalTextAlignmentTablet,
			},
			{
				selector: `.${WRAPPER} .gkit-heading-description`,
				'max-width': getSliderValue(attributes?.descriptionMaxWidthTablet),
				...getTypographyValue(attributes?.descriptionTypography, 'Tablet'),
				'margin': getBoxValue(attributes?.descriptionMarginTablet),
			},
			{
				selector: `.${WRAPPER} .gkit-heading-title`,
				'margin': getBoxValue(attributes?.titleMarginTablet),
				...getTypographyValue(attributes?.titleTypography, 'Tablet'),
			},
			{
				selector: `.${WRAPPER} .gkit-heading-title strong`,
				...getTypographyValue(attributes?.focusedTitleTypography, 'Tablet'),
				'padding': getBoxValue(attributes?.focusedTitlePaddingTablet)
			},
			{
				selector: `.${WRAPPER} .gkit-heading-title.gkit-heading-title-text-fill strong`,
				...fillBackgroundGenerator(attributes?.focusedTitleTextFillBackground, "Tablet")
			},
			{
				selector: `.${WRAPPER} .gkit-heading-subtitle.gkit-heading-subtitle-has-text-fill`,
				...fillBackgroundGenerator(attributes?.subtitleTextFillBackground, "Tablet"),
			},
			{
				selector: `.${WRAPPER} .gkit-heading-subtitle`,
				...getTypographyValue(attributes?.subtitleTypography, 'Tablet'),
				'margin': getBoxValue(attributes?.subtitleMarginTablet),
			},
			{
				selector: `.${WRAPPER} .gkit-heading-subtitle-has-border::before`,
				'width': getSliderValue(attributes?.subtitleBorderLeftWidthTablet),
				'margin': getBoxValue(attributes?.subtitleBorderLeftMarginTablet)
			},
			{
				selector: `.${WRAPPER} .gkit-heading-subtitle-has-border::after`,
				'width': getSliderValue(attributes?.subtitleBorderRightWidthTablet),
				'margin': getBoxValue(attributes?.subtitleBorderRightMarginTablet)
			},
			{
				selector: `.${WRAPPER} .gkit-heading-subtitle-has-border::after, .${WRAPPER} .gkit-heading-subtitle-has-border::before`,
				'height': getSliderValue(attributes?.subtitleBorderRightHeightTablet),
				'transform': `translateY(${getSliderValue(attributes?.subtitleBorderRightVerticalPositionTablet)})`,
			},
			{
				selector: `.${WRAPPER}.wp-block-gutenkit-heading .gkit-heading-separetor`,
				'margin': getBoxValue(attributes?.separatorMarginTablet),
			},
			{
				selector: `.${WRAPPER}.wp-block-gutenkit-heading .gkit-heading-separetor .gkit-heading-separetor-divider`,
				'width': getSliderValue(attributes?.separatorWidthTablet),
				'height': getSliderValue(attributes?.separatorHeightTablet),
			},
			{
				selector: `.${WRAPPER}.wp-block-gutenkit-heading .gkit-heading-separetor .gkit-heading-separetor-divider::before`,
				'height': getSliderValue(attributes?.separatorHeightTablet),
			},
			{
				selector: `.${WRAPPER} .gkit-heading-shadow-text`,
				'top': attributes?.shadowTextPositionTablet?.top,
				'left': attributes?.shadowTextPositionTablet?.left,
				...getTypographyValue(attributes?.shadowTextTypography, 'Tablet'),
			},
			{
				selector: `.${WRAPPER} .gkit-heading-subtitle-has-outline:not(.gkit-heading-subtitle-has-border)`,
				'border-radius': getBoxValue(attributes?.subtitleOutlineBorderRadiusTablet),
				'padding': getBoxValue(attributes?.subtitlePaddingTablet),
			}
		],
		mobile: [
			{
				selector: `.${WRAPPER}`,
				'text-align': attributes?.generalTextAlignmentMobile,
			},
			{
				selector: `.${WRAPPER} .gkit-heading-description`,
				'max-width': getSliderValue(attributes?.descriptionMaxWidthMobile),
				...getTypographyValue(attributes?.descriptionTypography, 'Mobile'),
				'margin': getBoxValue(attributes?.descriptionMarginMobile),
			},
			{
				selector: `.${WRAPPER} .gkit-heading-title`,
				'margin': getBoxValue(attributes?.titleMarginMobile),
				...getTypographyValue(attributes?.titleTypography, 'Mobile'),
			},
			{
				selector: `.${WRAPPER} .gkit-heading-title.gkit-heading-title-text-fill strong`,
				...fillBackgroundGenerator(attributes?.focusedTitleTextFillBackground, "Mobile"),
			},
			{
				selector: `.${WRAPPER} .gkit-heading-subtitle.gkit-heading-subtitle-has-text-fill`,
				...fillBackgroundGenerator(attributes?.subtitleTextFillBackground, "Mobile"),
			},
			{
				selector: `.${WRAPPER} .gkit-heading-title strong`,
				...getTypographyValue(attributes?.focusedTitleTypography, 'Mobile'),
				'padding': getBoxValue(attributes?.focusedTitlePaddingMobile)
			},
			{
				selector: `.${WRAPPER} .gkit-heading-subtitle`,
				...getTypographyValue(attributes?.subtitleTypography, 'Mobile'),
				'margin': getBoxValue(attributes?.subtitleMarginMobile),
			},
			{
				selector: `.${WRAPPER} .gkit-heading-subtitle-has-border::before`,
				'width': getSliderValue(attributes?.subtitleBorderLeftWidthMobile),
				'margin': getBoxValue(attributes?.subtitleBorderLeftMarginMobile)
			},
			{
				selector: `.${WRAPPER} .gkit-heading-subtitle-has-border::after`,
				'width': getSliderValue(attributes?.subtitleBorderRightWidthMobile),
				'margin': getBoxValue(attributes?.subtitleBorderRightMarginMobile)
			},
			{
				selector: `.${WRAPPER} .gkit-heading-subtitle-has-border::after, .${WRAPPER} .gkit-heading-subtitle-has-border::before`,
				'height': getSliderValue(attributes?.subtitleBorderRightHeightMobile),
				'transform': `translateY(${getSliderValue(attributes?.subtitleBorderRightVerticalPositionMobile)})`,
			},
			{
				selector: `.${WRAPPER}.wp-block-gutenkit-heading .gkit-heading-separetor`,
				'margin': getBoxValue(attributes?.separatorMarginMobile),
			},
			{
				selector: `.${WRAPPER}.wp-block-gutenkit-heading .gkit-heading-separetor .gkit-heading-separetor-divider`,
				'width': getSliderValue(attributes?.separatorWidthMobile),
				'height': getSliderValue(attributes?.separatorHeightMobile),
				'margin': getBoxValue(attributes?.separatorMarginMobile),
			},
			{
				selector: `.${WRAPPER}.wp-block-gutenkit-heading .gkit-heading-separetor .gkit-heading-separetor-divider::before`,
				'height': getSliderValue(attributes?.separatorHeightMobile),
			},
			{
				selector: `.${WRAPPER} .gkit-heading-shadow-text`,
				'top': attributes?.shadowTextPositionMobile?.top,
				'left': attributes?.shadowTextPositionMobile?.left,
				...getTypographyValue(attributes?.shadowTextTypography, 'Mobile'),
			},
			{
				selector: `.${WRAPPER} .gkit-heading-subtitle-has-outline:not(.gkit-heading-subtitle-has-border)`,
				'border-radius': getBoxValue(attributes?.subtitleOutlineBorderRadiusMobile),
				'padding': getBoxValue(attributes?.subtitlePaddingMobile),
			}
		]
	}

	return parseCSS(rawSyle);
}

export default HeadingStyle;