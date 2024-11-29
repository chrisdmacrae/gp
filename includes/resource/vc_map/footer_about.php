<?php
return array(
	'name'     => esc_html__( 'About Us Widget', 'actavista' ),
	'base'     => 'footer_about',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista Widgets', 'actavista' ),
	'params'   => array(
		array(
            'type'              => 'attach_image',
            'class'             => '',
            'heading'           => esc_html__( 'Upload Logo', 'actavista' ),
             'group'            => esc_html__('Logo Setting', 'actavista'),
            'param_name'        => 'logo_image',
            'description'       => esc_html__( 'Upload logo image to show.',  'actavista' ),
        ),  
		array(
			'type'              => 'textarea',
			'class'             => '',
			'heading'           => esc_html__( 'Description', 'actavista' ),
			'param_name'        => 'text',
			'description'       => esc_html__( 'Enter about description that you want to show.', 'actavista' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Bottom Text', 'actavista' ),
			'param_name'        => 'bottom_text',
			'description'       => esc_html__( 'Enter bottom text that you want to show.', 'actavista' ),
		),
	),
);
