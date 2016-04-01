<?php

/**
 * This module contain the job taxonomy functionality
 */

function orbt_register_taxonomy() {
    
    $singular = 'Location';
    $plural = 'Locations';
    
    $labels = array(
        'name' => $plural,
        'singular_name' => $singular,
        'search_items' => 'Search ' . $plural,
        'popular_items' => 'Popular ' . $plural,
        'all_items' => 'All ' . $plural,
        'parent_item' => false,
        'edit_item' => 'Edit ' . $singular,
        'update_item' => 'Update ' . $singular,
        'add_new_item' => 'Add New ' . $singular,
        'new_item_name' => 'New ' . $singular . ' Name',
        'separate_items_with_commas' => 'Separate ' . $plural . ' with commas',
        'add_or_remove_items' => 'Add or remove ' . $plural,
        'not_found' => 'No ' . $plural . ' found',
        'menu_name' => $plural
    );
    
    $args = array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'location' ),
    );
    
    register_taxonomy( 'location', 'job', $args );
}

add_action( 'init', 'orbt_register_taxonomy' );