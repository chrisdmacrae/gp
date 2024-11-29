<?php
return array(
	'name'     => esc_html__( 'Latest Blog Post', 'actavista' ),
	'base'     => 'latest_blog_post',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(
		array(
			'type'        => 'colorpicker',
			'class'       => '',
			'heading'     => __( 'Background Color', 'actavista' ),
			'param_name'  => 'bg_color',
			'description' => __( 'Choose background color.', 'actavista' ),
		), 
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title Limit', 'actavista' ),
			'param_name'        => 'title_limit',
			'group'             => esc_html__( 'General Settings', 'actavista' ),
			'description'       => esc_html__( 'Enter title words limit.', 'actavista' ),
		),  
	),
);
