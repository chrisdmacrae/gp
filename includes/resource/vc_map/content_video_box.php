<?php
return array(
	'name'     => esc_html__( 'Content With Video Box', 'actavista' ),
	'base'     => 'content_video_box',
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
			'type'              => 'textarea',
			'class'             => '',
			'heading'           => esc_html__( 'Text', 'actavista' ),
			'param_name'        => 'text',
			'description'       => esc_html__( 'Enter text to show.','actavista')
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
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Select Video Type', 'actavista' ),
			'param_name'        => 'video_type',
			'value'             => array(
				esc_html__( 'Youtube Video', 'actavista' ) => 'youtube', 
				esc_html__( 'Vimeo Video', 'actavista' ) => 'vimeo',      
			),
			'description'       => esc_html__( 'Select video type that you wants to use.', 'actavista' )
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Video Link', 'actavista' ),
			'param_name'        => 'video_custom_link',
			'description'       => esc_html__( 'Enter video link to show  video like "https://youtu.be/U6-vDpjthog".','actavista')
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Video Title', 'actavista' ),
			'param_name'        => 'video_custom_title',
			'description'       => esc_html__( 'Enter video title to show.','actavista'),
			'dependency'    => array( 
				'element'   => 'video_type',
				'value'     =>  'vimeo',
			),
		),
		array(
			'type'              => 'attach_image',
			'class'             => '',
			'heading'           => esc_html__( 'Video Image', 'actavista' ),
			'param_name'        => 'video_image',
			'description'       => esc_html__( 'Upload video image.', 'actavista' ),
		),
	),
);