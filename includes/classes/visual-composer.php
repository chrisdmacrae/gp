<?php 

namespace ACTAVISTA\Includes\Classes;

/**
 * Visual Composer array mapper and render the output.
 */
class Visual_Composer {

	/**
	 * [$maps description]
	 * @var array
	 */
	protected $maps = array(
		'custom_services',
		'leader_quote',
		'our_vision',
		'event_carousel',
		'our_blog',
		'twitter',
		'our_moto',
		'our_team',
		'accordions',
		'faqs',
		'testimonials',
		'galleryStyle1',
		'aboutUs',
		'our_moto2',
		'galleryStyle2',
		'clients',
		'upcoming_event',
		'activities',
		'stats',
		'stats2',
		
		'featured_carousel',
		'info_box',
		'contribute_now',
		'video_content',
		'banner_with_button',
		'clients2',
		'map',
		'contact_form',
		'heading_icon',
		'contact_info',
		'awards',
		'awards2',
		'awards3',
		'become_supporter',
		'heading3',
		'clients3',
		'post_tabs',
		'top_stories',
		'opinions',
		'login',
		'register',
		'video_banner',
		'footer_about',
		'footer_contact_form',
		'useful_links',
		'videos',
		'event_boxes',
		'video_filter',
		'events_grid',
		'latest_blog_post',
		'latest_twitter_post',
		'blog_post_tabs',
		'become_member',
		'upcoming_event2',
		'campaigns',
		'creative_banner',
		'latest_blogs',
		'social-signup',
		'footer_contact_info',
		'testimonial2',
		'history_listing',
		'donate_us',
		'gallery_2columns',
		'gallery_creative_grid',
		'gallery_masnory',
		'donation_banner',
		'featured_banner',
		'content_video_box',
		'icon_banner',
		'boxes_grids',
		'social-shares',
		'featured_carousel2',
		'heading',
		'galley_with_infos',
		'donate_banner',
        'social_icons_grids',
        'newsletter_form',
        'single_video_banner',
        'quote_with_content',
        'grid_filter_product',
        'masonary_filter_product',
	);

	/**
	 * [__construct description]
	 */
	function __construct() {

		if ( ! function_exists( 'vc_map' ) ) {
			return;
		}

		if( function_exists('lifeline_donation_init') && function_exists( 'wpcm_get_settings' )  ) {
			$this->maps[] = 'donation_banner2';
			$this->maps[] = 'donation_campaigns';
		
		}
		vc_set_default_editor_post_types( array( 'page', 'static_block' ) );


		add_action( 'vc_before_init', array( $this, 'init' ) );
	}

	/**
	 * VC Map main init
	 * @return void [description]
	 */
	function init() {

		// set vc as theme.
		vc_set_as_theme();

		if ( function_exists( 'vc_addshortcode_param' ) ) {
			vc_addshortcode_param( 'toggle', array( $this, 'toggle' ) );
		}

		$dir = get_stylesheet_directory() . '/shortcodes'; // First, set new directory for templates
		vc_set_shortcodes_templates_dir( $dir );

		// Map the params of existing elements.
		$this->map_params();

		$maps = apply_filters( 'actavista_vc_map', $this->maps );

		foreach ( $maps as $value) {
			
			$file = $this->get_file( $value );

			if ( file_exists( $file ) ) {

				$data = include $file;

				vc_map( $data );

				if ( function_exists( 'actavista_shortcode' ) ) {
					$tag = esc_attr( actavista_set( $data, 'base' ) );

					actavista_shortcode( $tag, array( $this, 'output' ) );
				}
			}
		}
	}

	function output( $atts, $content = null, $tag ) {

		$params = $this->shortcodeParams( $tag );

		ob_start();

		actavista_template_load( 'shortcodes/' . $tag . '.php', compact( 'atts', 'content', 'tag' ) );

		return ob_get_clean();	

	}

	function get_file( $tag ) {

		$file = actavista_template( 'includes/resource/vc_map/'.$tag . '.php' );
		$file = apply_filters( "actavista_vc_map_file_{$tag}", $file );

		return $file;
	}

	/**
	 * shortcode params from vc array.
	 *
	 * @param  string $tag shortcode tag
	 * @return array      params
	 */
	function shortcodeParams( $tag ) {

		$file = $this->get_file( $tag );

		if ( file_exists( $file ) ) {
			$data = include $file;

			return actavista_set( $data, 'params' );
		}

		return array();
	}

	function map_params() {

		$array = array(
			'vc_row',
		);

		foreach( $array as $file ) {

			$file = $this->get_file( $file );

			if ( file_exists( $file ) ) {
				$data = include $file;

				foreach ( $data as $key => $value) {
					
					foreach( $value as $param )	{
						vc_add_param( $key, $param );
					}
				}
			}
		}
	}


	/**
	 * Checkbox shortcode attribute type generator.
	 *
	 * @param $settings
	 * @param string $value
	 *
	 * @since 4.4
	 * @return string - html string.
	 */
	function toggle( $settings, $value ) {
		$output = '';
		if ( is_array( $value ) ) {
			$value = '';
		}
		$current_value = strlen( $value ) > 0 ? explode( ',', $value ) : array();
		$values = isset( $settings['value'] ) && is_array( $settings['value'] ) ? $settings['value'] : array( esc_html__( 'Yes', 'actavista' ) => 'true' );
		if ( ! empty( $values ) ) {
			foreach ( $values as $label => $v ) {
				$checked = count( $current_value ) > 0 && in_array( $v, $current_value ) ? ' checked' : '';
				$output .= ' <label class="vc_checkbox-label"><input id="'
				           . $settings['param_name'] . '-' . $v . '" value="'
				           . $v . '" class="wpb_vc_param_value tgl tgl-ios '
				           . $settings['param_name'] . ' ' . $settings['type'] . '" type="checkbox" name="'
				           . $settings['param_name'] . '"'

				           . $checked . '> '
				           . '<span class="tgl-btn" for="cb2"></span>'
				           . $label . '</label>';
			}
		}

		return $output;
	}
}
