<?php
return array(
	'name'     => esc_html__( 'Contact Info Widget', 'actavista' ),
	'base'     => 'footer_contact_info',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista Widgets', 'actavista' ),
	'params'   => array(
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title', 'actavista' ),
			'param_name'        => 'title',
			'description'       => esc_html__( 'Enter title that you want to show.', 'actavista' ),
		),
		array(
			'type'              => 'textarea',
			'class'             => '',
			'heading'           => esc_html__( 'Description', 'actavista' ),
			'param_name'        => 'text',
			'description'       => esc_html__( 'Enter about description that you want to show.', 'actavista' ),
		),
		array(
			'type'              => 'param_group',
			'value'             => '',
			'heading'           => esc_html__( 'Add About Info', 'actavista' ),
			'param_name'        => 'about_info',
			'group'             => esc_html__( 'About Info Setting', 'actavista' ),
			'show_settings_on_create' => true,
			'params'            => array(
				array(
					'type'        => 'dropdown',
					'class'       => '',
					'heading'     => esc_html__( 'Select Icon Type', 'actavista' ),
					'param_name'  => 'icon_type',
					'value'       => array(esc_html__( 'FontAwesome Icon', 'actavista' ) => 'icon_icon', esc_html__( 'Flat Icon', 'actavista' ) => 'icon_iconflat'  ),
					'description' => esc_html__( 'Select icon type to show i.e icon type flat icon or fontawesome icon.', 'actavista' ),
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
					'param_name'        => 'icon',
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
					'heading'           => esc_html__( 'Info Label', 'actavista' ),
					'param_name'        => 'info_label',
					'description'       => esc_html__( 'Enter about info label to show.', 'actavista' ),
				),
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Info', 'actavista' ),
					'param_name'        => 'info',
					'description'       => esc_html__( 'Enter about info to show.', 'actavista' ),
				),
			),
		),        
	),
);
