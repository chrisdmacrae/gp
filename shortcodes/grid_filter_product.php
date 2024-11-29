<?php
wp_enqueue_script( array( 'isotopee', 'isotope-init' ) );
wp_enqueue_style('product-loaders',get_template_directory_uri() .'/assets/css/loaders.min.css');
$atts = vc_map_get_attributes( $tag, $atts );
extract( $atts );
$count       = 0;
$cats        = str_replace( ' ', '', $category_lists );
$cats        = explode( ',', $cats );
$column_list = actavista_vc_column_out( $vc_col_lg_size, $vc_col_md_size, $vc_col_sm_size, $vc_col_xs_size );
$_agrs       = array(
	'function'    => 'grid_filter_product',
	'size_class'  => actavista_vc_column_out( $vc_col_lg_size, $vc_col_md_size, $vc_col_sm_size, $vc_col_xs_size ),
	'custom_size' => actavista_vc_custom_image( $lg, $tb, $mb ),
);
?>
<div class="product-masnory">
	<?php if ( ! empty( $cats ) && count( $cats ) > 0 ) : ?>
		<div id="options">
			<div class="option-isotop">
				<nav>
					<ul class="nav nav-tabs nav-fill option-set icon-style" id="nav-tab">
						<li class="nav-item">
							<a class="nav-link active" id="nav-all-tab" data-toggle="tab"  href="#all"><?php esc_html_e( "All", "konia" ); ?></a>
						</li>
						<?php
						foreach ( $cats as $cat ) :
							$term = get_term_by( 'slug', $cat, 'product_cat' );
							$icon = actavista_set( wp_get_attachment_image_src( get_term_meta( actavista_set( $term, 'term_id' ), 'upload_meta_nonce', true ), "full" ), "0" );
							?>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" title="<?php echo actavista_set( $term, 'name' ); ?>" id="nav-<?php echo esc_attr( $cat ); ?>-tab" href="#<?php echo esc_attr( $cat ); ?>">
									<img src="<?php echo esc_url( $icon ); ?>" alt="<?php esc_attr_e('image not found', 'actavista'); ?>">
								</a></li>
						<?php endforeach; ?>
					</ul>
				</nav>
			</div>
		</div><!-- FILTER BUTTONS -->
	<?php endif; ?>
	<div class="tab-content" id="nav-tabContent">
		<div class="tab-pane fade show active" id="all">
			<div class="loader"></div>
			<div class="remove-ext50">
				<?php
				$args   = array(
					'post_type'      => 'product',
					'post_status'    => 'publish',
					'posts_per_page' => $product_number,
					'orderby'        => $order,
				);
				$query  = new WP_Query( $args );
				$data_q = actavista_ajax_array_security_encode( $args );
				$args   = array(
					'type'        => 'classic',
					'column'      => implode( ' ', actavista_vc_column_out( $vc_col_lg_size, $vc_col_md_size, $vc_col_sm_size, $vc_col_xs_size ) ),
					'carousel'    => 'false',
					'sale_flash'  => 'false',
					'discount'    => $show_discount ? 'true' : 'false',
					'price_class' => 'prices style2',
					'variation'   => $show_variation,
					'quick_view'  => $show_quick ? 'true' : 'false',
					'cart_button' => $show_cart ? 'true' : 'false',
					'title_limit' => $title_limit,
					'image'       => $_agrs,
				);
				while ( $query->have_posts() ) : $query->the_post();
					new \ACTAVISTA\Includes\Classes\Actavista_Products( $args );
				endwhile;
				wp_reset_postdata();
				$data_args = actavista_ajax_array_security_encode( $args );
				$script    = 'jQuery(document).ready(function($){
								$(".product-masnory nav #nav-tab a").on("click", function(){
									var load_cat = $(this).attr("href");
									$.ajax({
										type: "POST",
										url: actavista_data.ajaxurl,
										data: {
											data_args:"' . $data_args . '",
											action: "actavista_ajax",
											subaction: "products_tab_loaded",
											data_q: "' . $data_q . '",
											data_c: load_cat
										},
										beforeSend: function(){
											jQuery("body").find(".tab-pane").children(".loader").html("<span>LOADING</span><ul class=\'clouds\'><li class=\'cloud\'></li><li class=\'cloud\'></li><li class=\'cloud\'></li><li class=\'cloud\'></li><li class=\'cloud\'></li><li class=\'cloud\'></li><li class=\'cloud\'></li></ul>");
										},
										success: function(res){
											jQuery("body").find(".tab-pane").children(".loader").html(\'\');
											$(".product-masnory .tab-pane#all .remove-ext50").html(res.data);
											console.log(res.tab_id);
										}
									});
								});
							});';
				wp_add_inline_script( 'script', $script );
				?>
			</div>
		</div>
	</div>
</div>