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

				<!-- ACF Content Calls -->

				<?php
				// Post Map
				if( get_field('post_map') ): ?>
					<?php $location = get_field('post_map'); ?>
					<div class="acf-map">
						<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
					</div>
				<?php endif; // if( get_field('post_map') ):

				include_once get_template_directory() . '/inc/acf/display-map.php';
				?>

				<?php
				// Post Links
				if( have_rows('post_links') ): ?>
					<div id="post-links">
						<section>
							<?php while( have_rows('post_links') ): the_row(); ?>
								<div>
									<a href="<?php the_sub_field('link_url'); ?>"
										 alt="<?php the_sub_field('link_title'); ?>"
										 target="_blank" >
										<?php the_sub_field('link_title'); ?></a>
									<span> - <?php the_sub_field('link_description'); ?> </span>
								</div>
							<?php endwhile; ?>
						</section>
					</div>
				<?php endif; // if( get_field('post_links') ): ?>

				<!-- ACF Content Calls -->

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
						'before' => '<div class="page-links">Next Post > ' . esc_html__( 'Pages:', 'bourbon-wp' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
		</section>

	</div><!-- .article-content -->
</article><!-- #post-## -->
