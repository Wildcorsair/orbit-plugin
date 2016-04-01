<?php

function orbt_add_custom_metabox() {
    
    add_meta_box(
        'orbt_meta',
        'Job Attributes',
        'orbt_meta_callback',
        'job',
        'normal',
        'low'
    );
}

function orbt_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'orbt_nonce_key' );
    $orbt_meta_data = get_post_meta($post->ID);
//    var_dump($orbt_meta_data);
//    die();
    ?>
    <div>
        <div class='meta-row'>
            <div class='meta-th'>
                <label for='job-id'>Job ID</label>
            </div>
            <div class='meta-td'>
                <input id='job-id' type='text' name='job_id' 
                       value='<?php echo ( !empty( $orbt_meta_data['job_id'] ) ) ? esc_attr( $orbt_meta_data['job_id'][0] ) : null; ?>' />
            </div>
        </div>
        <div class='meta-row'>
            <div class='meta-th'>
                <label for='phone'>Phone nember</label>
            </div>
            <div class='meta-td'>
                <input id='phone' type='text' name='phone' 
                       value='<?php echo ( !empty( $orbt_meta_data['phone'] ) ) ? esc_attr( $orbt_meta_data['phone'][0] ) : null; ?>' />
            </div>
        </div>
    </div>
    <div class='meta-row'>
        <div class='meta-th'>
            <span>Principle Duties</span>
        </div>
        <div class='meta-td'>
            <div class='meta-editor'>   
    <?php
            $content = get_post_meta( $post->ID, 'principle_duties', true );
            $editor = 'principle_duties';
            $settings = array(
                'textarea_rows' => 8,
                'media_buttons' => true
            );
            wp_editor($content, $editor, $settings);
    ?>
            </div>
        </div>
    </div>
    <?php
}

function orbt_meta_save($post_id) {
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = (isset($_POST['orbt_nonce_key']) && wp_verify_nonce($_POST['orbt_nonce_key'], basename(__FILE__))) ? true : false;
    
    if ($is_autosave || $is_revision || !$is_valid_nonce) {
        return false;
    }
    
    if (isset($_POST['job_id'])) {
        update_post_meta($post_id, 'job_id', sanitize_text_field($_POST['job_id']));
    }
    if (isset($_POST['phone'])) {
        update_post_meta($post_id, 'phone', sanitize_text_field($_POST['phone']));
    }
}

add_action('add_meta_boxes', 'orbt_add_custom_metabox');
add_action('save_post', 'orbt_meta_save');
