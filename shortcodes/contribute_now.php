<?php

 /**

 * About Us File

 *

 * @package Actavista

 * @author  Webinane

 * @version 1.0

 */



 $atts = vc_map_get_attributes( $tag, $atts );



 extract( $atts );

 ?>

 <div class="contribute-sec">

 	<div class="row">

 		<?php 

 		if ( $text_position == 'left' ) {

 			

 			actavista_template_load( 'templates/shortcodes/contribute_content.php', compact( 'leader_img', 'title1', 'title2', 'text', 'newsltr_mc_lists2' ) );

 		}

 		?>

 		<?php if ( $leader_img ) : ?>

 			<div class="col-md-6 col-sm-12 col-lg-6">

 				<div class="contribute-mockup wow fadeIn" data-wow-delay="0.2s">



 					<?php echo wp_get_attachment_image( $leader_img, 'full' ); ?>



 				</div>

 			</div>

 		<?php endif; ?>

 		

 		<?php 

 		if ( $text_position == 'right' ) {

 			

 			actavista_template_load( 'templates/shortcodes/contribute_content.php', compact( 'leader_img', 'title1', 'title2', 'text', 'newsltr_mc_lists2' ) );

 		}

 		?>



 	</div>

 </div><!-- Contribute Section -->

 