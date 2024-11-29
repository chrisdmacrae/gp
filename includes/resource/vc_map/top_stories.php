<?php
return array(
	'name'     => esc_html__( 'Top Stories', 'actavista' ),
	'base'     => 'top_stories',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista Widgets', 'actavista' ),
	'params'   => array(
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title', 'actavista' ),
			'param_name'        => 'title',
			'description'       => esc_html__( 'Enter title that you wants to show.', 'actavista' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Number', 'actavista' ),
			'param_name'        => 'number',
			'description'       => esc_html__( 'Enter number of posts that you wants to show.', 'actavista' ),
		),
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Order', 'actavista' ),
			'param_name'        => 'order',
			'value'             => array(  esc_html__( 'Ascending', 'actavista' ) => 'ASC',esc_html__( 'Descending', 'actavista' ) => 'DESC' ),
			'description'       => esc_html__( 'Select sorting order ascending or descending for posts.', 'actavista' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title Limit', 'actavista' ),
			'param_name'        => 'title_limit',
			
			'description'       => esc_html__( 'Enter title words limit.', 'actavista' ),
		),
	),
);
