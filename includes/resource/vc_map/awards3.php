<?php
return array(
	'name'     => esc_html__( 'Awards List Style', 'actavista' ),
	'base'     => 'awards3',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title', 'actavista' ),
			'param_name'        => 'title',
			'description'       => esc_html__( 'Enter title to show.','actavista')
		),
		array(
			'type'       => 'param_group',
			'value'      => '',
			'heading'    => esc_html__( 'Add Awards Info', 'actavista' ),
			'param_name' => 'add_awards',
			'group'      => esc_html__( 'Awards Setting', 'actavista' ),
			'show_settings_on_create' => true,
			'params'     => array(
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Year', 'actavista' ),
					'param_name'        => 'year',
					'description'       => esc_html__( 'Enter award year to show.','actavista')
				),
				
				array(
					'type'              => 'textarea',
					'class'             => '',
					'heading'           => esc_html__( 'Description', 'actavista' ),
					'param_name'        => 'text',
					'description'       => esc_html__( 'Enter award description to show.','actavista')
				),  
				
			),
		),
		
	),
);
