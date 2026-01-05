<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}
$misc_gutenberg_blocks_postId = $block->context['postId'];
$misc_gutenberg_blocks_height = !empty($attributes['height']) ? $attributes['height'] . 'px' : 'initial';
$misc_gutenberg_blocks_imagePosition = !empty($attributes['imagePosition']) ? $attributes['imagePosition'] : 'initial';
$misc_gutenberg_blocks_showFeaturedImage = !empty($attributes['showFeaturedImage']) && $attributes['showFeaturedImage'] == true ? true : false;
$misc_gutenberg_blocks_isLink = !empty($attributes['isLink']) && $attributes['isLink'] == true ? true : false;
$misc_gutenberg_blocks_classes = [];
$misc_gutenberg_blocks_classes[] = 'wp-block-misc-gutenberg-blocks-default-featured-image--' . $misc_gutenberg_blocks_imagePosition;
$misc_gutenberg_blocks_imageUrl = !empty($attributes['imageUrl']) ? $attributes['imageUrl'] : '';
$misc_gutenberg_blocks_imageAlt = !empty($attributes['imageAlt']) ? $attributes['imageAlt'] : '';
$misc_gutenberg_blocks_postThumbnail = get_the_post_thumbnail_url($misc_gutenberg_blocks_postId);
$misc_gutenberg_blocks_postLink = get_the_permalink($misc_gutenberg_blocks_postId);
$misc_gutenberg_blocks_postTitle = get_the_title($misc_gutenberg_blocks_postId);
if ($misc_gutenberg_blocks_showFeaturedImage && $misc_gutenberg_blocks_postThumbnail) {
  $misc_gutenberg_blocks_imageUrl = $misc_gutenberg_blocks_postThumbnail;
  $misc_gutenberg_blocks_imageAlt = 'Post image';
}
$misc_gutenberg_blocks_styles = '';
$misc_gutenberg_blocks_styles .= 'height:' . $misc_gutenberg_blocks_height . ';';
$misc_gutenberg_blocks_additional_attributes['class'] = join(' ', $misc_gutenberg_blocks_classes);
$misc_gutenberg_blocks_additional_attributes['id'] = 'misc-gutenberg-blocks-' . uniqid();
$misc_gutenberg_blocks_additional_attributes['style'] = $misc_gutenberg_blocks_styles;
?>
<div <?php echo esc_html(get_block_wrapper_attributes($misc_gutenberg_blocks_additional_attributes)); ?>>
  <?php if ($misc_gutenberg_blocks_isLink) { ?>
    <a href="<?php echo esc_html($misc_gutenberg_blocks_postLink); ?>" title="<?php echo esc_html($misc_gutenberg_blocks_postTitle); ?>">
    <?php } ?>
    <img src="<?php echo esc_html($misc_gutenberg_blocks_imageUrl); ?>" alt="<?php echo esc_html($misc_gutenberg_blocks_imageAlt); ?>">
    <?php if ($misc_gutenberg_blocks_isLink) { ?>
    </a>
  <?php } ?>
</div>