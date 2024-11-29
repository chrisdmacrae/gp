<?php
 /**
 * Video Wit About Content File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );

 $videos = json_decode( urldecode( $add_videos ) );
 
 if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
 	$img_obj = new ACTAVISTA_Resizer();
 }
 ?>



 <div class="about-video-sec">
 	<div class="row">
 		<?php if ( $videos ) : $counter = 2; foreach ( $videos as $video ) : ?>
 			<div class="col-lg-6 col-md-6 col-sm-6 col-12">
 				<figure class="wow fadeIn" data-wow-delay="0.<?php echo esc_attr( $counter ); ?>s">

 					<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
 						<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( actavista_set( $video, 'image' ), 'full' ), 530, 394, true ) ); ?>
 					<?php else : ?>
 						<?php echo wp_get_attachment_image( actavista_set( $video, 'image' ), 'full' ); ?>
 					<?php endif; ?>

 					<?php if ( actavista_set( $video, 'video_enable' ) && actavista_set( $video, 'video_link' ) ) : ?>
 						<div class="video-play">
 							<a href="<?php echo esc_url( actavista_set( $video, 'video_link' ) ); ?>" class="html5lightbox"><i class="fa fa-play"></i></a>
 							<span><?php echo esc_html_e( 'video', 'actavista' ); ?></span>
 						</div>

 					<?php endif; ?>	
 				</figure>
 			</div>
 			<?php $counter=$counter+2; endforeach; endif; ?>

 			<?php if ( $title || $content ) : ?>
 				<div class="col-lg-12 col-sm-12">
 					<div class="about-meta wow fadeIn" data-wow-delay="0.2s">
 						<h2><?php echo esc_html( $title ); ?></h2>
 						<p>
 							<?php echo wp_kses_post( $content ); ?>
 						</p>
 					</div>
 				</div>
 			<?php endif; ?>
 		</div>

 	</div>
