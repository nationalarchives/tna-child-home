<?php

//wp_nav_menu('mega-menu');

wp_nav_menu( array( 'menu'              =>  'mega-menu',
					'sort_column'       =>  'menu_order',
					'container'         =>  false,
					'items_wrap'        =>  '<ul>%3$s</ul>',
					'menu_id'           => '',

	)
);

?>


