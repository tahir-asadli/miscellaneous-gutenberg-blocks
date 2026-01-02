/**
 * WordPress dependencies
 */
import {
	__experimentalToggleGroupControl as ToggleGroupControl,
	__experimentalToggleGroupControlOption as ToggleGroupControlOption,
	PanelBody,
	TextControl,
	RangeControl,
	ResizableBox,
} from "@wordpress/components";
import { InspectorControls, useBlockProps } from "@wordpress/block-editor";
import { __ } from "@wordpress/i18n";
import "./editor.scss";

/**
 * Block edit function
 */
export default function Edit({
	attributes,
	setAttributes,
	toggleSelection,
	isSelected,
}) {
	const classNames = [];
	if (!attributes.disableCSS) {
		classNames.push("has-style");
	}
	if (attributes.showSearchIcon) {
		classNames.push("show-search-icon");
	}
	if (attributes.showCategory) {
		classNames.push("show-category");
	}
	const blockProps = useBlockProps({
		className: classNames.join(" "),
		style: {
			height: attributes.height > 0 ? `${attributes.height}px` : undefined,
			width: attributes.width > 0 ? `${attributes.width}px` : undefined,
		},
	});

	return (
		<>
			<InspectorControls>
				<PanelBody title={__("Settings", "miscellaneous-gutenberg-blocks")}>
					<ToggleGroupControl
						label={__("Category selector", "miscellaneous-gutenberg-blocks")}
						value={attributes.showCategory}
						isBlock={true}
						__nextHasNoMarginBottom
						onChange={(value) => setAttributes({ showCategory: value })}
					>
						<ToggleGroupControlOption
							isAdaptiveWidth={true}
							value={true}
							label={__("Show", "miscellaneous-gutenberg-blocks")}
						/>
						<ToggleGroupControlOption
							isAdaptiveWidth={true}
							value={false}
							label={__("Hide", "miscellaneous-gutenberg-blocks")}
						/>
					</ToggleGroupControl>
					<ToggleGroupControl
						label={__("Show search icon", "miscellaneous-gutenberg-blocks")}
						value={attributes.showSearchIcon}
						isBlock={true}
						__nextHasNoMarginBottom
						onChange={(value) => setAttributes({ showSearchIcon: value })}
					>
						<ToggleGroupControlOption
							isAdaptiveWidth={true}
							value={true}
							label={__("Show", "miscellaneous-gutenberg-blocks")}
						/>
						<ToggleGroupControlOption
							isAdaptiveWidth={true}
							value={false}
							label={__("Hide", "miscellaneous-gutenberg-blocks")}
						/>
					</ToggleGroupControl>
					<ToggleGroupControl
						label={__("Disable CSS", "miscellaneous-gutenberg-blocks")}
						value={attributes.disableCSS}
						isBlock={true}
						__nextHasNoMarginBottom
						onChange={(value) => setAttributes({ disableCSS: value })}
					>
						<ToggleGroupControlOption
							isAdaptiveWidth={true}
							value={true}
							label={__("Yes", "miscellaneous-gutenberg-blocks")}
						/>
						<ToggleGroupControlOption
							isAdaptiveWidth={true}
							value={false}
							label={__("No", "miscellaneous-gutenberg-blocks")}
						/>
					</ToggleGroupControl>
					<TextControl
						label={__("Search placeholder", "miscellaneous-gutenberg-blocks")}
						value={attributes.searchPlaceholder}
						onChange={(value) => setAttributes({ searchPlaceholder: value })}
					/>
					<TextControl
						label={__("Category text", "miscellaneous-gutenberg-blocks")}
						value={attributes.categoryText}
						onChange={(value) => setAttributes({ categoryText: value })}
					/>
					<TextControl
						label={__("Button text", "miscellaneous-gutenberg-blocks")}
						value={attributes.buttonText}
						onChange={(value) => setAttributes({ buttonText: value })}
					/>
					<RangeControl
						label={__("Height", "miscellaneous-gutenberg-blocks")}
						__nextHasNoMarginBottom
						__next40pxDefaultSize
						value={attributes.height}
						onChange={(value) =>
							setAttributes({
								height: value,
							})
						}
						min={0}
						max={100}
					/>
					<RangeControl
						label={__("Width", "miscellaneous-gutenberg-blocks")}
						__nextHasNoMarginBottom
						__next40pxDefaultSize
						value={attributes.width}
						onChange={(value) =>
							setAttributes({
								width: value,
							})
						}
						min={0}
						max={500}
					/>
				</PanelBody>
			</InspectorControls>
			<ResizableBox
				size={{
					height: attributes.height > 0 ? attributes.height : undefined,
					width: attributes.width > 0 ? attributes.width : undefined,
				}}
				__experimentalShowTooltip={true}
				minHeight="50"
				minWidth="50"
				enable={{
					top: false,
					right: true,
					bottom: true,
					left: false,
					topRight: false,
					bottomRight: true,
					bottomLeft: false,
					topLeft: false,
				}}
				onResizeStop={(event, direction, elt, delta) => {
					setAttributes({
						height: attributes.height + delta.height,
						width: attributes.width + delta.width,
					});
					toggleSelection(true);
				}}
				onResizeStart={() => {
					toggleSelection(false);
				}}
				showHandle={isSelected}
			>
				<div {...blockProps}>
					{attributes.showCategory && (
						<select name="cat" class="search-category">
							{attributes.categoryText && (
								<option value="">{attributes.categoryText}</option>
							)}
						</select>
					)}

					<input
						name="s"
						type="search"
						class="search-input"
						placeholder={attributes.searchPlaceholder}
					/>
					<button type="submit" class="search-button">
						{attributes.showSearchIcon ? (
							<span dangerouslySetInnerHTML={{ __html: "&nbsp;" }} />
						) : (
							attributes.buttonText
						)}
					</button>
				</div>
			</ResizableBox>
		</>
	);
}
