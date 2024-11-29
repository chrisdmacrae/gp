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
 	<?php foreach( $abouts as $about ) :  ?>
 		<?php $bg_color = (actavista_set( $about, 'box_bg_color' ) && actavista_set( $about, 'section_type' )) ? 'style="background-color: '.esc_attr(actavista_set( $about, 'box_bg_color' )).'"' : ''; ?>
 		<div class="<?php echo esc_attr( $columns ); ?> col-md-6">
 			<div class="campaign-box <?php echo esc_attr( actavista_set( $about, 'section_type' ) ); ?>" style="background-color: <?php echo esc_attr(actavista_set( $about, 'box_bg_color' ));?>">
 				
 				<?php $icon = ( actavista_set( $about, 'icon_type' ) == 'flaticon' ) ? actavista_set( $about, 'info_icon2' ) : actavista_set( $about, 'campaign_icon' ); ?>
				<?php if( actavista_set( $about, 'icon_type' ) == 'image_icon' && actavista_set( $about, 'icon_image' )  ) : ?>
					<i><?php echo wp_get_attachment_image( actavista_set( $about, 'icon_image' ), 'full' ); ?></i>
				<?php else : ?>	
 				<i class="<?php echo esc_attr( $icon ); ?>"></i>
				<?php endif; ?>
 			
 				<?php if ( ! empty ( actavista_set( $about, 'about_title' ) ) ) {
 					$link = ( '||' === actavista_set($about, 'about_title') ) ? '' : actavista_set( $about, 'about_title' );  
 					$link = vc_build_link( $link ); 
 				} ?>
 				
 				<?php if ( ! empty( $link ) ) : ?>
 					<h4><a href="<?php echo esc_url( $link['url'] ); ?>" title="<?php echo esc_attr( $link['title'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a></h4>
 				<?php endif; ?>
 				
 				<p><?php echo wp_kses_post( actavista_set( $about, 'about_subtitle' ) ); ?></p>
 			</div>
 		</div>
 	
 	<?php endforeach; ?>
 </div>

<?php endif; ?>