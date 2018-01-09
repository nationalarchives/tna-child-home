<?php
/**
 * Cards
 */

global $post;

for ( $i=1 ; $i<=6 ; $i++ ) {

	$url        = get_post_meta( $post->ID, 'home_card_url_'.$i, true );
	$title      = get_post_meta( $post->ID, 'home_card_title_'.$i, true );
	$excerpt    = get_post_meta( $post->ID, 'home_card_excerpt_'.$i, true );
	$image      = get_post_meta( $post->ID, 'home_card_img_'.$i, true );
	$date       = get_post_meta( $post->ID, 'home_card_date_'.$i, true );
	$expire     = get_post_meta( $post->ID, 'home_card_expire_'.$i, true );
	$fallback   = get_post_meta( $post->ID, 'home_card_fallback_'.$i, true );

	if ( is_card_active( $expire ) ) {

		$excerpt = clean_excerpt( $excerpt );

		echo display_card( $i, $url, $title, $excerpt, $image, $date );

	} else {

		echo card_fallback( $fallback, $i );

	}
}