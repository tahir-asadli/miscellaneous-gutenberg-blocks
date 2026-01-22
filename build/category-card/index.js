/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/category-card/block.json":
/*!**************************************!*\
  !*** ./src/category-card/block.json ***!
  \**************************************/
/***/ ((module) => {

module.exports = /*#__PURE__*/JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":3,"name":"block-booster/category-card","version":"0.1.0","title":"Category card","category":"block-booster","description":"Category card.","example":{},"supports":{"html":false,"color":{"background":true,"text":true},"typography":{"fontSize":true,"lineHeight":true,"textAlign":true},"background":{"backgroundSize":true},"spacing":{"margin":true,"padding":true,"blockGap":true},"shadow":true},"attributes":{"disableCSS":{"type":"string","default":"false"},"imageId":{"type":"number","default":0},"imageUrl":{"type":"string","default":""},"imageName":{"type":"string","default":""},"imageWidth":{"type":"number","default":64},"categoryId":{"type":"number","default":0},"categoryCount":{"type":"number","default":0},"categoryUrl":{"type":"string","default":""},"categoryName":{"type":"string","default":""},"postNameSingular":{"type":"string","default":""},"postNamePlural":{"type":"string","default":""},"isLink":{"type":"boolean","default":true},"vertical":{"type":"boolean","default":false},"gap":{"type":"number","default":20}},"textdomain":"block-booster","editorScript":"file:./index.js","editorStyle":"file:./index.css","style":"file:./style-index.css","render":"file:./render.php"}');

/***/ }),

/***/ "./src/category-card/edit.js":
/*!***********************************!*\
  !*** ./src/category-card/edit.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Edit)
/* harmony export */ });
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./editor.scss */ "./src/category-card/editor.scss");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _libs_global__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../libs/global */ "./src/libs/global.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__);
/*
 * WordPress Dependencies
 */





/*
 * Internal  Dependencies
 */




