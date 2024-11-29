<?php

/**
 * Our Clients Shortcode
 *
 * @package WordPress
 * @subpackage Actavista
 * @author Webinane
 * @version 1.0
 */

$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts ); ?>

<?php $opinions = json_decode( urldecode( $add_opinions ) ); ?>

<?php if ( ! empty( $opinions ) ) :

if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
	$img_obj = new ACTAVISTA_Resizer();
}
?>
<div class="sidebar">
	<div class="widget">
		<?php if ( $title_main ) : ?>
			<div class="widget-title">
				<h4><?php echo esc_html( $title_main ); ?></h4>
			</div>
		<?php endif; ?>
		<?php foreach ( $opinions as $opinion ) : ?>
			<div class="opinion">
				<p>
					<?php echo wp_kses_post( actavista_set( $opinion, 'test' ) ); ?>
				</p>
				<span><?php echo wp_kses_post( actavista_set( $opinion, 'name' ) ); ?></span>
				<i><?php echo wp_kses_post( actavista_set( $opinion, 'date' ) ); ?></i>
				<figure>
					<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
						<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( actavista_set( $opinion, 'image' ), 'full' ), 75, 75, true ) ); ?>
					<?php else : ?>
						<?php echo wp_get_attachment_image(actavista_set( $opinion, 'image' ), 'full' ); ?>
					<?php endif; ?>
				</figure>
			</div>
		<?php endforeach; ?>
	</div><!-- opinion quote -->

</div>
<?php endif; ?>

