<?php
/**
 * Contact Form Shortcode
 *
 * @package WordPress
 * @subpackage Actavista
 * @author Webinane
 * @version 1.0
 */

$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts ); ?>
<?php if ( $title || $subtitle ) : ?>
 		<div class="main-heading">
 			<h3><?php echo esc_html( $title ); ?></h3>
 			<span><?php echo esc_html( $subtitle ); ?></span>
 		</div>
 	<?php endif; ?>
<?php echo do_shortcode('[contact-form-7 id="'.$contactform.'"]'); ?> 