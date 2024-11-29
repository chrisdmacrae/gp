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

 $abouts = json_decode( urldecode( $add_about ) );
 
 if ( $abouts ) : ?>

 <div class="row">
 	<?php $counter = 2; foreach ( $abouts  as $about ) : ?>
 	<div class="<?php echo esc_attr( $columns ); ?> col-sm-6 col-6 wow fadeIn" data-wow-delay="0.<?php echo esc_attr( $counter ); ?>s">
 		<div class="our-aim">
 			<i>

 				<?php echo wp_get_attachment_image( actavista_set( $about, 'about_image' ), 'full' ); ?>

 			</i>
 			<h4>

 				<?php 
 				$enable_button = true;
 				$btn_link = actavista_set( $about, 'about_title' );
 				$class = '';
 				$icon = '';
 				if ( $btn_link ) {
 					actavista_template_load( 'templates/shortcodes/button.php', compact( 'enable_button', 'btn_link', 'class', 'icon' ) );
 				}
 				?>
 			</h4>
 			<span><?php echo esc_html( actavista_set( $about, 'about_subtitle' ) ); ?></span>
 		</div>
 	</div>
 	<?php $counter+2; endforeach; ?>		
 </div>
<?php endif; ?>