<?php
return array(
	'name'     => esc_html__( 'Featured Carousel Style 2', 'actavista' ),
	'base'     => 'featured_carousel2',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(
		array(
			'type'       => 'param_group',
			'value'      => '',
			'heading'    => esc_html__( 'Add Slides', 'actavista' ),
			'param_name' => 'add_slides',
			'show_settings_on_create' => true,
			'params'     => array(
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
					'heading'           => esc_html__( 'Tagline', 'actavista' ),
					'param_name'        => 'tagline',
					'description'       => esc_html__( 'Enter tagline to show.','actavista')
				),
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Title', 'actavista' ),
					'param_name'        => 'title',
					'description'       => esc_html__( 'Enter title to show.','actavista')
				),
				array(
					'type'              => 'textarea',
					'class'             => '',
					'heading'           => esc_html__( 'Text', 'actavista' ),
					'param_name'        => 'text',
					'description'       => esc_html__( 'Enter text to show.','actavista')
				),
				array(
					'type'              => 'colorpicker',
					'class'             => '',
					'heading'           => esc_html__( 'Content Box Background Color', 'actavista' ),
					'param_name'        => 'box_bg_color',
					'description'       => esc_html__( 'Select background color of content box.', 'actavista' ),
				),
			),
		),
	),
);