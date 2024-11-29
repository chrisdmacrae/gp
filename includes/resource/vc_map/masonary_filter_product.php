<?php
add_filter( 'vc_autocomplete_masonary_filter_products_category_lists_callback', 'actavista_TaxonomyAutocompleteSuggester', 10, 3 );
return array(
	'name'        => esc_html__( 'Masonary Filter Products', 'actavista' ),
	'base'        => 'masonary_filter_products',
	'icon'        => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category'    => esc_html__( 'Actavista', 'actavista' ),
	'params'      => array(
		//General Setting
		array(
			"group"       => esc_html__( 'Post', 'actavista' ),
			"type"        => "autocomplete",
			"heading"     => esc_html__( "Categories", "konia" ),
			"param_name"  => "category_lists",
			"description" => esc_html__( "Select product categories to present in page", "konia" ),
			'query_args'  => array( 'taxonomy' => 'product_cat' ),
			'settings'    => array(
				'multiple'       => true,
				'sortable'       => true,
				'min_length'     => 1,
				'no_hide'        => true,
				'groups'         => true,
				'unique_values'  => true,
				'display_inline' => true,
			)
		),
		array(
			"group"       => esc_html__( 'Post', 'actavista' ),
			"type"        => "textfield",
			"heading"     => esc_html__( "Number", "konia" ),
			"param_name"  => "product_number",
			"description" => esc_html__( "Enter number of product to show", "konia" ),
		),

		array(
			"group"       => esc_html__( 'Post', 'actavista' ),
			"type"        => "checkbox",
			"heading"     => esc_html__( "Add to Cart", "konia" ),
			"param_name"  => "show_cart",
			"description" => esc_html__( "Enable to show product add to cart button", "konia" ),
		),
		array(
			"group"       => esc_html__( 'Post', 'actavista' ),
			"type"        => "checkbox",
			"heading"     => esc_html__( "Quick View", "konia" ),
			"param_name"  => "show_quick",
			"description" => esc_html__( "Enable to show product quick view button", "konia" ),
		),
		array(
			"group"       => esc_html__( 'Post', 'actavista' ),
			"type"        => "checkbox",
			"heading"     => esc_html__( "Show Load More", "konia" ),
			"param_name"  => "show_loadmore",
			"description" => esc_html__( "Enter collection button label", "konia" ),
		),
		array(
			"group"       => esc_html__( 'Post', 'actavista' ),
			"type"        => "textfield",
			"heading"     => esc_html__( "Text", "konia" ),
			"param_name"  => "loadmore_text",
			"description" => esc_html__( "Enter load more button text", "konia" ),
			"value"       => esc_html__( "LoadMore", "konia" ),
			"dependency"  => array(
				'element' => 'show_loadmore',
				'value'   => 'true',
			),
		),
		actavista_vc_lg_column(),
		actavista_vc_md_column(),
		actavista_vc_sm_column(),
		actavista_vc_xs_column(),
	),
);
