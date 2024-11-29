<?php
return array(
	'name'          => esc_html__('Single Video Banner', 'actavista'),
	'base'          => 'single_video_banner',
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
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__('Subtitle', 'actavista'),
			'param_name'        => 'subtitle',
			'admin_label'       =>  true,
			'description'       => esc_html__('Enter subtitle that you want to show.','actavista')
		),   
		array(
			'type'              => 'attach_image',
			'class'             => '',
			'heading'           => esc_html__( 'Vidoe Image', 'actavista' ),
			'param_name'        => 'video_image',
			'description'       => esc_html__( 'Upload video image.', 'actavista' ),
		),
		 
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__('Video URL', 'actavista'),
			'param_name'        => 'video_url',
			'admin_label'       =>  true,
			'description'       => esc_html__('Enter youtube video URL.','actavista')
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
	),
);