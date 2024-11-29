<?php
return array(
	'name'     => esc_html__( 'Gallery Hover Style', 'actavista' ),
	'base'     => 'galleryStyle1',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(		
		array(
			'type'       => 'param_group',
			'value'      => '',
			'heading'    => esc_html__( 'Add Gallery', 'actavista' ),
			'param_name' => 'add_gallery',
			'group'      => esc_html__( 'Gallery Setting', 'actavista' ),
			'show_settings_on_create' => true,
			'params'     => array(
				array(
					'type'              => 'attach_image',
					'class'             => '',
					'heading'           => esc_html__( 'Gallery Image', 'actavista' ),
					'param_name'        => 'gallery_image',
					'description'       => esc_html__( 'Upload gallery image.', 'actavista' ),
				),
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Title', 'actavista' ),
					'param_name'        => 'gallery_title',
					'description'       => esc_html__( 'Enter gallery title to show.','actavista')
				),
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Subtitle', 'actavista' ),
					'param_name'        => 'gallery_subtitle',
					'description'       => esc_html__( 'Enter gallery subtitle to show.','actavista')
				),
			
			),
		),
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Select Columns', 'actavista' ),
			'param_name'        => 'columns',
			'group'             => esc_html__( 'Column Setting', 'actavista' ), 
			'value'             => array( esc_html__( '2 Columns', 'actavista' ) => 'col-lg-6',  esc_html__( '3 Columns', 'actavista' ) => 'col-lg-4', esc_html__( '4 Columns', 'actavista' ) => 'col-lg-3'),
			'description'       => esc_html__( 'Select columns to show in these section', 'actavista' ),
			'std'              => 'col-lg-3',
		),
			array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Image Width', 'actavista' ),
			'param_name'        => 'width',
			'group'             => esc_html__( 'Image Setting', 'actavista' ),
			'description'       => esc_html__( 'Enter custom image width like 200, 400, 450. Note: leave it blank if you wants to use default image width.', 'actavista' ),
		),
		
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Image Height', 'actavista' ),
			'param_name'        => 'height',
			'group'             => esc_html__( 'Image Setting', 'actavista' ),
			'description'       => esc_html__( 'Enter custom image height like 200, 400, 450. Note: leave it blank if you wants to use default image width.', 'actavista' ),
		),
	),
);
