<?php
return array(
	'name' 			=> esc_html__( 'Donation Form', 'actavista' ),
	'base' 			=> 'donation',
	'icon' 		    => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' 		=> esc_html__( 'Actavista', 'actavista' ),
	'params' 		=> array(
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title', 'actavista' ),
			'param_name'        => 'title',
			'description'       => esc_html__( 'Enter main title to show.','actavista')
		),
		array(
			'type'              => 'textarea',
			'class'             => '',
			'heading'           => esc_html__( 'Text', 'actavista' ),
			'param_name'        => 'text',
			'description'       => esc_html__( 'Enter text to show.','actavista')
		),
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Select Cause', 'actavista' ),
			'param_name'        => 'donation_form',
			'admin_label'       => true,
			'value'             => actavista_get_post_by_slug( 'cause' ),
			'description'       => esc_html__( 'Select cause to show in these section', 'actavista' )
		), 

		array(
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'bottom_donation',
			'value'             => array( 'Enable Bottom Donation' => 'true' ),
			'description'       => esc_html__( 'Enable to show bottom donation.', 'actavista' ),
		),
		array(
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'show_bottom_faqs',
			'value'             => array( 'Enable Form Bottom FAQS' => 'true' ),
			'description'       => esc_html__( 'Enable to show faqs.', 'actavista' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'FAQS Title', 'actavista' ),
			'param_name'        => 'faqs_title',
			'description'       => esc_html__( 'Enter faqs title that you wants to show.', 'actavista' ),
			'dependency'    => array( 
				'element'   => 'show_bottom_faqs',
				'value'     =>  'true',
			),
		),
		array(
			'type'              => 'textarea',
			'class'             => '',
			'heading'           => esc_html__( 'FAQS Text', 'actavista' ),
			'param_name'        => 'faqs_text',
			'description'       => esc_html__( 'Enter faqs text that you wants to show.', 'actavista' ),
			'dependency'    => array( 
				'element'   => 'show_bottom_faqs',
				'value'     =>  'true',
			),
		),
		array(
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'enable_right_box',
			'value'             => array( 'Enable Right Content' => 'true' ),
			'description'       => esc_html__( 'Enable to show right side content.', 'actavista' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Right Title 1', 'actavista' ),
			'param_name'        => 'right_title',
			'description'       => esc_html__( 'Enter right side title 1 that you wants to show.', 'actavista' ),
			'dependency'    => array( 
				'element'   => 'enable_right_box',
				'value'     =>  'true',
			),
		),
		array(
			'type'              => 'textarea',
			'class'             => '',
			'heading'           => esc_html__( 'Right Text 1', 'actavista' ),
			'param_name'        => 'right_text',
			'description'       => esc_html__( 'Enter right text 1 that you wants to show.', 'actavista' ),
			'dependency'    => array( 
				'element'   => 'enable_right_box',
				'value'     =>  'true',
			),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Right Title 2', 'actavista' ),
			'param_name'        => 'right_title2',
			'description'       => esc_html__( 'Enter right side title 2 that you wants to show.', 'actavista' ),
			'dependency'    => array( 
				'element'   => 'enable_right_box',
				'value'     =>  'true',
			),
		),
		array(
			'type'              => 'textarea',
			'class'             => '',
			'heading'           => esc_html__( 'Right Text 2', 'actavista' ),
			'param_name'        => 'right_text2',
			'description'       => esc_html__( 'Enter right text 2 that you wants to show.', 'actavista' ),
			'dependency'    => array( 
				'element'   => 'enable_right_box',
				'value'     =>  'true',
			),
		),
	)
);
