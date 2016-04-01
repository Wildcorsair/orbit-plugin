<?php

/**
 * Module adds setings page in the main "Jobs" menu
 */

function orbt_add_setting_page() {
    add_submenu_page(
        'edit.php?post_type=job',
        'Reorder Jobs',
        'Reorder Jobs',
        'manage_options',
        'reorder-jobs',
        'orbt_render_setting_page'
    );
}

function orbt_render_setting_page() {
    
    $args = array(
        'post_type' => 'job',
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'no_found_rows' => true,
        'update_post_term_cache' => false,
        'post_per_post' => 50,
    );
    
    $job_listing = new WP_Query($args);
    
    echo '<pre>';
    print_r($job_listing);
    echo '</pre>';
}

add_action('admin_menu', 'orbt_add_setting_page');
