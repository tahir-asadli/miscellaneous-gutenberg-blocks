/**
 * WordPress dependencies
 */
import { __ } from "@wordpress/i18n";
import { select, subscribe, useDispatch } from "@wordpress/data";
import {
	PanelBody,
	RangeControl,
	__experimentalToggleGroupControl as ToggleGroupControl,
	__experimentalToggleGroupControlOption as ToggleGroupControlOption,
	__experimentalToggleGroupControlOptionIcon as ToggleGroupControlOptionIcon,
	SelectControl,
} from "@wordpress/components"; // For the plus icon
import {
	useBlockProps,
	useInnerBlocksProps,
	InspectorControls,
} from "@wordpress/block-editor";
import "./editor.scss";

/**
 * External dependencies
 */
import { useState } from "react";
import {
	AlignVerticalJustifyEnd,
	AlignVerticalJustifyStart,
	AlignVerticalJustifyCenter,
	AlignVerticalDistributeCenter,
	AlignVerticalSpaceBetween,
	AlignStartVertical,
	AlignEndVertical,
	AlignHorizontalJustifyCenter,
	AlignHorizontalSpaceBetween,
	AlignHorizontalSpaceAround,
	Ban,
} from "lucide-react";

/**
 * Internal dependencies
 */
import { InspectorLabel } from "../libs/components/inspector-label";
import { gapUnits } from "../libs/global";

/**
 * Block edit function
 */
