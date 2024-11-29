<?php if ( !is_user_logged_in() ) : ?>
<div class="res-login-popup">
	<a class="popup-clos-btn" href="#"><i class="fa fa-times"></i></a>
		<div class="login-popup-inner text-center">
			<h4><?php esc_html_e( 'Have An Account?', 'actavista' ); ?></h4>
			<div class="res-login-form">

				<form method="post" class="res-login-here" id="loginfom" action="<?php echo admin_url('admin-ajax.php') . '?action=actavista_ajax&subaction=actavista_login_form'; ?>" >
					<div class="message-box" style="float:left;width:100%;"></div>	
					<input type="text" name="log"  class="form-control" placeholder="<?php esc_attr_e('User Name', 'actavista'); ?>">

					<input type="password" name="pwd" class="form-control" placeholder="<?php esc_attr_e('Password', 'actavista'); ?>" >

					<button type="submit" class="main-btn"> <?php esc_html_e('Login' , 'actavista'); ?></button>
					<?php wp_nonce_field('ajax-login-nonce', ACTAVISTA_KEY); ?>
				</form>

				<?php if ( $options->get( 'res_login_link' ) && $options->get( 'res_login_label' ) )  : ?>
					<a href="<?php echo get_page_link( $options->get( 'res_login_link' ) ); ?>"><?php echo wp_kses_post( $options->get( 'res_login_label' ) ); ?></a>
				<?php endif; ?>
			</div>
		</div>
		<?php wp_enqueue_script( 'login' ); ?>
</div>
<?php endif; ?>
<div class="res-search-popup">
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>"  method="get" class="res-searchform">
		<i class="fa fa-search"></i>
		<input type="text" id="s<?php echo uniqid(); ?>" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Your Search Title Here.....', 'actavista' ); ?>" />

		<a href="#" class="res-search-close-btn"><i class="fa fa-times"></i></a>
	</form>
</div>
