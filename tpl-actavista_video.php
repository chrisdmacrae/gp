<?php

/**
 * Template Name: Videos Listing
 * Videos Main File.
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

get_header();

$data = \ACTAVISTA\Includes\Classes\Common::instance()->data( 'video' )->get();

$class = ( $data->get( 'layout' ) != 'full' && $data->get( 'style' ) != 'col-md-4' ) ? 'col-xs-12 col-sm-12 col-md-12 col-lg-8 ' : 'offset-lg-1 col-lg-10 col-md-12 col-sm-12';

do_action( 'actavista_banner', $data );  

if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
	$img_obj = new ACTAVISTA_Resizer();
}
$width = $data->get( 'sidebar' ) ? '970' : '1170';
$args  = array(
	'post_type'   => 'actavista_video',
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

					<?php while ( $query->have_posts() ): $query->the_post();   

					actavista_template_load( 'templates/blog/blog.php', compact( 'data', 'img_obj', 'width' ) );

				endwhile; wp_reset_postdata(); 

				actavista_the_pagination();

				?>

			</div>
		<?php endif; ?>

		<?php do_action( 'actavista_sidebar', 'right', $data ); ?>
	</div>
</div>
</div>
</section>



<?php get_footer(); ?>

