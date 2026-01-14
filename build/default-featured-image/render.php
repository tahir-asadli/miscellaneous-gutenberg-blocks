<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}
$block_booster_postId = $block->context['postId'];
$block_booster_height = !empty($attributes['height']) ? $attributes['height'] . 'px' : 'initial';
$block_booster_imagePosition = !empty($attributes['imagePosition']) ? $attributes['imagePosition'] : 'initial';
$block_booster_showFeaturedImage = !empty($attributes['showFeaturedImage']) && $attributes['showFeaturedImage'] == true ? true : false;
$block_booster_isLink = !empty($attributes['isLink']) && $attributes['isLink'] == true ? true : false;
$block_booster_classes = [];
$block_booster_classes[] = 'wp-block-block-booster-default-featured-image--' . $block_booster_imagePosition;
$block_booster_imageUrl = !empty($attributes['imageUrl']) ? $attributes['imageUrl'] : '';
$block_booster_imageAlt = !empty($attributes['imageAlt']) ? $attributes['imageAlt'] : '';
$block_booster_postThumbnail = get_the_post_thumbnail_url($block_booster_postId);
$block_booster_postLink = get_the_permalink($block_booster_postId);
$block_booster_postTitle = get_the_title($block_booster_postId);
if ($block_booster_showFeaturedImage && $block_booster_postThumbnail) {
  $block_booster_imageUrl = $block_booster_postThumbnail;
  $block_booster_imageAlt = 'Post image';
}
$block_booster_styles = '';
$block_booster_styles .= 'height:' . $block_booster_height . ';';
$block_booster_additional_attributes['class'] = join(' ', $block_booster_classes);
$block_booster_additional_attributes['id'] = 'block-booster-' . uniqid();
$block_booster_additional_attributes['style'] = $block_booster_styles;
?>
<div <?php echo get_block_wrapper_attributes($block_booster_additional_attributes); ?>>
  <?php if ($block_booster_isLink) { ?>
    <a href="<?php echo esc_url($block_booster_postLink); ?>" title="<?php echo esc_attr($block_booster_postTitle); ?>">
    <?php } ?>
    <img src="<?php echo esc_url($block_booster_imageUrl); ?>" alt="<?php echo esc_attr($block_booster_imageAlt); ?>">
    <?php if ($block_booster_isLink) { ?>
    </a>
  <?php } ?>
</div>