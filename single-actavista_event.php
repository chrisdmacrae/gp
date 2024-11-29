<?php 
/**
 * Single Event Main File.
 *
 
 * @package Actavista
 * @author  Webinane
 * @version 1.0
*/
get_header(); 

$options = actavista_WSH()->option();

$data = \Actavista\Includes\Classes\Common::instance()->data('servicesingle')->get();

if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
	$img_obj = new ACTAVISTA_Resizer();
}
wp_enqueue_script('downCount');
$class = ( $data->get('layout') != 'full' && $data->get('sidebar')  ) ? 'col-sm-12 col-md-12 col-lg-8' : 'col-md-12';

do_action( 'actavista_banner' , $data );  ?>
<section>
	<div class="gap">
		<div class="container">
			<div class="row">
				<?php do_action( 'actavista_sidebar', 'left', $data ); ?>
				<div class="<?php echo esc_attr( $class ); ?>">
					<?php while( have_posts() ) : the_post(); 
					$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID(); 

					$date = date_create();

					$date_s = get_post_meta( get_the_ID(), 'event_start_date', true );

					$date_e = get_post_meta( get_the_ID(), 'event_event_date', true );  
					if($date_s){
						date_timestamp_set($date, $date_s);
					}
					?>

					<div class="event-detail">
						<div class="image-gallery">
							
							<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
								<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) , 'full' ), 1110, 495, true ) ); ?>
							<?php else : ?>
								<?php the_post_thumbnail( 'full' ); ?>
							<?php endif; ?>

						</div>

						<div class="row">
							<div class="col-lg-10 offset-lg-1 col-md-12">
								<?php  if ( $options->get( 'events_single_counter' ) ) :
								actavista_template_load( 'templates/common/event_counter.php', compact( 'date' ) );
								endif; ?>
								<div class="event-detail-meta">
									<?php 
									if ( $options->get( 'events_location' )  ) : 
										actavista_template_load( 'templates/custom-posts/event_location.php' );
									endif; 
									?>
									<h1><?php the_title(); ?></h1>
									<div class="event-duration">

										<?php  if ( $date_s ) : ?>

											<span><i class="fa fa-calendar"></i>

												<strong><?php esc_html_e( 'START :', 'actavista'); ?> </strong>

												<?php echo esc_attr( date('M d , Y', $date_s) ); ?> - <?php echo esc_attr( date( 'H:i A', $date_s ) );  ?> </span>

											<?php endif; ?>

											<?php  if ( $date_e) : ?>

												<span>

													<strong><?php esc_html_e( 'END :', 'actavista'); ?> </strong>

													<?php echo esc_attr( date('M d , Y', $date_e) ); ?> - <?php echo esc_attr( date( 'H:i A', $date_e ) );  ?> </span>

												<?php endif; ?>

											</div>
											<?php the_content(); ?>
											<?php actavista_template_load( 'templates/common/event_single_info.php' ); ?>

										</div>

									</div>

								</div>

							</div>

							<?php $block_type = get_post_meta( get_the_ID(), 'event_staticblock', true );

							if ( $block_type ) {

								$post = get_post( $block_type ); 

								echo do_shortcode($post->post_content ); 

							}

							endwhile; wp_reset_postdata(); ?>

						</div>

						<?php do_action( 'actavista_sidebar', 'right', $data ); ?>

					</div>

				</div>

			</div>

		</section>
		<?php get_footer(); ?>
