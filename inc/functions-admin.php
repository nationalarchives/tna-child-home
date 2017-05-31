<?php
/**
 * Hompage admin options
 */

function tna_homepage_menu() {
	add_menu_page( 'Homepage settings', 'Homepage', 'administrator', 'homepage-admin-page', 'homepage_admin_page', 'dashicons-admin-generic', 21  );
}

function homepage_admin_page() {
	if (!current_user_can('administrator'))  {
		wp_die( __('You do not have sufficient pilchards to access this page.')    );
	}
	?>
	<div class="wrap tna-homepage">
		<h1>TNA homepage settings</h1>
		<form method="post" action="options.php" novalidate="novalidate">

		</form>
	</div>
	<?php
}