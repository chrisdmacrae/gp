<?php
return array(
	'name'     => esc_html__( 'History Listing', 'actavista' ),
	'base'     => 'history_listing',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(		
		array(
			
			'type'       => 'param_group',
			'value'      => '',
			'heading'    => esc_html__( 'Add History', 'actavista' ),
			'param_name' => 'add_history',
			'group'      => esc_html__( 'History Setting', 'actavista' ),
			'show_settings_on_create' => true,
			'params'     => array(
				array(
					'type'              => 'attach_image',
					'class'             => '',
					'heading'           => esc_html__( 'History Image', 'actavista' ),
					'param_name'        => 'history_image',
					'description'       => esc_html__( 'Upload history image.', 'actavista' ),
				),
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Title', 'actavista' ),
					'param_name'        => 'title',
					'description'       => esc_html__( 'Enter title to show.','actavista')
				),
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Year', 'actavista' ),
					'param_name'        => 'year',
					'description'       => esc_html__( 'Enter year to show.','actavista')
				),
				array(
					'type'              => 'textarea',
					'class'             => '',
					'heading'           => esc_html__( 'Text', 'actavista' ),
					'param_name'        => 'description',
					'description'       => esc_html__( 'Enter history description to show.','actavista')
				),
			),
		),
	
	),
);