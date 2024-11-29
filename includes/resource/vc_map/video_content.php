<?php
return array(
	'name'     => esc_html__( 'About Cntent With Video', 'actavista' ),
	'base'     => 'video_content',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(		
		array(
			'type'       => 'param_group',
			'value'      => '',
			'heading'    => esc_html__( 'Add Video/Image', 'actavista' ),
			'param_name' => 'add_videos',
			'group'      => esc_html__( 'Video/Image Setting', 'actavista' ),
			'show_settings_on_create' => true,
			'params'     => array(
				array(
					'type'              => 'attach_image',
					'class'             => '',
					'heading'           => esc_html__('Image', 'actavista'),
					'param_name'        => 'image',
					'description'       => esc_html__('Upload about image', 'actavista'),
				),
				array( 
					'type'              => 'checkbox',
					'class'             => '',
					'param_name'        => 'video_enable',
					'value'             => array( 'Enable Video' => 'true' ),
					'description'       => esc_html__( 'Enable to show video on hover.', 'actavista' ),
				),
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Video Link', 'actavista' ),
					'param_name'        => 'video_link',
					'description'       => esc_html__( 'Enter youtube/vimeo link to show video.','actavista'),
					'dependency'    => array( 
						'element'   => 'video_enable',
						'value'     =>  'true',
					),
				),  
				
			),
		),
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
			'heading'           => esc_html__( 'Content', 'actavista' ),
			'param_name'        => 'content',
			'description'       => esc_html__( 'Enter content to show.','actavista')
		),  
	),
);
