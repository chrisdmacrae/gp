<?php 
/**
 * Blog Post Main File.
 *
 * @package Fixkar
 * @author  Webinane
 * @version 1.0
 */

get_header(); 

?>
<?php $data = \ACTAVISTA\Includes\Classes\Common::instance()->data('videosingle')->get();

$format = get_post_format( get_the_ID() );

$class = ( $data->get('layout') != 'full' && $data->get('sidebar')  ) ? 'col-sm-12 col-md-12 col-lg-8' : 'offset-lg-1 col-lg-10 col-md-12 col-sm-12';

$options = actavista_WSH()->option();
if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
	$img_obj = new ACTAVISTA_Resizer();
}
?>

<?php  do_action( 'actavista_banner' , $data );  ?>


<section>
	<div class="gap">
		<div id="page-contents" class="container">
			
			<?php actavista_template_load( 'templates/blog-single/social_share.php' , compact( 'data' ) ); ?>
			<div class="row">
				<?php  do_action( 'actavista_sidebar', 'left', $data ); ?>
				<div class="<?php echo esc_attr( $class ); ?>">
					<?php while( have_posts() ) : the_post(); ?>
						<?php global $wp_query;

						$page_id = ($wp_query->is_posts_page) ? $wp_query->queried_object->ID : get_the_ID();


						?>

						<div <?php post_class(); ?>>    

							<div class="blog-detail">

								<div class="category">
									<?php $category = get_the_terms( get_the_ID(), 'video_cat' );
									if( $category ) :
										foreach ($category as $cat) : ?>
											<a href="javascript:void(0)"><?php echo actavista_set( $cat, 'name' ); ?></a>
										<?php endforeach; 
									endif;
								    ?>
									</div>

									<h1><?php the_title(); ?></h1>

									<?php actavista_template_load( 'templates/blog-single/author_meta.php' , compact( 'data' ) ); ?>


                                    <div class="singleemyvideo clearfix">
                                    <?php echo get_post_meta( get_the_ID(), 'wiki_test_embed', true ); ?>
                                    </div>
									<?php the_content(); ?>
									<?php actavista_template_load( 'templates/blog-single/cat_tag.php' , compact( 'data' ) ); ?>
									<?php if ( $data->get( 'next_prev' ) ) : ?>
										<?php actavista_template_load( 'templates/blog-single/next_previous_post.php' , compact( 'data' ) ); ?>
									<?php endif; ?>
									<?php if ( $data->get( 'author_box' ) ) : ?>
										<?php actavista_template_load( 'templates/blog-single/author_box.php' , compact( 'data' ) ); ?>
									<?php endif; ?>
									<?php if ( $data->get( 'related_post' ) ) : ?>
										<?php actavista_template_load( 'templates/blog-single/related_posts.php' , compact( 'data', 'img_obj' ) ); ?>
									<?php endif; ?>

								</div>
								<div class="comment-area">
									<?php comments_template(); ?>

								</div>
							</div>
						<?php endwhile; ?>
					</div><!-- page content -->
					<?php  do_action( 'actavista_sidebar', 'right', $data ); ?>
				</div>
			</div>
		</div>
	</section><!-- content with sidebar -->
	<?php wp_enqueue_script( 'script' ); ?>
	<?php get_footer(); ?>