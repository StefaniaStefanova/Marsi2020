const gutenkitCSS = (attributes) => {
    const helpers = window.gutenkit.helpers;
	const {
        parseCSS,
        backgroundGenerator,
        getBoxShadowValue,
        getBoxValue,
        getBorderValue,
        overlayGenerator,
        getSliderValue
    } = helpers;

    const WRAPPER = attributes.blockClass;
    const rawCSS = {
        desktop: [
            {
                selector: `.editor-styles-wrapper .block-editor-block-list__layout.is-root-container > :where(.${WRAPPER}), body .is-layout-constrained > :where(.${WRAPPER}), .wp-block-gutenkit-container > .gkit-block__inner > .${WRAPPER}`,
                'overflow': attributes.overflow,
				'background': backgroundGenerator(attributes?.containerBackground, "Desktop").background,
				'background-size': backgroundGenerator( attributes?.containerBackground, "Desktop").size,
                ...getBorderValue(attributes?.border),
				...getBoxValue(attributes?.containerBorderRadiusDesktop, "border-radius"),
				'box-shadow': getBoxShadowValue(attributes?.conatinerBoxShadow),
            },
            {
                selector: `.editor-styles-wrapper .block-editor-block-list__layout.is-root-container > :where(.${WRAPPER}), body .is-layout-constrained > :where(.${WRAPPER})`,
                'max-width': attributes.containerWidth == 'alignfull' ? 'none' : attributes.containerWidth == 'alignwide' ? 'var(--wp--style--global--wide-size, 1200px)' : attributes.containerWidth == 'gkit-block-custom-wide' && `${getSliderValue(attributes.customWidthDesktop)}`,
            },
            {
                selector: `.${WRAPPER}.wp-block-gutenkit-container > .gkit-block__inner > .${WRAPPER}`,
                'max-width': attributes.containerWidth == 'alignfull' ? 'none' : attributes.containerWidth == 'alignwide' ? 'var(--wp--style--global--wide-size, 1200px)' : attributes.containerWidth == 'gkit-block-custom-wide' && `${getSliderValue(attributes.customWidthDesktop)}`
            },
            {
                selector: `.wp-block-gutenkit-container > .gkit-block__inner > .${WRAPPER}.gkit-block-custom-wide`,
                'flex-basis': getSliderValue(attributes.customWidthDesktop),
                'flex-shrink': `${attributes.containerFlexShrink}`,
            },
            {
                selector: `.editor-styles-wrapper .block-editor-block-list__layout.is-root-container > :where(.${WRAPPER}:hover), body .is-layout-constrained > :where(.${WRAPPER}:hover), .wp-block-gutenkit-container > .gkit-block__inner > .${WRAPPER}:hover`,
                ...getBorderValue(attributes?.borderHover),
				'background': backgroundGenerator(attributes?.containerBackgroundHover).background,
				...getBoxValue(attributes?.containerBorderRadiusHoverDesktop, "border-radius"),
				'box-shadow': getBoxShadowValue(attributes?.containerBoxShadowHover),
            },
            {
                selector: `.${WRAPPER} > .gkit-block__inner`,
                'display': 'flex',
                'flex-wrap': attributes.wrapDesktop,
                'max-width': attributes.contentWidth === 'boxed' && getSliderValue(attributes.contentBoxWidthDesktop),
                'min-height': getSliderValue(attributes.minHeightDesktop),
                'flex-direction': attributes.directionDesktop,
                'justify-content': attributes.justifyContentDesktop,
                'align-items': attributes.alignItemsDesktop,
                'gap': getSliderValue(attributes.gapBetweenDesktop),
            },
            {
                selector: `.${WRAPPER} > .gkit-container-overlay`,
                ...overlayGenerator(attributes?.containerBackgroundOverlay, "Desktop"),
                'transition': `background ${attributes?.containerOverlayHoverTransitionDuration?.size}s`
            },
            {
                selector: `.${WRAPPER}:hover > .gkit-container-overlay`,
                ...overlayGenerator(attributes?.containerBackgroundHoverOverlay, "Desktop"),
            }
        ],
        tablet: [
            {
                selector: `.editor-styles-wrapper .block-editor-block-list__layout.is-root-container > :where(.${WRAPPER}), body .is-layout-constrained > :where(.${WRAPPER}), .wp-block-gutenkit-container > .gkit-block__inner > .${WRAPPER}`,
				'background': backgroundGenerator(attributes?.containerBackground, "Tablet").background,
				'background-size': backgroundGenerator( attributes?.containerBackground, "Tablet").size,
				...getBoxValue(attributes?.containerBorderRadiusTablet, "border-radius"),
            },
            {
                selector: `.editor-styles-wrapper .block-editor-block-list__layout.is-root-container > :where(.${WRAPPER}), body .is-layout-constrained > :where(.${WRAPPER})`,
                'max-width': attributes.containerWidth == 'alignfull' ? 'none' : attributes.containerWidth == 'alignwide' ? '1200px' : attributes.containerWidth == 'gkit-block-custom-wide' && `${getSliderValue(attributes.customWidthTablet)}`,
            },
            {
                selector: `.wp-block-gutenkit-container > .gkit-block__inner > .${WRAPPER}.gkit-block-custom-wide`,
                'flex-basis': getSliderValue(attributes.customWidthTablet),
            },
			{
				selector: `.editor-styles-wrapper .block-editor-block-list__layout.is-root-container > :where(.${WRAPPER}:hover), body .is-layout-constrained > :where(.${WRAPPER}:hover), .wp-block-gutenkit-container > .gkit-block__inner > .${WRAPPER}:hover`,
				...getBoxValue(attributes?.containerBorderRadiusHoverTablet, "border-radius"),
			},
            {
                selector: `.${WRAPPER} > .gkit-block__inner`,
                'min-height': getSliderValue(attributes.minHeightTablet),
                'flex-direction': attributes.directionTablet,
				'max-width': attributes.contentWidth === 'boxed' && getSliderValue(attributes.contentBoxWidthTablet),
                'justify-content': attributes.justifyContentTablet,
                'align-items': attributes.alignItemsTablet,
                'gap': getSliderValue(attributes.gapBetweenTablet),
                'flex-wrap': attributes?.wrapTablet,
            },
            {
                selector: `.${WRAPPER} > .gkit-container-overlay`,
                ...overlayGenerator(attributes?.containerBackgroundOverlay, "Tablet"),
            },
            {
                selector: `.${WRAPPER}:hover > .gkit-container-overlay`,
                ...overlayGenerator(attributes?.containerBackgroundHoverOverlay, "Tablet"),
            }
        ],
        mobile: [
            {
                selector: `.editor-styles-wrapper .block-editor-block-list__layout.is-root-container > :where(.${WRAPPER}), body .is-layout-constrained > :where(.${WRAPPER}), .wp-block-gutenkit-container > .gkit-block__inner > .${WRAPPER}`,
				'background': backgroundGenerator(attributes?.containerBackground, "Mobile").background,
				'background-size': backgroundGenerator( attributes?.containerBackground, "Mobile").size,
				...getBoxValue(attributes?.containerBorderRadiusMobile, "border-radius"),
            },
            {
                selector: `.editor-styles-wrapper .block-editor-block-list__layout.is-root-container > :where(.${WRAPPER}), body .is-layout-constrained > :where(.${WRAPPER})`,
                'max-width': attributes.containerWidth == 'alignfull' ? 'none' : attributes.containerWidth == 'alignwide' ? '1200px' : attributes.containerWidth == 'gkit-block-custom-wide' && `${getSliderValue(attributes.customWidthMobile)}`,
            },
            {
                selector: `.wp-block-gutenkit-container > .gkit-block__inner > .${WRAPPER}.gkit-block-custom-wide`,
                'flex-basis': getSliderValue(attributes.customWidthMobile),
            },
			{
				selector: `.editor-styles-wrapper .block-editor-block-list__layout.is-root-container > :where(.${WRAPPER}:hover), body .is-layout-constrained > :where(.${WRAPPER}:hover), .wp-block-gutenkit-container > .gkit-block__inner > .${WRAPPER}:hover`,
				...getBoxValue(attributes?.containerBorderRadiusHoverMobile, "border-radius"),
			},
            {
                selector: `.${WRAPPER} > .gkit-block__inner`,
                'min-height': getSliderValue(attributes.minHeightMobile),
                'flex-direction': attributes.directionMobile,
				'max-width': attributes.contentWidth === 'boxed' && getSliderValue(attributes.contentBoxWidthMobile),
                'justify-content': attributes.justifyContentMobile,
                'align-items': attributes.alignItemsMobile,
                'gap': getSliderValue(attributes.gapBetweenMobile),
                'flex-wrap': attributes?.wrapMobile,
            },
            {
                selector: `.${WRAPPER} > .gkit-container-overlay`,
                ...overlayGenerator(attributes?.containerBackgroundOverlay, "Mobile"),
            },
            {
                selector: `.${WRAPPER}:hover > .gkit-container-overlay`,
                ...overlayGenerator(attributes?.containerBackgroundHoverOverlay, "Mobile"),
            }
        ]
    }

    return parseCSS(rawCSS);
}

export { gutenkitCSS };
