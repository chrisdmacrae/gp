<?php
return array(
	'name'     => esc_html__( 'Custom Service Box', 'actavista' ),
	'base'     => 'info_box',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(
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
			'heading'           => esc_html__( 'Title', 'actavista' ),
			'param_name'        => 'title',
			'description'       => esc_html__( 'Enter service title to show.','actavista')
		),  
		array(
			'type'              => 'textarea',
			'class'             => '',
			'heading'           => esc_html__( 'Content', 'actavista' ),
			'param_name'        => 'content',
			'description'       => esc_html__( 'Enter service content to show.','actavista')
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
	),
);
