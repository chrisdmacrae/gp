<?php
/**
 * Banner With Button File
 * @package Actavista
 * @author  Webinane
 * @version 1.0
*/
$atts = vc_map_get_attributes( $tag, $atts );
extract( $atts );
?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="header-banner-innr text-center">
				<h1><?php echo esc_html( $title ); ?></h1>
				<p><?php echo esc_html( $text ); ?></p>
				<?php 
				$enable_button = $button;
				$btn_link = $help_link;
				$class = 'banner-btn';
				$icon = '';
				if ( $enable_button && $btn_link ) {
					actavista_template_load( 'templates/shortcodes/button.php', compact( 'enable_button', 'btn_link', 'class', 'icon' ) );
				}
				?>
			</div>
		</div>
	</div>
</div>