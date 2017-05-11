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
			'items_wrap'        =>  '<ul class="main-ul">%3$s</ul>'
	)
);
echo '</div>';
?>