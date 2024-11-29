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

 $stats = json_decode( urldecode( $add_stats ) );

 if ( $stats ) : ?>
<div class="new-stats-file">
 <div class="row">

 	<?php $counter = 1; foreach ( $stats as $stat ) :?>

 	<div class="col-lg-3 col-md-6 col-sm-6 col-6">

 		<div class="funfacts-item">
 			<?php $icon = ( actavista_set( $stat, 'icon_type' ) == 'icon_iconflat' ) ? actavista_set( $stat, 'info_icon2' ) : actavista_set( $stat, 'iconicon' ); ?>
 			<?php  if( actavista_set( $stat, 'icon_type' ) == 'image_icon' && actavista_set( $stat, 'iconimage' )  ) : ?>
 				<i><?php echo wp_get_attachment_image( actavista_set( $stat, 'iconimage' ), 'full' ); ?></i>
 			<?php else : ?>	
 				<i class="<?php echo esc_attr( $icon ); ?>"></i>
 			<?php endif; ?>
 			<span class="counter"><?php echo actavista_set( $stat, 'number' ); ?></span>
 			<p><?php echo actavista_set( $stat, 'title' ); ?></p>

 		</div>	

 	</div>
 	<?php $counter++; endforeach; ?>

 </div>



 <?php wp_enqueue_script( array( 'waypoints', 'counterup', 'script' ) ); ?>


</div>
<?php endif; ?>