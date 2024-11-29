<?php
return array( 
	'name' 			=> esc_html__( 'Login', 'actavista'  ),
    'base' 			=> 'login',
    'icon' 		    => get_template_directory_uri() . '/assets/images/vc_icon.png',
    'category' 		=> esc_html__( 'Actavista', 'actavista'  ),
    'params' 		=> array( 
     array(
        'type'              => 'attach_image',
        'class'             => '',
        'heading'           => esc_html__( 'Upload Side Image', 'actavista' ),
        'param_name'        => 'side_image',
        'description'       => esc_html__( 'Upload side image to show.',  'actavista' ),
    ),
    array(
        'type'              => 'attach_image',
        'class'             => '',
        'heading'           => esc_html__( 'Upload Logo Image', 'actavista' ),
        'param_name'        => 'logo_image',
        'description'       => esc_html__( 'Upload logo image if you wants to show.',  'actavista' ),
    ),  
     array( 
        'type'              => 'textfield',
        'class'             => '',
        'heading'           => esc_html__('Title', 'actavista'  ),
        'param_name'        => 'title',
        'group'             => 'Heading Setting',
        'admin_label'       =>  true,
        'description'       => esc_html__( 'Enter title that you want to show.', 'actavista' )
    ),
     array( 
        'type'              => 'checkbox',
        'class'             => '',
        'heading'           => esc_html__( 'Register Button Label', 'actavista' ),
        'param_name'        => 'login_btn',
        'admin_label'       =>  true,
        'value'             => array( 'Enable Register Page Button' => 'true' ),
        'description'       => esc_html__( 'Enter button to show.', 'actavista' ),
    ),  
     array( 
        'type'          => 'vc_link',
        'class'         => '',
        'heading'       => esc_html__( 'Label and Link', 'actavista' ),
        'param_name'    => 'btn_link',
        'description'   => esc_html__( 'Enter button label and its link.','actavista' ),
        'dependency'    => array( 
            'element'   => 'login_btn',
            'value'     =>  'true',
        ),
    ),
     array( 
        'type'              => 'textarea',
        'class'             => '',
        'heading'           => esc_html__('Text', 'actavista'  ),
        'param_name'        => 'text',
        'group'             => 'Heading Setting',
        'admin_label'       =>  true,
        'description'       => esc_html__( 'Enter text that you want to show.', 'actavista' )
    ),
     array( 
        'type'              => 'textfield',
        'class'             => '',
        'heading'           => esc_html__('Button Label', 'actavista'  ),
        'param_name'        => 'label',
        'admin_label'       =>  true,
        'description'       => esc_html__( 'Enter login button label that you want to show.', 'actavista' )
    ),
 ),
);
