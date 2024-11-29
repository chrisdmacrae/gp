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
<div class="row">
	<?php foreach( $icons as $icon ) : ?>
		<div class="col-md-3 col-sm-4 col-lg-3">
                <div class="socl-box" style="background-color:<?php echo esc_attr( actavista_set( $icon, 'icon_bgcolor' ) ); ?>;">
                   <a  href="<?php echo esc_url( actavista_set( $icon, 'icon_link' ) ); ?>">
							<i style="color:<?php echo esc_attr( actavista_set( $icon, 'icon_color' ) ); ?>" class="<?php echo esc_attr( actavista_set( $icon, 'social_icon' ) ); ?>"></i>
							<span><?php echo esc_html( actavista_set( $icon, 'icon_title' ) ); ?></span>
						</a>
                </div>
            </div>
     <?php endforeach; ?>	
<?php endif; ?>