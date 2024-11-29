<?php
/**
 * Our Clients2 Shortcode
 *
 * @package WordPress
 * @subpackage Actavista
 * @author Webinane
 * @version 1.0
*/
$atts = vc_map_get_attributes( $tag, $atts );
extract( $atts );
if ( class_exists( 'ACTAVISTA_Resizer' ) ) {
	$img_obj = new ACTAVISTA_Resizer();
} 
$boxes = json_decode( urldecode( $add_box ) );
if ( $boxes ) :  $column = $columns ? $columns : '6'; ?>
	<div class="row no-gutters">
		<?php foreach ( $boxes as $box ) : ?>
			<div class="col-lg-<?php echo esc_attr($column); ?> col-md-<?php echo esc_attr($column); ?> col-sm-6 col-xs-12">	
				<div class="banner-item <?php echo esc_attr( actavista_set( $box, 'image_layer' ) ) ? actavista_set( $box, 'image_layer' ) : 'bluesh'; ?> text-center">
					<div class="banner-item-img" style="background: url('<?php echo wp_get_attachment_url( actavista_set( $box, 'bg_image' ) ); ?>')no-repeat;"></div>
					<div class="banner-item-txt">
						<h3><?php echo wp_kses_post( actavista_set( $box, 'title' ) ); ?></h3>
						<?php 
							$enable_button = actavista_set( $box, 'button' );
							$btn_link = actavista_set( $box, 'help_link' );
							$class = '';
							$icon = 'fa-long-arrow-alt-right';
							if ( $enable_button && $btn_link ) {
								actavista_template_load( 'templates/shortcodes/button.php', compact( 'enable_button', 'btn_link', 'class', 'icon' ) );
							}
						?>

					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>