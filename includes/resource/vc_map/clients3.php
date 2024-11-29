<?php
return array(
	'name'     => esc_html__( 'Clients Style 3', 'actavista' ),
	'base'     => 'clients3',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(
		array( 
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'enable_heading',
			'value'             => array( 'Enable Heading' => 'true' ),
			'description'       => esc_html__( 'Enable to show heading area.', 'actavista' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title', 'actavista' ),
			'param_name'        => 'title',
			'description'       => esc_html__( 'Enter title that you wants to show.', 'actavista' ),
			'dependency'    => array( 
				'element'   => 'enable_heading',
				'value'     =>  'true',
			),
		),
		
		array(
			'type'              => 'param_group',
			'value'             => '',
			'heading'           => esc_html__( 'Add Clients', 'actavista' ),
			'param_name'        => 'add_clients',
			'show_settings_on_create' => true,
			'params'            => array(
				array(
					'type'              => 'attach_image',
					'class'             => '',
					'heading'           => esc_html__( 'Client Image', 'actavista' ),
					'param_name'        => 'client_image',
					'description'       => esc_html__( 'Upload client image', 'actavista' ),
				),
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Link', 'actavista' ),
					'param_name'        => 'url',
					'description'       => esc_html__( 'Enter URL of client website if you wants to link.', 'actavista' ),
				),
			),
		),
	),
);
