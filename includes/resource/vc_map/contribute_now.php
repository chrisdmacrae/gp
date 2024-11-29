<?php
return array(
	'name'     => esc_html__( 'Contribute Now', 'actavista' ),
	'base'     => 'contribute_now',
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
			'description'       => esc_html__( 'Enter title part 2 ( colored part of title ) to show.','actavista')
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
			'heading'           => esc_html__( 'content Position', 'actavista' ),
			'param_name'        => 'text_position',
			'value'             => array( esc_html__( 'Right', 'actavista' )  => 'right', esc_html__( 'Left', 'actavista' )  => 'left' ),
			'description'       => esc_html__( 'Select content position of this section', 'actavista' )
		),
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Mailchimp Lists', 'actavista' ),
			'param_name'        => 'newsltr_mc_lists2',
			'group'             => esc_html__( 'Subscribe', 'actavista' ),
			'admin_label'       => true,
			'value'             => array_flip(actavista_get_mc_lists()),
			'description'       => esc_html__( 'Choose the mailchimp lists to subscribe the user. For more settings use Mailchimp for WP plugin settings.', 'actavista' ),
			
		),
	),
);
