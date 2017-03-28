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

			//the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->

		<aside class="aside">
			<section class="aside-section-posts">
				<h3>Recent Posts</h2>
			<?php
			$args = array( 'numberposts' => '3' );
			$recent_posts = wp_get_recent_posts( $args );

			foreach( $recent_posts as $recent ){
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($recent["ID"]), 'thumbnail', false );
				$postdate = get_the_date('Y-m-d', $recent["ID"]);
				?>
				<div class="aside-post">
					<a href="<?php echo get_permalink($recent["ID"]);?>">

						<div class="aside-post-image">

							<?php if ($thumbnail[0]) : ?>
							<img src="<?php echo $thumbnail[0]; ?>" alt="<?php echo $recent["post_title"]; ?>">

							<?php else : ?>
							<img src="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>
							/src/images/logo.png" alt="<?php echo $recent["post_title"]; ?>">

							<?php endif; ?>
						</div>
						<div class="aside-post-title">
							<span><?php echo $recent["post_title"]; ?></span>
						</div>
						<div class="aside-post-date">
							<span><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo " ".$postdate; ?></span>
						</div>

					</a>
				</div>
				<?php
			}
			wp_reset_query();
			?>
			</section>

			<section class="aside-section-categories">
				<h3>Categories</h2>
				<ul class="categories-list">
				<?php
				$categories = get_categories( array(
				'orderby' => 'name',
				'parent'  => 0
				) );

				foreach ( $categories as $category ) {
					printf( '<li>
										<a href="%1$s">
											<span class="category-name">%2$s</span>
											<span class="category-count">%3$s</span>
										</a>
									</li>',
							esc_url( get_category_link( $category->term_id ) ),
							esc_html( $category->name ),esc_html( $category->count )
					);
				}
				?>

				</ul>
			</section>
		</aside>
	</section><!-- #primary -->

<?php
//get_sidebar();
get_footer();
