<?php
/**
 * Cards
 */

global $post;
for ( $i=1 ; $i<=6 ; $i++ ) {

	$url            = get_post_meta( $post->ID, 'home_card_url_'.$i, true );
	// $title       = get_post_meta( $post->ID, 'home_card_title_'.$i, true );
	$description    = get_post_meta( $post->ID, 'home_card_excerpt_'.$i, true );
	// $image       = get_post_meta( $post->ID, 'home_card_img_'.$i, true );
	$expire         = get_post_meta( $post->ID, 'home_card_expire_'.$i, true );
	$fallback       = get_post_meta( $post->ID, 'home_card_fallback_'.$i, true );

	$title = '';
	$image = '';

	$transient  = get_transient( 'homepage_cards_html'.$i );

	if( !empty( $transient ) && is_card_active( $expire ) ) {

		echo $transient;

	} elseif ( is_card_active( $expire ) ) {

		$html = get_content_and_display_card( $i, $url, $title, $description, $image );

		set_transient( 'homepage_cards_html'.$i, $html, MONTH_IN_SECONDS );

		echo $html;

	} else {

		echo card_fallback( $fallback, $i );

	}
}