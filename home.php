<?php
/**
	* This is an alternative index page.
	* The header is adjusted to display a hero section.
	* Original index.php exists as index.php.BU
	*
	* @link https://codex.wordpress.org/Template_Hierarchy
	*
	* @package Bourbon-WP
**/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

<?php wp_head(); ?>

<?php // drop Google Fonts ?>
<link href='//fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Sanchez:400italic,400' rel='stylesheet' type='text/css'>
<?php // end fonts ?>

  <!-- <link rel="stylesheet" href="css/font-awesome.css" /> -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/src/css/style.css"> -->

</head>
<body class="home type-system-geometric">
  <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <div id="page" class="site">
  	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bourbon-wp' ); ?></a>

  <!-- HEADER -->
  <header  id="js-parallax-window" class="parallax-window">

    <div class="parallax-static-content">
      <!-- callout -->
      <section class="callout">
        <div class="callout-container">
          <p class="quote">Everyday carry crucifix meditation, ethical chicharrones godard gluten-free meditation, ethical chicharrones godard gluten-free meh meditation, ethical chicharrones godard gluten-free occupy bitters cliche tousled mustache master cleanse DIY. Cred tattooed vinyl.</p>
          <p class="author">Hipster O'Leary</p>
        </div>
      </section>
      <!-- End callout -->
    </div>

    <!-- main-navigation -->
	  <section class="main-navigation" role="banner">
	    <div class="navigation-wrapper">
	      <a href="<?php echo home_url(); ?>" class="mobile-logo">
	        <img src="<?php echo get_template_directory_uri(); ?>/src/images/mountain.svg" alt="Logo image">
	      </a>

	      <a href="javascript:void(0)" class="navigation-menu-button" id="js-mobile-menu">MENU</a>

	      <nav class="nav-menu nav-main" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
					<?php wp_nav_menu(array(
						'theme_location'  => 'main_menu',
						'menu'            => '',
						'container'       => '',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'navigation-menu show',
						'menu_id'         => 'js-navigation-menu'
					)); ?>
	      </nav>
	      <!-- End main NAV -->

	      <div class="navigation-tools">
	        <div class="search-bar">
	          <form role="search">
	            <input type="search" placeholder="Enter Search" />
	            <button type="submit">
	              <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/search-icon.png" alt="Search Icon">
	            </button>
	          </form>
	          <!-- End search-bar FORM-->
	        </div>
	        <!-- End search-bar -->

	      </div>
	      <!-- End navigation-tools -->

	    </div>
	    <!-- End main-navigation-wrapper -->

    <div id="js-parallax-background" class="parallax-background"></div>

    <div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

  </header>
  <!-- END HEADER -->

  <!-- CONTENT  -->
  <div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="home site-main" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'excerpt' );

			endwhile;

			//the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->

    <aside class="">
      <h3>Recent Posts</h3>
      <h3>Categories</h3>
    </aside>
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
