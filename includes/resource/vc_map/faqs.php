<?php
return array(
	'name'     => esc_html__( 'FAQS', 'actavista' ),
	'base'     => 'faqs',
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
			'heading'    => esc_html__( 'Add FAQS', 'actavista' ),
			'param_name' => 'add_faqs',
			'group'      => esc_html__( 'FAQS Setting', 'actavista' ),
			'show_settings_on_create' => true,
			'params'     => array(
				
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'FAQ', 'actavista' ),
					'param_name'        => 'title',
					'description'       => esc_html__( 'Enter FAQ to show.','actavista')
				),   
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'FAQ Link', 'actavista' ),
					'param_name'        => 'faq_link',
					'description'       => esc_html__( 'Enter FAQ link.','actavista')
				),   
				
			),
		),
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Select Columns', 'actavista' ),
			'param_name'        => 'columns',
			'group'             => esc_html__( 'Column Setting', 'actavista' ), 
			'value'             => array( esc_html__( '1 Column', 'actavista' ) => '100%',  esc_html__( '2 Columns', 'actavista' ) => '46%' ),
			'description'       => esc_html__( 'Select columns to show in these section', 'actavista' ),
			'std'              => '44%',
		),
		
	),
);
