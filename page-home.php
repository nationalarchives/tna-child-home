<?php
/*
Template Name: Homepage
*/
get_header(); ?>

<main id="primary" role="main" class="content-area">
	<?php
		global $post;
		$status = get_post_meta( $post->ID, 'home_banner_status', true );
		$image = get_post_meta( $post->ID, 'home_banner_img', true );
		$title = get_post_meta( $post->ID, 'home_banner_title', true );
		$excerpt = get_post_meta( $post->ID, 'home_banner_excerpt', true );
		$url = get_post_meta( $post->ID, 'home_banner_url', true );
		$button = get_post_meta( $post->ID, 'home_banner_btn', true );

		echo home_banner( $status, $image, $title, $excerpt, $url, $button );
	?>
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
