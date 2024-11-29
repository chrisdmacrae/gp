<?php
return array(
	'name' 			=> esc_html__( 'Single Cause Banner', 'actavista' ),
	'base' 			=> 'donation_banner2',
	'icon' 		    => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' 		=> esc_html__( 'Actavista', 'actavista' ),
	'params' 		=> array(
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Tagline', 'actavista' ),
			'param_name'        => 'tagline',
			'description'       => esc_html__( 'Enter tagline to show.','actavista')
		),
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Select Cause', 'actavista' ),
			'param_name'        => 'select_donation_form',
			'value'             => actavista_get_post_by_slug( 'cause' ),
			'description'       => esc_html__( 'Select cause to show in this section.', 'actavista' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title Limit', 'actavista' ),
			'param_name'        => 'title_limit',
			'description'       => esc_html__( 'Enter title words limit to show post description.','actavista'),
			'default'           => true,
		),
		array( 
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'enable_donation_info',
			'value'             => array( 'Enable Donation Info Bar' => 'true' ),
			'description'       => esc_html__( 'Enable to show donation info bar.', 'actavista' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Text Limit', 'actavista' ),
			'param_name'        => 'text_limit',
			'description'       => esc_html__( 'Enter text words limit to show post description.','actavista')
		),
		
		
		array( 
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'button',
			'value'             => array( 'Enable Donation Button' => 'true' ),
			'description'       => esc_html__( 'Enable to show donation button.', 'actavista' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Button Label', 'actavista' ),
			'param_name'        => 'btn_label',
			'description'       => esc_html__( 'Enter donation button label.','actavista'),
			'dependency'    => array( 
				'element'   => 'button',
				'value'     =>  'true',
			),
		),
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Donation Button Type', 'actavista' ),
			'param_name'        => 'button_type',
			'value'             => array(  esc_html__( 'Popup box', 'actavista' ) => 'popup',esc_html__( 'Detail Page', 'actavista' ) => 'detail_page',esc_html__( 'External Link', 'actavista' ) => 'redirect_ext' ),
			'description'       => esc_html__( 'Select button type that you want to use.', 'actavista' ),
		    'dependency'    => array( 
				'element'   => 'button',
				'value'     =>  'true',
			),
		),
	)
);
