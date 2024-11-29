<?php
 /**
 * Event Boxes File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );


 $cat = explode( ',', $cat );
 $args = array(
 	'post_type'      => 'actavista_event',
 	'order'          => $order,
 	'posts_per_page' => $number,
 );
 if ( ! empty( $cat ) && actavista_set( $cat, 0 ) == 'all' ) {
 	array_shift( $cat );
 }

 if ( ! empty( $cat ) && actavista_set( $cat, 0 ) != '' )
 	$args['tax_query'] = array( array( 'taxonomy' => 'event_cat', 'field' => 'slug', 'terms' => (array) $cat ) );
 $query = new WP_Query( $args );
 $title_limit = $title_limit ? $title_limit : 20;
 if ( class_exists( 'ACTAVISTA_Resizer' ) ) {

 	$img_obj = new ACTAVISTA_Resizer();

 }
 $width = ( $columns == 'col-lg-6' ) ? 525 : 340;
 $height = ( $columns == 'col-lg-6' ) ? 340 : 250;
 
 ?>
 <?php if ( $query->have_posts() ) : ?>
 	<div class="row remove-ext-btom">
 		<?php while( $query->have_posts() ) : $query->the_post(); ?>
 			<div class="<?php echo esc_attr( $columns ); ?> col-sm-6">
 				<div class="event-box wow fadeIn" data-wow-delay="0.2s">
 					<figure>
 						<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
 							<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) , 'full' ), $width, $height, true ) ); ?>
 						<?php else : ?>
 							<?php the_post_thumbnail( 'full' ); ?>
 						<?php endif; ?>
 					</figure>
 					<div class="event-meta">
 						<?php $date = date_create();
 						$date_s = get_post_meta( get_the_ID(), 'event_start_date', true );  
 						$date_e = get_post_meta( get_the_ID(), 'event_event_date', true );  
 						date_timestamp_set($date, $date_s);
 						$start_date = date_format($date, 'M d,Y');
 						$start_time = date_format($date, 'H:i a'); ?>
 						<?php if ( $show_event_date && $start_date) : ?>
 							
 							<div class="date-time">
							<span class="date"><?php echo esc_html( $start_date ); ?></span>
 							<span><?php echo ( date('h:i A',$date_s) ); ?> - <?php echo ( date('h:i A',$date_e) ); ?></span>


 							</div>

 						<?php endif; ?>
 						<h4><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $title_limit, '...' ); ?></a></h4>
 						<span><i><img src="<?php echo get_template_directory_uri().'/assets/images/map-marker.png'; ?>" alt="<?php echo esc_attr__( 'marker', 'actavista' ); ?>"></i> 
 							<?php echo esc_html( actavista_meta( 'event_location', get_the_ID() ) ); ?>
 						</span>
 					</div>
 				</div>
 			</div>
 		<?php endwhile; wp_reset_postdata(); ?>
 	</div>
 <?php endif; ?>