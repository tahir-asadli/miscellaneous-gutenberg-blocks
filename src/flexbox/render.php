<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

$misc_gutenberg_blocks_classes = [];

$misc_gutenberg_blocks_widthType = !empty($attributes['widthType']) ? $attributes['widthType'] : 'full';
$misc_gutenberg_blocks_tabletWidthType = !empty($attributes['tabletWidthType']) ? $attributes['tabletWidthType'] : 'full';
$misc_gutenberg_blocks_mobileWidthType = !empty($attributes['mobileWidthType']) ? $attributes['mobileWidthType'] : 'full';

$misc_gutenberg_blocks_width = !empty($attributes['width']) && $attributes['width'] > 0 ? $attributes['width'] . $attributes['widthUnit'] : '';
$misc_gutenberg_blocks_tabletWidth = !empty($attributes['tabletWidth']) && $attributes['tabletWidth'] > 0 ? $attributes['tabletWidth'] . $attributes['tabletWidthUnit'] : '';
$misc_gutenberg_blocks_mobileWidth = !empty($attributes['mobileWidth']) && $attributes['mobileWidth'] > 0 ? $attributes['mobileWidth'] . $attributes['mobileWidthUnit'] : '';

$misc_gutenberg_blocks_wrap = !empty($attributes['wrap']) ? $attributes['wrap'] : '';
$misc_gutenberg_blocks_tabletWrap = !empty($attributes['tabletWrap']) ? $attributes['tabletWrap'] : '';
$misc_gutenberg_blocks_mobileWrap = !empty($attributes['mobileWrap']) ? $attributes['mobileWrap'] : '';

$misc_gutenberg_blocks_direction = !empty($attributes['direction']) ? $attributes['direction'] : '';
$misc_gutenberg_blocks_tabletDirection = !empty($attributes['tabletDirection']) ? $attributes['tabletDirection'] : '';
$misc_gutenberg_blocks_mobileDirection = !empty($attributes['mobileDirection']) ? $attributes['mobileDirection'] : '';

$misc_gutenberg_blocks_reverse = !empty($attributes['reverse']) && $attributes['reverse'] == 1;
$misc_gutenberg_blocks_tabletReverse = !empty($attributes['tabletReverse']) && $attributes['tabletReverse'] == 1;
$misc_gutenberg_blocks_mobileReverse = !empty($attributes['mobileReverse']) && $attributes['mobileReverse'] == 1;

$misc_gutenberg_blocks_justifyContent = !empty($attributes['justifyContent']) ? $attributes['justifyContent'] : '';
$misc_gutenberg_blocks_tabletJustifyContent = !empty($attributes['tabletJustifyContent']) ? $attributes['tabletJustifyContent'] : '';
$misc_gutenberg_blocks_mobileJustifyContent = !empty($attributes['mobileJustifyContent']) ? $attributes['mobileJustifyContent'] : '';

$misc_gutenberg_blocks_alignItems = !empty($attributes['alignItems']) ? $attributes['alignItems'] : '';
$misc_gutenberg_blocks_tabletAlignItems = !empty($attributes['tabletAlignItems']) ? $attributes['tabletAlignItems'] : '';
$misc_gutenberg_blocks_mobileAlignItems = !empty($attributes['mobileAlignItems']) ? $attributes['mobileAlignItems'] : '';

$misc_gutenberg_blocks_grow = !empty($attributes['grow']) ? $attributes['grow'] : '';
$misc_gutenberg_blocks_tabletGrow = !empty($attributes['tabletGrow']) ? $attributes['tabletGrow'] : '';
$misc_gutenberg_blocks_mobileGrow = !empty($attributes['mobileGrow']) ? $attributes['mobileGrow'] : '';

$misc_gutenberg_blocks_shrink = !empty($attributes['shrink']) ? $attributes['shrink'] : '';
$misc_gutenberg_blocks_tabletShrink = !empty($attributes['tabletShrink']) ? $attributes['tabletShrink'] : '';
$misc_gutenberg_blocks_mobileShrink = !empty($attributes['mobileShrink']) ? $attributes['mobileShrink'] : '';

