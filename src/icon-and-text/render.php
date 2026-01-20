<?php
/**
 * Icon & Text
 *
 * @package block-booster
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$block_booster_reversed        = ! empty( $attributes['reversed'] ) && 1 === $attributes['reversed'];
$block_booster_tablet_reversed = ! empty( $attributes['tabletReversed'] ) && 1 === $attributes['tabletReversed'];
$block_booster_mobile_reversed = ! empty( $attributes['mobileReversed'] ) && 1 === $attributes['mobileReversed'];
$block_booster_stacked         = ! empty( $attributes['stacked'] ) && 1 === $attributes['stacked'];
$block_booster_tablet_stacked  = ! empty( $attributes['tabletStacked'] ) && 1 === $attributes['tabletStacked'];
$block_booster_mobile_stacked  = ! empty( $attributes['mobileStacked'] ) && 1 === $attributes['mobileStacked'];
$block_booster_gap             = ! empty( $attributes['gap'] ) ? $attributes['gap'] : 0;
$block_booster_tablet_gap      = ! empty( $attributes['tabletGap'] ) ? $attributes['tabletGap'] : 0;
$block_booster_mobile_gap      = ! empty( $attributes['mobileGap'] ) ? $attributes['mobileGap'] : 0;
$block_booster_svg_color       = ! empty( $attributes['svgColor'] ) ? $attributes['svgColor'] : '';
$block_booster_image_width     = ! empty( $attributes['imageWidth'] ) ? $attributes['imageWidth'] : '';
$block_booster_image_content   = ! empty( $attributes['imageContent'] ) ? $attributes['imageContent'] : '';
$block_booster_text            = ! empty( $attributes['text'] ) ? $attributes['text'] : '';
$block_booster_classes         = array();
if ( $block_booster_reversed ) {
	$block_booster_classes[] = 'block-booster-icon-and-text--is-reversed';
}
if ( $block_booster_tablet_reversed ) {
	$block_booster_classes[] = 'block-booster-icon-and-text--tablet-is-reversed';
}
if ( $block_booster_mobile_reversed ) {
	$block_booster_classes[] = 'block-booster-icon-and-text--mobile-is-reversed';
}

if ( $block_booster_stacked ) {
	$block_booster_classes[] = 'block-booster-icon-and-text--is-stacked';
}
if ( $block_booster_tablet_stacked ) {
	$block_booster_classes[] = 'block-booster-icon-and-text--tablet-is-stacked';
}
if ( $block_booster_mobile_stacked ) {
	$block_booster_classes[] = 'block-booster-icon-and-text--mobile-is-stacked';
}


$block_booster_additional_attributes['class'] = join( ' ', $block_booster_classes );
$block_booster_additional_attributes['id']    = 'block-booster-' . uniqid();
?>
<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
<div <?php echo get_block_wrapper_attributes( $block_booster_additional_attributes ); ?>>
	<div class="block-booster-icon-and-text--left">
	<?php if ( ! empty( $attributes['imageUrl'] ) ) { ?>
		<?php if ( substr( $attributes['imageUrl'], -4 ) === '.svg' ) { ?>
			<?php echo esc_html( $block_booster_image_content ); ?>
		<?php } else { ?>
		<img style="width: <?php echo esc_attr( $block_booster_image_width ); ?>px" src="<?php echo esc_url( $attributes['imageUrl'] ); ?>" alt="<?php echo esc_attr( $attributes['imageName'] ); ?>">
		<?php } ?>
	<?php } ?>
	</div>
	<div class="block-booster-icon-and-text--right">
	<?php echo esc_html( $block_booster_text ); ?>
	</div>
</div>
<style>
	#<?php echo esc_attr( $block_booster_additional_attributes['id'] ); ?> svg {
	<?php
	if ( $block_booster_svg_color ) {
		$svg_color = esc_attr( $block_booster_svg_color );
		echo esc_attr( "color: {$svg_color};" );
	}
	?>
	<?php
	$icon_image_width = (int) $block_booster_image_width;
	echo esc_attr( "width: {$icon_image_width}px;" );
	?>
	}

	@media only screen and (min-width:
	<?php echo esc_html( BLOCK_BOOSTER_MIN_DESKTOP_BREAKING_POINT ); ?>
	) {
	#<?php echo esc_attr( $block_booster_additional_attributes['id'] ); ?> {
		<?php
		$icon_gap = (int) $block_booster_gap;
		echo esc_attr( "gap: {$icon_gap}px;" );
		?>
	}
	}

	@media only screen and (min-width:
	<?php echo esc_html( BLOCK_BOOSTER_MIN_TABLET_BREAKING_POINT ); ?>
	) and (max-width:
	<?php echo esc_html( BLOCK_BOOSTER_MAX_TABLET_BREAKING_POINT ); ?>
	) {
	#<?php echo esc_attr( $block_booster_additional_attributes['id'] ); ?> {
		<?php
		$icon_tablet_gap = (int) $block_booster_tablet_gap;
		echo esc_attr( "gap: {$icon_tablet_gap}px;" );
		?>
	}
	}

	@media only screen and (max-width:
	<?php echo esc_html( BLOCK_BOOSTER_MAX_MOBILE_BREAKING_POINT ); ?>
	) {
	#<?php echo esc_attr( $block_booster_additional_attributes['id'] ); ?> {
		<?php
		$icon_mobile_gap = (int) $block_booster_mobile_gap;
		echo esc_attr( "gap: {$icon_mobile_gap}px;" );
		?>
	}
	}
</style>