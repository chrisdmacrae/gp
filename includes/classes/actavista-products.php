<?php
namespace ACTAVISTA\Includes\Classes;

use ACTAVISTA\Includes\Classes\Actavista_Image_Size;

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

class Actavista_Products {
	public $atts = array();

	function __construct( $atts ) {

		$this->atts = array_filter( $atts );
		call_user_func( array( $this, $this->atts['type'] ) );
	}

	function classic() {

		global $product;

		$terms     = wp_get_post_terms( get_the_ID(), 'product_cat' );
		$term_list = '';
		if ( ! empty( $terms ) && count( $terms ) > 0 ) {
			foreach ( $terms as $t ) {
				$term_list .= ' opt-' . actavista_set( $t, 'term_id' );
			}
		}
		?>
		<div class="brdr-btm <?php echo actavista_set( $this->atts, "column" ) . esc_attr( $term_list ); ?>">
			<div <?php wc_product_class( 'k-product2' ); ?>>
				<div class="kavatar">
					<?php new Actavista_Image_Size( actavista_set( $this->atts, 'image' ) ); ?>
					<div class="tagz">
						<?php 
						if ( "true" == actavista_set( $this->atts, 'sale_flash' ) ) {
							woocommerce_show_product_loop_sale_flash();
						}
						?>
						<?php if ( get_post_meta( get_the_ID(), 'show_new', true ) ) : ?>
							<span class="tag" style="background-color:<?php echo get_post_meta( get_the_ID(), 'label_bg', true ) ?>; color:<?php echo get_post_meta( get_the_ID(), 'label_text', true ) ?>;"><?php esc_html_e( "New", "konia" ); ?></span>
						<?php endif; ?>
						<?php if ( "true" == actavista_set( $this->atts, 'discount' ) && actavista_get_percentage_discount( get_the_ID() ) != '' ) : ?>
							<span class="tag">-<?php echo actavista_get_percentage_discount( get_the_ID() ); ?>%</span>
						<?php endif; ?>
					</div>
					<?php if ( "true" == actavista_set( $this->atts, 'cart_button' ) || "true" == actavista_set( $this->atts, 'quick_view' ) ) : ?>
						<ul class="adcart">
							<?php if ( "true" == actavista_set( $this->atts, 'cart_button' ) ) : ?>
								<li>
									<?php actavista_add_to_cart_button( '', '', 'fa-shopping-bag' ); ?>
								</li>
							<?php endif; ?>
							<?php if ( "true" == actavista_set( $this->atts, 'quick_view' ) ) : ?>
								<li>
									<a data-toggle="modal" data-target="#quickview" class="quickpopup" data-id="<?php echo get_the_ID(); ?>" href="javascript:void(0)"><i class="fa fa-search"></i></a>
								</li>
							<?php endif; ?>
						</ul>
					<?php endif; ?>
				</div>
				<div class="grid-product-meta">
					<?php if ( ! empty ( actavista_set( $this->atts, 'title_limit' ) ) ): ?>
						<h4>
							<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), actavista_set( $this->atts, 'title_limit' ), '' ); ?></a>
						</h4>
					<?php else : ?>
						<h4>
							<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h4>
					<?php endif; ?>
					<span class="<?php echo esc_attr( actavista_set( $this->atts, 'price_class' ) ); ?>">
                        <?php echo wp_kses( $product->get_price_html(), true ); ?>
                    </span>
					<?php
					if ( actavista_set( $this->atts, 'variation' ) && $product->has_attributes() && $product->is_type( 'variable' ) ) :
						$vari = actavista_variations( $product->get_id(), $product->get_variation_attributes() );
						actavista_variation_html( $vari, false );
					endif;
					?>
				</div>
			</div>
		</div>
		<?php
	}

	function list_style() {

		global $product;
		?>
		<div class="col-md-6 col-lg-6">
			<div <?php wc_product_class( 'k-product2 list-style' ); ?>>
				<div class="row">
					<div class="col-md-6 col-lg-6 col-sm-6">
						<div class="kavatar">
							<?php new Actavista_Image_Size( actavista_set( $this->atts, 'image' ) ); ?>
							<div class="tagz">
								<?php
								if ( "true" == actavista_set( $this->atts, 'sale_flash' ) ) {
									woocommerce_show_product_loop_sale_flash();
								}
								?>
								<?php  if ( get_post_meta( get_the_ID(), 'show_new', true ) ) : ?>
									<span class="tag" style="background-color:<?php echo get_post_meta( get_the_ID(), 'label_bg', true ) ?>; color:<?php echo get_post_meta( get_the_ID(), 'label_text', true ) ?>;"><?php esc_html_e( "new", "konia" ); ?></span>
								<?php endif; ?>

								<?php if ( actavista_get_percentage_discount( get_the_ID() ) != '' ) : ?>
									<span class="tag">-<?php echo actavista_get_percentage_discount( get_the_ID() ); ?>%</span>
								<?php endif; ?>
							</div>
							<?php if ( "true" == actavista_set( $this->atts, 'quick_view' ) ) : ?>
								<ul class="adcart">
									<?php if ( "true" == actavista_set( $this->atts, 'quick_view' ) ) : ?>
										<li>
											<a class="quickpopup" data-id="<?php echo get_the_ID(); ?>" href="#"><i class="fa fa-search"></i></a>
										</li>
									<?php endif; ?>
								</ul>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-md-6 col-lg-6 col-sm-6">
						<div class="grid-product-meta">
							<h4>
								<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h4>
							<span class="<?php echo esc_attr( actavista_set( $this->atts, 'price_class' ) ); ?>">
                    			<?php echo wp_kses( $product->get_price_html(), true ); ?>
                    		</span>
							<p><?php echo wp_trim_words( get_the_excerpt(), 25, '' ); ?></p>
							<?php
							actavista_add_to_cart_button( 'Add to cart', 'shopnow' );
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	function overlay() {

		global $product;
		$end_date = get_post_meta( get_the_ID(), '_sale_price_dates_to', true );
		if ( $end_date != '' ) {
			$counter_date = date( 'm/d/Y H:i:s', $end_date );
		}
		$terms     = wp_get_post_terms( get_the_ID(), 'product_cat' );
		$term_list = '';
		if ( ! empty( $terms ) && count( $terms ) > 0 ) {
			foreach ( $terms as $t ) {
				$term_list .= ' opt-' . actavista_set( $t, 'term_id' );
			}
		}
		?>
		<div class="<?php echo actavista_set( $this->atts, "column" ) . " opt-" . esc_attr( $term_list ); ?>">
			<div <?php wc_product_class( 'k-product' ); ?>>
				<?php new \ACTAVISTA\Includes\Classes\Actavista_Image_Size( actavista_set( $this->atts, 'image' ) ); ?>
				<div class="product-meta">
					<div class="tags-variation">
						<?php
						if ( "true" == actavista_set( $this->atts, 'sale_flash' ) ) {
							woocommerce_show_product_loop_sale_flash();
						}
						?>
					</div>
					<div class="prodct-title">
						<h4><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php the_title(); ?></a></h4>
						<span class="prices style1">
                        	<?php echo wp_kses( $product->get_price_html(), true ); ?>
                    	</span>
					</div>
					<div class="tags-variation">
						<?php
						if ( actavista_set( $this->atts, 'variation' ) && $product->has_attributes() && $product->is_type( 'variable' ) ) :
							$vari = actavista_variations( $product->get_id(), $product->get_variation_attributes() );
							actavista_variation_html( $vari, false );
						endif;
						?>
					</div>
				</div>
				<?php if ( $end_date != '' && "true" == actavista_set( $this->atts, 'deal' ) ) : ?>
					<ul class="countdown" id="counter-<?php the_ID(); ?>">
						<li><span class="days">00</span>
							<p class="days_ref"><?php esc_html_e( "days", "konia" ); ?></p>
						</li>
						<li><span class="hours">00</span>
							<p class="hours_ref"><?php esc_html_e( "Hrs", "konia" ); ?></p>
						</li>
						<li><span class="minutes">00</span>
							<p class="minutes_ref"><?php esc_html_e( "Min", "konia" ); ?></p>
						</li>
						<li><span class="seconds">00</span>
							<p class="seconds_ref"><?php esc_html_e( "Sec", "konia" ); ?></p>
						</li>
					</ul>
					<?php
					if ( ! empty( $counter_date ) ) :
						wp_enqueue_script( 'downCount' );
						$script = 'jQuery("#counter-' . get_the_ID() . '").downCount({
                                date: "' . esc_js( $counter_date ) . '",
                                offset: +10
                            });
                        ';
						wp_add_inline_script( 'downCount', $script );
					endif;
				endif;
				?>
				<?php if ( "true" == actavista_set( $this->atts, 'quick_view' ) || "true" == actavista_set( $this->atts, 'cart_button' ) ) : ?>
					<div class="over-meta">
						<?php if ( "true" == actavista_set( $this->atts, 'quick_view' ) ) : ?>
							<a class="quikc-view quickpopup" data-id="<?php echo get_the_ID(); ?>" href="#"><?php esc_html_e( "Quick detail", "konia" ); ?></a>
						<?php endif; ?>
						<?php
						if ( "true" == actavista_set( $this->atts, 'cart_button' ) ) {
							actavista_add_to_cart_button( 'Add To Cart', 'ad-to-cart' );
						}
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<?php
	}

	function creative() {

		global $product;
		?>
		<div class="<?php echo esc_attr( actavista_set( $this->atts, "column" ) ); ?>">
			<div <?php wc_product_class( 'k-product' ); ?>>
				<?php new Actavista_Image_Size( actavista_set( $this->atts, 'image' ) ); ?>
				<div class="product-meta">
					<div class="prodct-title">
						<h4><?php the_title(); ?></h4>
						<span class="prices style1">
                        <?php echo wp_kses( $product->get_price_html(), true ); ?>
                    </span>
					</div>
				</div>
				<div class="over-meta">
					<?php
					if ( "true" == actavista_set( $this->atts, 'cart_button' ) ) {
						actavista_add_to_cart_button( '', 'adtocart', 'fa fa-shopping-cart' );
					}
					?>

					<?php if ( "true" == actavista_set( $this->atts, 'quick_view' ) ) : ?>
						<a class="main-btn q-view quickpopup" data-id="<?php echo get_the_ID(); ?>" href="#">
							<i class="fa fa-search"></i>
							<?php esc_html_e( "Quick view", "konia" ); ?>
						</a>
					<?php endif; ?>
					<?php if ( get_post_meta( get_the_ID(), 'product_slogan', true ) != '' ) : ?>
						<span><?php echo get_post_meta( get_the_ID(), 'product_slogan', true ); ?></span>
					<?php endif; ?>
					<span class="prices style1">
                    <?php echo wp_kses( $product->get_price_html(), true ); ?>
                </span>
				</div>
			</div>
		</div>
		<?php
	}

	function classic_two() {
		global $product;
		?>
		<div class="<?php echo actavista_set( $this->atts, "column" ) ?>">
			<div <?php wc_product_class( 'prd-box' ); ?>>
				<div class="prd-thumb">
					<?php new Actavista_Image_Size( actavista_set( $this->atts, 'image' ) ); ?>
					<div class="prd-btns">
						<?php if ( "true" == actavista_set( $this->atts, 'quick_view' ) ) : ?>
							<a data-toggle="modal" data-target="#quickview" class="quickpopup" data-id="<?php echo get_the_ID(); ?>" href="javascript:void(0)"><i class="fa fa-search"></i></a>
						<?php endif; ?>
						<?php if ( "true" == actavista_set( $this->atts, 'wishlist' ) ) : ?>
							<?php echo actavista_wishlist_button( false, 'flaticon-heart' ); ?>
						<?php endif; ?>
						<?php if ( "true" == actavista_set( $this->atts, 'cart_button' ) ) : ?>
							<?php actavista_add_to_cart_button( '', '', 'fa-shopping-bag' ); ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="prd-inf">
					<?php if ( ! empty ( actavista_set( $this->atts, 'title_limit' ) ) ): ?>
						<h4>
							<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), actavista_set( $this->atts, 'title_limit' ), '' ); ?></a>
						</h4>
					<?php else : ?>
						<h4>
							<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h4>
					<?php endif; ?>
					<span class="<?php echo esc_attr( actavista_set( $this->atts, 'price_class' ) ); ?>">
                        <?php echo wp_kses( $product->get_price_html(), true ); ?>
                    </span>
				</div>
			</div>
		</div>
		<?php
	}
}