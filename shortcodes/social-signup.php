<?php
/**
 * Stats File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */
 $atts = vc_map_get_attributes( $tag, $atts );
 extract( $atts );
 ?>
 <div class="row">
 	<div class="col-lg-12">
 		<div class="newsletter-signup">
 			<h2><?php echo wp_kses_post($title); ?></h2>
 			<p><?php echo wp_kses_post($text); ?></p>
 			<div class="newsletter-area">
 				<?php if ( $newsltr_mc_lists2 ) : ?>
 					<?php actavista_template_load( 'templates/shortcodes/social-signup.php',  compact( 'newsltr_mc_lists2') ); ?>
				<?php endif; ?>
				<?php actavista_template_load( 'templates/shortcodes/social-share.php', compact( 'show_facebook', 'facebook_id', 'facebook_link', 'show_twitter', 'twitter_title', 'twitter_id', 'twitter_link', 'facebook_title' )  ); ?>
 			</div>
 		</div>
 	</div>
 </div>