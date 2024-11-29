<?php
/**
 * Donate Banner File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
*/

$atts = vc_map_get_attributes( $tag, $atts );
extract( $atts );
?>
<div class="donate-box <?php echo esc_attr( $image_layer ); ?> more-low-opacity">
	<div class="donate-box-img" style="background: url('<?php echo wp_get_attachment_url( $banner_image ); ?>') no-repeat;"></div>
	<div class="donate-box-inf text-center">
		<h1><?php echo wp_kses_post( $title ); ?></h1>
		<span><?php echo wp_kses_post( $content ); ?></span>
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