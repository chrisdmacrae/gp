<?php
return array(
	'name'     => esc_html__( 'Blog Posts Tabs', 'actavista' ),
	'base'     => 'post_tabs',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'Actavista Widgets', 'actavista' ),
	'params'   => array(
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Latest Posts Label', 'actavista' ),
			'param_name'        => 'label',
			'description'       => esc_html__( 'Enter latest posts tab label that you wants to show.', 'actavista' ),
		),
		array(
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'show_trending_posts_tab',
			
			'value'             => array( 'Enable Trending Posts Tab' => 'true' ),
			'description'       => esc_html__( 'Enable to show trending posts tab.', 'actavista' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Trending Posts Label', 'actavista' ),
			'param_name'        => 'label2',
			'description'       => esc_html__( 'Enter latest posts tab label that you wants to show.', 'actavista' ),
			'dependency'    => array( 
				'element'   => 'show_trending_posts_tab',
				'value'     =>  'true',
			),
		),
		array(
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'show_videos_posts_tab',
			'value'             => array( 'Enable Video Posts Tab' => 'true' ),
			'description'       => esc_html__( 'Enable to show video posts tab.', 'actavista' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Video Tab Label', 'actavista' ),
			'param_name'        => 'label3',
			'description'       => esc_html__( 'Enter video posts tab label that you wants to show.', 'actavista' ),
			'dependency'    => array( 
				'element'   => 'show_videos_posts_tab',
				'value'     =>  'true',
			),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Number', 'actavista' ),
			'param_name'        => 'number',
			'description'       => esc_html__( 'Enter number of posts that you wants to show.', 'actavista' ),
		),
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Order', 'actavista' ),
			'param_name'        => 'order',
			'value'             => array(  esc_html__( 'Ascending', 'actavista' ) => 'ASC',esc_html__( 'Descending', 'actavista' ) => 'DESC' ),
			'description'       => esc_html__( 'Select sorting order ascending or descending for posts.', 'actavista' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title Limit', 'actavista' ),
			'param_name'        => 'title_limit',
			'description'       => esc_html__( 'Enter title words limit.', 'actavista' ),
		),
		array(
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'show_blog_date',
			'value'             => array( 'Enable Post Date' => 'true' ),
			'description'       => esc_html__( 'Enable to show post date.', 'actavista' ),
		),
		array(
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'show_blog_comment',
			'value'             => array( 'Enable Post Comments' => 'true' ),
			'description'       => esc_html__( 'Enable to show post number of comments.', 'actavista' ),
		),
	),
);
