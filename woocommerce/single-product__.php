<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to
 * yourtheme/woocommerce/single-product.php.
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
 * @version       1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header();

$data = \ACTAVISTA\Includes\Classes\Common::instance()->data( 'page' )->get();
do_action( 'actavista_banner', $data );
?>
	<section>
		<div class="gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<?php
						while ( have_posts() ) :
							the_post();
							$post_style = get_post_meta( get_the_ID(), 'product_style', true );
							if ( $post_style != 'none' && $post_style != '' && $post_style != 'woocommerce' ) {
								new konia_woo_detail( get_post_meta( get_the_ID(), 'product_style', true ) );
							} else if ( konia_get_opt( 'product_single_layout' ) != '' && konia_get_opt( 'product_single_layout' ) != 'woocommerce' ) {
								new konia_woo_detail( konia_get_opt( 'product_single_layout' ) );
							} else {
								wc_get_template_part( 'content', 'single-product' );
							}
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php get_footer(  );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
