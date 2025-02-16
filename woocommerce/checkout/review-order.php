<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to
 * yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see           https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       5.2.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="shop_table woocommerce-checkout-review-order-table">
	<ul class="products-view">
		<li>
			<div class="product-name"><?php _e( 'Product', 'actavista' ); ?></div>
			<div class="product-total"><?php _e( 'Total', 'actavista' ); ?></div>
		</li>
		<?php
		do_action( 'woocommerce_review_order_before_cart_contents' );
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item[ 'data' ], $cart_item, $cart_item_key );
			if ( $_product && $_product->exists() && $cart_item[ 'quantity' ] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				<li>
					<div class="product-names">
						<?php echo strip_tags( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) ); ?>
					</div>
					<div class="product-quantity">
						<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times; %s', $cart_item[ 'quantity' ] ) . '</strong>', $cart_item, $cart_item_key ); ?>

						<?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
					</div>
					<div class="product-price">
						<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item[ 'quantity' ] ), $cart_item, $cart_item_key ); ?>
					</div>
				</li>
				<?php
			}
		}
		do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
	</ul>
	<ul class="cart-subtotal">
		<li><?php _e( 'Subtotal', 'actavista' ); ?></li>
		<li><?php wc_cart_totals_subtotal_html(); ?></li>
	</ul>
	<?php if ( ! empty( WC()->cart->get_coupons() ) && is_array( WC()->cart->get_coupons() ) ): ?>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<ul class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<li><?php wc_cart_totals_coupon_label( $coupon ); ?></li>
				<li class="coupon-btn"><?php wc_cart_totals_coupon_html( $coupon ); ?></li>
			</ul>
		<?php endforeach; ?>

	<?php endif; ?>
	<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

		<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

		<?php wc_cart_totals_shipping_html(); ?>

		<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

	<?php endif; ?>

	<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
		<li class="fee"><?php echo esc_html( $fee->name ); ?></li>
		<li class="fee"<?php wc_cart_totals_fee_html( $fee ); ?></li>
	<?php endforeach; ?>

	<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>

		<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>

			<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
				<ul class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
					<li><?php echo esc_html( $tax->label ); ?></li>
					<li><?php echo wp_kses_post( $tax->formatted_amount ); ?></li>
				</ul>
			<?php endforeach; ?>

		<?php else : ?>
			<ul class="tax-total">
				<li class="tax-total"><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></li>
				<li class="tax-total"><?php wc_cart_totals_taxes_total_html(); ?></li>
			</ul>
		<?php endif; ?>

	<?php endif; ?>

	<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>
	<ul class="order-total">
		<li><?php _e( 'Total', 'actavista' ); ?></li>
		<li><?php wc_cart_totals_order_total_html(); ?></li>
	</ul>

	<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
</div>