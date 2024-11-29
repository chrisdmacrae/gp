<?php
return array(
	'name'     => esc_html__( 'Leader Quote', 'actavista' ),
	'base'     => 'leader_quote',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(
		array(
			'type'              => 'attach_image',
			'class'             => '',
			'heading'           => esc_html__( 'Upload Leader Image', 'actavista' ),
			'param_name'        => 'leader_img',
			'description'       => esc_html__( 'Upload leader image to show.',  'actavista' ),
		), 
		array(
			"type"        => "textarea_raw_html",
			"class"       => "",
			"heading"     => esc_html__( 'Title', 'actavista' ),
			"description" => esc_html__( 'Enter title to show.', 'actavista' ),
			"param_name"  => "leader_quote",
			'group'             => 'Heading Setting',
		),
		array(
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'enable_title_typo',
			'group'             => 'Heading Setting',
			'value'             => array( 'Enable Title Typography' => 'true' ),
			'description'       => esc_html__( 'Enable to show title typography options.', 'esperto' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title Font Size', 'esperto' ),
			'group'             => 'Heading Setting',
			'param_name'        => 'title_size',
			'description'       => esc_html__( 'Enter title font size in px like 10px, 20px e.g.','esperto' ),
			'dependency'       => array(
				'element'   => 'enable_title_typo',
				'value'     =>  'true',
			),
		),
		array(
			'type'              => 'colorpicker',
			'class'             => '',
			'heading'           => esc_html__( 'Title Color', 'esperto' ),
			'param_name'        => 'title_color',
			'group'             => 'Heading Setting',
			'description'       => esc_html__( 'Select title color.', 'esperto' ),
			'dependency'       => array(
				'element'   => 'enable_title_typo',
				'value'     =>  'true',
			),
		),
		array(
			'type'       => 'google_fonts',
			'param_name' => 'title_font',
			'settings'   => array(
				'fields' => array(
					'font_family_description' => __( 'Select Title Font Family.', 'esperto' ),
					'font_style_description'  => __( 'Select Title Font Style.', 'esperto' ),
				),
			), 
			'weight' => 0,
			'group'             => 'Heading Setting',
			'dependency'       => array(
				'element'   => 'enable_title_typo',
				'value'     =>  'true',
			),            
		),
		
		array(
			'type'              => 'textarea',
			'class'             => '',
			'heading'           => esc_html__( 'Text', 'actavista' ),
			'param_name'        => 'text',
			'group'             => 'Text Setting',
			'description'       => esc_html__( 'Enter text to show.','actavista')
		),

		array(
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'enable_text_typo',
			'group'             => 'Text Setting',
			'value'             => array( 'Enable Text Typography' => 'true' ),
			'description'       => esc_html__( 'Enable to show text typography options.', 'esperto' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Text Font Size', 'esperto' ),
			'group'             => 'Text Setting',
			'param_name'        => 'text_size',
			'description'       => esc_html__( 'Enter text font size in px like 10px, 20px e.g.','esperto' ),
			'dependency'       => array(
				'element'   => 'enable_text_typo',
				'value'     =>  'true',
			),    
		),
		array(
			'type'              => 'colorpicker',
			'class'             => '',
			'heading'           => esc_html__( 'Text Color', 'esperto' ),
			'param_name'        => 'text_color',
			'group'             => 'Text Setting',
			'description'       => esc_html__( 'Select text color.', 'esperto' ),
			'dependency'       => array(
				'element'   => 'enable_text_typo',
				'value'     =>  'true',
			),    
		),
		array(
			'type'       => 'google_fonts',
			'param_name' => 'text_font',
			'settings'   => array(
				'fields' => array(
					'font_family_description' => __( 'Select Text Font Family.', 'esperto' ),
					'font_style_description'  => __( 'Select Text Font Style.', 'esperto' ),
				),
			), 
			'weight' => 0,
			'group'             => 'Text Setting',
			'dependency'       => array(
				'element'   => 'enable_text_typo',
				'value'     =>  'true',
			),            
		),
		array(
			'type'              => 'attach_image',
			'class'             => '',
			'heading'           => esc_html__( 'Upload Signature Image', 'actavista' ),
			'param_name'        => 'sign_img',
			'description'       => esc_html__( 'Upload signature image to show.',  'actavista' ),
		), 
		array(
			'type'        => 'checkbox',
			'class'       => '',
			'param_name'  => 'button',
			'value'       => array('Enable Button' => 'true'),
			'group'             => 'Button Setting',
			'description' => esc_html__('Enable to show button.', 'actavista'),
		),
		array(
			'type'              => 'vc_link',
			'class'             => '',
			'heading'           => esc_html__( 'Link And Label', 'actavista' ),
			'param_name'        => 'help_link',
			'group'             => 'Button Setting',
			'description'       => esc_html__( 'Enter button label and its link.', 'actavista' ),
			'dependency'       => array(
				'element'   => 'button',
				'value'     =>  'true',
			),
		),
		array(
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'enable_button_typo',
			'group'             => 'Button Setting',
			'value'             => array( 'Enable Button Typography' => 'true' ),
			'description'       => esc_html__( 'Enable to show button typography options.', 'esperto' ),
			'dependency'       => array(
				'element'   => 'button',
				'value'     =>  'true',
			),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Button Font Size', 'esperto' ),
			'group'             => 'Button Setting',
			'param_name'        => 'button_size',
			'description'       => esc_html__( 'Enter button font size in px like 10px, 20px e.g.','esperto' ),
			'dependency'       => array(
				'element'   => 'enable_button_typo',
				'value'     =>  'true',
			),    
		),
		array(
			'type'              => 'colorpicker',
			'class'             => '',
			'heading'           => esc_html__( 'Button Color', 'esperto' ),
			'param_name'        => 'button_color',
			'group'             => 'Button Setting',
			'description'       => esc_html__( 'Select button color.', 'esperto' ),
			'dependency'       => array(
				'element'   => 'enable_button_typo',
				'value'     =>  'true',
			),    
		),
		array(
			'type'       => 'google_fonts',
			'param_name' => 'button_font',
			'settings'   => array(
				'fields' => array(
					'font_family_description' => __( 'Select Button Font Family.', 'esperto' ),
					'font_style_description'  => __( 'Select Button Font Style.', 'esperto' ),
				),
			), 
			'weight' => 0,
			'group'             => 'Button Setting',
			'dependency'       => array(
				'element'   => 'enable_button_typo',
				'value'     =>  'true',
			),            
		),
		array(
           'type'              => 'css_editor',
           'heading'           => __( 'Button Typography', 'esperto' ),
           'param_name'        => 'button_css',
           'group'             => esc_html__( 'Button Setting', 'esperto' ),
        	'dependency'       => array(
				'element'   => 'enable_button_typo',
				'value'     =>  'true',
			),   
        ),
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'content Position', 'actavista' ),
			'param_name'        => 'text_position',
			'value'             => array( esc_html__( 'Right', 'actavista' )  => 'right', esc_html__( 'Left', 'actavista' )  => 'left' ),
			'description'       => esc_html__( 'Select content position of this section', 'actavista' )
		),
	),
);
