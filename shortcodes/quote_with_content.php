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


<div class="row">
	<div class="col-md-7 col-sm-12 col-lg-7">
		<div class="quote-wrap">
			 <?php echo ( wp_get_attachment_image( $video_image, 'full' ) ); ?>
			<div class="quote-inner" style="background-image: url('https://themes.webinane.com/wp/actavista/wp-content/uploads/2019/11/memphis-mini.png')">
				<i class="fa fa-quote-left"></i>
				<p><?php echo esc_html( $quote ); ?></p>
				<h6><?php echo esc_html( $author ); ?></h6>
			</div>
		</div>
	</div>
	<div class="col-md-5 col-sm-12 col-lg-5">
		<div class="abt-wrap">
			<h2><?php echo esc_html( $title ); ?></h2>
			<p><?php echo esc_html( $subtitle ); ?></p>
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
	</div>
</div>