$misc_gutenberg_blocks_display = !empty($attributes['display']) ? $attributes['display'] : '';
$misc_gutenberg_blocks_tabletDisplay = !empty($attributes['tabletDisplay']) ? $attributes['tabletDisplay'] : '';
$misc_gutenberg_blocks_mobileDisplay = !empty($attributes['mobileDisplay']) ? $attributes['mobileDisplay'] : '';

if ($misc_gutenberg_blocks_widthType == 'auto') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--width-auto';
} else if ($misc_gutenberg_blocks_widthType == 'initial') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--width-initial';
}
if ($misc_gutenberg_blocks_tabletWidthType == 'auto') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--width-tablet-auto';
} else if ($misc_gutenberg_blocks_tabletWidthType == 'initial') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--width-tablet-initial';
}
if ($misc_gutenberg_blocks_mobileWidthType == 'auto') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--width-mobile-auto';
} else if ($misc_gutenberg_blocks_mobileWidthType == 'initial') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--width-mobile-initial';
}

if ($misc_gutenberg_blocks_wrap == 'wrap') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--wrap';
} else if ($misc_gutenberg_blocks_wrap == 'no-wrap') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--no-wrap';
}
if ($misc_gutenberg_blocks_tabletWrap == 'wrap') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--tablet-wrap';
} else if ($misc_gutenberg_blocks_mobileWrap == 'wrap') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--mobile-wrap';
}
if ($misc_gutenberg_blocks_tabletWrap == 'no-wrap') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--tablet-no-wrap';
} else if ($misc_gutenberg_blocks_mobileWrap == 'no-wrap') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--mobile-no-wrap';
}

if ($misc_gutenberg_blocks_direction == 'horizontal') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--horizontal';
} else if ($misc_gutenberg_blocks_direction == 'vertical') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--vertical';
}
if ($misc_gutenberg_blocks_tabletDirection == 'horizontal') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--tablet-horizontal';
}
if ($misc_gutenberg_blocks_tabletDirection == 'vertical') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--tablet-vertical';
}
if ($misc_gutenberg_blocks_mobileDirection == 'horizontal') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--mobile-horizontal';
} else if ($misc_gutenberg_blocks_mobileDirection == 'vertical') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--mobile-vertical';
}

if ($misc_gutenberg_blocks_reverse) {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--reverse';
}
if ($misc_gutenberg_blocks_tabletReverse) {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--tablet-reverse';
}
if ($misc_gutenberg_blocks_mobileReverse) {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--mobile-reverse';
}

if ($misc_gutenberg_blocks_grow == 'grow') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--grow';
} else if ($misc_gutenberg_blocks_grow == 'no-grow') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--no-grow';
}
if ($misc_gutenberg_blocks_tabletGrow == 'grow') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--tablet-grow';
} else if ($misc_gutenberg_blocks_tabletGrow == 'no-grow') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--tablet-no-grow';
}
if ($misc_gutenberg_blocks_mobileGrow == 'grow') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--mobile-grow';
} else if ($misc_gutenberg_blocks_mobileGrow == 'no-grow') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--mobile-no-grow';
}

if ($misc_gutenberg_blocks_shrink == 'shrink') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--shrink';
} else if ($misc_gutenberg_blocks_shrink == 'no-shrink') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--no-shrink';
}
if ($misc_gutenberg_blocks_tabletShrink == 'shrink') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--tablet-shrink';
} else if ($misc_gutenberg_blocks_tabletShrink == 'no-shrink') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--tablet-no-shrink';
}
if ($misc_gutenberg_blocks_mobileShrink == 'shrink') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--mobile-shrink';
} else if ($misc_gutenberg_blocks_mobileShrink == 'no-shrink') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--mobile-no-shrink';
}


if ($misc_gutenberg_blocks_display == 'flex') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--flex';
} else if ($misc_gutenberg_blocks_display == 'inline-flex') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--inline-flex';
} else if ($misc_gutenberg_blocks_display == 'none') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--none';
}

