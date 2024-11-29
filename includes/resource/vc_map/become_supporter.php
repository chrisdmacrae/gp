<?php
return array(
	'name'     => esc_html__( 'Become A supporter', 'actavista' ),
	'base'     => 'become_supporter',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(
		array(
			'type'              => 'param_group',
			'value'             => '',
			'heading'           => esc_html__( 'Add Info', 'actavista' ),
			'param_name'        => 'add_info',
			'show_settings_on_create' => true,
			'params'            => array(
				array(
					'type'              => 'attach_image',
					'class'             => '',
					'heading'           => esc_html__( 'Image', 'actavista' ),
					'param_name'        => 'image',
					'description'       => esc_html__( 'Upload image to show.', 'actavista' ),
				),
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Colred Title', 'actavista' ),
					'param_name'        => 'title1',
					'description'       => esc_html__( 'Enter coloed title/ number to show.','actavista')
				),
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Title', 'actavista' ),
					'param_name'        => 'title',
					'description'       => esc_html__( 'Enter coloed title to show.','actavista')
				),
				array(
					'type'              => 'textarea',
					'class'             => '',
					'heading'           => esc_html__( 'Text', 'actavista' ),
					'param_name'        => 'text',
					'description'       => esc_html__( 'Enter text to show.','actavista')
				),
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Name', 'actavista' ),
					'param_name'        => 'name',
					'description'       => esc_html__( 'Enter name to  show.','actavista')
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
		),
	),
);
