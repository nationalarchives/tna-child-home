<?php
/**
 * Hompage admin options
 */

function tna_homepage_menu() {
	add_menu_page( 'Homepage settings', 'Homepage', 'administrator', 'homepage-admin-page', 'homepage_admin_page', 'dashicons-admin-generic', 21  );

	add_action( 'admin_init', 'homepage_admin_page_settings' );
}

function homepage_admin_page_settings() {
	register_setting( 'homepage-settings-group', 'home_masthead_descr' );
	register_setting( 'homepage-settings-group', 'home_masthead_btn_text_1' );

	register_setting( 'homepage-settings-group', 'home_landing_page_title_1' );
	register_setting( 'homepage-settings-group', 'home_landing_page_url_1' );
	register_setting( 'homepage-settings-group', 'home_landing_page_text_1' );
	register_setting( 'homepage-settings-group', 'home_landing_page_title_2' );
	register_setting( 'homepage-settings-group', 'home_landing_page_url_2' );
	register_setting( 'homepage-settings-group', 'home_landing_page_text_2' );
	register_setting( 'homepage-settings-group', 'home_landing_page_title_3' );
	register_setting( 'homepage-settings-group', 'home_landing_page_url_3' );
	register_setting( 'homepage-settings-group', 'home_landing_page_text_3' );
	register_setting( 'homepage-settings-group', 'home_landing_page_title_4' );
	register_setting( 'homepage-settings-group', 'home_landing_page_url_4' );
	register_setting( 'homepage-settings-group', 'home_landing_page_text_4' );
}

function homepage_admin_page() {
	if (!current_user_can('administrator'))  {
		wp_die( __('You do not have sufficient pilchards to access this page.')    );
	}
	?>
	<div class="wrap tna-homepage">
		<h1>TNA homepage settings</h1>
		<form method="post" action="options.php" novalidate="novalidate">
			<?php settings_fields( 'homepage-settings-group' ); ?>
			<?php do_settings_sections( 'homepage-settings-group' ); ?>

			<table class="form-table">
				<h2>Masthead description</h2>
				<tr valign="top">
					<th scope="row"><label for="home_masthead_descr">Description</label></th>
					<td><textarea name="home_masthead_descr"><?php echo esc_attr( get_option('home_masthead_descr') ); ?></textarea></td>
				</tr>
			</table>

			<table class="form-table">
				<h2>Masthead buttons</h2>
				<tr valign="top">
					<th scope="row"><label for="home_masthead_btn_text_1">Button label</label></th>
					<td><input type="text" name="home_masthead_btn_text_1" value="<?php echo esc_attr( get_option('home_masthead_btn_text_1') ); ?>" /></td>
				</tr>
			</table>

			<table class="form-table">
				<h2>Landing page link content box 1</h2>
				<tr valign="top">
					<th scope="row"><label for="home_landing_page_title_1">Title</label></th>
					<td><input type="text" name="home_landing_page_title_1" value="<?php echo esc_attr( get_option('home_landing_page_title_1') ); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="home_landing_page_url_1">URL</label></th>
					<td><input type="text" name="home_landing_page_url_1" value="<?php echo esc_attr( get_option('home_landing_page_url_1') ); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="home_landing_page_text_1">Description</label></th>
					<td><textarea name="home_landing_page_text_1"><?php echo esc_attr( get_option('home_landing_page_text_1') ); ?></textarea></td>
				</tr>
			</table>

			<table class="form-table">
				<h2>Landing page link content box 2</h2>
				<tr valign="top">
					<th scope="row"><label for="home_landing_page_title_2">Title</label></th>
					<td><input type="text" name="home_landing_page_title_2" value="<?php echo esc_attr( get_option('home_landing_page_title_2') ); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="home_landing_page_url_2">URL</label></th>
					<td><input type="text" name="home_landing_page_url_2" value="<?php echo esc_attr( get_option('home_landing_page_url_2') ); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="home_landing_page_text_2">Description</label></th>
					<td><textarea name="home_landing_page_text_2"><?php echo esc_attr( get_option('home_landing_page_text_2') ); ?></textarea></td>
				</tr>
			</table>

			<table class="form-table">
				<h2>Landing page link content box 3</h2>
				<tr valign="top">
					<th scope="row"><label for="home_landing_page_title_3">Title</label></th>
					<td><input type="text" name="home_landing_page_title_3" value="<?php echo esc_attr( get_option('home_landing_page_title_3') ); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="home_landing_page_url_3">URL</label></th>
					<td><input type="text" name="home_landing_page_url_3" value="<?php echo esc_attr( get_option('home_landing_page_url_3') ); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="home_landing_page_text_3">Description</label></th>
					<td><textarea name="home_landing_page_text_3"><?php echo esc_attr( get_option('home_landing_page_text_3') ); ?></textarea></td>
				</tr>
			</table>

			<table class="form-table">
				<h2>Landing page link content box 4</h2>
				<tr valign="top">
					<th scope="row"><label for="home_landing_page_title_4">Title</label></th>
					<td><input type="text" name="home_landing_page_title_4" value="<?php echo esc_attr( get_option('home_landing_page_title_4') ); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="home_landing_page_url_4">URL</label></th>
					<td><input type="text" name="home_landing_page_url_4" value="<?php echo esc_attr( get_option('home_landing_page_url_4') ); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="home_landing_page_text_4">Description</label></th>
					<td><textarea name="home_landing_page_text_4"><?php echo esc_attr( get_option('home_landing_page_text_4') ); ?></textarea></td>
				</tr>
			</table>

			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}