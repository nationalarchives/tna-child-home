<?php
/**
 * Landing page link boxes
 */

if ( get_option('home_landing_page_title_1') ) { ?>

	<div class="container">
		<div class="row">
			<div class="link-cards-wrapper equal-heights-flex-box clearfix">
			<?php

			for ( $i=1 ; $i<=4 ; $i++ ) {

				$title = get_option( 'home_landing_page_title_'.$i );
				$url = get_option( 'home_landing_page_url_'.$i );
				$text = get_option( 'home_landing_page_text_'.$i );

				echo landingpage_link_html_markup( $title, $url, $text );

			}

			?>
			</div>
		</div>
	</div>

<?php }