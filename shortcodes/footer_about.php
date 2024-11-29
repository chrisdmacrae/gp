<?php

 /**

 * Footer About Widget File

 *

 * @package Actavista

 * @author  Webinane

 * @version 1.0

 */



 $atts = vc_map_get_attributes( $tag, $atts );



 extract( $atts );

 ?>
 <div class="widget wow fadeIn" data-wow-delay="0.2s">

 	<div class="about-widget">
		<?php 
		if( $logo_image ) {
			echo '<a href="'.esc_url( home_url( '/' ) ). '">'.wp_get_attachment_image( $logo_image, 'full' ).'</a>';
		} else {
			echo '<a href="'.esc_url( home_url( '/' ) ). '"><img src="'.get_template_directory_uri().'/assets/images/svg-logo.svg'.'" alt="logo"></a>';
		}
 		?>

 		<p><?php echo wp_kses_post( $text ); ?></p>

 		<p class="copyright"><?php echo wp_kses_post( $bottom_text ); ?></p>
 	</div>

 </div>