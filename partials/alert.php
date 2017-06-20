<?php
/**
 * Homepage alert
 */

global $post;

$status     = get_post_meta( $post->ID, 'home_alert_status', true );
$title      = get_post_meta( $post->ID, 'home_alert_title', true );
$text       = get_post_meta( $post->ID, 'home_alert_text', true );


home_alert( $status, $title, $text );