<?php
/*
Template Name: Homepage
*/
get_header(); ?>

<main id="primary" role="main" class="content-area">
	<?php
		global $post;
		$expire     = get_post_meta( $post->ID, 'home_banner_expire', true );
		$status     = get_post_meta( $post->ID, 'home_banner_status', true );
		$image      = get_post_meta( $post->ID, 'home_banner_img', true );
		$title      = get_post_meta( $post->ID, 'home_banner_title', true );
		$excerpt    = get_post_meta( $post->ID, 'home_banner_excerpt', true );
		$url        = get_post_meta( $post->ID, 'home_banner_url', true );
		$button     = get_post_meta( $post->ID, 'home_banner_btn', true );

		echo home_banner( $expire, $status, $image, $title, $excerpt, $url, $button );
	?>
	<div class="container">
		<div class="row">
			<div class="cards-wrapper equal-heights-flex-box clearfix">
				<?php

				for ( $i=1 ; $i<=6 ; $i++ ) {

					$url        = get_post_meta( $post->ID, 'home_card_url_'.$i, true );
					$title      = get_post_meta( $post->ID, 'home_card_title_'.$i, true );
					$image      = get_post_meta( $post->ID, 'home_card_img_'.$i, true );
					$expire     = get_post_meta( $post->ID, 'home_card_expire_'.$i, true );
					$fallback   = get_post_meta( $post->ID, 'home_card_fallback_'.$i, true );

					$transient  = get_transient( 'homepage_cards_html'.$i );

					if( !empty( $transient ) && is_card_active( $expire ) ) {

						echo $transient ;

					} elseif ( is_card_active( $expire ) ) {

						$html = get_content_and_display_card( $i, $url, $title, $image );

						set_transient( 'homepage_cards_html'.$i, $html, MONTH_IN_SECONDS );

						echo $html;

					} else {

						echo card_fallback( $fallback, $i );

					}
				}
				?>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
