<?php
/**
	* The home page template, front page by default
	*
	* The header is adjusted to display a hero section.
	*
	* @link https://codex.wordpress.org/Template_Hierarchy
	*
	* @package Bourbon-WP
**/

get_header( 'home' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="home site-main" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'excerpt' );

			endwhile;

			//the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->

    <aside class="aside">
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
//get_sidebar();
get_footer();
