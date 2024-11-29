<?php
/**
 * Video Banner Shortcode
 * @package WordPress
 * @subpackage Actavista
 *
 * @author Webinane
 * @version 1.0
 */

$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts ); ?>

<div class="our-mission-wrap">
   <div class="mission-title">
   		<h2><?php echo esc_html( $title ); ?></h2>
         <p><?php echo esc_html( $subtitle ); ?></p>
   </div>
   <div class="mission-video">
      <?php echo ( wp_get_attachment_image( $video_image, 'full' ) ); ?>
      <?php if ( $video_url ) : ?>
     	 <span class="play-btn">
             <a href="<?php echo esc_url( $video_url ); ?>" class="html5lightbox">
                <i class="fa fa-play"></i>
            </a>
		</span>
	<?php endif; ?>
  </div>
  <?php 
      $enable_button = $button2;
      $btn_link = $help_link2;
      $class = 'theme_btn_flat';
      $icon = '';
      if ( $enable_button && $btn_link ) {
      actavista_template_load( 'templates/shortcodes/button.php', compact( 'enable_button', 'btn_link', 'class', 'icon' ) );
					}
?>
 </div>