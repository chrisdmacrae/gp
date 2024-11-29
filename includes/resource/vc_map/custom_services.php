<?php
return array(
	'name'     => esc_html__( 'Custom Services', 'actavista' ),
	'base'     => 'custom_services',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(		
		array(
			'type'       => 'param_group',
			'value'      => '',
			'heading'    => esc_html__( 'Add Services', 'actavista' ),
			'param_name' => 'add_services',
			'group'      => esc_html__( 'Custom Services Setting', 'actavista' ),
			'show_settings_on_create' => true,
			'params'     => array(
				array(
					'type'              => 'colorpicker',
					'class'             => '',
					'heading'           => esc_html__( 'Box Background Color', 'actavista' ),
					'param_name'        => 'box_bg_color',
					'description'       => esc_html__( 'Select background color of box.', 'actavista' ),
				),
				array(
					'type'        => 'dropdown',
					'class'       => '',
					'heading'     => esc_html__( 'Select Icon Type', 'actavista' ),
					'param_name'  => 'icon_type',
					'value'       => array( esc_html__( 'Image ', 'actavista' ) => 'image_icon', esc_html__( 'FontAwesome Icon', 'actavista' ) => 'icon_icon', esc_html__( 'Flat Icon', 'actavista' ) => 'icon_iconflat'  ),
					'description' => esc_html__( 'Select icon type to show i.e icon type image or fontawesome icon.', 'actavista' ),
				),
				array(
					'type'        => 'attach_image',
					'class'       => '',
					'heading'     => esc_html__( 'Icon Image', 'actavista' ),
					'param_name'  => 'ico_img',
					'description' => esc_html__( 'Upload icon image', 'actavista' ),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => array( 'image_icon' ),
					),
				),
				array(
					'type'        => 'iconpicker',
					'class'       => '',
					'heading'     => esc_html__( 'Fontawesome Icon', 'actavista' ),
					'param_name'  => 'iconicon',
					'description' => esc_html__( 'Select fontawesome icon.', 'actavista' ),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => array( 'icon_icon' ),
					),
				),
				array(
					'type'              => 'iconpicker',
					'class'             => '',
					'heading'           => esc_html__( 'Flat Icon', 'actavista' ),
					'param_name'        => 'info_icon2',
					'description'       => esc_html__( 'Select flat icon.', 'actavista' ),
					'dependency'        => array(
						'element' => 'icon_type',
						'value'   => array( 'icon_iconflat' ),
					),
					'settings'    => array(
						'emptyIcon' => false,
						'type'      => 'flaticons',
					),
				),
				array(
					'type'              => 'colorpicker',
					'class'             => '',
					'heading'           => esc_html__( 'Icon Background Color', 'actavista' ),
					'param_name'        => 'icon_bg_color',
					'description'       => esc_html__( 'Select background color of icon.', 'actavista' ),
				),
				array(
					'type'              => 'colorpicker',
					'class'             => '',
					'heading'           => esc_html__( 'Icon Color', 'actavista' ),
					'param_name'        => 'icon_color',
					'description'       => esc_html__( 'Select icon color.', 'actavista' ),
				),
				array(
					'type'        => 'vc_link',
					'class'       => '',
					'heading'     => esc_html__( 'Title And Link', 'actavista' ),
					'param_name'  => 'serv_link',
					'description' => esc_html__( 'Enter custom service title and its link.','actavista' ),		
				),
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Subtitle', 'actavista' ),
					'param_name'        => 'subtitle',
					'description'       => esc_html__( 'Enter subtitle to show.','actavista')
				),   
			),
		),
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Select Columns', 'actavista' ),
			'param_name'        => 'columns',
			'group'             => esc_html__( 'Column Setting', 'actavista' ), 
			'value'             => array(esc_html__( '4 Columns', 'actavista' ) => 'col-lg-3', esc_html__( '3 Columns', 'actavista' ) => 'col-lg-4'),
			'description'       => esc_html__( 'Select columns to show in these section', 'actavista' )
		), 
	),
);
