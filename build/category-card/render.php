<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}
$block_booster_vertical = !empty($attributes['vertical']) && $attributes['vertical'] == true ? true : false;
$block_booster_isLink = !empty($attributes['isLink']) && $attributes['isLink'] == true ? true : false;
$block_booster_disable_css = !empty($attributes['disable_css']) && $attributes['disable_css'] == 1;
$block_booster_categoryName = !empty($attributes['categoryName']) ? $attributes['categoryName'] : '';
$block_booster_categoryCount = !empty($attributes['categoryCount']) ? $attributes['categoryCount'] : '';
$block_booster_categoryUrl = !empty($attributes['categoryUrl']) ? $attributes['categoryUrl'] : '';
$block_booster_postNamePlural = !empty($attributes['postNamePlural']) ? $attributes['postNamePlural'] : '';
$block_booster_postNameSingular = !empty($attributes['postNameSingular']) ? $attributes['postNameSingular'] : '';
$block_booster_imageName = !empty($attributes['imageName']) ? $attributes['imageName'] : '';
$block_booster_imageUrl = !empty($attributes['imageUrl']) ? $attributes['imageUrl'] : '';




$block_booster_gap = !empty($attributes['gap']) ? $attributes['gap'] : '0';
$block_booster_imageWidth = !empty($attributes['imageWidth']) ? $attributes['imageWidth'] : '0';

$block_booster_classes = [];
if ($block_booster_vertical) {
  $block_booster_classes[] = 'wp-block-block-booster-category-card--vertical';
}
$block_booster_additional_attributes['class'] = join(' ', $block_booster_classes);
$block_booster_additional_attributes['id'] = 'block-booster-' . uniqid();
$block_booster_categories = get_categories();
$block_booster_imageExtension = '';
if ($block_booster_imageUrl) {
  $block_booster_imageExtension = pathinfo($block_booster_imageUrl, PATHINFO_EXTENSION);
}
$block_booster_tagName = $block_booster_isLink ? 'a' : 'div';
$block_booster_href = $block_booster_isLink ? ' href="' . $block_booster_categoryUrl . '" ' : '';
?>
<<?php echo esc_html($block_booster_tagName); ?> <?php echo esc_html($block_booster_href); ?> <?php echo esc_html(get_block_wrapper_attributes($block_booster_additional_attributes)); ?>> <div class="wp-block-block-booster-category-card--left">
    <span class="wp-block-block-booster-category-card--image-wrapper wp-block-block-booster-category-card--type-<?php echo esc_html($block_booster_imageExtension); ?>">
      <img src="<?php echo esc_html($block_booster_imageUrl); ?>" alt="<?php echo esc_html($block_booster_imageName); ?>">
    </span>
  </div>
  <div class="wp-block-block-booster-category-card--right">
    <?php if ($block_booster_categoryName) { ?>
        <span class="wp-block-block-booster-category-card--name"><?php echo esc_html($block_booster_categoryName); ?></span>
    <?php } ?>
    <?php if ($block_booster_categoryCount) { ?>
        <span class="wp-block-block-booster-category-card--count"><?php echo esc_html($block_booster_categoryCount); ?>&nbsp;<?php echo $block_booster_categoryCount > 1 ? esc_html($block_booster_postNamePlural) : esc_html($block_booster_postNameSingular); ?></span>
    <?php } ?>
  </div>
</<?php echo esc_html($block_booster_tagName); ?>> <style>
  #<?php echo esc_html($block_booster_additional_attributes['id']); ?> {

    <?php if ($block_booster_gap) { ?>
        <?php echo esc_html("gap: {$block_booster_gap}px;") ?>
    <?php } ?>
    <?php if ($block_booster_imageWidth) { ?>
        .wp-block-block-booster-category-card--image-wrapper {
          <?php echo esc_html("width: {$block_booster_imageWidth}px;") ?>
          <?php echo esc_html("height: {$block_booster_imageWidth}px;") ?>
          <?php echo esc_html("border-radius: {$block_booster_imageWidth}px;") ?>
        }

    <?php } ?>
  }
</style>