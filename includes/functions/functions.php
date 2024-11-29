<?php

/**
 * [actavista_WSH description]
 *
 * @return [type] [description]
 */
function actavista_WSH() {

	return \ACTAVISTA\Includes\Classes\Base::instance();
}

/**
 * [actavista_dot description]
 *
 * @param  array  $data [description]
 * @return [type]       [description]
 */
function actavista_dot( $data = array() ) {

	$dn = new \ACTAVISTA\Includes\Classes\DotNotation( $data );

	return $dn;
}

/**pl

 * [actavista_meta description].

 *

 * @param array $data [description]

 *

 * @return [type] [description]

 */

function actavista_meta( $key, $id = '' ) {
	if ( empty( $id ) ) {
		$id = get_the_ID();
	}

	return ( get_post_meta( $id, $key, TRUE ) ) ? get_post_meta( $id, $key, TRUE ) : '';
}
function actavista_app( $class = 'base', $instance = true ) {
	$all = array(
		'base'		=> '\ACTAVISTA\Includes\Classes\Base',
		'vc'		=> '\ACTAVISTA\Includes\Classes\Visual_Composer',
		'ajax'		=> '\ACTAVISTA\Includes\Classes\Ajax',
	);

	$dn = actavista_dot( $all );

	$class = ( $dn->get( $class ) ) ? $dn->get( $class ) : 'base';

	if ( $dn->get( $class ) ) {

		if ( $instance ) {
			return new $dn->get( $class );
		} else {
			return $dn->get( $classs );
		}
	} else {
		exit( esc_html__( 'No class found', 'actavista' ) );
	}
}


/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Fixkar 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function actavista_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'actavista_front_page_template' );


if ( ! function_exists( 'printr' ) ) {

	function printr( $arr ) {

		echo '<pre>';
		print_r( $arr );
		echo '</pre>';
		exit;
	}
}
add_filter( 'comment_form_fields', 'move_comment_field' );
function move_comment_field( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
/**
 * [actavista_template description]
 *
 * @param  string $template_names     [description].
 * @param  boolean $load [description].
 * @param  boolean $require_once      [description].
 * @return [type]           [description]
 */
function actavista_template( $template_names, $load = false, $require_once = true ) {
	$located = '';
	foreach ( (array) $template_names as $template_name ) {
		if ( ! $template_name ) {
			continue;
		}
		if ( file_exists( get_stylesheet_directory() . '/' . $template_name ) ) {
			$located = get_stylesheet_directory() . '/' . $template_name;
			break;
		} elseif ( file_exists( get_template_directory() . '/' . $template_name ) ) {
			$located = get_template_directory() . '/' . $template_name;
			break;
		} elseif ( file_exists( ABSPATH . WPINC . '/theme-compat/' . $template_name ) ) {
			$located = ABSPATH . WPINC . '/theme-compat/' . $template_name;
			break;
		}
	}

	if ( $load && '' != $located ) {
		load_template( $located, $require_once );
	}

	return $located;
}

/**
 * [actavista_template_load description]
 *
 * @param  string $template [description]
 * @param  array  $args     [description]
 * @return [type]           [description]
 */
function actavista_template_load( $templ = '', $args = array() ) {

	$template = actavista_template( $templ );

	if ( file_exists( $template ) ) {
		extract( $args );
		unset( $args );

		include $template;
	}
}


/**
 * [actavista_get_sidebars description]
 *
 * @param  boolean $multi [description].
 * @return [type]         [description]
 */
if (! function_exists( 'actavista_get_sidebars' ) ) {
	function actavista_get_sidebars( $multi = false ) {
		global $wp_registered_sidebars;

		$sidebars = ! ( $wp_registered_sidebars ) ? get_option( 'wp_registered_sidebars' ) : $wp_registered_sidebars;
		if ( $multi ) {
			$data[] = array( 'value' => '', 'label' => '' );
		}

		foreach ( (array) $sidebars as $sidebar ) {

			if ( $multi ) {

				$data[] = array( 'value' => actavista_set( $sidebar, 'id' ), 'label' => actavista_set( $sidebar, 'name' ) );

			} else {

				$data[ actavista_set( $sidebar, 'id' ) ] = actavista_set( $sidebar, 'name' );

			}
		}

		return $data;
	}
}
/**
 * Suggester for autocomplete by id/name/title/sku
 * @since 4.4
 *
 * @param $query
 *
 * @return array - id's from products with title/sku.
 */
function actavista_postCatAutocompleteSuggester( $query, $tag, $param ) {
	global $wpdb;
	
	$vc_data = WPBMap::getParam($tag, $param);
	$dn = new ACTAVISTA\Includes\Classes\DotNotation( $vc_data );
	$post_type = ( $dn->get('query_args.post_type' ) ) ? $dn->get('query_args.post_type' ) : 'post';

	$post_meta_infos = get_posts( array( 'post_type' => $post_type, 's' => $query ) );

	$results = array();
	if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
		foreach ( $post_meta_infos as $value ) {
			$data = array();
			$data['value'] = $value->ID;
			$data['label'] = esc_html__( 'Id', 'actavista' ) . ': ' . $value->ID . ( ( strlen( $value->post_title ) > 0 ) ? ' - ' . esc_html__( 'Title', 'actavista' ) . ': ' . $value->post_title : '' );
			$results[] = $data;
		}
	}

	return $results;
}

/** 
 * Suggester for autocomplete by id/name/title/sku 
 * @since 4.4 
 * @param $query
 * @param  [type] $tag   [description]
 * @param  [type] $param [description]
 * @return array - id's from products with title/sku.
 */
function actavista_TaxonomyAutocompleteSuggester( $query, $tag, $param ) { 
	global $wpdb;  $vc_data = WPBMap::getParam($tag, $param); 
	$dn = new ACTAVISTA\Includes\Classes\DotNotation( $vc_data ); 
	$post_type = ( $dn->get('query_args.taxonomy' ) ) ? $dn->get('query_args.taxonomy' ) : 'category'; 
	$post_meta_infos = get_terms( array( 'taxonomy' => $post_type, 
		'search' => $query, 'hide_empty' => false ) ); 
	$results = array();
	if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
		foreach ( $post_meta_infos as $value ) {  
			$data = array();   

			$data['value'] = $value->slug; 
			$data['label'] = esc_html__( 'Slug', 'actavista' ) . ': ' . $value->slug . ( ( strlen( $value->name ) > 0 ) ? ' - ' . esc_html__( 'Title', 'actavista' ) . ': ' . $value->name : '' );  
			$results[] = $data;  
		} } 
		return $results;
	}
/**
 * [actavista_get_posts_array description]
 *
 * @param  string $title [description]
 * @param  array  $span     [description]
 */
function actavista_get_posts_array($post_type) {
	$result = array();
	$args = array(
		'post_type' => $post_type,
		'post_status' => 'publish',
		'posts_per_page' => -1,
	);
	$posts = get_posts($args);

	if ($posts) {
		foreach ($posts as $post) {
			$result[] = array('value' => $post->ID, 'label' => $post->post_title);
		}
	}
	return $result;
}

add_action( 'tgmpa_register', 'actavista_register_required_plugins' );

/**
 * [my_theme_register_required_plugins description]
 *
 * @return void [description]
 */
function actavista_register_required_plugins() {

	$plugins = array(

		array(
			'name'               => esc_html__( 'Actavista Theme Support', 'actavista' ),
			'slug'               => 'actavista',
			'source'                => 'https://webinane-themes-plugins.s3.amazonaws.com/actavista/actavista.zip',
			'required'           => true,
			// 'version'            => '1.6',
			'force_deactivation' => false,
			'file_path'          => ABSPATH . 'wp-content/plugins/actavista/actavista.php',
		),

		 array(
            'name'               => esc_html__( 'Lifeline Donation Pro', 'actavista' ),
            'slug'               => 'lifeline-donation-pro',
            'source'			 => 'https://webinane-themes-plugins.s3.amazonaws.com/lifeline-donation-pro.zip',
            'required'           => true,
            'force_deactivation' => false,
			'file_path'          => ABSPATH . 'wp-content/plugins/actavista/actavista.php',
        ),
	
		
		array(
			'name' => esc_html__( 'Visual Composer', 'actavista' ),
			'slug' => 'js_composer',
			'source' => 'https://webinane-themes-plugins.s3.amazonaws.com/js_composer.zip',
			'required' => true,
			// 'version' => '5.4.7',
			// 'force_activation' => false,
			'force_deactivation' => false,
			// 'external_url' => 'http://wpbakery.com/',
			'file_path' => ABSPATH . 'wp-content/plugins/js_composer/js_composer.php',
		),

		array(
			'name' => esc_html__( 'Revolution Slider', 'actavista' ),
			'slug' => 'revslider',
			'source'  => 'https://webinane-themes-plugins.s3.amazonaws.com/revslider.zip',
			'required' => true,
			// 'version' => '5.4.6.2',
			// 'force_activation' => false,
			'force_deactivation' => false,
			// 'external_url' => 'http://revolution.themepunch.com/',
			'file_path' => ABSPATH . 'wp-content/plugins/revslider/revslider.php'
		),

		array(
			'name' => esc_html__( 'MailChimp for WordPress', 'actavista' ),
			'slug' => 'mailchimp-for-wp',
		),		
		array(
			'name'     => esc_html__('Contact Form 7', 'actavista' ),
			'slug'     => 'contact-form-7',
			'required' => true,
		),
		array(
			'name'     => esc_html__('Wired Impact Volunteer Management', 'actavista' ),
			'slug'     => 'wired-impact-volunteer-management',
			'required' => true,
		),
		array(
			'name'             => esc_html__( 'Envato Market', 'actavista' ),
			'slug'             => 'envato-market',
			'source'           => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
			'required'         => false,
			'recommended'      => true,
			'force_activation' => false,
		),
		array(
			'name'     => 'WooCommerce',
			'slug'     => 'woocommerce',
			'required' => true,
		),
		array(
			'name'     => 'WooCommerce Variation Swatches',
			'slug'     => 'variation-swatches-for-woocommerce',
			'required' => true,
		),
		array(
			'name'             => esc_html__('WP Classic Editor for Old Post Editor', 'esperto'),
			'slug'             => 'classic-editor',
			'required'         => true,
			'force_activation' => false,    

		),
		array(
				'name'               => esc_html__( 'Webinane Redux', 'lifeline2' ),
				'slug'               => 'webinane-redux',
				'source'             => 'https://webinane-themes-plugins.s3.amazonaws.com/lifeline2/webinane-redux-v4.1.23.zip',
				'required'           => true,
				'force_deactivation' => false,
				// 'version'            => '4.1.23',
				// 'file_path'          => ABSPATH . 'wp-content/plugins/webinane-redux/redux-framework.php',
			),
		array(
			'name'     => esc_html__('One Click Demo Import', 'actavista' ),
			'slug'     => 'one-click-demo-import/',
			'required' => true,
		),
	/*	array(
			'name'     => esc_html__('AccessPress Social Counter', 'actavista' ),
			'slug'     => 'accesspress-social-counter',
			'required' => true,
		),
	*/


	);

	/*Change this to your theme text domain, used for internationalising strings.*/
	$theme_text_domain = 'actavista';

	$config   = array(
		'id'            => 'tgmpa',
		'default_path'  => '',
		'menu'          => 'tgmpa-install-plugins',
		'parent_slug'   => 'themes.php',
		'capability'    => 'edit_theme_options',
		'has_notices'   => true,
		'dismissable'   => true,
		'dismiss_msg'   => '',
		'is_automatic'  => false,
		'message'       => '',
	);

	tgmpa( $plugins, $config );
}


