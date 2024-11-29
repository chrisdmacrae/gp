<?php
 /**
 * Accordions File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );
 $faqs = json_decode( urldecode( $add_faqs ) );
 ?>
  <?php echo esc_html( $main_title ) ? '<h4 class="single-title">'.$main_title.'</h4>' : ''; ?>
 <?php if ( $faqs ) : ?>

 <div class="faq-sec">
 	<ul class="faq-list">
 		<?php $counter = 1; foreach ( $faqs as $faq ) : ?>

 			<li style="width:<?php echo esc_attr( $columns ); ?>">
 				<span><?php echo esc_attr( $counter ); ?></span>
 				<?php echo esc_attr( actavista_set( $faq, 'faq_link' ) ) ? '<a href="'.esc_url( actavista_set( $faq, 'faq_link' ) ).'">' : '<i>'; ?>
 					<?php echo wp_kses_post( actavista_set( $faq, 'title' ) ); ?>
 				<?php echo esc_attr( actavista_set( $faq, 'faq_link' ) ) ? '</a>' : '</i>'; ?>
 			</li>
 		<?php $counter++; endforeach; ?>
 	</ul>
 </div>

<?php endif; ?>