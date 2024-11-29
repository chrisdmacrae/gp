<?php
return array(
	'name'     => esc_html__( 'About Us', 'actavista' ),
	'base'     => 'aboutUs',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(		
		array(
			'type'       => 'param_group',
			'value'      => '',
			'heading'    => esc_html__( 'Add About Info', 'actavista' ),
			'param_name' => 'add_about',
			'group'      => esc_html__( 'About Us Setting', 'actavista' ),
			'show_settings_on_create' => true,
			'params'     => array(
				array(
					'type'              => 'attach_image',
					'class'             => '',
					'heading'           => esc_html__( 'About Image', 'actavista' ),
					'param_name'        => 'about_image',
					'description'       => esc_html__( 'Upload about image.', 'actavista' ),
				),
				
				array( 
					'type'          => 'vc_link',
					'class'         => '',
					'heading'       => esc_html__( 'Title and Link', 'actavista' ),
					'param_name'    => 'about_title',
					'description'   => esc_html__( 'Enter about title and its link.','actavista' ),
				
				),
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Subtitle', 'actavista' ),
					'param_name'        => 'about_subtitle',
					'description'       => esc_html__( 'Enter about subtitle to show.','actavista')
				),
			),
		),
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Select Columns', 'actavista' ),
			'param_name'        => 'columns',
			'group'             => esc_html__( 'Column Setting', 'actavista' ), 
			'value'             => array( esc_html__( '2 Columns', 'actavista' ) => 'col-lg-6',  esc_html__( '3 Columns', 'actavista' ) => 'col-lg-4', esc_html__( '4 Columns', 'actavista' ) => 'col-lg-3'),
			'description'       => esc_html__( 'Select columns to show in these section', 'actavista' ),
			'std'              => 'col-lg-3',
		),
	),
);
