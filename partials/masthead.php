<?php
/**
 * Masthead
 */

if ( get_option('home_masthead_desc') ) { ?>

	<div class="masthead-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
				<?php

				echo display_tna_opening_status( date('Y-m-d'), date('l') );

				?>
				</div>
			</div>
			<div class="row">
				<?php for ( $i=1 ; $i<=3 ; $i++ ) {

					$btn_text = get_option('home_masthead_btn_text_'.$i);
					$btn_url = get_option('home_masthead_btn_url_'.$i);

					?>

					<div class="col-md-4 col-sm-4">
						<a class="button" role="button" href="<?php echo $btn_url ?>">
							<span><?php echo $btn_text ?></span>
						</a>
					</div>

				<?php } ?>
			</div>
		</div>
	</div>

<?php }