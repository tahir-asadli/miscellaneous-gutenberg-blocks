<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}
$block_booster_reversed = !empty($attributes['reversed']) && $attributes['reversed'] == 1;
$block_booster_tabletReversed = !empty($attributes['mgb_tabletReversed']) && $attributes['mgb_tabletReversed'] == 1;
$block_booster_mobileReversed = !empty($attributes['mobileReversed']) && $attributes['mobileReversed'] == 1;
$block_booster_stacked = !empty($attributes['stacked']) && $attributes['stacked'] == 1;
$block_booster_tabletStacked = !empty($attributes['tabletStacked']) && $attributes['tabletStacked'] == 1;
$block_booster_mobileStacked = !empty($attributes['mobileStacked']) && $attributes['mobileStacked'] == 1;
$block_booster_gap = !empty($attributes['gap']) ? $attributes['gap'] : 0;
$block_booster_tabletGap = !empty($attributes['tabletGap']) ? $attributes['tabletGap'] : 0;
$block_booster_mobileGap = !empty($attributes['mobileGap']) ? $attributes['mobileGap'] : 0;
$block_booster_hasSingleChild = count($block->inner_blocks) == 1;
$block_booster_classes = [];
if ($block_booster_reversed) {
  $block_booster_classes[] = 'block-booster-media-and-text--is-reversed';
}
if ($block_booster_tabletReversed) {
  $block_booster_classes[] = 'block-booster-media-and-text--tablet-is-reversed';
}
if ($block_booster_mobileReversed) {
  $block_booster_classes[] = 'block-booster-media-and-text--mobile-is-reversed';
}

if ($block_booster_stacked) {
  $block_booster_classes[] = 'block-booster-media-and-text--is-stacked';
}
if ($block_booster_tabletStacked) {
  $block_booster_classes[] = 'block-booster-media-and-text--tablet-is-stacked';
}
if ($block_booster_mobileStacked) {
  $block_booster_classes[] = 'block-booster-media-and-text--mobile-is-stacked';
}


if ($block_booster_hasSingleChild) {
  $block_booster_classes[] = 'block-booster-media-and-text--single-child';
}
$block_booster_additional_attributes['class'] = join(' ', $block_booster_classes);
$block_booster_additional_attributes['id'] = 'block-booster-' . uniqid();
?>
<div <?php echo esc_html(get_block_wrapper_attributes($block_booster_additional_attributes));
; ?>>
  <div class="block-booster-media-and-text--left">
    <?php if (!empty($attributes['imageUrl'])) { ?>
          <img src="<?php echo esc_html($attributes['imageUrl']);
          ; ?>" alt="<?php echo esc_html($attributes['imageName']);
           ; ?>">
    <?php } ?>
  </div>
  <div class="block-booster-media-and-text--right">
    <?php

    if (!empty($block->inner_blocks)) {
      foreach ($block->inner_blocks as $block_booster_inner_block) {
        echo '<div>' . wp_kses_post($block_booster_inner_block->render()) . '</div>';
      }
    }

    ?>
  </div>
</div>
<style>
  @media only screen and (min-width:
    <?php echo esc_html(BLOCK_BOOSTER_MIN_DESKTOP_BREAKING_POINT);
    ; ?>
  ) {
    #<?php echo esc_html($block_booster_additional_attributes['id']);
    ; ?> {
      <?php echo esc_html("gap: {$block_booster_gap}px;"); ?>
    }
  }

  @media only screen and (min-width:
    <?php echo esc_html(BLOCK_BOOSTER_MIN_TABLET_BREAKING_POINT);
    ; ?>
  ) and (max-width:
    <?php echo esc_html(BLOCK_BOOSTER_MAX_TABLET_BREAKING_POINT);
    ; ?>
  ) {
    #<?php echo esc_html($block_booster_additional_attributes['id']);
    ; ?> {
      <?php echo esc_html("gap: {$block_booster_tabletGap}px;"); ?>
    }
  }

  @media only screen and (max-width:
    <?php echo esc_html(BLOCK_BOOSTER_MAX_MOBILE_BREAKING_POINT);
    ; ?>
  ) {
    #<?php echo esc_html($block_booster_additional_attributes['id']);
    ; ?> {
      <?php echo esc_html("gap: {$block_booster_mobileGap}px;"); ?>
    }
  }
</style>