function Edit({
  attributes,
  setAttributes,
  isSelected,
  toggleSelection
}) {
  const [options, setOptions] = (0,react__WEBPACK_IMPORTED_MODULE_5__.useState)([]);
  const classNames = [];
  if (attributes.vertical) {
    classNames.push("wp-block-block-booster-category-card--vertical");
  }
  if (attributes.disableCSS === "true") {
    classNames.push("wp-block-block-booster-category-card--no-css");
  }
  const blockProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__.useBlockProps)({
    className: classNames.join(" "),
    style: {
      gap: attributes.gap ? `${attributes.gap}px` : 0
    }
  });
  const {
    allCategories,
    hasResolved
  } = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_2__.useSelect)(select => {
    const selectorArgs = ["taxonomy", "category", {
      per_page: -1
    }];
    return {
      allCategories: select("core").getEntityRecords(...selectorArgs),
      hasResolved: select("core").hasFinishedResolution("getEntityRecords", selectorArgs)
    };
  }, []);
  (0,react__WEBPACK_IMPORTED_MODULE_5__.useEffect)(() => {
    if (!hasResolved) return;
    if (attributes.categoryId) {
      const selectedCategory = allCategories?.filter(cat => cat.id === attributes.categoryId);
      if (selectedCategory && selectedCategory.length) {
        setAttributes({
          categoryId: selectedCategory[0].id,
          categoryName: selectedCategory[0].name,
          categoryCount: selectedCategory[0].count,
          categoryUrl: selectedCategory[0].link
        });
      }
    }
    setOptions(allCategories ? allCategories.map(category => ({
      label: category.name,
      value: category.id
    })) : []);
  }, [allCategories, hasResolved]);
  const onCategorySelect = categoryId => {
    const category = allCategories?.filter(category => category.id === Number(categoryId));
    if (category && category.length) {
      setAttributes({
        categoryId: category[0].id,
        categoryName: category[0].name,
        categoryCount: category[0].count,
        categoryUrl: category[0].link
      });
    }
  };
  const onImageSelect = media => {
    if (!media || !media.url) {
      setAttributes({
        imageId: 0,
        imageUrl: "",
        imageName: ""
      });
    } else {
      var _ref, _media$sizes$full$url;
      setAttributes({
        imageId: media.id,
        imageUrl: (_ref = (_media$sizes$full$url = media.sizes?.full?.url) !== null && _media$sizes$full$url !== void 0 ? _media$sizes$full$url : media.sizes?.thumbnail?.url) !== null && _ref !== void 0 ? _ref : media.url,
        imageName: media.title || media.filename || ""
      });
    }
  };
  const removeImage = () => {
    setAttributes({
      imageId: 0,
      imageUrl: "",
      imageName: ""
    });
  };
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsxs)(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.Fragment, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsx)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__.InspectorControls, {
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.PanelBody, {
        title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Settings", "block-booster"),
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.__experimentalToggleGroupControl, {
          label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Disable CSS", "block-booster"),
          value: attributes.disableCSS,
          isBlock: true,
          __nextHasNoMarginBottom: true,
          onChange: value => setAttributes({
            disableCSS: value
          }),
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.__experimentalToggleGroupControlOption, {
            isAdaptiveWidth: true,
            value: "true",
            label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Yes", "block-booster")
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.__experimentalToggleGroupControlOption, {
            isAdaptiveWidth: true,
            value: "false",
            label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("No", "block-booster")
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.SelectControl, {
          __nextHasNoMarginBottom: true,
          __next40pxDefaultSize: true,
          width: "100%",
          label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Select an option", "block-booster"),
          value: attributes.categoryId,
          options: options,
          onChange: onCategorySelect
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.TextControl, {
          __nextHasNoMarginBottom: true,
          __next40pxDefaultSize: true,
          label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Singular post label", "block-booster"),
          value: attributes.postNameSingular,
          onChange: value => {
            setAttributes({
              postNameSingular: value
            });
          }
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.TextControl, {
          __nextHasNoMarginBottom: true,
          __next40pxDefaultSize: true,
          label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Plural post label", "block-booster"),
          value: attributes.postNamePlural,
          onChange: value => {
            setAttributes({
              postNamePlural: value
            });
          }
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.ToggleControl, {
          style: {
            marginBottom: "15px"
          },
          label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Link to Post", "block-booster"),
          __next40pxDefaultSize: true,
          checked: attributes.isLink,
          onChange: value => {
            setAttributes({
              isLink: value
            });
          }
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.ToggleControl, {
          style: {
            marginBottom: "15px"
          },
          label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Is vertical", "block-booster"),
          __next40pxDefaultSize: true,
          checked: attributes.vertical,
          onChange: value => {
            setAttributes({
              vertical: value
            });
          }
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.RangeControl, {
          __nextHasNoMarginBottom: true,
          __next40pxDefaultSize: true,
          value: attributes.gap,
          label: null,
          onChange: value => setAttributes({
            gap: value
          }),
          min: 0,
          max: 100
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsx)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__.MediaUploadCheck, {
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsx)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__.MediaUpload, {
            allowedTypes: ["image"],
            multiple: false,
            value: attributes.imageId,
            onSelect: onImageSelect,
            render: ({
              open
            }) => /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsx)("div", {
              className: `block-booster-media-and-text--left ${attributes.imageUrl ? "has-image" : "has-no-image"}`,
              children: attributes.imageUrl ? /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsxs)(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.Fragment, {
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsx)("img", {
                  src: attributes.imageUrl,
                  alt: attributes.imageName,
                  style: {
                    width: "100%"
                  }
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsx)("div", {
                  className: "block-booster-media-and-text-button-container",
                  children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Button, {
                    isDestructive: true,
                    variant: "secondary",
                    onClick: removeImage,
                    children: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Remove Image", "block-booster")
                  })
                })]
              }) : /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Button, {
                variant: "primary",
                onClick: open,
                children: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Upload or Select Image", "block-booster")
              })
            })
          })
        })]
      })
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsxs)("div", {
      ...blockProps,
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsx)("div", {
        className: "wp-block-block-booster-category-card--left",
        children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.ResizableBox, {
          size: {
            width: attributes.imageWidth > 0 ? attributes.imageWidth : undefined,
            height: attributes.imageWidth > 0 ? attributes.imageWidth : undefined
          },
          __experimentalShowTooltip: true,
          minHeight: "50",
          enable: {
            top: false,
            right: true,
            bottom: false,
            left: false,
            topRight: false,
            bottomRight: false,
            bottomLeft: false,
            topLeft: false
          },
          onResizeStop: (event, direction, elt, delta) => {
            const currentWidth = Number(attributes.imageWidth || 0);
            const imageWidth = currentWidth + delta.width;
            if (imageWidth > 0) {
              setAttributes({
                imageWidth
              });
            }
            toggleSelection(true);
          },
          onResizeStart: () => {
            toggleSelection(false);
          },
          showHandle: isSelected,
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsx)("span", {
            style: {
              width: attributes.imageWidth,
              height: attributes.imageWidth,
              borderRadius: attributes.imageWidth
            },
            className: `wp-block-block-booster-category-card--image-wrapper wp-block-block-booster-category-card--type-${(0,_libs_global__WEBPACK_IMPORTED_MODULE_6__.getFileExtension)(attributes.imageUrl)}`,
            children: attributes.imageId ? /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsx)("img", {
              alt: attributes.imageName,
              src: attributes.imageUrl
            }) : null
          })
        })
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsxs)("div", {
        className: "wp-block-block-booster-category-card--right",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsx)("span", {
          className: "wp-block-block-booster-category-card--name",
          children: attributes.categoryName
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_7__.jsxs)("span", {
          className: "wp-block-block-booster-category-card--count",
          children: [attributes.categoryCount, " ", attributes.categoryCount !== 1 ? attributes.postNamePlural : attributes.postNameSingular]
        })]
      })]
    })]
  });
}

/***/ }),

/***/ "./src/category-card/editor.scss":
/*!***************************************!*\
  !*** ./src/category-card/editor.scss ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/category-card/icon.svg":
/*!************************************!*\
  !*** ./src/category-card/icon.svg ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   ReactComponent: () => (/* binding */ SvgIcon),
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
var _path;
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }

