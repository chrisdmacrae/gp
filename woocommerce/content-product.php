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
 * @version 3.6.0
 */
defined( 'ABSPATH' ) || exit;
global $product;
// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$opt = actavista_WSH()->option();
$colum_list  = actavista_vc_column_out( $opt->get('shop_product_column2', 'col-lg-4' ), $opt->get('shop_product_column', 'col-md-4' ), $opt->get('shop_product_column3', 'col-sm-6' ), $opt->get('shop_product_column4', 'col-xs-12' ) );
$_agrs       = array(
	'function'   =>  $opt->get('shop_product_style', 'classic' ),
	'size_class' => $colum_list,
);
$column_list = implode( ' ', $colum_list );
$args        = array(
	'type'        =>  $opt->get( 'shop_product_style', 'classic' ),
	'column'      => $column_list,
	'carousel'    => 'false',
	'sale_flash'  => 'false',
	'rating_set'  => $opt->get('related_show_rating'),
	'discount'    => ( $opt->get('shop_show_discount') )  ? 'true' : 'false',
	'price_class' => 'prices style2',
	'variation'   => $opt->get('shop_show_variation' ),
	'quick_view'  => ( $opt->get('shop_show_quick'  ))  ? 'true' : 'false',
	'cart_button' => ( $opt->get('shop_show_cart'  )) ? 'true' : 'false',
	'image'       => $_agrs,
);

new \ACTAVISTA\Includes\Classes\Actavista_Products( $args );
