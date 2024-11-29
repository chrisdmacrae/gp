<?php
return array(
   'name' 			=> esc_html__( 'Latest Twitter Tweet', 'actavista' ),
   'base' 			=> 'latest_twitter_post',
   'icon' 		    => get_template_directory_uri() . '/assets/images/vc_icon.png',
   'category'		=> esc_html__( 'Actavista', 'actavista' ),
   'params' 		=> array(
     array(
        'type'        => 'colorpicker',
        'class'       => '',
        'heading'     => __( 'Background Color', 'actavista' ),
        'param_name'  => 'bg_color',
        'description' => __( 'Choose background color.', 'actavista' ),
    ),   
     array(
        'type'        => 'textfield',
        'class'       => '',
        'heading'     => esc_html__('Twitter ID', 'actavista'),
        'description' => esc_html__('Enter the twitter id to get twitter tweets', 'actavista'),
        'param_name'  => 'twitter_id',
    ),        
 ),
);
