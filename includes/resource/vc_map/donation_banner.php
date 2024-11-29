<?php
return array(
	'name'     => esc_html__( 'Info With Buttons', 'actavista' ),
	'base'     => 'donation_banner',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(		
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title', 'actavista' ),
			'param_name'        => 'about_title',
			'description'       => esc_html__( 'Enter about title to show.','actavista')
		),
		array(
			'type' 				=> 'param_group',                       
			'value' 			=> '',
			'heading' 			=> esc_html__( 'Add Contact Info', 'actavista' ),
			'param_name' 		=> 'contact_desc',
			'group'             => esc_html__( 'Contact Info', 'actavista' ),
			'show_settings_on_create' => true,
			'params' 			=> array(
				array(
					'type'              => 'iconpicker',
					'class'             => '',
					'heading'           => esc_html__( 'Contact Icon', 'actavista' ),
					'param_name'        => 'contact_icon',
					'description'       => esc_html__( 'Select fontawesome icon.', 'actavista' ),
				),
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Contact Info Title', 'actavista' ),
					'param_name'        => 'contact_title',
					'description'       => esc_html__( 'Enter contact info to show.','actavista' )
				),
			)
		),
		array(
			'type'              => 'attach_image',
			'class'             => '',
			'heading'           => esc_html__( 'Side Image', 'actavista' ),
			'param_name'        => 'side_image',
			'description'       => esc_html__( 'Upload side image to show.', 'actavista' ),
		),
		array( 
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'button',
			'value'             => array( 'Enable Button 1' => 'true' ),
			'description'       => esc_html__( 'Enable to show button 1.', 'actavista' ),
		),
		array( 
			'type'          => 'vc_link',
			'class'         => '',
			'heading'       => esc_html__( 'Label and Link', 'actavista' ),
			'param_name'    => 'help_link',
			'description'   => esc_html__( 'Enter button 1 label and its link.','actavista' ),
			'dependency'    => array( 
				'element'   => 'button',
				'value'     =>  'true',
			),
		),
		array( 
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'button2',
			'value'             => array( 'Enable Button 2' => 'true' ),
			'description'       => esc_html__( 'Enable to show button 1.', 'actavista' ),
		),
		array( 
			'type'          => 'vc_link',
			'class'         => '',
			'heading'       => esc_html__( 'Label and Link', 'actavista' ),
			'param_name'    => 'help_link2',
			'description'   => esc_html__( 'Enter button 2 label and its link.','actavista' ),
			'dependency'    => array( 
				'element'   => 'button2',
				'value'     =>  'true',
			),
		),
	),
);
