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
$button     = get_post_meta( $post->ID, 'home_banner_btn', true );

echo home_banner( $expire, $status, $image, $title, $excerpt, $url, $button );