/**
 * [actavista_logo description]
 *
 * @return [type] [description]
 */
function actavista_logo( $logo_type, $image_logo, $logo_dimension , $logo_text, $logo_typography ) {
	
	if ( $logo_type === 'text' ) {
		$logo = $logo_text ? $logo_text : '<span>' . esc_html__( 'Actavista', 'actavista' ) .'</span>';
		$logo_style = $logo_typography;
		$LogoStyle = ( actavista_set( $logo_style, 'font-size' ) ) ? 'font-size:' . actavista_set( $logo_style, 'font-size' ) . ';' : '';
		$LogoStyle .= ( actavista_set( $logo_style, 'font-family' ) ) ? "font-family:'". actavista_set( $logo_style, 'font-family' ) . "';" : '';
		$LogoStyle .= ( actavista_set( $logo_style, 'font-weight' ) ) ? 'font-weight:' . actavista_set( $logo_style, 'font-weight' ) . ';' : '';
		$LogoStyle .= ( actavista_set( $logo_style, 'line-height' ) ) ? 'line-height:' . actavista_set( $logo_style, 'line-height' ) . ';' : '';
		$LogoStyle .= ( actavista_set( $logo_style, 'color' ) ) ? 'color:' . actavista_set( $logo_style, 'color' ) . ';' : '';
		$LogoStyle .= ( actavista_set( $logo_style, 'letter-spacing' ) ) ? 'letter-spacing:' . actavista_set( $logo_style, 'letter-spacing' ) . ';' : '';
		$Logo = '<a style="' . $LogoStyle . '" href="' . home_url( '/' ) . '" title="' . get_bloginfo( 'name' ) . '">' . wp_kses( $logo, true ). '</a>';
	} else {
		$LogoStyle = '';
		$LogoImageStyle = '';
		$LogoImageStyle .= actavista_set( $logo_dimension, 'width' ) ? ' width:'. actavista_set( $logo_dimension, 'width' ). ';' : '';
		$LogoImageStyle .= actavista_set( $logo_dimension, 'height' ) ? ' height:'. ( actavista_set( $logo_dimension, 'height' ) ) . ';' : '';
		if ( actavista_set( $image_logo, 'url' ) ) {
			$Logo = '<a href="' . home_url( '/' ) . '" title="' . get_bloginfo( 'name' ) . '"><img src="' . esc_url( actavista_set( $image_logo, 'url' ) ) . '" alt="logo" style="'. $LogoImageStyle .'" /></a>';
		} else {
			$Logo = '<a href="' . home_url( '/' ) . '" title="' . get_bloginfo( 'name' ) . '"><img src="' . get_template_directory_uri(). '/assets/images/logo.svg' .'" alt="logo" style="'. $LogoImageStyle .'" /></a>';
		} 
	}

	return $Logo;
}

/**
 * [actavista_get_posts_blocks description]
 *
 * @param  string  $post_type [description].
 * @param  boolean $flip      [description].
 * @return [type]             [description]
 */
if ( ! function_exists( 'actavista_get_posts_blocks' ) ) {
	function actavista_get_posts_blocks( $post_type = 'post', $flip = false ) {

		global $wpdb;

		$res = $wpdb->get_results( $wpdb->prepare( "SELECT `ID`, `post_title` FROM `" . $wpdb->prefix . "posts` WHERE `post_type` = %s AND `post_status` = %s ", array($post_type, 'publish' ) ), ARRAY_A );

		$return = array();

		if ( $flip ) {
			//$return[ esc_html__( 'Choose', 'actavista' ) ] = '';
		} else {
			//$return[0] = esc_html__( 'Choose', 'actavista' );
		}

		foreach ( $res as $k => $r ) {

			if ( $flip ) {

				if ( isset( $return[ actavista_set( $r, 'post_title' ) ] ) ) {
					$return[actavista_set( $r, 'post_title') . $k ] = actavista_set( $r, 'ID' );
				} else {
					$return[ actavista_set( $r, 'post_title' ) ] = actavista_set( $r, 'ID' );
				}
			} else {
				$return[ actavista_set( $r, 'ID' ) ] = actavista_set( $r, 'post_title' );
			}
		}
		return $return;
	}

}



/**
 * [actavista_the_pagination description]
 *
 * @param  array   $args [description].
 * @param  integer $echo [description].
 * @return [type]        [description]
 */
function actavista_the_pagination( $args = array(), $echo = 1 ) {

	global $wp_query;
	//printr($wp_query);
	$default = array('base' => str_replace(99999, '%#%', esc_url(get_pagenum_link(99999))), 'format' => '?paged=%#%', 'current' => max(1, get_query_var('paged')), 'total' => $wp_query->max_num_pages, 'next_text' => esc_html__( 'Next', 'actavista' ), 'prev_text' => esc_html__( 'Previous', 'actavista' ), 'type' => 'list');

	$args = wp_parse_args($args, $default);

	$pagination = ''.str_replace('<ul class=\'page-numbers\'>', '<ul class="pagination">', paginate_links($args)).'';


	if (paginate_links(array_merge(array('type' => 'array'), $args))) {

		if ($echo) {

			echo '<div class="paginate">'.wp_kses_post($pagination).'</div>';

		}

		return $pagination;

	}
}

function actavista_the_breadcrumb() {
	global $wp_query;

	$queried_object = get_queried_object();

	$breadcrumb = '';
	$delimiter = ' / ';
	$before = '<li class="breadcrumb-item">';
	
	$after = '</li>';

	if ( ! is_front_page() )
	{
		$breadcrumb .= $before . '<a href="'.home_url( '/' ).'">'.esc_html__( 'Home', 'actavista' ).' &nbsp;</a>' . $after;
		/** If category or single post */

		if(is_category())
		{
			$cat_obj = $wp_query->get_queried_object();
			$this_category = get_category( $cat_obj->term_id );

			if ( $this_category->parent != 0 ) {
				$parent_category = get_category( $this_category->parent );
				$breadcrumb .= get_category_parents($parent_category, TRUE, $delimiter );
			}	
			$breadcrumb .= $before . '<a href="'.get_category_link(get_query_var('cat')).'">'.single_cat_title('', FALSE).'</a>' . $after;
		}
		elseif ( $wp_query->is_posts_page ) {
			$breadcrumb .= $before . $queried_object->post_title . $after;
		}
		elseif( is_tax() )
		{
			$breadcrumb .= $before . '<a href="'.get_term_link($queried_object).'">'.$queried_object->name.'</a>' . $after;
		}
		elseif(is_page()) /** If WP pages */
		{
			global $post;
			if($post->post_parent)
			{
				$anc = get_post_ancestors($post->ID);
				foreach($anc as $ancestor)
				{
					$breadcrumb .= $before . '<a href="'.get_permalink( $ancestor ).'">'.get_the_title( $ancestor ).' &nbsp;</a>' . $after;
				}
				$breadcrumb .= $before . ''.get_the_title( $post->ID ).'' . $after;
				
			}else $breadcrumb .= $before . ''.get_the_title().'' . $after;
		}
		elseif ( is_singular() )
		{
			if( $category = wp_get_object_terms( get_the_ID(), array( 'category', 'location', 'tax_feature' ) ) )
			{

				if( !is_wp_error($category) )
				{
					$breadcrumb .= $before . '<a href="'.get_term_link( actavista_set($category, '0' ) ).'">'.actavista_set( actavista_set( $category, '0' ), 'name').'&nbsp;</a>' . $after;
					$breadcrumb .= $before . ''.get_the_title().'' . $after;
				} else {
					$breadcrumb .= $before . ''.get_the_title().'' . $after;
				}
			}else{
				$breadcrumb .= $before . ''.get_the_title().'' . $after;
			}

		}
		elseif(is_tag()) $breadcrumb .= $before . '<a href="'.get_term_link($queried_object).'">'.single_tag_title('', FALSE).'</a>' . $after; /**If tag template*/
		elseif(is_day()) $breadcrumb .= $before . '<a href="#">'.esc_html__('Archive for ', 'actavista').get_the_time('F jS, Y').'</a>' . $after; /** If daily Archives */
		elseif(is_month()) $breadcrumb .= $before . '<a href="' .get_month_link(get_the_time('Y'), get_the_time('m')) .'">'.__('Archive for ', 'actavista').get_the_time('F, Y').'</a>' . $after; /** If montly Archives */
		elseif(is_year()) $breadcrumb .= $before . '<a href="'.get_year_link(get_the_time('Y')).'">'.__('Archive for ', 'actavista').get_the_time('Y').'</a>' . $after; /** If year Archives */
		elseif(is_author()) $breadcrumb .= $before . '<a href="'. esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) .'">'.__('Archive for ', 'actavista').get_the_author().'</a>' . $after; /** If author Archives */
		elseif(is_search()) $breadcrumb .= $before . ''.esc_html__('Search Results for ', 'actavista').get_search_query().'' . $after; /** if search template */
		elseif(is_404())  {
			$breadcrumb .= $before . ''.esc_html__('404 - Not Found', 'actavista').'' . $after; /** if search template */
		}  
		elseif ( is_post_type_archive('product') ) 
		{
			
			$shop_page_id = wc_get_page_id( 'shop' );
			if( get_option('page_on_front') !== $shop_page_id  )
			{
				$shop_page    = get_post( $shop_page_id );
				
				$_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
				
				if ( ! $_name ) {
					$product_post_type = get_post_type_object( 'product' );
					$_name = $product_post_type->labels->singular_name;
				}
				
				if ( is_search() ) {
					
					$breadcrumb .= $before . '<a href="' . get_post_type_archive_link('product') . '">' . $_name . '</a>' . $delimiter . esc_html__( 'Search results for &ldquo;', 'actavista' ) . get_search_query() . '&rdquo;' . $after;
					
				} elseif ( is_paged() ) {
					
					$breadcrumb .= $before . '<a href="' . get_post_type_archive_link('product') . '">' . $_name . '</a>' . $after;
					
				} else {
					
					$breadcrumb .= $before . $_name . $after;
					
				}
			}
			
		}
		else 

			$breadcrumb .= $before . '<a href="'.get_permalink().'">'.get_the_title().'</a>' . $after; /** Default value */
		
	}

	return $breadcrumb;
}



