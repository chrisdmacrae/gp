<div class="<?php echo ( ! $leader_img ) ? 'col-lg-12 text-center' : 'col-lg-6'; ?>">
	<div class="creative-baner-meta wow fadeIn" data-wow-delay="0.4s">
		<div class="middle-verticle">
			<?php if ( $leader_quote ) : ?>
					<?php if ( $enable_title_typo ) : 
						$title_font = getFontsData( $title_font );
						enqueueGoogleFonts($title_font);
						$title_font_inline_style = googleFontsStyles( $title_font );
					
					
					endif; ?>
				<h2 <?php if( $enable_title_typo ) : ?> style="<?php echo $title_font_inline_style; ?>  font-size:<?php echo esc_attr($title_size); ?>; color:<?php echo esc_attr( $title_color ); ?>";<?php endif; ?>>
					<?php 
					if ( function_exists( 'actavista_decrypt' ) && $leader_quote) {

						echo do_shortcode( urldecode( actavista_decrypt( $leader_quote ) ) );
					} 
					?>
				</h2>
			<?php endif; ?>
			<?php if ( $text ) : ?>
				<?php if ( $enable_text_typo ) : 
					$text_font = getFontsData( $text_font );
					enqueueGoogleFonts($text_font);
					$text_font_inline_style = googleFontsStyles( $text_font );
					
				endif; ?>
				<p <?php if( $enable_text_typo ) : ?> style="<?php echo $text_font_inline_style; ?>  font-size:<?php echo esc_attr($text_size); ?>; color:<?php echo esc_attr( $text_color ); ?>";<?php endif; ?>>
					<?php echo wp_kses_post( $text ); ?>
				</p>
			<?php endif; ?>
			<span><?php echo wp_get_attachment_image( $sign_img, 'full' ); ?></span>
			<?php if ( ! empty ( $button && $help_link ) ) {

				$link = ( '||' === $help_link ) ? '' : $help_link;  

				$link = vc_build_link( $link ); 

			} ?>

			<?php if ( ! empty( $link ) ) : ?>
				<?php  
					$button_css = '';
				if ( $enable_button_typo ) : 
						$button_font = getFontsData( $button_font );
						enqueueGoogleFonts($button_font);
						$button_font_inline_style = googleFontsStyles( $button_font );
					
					extract(shortcode_atts(array(
						'button_css' => ''
					), $atts));
					$button_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $button_css, ' ' ), '', $atts );

				endif; 
				?>

				<a <?php if( $enable_button_typo ) : ?> style="<?php echo $button_font_inline_style; ?>  font-size:<?php echo esc_attr($button_size); ?>; color:<?php echo esc_attr( $button_color ); ?>";<?php endif; ?> class="main-btn <?php echo esc_attr( $button_css ); ?>" href="<?php echo esc_url( $link['url'] ); ?>" title="<?php echo esc_attr( $link['title'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
			<?php endif; ?>

		</div>	
	</div>
</div>	