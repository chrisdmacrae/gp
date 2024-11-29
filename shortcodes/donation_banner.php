<?php
 /**
 * Donation Banner File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );

 $contact_desc = json_decode( urldecode( $contact_desc ) );
 
 ?>

 <div class="row">
 	<div class="<?php echo esc_attr( $side_image ) ? 'col-lg-7' : 'col-lg-12'; ?>">
 		<div class="donate-baner wow fadeIn" data-wow-delay="0.1s">
 			<h4><?php echo wp_kses_post( $about_title ); ?></h4>
 			<?php if ( $contact_desc ) : ?>
 				<ul class="address-list">
 					<?php foreach ( $contact_desc as $info ) : ?>
 						<li><i class="fa <?php echo esc_attr( actavista_set( $info, 'contact_icon' ) ); ?>"></i> <span><?php echo esc_html( actavista_set( $info, 'contact_title' ) ); ?> </span></li>
 					<?php endforeach; ?>
 				</ul>
 			<?php endif; ?>


 			<?php if ( ! empty ( $button ) ) {

 				$link1 = ( '||' === $help_link ) ? '' : $help_link;  

 				$link1 = vc_build_link( $link1 ); 

 			} ?>

 			<?php if ( ! empty( $link1 ) ) : ?>

 				<a href="<?php echo esc_url( $link1['url'] ); ?>" title="<?php echo esc_attr( $link1['title'] ); ?>" class="main-btn"><?php echo esc_html( $link1['title'] ); ?></a>
 			<?php endif; ?>
 		

 			<?php if ( ! empty ( $button2 ) ) {

 				$link = ( '||' === $help_link2 ) ? '' : $help_link2;  

 				$link = vc_build_link( $link ); 

 			} ?>

 			<?php if ( ! empty( $link ) ) : ?>
 				<a href="<?php echo esc_url( $link['url'] ); ?>" title="<?php echo esc_attr( $link['title'] ); ?>" class="main-btn"><?php echo esc_html( $link['title'] ); ?></a>
 			<?php endif; ?>
 		</div>
 	</div>
 	<?php if ( $side_image ) : ?>
 		<div class="col-lg-5">
 			<div class="donate-mockup wow slideInRight" data-wow-delay="0.2s">
 				<?php echo wp_get_attachment_image( $side_image, 'full' ); ?>
 			</div>
 		</div>
 	<?php endif; ?>
 </div>


