<div class="subcription-form">
	<form id="comingSoon" class="sub-form" method="post">
		<div id="messages"></div>
		<input class="form-control"  type="email" name="EMAIL" placeholder="<?php esc_attr_e( 'Enter Email Address....', 'actavista' ); ?>" required/>

		<input type="hidden" name="thelist" value="<?php echo esc_attr( ( $options->get( 'newsltr_mc_lists_comingsoon' ) ) ); ?>" />

		<input type="submit" value="<?php echo esc_attr_e('SUBSCRIBE', 'actavista'); ?>" class="main-btn">
		<input type="hidden"  name="_wpnonce" value="<?php echo esc_attr(wp_create_nonce(ACTAVISTA_NONCE)); ?>" />

	</form>
</div>

<?php 
$custom_script = 'jQuery(document).ready(function ($) {          
	$( "form#comingSoon").on( "submit", function ( e ) {                  
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
				$("#messages").html(response);
				$("#messages").addClass("message-alert");
				$("#messages").fadeIn();
				setTimeout(function(){ 
					$("#messages").fadeOut(100); }, 3000);

					button.text(button_txt).removeAttr(\'disabled\');
				},
				fail: function(res) {
					button.text(button_txt).removeAttr(\'disabled\');
				}
			});
			return false;          
		});            
	});';
	wp_add_inline_script( 'downCount', $custom_script );
?>