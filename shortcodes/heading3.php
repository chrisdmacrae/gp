<?php
/**
 * Heading 3 Shortcode
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
<div class="main-title <?php echo esc_attr( $title_position ); ?>">
	<span <?php if( $enable_tagline_typo ) : ?> style="<?php echo $tagline_font_inline_style; ?>  font-size:<?php echo esc_attr($tagline_size); ?>; color:<?php echo esc_attr( $tagline_color ); ?>";<?php endif; ?>><?php echo wp_kses_post( $tagline ); ?></span>
	<h3 <?php if( $enable_title_typo ) : ?> style="<?php echo $title_font_inline_style; ?>  font-size:<?php echo esc_attr($title_size); ?>; color:<?php echo esc_attr( $title_color ); ?>";<?php endif; ?>><?php echo wp_kses_post( $title1 ); ?><?php echo wp_kses_post( $title2 ) ? '<span  style="color:'.$title2_color.'">'.' ' .$title2.'</span>' : ''; ?></h3>

</div>