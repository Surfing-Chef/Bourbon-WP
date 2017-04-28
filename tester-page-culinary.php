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

					<!-- FEED GALLERY -->
					<div class="grid gallery">
					  <?php
					    // retrieve file with array data
					    $feeds = file_get_contents(get_template_directory_uri().'/bot/cache.txt');
					    // convert data to array
					    $feeds = unserialize($feeds);
							// number of feeds
							$num_feeds = count($feeds);
							// create 6 random numbers based on number of feeds
							$rand = randomizer(6, $num_feeds);
					    // display data
					    foreach ($rand as $r_num){
								$c_feed = $feeds[$r_num];
							?>
								<div class="grid-box-wrap">
					        <div class="grid-box">
					          <a href=<?php echo $c_feed[3] ?>>
					            <div class="image-container" style="background-image: url(<?php echo $c_feed[4]; ?>);"></div>
					            <span class="feed-meta">
												<span class="feed-site"><?php echo strtolower($c_feed[0]); ?> - </span>
												<span class="feed-caption"><?php echo strtolower($c_feed[2]); ?></span>
											</span>
					          </a>
					        </div>
					      </div>
					    <?php
						} ?>
					</div>
					<!-- END FEED GALLERY -->
				</div>
				<!-- END textwidget -->
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
