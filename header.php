<?php
/**
 * Header template for Bourbon-WP theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bourbon-WP
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- Google Fonts -->
<link href='//fonts.googleapis.com/css?family=Lora:400,400i,700,700i' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

<!-- Font-Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<!-- Animate.css -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/animatecss/3.5.2/animate.min.css" />

<?php wp_head(); ?>

</head>
<body <?php body_class('type-system-sc'); ?>>
	<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bourbon-wp' ); ?></a>

	<!-- NAV ALT -->
	<section class="top-nav-alt" role="banner">
		<div class="navigation-wrapper">
			<nav class="nav-menu nav-alt" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
				<?php wp_nav_menu(array(
					'theme_location'  => 'alt_menu',
					'menu'            => '',
					'container'       => '',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'alt-menu show',
					'menu_id'         => 'js-alt-menu'
				)); ?>
			</nav>
		</div>
	</section>
	<!-- END NAV ALT -->

  <!-- HEADER -->
	<header id="masthead" class="site-header" role="banner">
		<!-- main-navigation -->
	  <section class="main-navigation top-nav" role="banner">
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
	          <?php bourbon_wp_search_form(); ?>
	        </div>
	        <!-- End search-bar -->

	      </div>
	      <!-- End navigation-tools -->

	    </div>
	    <!-- End main-navigation-wrapper -->

	  </section>
	  <!-- End main-navigation -->

			<!-- Parallax background if on landing page -->

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

		<!-- <nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'bourbon-wp' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<!-- CONTENT  -->
	<div id="content" class="site-content">
