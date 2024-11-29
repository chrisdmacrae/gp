<?php
return array(
    'name' 			=> esc_html__( 'Featured Carousel', 'actavista' ),
    'base' 			=> 'featured_carousel',
    'icon'          => get_template_directory_uri() . '/assets/images/vc_icon.png',
    'category' 		=> esc_html__('Actavista', 'actavista'),
    'params' 		=> array(
        /*
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
        ),*/
        array(
            'type'              => 'param_group',                       
            'value'             => '',
            'heading'           => esc_html__('Add Slide', 'actavista'),
            'param_name'        => 'add_slide',
            'show_settings_on_create' => true,
            'params'            => array(
                array(
                    'type'              => 'attach_image',
                    'class'             => '',
                    'heading'           => esc_html__( 'Image', 'actavista' ),
                    'param_name'        => 'image',
                    'description'       => esc_html__( 'Upload slide image', 'actavista' ),
                ),
             	array(
                    'type'              => 'textfield',
                    'class'             => '',
                    'heading'           => esc_html__( 'Title', 'actavista' ),
                    'param_name'        => 'title',
                    'description'       => esc_html__( 'Enter slide title to show.','actavista' )
                ),
                array(
                    'type'              => 'textarea',
                    'class'             => '',
                    'heading'           => esc_html__('Description', 'actavista'),
                    'param_name'        => 'description',
                    'description'       => esc_html__('Enter slide description.','actavista')
                ),
                array(
                    'type'              => 'textfield',
                    'class'             => '',
                    'heading'           => esc_html__( 'Video Link', 'actavista' ),
                    'param_name'        => 'v_link',
                    'description'       => esc_html__( 'Enter youtube or dailymotion video link if you wants to show video.','actavista' )
                ),
                array(
                    'type'              => 'textfield',
                    'class'             => '',
                    'heading'           => esc_html__( 'Title for Small Thumb', 'actavista' ),
                    'param_name'        => 'thumb_title',
                    'description'       => esc_html__( 'Enter title to show on small thumbs.','actavista' )
                ),
        
                
            )
        ),
    ),
);
