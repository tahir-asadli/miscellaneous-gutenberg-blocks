<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}
$misc_gutenberg_blocks_reversed = !empty($attributes['reversed']) && $attributes['reversed'] == 1;
$misc_gutenberg_blocks_tabletReversed = !empty($attributes['mgb_tabletReversed']) && $attributes['mgb_tabletReversed'] == 1;
$misc_gutenberg_blocks_mobileReversed = !empty($attributes['mobileReversed']) && $attributes['mobileReversed'] == 1;
$misc_gutenberg_blocks_stacked = !empty($attributes['stacked']) && $attributes['stacked'] == 1;
$misc_gutenberg_blocks_tabletStacked = !empty($attributes['tabletStacked']) && $attributes['tabletStacked'] == 1;
$misc_gutenberg_blocks_mobileStacked = !empty($attributes['mobileStacked']) && $attributes['mobileStacked'] == 1;
$misc_gutenberg_blocks_gap = !empty($attributes['gap']) ? $attributes['gap'] : 0;
$misc_gutenberg_blocks_tabletGap = !empty($attributes['tabletGap']) ? $attributes['tabletGap'] : 0;
$misc_gutenberg_blocks_mobileGap = !empty($attributes['mobileGap']) ? $attributes['mobileGap'] : 0;
$misc_gutenberg_blocks_hasSingleChild = count($block->inner_blocks) == 1;
$misc_gutenberg_blocks_classes = [];
if ($misc_gutenberg_blocks_reversed) {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-media-and-text--is-reversed';
}
if ($misc_gutenberg_blocks_tabletReversed) {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-media-and-text--tablet-is-reversed';
}
if ($misc_gutenberg_blocks_mobileReversed) {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-media-and-text--mobile-is-reversed';
}

if ($misc_gutenberg_blocks_stacked) {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-media-and-text--is-stacked';
}
if ($misc_gutenberg_blocks_tabletStacked) {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-media-and-text--tablet-is-stacked';
}
if ($misc_gutenberg_blocks_mobileStacked) {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-media-and-text--mobile-is-stacked';
}


if ($misc_gutenberg_blocks_hasSingleChild) {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-media-and-text--single-child';
}
$misc_gutenberg_blocks_additional_attributes['class'] = join(' ', $misc_gutenberg_blocks_classes);
$misc_gutenberg_blocks_additional_attributes['id'] = 'misc-gutenberg-blocks-' . uniqid();
?>
<div <?php echo esc_html(get_block_wrapper_attributes($misc_gutenberg_blocks_additional_attributes));
; ?>>
  <div class="misc-gutenberg-blocks-media-and-text--left">
    <?php if (!empty($attributes['imageUrl'])) { ?>
      <img src="<?php echo esc_html($attributes['imageUrl']);
      ; ?>" alt="<?php echo esc_html($attributes['imageName']);
       ; ?>">
    <?php } ?>
  </div>
  <div class="misc-gutenberg-blocks-media-and-text--right">
    <?php

    if (!empty($block->inner_blocks)) {
      foreach ($block->inner_blocks as $misc_gutenberg_blocks_inner_block) {
        echo '<div>' . wp_kses_post($misc_gutenberg_blocks_inner_block->render()) . '</div>';
      }
    }

    ?>
  </div>
</div>
<style>
  @media only screen and (min-width:
    <?php echo esc_html(MISC_GUTENBERG_BLOCKS_MIN_DESKTOP_BREAKING_POINT);
    ; ?>
  ) {
    #<?php echo esc_html($misc_gutenberg_blocks_additional_attributes['id']);
    ; ?> {
      <?php echo esc_html("gap: {$misc_gutenberg_blocks_gap}px;"); ?>
    }
  }

  @media only screen and (min-width:
    <?php echo esc_html(MISC_GUTENBERG_BLOCKS_MIN_TABLET_BREAKING_POINT);
    ; ?>
  ) and (max-width:
    <?php echo esc_html(MISC_GUTENBERG_BLOCKS_MAX_TABLET_BREAKING_POINT);
    ; ?>
  ) {
    #<?php echo esc_html($misc_gutenberg_blocks_additional_attributes['id']);
    ; ?> {
      <?php echo esc_html("gap: {$misc_gutenberg_blocks_tabletGap}px;"); ?>
    }
  }

  @media only screen and (max-width:
    <?php echo esc_html(MISC_GUTENBERG_BLOCKS_MAX_MOBILE_BREAKING_POINT);
    ; ?>
  ) {
    #<?php echo esc_html($misc_gutenberg_blocks_additional_attributes['id']);
    ; ?> {
      <?php echo esc_html("gap: {$misc_gutenberg_blocks_mobileGap}px;"); ?>
    }
  }
</style>