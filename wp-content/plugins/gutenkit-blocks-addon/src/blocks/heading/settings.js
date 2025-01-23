
import { __ } from '@wordpress/i18n';
import { memo, useEffect } from '@wordpress/element';
import { InspectorControls } from '@wordpress/block-editor';
import {
	SelectControl,
	TextareaControl,
	__experimentalBoxControl as BoxControl,
	__experimentalHeading as Heading,
	__experimentalDivider as Divider,
	__experimentalBorderControl as BorderControl,
	__experimentalSpacer as Spacer,
	GradientPicker,
} from '@wordpress/components';
import { alignCenter, alignLeft, alignRight } from '@wordpress/icons';
import HeadingStyle from './style';

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
		GkitControlRow,
		GkitURL
	} = window.gutenkit.components;
	const { gkitResponsiveValue, useFontFamilyinBlock, responsiveHelper } = window.gutenkit.helpers;
	//Heading Block Style
	useEffect(() => {
		let headingStyle = HeadingStyle(attributes);
		setAttributes({
			blocksCSS: headingStyle
		});
	}, [
		attributes?.blockID,
		attributes?.blockClass,
		attributes?.content,
		attributes?.link,
		attributes?.htmlTag,
		attributes?.showBorder,
		attributes?.borderPosition,
		attributes?.showSubtitle,
		attributes?.borderSubtitle,
		attributes?.showOutline,
		attributes?.subtitleContent,
		attributes?.subtitlePosition,
		attributes?.subtitleHtmlTag,
		attributes?.showDescription,
		attributes?.descriptionContent,
		attributes?.descriptionMaxWidthDesktop,
		attributes?.descriptionMaxWidthTablet,
		attributes?.descriptionMaxWidthMobile,
		attributes?.showShadowText,
		attributes?.shadowTextContent,
		attributes?.showSeparator,
		attributes?.separatorStyle,
		attributes?.separatorPosition,
		attributes?.generalTextAlignmentDesktop,
		attributes?.generalTextAlignmentTablet,
		attributes?.generalTextAlignmentMobile,
		attributes?.titleColor,
		attributes?.titleHoverColor,
		attributes?.titleTextShadow,
		attributes?.titleMarginDesktop,
		attributes?.titleMarginTablet,
		attributes?.titleMarginMobile,
		attributes?.titleTypography,
		attributes?.titleBorderWidth,
		attributes?.titleBorderHeight,
		attributes?.titleBorderVerticalPosition,
		attributes?.titleBorderRightGap,
		attributes?.titleBorderLeftGap,
		attributes?.titleBorderBackground,
		attributes?.focusedTitleColor,
		attributes?.focusedTitleHoverColor,
		attributes?.focusedTitleTypography,
		attributes?.focusedTitleTextDecorationColor,
		attributes?.focusedTitleTextShadow,
		attributes?.focusedTitlePaddingDesktop,
		attributes?.focusedTitlePaddingTablet,
		attributes?.focusedTitlePaddingMobile,
		attributes?.focusedTitleUseBackground,
		attributes?.focusedTitleBackgroundColor,
		attributes?.focusedTitleBorderRadius,
		attributes?.focusedTitleUseTextFill,
		attributes?.focusedTitleTextFillBackground,
		attributes?.subtitleColor,
		attributes?.subtitleTypography,
		attributes?.subtitleMarginDesktop,
		attributes?.subtitleMarginTablet,
		attributes?.subtitleMarginMobile,
		attributes?.subtitlePaddingDesktop,
		attributes?.subtitlePaddingTablet,
		attributes?.subtitlePaddingMobile,
		attributes?.subtitleUseTextFill,
		attributes?.subtitleTextFillBackground,
		attributes?.subtitleBorderLeftBackground,
		attributes?.subtitleBorderLeftWidthDesktop,
		attributes?.subtitleBorderLeftWidthTablet,
		attributes?.subtitleBorderLeftWidthMobile,
		attributes?.subtitleBorderLeftMarginDesktop,
		attributes?.subtitleBorderLeftMarginTablet,
		attributes?.subtitleBorderLeftMarginMobile,
		attributes?.subtitleBorderRightBackground,
		attributes?.subtitleBorderRightWidthDesktop,
		attributes?.subtitleBorderRightWidthTablet,
		attributes?.subtitleBorderRightWidthMobile,
		attributes?.subtitleBorderRightMarginDesktop,
		attributes?.subtitleBorderRightMarginTablet,
		attributes?.subtitleBorderRightMarginMobile,
		attributes?.subtitleBorderRightHeightDesktop,
		attributes?.subtitleBorderRightHeightTablet,
		attributes?.subtitleBorderRightHeightMobile,
		attributes?.subtitleBorderRightVerticalPositionDesktop,
		attributes?.subtitleBorderRightVerticalPositionTablet,
		attributes?.subtitleBorderRightVerticalPositionMobile,
		attributes?.subtitleOutlineBorder,
		attributes?.subtitleOutlineBorderRadiusDesktop,
		attributes?.subtitleOutlineBorderRadiusTablet,
		attributes?.subtitleOutlineBorderRadiusMobile,
		attributes?.descriptionColor,
		attributes?.descriptionTypography,
		attributes?.descriptionMarginDesktop,
		attributes?.descriptionMarginTablet,
		attributes?.descriptionMarginMobile,
		attributes?.separatorWidthDesktop,
		attributes?.separatorWidthTablet,
		attributes?.separatorWidthMobile,
		attributes?.separatorHeightDesktop,
		attributes?.separatorHeightTablet,
		attributes?.separatorHeightMobile,
		attributes?.separatorMarginDesktop,
		attributes?.separatorMarginTablet,
		attributes?.separatorMarginMobile,
		attributes?.separatorColor,
		attributes?.shadowTextPositionDesktop,
		attributes?.shadowTextPositionTablet,
		attributes?.shadowTextPositionMobile,
		attributes?.shadowTextTypography,
		attributes?.shadowTextColor,
		attributes?.shadowTextStrokeWidth,
		attributes?.shadowTextStrokeColor
	])

	//load font family
	useFontFamilyinBlock([
		attributes?.titleTypography,
		attributes?.focusedTitleTypography,
		attributes?.subtitleTypography,
		attributes?.descriptionTypography,
		attributes?.shadowTextTypography
	])

	return (
		<>
			<InspectorControls>
				<GkitTabs
					type="top-level"
					tabs={[
						{
							name: 'content',
							title: __('Content', 'gutenkit'),
						},
						{
							name: 'style',
							title: __('Style', 'gutenkit'),
						},
						{
							name: 'advanced',
							title: __('Advanced', 'gutenkit'),
						},
					]}
				>
					{
						(tab) => {
							switch (tab.name) {
								case 'content':
									return (
										<>
											<GkitPanelBody title={__('Title', 'gutenkit')} initialOpen={true}>
												<SelectControl
													label={__('HTML Tag', 'gutenkit')}
													value={attributes?.htmlTag}
													options={[
														{ label: 'H1', value: 'h1' },
														{ label: 'H2', value: 'h2' },
														{ label: 'H3', value: 'h3' },
														{ label: 'H4', value: 'h4' },
														{ label: 'H5', value: 'h5' },
														{ label: 'H6', value: 'h6' },
														{ label: 'div', value: 'div' },
														{ label: 'span', value: 'span' },
														{ label: 'p', value: 'p' },
													]}
													onChange={(value) => setAttributes({ htmlTag: value })}
													__nextHasNoMarginBottom
												/>

												<GkitSwitcher
													label={__('Add Url', 'gutenkit')}
													value={attributes?.linkSwitch}
													onChange={(value) => setAttributes({ linkSwitch: value })}
												/>
												{attributes?.linkSwitch &&
													<GkitURL
														value={attributes?.link}
														onChange={val => setAttributes({ link: val })}
													/>
												}
												<GkitSwitcher
													label={__('Show Border', 'gutenkit')}
													value={attributes?.showBorder}
													onChange={(value) => setAttributes({ showBorder: value })}
												/>
												{
													attributes?.showBorder && (
														<GkitChoose
															label={__('Border Position', 'gutenkit')}
															options={[
																{ label: 'Start', value: 'start' },
																{ label: 'End', value: 'end' },
															]}
															onChange={(value) => setAttributes({ borderPosition: value })}
															value={attributes?.borderPosition}
														/>
													)
												}
											</GkitPanelBody>
											<GkitPanelBody title={__('Sub Title', 'gutenkit')}>
												<GkitSwitcher
													label={__("Show Subtitle", "gutenkit")}
													value={attributes?.showSubtitle}
													onChange={(value) => setAttributes({ showSubtitle: value })}
												/>
												{
													attributes?.showSubtitle && (
														<>
															<GkitSwitcher
																label={__("Border Sub Title", "gutenkit")}
																value={attributes?.borderSubtitle}
																onChange={(value) => setAttributes({ borderSubtitle: value })}
															/>
															{
																!attributes?.borderSubtitle && (
																	<GkitSwitcher
																		label={__("Show Outline", "gutenkit")}
																		value={attributes?.showOutline}
																		onChange={(value) => setAttributes({ showOutline: value })}
																	/>
																)
															}
															<TextareaControl
																label={__('Heading Sub Title', 'gutenkit')}
																value={attributes?.subtitleContent}
																onChange={(value) => setAttributes({
																	subtitleContent: value
																})}
															/>
															<GkitChoose
																label={__("subtitlePosition", "gutenkit")}
																options={[
																	{ label: 'After Title', value: 'after-title' },
																	{ label: 'Before title', value: 'before-title' }
																]}
																onChange={(value) => setAttributes({
																	subtitlePosition: value
																})}
																value={attributes?.subtitlePosition}
															/>
															<SelectControl
																label={__('Subtitle HTML Tag', 'gutenkit')}
																value={attributes?.subtitleHtmlTag}
																options={[
																	{ label: 'H1', value: 'h1' },
																	{ label: 'H2', value: 'h2' },
																	{ label: 'H3', value: 'h3' },
																	{ label: 'H4', value: 'h4' },
																	{ label: 'H5', value: 'h5' },
																	{ label: 'H6', value: 'h6' },
																	{ label: 'div', value: 'div' },
																	{ label: 'span', value: 'span' },
																	{ label: 'p', value: 'p' },
																]}
																onChange={(value) => setAttributes({ subtitleHtmlTag: value })}
																__nextHasNoMarginBottom
															/>
														</>
													)
												}
											</GkitPanelBody>
											<GkitPanelBody title={__('Title Description', 'gutenkit')}>
												<GkitSwitcher
													label={__("Show Description", "gutenkit")}
													value={attributes?.showDescription}
													onChange={(value) => setAttributes({ showDescription: value })}
												/>
												{
													attributes?.showDescription && (
														<>
															<TextareaControl
																label={__('Heading Description', 'gutenkit')}
																value={attributes?.descriptionContent}
																onChange={(value) => setAttributes({
																	descriptionContent: value
																})}
															/>
															<GkitResponsive>
																<GkitSlider
																	label={__('Maximum Width', 'gutenkit')}
																	value={gkitResponsiveValue(
																		attributes,
																		"descriptionMaxWidth",
																		device
																	)}
																	onChange={(value) =>
																		responsiveHelper(
																			'descriptionMaxWidth',
																			value,
																			device,
																			setAttributes
																		)
																	}
																	sizeUnits={['px', '%', 'em']}
																	range={{
																		min: 0,
																		max: 1200
																	}}
																/>
															</GkitResponsive>
														</>
													)
												}
											</GkitPanelBody>
											<GkitPanelBody title={__('Shadow Text', 'gutenkit')}>
												<GkitSwitcher
													label={__("Show Shadow Text", "gutenkit")}
													value={attributes?.showShadowText}
													onChange={(value) => setAttributes({ showShadowText: value })}
												/>
												{
													attributes?.showShadowText && (
														<>
															<GkitText
																value={attributes?.shadowTextContent}
																label={__("Content", "gutenkit")}
																onChange={(value) => setAttributes({
																	shadowTextContent: value
																})}
																labelBlock={'block'}
															/>
														</>
													)
												}
											</GkitPanelBody>
											<GkitPanelBody title={__('Separator', 'gutenkit')}>
												<GkitSwitcher
													label={__("Show Separator", "gutenkit")}
													value={attributes?.showSeparator}
													onChange={(value) => setAttributes({ showSeparator: value })}
												/>
												{
													attributes?.showSeparator && (
														<>
															<SelectControl
																label={__('Separator Type', 'gutenkit')}
																value={attributes?.separatorStyle}
																options={[
																	{ label: 'None', value: 'none' },
																	{ label: 'Dotted', value: 'dotted' },
																	{ label: 'Solid', value: 'solid' },
																	{ label: 'Solid With Star', value: 'solid-star' },
																	{ label: 'Solid With Bullet', value: 'solid-bullet' },
																]}
																onChange={(value) => setAttributes({
																	separatorStyle: value
																})}
																__nextHasNoMarginBottom
															/>
															<SelectControl
																label={__('Separator Position', 'gutenkit')}
																value={attributes?.separatorPosition}
																options={[
																	{ label: 'Top', value: 'top' },
																	{ label: 'Before Title', value: 'before-title' },
																	{ label: 'After Title', value: 'after-title' },
																	{ label: 'Bottom', value: 'bottom' },

																]}
																onChange={(value) => setAttributes({
																	separatorPosition: value
																})}
																__nextHasNoMarginBottom
															/>
														</>
													)
												}
											</GkitPanelBody>

										</>
									)
								case 'style':
									return (
										<>
											<GkitPanelBody title={__('General', 'gutenkit')} initialOpen={true}>
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
															"generalTextAlignment",
															device
														)}
														onChange={(value) =>
															responsiveHelper(
																'generalTextAlignment',
																value,
																device,
																setAttributes
															)
														}
													/>
												</GkitResponsive>
											</GkitPanelBody>
											<GkitPanelBody title={__('Title', 'gutenkit')}>
												<GkitColor
													label={__('Color', 'gutenkit')}
													value={attributes?.titleColor}
													onChange={(value) => setAttributes({ titleColor: value })}
												/>
												<GkitColor
													label={__('Hover Color', 'gutenkit')}
													value={attributes?.titleHoverColor}
													onChange={(value) => setAttributes({ titleHoverColor: value })}
												/>
												<GkitBoxShadow
													label={__('Text Shadow', 'gutenkit')}
													value={attributes?.titleTextShadow}
													onChange={(value) => setAttributes({ titleTextShadow: value })}
													exclude={{
														position: true,
														spread: true
													}}
												/>
												<Spacer marginY="10px">
													<BoxControl
														label={__('Margin', 'gutenkit')}
														values={gkitResponsiveValue(
															attributes,
															"titleMargin",
															device
														)}
														onChange={(value) => responsiveHelper('titleMargin', value, device, setAttributes)}
													/>
												</Spacer>

												<GkitTypography
													label={__('Typography', 'gutenkit')}
													value={attributes?.titleTypography}
													onChange={(value) => setAttributes({ titleTypography: value })}
												/>
												{
													attributes?.showBorder && (
														<>
															<GkitSlider
																label={__("Border Width", "gutenkit")}
																value={attributes?.titleBorderWidth}
																onChange={(value) => setAttributes({
																	titleBorderWidth: value
																})}
																sizeUnits={['px', 'em']}
															/>
															<GkitSlider
																label={__("Border Height", "gutenkit")}
																value={attributes?.titleBorderHeight}
																onChange={(value) => setAttributes({
																	titleBorderHeight: value
																})}
																sizeUnits={['px', '%']}
															/>
															<GkitSlider
																label={__("Vertical Position", "gutenkit")}
																value={attributes?.titleBorderVerticalPosition}
																onChange={(value) => setAttributes({
																	titleBorderVerticalPosition: value
																})}
																sizeUnits={['px', '%']}
																range={{ min: -100, max: 100 }}
															/>
															{
																attributes?.borderPosition === 'start' && (
																	<GkitSlider
																		label={__("Right Gap", "gutenkit")}
																		value={attributes?.titleBorderRightGap}
																		onChange={(value) => setAttributes({
																			titleBorderRightGap: value
																		})}
																		sizeUnits={['px', '%']}
																	/>
																)
															}
															{
																attributes?.borderPosition === 'end' && (
																	<GkitSlider
																		label={__("Left Gap", "gutenkit")}
																		value={attributes?.titleBorderLeftGap}
																		onChange={(value) => setAttributes({
																			titleBorderLeftGap: value
																		})}
																		sizeUnits={['px', '%']}
																	/>
																)
															}
															<GkitControlRow
																label={__('Border Color', 'gutenkit')}
																labelBlock='block'
																type="gradient"
															>
																<GradientPicker
																	__nextHasNoMargin
																	value={attributes?.titleBorderBackground}
																	onChange={(value) => setAttributes({
																		titleBorderBackground: value
																	})}
																	gradients={[]}
																/>
															</GkitControlRow>
														</>
													)
												}
											</GkitPanelBody>
											<GkitPanelBody title={__('Focused Title', 'gutenkit')}>
												<GkitColor
													label={__('Color', 'gutenkit')}
													value={attributes?.focusedTitleColor}
													onChange={(value) => setAttributes({
														focusedTitleColor: value
													})}
												/>
												<GkitColor
													label={__('Hover Color', 'gutenkit')}
													value={attributes?.focusedTitleHoverColor}
													onChange={(value) => setAttributes({
														focusedTitleHoverColor: value
													})}
												/>
												<GkitTypography
													label={__('Typography', 'gutenkit')}
													value={attributes?.focusedTitleTypography}
													onChange={(value) => setAttributes({
														focusedTitleTypography: value
													})}
												/>
												<Spacer marginY="10px">
													<GkitColor
														label={__('Text Decoration Color', 'gutenkit')}
														value={attributes?.focusedTitleTextDecorationColor}
														onChange={(value) => setAttributes({
															focusedTitleTextDecorationColor: value
														})}
													/>
												</Spacer>
												<GkitBoxShadow
													label={__('Text Shadow', 'gutenkit')}
													value={attributes?.focusedTitleTextShadow}
													onChange={(value) => setAttributes({ focusedTitleTextShadow: value })}
													exclude={{
														position: true,
														spread: true
													}}
												/>
												<Spacer marginY="10px">
													<GkitResponsive>
														<BoxControl
															label={__('Padding', 'gutenkit')}
															values={gkitResponsiveValue(
																attributes,
																"focusedTitlePadding",
																device
															)}
															onChange={(value) =>
																responsiveHelper(
																	'focusedTitlePadding',
																	value,
																	device,
																	setAttributes
																)
															}
														/>
													</GkitResponsive>
												</Spacer>
												{
													!attributes?.focusedTitleUseTextFill && (
														<GkitSwitcher
															label={__('Use background color on text', 'gutenkit')}
															value={attributes?.focusedTitleUseBackground}
															onChange={(value) => setAttributes({ focusedTitleUseBackground: value })}
														/>
													)
												}
												{
													attributes?.focusedTitleUseBackground && (
														<>
															<GkitBackgrounGroup
																label={__('Background', 'gutenkit')}
																value={attributes?.focusedTitleBackgroundColor}
																onChange={(value) => setAttributes({ focusedTitleBackgroundColor: value })}
																exclude={{ video: true, image: true }}
															/>
															<BoxControl
																label={__('Border Radius', 'gutenkit')}
																values={attributes?.focusedTitleBorderRadius}
																onChange={(value) => setAttributes({
																	focusedTitleBorderRadius: value
																})}
															/>
														</>
													)
												}
												{
													!attributes?.focusedTitleUseBackground && (
														<GkitSwitcher
															label={__('Use Text Fill', 'gutenkit')}
															value={attributes?.focusedTitleUseTextFill}
															onChange={(value) => setAttributes({ focusedTitleUseTextFill: value })}
														/>
													)
												}
												{
													attributes?.focusedTitleUseTextFill && (
														<>
															<GkitBackgrounGroup
																label={__('Background', 'gutenkit')}
																value={attributes?.focusedTitleTextFillBackground}
																onChange={(value) => setAttributes({ focusedTitleTextFillBackground: value })}
																exclude={{ 'video': true, 'classic': true }}
															/>
														</>
													)
												}
											</GkitPanelBody>
											{
												attributes?.showSubtitle && (
													<>
														<GkitPanelBody title={__('Subtitle', 'gutenkit')}>
															<GkitColor
																label={__('Color', 'gutenkit')}
																value={attributes?.subtitleColor}
																onChange={(value) => setAttributes({
																	subtitleColor: value
																})}
															/>
															<Spacer marginY="10px">
																<GkitTypography
																	label={__('Typography', 'gutenkit')}
																	value={attributes?.subtitleTypography}
																	onChange={(value) => setAttributes({
																		subtitleTypography: value
																	})}
																/>
															</Spacer>
															<GkitResponsive>
																<BoxControl
																	label={__('Margin', 'gutenkit')}
																	values={gkitResponsiveValue(
																		attributes,
																		"subtitleMargin",
																		device
																	)}
																	onChange={(value) =>
																		responsiveHelper(
																			'subtitleMargin',
																			value,
																			device,
																			setAttributes
																		)
																	}
																/>
															</GkitResponsive>
															{
																attributes?.showOutline && (
																	<GkitResponsive>
																		<BoxControl
																			label={__('Padding', 'gutenkit')}
																			values={gkitResponsiveValue(
																				attributes,
																				"subtitlePadding",
																				device
																			)}
																			onChange={(value) =>
																				responsiveHelper(
																					'subtitlePadding',
																					value,
																					device,
																					setAttributes
																				)
																			}
																		/>
																	</GkitResponsive>
																)
															}
															<GkitSwitcher
																label={__('Use Text Fill', 'gutenkit')}
																value={attributes?.subtitleUseTextFill}
																onChange={(value) => setAttributes({ subtitleUseTextFill: value })}
															/>
															{
																attributes?.subtitleUseTextFill && (
																	<GkitBackgrounGroup
																		label={__('Background', 'gutenkit')}
																		value={attributes?.subtitleTextFillBackground}
																		onChange={(value) => setAttributes({ subtitleTextFillBackground: value })}
																		exclude={{ video: true, classic: true }}
																	/>
																)
															}
															{
																attributes?.borderSubtitle && (
																	<>
																		<Divider />
																		<Heading>{__("Subtitle Border Left", "gutenkit")}</Heading>
																		<GkitBackgrounGroup
																			label={__('Background', 'gutenkit')}
																			value={attributes?.subtitleBorderLeftBackground}
																			onChange={(value) => setAttributes({ subtitleBorderLeftBackground: value })}
																			exclude={{ video: true, image: true }}
																		/>
																		<GkitResponsive>
																			<GkitSlider
																				label={__('Width', 'gutenkit')}
																				value={gkitResponsiveValue(
																					attributes,
																					"subtitleBorderLeftWidth",
																					device
																				)}
																				onChange={(value) =>
																					responsiveHelper(
																						'subtitleBorderLeftWidth',
																						value,
																						device,
																						setAttributes
																					)
																				}
																				sizeUnits={['px']}
																			/>
																		</GkitResponsive>
																		<GkitResponsive>
																			<BoxControl
																				label={__('Margin', 'gutenkit')}
																				values={gkitResponsiveValue(
																					attributes,
																					"subtitleBorderLeftMargin",
																					device
																				)}
																				onChange={(value) =>
																					responsiveHelper(
																						'subtitleBorderLeftMargin',
																						value,
																						device,
																						setAttributes
																					)
																				}
																			/>
																		</GkitResponsive>
																		<Divider />
																		<Heading>{__("Subtitle Border Right", "gutenkit")}</Heading>
																		<GkitBackgrounGroup
																			label={__('Background', 'gutenkit')}
																			value={attributes?.subtitleBorderRightBackground}
																			onChange={(value) => setAttributes({ subtitleBorderRightBackground: value })}
																			exclude={{ video: true, image: true }}
																		/>
																		<GkitResponsive>
																			<GkitSlider
																				label={__('Width', 'gutenkit')}
																				value={gkitResponsiveValue(
																					attributes,
																					"subtitleBorderRightWidth",
																					device
																				)}
																				onChange={(value) =>
																					responsiveHelper(
																						'subtitleBorderRightWidth',
																						value,
																						device,
																						setAttributes
																					)
																				}
																				sizeUnits={['px']}
																			/>
																		</GkitResponsive>
																		<GkitResponsive>
																			<BoxControl
																				label={__('Margin', 'gutenkit')}
																				values={gkitResponsiveValue(
																					attributes,
																					"subtitleBorderRightMargin",
																					device
																				)}
																				onChange={(value) =>
																					responsiveHelper(
																						'subtitleBorderRightMargin',
																						value,
																						device,
																						setAttributes
																					)
																				}
																			/>
																		</GkitResponsive>
																		<Divider />
																		<GkitResponsive>
																			<GkitSlider
																				label={__('Height', 'gutenkit')}
																				value={gkitResponsiveValue(
																					attributes,
																					"subtitleBorderRightHeight",
																					device
																				)}
																				onChange={(value) =>
																					responsiveHelper(
																						'subtitleBorderRightHeight',
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
																				label={__('Vertical Position', 'gutenkit')}
																				value={gkitResponsiveValue(
																					attributes,
																					"subtitleBorderRightVerticalPosition",
																					device
																				)}
																				onChange={(value) =>
																					responsiveHelper(
																						'subtitleBorderRightVerticalPosition',
																						value,
																						device,
																						setAttributes
																					)
																				}
																				sizeUnits={['px']}
																				range={{ min: -20, max: 20 }}
																			/>
																		</GkitResponsive>
																	</>
																)
															}
															{
																attributes?.showOutline && (
																	<>
																		<Divider />
																		<BorderControl
																			label={__('Outline', 'gutenkit')}
																			onChange={(value) => setAttributes({ subtitleOutlineBorder: value })}
																			value={attributes?.subtitleOutlineBorder}
																			withSlider
																			isCompact
																		/>
																		<GkitResponsive>
																			<BoxControl
																				label={__('Outline Radius', 'gutenkit')}
																				values={gkitResponsiveValue(
																					attributes,
																					"subtitleOutlineBorderRadius",
																					device
																				)}
																				onChange={(value) =>
																					responsiveHelper(
																						'subtitleOutlineBorderRadius',
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
														</GkitPanelBody>
													</>
												)
											}
											{
												attributes?.showDescription && (
													<>
														<GkitPanelBody title={__('Title Description', 'gutenkit')}>
															<GkitColor
																label={__('Color', 'gutenkit')}
																value={attributes?.descriptionColor}
																onChange={(value) => setAttributes({ descriptionColor: value })}
															/>
															<Spacer marginY="10px">
																<GkitTypography
																	label={__('Typography', 'gutenkit')}
																	value={attributes?.descriptionTypography}
																	onChange={(value) => setAttributes({ descriptionTypography: value })}
																/>
															</Spacer>
															<GkitResponsive>
																<BoxControl
																	label={__('Margin', 'gutenkit')}
																	values={gkitResponsiveValue(
																		attributes,
																		"descriptionMargin",
																		device
																	)}
																	onChange={(value) =>
																		responsiveHelper(
																			'descriptionMargin',
																			value,
																			device,
																			setAttributes
																		)
																	}
																/>
															</GkitResponsive>
														</GkitPanelBody>
													</>
												)
											}
											{
												attributes?.showSeparator && (
													<GkitPanelBody title={__('Separator', 'gutenkit')}>
														<GkitResponsive>
															<GkitSlider
																label={__('Width', 'gutenkit')}
																value={gkitResponsiveValue(
																	attributes,
																	"separatorWidth",
																	device
																)}
																onChange={(value) =>
																	responsiveHelper(
																		'separatorWidth',
																		value,
																		device,
																		setAttributes
																	)
																}
																sizeUnits={['px']}
																range={{ min: 0, max: 1000 }}
															/>
														</GkitResponsive>
														<GkitResponsive>
															<GkitSlider
																label={__('Height', 'gutenkit')}
																value={gkitResponsiveValue(
																	attributes,
																	"separatorHeight",
																	device
																)}
																onChange={(value) =>
																	responsiveHelper(
																		'separatorHeight',
																		value,
																		device,
																		setAttributes
																	)
																}
																sizeUnits={['px']}
																range={{ min: 0, max: 50 }}
															/>
														</GkitResponsive>
														<GkitResponsive>
															<BoxControl
																label={__('Margin', 'gutenkit')}
																values={gkitResponsiveValue(
																	attributes,
																	"separatorMargin",
																	device
																)}
																onChange={(value) =>
																	responsiveHelper(
																		'separatorMargin',
																		value,
																		device,
																		setAttributes
																	)
																}
															/>
														</GkitResponsive>
														<GkitColor
															label={__('Separator color', 'gutenkit')}
															value={attributes?.separatorColor}
															onChange={(value) => setAttributes({ separatorColor: value })}
														/>
													</GkitPanelBody>
												)
											}
											{
												attributes?.showShadowText && (
													<GkitPanelBody title={__('Shadow Text', 'gutenkit')}>
														<GkitResponsive>
															<BoxControl
																label={__('Position', 'gutenkit')}
																values={gkitResponsiveValue(
																	attributes,
																	"shadowTextPosition",
																	device
																)}
																onChange={(value) =>
																	responsiveHelper(
																		'shadowTextPosition',
																		value,
																		device,
																		setAttributes
																	)
																}
																sides={['top', 'left']}
																inputProps={{
																	min: -100,
																	step: 1,

																}}
															/>
														</GkitResponsive>
														<Spacer marginY="15px">
															<GkitTypography
																label={__('Typography', 'gutenkit')}
																value={attributes?.shadowTextTypography}
																onChange={(value) => setAttributes({ shadowTextTypography: value })}
															/>
														</Spacer>
														<GkitColor
															label={__('Text Color', 'gutenkit')}
															value={attributes?.shadowTextColor}
															onChange={(value) => setAttributes({ shadowTextColor: value })}
														/>
														<Heading>{__("Border", "gutenkit")}</Heading>
														<GkitSlider
															label={__('Stroke Width', 'gutenkit')}
															value={attributes?.shadowTextStrokeWidth}
															onChange={(value) => setAttributes({
																shadowTextStrokeWidth: value
															})}
															sizeUnits={['px']}
														/>
														<GkitColor
															label={__('Stroke Color', 'gutenkit')}
															value={attributes?.shadowTextStrokeColor}
															onChange={(value) => setAttributes({ shadowTextStrokeColor: value })}
														/>

													</GkitPanelBody>
												)
											}
										</>

									)
								case 'advanced':
									return (
										<>
											{advancedControl}
										</>
									)
							}
						}
					}
				</GkitTabs>
			</InspectorControls>
		</>
	)
}

export default memo(Settings);
