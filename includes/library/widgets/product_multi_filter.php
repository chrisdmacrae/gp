<?php
namespace ACTAVISTA\Includes\Library\Widgets;

class actavista_product_multi_filter_Widget extends \WP_Widget {
	public function __construct() {

		$widget_ops = array(
			'description' => esc_html__( 'This widget is used to show list of product by filter', "konia" )
		);
		parent::__construct( 'actavista-product_multi_filter', esc_html__( 'Actavista:Product Filters', "konia" ), $widget_ops );
	}

	public function widget( $args, $instance ) {

		extract( $args );
		$defaults = array( 'title' => '', 'number' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults );
		echo wp_kses( $before_widget, true );
		$widgetTitle = esc_html( actavista_set( $instance, 'title' ) );
		$title       = apply_filters( 'widget_title', ( $widgetTitle == '' ) ? '' : $widgetTitle );
		echo wp_kses( $before_title . $title . $after_title, true );
		if ( actavista_set( $instance, 'filter_type' ) && actavista_set( $instance, 'filter_type' ) == 'label' ) {
			$classes = actavista_set( $instance, 'filter_type' ) . ' ' . 'sizes';
		} else {
			$classes = actavista_set( $instance, 'filter_type' );
		}
		$type = actavista_set( $instance, 'filter_type' );
		$base_link          = $this->get_current_page_url();
		?>
		<div class="<?php echo esc_attr( $classes ); ?>">
			<?php
			$woo_taxonomy = wc_get_attribute_taxonomies();
			$counter      = 0;
			if ( ! empty( $woo_taxonomy ) ) {
				if ( $counter == actavista_set( $instance, 'number' ) ) {
					return;
				}
				foreach ( $woo_taxonomy as $value ) {
					$terms_list = get_terms( 'pa_' . $value->attribute_name, array( 'hide_empty' => false, ) );
					foreach ( $terms_list as $psot ) {
						
						$filter_name    = 'filter_' . wc_attribute_taxonomy_slug( 'pa_' . $value->attribute_name );
						/* $current_filter = isset( $_GET[ $filter_name ] ) ? explode( ',', wc_clean( wp_unslash( $_GET[ $filter_name ] ) ) ) : array(); // WPCS: input var ok, CSRF ok.
						$current_filter = array_map( 'sanitize_title', $current_filter );
						if ( ! in_array( $psot->slug, $current_filter, true ) ) {
							$current_filter[] = $psot->slug;
						} */
						$link = remove_query_arg( $filter_name, $base_link );
						$link = $link .'?'.$filter_name.'='.$psot->slug;
						//$link      = apply_filters( 'woocommerce_layered_nav_link', $link, $psot, 'pa_' . $value->attribute_name );
						//printr($psot->slug);

						$term_meta = get_term_meta( $psot->term_id, $type, true );
						if ( 'image' == $type && ! empty( $term_meta ) ) {
							echo '<a href="' . esc_url($link ) . '">' . wp_get_attachment_image( $term_meta, array(
									28,
									28,
								) ) . '</a>';
						}
						if ( 'color' == $type && ! empty( $term_meta ) ) {
							echo '<a href="' . esc_url( $link ) . '" style="background:' . esc_url( $term_meta ) . '"></a>';
						}
						if ( 'label' == $type && ! empty( $term_meta ) ) {
							echo '<a href="' . esc_url( $link ) . '">' . esc_html( $term_meta ) . '</a>';
						}
					}
					$counter ++;
				}
			}
			?>
		</div>
		<?php
		echo wp_kses( $after_widget, true );
	}

