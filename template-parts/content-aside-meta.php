<?php
/**
 * Template part for displaying aside meta on home page.
 * Edit inc/template-tags.php to adjust layout markup
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bourbon-WP
 */

?>
<section class="aside-section-posts">
	<div class="sidebar-container">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar Content") ) : ?>
		<?php endif;?>
	</div>
</section>

<section class="aside-section-twitter">
	<?php if ( (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Twitter Feeds")) ) : ?>
	<?php endif;?>
</section>

<section class="aside-section-categories">
	<div class="widget widget_categories">
		<h3 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'bourbon-wp' ); ?></h3>
		<ul>
		<?php
			wp_list_categories( array(
				'orderby'    => 'count',
				'order'      => 'DESC',
				'show_count' => 1,
				'title_li'   => '',
				'number'     => 5,
			) );
		?>
		</ul>
	</div>
	<!-- .widget_categories -->
</section>
