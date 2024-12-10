<?php
// Function to add the metabox
function joh_add_brand_metabox() {
    add_meta_box(
        'joh_brand_metabox',              // Unique ID for the metabox
        'Brand Website URL',              // Title of the metabox
        'joh_render_brand_metabox',       // Callback to display the content
        'brands',                          // Post type where the metabox should appear
        'normal',                         // Context: normal, side, or advanced
        'default'                         // Priority: default or high
        
    );
}
add_action('add_meta_boxes', 'joh_add_brand_metabox');

// Callback function to render the metabox
function joh_render_brand_metabox($post) {
    // Retrieve the saved meta value if available
    $brand_website_url = get_post_meta($post->ID, '_joh_brand_website_url', true);

    // Add a nonce field for security
    wp_nonce_field('joh_save_brand_metabox', 'joh_brand_metabox_nonce');

    // Display the input field
    echo '<label for="joh_brand_website_url">Enter the Brand Website URL:</label>';
    echo '<input type="url" id="joh_brand_website_url" name="joh_brand_website_url" value="' . esc_attr($brand_website_url) . '" style="width:100%;" />';
}

// Function to save the metabox data
function joh_save_brand_metabox($post_id) {
    // Verify the nonce
    if (!isset($_POST['joh_brand_metabox_nonce']) || !wp_verify_nonce($_POST['joh_brand_metabox_nonce'], 'joh_save_brand_metabox')) {
        return;
    }

    // Check if the user has permission to save
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Check if the input field is set and save it
    if (isset($_POST['joh_brand_website_url'])) {
        update_post_meta($post_id, '_joh_brand_website_url', sanitize_text_field($_POST['joh_brand_website_url']));
    } else {
        delete_post_meta($post_id, '_joh_brand_website_url');
    }
}

add_action('save_post', 'joh_save_brand_metabox');
