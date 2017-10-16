<?php
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

		$html_content = get_html_content($url);

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
