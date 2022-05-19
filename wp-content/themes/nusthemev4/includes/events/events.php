<?php
/** WEBSPARKS EVENTS MODULE
**  VERSION: 0.1
**  This file must only contain the inclusion
**  of files that would support this module
**  to function.
**/


//require_once( __DIR__ . '/shortcode.php');
//require_once( __DIR__ . '/calendar.php');

function event_enqueue_scripts() {
  wp_enqueue_style( 'events-css', get_stylesheet_directory_uri() . '/includes/events/style.css', array('astra-theme-css') , '20191028', 'all');
  wp_enqueue_script( 'event-js', get_stylesheet_directory_uri() . '/includes/events/script.js', array('jquery'), '20191101', true );
  wp_enqueue_script( 'event-atc-js', get_stylesheet_directory_uri() . '/includes/events/atc.min.js', array('jquery'), '20191101', true );
  wp_enqueue_script( 'event-ajax', get_stylesheet_directory_uri() . '/includes/events/ajax.js', array('jquery'), '20180228', true );
	wp_localize_script( 'event-ajax', 'event_var', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' )
	));
}
add_action( 'wp_enqueue_scripts', 'event_enqueue_scripts', 11 );


// creation of Events Custom post type

function event_custom_type(){
	register_post_type( 'events',
				array(
				'label' => __('Events', 'nus-theme' ),
				'labels' => array(
					'add_new_item' => 'Add New Event',
					'edit_item' => 'Edit Event',
				),
				'public' => true,
				'show_ui' => true,
				'show_in_nav_menus' => true,
				'rewrite' => array( 'slug' => 'events', 'with_front' => false ),
				'hierarchical' => true,
				'menu-icon' => 'dashicons-cart',
				'menu_position' => 6,
				'has_archive' => false,
				'exclude_from_search' =>false,
				'supports' => array(
									 'title',
									 'editor',
									 'thumbnail',
									 'excerpt',
									 'revisions',
									 'custom-fields',
									 'page-attributes')
					)
				);

	$taxonomyargs = array(
		'query_var' => true,
		'hierarchical' => true,
		'label' =>  __('Event Categories', 'nus-theme' ),
		'singular_name' => __('Category', 'nus-theme' )
	);
	register_taxonomy('event-category', 'events', $taxonomyargs );
}
add_action( 'init', 'event_custom_type', 0);



//------------------------ events custom backend columns ------------------------------//
add_filter( 'manage_events_posts_columns', 'events_add_custom_column' );
function events_add_custom_column( $columns ) {
    $columns['start_date'] = 'Event Date';
    return $columns;
}

// Add the data to the custom column
add_action( 'manage_events_posts_custom_column' , 'events_add_custom_column_data', 10, 2 );
function events_add_custom_column_data($column, $post_id) {
	switch ( $column ) {
		case 'start_date' :
				echo date("d M Y", strtotime(str_replace('/', '-',get_field('start_date'))));
				break;
	}
}
add_filter( 'manage_edit-events_sortable_columns', 'events_add_custom_column' );
add_action( 'pre_get_posts', 'events_posts_orderby' );
function events_posts_orderby( $query ) {
  if( ! is_admin() || ! $query->is_main_query() ) {
    return;
  }

	 if( is_admin() && isset( $_GET['post_type'] ) && $_GET['post_type'] == 'events' ){
					 $query->set( 'meta_key', 'start_date' );
					 $query->set( 'orderby', 'meta_value' );
					 $query->set( 'order', 'DESC' );
	 }
}


//---------------------- end events custom backend columns ----------------------------//
