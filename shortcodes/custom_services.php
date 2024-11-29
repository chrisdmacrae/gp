<?php
 /**
 * Custom Services File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );

 $services = json_decode( urldecode( $add_services ) );
 
 if ( $services ) : ?>

 <div class="row shadows_boxes">
 	<?php foreach ( $services  as $service ) : ?>

 		<?php actavista_template_load( 'templates/shortcodes/custom_services.php', compact( 'service', 'columns' ) ); ?>

 	<?php endforeach; ?>
 </div>

<?php endif; ?>