/**
 * WordPress dependencies
 */
import { useDispatch, useSelect, subscribe, select } from "@wordpress/data";
import {
	InnerBlocks,
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
	PanelBody,
	RangeControl,
} from "@wordpress/components";
import { __ } from "@wordpress/i18n";

import "./editor.scss";

/**
 * External dependencies
 */
import { ArrowRightLeft } from "lucide-react";
import { useState } from "react";

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
		reversed,
		tabletReversed,
		mobileReversed,
		stacked,
		tabletStacked,
		mobileStacked,
		gap,
		tabletGap,
		mobileGap,
	},
	setAttributes,
	clientId,
}) {
	const [layout, setLayout] = useState("desktop");
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
		classNames.push("block-booster-media-and-text--single-child");
	}

	if (reversed) {
		classNames.push("block-booster-media-and-text--is-reversed");
	}
	if (tabletReversed) {
		classNames.push("block-booster-media-and-text--tablet-is-reversed");
	}
	if (mobileReversed) {
		classNames.push("block-booster-media-and-text--mobile-is-reversed");
	}
	if (stacked) {
		classNames.push("block-booster-media-and-text--is-stacked");
	}
	if (tabletStacked) {
		classNames.push("block-booster-media-and-text--tablet-is-stacked");
	}
	if (mobileStacked) {
		classNames.push("block-booster-media-and-text--mobile-is-stacked");
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
				</PanelBody>
			</InspectorControls>
			<div {...blockProps}>
				<MediaUploadCheck>
					<MediaUpload
						allowedTypes={["image"]}
						multiple={false}
						value={imageId}
						onSelect={onImageSelect}
						render={({ open }) => (
							<div
								class={`block-booster-media-and-text--left ${
									imageUrl ? "has-image" : "has-no-image"
								}`}
							>
								{imageUrl ? (
									<>
										<img src={imageUrl} alt={imageName} />
										<div class="block-booster-media-and-text-button-container">
											<Button
												isDestructive
												variant="secondary"
												onClick={removeImage}
											>
												{__("Remove Image", "block-booster")}
											</Button>
										</div>
									</>
								) : (
									<Button variant="primary" onClick={open}>
										{__("Upload or Select Image", "block-booster")}
									</Button>
								)}
							</div>
						)}
					/>
				</MediaUploadCheck>
				<div class="block-booster-media-and-text--right">
					<div>
						<InnerBlocks />
					</div>
				</div>
			</div>
		</>
	);
}
