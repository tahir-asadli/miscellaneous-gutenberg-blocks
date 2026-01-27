<?php
/**
 * Media & Text
 *
 * @package block-booster
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$block_booster_reversed         = ! empty( $attributes['reversed'] ) && 1 === $attributes['reversed'];
$block_booster_tablet_reversed  = ! empty( $attributes['tabletReversed'] ) && 1 === $attributes['tabletReversed'];
$block_booster_mobile_reversed  = ! empty( $attributes['mobileReversed'] ) && 1 === $attributes['mobileReversed'];
$block_booster_stacked          = ! empty( $attributes['stacked'] ) && 1 === $attributes['stacked'];
$block_booster_tablet_stacked   = ! empty( $attributes['tabletStacked'] ) && 1 === $attributes['tabletStacked'];
$block_booster_mobile_stacked   = ! empty( $attributes['mobileStacked'] ) && 1 === $attributes['mobileStacked'];
$block_booster_gap              = ! empty( $attributes['gap'] ) ? $attributes['gap'] : 0;
$block_booster_tablet_gap       = ! empty( $attributes['tabletGap'] ) ? $attributes['tabletGap'] : 0;
$block_booster_mobile_gap       = ! empty( $attributes['mobileGap'] ) ? $attributes['mobileGap'] : 0;
$block_booster_has_single_child = count( $block->inner_blocks ) == 1;
$block_booster_classes          = array();
if ( $block_booster_reversed ) {
	$block_booster_classes[] = 'block-booster-media-and-text--is-reversed';
}
if ( $block_booster_tablet_reversed ) {
	$block_booster_classes[] = 'block-booster-media-and-text--tablet-is-reversed';
}
if ( $block_booster_mobile_reversed ) {
	$block_booster_classes[] = 'block-booster-media-and-text--mobile-is-reversed';
}

if ( $block_booster_stacked ) {
	$block_booster_classes[] = 'block-booster-media-and-text--is-stacked';
}
if ( $block_booster_tablet_stacked ) {
	$block_booster_classes[] = 'block-booster-media-and-text--tablet-is-stacked';
}
if ( $block_booster_mobile_stacked ) {
	$block_booster_classes[] = 'block-booster-media-and-text--mobile-is-stacked';
}


if ( $block_booster_has_single_child ) {
	$block_booster_classes[] = 'block-booster-media-and-text--single-child';
}
$block_booster_additional_attributes['class'] = join( ' ', $block_booster_classes );
$block_booster_additional_attributes['id']    = 'block-booster-' . uniqid();

// Prepare wrapper attributes safely.
$block_booster_wrapper_attrs = get_block_wrapper_attributes( $block_booster_additional_attributes );
?>
<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
<div <?php echo $block_booster_wrapper_attrs; ?>>
	<div class="block-booster-media-and-text--left">
	<?php if ( ! empty( $attributes['imageUrl'] ) ) { ?>
		<img src="<?php echo esc_url( $attributes['imageUrl'] ); ?>" alt="<?php echo esc_attr( $attributes['imageName'] ); ?>">
	<?php } ?>
	</div>
	<div class="block-booster-media-and-text--right">
	<?php

	if ( ! empty( $block->inner_blocks ) ) {
		foreach ( $block->inner_blocks as $block_booster_inner_block ) {
			echo '<div>' . wp_kses_post( $block_booster_inner_block->render() ) . '</div>';
		}
	}
	?>
	?>
	</div>
</div>
<style>
	<?php echo esc_attr( BLOCK_BOOSTER_MIN_DESKTOP_BREAKING_POINT ); ?>
	;

	?>#<?php echo esc_attr( $block_booster_additional_attributes['id'] ); ?> {
	<?php
	$block_booster_gap_desktop = (int) $block_booster_gap;
	echo esc_attr( "gap: {$block_booster_gap_desktop}px;" );
	?>
	<?php echo esc_attr( "gap: {$block_booster_gap}px;" ); ?>
	}
	}

	<?php echo esc_attr( BLOCK_BOOSTER_MIN_TABLET_BREAKING_POINT ); ?>
	;
	?>
	<?php echo esc_attr( BLOCK_BOOSTER_MAX_TABLET_BREAKING_POINT ); ?>
	;

	?>#<?php echo esc_attr( $block_booster_additional_attributes['id'] ); ?> {
	<?php
	$block_booster_gap_tablet = (int) $block_booster_tablet_gap;
	echo esc_attr( "gap: {$block_booster_gap_tablet}px;" );
	?>
	<?php echo esc_attr( "gap: {$block_booster_tablet_gap}px;" ); ?>
	}
	}

	<?php echo esc_attr( BLOCK_BOOSTER_MAX_MOBILE_BREAKING_POINT ); ?>
	;

	?>#<?php echo esc_attr( $block_booster_additional_attributes['id'] ); ?> {
	<?php
	$block_booster_gap_mobile = (int) $block_booster_mobile_gap;
	echo esc_attr( "gap: {$block_booster_gap_mobile}px;" );
	?>
	<?php echo esc_attr( "gap: {$block_booster_mobile_gap}px;" ); ?>
	}
	}
</style>