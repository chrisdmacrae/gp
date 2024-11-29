<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */
if (!defined('ABSPATH')) {
    exit;
}
global $wp;
$grid_view = add_query_arg(array('view' => 'grid'), home_url( $wp->request ) );
$list_view = add_query_arg(array('view' => 'list'), home_url( $wp->request ) );
$opt = actavista_WSH()->option();
?>
<div class="row">
    <div class="col-md-12">
        <ul class="pd-fitler-sec">
            <li><?php echo actavista_set(wp_count_posts('product'), 'publish'); ?> <?php echo esc_html__("products", "konia"); ?></li>
            <li class="style-option">
                <a href="<?php echo esc_url($grid_view); ?>"><i class="fa fa-th-large"></i></a>
                <a href="<?php echo esc_url($list_view); ?>"><i class="fa fa-navicon"></i></a>
            </li>
            <?php if($opt->get('shop_show_filter_sidebar')) : ?>
            <li class="filter">
                <a href="#"><i class="fa fa-gears"></i><?php esc_html_e("Filter", "konia"); ?></a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</div>