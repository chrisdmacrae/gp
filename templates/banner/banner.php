<?php
/**
 * Banner Template
 *
 * @package WordPress
 * @subpackage Webinane
 * @author Webinane
 * @version 1.0
 */


$breadcrumb = actavista_the_breadcrumb(); 

?>
<?php  if ( !function_exists('actavista_shortcode') || $data->get( 'enable_banner' ) ) : ?>

    <div class="page-top bluesh more-low-opacity">
       <div class="bg-image" style="background:url('<?php echo esc_url( $data->get( 'banner' )  ); ?>')"></div>
       <div class="top-meta">

            <h2><?php echo wp_kses( $data->get( 'title' ), true ); ?></h2>

            <?php if ( $data->get( 'breadcrumb' ) ) : ?>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <?php echo wp_kses_post( $breadcrumb ); ?>
                    </ol>
                </nav>
            <?php endif; ?>
        </div>
    </div>



<?php $layer = $data->get( 'layer' ) ? $data->get( 'layer' ) : 'rgba(27,40,62,0.9)'; ?>
 <style>
.page-top.bluesh::before{
   background: <?php echo esc_attr( $layer ); ?>

}
</style> 

<?php endif; ?>

