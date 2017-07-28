<?php
/**
 * The page template
 *
 * Used when an individual Page is queried.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bourbon-WP
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

		<aside class="">
			<?php get_template_part( 'template-parts/content', 'aside-meta' ); ?>
		</aside>

	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
