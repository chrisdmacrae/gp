<?php
return array(
    'name' 			=> esc_html__( 'Box With Button', 'actavista' ),
    'base' 			=> 'donate_us',
    'icon' 		    => get_template_directory_uri() . '/assets/images/vc_icon.png',
    'category' 		=> esc_html__('Actavista', 'actavista'),
    'params' 		=> array( 
        array(
			'type'              => 'attach_image',
			'class'             => '',
			'heading'           => esc_html__( 'Icon Image', 'actavista' ),
			'param_name'        => 'image',
			'description'       => esc_html__( 'Upload icon image to show.', 'actavista' ),
	    ),
        array(
            'type'              => 'textfield',
            'class'             => '',
            'admin_label'       => true,
            'heading'           => esc_html__( 'Main Title', 'actavista' ),
            'param_name'        => 'title',
            'description'       => esc_html__( 'Enter main title to show.','actavista')
        ),   
        array( 
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'button',
			'value'             => array( 'Enable Button' => 'true' ),
			'description'       => esc_html__( 'Enable to show button.', 'actavista' ),
		),
		array( 
			'type'          => 'vc_link',
			'class'         => '',
			'heading'       => esc_html__( 'Label and Link', 'actavista' ),
			'param_name'    => 'help_link',
			'description'   => esc_html__( 'Enter button label and its link.','actavista' ),
			'dependency'    => array( 
				'element'   => 'button',
				'value'     =>  'true',
			),
		),
        
       
    ),
);