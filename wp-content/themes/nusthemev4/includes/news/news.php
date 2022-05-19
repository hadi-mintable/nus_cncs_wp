<?php
/** WEBSPARKS PEOPLE MODULE
**  VERSION: 0.1
**  This file must only contain the inclusion
**  of files that would support this module
**  to function.
**/

// creation of News Custom post type

function news_custom_type(){
	register_post_type( 'news',
				array(
				'label' => __('News', 'nus-theme' ),
				'labels' => array(
					'add_new_item' => 'Add New News',
					'edit_item' => 'Edit News',
				),
				'public' => true,
				'show_ui' => true,
				'show_in_nav_menus' => true,
				'rewrite' => array( 'slug' => 'news', 'with_front' => false ),
				'hierarchical' => true,
				'menu-icon' => 'dashicons-cart',
				'menu_position' => 6,
				'has_archive' => false,
				'exclude_from_search' =>false,
				'show_in_rest' => true,
				'supports' => array(
									 'title',
									 'editor',
									 'revisions',
									 'custom-fields',
									 'custom-fields',
									 'thumbnail',
									 'page-attributes')
					)
				);

	$taxonomyargs = array(
		'query_var' => true,
		'hierarchical' => true,
		'label' =>  __('News Categories', 'nus-theme' ),
		'singular_name' => __('Category', 'nus-theme' ),
		'show_in_rest' => true,
	);
	register_taxonomy('news-category', 'news', $taxonomyargs );
}
add_action( 'init', 'news_custom_type', 0);