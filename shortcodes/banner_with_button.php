<?php

 /**

 * Banner With Button File

 *

 * @package Actavista

 * @author  Webinane

 * @version 1.0

 */
 $atts = vc_map_get_attributes( $tag, $atts );
 extract( $atts );
 ?>

 <div class="orginizer baner wow fadeIn" data-wow-delay="0.2s">

 	<span><?php echo esc_html( $title ); ?></span>

 	<h2><?php echo wp_kses_post( $text ); ?></h2>

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