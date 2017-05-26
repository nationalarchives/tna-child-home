<?php
/**
 * Homepage functions
 */

function hide_editor_from_homepage() {

	if ( is_homepage_template() ) {
		remove_meta_box( 'postexcerpt' , 'page' , 'normal' );
		remove_post_type_support('page', 'editor');
	}
}

function home_meta_boxes() {

	$descUrl = 'Enter the URL from the page you want to link to. This will automatically pull in the title and image (press preview to view).';
	$descExpire = 'Date format dd/mm/yyyy. If set the content will expire at midnight on day specified and fallback content will be displayed.';
	$descFallback = '‘Latest news/blog’ will display the most recently published content. ‘What’s On’ is a static card.';
	// $descCardTitle = 'Only enter substitute text here when you need to override the automated title.';
	// $descCardImage = 'If you need to override the automated image, paste the image URL here after uploading it to the image library. Image size 768px x 576px.';
	$descBannerImage = 'Add or paste image URL from media library. Image size 1240px x 630px (~1.91:1 aspect ratio).';

	$home_meta_boxes = array(
		array(
			'id' => 'home_banner',
			'title' => 'Homepage hero banner',
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
					'desc' => $descBannerImage,
					'id' => 'home_banner_img',
					'type' => 'media',
					'std' => ''
				),
				array(
					'name' => 'Button text',
					'desc' => 'Call to action button',
					'id' => 'home_banner_btn',
					'type' => 'select',
					'options' => array('Find out more', 'Read more', 'Book now')
				),
				array(
					'name' => 'Expire date',
					'desc' => $descExpire,
					'id' => 'home_banner_expire',
					'type' => 'date',
					'std' => ''
				)
			)
		),
		array(
			'id' => 'home_card_1',
			'title' => 'Homepage card 1 - top left position',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Content URL*',
					'desc' => $descUrl,
					'id' => 'home_card_url_1',
					'type' => 'text',
					'std' => ''
				),
				/*array(
					'name' => 'Override title',
					'desc' => $descCardTitle,
					'id' => 'home_card_title_1',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override image',
					'desc' => $descCardImage,
					'id' => 'home_card_img_1',
					'type' => 'media',
					'std' => ''
				),*/
				array(
					'name' => 'Expire date',
					'desc' => $descExpire,
					'id' => 'home_card_expire_1',
					'type' => 'date',
					'std' => ''
				),
				array(
					'name' => 'Fallback',
					'desc' => $descFallback,
					'id' => 'home_card_fallback_1',
					'type' => 'select',
					'options' => array('Select fallback content', 'Latest news', 'Latest blog post', 'What’s on')
				)
			)
		),
		array(
			'id' => 'home_card_2',
			'title' => 'Homepage card 2 - top middle position',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Content URL*',
					'desc' => $descUrl,
					'id' => 'home_card_url_2',
					'type' => 'text',
					'std' => ''
				),
				/*array(
					'name' => 'Override title',
					'desc' => $descCardTitle,
					'id' => 'home_card_title_2',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override image',
					'desc' => $descCardImage,
					'id' => 'home_card_img_2',
					'type' => 'media',
					'std' => ''
				),*/
				array(
					'name' => 'Expire date',
					'desc' => $descExpire,
					'id' => 'home_card_expire_2',
					'type' => 'date',
					'std' => ''
				),
				array(
					'name' => 'Fallback',
					'desc' => $descFallback,
					'id' => 'home_card_fallback_2',
					'type' => 'select',
					'options' => array('Select fallback content', 'Latest news', 'Latest blog post', 'What’s on')
				)
			)
		),
		array(
			'id' => 'home_card_3',
			'title' => 'Homepage card 3 - top right position',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Content URL*',
					'desc' => $descUrl,
					'id' => 'home_card_url_3',
					'type' => 'text',
					'std' => ''
				),
				/*array(
					'name' => 'Override title',
					'desc' => $descCardTitle,
					'id' => 'home_card_title_3',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override image',
					'desc' => $descCardImage,
					'id' => 'home_card_img_3',
					'type' => 'media',
					'std' => ''
				),*/
				array(
					'name' => 'Expire date',
					'desc' => $descExpire,
					'id' => 'home_card_expire_3',
					'type' => 'date',
					'std' => ''
				),
				array(
					'name' => 'Fallback',
					'desc' => $descFallback,
					'id' => 'home_card_fallback_3',
					'type' => 'select',
					'options' => array('Select fallback content', 'Latest news', 'Latest blog post', 'What’s on')
				)
			)
		),
		array(
			'id' => 'home_card_4',
			'title' => 'Homepage card 4 - bottom left position',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Content URL*',
					'desc' => $descUrl,
					'id' => 'home_card_url_4',
					'type' => 'text',
					'std' => ''
				),
				/*array(
					'name' => 'Override title',
					'desc' => $descCardTitle,
					'id' => 'home_card_title_4',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override image',
					'desc' => $descCardImage,
					'id' => 'home_card_img_4',
					'type' => 'media',
					'std' => ''
				),*/
				array(
					'name' => 'Expire date',
					'desc' => $descExpire,
					'id' => 'home_card_expire_4',
					'type' => 'date',
					'std' => ''
				),
				array(
					'name' => 'Fallback',
					'desc' => $descFallback,
					'id' => 'home_card_fallback_4',
					'type' => 'select',
					'options' => array('Select fallback content', 'Latest news', 'Latest blog post', 'What’s on')
				)
			)
		),
		array(
			'id' => 'home_card_5',
			'title' => 'Homepage card 5 - bottom middle position',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Content URL*',
					'desc' => $descUrl,
					'id' => 'home_card_url_5',
					'type' => 'text',
					'std' => ''
				),
				/*array(
					'name' => 'Override title',
					'desc' => $descCardTitle,
					'id' => 'home_card_title_5',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override image',
					'desc' => $descCardImage,
					'id' => 'home_card_img_5',
					'type' => 'media',
					'std' => ''
				),*/
				array(
					'name' => 'Expire date',
					'desc' => $descExpire,
					'id' => 'home_card_expire_5',
					'type' => 'date',
					'std' => ''
				),
				array(
					'name' => 'Fallback',
					'desc' => $descFallback,
					'id' => 'home_card_fallback_5',
					'type' => 'select',
					'options' => array('Select fallback content', 'Latest news', 'Latest blog post', 'What’s on')
				)
			)
		),
		array(
			'id' => 'home_card_6',
			'title' => 'Homepage card 6 - bottom right position',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Content URL*',
					'desc' => $descUrl,
					'id' => 'home_card_url_6',
					'type' => 'text',
					'std' => ''
				),
				/*array(
					'name' => 'Override title',
					'desc' => $descCardTitle,
					'id' => 'home_card_title_6',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override image',
					'desc' => $descCardImage,
					'id' => 'home_card_img_6',
					'type' => 'media',
					'std' => ''
				),*/
				array(
					'name' => 'Expire date',
					'desc' => $descExpire,
					'id' => 'home_card_expire_6',
					'type' => 'date',
					'std' => ''
				),
				array(
					'name' => 'Fallback',
					'desc' => $descFallback,
					'id' => 'home_card_fallback_6',
					'type' => 'select',
					'options' => array('Select fallback content', 'Latest news', 'Latest blog post', 'What’s on')
				)
			)
		)
	);

	if( is_homepage_template() ) {
		foreach ( $home_meta_boxes as $meta_box ) {
			$home_box = new CreateMetaBox( $meta_box );
		}
	}
}

