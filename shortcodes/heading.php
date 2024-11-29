<?php
/**
 * Heading2 Shortcode
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

<?php if ( $enable_tagline_typo ) : 
	$tagline_font = getFontsData( $tagline_font );
	enqueueGoogleFonts($tagline_font);
	$tagline_font_inline_style = googleFontsStyles( $tagline_font );

endif; ?>
<div class="heading-sec-style2 text-center">
	<span <?php if( $enable_tagline_typo ) : ?> style="<?php echo $tagline_font_inline_style; ?>  font-size:<?php echo esc_attr($tagline_size); ?>; color:<?php echo esc_attr( $tagline_color ); ?>";<?php endif; ?>><?php echo wp_kses_post( $tagline ); ?></span>
	<h2 <?php if( $enable_title_typo ) : ?> style="<?php echo $title_font_inline_style; ?>  font-size:<?php echo esc_attr($title_size); ?>; color:<?php echo esc_attr( $title_color ); ?>";<?php endif; ?>><?php echo wp_kses_post( $title1 ); ?></h2>
	
</div>
