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

 $galleries = json_decode( urldecode( $add_gallery ) );
if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
	 	$img_obj = new ACTAVISTA_Resizer();
	 }
 if ( $galleries ) : 
 	if ( $width && $height ) {
 		$custom_width  =  $width;
 		$custom_height = $height;
 	} else {
 		$custom_width   = ( $columns == 'col-lg-6' ) ? 550 : 438;
 		$custom_height  = ( $columns == 'col-lg-6' ) ? 450 : 320;

 	}

 	?>

<div class="row remove-row-gap">
 	<?php foreach ( $galleries as $gallery ) : ?>
 		<div class="<?php echo esc_attr( $columns ); ?> col-sm-6 wow fadeIn" data-wow-delay="0.2s">
 			<div class="grid-gallery">
 				<figure>
 					<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
 						<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( actavista_set( $gallery, 'gallery_image' ), 'full' ), $custom_width, $custom_height, true ) ); ?>
 					<?php else : ?>
 						<?php echo wp_get_attachment_image( actavista_set( $gallery, 'gallery_image' ), 'full' ); ?>
 					<?php endif; ?>
 				</figure>
 				<div class="grid-meta">
 					<a href="<?php echo esc_url( wp_get_attachment_url( actavista_set( $gallery, 'gallery_image' ), 'full' ) ); ?>" class="html5lightbox"><i class="fa fa-search"></i></a>
 					<h4><?php echo esc_html( actavista_set( $gallery, 'gallery_title' ) ); ?></h4>
 					<span><?php echo esc_html( actavista_set( $gallery, 'gallery_subtitle' ) ); ?></span>
 				</div>
 			</div>
 		</div>
 	<?php endforeach; ?>
 </div>
 <?php endif; ?>