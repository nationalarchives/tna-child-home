<?php
/**
 * Hero banner
 */

global $post;
$expire     = get_post_meta( $post->ID, 'home_banner_expire', true );
$status     = get_post_meta( $post->ID, 'home_banner_status', true );


$args = array(
    'id'            => 'hero',
    'url'           => get_post_meta( $post->ID, 'home_banner_url', true ),
    'title'         => get_post_meta( $post->ID, 'home_banner_title', true ),
    'description'   => get_post_meta( $post->ID, 'home_banner_excerpt', true ),
    'image'         => get_post_meta( $post->ID, 'home_banner_img', true ),
    'event_date'    => get_post_meta( $post->ID, 'home_banner_date', true )
);

if ( is_card_active( $expire ) ) {

	echo '<div class="hero-card cards"><div class="container"><div class="row">';

	echo display_card( $args );

    echo '</div></div></div>';

}