function actavista_the_title( $template ) {
	global $wp_query;

	$queried_object = get_queried_object();

	$title = '';

	/** If category or single post */
	if ( $template == 'category' || $template == 'tag' || $template == 'galleryCat') {
		$current_obj = $wp_query->get_queried_object();
		$this_category = get_category( $current_obj->term_id );
		$title .=  $current_obj->name;
	}
	elseif ( is_home()) {
		$title .= esc_html__( 'Home Page ', 'actavista' );
	}
	elseif ( $template == 'page' || $template == 'post' || $template == 'VC' || $template == 'blog' || $template == 'courseDetail' || $template == 'team' || $template == 'services' || $template == 'events' || $template == 'gallery' || $template == 'shop' || $template == 'product' ) {
		$title .=  get_the_title();

	}
	elseif( $template == 'archive' ) {
		$title .= esc_html__( 'Archive for ', 'actavista' ) . get_the_time('F jS, Y');
	}
	elseif( $template == 'author' ) {
		$title .= esc_html__( 'Archive for ', 'actavista' ) . get_the_author();
	}
	elseif( $template == 'search' ) {
		$title .= esc_html__( 'Search Results for ', 'actavista' ) . '"' .get_search_query(). '"';

	}
	elseif ( $template == '404' ) {
		$title .=  esc_html__( '404 Page Not Found', 'actavista' );
		
	}


	return $title;
}

/**
* [actavista_social_share_output description]
*
* @param  [type] $comment [description].
* @param  [type] $args    [description].
* @param  [type] $depth   [description].
* @return void          [description]
*/

function actavista_social_share_output($icon, $color = false) {

	$permalink = get_permalink(get_the_ID());
	$titleget = get_the_title();

	if ($icon == 'facebook') {
		
		?>
		<li>
			<a onClick="window.open('http://www.facebook.com/sharer.php?u=<?php echo esc_url($permalink); ?>', 'Facebook', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + '');
				return false;" href="http://www.facebook.com/sharer.php?u=<?php echo esc_url($permalink); ?>">
				<i class="fa fa-facebook" style="color:#3b5998"></i><span>Facebook</span>
			</a>
		</li>
		<?php } ?>

		<?php
		if ($icon == 'twitter') {
			?>
			<li>
				<a  onClick="window.open('http://twitter.com/share?url=<?php echo esc_url($permalink); ?>&amp;text=<?php echo str_replace(" ", "%20", $titleget); ?>', 'Twitter share', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + '');
					return false;" href="http://twitter.com/share?url=<?php echo esc_url($permalink); ?>&amp;text=<?php echo str_replace(" ", "%20", $titleget); ?>">
					<i style="color:#00aced" class="fa fa-twitter"></i><span>Twitter</span>
				</a>
			</li>
			<?php } ?>

			<?php
			if ($icon == 'gplus') {
				?>
				<li>
					<a onClick="window.open('https://plus.google.com/share?url=<?php echo esc_url($permalink); ?>', 'Google plus', 'width=585,height=666,left=' + (screen.availWidth / 2 - 292) + ',top=' + (screen.availHeight / 2 - 333) + '');
						return false;" href="https://plus.google.com/share?url=<?php echo esc_url($permalink); ?>">
						<i style="color:#dd4b39" class="fa fa-google-plus"></i><span>Google Plus</span>
					</a>
				</li>
				<?php } ?>

				<?php
				if ($icon == 'digg') {
					?>
					<li>
						<a onClick="window.open('http://www.digg.com/submit?url=<?php echo esc_url($permalink); ?>', 'Digg', 'width=715,height=330,left=' + (screen.availWidth / 2 - 357) + ',top=' + (screen.availHeight / 2 - 165) + '');
							return false;" href="http://www.digg.com/submit?url=<?php echo esc_url($permalink); ?>">
							<i style="color:#000000" class="fa fa-digg"></i><span>Digg</span>
						</a>
					</li>
					<?php } ?>

					<?php
					if ($icon == 'reddit') {
						?>
						<li>
							<a  onClick="window.open('http://reddit.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo str_replace(" ", "%20", $titleget); ?>', 'Reddit', 'width=617,height=514,left=' + (screen.availWidth / 2 - 308) + ',top=' + (screen.availHeight / 2 - 257) + '');
								return false;" href="http://reddit.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo str_replace(" ", "%20", $titleget); ?>">
								<i style="color:#ff5700" class="fa fa-reddit"></i><span>Reddit</span>
							</a>
						</li>
						<?php } ?>

						<?php
						if ($icon == 'linkedin') {
							?>
							<li>
								<a onClick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url($permalink); ?>', 'Linkedin', 'width=863,height=500,left=' + (screen.availWidth / 2 - 431) + ',top=' + (screen.availHeight / 2 - 250) + '');
									return false;" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url($permalink); ?>">
									<i style="color:#007bb6" class="fa fa-linkedin"></i><span>Linkedin</span>
								</a>
							</li>
							<?php } ?>

							<?php  if ($icon == 'pinterest') {
								
								?>
								<li>
									<a href='javascript:void((function(){var e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)})())'>
										<i style="color:#cb2027" class="fa fa-pinterest"></i><span>Pinterest</span></a>
									</li>
									<?php } ?>

									<?php
									if ($icon == 'stumbleupon') {
										?>
										<li>
											<a onClick="window.open('http://www.stumbleupon.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo str_replace(" ", "%20", $titleget); ?>', 'Stumbleupon', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + '');
												return false;" href="http://www.stumbleupon.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo str_replace(" ", "%20", $titleget); ?>">
												<i style="color:#EB4823" class="fa fa-stumbleupon"></i><span>Stumbleupon</span>
											</a>
										</li>
										<?php } ?>

										<?php
										if ($icon == 'tumblr') {
											$str = $permalink;
											$str = preg_replace('#^https?://#', '', $str);
											?>
											<li>
												<a onClick="window.open('http://www.tumblr.com/share/link?url=<?php echo esc_attr($str); ?>&amp;name=<?php echo str_replace(" ", "%20", $titleget); ?>', 'Tumblr', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + '');
													return false;" href="http://www.tumblr.com/share/link?url=<?php echo esc_attr($str); ?>&amp;name=<?php echo str_replace(" ", "%20", $titleget); ?>">
													<i style="#32506d" class="fa fa-tumblr"></i><span>Tumblr</span>
												</a>
											</li>
											<?php } ?>

											<?php
											if ($icon == 'email') {
												$mail = ( $color == 1 ) ? 'style="color:#000000"' : '';
												?>
												<li><a href="mailto:?Subject=<?php echo str_replace(" ", "%20", $titleget); ?>&amp;Body=<?php echo esc_url($permalink); ?>"><i class="fa fa-envelope-o" style="color:#000000"></i><span>Email</span></a></li>
												<?php
											}
										}



										function actavista_character_limiter($str, $n, $end_char = '&#8230;', $allowed_tags = false) {
											if ($allowed_tags)
												$str = strip_tags($str, $allowed_tags);
											if (strlen($str) < $n)
												return $str;
											$str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));

											if (strlen($str) <= $n)
												return $str;

											$out = "";
											foreach (explode(' ', trim($str)) as $val) {
												$out .= $val . ' ';

												if (strlen($out) >= $n) {
													$out = trim($out);
													return (strlen($out) == strlen($str)) ? $out : $out . $end_char;
												}
											}
										}
/**
 * [actavista_list_comments description]
 *
 * @param  [type] $comment [description].
 * @param  [type] $args    [description].
 * @param  [type] $depth   [description].
 * @return void          [description]
 */
function actavista_list_comments( $comment, $args, $depth ) {

	wp_enqueue_script( 'comment-reply' );

	$GLOBALS['comment'] = $comment;
	$like = (int)get_comment_meta( $comment->comment_ID, 'like_it', true); ?>

	<li class="byuser comment-author-admin bypostauthor" id="comment-<?php comment_ID(); ?>">
		<div class="comment comment-box">
			<?php
			/** check if this comment author not have approved comments befor this */
			if ( $comment->comment_approved == '0' ) :
				?>
				<span class="waiting_comment"><?php
				/** print message below */
				_e( 'Your comment is awaiting moderation.', 'actavista' );
				?></span>
				<br />
			<?php endif; ?>
			<?php if ( get_avatar( $comment ) ) : ?>
				<div class="commenter-photo">
					<?php echo wp_kses_post( get_avatar( $comment, 110 ) ); ?>
				</div>
			<?php endif; ?>
			<div class="commenter-meta">
				<div class="comment-titles">

					<h6><?php echo wp_kses_post( get_comment_author() ); ?></h6>
					<span><?php echo get_comment_date( 'F j, Y', get_comment_ID() ); ?></span>
					<span class="comment-time"><?php esc_html_e( 'at', 'actavista' ); ?> 
						<?php echo get_comment_time( 'h:i A', true ); ?>

					</span>
					
				</div>
				<?php comment_text();/** Print our comment text */ ?>
				<?php
				$myclass = 'reply';
				$reply_btn = esc_html__('Reply', 'actavista' );
				echo preg_replace('/comment-reply-link/', 'comment-reply-link ' . $myclass, get_comment_reply_link(array_merge($args, array(
					'depth' => $depth,
					'reply_text' => $reply_btn,
					'max_depth' => $args['max_depth']))), 10);
					?>
				</div>
			</div>
			<?php

		}


/**
 * [comment_form description]
 *
 * @param  array  $args    [description].
 * @param  [type] $post_id [description].
 * @return void          [description]
 */
