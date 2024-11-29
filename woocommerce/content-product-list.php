<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to
 * yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */
defined( 'ABSPATH' ) || exit;
global $product;
// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$opt = actavista_WSH()->option();
$_agrs = array(
	'function'   => 'list_style',
	'size_class' => explode( ',', $opt->get('shop_product_column' ) ),
);
$args  = array(
	'type'        => 'list_style',
	'column'      => $opt->get('shop_product_column' ),
	'carousel'    => 'false',
	'sale_flash'  => 'false',
	'rating_set'  => $opt->get('related_show_rating' ),
	'discount'    => ( $opt->get('shop_show_discount' ) ) ? 'true' : 'false',
	'price_class' => 'prices style2',
	'variation'   => $opt->get('shop_show_variation' ),
	'quick_view'  => ( $opt->get('shop_show_quick' ) ) ? 'true' : 'false',
	'image'       => $_agrs,
);

new \ACTAVISTA\Includes\Classes\Actavista_Products( $args );
