<?php
/**
 * Homepage functions
 */

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
			'id' => 'home_banner',
			'title' => 'Homepage banner',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Banner',
					'desc' => '',
					'id' => 'home_banner_status',
					'type' => 'select',
					'options' => array('Disable', 'Enable')
				),
				array(
					'name' => 'URL',
					'desc' => '',
					'id' => 'home_banner_url',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Title',
					'desc' => '',
					'id' => 'home_banner_title',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Excerpt',
					'desc' => '',
					'id' => 'home_banner_excerpt',
					'type' => 'textarea',
					'std' => ''
				),
				array(
					'name' => 'Image',
					'desc' => '',
					'id' => 'home_banner_img',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Button text',
					'desc' => 'Call to action button',
					'id' => 'home_banner_btn',
					'type' => 'select',
					'options' => array('Find out more', 'Book now')
				),
			)
		),
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
		),
		array(
			'id' => 'home_card_4',
			'title' => 'Homepage card',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Order',
					'desc' => '',
					'id' => 'home_card_order_4',
					'type' => 'select',
					'options' => array('1', '2', '3', '4', '5', '6')
				),
				array(
					'name' => 'Content URL',
					'desc' => 'Card dynamically populated via Open Graph',
					'id' => 'home_card_url_4',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override title',
					'desc' => '',
					'id' => 'home_card_title_4',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override excerpt',
					'desc' => '',
					'id' => 'home_card_excerpt_4',
					'type' => 'textarea',
					'std' => ''
				),
				array(
					'name' => 'Override image',
					'desc' => '',
					'id' => 'home_card_img_4',
					'type' => 'text',
					'std' => ''
				),
			)
		),
		array(
			'id' => 'home_card_5',
			'title' => 'Homepage card',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Order',
					'desc' => '',
					'id' => 'home_card_order_5',
					'type' => 'select',
					'options' => array('1', '2', '3', '4', '5', '6')
				),
				array(
					'name' => 'Content URL',
					'desc' => 'Card dynamically populated via Open Graph',
					'id' => 'home_card_url_5',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override title',
					'desc' => '',
					'id' => 'home_card_title_5',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override excerpt',
					'desc' => '',
					'id' => 'home_card_excerpt_5',
					'type' => 'textarea',
					'std' => ''
				),
				array(
					'name' => 'Override image',
					'desc' => '',
					'id' => 'home_card_img_5',
					'type' => 'text',
					'std' => ''
				),
			)
		),
		array(
			'id' => 'home_card_6',
			'title' => 'Homepage card',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Order',
					'desc' => '',
					'id' => 'home_card_order_6',
					'type' => 'select',
					'options' => array('1', '2', '3', '4', '5', '6')
				),
				array(
					'name' => 'Content URL',
					'desc' => 'Card dynamically populated via Open Graph',
					'id' => 'home_card_url_6',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override title',
					'desc' => '',
					'id' => 'home_card_title_6',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override excerpt',
					'desc' => '',
					'id' => 'home_card_excerpt_6',
					'type' => 'textarea',
					'std' => ''
				),
				array(
					'name' => 'Override image',
					'desc' => '',
					'id' => 'home_card_img_6',
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

function get_content_and_display_card( $url ) {

	$meta_og_img = null;
	$meta_og_title = null;

	if ( $url ) {
		$content_html = file_get_contents($url);

		$html = new DOMDocument();
		@$html->loadHTML($content_html);

		foreach($html->getElementsByTagName('meta') as $meta) {
			if($meta->getAttribute('property')=='og:title'){
				$meta_og_title = $meta->getAttribute('content');
			}
			if($meta->getAttribute('property')=='og:image'){
				$meta_og_img = $meta->getAttribute('content');
			}
			if($meta->getAttribute('property')=='event:end_time'){
				$meta_og_event_end_time = $meta->getAttribute('content');
			}
			/*if($meta->getAttribute('property')=='og:description'){
				$meta_og_description = $meta->getAttribute('content');
			}*/
		}

		return card_html( $url, $meta_og_img, content_type( $url ), $meta_og_title );
	}
}

function content_type( $url ) {
	if (strpos($url, 'nationalarchives.gov.uk/about/news/') !== false) {
		return 'News';
	}
	if (strpos($url, 'blog.nationalarchives.gov.uk') !== false) {
		return 'Blog';
	}
	if (strpos($url, 'eventbrite') !== false) {
		return 'Event';
	}
}

function card_html( $url, $image, $type, $title ) {

	$html = '<div class="card-grid">
				<div class="card">
					<a href="%s">
						<div class="entry-thumbnail" style="background-image: url(%s)">
						</div>
						<div class="entry-content">
							<div class="content-type">%s</div>
							<h3>%s</h3>
						</div>
					</a>
				</div>
			</div>';

	return sprintf( $html, $url, $image, $type, $title );

}

function banner_html( $image, $type, $title, $excerpt, $url, $button ) {

	$html = '<div class="container">
		        <div class="row">
		            <div class="home-banner" style="background-image: url(%s);">
		                <div class="entry-wrapper">
		                    <div class="entry-content">
		                        <div class="content-type">%s</div>
		                        <h2>%s</h2>
		                        <p>%s</p>
		                        <div class="banner-call-to-action">
		                            <a href="%s" class="ghost-button">%s</a>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>';

	return sprintf( $html, $image, $type, $title, $excerpt, $url, $button );

}

function home_banner( $status, $image, $title, $excerpt, $url, $button ) {

	if ( $status == 'Enable' ) {
		return banner_html( $image, content_type( $url ), $title, $excerpt, $url, $button );
	}

}

function update_page_delete_transient(){
	for ( $i=1 ; $i<=6 ; $i++ ) {

		$transient = get_transient( 'homepage_cards_html'.$i );

		if( $transient  ) {
			delete_transient( 'homepage_cards_html'.$i );
		}
	}
}
