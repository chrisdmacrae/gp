<?php
/**
 * Stats File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */
 $atts = vc_map_get_attributes( $tag, $atts );
 extract( $atts );
 ?>

 <div class="join-form-wrap" style="background-image: url('<?php echo wp_get_attachment_url( $bg_image ); ?>');">
        <div class="join-form-title">
            <h4><?php echo wp_kses_post($title); ?></h4>
            <span><?php echo wp_kses_post($subtitle); ?></span>
        </div>
        <?php if ( $newsltr_mc_lists2 ) : ?>
 			<?php actavista_template_load( 'templates/shortcodes/social-signup.php',  compact( 'newsltr_mc_lists2') ); ?>
 		<?php endif; ?>
    </div>