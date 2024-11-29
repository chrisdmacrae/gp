<?php
return array(
	'name'     => esc_html__( 'Social Signup', 'actavista' ),
	'base'     => 'social-signup',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title', 'actavista' ),
			'param_name'        => 'title',
			'group'             => esc_html__( 'General Settings', 'actavista' ),
			'description'       => esc_html__( 'Enter title to show.', 'actavista' ),
		),
		array(
			'type'              => 'textarea',
			'class'             => '',
			'heading'           => esc_html__( 'Text', 'actavista' ),
			'param_name'        => 'text',
			'group'             => esc_html__( 'General Settings', 'actavista' ),
			'description'       => esc_html__( 'Enter text to show.', 'actavista' ),
		),
			array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Mailchimp Lists', 'actavista' ),
			'param_name'        => 'newsltr_mc_lists2',
			'group'             => esc_html__( 'General Settings', 'actavista' ),
			'admin_label'       => true,
			'value'             => array_flip(actavista_get_mc_lists()),
			'description'       => esc_html__( 'Choose the mailchimp lists to subscribe the user. For more settings use Mailchimp for WP plugin settings.', 'actavista' ),
			
		),
		array(
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'show_facebook',
			'group'             => esc_html__( 'General Settings', 'actavista' ),
			'value'             => array( 'Enable Facebook Button' => 'true' ),
			'description'       => esc_html__( 'Enable to show button.', 'actavista' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Facebook Title', 'actavista' ),
			'param_name'        => 'facebook_title',
			'group'             => esc_html__( 'General Settings', 'actavista' ),
			'description'       => esc_html__( 'Enter facebook title to show.', 'actavista' ),
			'dependency'        => array( 
				'element'   => 'show_facebook',
				'value'     =>  'true',
			),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Facebook Page ID', 'actavista' ),
			'param_name'        => 'facebook_id',
			'group'             => esc_html__( 'General Settings', 'actavista' ),
			'description'       => esc_html__( 'Enter facebook ID to show.', 'actavista' ),
			'dependency'        => array( 
				'element'   => 'show_facebook',
				'value'     =>  'true',
			),
		
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Facebook Link', 'actavista' ),
			'param_name'        => 'facebook_link',
			'group'             => esc_html__( 'General Settings', 'actavista' ),
			'description'       => esc_html__( 'Enter facebook link.', 'actavista' ),
			'dependency'        => array( 
				'element'   => 'show_facebook',
				'value'     =>  'true',
			),
		),
		
		array(
			'type'              => 'checkbox',
			'class'             => '',
			'group'             => esc_html__( 'General Settings', 'actavista' ),
			'param_name'        => 'show_twitter',
			'value'             => array( 'Enable Twitter Button' => 'true' ),
			'description'       => esc_html__( 'Enable to show button.', 'actavista' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Twitter Title', 'actavista' ),
			'param_name'        => 'twitter_title',
			'group'             => esc_html__( 'General Settings', 'actavista' ),
			'description'       => esc_html__( 'Enter twitter title to show.', 'actavista' ),
			'dependency'        => array( 
				'element'   => 'show_twitter',
				'value'     =>  'true',
			),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Twitter Page ID', 'actavista' ),
			'param_name'        => 'twitter_id',
			'group'             => esc_html__( 'General Settings', 'actavista' ),
			'description'       => esc_html__( 'Enter twitter ID to show.', 'actavista' ),
			'dependency'        => array( 
				'element'   => 'show_twitter',
				'value'     =>  'true',
			),
		
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Twitter Link', 'actavista' ),
			'param_name'        => 'twitter_link',
			'group'             => esc_html__( 'General Settings', 'actavista' ),
			'description'       => esc_html__( 'Enter twitter link.', 'actavista' ),
			'dependency'        => array( 
				'element'   => 'show_twitter',
				'value'     =>  'true',
			),
		),
	),
);
