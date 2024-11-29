<?php
 /**
 * Gallery Style 1 File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );

 $galleries = json_decode( urldecode( $add_info ) );
if ( $galleries ) :
 ?>

 <div class="faq-page">
 	<ul class="news-carousel">
 		<?php foreach ( $galleries as $gallery ) : ?>
 			<li>
 				<figure>
 					<?php echo wp_get_attachment_image( actavista_set( $gallery, 'image' ), 'full' ); ?>
 					<div class="info-box">
 						<h5><span><?php echo esc_html( actavista_set( $gallery, 'title1' ) ); ?> </span><?php echo esc_html( actavista_set( $gallery, 'title' ) ); ?></h5>
 						<p><?php echo wp_kses_post( actavista_set( $gallery, 'text' ) ); ?></p>
 						<span><?php echo esc_html( actavista_set( $gallery, 'name' ) ); ?></span>

 						<?php 
 						$enable_button = actavista_set( $gallery, 'button' );
 						$btn_link = actavista_set( $gallery, 'help_link');
 						$class = '';
 						$icon = '';
 						if ( $enable_button && $btn_link ) {
 							actavista_template_load( 'templates/shortcodes/button.php', compact( 'enable_button', 'btn_link', 'class', 'icon' ) );
 						}
 						?>
 					</div>
 				</figure>
 			</li>
 		<?php endforeach; ?>
 	</ul>
 </div>
 <?php wp_enqueue_script( array( 'carousel', 'script' ) ); ?>
<?php endif; ?>