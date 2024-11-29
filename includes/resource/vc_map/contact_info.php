<?php
return array(
    'name' 			=> esc_html__( 'Contact Info', 'actavista' ),
    'base' 			=> 'contact_info',
    'icon' 		    => get_template_directory_uri() . '/assets/images/vc_icon.png',
    'category' 		=> esc_html__('Actavista', 'actavista'),
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
            'type'              => 'param_group',                       
            'value'             => '',
            'heading'           => esc_html__( 'Add Timing Info', 'actavista' ),
            'param_name'        => 'timing_info',
            'show_settings_on_create' => true,
            'params'            => array(
                array(
                    'type'              => 'textfield',
                    'class'             => '',
                    'admin_label'       => true,
                    'heading'           => esc_html__( 'Timing Info 1', 'actavista' ),
                    'param_name'        => 'timing1',
                    'description'       => esc_html__( 'Enter timing info 1 to show.','actavista')
                ),   
                array(
                    'type'              => 'textfield',
                    'class'             => '',
                    'admin_label'       => true,
                    'heading'           => esc_html__( 'Timing Info 2', 'actavista' ),
                    'param_name'        => 'timing2',
                    'description'       => esc_html__( 'Enter timing info 2 to show.','actavista')
                ),   
            )
        ),
        array(
            'type'              => 'textfield',
            'class'             => '',
            'admin_label'       => true,
            'heading'           => esc_html__( 'Enter Contact Info Title', 'actavista' ),
            'param_name'        => 'title2',
            'description'       => esc_html__( 'Enter title to show with contact info.','actavista')
        ),   
        array(
            'type'              => 'textfield',
            'class'             => '',
            'admin_label'       => true,
            'heading'           => esc_html__( 'Enter Address', 'actavista' ),
            'param_name'        => 'address',
            'description'       => esc_html__( 'Enter address to show.','actavista')
        ), 
        array(
            'type' 				=> 'param_group',                       
            'value' 			=> '',
            'heading' 			=> esc_html__( 'Add Contact Info', 'actavista' ),
            'param_name' 		=> 'contact_descc',
            'show_settings_on_create' => true,
            'params' 			=> array(
                array(
                    'type'        => 'dropdown',
                    'class'       => '',
                    'heading'     => esc_html__( 'Select Icon Type', 'actavista' ),
                    'param_name'  => 'icon_typee',
                    'value'       => array( esc_html__( 'FontAwesome Icon', 'actavista' ) => 'icon_icon', esc_html__( 'Flat Icon', 'actavista' ) => 'icon_iconflat'  ),
                    'description' => esc_html__( 'Select icon type to show i.e icon type flat or fontawesome icon.', 'actavista' ),
                ),
                array(
                    'type'        => 'iconpicker',
                    'class'       => '',
                    'heading'     => esc_html__( 'Fontawesome Icon', 'actavista' ),
                    'param_name'  => 'iconicone',
                    'description' => esc_html__( 'Select fontawesome icon.', 'actavista' ),
                    'dependency'  => array(
                        'element' => 'icon_typee',
                        'value'   => array( 'icon_icon' ),
                    ),
                ),
                array(
                    'type'              => 'iconpicker',
                    'class'             => '',
                    'heading'           => esc_html__( 'Flat Icon', 'actavista' ),
                    'param_name'        => 'info_icon2e',
                    'description'       => esc_html__( 'Select flat icon.', 'actavista' ),
                    'dependency'        => array(
                        'element' => 'icon_typee',
                        'value'   => array( 'icon_iconflat' ),
                    ),
                    'settings'    => array(
                        'emptyIcon' => false,
                        'type'      => 'flaticons',
                    ),
                ),
                array(
                    'type'              => 'textfield',
                    'class'             => '',
                    'admin_label'       => true,
                    'heading'           => esc_html__( 'Label', 'actavista' ),
                    'param_name'        => 'label',
                    'description'       => esc_html__( 'Enter label to show.','actavista')
                ),   
                array(
                    'type'              => 'textfield',
                    'class'             => '',
                    'admin_label'       => true,
                    'heading'           => esc_html__( 'Conatct Info', 'actavista' ),
                    'param_name'        => 'info_contact',
                    'description'       => esc_html__( 'Enter contact info to show.','actavista')
                ),   
                
            )
        ),
        array(
            'type'        => 'checkbox',
            'class'       => '',
            'param_name'  => 'enable_social_icon',
            'value'       => array('Enable Social Icons' => 'true'),
            'description' => esc_html__('Enable to show social icons.', 'actavista'),
        ),
        array(
            'type'              => 'param_group',                       
            'value'             => '',
            'heading'           => esc_html__( 'Add Social Icons', 'actavista' ),
            'param_name'        => 'add_social_icons',
            'show_settings_on_create' => true,
            'dependency'       => array(
                'element'   => 'enable_social_icon',
                'value'     =>  'true',
            ),
            'params'            => array(
             array(
                'type'        => 'iconpicker',
                'class'       => '',
                'heading'     => esc_html__( 'Social Icon', 'actavista' ),
                'param_name'  => 'social_icon',
                'description' => esc_html__( 'Select social icon.', 'actavista' ),
            ),
             array(
                'type'              => 'textfield',
                'class'             => '',
                'admin_label'       => true,
                'heading'           => esc_html__( 'Icon Link', 'actavista' ),
                'param_name'        => 'icon_link',
                'description'       => esc_html__( 'Enter icon link to link with icon.','actavista')
            ),   
         )
        ),
    ),
);
