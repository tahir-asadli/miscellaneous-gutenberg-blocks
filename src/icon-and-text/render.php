<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}
$block_booster_reversed = !empty($attributes['reversed']) && $attributes['reversed'] == 1;
$block_booster_tabletReversed = !empty($attributes['tabletReversed']) && $attributes['tabletReversed'] == 1;
$block_booster_mobileReversed = !empty($attributes['mobileReversed']) && $attributes['mobileReversed'] == 1;
$block_booster_stacked = !empty($attributes['stacked']) && $attributes['stacked'] == 1;
$block_booster_tabletStacked = !empty($attributes['tabletStacked']) && $attributes['tabletStacked'] == 1;
$block_booster_mobileStacked = !empty($attributes['mobileStacked']) && $attributes['mobileStacked'] == 1;
$block_booster_gap = !empty($attributes['gap']) ? $attributes['gap'] : 0;
$block_booster_tabletGap = !empty($attributes['tabletGap']) ? $attributes['tabletGap'] : 0;
$block_booster_mobileGap = !empty($attributes['mobileGap']) ? $attributes['mobileGap'] : 0;
$block_booster_svgColor = !empty($attributes['svgColor']) ? $attributes['svgColor'] : '';
$block_booster_imageWidth = !empty($attributes['imageWidth']) ? $attributes['imageWidth'] : '';
$block_booster_imageContent = !empty($attributes['imageContent']) ? $attributes['imageContent'] : '';
$block_booster_text = !empty($attributes['text']) ? $attributes['text'] : '';
$block_booster_classes = [];
if ($block_booster_reversed) {
  $block_booster_classes[] = 'block-booster-icon-and-text--is-reversed';
}
if ($block_booster_tabletReversed) {
  $block_booster_classes[] = 'block-booster-icon-and-text--tablet-is-reversed';
}
if ($block_booster_mobileReversed) {
  $block_booster_classes[] = 'block-booster-icon-and-text--mobile-is-reversed';
}

if ($block_booster_stacked) {
  $block_booster_classes[] = 'block-booster-icon-and-text--is-stacked';
}
if ($block_booster_tabletStacked) {
  $block_booster_classes[] = 'block-booster-icon-and-text--tablet-is-stacked';
}
if ($block_booster_mobileStacked) {
  $block_booster_classes[] = 'block-booster-icon-and-text--mobile-is-stacked';
}


$block_booster_additional_attributes['class'] = join(' ', $block_booster_classes);
$block_booster_additional_attributes['id'] = 'block-booster-' . uniqid();
?>
<div <?php echo get_block_wrapper_attributes($block_booster_additional_attributes); ?>>
  <div class="block-booster-icon-and-text--left">
    <?php if (!empty($attributes['imageUrl'])) { ?>
      <?php if (substr($attributes['imageUrl'], -4) === '.svg') { ?>
        <?php echo esc_html($block_booster_imageContent); ?>
      <?php } else { ?>
        <img style="width: <?php echo esc_attr($block_booster_imageWidth); ?>px" src="<?php echo esc_url($attributes['imageUrl']); ?>" alt="<?php echo esc_attr($attributes['imageName']); ?>">
      <?php } ?>
    <?php } ?>
  </div>
  <div class="block-booster-icon-and-text--right">
    <?php echo esc_html($block_booster_text); ?>
  </div>
</div>
<style>
  #<?php echo esc_attr($block_booster_additional_attributes['id']); ?> svg {
    <?php if ($block_booster_svgColor) { ?>
      <?php echo esc_html("color: { $block_booster_svgColor};") ?>
    <?php } ?>
    <?php echo esc_html("width: { $block_booster_imageWidth }px;") ?>
  }

  @media only screen and (min-width:
    <?php echo esc_html(BLOCK_BOOSTER_MIN_DESKTOP_BREAKING_POINT); ?>
  ) {
    #<?php echo esc_attr($block_booster_additional_attributes['id']); ?> {
      <?php echo esc_html("gap: { $block_booster_gap }px;") ?>
    }
  }

  @media only screen and (min-width:
    <?php echo esc_html(BLOCK_BOOSTER_MIN_TABLET_BREAKING_POINT); ?>
  ) and (max-width:
    <?php echo esc_html(BLOCK_BOOSTER_MAX_TABLET_BREAKING_POINT); ?>
  ) {
    #<?php echo esc_attr($block_booster_additional_attributes['id']); ?> {
      <?php echo esc_html("gap: { $block_booster_tabletGap }px;") ?>
    }
  }

  @media only screen and (max-width:
    <?php echo esc_html(BLOCK_BOOSTER_MAX_MOBILE_BREAKING_POINT); ?>
  ) {
    #<?php echo esc_attr($block_booster_additional_attributes['id']); ?> {
      <?php echo esc_html("gap: { $block_booster_mobileGap }px;") ?>
    }
  }
</style>