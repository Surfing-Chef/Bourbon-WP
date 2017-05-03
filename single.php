<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bourbon-WP
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			echo "<code>breadcrumbs</code>";
			the_post_navigation();
			echo "<code>breadcrumbs</code><br />";
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->

		<aside class="aside">

			<?php get_template_part( 'template-parts/content', 'aside-meta' ); ?>

    </aside>

	</section><!-- #primary -->

<?php
//get_sidebar();
get_footer();
