<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

$block_booster_classes = [];

$block_booster_widthType = !empty($attributes['widthType']) ? $attributes['widthType'] : 'full';
$block_booster_tabletWidthType = !empty($attributes['tabletWidthType']) ? $attributes['tabletWidthType'] : 'full';
$block_booster_mobileWidthType = !empty($attributes['mobileWidthType']) ? $attributes['mobileWidthType'] : 'full';

$block_booster_width = !empty($attributes['width']) && $attributes['width'] > 0 ? $attributes['width'] . $attributes['widthUnit'] : '';
$block_booster_tabletWidth = !empty($attributes['tabletWidth']) && $attributes['tabletWidth'] > 0 ? $attributes['tabletWidth'] . $attributes['tabletWidthUnit'] : '';
$block_booster_mobileWidth = !empty($attributes['mobileWidth']) && $attributes['mobileWidth'] > 0 ? $attributes['mobileWidth'] . $attributes['mobileWidthUnit'] : '';

$block_booster_wrap = !empty($attributes['wrap']) ? $attributes['wrap'] : '';
$block_booster_tabletWrap = !empty($attributes['tabletWrap']) ? $attributes['tabletWrap'] : '';
$block_booster_mobileWrap = !empty($attributes['mobileWrap']) ? $attributes['mobileWrap'] : '';

$block_booster_direction = !empty($attributes['direction']) ? $attributes['direction'] : '';
$block_booster_tabletDirection = !empty($attributes['tabletDirection']) ? $attributes['tabletDirection'] : '';
$block_booster_mobileDirection = !empty($attributes['mobileDirection']) ? $attributes['mobileDirection'] : '';

$block_booster_reverse = !empty($attributes['reverse']) && $attributes['reverse'] == 1;
$block_booster_tabletReverse = !empty($attributes['tabletReverse']) && $attributes['tabletReverse'] == 1;
$block_booster_mobileReverse = !empty($attributes['mobileReverse']) && $attributes['mobileReverse'] == 1;

$block_booster_justifyContent = !empty($attributes['justifyContent']) ? $attributes['justifyContent'] : '';
$block_booster_tabletJustifyContent = !empty($attributes['tabletJustifyContent']) ? $attributes['tabletJustifyContent'] : '';
$block_booster_mobileJustifyContent = !empty($attributes['mobileJustifyContent']) ? $attributes['mobileJustifyContent'] : '';

$block_booster_alignItems = !empty($attributes['alignItems']) ? $attributes['alignItems'] : '';
$block_booster_tabletAlignItems = !empty($attributes['tabletAlignItems']) ? $attributes['tabletAlignItems'] : '';
$block_booster_mobileAlignItems = !empty($attributes['mobileAlignItems']) ? $attributes['mobileAlignItems'] : '';

$block_booster_grow = !empty($attributes['grow']) ? $attributes['grow'] : '';
$block_booster_tabletGrow = !empty($attributes['tabletGrow']) ? $attributes['tabletGrow'] : '';
$block_booster_mobileGrow = !empty($attributes['mobileGrow']) ? $attributes['mobileGrow'] : '';

$block_booster_shrink = !empty($attributes['shrink']) ? $attributes['shrink'] : '';
$block_booster_tabletShrink = !empty($attributes['tabletShrink']) ? $attributes['tabletShrink'] : '';
$block_booster_mobileShrink = !empty($attributes['mobileShrink']) ? $attributes['mobileShrink'] : '';

$block_booster_display = !empty($attributes['display']) ? $attributes['display'] : '';
$block_booster_tabletDisplay = !empty($attributes['tabletDisplay']) ? $attributes['tabletDisplay'] : '';
$block_booster_mobileDisplay = !empty($attributes['mobileDisplay']) ? $attributes['mobileDisplay'] : '';