function get_html_content( $url ) {

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_PROXY, WP_PROXY_HOST . ':' . WP_PROXY_PORT);
	curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

	$content = curl_exec($ch);

	curl_close($ch);

	return $content;
}

function get_content_and_display_card( $id, $url, $title, $image ) {

	$meta_og_img = trim($image);
	$meta_og_title = trim($title);

	if ( $url ) {
		if (strpos($url, 'eventbrite') !== false) {
			$content_html = get_html_content($url);
		} else {
			$content_html = file_get_contents($url);
		}

		$html = new DOMDocument();
		@$html->loadHTML($content_html);

		foreach( $html->getElementsByTagName('meta') as $meta ) {

			if( $meta->getAttribute('property')=='og:title' && trim($title)=='' ) {
				$meta_og_title = $meta->getAttribute('content');
			}

			if( $meta->getAttribute('property')=='og:image' && trim($image)=='' ) {
				$meta_og_img = $meta->getAttribute('content');
			}
		}

		return card_html( $id, $url, $meta_og_img, content_type( $url ), $meta_og_title );
	}
}

function content_type( $url ) {
	if (strpos($url, 'nationalarchives.gov.uk/about/news/') !== false) {
		return 'News';
	}
	if (strpos($url, 'blog.nationalarchives.gov.uk') !== false) {
		return 'Blog';
	}
	if (strpos($url, 'media.nationalarchives.gov.uk') !== false) {

		$icon = '<img src="'.get_stylesheet_directory_uri().'/img/icon-play-circle-o.svg">';

		return 'Media'.$icon;
	}
	if (strpos($url, 'eventbrite') !== false) {

		$icon = '<img src="'.get_stylesheet_directory_uri().'/img/icon-calendar.svg">';

		return 'Event'.$icon;
	}
}

