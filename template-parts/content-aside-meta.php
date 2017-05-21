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
