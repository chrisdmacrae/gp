<?php
$atts = vc_map_get_attributes( $tag, $atts );
extract( $atts );
$cats   = str_replace( ' ', '', $category_lists );
$cats   = explode( ',', $cats );
$object = new \ACTAVISTA\Includes\Classes\Imagify();
$min    = 0;
$max    = 12;
$_args  = array( 'function' => 'masonary_filter_product' );
if ( ! empty( $cats ) && count( $cats ) > 0 ) :
	?>
	<div class="full-prodct" id="overlay">
		<?php if ( ! empty( $cats ) && count( $cats ) > 0 ) : ?>
			<div id="options">
				<div class="option-isotop">
					<nav>
						<ul class="nav nav-tabs nav-fill" id="nav-tab">
							<li class="nav-item">
								<a class="nav-link active" title="<?php esc_attr_e( 'all', 'actavista' ); ?>" href="#all" data-toggle="tab"><?php esc_html_e( "All", "konia" ); ?></a>
							</li>
							<?php
							foreach ( $cats as $cat ) :
								$term = get_term_by( 'slug', $cat, 'product_cat' );
								?>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" title="<?php echo actavista_set( $term, 'name' ); ?>" href="#<?php echo esc_attr( $cat ); ?>"><?php echo esc_html( ucfirst( $cat ) ); ?></a>
								</li>
							<?php endforeach; ?>
						</ul>
					</nav>
				</div>
			</div>
		<?php endif; ?>
		<div class="tab-content" id="nav-tabContent">
			<div class="tab-pane fade show active" id="all">
				<div class='loader'></div>
				<div class="fullwidth masonry">
					<?php
					$args      = array(
						'post_type'      => 'product',
						'post_status'    => 'publish',
						'posts_per_page' => $product_number,
					);
					$query     = new WP_Query( $args );
					$post_args = array(
						'type'        => 'overlay',
						'column'      => implode( ' ', actavista_vc_column_out( $vc_col_lg_size, $vc_col_md_size, $vc_col_sm_size, $vc_col_xs_size ) ),
						'carousel'    => 'false',
						'sale_flash'  => 'true',
						'discount'    => 'false',
						'price_class' => 'prices style1',
						'deal'        => 'true',
						'variation'   => 'true',
						'quick_view'  => $show_quick,
						'cart_button' => $show_cart,
					);
					while ( $query->have_posts() ) :
						$query->the_post();
						global $product;
						$_args[ 'size_counter' ] = $min;
						$post_args[ 'image' ]    = $_args;
						new \ACTAVISTA\Includes\Classes\Actavista_Products( $post_args );
						if ( $min >= $max - 1 ) {
							$min = - 1;
						}
						$min ++;
					endwhile;
					wp_reset_postdata();
					$data_args = actavista_ajax_array_security_encode( $post_args );
					$data_q    = actavista_ajax_array_security_encode( $args );
					?>
				</div>
				<div class="load-more2 load-mor">
					<a data-max="<?php echo esc_attr( $min ); ?>" data-offset="<?php echo esc_attr( $product_number ); ?>" data-args="<?php echo esc_attr( $data_args ); ?>" data-q="<?php echo esc_attr( $data_q ); ?>" title="<?php echo esc_attr( $loadmore_text ); ?>" href="javascript:void(0)"><i></i> <?php echo esc_html( $loadmore_text ); ?>
					</a>
				</div>
			</div>
			<?php
			if ( ! empty( $cats ) && count( $cats ) > 0 ) :
				foreach ( $cats as $cat ) :
					?>
					<div class="tab-pane fade" id="<?php echo esc_attr( $cat ); ?>">
						<div class='loader'></div>
						<div class="fullwidth masonry">
						</div>
						<div class="load-more2 load-mor">
							<a data-max="0" href="javascript:void(0)" title="<?php esc_attr_e( 'load more', 'actavista' ); ?>"><?php echo esc_html( $loadmore_text ); ?></a>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
<?php
endif;
wp_enqueue_script( array( 'isotopee', 'isotope-init' ) );