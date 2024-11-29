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
 
 <div class="container wow fadeIn" data-wow-delay="0.2s">
 	
 	<div class="row">
 		<div class="col-lg-12 col-md-12 col-sm-12">
 			<div class="banner-title">
 				<h4><?php echo esc_html( $title1 ); ?> <span> <?php echo esc_html( $title2 ); ?></span> </h4>
 				<p><?php echo wp_kses_post( $text ); ?></p>

 				<?php if ( ! empty ( $button ) ) {

 					$link = ( '||' === $help_link ) ? '' : $help_link;  

 					$link = vc_build_link( $link ); 

 				} ?>

 				<?php if ( ! empty( $link ) ) : ?>


 					<a href="<?php echo esc_url( $link['url'] ); ?>" title="<?php echo esc_attr( $link['title'] ); ?>" class="main-btn"><?php echo esc_html( $link['title'] ); ?></a>
 				<?php endif; ?>
 			</div>
 		</div>
 		
 	</div>

</div>