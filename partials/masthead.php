<?php
/**
 * Masthead
 */

if ( get_option('home_masthead_btn_text_1') ) {

	$masthead_image = '';
	if ( has_post_thumbnail() ) {
		global $post;
		$feature_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		$masthead_image = 'style="background-image: url(' . make_path_relative($feature_image[0]) . ')"';
	} ?>

	<div class="masthead-wrapper" <?php echo $masthead_image; ?>>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1><?php echo get_option('home_masthead_title'); ?></h1>
						<h2><?php echo get_option('home_masthead_sub_title'); ?></h2>
						<div class="opening-times">
							<?php echo display_tna_opening_status( date('Y-m-d'), date('l'), get_openingtimes_overrides() ); ?>
							<a href="http://www.nationalarchives.gov.uk/about/visit-us/">Plan your visit &gt</a>
						</div>
						<div class="masthead-buttons">
							<?php for ( $i=1 ; $i<=3 ; $i++ ) {

								$btn_text = esc_attr( get_option('home_masthead_btn_text_'.$i) );
								$btn_url = esc_attr( get_option('home_masthead_btn_url_'.$i) );

								?>
									<a class="button" role="button" href="<?php echo $btn_url ?>">
										<span><?php echo $btn_text ?></span>
									</a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
	</div>

<?php }
