<?php
return array(
	'name'     => esc_html__( 'Our Vision', 'actavista' ),
	'base'     => 'our_vision',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(		
		array(
			'type'       => 'param_group',
			'value'      => '',
			'heading'    => esc_html__( 'Add Visions', 'actavista' ),
			'param_name' => 'add_visions',
			'group'      => esc_html__( 'Visions Setting', 'actavista' ),
			'show_settings_on_create' => true,
			'params'     => array(
				array(
					'type'              => 'attach_image',
					'class'             => '',
					'heading'           => esc_html__('Vision Image', 'actavista'),
					'param_name'        => 'vision_image',
					'description'       => esc_html__('Upload Vision image.', 'actavista'),
				),
				array(
					'type'        => 'vc_link',
					'class'       => '',
					'heading'     => esc_html__( 'Title And Link', 'actavista' ),
					'param_name'  => 'vision_link',
					'description' => esc_html__( 'Enter vision title and its link.','actavista' ),		
				),
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Subtitle', 'actavista' ),
					'param_name'        => 'subtitle',
					'description'       => esc_html__( 'Enter subtitle to show.','actavista')
				),   
				array(
					'type'              => 'textarea',
					'class'             => '',
					'heading'           => esc_html__( 'Text', 'actavista' ),
					'param_name'        => 'text',
					'description'       => esc_html__( 'Enter text to show.','actavista')
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
			 'std'              => 'col-lg-4',
		), 
	),
);
