<?php
 /**
 * Content Video Box File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */
 $atts = vc_map_get_attributes( $tag, $atts );
 extract( $atts );
 if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
 	$img_obj = new ACTAVISTA_Resizer();
 }
 
?>
 <div class="row align-items-center">
 	<div class="col-lg-6">
 		<div class="vid-msg-content">
 			<h2><?php echo wp_kses_post( $title ); ?></h2>
 			<p><?php echo wp_kses_post( $text ); ?></p>
 			<?php 
	 			$enable_button = $button;
	 			$btn_link = $help_link;
	 			$class = 'theme_btn_flat';
	 			$icon = '';
	 			if ( $enable_button && $btn_link ) {
	 				actavista_template_load( 'templates/shortcodes/button.php', compact( 'enable_button', 'btn_link', 'class', 'icon' ) );
	 			}
 			?>
 		</div>
 	</div>
 	<?php if ( $video_custom_link ) :  $icon = ( $video_type == 'youtube' ) ? 'fa fa-youtube-play' : 'fa fa-play';  ?>
	 	<div class="col-lg-6">
	 		<div class="<?php echo ( $video_type == 'youtube' ) ? 'vid-msg-pop' : 'vid-sec2'; ?>">
	 			<figure>
	 				<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
		 				<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( $video_image, 'full' ), 555, 437, true ) ); ?>
		 			<?php endif; ?>
		 			<?php if ( $video_type == 'youtube' ) : ?>
		 				<h4><?php echo esc_html( $video_custom_title ); ?></h4>
	 				<?php endif; ?>
	 				<a href="<?php echo esc_url( $video_custom_link ); ?>" class="html5lightbox"><i class="<?php echo esc_attr( $icon ); ?>"></i></a>
	 			</figure>
	 		</div>
	 	</div>
	 <?php endif; ?>
 </div>

