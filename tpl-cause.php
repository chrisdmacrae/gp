<?php

/**
 * Template Name: Campaigns Listing
 * Campaigns Main File.
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

get_header();

$data = \ACTAVISTA\Includes\Classes\Common::instance()->data( 'blog' )->get();

$class = ( $data->get( 'layout' ) != 'full' && $data->get( 'style' ) != 'col-md-4' ) ? 'col-xs-12 col-sm-12 col-md-12 col-lg-8 ' : 'offset-lg-1 col-lg-10 col-md-12 col-sm-12';

do_action( 'actavista_banner', $data );  

if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
	$img_obj = new ACTAVISTA_Resizer();
}
$width = $data->get( 'sidebar' ) ? '970' : '1170';
$args  = array(
	'post_type'   => 'cause',
	'post_status' => 'publish',
	'paged'       => $paged
);

$query = new WP_Query( $args );

?>
<section>
	<div class="gap">
		<div class="container" id="page-contents">
			<div class="row">
				<?php do_action( 'actavista_sidebar', 'left', $data );

				if ( have_posts() ) : ?>
				
				<div class="<?php echo esc_attr( $class ); ?>">
					<div class="row">
					<?php while ( $query->have_posts() ): $query->the_post();  ?> 


						<div class="col-lg-4 col-md-6 col-sm-6">

							<div class="donation-cbox">

								<div class="donation-cimg">

									<figure>

										<?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
											<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) , 'full' ), 600, 700, true ) ); ?>
										<?php endif; ?>

									</figure>

									<div class="donation-cbtn">

										<a class="theme_btn_flat" href="<?php the_permalink( ); ?>"><?php esc_html_e('DONATE NOW', 'actavista'); ?></a>

									</div>

								</div>

								<div class="donation-ctext">

									<h2><?php echo wp_trim_words( get_the_title(), 12, '...' ); ?></h2>

									<div class="donation-cmeta">
									
											<span class="c-date"><?php echo get_the_date( 'M d, Y'); ?></span>
									
									
											<span><?php esc_html_e( 'BY', 'actavista'); ?> <?php echo get_the_author(); ?></span>	
									
									</div>

								</div>		

							</div>

						</div>
					<?php endwhile; wp_reset_postdata(); 

					actavista_the_pagination();

					?>
					</div>
				</div>
			<?php endif; ?>

			<?php do_action( 'actavista_sidebar', 'right', $data ); ?>
		</div>
	</div>
</div>
</section>


<?php get_footer(); ?>

