<?php
$showCategory = !empty($attributes['showCategory']) && $attributes['showCategory'] == 1;
$showSearchIcon = !empty($attributes['showSearchIcon']) && $attributes['showSearchIcon'] == 1;
$disableCSS = !empty($attributes['disableCSS']) && $attributes['disableCSS'] == 1;
$searchPlaceholder = !empty($attributes['searchPlaceholder']) ? $attributes['searchPlaceholder'] : '';
$categoryText = !empty($attributes['categoryText']) ? $attributes['categoryText'] : '';
$buttonText = !empty($attributes['buttonText']) ? $attributes['buttonText'] : '';
$height = !empty($attributes['height']) && (int) $attributes['height'] > 0 ? (int) $attributes['height'] : '0';
$width = !empty($attributes['width']) && (int) $attributes['width'] > 0 ? (int) $attributes['width'] : '0';

$classes = [];
if (!$disableCSS) {
  $classes[] = 'has-style';
}
if ($showSearchIcon) {
  $classes[] = 'show-search-icon';
}
if ($showCategory) {
  $classes[] = 'show-category';
}
$additional_attributes['class'] = join(' ', $classes);
$additional_attributes['id'] = 'miscellaneous-gutenberg-blocks-' . uniqid();
$categories = get_categories();
?>
<div class="miscellaneous-gutenberg-blocks-search-container">
  <form action="/">
    <div <?php echo get_block_wrapper_attributes($additional_attributes); ?>>
      <?php if ($showCategory && !empty($categories)) { ?>
        <select name="cat" class="search-category">
          <?php if ($categoryText != '') { ?>
            <option value=""><?php echo $categoryText; ?></option>
          <?php } ?>
          <?php foreach ($categories as $category) { ?>
            <option <?php echo get_query_var('cat') == $category->term_id ? 'selected' : ''; ?> value="<?php echo $category->term_id; ?>"><?php echo $category->name; ?></option>
          <?php } ?>
        </select>
      <?php } ?>
      <input name="s" type="search" value="<?php echo get_query_var('s'); ?>" class="search-input" placeholder="<?php echo $searchPlaceholder; ?>" />
      <button type="submit" class="search-button"><?php echo !$showSearchIcon && $buttonText ? $buttonText : '&nbsp;' ?></button>
    </div>
  </form>
</div>
<style>
  #<?php echo $additional_attributes['id']; ?> {
    <?php if ($height > 0) { ?>
      <?php echo "height: {$height}px;" ?>
    <?php } ?>
    <?php if ($width > 0) { ?>
      <?php echo "width: {$width}px;" ?>
    <?php } ?>
  }
</style>