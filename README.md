#Bourbon-WP (aka Bourbon-Chef-Site-2.2)
> Bones Blank starter theme was a helpful start. This branch will explore starting with WordPress theme  

##1. INITIALIZE
###a. Fresh WordPress install  
###b. Import [Test Data](http://wptest.io/). ([GitHub link](https://github.com/poststatus))  

##2. CREATE/DOWNLOAD **UNDERSCORES** THEME TEMPLATE  
Click the _advanced option_, fill out appropriately, check the _\_sassify!_ box, then _GENERATE_  

##3. CLEAN HOUSE/ CLEAN START
Already had created a branch based on a working Bourbon-Chef 2.1. It contained a gulpfile.js and an installed package.json so I deleted all files and folders excluding:  
- .git  
- .gitattributes  
- .gitignore  
- node_modules  
- src  
- gulpfile.js  
- package.json   
- README.md  

I then copied the Underscores theme files into the Bourbon-WP theme folder

After a quick test in the browser and committing the changes, the fun begins...

###3. Bourbon-Chef-Site Implementation
####Styles
Started by updating the _style.scss_ in _src_ directory to version 2.2 and stated this theme is based on both Bones and Underscores. By saving the changes to this file with gulp running, the _style.css_ is over written with one created from _src/scss_ not by _sass_ and the Underscores styles.

####_src/scss/3-layouts_
Started compartmentalizing markup appropriately, ie body contains body markup, header contains footer etc.  

####header.php  
Transferred appropriate markup from previous version of Bourbon-WP.
- added custom type class
```php
<body <?php body_class('type-system-geometric'); ?>>
```
- copied navigation from `<!-- centered-navigation -->` to `<!-- PHP code here to ensure this header is displayed only on landing page -->` and placed it directly under the heading tag.  I also commented out the pre-existing _<nav>_ tags and content just before `</header><!-- #masthead -->`
- this left a broken looking theme as the navigation was looking for content in the menu.  Created a menu containing the same nav links as Bourbon-WP 1.1.  Note to self **WHY DID YOU DELETE THE WORDPRESS MENUS YOU'D ALREADY CREATED?**  
- rebuilt navigation system referring to [notes](https://github.com/Surfing-Chef/Bourbon-WP/tree/2.1) from build 2.1
- copied _landing.php_ from 2.1 for use in menu creation in case it didn't exist.  I used this template in creating a new page called _Landing_ (Bourbon-WP's homepage).  
- change _functions.php_ `register_nav_menus()` to:
```PHP
// This theme uses wp_nav_menu() these locations.
register_nav_menus( array(
  'main_menu' => esc_html__( 'Primary', 'bourbon-wp' ),
  'landing_menu' => esc_html__('Landing Menu', 'bourbon-wp'),
  'culinary_menu' => esc_html__('Culinary Menu', 'bourbon-wp'),
  'blog_menu' => esc_html__('Blog Roll', 'bourbon-wp'),
  'coding_menu' => esc_html__('Coding Menu', 'bourbon-wp')
) );
```  