function actavista_comment_form( $args = array(), $post_id = null ) {

	if ( null === $post_id ) {
		$post_id = get_the_ID();
	}

	$commenter = wp_get_current_commenter();
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$args = wp_parse_args( $args );
	if ( ! isset( $args['format'] ) ) {
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	}

	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html_req = ( $req ? " required='required'" : '' );
	$html5    = 'html5' === $args['format'];
	$comment_field_class = is_user_logged_in() ? 'col-sm-12' : 'col-sm-6';
	$fields   = array(

		'author' => '
		<div class="col-lg-6">
		
		<input id="author" name="author" placeholder="'.esc_attr__( 'Full Name', 'actavista').'*"  type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $aria_req . $html_req . ' />
		</div>',
		'email'  => '<div class="col-lg-6">

		<input id="email" placeholder="'.esc_attr__( 'Email Address', 'actavista').'*" class="form-control" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100"/></div>',
		
		'phone'  => '<div class="col-lg-6">

		<input id="phone" placeholder="'.esc_attr__( 'Phone', 'actavista').'*" class="form-control" name="phone" ' . ( $html5 ? 'type="text"' : 'type="text"' ) . ' value="' . esc_attr( actavista_set($commenter,'comment_author_phone') ) . '" size="30" maxlength="100"/></div>',
		
		'url'    => '<div class="col-lg-6">

		<input id="subject"  placeholder="'.esc_attr__( 'Website', 'actavista').'*" class="form-control"  name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="200" /></div>',
	);

	$required_text = sprintf( ' ' . esc_html__( '%s', 'actavista' ), '' );

	/**
	 * Filters the default comment form fields.
	 *
	 * @since 3.0.0
	 *
	 * @param array $fields The default comment fields.
	 */
	$fields = apply_filters( 'comment_form_default_fields', $fields );
	$defaults = array(
		'fields'               => $fields,
		'comment_field'        => '<div class="col-sm-12 col-xs-12"><textarea id="comment" placeholder="'.esc_attr__('Your Comment', 'actavista').'" name="comment" class="form-control" rows="7"  required="required"></textarea></div>',
		/** This filter is documented in wp-includes/link-template.php */
		'must_log_in'          => '<div class="col-sm-12 col-xs-12"><p class="must-log-in">' . sprintf(
			/* translators: %s: login URL */
			esc_html__( 'You must be logged in to post a comment.', 'actavista' ),
			wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) )
		) . '</p></div>',
		/** This filter is documented in wp-includes/link-template.php */
		'logged_in_as'         => '<div class="col-lg-12 col-sm-12"><p class="logged-in-as">' . sprintf(
			/* translators: 1: edit user link, 2: accessibility text, 3: user name, 4: logout URL */
			'<a href="%1$s" aria-label="%2$s">'.esc_html__('Logged in as', 'actavista').' %3$s</a>. <a href="%4$s">'.esc_html__('Log out?', 'actavista').'</a>',
			get_edit_user_link(),
			/* translators: %s: user name */
			esc_attr( sprintf( esc_html__( 'Logged in as %s. Edit your profile.', 'actavista' ), $user_identity ) ),
			$user_identity,
			wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) )
		) . '</p></div>',
		'comment_notes_before' => '',
		'comment_notes_after'  => '',
		'action'               => site_url( '/wp-comments-post.php' ),
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'class_form'           => 'reply-form c-form',
		'class_submit'         => 'submit',
		'name_submit'          => 'submit',
		'title_reply'          => esc_html__( 'Leave A Comment', 'actavista' ),
		'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'actavista' ),
		'title_reply_before'   => '<div class="comment-title">',
		'title_reply_after'    => '</div>',
		'cancel_reply_before'  => ' <small>',
		'cancel_reply_after'   => '</small>',
		'cancel_reply_link'    => esc_html__( 'Cancel reply', 'actavista' ),
		'label_submit'         => esc_html__( 'leave a comment', 'actavista' ),
		'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s button" value="%4$s">'.esc_html__( 'POST COMMENT', 'actavista').'</button>',
		'submit_field'         => '<div class="btn-send col-sm-12 col-xs-12">%1$s %2$s</div>',
		'format'               => 'xhtml',
	);

	/**
	 * Filters the comment form default arguments.
	 *
	 * Use {@see 'comment_form_default_fields'} to filter the comment fields.
	 *
	 * @since 3.0.0
	 *
	 * @param array $defaults The default comment form arguments.
	 */
	//$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

	$args = array_merge(  $args, $defaults );

	if ( comments_open( $post_id ) ) : ?>
	<?php
	    /**
	     * Fires before the comment form.
	     *
	     * @since 3.0.0
	     */
	    do_action( 'comment_form_before' );
	    ?>
	    <div id="respond" class="comment-respond comment-form">

	    	<?php
	    	echo wp_kses_post( $args['title_reply_before'] );

	    	comment_form_title( $args['title_reply'], $args['title_reply_to'] );

	    	echo wp_kses_post( $args['cancel_reply_before'] );

	    	cancel_comment_reply_link( $args['cancel_reply_link'] );

	    	echo wp_kses_post( $args['cancel_reply_after'] );

	    	echo wp_kses_post( $args['title_reply_after'] );

	    	if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) :
	    		echo wp_kses_post( $args['must_log_in'] );
	            /**
	             * Fires after the HTML-formatted 'must log in after' message in the comment form.
	             *
	             * @since 3.0.0
	             */
	            do_action( 'comment_form_must_log_in_after' );
	            else : ?>
	            <form action="<?php echo esc_url( $args['action'] ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" class="<?php echo esc_attr( $args['class_form'] ); ?>"<?php echo wp_kses_post( $html5 ) ? ' novalidate' : ''; ?>>
	            	<div class="row">
	            		<?php
	                /**
	                 * Fires at the top of the comment form, inside the form tag.
	                 *
	                 * @since 3.0.0
	                 */
	               // do_action( 'comment_form_top' );

	                if ( is_user_logged_in() ) :
	                    /**
	                     * Filters the 'logged in' message for the comment form for display.
	                     *
	                     * @since 3.0.0
	                     *
	                     * @param string $args_logged_in The logged-in-as HTML-formatted message.
	                     * @param array  $commenter      An array containing the comment author's
	                     *                               username, email, and URL.
	                     * @param string $user_identity  If the commenter is a registered user,
	                     *                               the display name, blank otherwise.
	                     */
	                    echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity );

	                    /**
	                     * Fires after the is_user_logged_in() check in the comment form.
	                     *
	                     * @since 3.0.0
	                     *
	                     * @param array  $commenter     An array containing the comment author's
	                     *                              username, email, and URL.
	                     * @param string $user_identity If the commenter is a registered user,
	                     *                              the display name, blank otherwise.
	                     */
	                    do_action( 'comment_form_logged_in_after', $commenter, $user_identity );

	                else :

	                	echo wp_kses_post( $args['comment_notes_before'] );

	                endif;
	                $comment_fields = (array) $args['fields'] + array( 'comment' => $args['comment_field'] );

	                /**
	                 * Filters the comment form fields, including the textarea.
	                 *
	                 * @since 4.4.0
	                 *
	                 * @param array $comment_fields The comment fields.
	                 */
	                //$comment_fields = apply_filters( 'comment_form_fields', $comment_fields );

	                $comment_field_keys = array_diff( array_keys( $comment_fields ), array( 'comment' ) );

	                $first_field = reset( $comment_field_keys );
	                $last_field  = end( $comment_field_keys ); ?>

	                
	                <?php foreach ( $comment_fields as $name => $field ) {

	                	if ( 'comment' === $name ) {

		                        /**
		                         * Filters the content of the comment textarea field for display.
		                         *
		                         * @since 3.0.0
		                         *
		                         * @param string $args_comment_field The content of the comment textarea field.
		                         */
		                        echo apply_filters( 'comment_form_field_comment', $field );

		                        echo wp_kses_post( $args['comment_notes_after'] );

		                    } elseif ( ! is_user_logged_in() ) {

		                    	if ( $first_field === $name ) {
		                            /**
		                             * Fires before the comment fields in the comment form, excluding the textarea.
		                             *
		                             * @since 3.0.0
		                             */
		                            do_action( 'comment_form_before_fields' );
		                        }

		                        /**
		                         * Filters a comment form field for display.
		                         *
		                         * The dynamic portion of the filter hook, `$name`, refers to the name
		                         * of the comment form field. Such as 'author', 'email', or 'url'.
		                         *
		                         * @since 3.0.0
		                         *
		                         * @param string $field The HTML-formatted output of the comment form field.
		                         */
		                        echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";

		                        if ( $last_field === $name ) {
		                            /**
		                             * Fires after the comment fields in the comment form, excluding the textarea.
		                             *
		                             * @since 3.0.0
		                             */
		                            do_action( 'comment_form_after_fields' );
		                        }
		                    }
		                } ?>
		                

		                <?php $submit_button = sprintf(
		                	$args['submit_button'],
		                	esc_attr( $args['name_submit'] ),
		                	esc_attr( $args['id_submit'] ),
		                	esc_attr( $args['class_submit'] ),
		                	esc_attr( $args['label_submit'] )
		                );

	                /**
	                 * Filters the submit button for the comment form to display.
	                 *
	                 * @since 4.2.0
	                 *
	                 * @param string $submit_button HTML markup for the submit button.
	                 * @param array  $args          Arguments passed to `comment_form()`.
	                 */
	                $submit_button = apply_filters( 'comment_form_submit_button', $submit_button, $args );

	                $submit_field = sprintf(
	                	$args['submit_field'],
	                	$submit_button,
	                	get_comment_id_fields( $post_id )
	                );

	                /**
	                 * Filters the submit field for the comment form to display.
	                 *
	                 * The submit field includes the submit button, hidden fields for the
	                 * comment form, and any wrapper markup.
	                 *
	                 * @since 4.2.0
	                 *
	                 * @param string $submit_field HTML markup for the submit field.
	                 * @param array  $args         Arguments passed to comment_form().
	                 */
	                echo apply_filters( 'comment_form_submit_field', $submit_field, $args );

	                /**
	                 * Fires at the bottom of the comment form, inside the closing </form> tag.
	                 *
	                 * @since 1.5.0
	                 *
	                 * @param int $post_id The post ID.
	                 */
	                do_action( 'comment_form', $post_id );
	                ?>
	            </div>
	        </form>
	    <?php endif; ?>
	    
	</div><!-- #respond -->
	<?php
	    /**
	     * Fires after the comment form.
	     *
	     * @since 3.0.0
	     */
	    do_action( 'comment_form_after' );
	else :
	    /**
	     * Fires after the comment form if comments are closed.
	     *
	     * @since 3.0.0
	     */
	    do_action( 'comment_form_comments_closed' );
	endif;
}

/**
 * [actavista_vd_details description]
 *
 * @param  [type] $url [description]
 * @return [type]      [description]
 */
