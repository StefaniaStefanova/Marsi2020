const gutenkitCSS = (attributes) => {
	const {
        parseCSS,
        backgroundGenerator,
        getBoxValue,
        getBorderValue,
        getTypographyValue,
        getSliderValue,
        getBoxShadowValue
    } = window.gutenkit.helpers;

    const WRAPPER = `.${attributes?.blockClass}.wp-block-gutenkit-team`;

    const getRepeaterValue = (repeaterKey) => {
		const repeaterValue = repeaterKey.map((key, index) => {
			return [
				{
					selector: `${WRAPPER} .gkit-team-social-list-item-${index} > a`,
					'fill': key['color'],
					'background-color': key['backgroundColor'],
				},
				{
					selector: `${WRAPPER} .gkit-team-social-list-item-${index} > a:hover`,
					'fill': key['hoverColor'],
					'background-color': key['hoverbackgroundColor'],
				}
			]
		})

		let CSSVALUE = [];
		repeaterValue.forEach((item) => {
			CSSVALUE = [...CSSVALUE, ...item];
		})

		return CSSVALUE;
	}
    
    const rawCSS = {
        desktop: [
            //Content
            {
                selector: `${WRAPPER} .gkit-team`,
                'text-align': attributes?.contentAlignmentDesktop,
            },
            {
                selector: `${WRAPPER} .profile-card, ${WRAPPER} .profile-image-card`,
                'background': backgroundGenerator(attributes?.background).background,
                'box-shadow': getBoxShadowValue(attributes.boxShadow),
                'padding': getBoxValue(attributes?.paddingDesktop),
                ...getBorderValue(attributes?.border),
                'border-radius': getBoxValue(attributes?.borderRadius)
            },
            {
                selector: `${WRAPPER} .profile-card:hover, ${WRAPPER} .profile-image-card:hover, ${WRAPPER} .profile-card::before, ${WRAPPER} .profile-image-card::before, ${WRAPPER} div .profile-card .profile-body::before, ${WRAPPER} .image-card-v3 .profile-image-card:after`,
                'background': backgroundGenerator(attributes?.backgroundHover).background,
            },
            {
                selector: `${WRAPPER} .image-card-v3 .profile-image-card:after`,
                'height': getSliderValue(attributes?.longHeightOverlayDesktop),
            },
            {
                selector: `${WRAPPER} .profile-card:hover, ${WRAPPER} .profile-image-card:hover`,
                'box-shadow': getBoxShadowValue(attributes.boxShadowHover),
                ...getBorderValue(attributes?.borderHover),
            },
            {
                selector: `${WRAPPER} .profile-square-v.square-v6 .profile-card:hover`,
                'box-shadow': getBoxShadowValue(attributes.boxShadowHover)
            },
            {
                selector: `${WRAPPER} .profile-body, ${WRAPPER} .profile-square-v .profile-card .profile-body`,
                'padding': getBoxValue(attributes.contentPaddingDesktop)
            },
            {
                selector: `${WRAPPER} .profile-square-v.square-v4 .profile-card .profile-body::before`,
                'background': backgroundGenerator(attributes?.backgroundHoverOverlay).background,
            },
            {
                selector: `${WRAPPER} .gkit-team .profile-header > img, ${WRAPPER} .profile-image-card img, ${WRAPPER} .profile-image-card, ${WRAPPER} .profile-header, ${WRAPPER} .image-card-v2.style-circle .profile-image-card > img`,
                'height': getSliderValue(attributes?.imageSizeDesktop),
                'width': getSliderValue(attributes?.imageSizeDesktop),
                'border-radius': getBoxValue(attributes?.imageBorderRadius)
            },
            {
                selector: `${WRAPPER} .profile-card .profile-header`,
                'margin': getBoxValue(attributes?.imageMarginDesktop),
                'box-shadow': getBoxShadowValue(attributes.imageShadow),
                ...getBorderValue(attributes?.imageBorder),
            },
            {
                selector: `${WRAPPER} .gkit-team-modal-img > img`,
                'box-shadow': getBoxShadowValue(attributes.imageShadowPopup)
            },
            {
                selector: `${WRAPPER} .profile-body .profile-title`,
                ...getTypographyValue(attributes.nameTypography, 'Desktop'),
                'color': attributes.nameColor,
                'margin-bottom': getSliderValue(attributes.nameMarginDesktop)
            },
            {
                selector: `${WRAPPER} .profile-body:hover .profile-title, ${WRAPPER} .profile-card:hover .profile-title, ${WRAPPER} .profile-square-v .profile-card:hover .profile-title`,
                'color': attributes.nameHoverColor,
            },
            {
                selector: `${WRAPPER} .profile-body .profile-designation`,
                ...getTypographyValue(attributes.designationTypography, 'Desktop'),
                'color': attributes.designationColor,
                'margin-bottom': getSliderValue(attributes.designationMarginDesktop)
            },
            {
                selector: `${WRAPPER} .profile-card:hover .profile-body .profile-designation, ${WRAPPER} .profile-body .profile-designation:hover, ${WRAPPER} profile-square-v .profile-card:hover .profile-designation`,
                'color': attributes.designationHoverColor,
            },
            {
                selector: `${WRAPPER} .profile-body .profile-content`,
                ...getTypographyValue(attributes.descriptionTypography, 'Desktop'),
                'color': attributes.descriptionColor,
                'margin-bottom': getSliderValue(attributes.descriptionMarginDesktop)
            },
            {
                selector: `${WRAPPER} .profile-card:hover .profile-body .profile-content, ${WRAPPER} .profile-image-card:hover .profile-body .profile-content`,
                'color': attributes.descriptionHoverColor,
            },
            {
                selector: `${WRAPPER} .gkit-team-social-list > li > a`,
                'box-shadow': getBoxShadowValue(attributes.iconboxShadow),
                ...getBorderValue(attributes?.iconBorder),
                'border-radius': getBoxValue(attributes?.iconBorderRadius),
                'font-size': getSliderValue(attributes.iconSizeDesktop),
                'margin': getBoxValue(attributes.iconMarginDesktop),
                'height': attributes.showSocialProfilesHeight && getSliderValue(attributes.iconHeightDesktop),
                'width': attributes.showSocialProfilesHeight && getSliderValue(attributes.iconWidthDesktop),
                'line-height': attributes.showSocialProfilesHeight && getSliderValue(attributes.iconLineHeightDesktop)
            },
            {
                selector: `${WRAPPER} .gkit-team-modal-content`,
                'background': backgroundGenerator(attributes?.popupBackground).background,
            },
            {
                selector: `${WRAPPER} .gkit-team-modal-title`,
                ...getTypographyValue(attributes.popupNameTypography, 'Desktop'),
                'color': attributes.popupNameColor,
                'margin-bottom': getSliderValue(attributes.popupNameMarginDesktop),
            },
            {
                selector: `${WRAPPER} .gkit-team-modal-position`,
                ...getTypographyValue(attributes.popupDesignationTypography, 'Desktop'),
                'color': attributes.popupDesignationColor,
                'margin-bottom': getSliderValue(attributes.popupDesignationMarginDesktop),
            },
            {
                selector: `${WRAPPER} .gkit-team-modal-description`,
                ...getTypographyValue(attributes.popupDescriptionTypography, 'Desktop'),
                'color': attributes.popupDescriptionColor,
                'margin-bottom': getSliderValue(attributes.popupDescriptionMarginDesktop),
            },
            {
                selector: `${WRAPPER} .gkit-team-modal-list`,
                ...getTypographyValue(attributes.popupPhoneTypography, 'Desktop'),
                'color': attributes.popupPhoneColor
            },
            {
                selector: `${WRAPPER} .gkit-team-modal-list a:hover`,
                'color': attributes.popupPhoneHoverColor
            },
            {
                selector: `${WRAPPER} .gkit-team-modal-close`,
                'font-size': attributes.popupIconSizeDesktop
            },
            {
                selector: `${WRAPPER} .gkit-team-modal-close`,
                'font-size': getSliderValue(attributes.popupIconSizeDesktop),
                'fill': attributes.popupIconColor,
                'background-color': attributes.popupIconBackgroundColor,
                'padding': getBoxValue(attributes.popupIconPaddingDesktop),
                ...getBorderValue(attributes?.popupIconBorder),
                'border-radius': getBoxValue(attributes?.popupIconBorderRadius)
            },
            {
                selector: `${WRAPPER} .gkit-team-modal-close:hover`,
                'fill': attributes.popupIconHoverColor,
                'background-color': attributes.popupIconBackgroundHoverColor
            },
			...getRepeaterValue(attributes?.socialProfiles)
        ],
        tablet: [
            //Content
            {
                selector: `${WRAPPER} .gkit-team`,
                'text-align': attributes?.contentAlignmentTablet,
            },
            {
                selector: `${WRAPPER} .profile-card, ${WRAPPER} .profile-image-card`,
                'padding': getBoxValue(attributes?.paddingTablet)
            },
            {
                selector: `${WRAPPER} .profile-body, ${WRAPPER} .profile-square-v .profile-card .profile-body`,
                'padding': getBoxValue(attributes.contentPaddingTablet)
            },
            {
                selector: `${WRAPPER} .profile-header > img, ${WRAPPER} .profile-image-card img, ${WRAPPER} .profile-image-card, ${WRAPPER} .profile-header`,
                'height': getSliderValue(attributes?.imageSizeTablet),
                'width': getSliderValue(attributes?.imageSizeTablet)
            },
            {
                selector: `${WRAPPER} .profile-card .profile-header`,
                'margin': getBoxValue(attributes?.imageMarginTablet),
            },
            {
                selector: `${WRAPPER} .profile-body .profile-title`,
                ...getTypographyValue(attributes.nameTypography, 'Tablet'),
                'margin-bottom': getSliderValue(attributes.nameMarginTablet)
            },
            {
                selector: `${WRAPPER} .profile-body .profile-designation`,
                ...getTypographyValue(attributes.designationTypography, 'Tablet'),
                'margin-bottom': getSliderValue(attributes.designationMarginTablet)
            },
            {
                selector: `${WRAPPER} .profile-body .profile-content`,
                ...getTypographyValue(attributes.descriptionTypography, 'Tablet'),
                'margin-bottom': getSliderValue(attributes.descriptionMarginTablet)
            },
            {
                selector: `${WRAPPER} .gkit-team-social-list > li > a`,
                'font-size': getSliderValue(attributes.iconSizeTablet),
                'margin': getBoxValue(attributes.iconMarginTablet),
                'height': getSliderValue(attributes.iconHeightTablet),
                'width': getSliderValue(attributes.iconWidthTablet),
                'line-height': getSliderValue(attributes.iconLineHeightTablet)
            },
            {
                selector: `${WRAPPER} .gkit-team-modal-title`,
                ...getTypographyValue(attributes.popupNameTypography, 'Tablet'),
                'margin-bottom': getSliderValue(attributes.popupNameMarginTablet),
            },
            {
                selector: `${WRAPPER} .gkit-team-modal-position`,
                ...getTypographyValue(attributes.popupDesignationTypography, 'Tablet'),
                'margin-bottom': getSliderValue(attributes.popupDesignationMarginTablet),
            },
            {
                selector: `${WRAPPER} .gkit-team-modal-description`,
                ...getTypographyValue(attributes.popupDescriptionTypography, 'Tablet'),
                'margin-bottom': getSliderValue(attributes.popupDescriptionMarginTablet),
            },
            {
                selector: `${WRAPPER} .gkit-team-modal-close`,
                'font-size': getSliderValue(attributes.popupIconSizeTablet),
                'padding': getBoxValue(attributes.popupIconPaddingTablet)
            },
            {
                selector: `${WRAPPER} .gkit-team-modal-list`,
                ...getTypographyValue(attributes.popupPhoneTypography, 'Tablet'),
            },
            {
                selector: `${WRAPPER} .image-card-v3 .profile-image-card:after`,
                'height': getSliderValue(attributes?.longHeightOverlayTablet),
            },
        ],
        mobile: [
            //Content
            {
                selector: `${WRAPPER} .gkit-team`,
                'text-align': attributes?.contentAlignmentMobile,
            },
            {
                selector: `${WRAPPER} .profile-card, ${WRAPPER} .profile-image-card`,
                'padding': getBoxValue(attributes?.paddingMobile)
            },
            {
                selector: `${WRAPPER} .profile-body, ${WRAPPER} .profile-square-v .profile-card .profile-body`,
                'padding': getBoxValue(attributes.contentPaddingMobile)
            },
            {
                selector: `${WRAPPER} .profile-header > img, ${WRAPPER} .profile-image-card img, ${WRAPPER} .profile-image-card, ${WRAPPER} .profile-header`,
                'height': getSliderValue(attributes?.imageSizeMobile),
                'width': getSliderValue(attributes?.imageSizeMobile)
            },
            {
                selector: `${WRAPPER} .profile-card .profile-header`,
                'margin': getBoxValue(attributes?.imageMarginMobile),
            },
            {
                selector: `${WRAPPER} .profile-body .profile-title`,
                ...getTypographyValue(attributes.nameTypography, 'Mobile'),
                'margin-bottom': getSliderValue(attributes.nameMarginMobile)
            },
            {
                selector: `${WRAPPER} .profile-body .profile-designation`,
                ...getTypographyValue(attributes.designationTypography, 'Mobile'),
                'margin-bottom': getSliderValue(attributes.designationMarginMobile)
            },
            {
                selector: `${WRAPPER} .profile-body .profile-content`,
                ...getTypographyValue(attributes.descriptionTypography, 'Mobile'),
                'margin-bottom': getSliderValue(attributes.descriptionMarginMobile)
            },
            {
                selector: `${WRAPPER} .gkit-team-social-list > li > a`,
                'font-size': getSliderValue(attributes.iconSizeMobile),
                'margin': getBoxValue(attributes.iconMarginMobile),
                'height': getSliderValue(attributes.iconHeightMobile),
                'width': getSliderValue(attributes.iconWidthMobile),
                'line-height': getSliderValue(attributes.iconLineHeightMobile)
            },
            {
                selector: `${WRAPPER} .gkit-team-modal-title`,
                ...getTypographyValue(attributes.popupNameTypography, 'Mobile'),
                'margin-bottom': getSliderValue(attributes.popupNameMarginMobile),
            },
            {
                selector: `${WRAPPER} .gkit-team-modal-position`,
                ...getTypographyValue(attributes.popupDesignationTypography, 'Mobile'),
                'margin-bottom': getSliderValue(attributes.popupDesignationMarginMobile),
            },
            {
                selector: `${WRAPPER} .gkit-team-modal-description`,
                ...getTypographyValue(attributes.popupDescriptionTypography, 'Mobile'),
                'margin-bottom': getSliderValue(attributes.popupDescriptionMarginMobile),
            },
            {
                selector: `${WRAPPER} .gkit-team-modal-close`,
                'font-size': getSliderValue(attributes.popupIconSizeMobile),
                'padding': getBoxValue(attributes.popupIconPaddingMobile)
            },
            {
                selector: `${WRAPPER} .gkit-team-modal-list`,
                ...getTypographyValue(attributes.popupPhoneTypography, 'Mobile')
            },
            {
                selector: `${WRAPPER} .image-card-v3 .profile-image-card:after`,
                'height': getSliderValue(attributes?.longHeightOverlayMobile),
            },
        ]
    }

    return parseCSS(rawCSS);
}

export { gutenkitCSS };