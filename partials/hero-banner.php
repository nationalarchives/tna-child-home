<?php
/**
 * Hero banner
 */

global $post;
$expire     = get_post_meta( $post->ID, 'home_banner_expire', true );
$status     = get_post_meta( $post->ID, 'home_banner_status', true );
$image      = get_post_meta( $post->ID, 'home_banner_img', true );
$title      = get_post_meta( $post->ID, 'home_banner_title', true );
$excerpt    = get_post_meta( $post->ID, 'home_banner_excerpt', true );
$url        = get_post_meta( $post->ID, 'home_banner_url', true );
$date       = get_post_meta( $post->ID, 'home_banner_date', true );

if ( is_card_active( $expire ) ) {

	$excerpt = clean_excerpt( $excerpt );

	echo display_home_banner( $expire, $status, $image, $title, $excerpt, $url, $date );

}