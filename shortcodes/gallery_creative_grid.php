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

 	<?php $counter = 0; if ( $images ) : $column = array( 5,7,7,5,5,7,7,5 ); ?>
		
 		<?php foreach ( $images as $image ) : ?>

		<div class="col-lg-<?php echo esc_attr($column[$counter]); ?> col-md-<?php echo esc_attr($column[$counter]); ?> col-sm-<?php echo esc_attr($column[$counter]); ?>">

			<div class="gallery-item">

				<div class="galry-img wow fadeIn" data-wow-delay="0.1s">

					<figure>

	 					<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>

	 						<?php if( $column[$counter] == 5 ) : ?>
								<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( $image, 'full' ), 461, 366, true ) ); ?>
	 						<?php else : ?>
								<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( $image, 'full' ), 661, 366, true ) ); ?>
	 			
	 					   <?php endif; ?>
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
 		

 	<?php $counter++; if( $counter == 7) {$counter=0;}  endforeach; ?>

</div>

<?php endif; ?>