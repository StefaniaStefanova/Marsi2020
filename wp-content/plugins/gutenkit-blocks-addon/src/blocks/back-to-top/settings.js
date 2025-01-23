import { __ } from '@wordpress/i18n';
import { memo, useEffect } from '@wordpress/element';
import {
	SelectControl,
	__experimentalNumberControl as NumberControl,
	__experimentalBorderBoxControl as BorderBoxControl,
	__experimentalBoxControl as BoxControl,
	__experimentalDivider as Divider,
	__experimentalSpacer as Spacer
} from '@wordpress/components';
import { InspectorControls } from '@wordpress/block-editor';
import { alignCenter, alignLeft, alignRight } from '@wordpress/icons';
import { gutenkitCSS } from './style';

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
		GkitSlider,
		GkitText,
	} = window.gutenkit.components;

	const {
		gkitResponsiveValue,
		useFontFamilyinBlock,
		responsiveHelper,
		colorsGroup,
		boxControlUnit,
	} = window.gutenkit.helpers;

	//Generate CSS for Frontend
	useEffect(() => {
		let css = gutenkitCSS(attributes);
		setAttributes({ blocksCSS: css });
	}, [attributes?.blockID,
	attributes?.btnAppearance,
	attributes?.btnIcon,
	attributes?.btnText,
	attributes?.alignDesktop,
	attributes?.alignTablet,
	attributes?.alignMobile,
	attributes?.offsetTop,
	attributes?.showBtnOnScroll,
	attributes?.scrolledValue,
	attributes?.typography,
	attributes?.iconSizeDesktop,
	attributes?.iconSizeTablet,
	attributes?.iconSizeMobile,
	attributes?.widthDesktop,
	attributes?.widthTablet,
	attributes?.widthMobile,
	attributes?.heightDesktop,
	attributes?.heightTablet,
	attributes?.heightMobile,
	attributes?.lineFgColor,
	attributes?.lineBgColor,
	attributes?.textColor,
	attributes?.bgColor,
	attributes?.boxShadow,
	attributes?.borderDesktop,
	attributes?.borderTablet,
	attributes?.borderMobile,
	attributes?.borderRadiusDesktop,
	attributes?.borderRadiusTablet,
	attributes?.borderRadiusMobile,
	attributes?.hoverColor,
	attributes?.bgHoverColor,
	attributes?.hoverBoxShadow,
	attributes?.hoverBorderDesktop,
	attributes?.hoverBorderTablet,
	attributes?.hoverBorderMobile,
	attributes?.hoverBorderRadiusDesktop,
	attributes?.hoverBorderRadiusTablet,
	attributes?.hoverBorderRadiusMobile,
	])

	useFontFamilyinBlock([
		attributes?.typography
	])

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
								<GkitPanelBody title={__('Layout and Content', 'gutenkit')} initialOpen={true}>
									<SelectControl
										label={__('Appearance', 'gutenkit')}
										options={[
											{ label: __('Icon Only', 'gutenkit'), value: 'icon-only' },
											{ label: __('Text Only', 'gutenkit'), value: 'text-only' },
											{ label: __('Progress Indicator', 'gutenkit'), value: 'progress-indicator' }
										]}
										value={attributes?.btnAppearance}
										onChange={value => setAttributes({ btnAppearance: value })}
									/>

									{attributes?.btnAppearance !== 'text-only' &&
										<>
											<GkitIconPicker
												label={__('Icon', 'gutenkit')}
												onChange={value => setAttributes({ btnIcon: value })}
												value={attributes?.btnIcon}
											/>
										</>
									}

									{attributes?.btnAppearance === 'text-only' &&
										<>
											<GkitText
												value={attributes?.btnText}
												label={__('Button Text', 'gutenkit')}
												onChange={value => setAttributes({ btnText: value })}
												labelBlock='block'
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

								</GkitPanelBody>

								<GkitPanelBody title={__('Settings', 'gutenkit')}>
									<NumberControl
										label={__('Offset Top (px)', 'gutenkit')}
										value={attributes?.offsetTop}
										min={0}
										onChange={(value) => setAttributes({ offsetTop: Number(value) })}
										labelPosition={'side'}
									/>

									<Spacer marginY="10px">
										<GkitSwitcher
											label={__('Show button on scroll', 'gutenkit')}
											value={attributes?.showBtnOnScroll}
											onChange={(value) => setAttributes({ showBtnOnScroll: value })}
										/>
									</Spacer>

									{attributes?.showBtnOnScroll &&
										<>
											<NumberControl
												label={__('Enter scrolled value (px)', 'gutenkit')}
												value={attributes?.scrolledValue}
												min={0}
												onChange={(value) => setAttributes({ scrolledValue: Number(value) })}
												labelPosition={'side'}
											/>
										</>
									}
								</GkitPanelBody>
							</>
						);
					}

					else if (tab.name === 'style') {
						return (
							<>
								<GkitPanelBody title={__('Button Style', 'gutenkit')} initialOpen={true}>

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
											sizeUnits={['px', '%']}
											range={{
												"min": 0,
												"max": 500
											}}
										/>
									</GkitResponsive>

									<GkitResponsive>
										<GkitSlider
											label={__('Height', 'gutenkit')}
											value={gkitResponsiveValue(
												attributes,
												"height",
												device
											)}
											onChange={(value) =>
												responsiveHelper(
													'height',
													value,
													device,
													setAttributes
												)
											}
											sizeUnits={['px', '%']}
											range={{
												"min": 0,
												"max": 500
											}}
										/>
									</GkitResponsive>

									{attributes?.btnAppearance === 'text-only' &&
										<Spacer marginY="8px">
											<GkitTypography
												label={__('Typography', 'gutenkit')}
												value={attributes?.typography}
												onChange={value => setAttributes({ typography: value })}
											/>
										</Spacer>
									}

									{attributes?.btnAppearance !== 'text-only' &&
										<GkitResponsive>
											<GkitSlider
												label={__('Icon Size', 'gutenkit')}
												value={gkitResponsiveValue(
													attributes,
													"iconSize",
													device
												)}
												onChange={(value) =>
													responsiveHelper(
														'iconSize',
														value,
														device,
														setAttributes
													)
												}
												sizeUnits={['px']}
												range={{
													"min": 1,
													"max": 100
												}}
											/>
										</GkitResponsive>
									}

									{attributes?.btnAppearance === 'progress-indicator' &&
										<>
											<GkitColor
												label={__('Line Foreground color', 'gutenkit')}
												onChange={(value) => setAttributes({ lineFgColor: value })}
												value={attributes?.lineFgColor}
											/>

											<GkitColor
												label={__('Line Background Color', 'gutenkit')}
												onChange={(value) => setAttributes({ lineBgColor: value })}
												value={attributes?.lineBgColor}
											/>
										</>
									}

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
																label={__('Background', 'gutenkit')}
																onChange={(value) => setAttributes({ bgColor: value })}
																value={attributes?.bgColor}
																exclude={{ 'video': true, 'image': true }}
															/>

															<GkitBoxShadow
																label={__('Box Shadow', 'gutenkit')}
																value={attributes?.boxShadow}
																onChange={(value) => setAttributes({ boxShadow: value })}
															/>

															<Spacer />

															{attributes?.btnAppearance !== 'progress-indicator' &&
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

																	<Spacer marginBottom="10px" />

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
															}
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
																label={__('Background', 'gutenkit')}
																onChange={(value) => setAttributes({ bgHoverColor: value })}
																value={attributes?.bgHoverColor}
																exclude={{ 'video': true, 'image': true }}
															/>

															<GkitBoxShadow
																label={__('Box Shadow', 'gutenkit')}
																value={attributes?.hoverBoxShadow}
																onChange={(value) => setAttributes({ hoverBoxShadow: value })}
															/>

															<Spacer />

															{attributes?.btnAppearance !== 'progress-indicator' &&
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

																	<Spacer marginBottom="10px" />

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
																					"hoverBorderRadius",
																					value,
																					device,
																					setAttributes
																				)
																			}
																		/>
																	</GkitResponsive>
																</>
															}
														</>
													)
												}
											}
										}
									</GkitTabs>
								</GkitPanelBody>
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
