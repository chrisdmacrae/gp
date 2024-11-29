<?php
return array(
	'name'     => esc_html__( 'Custom Boxes Grids', 'actavista' ),
	'base'     => 'boxes_grids',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(
		array(
			'type'        => 'dropdown',
			'class'       => '',
			'heading'     => esc_html__( 'Select Columns', 'actavista' ),
			'param_name'  => 'columns',
			'value'       => array(
				esc_html__( 'Select Column', 'actavista' )   => '',
				esc_html__( '1 Column', 'actavista' )    => '12',
				esc_html__( '2 Columns', 'actavista' )   => '6',
				esc_html__( '3 Columns', 'actavista' )   => '4',
			),
			'description' => esc_html__( 'Select number of columns to show.', 'actavista' ),
		),		
		array(
			'type'       => 'param_group',
			'value'      => '',
			'heading'    => esc_html__( 'Add Custom Box', 'actavista' ),
			'param_name' => 'add_box',
			'group'      => esc_html__( 'Box Setting', 'actavista' ),
			'show_settings_on_create' => true,
			'params'     => array(
				
				array(
					'type'              => 'attach_image',
					'class'             => '',
					'heading'           => esc_html__('Background Image', 'actavista'),
					'param_name'        => 'bg_image',
					'description'       => esc_html__('Upload box background image.', 'actavista'),
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
					'description'       => esc_html__( 'Enter award title to show.','actavista')
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
		),
		
	),
);
