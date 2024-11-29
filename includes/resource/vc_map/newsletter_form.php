<?php
return array(
	'name'     => esc_html__( 'Newsletter Form ', 'actavista' ),
	'base'     => 'newsletter_form',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(
    	array(
            'type'              => 'attach_image',
            'class'             => '',
            'heading'           => esc_html__( 'Background Image', 'actavista' ),
            'param_name'        => 'bg_image',
            'description'       => esc_html__( 'Upload background image', 'actavista' ),
            ),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title', 'actavista' ),
			'param_name'        => 'title',
			'group'             => esc_html__( 'General Settings', 'actavista' ),
			'description'       => esc_html__( 'Enter title to show.', 'actavista' ),
		),
        array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Subtitle', 'actavista' ),
			'param_name'        => 'subtitle',
			'group'             => esc_html__( 'General Settings', 'actavista' ),
			'description'       => esc_html__( 'Enter subtitle to show.', 'actavista' ),
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
		

	),
);