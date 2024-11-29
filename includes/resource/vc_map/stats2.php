<?php
return array(
	'name'     => esc_html__( 'Stats Style 2', 'actavista' ),
	'base'     => 'stats2',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(		
		array(
			'type'       => 'param_group',
			'value'      => '',
			'heading'    => esc_html__( 'Add Stats', 'actavista' ),
			'param_name' => 'add_stats',
			'group'      => esc_html__( 'Stats Setting', 'actavista' ),
			'show_settings_on_create' => true,
			'params'     => array(
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
					'param_name'  => 'iconimage',
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
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Stats Number', 'actavista' ),
					'param_name'        => 'number',
					'description'       => esc_html__( 'Enter stats number to show.','actavista')
				), 
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Stats Symbol', 'actavista' ),
					'param_name'        => 'symbol',
					'description'       => esc_html__( 'Enter stats symbol to show i.e +, K, %.','actavista')
				), 
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Title', 'actavista' ),
					'param_name'        => 'title',
					'description'       => esc_html__( 'Enter stats title to show.','actavista')
				),   
				
			),
		),
	
	),
);
