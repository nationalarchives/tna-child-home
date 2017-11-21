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
 * Returns HTML markup for a card.
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
 * @param string $date
 * @return string
 */
function display_card( $id, $url, $title, $description, $image, $date ) {

	$type = content_type( $url );

	if ( !$fp = curl_init($url) ) {

		// URL return 404
		$url         = 'http://www.nationalarchives.gov.uk/about/visit-us/whats-on/events/';
		$image       = make_path_relative( get_stylesheet_directory_uri() . '/img/events.jpg' );
		$type        = 'Event';
		$title       = 'Events - The National Archives';
		$description = 'Find more information about our events programme and how to book tickets.';
		$date        = '';
	}

	return card_html( $id, $url, $image, $type, $title, $description, $date );
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
 * @return string
 */
function display_home_banner( $expire, $status, $image, $title, $excerpt, $url ) {

	if ( $status == 'Enable' && is_card_active( $expire ) ) {
		return banner_html( $image, content_type( $url ), $title, $excerpt, $url );
	}

}

/**
 * Deletes the transient (card HTML) when the homepage is updated.
 *
 * @since 1.0
 */
function update_page_delete_transient() {
	for ( $i=1 ; $i<=6 ; $i++ ) {

		$transient_cards = get_transient( 'homepage_cards_html'.$i );

		if( $transient_cards  ) {
			delete_transient( 'homepage_cards_html'.$i );
		}
	}

	$transient_banner = get_transient( 'homepage_banner_html' );

	if( $transient_banner  ) {
		delete_transient( 'homepage_banner_html' );
	}
}

/**
 * @param $date
 * @param string $format
 *
 * @return bool
 */
function validate_date( $date, $format = 'Y-m-d H:i:s' ) {
	$d = DateTime::createFromFormat($format, $date);
	return $d && $d->format($format) == $date;
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

	if ( validate_date($expire, 'Y-m-d') ) {

		$expire_date = strtotime($expire);
		$current_date = strtotime('today');

		if ( $current_date <= $expire_date ) {
			return true;
		} else {
			return false;
		}

	} else {
		return true;
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
	$type = 'Event';
	$title = 'Events - The National Archives';
	$description = 'Find more information about our events programme and how to book tickets.';
	$date = '';

	if ( $fallback == 'Latest news' ) {

		$rss = get_html_content( 'http://www.nationalarchives.gov.uk/category/news/feed/' );

		if ( $rss ) {

			$content = new SimpleXmlElement( $rss );

			$url         = str_replace( 'livelb', 'www', $content->channel->item[0]->link );
			$image       = str_replace( 'livelb', 'www', $content->channel->item[0]->enclosure['url'] );
			$type        = 'News';
			$title       = $content->channel->item[0]->title;
			$description = $content->channel->item[0]->description;
		}

	}
	if ( $fallback == 'Latest blog post' ) {

		$rss = get_html_content( 'http://blog.nationalarchives.gov.uk/feed/' );

		if ( $rss ) {

			$content = new SimpleXmlElement( $rss );

			$url = str_replace('livelb', 'www', $content->channel->item[0]->link);
			$image = str_replace('livelb', 'www', $content->channel->item[0]->enclosure['url']);
			$type = 'Blog';
			$title = $content->channel->item[0]->title;
			$description = $content->channel->item[0]->description;

		}
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
