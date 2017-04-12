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
 					<div class="vertical-tabs-container">

 					  <div class="vertical-tabs">
 					    <a href="javascript:void(0)" class="js-vertical-tab vertical-tab is-active" rel="tab1">Saveur</a>
 					    <a href="javascript:void(0)" class="js-vertical-tab vertical-tab" rel="tab2">Food52</a>
 					    <a href="javascript:void(0)" class="js-vertical-tab vertical-tab" rel="tab3">Food &amp; Wine</a>
 					    <a href="javascript:void(0)" class="js-vertical-tab vertical-tab" rel="tab4">Lucky Peach</a>
 							<a href="javascript:void(0)" class="js-vertical-tab vertical-tab" rel="tab5">Cooks Illustrated</a>
 					  </div>
 					  <div class="vertical-tab-content-container">

 					    <a href="" class="js-vertical-tab-accordion-heading vertical-tab-accordion-heading is-active" rel="tab1">Saveur</a>
 					    <div id="tab1" class="js-vertical-tab-content vertical-tab-content">
 								<div id="saveur"><!-- Apifier content --></div>
 					    </div>

 					    <a href="" class="js-vertical-tab-accordion-heading vertical-tab-accordion-heading" rel="tab2">Food 52</a>
 					    <div id="tab2" class="js-vertical-tab-content vertical-tab-content">
 								<div id="food52"><!-- Apifier content --></div>
 							</div>

 					    <a href="" class="js-vertical-tab-accordion-heading vertical-tab-accordion-heading" rel="tab3">Food &amp; Wine</a>
 					    <div id="tab3" class="js-vertical-tab-content vertical-tab-content">
 								<div id="foodandwine"><!-- Apifier content --></div>
 							</div>

 					    <a href="" class="js-vertical-tab-accordion-heading vertical-tab-accordion-heading" rel="tab4">Lucky Peach</a>
 					    <div id="tab4" class="js-vertical-tab-content vertical-tab-content">
 								<div id="luckypeach"><!-- Apifier content --></div>
 							</div>
 							<a href="" class="js-vertical-tab-accordion-heading vertical-tab-accordion-heading" rel="tab5">Cooks Illustrated</a>
 							<div id="tab5" class="js-vertical-tab-content vertical-tab-content">
 								<div id="cooksillustrated"><!-- Apifier content --></div>
 							</div>
 					  </div>
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
