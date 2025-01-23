const gutenkitCSS = (attributes) => {
    const helpers = window.gutenkit.helpers;
	const {
        parseCSS,
        backgroundGenerator,
        getBoxShadowValue,
        getBoxValue,
        getBorderValue,
        getTypographyValue,
        getSliderValue
    } = helpers;

    const WRAPPER = attributes?.blockClass;
    const rawCSS = {
        desktop: [
            //Floating Style
            {
                selector: `.${WRAPPER} .gkit-info-image-box.floating-style .gkit-box-body`,
                'height': getSliderValue(attributes.imageFloatingBoxHeightDesktop),
                'margin-top': getSliderValue(attributes.imageFloatingBoxMarginTopDesktop),
                'width': getSliderValue(attributes.imageFloatingBoxWidthDesktop)
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box.floating-style .gkit-box-body .gkit-info-box-title > .gkit-icon`,
                'height': getSliderValue(attributes.imageFloatingBoxIconFontSizeDesktop),
                'width': getSliderValue(attributes.imageFloatingBoxIconFontSizeDesktop),
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-box-content .gkit-info-box .gkit-icon`,
                'fill': attributes?.imageFloatingBoxIconColor,
                'font-size': getSliderValue(attributes?.imageFloatingBoxIconFontSizeDesktop)
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box.floating-style:hover .gkit-box-body .gkit-icon`,
                'fill': attributes.imageFloatingBoxIconColorHover,
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box.floating-style:hover .gkit-box-body`,
                'height': getSliderValue(attributes.imageFloatingBoxHoverHeightDesktop),
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box.floating-style .gkit-box-body, .${WRAPPER} .gkit-info-image-box.floating-style .gkit-box-body::before, .${WRAPPER} .gkit-info-image-box.floating-style .gkit-box-body::after`,
                'background': backgroundGenerator(attributes?.imageFloatingBoxBackground).background,
                'box-shadow': getBoxShadowValue(attributes.imageFloatingBoxShadow)
            },
            //Classic Curves
            {
                selector: `.${WRAPPER} .gkit-info-image-box.style-modern .gkit-box-body`,
                'width': `${getSliderValue(attributes.imageClassicCurvesWidthDesktop)}`,
                'margin-top': getSliderValue(attributes.imageClassicCurvesMarginDesktop)
            },
            // Hover Border Bottom
            {
                selector: `.${WRAPPER} .gkit-info-image-box.hover-border-bottom .gkit-box-body::before`,
                'height': getSliderValue(attributes.borderHoverHeightDesktop),
                'background': backgroundGenerator(attributes?.borderHoverBackground).background,
            },
            // Side Line
            {
                selector: `.${WRAPPER} .gkit-image-box.style-sideline .gkit-image-box-body-inner`,
                'border-left':  `${attributes?.imageSideLineBorder?.width} ${attributes?.imageSideLineBorder?.style} ${attributes?.imageSideLineBorder?.color}` ,
            },
            {
                selector: `.${WRAPPER} .gkit-image-box.style-sideline:hover .gkit-image-box-body-inner`,
                'border-left': `${attributes?.imageSideLineBorderHover?.width} ${attributes?.imageSideLineBorderHover?.style} ${attributes?.imageSideLineBorderHover?.color}`,
            },
            // Shadow Line
            {
                selector: `.${WRAPPER} .gkit-info-image-box.shadow-line .gkit-box-body::before`,
                'width': getSliderValue(attributes.imageShadowLeftLineWidth),
                'box-shadow': getBoxShadowValue(attributes.imageShadowLeftLineShadow),
                'background': backgroundGenerator(attributes?.imageShadowLeftLineBackground).background,
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box.shadow-line .gkit-box-body::after`,
                'width': getSliderValue(attributes.imageShadowRightLineWidth),
                'box-shadow': getBoxShadowValue(attributes.imageShadowRightLineShadow),
                'background': backgroundGenerator(attributes?.imageShadowRightLineBackground).background,
            },
            // image
            {
                selector: `.${WRAPPER} .gkit-box-header img`,
                'border-radius': getBoxValue(attributes.borderRadiusDesktop)
            },
            {
                selector: `.${WRAPPER} .gkit-box-header img`,
                'padding': getBoxValue(attributes.paddingDesktop),
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box:hover  .gkit-box-header img`,
                'transform': `scale(${getSliderValue(attributes.imageScaleOnHover)})`
            },
            // body
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-box-body`,
                ...getBorderValue(attributes?.containerBorderGroup),
                'border-radius': getBoxValue(attributes.containerBorderRadiusDesktop),
                'background': backgroundGenerator(attributes?.containerBackground).background,
                'padding': getBoxValue(attributes.containerSpacingDesktop),
                'box-shadow': getBoxShadowValue(attributes.containershadowGroup)
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box`,
                'text-align': attributes?.contentTextAlignDesktop
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-box-content .gkit-info-box`,
                'justify-content': attributes?.contentTextAlignDesktop
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-box-header`,
                'display': 'flex',
                'justify-content': attributes?.contentTextAlignDesktop,
            },
            // title
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-info-box-title`,
                'margin': getBoxValue(attributes.titleBottomSpaceDesktop),
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-box-content :is(.gkit-info-box-title, .gkit-info-box-title a )`,
                ...getTypographyValue(attributes.titleTypography, 'Desktop'),
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-info-box-title, .${WRAPPER} .gkit-info-image-box .gkit-info-box-title a`,
                'color': attributes.headingColor,
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box:hover .gkit-info-box-title, .${WRAPPER} .gkit-info-image-box:hover .gkit-info-box-title a`,
                'color': attributes.headingColorHover,
            },
            //description
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-box-style-content`,
                'margin': getBoxValue(attributes.descriptionBottomSpaceDesktop),
                ...getTypographyValue(attributes.descriptionTypography, 'Desktop'),
                'color': attributes.descriptionColor
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box:hover .gkit-box-style-content`,
                'color': attributes.descriptionColorHover
            },
            // button
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-btn`,
                'padding': getBoxValue(attributes.textPaddingDesktop),
                ...getTypographyValue(attributes.buttonTypography, 'Desktop'),
                'color': attributes.buttonTextColor,
                'fill': attributes.buttonTextColor,
                'background': backgroundGenerator(attributes?.btnBackgroundGroup).background,
                ...getBorderValue(attributes?.buttonBorder),
                'border-radius': getBoxValue(attributes.btnBorderRadiusDesktop),
                'box-shadow': getBoxShadowValue(attributes.buttonBoxShadow),
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-btn i`,
                'font-size': getSliderValue(attributes.btnIconFontSizeDesktop)
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-btn .icon-left`,
                'margin-right': getSliderValue(attributes.btnIconSpacing)
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-btn .icon-right`,
                'margin-left': getSliderValue(attributes.btnIconSpacing)
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-btn:hover`,
                'color': attributes.btnHoverColor,
                'fill': attributes.btnHoverColor,
                'background': backgroundGenerator(attributes?.btnBackgroundHoverGroup).background,
                ...getBorderValue(attributes?.buttonBorderHover),
                'border-radius': getBoxValue(attributes.btnHoverBorderRadiusDesktop),
                'box-shadow': getBoxShadowValue(attributes.buttonBoxShadowHover)
            }
        ],
        tablet: [
            // Floating Style
            {
                selector: `.${WRAPPER} .gkit-info-image-box.floating-style .gkit-box-body`,
                'height': getSliderValue(attributes.imageFloatingBoxHeightTablet),
                'margin-top': getSliderValue(attributes.imageFloatingBoxMarginTopTablet),
                'width': getSliderValue(attributes.imageFloatingBoxWidthTablet)

            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box.floating-style .gkit-box-body .gkit-info-box-title > .gkit-icon`,
                'height': getSliderValue(attributes.imageFloatingBoxIconFontSizeTablet),
                'width': getSliderValue(attributes.imageFloatingBoxIconFontSizeTablet),
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box.floating-style:hover .gkit-box-body`,
                'height': getSliderValue(attributes.imageFloatingBoxHoverHeightTablet),
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-box-content .gkit-info-box .gkit-icon`,
                'font-size': getSliderValue(attributes?.imageFloatingBoxIconFontSizeTablet)
            },
            //Classic Curves
            {
                selector: `.${WRAPPER} .gkit-info-image-box.style-modern .gkit-box-body`,
                'width': getSliderValue(attributes.imageClassicCurvesWidthTablet),
                'margin-top': getSliderValue(attributes.imageClassicCurvesMarginTablet)
            },
            // Hover Border Bottom
            {
                selector: `.${WRAPPER} .gkit-info-image-box.hover-border-bottom .gkit-box-body::before`,
                'height': getSliderValue(attributes.borderHoverHeightTablet)
            },
            // image
            {
                selector: `.${WRAPPER} .gkit-box-header img`,
                'border-radius': getBoxValue(attributes.borderRadiusTablet)
            },
            {
                selector: `.${WRAPPER} .gkit-box-header img`,
                'padding': getBoxValue(attributes.paddingTablet)
            },
            // body
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-box-body`,
                'border-radius': getBoxValue(attributes.containerBorderRadiusTablet),
                'padding': getBoxValue(attributes.containerSpacingTablet),
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box`,
                'text-align': attributes?.contentTextAlignTablet
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-box-content .gkit-info-box`,
                'justify-content': attributes?.contentTextAlignTablet
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-box-header`,
                'display': 'flex',
                'justify-content': attributes?.contentTextAlignTablet,
            },
            // title
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-info-box-title`,
                'margin': getBoxValue(attributes.titleBottomSpaceTablet),
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-box-content :is(.gkit-info-box-title, .gkit-info-box-title a )`,
                ...getTypographyValue(attributes.titleTypography, 'Tablet'),
            },
            //description
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-box-style-content`,
                'margin': getBoxValue(attributes.descriptionBottomSpaceTablet),
                ...getTypographyValue(attributes.descriptionTypography, 'Tablet'),
            },
            // button
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-btn`,
                'padding': getBoxValue(attributes.textPaddingTablet),
                ...getTypographyValue(attributes.buttonTypography, 'Tablet'),
                'border-radius': getBoxValue(attributes.btnBorderRadiusTablet),
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-btn i`,
                'font-size': getSliderValue(attributes.btnIconFontSizeTablet)
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-btn:hover`,
                'border-radius': getBoxValue(attributes.btnHoverBorderRadiusTablet),
            },

        ],
        mobile: [
            //Floating Style
            {
                selector: `.${WRAPPER} .gkit-info-image-box.floating-style .gkit-box-body`,
                'height': getSliderValue(attributes.imageFloatingBoxHeightMobile),
                'margin-top': getSliderValue(attributes.imageFloatingBoxMarginTopMobile),
                'width': getSliderValue(attributes.imageFloatingBoxWidthMobile)

            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box.floating-style .gkit-box-body .gkit-info-box-title > .gkit-icon`,
                'height': getSliderValue(attributes.imageFloatingBoxIconFontSizeMobile),
                'width': getSliderValue(attributes.imageFloatingBoxIconFontSizeMobile),
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box.floating-style:hover .gkit-box-body`,
                'height': getSliderValue(attributes.imageFloatingBoxHoverHeightMobile),
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-box-content .gkit-info-box .gkit-icon`,
                'font-size': getSliderValue(attributes?.imageFloatingBoxIconFontSizeMobile)
            },
            //Classic Curves
            {
                selector: `.${WRAPPER} .gkit-info-image-box.style-modern .gkit-box-body`,
                'width': getSliderValue(attributes.imageClassicCurvesWidthMobile),
                'margin-top': getSliderValue(attributes.imageClassicCurvesMarginMobile)
            },
            // Hover Border Bottom
            {
                selector: `.${WRAPPER} .gkit-info-image-box.hover-border-bottom .gkit-box-body::before`,
                'height': getSliderValue(attributes.borderHoverHeightMobile),
            },
            // image
            {
                selector: `.${WRAPPER} .gkit-box-header img`,
                'border-radius': getBoxValue(attributes.borderRadiusMobile)
            },
            {
                selector: `.${WRAPPER} .gkit-box-header img`,
                'padding': getBoxValue(attributes.paddingMobile)
            },
            // body
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-box-body`,
                'border-radius': getBoxValue(attributes.containerBorderRadiusMobile),
                'padding': getBoxValue(attributes.containerSpacingMobile),

            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box`,
                'text-align': attributes?.contentTextAlignMobile
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-box-content .gkit-info-box`,
                'justify-content': attributes?.contentTextAlignMobile
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-box-header`,
                'display': 'flex',
                'justify-content': attributes?.contentTextAlignMobile,
            },
            // title
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-info-box-title`,
                'margin': getBoxValue(attributes.titleBottomSpaceMobile),
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-box-content :is(.gkit-info-box-title, .gkit-info-box-title a )`,
                ...getTypographyValue(attributes.titleTypography, 'Mobile'),
            },
            //description
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-box-style-content`,
                'margin': getBoxValue(attributes.descriptionBottomSpaceMobile),
                ...getTypographyValue(attributes.descriptionTypography, 'Mobile'),
            },
            // button
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-btn`,
                'padding': getBoxValue(attributes.textPaddingMobile),
                ...getTypographyValue(attributes.buttonTypography, 'Mobile'),
                'border-radius': getBoxValue(attributes.btnBorderRadiusMobile),
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-btn i`,
                'font-size': getSliderValue(attributes.btnIconFontSizeMobile)
            },
            {
                selector: `.${WRAPPER} .gkit-info-image-box .gkit-btn:hover`,
                'border-radius': getBoxValue(attributes.btnHoverBorderRadiusMobile),
            },

        ]
    }

    return parseCSS(rawCSS);
}

export { gutenkitCSS };