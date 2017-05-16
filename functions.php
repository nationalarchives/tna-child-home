<?php

// For breadcrumbs and URLs
// Edit as required
function tnatheme_globals() {
    global $pre_path;
    global $pre_crumbs;
    // If internal TNA
    if (substr($_SERVER['REMOTE_ADDR'], 0, 3) === '10.') {
        $pre_path = '';
        $pre_crumbs = '';
    // If external TNA
    } else {
        $pre_crumbs = '';
        $pre_path = '';
    }
}
// If web development machine
if ( $_SERVER['SERVER_ADDR'] !== $_SERVER['REMOTE_ADDR'] ) {
        tnatheme_globals();
    } else {
        $pre_path = '';
        $pre_crumbs = '';
}

// Dequeue parent styles for re-enqueuing in the correct order
function dequeue_parent_style() {
    wp_dequeue_style('tna-styles');
    wp_deregister_style('tna-styles');
}
add_action( 'wp_enqueue_scripts', 'dequeue_parent_style', 9999 );
add_action( 'wp_head', 'dequeue_parent_style', 9999 );

// Enqueue styles in correct order
function tna_child_styles() {
    wp_register_style( 'tna-parent-styles', get_template_directory_uri() . '/css/base-sass.css.min', array(), EDD_VERSION, 'all' );
    wp_register_style( 'tna-child-styles', get_stylesheet_directory_uri() . '/css/home-sass.css.min', array(), '0.1', 'all' );
    wp_enqueue_style( 'tna-parent-styles' );
    wp_enqueue_style( 'tna-child-styles' );
}
add_action( 'wp_enqueue_scripts', 'tna_child_styles' );


//Added menu function
add_theme_support( 'menus' );


//Filters out ids and classes from li and ul elements
function attributes_filter($var) {
    return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}
add_filter('nav_menu_css_class', 'attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'attributes_filter', 100, 1);
add_filter('page_css_class', 'attributes_filter', 100, 1);

// Include functions
include 'functions-home.php';

add_action( 'admin_init', 'hide_editor_from_homepage' );
add_action( 'init', 'home_meta_boxes' );
add_action( 'save_post', 'update_page_delete_transient' );
