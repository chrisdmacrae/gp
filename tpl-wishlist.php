<?php
/* Template Name: Wishlist */
get_header();
global $post;
$data = \ACTAVISTA\Includes\Classes\Common::instance()->data( 'page' )->get();
$current_user = wp_get_current_user();
$konia_meta   = get_user_meta( $current_user->ID, 'konia_add_to_wishlist', true );
$konia_meta   = array_filter( (array) $konia_meta );
do_action( 'actavista_banner', $data );
?>
	<section>
		<div class="gap">
			<div class="container">
				<div class="row">
					<?php
					while ( have_posts() ):
						the_post();
						the_content();
					endwhile;
					wp_reset_postdata(); ?>
					<?php if ( is_user_logged_in() ): ?>
						<div class="block-center" id="block-history">
							<table class="std data-table table wishlist-table">
								<thead>
								<tr>
									<th class="product-remove">
										<i class="fa fa-trash"></i></th>
									<th class="product-thumbnail"><?php esc_html_e( 'View', 'actavista' ); ?></th>
									<th class="product-name"><?php esc_html_e( 'Product', 'actavista' ); ?></th>
									<th class="product-name"><?php esc_html_e( 'Stock Status', 'actavista' ); ?></th>
									<th class="product-link"><?php esc_html_e( 'Direct Link', 'actavista' ); ?></th>
								</tr>
								</thead>
								<tbody>
								<?php if ( ! empty( $konia_meta ) ): ?>
									<?php foreach ( (array) $konia_meta as $met ): ?>
										<?php if ( ! empty( wc_get_product( $met ) ) ) { ?>
											<tr class="wishlist_3">
												<td class="wishlist_delete">
													<a class="" rel="product_del_wishlist" data-id="<?php echo esc_attr( $met ); ?>" href="javascript:void(0);"><i class="fa fa-close"></i></a>
												</td>
												<td><?php echo get_the_post_thumbnail( $met, 'thumbnail' ); ?></td>
												<td>
													<?php echo strip_tags( get_the_title( $met ) ); ?>
												</td>
												<td>
													<?php echo wc_get_product( $met )->get_stock_quantity(); ?>
												</td>
												<td>
													<a class="button" href="<?php echo esc_url( get_permalink( $met ) ); ?>"><?php esc_html_e( 'Add To Cart', 'actavista' ); ?></a>
												</td>
											</tr>
										<?php } ?>
									<?php endforeach; ?>
								<?php else: ?>
									<tr class="wishlist_3">
										<td colspan="5">
											<h2 class="wishlist-no-data">
												<?php esc_html_e( 'No data found', 'actavista' ); ?>
											</h2>
										</td>
									</tr>
								<?php endif; ?>
								</tbody>
							</table>
						</div>
					<?php else: ?>
						<h2 class="wishlist-login-link">
							<?php esc_html_e( 'To view this page login or register at', 'actavista' ); ?>
							<a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>" title="<?php esc_attr_e('Account Page', 'actavista'); ?>"><?php esc_html_e( ' Account Page', 'actavista' ); ?></a>
						</h2>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
<?php get_footer(); ?>