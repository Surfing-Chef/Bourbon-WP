<?php
/**
 * Template part for displaying content in page.php template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bourbon-WP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( is_page( 'culinaria' ) && (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Culinaria Feeds")) ) : ?>
	<?php endif;?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bourbon-wp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			$icon_edit = '<i class="fa fa-pencil" aria-hidden="true"></i>';
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( ' Edit Page%s', 'bourbon-wp' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">'.$icon_edit,
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
