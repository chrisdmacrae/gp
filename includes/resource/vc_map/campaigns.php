<?php
return array(
	'name'     => esc_html__( 'Campaigns', 'actavista' ),
	'base'     => 'campaigns',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(		
		array(
			'type'       => 'param_group',
			'value'      => '',
			'heading'    => esc_html__( 'Add Campaigns', 'actavista' ),
			'param_name' => 'add_about',
			'group'      => esc_html__( 'Campaigns Setting', 'actavista' ),
			'show_settings_on_create' => true,
			'params'     => array(
				array(

					'type'              => 'dropdown',
					'class'             => '',
					'heading'           => esc_html__( 'Select Box Style', 'actavista' ),
					'param_name'        => 'section_type',
					'value'             => array(
						esc_html__( 'Simple Style', 'actavista' ) => '', 
						esc_html__( 'Colored Style', 'actavista' ) => 'campaign-clr-style',      
					),
					'description'       => esc_html__( 'Select box style that you wants to use.', 'actavista' )
				),
				array(
					'type'              => 'colorpicker',
					'class'             => '',
					'heading'           => esc_html__( 'Content Box Background Color', 'actavista' ),
					'param_name'        => 'box_bg_color',
					'description'       => esc_html__( 'Select background color of content box.', 'actavista' ),
					'dependency'        => array(
						'element' => 'section_type',
						'value'   => array( 'campaign-clr-style' ),
					),
				),
				array(
					'type'              => 'dropdown',
					'class'             => '',
					'heading'           => esc_html__( 'Select Icon Type', 'actavista' ),
					'param_name'        => 'icon_type',
					'value'             => array(
						esc_html__( 'Flat Icon', 'actavista' ) => 'flaticon', 
						esc_html__( 'Fontawesome icon', 'actavista' ) => 'fontawesome',
						esc_html__( 'Image Icon', 'actavista' ) => 'image_icon',           
					),
					'description'       => esc_html__( 'Select icon type that you wants to use.', 'actavista' )
				),
				array(
					'type'              => 'iconpicker',
					'class'             => '',
					'heading'           => esc_html__( 'Campaign Icon', 'actavista' ),
					'param_name'        => 'campaign_icon',
					'description'       => esc_html__( 'Select campaign info icon.', 'actavista' ),
					'dependency'        => array(
						'element' => 'icon_type',
						'value'   => array( 'fontawesome' ),
					),
				),
				array(
					'type'              => 'attach_image',
					'class'             => '',
					'heading'           => esc_html__( 'Campaign Icon Image', 'actavista' ),
					'param_name'        => 'icon_image',
					'description'       => esc_html__( 'Upload campaign icon image.', 'actavista' ),
					'dependency'        => array(
						'element' => 'icon_type',
						'value'   => array( 'image_icon' ),
					),
				),
				array(
					'type'              => 'iconpicker',
					'class'             => '',
					'heading'           => esc_html__( 'Info Icon', 'actavista' ),
					'param_name'        => 'info_icon2',
					'description'       => esc_html__( 'Select contact info icon.', 'actavista' ),
					'dependency'        => array(
						'element' => 'icon_type',
						'value'   => array( 'flaticon' ),
					),
					'settings'    => array(
						'emptyIcon' => false,
						'type'      => 'flaticons',
					),
				),
				array( 
					'type'          => 'vc_link',
					'class'         => '',
					'heading'       => esc_html__( 'Title and Link', 'actavista' ),
					'param_name'    => 'about_title',
					'description'   => esc_html__( 'Enter campaign title and its link.','actavista' ),
				),
				array(
					'type'              => 'textarea',
					'class'             => '',
					'heading'           => esc_html__( 'Text', 'actavista' ),
					'param_name'        => 'about_subtitle',
					'description'       => esc_html__( 'Enter campaign text to show.','actavista')
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
	),
);
