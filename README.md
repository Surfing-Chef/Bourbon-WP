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
[Contact Form 1](https://en-ca.wordpress.org/plugins/formidable/): makes it easy to create professional forms.
[Contact Form 2]([Formidable Forms](https://en-ca.wordpress.org/plugins/planso-forms/): Super flexible plug-in to create contact forms and more. Has a built-in visual styler, included layout classes, and complete access to edit the form HTML and CSS.  

Rather than a plugin to [toggle the admin bar](https://en-ca.wordpress.org/plugins/auto-hide-admin-bar/), this [Chrome extention](https://chrome.google.com/webstore/detail/wordpress-admin-bar-contr/joldejophkhmeajgjenfnfdpfjkalckn/related) works great.  Be sure to read the fix below for [Removing the 32px Push Down from the Admin Bar](https://css-tricks.com/snippets/wordpress/remove-the-28px-push-down-from-the-admin-bar/#comment-1588042)

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
####CSS
- Responsive images.  A simple fix that my brain just couldn't figure out.  Thanks much [stack overflow](http://stackoverflow.com/questions/12991351/css-force-image-resize-and-keep-aspect-ratio):
```css
img {
  display: block;
  max-width:230px;
  max-height:95px;
  width: auto;
  height: auto;
}
```
and the parent container should have `overflow: auto;` or `overflow-x: auto;`  

- Also note that updating/replacing images with themselves may solve alignment issues when trouble shooting

###4. DEPLOYMENT TO SURFING-CHEF.COM
- Set up filezilla as backup plan for file updates  

- Ensuring header is same for landing and index - checking wp_head()
  - [Remove the 32px Push Down from the Admin Bar](https://css-tricks.com/snippets/wordpress/remove-the-28px-push-down-from-the-admin-bar/#comment-1588042) solved by adding the following to functions.php:  
  ```php
add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );
  ```
  - Match/copy header and footer div tags with ids and classes to approproate areas on landing to match a wordpress post/page.  This makes it easier to implement WordPress actions, hooks, plugins, etc.  

- Implemented WordPress plug-in based contact form - with custom widget area
  - Created dynamic contact area in _landing.php_  
  - Used [PlanSo Forms](https://en-ca.wordpress.org/plugins/planso-forms/) plug in to create form and shortcode to place into the new widget.  
  - Created widget area for contact form on landing page to replace form markup:  
 ```php
 <h1>Contact Me</h1>
 <section id="contact-form" class="clearfix">
   <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Contact Form") ) : ?>
   <?php endif;?>
 </section>
 ```  
  - Registered a new widget in _functions.php_ on about line 106:
 ```php
 register_sidebar( array(
		'name'          => esc_html__( 'Contact Form', 'bourbon-wp' ),
		'id'            => 'contact-form-landing',
		'description'   => esc_html__( 'Use a text widget to place shortcode for Contact Form here.', 'bourbon-wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
 ```
  - Placed a text widget into the new Contact Form area - *Admin > Appearance > Widgets* and then added the shortcode generated by *PlanSo Forms*  
  - Editted scss to implement Bourbon-WP Contact Form styles  

- Implemented WordPress plug-in based contact form - using php generated by plugin
  - Used [Formidable Forms](https://en-ca.wordpress.org/plugins/planso-forms/) plug in to create form and PHP shortcode to place directly into php page templates or shortcode for WordPress pages or posts.  
  - Created contact form using the template offered, used only 5 generated fields plus submit button
    - Refined the auto-generated *classes*: navigate to Settings tab: Form Settings > Customize HTML  
      - **Name** - replaced non-braced classes with _contact-third contact-name_  
      - **Email** - cleared default and added class _contact-third contact-email_
      - **Subject** - cleared default and added class _contact-half contact-subject_
      - **Message** - cleared default and added class _contact-full contact-message_  
      - **Captcha** - cleared default and added class _contact-full contact-captcha_  
      - **Submit** - cleared default and added class _contact-full_  
  - Inserted plugin-generated PHP into landing page:  
 ```php
 <h1>Contact Me</h1>
 <section id="contact-form" class="clearfix">
   <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 6, 'title' => false, 'description' => true ) ); ?>
 </section>
 ```   
  - Toggled off Formidable styling:  
    - While in the newly created Contact Form, navigate to Settings tab: Styling & Buttons > Style Template: select _Do not use Formidable styling_
  - Further refined both the styles in *SCSS* files and the many options within the plugin itself  
  - Tested using [Test Mail Server Tool](http://www.toolheap.com/test-mail-server-tool/)  

- Checking gulpfile.js for build tasks  

###5. TIPS TRICKS AND LINKS

####WordPress Custom Widgets
+ [Easy Custom Widget Areas](https://buckleupstudios.com/add-a-new-widget-area-to-a-wordpress-theme/)   
+ [Creating Custom Widgets](https://premium.wpmudev.org/blog/create-custom-wordpress-widget)   
+ [More on Custom Widgets](https://www.templatemonster.com/blog/add-widget-areas-to-wordpress-guide/)  

####WordPress Custom Menus _(Bourbon Chef WP Custom Menus)_  
+ [Simplified Custom Menus](https://premium.wpmudev.org/blog/add-menus-to-wordpress/?utm_expid=3606929-97.J2zL7V7mQbSNQDPrXwvBgQ.0&utm_referrer=https%3A%2F%2Fwww.google.ca%2F)  

####Cheatsheets
[Theme Guide](https://premium.wpmudev.org/blog/free-wordpress-themes-ultimate-guide/?utm_expid=3606929-97.J2zL7V7mQbSNQDPrXwvBgQ.0)    

####BOURBON CHEF TO DO's  
- Ensure laptop project WordPress install and DB are caught up to desktop project install and DB.
- How to add custom scripts to WordPress footer.
- Implement Custom parts in Landing Page to edit from WordPress

- [PROJECT 1](https://www.smashingmagazine.com/2015/04/building-custom-wordpress-archive-page/): New Archive Page   
- Culinaria feeds Food52, Epicurious, and Lucky Peach are not very dynamic.  Change apifier setups.  
