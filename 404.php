<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Bourbon-WP
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'bourbon-wp' ); ?></h1>
				</header>
				<!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'Sorry, but it looks like what you were looking for was not found at this location. Maybe a search or one of the links below might help?', 'bourbon-wp' ); ?></p>

					<div class="search-bar">
	          <?php bourbon_wp_search_form(); ?>
	        </div>

					<section class="section-404-links">
						<?php
							the_widget( 'WP_Widget_Tag_Cloud' );

							/* translators: %1$s: smiley */
							$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives.', 'bourbon-wp' ) ) . '</p>';
							the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
						?>
					</section>
				</div>
				<!-- .page-content -->
			</section>
			<!-- .error-404 -->

		</main>
		<!-- #main -->

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
		<!-- .aside -->

	</div>
	<!-- #primary -->

<?php
get_footer();
