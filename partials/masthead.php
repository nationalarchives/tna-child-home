<?php
/**
 * Masthead
 */

if ( get_option('home_masthead_desc') ) { ?>

	<div class="masthead-wrapper">
		<div class="container">
			<div class="row">
				<?php

				echo display_tna_opening_status( date('Y-m-d'), date('l') );

				?>
			</div>
		</div>
	</div>

<?php }