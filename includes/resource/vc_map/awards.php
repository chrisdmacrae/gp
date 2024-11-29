<?php
return array(
	'name'     => esc_html__( 'Our Awards', 'actavista' ),
	'base'     => 'awards',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(		
		array(
			'type'       => 'param_group',
			'value'      => '',
			'heading'    => esc_html__( 'Add Awards Info', 'actavista' ),
			'param_name' => 'add_awards',
			'group'      => esc_html__( 'Awards Setting', 'actavista' ),
			'show_settings_on_create' => true,
			'params'     => array(
				array(
					'type'              => 'attach_image',
					'class'             => '',
					'heading'           => esc_html__('Award Image', 'actavista'),
					'param_name'        => 'award_image',
					'description'       => esc_html__('Upload award image.', 'actavista'),
				),
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Date', 'actavista' ),
					'param_name'        => 'date',
					'description'       => esc_html__( 'Enter award date to show.','actavista')
				),
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Title', 'actavista' ),
					'param_name'        => 'title',
					'description'       => esc_html__( 'Enter award title to show.','actavista')
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
