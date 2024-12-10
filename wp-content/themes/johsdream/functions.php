<?php
// Add theme support  and excerpt
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_post_type_support( 'excerpt', array() );

// Enqueue Styles and Scripts
function johsdream_enqueue_assets() {
    // Enqueue Stylesheets
    wp_enqueue_style( 'johsdream-main', get_template_directory_uri() . '/assets/css/main.css' );
    wp_enqueue_style( 'johsdream-noscript', get_template_directory_uri() . '/assets/css/noscript.css' ); // For noscript
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css');


    // Enqueue Scripts

    wp_enqueue_script( 'johsdream-scrollex', get_template_directory_uri() . '/assets/js/jquery.scrollex.min.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'johsdream-browser', get_template_directory_uri() . '/assets/js/browser.min.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'johsdream-breakpoints', get_template_directory_uri() . '/assets/js/breakpoints.min.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'johsdream-util', get_template_directory_uri() . '/assets/js/util.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'johsdream-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), null, true );
}

add_action('wp_enqueue_scripts', 'johsdream_enqueue_assets');

function johsdream_register_menus() {
    register_nav_menus(
        array(
            'primary-menu' => __( 'Primary Menu', 'johsdream' )
        )
    );
}
add_action( 'init', 'johsdream_register_menus' );


function register_reviews_post_type() {
    $labels = array(
        'name'               => _x('Reviews', 'post type general name', 'textdomain'),
        'singular_name'      => _x('Review', 'post type singular name', 'textdomain'),
        'menu_name'          => _x('Reviews', 'admin menu', 'textdomain'),
        'name_admin_bar'     => _x('Review', 'add new on admin bar', 'textdomain'),
        'add_new'            => __('Add New', 'textdomain'),
        'add_new_item'       => __('Add New Review', 'textdomain'),
        'new_item'           => __('New Review', 'textdomain'),
        'edit_item'          => __('Edit Review', 'textdomain'),
        'view_item'          => __('View Review', 'textdomain'),
        'all_items'          => __('All Reviews', 'textdomain'),
        'search_items'       => __('Search Reviews', 'textdomain'),
        'not_found'          => __('No reviews found.', 'textdomain'),
        'not_found_in_trash' => __('No reviews found in Trash.', 'textdomain')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true, // Make it public
        'publicly_queryable' => true, // Enable queryable URLs
        'show_ui'            => true, // Show in the admin interface
        'show_in_menu'       => true, // Show in the WordPress admin menu
        'query_var'          => true,
        'rewrite'            => array('slug' => 'reviews'), // URL slug
        'capability_type'    => 'post',
        'has_archive'        => true, // Enable archive for Reviews
        'hierarchical'       => false,
        'menu_position'      => 5, // Position in the admin menu
        'menu_icon'          => 'dashicons-star-half', // Icon for the menu
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'taxonomies'         => array('category', 'post_tag') // Use categories and tags
    );

    register_post_type('reviews', $args);
}
add_action('init', 'register_reviews_post_type');


function theme_customize_register($wp_customize) {
    // Footer Title
    $wp_customize->add_setting('footer_title', array(
        'default' => 'Get in Touch',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_section('footer_section', array(
        'title' => __('Footer Settings', 'textdomain'),
        'priority' => 120,
    ));
    $wp_customize->add_control('footer_title', array(
        'label' => __('Footer Title', 'textdomain'),
        'section' => 'footer_section',
        'type' => 'text',
    ));

    // Footer Description
    $wp_customize->add_setting('footer_description', array(
        'default' => 'Cras mattis ante fermentum, malesuada neque vitae, eleifend erat. Phasellus non pulvinar erat. Fusce tincidunt...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('footer_description', array(
        'label' => __('Footer Description', 'textdomain'),
        'section' => 'footer_section',
        'type' => 'textarea',
    ));

    // Footer Address
    $wp_customize->add_setting('footer_address', array(
        'default' => 'Untitled Inc.<br />1234 Somewhere Road Suite #2894<br />Nashville, TN 00000-0000',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('footer_address', array(
        'label' => __('Footer Address', 'textdomain'),
        'section' => 'footer_section',
        'type' => 'textarea',
    ));

    // Footer Phone
    $wp_customize->add_setting('footer_phone', array(
        'default' => '(000) 000-0000',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_phone', array(
        'label' => __('Footer Phone', 'textdomain'),
        'section' => 'footer_section',
        'type' => 'text',
    ));

    // Footer Email
    $wp_customize->add_setting('footer_email', array(
        'default' => 'information@untitled.tld',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('footer_email', array(
        'label' => __('Footer Email', 'textdomain'),
        'section' => 'footer_section',
        'type' => 'email',
    ));

}
add_action('customize_register', 'theme_customize_register');

// Register Sidebar
function johsdream_register_sidebar() {
    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'johsdream'),
        'id'            => 'primary-sidebar',
        'description'   => __('Main Sidebar that appears on the right side of the page', 'johsdream'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'johsdream_register_sidebar');

?>


