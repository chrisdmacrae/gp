<?php
/**
 * Heading With Icon Shortcode
 *
 * @package WordPress
 * @subpackage Actavista
 * @author Webinane
 * @version 1.0
 */

$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts ); ?>
<?php if ( $enable_title_typo ) : 
	$title_font = getFontsData( $title_font );
	enqueueGoogleFonts($title_font);
	$title_font_inline_style = googleFontsStyles( $title_font );

endif; ?>
<?php if ( $enable_text_typo ) : 
	$text_font = getFontsData( $text_font );
	enqueueGoogleFonts($text_font);
	$text_font_inline_style = googleFontsStyles( $text_font );

endif; ?>

<div class="title">
	<h4 <?php if( $enable_title_typo ) : ?> style="<?php echo $title_font_inline_style; ?>  font-size:<?php echo esc_attr($title_size); ?>; color:<?php echo esc_attr( $title_color ); ?>";<?php endif; ?> ><i class="fa <?php echo esc_attr( $title_icon ); ?>"></i> <?php echo wp_kses_post( $contact_title ); ?></h4>
	<p <?php if( $enable_text_typo ) : ?> style="<?php echo $text_font_inline_style; ?>  line-height: <?php echo $text_lineheight; ?>; font-size:<?php echo esc_attr($text_size); ?>; color:<?php echo esc_attr( $text_color ); ?>";<?php endif; ?> ><?php echo wp_kses_post( $contact_text ); ?> </p>
</div>
