<?php
/**
 * Category Card
 *
 * @package block-booster
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$block_booster_vertical           = ! empty( $attributes['vertical'] ) && true === $attributes['vertical'] ? true : false;
$block_booster_is_link            = ! empty( $attributes['isLink'] ) && true === $attributes['isLink'] ? true : false;
$block_booster_disable_css        = ! empty( $attributes['disableCSS'] ) && 'true' === $attributes['disableCSS'];
$block_booster_category_id        = ! empty( $attributes['categoryId'] ) ? intval( $attributes['categoryId'] ) : 0;
$block_booster_post_name_plural   = ! empty( $attributes['postNamePlural'] ) ? $attributes['postNamePlural'] : '';
$block_booster_post_name_singular = ! empty( $attributes['postNameSingular'] ) ? $attributes['postNameSingular'] : '';
$block_booster_image_name         = ! empty( $attributes['imageName'] ) ? $attributes['imageName'] : '';
$block_booster_image_url          = ! empty( $attributes['imageUrl'] ) ? $attributes['imageUrl'] : '';

$category = get_category( $block_booster_category_id );

if ( ! $category ) {
	return;
}
if ( is_wp_error( $category ) ) {
	return;
}

$block_booster_category_name  = $category->name;
$block_booster_category_count = $category->count;
$block_booster_category_url   = get_category_link( $block_booster_category_id );

$block_booster_gap         = ! empty( $attributes['gap'] ) ? $attributes['gap'] : '0';
$block_booster_image_width = ! empty( $attributes['imageWidth'] ) ? $attributes['imageWidth'] : '0';

$block_booster_classes = array();
if ( $block_booster_vertical ) {
	$block_booster_classes[] = 'wp-block-block-booster-category-card--vertical';
}
if ( $block_booster_disable_css ) {
	$block_booster_classes[] = 'wp-block-block-booster-category-card--no-css';
}
$block_booster_additional_attributes['class'] = join( ' ', $block_booster_classes );
$block_booster_additional_attributes['id']    = 'block-booster-' . uniqid();
$block_booster_image_extension                = '';
if ( $block_booster_image_url ) {
	$block_booster_image_extension = pathinfo( $block_booster_image_url, PATHINFO_EXTENSION );
}

$block_booster_tag_name = $block_booster_is_link ? 'a' : 'div';

// Validate tag name against a safe whitelist to avoid tag injection.
$block_booster_allowed_block_tags = array( 'div', 'a' );
if ( ! in_array( $block_booster_tag_name, $block_booster_allowed_block_tags, true ) ) {
	$block_booster_tag_name = 'div';
}

// Prepare wrapper attributes (already includes class/id) and output opening tag safely.
$block_booster_wrapper_attrs = get_block_wrapper_attributes( $block_booster_additional_attributes );
?>
<?php
if ( 'a' === $block_booster_tag_name ) {
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo '<a href="' . esc_url( $block_booster_category_url ) . '" ' . $block_booster_wrapper_attrs . '>';
} else {
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo '<' . esc_html( $block_booster_tag_name ) . ' ' . $block_booster_wrapper_attrs . '>';
}
?>
<div class="wp-block-block-booster-category-card--left">
	<span class="wp-block-block-booster-category-card--image-wrapper wp-block-block-booster-category-card--type-<?php echo esc_html( $block_booster_image_extension ); ?>">
	<img src="<?php echo esc_url( $block_booster_image_url ); ?>" alt="<?php echo esc_attr( $block_booster_image_name ); ?>">
	</span>
</div>
<div class="wp-block-block-booster-category-card--right">
	<?php if ( $block_booster_category_name ) { ?>
	<span class="wp-block-block-booster-category-card--name"><?php echo esc_html( $block_booster_category_name ); ?></span>
	<?php } ?>
	<span class="wp-block-block-booster-category-card--count"><?php echo esc_html( $block_booster_category_count ); ?>&nbsp;<?php echo $block_booster_category_count > 1 ? esc_html( $block_booster_post_name_plural ) : esc_html( $block_booster_post_name_singular ); ?></span>
</div>
</<?php echo esc_html( $block_booster_tag_name ); ?>> <style>
	#<?php echo esc_attr( $block_booster_additional_attributes['id'] ); ?> {

	<?php
	if ( $block_booster_gap ) {
		$block_booster_cat_gap = (int) $block_booster_gap;
		?>
		<?php echo esc_attr( "gap: {$block_booster_cat_gap}px;" ); ?>
	<?php } ?>
	<?php
	if ( $block_booster_image_width ) {
		$block_booster_cat_image_w = (int) $block_booster_image_width;
		?>
		.wp-block-block-booster-category-card--image-wrapper {
		<?php echo esc_attr( "width: {$block_booster_cat_image_w}px;" ); ?>
		<?php echo esc_attr( "height: {$block_booster_cat_image_w}px;" ); ?>
		<?php echo esc_attr( "border-radius: {$block_booster_cat_image_w}px;" ); ?>
		}

	<?php } ?>
	}
</style>