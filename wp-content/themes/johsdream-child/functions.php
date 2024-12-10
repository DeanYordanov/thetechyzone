<?php
// Enqueue parent theme styles
function johsdream_child_enqueue_styles() {
    // Enqueue the parent theme's stylesheet
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    
    // Enqueue the child theme's stylesheet (optional if you add custom styles)
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'), wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'johsdream_child_enqueue_styles');
?>
