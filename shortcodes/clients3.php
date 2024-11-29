<?php

/**
 * Our Clients2 Shortcode
 *
 * @package WordPress
 * @subpackage Actavista
 * @author Webinane
 * @version 1.0
 */

$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts ); ?>

<?php $clients = json_decode( urldecode( $add_clients ) ); ?>

<?php echo esc_attr( $enable_heading && $title ) ? '<h5 class="sponsor-title">'.esc_html( $title ).'</h5>' : ''; ?>
<?php if ( ! empty( $clients ) ) : ?>
	<?php $uni_id = 'gold-sponsors'.uniqid(); ?>
	<ul class="gold-sponsors <?php echo esc_attr( $uni_id ); ?>">

		<?php foreach ( $clients as $client ) : ?>
			<li>
				
				<?php echo ( actavista_set( $client, 'url' ) ) ? '<a href=" ' . esc_url( actavista_set( $client, 'url' ) ) . ' ">' : ''; ?>
				<?php echo wp_get_attachment_image( actavista_set( $client, 'client_image' ), 'full' ); ?>

				<?php echo ( actavista_set( $client, 'url' ) ) ? '</a>' : ''; ?>

			</li>
		<?php endforeach; ?>
	</ul>
	
<?php endif; ?>



