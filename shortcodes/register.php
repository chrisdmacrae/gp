<?php
/**
 * Login Form Shortcode
 *
 * @package WordPress
 * @subpackage Actavista
 * @author Webinane
 * @version 1.0
 */
$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts ); 

wp_enqueue_script( array( 'sweetalert2' ) );

?>

<div class="row">
	<?php if ( $side_image || $logo_image ) : ?>
		<div class="col-lg-6 col-sm-12 col-xs-12">
			<div class="login-avatar">
				<figure><?php echo wp_get_attachment_image( $side_image, 'full' ); ?></figure>
				<span class="upper-logo"><?php echo wp_get_attachment_image( $logo_image, 'full' ); ?></span>
			</div>
		</div>

	<?php endif; ?>
	<div class="<?php echo esc_attr( $side_image || $logo_image ) ? 'col-lg-6' : 'col-lg-12'; ?> col-md-12 col-sm-12">
		<div class="login-area">
			<h2>
				<?php echo esc_html( $title ); ?>
				<?php if ( $login_btn && $btn_link ) : ?>
					<?php 
					$enable_button = $login_btn;
					$btn_link = $btn_link;
					$class = '';
					$icon = '';

					actavista_template_load( 'templates/shortcodes/button.php', compact( 'enable_button', 'btn_link', 'class', 'icon' ) );

					?>
				<?php endif; ?>
			</h2>
			<p><?php echo wp_kses_post( $text ); ?></p>
			<form method="post" id="registerfom" action="<?php echo admin_url('admin-ajax.php') . '?action=actavista_ajax&subaction=actavista_register_form'; ?>" >
				<div class="row">
				<div class="col-lg-6 col-sm-12">
					<input type="text" name="fname" placeholder="<?php esc_attr_e('First Name', 'actavista'); ?>">
				</div>
				<div class="col-lg-6 col-sm-12">
					<input type="text" name="last_name" placeholder="<?php esc_attr_e('Last Name', 'actavista'); ?>" required/>			
				</div>
				<div class="col-lg-6 col-sm-12">
					<input type="text" name="username" placeholder="<?php esc_attr_e('User Name', 'actavista'); ?>">
				</div>
				<div class="col-lg-6 col-sm-12">
					<input type="text" name="email" placeholder="<?php esc_attr_e('Email', 'actavista'); ?>">
				</div>
				<div class="col-lg-6 col-sm-12">
					<input type="text" name="password" placeholder="<?php esc_attr_e('Password', 'actavista'); ?>">
				</div>
				<div class="col-lg-6 col-sm-12">
					<input type="text" name="confirm_password" placeholder="<?php esc_attr_e('Confirm Password', 'actavista'); ?>">
				</div>
				<div class="col-sm-12">

					<button type="submit">
						<?php echo esc_attr($label_bttn) ? ($label_bttn) : esc_html_e('register now' , 'actavista'); ?>
					</button>

					<?php wp_nonce_field( 'ajax-login-nonce', ACTAVISTA_KEY ); ?>

				</div>
			</div>
			</form>
		</div>
	</div>
</div>

<?php wp_enqueue_script( 'login' ); ?>

<?php if ( is_user_logged_in() ) {
	
	$js = "
	window.location = '".esc_url( home_url('/') )."';
	";

	wp_add_inline_script( 'login', $js );
}