- installed [menu image](https://en-ca.wordpress.org/plugins/menu-image/) plugin to allow for images as a menu selection.  Used this plugin to create a logo in the menus.  

- Create a WordPress menu called *Main Menu* in *admin > Appearance > Menus* under the Edit Menus tab:  
  - Main Menu:  (Primary menu location)
    1. Landing > page: Landing, class: nav-link main logo, image: logo, size: thumbnail, title position: hide  
    2. Blog > page: Blog, class: nav-link  
  - Click the _Primary_ box at bottom and **save**.  

- Create another menu called *Landing Menu*:
  - Landing Menu:  (Landing menu location)
    1. Home > page: Landing, class: nav-link  
    2. Welcome > page: Blog, class: nav-link  
    3. Culinaria > page: Blog, class: nav-link  
    4. Logo > page: Landing, class: nav-link logo, image: logo, size: thumbnail, title position: hide    
    5. Coding > page: Blog, class: nav-link  
    6. Blog > page: Blog, class: nav-link  
    7. Contacts > page: Blog, class: nav-link  
  - Click the _Landing Menu_ box and **save**.

####footer.php  
- Transferred appropriate markup from previous version of Bourbon-WP.
- Ensured that the `<footer>` tag in both _footer.php_ and _landing.php_ were `<footer id='colophon>'`, and that _src/scss/3-layouts/\_footer.scss_ specified the same,  `footer#colophon {...`


####a. Use Bones as starting point:  
+ **IMPORTANT NOTE**: Attempts to load the theme into WordPress before completing these steps will throw errors.  
+ renamed bones-master to bourbon-wp
+ ammended _.gitignore_ with Bourbon-Chef-Site copy
+ copied _library_ as _src_ and changed _library_ to _library.bones_ for use as reference  
+ deleted all the copied files and folders within the new _src_ folder, **Except bones.php and custom-post-type.php**  
+ copied all files and folders in _app_ from Bourbon-Chef-Site into _bourbon-wp/src_
+ changed _src/sass_ to _src/scss_
- renamed _index.php_ copied from _app_ from Bourbon-Chef-Site to _landing_ and moved it to the root of bourbon-wp
  - will use it as home page when site is appropriately converted into the WordPress structure
+ copied _package.json_ and _gulpfile.js_ from Bourbon-Chef-Site
+ ensured the following files have paths appropriately adjusted (ie _library_ changed to _src_, _app_ changed to _src_, _sass_ changed to _scss_):  
  + gulpfile.js  
  + bones.js
  + all files in _src/js/_  
  + all files in _src/scss/_  
+ Changed `proxy   : "http://localhost/Bourbon/src"` in _gulpfile.js_ to `proxy   : "http://localhost/bourbon-wp"`  


A bare, yet functioning theme is available in a browser at this point.

+ adjusted bones.php.   
From:
```php
// modernizr (without media query polyfill)
wp_register_script( 'bones-modernizr', '', array(), '2.5.3', false );
```

To:  
```php
// modernizr (without media query polyfill)
wp_register_script( 'bones-modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array(), '2.5.3', false );
```

and added:   
```php
// adding jquery
wp_deregister_script('jquery');
wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', false);
```  
just before:    
```php
// adding scripts file in the footer
wp_register_script( 'bones-js', get_stylesheet_directory_uri() . '/src/js/script.js', array( 'jquery' ), '', true );
```  

Opening the developer tools and looking at the javascript console should reveal no errors.  

+ ran `npm install` from within _bourbon-wp_ theme root
+ adjusted _// Sass Task - development css - nested/readable/mappedgulpfile.js_ as follows:
```javascript
// Sass Task - development css - nested/readable/mapped
gulp.task('sass', function() {      // RENAMED TASK
  gulp.src('src/scss/**/*.scss')
  .pipe(plumber())
  // .pipe(rename({suffix:'.dev'})) // DELETED
  .pipe(sourcemaps.init())
    .pipe(sass({sourceComments: 'map', sourceMap: 'sass', outputStyle: 'nested'}))
    .pipe(autoprefixer('last 2 versions'))
  .pipe(sourcemaps.write())
  .pipe(gulp.dest('src/css/'))
  .pipe(sass({outputStyle: 'compressed'}))  // ADDED
  .pipe(gulp.dest('./'))  // ADDED
  .pipe(browserSync.stream());
});
```   
+ Deleted sassDep task  
+ Adjusted _// Server Task - Asynchronous browser syncing..._ as follows:  
```javascript
gulp.task('serve', function(){
  browserSync.init({
    proxy   : "http://localhost/bourbon-wp"
  });

  gulp.watch('src/js/**/*.js', ['scripts']);
  gulp.watch('src/scss/**/*.scss', ['sass']);  // CALLED TASK NAME CHANGE sassDev to sass
  // gulp.watch('src/scss/**/*.scss', ['sassDep']); // DELETED
  gulp.watch('**/*.html').on('change', browserSync.reload);
  gulp.watch('**/*.php').on('change', browserSync.reload);
});
```  
###WORDPRESS:
+ Make bourbon-wp the current theme  

####Navigation (Landing and Main)
+ Emulate Bourbon-Chef-Site menu choices to structure menu  
  + Inserted `register_nav_menus()` function in _functions.php_:
  ```php
  register_nav_menus( array(
  	'landing_menu' => 'Landing Menu',

  ) );  
  ```
  + Adjusted menu array in header.php:
  ```php
  <?php wp_nav_menu(array(
    'theme_location'  => 'landing_menu',
    'menu'            => '',
    'container'       => '',
    'container_class' => '',
    'container_id'    => '',
    'menu_class'      => 'centered-navigation-menu show',
    'menu_id'         => 'js-centered-navigation-menu',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'depth'           => 0,
    'walker'          => ''
  )); ?>
  ```
  + In **WordPress Admin Menu Panel**, created Landing Menu by adding **Custom Links**, containing the menu items from _landing.php_ (home, welcome, etc.)
    + Added the class _nav-link_ to each item (click **Screen Options** tab at top of screen to show the **CSS Classes** option)  
  + Selected _Landing Menu_ and _The Main Menu_ under **Menu Settings**  
  + Installed [Menu Image](https://wordpress.org/plugins/menu-image/)  
  + Uploaded a logo to WordPress and used it as image on _logo_ menu item  
  + Created a duplicate menu called Blog Menu with the following differences:  
    + Home and Logo links remain the same: `/bourbon-wp`  
    + Culinary in Landing Menu: `#culinary`, in Bourbon Menu `/bourbon-wp`  
    + No Welcome link  
    + Coding in Landing Menu: `#coding`, in Bourbon Menu `/bourbon-wp`  
    + Contacts in Landing Menu: `#contacts`, in Bourbon Menu `/bourbon-wp`  
  + Added a dark, transparent background to navigation
  + Simplified additions of **Bourbon Chef WP Custom Menus** outlined Below
  + Changed _Bourbon Menu_ to _Blog Menu_

####WORDPRESS TEMPLATE DIRECTORY  
+ Copied _template parts_ from _twentyseventeen_ to use WordPress established template parts  
+ Made template dfirectory path available in javascript/jQuery    
  + Added the following script just after _TweenMax_ CDN loads in footer of _landing.php_ and just before `<?php wp_footer(); ?>` in _footer.php_:  
  ```html5blank
  <script>var templateDir = "<?php bloginfo('template_directory') ?>";</script>
  ```
  + This allows darksky.js and apifier.js to dynamically access the template directory path.


####WORDPRESS PLUGINS
+ Installed Jetpack plugin  
+ Installed Jetpack plugin Simple Image Sizes   
  + Shows all available images sizes and allows setting of custom sizes and classes.  Allows for implementation of feature image sizing in index.php post content:  
  ```php
  <?php
    // check if the post or page has a Featured Image assigned to it.
    if ( has_post_thumbnail() ) {
        the_post_thumbnail('full');
    }
  ?>
  ```  
+ Rather than a plugin to [toggle the admin bar](https://en-ca.wordpress.org/plugins/auto-hide-admin-bar/), this [Chrome extention](https://chrome.google.com/webstore/detail/wordpress-admin-bar-contr/joldejophkhmeajgjenfnfdpfjkalckn/related) works fine.
####WORDPRESS STYLE  
+ created a WordPress module to define WordPress specific classes
  + image alignment classes:
  ```css
  .wp-caption.alignright {float:right; margin:0 0 1em 1em}
  .wp-caption.alignleft {float:left; margin:0 1em 1em 0}
  .wp-caption.aligncenter {display: block; margin-left: auto; margin-right: auto}img.alignright {float:right; margin:0 0 1em 1em}
  img.alignleft {float:left; margin:0 1em 1em 0}
  img.aligncenter {display: block; margin-left: auto; margin-right: auto}
  a img.alignright {float:right; margin:0 0 1em 1em}
  a img.alignleft {float:left; margin:0 1em 1em 0}
  a img.aligncenter {display: block; margin-left: auto; margin-right: auto}
  ```
- Note the **importance** of style, structure and appropriate implementation of _post formats_ in the _post-formats_ directory

####TIPS TRICKS AND LINKS

####WordPress Custom Widgets
+ [Creating Custom Widgets](https://premium.wpmudev.org/blog/create-custom-wordpress-widget)   
+ [More on Custom Widgets](https://www.templatemonster.com/blog/add-widget-areas-to-wordpress-guide/)   

####WordPress Custom Menus _(Bourbon Chef WP Custom Menus)_  
+ [Simplified Custom Menus](https://premium.wpmudev.org/blog/add-menus-to-wordpress/?utm_expid=3606929-97.J2zL7V7mQbSNQDPrXwvBgQ.0&utm_referrer=https%3A%2F%2Fwww.google.ca%2F)  

####Cheatsheets
[Theme Guide](https://premium.wpmudev.org/blog/free-wordpress-themes-ultimate-guide/?utm_expid=3606929-97.J2zL7V7mQbSNQDPrXwvBgQ.0)    

####BOURBON CHEF TO DO's  
- Ensure laptop project WordPress install and DB are caught up to desktop project install and DB.
- PROJECT 1: Experiment subbing out Bones page templates with WordPress (twentyseventeen) templates  
- [PROJECT 2](https://www.smashingmagazine.com/2015/04/building-custom-wordpress-archive-page/): New Archive Page   
- Culinaria feeds Food52, Epicurious, and Lucky Peach are not very dynamic.  Change apifier setups.  
