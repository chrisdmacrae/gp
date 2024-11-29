<?php
/**
 * Theme config file.
 *
 * @package Fixkar
 * @author  Webinane
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['actavista_main_header'][] 	= array( 'actavista_main_header_area', 99 );

$config['default']['actavista_sidebar'][] 	    = array( 'actavista_sidebar', 99 );

$config['default']['actavista_banner'][] 	    = array( 'actavista_banner', 99 );


return $config;
