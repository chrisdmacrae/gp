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

<div class="header-banner">
	<div class="bg-image2" style="background-image: url( '<?php echo esc_url( wp_get_attachment_url( $video_image ) ); ?>' )"></div>
	<div class="container">
		<div class="banner-meta">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="title-s">
						<?php if ( $video_url ) : ?>
							<span class="play-btn">
								<a href="<?php echo esc_url( $video_url ); ?>" class="html5lightbox">
									<i class="fa fa-play-circle"></i>
								</a>
							</span>
						<?php endif; ?>
						<div class="title-desc">
							<span><span class="num-people"><?php echo wp_kses_post( $subtitle2 ); ?> </span><?php echo wp_kses_post( $subtitle ); ?></span>
							<h4><?php echo esc_html( $title ); ?></h4>
						</div>	
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<p><?php echo wp_kses_post( $text ); ?></p>
					<?php 
					$enable_button = $button2;
					$btn_link = $help_link2;
					$class = 'main-btn';
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