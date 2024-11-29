<div class="topfix-btns d-flex justify-content-end">
	<?php if ( $options->get( 'show_header6_button1' ) ) {
		$btn_label =  $options->get( 'header6_button_label1' );
		$btn_color =  $options->get( 'header6_btn_text_color1' );
		$btn_bg    =  $options->get( 'header6_btn_bg_color1' );
		$class__   = '';
      
		actavista_template_load( 'lifeline-donation/general_donation_btn.php', compact( 'class__', 'btn_label', 'btn_color', 'btn_bg' ) );
	} ?>
	<?php if ($options->get( 'show_header6_button2' ) && $options->get( 'header6_button_label2' ) ) : ?>
		<a style="color:<?php echo esc_attr( $options->get('header6_btn_text_color2') ).';'; ?> background-color:<?php echo esc_attr( $options->get('header6_btn_bg_color2' ) ).';'; ?>" href="<?php echo esc_url( $options->get( 'header6_button_link2' ) ); ?>"><?php echo esc_html( $options->get( 'header6_button_label2' )  ); ?></a>
	<?php endif; ?>
	<?php if ($options->get( 'show_header6_button3' ) && $options->get( 'header6_button_label3' ) ) : ?>
		<a style="color:<?php echo esc_attr( $options->get('header6_btn_text_color3') ).';'; ?> background-color:<?php echo esc_attr( $options->get('header6_btn_bg_color3' ) ).';'; ?>" href="<?php echo esc_url( $options->get( 'header6_button_link3' ) ); ?>"><?php echo esc_html( $options->get( 'header6_button_label3' )  ); ?></a>
	<?php endif; ?>
</div>