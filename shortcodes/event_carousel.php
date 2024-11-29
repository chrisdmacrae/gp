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


 if ( $query->have_posts() ) : ?>


 <?php wp_enqueue_script( array( 'downCount', 'slick', 'actavista-scrol', 'script' ) ); ?>
 <?php
 function counter_script( $id, $date  ) {

 	$custom_script = 'jQuery(document).ready(function ($) {

 		jQuery(".countdownC'.$id.'").downCount({
 			date: "'.$date.'",
 			offset: +10
 		}); 
 	});';

 	wp_add_inline_script( 'downCount', $custom_script );
 }?>

 <div class="row">

 	<?php actavista_template_load( 'templates/shortcodes/event_coursel1.php', compact( 'query', 'show_event_date', 'title_limit', 'text_limit', 'show_event_counter', 'show_event_location', '' ) ); ?>
 	
 	<?php actavista_template_load( 'templates/shortcodes/event_coursel2.php', compact( 'query', 'show_event_date', 'title_limit', 'title', 'show_event_location') ); ?>
 </div>

 
<?php  endif; ?>



