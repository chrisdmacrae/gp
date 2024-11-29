<?php

 /**

 * Footer About Widget File

 *

 * @package Actavista

 * @author  Webinane

 * @version 1.0

 */



 $atts = vc_map_get_attributes( $tag, $atts );



 extract( $atts );



 $infos = json_decode( urldecode( $about_info ) );


 ?>



 <div class="widget wow fadeIn" data-wow-delay="0.2s">

 	<div class="getin-touch">

 		<div class="widget-title">
 			<?php echo esc_html( $title ) ? '<h4>' . esc_html( $title ) .'</h4>' : ''; ?>
 		</div>
 		<p><?php echo wp_kses_post( $text ); ?></p>

 		<?php if ( $infos )  : ?>

 			<ul class="contct">

 				<?php foreach ( $infos as $info ) : $icon = ( actavista_set( $info, 'icon_type' ) == 'icon_icon') ? actavista_set( $info, 'iconicon' ) : actavista_set( $info, 'icon' );?>

 					<li>

 						<i class="<?php echo esc_attr($icon); ?>"></i><strong><?php echo actavista_set( $info, 'info_label' ); ?> </strong>

 						<span><?php echo actavista_set( $info, 'info' ); ?></span>

 					</li>

 				<?php endforeach; ?>

 			</ul>

 		<?php endif; ?>

 	</div>

 </div>