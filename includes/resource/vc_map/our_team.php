<?php
return array(
	'name'     => esc_html__( 'Our Team', 'actavista' ),
	'base'     => 'our_team',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Section Style', 'actavista' ),
			'param_name'        => 'style',
			'value'             => array(  esc_html__( 'Classic Style', 'actavista' ) => 'style-default',esc_html__( 'Color Style ', 'actavista' ) => 'color-style' ),
			'description'       => esc_html__( 'Select section style.', 'actavista' ),
		),		
        array(
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'enable_bottom_space',
			'value'             => array( 'Enable bottom gap for each team member' => 'true' ),
			'description'       => esc_html__( 'Enable to add some bottom space after each team member.', 'actavista' ),
			'dependency'    => array( 
				'element'   => 'style',
				'value'     =>  'style-default',
			),
		),
		
		array(
			'type'       => 'param_group',
			'value'      => '',
			'heading'    => esc_html__( 'Add Team', 'actavista' ),
			'param_name' => 'add_team',
			'group'      => esc_html__( 'Team Setting', 'actavista' ),
			'show_settings_on_create' => true,
			'params'     => array(
				array(
					'type'              => 'attach_image',
					'class'             => '',
					'heading'           => esc_html__('Team Member Image', 'actavista'),
					'param_name'        => 'team_image',
					'description'       => esc_html__('Upload team member image.', 'actavista'),
				),
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Name', 'actavista' ),
					'param_name'        => 'team_name',
					'description'       => esc_html__( 'Enter team member name to show.','actavista')
				),
				array(
					'type'              => 'textarea',
					'class'             => '',
					'heading'           => esc_html__( 'Description', 'actavista' ),
					'param_name'        => 'team_text',
					'description'       => esc_html__( 'Enter team member description to show.','actavista')
				),  
				array(
					'type'              => 'checkbox',
					'class'             => '',
					'param_name'        => 'enable_active',
					'value'             => array( 'Enable Active For This Member' => 'true' ),
					'description'       => esc_html__( 'Enable to make active for this team member.', 'actavista' ),
				),
				array(
					'type'              => 'param_group',
					'value'             => '',
					'heading'           => esc_html__( 'Add Social Icons', 'actavista' ),
					'param_name'        => 'add_social',
					'group'             => 'Social Icons',
					'show_settings_on_create' => true,
					'params'            => array(
						array(
							'type'              => 'iconpicker',
							'class'             => '',
							'heading'           => esc_html__( 'Select Scial Icon', 'actavista' ),
							'param_name'        => 'social_icon',
							'description'       => esc_html__( 'Select social share icon.', 'actavista' ),
						),
						array(
							'type'              => 'textfield',
							'class'             => '',
							'heading'           => esc_html__( 'Social Profile URL', 'actavista' ),
							'param_name'        => 'social_url',
							'description'       => esc_html__( 'Enter social share URL.','actavista' )
						),
					)
				),
			),
		),
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Select Columns', 'actavista' ),
			'param_name'        => 'columns',
			'group'             => esc_html__( 'Column Setting', 'actavista' ), 
			'value'             => array( esc_html__( '2 Columns', 'actavista' ) => 'col-lg-6',  esc_html__( '3 Columns', 'actavista' ) => 'col-lg-4', esc_html__( '4 Columns', 'actavista' ) => 'col-lg-3'),
			'description'       => esc_html__( 'Select columns to show in these section', 'actavista' ),
			'std'              => 'col-lg-4',
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Image Width', 'actavista' ),
			'param_name'        => 'width',
			'group'             => esc_html__( 'Image Setting', 'actavista' ),
			'description'       => esc_html__( 'Enter custom image width like 200, 400, 450. Note: leave it blank if you wants to use default image width.', 'actavista' ),
		),
		
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Image Height', 'actavista' ),
			'param_name'        => 'height',
			'group'             => esc_html__( 'Image Setting', 'actavista' ),
			'description'       => esc_html__( 'Enter custom image height like 200, 400, 450. Note: leave it blank if you wants to use default image width.', 'actavista' ),
		),
		array(
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'enable_title_typo',
			'group'             => 'Typography Setting',
			'value'             => array( 'Enable Member Name Typography' => 'true' ),
			'description'       => esc_html__( 'Enable to show team name typography options.', 'esperto' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Name Font Size', 'esperto' ),
			'group'             => 'Typography Setting',
			'param_name'        => 'title_size',
			'description'       => esc_html__( 'Enter name font size in px like 10px, 20px e.g.','esperto' ),
			'dependency'       => array(
				'element'   => 'enable_title_typo',
				'value'     =>  'true',
			),
		),
		array(
			'type'              => 'colorpicker',
			'class'             => '',
			'heading'           => esc_html__( 'Name Color', 'esperto' ),
			'param_name'        => 'title_color',
			'group'             => 'Typography Setting',
			'description'       => esc_html__( 'Select name color.', 'esperto' ),
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
					'font_family_description' => __( 'Select Name Font Family.', 'esperto' ),
					'font_style_description'  => __( 'Select Name Font Style.', 'esperto' ),
				),
			), 
			'weight'        => 0,
			'group'         => 'Typography Setting',
			'dependency'    => array(
				'element'   => 'enable_title_typo',
				'value'     =>  'true',
			),            
		),

		array(
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'enable_title2_typo',
			'group'             => 'Typography Setting',
			'value'             => array( 'Enable Member Designation Typography' => 'true' ),
			'description'       => esc_html__( 'Enable to show team designation typography options.', 'esperto' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Designation Font Size', 'esperto' ),
			'group'             => 'Typography Setting',
			'param_name'        => 'title2_size',
			'description'       => esc_html__( 'Enter Designation font size in px like 10px, 20px e.g.','esperto' ),
			'dependency'       => array(
				'element'   => 'enable_title2_typo',
				'value'     =>  'true',
			),
		),
		array(
			'type'              => 'colorpicker',
			'class'             => '',
			'heading'           => esc_html__( 'Designation Color', 'esperto' ),
			'param_name'        => 'title2_color',
			'group'             => 'Typography Setting',
			'description'       => esc_html__( 'Select Designation color.', 'esperto' ),
			'dependency'       => array(
				'element'   => 'enable_title2_typo',
				'value'     =>  'true',
			),
		),
	
		array(
			'type'       => 'google_fonts',
			'param_name' => 'title2_font',
			'settings'   => array(
				'fields' => array(
					'font_family_description' => __( 'Select Designation Font Family.', 'esperto' ),
					'font_style_description'  => __( 'Select Designation Font Style.', 'esperto' ),
				),
			), 
			'weight'        => 0,
			'group'         => 'Typography Setting',
			'dependency'    => array(
				'element'   => 'enable_title2_typo',
				'value'     =>  'true',
			),            
		),
	),
);
