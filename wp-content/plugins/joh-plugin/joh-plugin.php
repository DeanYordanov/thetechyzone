<?php
/**
 * Plugin Name: JOH Plugin
 * Description: This plugin creates a custom post type for Brands, taxonomy, additional CEO field, metabox, and tracks click activity.
 * Version: 1.0
 * Author: Dean Yordanov
 * Author URI: http://example.com
 * License: GPL2
 */

// Include plugin components
require_once plugin_dir_path(__FILE__) . 'includes/joh-metabox.php';
require_once plugin_dir_path(__FILE__) . 'includes/joh-acf-fields.php';
require_once plugin_dir_path(__FILE__) . 'includes/joh-options-page.php';
require_once plugin_dir_path(__FILE__) . 'includes/brands.php';

/**
 * Track Brand Clicks via AJAX
 */
function joh_track_brand_clicks() {
    // Verify AJAX request (security)
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'joh_brand_click_nonce')) {
        wp_send_json_error('Invalid nonce', 403);
    }

    // Get the brand post ID
    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;

    if ($post_id) {
        // Get and increment the click count
        $current_clicks = (int) get_post_meta($post_id, '_brand_clicks', true);
        $new_clicks = $current_clicks + 1;

        update_post_meta($post_id, '_brand_clicks', $new_clicks);

        // Return updated click count
        wp_send_json_success(array('clicks' => $new_clicks));
    }

    wp_send_json_error('Invalid post ID', 400);
    wp_die(); // Ensure proper termination
}

add_action('wp_ajax_joh_track_brand_clicks', 'joh_track_brand_clicks');
add_action('wp_ajax_nopriv_joh_track_brand_clicks', 'joh_track_brand_clicks');

/**
 * Enqueue Scripts and Styles
 */
function joh_enqueue_scripts() {
    // Enqueue JavaScript and CSS only on relevant pages
    if (is_post_type_archive('brands') || has_shortcode(get_post()->post_content, 'display_brands')) {
        wp_enqueue_script(
            'joh-brand-clicks',
            plugin_dir_url(__FILE__) . 'assets/click.js',
            array('jquery'),
            null,
            true
        );

        // Pass AJAX URL and nonce to JavaScript
        wp_localize_script('joh-brand-clicks', 'joh_ajax_filter', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('joh_brand_click_nonce'),
        ));

        // Enqueue the custom plugin styles
        wp_enqueue_style('my-plugin-styles', plugin_dir_url(__FILE__) . 'assets/plugin-styles.css');
    }
}

add_action('wp_enqueue_scripts', 'joh_enqueue_scripts');

/**
 * Shortcode to Display Brands
 */
function joh_display_brands() {
    ob_start();

    // Query the Brands post type
    $args = array(
        'post_type' => 'brands',
        'posts_per_page' => 10,
    );

    $query = new WP_Query($args);
    if ($query->have_posts()) :
        echo '<div class="brands-list">';
        while ($query->have_posts()) : $query->the_post();
            ?>
            <div class="brand-item" data-brand-id="<?php the_ID(); ?>">
                <a href="#" class="brand-link">
                    <?php the_title(); ?>
                </a>
                <span class="click-count">Clicks: <?php echo get_post_meta(get_the_ID(), '_brand_clicks', true) ?: 0; ?></span>
            </div>
            <?php
        endwhile;
        echo '</div>';
        wp_reset_postdata();
    else :
        echo '<p>No brands found.</p>';
    endif;

    return ob_get_clean();
}

add_shortcode('display_brands', 'joh_display_brands');

/**
 * Load Custom Archive Template for Brands
 */
function joh_plugin_custom_archive_template($template) {
    if (is_post_type_archive('brands')) {
        $plugin_template = plugin_dir_path(__FILE__) . 'archive-brands.php';
        if (file_exists($plugin_template)) {
            return $plugin_template;
        }
    }

    return $template;
}

add_filter('template_include', 'joh_plugin_custom_archive_template');
