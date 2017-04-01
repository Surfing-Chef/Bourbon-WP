<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
			<?php if ( is_page( 'culinaria' ) ) : ?>
				<h3>Library of Culinaria</h3>
				<?php wp_nav_menu(array(
					'theme_location'  => 'culinary_menu',
					'menu_class'      => 'aside-menu',
					'menu_id'         => 'culinary-links'
				)); ?>
			<?php endif;?>
		</aside>
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
