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





 <div class="row masonry-grid">

 	<?php $counter = 0; if ( $images ) : $height = array( 260,560,260,260,560,260,260,260 ); ?>

 	<?php foreach ( $images as $image ) : ?>

 		<div class="col-lg-4 col-md-6 col-sm-6 col-6">

 			<div class="gallery-item">

 				<div class="galry-img">

 					<figure>

 						<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>

 							<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( $image, 'full' ), 360, $height[$counter], true ) ); ?>

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


 		<?php $counter++; if( $counter == 8) {$counter=0;} endforeach; ?>

 		<?php wp_enqueue_script( array( 'images-loaded', 'isotopee' ) ); ?>
 		<?php 
 	
 		$custom_script = 'jQuery(document).ready(function ($) {   
 			var $grid = $(".masonry-grid").isotope({

 				itemSelector: ".masonry-grid > div",

 			});

 			$grid.imagesLoaded().progress( function() {

 				$grid.isotope("layout");

 			});
 		});';
 		wp_add_inline_script( "script", $custom_script );
 		?>


 	</div>

 <?php endif; ?>