<?php
/**
* Social Icons File 
*
* @package Actavista
* @author  Webinane
* @version 1.0
*/
$atts = vc_map_get_attributes( $tag, $atts );
extract( $atts );
$icons = json_decode( urldecode( $add_social_icons ) );
if ( $icons ) : ?>
	<div class="social-bar">
		<div class="row">
			<?php foreach( $icons as $icon ) : ?>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="social-block">
						<a href="<?php echo esc_url( actavista_set( $icon, 'icon_link' ) ); ?>">
							<i style="color:<?php echo esc_attr( actavista_set( $icon, 'icon_color' ) ); ?>" class="<?php echo esc_attr( actavista_set( $icon, 'social_icon' ) ); ?>"></i>
							<span><?php echo esc_html( actavista_set( $icon, 'icon_title' ) ); ?></span>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>