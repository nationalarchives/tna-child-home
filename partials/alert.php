<?php
/**
 * Homepage alert
 */

global $post;

$status     = esc_attr( get_option( 'home_alert_status' ) );
$title      = esc_attr( get_option( 'home_alert_title' ) );
$text       = esc_attr( get_option( 'home_alert_text' ) );

echo home_alert( $status, $title, $text );