	protected function get_current_page_url() {
		if ( \Automattic\Jetpack\Constants::is_defined( 'SHOP_IS_ON_FRONT' ) ) {
			$link = home_url();
		} elseif ( is_shop() ) {
			$link = get_permalink( wc_get_page_id( 'shop' ) );
		} elseif ( is_product_category() ) {
			$link = get_term_link( get_query_var( 'product_cat' ), 'product_cat' );
		} elseif ( is_product_tag() ) {
			$link = get_term_link( get_query_var( 'product_tag' ), 'product_tag' );
		} else {
			$queried_object = get_queried_object();
			$link           = get_term_link( $queried_object->slug, $queried_object->taxonomy );
		}

		// Min/Max.
		if ( isset( $_GET['min_price'] ) ) {
			$link = add_query_arg( 'min_price', wc_clean( wp_unslash( $_GET['min_price'] ) ), $link );
		}

		if ( isset( $_GET['max_price'] ) ) {
			$link = add_query_arg( 'max_price', wc_clean( wp_unslash( $_GET['max_price'] ) ), $link );
		}

		// Order by.
		if ( isset( $_GET['orderby'] ) ) {
			$link = add_query_arg( 'orderby', wc_clean( wp_unslash( $_GET['orderby'] ) ), $link );
		}

		/**
		 * Search Arg.
		 * To support quote characters, first they are decoded from &quot; entities, then URL encoded.
		 */
		if ( get_search_query() ) {
			$link = add_query_arg( 's', rawurlencode( htmlspecialchars_decode( get_search_query() ) ), $link );
		}

		// Post Type Arg.
		if ( isset( $_GET['post_type'] ) ) {
			$link = add_query_arg( 'post_type', wc_clean( wp_unslash( $_GET['post_type'] ) ), $link );

			// Prevent post type and page id when pretty permalinks are disabled.
			if ( is_shop() ) {
				$link = remove_query_arg( 'page_id', $link );
			}
		}

		// Min Rating Arg.
		if ( isset( $_GET['rating_filter'] ) ) {
			$link = add_query_arg( 'rating_filter', wc_clean( wp_unslash( $_GET['rating_filter'] ) ), $link );
		}

		// All current filters.
		if ( $_chosen_attributes = \WC_Query::get_layered_nav_chosen_attributes() ) { // phpcs:ignore Squiz.PHP.DisallowMultipleAssignments.Found, WordPress.CodeAnalysis.AssignmentInCondition.Found
			foreach ( $_chosen_attributes as $name => $data ) {
				$filter_name = wc_attribute_taxonomy_slug( $name );
				if ( ! empty( $data['terms'] ) ) {
					$link = add_query_arg( 'filter_' . $filter_name, implode( ',', $data['terms'] ), $link );
				}
				if ( 'or' === $data['query_type'] ) {
					$link = add_query_arg( 'query_type_' . $filter_name, 'or', $link );
				}
			}
		}

		return apply_filters( 'woocommerce_widget_get_current_page_url', $link, $this );
	}

	public function update( $new_instance, $old_instance ) {

		$instance                  = $old_instance;
		$instance[ 'title' ]       = $new_instance[ 'title' ];
		$instance[ 'filter_type' ] = $new_instance[ 'filter_type' ];
		$instance[ 'number' ]      = $new_instance[ 'number' ];

		return $instance;
	}

	public function form( $instance ) {

		$defaults = array( 'title' => '', 'number' => '', 'filter_type' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', "konia" ); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance[ 'title' ] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'filter_type' ) ); ?>"><?php esc_html_e( 'Filter Type', "konia" ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'filter_type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'filter_type' ) ); ?>">
				<?php
				$options = array(
					'color' => esc_html__( 'Color', 'actavista' ),
					'label' => esc_html__( 'Label', 'actavista' ),
					'image' => esc_html__( 'Image', 'actavista' )
				);
				if ( ! empty( $options ) ) :
					foreach ( $options as $key => $val ) :
						$selected = ( $key == $instance[ 'filter_type' ] ) ? 'selected = "selected"' : '';
						?>
						<option <?php echo esc_attr( $selected ); ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $val ); ?></option>
					<?php endforeach; endif; ?>
			</select>
		</p>        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of Attribute', "konia" ); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $instance[ 'number' ] ); ?>"/>
		</p>
		<?php
	}
}
