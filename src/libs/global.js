import { useState } from "react";
import { desktop, tablet, mobile } from "@wordpress/icons"; // For the plus icon

// export const InspectorLabel = ({ title, onChange, defaultValue }) => {
// 	const [currentVariant, setVariant] = useState(defaultValue ?? "desktop");
// 	const currentIcon =
// 		defaultValue == "desktop"
// 			? desktop
// 			: defaultValue == "tablet"
// 			? tablet
// 			: mobile;
// 	const variants = ["Desktop", "Tablet", "Mobile"];
// 	return (
// 		<div className="flexbox-inspector-label">
// 			<label className="components-base-control__label">{title}</label>
// 			<div className="layout-buttons-container">
// 				<button className="layout-button">{currentIcon}</button>
// 				<div className="layout-buttons">
// 					<div className="layout-button-variants">
// 						{variants.map((variant) => {
// 							const name = variant.toLowerCase();

// 							const icon =
// 								name == "desktop"
// 									? desktop
// 									: name == "tablet"
// 									? tablet
// 									: mobile;
// 							return (
// 								<button
// 									className="layout-button"
// 									data-selected={name == currentVariant}
// 									title={variant}
// 									onClick={() => {
// 										if (onChange) {
// 											onChange(name);
// 											setVariant(name);
// 										}
// 									}}
// 								>
// 									{icon}
// 								</button>
// 							);
// 						})}
// 					</div>
// 				</div>
// 			</div>
// 		</div>
// 	);
// };
export const generateTemplate = (number) => {
	const innerBlocksAttributes = {
		column: 1,
		width: 100 / number,
		tablet_width: 50,
		mobile_width: 100,
	};
	const templates = [];
	for (let index = 0; index < number; index++) {
		templates.push(["misc-gutenberg-blocks/box", innerBlocksAttributes]);
	}
	return templates;
};

export const numberRange = (start, end) => {
	const startNum = Number(start);
	const endNum = Number(end);
	return Array.from({ length: endNum - startNum + 1 }, (_, i) => startNum + i);
};

export const gapUnits = [
	{
		value: "px",
		label: "px",
	},
	{
		value: "%",
		label: "%",
	},
	{
		value: "em",
		label: "em",
	},
	{
		value: "rem",
		label: "rem",
	},
	{
		value: "vw",
		label: "vw",
	},
	{
		value: "vh",
		label: "vh",
	},
];
export const getFileExtension = (filename) => {
	// Use a regular expression to find the last dot and everything after it.
	const regex = /(?:\.([^.]+))?$/;
	const match = regex.exec(filename);

	// If a match is found, return the extension, otherwise return null.
	if (match && match[1]) {
		return match[1].toLowerCase();
	} else {
		return null;
	}
};
