<?php
 /**
 * Donate Us File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );
?>
<div class="subsrb-review-box text-center facebook donation wow fadeIn" data-wow-delay="0.6s">
	<div class="review-box-inner">
		<i><?php echo 	wp_get_attachment_image( $image, 'thumbnail' ); ?></i>
		<p><?php echo wp_kses_post($title); ?></p>
		<span>
		<?php 
 	        $enable_button = $button;
          	$btn_link = $help_link;
         	$class = '';
         	$icon = '';
         	if ( $enable_button && $btn_link ) {
         		actavista_template_load( 'templates/shortcodes/button.php', compact( 'enable_button', 'btn_link', 'class', 'icon' ) );
         	}
         ?>
         </span>
	</div>
</div>