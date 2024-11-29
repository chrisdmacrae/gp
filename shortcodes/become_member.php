<?php
 /**
 * Become Member File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );
 ?>

 <div class="become_member">
 	<h3><?php echo esc_html( $title ); ?></h3>
 	<span><?php echo esc_html( $subtitle ); ?></span>
 	<p><?php echo wp_kses_post( $text ); ?></p>
 	<?php 
 	$enable_button = $button;
 	$btn_link = $help_link;
 	$class = 'main-btn';
 	$icon = '';
 	if ( $enable_button && $btn_link ) {
 		actavista_template_load( 'templates/shortcodes/button.php', compact( 'enable_button', 'btn_link', 'class', 'icon' ) );
 	}
 	?>


 </div>
