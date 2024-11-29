<?php
 /**
 * Gallery Style 1 File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );

 $slides = json_decode( urldecode( $add_slide ) );
 if ( $slides ) :
 	?>
 	<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
 		$img_obj = new ACTAVISTA_Resizer();
 	} 
 	?>
 	<div class="feature-with-caro side-padding">	
 		<div class="featured-caro owl-1">
 			<?php $counter = 0; foreach ( $slides  as $slide ) : ?>
 			<div class="featured-slide" data-hash="link<?php echo esc_attr( $counter ); ?>">
 				<figure><?php echo wp_get_attachment_image( actavista_set( $slide, 'image' ), 'full' ); ?></figure>
 				<div class="caro-meta">
 					<h1><?php echo esc_html( actavista_set( $slide, 'title' ) ); ?></h1>
 					<?php if ( actavista_set( $slide, 'v_link' ) ) : ?>
 						<span>
 							<a href="<?php echo esc_url( actavista_set( $slide, 'v_link' ) ); ?>" class="html5lightbox"><i class="fa fa-play-circle"></i></a>
 						</span>
 					<?php endif; ?>
 					<p>
 						<?php echo wp_kses_post( actavista_set( $slide, 'description' ) ); ?>
 					</p>
 				</div>
 			</div>
 			<?php $counter++; endforeach; ?>
 		</div>
 		<ul class="featured-caro-btn owl-2">
 			<?php $counter = 0; foreach ( $slides  as $slide ) : ?>

 			<li>
 				<a href="#link<?php echo esc_attr( $counter ); ?>">


 					<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
 						<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( actavista_set( $slide, 'image' ), 'full' ), 250, 140, true ) ); ?>
 					<?php else : ?>
 						<?php echo wp_get_attachment_image( actavista_set( $slide, 'image' ), 'full' ); ?>
 					<?php endif; ?>
 					
 					<span class="thumb-title">
 						<?php if ( actavista_set( $slide, 'v_link' ) ) : ?>	
 							<i class="fa fa-play"></i>
 						<?php endif; ?>
 						<span><?php echo wp_kses_post( actavista_set( $slide, 'thumb_title' ) ); ?></span>
 					</span>
 				</a>
 			</li>

 			<?php $counter++; endforeach; ?>
 		</ul>
 	</div>	
 	<?php wp_enqueue_script( array( 'carousel', 'script' ) ); ?>
 <?php endif; ?>