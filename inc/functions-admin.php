<?php
/**
 * Hompage admin options
 */

function tna_homepage_menu() {
	add_menu_page( 'Homepage settings', 'Homepage', 'administrator', 'homepage-admin-page', 'homepage_admin_page', 'dashicons-admin-generic', 21  );

	add_action( 'admin_init', 'homepage_admin_page_settings' );
}

function homepage_admin_page_settings() {
	register_setting( 'homepage-settings-group', 'home_masthead_desc' );

	for ( $i=1 ; $i<=3 ; $i++ ) {

		register_setting( 'homepage-settings-group', 'home_masthead_btn_text_'.$i );
		register_setting( 'homepage-settings-group', 'home_masthead_btn_url_'.$i );

	}

	for ( $i=1 ; $i<=4 ; $i++ ) {

		register_setting( 'homepage-settings-group', 'home_landing_page_title_'.$i );
		register_setting( 'homepage-settings-group', 'home_landing_page_url_'.$i );
		register_setting( 'homepage-settings-group', 'home_landing_page_text_'.$i );

	}
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

			<h2>Masthead description</h2>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="home_masthead_desc">Description</label></th>
					<td><textarea name="home_masthead_desc"><?php echo esc_attr( get_option('home_masthead_desc') ); ?></textarea></td>
				</tr>
			</table>

			<h2>Masthead buttons</h2>
			<?php for ( $i=1 ; $i<=3 ; $i++ ) { ?>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="home_masthead_btn_text_<?php echo $i; ?>">Button <?php echo $i; ?> label</label></th>
						<td><input type="text" name="home_masthead_btn_text_<?php echo $i; ?>" value="<?php echo esc_attr( get_option('home_masthead_btn_text_'.$i) ); ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="home_masthead_btn_url_<?php echo $i; ?>">Button <?php echo $i; ?> URL</label></th>
						<td><input type="text" name="home_masthead_btn_url_<?php echo $i; ?>" value="<?php echo esc_attr( get_option('home_masthead_btn_url_'.$i) ); ?>" /></td>
					</tr>
				</table>
			<?php } ?>

			<?php for ( $i=1 ; $i<=4 ; $i++ ) { ?>
					<h2>Landing page link card <?php echo $i; ?></h2>
					<table class="form-table">
						<tr valign="top">
							<th scope="row"><label for="home_landing_page_title_<?php echo $i; ?>">Title</label></th>
							<td><input type="text" name="home_landing_page_title_<?php echo $i; ?>" value="<?php echo esc_attr( get_option('home_landing_page_title_'.$i) ); ?>" /></td>
						</tr>
						<tr valign="top">
							<th scope="row"><label for="home_landing_page_url_<?php echo $i; ?>">URL</label></th>
							<td><input type="text" name="home_landing_page_url_<?php echo $i; ?>" value="<?php echo esc_attr( get_option('home_landing_page_url_'.$i) ); ?>" /></td>
						</tr>
						<tr valign="top">
							<th scope="row"><label for="home_landing_page_text_<?php echo $i; ?>">Description</label></th>
							<td><textarea name="home_landing_page_text_<?php echo $i; ?>"><?php echo esc_attr( get_option('home_landing_page_text_'.$i) ); ?></textarea></td>
						</tr>
					</table>
			<?php } ?>

			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}