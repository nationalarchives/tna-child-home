<?php
/**
 * Template Name: Navigation Template
 *
 * @package WordPress
 * @subpackage tna-child-home
 * @since tna-child-home 1.0
 */

echo '<div class="mega-menu">';

wp_nav_menu(
	array(  'menu'              =>  'mega-menu',
			'sort_column'       =>  'menu_order',
			'container'         =>  false,
			'items_wrap'        =>  '<ul>%3$s</ul>'
	)
);

echo '</div>';
?>

<script type ='text/javascript' src='https://code.jquery.com/jquery-1.12.4.min.js'></script>
<script type ='text/javascript' src='/wp-content/themes/tna-child-home/js/webtrends-click-handlers.js'></script>