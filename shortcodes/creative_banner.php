<?php

 /**

 * Banner With Button File

 *

 * @package Actavista

 * @author  Webinane

 * @version 1.0

 */

 $atts = vc_map_get_attributes( $tag, $atts );
 extract( $atts );
 ?>
 	<div class="video-banner">
 			<div class="video-bg">		
				<div id="bgndVideo" class="player" data-property="{videoURL:'<?php echo ($video_custom_link); ?>',autoPlay:true, mute:true, startAt:0, opacity:1}"></div>

 				<div class="box-shdw-layer"></div>

			 	<div class="vid-banner-content">

			 		<div class="container">

			 			<div class="row align-items-center">

			 				<div class="col-lg-7 col-md-12">

			 					<div class="banner-txt">

			 						<h2><?php echo wp_kses_post($title); ?></h2>

			 						<p><?php echo wp_kses_post($text); ?></p>
			 						<?php 
			 						$enable_button = $button;
			 						$btn_link = $help_link;
			 						$class = 'theme_btn_flat';
			 						$icon = '';
			 						if ( $enable_button && $btn_link ) {
			 							actavista_template_load( 'templates/shortcodes/button.php', compact( 'enable_button', 'btn_link', 'class', 'icon' ) );
			 						}
			 						?>
			 					</div>

			 				</div>

			 				
			 			</div>

			 		</div>

			 	</div>

 			</div>
 	</div>

 <?php wp_enqueue_script('Youplyer'); ?>
 <?php 
  $custom_script = "jQuery(document).ready(function ($) { 

  	jQuery(function(){
			      jQuery('#bgndVideo').YTPlayer({

			      	showControls: false,
			      	containment: '.video-bg',
			      	loop: true,
			      	showYTLogo: false,
			      	autoPlay: true

			      }


			      	);
			    });

  	  });";
  wp_add_inline_script( 'Youplyer', $custom_script );
  ?>
