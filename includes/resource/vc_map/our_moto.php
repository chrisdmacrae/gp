<?php
return array(
	'name'     => esc_html__( 'Our Moto', 'actavista' ),
	'base'     => 'our_moto',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(		
		array(
			'type'       => 'param_group',
			'value'      => '',
			'heading'    => esc_html__( 'Add Tabs', 'actavista' ),
			'param_name' => 'add_tabs',
			'group'      => esc_html__( 'Moto Setting', 'actavista' ),
			'show_settings_on_create' => true,
			'params'     => array(
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Tab Name', 'actavista' ),
					'param_name'        => 'tab_name',
					'description'       => esc_html__( 'Enter tab name to show.','actavista')
				),  
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Tagline', 'actavista' ),
					'param_name'        => 'tab_tagline',
					'description'       => esc_html__( 'Enter tab content tagline to show.','actavista')
				),  
				array(
					'type'              => 'textarea',
					'class'             => '',
					'heading'           => esc_html__( 'Content', 'actavista' ),
					'param_name'        => 'tab_content',
					'description'       => esc_html__( 'Enter tab content to show.','actavista')
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
