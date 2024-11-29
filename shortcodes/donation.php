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

 ?>

 <div class="row">

 	<div class="col-lg-8">

 		<div class="donation-form-area">

 			<h4><?php echo esc_html( $title ); ?></h4>

 			<p>

 				<?php echo esc_html( $text ); ?>

 			</p>

 			<?php echo do_shortcode('[give_form id="'.$donation_form.'"]'); ?> 

 			<?php if ( $show_bottom_faqs ) : ?>

 				<div class="complete-proces">

 					<span><?php echo wp_kses_post( $faqs_title ); ?></span>

 					<p><?php echo wp_kses_post( $faqs_text ); ?></p>

 				</div>

 			<?php endif; ?>

 		</div>

 	</div>

 	<?php if ( $enable_right_box ) : ?>

 		<div class="col-lg-4">

 			<aside class="sidebar">

 				<div class="widget">

 					<div class="widget-title">

 						<h4><?php echo wp_kses_post( $right_title ); ?></h4>

 					</div>

 					<div class="gift-widget">

 						<p>

 							<?php echo wp_kses_post( $right_text ); ?>

 						</p>

 						<div class="email-address">

 							<span><i class="fa fa-envelope-o"></i><?php echo wp_kses_post( $right_title2 ); ?></span>

 							<p><?php echo wp_kses_post( $right_text2 ); ?></p>

 						</div>

 					</div>

 				</div>

 			</aside>

 		</div>

 	<?php endif; ?>

 </div>