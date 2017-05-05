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

					for ( $i=1 ; $i<=3 ; $i++ ) {

						$url = get_post_meta( $post->ID, 'home_card_url_'.$i, true );

						get_content_and_display_card( $url );

					}

					?>
				</div>

		</div>
	</div>
</main>

<?php get_footer(); ?>
