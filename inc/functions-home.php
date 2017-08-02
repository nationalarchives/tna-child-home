<?php
/**
 * Homepage functions
 */

/**
 * Removes the editor from the page set as the homepage.
 *
 * @since 1.0
 */
function hide_editor_from_homepage() {

	if ( is_homepage_template() ) {
		remove_meta_box( 'postexcerpt' , 'page' , 'normal' );
		remove_post_type_support('page', 'editor');
	}
}

/**
 * Gets the content of a URL via a HTTP request and returns the content.
 *
 * @since 1.0
 *
 * @param string $url
 * @return string
 */
function get_html_content( $url ) {

	if ( !class_exists('WP_Http') ) {
		include_once( ABSPATH . WPINC . '/class-http.php');
	}

	$request = new WP_Http;
	$result = $request->request( $url );
	$content = $result['body'];

	return $content;
}

/**
 * Extracts the OG title and OG image of HTML content and returns HTML markup with title and image.
 *
 * @since 1.0
 *
 * @see get_html_content and card_html
 *
 * @param string $id
 * @param string $url
 * @param string $title
 * @param string $image
 * @return string
 */
function get_content_and_display_card( $id, $url, $title, $description, $image ) {

	$meta_og_img = trim($image);
	$meta_og_title = trim($title);
	$meta_og_description = trim($description);
	$meta_event_date = '';

	if ( $url ) {

		$content_html = get_html_content($url);

		$html = new DOMDocument();
		@$html->loadHTML($content_html);

		$i = 1;

		foreach( $html->getElementsByTagName('meta') as $meta ) {

			if( $meta->getAttribute('property')=='og:title' && trim($title)=='' ) {
				$meta_og_title = $meta->getAttribute('content');
			}

			if( $meta->getAttribute('property')=='og:description' && trim($description)=='' ) {
				$meta_og_description = $meta->getAttribute('content');
			}

			if( $meta->getAttribute('property')=='og:image' && trim($image)=='' ) {
				$meta_og_img[$i] = $meta->getAttribute('content');
				$i++;
			}

			if (strpos($url, 'eventbrite') !== false) {
				if( $meta->getAttribute('property')=='event:start_time' ) {
					$meta_event_date = $meta->getAttribute('content');
				}
			}
		}

		if ($meta_og_title == 'Page Not Found - The National Archives') {
			return card_fallback( 'Latest news', $id );
		} else {
			if (isset($meta_og_img[1]) == false) {
				$meta_og_img[1] = '';
			}
			if ($meta_event_date) {
				$date = date('l j F Y, H:i', strtotime($meta_event_date));
			} else {
				$date = '';
			}
			if (str_word_count($meta_og_description, 0) > 14) {
				$words = explode(' ',$meta_og_description);
				$meta_og_description = implode(' ', array_splice( $words , 0, 14)) . '...';
			}
			return card_html( $id, $url, $meta_og_img[1], content_type( $url ), esc_attr( $meta_og_title ), esc_attr( $meta_og_description ), $date );
		}
	}
}

/**
 * Returns content type based on URL.
 *
 * @since 1.0
 *
 * @param string $url
 * @return string
 */
function content_type( $url ) {
	if (strpos($url, 'nationalarchives.gov.uk/about/news/') !== false) {

		return 'News';
	}
	if (strpos($url, 'blog.nationalarchives.gov.uk') !== false) {

		return 'Blog';
	}
	if (strpos($url, 'media.nationalarchives.gov.uk') !== false) {

		return 'Multimedia';
	}
	if (strpos($url, 'eventbrite') !== false) {

		return 'Event';
	}

	return 'Feature';
}

/**
 * Returns HTML markup for the cards.
 *
 * @since 1.0
 *
 * @param string $id
 * @param string $url
 * @param string $target
 * @param string $image
 * @param string $type
 * @param string $title
 * @param string $description
 * @param string $date
 * @return string
 */
