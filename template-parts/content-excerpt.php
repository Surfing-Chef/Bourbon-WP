<?php
/**
 * Template for displaying post excerpts on home page.
 * Edit inc/template-tags.php to adjust layout markup
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bourbon-WP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="article-content">

		<section>
			<header class="entry-header">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
				endif;
				?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
				// Must be inside a loop.

				if ( has_post_thumbnail() ) {
					$thumb_id = get_post_thumbnail_id();
					$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
					echo
					'<div class="home-featured-image" style="background-image: url(http:' . $thumb_url[0]
							. ')"></div>';
				}
				else {
				    echo '<div class="home-featured-image not-set" style="background-image: url(\'' . get_bloginfo( 'stylesheet_directory' )
				        . '/src/images/logo.png\')"></div>';
				}				 ?>

				<?php the_excerpt(); ?>
				<?php bourbon_wp_posted_modified_on(); ?>
				<?php bourbon_wp_entry_footer(); ?>

				<?php wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bourbon-wp' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
		</section>

	</div><!-- .article-content -->
</article><!-- #post-## -->
