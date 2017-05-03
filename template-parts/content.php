<?php
/**
 * Template part for displaying posts
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

				<?php bourbon_wp_posted_on(); ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<div class="post-thumbnail">
					<?php
						// check if the post or page has a Featured Image assigned to it.
						if ( has_post_thumbnail() ) {
								the_post_thumbnail('medium_large');
						}
					?>
				</div>

				<?php the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bourbon-wp' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );
				?>

				<?php bourbon_wp_entry_footer(); ?>

				<?php wp_link_pages( array(
						'before' => '<div class="page-links">Next Post > ' . esc_html__( 'Pages:', 'bourbon-wp' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
		</section>

	</div><!-- .article-content -->
</article><!-- #post-## -->
