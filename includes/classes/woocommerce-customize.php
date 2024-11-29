<?php

namespace ACTAVISTA\Includes\Classes;

class Woocommerce_Customize {

	public static function init() {
		self::remove();
		self::add();
	}

	/**
	 * remove
	 *
	 * @return void
	 */
	public static function remove() {
		add_filter( 'woocommerce_show_page_title', '__return_null' );
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
	}

	/**
	 * add
	 *
	 * @return void
	 */
	public static function add() {
		add_action( 'woocommerce_before_main_content', array( __CLASS__, 'wrapper_start' ), 10 );
		add_action( 'woocommerce_after_main_content', array( __CLASS__, 'wrapper_end' ), 10 );
	}

	/**
	 * wrapper_start
	 *
	 * @return void
	 */
	public static function wrapper_start() {
		echo '<section>';
		echo '<div class="gap">';
		echo '<div class="container">';
	}

	/**
	 * wrapper_end
	 *
	 * @return void
	 */
	public static function wrapper_end() {
		echo '</div>';
		echo '</div>';
		echo '</section>';
	}
}
