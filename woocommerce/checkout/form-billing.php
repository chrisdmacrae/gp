<?php

/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to
 * yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/** @global WC_Checkout $checkout */
?>
<div class="row">
	<div class="col-lg-12 col-sm-12">
		<?php if ( wc_ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

			<h3><?php _e( 'Billing &amp; Shipping', 'actavista' ); ?></h3>

		<?php else : ?>

			<h3><?php _e( 'Billing details', 'actavista' ); ?></h3>

		<?php endif; ?>
	</div>
	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

	<?php

	$fields = $checkout->get_checkout_fields( 'billing' );
	foreach ( $fields as $key => $field ) {
		if ( $key == 'billing_first_name' ) {
			echo '<div class="col-lg-6">';
		} elseif ( $key == 'billing_last_name' ) {
			echo '<div class="col-lg-6">';
		} else {
			echo '<div class="col-lg-12">';
		}
		if ( isset( $field[ 'country_field' ], $fields[ $field[ 'country_field' ] ] ) ) {
			$field[ 'country' ] = $checkout->get_value( $field[ 'country_field' ] );
		}
		$field[ 'placeholder' ] = actavista_set( $field, 'label' );
		$field[ 'label' ]       = '';
		woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
		echo '</div>';
	}
	?>

	<?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>
</div>

<?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
	<div class="woocommerce-account-fields">
		<?php if ( ! $checkout->is_registration_required() ) : ?>

			<p class="form-row form-row-wide create-account">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ) ?> type="checkbox" name="createaccount" value="1"/>
					<span><?php _e( 'Create an account?', 'actavista' ); ?></span>
				</label>
			</p>

		<?php endif; ?>

		<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

		<?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

			<div class="create-account">
				<?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>

					<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

				<?php endforeach; ?>
				<div class="clear"></div>
			</div>

		<?php endif; ?>

		<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
	</div>
<?php endif; ?>
