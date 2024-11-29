<?php
 /**
 * Videos File
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

 	$custom_width   = ( $columns == 'col-lg-6' ) ? 550 : 360;
 	$custom_height  = ( $columns == 'col-lg-6' ) ? 350 : 222;


 ?>
 <div class="row merged-5">
 	<?php if ( $title || $subtitle ) : ?>
 		<div class="col-lg-12">
 			<div class="main-title">
 				<h3><?php echo esc_html( $title ); ?></h3>
 				<span><?php echo esc_html( $subtitle ); ?></span>
 			</div>
 		</div>
 	<?php endif; ?>
 	<?php if ( $videos ) : ?>
 	<?php $counter = 2; foreach ( $videos  as $video ) : ?>
 	<div class="<?php echo esc_attr( $columns ); ?> col-sm-6">
 		<div class="our-last-event wow fadeIn" data-wow-delay="0.<?php echo esc_attr( $counter ); ?>s">
 			<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
 				<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( actavista_set( $video, 'videos_image' ), 'full' ), $custom_width, $custom_height, true ) ); ?>

 			<?php endif; ?>

 			<div class="uphover">
 				<?php if ( actavista_set( $video, 'video_link' ) ) : ?>
 					<a href="<?php echo esc_url( actavista_set( $video, 'video_link' ) ); ?>" class="html5lightbox"><i class="fa fa-play-circle-o"></i></a>
 				<?php endif; ?>
 				<span><?php echo ( actavista_set( $video, 'video_label' ) ); ?></span>
 			</div>
 		</div>
 	</div>
 	<?php $counter+2; endforeach; endif; ?>
 </div>
