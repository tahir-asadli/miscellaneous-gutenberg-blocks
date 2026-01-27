<?php
/**
 * Flexbox
 *
 * @package block-booster
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


$block_booster_classes = array();

$block_booster_width_type        = ! empty( $attributes['widthType'] ) ? $attributes['widthType'] : 'full';
$block_booster_tablet_width_type = ! empty( $attributes['tabletWidthType'] ) ? $attributes['tabletWidthType'] : 'full';
$block_booster_mobile_width_type = ! empty( $attributes['mobileWidthType'] ) ? $attributes['mobileWidthType'] : 'full';

$block_booster_width        = ! empty( $attributes['width'] ) && $attributes['width'] > 0 ? $attributes['width'] . $attributes['widthUnit'] : '';
$block_booster_tablet_width = ! empty( $attributes['tabletWidth'] ) && $attributes['tabletWidth'] > 0 ? $attributes['tabletWidth'] . $attributes['tabletWidthUnit'] : '';
$block_booster_mobile_width = ! empty( $attributes['mobileWidth'] ) && $attributes['mobileWidth'] > 0 ? $attributes['mobileWidth'] . $attributes['mobileWidthUnit'] : '';

$block_booster_wrap        = ! empty( $attributes['wrap'] ) ? $attributes['wrap'] : '';
$block_booster_tablet_wrap = ! empty( $attributes['tabletWrap'] ) ? $attributes['tabletWrap'] : '';
$block_booster_mobile_wrap = ! empty( $attributes['mobileWrap'] ) ? $attributes['mobileWrap'] : '';

$block_booster_direction        = ! empty( $attributes['direction'] ) ? $attributes['direction'] : '';
$block_booster_tablet_direction = ! empty( $attributes['tabletDirection'] ) ? $attributes['tabletDirection'] : '';
$block_booster_mobile_direction = ! empty( $attributes['mobileDirection'] ) ? $attributes['mobileDirection'] : '';

$block_booster_reverse        = ! empty( $attributes['reverse'] ) && true === $attributes['reverse'];
$block_booster_tablet_reverse = ! empty( $attributes['tabletReverse'] ) && true === $attributes['tabletReverse'];
$block_booster_mobile_reverse = ! empty( $attributes['mobileReverse'] ) && true === $attributes['mobileReverse'];

$block_booster_justify_content        = ! empty( $attributes['justifyContent'] ) ? $attributes['justifyContent'] : '';
$block_booster_tablet_justify_content = ! empty( $attributes['tabletJustifyContent'] ) ? $attributes['tabletJustifyContent'] : '';
$block_booster_mobile_justify_content = ! empty( $attributes['mobileJustifyContent'] ) ? $attributes['mobileJustifyContent'] : '';

$block_booster_align_items        = ! empty( $attributes['alignItems'] ) ? $attributes['alignItems'] : '';
$block_booster_tablet_align_items = ! empty( $attributes['tabletAlignItems'] ) ? $attributes['tabletAlignItems'] : '';
$block_booster_mobile_align_items = ! empty( $attributes['mobileAlignItems'] ) ? $attributes['mobileAlignItems'] : '';

$block_booster_grow        = ! empty( $attributes['grow'] ) ? $attributes['grow'] : '';
$block_booster_tablet_grow = ! empty( $attributes['tabletGrow'] ) ? $attributes['tabletGrow'] : '';
$block_booster_mobile_grow = ! empty( $attributes['mobileGrow'] ) ? $attributes['mobileGrow'] : '';

$block_booster_shrink        = ! empty( $attributes['shrink'] ) ? $attributes['shrink'] : '';
$block_booster_tablet_shrink = ! empty( $attributes['tabletShrink'] ) ? $attributes['tabletShrink'] : '';
$block_booster_mobile_shrink = ! empty( $attributes['mobileShrink'] ) ? $attributes['mobileShrink'] : '';

$block_booster_display        = ! empty( $attributes['display'] ) ? $attributes['display'] : '';
$block_booster_tablet_display = ! empty( $attributes['tabletDisplay'] ) ? $attributes['tabletDisplay'] : '';
$block_booster_mobile_display = ! empty( $attributes['mobileDisplay'] ) ? $attributes['mobileDisplay'] : '';

if ( 'auto' === $block_booster_width_type ) {
	$block_booster_classes[] = 'block-booster-flexbox--width-auto';
} elseif ( 'initial' === $block_booster_width_type ) {
	$block_booster_classes[] = 'block-booster-flexbox--width-initial';
}
if ( 'auto' === $block_booster_tablet_width_type ) {
	$block_booster_classes[] = 'block-booster-flexbox--width-tablet-auto';
} elseif ( 'initial' === $block_booster_tablet_width_type ) {
	$block_booster_classes[] = 'block-booster-flexbox--width-tablet-initial';
}
if ( 'auto' === $block_booster_mobile_width_type ) {
	$block_booster_classes[] = 'block-booster-flexbox--width-mobile-auto';
} elseif ( 'initial' === $block_booster_mobile_width_type ) {
	$block_booster_classes[] = 'block-booster-flexbox--width-mobile-initial';
}

if ( 'wrap' === $block_booster_wrap ) {
	$block_booster_classes[] = 'block-booster-flexbox--wrap';
} elseif ( 'no-wrap' === $block_booster_wrap ) {
	$block_booster_classes[] = 'block-booster-flexbox--no-wrap';
}
if ( 'wrap' === $block_booster_tablet_wrap ) {
	$block_booster_classes[] = 'block-booster-flexbox--tablet-wrap';
} elseif ( 'wrap' === $block_booster_mobile_wrap ) {
	$block_booster_classes[] = 'block-booster-flexbox--mobile-wrap';
}
if ( 'no-wrap' === $block_booster_tablet_wrap ) {
	$block_booster_classes[] = 'block-booster-flexbox--tablet-no-wrap';
} elseif ( 'no-wrap' === $block_booster_mobile_wrap ) {
	$block_booster_classes[] = 'block-booster-flexbox--mobile-no-wrap';
}

if ( 'horizontal' === $block_booster_direction ) {
	$block_booster_classes[] = 'block-booster-flexbox--horizontal';
} elseif ( 'vertical' === $block_booster_direction ) {
	$block_booster_classes[] = 'block-booster-flexbox--vertical';
}
if ( 'horizontal' === $block_booster_tablet_direction ) {
	$block_booster_classes[] = 'block-booster-flexbox--tablet-horizontal';
}
if ( 'vertical' === $block_booster_tablet_direction ) {
	$block_booster_classes[] = 'block-booster-flexbox--tablet-vertical';
}
if ( 'horizontal' === $block_booster_mobile_direction ) {
	$block_booster_classes[] = 'block-booster-flexbox--mobile-horizontal';
} elseif ( 'vertical' === $block_booster_mobile_direction ) {
	$block_booster_classes[] = 'block-booster-flexbox--mobile-vertical';
}

if ( $block_booster_reverse ) {
	$block_booster_classes[] = 'block-booster-flexbox--reverse';
}
if ( $block_booster_tablet_reverse ) {
	$block_booster_classes[] = 'block-booster-flexbox--tablet-reverse';
}
if ( $block_booster_mobile_reverse ) {
	$block_booster_classes[] = 'block-booster-flexbox--mobile-reverse';
}

if ( 'grow' === $block_booster_grow ) {
	$block_booster_classes[] = 'block-booster-flexbox--grow';
} elseif ( 'no-grow' === $block_booster_grow ) {
	$block_booster_classes[] = 'block-booster-flexbox--no-grow';
}
if ( 'grow' === $block_booster_tablet_grow ) {
	$block_booster_classes[] = 'block-booster-flexbox--tablet-grow';
} elseif ( 'no-grow' === $block_booster_tablet_grow ) {
	$block_booster_classes[] = 'block-booster-flexbox--tablet-no-grow';
}
if ( 'grow' === $block_booster_mobile_grow ) {
	$block_booster_classes[] = 'block-booster-flexbox--mobile-grow';
} elseif ( 'no-grow' === $block_booster_mobile_grow ) {
	$block_booster_classes[] = 'block-booster-flexbox--mobile-no-grow';
}

if ( 'shrink' === $block_booster_shrink ) {
	$block_booster_classes[] = 'block-booster-flexbox--shrink';
} elseif ( 'no-shrink' === $block_booster_shrink ) {
	$block_booster_classes[] = 'block-booster-flexbox--no-shrink';
}
if ( 'shrink' === $block_booster_tablet_shrink ) {
	$block_booster_classes[] = 'block-booster-flexbox--tablet-shrink';
} elseif ( 'no-shrink' === $block_booster_tablet_shrink ) {
	$block_booster_classes[] = 'block-booster-flexbox--tablet-no-shrink';
}
if ( 'shrink' === $block_booster_mobile_shrink ) {
	$block_booster_classes[] = 'block-booster-flexbox--mobile-shrink';
} elseif ( 'no-shrink' === $block_booster_mobile_shrink ) {
	$block_booster_classes[] = 'block-booster-flexbox--mobile-no-shrink';
}


if ( 'flex' === $block_booster_display ) {
	$block_booster_classes[] = 'block-booster-flexbox--flex';
} elseif ( 'inline-flex' === $block_booster_display ) {
	$block_booster_classes[] = 'block-booster-flexbox--inline-flex';
} elseif ( 'none' === $block_booster_display ) {
	$block_booster_classes[] = 'block-booster-flexbox--none';
}

if ( 'flex' === $block_booster_tablet_display ) {
	$block_booster_classes[] = 'block-booster-flexbox--tablet-flex';
} elseif ( 'inline-flex' === $block_booster_tablet_display ) {
	$block_booster_classes[] = 'block-booster-flexbox--tablet-inline-flex';
} elseif ( 'none' === $block_booster_tablet_display ) {
	$block_booster_classes[] = 'block-booster-flexbox--tablet-none';
}

if ( 'flex' === $block_booster_mobile_display ) {
	$block_booster_classes[] = 'block-booster-flexbox--mobile-flex';
} elseif ( 'inline-flex' === $block_booster_mobile_display ) {
	$block_booster_classes[] = 'block-booster-flexbox--mobile-inline-flex';
} elseif ( 'none' === $block_booster_mobile_display ) {
	$block_booster_classes[] = 'block-booster-flexbox--mobile-none';
}

if ( $block_booster_justify_content ) {
	$block_booster_classes[] = 'block-booster-flexbox--justify-' . $block_booster_justify_content;
}
if ( $block_booster_tablet_justify_content ) {
	$block_booster_classes[] = 'block-booster-flexbox--justify-tablet-' . $block_booster_tablet_justify_content;
}
if ( $block_booster_mobile_justify_content ) {
	$block_booster_classes[] = 'block-booster-flexbox--justify-mobile-' . $block_booster_mobile_justify_content;
}

if ( $block_booster_align_items ) {
	$block_booster_classes[] = 'block-booster-flexbox--align-' . $block_booster_align_items;
}
if ( $block_booster_tablet_align_items ) {
	$block_booster_classes[] = 'block-booster-flexbox--align-tablet-' . $block_booster_tablet_align_items;
}
if ( $block_booster_mobile_align_items ) {
	$block_booster_classes[] = 'block-booster-flexbox--align-mobile-' . $block_booster_mobile_align_items;
}

$block_booster_column_gap_unit        = ! empty( $attributes['columnGapUnit'] ) ? $attributes['columnGapUnit'] : 'px';
$block_booster_tablet_column_gap_unit = ! empty( $attributes['tabletColumnGapUnit'] ) ? $attributes['tabletColumnGapUnit'] : 'px';
$block_booster_mobile_column_gap_unit = ! empty( $attributes['mobileColumnGapUnit'] ) ? $attributes['mobileColumnGapUnit'] : 'px';

$block_booster_row_gap_unit        = ! empty( $attributes['rowGapUnit'] ) ? $attributes['rowGapUnit'] : 'px';
$block_booster_tablet_row_gap_unit = ! empty( $attributes['tabletRowGapUnit'] ) ? $attributes['tabletRowGapUnit'] : 'px';
$block_booster_mobile_row_gap_unit = ! empty( $attributes['mobileRowGapUnit'] ) ? $attributes['mobileRowGapUnit'] : 'px';

$block_booster_column_gap        = ! empty( $attributes['columnGap'] ) && $attributes['columnGap'] > 0 ? $attributes['columnGap'] . $block_booster_column_gap_unit : 0;
$block_booster_tablet_column_gap = ! empty( $attributes['tabletColumnGap'] ) && $attributes['tabletColumnGap'] > 0 ? $attributes['tabletColumnGap'] . $block_booster_tablet_column_gap_unit : 0;
$block_booster_mobile_column_gap = ! empty( $attributes['mobileColumnGap'] ) && $attributes['mobileColumnGap'] > 0 ? $attributes['mobileColumnGap'] . $block_booster_mobile_column_gap_unit : 0;

$block_booster_row_gap        = ! empty( $attributes['rowGap'] ) && $attributes['rowGap'] > 0 ? $attributes['rowGap'] . $block_booster_row_gap_unit : 0;
$block_booster_tablet_row_gap = ! empty( $attributes['tabletRowGap'] ) && $attributes['tabletRowGap'] > 0 ? $attributes['tabletRowGap'] . $block_booster_tablet_row_gap_unit : 0;
$block_booster_mobile_row_gap = ! empty( $attributes['mobileRowGap'] ) && $attributes['mobileRowGap'] > 0 ? $attributes['mobileRowGap'] . $block_booster_mobile_row_gap_unit : 0;

$block_booster_additional_attributes['class'] = join( ' ', $block_booster_classes );
$block_booster_additional_attributes['id']    = 'block-booster-' . uniqid();

$block_booster__mobile_styles    = ( 'custom' === $block_booster_width_type && '' !== $block_booster_width ) || $block_booster_column_gap || $block_booster_row_gap;
$block_booster_has_mobile_styles = ( 'custom' === $block_booster_tablet_width_type && '' !== $block_booster_tablet_width ) || $block_booster_tablet_column_gap || $block_booster_tablet_row_gap;
$block_booster_has_tablet_styles = ( 'custom' === $block_booster_mobile_width_type && '' !== $block_booster_mobile_width ) || $block_booster_mobile_column_gap || $block_booster_mobile_row_gap;

?>
<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
<div <?php echo get_block_wrapper_attributes( $block_booster_additional_attributes ); ?>>
	<?php

	if ( ! empty( $block->inner_blocks ) ) {
		foreach ( $block->inner_blocks as $block_booster_inner_block ) {
			echo wp_kses_post( $block_booster_inner_block->render() );
		}
	}

	?>
</div>
<?php if ( $block_booster__mobile_styles || $block_booster_has_mobile_styles || $block_booster_has_tablet_styles ) : ?>
	<style>
	@media only screen {
		#<?php echo esc_attr( $block_booster_additional_attributes['id'] ); ?> {
		<?php echo 'custom' === $block_booster_width_type && '' !== $block_booster_width ? esc_attr( "width: {$block_booster_width};" ) : ''; ?>
		<?php echo $block_booster_column_gap ? esc_attr( "column-gap: {$block_booster_column_gap};" ) : ''; ?>
		<?php echo $block_booster_row_gap ? esc_attr( "row-gap: {$block_booster_row_gap};" ) : ''; ?>
		}
	}

	@media only screen and (max-width:
		<?php echo esc_attr( BLOCK_BOOSTER_MAX_TABLET_BREAKING_POINT ); ?>
	) {
		#<?php echo esc_attr( $block_booster_additional_attributes['id'] ); ?> {
		<?php echo 'custom' === $block_booster_tablet_width_type && '' !== $block_booster_tablet_width ? esc_attr( "width: {$block_booster_tablet_width};" ) : ''; ?>
		<?php echo $block_booster_tablet_column_gap ? esc_attr( "column-gap: {$block_booster_tablet_column_gap};" ) : ''; ?>
		<?php echo $block_booster_tablet_row_gap ? esc_attr( "row-gap: {$block_booster_tablet_row_gap};" ) : ''; ?>
		}
	}

	@media only screen and (max-width:
		<?php echo esc_attr( BLOCK_BOOSTER_MAX_MOBILE_BREAKING_POINT ); ?>
	) {
		#<?php echo esc_attr( $block_booster_additional_attributes['id'] ); ?> {
		<?php echo 'custom' === $block_booster_mobile_width_type && '' !== $block_booster_mobile_width ? esc_attr( "width: {$block_booster_mobile_width};" ) : ''; ?>
		<?php echo $block_booster_mobile_column_gap ? esc_attr( "column-gap: {$block_booster_mobile_column_gap};" ) : ''; ?>
		<?php echo $block_booster_mobile_row_gap ? esc_attr( "row-gap: {$block_booster_mobile_row_gap};" ) : ''; ?>
		}
	}
	</style>
<?php endif; ?>