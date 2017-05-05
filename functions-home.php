<?php
/**
 * Homepage functions
 */

add_action( 'admin_init', 'hide_editor_from_homepage' );

function hide_editor_from_homepage() {
	// Get the Post ID.
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	if( !isset( $post_id ) ) return;

	$template_file = get_post_meta($post_id, '_wp_page_template', true);

	if($template_file == 'page-home.php') {
		remove_post_type_support('page', 'editor');
	}
}