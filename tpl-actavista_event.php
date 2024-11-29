<?php

/**
 * Template Name: Events Listing
 * Events Main File.
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */


get_header();

$data = \Actavista\Includes\Classes\Common::instance()->data( 'events' )->get();
$options = actavista_WSH()->option();
$class = ( $data->get( 'layout' ) != 'full' && $data->get( 'sidebar' ) ) ? 'col-lg-8 col-sm-12' : 'col-lg-12 col-sm-12';
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args  = array(
	'post_type'   => 'actavista_event',
	'post_status' => 'publish',
	'paged'       => $paged
);

$query = new WP_Query( $args );

if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
	$img_obj = new ACTAVISTA_Resizer();
} 

?>

<?php do_action( 'actavista_banner', $data ); ?>

<?php if ( have_posts() ) : ?>
	
	<section>
		<div class="gap">
			<div class="<?php echo ( ( $data->get( 'layout' ) == '' || $data->get( 'layout' ) == 'full' ) && ( $options->get( 'events_listing_style' ) == 'col-lg-6' ) )  ? 'small ' : ''; ?>container">
				<div class="row remove-ext-60">
					<?php
					if ( $data->get( 'style' ) != 'col-lg-3' ) {
						do_action( 'actavista_sidebar', 'left', $data );
					}
					?>
					<div class="<?php echo esc_attr( $class ); ?>">
						<div class="row">
							<?php 
								$counter = 2; 
								while ( $query->have_posts() ): $query->the_post();

									actavista_template_load( 'templates/custom-posts/event_listing.php', compact( 'img_obj', 'options', 'counter' ) );

									$counter=$counter+2; 
								endwhile; wp_reset_postdata(); 
							?>
						</div>

						<div class="col-lg-12">
							<?php actavista_the_pagination( $query->max_num_pages ); ?>
							
						</div>


					</div>
					<?php
					if ( $data->get( 'style' ) != 'col-lg-3' ) {
						do_action( 'actavista_sidebar', 'right', $data );
					}
					?>
				</div>	
			</div>
		</div>
	</section>					

<?php endif; ?>

<?php get_footer(); ?>
