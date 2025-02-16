<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to
 * yourtheme/woocommerce/single-product/meta.php.
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
 * @version       3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
	<div class="product_meta">

		<?php do_action( 'woocommerce_product_meta_start' ); ?>

		<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
			<div class="prod categories">
				<strong class="cat-heading"><?php esc_html_e( 'SKU:', 'actavista' ); ?>
					<span>
                    <?php
					if ( $sku = $product->get_sku() ) {
						echo esc_html( $sku );
					} else {
						esc_html_e( 'N/A', 'actavista' );
					}
					?>
				</span> </strong>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( wc_get_product_category_list( $product->get_id() ) ) ) : ?>
			<div class="prod categories">
				<?php echo wc_get_product_category_list( $product->get_id(), ',', '<span class="cat-heading">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'actavista' ) . ' ', '</span>' ); ?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( wc_get_product_tag_list( $product->get_id() ) ) ) : ?>
			<div class="prod tags">
				<?php echo wc_get_product_tag_list( $product->get_id(), ',', '<span class="cat-heading">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'actavista' ) . ' ', '</span>' ); ?>
			</div>
		<?php endif; ?>

	</div>
<?php
do_action( 'woocommerce_product_meta_end' );