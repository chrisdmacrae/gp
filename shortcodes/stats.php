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


 <div class="row">
 	<?php $counter = 1; foreach ( $stats as $stat ) : ?>
 	<div class="col-lg-4 col-sm-4">
 		<div class="funfacts">
 			<?php if ( 'image_icon' === actavista_set( $stat, 'icon_type' ) ) : ?>

 				<i><?php echo wp_get_attachment_image( actavista_set( $stat, 'iconimage' ), 'full' ); ?></i>

 			<?php elseif(  'icon_icon' === actavista_set( $stat, 'icon_type' ) ) : ?>

 				<i class="<?php echo esc_attr( actavista_set( $stat, 'iconicon' ) ); ?>"></i>

 			<?php else : ?>

 				<i class="<?php echo esc_attr( actavista_set( $stat, 'info_icon2' ) ); ?>"></i> 

 			<?php endif; ?>
 			<div class="funmeta">
 				<span class="counter"><?php echo esc_html( actavista_set( $stat, 'number' ) ); ?></span>
 				<i><?php echo esc_attr( actavista_set( $stat, 'symbol' ) ); ?></i>
 				<p><?php echo esc_attr( actavista_set( $stat, 'title' ) ); ?></p>
 			</div>	
 		</div>
 	</div>
 	<?php $counter++; endforeach; ?>
 </div>

<?php wp_enqueue_script( array( 'waypoints', 'counterup', 'script' ) ); ?>

 <?php endif; ?>