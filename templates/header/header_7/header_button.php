<div class="topfix-btns d-flex justify-content-end">
	<?php if ( $options->get( 'show_header7_button1' ) ) {
		$btn_label =  $options->get( 'header7_button_label1' );
		$btn_color =  $options->get( 'header7_btn_text_color1' );
		$btn_bg    =  $options->get( 'header7_btn_bg_color1' );
		$class__   = '';
      
		actavista_template_load( 'lifeline-donation/general_donation_btn.php', compact( 'class__', 'btn_label', 'btn_color', 'btn_bg' ) );
	} ?>
</div>