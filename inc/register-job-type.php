<?php

/**
 * Modeule register new type for WordPress, which call 'job'
 */
function orbt_register_job_type() {
    $singular = 'Job Listing';
    $plural = 'Job Listings';

    $labels = array(
        'name'                  => $plural,
        'singular_name'         => $singular,
        'add_name'              => 'Add New',
        'add_new_item'          => 'Add New ' . $singular,
        'edit'                  => 'Edit',
        'edit_item'             => 'Edit ' . $singular,
        'new_item'              => 'New ' . $singular,
        'view'                  => 'View ' . $singular,
        'view_item'             => 'View ' . $singular,
        'search_item'           => 'Search ' . $plural,
        'parent'                => 'Parent ' . $singular,
        'not_found'             => 'No ' . $plural . ' found',
        'not_found_in_trash'    => 'No ' . $plural . ' in Trash'
    );
    
    $args = array(
        'labels'             => $labels,
//        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menu'   => true,
		'query_var'          => true,
        'menu_position'      => 10,
        'menu_icon'          => 'dashicons-businessman',
		'rewrite'            => array(
            'slug' => 'jobs',
            'with_front' => true,
            'pages' => true, // use for pagination
            'feeds' => true
        ),
		'capability_type'    => 'page',
		'has_archive'        => true,
		'hierarchical'       => false,
		'supports'           => array(
            'title',
            'author'
        )
    );

    register_post_type('job', $args);
}

add_action( 'init', 'orbt_register_job_type' );
