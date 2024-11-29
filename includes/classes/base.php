<?php

namespace ACTAVISTA\Includes\Classes;

use ACTAVISTA\Includes\Classes\Header_Enqueue;
use ACTAVISTA\Includes\Classes\Options;

/**
 * Header and Enqueue class
 */
class Base {

	public static $instance;

	/**
	 * Set this value for theme options key
	 *
	 * @var string
	 */
	private $option_key = ACTAVISTA_NAME;

	function __construct() {
		// $this->loadDefaults();
	}

	public function loadDefaults() {
		
		$this->protocol = ( is_ssl() ) ? 'https' : 'http';

		Header_Enqueue::init();

		new Options;
	}
	
	public static function instance() {

		if ( isset( $GLOBALS['actavista_base'] ) ) {
			return $GLOBALS['actavista_base'];
		}

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		$GLOBALS['actavista_base'] = self::$instance;

		return self::$instance;
	}	

	/**
	 * Return the theme options.
	 *
	 * @param  string $key [description]
	 * @return [type]      [description]
	 */
	function option( $key = '' ) {

		$options = (array) get_theme_mod( ACTAVISTA_NAME . '_options-mods' );

		$dn = actavista_dot( $options );

		if ( $key ) {
			return $dn->get( $key );
		}

		return $dn;
	}


	/**
	 * [config description]
	 *
	 * @param  string $name [description].
	 * @return array       [description]
	 */
	function config( $name = '' ) {

		$config = include get_template_directory() . '/includes/config.php';

		$dn = new DotNotation( $config );
		$found = $dn->get( $name );

		if ( $found ) {
			return $found;
		}

		return $config;
	}

		/**
	 * [get_meta description]
	 *
	 * @param  string $key [description].
	 * @param  string $id  [description].
	 * @return [type]      [description]
	 */
	function get_meta( $key = '', $id = '' ) {
		global $post, $post_type;

		if ( ! $post_type ) {
			return;
		}

		$id = ( $id ) ? $id : actavista_set( $post, 'ID' );

		$key = ( $key ) ? $key : '_sh_'.$post_type.'_settings';

		$meta = get_post_meta( $id, $key, true );

		return ( $meta ) ? $meta : false;
	}
}
