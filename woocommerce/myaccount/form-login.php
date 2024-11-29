<?php

/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 9.2.0
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>
<div class="login-page">
	<?php wc_print_notices(); ?>

	<?php do_action('woocommerce_before_customer_login_form'); ?>

	<?php if (get_option('woocommerce_enable_myaccount_registration') === 'yes') : ?>
		<div class="row" id="customer_login">
			<div class="col-lg-4">
			<?php endif; ?>
			<div class="login">
				<h4 class="login-title"><?php esc_html_e('LOG IN YOUR ACCOUNT', 'actavista'); ?></h4>
				<p>Log in to your account to discovery all great features in this template.</p>
				<form class="woocommerce-form woocommerce-form-login login" method="post">
					<?php do_action('woocommerce_login_form_start'); ?>
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="<?php esc_attr_e("Username", "konia"); ?>" name="username" id="username" autocomplete="username" value="<?php echo (! empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																																			?>
					</p>
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" placeholder="<?php esc_attr_e("Password", "konia"); ?>" name="password" id="password" autocomplete="current-password" />
					</p>
					<?php do_action('woocommerce_login_form'); ?>
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" />
					<span><?php esc_html_e('keep me logged in', 'actavista'); ?></span>
					<a class="forgot" href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Forgot your password?', 'actavista'); ?></a>
					<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
					<button type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e('Log in', 'actavista'); ?>"><?php esc_html_e('Log in', 'actavista'); ?></button>
					<?php do_action('woocommerce_login_form_end'); ?>
				</form>
			</div>
			<?php if (get_option('woocommerce_enable_myaccount_registration') === 'yes') : ?>
			</div>
			<div class="col-lg-8">
				<div class="login register">
					<h4 class="login-title"><?php esc_html_e('Create New Account', 'actavista'); ?></h4>
					<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
					<form method="post" class="woocommerce-form woocommerce-form-register register">
						<div class="row">
							<?php do_action('woocommerce_register_form_start'); ?>

							<?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>
								<div class="col-lg-6 woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<input placeholder="<?php esc_attr_e("Username", "konia"); ?>" type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo (! empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																																							?>
								</div>
							<?php endif; ?>
							<div class="col-lg-6 woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
								<input placeholder="<?php esc_attr_e("Email address", "konia"); ?>" type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo (! empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																																				?>
							</div>
							<?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>
								<div class="col-lg-6 woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<input placeholder="<?php esc_attr_e("Password", "konia"); ?>" type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
								</div>
							<?php endif; ?>

							<?php do_action('woocommerce_register_form'); ?>
							<div class="col-lg-12 woocommerce-FormRow form-row">
								<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
								<button type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e('Register', 'actavista'); ?>"><?php esc_html_e('Register', 'actavista'); ?></button>
							</div>
							<?php do_action('woocommerce_register_form_end'); ?>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php do_action('woocommerce_after_customer_login_form'); ?>
</div>