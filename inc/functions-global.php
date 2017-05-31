<?php
/**
 * Global functions
 */

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

// Enqueue styles in correct order
function tna_child_styles() {
	wp_register_style( 'tna-parent-styles', get_template_directory_uri() . '/css/base-sass.css.min', array(), EDD_VERSION, 'all' );
	wp_register_style( 'tna-child-styles', get_stylesheet_directory_uri() . '/css/home-sass.css.min', array(), '0.1', 'all' );
	wp_enqueue_style( 'tna-parent-styles' );
	wp_enqueue_style( 'tna-child-styles' );
}

function tna_child_scripts() {
	wp_register_script( 'tna-child-home-js', get_stylesheet_directory_uri() . '/js/tna-child-home.js', array(), '0.1', true );
	wp_enqueue_script( 'tna-child-home-js' );
}


function admin_style() {
	wp_enqueue_style( 'tna-child-admin-styles', get_stylesheet_directory_uri() . '/css/admin.css' );

	wp_register_script('admin-scripts', get_stylesheet_directory_uri() . '/js/admin.js', array(), '1.0.0' );
	wp_enqueue_script('admin-scripts');
}

function identifyEnvironmentFromIP($server_ip = null, $client_ip = null)
{
	if ($server_ip === null || $client_ip === null) {
		throw new BadFunctionCallException('identifyEnvironmentFromIP function must be passed at IP');
	}
	if ($client_ip === $server_ip) {
		return 'development';
	}
	if (substr($client_ip, 0, 3) === '10.') {
		return 'internal';
	}
	return 'external';
}