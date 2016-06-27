<?php


echo '<nav id="nav" role="navigation"><div class="row">';

wp_nav_menu(
	array(  'menu'              =>  'mega-menu',
			'sort_column'       =>  'menu_order',
			'container'         =>  false,
			'items_wrap'        =>  '<ul>%3$s</ul>'
	)
);

echo '</div></nav>';


