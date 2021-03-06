<?php
/*
Template Name: Homepage
*/
get_header(); ?>

<main id="primary" role="main" class="content-area">

	<?php get_template_part( 'partials/masthead' ); ?>

	<?php get_template_part( 'partials/alert' ); ?>

	<?php get_template_part( 'partials/hero', 'card' ); ?>

    <div class="cards">
        <div class="container">
            <div class="row">

                <?php get_template_part( 'partials/cards' ); ?>

            </div>
        </div>
    </div>

	<?php get_template_part( 'partials/landingpage', 'links' ); ?>

</main>

<?php get_footer(); ?>
