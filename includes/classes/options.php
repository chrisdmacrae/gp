<?php

/**
 * @package     LifeLine
 * @author      webinane team <support@webinane.com>
 * @since       5.0.0
 */

namespace ACTAVISTA\Includes\Classes;

class Options {

	private $opt_name = ACTAVISTA_NAME . '_options';

	private $menu_title = '';

	private $page_title = '';

	private $menu_type = 'submenu';

	private $page_slug = ACTAVISTA_NAME . '_options';

	private $customizer = false;

	private $admin_bar_icon = 'dashicons-portfolio';

	private $page_parent = 'themes.php';

	private $menu_icon = 'dashicons-settings';

	private $docs_link = 'https://docs.webinane.com';

	private $google_api_key = '';
	private $global_variable = ACTAVISTA_NAME . '_options';

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		if ( class_exists( 'Redux' ) &&  function_exists('actavista_flat_icons') ) {
			
		
			\Redux::set_extensions( $this->opt_name, ACTAVISTA_PLUGIN_PATH . 'redux-extensions' );
			$this->menu_title = esc_html__( 'Actavista Options', 'lifeline-plugin' );
			$this->page_title = esc_html__( 'Actavista Options', 'lifeline-plugin' );
			$this->args();
			$this->sectionHookedFiles();
			$this->sections();
		}
		//add_action('redux/options/' . $this->opt_name . '/compiler', [$this, 'compiler'], 10, 3);
	}

	/**
	 * args
	 *
	 * @return void
	 */
	public function args() {
		$theme                     = wp_get_theme();
		
	    $args = array(
	    	/*TYPICAL -> Change these values as you need/desire*/
	    	'opt_name' => $this->opt_name,
	    	/*This is where your data is stored in the database and also becomes your global variable name.*/
	    	'display_name' => $theme->get('Name'),
	    	/*Name that appears at the top of your panel*/
	    	'display_version' => $theme->get('Version'),
	    	/*Version that appears at the top of your panel*/
	    	'menu_type' => $this->menu_type,
	    	/*Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)*/
	    	'allow_sub_menu' => true,
	    	/*Show the sections below the admin menu item or not*/
	    	'menu_title' => $this->menu_title,
	    	'page_title' => $this->page_title,
            /*You will need to generate a Google API key to use this feature.
            Please visit: https://developers.google.com/fonts/docs/developer_api#Auth*/
            'google_api_key' => $this->google_api_key,
            /*Set it you want google fonts to update weekly. A google_api_key value is required.*/
            'google_update_weekly' => false,
            /*Must be defined to add google fonts to the typography module*/
            'async_typography' => true,
            /*Use a asynchronous font on the front end or font string
            'disable_google_fonts_link' => true,                     Disable this in case you want to create your own google fonts loader*/
            'admin_bar' => true,
            /*Show the panel pages on the admin bar*/
            'admin_bar_icon' => $this->admin_bar_icon,
            /*Choose an icon for the admin bar menu*/
            'admin_bar_priority' => 50,
            /*Choose an priority for the admin bar menu*/
            'global_variable' => 'actavista_opt_name',
            /*Set a different name for your global variable other than the opt_name*/
            'dev_mode' => false,
            /*Show the time the page took to load, etc*/
            'update_notice' => false,
            /*If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo*/
            'customizer' => $this->customizer,
            /*Enable basic customizer support
            'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
            'disable_save_warn' => true,                    // Disable the save warning when a user changes a field*/

            /*OPTIONAL -> Give you extra features*/
            'page_priority' => null,
            /*Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.*/
            'page_parent' => $this->page_parent,
            /*For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters*/
            'page_permissions' => 'manage_options',
            /*Permissions needed to access the options panel.*/
            'menu_icon' => '',
            /*Specify a custom URL to an icon*/
            'last_tab' => '',
            /*Force your panel to always open to a specific tab (by id)*/
            'page_icon' => 'icon-themes',
            /*Icon displayed in the admin panel next to your menu_title*/
            'page_slug' => $this->page_slug,
            /*Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided*/
            'save_defaults' => true,
            /*On load save the defaults to DB before user clicks save or not*/
            'default_show' => false,
            /*If true, shows the default value next to each field that is not the default value.*/
            'default_mark' => '',
            /*What to print by the field's title if the value shown is default. Suggested: **/
            'show_import_export' => true,
            /*Shows the Import/Export panel when not used as a field.*/
            /*CAREFUL -> These options are for advanced use only*/
            'transient_time' => 60 * MINUTE_IN_SECONDS,
            'output' => true,
            /*Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output*/
            'output_tag' => true,
            /*Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
            'footer_credit'     => '',                    Disable the footer credit of Redux. Please leave if you can help it.

            FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.*/
            'database' => 'theme_mods',
            /*possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!*/
            'use_cdn' => true,
            /*If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

            HINTS*/
            'hints' => array(
            	'icon' => 'el el-question-sign',
            	'icon_position' => 'right',
            	'icon_color' => 'lightgray',
            	'icon_size' => 'normal',
            	'tip_style' => array(
            		'color' => 'red',
            		'shadow' => true,
            		'rounded' => false,
            		'style' => '',
            	),
            	'tip_position' => array(
            		'my' => 'top left',
            		'at' => 'bottom right',
            	),
            	'tip_effect' => array(
            		'show' => array(
            			'effect' => 'slide',
            			'duration' => '500',
            			'event' => 'mouseover',
            		),
            		'hide' => array(
            			'effect' => 'slide',
            			'duration' => '500',
            			'event' => 'click mouseleave',
            		),
            	),
            ),
        );
		$args['admin_bar_links'][] = array(
			'id'    => 'lifeline-docs',
			'href'  => 'https://docs.webinane.com/lifeline/',
			'title' => esc_html__( 'Documentation', 'lifeline-plugin' ),
		);
		$args['admin_bar_links'][] = array(
			'id'    => 'lifeline-support',
			'href'  => 'https://webinane.ticksy.com/',
			'title' => esc_html__( 'Support', 'lifeline-plugin' ),
		);
		$args['admin_bar_links'][] = array(
			'id'    => 'lifeline-demos',
			'href'  => 'https://webinane.com/wp-themes/lifeline.php/',
			'title' => esc_html__( 'Demos', 'lifeline-plugin' ),
		);
		// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
		$args['share_icons'][] = array(
			'url'   => 'https://www.facebook.com/people/@/webinane',
			'title' => 'Like us on Facebook',
			'icon'  => 'el el-facebook',
		);
		$args['share_icons'][] = array(
			'url'   => 'https://twitter.com/webinane',
			'title' => 'Follow us on Twitter',
			'icon'  => 'el el-twitter',
		);
		$args['share_icons'][] = array(
			'url'   => 'https://www.linkedin.com/company/webinane-web-arcade',
			'title' => 'Find us on LinkedIn',
			'icon'  => 'el el-linkedin',
		);
		// Add content after the form.
		\Redux::set_args( $this->opt_name, $args );
		// phpcs:ignore WordPress
		do_action( 'actavista/plugin/after_redux_setup', $this->opt_name, $args );
	}

	/**
	 * sections
	 *
	 * @return void
	 */
	function sections() {
		include actavista_load_template( 'config/theme-options/general_setting.php' );
		include actavista_load_template( 'config/theme-options/api_key.php' );

		include actavista_load_template( 'config/theme-options/header_setting.php' );
		include actavista_load_template( 'config/theme-options/header1_setting.php' );

		include actavista_load_template( 'config/theme-options/header2_setting.php' );
		include actavista_load_template( 'config/theme-options/header3_setting.php' );
		include actavista_load_template( 'config/theme-options/header4_setting.php' );
		include actavista_load_template( 'config/theme-options/header5_setting.php' );
		include actavista_load_template( 'config/theme-options/header6_setting.php' );
		include actavista_load_template( 'config/theme-options/header7_setting.php' );
		include actavista_load_template( 'config/theme-options/responsive_header_setting.php' );
		include actavista_load_template( 'config/theme-options/main_menu_typography.php' );
		include actavista_load_template( 'config/theme-options/main_footer.php' );
		include actavista_load_template( 'config/theme-options/footer_setting.php' );
		include actavista_load_template( 'config/theme-options/footer2_setting.php' );
		include actavista_load_template( 'config/theme-options/footer3_setting.php' );
		include actavista_load_template( 'config/theme-options/blog_setting.php' );
		include actavista_load_template( 'config/theme-options/404_setting.php' );
		include actavista_load_template( 'config/theme-options/author_setting.php' );
		include actavista_load_template( 'config/theme-options/archive_setting.php' );
		include actavista_load_template( 'config/theme-options/category_setting.php' );
		include actavista_load_template( 'config/theme-options/tag_setting.php' );
		include actavista_load_template( 'config/theme-options/search_setting.php' );

		include actavista_load_template( 'config/theme-options/single_post_setting.php' );
		include actavista_load_template( 'config/theme-options/templates.php' );
		include actavista_load_template( 'config/theme-options/event_setting.php' );


		include actavista_load_template( 'config/theme-options/video_setting.php' );
		include actavista_load_template( 'config/theme-options/product_settings.php' );
		include actavista_load_template( 'config/theme-options/shop_settings.php' );

		include actavista_load_template( 'config/theme-options/comingsoon_setting.php' );
		
		include actavista_load_template( 'config/theme-options/custom_fonts_setting.php' );

		include actavista_load_template( 'config/theme-options/typography_setting.php' );
		include actavista_load_template( 'config/theme-options/heading_setting.php' );
		include actavista_load_template( 'config/theme-options/body_font_setting.php' );
		include actavista_load_template( 'config/theme-options/sidebar_setting.php' );
	}

	/**
	 * sectionHookedFiles
	 *
	 * @return void
	 */
	// phpcs:ignore WordPress
	function sectionHookedFiles() {
		$file_path = 'config/theme-options';

		return  actavista_load_template( "{$file_path}/general_setting.php" );
		return  actavista_load_template( "{$file_path}/api_key.php" );
		return  actavista_load_template( "{$file_path}/header_setting.php" );
		return  actavista_load_template( "{$file_path}/header1_setting.php" );
	
		return  actavista_load_template( "{$file_path}/header2_setting.php" );
		return  actavista_load_template( "{$file_path}/header3_setting.php" );
		return  actavista_load_template( "{$file_path}/header4_setting.php" );
		return  actavista_load_template( "{$file_path}/header5_setting.php" );
		return  actavista_load_template( "{$file_path}/header6_setting.php" );
		return  actavista_load_template( "{$file_path}/header7_setting.php" );
		return  actavista_load_template( "{$file_path}/responsive_header_setting.php" );
		return  actavista_load_template( "{$file_path}/main_menu_typography.php" );
		return  actavista_load_template( "{$file_path}/main_footer.php" );

		return  actavista_load_template( "{$file_path}/footer_setting.php" );
		return  actavista_load_template( "{$file_path}/footer2_setting.php" );

		return  actavista_load_template( "{$file_path}/footer3_setting.php" );
		return  actavista_load_template( "{$file_path}/blog_setting.php" );

		return  actavista_load_template( "{$file_path}/404_setting.php" );
		return  actavista_load_template( "{$file_path}/author_setting.php" );
		return  actavista_load_template( "{$file_path}/archive_setting.php" );
		return  actavista_load_template( "{$file_path}/category_setting.php" );
		
		return  actavista_load_template( "{$file_path}/tag_setting.php" );
		return  actavista_load_template( "{$file_path}/search_setting.php" );
		
		return  actavista_load_template( "{$file_path}/single_post_setting.php" );
		return  actavista_load_template( "{$file_path}/templates.php" );

		return  actavista_load_template( "{$file_path}/event_setting.php" );
		return  actavista_load_template( "{$file_path}/video_setting.php" );

		return  actavista_load_template( "{$file_path}/product_settings.php" );
		return  actavista_load_template( "{$file_path}/shop_settings.php" );

		return  actavista_load_template( "{$file_path}/comingsoon_setting.php" );
		
		
		return  actavista_load_template( "{$file_path}/custom_fonts_setting.php" );
		return  actavista_load_template( "{$file_path}/typography_setting.php" );
		
		return  actavista_load_template( "{$file_path}/heading_setting.php" );
		return  actavista_load_template( "{$file_path}/body_font_setting.php" );

		return  actavista_load_template( "{$file_path}/sidebar_setting.php" );
		
		
		
	}

	/**
	 * compiler
	 *
	 * @param  mixed $options
	 * @param  mixed $css
	 * @param  mixed $changed_values
	 * @return void
	 */
	function compiler( $options, $css, $changed_values ) {
		//$css = 'this is itest';
		global $wp_filesystem;

		$filename = get_theme_file_path() . 'assets/css/compiler.css';

		if ( empty( $wp_filesystem ) ) {
			require_once( ABSPATH . '/wp-admin/includes/file.php' );
			WP_Filesystem();
		}

		if ( $wp_filesystem ) {
			$wp_filesystem->put_contents(
				$filename,
				$css,
				FS_CHMOD_FILE // predefined mode settings for WP files
			);
		}
	}
}