#Bourbon-WP (aka Bourbon-Chef-Site-2.3)
> Bones Blank starter theme was a helpful start. This branch reconfigures the site layout to a blog start page, with the main parent categories each having a nav bar link - Culinaria, Coding, Projects, About - as well as a contact page.

##SITEMAP 1.3
1. < HOME (BLOG) >
2. < HOME >< CULINARIA >< CODING >< LOGO(home) >< PROJECTS >< ABOUT >< CONTACTS >  


##1. ADJUSTMENTS

###1.1 Home Page
- copy _index.php_ as _home.php_
- alter **header** section of _home.php_ to match _landing.php_
- adjust the _wp_nav_menu(array)_ from `'theme_location'  => 'landing_menu',` to `'theme_location'  => 'main_menu',`
  - [home.php](https://github.com/Surfing-Chef/Bourbon-WP/blob/2.3/home.php)  

##2. WordPress Admin
###2.3 New Pages
- Created the following pages after deleting existing versions:
  - Culinaria > Template: Default Template    
  - Coding > Template: Default Template    
  - Projects  > Template: Default Template   
  - About > Template: Default Template    
  - Contacts > Template: Default Template    


###2.2 Navigation
-  Adjust *Primary Menu* in *admin > Appearance > Menus* under the Edit Menus tab:  
  - Main Menu:  (Primary menu location)  
  1. Custom Link > Navigation Label: Home, URL: /bourbon-wp, CSS Classes: nav-link  
  2. Page: Culinaria, Navigation Label: Culinaria, CSS Classes: nav-link  
  3. Page: Coding, Navigation Label: Coding, CSS Classes: nav-link  
  4. Custom Link > Navigation Label: Logo, CSS Classes: nav-link logo, image: logo, size: thumbnail, title position: hide    
  5. Page: Projects, Navigation Label: Projects, CSS Classes: nav-link  
  6. Page: About, Navigation Label: About, CSS Classes: nav-link  
  7. Page: Contacts, Navigation Label: Contacts, CSS Classes: nav-link   
- Click the _Primary Menu_ box and **save**.



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

- ~~Implemented WordPress plug-in based contact form - with custom widget area and [PlanSo Forms](https://en-ca.wordpress.org/plugins/planso-forms/)~~
  - Created dynamic contact area in _landing.php_  
  - Used [PlanSo Forms](https://en-ca.wordpress.org/plugins/planso-forms/) plug-in to create form and shortcode to place into the new widget.  
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

- Used [Formidable Forms](https://en-ca.wordpress.org/plugins/planso-forms/) plug-in to create contact form and PHP shortcode to place directly into php page templates or shortcode for WordPress pages or posts.  
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

###5. TIPS TRICKS AND LINKS
####GULP  
+ [Ensuring tasks complete](https://www.npmjs.com/package/run-sequence): The notes in the example code, I did not use the *run-sequence* package  

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
- Ensure posts look is congruent with theme before going live.  

- [PHP COMPOSER AND THEN THIS LINK](https://github.com/kbariotis/feedly-api)

- [Apifier login to Feedly](https://www.youtube.com/watch?v=kkHSsSpY2lk)  

[PROJECT](https://www.smashingmagazine.com/2015/04/building-custom-wordpress-archive-page/): New Archive Page  

[PROJECT](https://www.lynda.com/PHP-tutorials/WordPress-Creating-Custom-Plugins-PHP/508212-2.html): Culinaria Feeds  
