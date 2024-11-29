<?php
return array(
	'name' 			=> esc_html__( 'Contact Form', 'actavista' ),
	'base' 			=> 'contact_form',
	'icon' 		    => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' 		=> esc_html__( 'Actavista', 'actavista' ),
	'params' 		=> array(
		array(
			'type'              => 'textfield',
			'class'             => '',
			'admin_label'       => true,
			'heading'           => esc_html__( 'Main Title', 'actavista' ),
			'param_name'        => 'title',
			'description'       => esc_html__( 'Enter main title to show.','actavista')
		),   
			array(
			'type'              => 'textfield',
			'class'             => '',
			'admin_label'       => true,
			'heading'           => esc_html__( 'Sub Title', 'actavista' ),
			'param_name'        => 'subtitle',
			'description'       => esc_html__( 'Enter sub title to show.','actavista')
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
