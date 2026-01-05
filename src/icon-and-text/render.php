<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}
$misc_gutenberg_blocks_reversed = !empty($attributes['reversed']) && $attributes['reversed'] == 1;
$misc_gutenberg_blocks_tabletReversed = !empty($attributes['tabletReversed']) && $attributes['tabletReversed'] == 1;
$misc_gutenberg_blocks_mobileReversed = !empty($attributes['mobileReversed']) && $attributes['mobileReversed'] == 1;
$misc_gutenberg_blocks_stacked = !empty($attributes['stacked']) && $attributes['stacked'] == 1;
$misc_gutenberg_blocks_tabletStacked = !empty($attributes['tabletStacked']) && $attributes['tabletStacked'] == 1;
$misc_gutenberg_blocks_mobileStacked = !empty($attributes['mobileStacked']) && $attributes['mobileStacked'] == 1;
$misc_gutenberg_blocks_gap = !empty($attributes['gap']) ? $attributes['gap'] : 0;
$misc_gutenberg_blocks_tabletGap = !empty($attributes['tabletGap']) ? $attributes['tabletGap'] : 0;
$misc_gutenberg_blocks_mobileGap = !empty($attributes['mobileGap']) ? $attributes['mobileGap'] : 0;
$misc_gutenberg_blocks_svgColor = !empty($attributes['svgColor']) ? $attributes['svgColor'] : '';
$misc_gutenberg_blocks_imageWidth = !empty($attributes['imageWidth']) ? $attributes['imageWidth'] : '';
$misc_gutenberg_blocks_imageContent = !empty($attributes['imageContent']) ? $attributes['imageContent'] : '';
$misc_gutenberg_blocks_text = !empty($attributes['text']) ? $attributes['text'] : '';
$misc_gutenberg_blocks_classes = [];
if ($misc_gutenberg_blocks_reversed) {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-icon-and-text--is-reversed';
}
if ($misc_gutenberg_blocks_tabletReversed) {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-icon-and-text--tablet-is-reversed';
}
if ($misc_gutenberg_blocks_mobileReversed) {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-icon-and-text--mobile-is-reversed';
}

if ($misc_gutenberg_blocks_stacked) {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-icon-and-text--is-stacked';
}
if ($misc_gutenberg_blocks_tabletStacked) {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-icon-and-text--tablet-is-stacked';
}
if ($misc_gutenberg_blocks_mobileStacked) {
  $misc_gutenberg_blocks_classes[] = 'misc-gutenberg-blocks-icon-and-text--mobile-is-stacked';
}


$misc_gutenberg_blocks_additional_attributes['class'] = join(' ', $misc_gutenberg_blocks_classes);
$misc_gutenberg_blocks_additional_attributes['id'] = 'misc-gutenberg-blocks-' . uniqid();
?>
<div <?php echo esc_html(get_block_wrapper_attributes($misc_gutenberg_blocks_additional_attributes)); ?>>
  <div class="misc-gutenberg-blocks-icon-and-text--left">
    <?php if (!empty($attributes['imageUrl'])) { ?>
      <?php if (str_ends_with($attributes['imageUrl'], '.svg')) { ?>
        <?php echo esc_html($misc_gutenberg_blocks_imageContent); ?>
      <?php } else { ?>
        <img style="width: <?php echo esc_html($misc_gutenberg_blocks_imageWidth); ?>px" src="<?php echo esc_html($attributes['imageUrl']); ?>" alt="<?php echo esc_html($attributes['imageName']); ?>">
      <?php } ?>
    <?php } ?>
  </div>
  <div class="misc-gutenberg-blocks-icon-and-text--right">
    <?php echo esc_html($misc_gutenberg_blocks_text); ?>
  </div>
</div>
<style>
  #<?php echo esc_html($misc_gutenberg_blocks_additional_attributes['id']); ?> svg {
    <?php if ($misc_gutenberg_blocks_svgColor) { ?>
      <?php echo esc_html("color: { $misc_gutenberg_blocks_svgColor};") ?>
    <?php } ?>
    <?php echo esc_html("width: { $misc_gutenberg_blocks_imageWidth }px;") ?>
  }

  @media only screen and (min-width:
    <?php echo esc_html(MISC_GUTENBERG_BLOCKS_MIN_DESKTOP_BREAKING_POINT); ?>
  ) {
    #<?php echo esc_html($misc_gutenberg_blocks_additional_attributes['id']); ?> {
      <?php echo esc_html("gap: { $misc_gutenberg_blocks_gap }px;") ?>
    }
  }

  @media only screen and (min-width:
    <?php echo esc_html(MISC_GUTENBERG_BLOCKS_MIN_TABLET_BREAKING_POINT); ?>
  ) and (max-width:
    <?php echo esc_html(MISC_GUTENBERG_BLOCKS_MAX_TABLET_BREAKING_POINT); ?>
  ) {
    #<?php echo esc_html($misc_gutenberg_blocks_additional_attributes['id']); ?> {
      <?php echo esc_html("gap: { $misc_gutenberg_blocks_tabletGap }px;") ?>
    }
  }

  @media only screen and (max-width:
    <?php echo esc_html(MISC_GUTENBERG_BLOCKS_MAX_MOBILE_BREAKING_POINT); ?>
  ) {
    #<?php echo esc_html($misc_gutenberg_blocks_additional_attributes['id']); ?> {
      <?php echo esc_html("gap: { $misc_gutenberg_blocks_mobileGap }px;") ?>
    }
  }
</style>