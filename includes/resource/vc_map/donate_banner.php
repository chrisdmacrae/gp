<?php
return array(
	'name'     => esc_html__( 'Donation Banner', 'actavista' ),
	'base'     => 'donate_banner',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(
		array(
			'type'              => 'attach_image',
			'class'             => '',
			'heading'           => esc_html__( 'Banner Image', 'actavista' ),
			'param_name'        => 'banner_image',
			'description'       => esc_html__( 'Upload banner image.', 'actavista' ),
		),
		array(
			'type'        => 'dropdown',
			'class'       => '',
			'heading'     => esc_html__( 'Select Image Layer', 'actavista' ),
			'param_name'  => 'image_layer',
			'value'       => array(
				esc_html__( 'No Layer', 'actavista' )    => 'no-layer',
				esc_html__( 'Cream Layer', 'actavista' ) => 'creamish',
				esc_html__( 'Black Layer', 'actavista' ) => 'blackish',
				esc_html__( 'Blue Layer', 'actavista' )  => 'bluesh',
				esc_html__( 'Green Layer', 'actavista' ) => 'greenish',
			),
			'description' => esc_html__( 'Select layer color for background image.', 'actavista' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title', 'actavista' ),
			'param_name'        => 'title',
			'description'       => esc_html__( 'Enter title to show.','actavista')
		),  
		array(
			'type'              => 'textarea',
			'class'             => '',
			'heading'           => esc_html__( 'Content', 'actavista' ),
			'param_name'        => 'content',
			'description'       => esc_html__( 'Enter content to show.','actavista')
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
	),
);
