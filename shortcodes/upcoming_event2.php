<?php
/**
* Upcoming Event 2 File
* @package Actavista
@author  Webinane
* @version 1.0
*/

$atts = vc_map_get_attributes( $tag, $atts );
extract( $atts );
$post = get_post( $select_event);

if( (actavista_set($post, 'post_type') == 'actavista_event') ) {
	$args = array(
      'p'         => $select_event, // ID of a page, post, or custom type
      'post_type' => 'actavista_event',

  );
} else {
	$args = array(
		'post_type' => 'actavista_event',
		'posts_per_page' =>1,
	);
}
$query = new WP_Query( $args );
if ( $query->have_posts() ) : 
	 wp_enqueue_script('downCount');

	if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
		$img_obj = new ACTAVISTA_Resizer();
	}

	while( $query->have_posts() ) : $query->the_post(); ?>
		<div class="row align-items-center">
			<div class="col-lg-6">
				<div class="event-info-contnt">
					<h2><?php the_title(); ?></h2>
					<p><?php the_excerpt(); ?></p>
					<div class="event-show-time">
						<?php if ( $show_event_counter ) :
							$date = date_create();
							$date_s = get_post_meta(  get_the_ID(), 'event_start_date', true );
							if($date_s) :
					            date_timestamp_set($date, $date_s); //printr(date_format($date, 'Y,m,d,H,i,s')//);
					        endif; 
		        			actavista_template_load( 'templates/common/event_counter.php', compact( 'date' ) );
						endif; ?>
					</div>
				    <div class="event-location">
				    	<?php if ( $show_post_location && get_post_meta( get_the_ID(), 'event_location', true) ) : ?>
				    		<span><i class="fa fa-map-marker"></i><?php echo get_post_meta(  get_the_ID(), 'event_location', true); ?></span>
				    	<?php endif; ?>
				    	<?php if ( $show_post_date  ) : ?>
				    		<span><i class="fa fa-calendar"></i><?php echo date( 'F j, Y', get_post_meta(  get_the_ID(), 'event_start_date', true ) ); ?></span>
				    	<?php endif; ?>
				    </div>
				    <?php  if ( $show_post_button ) : ?>
				    	<a class="theme_btn_flat" href="<?php echo esc_url( get_post_permalink() ); ?>"><?php echo esc_attr( $btn_label ) ? $btn_label : esc_html__( 'JOIN NOW', 'actavista' ); ?></a>
				    <?php endif; ?>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="event-img">
					<?php if ( $show_post_image ) : ?>
						<figure>
							<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
								<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( get_post_thumbnail_id(  get_the_ID() ) , 'full' ), 590, 552, true ) ); ?>
							<?php else : ?>
								<?php the_post_thumbnail( 'full' ); ?>
							<?php endif; ?>
						</figure>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endwhile; wp_reset_postdata(); ?>

<?php endif; ?>