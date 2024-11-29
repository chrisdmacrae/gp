<?php
 /**
 * Galley with infos File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );

 $galleries = json_decode( urldecode( $add_galleries ) );
 $infos = json_decode( urldecode( $add_info ) );
?>
 <div class="signup-volunteer">
    <?php if ( $galleries ) : 
        if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
         	$img_obj = new ACTAVISTA_Resizer();
        } ?>
        <div class="gall-images d-flex">
            <?php foreach( $galleries as $gallery ) : ?>
                <div>
                    <?php if ( class_exists( 'ACTAVISTA_Resizer' ) ) : ?>
        		 		<?php echo wp_kses_post( $img_obj->ACTAVISTA_resize( wp_get_attachment_url( actavista_set( $gallery, 'gallery_image' ), 'full' ), 170, 170, true ) ); ?>
        		 	<?php endif; ?>
        		</div>
        	<?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if ( $infos ) :  ?>
        <ul class="gall-images-lst">
            <?php foreach( $infos as $info ) : ?>
                <li>
                    <i class="fa fa-check"></i><?php echo wp_kses_post( actavista_set( $info, 'info' )  ); ?>
        		</li>
        	<?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <?php 
 		$enable_button = $button;
 		$btn_link = $help_link;
 		$class = 'theme_btn_flat';
 		$icon = '';
 		if ( $enable_button && $btn_link ) {
 			actavista_template_load( 'templates/shortcodes/button.php', compact( 'enable_button', 'btn_link', 'class', 'icon' ) );
 		}
 	?>
 </div>