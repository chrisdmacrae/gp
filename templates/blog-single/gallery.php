<?php 
/**
 * Single Gallery File.
 *
 * @package Fixkar
 * @author  Webinane
 * @version 1.0
 */

if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
    $img_obj = new ACTAVISTA_Resizer();
}
?> 
<?php wp_enqueue_script( 'html5lightbox' ); ?>
<div class="singlee gallery">

    <div class="row merged">


        <?php $explode = explode(',', $gallery); foreach( $explode as $gall ) : ?>

        <div class="col-lg-3 col-md-3 cl-sm-6 col-xs-12">

            <a href="<?php echo wp_get_attachment_url( $gall); ?>" class="html5lightbox" data-group="set2">
                <?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
                    <?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( $gall, 'full' ), 415, 315, true ) ); ?>
                <?php else : ?>
                    <?php echo wp_get_attachment_image( $gall, 'full' ); ?>
                <?php endif; ?>

            </a>
            
        </div>
        
    <?php endforeach; ?>

</div>

</div>