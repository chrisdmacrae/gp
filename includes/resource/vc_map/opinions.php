<?php
return array(
    'name' 			=> esc_html__('Opinions', 'actavista'),
    'base' 			=> 'opinions',
    'icon'          => get_template_directory_uri() . '/assets/images/vc_icon.png',
    'category' 		=> esc_html__('Actavista Widgets', 'actavista'),
    'params' 		=> array(
        array(
            'type'              => 'textfield',
            'class'             => '',
            'heading'           => esc_html__( 'Title', 'actavista' ),
            'param_name'        => 'title_main',
            
            'description'       => esc_html__( 'Enter widget title that you wants to show.', 'actavista' ),
        ),
        array(
            'type'              => 'param_group',                       
            'value'             => '',
            'heading'           => esc_html__('Add Opinions', 'actavista'),
            'param_name'        => 'add_opinions',
            'show_settings_on_create' => true,
            'params'            => array(
                array(
                    'type'              => 'attach_image',
                    'class'             => '',
                    'heading'           => esc_html__('Image', 'actavista'),
                    'param_name'        => 'image',
                    'description'       => esc_html__('Upload person image', 'actavista'),
                ),
                  
                array(
                    'type'              => 'textarea',
                    'class'             => '',
                    'heading'           => esc_html__('Opinion', 'actavista'),
                    'param_name'        => 'test',
                    'description'       => esc_html__('Enter opinion to show.','actavista')
                ),
                array(
                    'type'              => 'textfield',
                    'class'             => '',
                    'heading'           => esc_html__('Name', 'actavista'),
                    'param_name'        => 'name',
                    'description'       => esc_html__('Enter name to show.','actavista')
                ),
                array(
                    'type'              => 'textfield',
                    'class'             => '',
                    'heading'           => esc_html__('Date', 'actavista'),
                    'param_name'        => 'date',
                    'description'       => esc_html__('Enter opinion date to show.','actavista')
                ),
                
            )
        ),
    ),
);
