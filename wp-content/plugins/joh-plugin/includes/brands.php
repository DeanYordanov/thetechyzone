<?php
// Function to register the "Brands" custom post type
function joh_create_brands_post_type() {
    // Set up the labels for the "Brands" custom post type
    $labels = array(
        'name'                   => 'Brands',
        'singular_name'          => 'Brand',
        'menu_name'              => 'Brands',
        'name_admin_bar'         => 'Brand',
        'add_new'                => 'Add New',
        'add_new_item'           => 'Add New Brand',
        'new_item'               => 'New Brand',
        'edit_item'              => 'Edit Brand',
        'view_item'              => 'View Brand',
        'all_items'              => 'All Brands',
        'search_items'           => 'Search Brands',
        'parent_item_colon'      => 'Parent Brands:',
        'not_found'              => 'No brands found.',
        'not_found_in_trash'     => 'No brands found in Trash.',
        'featured_image'         => 'Brand Logo',
        'set_featured_image'     => 'Set brand logo',
        'remove_featured_image'  => 'Remove brand logo',
        'use_featured_image'     => 'Use as brand logo',
        'archives'               => 'Brand Archives',
        'insert_into_item'       => 'Insert into brand',
        'uploaded_to_this_item'  => 'Uploaded to this brand',
        'filter_items_list'      => 'Filter brands list',
        'items_list_navigation'  => 'Brands list navigation',
        'items_list'             => 'Brands list',
    );

    // Set up the arguments for the custom post type
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'brands'), // Updated the slug to 'brands' for consistency
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-admin-store',
        'supports'           => array('title', 'editor', 'thumbnail'),
    );

    // Register the custom post type
    register_post_type('brands', $args);  // Fixed: should be 'brands' not 'brand'
}

// Function to register the "Brand Locations" taxonomy
function joh_register_brand_locations_taxonomy() {
    // Set up the labels for the taxonomy
    $labels = array(
        'name'              => 'Brand Locations',
        'singular_name'     => 'Brand Location',
        'search_items'      => 'Search Brand Locations',
        'all_items'         => 'All Brand Locations',
        'parent_item'       => 'Parent Brand Location',
        'parent_item_colon' => 'Parent Brand Location:',
        'edit_item'         => 'Edit Brand Location',
        'update_item'       => 'Update Brand Location',
        'add_new_item'      => 'Add New Brand Location',
        'new_item_name'     => 'New Brand Location Name',
        'menu_name'         => 'Brand Location',
    );

    // Set up the arguments for the taxonomy
    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true, 
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'brand-location'),  // Kept as 'brand-location'
    );

    // Register the taxonomy and attach it to the "Brands" custom post type
    register_taxonomy('brand_location', array('brands'), $args);  // Fixed: 'brands' instead of 'brand'
}

// Hook the functions into WordPress
add_action('init', 'joh_create_brands_post_type'); // Register custom post type
add_action('init', 'joh_register_brand_locations_taxonomy'); // Register taxonomy
