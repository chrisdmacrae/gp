<?php
 /**
 * Activities File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );


 $cat = explode( ',', $cat );
 $args = array(
 	'post_type'      => 'post',
 	'order'          => $order,
 	'posts_per_page' => $number,
 );
 if ( ! empty( $cat ) && actavista_set( $cat, 0 ) == 'all' ) {
 	array_shift( $cat );
 }

 if ( ! empty( $cat ) && actavista_set( $cat, 0 ) != '' )
 	$args['tax_query'] = array( array( 'taxonomy' => 'category', 'field' => 'slug', 'terms' => (array) $cat ) );
 $query = new WP_Query( $args );
 $title_limit = $title_limit ? $title_limit : 20;
 if ( class_exists( 'ACTAVISTA_Resizer' ) ) {

 	$img_obj = new ACTAVISTA_Resizer();

 }
 if( $columns == 'col-lg-6' ) {
 	$width = $width ? $width : 545;
 	$height = $height ? $height : 325;
 } else {
 	$width = $width ? $width : 350;
 	$height = $height ? $height : 235;
 }

 ?>


 <?php if ( $query->have_posts() ) : ?>
 	<div class="row">
 		<?php $counter = 2; while( $query->have_posts() ) : $query->the_post(); ?>
 			<?php $format = get_post_format( get_the_ID() ); ?>
 			<div class="<?php echo esc_attr( $columns ); ?> col-sm-6">
 				<div class="activity-box wow fadeIn" data-wow-delay="0.<?php echo esc_attr( $counter ); ?>s">
 					<figure>
 						<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
 							<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) , 'full' ), $width, $height, true ) ); ?>
 						<?php else : ?>
 							<?php the_post_thumbnail( 'full' ); ?>
 						<?php endif; ?>
 						<?php if ( $format == 'audio' ) {
 							$class = 'fa fa-headphones';
 						} elseif ( $format == 'video' ) {
 							$class = 'fa fa-play-circle';
 						} elseif ( $format == 'gallery' ) {
 							$class = 'fa fa-th';
 						} else {
 							$class = 'fas fa-image';
 						}
 						?>
 						<i class="<?php echo esc_attr( $class ); ?>"></i>
 					</figure>
 					<div class="activity-meta">
 						<?php
 							$location = get_post_meta( get_the_ID(), 'activities_location', true );
 							$location_url = get_post_meta( get_the_ID(), 'activities_location_url', true );
 						?>
 						<?php if ( $location && $show_blog_loc ) : ?>
	 						<div class="tag">
	 							<i><img alt="<?php echo esc_attr_e( 'markericon', 'actavista' ); ?>" src="<?php echo get_template_directory_uri().'/assets/images/map-marker2.png'; ?>"></i> 
	 							
	 							<?php echo esc_url( $location_url ) ? '<a href="'.$location_url.'" target="_blank">' : ''; ?>

	 								<?php echo esc_html( $location ); ?>
	 							<?php echo esc_url( $location_url ) ? '</a>' : ''; ?>
	 						</div>
	 					<?php endif; ?>
	 					<h4><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $title_limit, '...' ); ?></a></h4>

 					</div>
 				</div>
 			</div>
 		<?php $counter= $counter+2; endwhile; wp_reset_postdata(); ?>
 	</div>
 <?php endif; ?>
