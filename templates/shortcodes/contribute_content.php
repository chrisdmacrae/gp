<div class="<?php echo esc_attr( $leader_img ) ? 'col-lg-6 col-md-6' : 'col-lg-12 col-md-12'; ?> col-sm-12">
	<div class="verticl-middle wow fadeIn" data-wow-delay="0.4s">
		<div class="contribute-desc">
			<h2><?php echo esc_html( $title1 ); ?> <span><?php echo esc_html( $title2 ); ?></span></h2>
			<p><?php echo esc_html( $text ); ?></p>

			<div class="form-message-service"></div>
			<form method="post" class="newsletter contribute-form">

				<input type="email" name="EMAIL" placeholder="<?php esc_attr_e( 'Your E-mail Address', 'actavista' ); ?>" required>

				<input type="hidden" name="thelist" value="<?php echo esc_attr( ( $newsltr_mc_lists2 ) ); ?>" />

				<button type="submit"><?php esc_html_e( 'Subscribe', 'actavista' ); ?></button>

				<input type="hidden" class="theme-bg" name="_wpnonce" value="<?php echo esc_attr(wp_create_nonce(ACTAVISTA_NONCE)); ?>" />

			</form>

		</div>
	</div>	
</div>

<?php
 $custom_script = 'jQuery(document).ready(function ($) {          
 	$( "form.newsletter").on( "submit", function ( e ) {                  
 		e.preventDefault();
 		var thisform = this,
 		button = $(this).find("button[type=submit]"),
 		button_txt = button.text();

 		button.html( button_txt + " <i class=\'fa fa-refresh fa-spin\'></i>").attr(\'disabled\', \'disabled\');

 		var fields = $(thisform).serialize();
 		$.ajax({
 			type: "POST",

 			data: fields + "&action=actavista_ajax&subaction=actavista_newsletter",
 			url: actavista_data.ajaxurl,

 			success : function(response) {
 				$(".form-message-service").html(response);
 				$(".form-message-service").addClass("message-alert");
 				$(".form-message-service").fadeIn();
 				setTimeout(function(){ 
 					$(".form-message-service").fadeOut(100); }, 3000);

 					button.text(button_txt).removeAttr(\'disabled\');
 				},
 				fail: function(res) {
 					button.text(button_txt).removeAttr(\'disabled\');
 				}
 			});
 			return false;          
 		});            
 	});';

 wp_add_inline_script( 'script', $custom_script );

?>


