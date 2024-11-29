<?php
 /**
 * Event grid File
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
if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
	$img_obj = new ACTAVISTA_Resizer();
} 
 if ( ! empty( $cat ) && actavista_set( $cat, 0 ) != '' )
 	$args['tax_query'] = array( array( 'taxonomy' => 'event_cat', 'field' => 'slug', 'terms' => (array) $cat ) );
 $query = new WP_Query( $args );
 $title_limit = $title_limit ? $title_limit : 20;


 if ( $query->have_posts() ) : ?>

 <div class="row">
 	<?php 
 	$counter = 2; 
 	$height = 270; 
 	while ( $query->have_posts() ): $query->the_post();

 		actavista_template_load( 'templates/shortcodes/event_grid.php', compact( 'img_obj','height', 'show_event_location', 'counter', 'title_limit', 'text_limit', 'show_event_date', 'columns' ) );

 		$counter=$counter+2; 
 	endwhile; wp_reset_postdata(); 
 	?>
 </div>
<?php endif; ?>