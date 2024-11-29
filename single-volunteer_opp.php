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
<?php $data = \ACTAVISTA\Includes\Classes\Common::instance()->data('single')->get();

$format = get_post_format( get_the_ID() );

$class = ( $data->get('layout') != 'full' && $data->get('sidebar')  ) ? 'col-sm-12 col-md-12 col-lg-8' : 'col-md-12';

$options = actavista_WSH()->option();
if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
  $img_obj = new ACTAVISTA_Resizer();
}
?>

<?php  do_action( 'actavista_banner' , $data );  ?>


<section>
  <div class="gap dfghj">
    <div id="page-contents" class="container">





      <div class="row">
        <?php  do_action( 'actavista_sidebar', 'left', $data ); ?>
        <div class="<?php echo esc_attr( $class ); ?>">
          <?php     while ( have_posts() ) : the_post(); ?>
            <?php actavista_template_load( 'templates/blog-single/image.php' , compact( 'options', 'data' ) ); ?>
<?php
      //give_get_template_part( 'single-give-form/content', 'single-give-form' );
      the_content();

    // End the loop.
    endwhile; ?>
        </div><!-- page content -->
        <?php  do_action( 'actavista_sidebar', 'right', $data ); ?>
      </div>
    </div>
  </div>
</section><!-- content with sidebar -->
<?php wp_enqueue_script( 'script' ); ?>
<?php get_footer(); ?>