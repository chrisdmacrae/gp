<?php
 /**
 * About Us File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );
 
 ?>

 <div class="text-center service-box wow fadeIn" data-wow-delay="0.2s">

 	
 	<?php if ( 'image_icon' === $icon_type ) : ?>

 		<?php echo wp_get_attachment_image( $iconimage, 'full' ); ?>

 	<?php elseif(  'icon_icon' === $icon_type ) : ?>

 		<i class="<?php echo esc_attr( $iconicon ); ?>"></i>

 	<?php else : ?>

 		<i class="<?php echo esc_attr( $info_icon2 ); ?>"></i> 

 	<?php endif; ?>

 	<div class="service-info">
 		<h4><?php echo esc_html( $title ); ?></h4>
 		<p><?php echo wp_kses_post( $content ); ?></p>

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