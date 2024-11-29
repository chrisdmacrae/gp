<?php
return array(
	'name'     => esc_html__( 'Banner With Icon', 'actavista' ),
	'base'     => 'icon_banner',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(
		array(
			'type'              => 'attach_image',
			'class'             => '',
			'heading'           => esc_html__( 'Icon Image', 'actavista' ),
			'param_name'        => 'icon_image',
			'description'       => esc_html__( 'Upload icon image', 'actavista' ),
		),
		
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title', 'actavista' ),
			'param_name'        => 'title',
			'description'       => esc_html__( 'Enter banner title to show.','actavista')
		),
		array(
			'type'              => 'textarea',
			'class'             => '',
			'heading'           => esc_html__( 'Text', 'actavista' ),
			'param_name'        => 'text',
			'description'       => esc_html__( 'Enter text to show.','actavista')
		),
		array( 
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'button',
			'value'             => array( 'Enable Button' => 'true' ),
			'description'       => esc_html__( 'Enable to show button.', 'actavista' ),
		),
		array( 
			'type'          => 'vc_link',
			'class'         => '',
			'heading'       => esc_html__( 'Label and Link', 'actavista' ),
			'param_name'    => 'help_link',
			'description'   => esc_html__( 'Enter button label and its link.','actavista' ),
			'dependency'    => array( 
				'element'   => 'button',
				'value'     =>  'true',
			),
		),
		array(
			'type'        => 'dropdown',
			'class'       => '',
			'heading'     => esc_html__( 'Select Banner Style', 'actavista' ),
			'param_name'  => 'banner_style',
			'value'       => array(
				esc_html__( 'Style 1', 'actavista' ) => 'banner-style4',
				esc_html__( 'Style 2', 'actavista' ) => 'banner-style5',
			),
			'description' => esc_html__( 'Select banner style.', 'actavista' ),
		),
	),
);