if ($block_booster_widthType == 'auto') {
  $block_booster_classes[] = 'block-booster-flexbox--width-auto';
} else if ($block_booster_widthType == 'initial') {
  $block_booster_classes[] = 'block-booster-flexbox--width-initial';
}
if ($block_booster_tabletWidthType == 'auto') {
  $block_booster_classes[] = 'block-booster-flexbox--width-tablet-auto';
} else if ($block_booster_tabletWidthType == 'initial') {
  $block_booster_classes[] = 'block-booster-flexbox--width-tablet-initial';
}
if ($block_booster_mobileWidthType == 'auto') {
  $block_booster_classes[] = 'block-booster-flexbox--width-mobile-auto';
} else if ($block_booster_mobileWidthType == 'initial') {
  $block_booster_classes[] = 'block-booster-flexbox--width-mobile-initial';
}

if ($block_booster_wrap == 'wrap') {
  $block_booster_classes[] = 'block-booster-flexbox--wrap';
} else if ($block_booster_wrap == 'no-wrap') {
  $block_booster_classes[] = 'block-booster-flexbox--no-wrap';
}
if ($block_booster_tabletWrap == 'wrap') {
  $block_booster_classes[] = 'block-booster-flexbox--tablet-wrap';
} else if ($block_booster_mobileWrap == 'wrap') {
  $block_booster_classes[] = 'block-booster-flexbox--mobile-wrap';
}
if ($block_booster_tabletWrap == 'no-wrap') {
  $block_booster_classes[] = 'block-booster-flexbox--tablet-no-wrap';
} else if ($block_booster_mobileWrap == 'no-wrap') {
  $block_booster_classes[] = 'block-booster-flexbox--mobile-no-wrap';
}

if ($block_booster_direction == 'horizontal') {
  $block_booster_classes[] = 'block-booster-flexbox--horizontal';
} else if ($block_booster_direction == 'vertical') {
  $block_booster_classes[] = 'block-booster-flexbox--vertical';
}
if ($block_booster_tabletDirection == 'horizontal') {
  $block_booster_classes[] = 'block-booster-flexbox--tablet-horizontal';
}
if ($block_booster_tabletDirection == 'vertical') {
  $block_booster_classes[] = 'block-booster-flexbox--tablet-vertical';
}
if ($block_booster_mobileDirection == 'horizontal') {
  $block_booster_classes[] = 'block-booster-flexbox--mobile-horizontal';
} else if ($block_booster_mobileDirection == 'vertical') {
  $block_booster_classes[] = 'block-booster-flexbox--mobile-vertical';
}

if ($block_booster_reverse) {
  $block_booster_classes[] = 'block-booster-flexbox--reverse';
}
if ($block_booster_tabletReverse) {
  $block_booster_classes[] = 'block-booster-flexbox--tablet-reverse';
}
if ($block_booster_mobileReverse) {
  $block_booster_classes[] = 'block-booster-flexbox--mobile-reverse';
}

if ($block_booster_grow == 'grow') {
  $block_booster_classes[] = 'block-booster-flexbox--grow';
} else if ($block_booster_grow == 'no-grow') {
  $block_booster_classes[] = 'block-booster-flexbox--no-grow';
}
if ($block_booster_tabletGrow == 'grow') {
  $block_booster_classes[] = 'block-booster-flexbox--tablet-grow';
} else if ($block_booster_tabletGrow == 'no-grow') {
  $block_booster_classes[] = 'block-booster-flexbox--tablet-no-grow';
}
if ($block_booster_mobileGrow == 'grow') {
  $block_booster_classes[] = 'block-booster-flexbox--mobile-grow';
} else if ($block_booster_mobileGrow == 'no-grow') {
  $block_booster_classes[] = 'block-booster-flexbox--mobile-no-grow';
}

if ($block_booster_shrink == 'shrink') {
  $block_booster_classes[] = 'block-booster-flexbox--shrink';
} else if ($block_booster_shrink == 'no-shrink') {
  $block_booster_classes[] = 'block-booster-flexbox--no-shrink';
}
if ($block_booster_tabletShrink == 'shrink') {
  $block_booster_classes[] = 'block-booster-flexbox--tablet-shrink';
} else if ($block_booster_tabletShrink == 'no-shrink') {
  $block_booster_classes[] = 'block-booster-flexbox--tablet-no-shrink';
}
if ($block_booster_mobileShrink == 'shrink') {
  $block_booster_classes[] = 'block-booster-flexbox--mobile-shrink';
} else if ($block_booster_mobileShrink == 'no-shrink') {
  $block_booster_classes[] = 'block-booster-flexbox--mobile-no-shrink';
}