function card_html_markup( $id, $url, $target, $image, $type, $title, $description, $date ) {

	if ( $date ) {
		$date = '<div class="entry-date"><div class="date">' . $date . '</div></div>';
	}

	$type_class = strtolower($type);

	$html = '<div class="col-card-4">
                <div class="card">
                    <a id="card-%s" href="%s" %s
                    	data-gtm-name="%s"
						data-gtm-id="card_%s"
						data-gtm-position="card_position_%s"
						data-gtm-creative="homepage_card_%s"
					class="homepage-card">
                        <div class="entry-image" style="background-image: url(%s)">
                        </div>
                        <div class="entry-content %s">
                            <div class="content-type">%s</div>
                            <h3>%s</h3>
                            <p>%s</p>
                        </div>
                        %s
                    </a>
                </div>
            </div>';

	return sprintf( $html, $id, $url, $target, $title, $id, $id, $type, $image, $type_class, $type, $title, $description, $date );
}

function card_html_wrapper( $content ) {

	$html = '<div class="col-card-4"><div class="card">%s</div></div>';

	return sprintf( $html, $content );
}

function card_html_link( $id, $url, $target, $type, $title, $content ) {

	$html = '<a id="card-%s" href="%s" %s
                    	data-gtm-name="%s"
						data-gtm-id="card_%s"
						data-gtm-position="card_position_%s"
						data-gtm-creative="homepage_card_%s"
					class="homepage-card">%s</a>';

	return sprintf( $html, $id, $url, $target, $title, $id, $id, $type, $content );
}

/**
 * Returns HTML markup for the cards with icons.
 *
 * @since 1.0
 *
 * @see card_html_markup
 *
 * @param string $id
 * @param string $url
 * @param string $image
 * @param string $type
 * @param string $title
 * @param string $description
 * @param string $date
 * @return string
 */
function card_html( $id, $url, $image, $type, $title, $description, $date ) {

	$target = '';
	if ($type=='Event') {
		$target = 'target="_blank"';
	}

	return card_html_markup( $id, $url, $target, $image, $type, $title, $description, $date );

}

/**
 * Returns HTML markup for the banner.
 *
 * @since 1.0
 *
 * @param string $image
 * @param string $type
 * @param string $title
 * @param string $excerpt
 * @param string $url
 * @param string $button
 * @return string
 */
function banner_html( $image, $type, $title, $excerpt, $url, $button ) {

	$title = esc_attr($title);
	$image = make_path_relative($image);

	$html = '<div class="container">
		        <div class="row">
		            <div class="home-banner" style="background-image: url(%s);">
		                <div class="entry-wrapper">
		                    <div class="entry-content">
		                        <div class="content-type">%s</div>
		                        <h2>%s</h2>
		                        <p>%s</p>
		                        <div class="banner-call-to-action">
		                            <a id="hero-banner" href="%s"
			                            data-gtm-name="%s"
										data-gtm-id="hero_1"
										data-gtm-position="hero_position_banner"
										data-gtm-creative="homepage_hero_%s"
		                            class="ghost-button homepage-hero" aria-label="%s" role="button">%s</a>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>';

	return sprintf( $html, $image, $type, $title, $excerpt, $url, $title, $type, $title, $button );

}

/**
 * Returns HTML markup for the banner if not expired.
 *
 * @since 1.0
 *
 * @see banner_html and is_card_active
 *
 * @param string $expire
 * @param string $status
 * @param string $image
 * @param string $title
 * @param string $excerpt
 * @param string $url
 * @param string $button
 * @return string
 */
function home_banner( $expire, $status, $image, $title, $excerpt, $url, $button ) {

	if ( $status == 'Enable' && is_card_active( $expire ) ) {
		return banner_html( $image, content_type( $url ), $title, $excerpt, $url, $button );
	}

}

/**
 * Deletes the transient (card HTML) when the homepage is updated.
 *
 * @since 1.0
 */
function update_page_delete_transient(){
	for ( $i=1 ; $i<=6 ; $i++ ) {

		$transient = get_transient( 'homepage_cards_html'.$i );

		if( $transient  ) {
			delete_transient( 'homepage_cards_html'.$i );
		}
	}
}

/**
 * Checks if the card has expired based on date input.
 *
 * @since 1.0
 *
 * @param string $expire
 * @return bool
 */
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

