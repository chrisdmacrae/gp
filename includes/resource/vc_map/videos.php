<?php
return array(
	'name'     => esc_html__( 'Videos Builder', 'actavista' ),
	'base'     => 'videos',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(	
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title', 'actavista' ),
			'param_name'        => 'title',
			'description'       => esc_html__( 'Enter title if you wants to show.','actavista')
		),  
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Subtitle', 'actavista' ),
			'param_name'        => 'subtitle',
			'description'       => esc_html__( 'Enter subtitle if you wants to show.','actavista')
		),  	
		array(
			'type'       => 'param_group',
			'value'      => '',
			'heading'    => esc_html__( 'Add Videos', 'actavista' ),
			'param_name' => 'add_videos',
			'group'      => esc_html__( 'Videos Setting', 'actavista' ),
			'show_settings_on_create' => true,
			'params'     => array(
				array(
					'type'              => 'attach_image',
					'class'             => '',
					'heading'           => esc_html__('Video Image', 'actavista'),
					'param_name'        => 'videos_image',
					'description'       => esc_html__('Upload video image.', 'actavista'),
				),
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Video Duration OR Video Title', 'actavista' ),
					'param_name'        => 'video_label',
					'description'       => esc_html__( 'Enter video duration or video title to show.','actavista')
				),  
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Video Link', 'actavista' ),
					'param_name'        => 'video_link',
					'description'       => esc_html__( 'Enter youtube or dailymotion video link to show video on popup.','actavista')
				), 
			),
		),
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Select Columns', 'actavista' ),
			'param_name'        => 'columns',
			'group'             => esc_html__( 'Column Setting', 'actavista' ), 
			'value'             => array( esc_html__( '2 Columns', 'actavista' ) => 'col-lg-6',  esc_html__( '3 Columns', 'actavista' ) => 'col-lg-4' ),
			'description'       => esc_html__( 'Select columns to show in these section', 'actavista' ),
			'std'              => 'col-lg-4',
		), 
	),
);
