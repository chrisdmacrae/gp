<?php
return array(
    'name' 			=> esc_html__('Testimonials', 'actavista'),
    'base' 			=> 'testimonials',
    'icon'          => get_template_directory_uri() . '/assets/images/vc_icon.png',
    'category' 		=> esc_html__('Actavista', 'actavista'),
    'params' 		=> array(
        
        array(
            'type'              => 'checkbox',
            'class'             => '',
            'param_name'        => 'enable_autoplay',
            'value'             => array( 'Enable AutoPlay' => 'true' ),
            'description'       => esc_html__( 'Enable to make carousle autoplay.', 'actavista' ),
            'value'             => 'true',
        ),
        array(
            'type'              => 'textfield',
            'class'             => '',
            'heading'           => esc_html__( 'Carousel Speed', 'actavista' ),
            'param_name'        => 'caro_speed',
            'description'       => esc_html__( 'Enter your custom carousel slide speed i.e 1000, 2000, 3000.','actavista' ),
            'value'             => 2000,
            'dependency'        => array(
                'element'           => 'enable_autoplay',
                'value'             =>  'true',
                ),
        ),
        array(
            'type'              => 'param_group',                       
            'value'             => '',
            'heading'           => esc_html__('Add Testimonials', 'actavista'),
            'param_name'        => 'add_testimonials',
            'group'            => 'Testimonial Setting',
            'show_settings_on_create' => true,
            'params'            => array(
                array(
                    'type'              => 'attach_image',
                    'class'             => '',
                    'heading'           => esc_html__('Image', 'actavista'),
                    'param_name'        => 'image',
                    'description'       => esc_html__('Upload testimonial image', 'actavista'),
                ),
              
                
                array(
                    'type'              => 'textarea',
                    'class'             => '',
                    'heading'           => esc_html__('Description', 'actavista'),
                    'param_name'        => 'test_description',
                    'description'       => esc_html__('Enter testimonial description.','actavista')
                ),
                array(
                    'type'              => 'textfield',
                    'class'             => '',
                    'heading'           => esc_html__('Name', 'actavista'),
                    'param_name'        => 'testi_name',
                    'description'       => esc_html__('Enter name.','actavista')
                ),
                array(
                    'type'              => 'textfield',
                    'class'             => '',
                    'heading'           => esc_html__('Designation', 'actavista'),
                    'param_name'        => 'designation',
                    'description'       => esc_html__('Enter designation to show.','actavista')
                ),
                
            )
        ),
    ),
);