if ($block_booster_display == 'flex') {
  $block_booster_classes[] = 'block-booster-flexbox--flex';
} else if ($block_booster_display == 'inline-flex') {
  $block_booster_classes[] = 'block-booster-flexbox--inline-flex';
} else if ($block_booster_display == 'none') {
  $block_booster_classes[] = 'block-booster-flexbox--none';
}

if ($block_booster_tabletDisplay == 'flex') {
  $block_booster_classes[] = 'block-booster-flexbox--tablet-flex';
} else if ($block_booster_tabletDisplay == 'inline-flex') {
  $block_booster_classes[] = 'block-booster-flexbox--tablet-inline-flex';
} else if ($block_booster_tabletDisplay == 'none') {
  $block_booster_classes[] = 'block-booster-flexbox--tablet-none';
}

if ($block_booster_mobileDisplay == 'flex') {
  $block_booster_classes[] = 'block-booster-flexbox--mobile-flex';
} else if ($block_booster_mobileDisplay == 'inline-flex') {
  $block_booster_classes[] = 'block-booster-flexbox--mobile-inline-flex';
} else if ($block_booster_mobileDisplay == 'none') {
  $block_booster_classes[] = 'block-booster-flexbox--mobile-none';
}

if ($block_booster_justifyContent) {
  $block_booster_classes[] = 'block-booster-flexbox--justify-' . $block_booster_justifyContent;
}
if ($block_booster_tabletJustifyContent) {
  $block_booster_classes[] = 'block-booster-flexbox--justify-tablet-' . $block_booster_tabletJustifyContent;
}
if ($block_booster_mobileJustifyContent) {
  $block_booster_classes[] = 'block-booster-flexbox--justify-mobile-' . $block_booster_mobileJustifyContent;
}

if ($block_booster_alignItems) {
  $block_booster_classes[] = 'block-booster-flexbox--align-' . $block_booster_alignItems;
}
if ($block_booster_tabletAlignItems) {
  $block_booster_classes[] = 'block-booster-flexbox--align-tablet-' . $block_booster_tabletAlignItems;
}
if ($block_booster_mobileAlignItems) {
  $block_booster_classes[] = 'block-booster-flexbox--align-mobile-' . $block_booster_mobileAlignItems;
}

$block_booster_columnGapUnit = !empty($attributes['columnGapUnit']) ? $attributes['columnGapUnit'] : 'px';
$block_booster_tabletColumnGapUnit = !empty($attributes['tabletColumnGapUnit']) ? $attributes['tabletColumnGapUnit'] : 'px';
$block_booster_mobileColumnGapUnit = !empty($attributes['mobileColumnGapUnit']) ? $attributes['mobileColumnGapUnit'] : 'px';

$block_booster_rowGapUnit = !empty($attributes['rowGapUnit']) ? $attributes['rowGapUnit'] : 'px';
$block_booster_tabletRowGapUnit = !empty($attributes['tabletRowGapUnit']) ? $attributes['tabletRowGapUnit'] : 'px';
$block_booster_mobileRowGapUnit = !empty($attributes['mobileRowGapUnit']) ? $attributes['mobileRowGapUnit'] : 'px';

$block_booster_columnGap = !empty($attributes['columnGap']) && $attributes['columnGap'] > 0 ? $attributes['columnGap'] . $block_booster_columnGapUnit : 0;
$block_booster_tabletColumnGap = !empty($attributes['tabletColumnGap']) && $attributes['tabletColumnGap'] > 0 ? $attributes['tabletColumnGap'] . $block_booster_tabletColumnGapUnit : 0;
$block_booster_mobileColumnGap = !empty($attributes['mobileColumnGap']) && $attributes['mobileColumnGap'] > 0 ? $attributes['mobileColumnGap'] . $block_booster_mobileColumnGapUnit : 0;

