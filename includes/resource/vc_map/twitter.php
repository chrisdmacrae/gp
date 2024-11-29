<?php
return array(
   'name' 			=> esc_html__( 'Twitter Tweets', 'actavista' ),
   'base' 			=> 'twitter',
   'icon' 		    => get_template_directory_uri() . '/assets/images/vc_icon.png',
   'category'		=> esc_html__( 'Actavista', 'actavista' ),
   'params' 		=> array(
     array(
        'type'        => 'textfield',
        'class'       => '',
        'heading'     => esc_html__('Twitter ID', 'actavista'),
        'group'       => esc_html__( 'Tweets Setting', 'actavista' ),
        'description' => esc_html__('Enter the twitter id to get twitter tweets', 'actavista'),
        'param_name'  => 'twitter_id',
    ),        
     array(
        'type'        => 'textfield',
        'holder'      => 'div',
        'class'       => '',
        'heading'     => esc_html__('Number', 'actavista'),
        'group'       => esc_html__( 'Tweets Setting', 'actavista' ),
        'param_name'  => 'number',
        'description' => esc_html__('Enter the number of tweets to show in this section', 'actavista'),
    ),
 ),
);
