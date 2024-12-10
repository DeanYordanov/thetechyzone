<?php
// Register the options page
function joh_register_options_page() {
    add_options_page(
        'JOH Plugin Settings',   // Page title
        'JOH Settings',          // Menu title
        'manage_options',        // Capability
        'joh-plugin-settings',   // Menu slug
        'joh_options_page_html'  // Callback to display content
    );
}
add_action('admin_menu', 'joh_register_options_page');

// Callback to render the options page HTML
function joh_options_page_html() {
    // Ensure the user has sufficient permissions
    if (!current_user_can('manage_options')) {
        return;
    }

    // Check if settings have been updated
    if (isset($_POST['joh_settings_submit'])) {
        // Update the checkboxes for visibility
        update_option('joh_show_brand_locations', isset($_POST['joh_show_brand_locations']) ? 1 : 0);
        update_option('joh_show_brand_ceos', isset($_POST['joh_show_brand_ceos']) ? 1 : 0);
        echo '<div class="updated"><p>Settings saved.</p></div>';
    }

    // Get the current values of the options
    $joh_show_brand_locations = get_option('joh_show_brand_locations', 1); // Default to showing Brand Locations
    $joh_show_brand_ceos = get_option('joh_show_brand_ceos', 1);           // Default to showing Brand CEOs

    ?>
    <div class="wrap">
        <h1>JOH Plugin Settings</h1>
        <form method="POST" action="">
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="joh_show_brand_locations">Show Brand Locations</label>
                    </th>
                    <td>
                        <input type="checkbox" id="joh_show_brand_locations" name="joh_show_brand_locations" value="1" <?php checked(1, $joh_show_brand_locations); ?> />
                        <p class="description">Enable or disable the visibility of Brand Locations on the frontend.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="joh_show_brand_ceos">Show Brand CEOs</label>
                    </th>
                    <td>
                        <input type="checkbox" id="joh_show_brand_ceos" name="joh_show_brand_ceos" value="1" <?php checked(1, $joh_show_brand_ceos); ?> />
                        <p class="description">Enable or disable the visibility of Brand CEOs on the frontend.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button('Save Settings', 'primary', 'joh_settings_submit'); ?>
        </form>
    </div>
    <?php
}
