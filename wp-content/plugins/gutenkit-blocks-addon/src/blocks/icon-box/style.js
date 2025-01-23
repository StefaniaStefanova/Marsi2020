const IconBoxStyle = (attributes) => {
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
	const direction = {};
	const hoverDirection = {};
	if (attributes?.iconBoxContainerHoverHoverDirection === 'left' || attributes?.iconBoxContainerHoverHoverDirection === 'right') {
		direction[attributes?.iconBoxContainerHoverHoverDirection] = "-100%";
		direction.top = "0";
		hoverDirection[attributes?.iconBoxContainerHoverHoverDirection] = "0";
	}

	if (attributes?.iconBoxContainerHoverHoverDirection === 'top' || attributes?.iconBoxContainerHoverHoverDirection === 'bottom') {
		direction[attributes?.iconBoxContainerHoverHoverDirection] = "-100%";
		direction.left = "0";
		hoverDirection[attributes?.iconBoxContainerHoverHoverDirection] = "0";
	}

	const rawSyle = {
		desktop: [
			{
				selector: `.${WRAPPER}.gkit-icon-box`,
				'text-align': attributes?.iconBoxContentAlignmentDesktop,
				'flex-direction': attributes?.iconBoxHeaderIconPosition
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box-hover-background-animation::before`,
				'background': backgroundGenerator(attributes?.commonHoverBackground).background,
				...direction
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box-hover-background-animation:hover:before`,
				...hoverDirection
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-header`,
				'align-self': attributes?.iconBoxContentVerticalAlignmentDesktop,
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-body .gkit-icon-box-title`,
				'margin': getBoxValue(attributes?.iconBoxTitleMarginDesktop),
				'color': attributes?.iconBoxTitleColor,
				...getTypographyValue(attributes?.iconBoxTitleTypography, 'Desktop'),
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box:hover .gkit-icon-box-title`,
				'color': attributes?.iconBoxTitleHoverColor,
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-description`,
				'color': attributes?.iconBoxDescriptionColor,
				...getTypographyValue(attributes?.iconBoxDescriptionTypography, 'Desktop'),
				'margin': getBoxValue(attributes?.iconBoxDescriptionMarginDesktop),
				'padding': getBoxValue(attributes?.iconBoxDescriptionPaddingDesktop),
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box:hover .gkit-icon-box-description`,
				'color': attributes?.iconBoxDescriptionHoverColor,
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-watermark`,
				'color': attributes?.iconBoxWaterMarkIconColor,
				'font-size': getSliderValue(attributes?.iconBoxWaterMarkIconSizeDesktop),
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-header .gkit-icon-box-header-icon`,
				'fill': attributes?.iconBoxIconColor,
				'background-color': attributes?.iconBoxIconBackgroundColor,
				...getBorderValue(attributes?.iconBoxIconBorder),
				'border-radius': getBoxValue(attributes?.iconBoxIconBorderRadiusDesktop),
				'box-shadow': getBoxShadowValue(attributes?.iconBoxIconBoxShadow),
				'font-size': getSliderValue(attributes?.iconBoxIconSizeDesktop),
				'padding': getBoxValue(attributes?.iconBoxIconPaddingDesktop),
				'rotate': getSliderValue(attributes?.iconBoxIconRotateDesktop),
				'height': attributes?.useHeightWidthIcon && getSliderValue(attributes.iconHeightDesktop),
                'width': attributes?.useHeightWidthIcon && getSliderValue(attributes.iconWidthDesktop),
                'line-height': attributes?.useHeightWidthIcon  && getSliderValue(attributes.iconLineHeightDesktop),
				'margin': getBoxValue(attributes?.iconBoxIconSpacingDesktop),
				'transform': `translateY(${getSliderValue(attributes?.iconBoxIconVerticalAlignDesktop)})`,
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box:hover .gkit-icon-box-header .gkit-icon-box-header-icon`,
				'fill': attributes?.iconBoxIconHoverColor,
				'background-color': attributes?.iconBoxIconHoverBackgroundColor,
				...getBorderValue(attributes?.iconBoxIconHoverBorder),
				'border-radius': getBoxValue(attributes?.iconBoxIconHoverBorderRadiusDesktop),
				'box-shadow': getBoxShadowValue(attributes?.iconBoxIconHoverBoxShadow),
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-button-wrapper .gkit-icon-box-button`,
				'color': attributes?.iconBoxBtnTextColor,
				'fill': attributes?.iconBoxBtnTextColor,
				'background': backgroundGenerator(attributes?.iconBoxBtnBackground).background,
				...getBorderValue(attributes?.iconBoxBtnBorder),
				'box-shadow': getBoxShadowValue(attributes?.iconBoxBtnBoxShadow),
				...getTypographyValue(attributes?.iconBoxBtnTypography, 'Desktop'),
				'padding': getBoxValue(attributes?.iconBoxBtnPaddingDesktop),
				'margin': getBoxValue(attributes?.iconBoxBtnMarginDesktop),
				'border-radius': getBoxValue(attributes?.iconBoxBtnBorderRadiusDesktop),
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-button-wrapper .gkit-icon-box-button `,
				'font-size': getSliderValue(attributes?.iconBoxBtnIconSizeDesktop),
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box:hover .gkit-icon-box-button-wrapper .gkit-icon-box-button`,
				'color': attributes?.iconBoxBtnHoverColor,
				'fill': attributes?.iconBoxBtnHoverColor,
				'background': backgroundGenerator(attributes?.iconBoxBtnHoverBackground).background,
				...getBorderValue(attributes?.iconBoxBtnHoverBorder),
				'box-shadow': getBoxShadowValue(attributes?.iconBoxBtnHoverBoxShadow),
				'border-radius': getBoxValue(attributes?.iconBoxBtnHoverBorderRadiusDesktop),
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-badge`,
				'left': attributes?.iconBoxBadgePosition ? (attributes?.iconBoxBadgePosition?.x * 100) + '%' : undefined,
				'top': attributes?.iconBoxBadgePosition ? (attributes?.iconBoxBadgePosition?.y * 100) + '%' : undefined,
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-badge .gkit-icon-box-badge-text`,
				'color': attributes?.iconBoxBadgeTextColor,
				'background': backgroundGenerator(attributes?.iconBoxBadgeBackground).background,
				'background-size': backgroundGenerator(attributes?.iconBoxBadgeBackground).size,
				'box-shadow': getBoxShadowValue(attributes?.iconBoxBadgeBoxShadow),
				...getTypographyValue(attributes?.iconBoxBadgeTypography, 'Desktop'),
				'padding': getBoxValue(attributes?.iconBoxBadgePaddingDesktop),
				'border-radius': getBoxValue(attributes?.iconBoxBadgeBorderRadiusDesktop),
			},
			{
				selector: `.${WRAPPER} .gkit-icon-box-button .gkit-btn-left-icon`,
				'margin-right': getSliderValue(attributes?.iconBoxBtnIconSpacing),
			},
			{
				selector: `.${WRAPPER} .gkit-icon-box-button .gkit-btn-right-icon`,
				'margin-left': getSliderValue(attributes?.iconBoxBtnIconSpacing),
			}
		],
		tablet: [
			{
				selector: `.${WRAPPER}.gkit-icon-box`,
				'text-align': attributes?.iconBoxContentAlignmentTablet,
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-header`,
				'align-self': attributes?.iconBoxContentVerticalAlignmentTablet,
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-body .gkit-icon-box-title`,
				'margin': getBoxValue(attributes?.iconBoxTitleMarginTablet),
				...getTypographyValue(attributes?.iconBoxTitleTypography, 'Tablet'),
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-description`,
				...getTypographyValue(attributes?.iconBoxDescriptionTypography, 'Tablet'),
				'margin': getBoxValue(attributes?.iconBoxDescriptionMarginTablet),
				'padding': getBoxValue(attributes?.iconBoxDescriptionPaddingTablet),
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-watermark`,
				'font-size': getSliderValue(attributes?.iconBoxWaterMarkIconSizeTablet),
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-header .gkit-icon-box-header-icon`,
				'border-radius': getBoxValue(attributes?.iconBoxIconBorderRadiusTablet),
				'font-size': getSliderValue(attributes?.iconBoxIconSizeTablet),
				'padding': getBoxValue(attributes?.iconBoxIconPaddingTablet),
				'rotate': getSliderValue(attributes?.iconBoxIconRotateTablet),
				'height': attributes?.useHeightWidthIcon  && getSliderValue(attributes.iconHeightTablet),
                'width': attributes?.useHeightWidthIcon  && getSliderValue(attributes.iconWidthTablet),
                'line-height': attributes?.useHeightWidthIcon  && getSliderValue(attributes.iconLineHeightTablet),
				'margin': getBoxValue(attributes?.iconBoxIconSpacingTablet),
				'transform': `translateY(${getSliderValue(attributes?.iconBoxIconVerticalAlignTablet)})`,
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box:hover .gkit-icon-box-header-icon`,
				'border-radius': getBoxValue(attributes?.iconBoxIconHoverBorderRadiusTablet),
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-button-wrapper .gkit-icon-box-button`,
				...getTypographyValue(attributes?.iconBoxBtnTypography, 'Tablet'),
				'padding': getBoxValue(attributes?.iconBoxBtnPaddingTablet),
				'margin': getBoxValue(attributes?.iconBoxBtnMarginTablet),
				'border-radius': getBoxValue(attributes?.iconBoxBtnBorderRadiusTablet),
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-button-wrapper .gkit-icon-box-button`,
				'font-size': getSliderValue(attributes?.iconBoxBtnIconSizeTablet),
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box:hover .gkit-icon-box-button-wrapper .gkit-icon-box-button`,
				'border-radius': getBoxValue(attributes?.iconBoxBtnHoverBorderRadiusTablet),
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-badge .gkit-icon-box-badge-text`,
				...getTypographyValue(attributes?.iconBoxBadgeTypography, 'Tablet'),
				'padding': getBoxValue(attributes?.iconBoxBadgePaddingTablet),
				'border-radius': getBoxValue(attributes?.iconBoxBadgeBorderRadiusTablet),
			}
		],
		mobile: [
			{
				selector: `.${WRAPPER}.gkit-icon-box`,
				'text-align': attributes?.iconBoxContentAlignmentMobile,
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-header`,
				'align-self': attributes?.iconBoxContentVerticalAlignmentMobile,
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-body .gkit-icon-box-title`,
				'margin': getBoxValue(attributes?.iconBoxTitleMarginMobile),
				...getTypographyValue(attributes?.iconBoxTitleTypography, 'Mobile'),
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-description`,
				...getTypographyValue(attributes?.iconBoxDescriptionTypography, 'Mobile'),
				'margin': getBoxValue(attributes?.iconBoxDescriptionMarginMobile),
				'padding': getBoxValue(attributes?.iconBoxDescriptionPaddingMobile),
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-body .gkit-icon-box-watermark`,
				'font-size': getSliderValue(attributes?.iconBoxWaterMarkIconSizeMobile),
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-header .gkit-icon-box-header-icon`,
				'border-radius': getBoxValue(attributes?.iconBoxIconBorderRadiusMobile),
				'font-size': getSliderValue(attributes?.iconBoxIconSizeMobile),
				'margin': getBoxValue(attributes?.iconBoxIconSpacingMobile),
				'padding': getBoxValue(attributes?.iconBoxIconPaddingMobile),
				'rotate': getSliderValue(attributes?.iconBoxIconRotateMobile),
				'height': attributes?.useHeightWidthIcon  && getSliderValue(attributes.iconHeightMobile),
                'width': attributes?.useHeightWidthIcon  && getSliderValue(attributes.iconWidthMobile),
                'line-height': attributes?.useHeightWidthIcon  && getSliderValue(attributes.iconLineHeightMobile),
				'margin': getBoxValue(attributes?.iconBoxIconSpacingMobile),
				'transform': `translateY(${getSliderValue(attributes?.iconBoxIconVerticalAlignMobile)})`,
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box:hover .gkit-icon-box-header-icon`,
				'border-radius': getBoxValue(attributes?.iconBoxIconHoverBorderRadiusMobile),
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-button-wrapper .gkit-icon-box-button`,
				...getTypographyValue(attributes?.iconBoxBtnTypography, 'Mobile'),
				'padding': getBoxValue(attributes?.iconBoxBtnPaddingMobile),
				'margin': getBoxValue(attributes?.iconBoxBtnMarginMobile),
				'border-radius': getBoxValue(attributes?.iconBoxBtnBorderRadiusMobile),
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-button-wrapper .gkit-icon-box-button`,
				'font-size': getSliderValue(attributes?.iconBoxBtnIconSizeMobile),
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box:hover .gkit-icon-box-button-wrapper .gkit-icon-box-button`,
				'border-radius': getBoxValue(attributes?.iconBoxBtnHoverBorderRadiusMobile),
			},
			{
				selector: `.${WRAPPER}.gkit-icon-box .gkit-icon-box-badge .gkit-icon-box-badge-text`,
				...getTypographyValue(attributes?.iconBoxBadgeTypography, 'Mobile'),
				'padding': getBoxValue(attributes?.iconBoxBadgePaddingMobile),
				'border-radius': getBoxValue(attributes?.iconBoxBadgeBorderRadiusMobile),
			}
		]
	}
	return parseCSS(rawSyle);
}

export default IconBoxStyle;
