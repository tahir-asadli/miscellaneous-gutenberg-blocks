<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}
$misc_gutenberg_blocks_vertical = !empty($attributes['vertical']) && $attributes['vertical'] == true ? true : false;
$misc_gutenberg_blocks_isLink = !empty($attributes['isLink']) && $attributes['isLink'] == true ? true : false;
$misc_gutenberg_blocks_disable_css = !empty($attributes['disable_css']) && $attributes['disable_css'] == 1;
$misc_gutenberg_blocks_categoryName = !empty($attributes['categoryName']) ? $attributes['categoryName'] : '';
$misc_gutenberg_blocks_categoryCount = !empty($attributes['categoryCount']) ? $attributes['categoryCount'] : '';
$misc_gutenberg_blocks_categoryUrl = !empty($attributes['categoryUrl']) ? $attributes['categoryUrl'] : '';
$misc_gutenberg_blocks_postNamePlural = !empty($attributes['postNamePlural']) ? $attributes['postNamePlural'] : '';
$misc_gutenberg_blocks_postNameSingular = !empty($attributes['postNameSingular']) ? $attributes['postNameSingular'] : '';
$misc_gutenberg_blocks_imageName = !empty($attributes['imageName']) ? $attributes['imageName'] : '';
$misc_gutenberg_blocks_imageUrl = !empty($attributes['imageUrl']) ? $attributes['imageUrl'] : '';




$misc_gutenberg_blocks_gap = !empty($attributes['gap']) ? $attributes['gap'] : '0';
$misc_gutenberg_blocks_imageWidth = !empty($attributes['imageWidth']) ? $attributes['imageWidth'] : '0';

$misc_gutenberg_blocks_classes = [];
if ($misc_gutenberg_blocks_vertical) {
  $misc_gutenberg_blocks_classes[] = 'wp-block-misc-gutenberg-blocks-category-card--vertical';
}
$misc_gutenberg_blocks_additional_attributes['class'] = join(' ', $misc_gutenberg_blocks_classes);
$misc_gutenberg_blocks_additional_attributes['id'] = 'misc-gutenberg-blocks-' . uniqid();
$misc_gutenberg_blocks_categories = get_categories();
$misc_gutenberg_blocks_imageExtension = '';
if ($misc_gutenberg_blocks_imageUrl) {
  $misc_gutenberg_blocks_imageExtension = pathinfo($misc_gutenberg_blocks_imageUrl, PATHINFO_EXTENSION);
}
$misc_gutenberg_blocks_tagName = $misc_gutenberg_blocks_isLink ? 'a' : 'div';
$misc_gutenberg_blocks_href = $misc_gutenberg_blocks_isLink ? ' href="' . $misc_gutenberg_blocks_categoryUrl . '" ' : '';
?>
<<?php echo esc_html($misc_gutenberg_blocks_tagName); ?> <?php echo esc_html($misc_gutenberg_blocks_href); ?> <?php echo esc_html(get_block_wrapper_attributes($misc_gutenberg_blocks_additional_attributes)); ?>> <div class="wp-block-misc-gutenberg-blocks-category-card--left">
    <span class="wp-block-misc-gutenberg-blocks-category-card--image-wrapper wp-block-misc-gutenberg-blocks-category-card--type-<?php echo esc_html($misc_gutenberg_blocks_imageExtension); ?>">
      <img src="<?php echo esc_html($misc_gutenberg_blocks_imageUrl); ?>" alt="<?php echo esc_html($misc_gutenberg_blocks_imageName); ?>">
    </span>
  </div>
  <div class="wp-block-misc-gutenberg-blocks-category-card--right">
    <?php if ($misc_gutenberg_blocks_categoryName) { ?>
      <span class="wp-block-misc-gutenberg-blocks-category-card--name"><?php echo esc_html($misc_gutenberg_blocks_categoryName); ?></span>
    <?php } ?>
    <?php if ($misc_gutenberg_blocks_categoryCount) { ?>
      <span class="wp-block-misc-gutenberg-blocks-category-card--count"><?php echo esc_html($misc_gutenberg_blocks_categoryCount); ?>&nbsp;<?php echo $misc_gutenberg_blocks_categoryCount > 1 ? esc_html($misc_gutenberg_blocks_postNamePlural) : esc_html($misc_gutenberg_blocks_postNameSingular); ?></span>
    <?php } ?>
  </div>
</<?php echo esc_html($misc_gutenberg_blocks_tagName); ?>> <style>
  #<?php echo esc_html($misc_gutenberg_blocks_additional_attributes['id']); ?> {

    <?php if ($misc_gutenberg_blocks_gap) { ?>
      <?php echo esc_html("gap: {$misc_gutenberg_blocks_gap}px;") ?>
    <?php } ?>
    <?php if ($misc_gutenberg_blocks_imageWidth) { ?>
      .wp-block-misc-gutenberg-blocks-category-card--image-wrapper {
        <?php echo esc_html("width: {$misc_gutenberg_blocks_imageWidth}px;") ?>
        <?php echo esc_html("height: {$misc_gutenberg_blocks_imageWidth}px;") ?>
        <?php echo esc_html("border-radius: {$misc_gutenberg_blocks_imageWidth}px;") ?>
      }

    <?php } ?>
  }
</style>