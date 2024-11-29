<?php

/**
 * Hookup all the tags here.
 *
 * @package Actavista
 * @author Shahbaz Ahmed <shahbazahmed9@hotmail.com>
 * @version 1.0
 */


call_user_func( 'actavista_load_default_hooks' );

/**
 * Load the default config
 */
function actavista_load_default_hooks() {

	$config = actavista_WSH()->config( 'default' );

	if ( is_array( $config ) ) {

		foreach ( $config as $key => $more ) {

			foreach( $more as $k => $value ) {
				$func = is_array( $value ) ? $value[0] : $value;

				$priority = isset( $value[1] ) ? $value[1] : 99;
				$params = isset( $value[2] ) ? $value[2] : 2;

				add_action( $key, $func, $priority, $params );
			}
		}
	}
}


/**
 * [actavista_main_header_area description]
 *
 * @return [type] [description]
 */


function actavista_main_header_area() {
	$options = actavista_WSH()->option();

	global $wp_query;

	$page_id = ($wp_query->is_posts_page) ? $wp_query->queried_object->ID : get_the_ID();

	$header_enable = get_post_meta( $page_id, 'meta_header_setting', true );
	$meta_header = get_post_meta( $page_id, 'header_style', true );
		
	if ( $page_id && $header_enable && $meta_header ) {
		
		$header_style = $meta_header;

	} else {

		$header_style = $options->get( 'custom_header' );

	}
   // printr($header_style);

	$header_style = ( $header_style ) ? $header_style : 'header_3';
	
	get_template_part( 'templates/header/'.$header_style.'/'.$header_style );

	
}
/**
 * [actavista_sidebar description]
 *
 * @return [type] [description]
 */

function actavista_sidebar( $position, $data ) {

	if ( $position === $data->get('layout') ) {

		actavista_template_load( 'templates/sidebar.php', compact( 'data' ) );

	}
}

/**
 * [actavista_banner description]
 *
 * @return [type] [description]
 */

function actavista_banner($data) {

	actavista_template_load( 'templates/banner/banner.php', compact( 'data' ) );

}