var SvgIcon = function SvgIcon(props) {
  return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("svg", _extends({
    xmlns: "http://www.w3.org/2000/svg",
    width: 200,
    height: 200,
    fill: "none",
    stroke: "currentColor",
    strokeLinecap: "round",
    strokeLinejoin: "round",
    strokeWidth: 2,
    className: "icon_svg__block-booster-category-card-icon",
    viewBox: "0 0 24 24"
  }, props), _path || (_path = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("path", {
    d: "M3 6.5a3.5 3.5 0 1 0 7 0 3.5 3.5 0 1 0-7 0M2.5 21h8l-4-7zM14 3l7 7M14 10l7-7M14 14h7v7h-7z"
  })));
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ("data:image/svg+xml;base64,PHN2ZyBjbGFzcz0iYmxvY2stYm9vc3Rlci1jYXRlZ29yeS1jYXJkLWljb24iIHN0cm9rZT0iY3VycmVudENvbG9yIiBmaWxsPSJub25lIiBzdHJva2Utd2lkdGg9IjIiIHZpZXdCb3g9IjAgMCAyNCAyNCIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBoZWlnaHQ9IjIwMHB4IiB3aWR0aD0iMjAwcHgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTYuNSA2LjVtLTMuNSAwYTMuNSAzLjUgMCAxIDAgNyAwYTMuNSAzLjUgMCAxIDAgLTcgMCI+PC9wYXRoPjxwYXRoIGQ9Ik0yLjUgMjFoOGwtNCAtN3oiPjwvcGF0aD48cGF0aCBkPSJNMTQgM2w3IDciPjwvcGF0aD48cGF0aCBkPSJNMTQgMTBsNyAtNyI+PC9wYXRoPjxwYXRoIGQ9Ik0xNCAxNGg3djdoLTd6Ij48L3BhdGg+PC9zdmc+");

/***/ }),

/***/ "./src/category-card/index.js":
/*!************************************!*\
  !*** ./src/category-card/index.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./style.scss */ "./src/category-card/style.scss");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./edit */ "./src/category-card/edit.js");
/* harmony import */ var _save__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./save */ "./src/category-card/save.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./block.json */ "./src/category-card/block.json");
/* harmony import */ var _icon_svg__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./icon.svg */ "./src/category-card/icon.svg");
/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */


/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */


/**
 * Internal dependencies
 */




/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.registerBlockType)(_block_json__WEBPACK_IMPORTED_MODULE_4__.name, {
  icon: _icon_svg__WEBPACK_IMPORTED_MODULE_5__.ReactComponent,
  /**
   * @see ./edit.js
   */
  edit: _edit__WEBPACK_IMPORTED_MODULE_2__["default"],
  /**
   * @see ./save.js
   */
  save: _save__WEBPACK_IMPORTED_MODULE_3__["default"]
});

/***/ }),

/***/ "./src/category-card/save.js":
/*!***********************************!*\
  !*** ./src/category-card/save.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Save)
/* harmony export */ });
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__);
/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {Element} Element to render.
 */

function Save() {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__.InnerBlocks.Content, {});
}

/***/ }),

/***/ "./src/category-card/style.scss":
/*!**************************************!*\
  !*** ./src/category-card/style.scss ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/libs/global.js":
/*!****************************!*\
  !*** ./src/libs/global.js ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   gapUnits: () => (/* binding */ gapUnits),
/* harmony export */   generateTemplate: () => (/* binding */ generateTemplate),
/* harmony export */   getFileExtension: () => (/* binding */ getFileExtension),
/* harmony export */   numberRange: () => (/* binding */ numberRange)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);

 // For the plus icon

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
const generateTemplate = number => {
  const innerBlocksAttributes = {
    column: 1,
    width: 100 / number,
    tablet_width: 50,
    mobile_width: 100
  };
  const templates = [];
  for (let index = 0; index < number; index++) {
    templates.push(["block-booster/box", innerBlocksAttributes]);
  }
  return templates;
};
const numberRange = (start, end) => {
  const startNum = Number(start);
  const endNum = Number(end);
  return Array.from({
    length: endNum - startNum + 1
  }, (_, i) => startNum + i);
};
const gapUnits = [{
  value: "px",
  label: "px"
}, {
  value: "%",
  label: "%"
}, {
  value: "em",
  label: "em"
}, {
  value: "rem",
  label: "rem"
}, {
  value: "vw",
  label: "vw"
}, {
  value: "vh",
  label: "vh"
}];
const getFileExtension = filename => {
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

/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ ((module) => {

module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/data":
/*!******************************!*\
  !*** external ["wp","data"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["data"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

module.exports = window["React"];

/***/ }),

/***/ "react/jsx-runtime":
/*!**********************************!*\
  !*** external "ReactJSXRuntime" ***!
  \**********************************/
/***/ ((module) => {

module.exports = window["ReactJSXRuntime"];

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"category-card/index": 0,
/******/ 			"category-card/style-index": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = globalThis["webpackChunkblock_booster"] = globalThis["webpackChunkblock_booster"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["category-card/style-index"], () => (__webpack_require__("./src/category-card/index.js")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=index.js.map