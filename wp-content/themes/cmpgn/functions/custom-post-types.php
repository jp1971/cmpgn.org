<?php

namespace Campaign\Parent;

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
add_action( 'init', __NAMESPACE__ . '\\create_post_types' );
function create_post_types() {

	// Campaign Log
	$labels = array(
		'name'                => __( 'Campaign Log', 'cmpgn' ),
		'singular_name'       => __( 'Log Entry', 'cmpgn' ),
		'add_new'             => _x( 'Add New Log Entry', 'cmpgn', 'cmpgn' ),
		'add_new_item'        => __( 'Add New Log Entry', 'cmpgn' ),
		'edit_item'           => __( 'Edit Log Entry', 'cmpgn' ),
		'new_item'            => __( 'New Log Entry', 'cmpgn' ),
		'view_item'           => __( 'View Log Entry', 'cmpgn' ),
		'search_items'        => __( 'Search Log Entries', 'cmpgn' ),
		'not_found'           => __( 'No Log Entries found', 'cmpgn' ),
		'not_found_in_trash'  => __( 'No Log Entries found in Trash', 'cmpgn' ),
		'parent_item_colon'   => __( 'Parent Log Entry:', 'cmpgn' ),
		'menu_name'           => __( 'Campaign Log', 'cmpgn' ),
	);

	$args = array(
		'labels'              => $labels,
		'taxonomies'          => array( 'category', 'post_tag' ),
		'public'              => true,
		'has_archive'         => true,
		//'rewrite'             => array( 'slug' => 'articles' ),
		'supports'            => array(
			'title', 'editor', 'author', 'excerpt', 'comments'
		)
	);

	register_post_type( 'campaign-log', $args );

	// Character
	$labels = array(
		'name'                => __( 'Charcters', 'cmpgn' ),
		'singular_name'       => __( 'Character', 'cmpgn' ),
		'add_new'             => _x( 'Add New Character', 'cmpgn', 'cmpgn' ),
		'add_new_item'        => __( 'Add New Character', 'cmpgn' ),
		'edit_item'           => __( 'Edit Character', 'cmpgn' ),
		'new_item'            => __( 'New Character', 'cmpgn' ),
		'view_item'           => __( 'View Character', 'cmpgn' ),
		'search_items'        => __( 'Search Characters', 'cmpgn' ),
		'not_found'           => __( 'No Characters found', 'cmpgn' ),
		'not_found_in_trash'  => __( 'No Characters found in Trash', 'cmpgn' ),
		'parent_item_colon'   => __( 'Parent Character:', 'cmpgn' ),
		'menu_name'           => __( 'Campaign Log', 'cmpgn' ),
	);

	$args = array(
		'labels'              => $labels,
		'taxonomies'          => array( 'category', 'post_tag' ),
		'public'              => true,
		'has_archive'         => true,
		//'rewrite'             => array( 'slug' => 'articles' ),
		'supports'            => array(
			'title', 'editor', 'author', 'excerpt'
		)
	);

	register_post_type( 'character', $args );

}