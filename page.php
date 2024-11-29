<?php
/**
 * Default Template Main File.
 *
 * @package Fixkar
 * @author  Webinane
 * @version 1.0
 */


get_header();


$data = \ACTAVISTA\Includes\Classes\Common::instance()->data( 'page' )->get();

$class = ( $data->get( 'layout' ) != 'full' && $data->get( 'sidebar' )) ? 'col-lg-8' : 'col-xs-12 col-sm-12 col-md-12';

do_action( 'actavista_banner', $data ); ?>


<section>

	<div class="gap">

		<div class="container">

			<div class="row">

				<?php do_action( 'actavista_sidebar', 'left', $data ); ?>

				<div class="<?php echo esc_attr( $class ); ?> single-meta">

					<?php while ( have_posts() ): the_post(); ?>

						<?php the_content(); ?>

					<?php endwhile; wp_reset_postdata(); ?>
					<div class="clearfix"></div>
					
					    <?php
                         	$defaults = array(
                        		'before'           => '<div class="paginate_link">' . esc_html__( 'Pages:', 'actavista' ),
                        		'after'            => '</div>',
                        		
                        	);
                         
                        wp_link_pages( $defaults );
                        ?>
				    
					<?php comments_template() ?>
				</div>

				<?php do_action( 'actavista_sidebar', 'right', $data ); ?>

			</div>
		</div>
	</div>
</section><!-- blog section with pagination -->

<?php get_footer(); ?>
