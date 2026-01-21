<?php
// This file is generated. Do not modify it manually.
return array(
	'category-card' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'block-booster/category-card',
		'version' => '0.1.0',
		'title' => 'Category card',
		'category' => 'block-booster',
		'description' => 'Category card.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'color' => array(
				'background' => true,
				'text' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true
			),
			'background' => array(
				'backgroundSize' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'shadow' => true
		),
		'attributes' => array(
			'disableCSS' => array(
				'type' => 'boolean',
				'default' => false
			),
			'imageId' => array(
				'type' => 'number',
				'default' => 0
			),
			'imageUrl' => array(
				'type' => 'string',
				'default' => ''
			),
			'imageName' => array(
				'type' => 'string',
				'default' => ''
			),
			'imageWidth' => array(
				'type' => 'number',
				'default' => 64
			),
			'categoryId' => array(
				'type' => 'number',
				'default' => 0
			),
			'categoryCount' => array(
				'type' => 'number',
				'default' => 0
			),
			'categoryUrl' => array(
				'type' => 'string',
				'default' => ''
			),
			'categoryName' => array(
				'type' => 'string',
				'default' => ''
			),
			'postNameSingular' => array(
				'type' => 'string',
				'default' => ''
			),
			'postNamePlural' => array(
				'type' => 'string',
				'default' => ''
			),
			'isLink' => array(
				'type' => 'boolean',
				'default' => true
			),
			'vertical' => array(
				'type' => 'boolean',
				'default' => false
			),
			'gap' => array(
				'type' => 'number',
				'default' => 20
			)
		),
		'textdomain' => 'block-booster',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'default-featured-image' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'block-booster/default-featured-image',
		'version' => '0.1.0',
		'title' => 'Default featured image',
		'category' => 'block-booster',
		'description' => 'Default featured image for post query.',
		'example' => array(
			
		),
		'usesContext' => array(
			'postId',
			'postType'
		),
		'supports' => array(
			'html' => false,
			'color' => array(
				'background' => true,
				'text' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true
			),
			'background' => array(
				'backgroundSize' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'multiple' => false,
			'shadow' => true,
			'border' => array(
				'radius' => true,
				'color' => true,
				'width' => true,
				'style' => true
			)
		),
		'attributes' => array(
			'style' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'imageId' => array(
				'type' => 'number',
				'default' => 0
			),
			'imageUrl' => array(
				'type' => 'string',
				'default' => ''
			),
			'imageName' => array(
				'type' => 'string',
				'default' => ''
			),
			'imagePosition' => array(
				'type' => 'string',
				'default' => 'center'
			),
			'showFeaturedImage' => array(
				'type' => 'boolean',
				'default' => true
			),
			'height' => array(
				'type' => 'number',
				'default' => 230
			),
			'isLink' => array(
				'type' => 'boolean',
				'default' => true
			)
		),
		'textdomain' => 'block-booster',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'flexbox' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'block-booster/flexbox',
		'version' => '0.1.0',
		'title' => 'Flexbox',
		'category' => 'block-booster',
		'description' => 'Flexbox container',
		'example' => array(
			
		),
		'supports' => array(
			'color' => array(
				'background' => true,
				'text' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true
			),
			'background' => array(
				'backgroundImage' => true,
				'backgroundSize' => true
			),
			'shadow' => true,
			'align' => true,
			'alignWide' => true,
			'spacing' => array(
				'margin' => true,
				'padding' => true
			)
		),
		'attributes' => array(
			'widthType' => array(
				'type' => 'string',
				'default' => 'full'
			),
			'tabletWidthType' => array(
				'type' => 'string',
				'default' => 'full'
			),
			'mobileWidthType' => array(
				'type' => 'string',
				'default' => 'full'
			),
			'width' => array(
				'type' => 'number',
				'default' => 100
			),
			'tabletWidth' => array(
				'type' => 'number',
				'default' => 100
			),
			'mobileWidth' => array(
				'type' => 'number',
				'default' => 100
			),
			'widthUnit' => array(
				'type' => 'string',
				'default' => '%'
			),
			'tabletWidthUnit' => array(
				'type' => 'string',
				'default' => '%'
			),
			'mobileWidthUnit' => array(
				'type' => 'string',
				'default' => '%'
			),
			'columnGap' => array(
				'type' => 'number',
				'default' => 0
			),
			'tabletColumnGap' => array(
				'type' => 'number',
				'default' => 0
			),
			'mobileColumnGap' => array(
				'type' => 'number',
				'default' => 0
			),
			'columnGapUnit' => array(
				'type' => 'string',
				'default' => 'px'
			),
			'tabletColumnGapUnit' => array(
				'type' => 'string',
				'default' => 'px'
			),
			'mobileColumnGapUnit' => array(
				'type' => 'string',
				'default' => 'px'
			),
			'rowGap' => array(
				'type' => 'number',
				'default' => 0
			),
			'tabletRowGap' => array(
				'type' => 'number',
				'default' => 0
			),
			'mobileRowGap' => array(
				'type' => 'number',
				'default' => 0
			),
			'rowGapUnit' => array(
				'type' => 'string',
				'default' => 'px'
			),
			'tabletRowGapUnit' => array(
				'type' => 'string',
				'default' => 'px'
			),
			'mobileRowGapUnit' => array(
				'type' => 'string',
				'default' => 'px'
			),
			'wrap' => array(
				'type' => 'string',
				'default' => ''
			),
			'tabletWrap' => array(
				'type' => 'string',
				'default' => ''
			),
			'mobileWrap' => array(
				'type' => 'string',
				'default' => ''
			),
			'direction' => array(
				'type' => 'string',
				'default' => ''
			),
			'tabletDirection' => array(
				'type' => 'string',
				'default' => ''
			),
			'mobileDirection' => array(
				'type' => 'string',
				'default' => ''
			),
			'reverse' => array(
				'type' => 'boolean',
				'default' => false
			),
			'tabletReverse' => array(
				'type' => 'boolean',
				'default' => false
			),
			'mobileReverse' => array(
				'type' => 'boolean',
				'default' => false
			),
			'justifyContent' => array(
				'type' => 'string',
				'default' => ''
			),
			'tabletJustifyContent' => array(
				'type' => 'string',
				'default' => ''
			),
			'mobileJustifyContent' => array(
				'type' => 'string',
				'default' => ''
			),
			'alignItems' => array(
				'type' => 'string',
				'default' => 'flex-start'
			),
			'tabletAlignItems' => array(
				'type' => 'string',
				'default' => 'flex-start'
			),
			'mobileAlignItems' => array(
				'type' => 'string',
				'default' => 'flex-start'
			),
			'grow' => array(
				'type' => 'string',
				'default' => ''
			),
			'tabletGrow' => array(
				'type' => 'string',
				'default' => ''
			),
			'mobileGrow' => array(
				'type' => 'string',
				'default' => ''
			),
			'shrink' => array(
				'type' => 'string',
				'default' => ''
			),
			'tabletShrink' => array(
				'type' => 'string',
				'default' => ''
			),
			'mobileShrink' => array(
				'type' => 'string',
				'default' => ''
			),
			'display' => array(
				'type' => 'string',
				'default' => ''
			),
			'tabletDisplay' => array(
				'type' => 'string',
				'default' => ''
			),
			'mobileDisplay' => array(
				'type' => 'string',
				'default' => ''
			)
		),
		'textdomain' => 'block-booster',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'icon-and-text' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'block-booster/icon-and-text',
		'version' => '0.1.0',
		'title' => 'Icon & Text',
		'category' => 'block-booster',
		'description' => '',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'color' => array(
				'background' => true,
				'text' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true
			),
			'background' => array(
				'backgroundSize' => true,
				'backgroundImage' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			)
		),
		'attributes' => array(
			'imageId' => array(
				'type' => 'number',
				'default' => 0
			),
			'imageUrl' => array(
				'type' => 'string',
				'default' => ''
			),
			'imageName' => array(
				'type' => 'string',
				'default' => ''
			),
			'imageWidth' => array(
				'type' => 'number',
				'default' => '32'
			),
			'imageContent' => array(
				'type' => 'string',
				'default' => ''
			),
			'text' => array(
				'type' => 'string',
				'default' => ''
			),
			'reversed' => array(
				'type' => 'boolean',
				'default' => false
			),
			'tabletReversed' => array(
				'type' => 'boolean',
				'default' => false
			),
			'mobileReversed' => array(
				'type' => 'boolean',
				'default' => false
			),
			'stacked' => array(
				'type' => 'boolean',
				'default' => false
			),
			'tabletStacked' => array(
				'type' => 'boolean',
				'default' => false
			),
			'mobileStacked' => array(
				'type' => 'boolean',
				'default' => false
			),
			'gap' => array(
				'type' => 'number',
				'default' => 15
			),
			'tabletGap' => array(
				'type' => 'number',
				'default' => 15
			),
			'mobileGap' => array(
				'type' => 'number',
				'default' => 15
			),
			'svgColor' => array(
				'type' => 'string'
			)
		),
		'textdomain' => 'block-booster',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'media-and-text' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'block-booster/media-and-text',
		'version' => '0.1.0',
		'title' => 'Media & Text',
		'category' => 'block-booster',
		'description' => '',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'color' => array(
				'background' => true,
				'text' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true
			),
			'background' => array(
				'backgroundSize' => true,
				'backgroundImage' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			)
		),
		'attributes' => array(
			'imageId' => array(
				'type' => 'number',
				'default' => 0
			),
			'imageUrl' => array(
				'type' => 'string',
				'default' => ''
			),
			'imageName' => array(
				'type' => 'string',
				'default' => ''
			),
			'reversed' => array(
				'type' => 'boolean',
				'default' => false
			),
			'tabletReversed' => array(
				'type' => 'boolean',
				'default' => false
			),
			'mobileReversed' => array(
				'type' => 'boolean',
				'default' => false
			),
			'stacked' => array(
				'type' => 'boolean',
				'default' => false
			),
			'tabletStacked' => array(
				'type' => 'boolean',
				'default' => false
			),
			'mobileStacked' => array(
				'type' => 'boolean',
				'default' => false
			),
			'gap' => array(
				'type' => 'number',
				'default' => 15
			),
			'tabletGap' => array(
				'type' => 'number',
				'default' => 15
			),
			'mobileGap' => array(
				'type' => 'number',
				'default' => 15
			)
		),
		'textdomain' => 'block-booster',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'search' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'block-booster/search',
		'version' => '0.1.0',
		'title' => 'Search',
		'category' => 'block-booster',
		'description' => 'Search using post category.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'color' => array(
				'background' => true,
				'text' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true
			),
			'background' => array(
				'backgroundSize' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			)
		),
		'attributes' => array(
			'disableCSS' => array(
				'type' => 'boolean',
				'default' => false
			),
			'showCategory' => array(
				'type' => 'boolean',
				'default' => false
			),
			'showSearchIcon' => array(
				'type' => 'boolean',
				'default' => true
			),
			'searchPlaceholder' => array(
				'type' => 'string',
				'default' => ''
			),
			'buttonText' => array(
				'type' => 'string',
				'default' => ''
			),
			'categoryText' => array(
				'type' => 'string',
				'default' => ''
			),
			'height' => array(
				'type' => 'number',
				'default' => 40
			),
			'width' => array(
				'type' => 'number',
				'default' => 300
			)
		),
		'textdomain' => 'block-booster',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	)
);
