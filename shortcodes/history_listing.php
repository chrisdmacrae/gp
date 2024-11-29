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
 $add_histories = json_decode( urldecode( $add_history ) );
  if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
 	$img_obj = new ACTAVISTA_Resizer();
 }
 ?>

 <?php if ( $add_histories ) : ?>
 	<?php $counter = 0; foreach (  $add_histories as $history ) : ?>
 	<?php if ( $counter%2 == 0 ) : ?>
 		<div class="history-block even-way">

 			<div class="row align-items-center">

 				<div class="col-lg-5">

 					<?php actavista_template_load( 'templates/shortcodes/history_content.php', compact( 'history' ) ); ?>

 				</div>

 				<div class="col-lg-7">
					<?php actavista_template_load( 'templates/shortcodes/history_image.php', compact( 'history', 'img_obj' ) ); ?>
 				</div>
 			</div>

 		</div>
 	<?php else : ?>
 		<div class="history-block odd-way">

 			<div class="row align-items-center">

 				<div class="col-lg-7">

 					<?php actavista_template_load( 'templates/shortcodes/history_image.php', compact( 'history', 'img_obj' ) ); ?>

 				</div>

 				<div class="col-lg-5">

 					<?php actavista_template_load( 'templates/shortcodes/history_content.php', compact( 'history' ) ); ?>

 				</div>

 			</div>

 		</div>	
 	<?php endif; ?>

 	<?php $counter++; endforeach; ?>
 <?php endif; ?>