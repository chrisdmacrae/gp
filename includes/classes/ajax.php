<?php
namespace ACTAVISTA\Includes\Classes;

use ACTAVISTA\Includes\Classes\Actavista_Products;
use ACTAVISTA\Includes\Classes\Imagify;

class Ajax {

	function actions() {
		
		add_action( 'wp_ajax_actavista_ajax', array( $this, 'ajax_handler' ) );
		add_action( 'wp_ajax_nopriv_actavista_ajax', array( $this, 'ajax_handler' ) );
	}

	function ajax_handler() {

		$method = actavista_set( $_REQUEST, 'subaction' );
		if ( method_exists( $this, $method ) ) {
			$this->$method();
		}
		exit;

	}

	/**
	 * [actavista_login_form description]
	 *
	 */
	function actavista_login_form() {
		check_ajax_referer( 'ajax-login-nonce', ACTAVISTA_KEY );

		$info = array();

		$info['user_login'] = actavista_set( $_POST, 'log' );

		$info['user_password'] = actavista_set( $_POST, 'pwd' );
		$info['remember'] = actavista_set( $_POST, 'rememberme' );

		
		$user_signon = wp_signon($info, false);
		if ( is_wp_error( $user_signon ) ) {
			echo json_encode( array( 'loggedin' => false, 'message' => '<div class="alert alert-danger">' . esc_html__('Wrong username or password.', 'actavista') . '</div>'));
		} else {
			echo json_encode( array( 'loggedin' => true, 'message' => '<div class="alert alert-success">' . esc_html__('Login successful, redirecting...', 'actavista') . '</div>'));
		}
		exit;

	}

