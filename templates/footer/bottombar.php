<div class="bottom-bar"  style="<?php echo esc_attr( $options->get( 'copyright_color_bg' ) ) ? 'background: '.esc_attr( $options->get( 'copyright_color_bg' ) ).'' : ''; ?>">

	<div class="container">
<div class="btmnew-area">
		<div class="row">

			<div class="<?php echo esc_attr( $options->get( 'show_footer_button' ) ) ? 'col-lg-7' : 'col-lg-12'; ?>  col-md-8" style="<?php echo ! $options->get( 'show_footer_button' ) ? 'text-align: center;' : ''; ?>">

				<div class="btm-tagline">

					<p><?php echo esc_html( $options->get('copyright_text') ) ?  wp_kses( $options->get('copyright_text'), true ) : esc_html_e( 'Copyright 2019 All Rights Reserved', 'actavista' ); ?></p>

				</div>

			</div>	
			

			<?php if ( $options->get( 'show_footer_button' ) && $options->get( 'footer_button_link' )  ) : ?>
				<div class="col-lg-5 col-md-4">

					<div class="footer-btn">

						<a class="theme_btn_flat" href="<?php echo esc_url( get_page_link( $options->get( 'footer_button_link' ) ) ); ?>"><?php echo esc_html( $options->get( 'footer_button_label' ) ); ?></a>

					</div>

				</div>
			<?php endif; ?>
		</div>

	</div>
</div>
</div><!-- bottombar -->