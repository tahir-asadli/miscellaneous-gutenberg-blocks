<?php
/**
 * Search
 *
 * @package block-booster
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$block_booster_show_category      = ! empty( $attributes['showCategory'] ) && true === $attributes['showCategory'];
$block_booster_show_search_icon   = ! empty( $attributes['showSearchIcon'] ) && true === $attributes['showSearchIcon'];
$block_booster_disable_css        = ! empty( $attributes['disableCSS'] ) && true === $attributes['disableCSS'];
$block_booster_search_placeholder = ! empty( $attributes['searchPlaceholder'] ) ? $attributes['searchPlaceholder'] : '';
$block_booster_category_text      = ! empty( $attributes['categoryText'] ) ? $attributes['categoryText'] : '';
$block_booster_button_text        = ! empty( $attributes['buttonText'] ) ? $attributes['buttonText'] : '';
$block_booster_height             = ! empty( $attributes['height'] ) && (int) $attributes['height'] > 0 ? (int) $attributes['height'] : '0';
$block_booster_width              = ! empty( $attributes['width'] ) && (int) $attributes['width'] > 0 ? (int) $attributes['width'] : '0';

$block_booster_classes = array();
if ( ! $block_booster_disable_css ) {
	$block_booster_classes[] = 'has-style';
}
if ( $block_booster_show_search_icon ) {
	$block_booster_classes[] = 'show-search-icon';
}
if ( $block_booster_show_category ) {
	$block_booster_classes[] = 'show-category';
}
$block_booster_additional_attributes['class'] = join( ' ', $block_booster_classes );
$block_booster_additional_attributes['id']    = 'block-booster-' . uniqid();
$block_booster_categories                     = get_categories();
?>
<div class="block-booster-search-container">
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<div <?php echo get_block_wrapper_attributes( $block_booster_additional_attributes ); ?>>
		<?php if ( $block_booster_show_category && ! empty( $block_booster_categories ) ) { ?>
		<select name="cat" class="search-category">
			<?php if ( '' !== $block_booster_category_text ) { ?>
			<option value=""><?php echo esc_html( $block_booster_category_text ); ?></option>
			<?php } ?>
			<?php foreach ( $block_booster_categories as $block_booster_category ) { ?>
			<option <?php selected( get_query_var( 'cat' ), $block_booster_category->term_id ); ?> value="<?php echo esc_attr( $block_booster_category->term_id ); ?>"><?php echo esc_html( $block_booster_category->name ); ?></option>
			<?php } ?>
		</select>
		<?php } ?>
		<input name="s" type="search" value="<?php echo esc_attr( get_query_var( 's' ) ); ?>" class="search-input" placeholder="<?php echo esc_attr( $block_booster_search_placeholder ); ?>" />
		<button type="submit" class="search-button"><?php echo ! $block_booster_show_search_icon && $block_booster_button_text ? esc_html( $block_booster_button_text ) : '&nbsp;'; ?></button>
	</div>
	</form>
</div>
<style>
	#<?php echo esc_attr( $block_booster_additional_attributes['id'] ); ?> {
	<?php if ( $block_booster_height > 0 ) { ?>
		<?php echo esc_attr( "height: {$block_booster_height}px;" ); ?>
	<?php } ?>
	<?php if ( $block_booster_width > 0 ) { ?>
		<?php echo esc_attr( "width: {$block_booster_width}px;" ); ?>
	<?php } ?>
	}
</style>