<?php
add_filter( 'vc_autocomplete_video_filter_cats_callback', 'actavista_TaxonomyAutocompleteSuggester', 10, 3 );
return array(
	'name'     => esc_html__( 'Videos Filteration', 'actavista' ),
	'base'     => 'video_filter',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Heading', 'actavista' ),
			'param_name'        => 'title',
			'group'             => esc_html__( 'Heading Settings', 'actavista' ),
			'description'       => esc_html__( 'Enter heading that you wants to show.', 'actavista' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Tagline', 'actavista' ),
			'param_name'        => 'tagline',
			'group'             => esc_html__( 'Heading Settings', 'actavista' ),
			'description'       => esc_html__( 'Enter tagline that you wants to show.', 'actavista' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Number', 'actavista' ),
			'param_name'        => 'number',
			'group'             => esc_html__( 'General Settings', 'actavista' ),
			'description'       => esc_html__( 'Enter number of videos posts that you wants to show.', 'actavista' ),
		),
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Order', 'actavista' ),
			'param_name'        => 'order',
			'group'             => esc_html__( 'General Settings', 'actavista' ),
			'value'             => array(  esc_html__( 'Ascending', 'actavista' ) => 'ASC',esc_html__( 'Descending', 'actavista' ) => 'DESC' ),
			'description'       => esc_html__( 'Select sorting order ascending or descending for courses listing', 'actavista' ),
		),
		array(
			'type'        => 'autocomplete',
			'class'       => '',
			'heading'     => esc_html__( 'Select Videos Categories', 'actavista' ),
			'param_name'  => 'cats',
			'query_args'  => array( 'taxonomy' => 'video_cat' ),
			'group'       => esc_html__( 'General Settings', 'actavista' ),
			'settings'    => array( 'multiple' => true ),
			'description' => esc_html__( 'Choose videos categories for which cases you want to show', 'actavista' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title Limit', 'actavista' ),
			'param_name'        => 'title_limit',
			'group'             => esc_html__( 'General Settings', 'actavista' ),
			'description'       => esc_html__( 'Enter title characters limit.', 'actavista' ),
		),
		array(
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'show_post_date',
			'group'             => esc_html__( 'Show|Hide Options', 'actavista' ),
			'value'             => array( 'Enable Date' => 'true' ),
			'description'       => esc_html__( 'Enable to show post publish date.', 'actavista' ),
		),
		array(
			'type'              => 'param_group',
			'value'             => '',
			'heading'           => esc_html__( 'Add Social Icons', 'actavista' ),
			'group'           => esc_html__( 'Social Icons', 'actavista' ),
			'param_name'        => 'add_socials',
			'show_settings_on_create' => true,
			
			'params'            => array(
				array(
					'type'              => 'iconpicker',
					'class'             => '',
					'heading'           => esc_html__( 'Select Scial Icon', 'actavista' ),
					'param_name'        => 'social_icon',
					'description'       => esc_html__( 'Select social share icon.', 'actavista' ),
				),
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Social Profile URL', 'actavista' ),
					'param_name'        => 'social_url',
					'description'       => esc_html__( 'Enter social share URL.','actavista' )
				),
				array(
					'type'              => 'colorpicker',
					'class'             => '',
					'heading'           => esc_html__( 'Icon Color on Hover', 'actavista' ),
					'param_name'        => 'icon_color',
					'description'       => esc_html__( 'Select icon color.', 'actavista' ),
				),
			)
		),
	),
);
