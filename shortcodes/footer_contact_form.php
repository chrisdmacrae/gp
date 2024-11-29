<?php
/**
 * Footer Contact Form Shortcode
 * @package WordPress
 * @subpackage Actavista
 *
 * @author Webinane
 * @version 1.0
 */

$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts ); ?>

<div class="widget wow fadeIn" data-wow-delay="0.4s">
	<div class="mail-form">
		<h4 class="form-title"><?php echo esc_html( $title ); ?></h4>
		<?php echo do_shortcode('[contact-form-7 id="'.$contactform.'"]'); ?> 
	</div>
</div>