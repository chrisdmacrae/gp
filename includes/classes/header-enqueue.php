<?php

namespace Actavista\Includes\Classes;
/**
 * Header and Enqueue class
 */
class Header_Enqueue {
	public static function init() {
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue' ) );
		add_filter( 'wp_resource_hints', array( __CLASS__, 'resource_hints' ), 10, 2 );
	}

	/**
	 * Gets the arrays from method scripts and styles and process them to load.
	 * Styles are being loaded by default while scripts only enqueue and can be loaded where required.
	 *
	 * @return void This function returns nothing.
	 */
	public static function enqueue() {

		self::scripts();

		self::styles();

	}

	/**
	 * The major scripts loader to load all the scripts of the theme. Developer can hookup own scripts.
	 * All the scripts are being load in footer.
	 * 
	 * @return array Returns the array of scripts to load
	 * 
	 */
	public static function scripts() {
		$options = get_theme_mod( ACTAVISTA_NAME . '_options-mods' );

		$map_api = actavista_set( $options , 'map_api_key' );
		$ssl = is_ssl() ? 'https' : 'http';

		$scripts = array(
			'proper-bootstrap'   => 'assets/js/popperjs-bootstrap.js',
			'bootstrap'          => 'assets/js/bootstrap.min.js', 
			'carousel'           => 'assets/js/owl.carousel.min.js',
			'isotopee'           => 'assets/js/isotope.min.js', 
			'isotope-init'       => 'assets/js/isotope-init.js', 
			'images-loaded'      => 'assets/js/imagesloaded.pkgd.min.js', 
			'downCount'          => 'assets/js/jquery.downCount.js', 
			'counterup'          => 'assets/js/jquery.counterup.min.js',
			'customCounter'      => 'assets/js/custom-counter.js',
			'scrollbar'          => 'assets/js/perfect-scrollbar.jquery.min.js',
			'slick'              => 'assets/js/slick.min.js',
			'html5lightbox'      => 'assets/js/html5lightbox.js',
			'waypoints'          => 'assets/js/waypoints.js',
			'wow'                => 'assets/js/wow.min.js',
			'login'              => 'assets/js/login.js',
			'chosen'             => 'assets/js/chosen.jquery.js',
			'scrolltopcontrol'   => 'assets/js/scrolltopcontrol.js',
			'format-post'        => 'assets/js/format_script.js',
			'gallery'            => 'assets/js/gallery.js',			
			'map-init'           => 'assets/js/map-init.js',
			'plyer'              => 'assets/js/plyr.min.js',
			'Youplyer'           => 'assets/js/jquery.mb.YTPlayer.min.js',
			'sweetalert2'        => 'assets/sweetalert2/dist/sweetalert2.min.js',
			'select2'            => 'assets/js/select2.min.js',
			'twitter_tweets'     => 'assets/js/twitter_tweets.js',
			'js-tweets'          => 'assets/js/tweets.js',
			'actavista-stickit'  => 'assets/js/jquery.stickit.min.js',
			'like'               => 'assets/js/like.js',
			'touchspin'          => 'assets/js/touchspin.js',
			'actavista-scrol'    => 'assets/js/jquery.mCustomScrollbar.min.js',
			'script'             => 'assets/js/script.js',
			'google-api'         => $ssl.'://maps.googleapis.com/maps/api/js?key='.$map_api,

		);

		$scripts = apply_filters( 'Actavista/includes/classes/header_enqueue/scripts', $scripts );
		/**
	     * Enqueue the scripts
	     * @var array
	     */
		foreach ( $scripts as $name => $js ) {

			if ( strstr( $js, 'http' ) || strstr( $js, 'https' ) || strstr( $js, 'googleapis.com' ) ) {

				wp_register_script( $name, $js, '', '', true );
			} else {
				wp_register_script( $name, get_template_directory_uri() .'/'. $js, '', '', true );
			}
		}

		wp_enqueue_script( array( 'jquery', 'proper-bootstrap', 'bootstrap', 'isotope','html5lightbox', 'wow', 'select2', 'scrollbar', 'scrolltopcontrol' ) );


		$header_data = array( 'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ), 'nonce' => wp_create_nonce( ACTAVISTA_NONCE ) );

		$ajax = 'var actavista_data = '.wp_json_encode( $header_data ).';';

		wp_add_inline_script( 'bootstrap', $ajax );

		if ( actavista_set($options,'footer_js')) {
			
			wp_add_inline_script('bootstrap', actavista_set($options,'footer_js'));
		}

	}

	/**
	 * The major styles loader to load all the styles of the theme. Developer can hookup own styles.
	 * All the styles are being load in head.
	 * 
	 * @return array Returns the array of styles to load
	 */
	public static function styles() {

		$styles = array(

			'google-fonts' =>  self::fonts_url(),
		    'bootstrap'    => 'assets/css/bootstrap.min.css',
		    'animate'      => 'assets/css/animate.min.css',
		    'chosen'       => 'assets/css/chosen.css',
		    'actavista-fontawesome'  => 'assets/css/all.min.css',
		    'lightbox'     => 'assets/css/html5-lightbox.css',   
			'carousel'     => 'assets/css/owl.carousel.css',
			'slick'        => 'assets/css/slick.css',
			'sweetalert2'  => 'assets/sweetalert2/dist/sweetalert2.min.css',
			'scrollbar'    => 'assets/css/perfect-scrollbar.min.css',
			'flaticon'     => 'assets/css/flaticon.css',
			'playerY'     => 'assets/css/plyr.css',
			'YTplayer'     => 'assets/css/jquery.mb.YTPlayer.min.css',
			'actavista-scrol' => 'assets/css/jquery.mCustomScrollbar.min.css',
			'style-ico'   => 'assets/css/style-ico.css',
			'style-main'   => 'assets/css/style.css',
			'root-style'   => 'style.css',
			'responsive'   => 'assets/css/responsive.css',
		);

		$styles = apply_filters( 'Actavista/includes/classes/header_enqueue/styles', $styles );
		if ( is_rtl() ) {
          
            $styles['Esperto_rtl'] =  'assets/css/rtl.css';
        }
		/**
		 * Enqueue the styles
		 * @var array
		 */
		foreach ( $styles as $name => $style ) {

			if ( strstr( $style, 'http' ) || strstr( $style, 'https' ) || strstr( $style, 'fonts.googleapis' ) ) {
				wp_enqueue_style( $name, $style );
			} else {
				wp_enqueue_style( $name, get_template_directory_uri() . '/'. $style );
			}
		}
		$options = actavista_WSH()->option();
		$custom_style = '';
		$custom_style .= actavista_boxed_layout();
		if ( $options->get( 'theme_color_scheme' ) && '#e5191d' != $options->get( 'theme_color_scheme' ) ) {
		  
			$color_content = wp_remote_get( get_template_directory_uri() . '/assets/css/color.css' );
			$replace = str_replace( '#e5191d', $options->get( 'theme_color_scheme' ), actavista_set( $color_content, 'body' ) );
			$custom_style .= $replace;
		} else {
		    
		    wp_enqueue_style( 'color', get_template_directory_uri() . '/assets/css/color.css' );
		    
		}
		if ( $options->get( 'theme_color_scheme2' ) && '#4f9fed' != $options->get( 'theme_color_scheme2' ) ) {
	
			$color_content = wp_remote_get( get_template_directory_uri() . '/assets/css/color-2.css' );
			$replace = str_replace( '#4f9fed', $options->get( 'theme_color_scheme2' ), actavista_set( $color_content, 'body' ) );
			$custom_style .= $replace;
			
		} else {
		    
		    wp_enqueue_style( 'color2', get_template_directory_uri() . '/assets/css/color-2.css' );
		    
		}

		if ( $options->get( 'header_code' ) ) {
			$custom_style .= $options->get( 'header_code' );
		}
		wp_add_inline_style( 'style-main', $custom_style );

		$header_styles = self::header_styles();

		wp_add_inline_style( 'style', $header_styles );

	}

	/**
	 * Register custom fonts.
	 */
	public static function fonts_url() {
		$fonts_url = '';

		$font_families['Poppins'] 	    	= 'Poppins:300,400,500,600,700,800';
		$font_families['Lato'] 	    = 'Lato:400,400i,700';
		$font_families = apply_filters( 'Actavista/includes/classes/header_enqueue/font_families', $font_families );
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$protocol = is_ssl() ? 'https' : 'http';
		$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

		return esc_url_raw( $fonts_url );
	}


	/**
	 * Add preconnect for Google Fonts.
	 *
	 * @since Fixkar 1.0
	 *
	 * @param array  $urls           URLs to print for resource hints.
	 * @param string $relation_type  The relation type the URLs are printed.
	 * @return array $urls           URLs to print for resource hints.
	 */
	public static function resource_hints( $urls, $relation_type ) {
		if ( wp_style_is( 'actavista-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
			$urls[] = array(
				'href' => 'https://fonts.gstatic.com',
				'crossorigin',
			);
		}

		return $urls;
	}

	/**
	 * header_styles
	 *
	 * @since Fixkar 1.0
	 *
	 * @param array  $urls           URLs to print for resource hints.
	 * 
	 * 
	 */
	public static function header_styles() {

		$data = \ACTAVISTA\Includes\Classes\Common::instance()->data('blog')->get();

		$options = actavista_WSH()->option(); 

		$styles = '';
		if ( $options->get( 'footer_top_button' ) ) :
			$styles .= "#topcontrol {
				background: " . $options->get( 'button_bg' ) . " none repeat scroll 0 0 !important;
				opacity: 0.5;

				color: " . $options->get( 'button_color' ) ." !important;

			}";

		endif;

		if ( $options->get( 'footer_top_button' ) ) :
			$styles .= "#topcontrol {
				background: " . $options->get( 'button_bg' ) . " none repeat scroll 0 0 !important;
				opacity: 0.5;

				color: " . $options->get( 'button_color' ) ." !important;

			}";

		endif; 
		/*if ( $options->get( 'header2_menu_bg_color_submenu' ) ) :
			$styles .= ".main-menu > ul > li ul, .main-menu > div > ul > li ul, .menus-bar nav > ul > li ul {
				background: red none repeat scroll 0 0;

			}";

		endif;*/

		$settings = get_theme_mod( ACTAVISTA_NAME . '_options-mods'); 

		if ( $custom_font = $options->get( 'theme_custom_font') ){

			$styles .= actavista_redux_custom_fonts_load( $custom_font );
		
		}
		return $styles;
	}




}