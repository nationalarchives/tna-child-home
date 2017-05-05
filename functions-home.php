<?php
/**
 * Homepage functions
 */

add_action( 'admin_init', 'hide_editor_from_homepage' );

function hide_editor_from_homepage() {

	if (isset($_GET['post'])) {
		$post_id = $_GET['post'];
	} else {
		if (isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		} else {
			$post_id = '';
		}
	}
	if( !isset( $post_id ) ) return;

	$template_file = get_post_meta($post_id, '_wp_page_template', true);

	if( $template_file == 'page-home.php' ) {
		remove_meta_box( 'postexcerpt' , 'page' , 'normal' );
		remove_post_type_support('page', 'editor');
	}
}

function home_meta_boxes() {
	$home_meta_boxes = array(
		array(
			'id' => 'home_card_1',
			'title' => 'Homepage card',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Order',
					'desc' => '',
					'id' => 'home_card_order_1',
					'type' => 'select',
					'options' => array('1', '2', '3', '4', '5', '6')
				),
				array(
					'name' => 'Content URL',
					'desc' => 'Card dynamically populated via Open Graph',
					'id' => 'home_card_url_1',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override title',
					'desc' => '',
					'id' => 'home_card_title_1',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override excerpt',
					'desc' => '',
					'id' => 'home_card_excerpt_1',
					'type' => 'textarea',
					'std' => ''
				),
				array(
					'name' => 'Override image',
					'desc' => '',
					'id' => 'home_card_img_1',
					'type' => 'text',
					'std' => ''
				),
			)
		),
		array(
			'id' => 'home_card_2',
			'title' => 'Homepage card',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Order',
					'desc' => '',
					'id' => 'home_card_order_2',
					'type' => 'select',
					'options' => array('1', '2', '3', '4', '5', '6')
				),
				array(
					'name' => 'Content URL',
					'desc' => 'Card dynamically populated via Open Graph',
					'id' => 'home_card_url_2',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override title',
					'desc' => '',
					'id' => 'home_card_title_2',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override excerpt',
					'desc' => '',
					'id' => 'home_card_excerpt_2',
					'type' => 'textarea',
					'std' => ''
				),
				array(
					'name' => 'Override image',
					'desc' => '',
					'id' => 'home_card_img_2',
					'type' => 'text',
					'std' => ''
				),
			)
		),
		array(
			'id' => 'home_card_3',
			'title' => 'Homepage card',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Order',
					'desc' => '',
					'id' => 'home_card_order_3',
					'type' => 'select',
					'options' => array('1', '2', '3', '4', '5', '6')
				),
				array(
					'name' => 'Content URL',
					'desc' => 'Card dynamically populated via Open Graph',
					'id' => 'home_card_url_3',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override title',
					'desc' => '',
					'id' => 'home_card_title_3',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override excerpt',
					'desc' => '',
					'id' => 'home_card_excerpt_3',
					'type' => 'textarea',
					'std' => ''
				),
				array(
					'name' => 'Override image',
					'desc' => '',
					'id' => 'home_card_img_3',
					'type' => 'text',
					'std' => ''
				),
			)
		)
	);

	if (isset($_GET['post'])) {
		$post_id = $_GET['post'];
	} else {
		if (isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		} else {
			$post_id = '';
		}
	}
	if( !isset( $post_id ) ) return;

	$template_file = get_post_meta($post_id, '_wp_page_template', true);

	if( $template_file == 'page-home.php' ) {
		foreach ( $home_meta_boxes as $meta_box ) {
			$home_box = new CreateMetaBox( $meta_box );
		}
	}
}

add_action( 'init', 'home_meta_boxes' );

