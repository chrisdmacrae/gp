<?php

namespace ACTAVISTA\Includes\Classes;


/**
 * Common functions
 */
class Common {

	public static $instance;

	function __construct() {

	}

	public static function instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}	

	/**
	 * [data description]
	 *
	 * @param  string $emplate [description]
	 * @return [type]          [description]
	 */
	function data( $template = 'blog' ) {
		$this->template = $template;

		return $this;
	}

	/**
	 * [get description]
	 *
	 * @return [type] [description]
	 */
	function get() {

		$data = (array) $this->blog();

		switch ( $this->template ) {
			
			case 'blog':
			case 'video':
			case 'author':
			case 'search':
			case 'archive':
			case 'tag':
			case '404':
			case 'category':
			case  'video':
			case 'VC':
			case 'events' :
			case 'page':
			return $this->blog( $this->template );
			break;	
			case 'product':
			return $this->product( $this->template );
			break;			
			case 'single':
			case  'videosingle' :
			case 'servicesingle' :
			return $this->single( $this->template );
			break;	
			
			
			default:
				# code...
			break;
		}
	}

	/**
	 * Blog pages banner, sidebar and layout data.
	 *
	 * @param  string $template The tempalte need to return the data for.
	 * @return [type]           [description]
	 */
	function blog( $template = 'blog' ) {

		global $wp_query;
		$options = actavista_WSH()->option();

		if ( ($wp_query->is_posts_page && 'blog' == $template) || $template == 'VC' || $template == 'video' || $template == 'page' || $template == 'events'  ) {   
			$page_id = ($wp_query->is_posts_page) ? $wp_query->queried_object->ID : get_the_ID();

			$return = [

				'layout'	    => actavista_meta( 'page_layout', $page_id ),

				'sidebar'	    => actavista_meta( 'page_sidebar', $page_id),

				'layer'	        => actavista_meta( 'banner_layer', $page_id ),

				'banner'        => actavista_meta( 'banner_image', $page_id ),

				'title'         =>  actavista_meta( 'banner_title', $page_id ),

				'breadcrumb'	=> actavista_meta( 'enable_breadcrumb', $page_id ),

				'enable_banner' => actavista_meta( 'enable_banner', $page_id ),
				
			];
		} else {

			$enable_banner = esc_attr( $template ) . '_page_banner';
			$title         =  esc_attr( $template ) . '_banner_title' ;
			$banner        = esc_attr( $template ) . '_page_background';
			$breadcrumb    = esc_attr( $template ) . '_page_breadcrumb';
			$layout        = esc_attr( $template ) . '_sidebar_layout';
			$layer         = esc_attr( $template ) . '_banner_layer';
			$sidebar       = esc_attr( $template ) . '_page_sidebar';

			$bg = $options->get( $banner );

			$return = [
				'enable_banner' => $options->get( $enable_banner ),
				'breadcrumb'    => $options->get( $breadcrumb ),
				'layer'         => $options->get( $layer ),
				'title'         => $options->get( $title ) ? $options->get( $title ) : actavista_the_title( $template ),
				'banner'        => actavista_set( $bg, 'url' ),
				'sidebar'       => $options->get( $sidebar, 'default-sidebar' ),
				'layout'        => $options->get( $layout, 'right' ),

			];



		}

		$return['cat']              = $options->get( esc_attr( $template )   . '_post_cat' );
		$return['date'] 			= $options->get( esc_attr( $template )   . '_post_date' );
		$return['t_limit_option']   = $options->get( esc_attr( $template )   . '_title_limit_option' ) ? $options->get( esc_attr( $template )   . '_title_limit_option' ) : 'word_limit';
		$return['ch_limit'] 		= $options->get( esc_attr( $template )   . '_title_limit' ) ? $options->get( esc_attr( $template )   . '_title_limit' ) : 20;
		$return['word_limit'] 		= $options->get( esc_attr( $template )   . '_title_limit2' ) ? $options->get( esc_attr( $template )   . '_title_limit2' ) : 20;
		$return['c_limit_option']   = $options->get( esc_attr( $template )   . '_content_limit_option' ) ? $options->get( esc_attr( $template )   . '_content_limit_option' ) : 'word_limit';
		$return['c_ch_limit'] 		= $options->get( esc_attr( $template ) . '_content_limit' ) ? $options->get( esc_attr( $template ) . '_content_limit' ) : 20;
		$return['c_word_limit']     = $options->get( esc_attr( $template ) . '_content_limit2' ) ? $options->get( esc_attr( $template )   . '_content_limit2' ) : 20;
		$return['author'] 			= $options->get( esc_attr( $template )   . '_post_author' );
		$return['button'] 	        = $options->get( esc_attr( $template )   . '_post_button' );
		$return['label'] 	        = $options->get( esc_attr( $template )   . '_button_label' );

		return new DotNotation( $return );
	}




	/**
	 * Post detail and custom post types datail meta.
	 *
	 * @param  string $template The template for which data is need to be returned.
	 * @return [type]           [description]
	 */
	


	public function single( $template = 'single' ) {

		global $wp_query;

		$options = actavista_WSH()->option();

		$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();

		if (  $page_id  ) {

			$return = [

				'sidebar'       => actavista_meta( 'page_sidebar', $page_id ),

				'layout'        => actavista_meta( 'page_layout',  $page_id ),

				'layer'	        => actavista_meta( 'banner_layer', $page_id ),

				'banner'        => actavista_meta( 'banner_image', $page_id),

				'title'         => actavista_meta( 'banner_title', $page_id ) ? actavista_meta( 'banner_title', $page_id ) : esc_html__('Detail Page', 'actavista'),

				'breadcrumb'    => actavista_meta( 'enable_breadcrumb', $page_id ),

				'enable_banner' =>  actavista_meta( 'enable_banner', $page_id ),
			];


		} else {
			$return = [

				'sidebar'       => actavista_meta( 'page_sidebar', $page_id ),

				'layout'        => actavista_meta( 'page_layout',  $page_id ),


				'layer'	        => $options->get($template.'_banner_layer'),

				'banner'        => actavista_set( $options->get($template.'_page_background'), 'url' ),

				'title'         => $options->get($template.'_banner_title'),

				'breadcrumb'    => $options->get( $template.'_page_breadcrumb'),

				'enable_banner' =>  $options->get( $template.'_page_banner' ),
			];
		}
		$return['views']         = $options->get( esc_attr( $template ).'_post_views' );
		$return['likes']         = $options->get( esc_attr( $template ).'_post_likes' );
		$return['date']          = $options->get( esc_attr( $template ).'_post_date' );
		$return['author']        = $options->get( esc_attr( $template ).'_post_author' );
		$return['cat']           = $options->get( esc_attr( $template ).'_post_cat' );
		$return['tag']           = $options->get( esc_attr( $template ).'_post_tag' );
		$return['next_prev']     = $options->get( esc_attr( $template ).'_post_next_prev' );
		$return['next_prev_itm'] = $options->get( esc_attr( $template ).'_caro_item' );
		$return['n_p_title']     = $options->get( esc_attr( $template ).'_caro_item_title_limit' );
		$return['n_p_cat']       = $options->get( esc_attr( $template ).'_post_next_prev_cat' );
		$return['author_box']    = $options->get( esc_attr( $template ).'_author_box' );
		$return['related_post']  = $options->get( esc_attr( $template ).'_related_post' );
		$return['related_title'] = $options->get( esc_attr( $template ).'_related_title' );
		$return['related_num']   = $options->get( esc_attr( $template ).'_related_num' );
		$return['r_title']       = $options->get( esc_attr( $template ).'_related_title_limit' );
		$return['social_share']  = $options->get( esc_attr( $template ).'_post_social_share' );
		$return['enable_share']  = $options->get( esc_attr( $template ).'_single_sharing' );
		return new DotNotation( $return );


	}

	public function product( $template = 'product' ) {

		global $wp_query;

		$page_id = actavista_page_query();

		$return = [

			'sidebar'       => actavista_meta( 'page_sidebar', $page_id ),

			'layout'        => actavista_meta( 'page_layout',  $page_id ),

			'layer'	        => actavista_meta( 'banner_layer', $page_id ),

			'banner'        => actavista_meta( 'banner_image', $page_id),

			'title'         => actavista_meta( 'banner_title', $page_id ) ? actavista_meta( 'banner_title', $page_id ) : esc_html__('Detail Page', 'actavista'),

			'breadcrumb'    => actavista_meta( 'enable_breadcrumb', $page_id ),

			'enable_banner' =>  actavista_meta( 'enable_banner', $page_id ),
		];
		return new DotNotation( $return );


	}
}

