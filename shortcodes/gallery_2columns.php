<?php
 /**
 * Gallery Style 2 File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );

 $images = explode( ',', $gallery_images );
 if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
 	$img_obj = new ACTAVISTA_Resizer();
 }
 ?>


<div class="row">
 	<?php if ( $images ) : ?>
 		<?php foreach ( $images as $image ) : ?>
		<div class="col-lg-6 col-md-6 col-sm-6">
			<div class="gallery-item">
				<div class="galry-img wow fadeIn" data-wow-delay="0.1s">
					<figure>
	 					<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
	 						<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( $image, 'full' ), 558, 448, true ) ); ?>
	 					<?php else : ?>
	 						<?php echo wp_get_attachment_image( $image, 'full' ); ?>
	 					<?php endif; ?>
					</figure>
					<a href="<?php echo esc_url( wp_get_attachment_url(  $image, 'full' ) ); ?>" class="html5lightbox">
 						<i>
 							<img src="<?php echo  get_template_directory_uri().'/assets/images/zoom-icon.png'; ?>" alt="<?php echo esc_attr_e( 'icon', 'actavista' ); ?>">
 						</i>
 					</a>
				</div>
			</div>
		</div>
 		
 	<?php endforeach; ?>
</div>
<?php endif; ?>