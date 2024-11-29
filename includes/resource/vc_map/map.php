<?php
return array(
    'name'          => esc_html__( 'Google Map', 'actavista' ),
    'base'          => 'map',
    'icon'          => get_template_directory_uri() . '/assets/images/vc_icon.png',
    'category'      => esc_html__( 'Actavista', 'actavista' ),
    'params'        => array( 
    array(
        'type'              => 'param_group',                       
        'value'             => '',
        'heading'           => esc_html__('Add Map Info', 'actavista'),
        'param_name'        => 'add_map',
        'show_settings_on_create' => true,
        'params'            => array(
            array(
                'type'              => 'textfield',
                'class'             => '',
                'heading'           => esc_html__( 'Latitude', 'actavista' ),
                'param_name'        => 'latitude',
                'group'             => esc_html__( 'Map Setting', 'actavista' ),
                'admin_label'       => true,
                'description'       => esc_html__( 'Enter latitude of google map.','actavista' ),
            ),
            array(
                'type'              => 'textfield',
                'class'             => '',
                'heading'           => esc_html__( 'Longitude', 'actavista' ),
                'param_name'        => 'longitude',
                'group'             => esc_html__( 'Map Setting','actavista' ),
                'admin_label'       => true,
                'description'       => esc_html__( 'Enter longitude of google map.', 'actavista' ),
            ),
            array(
                'type'              => 'textfield',
                'class'             => '',
                'heading'           => esc_html__( 'Title', 'actavista' ),
                'param_name'        => 'title',
                'group'             => esc_html__( 'Map Setting','actavista' ),
                'description'       => esc_html__( 'Enter location title of google map if you wants to show.', 'actavista' ),
            ),
            array(
                'type'              => 'textfield',
                'class'             => '',
                'heading'           => esc_html__( 'Address', 'actavista' ),
                'param_name'        => 'address',
                'group'             => esc_html__( 'Map Setting','actavista' ),
                'description'       => esc_html__( 'Enter location address if you wants to show.', 'actavista' ),
            ),
        )
    ),
  )
);
