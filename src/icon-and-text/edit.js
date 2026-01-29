/**
 * WordPress dependencies
 */
import { useEffect, useState } from "react";
import { __ } from "@wordpress/i18n";
import { useDispatch, useSelect, subscribe, select } from "@wordpress/data";
import {
	BlockControls,
	InspectorControls,
	useBlockProps,
	MediaUpload,
	MediaUploadCheck,
} from "@wordpress/block-editor";
import {
	__experimentalToggleGroupControl as ToggleGroupControl,
	__experimentalToggleGroupControlOption as ToggleGroupControlOption,
	Button,
	ToolbarGroup,
	ToolbarButton,
	TextControl,
	PanelBody,
	RangeControl,
	ColorPalette,
} from "@wordpress/components";
import "./editor.scss";

/**
 * External dependencies
 */
import { ArrowRightLeft } from "lucide-react";

/**
 * Internal dependencies
 */
import { InspectorLabel } from "../libs/components/inspector-label";

/**
 * Block edit function
 */
export default function Edit({
	attributes: {
		imageId,
		imageUrl,
		imageName,
		imageContent,
		text,
		reversed,
		tabletReversed,
		mobileReversed,
		stacked,
		tabletStacked,
		mobileStacked,
		gap,
		tabletGap,
		mobileGap,
		imageWidth,
		svgColor,
	},
	setAttributes,
	clientId,
}) {
	const [layout, setLayout] = useState("desktop");
	useEffect(() => {
		if (imageUrl && /\.svg($|\?)/i.test(imageUrl)) {
			fetch(imageUrl)
				.then((response) => response.text())
				.then((svgText) => {
					setAttributes({ imageContent: svgText });
				})
				.catch((error) => {
					console.error("Error fetching SVG:", error);
				});
		}
		subscribe(() => {
			const newDeviceType = select("core/editor").getDeviceType();

			if (newDeviceType !== previousDeviceType) {
				setLayout(newDeviceType?.toLowerCase());
				previousDeviceType = newDeviceType;
			}
		});
	}, [imageUrl]);
	let previousDeviceType = select("core/editor").getDeviceType();

	let __experimentalSetPreviewDeviceType = (device) => {};
	const siteEditor = useDispatch("core/edit-site");
	if (siteEditor) {
		__experimentalSetPreviewDeviceType =
			siteEditor.__experimentalSetPreviewDeviceType;
	}
	const innerBlockCount = useSelect(
		(select) => select("core/block-editor").getBlocks(clientId).length,
		[clientId],
	);

	const classNames = [];
	if (innerBlockCount == 1) {
		classNames.push("block-booster-icon-and-text--single-child");
	}

	if (reversed) {
		classNames.push("block-booster-icon-and-text--is-reversed");
	}
	if (tabletReversed) {
		classNames.push("block-booster-icon-and-text--tablet-is-reversed");
	}
	if (mobileReversed) {
		classNames.push("block-booster-icon-and-text--mobile-is-reversed");
	}
	if (stacked) {
		classNames.push("block-booster-icon-and-text--is-stacked");
	}
	if (tabletStacked) {
		classNames.push("block-booster-icon-and-text--tablet-is-stacked");
	}
	if (mobileStacked) {
		classNames.push("block-booster-icon-and-text--mobile-is-stacked");
	}
	const blockProps = useBlockProps({
		className: classNames.join(" "),
		style: {
			gap:
				layout == "desktop" ? gap : layout == "tablet" ? tabletGap : mobileGap,
		},
	});

	const onImageSelect = (media) => {
		if (!media || !media.url) {
			setAttributes({ imageId: 0, imageUrl: "", imageName: "" });
			return;
		}
		setAttributes({
			imageId: media.id,
			imageUrl: media.url,
			imageName: media.title || media.filename, // Use title or filename
		});
	};
	const removeImage = () => {
		setAttributes({ imageId: 0, imageUrl: "", imageName: "" });
	};
	const ArrowRightLeftIcon = (
		<ArrowRightLeft fill="white" className="svg-no-fill" />
	);
	return (
		<>
			<BlockControls>
				<ToolbarGroup>
					<ToolbarButton
						label={__("Reverse", "block-booster")}
						icon={ArrowRightLeftIcon}
						isPressed={reversed}
						onClick={() => {
							setAttributes({ reversed: !reversed });
						}}
					/>
				</ToolbarGroup>
			</BlockControls>
			<InspectorControls>
				<PanelBody title={__("Settings", "block-booster")}>
					<div style={{ marginTop: "10px", marginBottom: "10px" }}>
						<InspectorLabel
							title={__("Image width", "block-booster")}
							hideLayoutButton={true}
						/>
					</div>
					<RangeControl
						__nextHasNoMarginBottom
						__next40pxDefaultSize
						value={imageWidth}
						label={null}
						onChange={(value) =>
							setAttributes({
								imageWidth: value,
							})
						}
						min={0}
						max={500}
					/>
					<TextControl
						__nextHasNoMarginBottom
						__next40pxDefaultSize
						label={__("Add text", "block-booster")}
						value={text}
						onChange={(value) =>
							setAttributes({
								text: value,
							})
						}
					/>
					<InspectorLabel
						title={__("Gap", "block-booster")}
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
						<RangeControl
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							value={gap}
							label={null}
							onChange={(value) =>
								setAttributes({
									gap: value,
								})
							}
							min={0}
							max={100}
						/>
					) : layout == "tablet" ? (
						<RangeControl
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							value={tabletGap}
							label={null}
							onChange={(value) =>
								setAttributes({
									tabletGap: value,
								})
							}
							min={0}
							max={100}
						/>
					) : (
						<RangeControl
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							value={mobileGap}
							label={null}
							onChange={(value) =>
								setAttributes({
									mobileGap: value,
								})
							}
							min={0}
							max={100}
						/>
					)}
					<InspectorLabel
						title={__("Reverse", "block-booster")}
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
							value={reversed}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ reversed: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={true}
								label={__("Enabled", "block-booster")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={false}
								label={__("Disabled", "block-booster")}
							/>
						</ToggleGroupControl>
					) : layout == "tablet" ? (
						<ToggleGroupControl
							value={tabletReversed}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ tabletReversed: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={true}
								label={__("Enabled", "block-booster")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={false}
								label={__("Disabled", "block-booster")}
							/>
						</ToggleGroupControl>
					) : (
						<ToggleGroupControl
							value={mobileReversed}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ mobileReversed: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={true}
								label={__("Enabled", "block-booster")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={false}
								label={__("Disabled", "block-booster")}
							/>
						</ToggleGroupControl>
					)}
					<InspectorLabel
						title={__("Stacked", "block-booster")}
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
							value={stacked}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ stacked: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={true}
								label={__("Enabled", "block-booster")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={false}
								label={__("Disabled", "block-booster")}
							/>
						</ToggleGroupControl>
					) : layout == "tablet" ? (
						<ToggleGroupControl
							value={tabletStacked}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ tabletStacked: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={true}
								label={__("Enabled", "block-booster")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={false}
								label={__("Disabled", "block-booster")}
							/>
						</ToggleGroupControl>
					) : (
						<ToggleGroupControl
							value={mobileStacked}
							isBlock={true}
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={(value) => setAttributes({ mobileStacked: value })}
						>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={true}
								label={__("Enabled", "block-booster")}
							/>
							<ToggleGroupControlOption
								isAdaptiveWidth={true}
								value={false}
								label={__("Disabled", "block-booster")}
							/>
						</ToggleGroupControl>
					)}
					<MediaUploadCheck>
						<MediaUpload
							allowedTypes={["image"]}
							multiple={false}
							value={imageId}
							onSelect={onImageSelect}
							render={({ open }) => (
								<div
									style={{
										display: "flex",
										flexDirection: "column",
										justifyContent: "center",
										alignItems: "center",
										width: "100%",
									}}
								>
									{imageUrl ? (
										<>
											<img
												src={imageUrl}
												alt={imageName}
												style={{ width: "150px" }}
											/>
											<Button
												isDestructive
												variant="secondary"
												onClick={removeImage}
											>
												{__("Remove Image", "block-booster")}
											</Button>
										</>
									) : (
										<div
											style={{
												display: "flex",
												flexDirection: "column",
												justifyContent: "center",
												alignItems: "center",
												width: "100%",
											}}
										>
											<Button variant="primary" onClick={open}>
												{__("Upload or Select Image", "block-booster")}
											</Button>
										</div>
									)}
								</div>
							)}
						/>
					</MediaUploadCheck>
					<div style={{ marginTop: "10px", marginBottom: "10px" }}>
						<InspectorLabel
							title={__("SVG color", "block-booster")}
							hideLayoutButton={true}
						/>
					</div>
					<ColorPalette
						asButtons={true}
						clearable={true}
						width="100%"
						value={svgColor}
						onChange={(color) => setAttributes({ svgColor: color })}
					/>
				</PanelBody>
			</InspectorControls>
			<div {...blockProps}>
				{imageUrl &&
					(/\.svg($|\?)/i.test(imageUrl) ? (
						<div className="block-booster-icon-and-text--left">
							<span
								style={{
									color: svgColor,
									width: `${imageWidth}px`,
									display: "inline-block",
								}}
								dangerouslySetInnerHTML={{ __html: imageContent }}
							></span>
						</div>
					) : (
						<div className="block-booster-icon-and-text--left">
							<img
								style={{ width: `${imageWidth}px` }}
								src={imageUrl}
								alt={imageName}
							/>
						</div>
					))}
				<div className="block-booster-icon-and-text--right">{text}</div>
			</div>
		</>
	);
}
