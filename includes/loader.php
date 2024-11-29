<?php

/**
 * [actavista_theme_autoloader description]
 *
 * @param  [type] $class [description]
 * @return [type]        [description]
 */
function actavista_theme_autoloader( $class ) {

	if ( class_exists( $class ) ) {
		return;
	}

	$class = str_replace('\\', '/', $class);
	$class = strtolower( str_replace(array( 'Actavista/', 'Actavista_Core_Plugin'), '', $class ) );
	$class = strtolower( str_replace( '_', '-', $class ) );

	$filename = get_template_directory() . '/' . $class . '.php';

	if ( file_exists( $filename ) ) {
		require_once $filename;
	}

}

add_filter( 'wishoppingcart-metaboxes-price_settings_types', function( $post_types ) {
	return array_merge( (array) $post_types, ['course'] );
} );

defined( 'ACTAVISTA_NAME' ) or define( 'ACTAVISTA_NAME', 'actavista' );

define( 'ACTAVISTA_ROOT', get_template_directory() . '/' );

require_once get_template_directory() . '/includes/functions/functions.php';
include_once get_template_directory() . '/includes/classes/base.php';
include_once get_template_directory() . '/includes/classes/dotnotation.php';
include_once get_template_directory() . '/includes/classes/header-enqueue.php';
include_once get_template_directory() . '/includes/classes/visual-composer.php';
include_once get_template_directory() . '/includes/classes/bootstrap-walker.php';
include_once get_template_directory() . '/includes/classes/options.php';
include_once get_template_directory() . '/includes/classes/ajax.php';
include_once get_template_directory() . '/includes/classes/common.php';
include_once get_template_directory() . '/includes/classes/post_formats.php';

include_once get_template_directory() . '/includes/library/class-tgm-plugin-activation.php';
include_once get_template_directory() . '/includes/library/widgets/static-block.php';
include_once get_template_directory() . '/includes/library/widgets/product_multi_filter.php';

require_once get_template_directory() . '/includes/library/hook.php';

if(function_exists('WC')){

	if(defined('ACTAVISTA_PLUGIN_PATH')){
		include_once ACTAVISTA_PLUGIN_PATH.'inc/post_types/custom-meta.php';
	}
	include_once get_template_directory() . '/includes/classes/mobile-detect.php';
	include_once get_template_directory() . '/includes/classes/imagify.php';
	include_once get_template_directory() . '/includes/classes/actavista-image-size.php';
	include_once get_template_directory() . '/includes/classes/actavista-products.php';
	include_once get_template_directory() . '/includes/classes/woocommerce-customize.php';
	( new \ACTAVISTA\Includes\Classes\Woocommerce_Customize )->init();
}



add_action( 'after_setup_theme', 'actavista_wp_load', 5 );

function actavista_wp_load() {

	defined( 'ACTAVISTA_URL' ) or define( 'ACTAVISTA_URL', get_template_directory_uri() . '/' );
	define(  'ACTAVISTA_KEY','!@#actavista');
	define(  'ACTAVISTA_URI', get_template_directory_uri() . '/');

	if ( ! defined( 'ACTAVISTA_NONCE' ) ) {
		define( 'ACTAVISTA_NONCE', 'actavista_wp_theme' );
	}

	( new \ACTAVISTA\Includes\Classes\Base )->loadDefaults();
	( new \ACTAVISTA\Includes\Classes\Visual_Composer );
	( new \ACTAVISTA\Includes\Classes\Ajax )->actions();
	 ACTAVISTA_Post_formats_meta::init();

}

if ( function_exists( 'vc_map' ) ) {

	// exit();

	add_action( 'vc_before_init', 'actavista_prefix_vcSetAsTheme' );
	/**
	 * [vcSetAsTheme description]
	 */
	function actavista_prefix_vcSetAsTheme() {
	    vc_set_as_theme( true );

	    $list = array(
		    'page',
		    'static_block',
		    'post',
		    'actavista_service',
		    'header_builder',
		);
		vc_set_default_editor_post_types( $list );
	}

	
}
