<?php
return array(
	'name'     => esc_html__( 'Social Icons Grids', 'actavista' ),
	'base'     => 'social_icons_grids',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(
		array(
            'type'              => 'param_group',                       
            'value'             => '',
            'heading'           => esc_html__( 'Add Social Icons', 'actavista' ),
            'param_name'        => 'add_social_icons',
            'show_settings_on_create' => true,
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
             array(
                'type'              => 'textfield',
                'class'             => '',
                'admin_label'       => true,
                'heading'           => esc_html__( 'Title', 'actavista' ),
                'param_name'        => 'icon_title',
                'description'       => esc_html__( 'Enter icon title to show.','actavista')
            ),
			array(
                'type'              => 'colorpicker',
                'class'             => '',
                'heading'           => esc_html__( 'Icon', 'actavista' ),
                'param_name'        => 'icon_color',
                'description'       => esc_html__( 'Select icon color.', 'actavista' ),
            ),
            array(
                'type'              => 'colorpicker',
                'class'             => '',
                'heading'           => esc_html__( 'Icon Background Color', 'actavista' ),
                'param_name'        => 'icon_bgcolor',
                'group'             => 'Icon Setting',
                'description'       => esc_html__( 'Select icon background color on hover.', 'actavista' ),

            ),
         )
        ),
	),
);