<?php
add_filter( 'vc_autocomplete_our_blog_cat_callback', 'actavista_TaxonomyAutocompleteSuggester', 10, 3 );
return array(
	'name'     => esc_html__( 'Our Blog', 'actavista' ),
	'base'     => 'our_blog',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Main Title', 'actavista' ),
				'group'             => esc_html__( 'General Settings', 'actavista' ),
			'param_name'        => 'main_title',
			'description'       => esc_html__( 'Enter main title to show.','actavista')
		),   	
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
			'description'       => esc_html__( 'Select sorting order ascending or descending for posts.', 'actavista' ),
		),
		array(
			'type'        => 'autocomplete',
			'class'       => '',
			'heading'     => esc_html__( 'Select Blog Category', 'actavista' ),
			'param_name'  => 'cat',
			'query_args'  => array( 'taxonomy' => 'category' ),
			'group'       => esc_html__( 'General Settings', 'actavista' ),
			'settings'    => array( 'multiple' => true ),
			'description' => esc_html__( 'Choose blog posts categories for which events you want to show', 'actavista' ),
		),
		array(
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'show_format_icn',
			'group'             => esc_html__( 'Show|Hide Options', 'actavista' ),
			'value'             => array( 'Enable Post Format Icon' => 'true' ),
			'description'       => esc_html__( 'Enable to show post format icon on post image.', 'actavista' ),
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
			'param_name'        => 'show_blog_date',
			'group'             => esc_html__( 'Show|Hide Options', 'actavista' ),
			'value'             => array( 'Enable Post Date' => 'true' ),
			'description'       => esc_html__( 'Enable to show post date.', 'actavista' ),
		),
		array(
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'show_blog_author',
			'group'             => esc_html__( 'Show|Hide Options', 'actavista' ),
			'value'             => array( 'Enable Post Author' => 'true' ),
			'description'       => esc_html__( 'Enable to show post author.', 'actavista' ),
		),
		array(
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'show_blog_cat',
			'group'             => esc_html__( 'Show|Hide Options', 'actavista' ),
			'value'             => array( 'Enable Post Category' => 'true' ),
			'description'       => esc_html__( 'Enable to show post category.', 'actavista' ),
		),
		array(
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'show_event_location',
			'group'             => esc_html__( 'Show|Hide Options', 'actavista' ),
			'value'             => array( 'Enable Event Location' => 'true' ),
			'description'       => esc_html__( 'Enable to show event location.', 'actavista' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Image Width', 'actavista' ),
			'param_name'        => 'width',
			'group'             => esc_html__( 'Post Image', 'actavista' ),
			'description'       => esc_html__( 'Enter custom image width like 200, 400, 450. Note: leave it blank if you wants to use default image width.', 'actavista' ),
		),
		
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Image Height', 'actavista' ),
			'param_name'        => 'height',
			'group'             => esc_html__( 'Post Image', 'actavista' ),
			'description'       => esc_html__( 'Enter custom image height like 200, 400, 450. Note: leave it blank if you wants to use default image width.', 'actavista' ),
		),
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Select Columns', 'actavista' ),
			'param_name'        => 'columns',
			'group'             => esc_html__( 'Column Setting', 'actavista' ), 
			'value'             => array( esc_html__( '2 Columns', 'actavista' ) => 'col-lg-6',  esc_html__( '3 Columns', 'actavista' ) => 'col-lg-4', esc_html__( '4 Columns', 'actavista' ) => 'col-lg-3'),
			'description'       => esc_html__( 'Select columns to show in these section', 'actavista' ),
			 'std'              => 'col-lg-4',
		), 
	),
);