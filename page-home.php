<?php
/*
Template Name: Homepage
*/
get_header(); ?>

<main id="primary" role="main" class="content-area">
	<div class="container">
		<div class="row">

				<div class="card-wrapper equal-heights-flex-box clearfix">
					<?php

					$transient = get_transient( 'homepage_cards_html' );

					if( ! empty( $transient ) ) {

						echo $transient ;

					} else {

						$html = '';

						for ( $i=1 ; $i<=6 ; $i++ ) {

							$url = get_post_meta( $post->ID, 'home_card_url_'.$i, true );

							$html .= get_content_and_display_card( $url );

						}

						set_transient( 'homepage_cards_html', $html, MONTH_IN_SECONDS );

						echo $html;
					}
					?>
				</div>

		</div>
	</div>
</main>

<?php get_footer(); ?>
