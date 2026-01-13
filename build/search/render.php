<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}
$block_booster_showCategory = !empty($attributes['showCategory']) && $attributes['showCategory'] == 1;
$block_booster_showSearchIcon = !empty($attributes['showSearchIcon']) && $attributes['showSearchIcon'] == 1;
$block_booster_disableCSS = !empty($attributes['disableCSS']) && $attributes['disableCSS'] == 1;
$block_booster_searchPlaceholder = !empty($attributes['searchPlaceholder']) ? $attributes['searchPlaceholder'] : '';
$block_booster_categoryText = !empty($attributes['categoryText']) ? $attributes['categoryText'] : '';
$block_booster_buttonText = !empty($attributes['buttonText']) ? $attributes['buttonText'] : '';
$block_booster_height = !empty($attributes['height']) && (int) $attributes['height'] > 0 ? (int) $attributes['height'] : '0';
$block_booster_width = !empty($attributes['width']) && (int) $attributes['width'] > 0 ? (int) $attributes['width'] : '0';

$block_booster_classes = [];
if (!$block_booster_disableCSS) {
  $block_booster_classes[] = 'has-style';
}
if ($block_booster_showSearchIcon) {
  $block_booster_classes[] = 'show-search-icon';
}
if ($block_booster_showCategory) {
  $block_booster_classes[] = 'show-category';
}
$block_booster_additional_attributes['class'] = join(' ', $block_booster_classes);
$block_booster_additional_attributes['id'] = 'block-booster-' . uniqid();
$block_booster_categories = get_categories();
?>
<div class="block-booster-search-container">
  <form action="/">
    <div <?php echo esc_html(get_block_wrapper_attributes($block_booster_additional_attributes)); ?>>
      <?php if ($block_booster_showCategory && !empty($block_booster_categories)) { ?>
          <select name="cat" class="search-category">
            <?php if ($block_booster_categoryText != '') { ?>
                <option value=""><?php echo esc_html($block_booster_categoryText); ?></option>
            <?php } ?>
            <?php foreach ($block_booster_categories as $block_booster_category) { ?>
                <option <?php echo get_query_var('cat') == $block_booster_category->term_id ? 'selected' : ''; ?> value="<?php echo esc_html($block_booster_category->term_id); ?>"><?php echo esc_html($block_booster_category->name); ?></option>
            <?php } ?>
          </select>
      <?php } ?>
      <input name="s" type="search" value="<?php echo esc_html(get_query_var('s')); ?>" class="search-input" placeholder="<?php echo esc_html($block_booster_searchPlaceholder); ?>" />
      <button type="submit" class="search-button"><?php echo !$block_booster_showSearchIcon && $block_booster_buttonText ? esc_html($block_booster_buttonText) : '&nbsp;' ?></button>
    </div>
  </form>
</div>
<style>
  #<?php echo esc_html($block_booster_additional_attributes['id']); ?> {
    <?php if ($block_booster_height > 0) { ?>
        <?php echo esc_html("height: {$block_booster_height}px;") ?>
    <?php } ?>
    <?php if ($block_booster_width > 0) { ?>
        <?php echo esc_html("width: {$block_booster_width}px;") ?>
    <?php } ?>
  }
</style>