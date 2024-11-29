<?php
/**
 * Tag Main File.
 *
 * @package Fixkar
 * @author  Webinane
 * @version 1.0
 */

get_header();

$data = \ACTAVISTA\Includes\Classes\Common::instance()->data( 'search' )->get();

$class = ( $data->get( 'layout' ) != 'full' && $data->get( 'style' ) != 'col-md-4' ) ? 'col-xs-12 col-sm-12 col-md-12 col-lg-8 ' : 'offset-lg-1 col-lg-10 col-md-12 col-sm-12';
if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
	$img_obj = new ACTAVISTA_Resizer();
} else {
    $img_obj = '';
}
do_action( 'actavista_banner', $data );  

$options = actavista_WSH()->option();

$width = $data->get( 'sidebar' ) ? '970' : '1170';

?>
<section>
	<div class="gap">
		<div class="container" id="page-contents">
			<div class="row">
				<?php do_action( 'actavista_sidebar', 'left', $data ); ?>
				
				<div class="<?php echo esc_attr( $class ); ?>">

					<?php if ( have_posts() ) : ?>

						<?php while ( have_posts() ) : the_post();  

						actavista_template_load( 'templates/blog/blog.php', compact( 'data', 'img_obj', 'width' ) );

					endwhile; wp_reset_postdata(); 

					actavista_the_pagination();
				else :
					actavista_template_load( 'templates/blog/search-notfound.php', compact( 'options' ) );
					?>
				<?php endif; ?>
			</div>
			

			<?php do_action( 'actavista_sidebar', 'right', $data ); ?>
		</div>
	</div>
</div>
</section>



<?php get_footer(); ?>

