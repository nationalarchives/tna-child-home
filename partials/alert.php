<?php
/**
 * Homepage alert
 */

global $post;

$allow = array(
	'a' => array(
		'href' => array(),
		'title' => array()
	),
	'br' => array(),
	'em' => array(),
	'strong' => array(),
);

$status     = esc_attr( get_option( 'home_alert_status' ) );
$title      = esc_attr( get_option( 'home_alert_title' ) );
$text       = wp_kses( get_option( 'home_alert_text' ), $allow );

echo home_alert( $status, $title, $text );