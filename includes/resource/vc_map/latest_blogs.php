<?php
add_filter( 'vc_autocomplete_latest_blogs_cat_callback', 'actavista_TaxonomyAutocompleteSuggester', 10, 3 );
return array(
	'name'     => esc_html__( 'Creative Blog Style', 'actavista' ),
	'base'     => 'latest_blogs',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Number', 'actavista' ),
			'param_name'        => 'number',
			'group'             => esc_html__( 'General Settings', 'actavista' ),
			'description'       => esc_html__( 'Enter number of posts that you wants to show.', 'actavista' ),
		),
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Order', 'actavista' ),
			'param_name'        => 'order',
			'group'             => esc_html__( 'General Settings', 'actavista' ),
			'value'             => array(  esc_html__( 'Ascending', 'actavista' ) => 'ASC',esc_html__( 'Descending', 'actavista' ) => 'DESC' ),
			'description'       => esc_html__( 'Select sorting order ascending or descending for events.', 'actavista' ),
		),
		array(
			'type'        => 'autocomplete',
			'class'       => '',
			'heading'     => esc_html__( 'Select Post Category', 'actavista' ),
			'param_name'  => 'cat',
			'query_args'  => array( 'taxonomy' => 'category' ),
			'group'       => esc_html__( 'General Settings', 'actavista' ),
			'settings'    => array( 'multiple' => true ),
			'description' => esc_html__( 'Choose blog posts categories for which events you want to show', 'actavista' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title Limit', 'actavista' ),
			'param_name'        => 'title_limit',
			'group'             => esc_html__( 'General Settings', 'actavista' ),
			'description'       => esc_html__( 'Enter title words limit.', 'actavista' ),
		),
	
		array(
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'show_date',
			'group'             => esc_html__( 'Show|Hide Options', 'actavista' ),
			'value'             => array( 'Enable Post Date' => 'true' ),
			'description'       => esc_html__( 'Enable to show post publish date.', 'actavista' ),
		),
		array(
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'show_author',
			'group'             => esc_html__( 'Show|Hide Options', 'actavista' ),
			'value'             => array( 'Enable Post Author' => 'true' ),
			'description'       => esc_html__( 'Enable to show post author.', 'actavista' ),
		),
	),
);
