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
			<div class="cards-wrapper equal-heights-flex-box clearfix">
				<?php

				for ( $i=1 ; $i<=6 ; $i++ ) {

					$expire = get_post_meta( $post->ID, 'home_card_expire_'.$i, true );

					if ($expire) {
						$expire_date = strtotime($expire);
					} else {
						$expire_date = 9999999999;
					}

					$current_date = strtotime('today');

					$transient = get_transient( 'homepage_cards_html'.$i );

					echo '<!--' . $expire_date . ' - ' . $current_date . '-->';

					if( ! empty( $transient ) && $current_date <= $expire_date ) {

						echo $transient ;

					} elseif ( $current_date <= $expire_date ) {

						$url = get_post_meta( $post->ID, 'home_card_url_'.$i, true );

						$html = get_content_and_display_card( $url );

						set_transient( 'homepage_cards_html'.$i, $html, MONTH_IN_SECONDS );

						echo $html;

					} else {
						echo 'expired';
					}

				}
				?>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
