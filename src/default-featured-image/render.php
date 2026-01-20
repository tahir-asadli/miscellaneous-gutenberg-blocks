<?php
/**
 * Default Featured Image
 *
 * @package block-booster
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$block_booster_post_id             = $block->context['postId'];
$block_booster_height              = ! empty( $attributes['height'] ) ? $attributes['height'] . 'px' : 'initial';
$block_booster_image_position      = ! empty( $attributes['imagePosition'] ) ? $attributes['imagePosition'] : 'initial';
$block_booster_show_featured_image = ! empty( $attributes['showFeaturedImage'] ) && true === $attributes['showFeaturedImage'] ? true : false;
$block_booster_is_link             = ! empty( $attributes['isLink'] ) && true === $attributes['isLink'] ? true : false;
$block_booster_classes             = array();
$block_booster_classes[]           = 'wp-block-block-booster-default-featured-image--' . $block_booster_image_position;
$block_booster_image_url           = ! empty( $attributes['imageUrl'] ) ? $attributes['imageUrl'] : '';
$block_booster_image_alt           = ! empty( $attributes['imageAlt'] ) ? $attributes['imageAlt'] : '';
$block_booster_post_thumbnail      = get_the_post_thumbnail_url( $block_booster_post_id );
$block_booster_post_link           = get_the_permalink( $block_booster_post_id );
$block_booster_post_title          = get_the_title( $block_booster_post_id );
if ( $block_booster_show_featured_image && $block_booster_post_thumbnail ) {
	$block_booster_image_url = $block_booster_post_thumbnail;
	$block_booster_image_alt = 'Post image';
}
$block_booster_styles                         = '';
$block_booster_styles                        .= 'height:' . $block_booster_height . ';';
$block_booster_additional_attributes['class'] = join( ' ', $block_booster_classes );
$block_booster_additional_attributes['id']    = 'block-booster-' . uniqid();
$block_booster_additional_attributes['style'] = $block_booster_styles;
?>
<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
<div <?php echo get_block_wrapper_attributes( $block_booster_additional_attributes ); ?>>
	<?php if ( $block_booster_is_link ) { ?>
	<a href="<?php echo esc_url( $block_booster_post_link ); ?>" title="<?php echo esc_attr( $block_booster_post_title ); ?>">
	<?php } ?>
	<img src="<?php echo esc_url( $block_booster_image_url ); ?>" alt="<?php echo esc_attr( $block_booster_image_alt ); ?>">
	<?php if ( $block_booster_is_link ) { ?>
	</a>
	<?php } ?>
</div>