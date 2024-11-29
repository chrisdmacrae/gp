<?php
return array(
	'name' 			=> esc_html__( 'Contact Form Widget', 'actavista' ),
	'base' 			=> 'footer_contact_form',
	'icon' 		    => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' 		=> esc_html__( 'Actavista Widgets', 'actavista' ),
	'params' 		=> array(
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__('Title', 'actavista'),
			'param_name'        => 'title',
			'admin_label'       =>  true,
			'description'       => esc_html__('Enter title that you want to show.','actavista')
		),   
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Select Form', 'actavista' ),
			'param_name'        => 'contactform',
			'admin_label'       => true,
			'value'             => actavista_get_posts_array('wpcf7_contact_form'),
			'description'       => esc_html__( 'Select form to show in these  section', 'actavista' )
		),         
	)
);
