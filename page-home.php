<?php
/*
Template Name: Homepage
*/
get_header(); ?>

<main id="primary" role="main" class="content-area">

	<?php get_template_part( 'partials/masthead' ); ?>

	<?php get_template_part( 'partials/hero', 'banner' ); ?>

	<div class="container">
		<div class="row">
			<div class="cards-wrapper equal-heights clearfix">

				<?php get_template_part( 'partials/cards' ); ?>

			</div>
		</div>
	</div>

	<?php get_template_part( 'partials/landingpage', 'links' ); ?>

</main>

<?php get_footer(); ?>
