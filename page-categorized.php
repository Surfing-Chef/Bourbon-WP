<?php
/**
 * Template Name: Categorized Page
 *
 * This is the template uses a customized loop that displays
 * specific post based on categories related to the page.
 *
 *@link https://developer.wordpress.org/reference/classes/wp_query/
 *
 * @package Bourbon-WP
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				// Select which category for posts to display
				if (is_page('culinaria')){
					$cat = 'culinary';
					?><article>
					<?php if ( is_page( 'culinaria' ) && (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Culinaria Feeds")) ) : ?>
					<?php endif;?>
					</article><?php
				} elseif (is_page('coding')){
					$cat = 'design, development';
				} elseif (is_page('projects')){
					$cat = 'design, development';
				} elseif (is_page('about')){
					$cat = 'about';
				}
			 ?>
			<!-- THE LOOP -->
			<?php
			// The Query
			$the_query = new WP_Query( array( 'category_name' => $cat, 'posts_per_page' => 3 ) );

			// The Loop
			if ( $the_query->have_posts() ) : ?>

			    <!-- the loop -->
			    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			        <?php get_template_part( 'template-parts/content', 'excerpt' ); ?>
			    <?php endwhile; ?>
			    <!-- end of the loop -->

			    <?php wp_reset_postdata(); ?>

			<?php else : ?>
			    <p><?php _e( "Sorry, no posts have a category '$cat'." ); ?></p>
			<?php endif; ?>

			<!-- End of THE LOOP -->

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
//get_sidebar();
get_footer();
