<?php
/**
 * Icon & Text
 *
 * @package block-booster
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$block_booster_reversed        = ! empty( $attributes['reversed'] ) && true === $attributes['reversed'];
$block_booster_tablet_reversed = ! empty( $attributes['tabletReversed'] ) && true === $attributes['tabletReversed'];
$block_booster_mobile_reversed = ! empty( $attributes['mobileReversed'] ) && true === $attributes['mobileReversed'];
$block_booster_stacked         = ! empty( $attributes['stacked'] ) && true === $attributes['stacked'];
$block_booster_tablet_stacked  = ! empty( $attributes['tabletStacked'] ) && true === $attributes['tabletStacked'];
$block_booster_mobile_stacked  = ! empty( $attributes['mobileStacked'] ) && true === $attributes['mobileStacked'];
$block_booster_gap             = ! empty( $attributes['gap'] ) ? $attributes['gap'] : 0;
$block_booster_tablet_gap      = ! empty( $attributes['tabletGap'] ) ? $attributes['tabletGap'] : 0;
$block_booster_mobile_gap      = ! empty( $attributes['mobileGap'] ) ? $attributes['mobileGap'] : 0;
$block_booster_svg_color       = ! empty( $attributes['svgColor'] ) ? $attributes['svgColor'] : '';
$block_booster_image_width     = ! empty( $attributes['imageWidth'] ) ? $attributes['imageWidth'] : '';
$block_booster_image_content   = ! empty( $attributes['imageContent'] ) ? $attributes['imageContent'] : '';
$block_booster_text            = ! empty( $attributes['text'] ) ? $attributes['text'] : '';
$block_booster_image_url       = ! empty( $attributes['imageUrl'] ) ? $attributes['imageUrl'] : '';
$block_booster_image_is_svg    = strtolower( pathinfo( $block_booster_image_url, PATHINFO_EXTENSION ) ) === 'svg';

$block_booster_classes = array();
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
$block_booster_svg_allowed_attributes         = array(
	'svg'  => array(
		'class'       => true,
		'aria-hidden' => true,
		'role'        => true,
		'xmlns'       => true,
		'width'       => true,
		'height'      => true,
		'viewbox'     => true,
		'fill'        => true,
	),
	'path' => array(
		'd'    => true,
		'fill' => true,
	),
);


?>
<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
<div <?php echo get_block_wrapper_attributes( $block_booster_additional_attributes ); ?>>
	<div class="block-booster-icon-and-text--left">
	<?php if ( ! empty( $attributes['imageUrl'] ) ) { ?>
		<?php if ( $block_booster_image_is_svg ) { ?>
				<?php
				echo wp_kses(
					$block_booster_image_content,
					$block_booster_svg_allowed_attributes
				);
				?>
		<?php } else { ?>
		<img src="<?php echo esc_url( $attributes['imageUrl'] ); ?>" alt="<?php echo esc_attr( $attributes['imageName'] ); ?>">
		<?php } ?>
	<?php } ?>
	</div>
	<div class="block-booster-icon-and-text--right">
	<?php echo wp_kses_post( $block_booster_text ); ?>
	</div>
</div>
<style>
	#<?php echo esc_attr( $block_booster_additional_attributes['id'] ); ?> svg {
	<?php
	if ( $block_booster_svg_color ) {
		$block_booster_svg_color = esc_attr( $block_booster_svg_color );
		echo esc_attr( "color: {$block_booster_svg_color};" );
	}
	?>
	<?php
	$block_booster_icon_image_width = (int) $block_booster_image_width;
	echo esc_attr( "font-size: {$block_booster_icon_image_width}px;" );
	?>
	}

	@media only screen and (min-width:
	<?php echo esc_attr( BLOCK_BOOSTER_MIN_DESKTOP_BREAKING_POINT ); ?>
	) {
	#<?php echo esc_attr( $block_booster_additional_attributes['id'] ); ?> {
		<?php
		$block_booster_icon_gap = (int) $block_booster_gap;
		echo esc_attr( "gap: {$block_booster_icon_gap}px;" );
		?>
	}
	}

	@media only screen and (min-width:
	<?php echo esc_attr( BLOCK_BOOSTER_MIN_TABLET_BREAKING_POINT ); ?>
	) and (max-width:
	<?php echo esc_attr( BLOCK_BOOSTER_MAX_TABLET_BREAKING_POINT ); ?>
	) {
	#<?php echo esc_attr( $block_booster_additional_attributes['id'] ); ?> {
		<?php
		$block_booster_icon_tablet_gap = (int) $block_booster_tablet_gap;
		echo esc_attr( "gap: {$block_booster_icon_tablet_gap}px;" );
		?>
	}
	}

	@media only screen and (max-width:
	<?php echo esc_attr( BLOCK_BOOSTER_MAX_MOBILE_BREAKING_POINT ); ?>
	) {
	#<?php echo esc_attr( $block_booster_additional_attributes['id'] ); ?> {
		<?php
		$block_booster_icon_mobile_gap = (int) $block_booster_mobile_gap;
		echo esc_attr( "gap: {$block_booster_icon_mobile_gap}px;" );
		?>
	}
	}
</style>