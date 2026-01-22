/*
 * WordPress Dependencies
 */
import {
	useBlockProps,
	InspectorControls,
	MediaUpload,
	MediaUploadCheck,
} from "@wordpress/block-editor";
import {
	PanelBody,
	TextControl,
	RangeControl,
	ToggleControl,
	Button,
	SelectControl,
	ResizableBox,
	__experimentalToggleGroupControl as ToggleGroupControl,
	__experimentalToggleGroupControlOption as ToggleGroupControlOption,
} from "@wordpress/components";
import { useSelect } from "@wordpress/data";
import { __ } from "@wordpress/i18n";

/*
 * Internal  Dependencies
 */
import "./editor.scss";
import { useEffect, useState } from "react";
import { getFileExtension } from "../libs/global";

export default function Edit({
	attributes,
	setAttributes,
	isSelected,
	toggleSelection,
}) {
	const [options, setOptions] = useState([]);
	const classNames = [];
	if (attributes.vertical) {
		classNames.push("wp-block-block-booster-category-card--vertical");
	}
	if (attributes.disableCSS === "true") {
		classNames.push("wp-block-block-booster-category-card--no-css");
	}

	const blockProps = useBlockProps({
		className: classNames.join(" "),
		style: {
			gap: attributes.gap ? `${attributes.gap}px` : 0,
		},
	});

	const { allCategories, hasResolved } = useSelect((select) => {
		const selectorArgs = ["taxonomy", "category", { per_page: -1 }];
		return {
			allCategories: select("core").getEntityRecords(...selectorArgs),
			hasResolved: select("core").hasFinishedResolution(
				"getEntityRecords",
				selectorArgs,
			),
		};
	}, []);
	useEffect(() => {
		if (!hasResolved) return;
		if (attributes.categoryId) {
			const selectedCategory = allCategories?.filter(
				(cat) => cat.id === attributes.categoryId,
			);
			if (selectedCategory && selectedCategory.length) {
				setAttributes({
					categoryId: selectedCategory[0].id,
					categoryName: selectedCategory[0].name,
					categoryCount: selectedCategory[0].count,
					categoryUrl: selectedCategory[0].link,
				});
			}
		}
		setOptions(
			allCategories
				? allCategories.map((category) => ({
						label: category.name,
						value: category.id,
				  }))
				: [],
		);
	}, [allCategories, hasResolved]);

	const onCategorySelect = (categoryId) => {
		const category = allCategories?.filter(
			(category) => category.id === Number(categoryId),
		);

		if (category && category.length) {
			setAttributes({
				categoryId: category[0].id,
				categoryName: category[0].name,
				categoryCount: category[0].count,
				categoryUrl: category[0].link,
			});
		}
	};

	const onImageSelect = (media) => {
		if (!media || !media.url) {
			setAttributes({ imageId: 0, imageUrl: "", imageName: "" });
		} else {
			setAttributes({
				imageId: media.id,
				imageUrl:
					media.sizes?.full?.url ?? media.sizes?.thumbnail?.url ?? media.url,
				imageName: media.title || media.filename || "",
			});
		}
	};
	const removeImage = () => {
		setAttributes({ imageId: 0, imageUrl: "", imageName: "" });
	};
	return (
		<>
			<InspectorControls>
				<PanelBody title={__("Settings", "block-booster")}>
					<ToggleGroupControl
						label={__("Disable CSS", "block-booster")}
						value={attributes.disableCSS}
						isBlock={true}
						__nextHasNoMarginBottom
						onChange={(value) => setAttributes({ disableCSS: value })}
					>
						<ToggleGroupControlOption
							isAdaptiveWidth={true}
							value={"true"}
							label={__("Yes", "block-booster")}
						/>
						<ToggleGroupControlOption
							isAdaptiveWidth={true}
							value={"false"}
							label={__("No", "block-booster")}
						/>
					</ToggleGroupControl>
					<SelectControl
						__nextHasNoMarginBottom
						__next40pxDefaultSize
						width="100%"
						label={__("Select an option", "block-booster")}
						value={attributes.categoryId}
						options={options}
						onChange={onCategorySelect}
					/>
					<TextControl
						__nextHasNoMarginBottom
						__next40pxDefaultSize
						label={__("Singular post label", "block-booster")}
						value={attributes.postNameSingular}
						onChange={(value) => {
							setAttributes({ postNameSingular: value });
						}}
					/>
					<TextControl
						__nextHasNoMarginBottom
						__next40pxDefaultSize
						label={__("Plural post label", "block-booster")}
						value={attributes.postNamePlural}
						onChange={(value) => {
							setAttributes({ postNamePlural: value });
						}}
					/>
					<ToggleControl
						style={{ marginBottom: "15px" }}
						label={__("Link to Post", "block-booster")}
						__next40pxDefaultSize
						checked={attributes.isLink}
						onChange={(value) => {
							setAttributes({ isLink: value });
						}}
					/>
					<ToggleControl
						style={{ marginBottom: "15px" }}
						label={__("Is vertical", "block-booster")}
						__next40pxDefaultSize
						checked={attributes.vertical}
						onChange={(value) => {
							setAttributes({ vertical: value });
						}}
					/>
					<RangeControl
						__nextHasNoMarginBottom
						__next40pxDefaultSize
						value={attributes.gap}
						label={null}
						onChange={(value) =>
							setAttributes({
								gap: value,
							})
						}
						min={0}
						max={100}
					/>

					<MediaUploadCheck>
						<MediaUpload
							allowedTypes={["image"]}
							multiple={false}
							value={attributes.imageId}
							onSelect={onImageSelect}
							render={({ open }) => (
								<div
									className={`block-booster-media-and-text--left ${
										attributes.imageUrl ? "has-image" : "has-no-image"
									}`}
								>
									{attributes.imageUrl ? (
										<>
											<img
												src={attributes.imageUrl}
												alt={attributes.imageName}
												style={{ width: "100%" }}
											/>
											<div className="block-booster-media-and-text-button-container">
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
				</PanelBody>
			</InspectorControls>
			<div {...blockProps}>
				<div className="wp-block-block-booster-category-card--left">
					<ResizableBox
						size={{
							width:
								attributes.imageWidth > 0 ? attributes.imageWidth : undefined,
							height:
								attributes.imageWidth > 0 ? attributes.imageWidth : undefined,
						}}
						__experimentalShowTooltip={true}
						minHeight="50"
						enable={{
							top: false,
							right: true,
							bottom: false,
							left: false,
							topRight: false,
							bottomRight: false,
							bottomLeft: false,
							topLeft: false,
						}}
						onResizeStop={(event, direction, elt, delta) => {
							const currentWidth = Number(attributes.imageWidth || 0);
							const imageWidth = currentWidth + delta.width;
							if (imageWidth > 0) {
								setAttributes({
									imageWidth,
								});
							}
							toggleSelection(true);
						}}
						onResizeStart={() => {
							toggleSelection(false);
						}}
						showHandle={isSelected}
					>
						<span
							style={{
								width: attributes.imageWidth,
								height: attributes.imageWidth,
								borderRadius: attributes.imageWidth,
							}}
							className={`wp-block-block-booster-category-card--image-wrapper wp-block-block-booster-category-card--type-${getFileExtension(
								attributes.imageUrl,
							)}`}
						>
							{attributes.imageId ? (
								<img alt={attributes.imageName} src={attributes.imageUrl} />
							) : null}
						</span>
					</ResizableBox>
				</div>
				<div className="wp-block-block-booster-category-card--right">
					<span className="wp-block-block-booster-category-card--name">
						{attributes.categoryName}
					</span>
					<span className="wp-block-block-booster-category-card--count">
						{attributes.categoryCount}{" "}
						{attributes.categoryCount !== 1
							? attributes.postNamePlural
							: attributes.postNameSingular}
					</span>
				</div>
			</div>
		</>
	);
}
