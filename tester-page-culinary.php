<?php
/**
 * Test page template for testing various code and markup
 * Template Name: Culinary Test Page
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

			<!-- TEST MARKUP CAN GO AFTER THIS COMMENT -->
			<section class="culinaria-widget-area">
 				<h2 class="widget-title">Recent Feeds</h2>

 				<div class="textwidget">

					<!-- build the gallery here -->
					<!-- use bourbon neat empties grid -->
					<div class="grid gallery">
						<pre>
						<?php
							// retrieve array from file
							// echo get_template_directory_uri();
							$feeds = file_get_contents(get_template_directory_uri().'/bot/cache.txt');
							$feeds = unserialize($feeds);
							print_r($feeds);

							// loop through array to populate grid gallery
						 ?>
					 </pre>
					  <div class="grid-box-wrap"><div class="grid-box">image content</div></div>
					</div>

				</div>
			 </section>
			 <!-- END TEST MARKUP AND CODE -->

			<?php
			// Start the loop.
			// Comment out the following PHP to cancel the loop if necessary, or
			// alter it for testing purposes
			//
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			<!-- TEST MARKUP CAN GO AFTER THIS COMMENT -->

			<!-- END TEST MARKUP AND CODE -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
