<?php
 /**
 * Social Counts File
 *
 * @package Actavista
 * @author  Webinane
 * @version 1.0
 */
 $atts = vc_map_get_attributes( $tag, $atts );

 extract( $atts );

 if ( function_exists( 'actavista_shortcode' ) && class_exists( 'SC_Class' ) ) {
 	actavista_template_load('templates/shortcodes/sCounts.php');


}