export default function Edit(props) {
	const {
		attributes: {
			widthType,
			tabletWidthType,
			mobileWidthType,
			width,
			tabletWidth,
			mobileWidth,
			widthUnit,
			tabletWidthUnit,
			mobileWidthUnit,
			columnGap,
			tabletColumnGap,
			mobileColumnGap,
			columnGapUnit,
			tabletColumnGapUnit,
			mobileColumnGapUnit,
			rowGap,
			tabletRowGap,
			mobileRowGap,
			rowGapUnit,
			tabletRowGapUnit,
			mobileRowGapUnit,
			wrap,
			tabletWrap,
			mobileWrap,
			direction,
			tabletDirection,
			mobileDirection,
			reverse,
			tabletReverse,
			mobileReverse,
			justifyContent,
			tabletJustifyContent,
			mobileJustifyContent,
			alignItems,
			tabletAlignItems,
			mobileAlignItems,
			grow,
			tabletGrow,
			mobileGrow,
			shrink,
			tabletShrink,
			mobileShrink,
			display,
			tabletDisplay,
			mobileDisplay,
		},
		setAttributes,
	} = props;
	let previousDeviceType = select("core/editor").getDeviceType();
	subscribe(() => {
		const newDeviceType = select("core/editor").getDeviceType();

		if (newDeviceType !== previousDeviceType) {
			setLayout(newDeviceType?.toLowerCase());
			previousDeviceType = newDeviceType;
		}
	});

	const [layout, setLayout] = useState("desktop");
	let __experimentalSetPreviewDeviceType = (device) => {};
	const siteEditor = useDispatch("core/edit-site");
	const editor = useDispatch("core/editor");

	if (siteEditor) {
		__experimentalSetPreviewDeviceType =
			siteEditor.__experimentalSetPreviewDeviceType;
	} else if (editor) {
		__experimentalSetPreviewDeviceType = editor.setDeviceType;
	}
	const alignItemsStartIcon = <AlignVerticalJustifyStart width={17} />;
	const alignItemsEndIcon = <AlignVerticalJustifyEnd width={17} />;
	const alignItemsCenterIcon = <AlignVerticalJustifyCenter width={17} />;
	const alignItemsBaselineIcon = <AlignVerticalDistributeCenter width={17} />;
	const alignItemsStretchIcon = <AlignVerticalSpaceBetween width={17} />;
	const alignItemsNoneIcon = <Ban width={17} />;
	const AlignStartVerticalIcon = <AlignStartVertical width={17} />;
	const AlignEndVerticalIcon = <AlignEndVertical width={17} />;
	const AlignHorizontalJustifyCenterIcon = (
		<AlignHorizontalJustifyCenter width={17} />
	);
	const AlignHorizontalSpaceBetweenIcon = (
		<AlignHorizontalSpaceBetween width={17} />
	);
	const AlignHorizontalSpaceAroundIcon = (
		<AlignHorizontalSpaceAround width={17} />
	);

	const classNames = [];

	if (wrap == "wrap") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--wrap");
	} else if (wrap == "no-wrap") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--no-wrap");
	}

	if (tabletWrap == "wrap") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--tablet-wrap");
	} else if (tabletWrap == "no-wrap") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--tablet-no-wrap");
	}

	if (mobileWrap == "wrap") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--mobile-wrap");
	} else if (mobileWrap == "no-wrap") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--mobile-no-wrap");
	}

	if (direction == "horizontal") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--horizontal");
	} else if (direction == "vertical") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--vertical");
	}

	if (tabletDirection == "horizontal") {
		classNames.push(
			"miscellaneous-gutenberg-blocks-flexbox--tablet-horizontal",
		);
	} else if (tabletDirection == "vertical") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--tablet-vertical");
	}

	if (mobileDirection == "horizontal") {
		classNames.push(
			"miscellaneous-gutenberg-blocks-flexbox--mobile-horizontal",
		);
	} else if (mobileDirection == "vertical") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--mobile-vertical");
	}

	if (reverse) {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--reverse");
	}
	if (tabletReverse) {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--tablet-reverse");
	}
	if (mobileReverse) {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--mobile-reverse");
	}

	if (justifyContent) {
		classNames.push(
			`miscellaneous-gutenberg-blocks-flexbox--justify-${justifyContent}`,
		);
	}
	if (tabletJustifyContent) {
		classNames.push(
			`miscellaneous-gutenberg-blocks-flexbox--justify-tablet-${tabletJustifyContent}`,
		);
	}
	if (mobileJustifyContent) {
		classNames.push(
			`miscellaneous-gutenberg-blocks-flexbox--justify-mobile-${mobileJustifyContent}`,
		);
	}
	if (alignItems) {
		classNames.push(
			`miscellaneous-gutenberg-blocks-flexbox--align-${alignItems}`,
		);
	}
	if (tabletAlignItems) {
		classNames.push(
			`miscellaneous-gutenberg-blocks-flexbox--align-tablet-${tabletAlignItems}`,
		);
	}
	if (mobileAlignItems) {
		classNames.push(
			`miscellaneous-gutenberg-blocks-flexbox--align-mobile-${mobileAlignItems}`,
		);
	}

	if (grow == "grow") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--grow");
	} else if (grow == "no-grow") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--grow");
	}
	if (tabletGrow == "grow") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--tablet-grow");
	} else if (tabletGrow == "no-grow") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--tablet-grow");
	}
	if (mobileGrow == "grow") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--mobile-grow");
	} else if (mobileGrow == "no-grow") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--mobile-grow");
	}

	if (shrink == "shrink") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--shrink");
	} else if (shrink == "no-shrink") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--no-shrink");
	}
	if (tabletShrink == "shrink") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--tablet-shrink");
	} else if (tabletShrink == "no-shrink") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--tablet-no-shrink");
	}
	if (mobileShrink == "shrink") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--mobile-shrink");
	} else if (mobileShrink == "no-shrink") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--mobile-no-shrink");
	}

	if (display == "flex") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--flex");
	} else if (display == "inline-flex") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--inline-flex");
	} else if (display == "none") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--none");
	}

	if (tabletDisplay == "flex") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--tablet-flex");
	} else if (tabletDisplay == "inline-flex") {
		classNames.push(
			"miscellaneous-gutenberg-blocks-flexbox--tablet-inline-flex",
		);
	} else if (tabletDisplay == "none") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--tablet-none");
	}

	if (mobileDisplay == "flex") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--mobile-flex");
	} else if (mobileDisplay == "inline-flex") {
		classNames.push(
			"miscellaneous-gutenberg-blocks-flexbox--mobile-inline-flex",
		);
	} else if (mobileDisplay == "none") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--mobile-none");
	}

	if (widthType == "auto") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--width-auto");
	} else if (widthType == "initial") {
		classNames.push("miscellaneous-gutenberg-blocks-flexbox--width-initial");
	}
	if (tabletWidthType == "auto") {
		classNames.push(
			"miscellaneous-gutenberg-blocks-flexbox--width-tablet-auto",
		);
	} else if (tabletWidthType == "initial") {
		classNames.push(
			"miscellaneous-gutenberg-blocks-flexbox--width-tablet-initial",
		);
	}
	if (mobileWidthType == "auto") {
		classNames.push(
			"miscellaneous-gutenberg-blocks-flexbox--width-mobile-auto",
		);
	} else if (mobileWidthType == "initial") {
		classNames.push(
			"miscellaneous-gutenberg-blocks-flexbox--width-mobile-initial",
		);
	}

	const blockProps = useBlockProps({
		className: classNames.join(" "),
		style: {
			width: `${
				layout == "desktop"
					? widthType == "custom" && width > 0
						? `${width}${widthUnit}`
						: "initial"
					: layout == "tablet"
					? tabletWidthType == "custom" && tabletWidth > 0
						? `${tabletWidth}${tabletWidthUnit}`
						: "initial"
					: mobileWidthType == "custom" && mobileWidth > 0
					? `${mobileWidth}${mobileWidthUnit}`
					: "initial"
			}`,
			columnGap: `${
				layout == "desktop"
					? columnGap > 0
						? `${columnGap}${columnGapUnit}`
						: "initial"
					: layout == "tablet"
					? tabletColumnGap > 0
						? `${tabletColumnGap}${tabletColumnGapUnit}`
						: "initial"
					: mobileColumnGap > 0
					? `${mobileColumnGap}${mobileColumnGapUnit}`
					: "initial"
			}`,
			rowGap: `${
				layout == "desktop"
					? rowGap > 0
						? `${rowGap}${rowGapUnit}`
						: "initial"
					: layout == "tablet"
					? tabletRowGap > 0
						? `${tabletRowGap}${tabletRowGapUnit}`
						: "initial"
					: mobileRowGap > 0
					? `${mobileRowGap}${mobileRowGapUnit}`
					: "initial"
			}`,
		},
	});
	const innerBlocksProps = useInnerBlocksProps(blockProps);

	return (
		<>
			<InspectorControls>
				<PanelBody title={__("Settings", "miscellaneous-gutenberg-blocks")}>
					<InspectorLabel
						title={__("Width", "miscellaneous-gutenberg-blocks")}
						defaultValue={layout}
						onChange={(value) => {
							setLayout(value);
							__experimentalSetPreviewDeviceType(
								value == "desktop"
									? "Desktop"
									: value == "tablet"
									? "Tablet"
									: "Mobile",
							);
						}}
					/>
					{/* Width */}
					{layout == "desktop" ? (
						<>
							<ToggleGroupControl
								value={widthType}
								isBlock={true}
								__nextHasNoMarginBottom
								__next40pxDefaultSize
								onChange={(value) => setAttributes({ widthType: value })}
							>
								<ToggleGroupControlOption
									isAdaptiveWidth={true}
									value={"full"}
									label={__("Full", "miscellaneous-gutenberg-blocks")}
								/>
								<ToggleGroupControlOption
									isAdaptiveWidth={true}
									value={"auto"}
									label={__("Auto", "miscellaneous-gutenberg-blocks")}
								/>
								<ToggleGroupControlOption
									isAdaptiveWidth={true}
									value={"initial"}
									label={__("Initial", "miscellaneous-gutenberg-blocks")}
								/>
								<ToggleGroupControlOption
									isAdaptiveWidth={true}
									value={"custom"}
									label={__("Custom", "miscellaneous-gutenberg-blocks")}
								/>
							</ToggleGroupControl>
							{widthType == "custom" ? (
								<div
									style={{
										display: "flex",
										width: "100%",
										alignItems: "center",
										marginTop: "5px",
										marginBottom: "10px",
										gap: "5px",
									}}
								>
									<div style={{ width: "70%" }}>
										<RangeControl
											__nextHasNoMarginBottom
											__next40pxDefaultSize
											value={width}
											label={null}
											onChange={(value) =>
												setAttributes({
													width: value,
												})
											}
											min={0}
											max={500}
										/>
									</div>
									<SelectControl
										label=""
										value={widthUnit}
										options={gapUnits}
										__nextHasNoMarginBottom
										__next40pxDefaultSize
										onChange={(value) => {
											setAttributes({
												widthUnit: value,
											});
										}}
									/>
								</div>
							) : null}
						</>
					) : layout == "tablet" ? (
						<>
							<ToggleGroupControl
								value={tabletWidthType}
								isBlock={true}
								__nextHasNoMarginBottom
								__next40pxDefaultSize
								onChange={(value) => setAttributes({ tabletWidthType: value })}
							>
								<ToggleGroupControlOption
									isAdaptiveWidth={true}
									value={"full"}
									label={__("Full", "miscellaneous-gutenberg-blocks")}
								/>
								<ToggleGroupControlOption
									isAdaptiveWidth={true}
									value={"auto"}
									label={__("Auto", "miscellaneous-gutenberg-blocks")}
								/>
								<ToggleGroupControlOption
									isAdaptiveWidth={true}
									value={"initial"}
									label={__("Initial", "miscellaneous-gutenberg-blocks")}
								/>
								<ToggleGroupControlOption
									isAdaptiveWidth={true}
									value={"custom"}
									label={__("Custom", "miscellaneous-gutenberg-blocks")}
								/>
							</ToggleGroupControl>
							{tabletWidthType == "custom" ? (
								<div
									style={{
										display: "flex",
										width: "100%",
										alignItems: "center",
										marginTop: "5px",
										marginBottom: "10px",
										gap: "5px",
									}}
								>
									<div style={{ width: "70%" }}>
										<RangeControl
											__nextHasNoMarginBottom
											__next40pxDefaultSize
											value={tabletWidth}
											label={null}
											onChange={(value) =>
												setAttributes({
													tabletWidth: value,
												})
											}
											min={0}
										/>
									</div>
									<SelectControl
										label=""
										value={tabletWidthUnit}
										options={gapUnits}
										__nextHasNoMarginBottom
										__next40pxDefaultSize
										onChange={(value) => {
											setAttributes({
												tabletWidthUnit: value,
											});
										}}
									/>
								</div>
							) : null}
						</>
					) : (
						<>
							<ToggleGroupControl
								value={mobileWidthType}
								isBlock={true}
								__nextHasNoMarginBottom
								__next40pxDefaultSize
								onChange={(value) => setAttributes({ mobileWidthType: value })}
							>
								<ToggleGroupControlOption
									isAdaptiveWidth={true}
									value={"full"}
									label={__("Full", "miscellaneous-gutenberg-blocks")}
								/>
								<ToggleGroupControlOption
									isAdaptiveWidth={true}
									value={"auto"}
									label={__("Auto", "miscellaneous-gutenberg-blocks")}
								/>
								<ToggleGroupControlOption
									isAdaptiveWidth={true}
									value={"initial"}
									label={__("Initial", "miscellaneous-gutenberg-blocks")}
								/>
								<ToggleGroupControlOption
									isAdaptiveWidth={true}
									value={"custom"}
									label={__("Custom", "miscellaneous-gutenberg-blocks")}
								/>
							</ToggleGroupControl>
							{mobileWidthType == "custom" ? (
								<div
									style={{
										display: "flex",
										width: "100%",
										alignItems: "center",
										marginTop: "5px",
										marginBottom: "10px",
										gap: "5px",
									}}
								>
									<div style={{ width: "70%" }}>
										<RangeControl
											__nextHasNoMarginBottom
											__next40pxDefaultSize
											value={mobileWidth}
											label={null}
											onChange={(value) =>
												setAttributes({
													mobileWidth: value,
												})
											}
											min={0}
										/>
									</div>
									<SelectControl
										label=""
										value={mobileWidthUnit}
										options={gapUnits}
										__nextHasNoMarginBottom
										__next40pxDefaultSize
										onChange={(value) => {
											setAttributes({
												mobileWidthUnit: value,
											});
										}}
									/>
								</div>
							) : null}
						</>
					)}
					{/* Column gap */}

					<InspectorLabel
						title={__("Column gap", "miscellaneous-gutenberg-blocks")}
						defaultValue={layout}
						onChange={(value) => {
							setLayout(value);
							__experimentalSetPreviewDeviceType(
								value == "desktop"
									? "Desktop"
									: value == "tablet"
									? "Tablet"
									: "Mobile",
							);
						}}
					/>
					{layout == "desktop" ? (
						<div
							style={{
								display: "flex",
								width: "100%",
								alignItems: "center",
								marginTop: "5px",
								marginBottom: "10px",
								gap: "5px",
							}}
						>
							<div style={{ width: "70%" }}>
								<RangeControl
									__nextHasNoMarginBottom
									__next40pxDefaultSize
									value={columnGap}
									label={null}
									RangeControl
									onChange={(value) =>
										setAttributes({
											columnGap: value,
										})
									}
									min={0}
									max={100}
								/>
							</div>
							<SelectControl
								label=""
								value={columnGapUnit}
								options={gapUnits}
								__nextHasNoMarginBottom
								__next40pxDefaultSize
								onChange={(value) => {
									setAttributes({
										columnGapUnit: value,
									});
								}}
							/>
						</div>
					) : layout == "tablet" ? (
						<div
							style={{
								display: "flex",
								width: "100%",
								alignItems: "center",
								marginTop: "5px",
								marginBottom: "10px",
								gap: "5px",
							}}
						>
							<div style={{ width: "70%" }}>
								<RangeControl
									__nextHasNoMarginBottom
									__next40pxDefaultSize
									value={tabletColumnGap}
									label={null}
									onChange={(value) => {
										setAttributes({
											tabletColumnGap: value,
										});
									}}
									min={0}
									max={100}
								/>
							</div>
							<SelectControl
								label=""
								value={tabletColumnGapUnit}
								options={gapUnits}
								__nextHasNoMarginBottom
								__next40pxDefaultSize
								onChange={(value) => {
									setAttributes({
										tabletColumnGapUnit: value,
									});
								}}
							/>
						</div>
					) : (
						<div
							style={{
								display: "flex",
								width: "100%",
								alignItems: "center",
								marginTop: "5px",
								marginBottom: "10px",
								gap: "5px",
							}}
						>
							<div style={{ width: "70%" }}>
								<RangeControl
									__nextHasNoMarginBottom
									__next40pxDefaultSize
									value={mobileColumnGap}
									label={null}
									onChange={(value) =>
										setAttributes({
											mobileColumnGap: value,
										})
									}
									min={0}
									max={100}
								/>
							</div>
							<SelectControl
								label=""
								value={mobileColumnGapUnit}
								options={gapUnits}
								__nextHasNoMarginBottom
								__next40pxDefaultSize
								onChange={(value) => {
									setAttributes({
										mobileColumnGapUnit: value,
									});
								}}
							/>
						</div>
					)}
					{/* Row gap */}
					<InspectorLabel
						title={__("Row gap", "miscellaneous-gutenberg-blocks")}
						defaultValue={layout}
						onChange={(value) => {
							setLayout(value);
							__experimentalSetPreviewDeviceType(
								value == "desktop"
									? "Desktop"
									: value == "tablet"
									? "Tablet"
									: "Mobile",
							);
						}}
					/>
					{layout == "desktop" ? (
						<div
							style={{
								display: "flex",
								width: "100%",
								alignItems: "center",
								marginTop: "5px",
								marginBottom: "10px",
								gap: "5px",
							}}
						>
							<div style={{ width: "70%" }}>
								<RangeControl
									__nextHasNoMarginBottom
									__next40pxDefaultSize
									value={rowGap}
									label={null}
									onChange={(value) => {
										setAttributes({
											rowGap: value,
										});
									}}
									min={0}
									max={100}
								/>
							</div>
							<SelectControl
								label=""
								value={rowGapUnit}
								options={gapUnits}
								__nextHasNoMarginBottom
								__next40pxDefaultSize
								onChange={(value) => {
									setAttributes({
										rowGapUnit: value,
									});
								}}
							/>
						</div>
					) : layout == "tablet" ? (
						<div
							style={{
								display: "flex",
								width: "100%",
								alignItems: "center",
								marginTop: "5px",
								marginBottom: "10px",
								gap: "5px",
							}}
						>
							<div style={{ width: "70%" }}>
								<RangeControl
									__nextHasNoMarginBottom
									__next40pxDefaultSize
									value={tabletRowGap}
									label={null}
									onChange={(value) => {
										setAttributes({
											tabletRowGap: value,
										});
									}}
									min={0}
									max={100}
								/>
							</div>
							<SelectControl
								label=""
								value={tabletRowGapUnit}
								options={gapUnits}
								__nextHasNoMarginBottom
								__next40pxDefaultSize
								onChange={(value) => {
									setAttributes({
										tabletRowGapUnit: value,
									});
								}}
							/>
						</div>
					) : (
						<div
							style={{
								display: "flex",
								width: "100%",
								alignItems: "center",
								marginTop: "5px",
								marginBottom: "10px",
								gap: "5px",
							}}
						>
							<div style={{ width: "70%" }}>
								<RangeControl
									__nextHasNoMarginBottom
									__next40pxDefaultSize
									value={mobileRowGap}
									label={null}
									onChange={(value) => {
										setAttributes({
											mobileRowGap: value,
										});
									}}
									min={0}
									max={100}
								/>
							</div>
							<SelectControl
								label=""
								value={mobileRowGapUnit}
								options={gapUnits}
								__nextHasNoMarginBottom
								__next40pxDefaultSize
								onChange={(value) => {
									setAttributes({
										mobileRowGapUnit: value,
									});
								}}
							/>
						</div>
					)}
					{/* Wrap */}
					<InspectorLabel
						title={__("Wrap", "miscellaneous-gutenberg-blocks")}
						defaultValue={layout}
						onChange={(value) => {
							setLayout(value);
							__experimentalSetPreviewDeviceType(
								value == "desktop"
									? "Desktop"
									: value == "tablet"
									? "Tablet"
									: "Mobile",
							);
						}}
					/>
					{layout == "desktop" ? (
						<ToggleGroupControl
							value={wrap}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ wrap: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={""}
								label={__("Not set", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"wrap"}
								label={__("Wrap", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"no-wrap"}
								label={__("No wrap", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					) : layout == "tablet" ? (
						<ToggleGroupControl
							value={tabletWrap}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ tabletWrap: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={""}
								label={__("Not set", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"wrap"}
								label={__("Wrap", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"no-wrap"}
								label={__("No wrap", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					) : (
						<ToggleGroupControl
							value={mobileWrap}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ mobileWrap: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={""}
								label={__("Not set", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"wrap"}
								label={__("Wrap", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"no-wrap"}
								label={__("No wrap", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					)}
					<InspectorLabel
						title={__("Direction", "miscellaneous-gutenberg-blocks")}
						defaultValue={layout}
						onChange={(value) => {
							setLayout(value);
							__experimentalSetPreviewDeviceType(
								value == "desktop"
									? "Desktop"
									: value == "tablet"
									? "Tablet"
									: "Mobile",
							);
						}}
					/>
					{layout == "desktop" ? (
						<ToggleGroupControl
							value={direction}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ direction: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={""}
								label={__("Not set", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"horizontal"}
								label={__("Horizontal", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"vertical"}
								label={__("Vertical", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					) : layout == "tablet" ? (
						<ToggleGroupControl
							value={tabletDirection}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ tabletDirection: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={""}
								label={__("Not set", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"horizontal"}
								label={__("Horizontal", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"vertical"}
								label={__("Vertical", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					) : (
						<ToggleGroupControl
							value={mobileDirection}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ mobileDirection: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={""}
								label={__("Not set", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"horizontal"}
								label={__("Horizontal", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"vertical"}
								label={__("Vertical", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					)}
					<InspectorLabel
						title={__("Reverse", "miscellaneous-gutenberg-blocks")}
						defaultValue={layout}
						onChange={(value) => {
							setLayout(value);
							__experimentalSetPreviewDeviceType(
								value == "desktop"
									? "Desktop"
									: value == "tablet"
									? "Tablet"
									: "Mobile",
							);
						}}
					/>
					{layout == "desktop" ? (
						<ToggleGroupControl
							value={reverse}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ reverse: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={false}
								label={__("Disabled", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={true}
								label={__("Enabled", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					) : layout == "tablet" ? (
						<ToggleGroupControl
							value={tabletReverse}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ tabletReverse: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={false}
								label={__("Disabled", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={true}
								label={__("Enabled", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					) : (
						<ToggleGroupControl
							value={mobileReverse}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ mobileReverse: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={false}
								label={__("Disabled", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={true}
								label={__("Enabled", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					)}
					<InspectorLabel
						title={__("Justify Content", "miscellaneous-gutenberg-blocks")}
						defaultValue={layout}
						onChange={(value) => {
							setLayout(value);
							__experimentalSetPreviewDeviceType(
								value == "desktop"
									? "Desktop"
									: value == "tablet"
									? "Tablet"
									: "Mobile",
							);
						}}
					/>
					{layout == "desktop" ? (
						<ToggleGroupControl
							value={justifyContent}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ justifyContent: value })}
						>
							<ToggleGroupControlOptionIcon
								icon={alignItemsNoneIcon}
								value=""
								label={__("Not set", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={AlignStartVerticalIcon}
								value="flex-start"
								label={__("Flex start", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={AlignEndVerticalIcon}
								value="flex-end"
								label={__("Flex end", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={AlignHorizontalJustifyCenterIcon}
								value="center"
								label={__("Center", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={AlignHorizontalSpaceBetweenIcon}
								value="space-between"
								label={__("Space Between", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={AlignHorizontalSpaceAroundIcon}
								value="space-around"
								label={__("Space Around", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					) : layout == "tablet" ? (
						<ToggleGroupControl
							value={tabletJustifyContent}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) =>
								setAttributes({ tabletJustifyContent: value })
							}
						>
							<ToggleGroupControlOptionIcon
								icon={alignItemsNoneIcon}
								value=""
								label={__("Not set", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={AlignStartVerticalIcon}
								value="flex-start"
								label={__("Flex start", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={AlignEndVerticalIcon}
								value="flex-end"
								label={__("Flex end", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={AlignHorizontalJustifyCenterIcon}
								value="center"
								label={__("Center", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={AlignHorizontalSpaceBetweenIcon}
								value="space-between"
								label={__("Space Between", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={AlignHorizontalSpaceAroundIcon}
								value="space-around"
								label={__("Space Around", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					) : (
						<ToggleGroupControl
							value={mobileJustifyContent}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) =>
								setAttributes({ mobileJustifyContent: value })
							}
						>
							<ToggleGroupControlOptionIcon
								icon={alignItemsNoneIcon}
								value=""
								label={__("Not set", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={AlignStartVerticalIcon}
								value="flex-start"
								label={__("Flex start", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={AlignEndVerticalIcon}
								value="flex-end"
								label={__("Flex end", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={AlignHorizontalJustifyCenterIcon}
								value="center"
								label={__("Center", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={AlignHorizontalSpaceBetweenIcon}
								value="space-between"
								label={__("Space Between", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={AlignHorizontalSpaceAroundIcon}
								value="space-around"
								label={__("Space Around", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					)}
					<InspectorLabel
						title={__("Align items", "miscellaneous-gutenberg-blocks")}
						defaultValue={layout}
						onChange={(value) => {
							setLayout(value);
							__experimentalSetPreviewDeviceType(
								value == "desktop"
									? "Desktop"
									: value == "tablet"
									? "Tablet"
									: "Mobile",
							);
						}}
					/>

					{layout == "desktop" ? (
						<ToggleGroupControl
							value={alignItems}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ alignItems: value })}
						>
							<ToggleGroupControlOptionIcon
								icon={alignItemsNoneIcon}
								value=""
								label={__("Not set", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={alignItemsStartIcon}
								value="flex-start"
								label={__("Flex start", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={alignItemsEndIcon}
								value="flex-end"
								label={__("Flex end", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={alignItemsCenterIcon}
								value="center"
								label={__("Center", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={alignItemsBaselineIcon}
								value="baseline"
								label={__("Baseline", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={alignItemsStretchIcon}
								value="stretch"
								label={__("Stretch", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					) : layout == "tablet" ? (
						<ToggleGroupControl
							value={tabletAlignItems}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ tabletAlignItems: value })}
						>
							<ToggleGroupControlOptionIcon
								icon={alignItemsNoneIcon}
								value=""
								label={__("Not set", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={alignItemsStartIcon}
								value="flex-start"
								label={__("Flex start", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={alignItemsEndIcon}
								value="flex-end"
								label={__("Flex end", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={alignItemsCenterIcon}
								value="center"
								label={__("Center", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={alignItemsBaselineIcon}
								value="baseline"
								label={__("Baseline", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={alignItemsStretchIcon}
								value="stretch"
								label={__("Stretch", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					) : (
						<ToggleGroupControl
							value={mobileAlignItems}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ mobileAlignItems: value })}
						>
							<ToggleGroupControlOptionIcon
								icon={alignItemsNoneIcon}
								value=""
								label={__("Not set", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={alignItemsStartIcon}
								value="flex-start"
								label={__("Flex start", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={alignItemsEndIcon}
								value="flex-end"
								label={__("Flex end", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={alignItemsCenterIcon}
								value="center"
								label={__("Center", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={alignItemsBaselineIcon}
								value="baseline"
								label={__("Baseline", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOptionIcon
								icon={alignItemsStretchIcon}
								value="stretch"
								label={__("Stretch", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					)}
					<InspectorLabel
						title={__("Grow", "miscellaneous-gutenberg-blocks")}
						defaultValue={layout}
						onChange={(value) => {
							setLayout(value);
							__experimentalSetPreviewDeviceType(
								value == "desktop"
									? "Desktop"
									: value == "tablet"
									? "Tablet"
									: "Mobile",
							);
						}}
					/>
					{layout == "desktop" ? (
						<ToggleGroupControl
							value={grow}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ grow: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={""}
								label={__("Not set", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"grow"}
								label={__("On", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"no-grow"}
								label={__("Off", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					) : layout == "tablet" ? (
						<ToggleGroupControl
							value={tabletGrow}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ tabletGrow: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={""}
								label={__("Not set", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"grow"}
								label={__("On", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"no-grow"}
								label={__("Off", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					) : (
						<ToggleGroupControl
							value={mobileGrow}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ mobileGrow: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={""}
								label={__("Not set", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"grow"}
								label={__("On", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"no-grow"}
								label={__("Off", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					)}
					<InspectorLabel
						title={__("Shrink", "miscellaneous-gutenberg-blocks")}
						defaultValue={layout}
						onChange={(value) => {
							setLayout(value);
							__experimentalSetPreviewDeviceType(
								value == "desktop"
									? "Desktop"
									: value == "tablet"
									? "Tablet"
									: "Mobile",
							);
						}}
					/>

					{layout == "desktop" ? (
						<ToggleGroupControl
							value={shrink}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ shrink: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={""}
								label={__("Not set", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"shrink"}
								label={__("On", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"no-shrink"}
								label={__("Off", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					) : layout == "tablet" ? (
						<ToggleGroupControl
							value={tabletShrink}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ tabletShrink: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={""}
								label={__("Not set", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"shrink"}
								label={__("On", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"no-shrink"}
								label={__("Off", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					) : (
						<ToggleGroupControl
							value={mobileShrink}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ mobileShrink: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={""}
								label={__("Not set", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"shrink"}
								label={__("On", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"no-shrink"}
								label={__("Off", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					)}

					<InspectorLabel
						title={__("Display", "miscellaneous-gutenberg-blocks")}
						defaultValue={layout}
						onChange={(value) => {
							setLayout(value);
							__experimentalSetPreviewDeviceType(
								value == "desktop"
									? "Desktop"
									: value == "tablet"
									? "Tablet"
									: "Mobile",
							);
						}}
					/>
					{layout == "desktop" ? (
						<ToggleGroupControl
							value={display}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ display: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={""}
								label={__("Not set", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"flex"}
								label={__("Flex", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"inline-flex"}
								label={__("Inline flex", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"none"}
								label={__("None", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					) : layout == "tablet" ? (
						<ToggleGroupControl
							value={tabletDisplay}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ tabletDisplay: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={""}
								label={__("Not set", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"flex"}
								label={__("Flex", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"inline-flex"}
								label={__("Inline flex", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"none"}
								label={__("None", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					) : (
						<ToggleGroupControl
							value={mobileDisplay}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ mobileDisplay: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={""}
								label={__("Not set", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"flex"}
								label={__("Flex", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"inline-flex"}
								label={__("Inline flex", "miscellaneous-gutenberg-blocks")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={"none"}
								label={__("None", "miscellaneous-gutenberg-blocks")}
							/>
						</ToggleGroupControl>
					)}
				</PanelBody>
			</InspectorControls>
			<div {...innerBlocksProps}></div>
		</>
	);
}
