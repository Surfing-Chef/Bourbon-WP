<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bourbon-WP
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h2 class="page-title">Archive: ', '</h2>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'exerpt');

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

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
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
