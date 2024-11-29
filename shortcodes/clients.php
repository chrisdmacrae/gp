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

<?php $clients = json_decode( urldecode( $add_clients ) ); ?>

<?php if ( ! empty( $clients ) ) : ?>
<ul class="our-clients">

	<?php foreach ( $clients as $client ) : ?>
		<li>

			<?php echo ( actavista_set( $client, 'url' ) ) ? '<a href=" ' . esc_url( actavista_set( $client, 'url' ) ) . ' ">' : ''; ?>
				<?php echo wp_get_attachment_image( actavista_set( $client, 'client_image' ), 'full' ); ?>

				<?php echo ( actavista_set( $client, 'url' ) ) ? '</a>' : ''; ?>



			</li>
		<?php endforeach; ?>

	</ul>
	<?php wp_enqueue_script( array( 'carousel', 'script' ) ); ?>
<?php endif; ?>