	/**
	 * New user registration through ajax.
	 *
	 * @return [type] [description]
	 */
	function actavista_register_form() {

		check_ajax_referer( 'ajax-login-nonce', ACTAVISTA_KEY );

		if ( function_exists( 'actavista_form_register' ) )

			echo actavista_form_register( $_POST );

		
	}
	/**
	 * User likes
	 * @return [type] [description]
	 */
	function actavista_like_it() {

		$post_id = actavista_set( $_POST, 'id' );
		$type = actavista_set( $_POST, 'type' );
		$nonce = actavista_set( $_POST, 'nonce' );

		$current_user = wp_get_current_user();

		if ( ! wp_verify_nonce( $nonce, ACTAVISTA_NONCE ) ) {
			wp_send_json( array( 'type' => 'error', 'message' => esc_html__( 'Security verification failed, try again after reloading the page', 'actavista' ), 'title' => esc_html__( 'Error', 'actavista' ) ) );
		}
		if ( ! $post_id ) {
			wp_send_json( array( 'type' => 'error', 'message' => esc_html__( 'Something wrong you can not like this', 'actavista' ), 'title' => esc_html__( 'Error', 'actavista' ) ) );
		}

		if ( ! $current_user ) {
			wp_send_json( array( 'type' => 'error', 'message' => esc_html__( 'Something wrong you can not like this', 'actavista' ), 'title' => esc_html__( 'Login', 'actavista' ) ) );
		}

		$meta       = (array) get_user_meta( $current_user->ID, 'wishlist', true );
		$post_meta  = (int) get_post_meta( $post_id, 'post_favorite_count', true );

		if ( 'unlike' === $type ) {
			foreach ( array_keys( $meta, $post_id ) as $value ) {
				unset( $meta[$value] );
			}
			$newmeta = $meta;
			if ( $post_meta > 0 ) {
				$post_meta--;
			}
		} else {
			array_push( $meta, $post_id );
			$newmeta = $meta;
			$post_meta++;
		}

		$newmeta = array_filter( $newmeta );
		$newmeta = array_unique( $newmeta );
		update_user_meta( $current_user->ID, 'wishlist', $newmeta );

		update_post_meta( $post_id, 'post_favorite_count', $post_meta );

		$message = ( $type == 'unlike' ) ? esc_html__( 'unlike', 'actavista' ) : esc_html__( 'like', 'actavista' );

		wp_send_json( array( 'type' => 'success', 'message' => sprintf( esc_html__( 'Successfully %s this post', 'actavista' ), $message ), 'title' => esc_html__( 'Success', 'actavista' ), 'count' => $post_meta ) );
	}

	
	public function products_tab_loaded() {
		if ( isset( $_POST[ 'subaction' ] ) && $_POST[ 'subaction' ] != 'products_tab_loaded' ) {
			return esc_html__( 'No Data Access', 'actavista' );
		}
		$data_args = actavista_ajax_array_security_decode( $_POST[ 'data_args' ] );
		$data_q    = actavista_ajax_array_security_decode( $_POST[ 'data_q' ] );
		$data_c    = str_replace( '#', '', $_POST[ 'data_c' ] );
		if ( isset( $data_c ) && $data_c != 'all' ) {
			$data_q[ 'tax_query' ] = array(
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'slug',
					'terms'    => $data_c,
				),
			);
		}
		$query = new \WP_Query( $data_q );
		ob_start();
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) :
				$query->the_post();
				new Actavista_Products( $data_args );
			endwhile;
			wp_reset_postdata();
		}
		$data_show = ob_get_clean();
		wp_send_json( array( 'data' => $data_show, 'tab_id' => $data_c ) );
	}

	public function loadmore_overlay_product() {
		if ( isset( $_POST[ 'subaction' ] ) && $_POST[ 'subaction' ] !== 'loadmore_overlay_product' ) {
			return esc_html__( 'No Data Access', 'actavista' );
		}
		$data_args = actavista_ajax_array_security_decode( $_POST[ 'data_args' ] );
		$data_q    = actavista_ajax_array_security_decode( $_POST[ 'data_q' ] );
		$data_off  = actavista_set( $_POST, 'offset' );
		$r_off     = $data_q[ 'posts_per_page' ] + $data_off;
		if ( ! empty( $data_off ) ) {
			$data_q[ 'offset' ] = $data_off;
		}
		$data_c = str_replace( '#', '', $_POST[ 'data_c' ] );

		if ( $_POST[ 'max' ] != 0 ) {
			$min = $_POST[ 'max' ];
		} else {
			$min = 0;
		}
		$max = 12;
		if ( isset( $data_c ) && $data_c != 'all' ) {
			$data_q[ 'tax_query' ] = array(
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'slug',
					'terms'    => $data_c,
				),
			);
		}
		$query = new \WP_Query( $data_q );
		ob_start();
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) :
				$query->the_post();
				$data_args[ 'image' ][ 'size_counter' ] = $min;
				new Actavista_Products( $data_args );
				if ( $min >= $max - 1 ) {
					$min = - 1;
				}
				$min ++;
			endwhile;
			wp_reset_postdata();
			$loadmore_text = $_POST[ 'btn_n' ];
			$button        = '<a data-max="' . $min . '" data-offset="' . $r_off . '" data-args="' . actavista_ajax_array_security_encode( $data_args ) . '" data-q="' . actavista_ajax_array_security_encode( $data_q ) . '" title="' . $loadmore_text . '" href="javascript:void(0)">' . $loadmore_text . '</a>';
		} else {
			$loadmore_text = esc_html__( 'No More Post', 'actavista' );
			$button        = '<a title="' . esc_attr($loadmore_text) . '" href="javascript:void(0)">' . $loadmore_text . '</a>';
		}
		$data_show = ob_get_clean();
		wp_send_json( array( 'data' => $data_show, 'tab_id' => $data_c, 'button' => $button ) );
	}

	public function add_wishlists() {

		if ( isset( $_POST[ 'subaction' ] ) && $_POST[ 'subaction' ] == 'add_wishlists' && function_exists( 'add_wishlist' ) ) {
			actavista_add_wishlist( $_POST );
			exit;
		}
	}

	public function delete_wishlists() {

		if ( isset( $_POST[ 'subaction' ] ) && $_POST[ 'subaction' ] == 'delete_wishlists' && function_exists( 'delete_wishlist' ) ) {
			actavista_delete_wishlist( $_POST );
			exit;
		}
	}

	public function product_quick_view() {

		$args  = array(
			'post_type'   => 'product',
			'post_status' => 'publish',
			'post__in'    => array( actavista_set( $_POST, 'id' ) ),
		);
		$query = new \WP_Query( $args );
		$obj   = new Imagify();
		$sizes = array( 'm' => '505x525', 'i' => '505x525', 'w' => '505x525' );
		while ( $query->have_posts() ) : $query->the_post();
			global $product;
			?>
			<div class="container">
				<div class="popup-wraper2 show">
					<div class="quick-view-box">
						<span class="close-quickview"><i class="fa fa-close"></i></span>
						<div class="row">
							<div class="col-lg-6">
								<div class="quick-avatar">
									<?php echo wp_kses( $obj->thumb( $sizes, true, array(
										true,
										true,
										true,
									) ), true ); ?>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="full-postmeta">
									<h4><?php the_title(); ?></h4>
									<span class="prices style1">
                                <?php echo wp_kses( $product->get_price_html(), true ); ?>
                            </span>
									<p><?php echo wp_trim_words( get_the_excerpt(), 30, '.' ); ?></p>
									<?php actavista_add_to_cart_button( 'Add to Cart', 'shopnow' ); ?>
									<?php do_action( 'woocommerce_share' ); ?>
									<div class="product_meta">
										<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
											<div class="prod categories">
												<strong class="cat-heading"><?php esc_html_e( 'SKU:', 'actavista' ); ?>
													<span>
											<?php
											if ( $sku = $product->get_sku() ) {
												echo esc_html( $sku );
											} else {
												esc_html_e( 'N/A', 'actavista' );
											}
											?>
										</span>
												</strong>
											</div>
										<?php endif; ?>
										<div class="prod categories">
											<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="cat-heading">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'actavista' ) . ' ', '</span>' ); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
		endwhile;
		wp_reset_postdata();
		exit;
	}


	/**
	* Subscribe user for newsletter to mailchimp service.
	*
	* @return [type] [description]
	*/
	function actavista_newsletter() {
		if ( ! $_POST ) {

			return;
		}

		$dn = actavista_dot( $_POST );



		if ( ! wp_verify_nonce( $dn->get( "_wpnonce" ), ACTAVISTA_NONCE ) ) {

			echo '<div class="alert alert-danger">'.esc_html__('Unable to verify security check, try again after reloading the page', 'actavista' ).'</div>';

			exit;

		}
		if ( ! is_email( $dn->get( 'EMAIL' ) ) ) {

		echo '<div class="alert alert-danger">'.esc_html__('Invalid email provide, please provide a valid email.', 'actavista' ).'</div>';

		exit;

		}
		if ( ! $dn->get( 'thelist' ) ) {

		echo '<div class="alert alert-danger">'.esc_html__( 'Subscription error. Please contact administrator.', 'actavista' ).'</div>';

		exit;

		}
		$mc_lists = actavista_get_mc_lists();

		$list = '';
			foreach ( $mc_lists as $m_list => $m_list_val ) {

			if ( $m_list === $dn->get( 'thelist' ) ) {

			$list = $m_list;
			break;

			}

		}
		if ( ! $list ) {

		echo '<div class="alert alert-danger">'.esc_html__( 'Subscription error. Please contact administrator.', 'actavista').'</div>';

		exit;

		}
		$res = '';

		if ( ! class_exists( 'MC4WP_Mailchimp' ) ) {

		include_once MC4WP_PLUGIN_DIR . 'includes/class-mailchimp.php';

		}



		if ( $list && $dn->get( 'EMAIL' ) && class_exists( 'MC4WP_Mailchimp' ) ) {

			$res = actavista_mailchimp_process( $list, $dn->get( 'EMAIL' ) );
			
		}

		if ( ! $res ) {

		printf( '<div class="alert alert-danger">'.esc_html__('Subscription Error:', 'actavista' ).' %s</div>', $res );

		exit;

		}

		if( $res === 'That subscriber already exists.' ) {

			echo '<div class="alert alert-warning">'.esc_html__( 'That subscriber already exists.', 'actavista' ).'</div>';

		exit;

		} else {
			echo '<div class="alert alert-success">'.esc_html__( 'Subscription Succesful. Please check your email.', 'actavista' ).'</div>';

			exit;
		}

	}

	/**
	* Twitter feed ajax callback.
	*
	* @return [type] [description]
	*/
	function actavista_twitter_ajax_callback() {

		actavista_twitter_tweets( $_POST );
		exit;
	}
	function actavista_videos() {

		if (isset($_POST['action']) && $_POST['subaction'] == 'actavista_videos') {

			actavista_video($_POST);
			exit;
		}
	}

}
