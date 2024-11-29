<?php
/**
 * The Template for displaying product archives, including the main shop page
 * which is a post type archive
 *
 * This template can be overridden by copying it to
 * yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit;
get_header();
global $wp_query;
if ( isset( $_GET[ 'view' ] ) && $_GET[ 'view' ] == 'list' ) {
	$product_view = 'list';
} else {
	$product_view = 'grid';
}
$opt = actavista_WSH()->option();
$data = \ACTAVISTA\Includes\Classes\Common::instance()->data( 'product' )->get();
$cols = ( $data->get( 'layout' ) != 'full' && $data->get( 'sidebar' )) ? 'col-lg-8' : 'col-lg-12';
do_action( 'actavista_banner', $data );

?>
	<section>
		<div class="gap">
			<div class="container">
				<div class="row">
					<?php do_action( 'actavista_sidebar', 'left', $data ); ?>
					<div class="<?php echo esc_attr( $cols ); ?>">
						<?php

						if ( woocommerce_product_loop() && have_posts() ) {
							/**
							 * Hook: woocommerce_before_shop_loop.
							 *
							 * @hooked wc_print_notices - 10
							 * @hooked woocommerce_result_count - 20
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							do_action( 'woocommerce_before_shop_loop' );
							echo '<div class="remove-ext50"><div class="row">';
							if ( $product_view == 'list' ):
								while ( have_posts() ) : the_post();
									wc_get_template_part( 'content', 'product-list' );
								endwhile;
								wp_reset_postdata();
							else:
								while ( have_posts() ) : the_post();
									wc_get_template_part( 'content', 'product' );
								endwhile;
							endif;
							echo '</div></div>';
							actavista_the_pagination(array( 'total' => $wp_query->max_num_pages ));
							wp_reset_postdata();
						} else {
							/**
							 * Hook: woocommerce_no_products_found.
							 *
							 * @hooked wc_no_products_found - 10
							 */
							do_action( 'woocommerce_no_products_found' );
						}
						?>
					</div>
					
					<?php do_action( 'actavista_sidebar', 'right', $data ); ?>
				</div>
			</div>
		</div>
	</section>
<?php
if ( $opt ->get( 'shop_show_filter_sidebar' ) ) : ?>
	<!-- Shop Filter -->
	<div class="adv-search right">
		<div class="sidebar">
			<span class="clos-adv"><i class="fa fa-times"></i></span>
			<?php
			if ( is_active_sidebar( 'filter-sidebar' ) ) {
				dynamic_sidebar( 'filter-sidebar' );
			}
			?>
		</div>
	</div>
<?php endif; 
wp_enqueue_script( array( 'scrollbar' ) );
$script = 'jQuery(document).ready(function () {
                jQuery(".filter").on("click", function(){
                    jQuery(".adv-search, .theme-layout").addClass("filter-on");
                    return false;
                });
                jQuery("html,body").on("click", function(){
                    jQuery(".adv-search, .theme-layout").removeClass("filter-on");	
                });
                jQuery(".res-menu-dropdown, .adv-search, .responsive-menu").perfectScrollbar();
            });';
wp_add_inline_script( 'scrollbar', $script );
get_footer( 'shop' );
