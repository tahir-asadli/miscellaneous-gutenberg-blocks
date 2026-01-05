<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}
$misc_gutenberg_blocks_showCategory = !empty($attributes['showCategory']) && $attributes['showCategory'] == 1;
$misc_gutenberg_blocks_showSearchIcon = !empty($attributes['showSearchIcon']) && $attributes['showSearchIcon'] == 1;
$misc_gutenberg_blocks_disableCSS = !empty($attributes['disableCSS']) && $attributes['disableCSS'] == 1;
$misc_gutenberg_blocks_searchPlaceholder = !empty($attributes['searchPlaceholder']) ? $attributes['searchPlaceholder'] : '';
$misc_gutenberg_blocks_categoryText = !empty($attributes['categoryText']) ? $attributes['categoryText'] : '';
$misc_gutenberg_blocks_buttonText = !empty($attributes['buttonText']) ? $attributes['buttonText'] : '';
$misc_gutenberg_blocks_height = !empty($attributes['height']) && (int) $attributes['height'] > 0 ? (int) $attributes['height'] : '0';
$misc_gutenberg_blocks_width = !empty($attributes['width']) && (int) $attributes['width'] > 0 ? (int) $attributes['width'] : '0';

$misc_gutenberg_blocks_classes = [];
if (!$misc_gutenberg_blocks_disableCSS) {
  $misc_gutenberg_blocks_classes[] = 'has-style';
}
if ($misc_gutenberg_blocks_showSearchIcon) {
  $misc_gutenberg_blocks_classes[] = 'show-search-icon';
}
if ($misc_gutenberg_blocks_showCategory) {
  $misc_gutenberg_blocks_classes[] = 'show-category';
}
$misc_gutenberg_blocks_additional_attributes['class'] = join(' ', $misc_gutenberg_blocks_classes);
$misc_gutenberg_blocks_additional_attributes['id'] = 'misc-gutenberg-blocks-' . uniqid();
$misc_gutenberg_blocks_categories = get_categories();
?>
<div class="misc-gutenberg-blocks-search-container">
  <form action="/">
    <div <?php echo esc_html(get_block_wrapper_attributes($misc_gutenberg_blocks_additional_attributes)); ?>>
      <?php if ($misc_gutenberg_blocks_showCategory && !empty($misc_gutenberg_blocks_categories)) { ?>
        <select name="cat" class="search-category">
          <?php if ($misc_gutenberg_blocks_categoryText != '') { ?>
            <option value=""><?php echo esc_html($misc_gutenberg_blocks_categoryText); ?></option>
          <?php } ?>
          <?php foreach ($misc_gutenberg_blocks_categories as $misc_gutenberg_blocks_category) { ?>
            <option <?php echo get_query_var('cat') == $misc_gutenberg_blocks_category->term_id ? 'selected' : ''; ?> value="<?php echo esc_html($misc_gutenberg_blocks_category->term_id); ?>"><?php echo esc_html($misc_gutenberg_blocks_category->name); ?></option>
          <?php } ?>
        </select>
      <?php } ?>
      <input name="s" type="search" value="<?php echo esc_html(get_query_var('s')); ?>" class="search-input" placeholder="<?php echo esc_html($misc_gutenberg_blocks_searchPlaceholder); ?>" />
      <button type="submit" class="search-button"><?php echo !$misc_gutenberg_blocks_showSearchIcon && $misc_gutenberg_blocks_buttonText ? esc_html($misc_gutenberg_blocks_buttonText) : '&nbsp;' ?></button>
    </div>
  </form>
</div>
<style>
  #<?php echo esc_html($misc_gutenberg_blocks_additional_attributes['id']); ?> {
    <?php if ($misc_gutenberg_blocks_height > 0) { ?>
      <?php echo esc_html("height: {$misc_gutenberg_blocks_height}px;") ?>
    <?php } ?>
    <?php if ($misc_gutenberg_blocks_width > 0) { ?>
      <?php echo esc_html("width: {$misc_gutenberg_blocks_width}px;") ?>
    <?php } ?>
  }
</style>