<?php
require_once get_template_directory() . '/includes/loader.php';

add_action('after_setup_theme', 'actavista_setup_theme');


function actavista_setup_theme()
{

	load_theme_textdomain('actavista', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');
	add_theme_support('woocommerce');
	add_theme_support('custom-header');
	add_theme_support('custom-background');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');



	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(array(
		'main_menu'	 => esc_html__('Main Menu', 'actavista'),

		'topbar_menu'	 => esc_html__('Header 7 Top Bar Menu', 'actavista'),

		'res_menu'   => esc_html__('Responsive Menu', 'actavista'),

		'footer_menu'   => esc_html__('Footer Menu', 'actavista'),
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support('html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support('post-formats', array(
		'standard',
		'video',
		'gallery',
		'audio',
	));

	// Add theme support for Custom Logo.
	add_theme_support('custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	));

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	// add_action( 'admin_init', 'actavista_admin_init', 2000000 );
}

/**
 * [actavista_widgets_init]
 *
 * @param  array  $data [description]
 * @return [type]       [description]
 */
function actavista_widgets_init()
{

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod(ACTAVISTA_NAME . '_options-mods');

	// register_widget( '\ACTAVISTA\Includes\Library\Widgets\Static_Block' );
	// register_widget( '\ACTAVISTA\Includes\Library\Widgets\actavista_product_multi_filter_Widget' );

	register_sidebar(array(
		'name' => esc_html__('Default Sidebar', 'actavista'),
		'id' => 'default-sidebar',
		'description' => esc_html__('Widgets in this area will be shown on the right-hand side.', 'actavista'),
		'before_widget' => '<div class="sidebar"><div id="%1$s" class="%2$s widget">',
		'after_widget' => '</div></div>',
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4></div>',
	));

	register_sidebar(array(
		'name' => esc_html__('Footer Sidebar', 'actavista'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown on the footer.', 'actavista'),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4></div>',
	));

	if (!is_object(actavista_WSH())) {
		return;
	}

	$sidebars = actavista_set($theme_options, 'custom_sidebar_name');

	foreach (array_filter((array) $sidebars) as $sidebar) {

		if (actavista_set($sidebar, 'topcopy')) {
			continue;
		}

		$name = $sidebar;
		if (!$name) {
			continue;
		}
		$slug = str_replace(' ', '_', $name);

		register_sidebar(array(
			'name' => $name,
			'id' => sanitize_title($slug),
			'before_widget' => '<div class="sidebar"><div id="%1$s" class="%2$s widget">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class="widget-title"><h4>',
			'after_title' => '</h4></div>',
		));
		register_sidebar(array(
			'id' => 'filter-sidebar',
			'name' => esc_html__('Filter Sidebar', "konia"),
			'desc' => esc_html__('This sidebar is used as a side filter of shop page', "konia"),
			'before_widget' => '<div id="%1$s" class="%2$s widget">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		));
	}

	update_option('wp_registered_sidebars', $wp_registered_sidebars);
}
add_action('widgets_init', 'actavista_widgets_init');

/**
 * [actavista_admin_init actavista_widgets_init]
 *
 * @param  array  $data [description]
 * @return [type]       [description]
 */


// function actavista_admin_init() {
// 	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
// }
// require_once( get_template_directory() . '/envato_setup/envato_setup.php' );
// add_filter('actavista_theme_setup_wizard_username', 'actavista_set_theme_setup_wizard_username', 10);
// if( ! function_exists('actavista_set_theme_setup_wizard_username') ){
//     function actavista_set_theme_setup_wizard_username($username){
//         return 'webinane';
//     }
// }

// add_filter('actavista_theme_setup_wizard_oauth_script', 'actavista_set_theme_setup_wizard_oauth_script', 10);
// if( ! function_exists('actavista_set_theme_setup_wizard_oauth_script') ){
//     function actavista_set_theme_setup_wizard_oauth_script($oauth_url){
//         return 'http://api.webinane.com/envato/api/server-script.php';
//     }
// }
/**
 * [actavista_set description]
 *
 * @param  array  $data [description]
 * @return [type]       [description]
 */
if (!function_exists('actavista_set')) {
	function actavista_set($var, $key, $def = '')
	{
		//if( ! $var ) return false;

		if (is_object($var) && isset($var->$key)) return $var->$key;
		elseif (is_array($var) && isset($var[$key])) return $var[$key];
		elseif ($def) return $def;
		else return false;
	}
}


/**
 * [actavista_get_categories description]
 *
 * @param  array  $data [description]
 * @return [type]       [description]
 */

function actavista_get_categories($arg = FALSE, $slug = FALSE, $vp = FALSE)
{
	global $wp_taxonomies;

	$categories = get_categories($arg);
	$cats = array();

	if (is_wp_error($categories)) {
		return array('' => 'All');
	}

	if (actavista_set($arg, 'show_all') && $vp) {
		$cats[] = array('value' => 'all', 'label' => esc_html__('All Categories', 'actavista'));
	} elseif (actavista_set($arg, 'show_all')) {
		$cats['all'] = esc_html__('All Categories', 'actavista');
	}

	if (!actavista_set($categories, 'errors')) {
		foreach ($categories as $category) {
			if ($vp) {
				$key = ($slug) ? $category->slug : $category->term_id;
				$cats[] = array('value' => $key, 'label' => $category->name);
			} else {
				$key = ($slug) ? $category->slug : $category->term_id;
				$cats[$key] = $category->name;
			}
		}
	}
	return $cats;
}

/**
 * [actavista_custom_menu_options description]
 *
 * @param  array  $data [description]
 * @return [type]       [description]
 */

function actavista_custom_menu_options()
{
	$menus = wp_get_nav_menus();
	$menu = array();

	foreach ($menus as $key => $value) {
		$slug = actavista_set($value, 'slug');
		$label = str_replace("_", " ", $slug);
		$menu[$slug] = $label;
	}
	return $menu;
}

add_filter('get_header', 'actavista_under_construction');


/**
 * [actavista_under_construction description]
 */
function actavista_under_construction()
{

	if (!is_admin() && !is_user_logged_in()) {

		$options = actavista_WSH()->option();
		if ($options->get('comingsoon_page')) {

			wp_enqueue_script('owl-carousel');

			get_template_part('comingsoon');

			exit;
		}
	}
}

/**
 * [actavista_get_mc_lists description]
 */

function actavista_get_mc_lists($assos = true)
{

	if (!function_exists('mc4wp')) {

		return array();
	}
	if (!class_exists('MC4WP_Mailchimp')) {

		require_once MC4WP_PLUGIN_DIR . '/includes/class-mailchimp.php';
	}
	$mc4 = new MC4WP_Mailchimp();

	$lists = [];
	if (method_exists($mc4, 'get_lists')) {
		$lists = $mc4->get_lists();

		if ($assos) {

			$return = array();

			foreach ($lists as $list) {

				$return[$list->id] = $list->name;
			}

			return $return;
		}
	}
	return $lists;
}


/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since actavista 1.0
 */
function actavista_twitter_tweets($settings)
{

	include_once(ABSPATH . 'wp-content/plugins/actavista/codebird.php');
	$options = actavista_WSH()->option();

	if (class_exists('Codebird'))

		Codebird::setConsumerKey($options->get('twitter_api'), $options->get('twitter_api_secret'));
	$cb = Codebird::getInstance();

	$cb->setToken($options->get('twitter_token'), $options->get('twitter_token_Secret'));

	$params = array(
		'screen_name' => actavista_set($settings, 'screen_name'),
		'count' => actavista_set($settings, 'count'),
		'exclude_replies' => 0,
		'include_rts' => 0,
		'include_entities' => 0,
		'trim_user' => false,
		'contributor_details' => false,
	);
	$reply = $cb->statuses_userTimeline($params);

	unset($reply->httpstatus);
	echo json_encode($reply);
}

remove_action('template_redirect', 'rest_output_link_header', 11, 0);
remove_action('wp_head', 'rest_output_link_wp_head', 10);





function actavista_blog_the_pagination()
{

	if (is_singular())
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if ($wp_query->max_num_pages <= 1)
		return;

	$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
	$max   = intval($wp_query->max_num_pages);

	/** Add current page to the array */
	if ($paged >= 1)
		$links[] = $paged;

	/** Add the pages around the current page to the array */
	if ($paged >= 3) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if (($paged + 2) <= $max) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<ul class="pagination">' . "\n";

	/** Previous Post Link */
	if (get_previous_posts_link())
		printf('<li class="prev">%s</li>' . "\n", get_previous_posts_link(esc_html__('Previous Post', 'actavista')));

	/** Link to first page, plus ellipses if necessary */
	if (!in_array(1, $links)) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

		if (!in_array(2, $links))
			echo '<li class="dots-pagi">…</li>';
	}

	/** Link to current page, plus 2 pages in either direction if necessary */
	sort($links);
	foreach ((array) $links as $link) {
		$class = $paged == $link ? ' class="active"' : '';
		printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
	}

	/** Link to last page, plus ellipses if necessary */
	if (!in_array($max, $links)) {
		if (!in_array($max - 1, $links))
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
	}

	/** Next Post Link */
	if (get_next_posts_link())
		printf('<li class="next">%s</li>' . "\n", get_next_posts_link(esc_html__('Next Post', 'actavista')));

	echo '</ul>' . "\n";
}

function actavista_get_image_id($image_url)
{
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url));
	return $attachment[0];
}

function actavista_redux_custom_fonts_load($custom_font)
{

	$custom_style = '';

	$pathinfo = pathinfo($custom_font);

	if ($filename = actavista_set($pathinfo, 'filename')) {
		$custom_style .= '@font-face{
			font-family:"' . $filename . '";';
		$extensions   = array('eot', 'woff', 'woff2', 'ttf', 'svg');
		$count        = 0;
		foreach ($extensions as $extension) {
			$file_path = home_url() . '/wp-content/themes/actavista/assets/css/custom-fonts/' . $filename . '.' . $extension;

			$file_url  = get_template_directory_uri() . '/assets/css/custom-fonts/' . $filename . '.' . $extension;

			if ($file_path) {
				$format = $extension;
				if ($extension === 'eot') {
					$format = 'embedded-opentype';
				}
				if ($extension === 'ttf') {
					$format = 'truetype';
				}
				$terminated   = ($count > 0) ? ';' : '';
				$custom_style .= $terminated . 'src:url("' . $file_url . '") format("' . $format . '")';

				$count++;
			}
		}

		$custom_style .= ';}';
	}

	return $custom_style;
}



function vc_iconpicker_type_flaticons($icons)
{

	$subject = actavista_set(wp_remote_get(get_template_directory_uri() . '/assets/css/flaticon.css'), 'body');
	$pattern = '/\.(flaticon-(?:\w+(?:-)?)+):before\s*{\s*content/';

	preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);

	$iconss = array();
	foreach ($matches as $match) {
		$iconss[] = array($match[1] => $match[1]);
	}

	return array_merge($icons, $iconss);
}

add_filter('vc_iconpicker-type-flaticons', 'vc_iconpicker_type_flaticons');

add_action('init', 'remove_redirect');
function remove_redirect()
{

	remove_action('admin_init', array('Give_Welcome', 'welcome'));
	remove_action('admin_init', 'vc_page_welcome_redirect');
}


add_filter('webinane_commerce_register_metabox_causes_settings', 'webinane_commerce_causes_metabox_filter');
function webinane_commerce_causes_metabox_filter($metabox)
{
	$metabox['fields'] = array(
		array(
			'name'       => esc_html__('Donation Need (USD)', 'wp-commerce'),
			'desc'       => esc_html__('Enter the donation amount in USD currency', 'wp-commerce'),
			'id'         => 'donation',
			'type'       => 'number',
			'is'       	 => 'wpcm-number',
		),
	);

	return $metabox;
}

// add_filter('webinane_settings_donation_settings', function($fields){

//     $my = webinane_array($fields)->filter(function($value){
//         return $value['id'] !== 'donation_projects_status';
//     });
//     // printr($my);
//     return $my;
// });

/*add_filter('webinane_settings_donation_settings', function($fields){
    $my = webinane_array($fields)->filter(function($value){
        return $value['id'] !== 'donation_Cpost_type';
    });
    print_r($my); 'mehak';
    return $my;
});
*/


function getFontsData($fontsString)
{

	if (!isset($fontsString)) {
		return;
	}

	// Font data Extraction
	$googleFontsParam = new Vc_Google_Fonts();
	$fieldSettings = array();
	$fontsData = strlen($fontsString) > 0 ? $googleFontsParam->_vc_google_fonts_parse_attributes($fieldSettings, $fontsString) : '';
	return $fontsData;
}

// Build the inline style starting from the data
function googleFontsStyles($fontsData)
{

	if (!isset($fontsData)) {
		return;
	}

	if (!empty($fontsData)) {
		$fontFamily = explode(':', $fontsData['values']['font_family']);

		$styles[] = 'font-family:' . $fontFamily[0];
		$fontStyles = explode(':', $fontsData['values']['font_style']);
		$styles[] = 'font-weight:' . $fontStyles[1];
		$styles[] = 'font-style:' . $fontStyles[2];

		$inline_style = '';
		foreach ($styles as $attribute) {
			$inline_style .= $attribute . '; ';
		}

		return $inline_style;
	}
}
// Enqueue right google font from Googleapis
function enqueueGoogleFonts($fontsData)
{

	// Get extra subsets for settings (latin/cyrillic/etc)
	$settings = get_option('wpb_js_google_fonts_subsets');

	if (is_array($settings) && !empty($settings)) {
		$subsets = '&subset=' . implode(',', $settings);
	} else {
		$subsets = '';
	}
	//printr($fontsData['values']['font_family']);
	// We also need to enqueue font from googleapis
	if (isset($fontsData['values']['font_family'])) {
		wp_enqueue_style(
			'vc_google_fonts_' . vc_build_safe_css_class($fontsData['values']['font_family']),
			'//fonts.googleapis.com/css?family=' . $fontsData['values']['font_family'] . $subsets
		);
	}
}
function deactivate_old_donation_plugin()
{
	deactivate_plugins('webinane-donation/webinane-donation.php');
}
add_action('admin_init', 'deactivate_old_donation_plugin');


