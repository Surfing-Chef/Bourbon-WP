<?php
/**
 * Bourbon-WP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bourbon-WP
 */

if ( ! function_exists( 'bourbon_wp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bourbon_wp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Bourbon-WP, use a find and replace
	 * to change 'bourbon-wp' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bourbon-wp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'main_menu' => esc_html__( 'Primary', 'bourbon-wp' ),
		'alt_menu' => esc_html__( 'Alt Main', 'bourbon-wp' ),
		'landing_menu' => esc_html__('Landing Menu', 'bourbon-wp'),
    'culinary_menu' => esc_html__('Culinary Menu', 'bourbon-wp'),
    'blog_menu' => esc_html__('Blog Roll', 'bourbon-wp'),
    'coding_menu' => esc_html__('Coding Menu', 'bourbon-wp')
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bourbon_wp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'bourbon_wp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bourbon_wp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bourbon_wp_content_width', 640 );
}
add_action( 'after_setup_theme', 'bourbon_wp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bourbon_wp_widgets_init() {
	// Default sidebar/widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Home Page Sidebar', 'bourbon-wp' ),
		'id'            => 'sidebar-home',
		'description'   => esc_html__( 'Add widgets here.', 'bourbon-wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// Widget Area - Culinaria Feeds
	register_sidebar( array(
		'name'          => esc_html__( 'Culinaria Feeds', 'bourbon-wp' ),
		'id'            => 'widget-area-1',
		'description'   => esc_html__( 'Add widgets here.', 'bourbon-wp' ),
		'before_widget' => '<section id="%1$s" class="widget culinaria-widget-area">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

// Widget Area - Twitter
register_sidebar( array(
	'name'          => esc_html__( 'Twitter Feeds', 'bourbon-wp' ),
	'id'            => 'widget-area-2',
	'description'   => esc_html__( 'Add widgets here.', 'bourbon-wp' ),
	'before_widget' => '<section id="%1$s" class="widget twitter-widget-area">',
	'after_widget'  => '</section>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>',
) );

// Widget Area - Weather
register_sidebar( array(
	'name'          => esc_html__( 'Weather Feeds', 'bourbon-wp' ),
	'id'            => 'widget-area-3',
	'description'   => esc_html__( 'Add widgets here.', 'bourbon-wp' ),
	'before_widget' => '<section id="%1$s" class="widget weather-widget-area">',
	'after_widget'  => '</section>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>',
) );
}

// Widget Area - Header Callout Content
register_sidebar( array(
	'name'          => esc_html__( 'Header Callout Content', 'bourbon-wp' ),
	'id'            => 'widget-area-4',
	'description'   => esc_html__( 'Add widgets here.', 'bourbon-wp' ),
	'before_widget' => '<section id="%1$s" class="widget weather-widget-area">',
	'after_widget'  => '</section>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>',
) );

add_action( 'widgets_init', 'bourbon_wp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bourbon_wp_scripts() {

	// development stylesheet
	wp_enqueue_style( 'bourbon-wp-style', get_template_directory_uri() . './style.css' );

	wp_enqueue_script( 'bourbon-wp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'bourbon-wp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bourbon_wp_scripts' );


/**
 * Implement the Bourbon-WP custom admin page
 */
require get_template_directory() .
'/inc/function-admin.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() .
'/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() .
'/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() .
'/inc/jetpack.php';

/**
* Remove the Push Down from the Admin Bar
*/
add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );

/**
* Enable PHP in the default Text widget
*/
add_filter('widget_text','execute_php',100);
function execute_php($html){
     if(strpos($html,"<"."?php")!==false){
          ob_start();
          eval("?".">".$html);
          $html=ob_get_contents();
          ob_end_clean();
     }
     return $html;
}

/**
* Custom searchform
*/
function bourbon_wp_search_form( $echo = true ) {
    /**
     * Modified WordPress get_search_form().
     */
    do_action( 'pre_get_search_form' );

    $format = current_theme_supports( 'html5', 'search-form' ) ? 'html5' : 'xhtml';

    /**
     * Filters the HTML format of the search form.
     */
    $format = apply_filters( 'search_form_format', $format );

    $search_form_template = locate_template( 'searchform.php' );
    if ( '' != $search_form_template ) {
        ob_start();
        require( $search_form_template );
        $form = ob_get_clean();
    } else {
        if ( 'html5' == $format ) {
            $form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
                <label>
                    <span class="screen-reader-text">' . _x( 'Search for:', 'label' ) . '</span>
                    <input type="search" class="search-field" placeholder="' . esc_attr_x( 'Search &hellip;', 'placeholder' ) . '" value="' . get_search_query() . '" name="s" />
                </label>
                <button type="submit">
									<i class="fa fa-search" aria-hidden="true"></i>
		            </button>
            </form>';
        } else {
            $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url( home_url( '/' ) ) . '">
                <div>
                    <label class="screen-reader-text" for="s">' . _x( 'Search for:', 'label' ) . '</label>
                    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
										<button type="submit">
											<i class="fa fa-search" aria-hidden="true"></i>
				            </button>
                </div>
            </form>';
        }
    }

    /**
     * Filters the HTML output of the search form.
     *
     * @since 2.7.0
     *
     * @param string $form The search form HTML output.
     */
    $result = apply_filters( 'get_search_form', $form );

    if ( null === $result )
        $result = $form;

    if ( $echo )
        echo $result;
    else
        return $result;
}

/**
* Truncate a string only at a whitespace (by nogdog)
*/
function truncate($text, $length) {
   $length = abs((int)$length);
   if(strlen($text) > $length) {
      $text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1...', $text);
   }
   return($text);
}

/**
* Creates array set number af random numbers
*/
function randomizer($how_many, $of_how_many){
  $num_array = array();

  while(count($num_array)<$how_many){
    $num = round(rand(0, $of_how_many-1));
    if(!in_array($num,$num_array)){
      $num_array[] = $num;
    } else {
      continue;
    }
  }
  return $num_array;
}

/**
* Register Google API key for Advanced Custom Fields
*/
function sc_acf_init() {
	// Pulls value from Bourbon-WP custom options menu in the dashboard
	$api = esc_attr(get_option( 'google_api' ) );
	acf_update_setting('google_api_key', $api);
}

add_action('acf/init', 'sc_acf_init');
