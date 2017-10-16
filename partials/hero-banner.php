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

$transient  = get_transient( 'homepage_banner_html' );

if( !empty( $transient ) && is_card_active( $expire ) ) {

	echo $transient;

} elseif ( is_card_active( $expire ) ) {

	$html = home_banner( $expire, $status, $image, $title, $excerpt, $url );

	set_transient( 'homepage_banner_html', $html, MONTH_IN_SECONDS );

	echo $html;
}