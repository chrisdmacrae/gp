<?php
return array(
	'name'     => esc_html__( 'Accordions', 'actavista' ),
	'base'     => 'accordions',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Main Title', 'actavista' ),
			'param_name'        => 'main_title',
			'description'       => esc_html__( 'Enter main title to show.','actavista')
		),   		
		array(
			'type'       => 'param_group',
			'value'      => '',
			'heading'    => esc_html__( 'Add Accordions', 'actavista' ),
			'param_name' => 'add_accordions',
			'group'      => esc_html__( 'Accordions Setting', 'actavista' ),
			'show_settings_on_create' => true,
			'params'     => array(
				
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Accordion Title', 'actavista' ),
					'param_name'        => 'title',
					'description'       => esc_html__( 'Enter accordion title to show.','actavista')
				),   
				array(
					'type'              => 'textarea',
					'class'             => '',
					'heading'           => esc_html__( 'Accordion Text', 'actavista' ),
					'param_name'        => 'text',
					'description'       => esc_html__( 'Enter accordion text to show.','actavista')
				),   
			),
		),
		array(
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'enable_counting',
			'value'             => array( 'Enable Numbering' => 'true' ),
			'description'       => esc_html__( 'Enable to show numbering of accordions.', 'actavista' ),
		),
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Select Style', 'actavista' ),
			'param_name'        => 'style',
			'value'             => array( esc_html__( 'Style 1', 'actavista' ) => 'style1',  esc_html__( 'Style 2', 'actavista' ) => 'question-anser' ),
			'description'       => esc_html__( 'Select accordion style to show in these section', 'actavista' ),
			'std'              => 'style1',
		),
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Select Columns', 'actavista' ),
			'param_name'        => 'columns',
			'value'             => array( esc_html__( '1 Column', 'actavista' ) => 'col-md-12', esc_html__( '2 Columns', 'actavista' ) => 'col-md-6'),
			'description'       => esc_html__( 'Select columns', 'actavista' ),
			'std'              => 'col-md-12',
		),
	),
);
