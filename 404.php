<?php
/**
 * 404 page file
 *
 * @package WordPress
 * @subpackage Actavista
 * @author Webinane <webinane@gmail.com>
 * @version 1.0
 *
 */

?>
<?php get_header(); 
$data = \ACTAVISTA\Includes\Classes\Common::instance()->data( '404' )->get();
do_action( 'actavista_banner', $data );
$options = actavista_WSH()->option(); ?>

<section>
    <div class="gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="error-page">
                        <figure><img src="<?php echo get_template_directory_uri().'/assets/images/error-404.png'; ?>" alt="<?php esc_attr_e( 'error', 'actavista' ); ?>"></figure>
                        <h1><?php echo esc_html( $options->get( '404-page_title' ) ) ? wp_kses_post(  $options->get( '404-page_title' ) ) : esc_html_e( 'Error - Not Found', 'actavista' ); ?></h1>
                        <p>
                            <?php echo wp_kses_post( $options->get( '404-page-text' ) ); ?>
                            <?php if ( $options->get( 'back_home_btn' )  ) : ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <?php echo esc_html( $options->get( 'back_home_btn_label' ) ) ? $options->get( 'back_home_btn_label' ) : esc_html_e( ' Homepage.', 'actavista' ); ?></a>
                            <?php endif; ?>
                        </p>
                        <?php if ( $options->get( '404_page_form' ) ) : ?>
                         <?php echo get_search_form(); ?>   
                     <?php endif; ?> 
                 </div>
             </div>
         </div>
     </div>
 </div>
</section>

<?php get_footer(); ?>