if ($misc_gutenberg_blocks_tabletDisplay == 'flex') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--tablet-flex';
} else if ($misc_gutenberg_blocks_tabletDisplay == 'inline-flex') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--tablet-inline-flex';
} else if ($misc_gutenberg_blocks_tabletDisplay == 'none') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--tablet-none';
}

if ($misc_gutenberg_blocks_mobileDisplay == 'flex') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--mobile-flex';
} else if ($misc_gutenberg_blocks_mobileDisplay == 'inline-flex') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--mobile-inline-flex';
} else if ($misc_gutenberg_blocks_mobileDisplay == 'none') {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--mobile-none';
}

if ($misc_gutenberg_blocks_justifyContent) {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--justify-' . $misc_gutenberg_blocks_justifyContent;
}
if ($misc_gutenberg_blocks_tabletJustifyContent) {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--justify-tablet-' . $misc_gutenberg_blocks_tabletJustifyContent;
}
if ($misc_gutenberg_blocks_mobileJustifyContent) {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--justify-mobile-' . $misc_gutenberg_blocks_mobileJustifyContent;
}

if ($misc_gutenberg_blocks_alignItems) {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--align-' . $misc_gutenberg_blocks_alignItems;
}
if ($misc_gutenberg_blocks_tabletAlignItems) {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--align-tablet-' . $misc_gutenberg_blocks_tabletAlignItems;
}
if ($misc_gutenberg_blocks_mobileAlignItems) {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-flexbox--align-mobile-' . $misc_gutenberg_blocks_mobileAlignItems;
}

$misc_gutenberg_blocks_columnGapUnit = !empty($attributes['columnGapUnit']) ? $attributes['columnGapUnit'] : 'px';
$misc_gutenberg_blocks_tabletColumnGapUnit = !empty($attributes['tabletColumnGapUnit']) ? $attributes['tabletColumnGapUnit'] : 'px';
$misc_gutenberg_blocks_mobileColumnGapUnit = !empty($attributes['mobileColumnGapUnit']) ? $attributes['mobileColumnGapUnit'] : 'px';

$misc_gutenberg_blocks_rowGapUnit = !empty($attributes['rowGapUnit']) ? $attributes['rowGapUnit'] : 'px';
$misc_gutenberg_blocks_tabletRowGapUnit = !empty($attributes['tabletRowGapUnit']) ? $attributes['tabletRowGapUnit'] : 'px';
$misc_gutenberg_blocks_mobileRowGapUnit = !empty($attributes['mobileRowGapUnit']) ? $attributes['mobileRowGapUnit'] : 'px';

$misc_gutenberg_blocks_columnGap = !empty($attributes['columnGap']) && $attributes['columnGap'] > 0 ? $attributes['columnGap'] . $misc_gutenberg_blocks_columnGapUnit : 0;
$misc_gutenberg_blocks_tabletColumnGap = !empty($attributes['tabletColumnGap']) && $attributes['tabletColumnGap'] > 0 ? $attributes['tabletColumnGap'] . $misc_gutenberg_blocks_tabletColumnGapUnit : 0;
$misc_gutenberg_blocks_mobileColumnGap = !empty($attributes['mobileColumnGap']) && $attributes['mobileColumnGap'] > 0 ? $attributes['mobileColumnGap'] . $misc_gutenberg_blocks_mobileColumnGapUnit : 0;

$misc_gutenberg_blocks_rowGap = !empty($attributes['rowGap']) && $attributes['rowGap'] > 0 ? $attributes['rowGap'] . $misc_gutenberg_blocks_rowGapUnit : 0;
$misc_gutenberg_blocks_tabletRowGap = !empty($attributes['tabletRowGap']) && $attributes['tabletRowGap'] > 0 ? $attributes['tabletRowGap'] . $misc_gutenberg_blocks_tabletRowGapUnit : 0;
$misc_gutenberg_blocks_mobileRowGap = !empty($attributes['mobileRowGap']) && $attributes['mobileRowGap'] > 0 ? $attributes['mobileRowGap'] . $misc_gutenberg_blocks_mobileRowGapUnit : 0;

$misc_gutenberg_blocks_additional_attributes['class'] = join(' ', $misc_gutenberg_blocks_classes);
$misc_gutenberg_blocks_additional_attributes['id'] = 'misc-gutenberg-blocks-' . uniqid();

