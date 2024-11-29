<?php
 /**
 * Event Carousel File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );

 if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
 	$img_obj = new ACTAVISTA_Resizer();
 } 
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
 
 if ( $query->have_posts() ) : 

 
?>
<div class="row">
<?php if ( $columns == 'col-lg-6' ) {
 		$width = 550;
 		$height = 280;
 	} else{
 		$width = 360;
 		$height = 220;
 	} 

 ?>
 <?php while ( $query->have_posts() ) : $query->the_post();  ?>

 	<div class="col-lg-4 col-sm-6">
 		<div class="our-last-event wow fadeIn" data-wow-delay="0.2s">
 			<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
 				<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) , 'full' ), $width, $height, true ) ); ?>
 			<?php endif; ?> 
 			<?php 
 				$video_link = get_post_meta( get_the_ID(), 'successful_video_link', true ); 
 				$video_label = get_post_meta( get_the_ID(), 'successful_video_label', true ); 
 			if ( $video_link || $video_label ) : ?>
	 			<div class="uphover">
	 				<a href="<?php echo esc_url( $video_link ); ?>" class="html5lightbox"><i class="fa fa-play-circle-o"></i></a>
	 				<span><?php echo esc_html( $video_label ); ?></span>
	 			</div>
 		<?php endif; ?>
 		</div>
 	</div>

 <?php endwhile; wp_reset_postdata(); ?>
</div>
<?php endif; ?>