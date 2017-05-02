<?php
/**
 * Template for displaying site meta on home page.
 * Edit inc/template-tags.php to adjust layout markup
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bourbon-WP
 */

?>
<section class="aside-most-used-categories">
	<?php if ( bourbon_wp_categorized_blog() ) :   ?>
	<div class="widget widget_categories">
		<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'bourbon-wp' ); ?></h2>
		<ul>
		<?php
			wp_list_categories( array(
				'orderby'    => 'count',
				'order'      => 'DESC',
				'show_count' => 1,
				'title_li'   => '',
				'number'     => 10,
			) );
		?>
		</ul>
	</div><!-- .widget -->
	<?php endif; ?>
</section class="aside-archives">

<section>
	<?php the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>" ); ?>
</section>

<section class="aside-tag-cloud">
	<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
</section>