$misc_gutenberg_blocks_MobileStyles = ($misc_gutenberg_blocks_widthType == 'custom' && $misc_gutenberg_blocks_width != '') || $misc_gutenberg_blocks_columnGap || $misc_gutenberg_blocks_rowGap;
$misc_gutenberg_blocks_hasMobileStyles = ($misc_gutenberg_blocks_tabletWidthType == 'custom' && $misc_gutenberg_blocks_tabletWidth != '') || $misc_gutenberg_blocks_tabletColumnGap || $misc_gutenberg_blocks_tabletRowGap;
$misc_gutenberg_blocks_hasTabletStyles = ($misc_gutenberg_blocks_mobileWidthType == 'custom' && $misc_gutenberg_blocks_mobileWidth != '') || $misc_gutenberg_blocks_mobileColumnGap || $misc_gutenberg_blocks_mobileRowGap;

?>
<div <?php echo esc_html(get_block_wrapper_attributes($misc_gutenberg_blocks_additional_attributes)); ?>>
  <?php

  if (!empty($block->inner_blocks)) {
    foreach ($block->inner_blocks as $misc_gutenberg_blocks_inner_block) {
      echo wp_kses_post($misc_gutenberg_blocks_inner_block->render());
    }
  }

  ?>
</div>
<?php if ($misc_gutenberg_blocks_MobileStyles || $misc_gutenberg_blocks_hasMobileStyles || $misc_gutenberg_blocks_hasTabletStyles): ?>
  <style>
    @media only screen {
      #<?php echo esc_html($misc_gutenberg_blocks_additional_attributes['id']); ?> {
        <?php echo $misc_gutenberg_blocks_widthType == 'custom' && $misc_gutenberg_blocks_width != '' ? esc_html("width: {$misc_gutenberg_blocks_width};") : ''; ?>
        <?php echo $misc_gutenberg_blocks_columnGap ? esc_html("column-gap: $misc_gutenberg_blocks_columnGap;") : ''; ?>
        <?php echo $misc_gutenberg_blocks_rowGap ? esc_html("row-gap: $misc_gutenberg_blocks_rowGap;") : ''; ?>
      }
    }

    @media only screen and (max-width:
      <?php echo esc_html(MISC_GUTENBERG_BLOCKS_MAX_TABLET_BREAKING_POINT); ?>
    ) {
      #<?php echo esc_html($misc_gutenberg_blocks_additional_attributes['id']); ?> {
        <?php echo $misc_gutenberg_blocks_tabletWidthType == 'custom' && $misc_gutenberg_blocks_tabletWidth != '' ? esc_html("width: {$misc_gutenberg_blocks_tabletWidth};") : ''; ?>
        <?php echo $misc_gutenberg_blocks_tabletColumnGap ? esc_html("column-gap: $misc_gutenberg_blocks_tabletColumnGap;") : ''; ?>
        <?php echo $misc_gutenberg_blocks_tabletRowGap ? esc_html("row-gap: $misc_gutenberg_blocks_tabletRowGap;") : ''; ?>
      }
    }

    @media only screen and (max-width:
      <?php echo esc_html(MISC_GUTENBERG_BLOCKS_MAX_MOBILE_BREAKING_POINT); ?>
    ) {
      #<?php echo esc_html($misc_gutenberg_blocks_additional_attributes['id']); ?> {
        <?php echo $misc_gutenberg_blocks_mobileWidthType == 'custom' && $misc_gutenberg_blocks_mobileWidth != '' ? esc_html("width: {$misc_gutenberg_blocks_mobileWidth};") : ''; ?>
        <?php echo $misc_gutenberg_blocks_mobileColumnGap ? esc_html("column-gap: $misc_gutenberg_blocks_mobileColumnGap;") : ''; ?>
        <?php echo $misc_gutenberg_blocks_mobileRowGap ? esc_html("row-gap: $misc_gutenberg_blocks_mobileRowGap;") : ''; ?>
      }
    }
  </style>
<?php endif; ?>