<?php
return array(
	'name'     => esc_html__( 'Gallery With Info', 'actavista' ),
	'base'     => 'galley_with_infos',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(
		array(
			'type'              => 'param_group',
			'value'             => '',
			'heading'           => esc_html__( 'Add Gallery', 'actavista' ),
			'param_name'        => 'add_galleries',
			'show_settings_on_create' => true,
			'params'            => array(
				array(
					'type'              => 'attach_image',
					'class'             => '',
					'heading'           => esc_html__( 'Gallery Image', 'actavista' ),
					'param_name'        => 'gallery_image',
					'description'       => esc_html__( 'Upload gallery image', 'actavista' ),
				),
			),
		),
		array(
			'type'              => 'param_group',
			'value'             => '',
			'heading'           => esc_html__( 'Add Gallery Bottom Info', 'actavista' ),
			'param_name'        => 'add_info',
			'show_settings_on_create' => true,
			'params'            => array(
				array(
        			'type'              => 'textfield',
        			'class'             => '',
        			'heading'           => esc_html__( 'Info', 'actavista' ),
        			'param_name'        => 'info',
        			'description'       => esc_html__( 'Enter info to show.','actavista')
        		),
        	),
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
);