function actavista_vd_details($url) {
	$host = explode('.', str_replace('www.', '', strtolower(parse_url($url, PHP_URL_HOST))));
	$host = isset($host[0]) ? $host[0] : $host;
	$ssl_value = is_ssl() ? 'https' : 'http';
	$videos = array();

	switch ($host) {
		case 'vimeo':
		$video_id = substr(parse_url($url, PHP_URL_PATH), 1);
		$content = wp_remote_get("http://vimeo.com/api/v2/video/{$video_id}.json");
		$hash = json_decode(actavista_set($content, 'body'));

		if ($hash != '') {
			return array(
				'provider' => 'Vimeo',
				'title' => $hash[0]->title,
				'description' => str_replace(array("<br>", "<br/>", "<br />"), NULL, $hash[0]->description),
				'description_nl2br' => str_replace(array("\n", "\r", "\r\n", "\n\r"), NULL, $hash[0]->description),
				'thumbnail' => $hash[0]->thumbnail_large,
				'video' => "https://vimeo.com/" . $hash[0]->id,
				'embed_video' => '<iframe src="https://player.vimeo.com/video/' . $hash[0]->id . '" class="vimeo-video" ></iframe>',
				
				'url' => 'https://player.vimeo.com/video/'.$video_id,

			);
		}
		break;

		case 'youtube':
		$yt_api_key = 'AIzaSyBJhHvfltBxpMIV1tY3vwKK9rO3ms1H4hM';

		preg_match("/v=([^&#]*)/", parse_url($url, PHP_URL_QUERY), $video_id);
		$video_id = $video_id[1];
		$hash = '';
		$content = wp_remote_get('https://www.googleapis.com/youtube/v3/videos?part=snippet&id=' . $video_id . '&key=' . $yt_api_key);
		$hash = json_decode(actavista_set($content, 'body'));
		if (!empty(actavista_set($hash, 'items'))) {
			$sinppet = actavista_set(actavista_set(actavista_set($hash, 'items'), 0), 'snippet');
			return array(
				'host' => 'youtube',
				'provider' => 'YouTube',
				'title' => actavista_set($sinppet, 'title'),
				'description' => str_replace(array("<br>", "<br/>", "<br />"), NULL, actavista_set($sinppet, 'description')),
				'thumbnail' => actavista_set(actavista_set($sinppet, 'thumbnails'), 'high'),
				'video' => "http://www.youtube.com/" . actavista_set(actavista_set(actavista_set($hash, 'items'), 0), 'id'),
				'url' =>  $ssl_value.'://www.youtube.com/watch?v='.$video_id.'',
				'embed_video' => '<iframe src="https://www.youtube.com/embed/' . actavista_set(actavista_set(actavista_set($hash, 'items'), 0), 'id') . '"></iframe>',
			);
		} else {
			return array(
				'embed_video' => '<iframe src="https://www.youtube.com/embed/' . $video_id . '"></iframe>',
			);
		}
		break;
		case 'dailymotion':
		preg_match("/video\/([^_]+)/", $url, $video_id);
		$video_id = $video_id[1];
		$content = wp_remote_get("https://api.dailymotion.com/video/$video_id?fields=title,thumbnail_url,owner%2Cdescription%2Cduration%2Cembed_html%2Cembed_url%2Cid%2Crating%2Ctags%2Cviews_total");
		$hash = json_decode(actavista_set($content, 'body'));
		if ($hash) {
			return array(
				'provider' => 'Dailymotion',
				'title' => $hash->title,
				'description' => str_replace(array("<br>", "<br/>", "<br />"), NULL, $hash->description),
				'thumbnail' => $hash->thumbnail_url,
				'embed_video' => $hash->embed_html,
			);
		}
		break;
	}
}



/**
 * [actavista_get_users_meta description]
 */
function actavista_get_users_meta() {

	$blogusers = get_users();

	$register_users = array();

	foreach ( $blogusers as $user ) {
		$uer_data =(array) get_user_meta( $user->ID, 'subscribe', true );
		if ( in_array( get_current_user_id(), $uer_data)) {
			$register_users[$user->ID] = esc_html( $user->display_name );
		}
	}
	return array_flip( $register_users );

}


function actavista_mailchimp_process( $list,$email ) {


	$mailchimp = new MC4WP_Mailchimp();

	$arr = array();
	
	$res = $mailchimp->list_subscribe( $list, $email  , $arr );
	
	if ( ! $res ) {

		if ( $mailchimp->error_message instanceof MC4WP_API_Exception ) {

			$res = $mailchimp->error_message->__toString();

		} else {

			$res = $mailchimp->error_message;

		}

	}

	return $res;

}

function actavista_boxed_layout() {

	$options = actavista_WSH()->option();


	$background_style = '';

	if ( 1 == $options->get( 'boxed_layout_status' ) && 'default' == $options->get( 'background_type' ) && 'none' != $options->get( 'patterns' ) ) {

		$pattern_image = ( 'none' != $options->get( 'patterns' ) ) ? 'url( ' . get_template_directory_uri() . '/assets/images/pattern/' . $options->get( 'patterns' ) . '.png )' : '';

		$background_style .= actavista_style_selector( 'body', 'background-image', $pattern_image );

	}

	if ( 1 == $options->get( 'boxed_layout_status' ) ) {

		$shadow_value = '0px 0px ' . $options->get( 'boxed_shadow' ) . 'px ' . $options->get( 'boxed_shadow_color' ) . ' !important';
		$background_style .= actavista_style_selector( '.theme-layout.boxed', 'box-shadow', $shadow_value );
	}

	return $background_style;

}

function actavista_style_selector( $selector = '', $property = '', $rule = '' ) {

	$style_selector = '';

	$style_selector .= $selector . '{';

	$style_selector .= $property . ':' . $rule . ';';

	$style_selector .= '}';

	return $style_selector;

}


function actavista_post_content( $contents, $text_limit ) {

	$shortcode_tags = array('VC_COLUMN_INNTER');
	$values = array_values( $shortcode_tags );
	$exclude_codes  = implode( '|', $values );

	$the_content = preg_replace( "~(?:\[/?)(?!(?:$exclude_codes))[^/\]]+/?\]~s", '', $contents );
	$patterns = "/\[[\/]?vc_[^\]]*\]/";
	$replacements = "";
	$content = preg_replace( $patterns, $replacements,$contents );
	$text = strip_shortcodes( $content  );
	$text_limit = $text_limit ? $text_limit : 100;

	echo '<p>' .wp_trim_words( $text, $text_limit, '...' ).'</p>';  
}
add_action('show_user_profile','actavista_show_extra_profile_fields');
add_action('edit_user_profile', 'actavista_show_extra_profile_fields');

        // save custom user profile meta
add_action('personal_options_update',  'actavista_save_extra_profile_fields');
add_action('edit_user_profile_update', 'actavista_save_extra_profile_fields');

function actavista_show_extra_profile_fields($user) {
	?>
	<h3><?php esc_html_e('Extra profile information', 'actavista') ?></h3>
	<table class="form-table">
		<?php
		$meta = array(esc_html__('Facebook Profile URL', 'actavista') => 'actavista_fb', esc_html__('Google Plus Profile URL', 'actavista') => 'actavista_google', esc_html__('Twitter Profile URL', 'actavista') => 'actavista_tw', esc_html__('Linkedin Profile URL', 'actavista') => 'actavista_link', esc_html__('Pinterest Profile URL', 'actavista') => 'actavista_pinterest', esc_html__('Reddit Profile URL', 'actavista') => 'actavista_reddit', esc_html__('Your Designation', 'actavista') => 'actavista_skills' );
		foreach ($meta as $key => $t) {
			$val = (get_the_author_meta($t, $user->ID)) ? esc_attr(get_the_author_meta($t, $user->ID)) : '';
			?>
			<tr>
				<th><label for="<?php echo esc_attr($t) ?>"><?php echo esc_html($key) ?></label></th>
				<td>
					<input type="text" name="<?php echo esc_attr($t) ?>" id="<?php echo esc_attr($t) ?>"
					value="<?php echo esc_attr($val) ?>" class="regular-text"/><br/>

				</td>
			</tr>
			<?php
		}
		?>
	</table>
	<?php
}

function actavista_save_extra_profile_fields($user_id) {
	if (!current_user_can('edit_user', $user_id)) {
		return FALSE;
	}

	$meta = array('actavista_fb', 'actavista_google', 'actavista_tw', 'actavista_link', 'actavista_pinterest', 'actavista_reddit', 'actavista_skills' );
	foreach ($meta as $t) {
		if ($t) {
			update_user_meta($user_id, $t, actavista_set($_POST, $t));
		}
	}
}




function Actavista_getFontsData( $fontsString ) { 

	if ( ! isset( $fontsString) ){
		return;
	}  

        // Font data Extraction
	$googleFontsParam = new Vc_Google_Fonts();      
	$fieldSettings = array();
	$fontsData = strlen( $fontsString ) > 0 ? $googleFontsParam->_vc_google_fonts_parse_attributes( $fieldSettings, $fontsString ) : '';
	return $fontsData;

}

    // Build the inline style starting from the data
function Actavista_googleFontsStyles( $fontsData ) {

	if ( ! isset( $fontsData) ){
		return;
	}

	if(!empty($fontsData)){
		$fontFamily = explode( ':', $fontsData['values']['font_family'] );

		$styles[] = 'font-family:' . $fontFamily[0];
		$fontStyles = explode( ':', $fontsData['values']['font_style'] );
		$styles[] = 'font-weight:' . $fontStyles[1];
		$styles[] = 'font-style:' . $fontStyles[2];

		$inline_style = '';     
		foreach( $styles as $attribute ){           
			$inline_style .= $attribute.'; ';       
		}   

		return $inline_style;
	}

}

    // Enqueue right google font from Googleapis
function Actavista_enqueueGoogleFonts( $fontsData ) {

        // Get extra subsets for settings (latin/cyrillic/etc)
	$settings = get_option( 'wpb_js_google_fonts_subsets' );
	if ( is_array( $settings ) && ! empty( $settings ) ) {
		$subsets = '&subset=' . implode( ',', $settings );
	} else {
		$subsets = '';
	}

        // We also need to enqueue font from googleapis
	if ( isset( $fontsData['values']['font_family'] ) ) {
		wp_enqueue_style( 
			'vc_google_fonts_' . vc_build_safe_css_class( $fontsData['values']['font_family'] ), 
			'//fonts.googleapis.com/css?family=' . $fontsData['values']['font_family'] . $subsets
		);
	}

}
function actavista_shortcode_style_selector( $selector = '', $properties = array(), $rules = array() ) {

	$style_selector = '';
	$counter=0;
	$style_selector .= $selector . '{';
	if(!empty($properties)){
		foreach ($properties as $property ) {
			
			$style_selector .= $property . ':' .actavista_set($rules,$counter)  . ';';
			
			$counter++;
		}
	}

	$style_selector .= '}';

	wp_add_inline_style( 'root-style', $style_selector );


}


/**
 * [esperto_twitter description]
 *
 * @param  string  $post_type [description].
 * @param  boolean $flip      [description].
 * @return [type]             [description]
 */

function esperto_twitter( $args = array() ) {

	$selector = actavista_set( $args, 'selector' );

	$data = actavista_set( $args, 'data' );

	$count = actavista_set( $args, 'count', 3 );

	$screen = actavista_set( $args, 'screen_name', 'WordPress' );

	$settings = array( 'count' => $count, 'screen_name' => $screen );

	ob_start(); ?>

	jQuery(document).ready(function ($) {

	$('<?php echo esc_js( $selector ); ?>').tweets(<?php echo json_encode( $settings ); ?>);
});

	<?php $jsOutput = ob_get_contents();
	ob_end_clean();
	wp_add_inline_script( 'script', $jsOutput );
}

function actavista_post_title( $title_limit_option, $w_limit, $ch_limit, $title  ) {
	if ( ! $title_limit_option && $title ) {
		return;
	}
	
	if ( $title_limit_option == 'characters_limit' && $ch_limit > 0 ) {

		$title_return =  substr( $title, 0, $ch_limit ).'...';
	} 

	elseif ( $title_limit_option == 'word_limit' && $ch_limit ) {

		$title_return = wp_trim_words( $title, $w_limit, '...' );
	}

	return $title_return ? $title_return : '';
}
function actavista_time_ago() {
	return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago', 'actavista' );
}

function actavista_getPostViews($postID){
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0 ".esc_html__('View', 'actavista' );
	}
	return $count.esc_html__(' Views', 'actavista' );
}
function actavista_setPostViews($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}else{
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}

// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); 
/**
 * [esperto_login_form description]
 *
*/
	/**
	 * [actavista_login_form description]
	 *
	 */
	function actavista_login_form() {
		check_ajax_referer( 'ajax-login-nonce', ACTAVISTA_KEY );

		$info = array();
		$info['user_login']    = actavista_set( $_POST, 'log' );
		$info['user_password'] = actavista_set( $_POST, 'pwd' );
		$info['remember']      = actavista_set( $_POST, 'rememberme' );

		$user_signon = wp_signon($info, false);
		if ( is_wp_error( $user_signon ) ) {
			echo json_encode( array( 'loggedin' => false, 'message' => '<div class="alert alert-danger">' . esc_html__('Wrong username or password.', 'actavista') . '</div>'));
		} else {
			echo json_encode( array( 'loggedin' => true, 'message' => '<div class="alert alert-success">' . esc_html__('Login successful, redirecting...', 'actavista') . '</div>'));
		}
		exit;

	}

	function actavista_video($data) {

		check_ajax_referer( ACTAVISTA_NONCE, 'security_key' );

		$paged = (int) esc_attr(actavista_set($data, 'page_num'));

		if (function_exists('actavista_decrypt')) {

			$data_atts = unserialize(actavista_decrypt(esc_attr(actavista_set($data, 'data_atts'))));

		} else {

			$data_atts = array();

		}



		$data_atts['paged'] = $paged + 1;



		$offset = actavista_set($data_atts, 'showposts') + actavista_set($data_atts, 'posts_per_page');

		global $post;

		if ( class_exists( 'ACTAVISTA_Resizer' ) ) {

			$img_obj = new ACTAVISTA_Resizer();

		}

		$args = array(

			'post_type' => 'actavista_video',

			'post_status' => 'publish',

			//'offset' => 2,

			'posts_per_page' => 2, //actavista_set($data_atts, 'posts_per_page'),
/*
'order' => actavista_set($data_atts, 'order'),*/

);

		
		$product_cat = actavista_set($data_atts, 'cats');



/*		if (!empty($product_cat))

			$args['tax_query'] = array(array('taxonomy' => 'video_cat', 'field' => 'slug', 'terms' => (array) actavista_set($data_atts, 'cats')));
*/

			$products_list = new WP_Query($args);



			ob_start();

			$products_output = '';

			if ($products_list->have_posts()):

				?>



				<?php

				while ($products_list->have_posts()) : $products_list->the_post();



					global $product;



					$post_terms = wp_get_post_terms(get_the_id(), 'video_cat');




					$post_class = '';


					$post_terms = wp_get_post_terms( get_the_ID(), 'video_cat' );

					if(!empty($post_terms)){

						foreach ($post_terms as $post_term )
						{

							$post_class .= $post_term->slug. ' ';

						}
					}

					?>


					<div class="mehak"></div>
				<?php endwhile; ?> 



				<?php $data = array('number' => $number,  'order' => $order, 'cats' => $cats, 'title_limit' => $title_limit, 'show_post_date' => $show_post_date, 'add_socials' => $add_socials); ?>

				<?php $more_button = '<a href="#" data-ajax="flaky_delightful_products" data-page="' . esc_attr(actavista_set($data_atts, 'paged')) . '" data-atts="' . esc_attr(actavista_encrypt(serialize($data))) . '" >' . esc_html__("Load More", 'actavista') . '</a>'; ?>

				<?php

			else:

				$more_button = esc_html__('Sorry no more products available!', 'actavista');

			endif;

			$produts_output .= ob_get_contents();
			
			wp_reset_postdata();

			ob_end_clean();

			echo json_encode(array('products' => $produts_output, 'button' => $more_button));

			exit;

		}

/**
 * [actavista_get_post_by_slug description]
 *
 * @param  string  $post_type [description].
 * @param  boolean $flip      [description].
 * @return [type]             [description]
 */
function actavista_get_post_by_slug( $post_type = 'post', $flip = false ) {

	global $wpdb;

	$res = $wpdb->get_results( $wpdb->prepare( "SELECT `ID`, `post_title`, `post_name` FROM `" . $wpdb->prefix . "posts` WHERE `post_type` = %s AND `post_status` = %s ", array($post_type, 'publish' ) ), ARRAY_A );

	$return = array();

	foreach ( $res as $k => $r ) {

		$return[ actavista_set( $r, 'post_title' ) ] = actavista_set( $r, 'post_name' );

	}
	return $return;
}
/**
 * [actavista_get_post_by_ID description]
 *
 * @param  string  $post_type [description].
 * @param  boolean $flip      [description].
 * @return [type]             [description]
 */
function actavista_get_post_by_ID( $post_type = 'post', $flip = false ) {

	global $wpdb;

	$res = $wpdb->get_results( $wpdb->prepare( "SELECT `ID`, `post_title`, `post_name` FROM `" . $wpdb->prefix . "posts` WHERE `post_type` = %s AND `post_status` = %s ", array($post_type, 'publish' ) ), ARRAY_A );

	$return = array();

	foreach ( $res as $k => $r ) {

		$return[ actavista_set( $r, 'post_title' ) ] = actavista_set( $r, 'ID' );

	}
	return $return;
}

function actavista_vc_column_out( $lg, $md, $sm, $xs ) {
	return array( $lg, $md, $sm, $xs );
}

/**
 * parameter : product id
 * return : product discount in percentage
 * desc : must call in product loop
 * * */
function actavista_get_percentage_discount( $product_id ) {

	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}
	$product = new WC_Product( $product_id );
	if ( $product->get_regular_price() > 0 && $product->get_sale_price() > 0 ) {
		$percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
	} else {
		$percentage = '';
	}

	return $percentage;
}

function actavista_add_to_cart_button( $label = '', $_custom_class = '', $icon = '' ) {

	global $product;
	$icon = "<i class=\"fa $icon\"></i>";
	switch ( $product->get_type() ) {
		case 'variable':
			if ( $product->is_purchasable() && $product->is_in_stock() ) {
				$button_label = ( $label ) ? $label : "<i class=\"fa fa-eye\"></i>";
			} else {
				$button_label = ( $label ) ? $label : "<i class=\"fa fa-warning\"></i>";
			}
			break;
		default:
			if ( $product->is_purchasable() && $product->is_in_stock() ) {
				$button_label = ( $label ) ? $label : $icon;
			} else {
				$button_label = ( $label ) ? esc_html__( 'Not Available', 'actavista' ) : "<i class=\"fa fa-warning\"></i>";
			}
	}
	if ( $product ) {
		$args = array(
			$product->add_to_cart_url(),
			'quantity'   => 1,
			'class'      => implode( ' ', array_filter( array(
				'button',
				'product_type_' . $product->get_type(),
				$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : 'stock_outed',
				$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
				isset( $_custom_class ) ? $_custom_class : '',
			) ) ),
			'attributes' => array(
				'data-product_id'  => $product->get_id(),
				'data-product_sku' => $product->get_sku(),
				'aria-label'       => $product->add_to_cart_description(),
				'rel'              => 'nofollow',
			),
			'title'      => $button_label,
		);
		if ( isset( $args[ 'attributes' ][ 'aria-label' ] ) ) {
			$args[ 'attributes' ][ 'aria-label' ] = strip_tags( $args[ 'attributes' ][ 'aria-label' ] );
		}
		$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args ), $product );
		wc_get_template( 'loop/add-to-cart.php', $args );
	}
}

/**
 * function :   get the products variations attributes
 * return   :   variations array
 * * */
function actavista_variations( $product_id, $variable_data, $links = false ) {

	$variations = array();
	if ( ! empty( $variable_data ) ) {
		foreach ( $variable_data as $terms => $term ) {
			$term = wc_get_product_terms( $product_id, $terms, array( 'fields' => 'all' ) );
			foreach ( $term as $post ) {
				$image = get_term_meta( $post->term_id, 'image', true );
				$color = get_term_meta( $post->term_id, 'color', true );
				$label = get_term_meta( $post->term_id, 'label', true );
				if ( $image ) {
					if ( $links == true ) {
						$term_link               = ( $links == true ) ? get_term_link( $post->term_id ) : '';
						$variations[ 'image' ][] = array( $term_link, $image );
					} else {
						$variations[ 'image' ][] = array(
							get_the_permalink( $product_id ) . '?attribute_' . $post->taxonomy . '=' . $post->slug,
							$image
						);
					}
				}

				if ( $color ) {
					if ( $links == true ) {
						$term_link               = ( $links == true ) ? get_term_link( $post->term_id ) : '';
						$variations[ 'color' ][] = array( $term_link, $color );
					} else {
						$variations[ 'color' ][] = array(
							get_the_permalink( $product_id ) . '?attribute_' . $post->taxonomy . '=' . $post->slug,
							$color
						);
					}
				}

				if ( $label ) {
					if ( $links == true ) {
						$term_link               = ( $links == true ) ? get_term_link( $post->term_id ) : '';
						$variations[ 'label' ][] = array( $term_link, $label );
					} else {
						$variations[ 'label' ][] = array(
							get_the_permalink( $product_id ) . '?attribute_' . $post->taxonomy . '=' . $post->slug,
							$label
						);
					}
				}
			}
		}
	}

	return $variations;
}

/**
 * function :   the products variations html
 * return   :   variations html
 * * */
function actavista_variation_html( $variations, $label = false ) {
	if ( ! empty( $variations ) ) {
		if ( $label == true ) {
			?>
			<div class="available-colr">
			<?php
		}
		foreach ( $variations as $terms => $term ) {
			switch ( $terms ) {
				case 'image':
					if ( $label == true ) {
						?>
						<span><?php echo esc_html__( 'Available Colors', 'actavista' ); ?></span>
					<?php } ?>
					<ul class="color-variation style2">
						<?php foreach ( $term as $posts ) { ?>
							<li>
								<a href="<?php echo esc_url( actavista_set( $posts, 0 ) ); ?>">
									<?php
									echo wp_get_attachment_image( actavista_set( $posts, 1 ), array(
										28,
										28,
									) );
									?>
								</a>
							</li>
						<?php } ?>
					</ul>
					<?php
					break;
				case 'color':
					if ( $label == true ) {
						?>
						<span><?php echo esc_html__( 'Available Colors', 'actavista' ); ?></span>
					<?php } ?>
					<ul class="color-variation">
						<?php foreach ( $term as $posts ) { ?>
							<li>
								<a href="<?php echo esc_url( actavista_set( $posts, 0 ) ); ?>" style="background:<?php echo esc_attr( actavista_set( $posts, 1 ) ); ?>"></a>
							</li>
						<?php } ?>
					</ul>
					<?php
					break;
				case 'label':
					if ( $label == true ) {
						?>
						<span><?php echo esc_html__( 'Available Colors', 'actavista' ); ?></span>
						<?php
					}
					?>
					<span class="prod-sizes">
						<?php foreach ( $term as $posts ) { ?>
							<a href="<?php echo esc_url( actavista_set( $posts, 0 ) ); ?>"><?php echo actavista_set( $posts, 1 ); ?></a>
						<?php } ?>
					</span>
					<?php
					break;
				default:
					return '';
			}
		}
		if ( $label == true ) {
			?>
			</div>
			<?php
		}
	}
}

