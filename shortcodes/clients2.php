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


<div class="row">
	<?php if ( $enable_heading && $title || $text ) : ?>
		<div class="col-lg-4">
			<div class="verticl-center wow fadeIn" data-wow-delay="0.2s">
				<div class="sported-media-info">
					<h2><?php echo esc_html( $title ); ?></h2>
					<p><?php echo wp_kses_post( $text ); ?></p>
				</div>
			</div>	
		</div>
	<?php endif; ?>
	<?php if ( ! empty( $clients ) ) : ?>
		<div class="<?php echo esc_attr( $enable_heading ) ? 'col-lg-8' : 'col-lg-12'; ?>">
			<div class="sported-media wow fadeIn" data-wow-delay="0.4s">
				<div class="row">
					<?php foreach ( $clients as $client ) : ?>
						<div class="col-lg-4 col-sm-4 col-6">
							<div class="sponsors">
								<?php echo ( actavista_set( $client, 'url' ) ) ? '<a href=" ' . esc_url( actavista_set( $client, 'url' ) ) . ' ">' : ''; ?>
									<?php echo wp_get_attachment_image( actavista_set( $client, 'client_image' ), 'full' ); ?>

									<?php echo ( actavista_set( $client, 'url' ) ) ? '</a>' : ''; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>


