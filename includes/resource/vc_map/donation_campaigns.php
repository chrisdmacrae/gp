<?php
add_filter( 'vc_autocomplete_donation_campaigns_cat_callback', 'actavista_TaxonomyAutocompleteSuggester', 10, 3 );
return array(
	'name' 			=> esc_html__( 'Donation Campaigns Listing', 'actavista' ),
	'base' 			=> 'donation_campaigns',
	'icon' 		    => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' 		=> esc_html__( 'Actavista', 'actavista' ),
	'params' 		=> array(
		
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Number', 'actavista' ),
			'param_name'        => 'number',
			'description'       => esc_html__( 'Enter number of campaigns that you wants to show.', 'actavista' ),
		),
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Order', 'actavista' ),
			'param_name'        => 'order',
			'value'             => array(  esc_html__( 'Ascending', 'actavista' ) => 'ASC',esc_html__( 'Descending', 'actavista' ) => 'DESC' ),
			'description'       => esc_html__( 'Select sorting order ascending or descending for campaigns.', 'actavista' ),
		),
		array(
			'type'        => 'autocomplete',
			'class'       => '',
			'heading'     => esc_html__( 'Select Campaign Category', 'actavista' ),
			'param_name'  => 'cat',
			'query_args'  => array( 'taxonomy' => 'cause_cat' ),
			'settings'    => array( 'multiple' => true ),
			'description' => esc_html__( 'Choose campaigns posts categories for which campaigns you want to show', 'actavista' ),
		),
		array( 
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'enable_cat',
			'value'             => array( 'Enable Category' => 'true' ),
			'description'       => esc_html__( 'Enable to show campaign category.', 'actavista' ),
		),
		array( 
			'type'              => 'checkbox',
			'class'             => '',
			'param_name'        => 'button2',
			'value'             => array( 'Enable Button' => 'true' ),
			'description'       => esc_html__( 'Enable to show button.', 'actavista' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Button Label', 'actavista' ),
			'param_name'        => 'btn_label',
			'description'       => esc_html__( 'Enter donation button label.','actavista'),
			'dependency'    => array( 
				'element'   => 'button2',
				'value'     =>  'true',
			),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title Limit', 'actavista' ),
			'param_name'        => 'title_limit',
			'description'       => esc_html__( 'Enter title limit to show title.','actavista')
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Text Limit', 'actavista' ),
			'param_name'        => 'text_limit',
			'description'       => esc_html__( 'Enter text limit to show title.','actavista')
		),
	)
);
