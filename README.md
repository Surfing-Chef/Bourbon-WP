#Bourbon-WP (aka Bourbon-Chef-Site-2.2)
> Bones Blank starter theme was a helpful start. This branch will explore starting with Underscores theme  

##1. INITIALIZE
###1.1 Fresh WordPress install.  Deactivate and Uninstall all plugins except WordPress Importer.
###1.2 Import [Test Data](http://wptest.io/) - ([GitHub link](https://github.com/poststatus)) using WordPress Importer plugin
###1.3 Plugins - Install and activate the following plugins:
[Menu Image](https://en-ca.wordpress.org/plugins/menu-image/): allows for images as menu items.  Use this plugin to create a logo in the Main and Landing Menus  
[Jetpack](https://jetpack.com/): a single plugin accessing over two dozen popular plugins.  
  - Input API.  
  - Navigate to Jetpack settings > Appearance.  Ensure the **Tiled Galleries** option is toggled on.
[Simple Image Sizes](https://wordpress.org/plugins-wp/simple-image-sizes/): shows all available images sizes and allows setting of custom sizes and classes.  Easier implementation of feature image sizes.  
Rather than a plugin to [toggle the admin bar](https://en-ca.wordpress.org/plugins/auto-hide-admin-bar/), this [Chrome extention](https://chrome.google.com/webstore/detail/wordpress-admin-bar-contr/joldejophkhmeajgjenfnfdpfjkalckn/related) works great.


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

I then copied the Underscores theme files and folders into the Bourbon-WP theme folder

After a quick test in the browser and committing the changes, the fun begins...

###3. Bourbon-Chef-Site Implementation
####Styles
Started by updating the _style.scss_ in _src_ directory to version 2.2 and stated this theme is based on both Bones and Underscores. By saving the changes to this file with gulp running, the _style.css_ is over written with one created from _src/scss_ not by _sass_ and the Underscores styles.

####_src/scss/3-layouts_
Started compartmentalizing markup appropriately, ie body contains body markup, header contains header, etc.  

####header.php  
Transferred appropriate markup from previous version of Bourbon-WP.
- added custom type class
```php
<body <?php body_class('type-system-geometric'); ?>>
```
- copied navigation from `<!-- centered-navigation -->` to `<!-- PHP code here to ensure this header is displayed only on landing page -->` and placed it directly under the heading tag.  I also commented out the pre-existing _<nav>_ tags and content just before `</header><!-- #masthead -->`
- this left a broken looking theme as the navigation was looking for content in the menu.  Created a menu containing the same nav links as Bourbon-WP 1.1.  Note to self **WHY DID YOU DELETE THE WORDPRESS MENUS ALREADY CREATED?**  
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

- Create a WordPress menu called *Main Menu* in *admin > Appearance > Menus* under the Edit Menus tab:  
  - Main Menu:  (Primary menu location)  
    1. Page: Landing, Navigation Label: Logo, CSS Classes: nav-link main logo, image: logo, size: thumbnail, title position: hide  
    2. Custom Link > Navigation Label: Culinaria, URL: /bourbon-wp, CSS Classes: nav-link   
    3. Custom Link > Navigation Label: Coding, URL: /bourbon-wp, CSS Classes: nav-link  
    4. Page: Blog > Navigation Label: Blog, CSS Classes: nav-link   
    5. Custom Link > Navigation Label: Contacts, URL: /bourbon-wp, CSS Classes: nav-link  

  - Click the _Primary_ box at bottom and **save**  

- Create another menu called *Landing Menu*:
  - Landing Menu:  (Landing menu location)
    1. Page: Landing, Navigation Label: Home, CSS Classes: nav-link  
    2. Custom Link > Navigation Label: Welcome, URL: /bourbon-wp, CSS Classes: nav-link  
    3. Custom Link > Navigation Label: Culinaria, URL: /bourbon-wp, CSS Classes: nav-link  
    4. Page: Landing, Navigation Label: Logo, CSS Classes: nav-link logo, image: logo, size: thumbnail, title position: hide    
    5. Custom Link > Navigation Label: Coding, CSS Classes: nav-link  
    6. Page: Landing, Navigation Label: Blog, CSS Classes: nav-link  
    7. Custom Link > Navigation Label: Contacts, URL: /bourbon-wp, CSS Classes: nav-link   
  - Click the _Landing Menu_ box and **save**.  

  - To properly hide the screen reader text, place the following styles after the header styles in _header.scss_:  
  ```php
  .screen-reader-text {
      position: absolute !important;
      left: -999em;
  }
  ```

  - Ensure the _Display Site Title and Tagline_ box in unchecked in the customize options for the theme

####footer.php / _footer.scss  
- Transferred appropriate markup from previous version of Bourbon-WP.  
- Ensured that the `<footer>` tag in both _footer.php_ and _landing.php_ were `<footer id='colophon>'`, and that _src/scss/3-layouts/\_footer.scss_ specified the same,  `footer#colophon {...`


####index.php / _index.scss_  
- if using `get_template_part( 'template-parts/content', get_post_format() );` in the loop, edit the appropriate template PHP file in the _template-parts_ directory.  

- [Feature Images(Post Thumbnails)](https://codex.wordpress.org/Post_Thumbnails)  
  - ensure _functions.php_ contains `add_theme_support( 'post-thumbnails' ); ` to enable Feature Images
  - insert feature images if they are set in a post - in the _template-parts/content.php_ file, add the following just after `<?php the_content( sprintf(... ?>`:  
  ```PHP
  <div class="post-thumbnail">
    <?php
      // check if the post or page has a Featured Image assigned to it.
      if ( has_post_thumbnail() ) {
          the_post_thumbnail('full');
      }
    ?>  
  </div>
  ```

###4. TIPS TRICKS AND LINKS

####WordPress Custom Widgets
+ [Creating Custom Widgets](https://premium.wpmudev.org/blog/create-custom-wordpress-widget)   
+ [More on Custom Widgets](https://www.templatemonster.com/blog/add-widget-areas-to-wordpress-guide/)   

####WordPress Custom Menus _(Bourbon Chef WP Custom Menus)_  
+ [Simplified Custom Menus](https://premium.wpmudev.org/blog/add-menus-to-wordpress/?utm_expid=3606929-97.J2zL7V7mQbSNQDPrXwvBgQ.0&utm_referrer=https%3A%2F%2Fwww.google.ca%2F)  

####Cheatsheets
[Theme Guide](https://premium.wpmudev.org/blog/free-wordpress-themes-ultimate-guide/?utm_expid=3606929-97.J2zL7V7mQbSNQDPrXwvBgQ.0)    

####BOURBON CHEF TO DO's  
- Ensure laptop project WordPress install and DB are caught up to desktop project install and DB.

- [PROJECT 1](https://www.smashingmagazine.com/2015/04/building-custom-wordpress-archive-page/): New Archive Page   
- Culinaria feeds Food52, Epicurious, and Lucky Peach are not very dynamic.  Change apifier setups.  