/* ---------------------------------------------------------------------------
 * Wishlist Button | fire an event when any product wishlist is clicked
 * --------------------------------------------------------------------------- */
function actavista_wishlist_button( $showTitle = '', $icon = 'flaticon-heart' ) {

	global $woocommerce;
	global $current_user, $post;
	$meta              = get_user_meta( $current_user->ID, 'konia_add_to_wishlist', true );
	$wishlist_template = actavista_tpl_page( 'tpl-wishlist.php' );
	$wishlist_title    = '';
	if ( $showTitle ) {
		$wishlist_title = get_the_title( actavista_set( $wishlist_template, 'id' ) );
	}
	if ( empty( $meta ) ) {
		return '<a class="top-wishlist" href="javascript:void(0)"><i class="' . esc_attr( $icon ) . '"></i><span>0</span></a>';
	} else {
		if ( is_object( $woocommerce ) && is_user_logged_in() ) {
			return '<a class="top-wishlist" title="' . get_the_title( actavista_set( $wishlist_template, 'id' ) ) . '" href="' . actavista_set( $wishlist_template, 'link' ) . '"><i class="' . esc_attr( $icon ) . '"></i>' . $wishlist_title . '<span>' . count( $meta ) . '</span></a>';
		}
	}
}

/* ------------------------------------------------------------------------------------
 * Template Name | get template name by passing template file like (tpl-yourfile.php)
 * ------------------------------------------------------------------------------------*/
function actavista_tpl_page( $TEMPLATE_NAME ) {

	$template = array();
	$pages    = get_pages( array(
		'meta_key'   => '_wp_page_template',
		'meta_value' => $TEMPLATE_NAME,
	) );
	if ( actavista_set( $pages, 0 ) ):
		$id  = actavista_set( $pages, 0 )->ID;
		$url = null;
		if ( actavista_set( $pages, 0 ) ) {
			$template = array( 'id' => $id, 'link' => get_page_link( $id ) );
		}
	endif;

	return $template;
}

function actavista_add_wishlist( $data ) {

	$current_user = wp_get_current_user();
	if ( is_user_logged_in() ) {
		$meta    = get_user_meta( $current_user->ID, 'konia_add_to_wishlist', true );
		$data_id = _set( $_POST, 'data_id' );
		if ( $meta && is_array( $meta ) ) {
			if ( in_array( $data_id, $meta ) ) {
				exit( json_encode( array(
					'code' => 'exists',
				) ) );
			}
			$newmeta = array_merge( array( _set( $_POST, 'data_id' ) ), $meta );
			update_user_meta( $current_user->ID, 'konia_add_to_wishlist', $newmeta );
			exit( json_encode( array(
				'code' => 'success',
			) ) );
		} else {
			update_user_meta( $current_user->ID, 'konia_add_to_wishlist', array( _set( $_POST, 'data_id' ) ) );
			exit( json_encode( array(
				'code' => 'success',
			) ) );
		}
	} else {
		exit( json_encode( array(
			'code' => 'fail',
		) ) );
	}
}

function actavista_delete_wishlist() {

	$current_user = wp_get_current_user();
	if ( is_user_logged_in() ) {
		$meta    = get_user_meta( $current_user->ID, 'konia_add_to_wishlist', true );
		$data_id = _set( $_POST, 'data_id' );
		if ( $meta && is_array( $meta ) ) {
			$searched = array_search( $data_id, $meta );
			if ( isset( $meta[ $searched ] ) ) {
				unset( $meta[ $searched ] );
				update_user_meta( $current_user->ID, 'konia_add_to_wishlist', array_unique( $meta ) );
				exit( json_encode( array(
					'code' => 'dell-success',
				) ) );
			} else {
				exit( json_encode( array(
					'code' => 'dell-fail',
				) ) );
			}
		} else {
			update_user_meta( $current_user->ID, 'konia_add_to_wishlist', array( _set( $_POST, 'data_id' ) ) );
			exit( json_encode( array(
				'code' => 'dell-fail',
			) ) );
		}
	} else {
		exit( json_encode( array(
			'code' => 'fail',
		) ) );
	}
}

/**
 * parameter : $product_price, $product object
 * return : return simple product price with html
 * desc : this function will get simple product price html
 * * */
add_filter( 'woocommerce_get_price_html', 'actavista_simple_product_price_html', 100, 2 );
function actavista_simple_product_price_html( $price, $product ) {

	if ( $product->is_type( 'simple' ) ) {
		$regular_price = $product->get_regular_price();
		$sale_price    = $product->get_sale_price();
		$price_amt     = $product->get_price();

		return actavista_price_html( $price_amt, $regular_price, $sale_price, 'simple' );
	} else {
		return $price;
	}
}

//add_filter( 'woocommerce_add_to_cart_fragments', 'actavista_price_html', 10 );

function actavista_price_html( $price_amt, $regular_price, $sale_price, $product_type ) {

	$html_price = '';
	//if product is in sale
	if ( ( $price_amt == $sale_price ) && ( $sale_price != 0 ) ) {
		$html_price .= '<ins>' . wc_price( $sale_price ) . '</ins>';
		$html_price .= '<del>' . wc_price( $regular_price ) . '</del>';
	} //in sale but free
	elseif ( ( $price_amt == $sale_price ) && ( $sale_price == 0 ) ) {
		$html_price .= '<ins>Free!</ins>';
		$html_price .= '<del>' . wc_price( $regular_price ) . '</del>';
	} //not is sale
	elseif ( ( $price_amt == $regular_price ) && ( $regular_price != 0 ) ) {
		$html_price .= '<ins>' . wc_price( $regular_price ) . '</ins>';
	} //for free product
	elseif ( ( $price_amt == $regular_price ) && ( $regular_price == 0 ) ) {
		$html_price .= '<ins>Free!</ins>';
	}

	return $html_price;
}

//add_action( 'woocommerce_show_quantity', 'actavista_show_quantity' );
function actavista_show_quantity() {

	add_filter( 'woocommerce_loop_add_to_cart_link', 'actavista_quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2 );
}

function actavista_quantity_inputs_for_woocommerce_loop_add_to_cart_link( $html, $product ) {

	if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
		$html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
		$html .= woocommerce_quantity_input( array(), $product, false );
		$html .= '<button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . '</button>';
		$html .= '</form>';
	}

	return $html;
}

function actavista_vc_custom_image( $lg = '', $tb = '', $mb = '' ) {
	if ( ! empty( $lg ) OR ! empty( $tb ) OR ! empty( $mb ) ) {
		return array( 'm' => $mb, 'i' => $tb, 'w' => $lg );
	}
}

function actavista_vc_lg_column( $dep = array( 'dep_go' => '', 'dep_set' => '' ) ) {
	$array = array(
		'group'      => esc_html__( 'Responsive Options', 'actavista' ),
		'heading'    => esc_html__( 'Large Device Column', 'actavista' ),
		'type'       => 'dropdown',
		'value'      => array(
			esc_html__( '2 Column', 'actavista' ) => 'vc_col-lg-6',
			esc_html__( '3 Column', 'actavista' ) => 'vc_col-lg-4',
			esc_html__( '4 Column', 'actavista' ) => 'vc_col-lg-3'
		),
		'param_name' => 'vc_col_lg_size',
	);
	if ( ! empty( $dep[ 0 ] ) && ! empty( $dep[ 1 ] ) ) {
		$array[ 'dependency' ] = array(
			'element' => $dep[ 0 ],
			'value'   => $dep[ 1 ],
		);
	}

	return $array;
}

function actavista_vc_md_column( $dep = array( 'dep_go' => '', 'dep_set' => '' ) ) {
	$array = array(
		'group'      => esc_html__( 'Responsive Options', 'actavista' ),
		'heading'    => esc_html__( 'Medium Device Column', 'actavista' ),
		'type'       => 'dropdown',
		'value'      => array(
			esc_html__( '2 Column', 'actavista' ) => 'vc_col-md-6',
			esc_html__( '3 Column', 'actavista' ) => 'vc_col-md-4',
			esc_html__( '4 Column', 'actavista' ) => 'vc_col-md-3'
		),
		'param_name' => 'vc_col_md_size',
	);
	if ( ! empty( $dep[ 0 ] ) && ! empty( $dep[ 1 ] ) ) {
		$array[ 'dependency' ] = array(
			'element' => $dep[ 0 ],
			'value'   => $dep[ 1 ],
		);
	}

	return $array;
}

function actavista_vc_sm_column( $dep = array( 'dep_go' => '', 'dep_set' => '' ) ) {
	$array = array(
		'group'      => esc_html__( 'Responsive Options', 'actavista' ),
		'heading'    => esc_html__( 'Small Device Column', 'actavista' ),
		'type'       => 'dropdown',
		'value'      => array(
			esc_html__( '1 Column', 'actavista' ) => 'vc_col-sm-12',
			esc_html__( '2 Column', 'actavista' ) => 'vc_col-sm-6',
			esc_html__( '3 Column', 'actavista' ) => 'vc_col-sm-4',
			esc_html__( '4 Column', 'actavista' ) => 'vc_col-sm-3'
		),
		'param_name' => 'vc_col_sm_size',
	);
	if ( ! empty( $dep[ 0 ] ) && ! empty( $dep[ 1 ] ) ) {
		$array[ 'dependency' ] = array(
			'element' => $dep[ 0 ],
			'value'   => $dep[ 1 ],
		);
	}

	return $array;
}

function actavista_vc_xs_column( $dep = array( 'dep_go' => '', 'dep_set' => '' ) ) {
	$array = array(
		'group'      => esc_html__( 'Responsive Options', 'actavista' ),
		'heading'    => esc_html__( 'Extra Small Device Column', 'actavista' ),
		'type'       => 'dropdown',
		'value'      => array(
			esc_html__( '1 Column', 'actavista' ) => 'vc_col-xs-12',
			esc_html__( '2 Column', 'actavista' ) => 'vc_col-xs-6',
			esc_html__( '3 Column', 'actavista' ) => 'vc_col-xs-4',
			esc_html__( '4 Column', 'actavista' ) => 'vc_col-xs-3'
		),
		'param_name' => 'vc_col_xs_size',
	);
	if ( ! empty( $dep[ 0 ] ) && ! empty( $dep[ 1 ] ) ) {
		$array[ 'dependency' ] = array(
			'element' => $dep[ 0 ],
			'value'   => $dep[ 1 ],
		);
	}

	return $array;
}

function actavista_vc_lg_custom_image() {
	return array(
		'group'       => esc_html__( 'Image Custom Size', 'actavista' ),
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Desktop Image Size', 'actavista' ),
		'param_name'  => 'lg',
		'description' => esc_html__( 'Enter the image size for desktop device like (300x200)', 'actavista' )
	);
}