/**
 * Displays a fallback card based on type. Default generic events fallback card.
 *
 * @since 1.0
 *
 * @see card_html_markup
 *
 * @param string $fallback
 * @param string $id
 * @return string
 */
function card_fallback( $fallback, $id ) {

	$url = 'http://www.nationalarchives.gov.uk/about/visit-us/whats-on/events/';
	$image = get_stylesheet_directory_uri().'/img/events.jpg';
	$image = make_path_relative($image);
	$type = 'Events';
	$title = 'Upcoming events and exhibitions at The National Archives';
	$target = '';
	$icon = 'event-icon';

	if ( $fallback == 'Latest news' ) {

		$rss = file_get_contents( 'http://www.nationalarchives.gov.uk/category/news/feed/' );

		$content = new SimpleXmlElement( $rss );

		$url = str_replace('livelb', 'www', $content->channel->item[0]->link);
		$image = str_replace('livelb', 'www', $content->channel->item[0]->enclosure['url']);
		$type = 'News';
		$title = $content->channel->item[0]->title;
		$icon = '';

	}
	if ( $fallback == 'Latest blog post' ) {

		$rss = file_get_contents( 'http://blog.nationalarchives.gov.uk/feed/' );

		$content = new SimpleXmlElement( $rss );

		$url = str_replace('livelb', 'www', $content->channel->item[0]->link);
		$image = str_replace('livelb', 'www', $content->channel->item[0]->enclosure['url']);
		$type = 'Blog';
		$title = $content->channel->item[0]->title;
		$icon = '';

	}

	return card_html_markup( $id, $url, $target, $image, $icon, $type, $title );
}

/**
 * Checks for errors when publishing homepage template.
 *
 * @since 1.0
 *
 * @see is_homepage_template
 */
function check_cards() {

	if( is_homepage_template() && isset($_POST['home_card_url_1']) ) {

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

/**
 * Displays error message when errors are found.
 *
 * @since 1.0
 *
 * @see check_cards
 */
function cards_admin_notice() {
	$cards_error = get_transient( get_current_user_id().'cards_error' );
	if ($cards_error) { ?>
		<div class="notice notice-error card-error">
			<p><?php _e( 'You haven\'t edited the fields correctly. Please enter content for either 3 or 6 cards.', 'cards-error' ); ?></p>
		</div>
	<?php
		delete_transient( get_current_user_id().'cards_error' );
	}
	$cards_error_fallback = get_transient( get_current_user_id().'cards_error_fallback' );
	if ($cards_error_fallback) { ?>
		<div class="notice notice-error card-error">
			<p><?php _e( 'You have select a card to expire without a fallback. Please select a fallback option.', 'cards-error' ); ?></p>
		</div>
		<?php
		delete_transient( get_current_user_id().'cards_error_fallback' );
	}
}

/**
 * Checks if homepage template.
 *
 * @since 1.0
 *
 * @return bool
 */
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

/**
 * Returns landing page link cards HTML markup.
 *
 * @since 1.0
 *
 * @param string $title
 * @param string $url
 * @param string $text
 * @return string
 */
function landingpage_link_html_markup( $title, $url, $text ) {

	$html = '<div class="col-card-3">
                <div class="card">
                    <a href="%s">
                        <div class="entry-header">
                            <h3>%s</h3>
                        </div>
                        <div class="entry-content">
                            <p>%s</p>
                        </div>
                    </a>
                </div>
            </div>';

	return sprintf( $html, $url, $title, $text );

}

/**
 * Returns home alert message HTML markup.
 *
 * @since 1.0
 *
 * @param string $status
 * @param string $title
 * @param string $text
 * @return string
 */
function home_alert( $status, $title, $text ) {

	if ( $status == 'enabled' ) {

		$icon = make_path_relative( get_stylesheet_directory_uri() . '/img/close.svg' );

		        $html = '<div id="home_alert" class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="home-alert">
								<a id="alert_close_button" role="button" href="#"><img src="%s"></a>
								<div class="alert-content">
									<h3>%s</h3>
									<p>%s</p>
								</div>
							</div>
						</div>
					</div>
				</div>';

		return sprintf( $html, $icon, $title, $text );
	}
}

