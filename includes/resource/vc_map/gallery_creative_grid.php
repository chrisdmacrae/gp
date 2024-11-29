<?php
return array(
	'name'     => esc_html__( 'Gallery Creative Grid', 'actavista' ),
	'base'     => 'gallery_creative_grid',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista', 'actavista' ),
	'params'   => array(
		array(
			'type'              => 'attach_images',
			'class'             => '',
			'heading'           => esc_html__( 'Gallery Images', 'actavista' ),
			'param_name'        => 'gallery_images',
			'description'       => esc_html__( 'Upload gallery images.', 'actavista' ),
		),		
	),
);
