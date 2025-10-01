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
 * Returns HTML markup for the banner.
 *
 * @since 1.0
 *
 * @param string $image
 * @param string $type
 * @param string $title
 * @param string $description
 * @param string $url
 * @param string $date
 * @return string
 */
function banner_html( $image, $type, $title, $description, $url, $date ) {

    $title = esc_attr($title);
    $image = make_path_relative($image);

    $content = card_image( $image, $type ) . card_content( $type, $title, $description ) . card_date( $date, $type );

    $html  = '<div class="col-md-4"><div class="card">';
    $html .= card_link( 'hero', $url, $type, $title, $content );
    $html .= '</div></div>';

    return $html;
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
function display_home_banner( $expire, $status, $image, $title, $excerpt, $url, $date ) {

	$excerpt = limit_words( $excerpt, 36 );

	if ( $status == 'Enable' && is_card_active( $expire ) ) {
		return banner_html( $image, content_type( $url ), $title, $excerpt, $url, $date );
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

	$html = '<div class="col-md-3">
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
function home_alert($status, $title, $text, $theme ) {

	$theme_class = '';
	if ( $theme == 'dark' ) {
		$theme_class = 'alert-dark';
	}

	if ( $status == 'enabled' ) {

		$html = '<div id="home_alert" class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="home-alert %s">
						<div class="alert-content">
							<h3>%s</h3>
							<p>%s</p>
						</div>
					</div>
				</div>
			</div>
		</div>';

		return sprintf( $html, $theme_class, $title, $text );
	}
}


/**
 * Renders schema.org to the homepage
 *
 * @since 1.0
 */
function render_schema(){
	global $wp;
    global $post;
    $canonical_url = version_compare( get_bloginfo('version'), '4.6', '<=') ? wp_get_canonical_url() : home_url(add_query_arg(array(),$wp->request));
    $page_description = "";
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if ( is_plugin_active( 'wordpress-seo/wp-seo.php' )) {
        if( function_exists( 'get_post_meta' ) ) {
            if( get_post_meta( $post->ID, '_yoast_wpseo_metadesc', true ) ) {
                $page_description = get_post_meta( $post->ID, '_yoast_wpseo_metadesc', true );
            } else {
                $page_description = get_the_excerpt( $post->ID );
            }
        }
    } elseif ( has_excerpt( $post->ID ) ) {
        $page_description = get_the_excerpt( $post->ID );
    } else {
        $page_description = get_bloginfo('description');
    }
    $schema =
        '<script type="application/ld+json">
            {
                "@context": "http://schema.org",
                    "@type": "Organization",
                    "@id": "%s",
                "name": "The National Archives",
                "legalName" : "The National Archives",
                "description" : "%s",
                "url": "%s",
                "logo": "http://www.nationalarchives.gov.uk/wp-content/uploads/sites/24/2019/07/tna-logo-600x315.jpg",
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "The National Archives, Kew, Richmond, Surrey",
                    "addressLocality": "Kew",
                    "addressRegion": "London",
                    "postalCode": "TW9 4DU",
                    "addressCountry": "GB"
                },
                "telephone": " +44 (0) 20 8876 3444",
                "sameAs": [
                    "https://www.facebook.com/TheNationalArchives",
                    "https://twitter.com/uknatarchives",
                    "https://www.youtube.com/c/TheNationalArchivesUK",
                    "https://www.flickr.com/photos/nationalarchives",
                    "http://www.nationalarchives.gov.uk/rss/",
		    "https://www.instagram.com/nationalarchivesuk/"
                ]
            }
        </script>';
    if (is_front_page()) {
        echo sprintf($schema, $canonical_url, $page_description, $canonical_url);
    }
}

