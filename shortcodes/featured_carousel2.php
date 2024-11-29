<?php
 /**
 * Featured Carousel style 2 File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */

 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );
 
//printr($r . "," . $g . "," . $b);
 $slides = json_decode( urldecode( $add_slides ) );
 if ( $slides ) : ?>

	 		<div class="campaign-carusel">
	 			<div class="camps-caro owl-carousel">
	 				<?php foreach ( $slides  as $slide ) : list($r, $g, $b) = sscanf(actavista_set( $slide, 'box_bg_color' ), "#%02x%02x%02x"); ?>
	 	
	 	
	 					<div class="camps-info-caro" style="background-color: rgba(<?php echo esc_attr($r . "," . $g . "," . $b."," . '0.9'); ?>)">
	 					    <div class="bg-img" style="background: url('<?php echo wp_get_attachment_url(actavista_set( $slide, 'image' ));?>');"></div>
	 					    <div class="container">
    							<div class="row">
    								<div class="col-lg-6">
    									<div class="camps-desc">
                	 						<span><?php echo esc_html( actavista_set( $slide, 'tagline' ) ); ?></span>
                	 						<h2><?php echo esc_html( actavista_set( $slide, 'title' ) ); ?></h2>
                	 						<p><?php echo wp_kses_post( actavista_set( $slide, 'text' ) ); ?></p>
                	 					</div>
                	 				</div>
                	 			</div>
                	 		</div>
	 					</div>
	 				<?php endforeach; ?>
	 			</div>
	 			<div id="camps-info"></div>
	 		
	 </div>
	<?php wp_enqueue_script( array( 'carousel', 'script' ) ); ?>
<?php endif; ?>