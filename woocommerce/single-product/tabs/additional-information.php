<?php
/**
 * Additional Information tab
 *
 * This template can be overridden by copying it to
 * yourtheme/woocommerce/single-product/tabs/additional-information.php.
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
	exit; // Exit if accessed directly
}
global $product;
$heading = get_post_meta( $product->get_id(), 'product_additional_tab_title', true );
$desc    = get_post_meta( $product->get_id(), 'product_additional_tab_desc', true );
?>

<?php if ( $heading ) : ?>
	<h2 class="main-title"><?php echo wp_kses_post( $heading ); ?></h2>
<?php endif; ?>
<?php if ( $desc ) : ?>
	<p class="adition-info">
		<?php echo esc_html( $desc ); ?>
	</p>
<?php endif; ?>

<?php do_action( 'woocommerce_product_additional_information', $product ); ?>