$block_booster_rowGap = !empty($attributes['rowGap']) && $attributes['rowGap'] > 0 ? $attributes['rowGap'] . $block_booster_rowGapUnit : 0;
$block_booster_tabletRowGap = !empty($attributes['tabletRowGap']) && $attributes['tabletRowGap'] > 0 ? $attributes['tabletRowGap'] . $block_booster_tabletRowGapUnit : 0;
$block_booster_mobileRowGap = !empty($attributes['mobileRowGap']) && $attributes['mobileRowGap'] > 0 ? $attributes['mobileRowGap'] . $block_booster_mobileRowGapUnit : 0;

$block_booster_additional_attributes['class'] = join(' ', $block_booster_classes);
$block_booster_additional_attributes['id'] = 'block-booster-' . uniqid();

$block_booster_MobileStyles = ($block_booster_widthType == 'custom' && $block_booster_width != '') || $block_booster_columnGap || $block_booster_rowGap;
$block_booster_hasMobileStyles = ($block_booster_tabletWidthType == 'custom' && $block_booster_tabletWidth != '') || $block_booster_tabletColumnGap || $block_booster_tabletRowGap;
$block_booster_hasTabletStyles = ($block_booster_mobileWidthType == 'custom' && $block_booster_mobileWidth != '') || $block_booster_mobileColumnGap || $block_booster_mobileRowGap;

?>
<div <?php echo get_block_wrapper_attributes($block_booster_additional_attributes); ?>>
  <?php

  if (!empty($block->inner_blocks)) {
    foreach ($block->inner_blocks as $block_booster_inner_block) {
      echo render_block($block_booster_inner_block);
    }
  }

  ?>
</div>
<?php if ($block_booster_MobileStyles || $block_booster_hasMobileStyles || $block_booster_hasTabletStyles): ?>
  <style>
    @media only screen {
      #<?php echo esc_attr($block_booster_additional_attributes['id']); ?> {
        <?php echo $block_booster_widthType == 'custom' && $block_booster_width != '' ? esc_attr("width: {$block_booster_width};") : ''; ?>
        <?php echo $block_booster_columnGap ? esc_attr("column-gap: {$block_booster_columnGap};") : ''; ?>
        <?php echo $block_booster_rowGap ? esc_attr("row-gap: {$block_booster_rowGap};") : ''; ?>
      }
    }

    @media only screen and (max-width:
      <?php echo esc_html(BLOCK_BOOSTER_MAX_TABLET_BREAKING_POINT); ?>
    ) {
      #<?php echo esc_attr($block_booster_additional_attributes['id']); ?> {
        <?php echo $block_booster_tabletWidthType == 'custom' && $block_booster_tabletWidth != '' ? esc_attr("width: {$block_booster_tabletWidth};") : ''; ?>
        <?php echo $block_booster_tabletColumnGap ? esc_attr("column-gap: {$block_booster_tabletColumnGap};") : ''; ?>
        <?php echo $block_booster_tabletRowGap ? esc_attr("row-gap: {$block_booster_tabletRowGap};") : ''; ?>
      }
    }

    @media only screen and (max-width:
      <?php echo esc_html(BLOCK_BOOSTER_MAX_MOBILE_BREAKING_POINT); ?>
    ) {
      #<?php echo esc_attr($block_booster_additional_attributes['id']); ?> {
        <?php echo $block_booster_mobileWidthType == 'custom' && $block_booster_mobileWidth != '' ? esc_attr("width: {$block_booster_mobileWidth};") : ''; ?>
        <?php echo $block_booster_mobileColumnGap ? esc_attr("column-gap: {$block_booster_mobileColumnGap};") : ''; ?>
        <?php echo $block_booster_mobileRowGap ? esc_attr("row-gap: {$block_booster_mobileRowGap};") : ''; ?>
      }
    }
  </style>
<?php endif; ?>