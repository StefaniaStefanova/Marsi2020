import { __ } from "@wordpress/i18n";
import { memo, useEffect } from "@wordpress/element";
import { InspectorControls } from "@wordpress/block-editor";
import {
	SelectControl,
	__experimentalBoxControl as BoxControl,
	__experimentalHeading as Heading,
	__experimentalDivider as Divider,
	__experimentalBorderBoxControl as BorderBoxControl,
	__experimentalInputControl as InputControl,
	FocalPointPicker,
	__experimentalSpacer as Spacer
} from "@wordpress/components";
import {
	alignCenter,
	alignLeft,
	alignRight,
	arrowDown,
	arrowUp,
	chevronDown,
	chevronLeft,
	chevronRight,
	chevronUp,
	justifyCenter,
} from "@wordpress/icons";
import IconBoxStyle from "./style";

const Settings = ({ attributes, setAttributes, device, advancedControl }) => {
	const {
		GkitTabs,
		GkitPanelBody,
		GkitSwitcher,
		GkitChoose,
		GkitSlider,
		GkitText,
		GkitBoxShadow,
		GkitColor,
		GkitTypography,
		GkitResponsive,
		GkitBackgrounGroup,
		GkitIconPicker,
		GkitURL,
		GkitAnimation
	} = window.gutenkit.components;
	const { gkitResponsiveValue, useFontFamilyinBlock, responsiveHelper } = window.gutenkit.helpers;
	//load CSS
	useEffect(() => {
		const iconBoxStyle = IconBoxStyle(attributes);
		setAttributes({
			blocksCSS: iconBoxStyle
		})
	}, [
		attributes?.blockID,
		attributes?.blockClass,
		attributes?.iconBoxShowHeaderIcon,
		attributes?.iconBoxHeaderIcon,
		attributes?.iconBoxTitleText,
		attributes?.iconBoxDescriptionText,
		attributes?.iconBoxShowButton,
		attributes?.iconBoxEnableHoverBtn,
		attributes?.iconBoxBtnText,
		attributes?.iconBoxBtnUrl,
		attributes?.iconBoxShowBtnIcon,
		attributes?.iconBoxBtnIcon,
		attributes?.iconBoxBtnIconPosition,
		attributes?.iconBoxShowGlobalLink,
		attributes?.iconBoxGlobalLinkUrl,
		attributes?.iconBoxEnableWaterMark,
		attributes?.iconBoxWaterMarkIcon,
		attributes?.iconBoxHeaderIconPosition,
		attributes?.iconBoxContentAlignmentDesktop,
		attributes?.iconBoxContentAlignmentTablet,
		attributes?.iconBoxContentAlignmentMobile,
		attributes?.iconBoxTitleTag,
		attributes?.iconBoxShowBadge,
		attributes?.iconBoxBadgeTitle,
		attributes?.iconBoxBadgePosition,
		attributes?.badgeArrowHorizontalCustomPositionDesktop,
		attributes?.badgeArrowHorizontalCustomPositionTablet,
		attributes?.badgeArrowHorizontalCustomPositionMobile,
		attributes?.badgeArrowVerticalCustomPositionDesktop,
		attributes?.badgeArrowVerticalCustomPositionTablet,
		attributes?.badgeArrowVerticalCustomPositionMobile,
		attributes?.iconBoxContainerPaddingDesktop,
		attributes?.iconBoxContainerPaddingTablet,
		attributes?.iconBoxContainerPaddingMobile,
		attributes?.iconBoxContainerBoxShadow,
		attributes?.iconBoxContainerBorder,
		attributes?.iconBoxContainerBorderRadiusDesktop,
		attributes?.iconBoxContainerBorderRadiusTablet,
		attributes?.iconBoxContainerBorderRadiusMobile,
		attributes?.iconBoxContainerHoverBackgroundAnimation,
		attributes?.iconBoxContainerHoverHoverDirection,
		attributes?.iconBoxContainerHoverBoxShadow,
		attributes?.iconBoxContainerHoverBorder,
		attributes?.iconBoxContainerHoverBorderRadiusDesktop,
		attributes?.iconBoxContainerHoverBorderRadiusTablet,
		attributes?.iconBoxContainerHoverBorderRadiusMobile,
		attributes?.iconBoxContainerHoverAnimation,
		attributes?.iconBoxContentVerticalAlignmentDesktop,
		attributes?.iconBoxContentVerticalAlignmentTablet,
		attributes?.iconBoxContentVerticalAlignmentMobile,
		attributes?.iconBoxTitleMarginDesktop,
		attributes?.iconBoxTitleMarginTablet,
		attributes?.iconBoxTitleMarginMobile,
		attributes?.iconBoxTitlePaddingDesktop,
		attributes?.iconBoxTitlePaddingTablet,
		attributes?.iconBoxTitlePaddingMobile,
		attributes?.iconBoxTitleColor,
		attributes?.iconBoxTitleHoverColor,
		attributes?.iconBoxTitleTypography,
		attributes?.iconBoxDescriptionColor,
		attributes?.iconBoxDescriptionHoverColor,
		attributes?.iconBoxDescriptionTypography,
		attributes?.iconBoxDescriptionMarginDesktop,
		attributes?.iconBoxDescriptionMarginTablet,
		attributes?.iconBoxDescriptionMarginMobile,
		attributes?.iconBoxWaterMarkIconColor,
		attributes?.iconBoxWaterMarkIconSizeDesktop,
		attributes?.iconBoxWaterMarkIconSizeTablet,
		attributes?.iconBoxWaterMarkIconSizeMobile,
		attributes?.iconBoxIconColor,
		attributes?.iconBoxIconBackgroundColor,
		attributes?.iconBoxIconBorder,
		attributes?.iconBoxIconBorderRadiusDesktop,
		attributes?.iconBoxIconBorderRadiusTablet,
		attributes?.iconBoxIconBorderRadiusMobile,
		attributes?.iconBoxIconBoxShadow,
		attributes?.iconBoxIconHoverColor,
		attributes?.iconBoxIconHoverBackgroundColor,
		attributes?.iconBoxIconHoverBorder,
		attributes?.iconBoxIconHoverAnimation,
		attributes?.iconBoxIconHoverBorderRadiusDesktop,
		attributes?.iconBoxIconHoverBorderRadiusTablet,
		attributes?.iconBoxIconHoverBorderRadiusMobile,
		attributes?.iconBoxIconHoverBoxShadow,
		attributes?.iconBoxIconSizeDesktop,
		attributes?.iconBoxIconSizeTablet,
		attributes?.iconBoxIconSizeMobile,
		attributes?.iconBoxIconSpacingDesktop,
		attributes?.iconBoxIconSpacingTablet,
		attributes?.iconBoxIconSpacingMobile,
		attributes?.iconBoxIconPaddingDesktop,
		attributes?.iconBoxIconPaddingTablet,
		attributes?.iconBoxIconPaddingMobile,
		attributes?.iconBoxIconRotateDesktop,
		attributes?.iconBoxIconRotateTablet,
		attributes?.iconBoxIconRotateMobile,
		attributes?.iconBoxIconVerticalAlignDesktop,
		attributes?.iconBoxIconVerticalAlignTablet,
		attributes?.iconBoxIconVerticalAlignMobile,
		attributes?.iconBoxBtnPaddingDesktop,
		attributes?.iconBoxBtnPaddingTablet,
		attributes?.iconBoxBtnPaddingMobile,
		attributes?.iconBoxBtnMarginDesktop,
		attributes?.iconBoxBtnMarginTablet,
		attributes?.iconBoxBtnMarginMobile,
		attributes?.iconBoxBtnTypography,
		attributes?.iconBoxBtnIconSpacing,
		attributes?.iconBoxBtnTextColor,
		attributes?.iconBoxBtnBackground,
		attributes?.iconBoxBtnBorder,
		attributes?.iconBoxBtnBorderRadiusDesktop,
		attributes?.iconBoxBtnBorderRadiusTablet,
		attributes?.iconBoxBtnBorderRadiusMobile,
		attributes?.iconBoxBtnBoxShadow,
		attributes?.iconBoxBtnHoverColor,
		attributes?.iconBoxBtnHoverBackground,
		attributes?.iconBoxBtnHoverBorder,
		attributes?.iconBoxBtnHoverBorderRadiusDesktop,
		attributes?.iconBoxBtnHoverBorderRadiusTablet,
		attributes?.iconBoxBtnHoverBorderRadiusMobile,
		attributes?.iconBoxBtnHoverBoxShadow,
		attributes?.iconBoxBtnHoverAnimation,
		attributes?.iconBoxBadgePaddingDesktop,
		attributes?.iconBoxBadgePaddingTablet,
		attributes?.iconBoxBadgePaddingMobile,
		attributes?.iconBoxBadgeBorderRadiusDesktop,
		attributes?.iconBoxBadgeBorderRadiusTablet,
		attributes?.iconBoxBadgeBorderRadiusMobile,
		attributes?.iconBoxBadgeTextColor,
		attributes?.iconBoxBadgeBackground,
		attributes?.iconBoxBadgeBoxShadow,
		attributes?.iconBoxBadgeTypography,
		attributes?.commonHoverBackground,
		attributes?.iconHeightDesktop,
		attributes?.iconHeightTablet,
		attributes?.iconHeightMobile,
		attributes?.iconWidthDesktop,
		attributes?.iconWidthTablet,
		attributes?.iconWidthMobile,
		attributes?.iconLineHeightDesktop,
		attributes?.iconLineHeightTablet,
		attributes?.iconLineHeightMobile,
		attributes?.useHeightWidthIcon
	])

	//load font family
	useFontFamilyinBlock([
		attributes?.iconBoxTitleTypography,
		attributes?.iconBoxDescriptionTypography,
		attributes?.iconBoxBtnTypography,
		attributes?.iconBoxBadgeTypography
	])

	return (
		<>
			<InspectorControls>
				<GkitTabs
					type="top-level"
					tabs={[
						{
							name: "content",
							title: __("Content", "gutenkit"),
						},
						{
							name: "style",
							title: __("Style", "gutenkit"),
						},
						{
							name: "advanced",
							title: __("Advanced", "gutenkit"),
						},
					]}
				>
					{(tab) => {
						switch (tab.name) {
							case "content":
								return (
									<>
										<GkitPanelBody title={__("Icon", "gutenkit")} initialOpen={true}>
											<GkitSwitcher
												label={__("Add Icon?", "gutenkit")}
												value={attributes?.iconBoxShowHeaderIcon}
												onChange={(value) =>
													setAttributes({ iconBoxShowHeaderIcon: value })
												}
											/>

											{attributes?.iconBoxShowHeaderIcon &&
												<GkitIconPicker
													label={__("Header Icon", "gutenkit")}
													value={attributes?.iconBoxHeaderIcon}
													onChange={(value) =>
														setAttributes({ iconBoxHeaderIcon: value })
													}
												/>
											}
										</GkitPanelBody>
										<GkitPanelBody title={__("Button", "gutenkit")}>
											<Spacer marginTop='15px' />
											<GkitSwitcher
												label={__("Enable Button", "gutenkit")}
												value={attributes?.iconBoxShowButton}
												onChange={(value) =>
													setAttributes({ iconBoxShowButton: value })
												}
											/>
											<Spacer marginTop='15px' />
											{attributes?.iconBoxShowButton ? (
												<>
													<GkitSwitcher
														label={__("Enable Button on Hover", "gutenkit")}
														value={attributes?.iconBoxEnableHoverBtn}
														onChange={(value) =>
															setAttributes({ iconBoxEnableHoverBtn: value })
														}
													/>
													<GkitText
														value={attributes?.iconBoxBtnText}
														label={__("Label", "gutenkit")}
														onChange={(value) =>
															setAttributes({
																iconBoxBtnText: value,
															})
														}
														labelBlock={"block"}
													/>
													<GkitURL
														value={attributes?.iconBoxBtnUrl}
														onChange={val => setAttributes({ iconBoxBtnUrl: val })}
													/>
													<Divider />
													<GkitSwitcher
														label={__("Show Icon", "gutenkit")}
														value={attributes?.iconBoxShowBtnIcon}
														onChange={(value) =>
															setAttributes({ iconBoxShowBtnIcon: value })
														}
													/>

													{attributes?.iconBoxShowBtnIcon && (
														<>
															<GkitIconPicker
																label={__("Choose Icon", "gutenkit")}
																value={attributes?.iconBoxBtnIcon}
																onChange={(value) =>
																	setAttributes({ iconBoxBtnIcon: value })
																}
															/>
															<GkitChoose
																label={__("Icon Position", "gutenkit")}
																options={[
																	{ label: "After", value: "after" },
																	{ label: "Before", value: "before" },
																]}
																onChange={(value) =>
																	setAttributes({
																		iconBoxBtnIconPosition: value,
																	})
																}
																value={
																	attributes?.iconBoxBtnIconPosition || "after"
																}
																isToggle={false}
															/>
														</>
													)}
												</>
											) : (
												<>
													<GkitSwitcher
														label={__("Wrapper Link", "gutenkit")}
														value={attributes?.iconBoxShowGlobalLink}
														onChange={(value) =>
															setAttributes({ iconBoxShowGlobalLink: value })
														}
													/>
													{attributes?.iconBoxShowGlobalLink &&
														<GkitURL
															value={attributes?.iconBoxGlobalLinkUrl}
															onChange={val => setAttributes({ iconBoxGlobalLinkUrl: val })}
														/>
													}
												</>
											)}
										</GkitPanelBody>
										<GkitPanelBody title={__("Badge", "gutenkit")}>
											<GkitSwitcher
												label={__("Show Badge", "gutenkit")}
												value={attributes?.iconBoxShowBadge}
												onChange={(value) =>
													setAttributes({ iconBoxShowBadge: value })
												}
											/>
											{attributes?.iconBoxShowBadge && (
												<>
													<InputControl
														label={__("Title", "gutenkit")}
														value={attributes?.iconBoxBadgeTitle}
														onChange={(value) =>
															setAttributes({
																iconBoxBadgeTitle: value,
															})
														}
													/>
													<FocalPointPicker
														label={__("Position", "gutenkit")}
														value={attributes?.iconBoxBadgePosition}
														onChange={value => setAttributes({ iconBoxBadgePosition: value })}
													/>
												</>
											)}
										</GkitPanelBody>
										<GkitPanelBody title={__("Settings", "gutenkit")}>
											<GkitSwitcher
												label={__("Enable Hover Water Mark", "gutenkit")}
												value={attributes?.iconBoxEnableWaterMark}
												onChange={(value) =>
													setAttributes({ iconBoxEnableWaterMark: value })
												}
											/>
											{attributes?.iconBoxEnableWaterMark &&
												<GkitIconPicker
													label={__("Choose Watermark Icon", "gutenkit")}
													value={attributes?.iconBoxWaterMarkIcon}
													onChange={(value) =>
														setAttributes({ iconBoxWaterMarkIcon: value })
													}
												/>
											}
											{
												attributes?.iconBoxShowHeaderIcon &&
												<GkitChoose
													label={__("Header Icon Position", "gutenkit")}
													options={[
														{ label: "Top", value: "column" },
														{ label: "Left", value: "row" },
														{ label: "Right", value: "row-reverse" },
													]}
													onChange={(value) =>
														setAttributes({
															iconBoxHeaderIconPosition: value,
														})
													}
													value={
														attributes?.iconBoxHeaderIconPosition
													}
												/>
											}
											<GkitResponsive>
												<GkitChoose
													label={__('Content Alignment', 'gutenkit')}
													options={[
														{ label: 'Left', value: 'left', icon: alignLeft },
														{ label: 'Center', value: 'center', icon: alignCenter },
														{ label: 'Right', value: 'right', icon: alignRight },
													]}
													value={gkitResponsiveValue(
														attributes,
														"iconBoxContentAlignment",
														device
													)}
													onChange={(value) =>
														responsiveHelper(
															'iconBoxContentAlignment',
															value,
															device,
															setAttributes
														)
													}
												/>
											</GkitResponsive>
											<SelectControl
												label={__("Title HTML Tag", "gutenkit")}
												value={attributes?.iconBoxTitleTag}
												options={[
													{ label: "H1", value: "h1" },
													{ label: "H2", value: "h2" },
													{ label: "H3", value: "h3" },
													{ label: "H4", value: "h4" },
													{ label: "H5", value: "h5" },
													{ label: "H6", value: "h6" },
													{ label: "div", value: "div" },
													{ label: "span", value: "span" },
													{ label: "p", value: "p" },
												]}
												onChange={(value) =>
													setAttributes({ iconBoxTitleTag: value })
												}
												__nextHasNoMarginBottom
											/>
										</GkitPanelBody>
									</>
								);
							case "style":
								return (
									<>
										<GkitPanelBody
											title={__("Icon Box Container", "gutenkit")}
											initialOpen={true}
										>
											<GkitSwitcher
												label={__('Add Hover Animation', 'gutenkit')}
												value={attributes?.iconBoxContainerHoverAnimationSwitch}
												onChange={(value) => setAttributes({ iconBoxContainerHoverAnimationSwitch: value })}
											/>
											{attributes?.iconBoxContainerHoverAnimationSwitch &&
												<GkitAnimation
													label={__("Hover Animation", "gutenkit")}
													value={attributes?.iconBoxContainerHoverAnimation}
													onChange={value => setAttributes({ iconBoxContainerHoverAnimation: value })}
													type="hover-animation"
												/>
											}

											<GkitSwitcher
												label={__('Add Hover Background Animation', 'gutenkit')}
												help={__('You need to add background from Advanced Tab to use the hover background animation', 'gutenkit')}
												value={attributes?.iconBoxContainerHoverBackgroundAnimation}
												onChange={(value) => setAttributes({ iconBoxContainerHoverBackgroundAnimation: value })}
											/>
											{
												attributes?.iconBoxContainerHoverBackgroundAnimation && (
													<GkitChoose
														label={__('Animation Direction', 'gutenkit')}
														options={[
															{ label: 'Left', value: 'left', icon: chevronLeft },
															{ label: 'Right', value: 'right', icon: chevronRight },
															{ label: 'Top', value: 'top', icon: chevronUp },
															{ label: 'Bottom', value: 'bottom', icon: chevronDown },
														]}
														onChange={(value) => setAttributes({ iconBoxContainerHoverHoverDirection: value })}
														value={attributes?.iconBoxContainerHoverHoverDirection}
													/>
												)
											}
										</GkitPanelBody>
										<GkitPanelBody title={__("Content", "gutenkit")}>
											{(attributes?.iconBoxShowHeaderIcon && attributes?.iconBoxHeaderIconPosition !== "column") &&
												<>
													<GkitResponsive>
														<GkitChoose
															label={__("Alignment", "gutenkit")}
															options={[
																{
																	label: "Top",
																	value: "start",
																	icon: arrowUp
																},
																{
																	label: "Middle",
																	value: "center",
																	icon: justifyCenter,
																},
																{
																	label: "Bottom",
																	value: "end",
																	icon: arrowDown,
																},
															]}
															onChange={(value) =>
																responsiveHelper(
																	"iconBoxContentVerticalAlignment",
																	value,
																	device,
																	setAttributes
																)
															}
															value={gkitResponsiveValue(
																attributes,
																"iconBoxContentVerticalAlignment",
																device
															)}
														/>
													</GkitResponsive>
													<Divider />
												</>
											}
											<Heading>{__("Title", "gutenkit")}</Heading>
											<GkitResponsive>
												<BoxControl
													label={__("Margin", "gutenkit")}
													values={gkitResponsiveValue(
														attributes,
														"iconBoxTitleMargin",
														device
													)}
													onChange={(value) =>
														responsiveHelper(
															"iconBoxTitleMargin",
															value,
															device,
															setAttributes
														)
													}
												/>
											</GkitResponsive>
											<GkitColor
												label={__("Color", "gutenkit")}
												value={attributes?.iconBoxTitleColor}
												onChange={(value) =>
													setAttributes({ iconBoxTitleColor: value })
												}
											/>
											<GkitColor
												label={__("Hover Color", "gutenkit")}
												value={attributes?.iconBoxTitleHoverColor}
												onChange={(value) =>
													setAttributes({ iconBoxTitleHoverColor: value })
												}
											/>
											<GkitTypography
												label={__("Typography", "gutenkit")}
												value={attributes?.iconBoxTitleTypography}
												onChange={(value) => setAttributes({ iconBoxTitleTypography: value })}
											/>
											<Divider />
											<Heading>{__("Description", "gutenkit")}</Heading>
											<GkitColor
												label={__("Color", "gutenkit")}
												value={attributes?.iconBoxDescriptionColor}
												onChange={(value) =>
													setAttributes({ iconBoxDescriptionColor: value })
												}
											/>
											<GkitColor
												label={__("Hover Color", "gutenkit")}
												value={attributes?.iconBoxDescriptionHoverColor}
												onChange={(value) =>
													setAttributes({
														iconBoxDescriptionHoverColor: value,
													})
												}
											/>
											<GkitTypography
												label={__("Typography", "gutenkit")}
												value={attributes?.iconBoxDescriptionTypography}
												onChange={(value) => setAttributes({ iconBoxDescriptionTypography: value })}
											/>
											<Spacer />
											<GkitResponsive>
												<BoxControl
													label={__("Margin", "gutenkit")}
													values={gkitResponsiveValue(
														attributes,
														"iconBoxDescriptionMargin",
														device
													)}
													onChange={(value) =>
														responsiveHelper(
															"iconBoxDescriptionMargin",
															value,
															device,
															setAttributes
														)
													}
												/>
											</GkitResponsive>
											{attributes?.iconBoxEnableWaterMark && (
												<>
													<Divider />
													<Heading>{__("Water Mark", "gutenkit")}</Heading>
													<GkitColor
														label={__("Color", "gutenkit")}
														value={attributes?.iconBoxWaterMarkIconColor}
														onChange={(value) =>
															setAttributes({
																iconBoxWaterMarkIconColor: value,
															})
														}
													/>
													<GkitResponsive>
														<GkitSlider
															label={__("Water Mark Icon Size", "gutenkit")}
															value={gkitResponsiveValue(
																attributes,
																"iconBoxWaterMarkIconSize",
																device
															)}
															onChange={(value) =>
																responsiveHelper(
																	"iconBoxWaterMarkIconSize",
																	value,
																	device,
																	setAttributes
																)
															}
															sizeUnits={["px"]}
														/>
													</GkitResponsive>
												</>
											)}
										</GkitPanelBody>
										{
											attributes?.iconBoxShowHeaderIcon &&
											<GkitPanelBody title={__("Icon", "gutenkit")}>
												<GkitResponsive>
													<GkitSlider
														label={__('Size', 'gutenkit')}
														value={gkitResponsiveValue(attributes, 'iconBoxIconSize', device)}
														onChange={(value) => responsiveHelper('iconBoxIconSize', value, device, setAttributes)}
														sizeUnits={['px']}
														range={{
															min: 6,
															max: 300
														}}
													/>
												</GkitResponsive>
												<GkitResponsive>
													<GkitSlider
														label={__('Rotate', 'gutenkit')}
														value={gkitResponsiveValue(attributes, 'iconBoxIconRotate', device)}
														onChange={(value) => responsiveHelper('iconBoxIconRotate', value, device, setAttributes)}
														sizeUnits={['deg']}
														range={{
															min: 0,
															max: 360
														}}
													/>
												</GkitResponsive>
												<GkitResponsive>
													<GkitSlider
														label={__('Vertical Position', 'gutenkit')}
														value={gkitResponsiveValue(attributes, 'iconBoxIconVerticalAlign', device)}
														onChange={(value) => responsiveHelper('iconBoxIconVerticalAlign', value, device, setAttributes)}
														sizeUnits={['px']}
														range={{
															min: -200,
															max: 200
														}}
													/>
												</GkitResponsive>

												<GkitSwitcher
													label={__('Use Height Width?', 'gutenkit')}
													value={attributes?.useHeightWidthIcon}
													onChange={(value) => setAttributes({ useHeightWidthIcon: value })}
												/>
												<Spacer />
												{attributes.useHeightWidthIcon && <>
													<GkitResponsive>
														<GkitSlider
															label={__('Width', 'gutenkit')}
															value={gkitResponsiveValue(attributes, 'iconWidth', device)}
															onChange={(value) => responsiveHelper('iconWidth', value, device, setAttributes)}
															sizeUnits={['px', 'em']}
															range={{
																max: 200
															}}
														/>
													</GkitResponsive>
													<GkitResponsive>
														<GkitSlider
															label={__('Height', 'gutenkit')}
															value={gkitResponsiveValue(attributes, 'iconHeight', device)}
															onChange={(value) => responsiveHelper('iconHeight', value, device, setAttributes)}
															sizeUnits={['px', 'em']}
															range={{
																max: 200
															}}
														/>
													</GkitResponsive>
													<GkitResponsive>
														<GkitSlider
															label={__('Line Height', 'gutenkit')}
															value={gkitResponsiveValue(attributes, 'iconLineHeight', device)}
															onChange={(value) => responsiveHelper('iconLineHeight', value, device, setAttributes)}
															sizeUnits={['px', 'em']}
															range={{
																max: 300
															}}
														/>
													</GkitResponsive>
												</>}
												<Spacer />
												<GkitTabs
													type="normal"
													tabs={[
														{
															name: "normal",
															title: __("Normal", "gutenkit"),
														},
														{
															name: "hover",
															title: __("Hover", "gutenkit"),
														},
													]}
												>
													{(tabs) => {
														if (tabs.name === "normal") {
															return (
																<>
																	{attributes?.iconBoxShowHeaderIcon && (
																		<>
																			<GkitColor
																				label={__("Icon Color", "gutenkit")}
																				value={attributes?.iconBoxIconColor}
																				onChange={(value) =>
																					setAttributes({
																						iconBoxIconColor: value,
																					})
																				}
																			/>

																			<GkitColor
																				label={__(
																					"Icon Background Color",
																					"gutenkit"
																				)}
																				value={
																					attributes?.iconBoxIconBackgroundColor
																				}
																				onChange={(value) =>
																					setAttributes({
																						iconBoxIconBackgroundColor: value,
																					})
																				}
																			/>
																			<BorderBoxControl
																				label={__("Border")}
																				onChange={(value) =>
																					setAttributes({
																						iconBoxIconBorder: value,
																					})
																				}
																				value={attributes?.iconBoxIconBorder}
																			/>
																			<Spacer marginY="10px">
																				<GkitResponsive>
																					<BoxControl
																						label={__("Border Radius", "gutenkit")}
																						values={gkitResponsiveValue(
																							attributes,
																							"iconBoxIconBorderRadius",
																							device
																						)}
																						onChange={(value) =>
																							responsiveHelper(
																								"iconBoxIconBorderRadius",
																								value,
																								device,
																								setAttributes
																							)
																						}
																					/>
																				</GkitResponsive>
																			</Spacer>
																			<GkitBoxShadow
																				label={__('Box Shadow', 'gutenkit')}
																				value={attributes?.iconBoxIconBoxShadow}
																				onChange={(value) => setAttributes({ iconBoxIconBoxShadow: value })}
																			/>
																		</>
																	)}
																</>
															);
														}

														if (tabs.name === "hover") {
															return (
																<>
																	<GkitColor
																		label={__('Icon Hover Color', 'gutenkit')}
																		value={attributes?.iconBoxIconHoverColor}
																		onChange={(value) => setAttributes({
																			iconBoxIconHoverColor: value
																		})}
																	/>
																	<GkitColor
																		label={__('Background Color', 'gutenkit')}
																		value={attributes?.iconBoxIconHoverBackgroundColor}
																		onChange={(value) => setAttributes({
																			iconBoxIconHoverBackgroundColor: value
																		})}
																	/>
																	<BorderBoxControl
																		label={__("Border")}
																		onChange={(value) =>
																			setAttributes({
																				iconBoxIconHoverBorder: value,
																			})
																		}
																		value={attributes?.iconBoxIconHoverBorder}
																	/>
																	<Spacer marginY="10px">
																		<GkitResponsive>
																			<BoxControl
																				label={__("Border Radius", "gutenkit")}
																				values={gkitResponsiveValue(
																					attributes,
																					"iconBoxIconHoverBorderRadius",
																					device
																				)}
																				onChange={(value) =>
																					responsiveHelper(
																						"iconBoxIconHoverBorderRadius",
																						value,
																						device,
																						setAttributes
																					)
																				}
																			/>
																		</GkitResponsive>
																	</Spacer>
																	<GkitBoxShadow
																		label={__('Box Shadow', 'gutenkit')}
																		value={attributes?.iconBoxIconHoverBoxShadow}
																		onChange={(value) => setAttributes({ iconBoxIconHoverBoxShadow: value })}
																	/>
																</>
															);
														}
													}}
												</GkitTabs>
												<Divider />
												<GkitResponsive>
													<BoxControl
														label={__("Margin", "gutenkit")}
														values={gkitResponsiveValue(
															attributes,
															"iconBoxIconSpacing",
															device
														)}
														onChange={(value) =>
															responsiveHelper(
																"iconBoxIconSpacing",
																value,
																device,
																setAttributes
															)
														}
													/>
												</GkitResponsive>
												<GkitResponsive>
													<BoxControl
														label={__("Padding", "gutenkit")}
														values={gkitResponsiveValue(
															attributes,
															"iconBoxIconPadding",
															device
														)}
														onChange={(value) =>
															responsiveHelper(
																"iconBoxIconPadding",
																value,
																device,
																setAttributes
															)
														}
													/>
												</GkitResponsive>
											</GkitPanelBody>
										}
										{
											attributes?.iconBoxShowButton &&
											<GkitPanelBody title={__('Button', 'gutenkit')}>
												<GkitTypography
													label={__("Typography", "gutenkit")}
													value={attributes?.iconBoxBtnTypography}
													onChange={(value) => setAttributes({ iconBoxBtnTypography: value })}
												/>

												<Spacer />
												{attributes?.iconBoxShowBtnIcon &&
													<>
														<GkitSlider
															label={__('Icon Spacing', 'gutenkit')}
															value={attributes?.iconBoxBtnIconSpacing}
															onChange={(value) => setAttributes({ iconBoxBtnIconSpacing: value })}
															sizeUnits={['px']}
														/>
													</>
												}

												<Spacer />
												<GkitTabs
													type="normal"
													tabs={[
														{
															name: "normal",
															title: __("Normal", "gutenkit"),
														},
														{
															name: "hover",
															title: __("Hover", "gutenkit"),
														},
													]}
												>
													{
														(tab) => {
															switch (tab.name) {
																case "normal":
																	return (
																		<>
																			<GkitColor
																				label={__('Text Color', 'gutenkit')}
																				value={attributes?.iconBoxBtnTextColor}
																				onChange={(value) => setAttributes({ iconBoxBtnTextColor: value })}
																			/>
																			<GkitBackgrounGroup
																				label={__("Background", "gutenkit")}
																				value={attributes?.iconBoxBtnBackground}
																				onChange={(value) =>
																					setAttributes({
																						iconBoxBtnBackground: value,
																					})
																				}
																				exclude={{ video: true, image: true }}
																			/>
																			<Spacer />
																			<BorderBoxControl
																				label={__("Border")}
																				onChange={(value) =>
																					setAttributes({
																						iconBoxBtnBorder: value,
																					})
																				}
																				value={attributes?.iconBoxBtnBorder}
																			/>

																			<Spacer marginY="10px">
																				<GkitResponsive>
																					<BoxControl
																						label={__("Border Radius", "gutenkit")}
																						values={gkitResponsiveValue(
																							attributes,
																							"iconBoxBtnBorderRadius",
																							device
																						)}
																						onChange={(value) =>
																							responsiveHelper(
																								"iconBoxBtnBorderRadius",
																								value,
																								device,
																								setAttributes
																							)
																						}
																					/>
																				</GkitResponsive>
																			</Spacer>
																			<GkitBoxShadow
																				label={__("Box Shadow", "gutenkit")}
																				value={attributes?.iconBoxBtnBoxShadow}
																				onChange={(value) =>
																					setAttributes({
																						iconBoxBtnBoxShadow: value,
																					})
																				}
																			/>
																		</>
																	);

																case "hover":
																	return (
																		<>
																			<GkitColor
																				label={__('Text Color', 'gutenkit')}
																				value={attributes?.iconBoxBtnHoverColor}
																				onChange={(value) => setAttributes({ iconBoxBtnHoverColor: value })}
																			/>
																			<GkitBackgrounGroup
																				label={__("Background", "gutenkit")}
																				value={attributes?.iconBoxBtnHoverBackground}
																				onChange={(value) =>
																					setAttributes({
																						iconBoxBtnHoverBackground: value,
																					})
																				}
																				exclude={{ video: true, image: true }}
																			/>
																			<Spacer />
																			<BorderBoxControl
																				label={__("Border")}
																				onChange={(value) =>
																					setAttributes({
																						iconBoxBtnHoverBorder: value,
																					})
																				}
																				value={attributes?.iconBoxBtnHoverBorder}
																			/>
																			<Spacer marginY="10px">
																				<GkitResponsive>
																					<BoxControl
																						label={__("Border Radius", "gutenkit")}
																						values={gkitResponsiveValue(
																							attributes,
																							"iconBoxBtnHoverBorderRadius",
																							device
																						)}
																						onChange={(value) =>
																							responsiveHelper(
																								"iconBoxBtnHoverBorderRadius",
																								value,
																								device,
																								setAttributes
																							)
																						}
																					/>
																				</GkitResponsive>
																			</Spacer>
																			<GkitBoxShadow
																				label={__("Box Shadow", "gutenkit")}
																				value={attributes?.iconBoxBtnHoverBoxShadow}
																				onChange={(value) =>
																					setAttributes({
																						iconBoxBtnHoverBoxShadow: value,
																					})
																				}
																			/>
																		</>
																	);
															}
														}
													}
												</GkitTabs>
												<Divider />
												<GkitResponsive>
													<BoxControl
														label={__('Padding', 'gutenkit')}
														values={gkitResponsiveValue(attributes, 'iconBoxBtnPadding', device)}
														onChange={(value) => responsiveHelper('iconBoxBtnPadding', value, device, setAttributes)}
													/>
												</GkitResponsive>
												<GkitResponsive>
													<BoxControl
														label={__('Margin', 'gutenkit')}
														values={gkitResponsiveValue(attributes, 'iconBoxBtnMargin', device)}
														onChange={(value) => responsiveHelper('iconBoxBtnMargin', value, device, setAttributes)}
													/>
												</GkitResponsive>
											</GkitPanelBody>
										}
										{
											attributes?.iconBoxShowBadge &&
											<GkitPanelBody title={__("Badge", "gutenkit")}>
												<GkitResponsive>
													<BoxControl
														label={__("Padding", "gutenkit")}
														values={gkitResponsiveValue(
															attributes,
															"iconBoxBadgePadding",
															device
														)}
														onChange={(value) =>
															responsiveHelper(
																"iconBoxBadgePadding",
																value,
																device,
																setAttributes
															)
														}
													/>
												</GkitResponsive>
												<GkitResponsive>
													<BoxControl
														label={__("Border Radius", "gutenkit")}
														values={gkitResponsiveValue(
															attributes,
															"iconBoxBadgeBorderRadius",
															device
														)}
														onChange={(value) =>
															responsiveHelper(
																"iconBoxBadgeBorderRadius",
																value,
																device,
																setAttributes
															)
														}
													/>
												</GkitResponsive>
												<GkitColor
													label={__('Color', 'gutenkit')}
													value={attributes?.iconBoxBadgeTextColor}
													onChange={(value) => setAttributes({ iconBoxBadgeTextColor: value })}
												/>
												<GkitBackgrounGroup
													label={__("Background", "gutenkit")}
													value={attributes?.iconBoxBadgeBackground}
													onChange={(value) =>
														setAttributes({
															iconBoxBadgeBackground: value,
														})
													}
													exclude={{ video: true, image: true }}
												/>
												<GkitBoxShadow
													label={__("Box Shadow", "gutenkit")}
													value={attributes?.iconBoxBadgeBoxShadow}
													onChange={(value) =>
														setAttributes({
															iconBoxBadgeBoxShadow: value,
														})
													}
												/>
												<GkitTypography
													label={__("Typography", "gutenkit")}
													value={attributes?.iconBoxBadgeTypography}
													onChange={(value) => setAttributes({ iconBoxBadgeTypography: value })}
												/>
											</GkitPanelBody>
										}
									</>
								);
							case "advanced":
								return <>{advancedControl}</>;
						}
					}}
				</GkitTabs>
			</InspectorControls>
		</>
	);
};

export default memo(Settings);
