 <?php 
    /**
     * Single Image File.
     *
     * @package Actavista
     * @author  Webinane
     * @version 1.0
     */


    if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
        $img_obj = new ACTAVISTA_Resizer();
    }
    $width = $data->get( 'sidebar' ) ? '970' : '1110';

    ?>
    <?php if( has_post_thumbnail() ) : ?>
        <figure>
         <?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>

             <?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ), $width, 460, true ) ); ?>
         <?php else : ?>
            <?php the_post_thumbnail( 'full' ); ?>
        <?php endif; ?>
    </figure>

<?php endif; ?>