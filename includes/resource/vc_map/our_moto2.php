<?php
return array(
	'name'     => esc_html__( 'Our Moto Style 2', 'actavista' ),
	'base'     => 'our_moto2',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(
		
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title Part 1', 'actavista' ),
			'param_name'        => 'title1',
			'description'       => esc_html__( 'Enter title part 1 to show.','actavista')
		),  
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title Part 2', 'actavista' ),
			'param_name'        => 'title2',
			'description'       => esc_html__( 'Enter title colored part  to show.','actavista')
		),  	
		array(
			'type'              => 'textarea',
			'class'             => '',
			'heading'           => esc_html__( 'Text', 'actavista' ),
			'param_name'        => 'text',
			'description'       => esc_html__( 'Enter text to show.','actavista')
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
