<?php
return array(
	'name'          => esc_html__('Quote With Content', 'actavista'),
	'base'          => 'quote_with_content',
	'icon'          => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category'      => esc_html__('Actavista', 'actavista'),
	'params'        => array( 
    	array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__('Title', 'actavista'),
			'param_name'        => 'title',
			'admin_label'       =>  true,
			'description'       => esc_html__('Enter title that you want to show.','actavista')
		),   
        array(
			'type'              => 'textarea',
			'class'             => '',
			'heading'           => esc_html__('Text', 'actavista'),
			'param_name'        => 'subtitle',
			'admin_label'       =>  true,
			'description'       => esc_html__('Enter text that you want to show.','actavista')
		),   
		array(
			'type'              => 'attach_image',
			'class'             => '',
			'heading'           => esc_html__( 'Image', 'actavista' ),
			'param_name'        => 'video_image',
			'description'       => esc_html__( 'Upload image.', 'actavista' ),
		),
		  
		
		array( 
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'button2',
			'value'             => array( 'Enable Button' => 'true' ),
			'description'       => esc_html__( 'Enable to show button.', 'actavista' ),
		),
		array( 
			'type'          => 'vc_link',
			'class'         => '',
			'heading'       => esc_html__( 'Label and Link', 'actavista' ),
			'param_name'    => 'help_link2',
			'description'   => esc_html__( 'Enter button label and its link.','actavista' ),
			'dependency'    => array( 
				'element'   => 'button2',
				'value'     =>  'true',
			),
		),
        array(
			'type'              => 'textarea',
			'class'             => '',
			'heading'           => esc_html__('Quote', 'actavista'),
			'param_name'        => 'quote',
			'admin_label'       =>  true,
			'description'       => esc_html__('Enter quote that you want to show.','actavista')
		), 
        array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__('Quote Author', 'actavista'),
			'param_name'        => 'author',
			'admin_label'       =>  true,
			'description'       => esc_html__('Enter quote author name that you want to show.','actavista')
		),  
	),
);