function actavista_vc_tb_custom_image() {
	return array(
		'group'       => esc_html__( 'Image Custom Size', 'actavista' ),
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Tablet Image Size', 'actavista' ),
		'param_name'  => 'tb',
		'description' => esc_html__( 'Enter the image size for tablet device like (300x200)', 'actavista' )
	);
}

function actavista_vc_mb_custom_image() {
	return array(
		'group'       => esc_html__( 'Image Custom Size', 'actavista' ),
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Mobile Image Size', 'actavista' ),
		'param_name'  => 'mb',
		'description' => esc_html__( 'Enter the image size for mobile device like (300x200)', 'actavista' )
	);
}

function actavista_page_query() {

	$q_obj = get_queried_object();
	if ( ! empty( $q_obj ) && is_home() ) {
		$page_id = $q_obj->ID;
	} elseif ( function_exists( 'WC' ) && is_cart() ) {
		$page_id = wc_get_page_id( 'cart' );
	} elseif ( function_exists( 'WC' ) && is_checkout() ) {
		$page_id = wc_get_page_id( 'checkout' );
	} elseif ( function_exists( 'WC' ) && is_account_page() ) {
		$page_id = wc_get_page_id( 'myaccount' );
	} elseif ( function_exists( 'WC' ) && is_product() ) {
		$page_id = get_the_ID();
	} elseif ( function_exists( 'WC' ) && ( is_woocommerce() || is_shop() ) ) {
		$page_id = get_option( 'woocommerce_shop_page_id' );
	} else {
		$page_id = get_the_ID();
	}

	return $page_id;
}

function actavista_cart_fregment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
		<a class="shopped-items" href="<?php echo esc_url(wc_get_cart_url() ); ?>">
			<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 423.416 423.416" style="enable-background:new 0 0 423.416 423.416;" xml:space="preserve">
                            <g>
                                <g>
                                    <g>
                                        <path d="M420.688,145.096c-2.069-2.033-4.961-2.997-7.837-2.612H300.525V92.851c0-49.052-39.764-88.816-88.816-88.816
                                            s-88.816,39.764-88.816,88.816v49.633H10.565c-3.135,0-6.269,0-7.837,2.612c-2.106,2.024-3.083,4.954-2.612,7.837L39.3,367.137
                                            c5.474,29.881,31.275,51.746,61.649,52.245h221.518c30.461-0.749,56.208-22.787,61.649-52.767L423.3,152.933
                                            C423.771,150.05,422.794,147.12,420.688,145.096z M143.79,92.851c0-37.51,30.408-67.918,67.918-67.918
                                            c37.51,0,67.918,30.408,67.918,67.918v49.633H143.79V92.851z M363.218,364.002c-3.519,19.801-20.641,34.289-40.751,34.482
                                            H100.949c-20.11-0.193-37.232-14.68-40.751-34.482l-37.094-200.62h377.208L363.218,364.002z"/>
                                        <path d="M290.076,265.259c5.771,0,10.449-4.678,10.449-10.449v-31.347c0-5.771-4.678-10.449-10.449-10.449
                                            c-5.771,0-10.449,4.678-10.449,10.449v31.347C279.626,260.581,284.305,265.259,290.076,265.259z"/>
                                        <path d="M133.341,265.259c5.771,0,10.449-4.678,10.449-10.449v-31.347c0-5.771-4.678-10.449-10.449-10.449
                                            c-5.771,0-10.449,4.678-10.449,10.449v31.347C122.892,260.581,127.57,265.259,133.341,265.259z"/>
                                    </g>
                                </g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            </svg>
			<span><?php echo WC()->cart->get_cart_contents_count(); ?></span>
		</a>
	<?php
	$fragments[ '.shopped-items' ] = ob_get_clean();
	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'actavista_cart_fregment', 10 );


//Demo Import Files Starts Here

function ocdi_import_files()
{
	return [
		[
			'import_file_name'           => 'Demo Import 1',
			'categories'                 => ['Main Demo', 'Demo 2'],
			'import_file_url'            => 'https://webinane-themes-plugins.s3.amazonaws.com/actavista/import/content.xml',
			'import_widget_file_url'     => 'https://webinane-themes-plugins.s3.amazonaws.com/actavista/import/widgets.wie',
			'import_customizer_file_url' => 'https://webinane-themes-plugins.s3.amazonaws.com/actavista/import/customizer.dat',
			'import_redux'               => [
				[
					'file_url'    => 'https://webinane-themes-plugins.s3.amazonaws.com/actavista/import/redux_options.json',
					'option_name' => 'actavista_options',
				],
			],
			'import_preview_image_url'   => 'https://webinane-themes-plugins.s3.amazonaws.com/actavista/import/demo-1.png',
			'preview_url'                => 'https://stage.actavista.webinane.com',
		],

	];
}
add_filter('ocdi/import_files', 'ocdi_import_files');

function ocdi_register_plugins($plugins)
{
	$theme_plugins = [
		[
			'name'        => 'Actavista',
			'description' => 'Actavista Core Plugin',
			'slug'        => 'actavista',  // The slug has to match the extracted folder from the zip.
			'source'      => 'https://webinane-themes-plugins.s3.amazonaws.com/actavista/actavista.zip',
			'preselected' => true,
			'required'	=>	true,
		],
		[
			'name'        => 'Lifeline Donation Pro',
			// 'description' => 'Actavista Core Plugin',
			'slug'        => 'lifeline-donation-pro',  // The slug has to match the extracted folder from the zip.
			'source'      => 'https://webinane-themes-plugins.s3.amazonaws.com/lifeline-donation-pro.zip',
			'preselected' => true,
			'required'	=>	false,
		],
		[
			'name'        => 'Visual Composer',
			// 'description' => 'Actavista Core Plugin',
			'slug'        => 'js_composer',  // The slug has to match the extracted folder from the zip.
			'source'      => 'https://webinane-themes-plugins.s3.amazonaws.com/js_composer.zip',
			'preselected' => true,
			'required'	=>	true,
		],
		[
			'name'        => 'Revolution Slider',
			// 'description' => 'Actavista Core Plugin',
			'slug'        => 'revslider',  // The slug has to match the extracted folder from the zip.
			'source'      => 'https://webinane-themes-plugins.s3.amazonaws.com/revslider.zip',
			'preselected' => true,
			'required'	=>	true,
		],
		[
			'name'        => 'Envato Market',
			// 'description' => 'Actavista Core Plugin',
			'slug'        => 'envato-market',  // The slug has to match the extracted folder from the zip.
			'source'      => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
			'preselected' => true,
			'required'	=>	false,
		],
		[
			'name'        => 'Webinane Redux',
			// 'description' => 'Actavista Core Plugin',
			'slug'        => 'webinane-redux',  // The slug has to match the extracted folder from the zip.
			'source'      => 'https://webinane-themes-plugins.s3.amazonaws.com/webinane-redux-v4.1.24.zip',
			'preselected' => true,
			'required'	=>	true,
		],

		[ // A WordPress.org plugin repository example.
			'name'     => 'Contact Form 7', // Name of the plugin.
			'slug'     => 'contact-form-7', // Plugin slug - the same as on WordPress.org plugin repository.
			'required' => true,                     // If the plugin is required or not.
		],

		[ // A WordPress.org plugin repository example.
			'name'     => 'Mailchimp For Wordpress', // Name of the plugin.
			'slug'     => 'mailchimp-for-wp', // Plugin slug - the same as on WordPress.org plugin repository.
			'required' => true,                     // If the plugin is required or not.
		],
		[ // A WordPress.org plugin repository example.
			'name'     => 'Wired Impact Volunteer Management', // Name of the plugin.
			'slug'     => 'wired-impact-volunteer-management', // Plugin slug - the same as on WordPress.org plugin repository.
			'required' => true,                     // If the plugin is required or not.
		],
		[ // A WordPress.org plugin repository example.
			'name'     => 'WooCommerce', // Name of the plugin.
			'slug'     => 'woocommerce', // Plugin slug - the same as on WordPress.org plugin repository.
			'required' => true,                     // If the plugin is required or not.
		],
		[ // A WordPress.org plugin repository example.
			'name'     => 'Variation Swatches For WooCommerce', // Name of the plugin.
			'slug'     => 'variation-swatches-for-woocommerce', // Plugin slug - the same as on WordPress.org plugin repository.
			'required' => true,                     // If the plugin is required or not.
		],

		[ // A WordPress.org plugin repository example.
			'name'     => 'WP Classic Editor for Old Post Editor', // Name of the plugin.
			'slug'     => 'classic-editor', // Plugin slug - the same as on WordPress.org plugin repository.
			'required' => true,                     // If the plugin is required or not.
		],


	];

	return array_merge($plugins, $theme_plugins);
}

function import_slider_revolution_slides($slide_path)
{
	// Check if Slider Revolution plugin is activated.
	if (class_exists('RevSlider')) {
		// Load the RevSlider class.
		$rev_slider = new RevSlider();

		// Import the slides.
		$import_result = $rev_slider->importSliderFromPost(true, true, $slide_path);

		// Check if import was successful.
		if (is_array($import_result) && !empty($import_result['success'])) {
			return true; // Slides imported successfully.
		} else {
			return false; // Failed to import slides.
		}
	} else {
		return false; // Slider Revolution plugin is not activated.
	}
}

add_filter('ocdi/register_plugins', 'ocdi_register_plugins');
function ocdi_after_import_setup()
{
	// Assign menus to their locations.
	$main_menu = get_term_by('name', 'Main Menu', 'nav_menu');
	$footer_menu = get_term_by('name', 'Footer Menu', 'nav_menu');
	set_theme_mod(
		'nav_menu_locations',
		[
			'main_menu' => $main_menu->term_id, // replace 'main_menu' here with the menu location identifier from register_nav_menu() function in your theme.
			'footer_menu' => $footer_menu->term_id,
		]
	);

	// Get the front page.
	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title('Political Party Layout');
	$blog_page_id  = get_page_by_title('Our Blog');

	update_option('show_on_front', 'page');
	update_option('page_on_front', $front_page_id->ID);
	update_option('page_for_posts', $blog_page_id->ID);

	// Import Slider Revolution slides.
	$slide_paths = [
		get_template_directory() . '/import/slides/slidess.zip',
		get_template_directory() . '/import/slides/activista-slide.zip',
		get_template_directory() . '/import/slides/home6.zip',

	];

	foreach ($slide_paths as $slide_path) {
		import_slider_revolution_slides($slide_path);
	}

	echo 'Slides imported successfully.';
}

add_action('ocdi/after_import', 'ocdi_after_import_setup');
/**
 * Import Slider Revolution slides.
 *
 * @param string $slide_path The path to the slide file (local path or URL).
 * @return bool True on success, false on failure.
 */

function ocdi_change_time_of_single_ajax_call() {
    return 5;
}
add_filter( 'ocdi/time_for_one_ajax_call', 'ocdi_change_time_of_single_ajax_call' );
add_filter( 'ocdi/regenerate_thumbnails_in_content_import', '__return_false' );
