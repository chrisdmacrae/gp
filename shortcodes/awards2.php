<?php
 /**
 * Awards2 File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );

 $awards = json_decode( urldecode( $add_awards ) );
 
 if ( $awards ) : ?>

 <?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
 	$img_obj = new ACTAVISTA_Resizer();
 } 
 ?>
<div class="row">
 <div class="col-lg-12">
 	<ul class="nav nav-tabs award-year">
 		<?php $counter = 0; foreach( $awards as  $award ) : ?>

 		<li class="nav-item"><a class="<?php echo esc_attr( $counter == 0 ) ? 'active' : ''; ?>" href="#year<?php echo esc_attr( $counter ); ?>" data-toggle="tab"><?php echo actavista_set( $award, 'year' ); ?></a></li>

 		<?php $counter++; endforeach; ?>

 	</ul>
 </div>
 <!-- Tab panes -->
 <div class="col-lg-12">
 	<div class="tab-content gray-bg">
 		<?php $counter = 0; foreach( $awards as  $award ) : ?>
 		<div class="tab-pane fade <?php echo esc_attr( $counter == 0 ) ? 'active show' : ''; ?> " id="year<?php echo esc_attr( $counter ); ?>">
 			<div class="award-detail">
 				<?php if ( class_exists( 'ACTAVISTA_Resizer' ) && actavista_set( $award, 'main_image' ) ) : ?>
 					<figure class="align-left">
 						<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( actavista_set( $award, 'main_image' ) ), 400, 293, true ) ); ?>
 					</figure>
 				<?php endif; ?>
 				
 				<span><?php echo actavista_set( $award, 'year' ); ?></span>
 				<h4><?php echo actavista_set( $award, 'title' ); ?></h4>
 				<?php 
 				if ( function_exists( 'actavista_decrypt' ) &&  actavista_set( $award, 'text' ) ) {

 					echo do_shortcode( urldecode( actavista_decrypt( actavista_set( $award, 'text' ) ) ) );
 				} 
 				?>

 			</div>
 			<?php if ( actavista_set( $award, 'enable_gallery' ) ) : ?>
 				<div class="award-gallery">
 					<div class="simple-heading">
 						<i class="fa fa-eercast"></i>
 						<h4><?php echo actavista_set( $award, 'gallery_title' ); ?></h4>
 					</div>
 					<div class="row">
 						<?php
 						$galleries = actavista_set( $award, 'gallery_images_' ); 
 						$explod_image = explode( ',' , $galleries );
 						if ( $explod_image ) :

 							foreach ( $explod_image as $image ) :
 								?>
 								<div class="<?php echo esc_attr( actavista_set( $award, 'columns' ) ); ?> col-sm-4">
 									<figure class="gallery-images">
 										<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
 											<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url(  $image, 'full' ), 440, 330, true ) ); ?>
 										<?php else : ?>
 											<?php echo wp_get_attachment_image( $image, 'full' ); ?>
 										<?php endif; ?>
 										<a href="<?php echo esc_url( wp_get_attachment_url(  $image, 'full' ) ); ?>" class="html5lightbox"><i>
 											<img src="<?php echo  get_template_directory_uri().'/assets/images/icon5.png'; ?>" alt="<?php echo esc_attr_e( 'icon', 'actavista' ); ?>">
 										</i></a>
 									</figure>
 								</div>
 							<?php endforeach; 
 						endif;
 						?>
 					</div>
 				</div>
 			<?php endif; ?>
 		</div>

 		<?php $counter++; endforeach; ?>
 	</div>
 </div>	
 
 </div>
<?php endif; ?>