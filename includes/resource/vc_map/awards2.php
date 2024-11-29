<?php
return array(
	'name'     => esc_html__( 'Awards Tabs Style', 'actavista' ),
	'base'     => 'awards2',
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
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Year', 'actavista' ),
					'param_name'        => 'year',
					'description'       => esc_html__( 'Enter award year to show.','actavista')
				),
				array(
					'type'              => 'attach_image',
					'class'             => '',
					'heading'           => esc_html__('Award Gallery Images', 'actavista'),
					'param_name'        => 'main_image',
					'description'       => esc_html__('Upload award gallery images.', 'actavista'),
				),
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Title', 'actavista' ),
					'param_name'        => 'title',
					'description'       => esc_html__( 'Enter award title to show.','actavista')
				),
				array(
					'type'              => 'textarea_raw_html',
					'class'             => '',
					'heading'           => esc_html__( 'Description', 'actavista' ),
					'param_name'        => 'text',
					'description'       => esc_html__( 'Enter award description to show.','actavista')
				),  
				
				array( 
					'type'              => 'checkbox',
					'class'             => '',
					'param_name'        => 'enable_gallery',
					'value'             => array( 'Enable Award Gallery' => 'true' ),
					'description'       => esc_html__( 'Enable to show awards gallery.', 'actavista' ),
				),
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Title', 'actavista' ),
					'param_name'        => 'gallery_title',
					'description'       => esc_html__( 'Enter award gallery title to show.','actavista'),
					'dependency'    => array( 
						'element'   => 'enable_gallery',
						'value'     =>  'true',
					),
				),
				array(
					'type'              => 'attach_images',
					'class'             => '',
					'heading'           => esc_html__('Award Image', 'actavista'),
					'param_name'        => 'gallery_images_',
					'description'       => esc_html__('Upload award image.', 'actavista'),
					'dependency'    => array( 
						'element'   => 'enable_gallery',
						'value'     =>  'true',
					),
				),
				array(
					'type'              => 'dropdown',
					'class'             => '',
					'heading'           => esc_html__( 'Select Columns', 'actavista' ),
					'param_name'        => 'columns',
					'group'             => esc_html__( 'Column Setting', 'actavista' ), 
					'value'             => array( esc_html__( '3 Columns', 'actavista' ) => 'col-lg-4', esc_html__( '4 Columns', 'actavista' ) => 'col-lg-3'),
					'description'       => esc_html__( 'Select columns to show in these section', 'actavista' ),
					'std'              => 'col-lg-3',
					'dependency'    => array( 
						'element'   => 'enable_gallery',
						'value'     =>  'true',
					),
				),
			),
		),
		
	),
);
