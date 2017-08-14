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
 * @param $words
 * @param int $number
 *
 * @return string
 */
function limit_words( $words, $number = 14 ) {

	if (str_word_count($words, 0) > $number) {
		$explode_words = explode( ' ', $words );
		$words = implode(' ', array_splice( $explode_words , 0, $number)) . '...';
	}

	return $words;
}

/**
 * @param $result
 *
 * @return bool
 */
function check_result( $result ) {

	if ( is_wp_error( $result ) ) {
		$result = false;
	} elseif ( wp_remote_retrieve_response_code( $result ) == '404' ) {
		$result = false;
	} else {
		$result = true;
	}

	return $result;
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

	if ( check_result( $result ) ) {
		$content = $result['body'];
	} else {
		$content = null;
	}

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
 * @param string $description
 * @param string $image
 * @return string
 */
function get_content_and_display_card( $id, $url, $title, $description, $image ) {

	$image = trim( $image );
	$type = content_type( $url );
	$title = trim( $title );
	$description = trim( $description );
	$date = '';

	if ( $url ) {

		$html_content = get_html_content($url);

		if ( $html_content ) {

			$html = new DOMDocument();
			@$html->loadHTML($html_content);

			$meta_og_title = '';
			$meta_og_description = '';
			$meta_og_img = '';
			$meta_event_date = '';
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

			if (isset($meta_og_img[1]) == false) {
				$meta_og_img[1] = '';
			}

			if ($meta_og_title == 'Page Not Found - The National Archives') {
				return card_fallback( 'Latest news', $id );
			}

			$image = $meta_og_img[1];
			$title = esc_attr( $meta_og_title );
			$description = esc_attr( $meta_og_description );
			$date = $meta_event_date;

		} else {

			// something is wrong - most likely an incorrect URL
			$url = 'http://www.nationalarchives.gov.uk/about/visit-us/whats-on/events/';
			$image = make_path_relative( get_stylesheet_directory_uri().'/img/events.jpg' );
			$type = 'Events';
			$title = 'Events - The National Archives';
			$description = 'Find more information about our events programme and how to book tickets.';
		}

		return card_html( $id, $url, $image, $type, $title, $description, $date );
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

    $content_type = "Feature";

	if (strpos($url, 'nationalarchives.gov.uk/about/news/') !== false) {

        $content_type = 'News';
	}
	elseif (strpos($url, 'blog.nationalarchives.gov.uk') !== false) {

        $content_type = 'Blog';
	}
	elseif (strpos($url, 'media.nationalarchives.gov.uk') !== false) {

        $content_type = 'Multimedia';
	}
	elseif (strpos($url, 'eventbrite') !== false) {

        $content_type = 'Event';
	}
	return $content_type;
}

/**
 * @param $content
 * @return string
 */
function card_wrapper( $content ) {

	$html = '<div class="col-card-4"><div class="card">%s</div></div>';

	return sprintf( $html, $content );
}

/**
 * @param $id
 * @param $url
 * @param $type
 * @param $title
 * @param $content
 * @return string
 */
function card_link( $id, $url, $type, $title, $content ) {

	$target = '';
	if ($type=='Event') {
		$target = 'target="_blank"';
	}

	$html = '<a id="card-%s" href="%s" %s data-gtm-name="%s" data-gtm-id="card_%s" data-gtm-position="card_position_%s" data-gtm-creative="homepage_card_%s" class="homepage-card">%s</a>';

	return sprintf( $html, $id, $url, $target, $title, $id, $id, $type, $content );
}

/**
 * @param $image
 * @return string
 */
function card_image( $image ) {

	$html = '<div class="entry-image" style="background-image: url(%s)"></div>';

	return sprintf( $html, $image );
}

/**
 * @param $date
 * @return string
 */
function card_date( $date ) {

	if ( $date ) {

		$date = date('l j F Y, H:i', strtotime( $date ));

		$html = '<div class="entry-date"><div class="date">%s</div></div>';

		return sprintf( $html, $date );
	}
}

/**
 * @param $type
 * @param $title
 * @param $description
 * @return string
 */
function card_content( $type, $title, $description ) {

	$type_class = strtolower( $type );
	$description = limit_words( $description );

	$html = '<div class="entry-content %s"><div class="content-type">%s</div><h3>%s</h3><p>%s</p></div>';

	return sprintf( $html, $type_class, $type, $title, $description );
}

/**
 * Returns HTML markup for the cards.
 *
 * @since 1.0
 *
 * @see card_html
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

	$content = card_image( $image ) . card_content( $type, $title, $description ) . card_date( $date );

	return card_wrapper( card_link( $id, $url, $type, $title, $content ) );
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
 * @see card_html
 *
 * @param string $fallback
 * @param string $id
 * @return string
 */
function card_fallback( $fallback, $id ) {

	$url = 'http://www.nationalarchives.gov.uk/about/visit-us/whats-on/events/';
	$image = make_path_relative( get_stylesheet_directory_uri().'/img/events.jpg' );
	$type = 'Events';
	$title = 'Events - The National Archives';
	$description = 'Find more information about our events programme and how to book tickets.';
	$date = '';

	if ( $fallback == 'Latest news' ) {

		$rss = file_get_contents( 'http://www.nationalarchives.gov.uk/category/news/feed/' );

		$content = new SimpleXmlElement( $rss );

		$url = str_replace('livelb', 'www', $content->channel->item[0]->link);
		$image = str_replace('livelb', 'www', $content->channel->item[0]->enclosure['url']);
		$type = 'News';
		$title = $content->channel->item[0]->title;
		$description = $content->channel->item[0]->description;

	}
	if ( $fallback == 'Latest blog post' ) {

		$rss = file_get_contents( 'http://blog.nationalarchives.gov.uk/feed/' );

		$content = new SimpleXmlElement( $rss );

		$url = str_replace('livelb', 'www', $content->channel->item[0]->link);
		$image = str_replace('livelb', 'www', $content->channel->item[0]->enclosure['url']);
		$type = 'Blog';
		$title = $content->channel->item[0]->title;
		$description = $content->channel->item[0]->description;

	}

	return card_html( $id, $url, $image, $type, $title, $description, $date );
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

        $html = '<div id="home_alert" class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="home-alert">
						<div class="alert-content">
							<h3>%s</h3>
							<p>%s</p>
						</div>
					</div>
				</div>
			</div>
		</div>';

		return sprintf( $html, $title, $text );
	}
}
