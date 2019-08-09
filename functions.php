<?php

// Theme version
define( 'HOME_EDD_VERSION', '1.7' );

// Include functions
include 'inc/functions-global.php';
include 'inc/functions-menu.php';
include 'inc/functions-metaboxes.php';
include 'inc/functions-home.php';
include 'inc/functions-admin.php';
include 'inc/functions-openingtimes.php';

// add_action
add_action( 'wp_enqueue_scripts', 'dequeue_parent_style', 9999 );
add_action( 'wp_head', 'dequeue_parent_style', 9999 );
add_action( 'wp_enqueue_scripts', 'tna_child_styles' );
add_action( 'wp_enqueue_scripts', 'tna_child_scripts' );
add_action( 'admin_init', 'hide_editor_from_homepage' );
add_action( 'init', 'home_meta_boxes' );
add_action( 'save_post', 'update_page_delete_transient' );
add_action( 'save_post', 'check_cards' );
add_action( 'admin_notices', 'cards_admin_notice' );
add_action( 'admin_enqueue_scripts', 'admin_style' );
add_action( 'admin_menu', 'tna_homepage_menu' );
add_action( 'wp_head', 'render_schema' );

// add_filter
add_filter( 'nav_menu_css_class', 'attributes_filter', 100, 1 );
add_filter( 'nav_menu_item_id', 'attributes_filter', 100, 1 );
add_filter( 'page_css_class', 'attributes_filter', 100, 1 );

// Added menu
add_theme_support( 'menus' );
