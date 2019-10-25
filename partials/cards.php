<?php
/**
 * Cards
 */

global $post;

for ( $i=1 ; $i<=6 ; $i++ ) {

	$expire     = get_post_meta( $post->ID, 'home_card_expire_'.$i, true );
	$fallback   = get_post_meta( $post->ID, 'home_card_fallback_'.$i, true );

    $args = array(
        'id'            => $i,
        'url'           => get_post_meta( $post->ID, 'home_card_url_'.$i, true ),
        'title'         => get_post_meta( $post->ID, 'home_card_title_'.$i, true ),
        'description'   => get_post_meta( $post->ID, 'home_card_excerpt_'.$i, true ),
        'image'         => get_post_meta( $post->ID, 'home_card_img_'.$i, true ),
        'event_date'    => get_post_meta( $post->ID, 'home_card_date_'.$i, true ),
        'label'         => ''
    );

	if ( is_card_active( $expire ) ) {

		echo display_card( $args );

	} else {

		echo card_fallback( $fallback, $i );

	}
}