function card_html( $id, $url, $image, $type, $title ) {

	$target = '';
	if ($type=='Event') {
		$target = 'target="_blank"';
	}

	$html = '<div class="col-card">
				<div class="card">
					<a id="card-%s" href="%s" class="homepage-card" %s>
						<div class="entry-thumbnail" style="background-image: url(%s)">
						</div>
						<div class="entry-content">
							<div class="content-type">%s</div>
							<h3>%s</h3>
						</div>
					</a>
				</div>
			</div>';

	return sprintf( $html, $id, $url, $target, $image, $type, $title );

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
		                            <a id="hero-banner" href="%s" class="ghost-button homepage-hero" title="%s">%s</a>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>';

	return sprintf( $html, $image, $type, $title, $excerpt, $url, $title, $button );

}

function home_banner( $expire, $status, $image, $title, $excerpt, $url, $button ) {

	if ( $status == 'Enable' && is_card_active( $expire ) ) {
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

function is_card_active( $expire ) {

	if ($expire) {
		$expire_date = strtotime($expire);
	} else {
		$expire_date = 9999999999;
	}

	$current_date = strtotime('today');

	if ( $current_date <= $expire_date ) {
		return true;
	} else {
		return false;
	}
}

function card_fallback( $fallback, $id ) {

	$url = 'http://www.nationalarchives.gov.uk/about/visit-us/whats-on/events/';
	$image = get_stylesheet_directory_uri().'/img/events.jpg';
	$content_type = 'Events';
	$title = 'Upcoming events and exhibitions at The National Archives';

	if ( $fallback == 'Latest news' ) {

		$rss = file_get_contents( 'http://www.nationalarchives.gov.uk/category/news/feed/' );

		$content = new SimpleXmlElement( $rss );

		$url = str_replace('livelb', 'www', $content->channel->item[0]->link);
		$image = str_replace('livelb', 'www', $content->channel->item[0]->enclosure['url']);
		$content_type = 'News';
		$title = $content->channel->item[0]->title;

	}
	if ( $fallback == 'Latest blog post' ) {

		$rss = file_get_contents( 'http://blog.nationalarchives.gov.uk/feed/' );

		$content = new SimpleXmlElement( $rss );

		$url = str_replace('livelb', 'www', $content->channel->item[0]->link);
		$image = str_replace('livelb', 'www', $content->channel->item[0]->enclosure['url']);
		$content_type = 'Blog';
		$title = $content->channel->item[0]->title;

	}

	$html = '<div class="col-card">
				<div class="card">
					<a id="card-%s" href="%s" class="homepage-card">
						<div class="entry-thumbnail" style="background-image: url(%s)">
						</div>
						<div class="entry-content">
							<div class="content-type">%s</div>
							<h3>%s</h3>
						</div>
					</a>
				</div>
			</div>';

	return sprintf( $html, $id, $url, $image, $content_type, $title );

}

function check_cards() {

	if( is_homepage_template() ) {

		$stack = array();

		for ( $i = 1; $i <= 6; $i ++ ) {

			$url = $_POST[ 'home_card_url_' . $i ];

			$expire = $_POST[ 'home_card_expire_' . $i ];
			$fallback = $_POST[ 'home_card_fallback_' . $i ];

			if ( $url ) {
				array_push( $stack, $url );
			}

			if ( $expire && $fallback == 'Select fallback content' ) {
				set_transient( get_current_user_id() . 'cards_error_fallback', 'error' );
			}
		}

		$result = count( $stack );

		if ( $result == 3 || $result == 6 ) {
			// do nothing
		} else {
			set_transient( get_current_user_id() . 'cards_error', $result );
		}
	}
}

function cards_admin_notice() {
	$cards_error = get_transient( get_current_user_id().'cards_error' );
	if ($cards_error) { ?>
		<div class="notice notice-error">
			<p><?php _e( 'You have completed '.$cards_error.' cards. Please have either a combination of 3 or 6 cards completed.', 'cards-error' ); ?></p>
		</div>
	<?php
		delete_transient( get_current_user_id().'cards_error' );
	}
	$cards_error_fallback = get_transient( get_current_user_id().'cards_error_fallback' );
	if ($cards_error_fallback) { ?>
		<div class="notice notice-error">
			<p><?php _e( 'You have select a card to expire without a fallback. Please select a fallback option.', 'cards-error' ); ?></p>
		</div>
		<?php
		delete_transient( get_current_user_id().'cards_error_fallback' );
	}
}

function is_homepage_template() {
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
		return true;
	} else {
		return false;
	}
}
