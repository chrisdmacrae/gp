<?php
return array(
	'name'     => esc_html__( 'Heading With Border', 'actavista' ),
	'base'     => 'heading',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(
  
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Tagline', 'actavista' ),
			'param_name'        => 'tagline',
			'group'             => 'Tagline Setting',
			'description'       => esc_html__( 'Enter tagline to show.','actavista')
		),
		array(
			'type'              => 'checkbox',
			'class'             => '',
			'group'             => 'Tagline Setting',
			'param_name'        => 'enable_tagline_typo',
			'value'             => array( 'Enable tagline Typography' => 'true' ),
			'description'       => esc_html__( 'Enable to show tagline typography options.', 'esperto' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Tagline Font Size', 'esperto' ),
			'group'             => 'Tagline Setting',
			'param_name'        => 'tagline_size',
			'description'       => esc_html__( 'Enter tagline font size in px like 10px, 20px e.g.','esperto' ),
			'dependency'       => array(
				'element'   => 'enable_tagline_typo',
				'value'     =>  'true',
			),
		),
		array(
			'type'              => 'colorpicker',
			'class'             => '',
			'heading'           => esc_html__( 'Tagline Color', 'esperto' ),
			'param_name'        => 'tagline_color',
			'group'             => 'Tagline Setting',
			'description'       => esc_html__( 'Select Tagline color.', 'esperto' ),
			'dependency'       => array(
				'element'   => 'enable_tagline_typo',
				'value'     =>  'true',
			),
		),
		array(
			'type'       => 'google_fonts',
			'param_name' => 'tagline_font',
			'settings'   => array(
				'fields' => array(
					'font_family_description' => __( 'Select Tagline Font Family.', 'esperto' ),
					'font_style_description'  => __( 'Select Tagline Font Style.', 'esperto' ),
				),
			), 
			'weight' => 0,
			'group'             => 'Tagline Setting',
			'dependency'       => array(
				'element'   => 'enable_tagline_typo',
				'value'     =>  'true',
			),            
		),
		
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title', 'actavista' ),
			'param_name'        => 'title1',
			'group'             => 'Heading Setting',
			'description'       => esc_html__( 'Enter title to show.','actavista')
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
		  
	),
);
