import { __ } from '@wordpress/i18n';
import { memo, useEffect } from '@wordpress/element';
import {
	SelectControl,
	__experimentalBorderBoxControl as BorderBoxControl,
	__experimentalBoxControl as BoxControl,
	__experimentalDivider as Divider,
	__experimentalSpacer as Spacer
} from '@wordpress/components';
import { InspectorControls } from '@wordpress/block-editor';
import { alignCenter, alignLeft, alignRight } from '@wordpress/icons';
import { gutenkitCSS } from './style';
import { addFilter } from '@wordpress/hooks';

const Settings = ({ attributes, setAttributes, device, advancedControl }) => {
	const {
		GkitBoxShadow,
		GkitColor,
		GkitIconPicker,
		GkitPanelBody,
		GkitResponsive,
		GkitSwitcher,
		GkitTabs,
		GkitTypography,
		GkitBackgrounGroup,
		GkitChoose,
		GkitURL,
		GkitSlider,
		GkitText,
	} = window.gutenkit.components;
	const { gkitResponsiveValue, useFontFamilyinBlock, responsiveHelper, colorsGroup, boxControlUnit } = window.gutenkit.helpers;

	//Generate CSS for Frontend
	useEffect(() => {
		let css = gutenkitCSS(attributes);
		setAttributes({ blocksCSS: css });
	}, [attributes?.blockID,
	attributes?.btnText,
	attributes?.url,
	attributes?.iconsSwitch,
	attributes?.icons,
	attributes?.iconAlign,
	attributes?.alignDesktop,
	attributes?.alignTablet,
	attributes?.alignMobile,
	attributes?.btnClass,
	attributes?.btnID,
	attributes?.widthDesktop,
	attributes?.widthTablet,
	attributes?.widthMobile,
	attributes?.textPaddingDesktop,
	attributes?.textPaddingTablet,
	attributes?.textPaddingMobile,
	attributes?.typography,
	attributes?.shadow,
	attributes?.textColor,
	attributes?.bgColor,
	attributes?.hoverColor,
	attributes?.bgHoverColor,
	attributes?.borderDesktop,
	attributes?.borderTablet,
	attributes?.borderMobile,
	attributes?.borderRadiusDesktop,
	attributes?.borderRadiusTablet,
	attributes?.borderRadiusMobile,
	attributes?.hoverBorderDesktop,
	attributes?.hoverBorderTablet,
	attributes?.hoverBorderMobile,
	attributes?.hoverBorderRadiusDesktop,
	attributes?.hoverBorderRadiusTablet,
	attributes?.hoverBorderRadiusMobile,
	attributes?.boxShadowGroup,
	attributes?.normalIconPaddingDesktop,
	attributes?.normalIconPaddingTablet,
	attributes?.normalIconPaddingMobile,
	attributes?.normalIconVerticalAlignDesktop,
	attributes?.normalIconVerticalAlignTablet,
	attributes?.normalIconVerticalAlignMobile,
	])

	useFontFamilyinBlock([
		attributes?.typography
	])

	addFilter("gutenkit.advancedControl.background.exclude", "gutenkit/excludeBackgroundFromButton", (excludesSet) => {
		return excludesSet.add("gutenkit/button");
	});
	addFilter("gutenkit.advancedControl.border.exclude", "gutenkit/excludeBackgroundFromButton", (excludesSet) => {
		return excludesSet.add("gutenkit/button");
	});

	return (
		<InspectorControls key="setting">
			<GkitTabs type="top-level" tabs={
				[
					{
						name: 'layout',
						title: 'Content',
					},
					{
						name: 'style',
						title: 'Style',
					},
					{
						name: 'advanced',
						title: 'Advanced',
					},
				]
			}>
				{(tab) => {
					if (tab.name === 'layout') {
						return (
							<>
								<GkitPanelBody title={__('Content', 'gutenkit')} initialOpen={true}>
									<GkitText
										value={attributes?.btnText}
										label={__('Label', 'gutenkit')}
										onChange={value => setAttributes({ btnText: value })}
										labelBlock={'block'}
									/>

									<GkitURL
										value={attributes?.url}
										onChange={val => setAttributes({ url: val })}
									/>

									<Divider />

									<GkitSwitcher
										label={__('Add Icon', 'gutenkit')}
										value={attributes?.iconsSwitch}
										onChange={(value) => setAttributes({ iconsSwitch: value })}
									/>

									{attributes?.iconsSwitch &&
										<>
											<GkitIconPicker
												label={__('Left Icon', 'gutenkit')}
												onChange={value => setAttributes({ icons: value })}
												value={attributes?.icons}
											/>

											<SelectControl
												label={__('Icon Position', 'gutenkit')}
												options={[
													{ label: __('After', 'gutenkit'), value: 'right' },
													{ label: __('Before', 'gutenkit'), value: 'left' },
												]}
												value={attributes?.iconAlign}
												onChange={value => setAttributes({ iconAlign: value })}
											/>
										</>

									}
									<GkitResponsive>
									<GkitChoose
										label={__('Alignment', 'gutenkit')}
										options={[
											{ label: 'Left', value: 'left', icon: alignLeft },
											{ label: 'Center', value: 'center', icon: alignCenter },
											{ label: 'Right', value: 'right', icon: alignRight },
										]}
										value={gkitResponsiveValue(
											attributes,
											"align",
											device
										)}
										onChange={(value) =>
											responsiveHelper(
												'align',
												value,
												device,
												setAttributes
											)
										}
									/>
									</GkitResponsive>

									<GkitText
										value={attributes?.btnClass}
										label={__('Class', 'gutenkit')}
										onChange={value => setAttributes({ btnClass: value })}
										labelBlock='block'
									/>

									<GkitText
										value={attributes?.btnID}
										label={__('ID', 'gutenkit')}
										onChange={value => setAttributes({ btnID: value })}
										labelBlock='block'
									/>
								</GkitPanelBody>
							</>
						);
					}

					else if (tab.name === 'style') {
						return (
							<>
								<GkitPanelBody title={__('Button', 'gutenkit')} initialOpen={true}>
									<GkitResponsive>
										<GkitSlider
											label={__('Width', 'gutenkit')}
											value={gkitResponsiveValue(
												attributes,
												"width",
												device
											)}
											onChange={(value) =>
												responsiveHelper(
													'width',
													value,
													device,
													setAttributes
												)
											}
											sizeUnits={['%', 'px']}
											range={{
												"min": 0,
												"max": 500
											}}
										/>
									</GkitResponsive>

									<GkitResponsive>
										<BoxControl
											label={__('Padding', 'gutenkit')}
											values={gkitResponsiveValue(
												attributes,
												"textPadding",
												device
											)}
											onChange={value =>
												responsiveHelper(
													'textPadding',
													value,
													device,
													setAttributes
												)
											}
										/>
									</GkitResponsive>

									<GkitTypography
										label={__('Typography', 'gutenkit')}
										value={attributes?.typography}
										onChange={value => setAttributes({ typography: value })}
									/>

									<GkitBoxShadow
										label={__('Text Shadow', 'gutenkit')}
										value={attributes?.shadow}
										onChange={value => setAttributes({ shadow: value })}
										exclude={{ spread: true, position: true }}
									/>

									<Spacer />
									<GkitTabs type="normal" tabs={
										[
											{
												name: 'normal-tab',
												title: __('Normal', 'gutenkit')
											},
											{
												name: 'hover-tab',
												title: __('Hover', 'gutenkit')
											}
										]
									}>
										{
											(tab) => {
												if (tab.name === 'normal-tab') {
													return (
														<>
															<GkitColor
																label={__('Color', 'gutenkit')}
																onChange={(value) => setAttributes({ textColor: value })}
																value={attributes?.textColor}
															/>

															<GkitBackgrounGroup
																onChange={(value) => setAttributes({ bgColor: value })}
																value={attributes?.bgColor}
																exclude={{ 'video': true, 'image': true }}
															/>
														</>
													)
												} else if (tab.name === 'hover-tab') {
													return (
														<>
															<GkitColor
																label={__('Color', 'gutenkit')}
																onChange={value => setAttributes({ hoverColor: value })}
																value={attributes?.hoverColor}
															/>

															<GkitBackgrounGroup
																onChange={(value) => setAttributes({ bgHoverColor: value })}
																value={attributes?.bgHoverColor}
																exclude={{ 'video': true, 'image': true }}
															/>
														</>
													)
												}
											}
										}
									</GkitTabs>
								</GkitPanelBody>

								<GkitPanelBody title={__('Border', 'gutenkit')}>
									<GkitTabs type="normal" tabs={
										[
											{
												name: 'normal-tab',
												title: __('Normal', 'gutenkit')
											},
											{
												name: 'hover-tab',
												title: __('Hover', 'gutenkit')
											}
										]
									}>
										{
											(tab) => {
												if (tab.name === 'normal-tab') {
													return (
														<>
															<GkitResponsive>
																<BorderBoxControl
																	colors={colorsGroup}
																	label={__('Border', 'gutenkit')}
																	value={gkitResponsiveValue(
																		attributes,
																		"border",
																		device
																	)}
																	onChange={(value) =>
																		responsiveHelper(
																			"border",
																			value,
																			device,
																			setAttributes
																		)
																	}
																/>
															</GkitResponsive>

															<Spacer />
															<GkitResponsive>
																<BoxControl
																	label={__('Border Radius', 'gutenkit')}
																	units={boxControlUnit}
																	values={gkitResponsiveValue(
																		attributes,
																		"borderRadius",
																		device
																	)}
																	onChange={(value) =>
																		responsiveHelper(
																			"borderRadius",
																			value,
																			device,
																			setAttributes
																		)
																	}
																/>
															</GkitResponsive>
														</>
													)
												} else if (tab.name === 'hover-tab') {
													return (
														<>
															<GkitResponsive>
																<BorderBoxControl
																	colors={colorsGroup}
																	label={__('Border', 'gutenkit')}
																	value={gkitResponsiveValue(
																		attributes,
																		"hoverBorder",
																		device
																	)}
																	onChange={(value) =>
																		responsiveHelper(
																			"hoverBorder",
																			value,
																			device,
																			setAttributes
																		)
																	}
																/>
															</GkitResponsive>

															<Spacer />
															<GkitResponsive>
																<BoxControl
																	label={__('Border Radius', 'gutenkit')}
																	units={boxControlUnit}
																	values={gkitResponsiveValue(
																		attributes,
																		"hoverBorderRadius",
																		device
																	)}
																	onChange={(value) =>
																		responsiveHelper(
																			'hoverBorderRadius',
																			value,
																			device,
																			setAttributes
																		)
																	}
																/>
															</GkitResponsive>
														</>
													)
												}
											}
										}
									</GkitTabs>
								</GkitPanelBody>

								<GkitPanelBody title={__('Shadow', 'gutenkit')}>
									<GkitBoxShadow
										value={attributes?.boxShadowGroup}
										onChange={(value) => setAttributes({ boxShadowGroup: value })}
									/>
								</GkitPanelBody>

								{attributes?.iconsSwitch &&
									<GkitPanelBody title={__('Icon', 'gutenkit')}>
										<GkitResponsive>
											<GkitSlider
												label={__('Add space after icon', 'gutenkit')}
												value={gkitResponsiveValue(
													attributes,
													"normalIconPadding",
													device
												)}
												onChange={(value) =>
													responsiveHelper(
														'normalIconPadding',
														value,
														device,
														setAttributes
													)
												}
												sizeUnits={['px']}
											/>
										</GkitResponsive>

										<GkitResponsive>
											<GkitSlider
												label={__('Move icon  Vertically', 'gutenkit')}
												value={gkitResponsiveValue(
													attributes,
													"normalIconVerticalAlign",
													device
												)}
												onChange={(value) =>
													responsiveHelper(
														'normalIconVerticalAlign',
														value,
														device,
														setAttributes
													)
												}
												sizeUnits={['px', 'em']}
												range={{
													min: -20,
													max: 20
												}}
											/>
										</GkitResponsive>
									</GkitPanelBody>
								}
							</>
						)
					}

					else if (tab.name === 'advanced') {
						return (
							advancedControl
						);
					}
				}}
			</GkitTabs>
		</InspectorControls>
	);
};
export default memo(Settings);
