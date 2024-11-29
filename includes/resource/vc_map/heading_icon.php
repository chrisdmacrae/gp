<?php
return array(
	'name' 			=> esc_html__( 'Heading With Icon', 'actavista' ),
	'base' 			=> 'heading_icon',
	'icon' 		    => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' 		=> esc_html__( 'Actavista', 'actavista' ),
	'params' 		=> array(
		array(
			'type'              => 'iconpicker',
			'class'             => '',
			'heading'           => esc_html__( 'Title Icon', 'actavista' ),
			'param_name'        => 'title_icon',
			'description'       => esc_html__( 'Select fontawesome icon.', 'actavista' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title', 'actavista' ),
			'param_name'        => 'contact_title',
			'group'             => 'Heading Setting',
			'description'       => esc_html__( 'Enter title to show.','actavista' )
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
			'weight'        => 0,
			'group'         => 'Heading Setting',
			'dependency'    => array(
				'element'   => 'enable_title_typo',
				'value'     =>  'true',
			),            
		),
		array(
			'type'              => 'textarea',
			'class'             => '',
			'heading'           => esc_html__( 'Text', 'actavista' ),
			'param_name'        => 'contact_text',
			'group'             => 'Text Setting',
			'description'       => esc_html__( 'Enter text to show.','actavista' )
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
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Text Line height', 'esperto' ),
			'group'             => 'Text Setting',
			'param_name'        => 'text_lineheight',
			'description'       => esc_html__( 'Enter text line height in px like 10px, 20px e.g.','esperto' ),
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
	)
);
