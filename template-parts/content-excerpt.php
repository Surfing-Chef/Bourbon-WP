<?php
/**
 * Template part for displaying post excerpts.
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
					?><h4><?php the_category( '&bull;' ); ?></h4><?php
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					?><h4><?php the_category( '&bull;' ); ?></h4><?php
					the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
				endif;
				?>

				<?php bourbon_wp_posted_on(); ?>
			</header>
			<!-- .entry-header -->

			<div class="entry-content">
				<div class="post-thumbnail">
					<?php
						if ( has_post_thumbnail() ) {
								the_post_thumbnail('medium_large');
						}
					?>
				</div>
				<!-- END .post-thumbnail -->
				<?php the_excerpt(); ?>

				<?php bourbon_wp_entry_footer(); ?>

				<?php
				if ( function_exists( 'sharing_display' ) ) {
				    sharing_display( '', true );
				}

				if ( class_exists( 'Jetpack_Likes' ) ) {
				    $custom_likes = new Jetpack_Likes;
				    echo $custom_likes->post_likes( '' );
				}
				?>

				<?php wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bourbon-wp' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
		</section>

	</div><!-- .article-content -->
</article><!-- #post-## -->
