<?php
/**
 * External product add to cart
 *
 * This template can be overridden by copying it to
 * yourtheme/woocommerce/single-product/add-to-cart/external.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;
do_action( 'woocommerce_before_add_to_cart_form' );
?>
<form class="cart" action="<?php echo esc_url( $product_url ); ?>" method="get">
	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
	<?php if ( ! empty( get_post_meta( get_the_ID(), 'product_size_guide', true ) ) || ! empty( get_post_meta( get_the_ID(), 'product_develivery_label', true ) ) ) : ?>
		<div class="delivery-guide">
			<?php if ( ! empty( get_post_meta( get_the_ID(), 'product_size_guide', true ) ) ) : ?>
				<a data-toggle="modal" data-target="#size_guide" href="javascript:void(0)"><?php echo esc_html( get_post_meta( get_the_ID(), 'product_size_guide', true ) ); ?></a>
				<div class="modal fade" id="size_guide" tabindex="-1">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'product_size_guide', true ) ); ?>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<img src="<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'product_amazon_size_guide', true ) ); ?>" alt="<?php esc_attr_e('size', 'actavista'); ?>">
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( get_post_meta( get_the_ID(), 'product_develivery_label', true ) ) ) : ?>
				<a data-toggle="modal" data-target="#delivery_info" href="javascript:void(0)"><?php echo esc_html( get_post_meta( get_the_ID(), 'product_develivery_label', true ) ); ?></a>
				<div class="modal fade" id="delivery_info" tabindex="-1">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'product_develivery_label', true ) ); ?>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body"><?php echo wp_kses_post( get_post_meta( get_the_ID(), 'product_develivery_info', true ) ); ?></div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	<button type="submit" class="shopnow"><?php echo esc_html( $button_text ); ?></button>
	<?php wc_query_string_form_fields( $product_url ); ?>

	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
</form>
<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
