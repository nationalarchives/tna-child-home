<?php
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
 * Extracts the OG meta data.
 *
 * @since 1.0
 *
 *
 * @param string $url
 *
 * @return array
 */
function get_meta_og_data( $url ) {

	if ( $url ) {

		$html_content = get_html_content( $url );

		if ( $html_content ) {

			$data = array();

			$html = new DOMDocument();
			@$html->loadHTML($html_content);

			$data['title'] = '';
			$data['description'] = '';
			$data['img'] = '';
			$data['date'] = '';
			$i = 0;

			foreach( $html->getElementsByTagName('meta') as $meta ) {

				if( $meta->getAttribute('property')=='og:title' ) {
					$data['title'] = $meta->getAttribute('content');
				}

				if( $meta->getAttribute('property')=='og:description' ) {
					$data['description'] = $meta->getAttribute('content');
				}

				if( $meta->getAttribute('property')=='og:image' ) {
					$data['img'][$i] = $meta->getAttribute('content');
					$i++;
				}

				if (strpos($url, 'eventbrite') !== false) {
					if( $meta->getAttribute('property')=='event:start_time' ) {
						$data['date'] = $meta->getAttribute('content');
					}
				}
			}

			if (isset($data['img'][0]) == false) {
				$meta_og_img[0] = '';
			}

			return $data;
		}
	}

	return false;
}

function get_meta_og_on_save( $post_id ) {

	$data = $_POST;

	if ( $data['home_banner_url'] ) {

		$current = get_post_meta( $post_id, 'home_banner_url_old', true );

		if ( $current ) {
			if ( $data['home_banner_url'] !== $current ) {
				$data['home_banner_title'] = '';
				$data['home_banner_excerpt'] = '';
				update_post_meta( $post_id, 'home_banner_url_old', $data['home_banner_url'] );
			}
		} else {
			add_post_meta( $post_id, 'home_banner_url_old', $data['home_banner_url'], true );
		}

		$og = get_meta_og_data( $data['home_banner_url'] );

		if ( trim($data['home_banner_title']) == '' ) {
			$_POST['home_banner_title'] = $og['title'];
		}
		if ( trim($data['home_banner_excerpt']) == '' ) {
			$_POST['home_banner_excerpt'] = $og['description'];
		}
	}
}
