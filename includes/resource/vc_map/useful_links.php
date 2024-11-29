<?php
return array(
	'name'     => esc_html__( 'Useful Links', 'actavista' ),
	'base'     => 'useful_links',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista Widgets', 'actavista' ),
	'params'   => array(
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title', 'actavista' ),
			'param_name'        => 'title',
			'admin_label'       =>  true,
			'group'             => esc_html__( 'Heading Setting', 'actavista' ),
			'description'       => esc_html__( 'Enter title.', 'actavista' ),
		),
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Select Links Columns', 'actavista' ),
			'param_name'        => 'columns',
			'value'             => array( esc_html__( '1 Column', 'actavista' ) => 'link-full-width',esc_html__( '2 Columns', 'actavista' ) => 'link-half-width'  ),
			'description'       => esc_html__( 'Select links columns 1 column or 2 column.', 'actavista' )
		),
		array(
			'type'       => 'param_group',
			'value'      => '',
			'heading'    => esc_html__( 'Add Links', 'actavista' ),
			'param_name' => 'add_link',
			'group'      => esc_html__( 'Links Setting', 'actavista' ),
			'show_settings_on_create' => true,
			'params'     => array(
				array(
					'type'        => 'vc_link',
					'class'       => '',
					'heading'     => esc_html__( 'Label And Link', 'actavista' ),
					'param_name'  => 'serv_link',
					'description' => esc_html__( 'Enter  label and link.','actavista' ),		
				),
			),
		),
	),
);
