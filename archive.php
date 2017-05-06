<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bourbon-WP
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h2 class="page-title">Archive: ', '</h2>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'exerpt');

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->

		<aside class="">
			<?php if ( is_page( 'culinaria' ) ) : ?>
				<h3>Library of Culinaria</h3>
				<?php wp_nav_menu(array(
					'theme_location'  => 'culinary_menu',
					'menu_class'      => 'aside-menu',
					'menu_id'         => 'culinary-links'
				)); ?>

			<?php else :?>

			<?php get_template_part( 'template-parts/content', 'aside-meta' ); ?>

			<?php endif;?>
    </aside>
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
