# Bourbon-WP (aka Bourbon-Chef-Site-2.4)
> Bones Blank starter theme was a helpful start. This branch reconfigures the site layout to a blog start page, with the main parent categories each having a nav bar link - Culinaria, Coding, Projects, About - as well as a contact page. Layout components are influenced by the theme, [Activello](https://colorlib.com/wp/themes/activello/)  

> **TOO SAD!** I can't believe LuckyPeach.com is done May 1.  And just as heart-breaking is the last publication occurs this fall.

## **TODO**
- Create a bookmarks page template to display my bookmarks as links
~~- Add meta tags to header - [Social Graph Object](http://ogp.me/)~~    
- Adjust *comments* section in single posts  
~~- Single posts to display feature images - adjust posts to contain them.~~  
  - [Simple Image Sizes Plugin](https://en-ca.wordpress.org/plugins/simple-image-sizes/):  (1) Install and activate. (2)  Navigate to `Settings > Media`. (3) Create, modify or reference image sizes. (4) Click `**Regenerate Thumbnails**` to ensure changes.
~~ - Orange color for highlights ~~  
~~- 404 page styles and layout ~~
~~- Adjust Culinaria Page~~  
  ~~- responsive feeds~~
  ~~- function to randomly select 6 feed items only~~
~~- Add *aside* content on pages - bookmarks (custom menus) perhaps...~~
- Add animation:  start with [Animate.css](https://github.com/daneden/animate.css)  
- Add **category specific posts on pages** using code from [here](https://developer.wordpress.org/reference/classes/wp_query/): A great resource for altering The Loop.    

## **UPDATES**  
-  [Reminder about .gitignore reset](http://blog.jonathanchannon.com/2012/11/18/gitignore-not-working-fixed/)  
- After updating the main navigation layout, the logo/home line moves from center of site map and replaces the home button link.  Make these adjustments in the WordPress admin pages:  
- Adjust *Primary Menu* in *admin > Appearance > Menus* under the *Edit Menus* tab  

## **SITE DEPLOYMENT**  
- install [Remote-FTP](https://atom.io/packages/remote-ftp) into Atom for ease of use. [Tutorial reminder](https://www.youtube.com/watch?v=YmSD2O85wx0)   
- [Filezilla](https://filezilla-project.org/)  

## SITEMAP 1.3
1. < HOME (BLOG) >
2. < LOGO(home) >< CULINARIA >< PROJECTS >< CODING >< ABOUT >< CONTACTS >  

## 1. ADJUSTMENTS
- Created custom searchbar based on WordPress [`get_search_bar()` function] (https://developer.wordpress.org/reference/functions/get_search_form/)  
  - ['bourbon_wp_search_form()' in *functions.php*](https://github.com/Surfing-Chef/Bourbon-WP/blob/2.3/functions.php)  
- Created a simple fixed menu to appear at top of screen when main menu disappears:  
  - [added code to *header.php* and *header-home.php* just inside the *#page* div tag](https://github.com/Surfing-Chef/Bourbon-WP/blob/2.3/header-home.php)  
  - [implemented menu in *functions.php* around line 48](https://github.com/Surfing-Chef/Bourbon-WP/blob/2.3/functions.php)  
### 1.1 Home Page
- copy _**index.php**_ as _**home.php**_
- alter **header** section of _**home.php**_ to match the same section in _**landing.php**_
- adjust the _**wp_nav_menu(array)**_ from `'theme_location'  => 'landing_menu',` to `'theme_location'  => 'main_menu',`
  - [_**home.php**_](https://github.com/Surfing-Chef/Bourbon-WP/blob/2.3/home.php)  
- [Modified _**template-parts/content-excerpt.php**_](https://github.com/Surfing-Chef/Bourbon-WP/blob/2.3/template-parts/content-excerpt.php)  
- [Modified _**inc\template-tags.php**_](https://github.com/Surfing-Chef/Bourbon-WP/blob/2.3/inc/template-tags.php)  
- Display featured images and excerpts:  
  - featured images as backgrounds to be centered and cropped via css  
  - logo smaller size with larger margins/padding  
- Custom sidebar displays recent posts and categories:  
  - [recent posts](https://codex.wordpress.org/Function_Reference/wp_get_recent_posts)  
  - [categories](https://developer.wordpress.org/reference/functions/get_categories/)  
- Images not displaying, had to [adjust link in *template-parts > content-exerpt.php*](https://github.com/Surfing-Chef/Bourbon-WP/commit/06ba9cdc29527ac224e46c36e3cc52b113399892)  

### 1.2 Static Pages - Culinaria, Coding, Projects and About
#### Culinaria

- Added a widgets' section to _**template-parts\content-page.php**_ that inserts appropriate widget areas depending on the current page slug:
```PHP
<?php if ( is_page( 'culinaria' ) && (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Culinaria Feeds")) ) : ?>
<?php endif;?>
```  
  - [_**template-parts\content-page.php**_](https://github.com/Surfing-Chef/Bourbon-WP/blob/2.3/template-parts/content-page.php)
  - added PHP functionality to WordPress default text widget:
  ```PHP
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
  ```  
- ~~[adjusted apifier.js to output images](https://github.com/Surfing-Chef/Bourbon-WP/blob/2.3/src/js/apifier.js)  
- [google seach to crop and center](https://www.google.ca/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=how+to+crop+and+center+image+css&*)  
- [Adjust images so they crop to square](http://stackoverflow.com/questions/18673900/how-to-center-and-crop-an-image-to-square-with-css)~~  
- Deleted Apifier and implemented a PHP driven feed gallery  
- [Responsive Feature Images](https://www.lynda.com/articles/create-responsive-featured-images-wordpress)


### 1.3 Archives and Single Posts  

## 2. WordPress Admin
### 2.1 New Pages
- Created the following pages after deleting existing versions:
  - Culinaria > Template: Default Template    
  - Coding > Template: Default Template    
  - Projects  > Template: Default Template   
  - About > Template: Default Template    
  - Contacts > Template: Default Template    

### 2.2 Navigation
- Adjust *Primary Menu* in *admin > Appearance > Menus* under the *Edit Menus* tab:  
  - Main Menu:  (Primary menu location)  
  1. Custom Link > Navigation Label: Logo, CSS Classes: nav-link logo, image: logo, size: thumbnail, title position: hide    
  2. Page: Culinaria, Navigation Label: Culinaria, CSS Classes: nav-link  
  3. Page: Coding, Navigation Label: Coding, CSS Classes: nav-link  
  4. Page: Projects, Navigation Label: Projects, CSS Classes: nav-link  
  5. Page: About, Navigation Label: About, CSS Classes: nav-link  
  6. Page: Contacts, Navigation Label: Contacts, CSS Classes: nav-link   
  - Click the *Primary Menu* box and **save**.  
- Create/Adjust *Alt Main Menu* in *admin > Appearance > Menus* under the *Manage Locations* tab:  
  - Alt Main: select *Alt Main* from the drop down, or ***Use New Menu*** option  
  1. Custom Link > Navigation Label: Home, URL: /bourbon-wp, CSS Classes: nav-link  
  2. Page: Culinaria, Navigation Label: Culinaria, CSS Classes: nav-link  
  3. Page: Coding, Navigation Label: Coding, CSS Classes: nav-link  
  4. Page: Projects, Navigation Label: Projects, CSS Classes: nav-link  
  5. Page: About, Navigation Label: About, CSS Classes: nav-link  
  6. Page: Contacts, Navigation Label: Contacts, CSS Classes: nav-link  


### 2.3 Widgets
- Drag and drop the default WP *text widget* to the new *Culinaria Feeds* widget area:  
  - *Dashboard > Appearance > Widgets*  
- Insert accordion-section *html* and *PHP* into _**Culinary Feeds > text widget**_ and insert a title, "Recent Feeds"
  - [Culinaria Feed Snippet no Logo BG](https://gist.github.com/Surfing-Chef/3db8facc6c6807e5ffa23d79735c35df#file-culinaria-feed-snippet-no-logo-bg)  
- [`<?php the_widget( $widget, $instance, $args ); ?>`](https://codex.wordpress.org/Function_Reference/the_widget)  

#### CSS
- Responsive images: Various image sizes to same size, cropped and centered:  

**_HTML:_**  
```HTML
<div class="image-container" style="background-image: url('http://the.image.url')"></div>
## Omit the style if it is part of the css. My markup is generated by jQuery.
```   
**_CSS:_**  
```CSS
.image-container {
  //background-image: url('http://the.image.url');
  height: 260px;
  background-position: center center;
  background-size: cover;
  background-repeat: no-repeat;
}
```

### 4. DEPLOYMENT TO SURFING-CHEF.COM
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

### 5. TIPS TRICKS AND LINKS

#### PHP
+ [Auto-Update on Local machine](http://www.businesslegions.com/blog/2014/08/09/create-cron-jobs-wamp/)
  - remember to change directories to the folder containing the php file to run in batch commands before running the actual php code:  
  ```type
    9   cd C:\wamp64\www\Bourbon-WP\wp-content\themes\bourbon-wp\bot
    10  php -f feeds.php
  ```  

#### GULP  
+ [Ensuring tasks complete](https://www.npmjs.com/package/run-sequence): The notes in the example code, I did not use the *run-sequence* package  

#### WordPress Custom Widgets
+ [Easy Custom Widget Areas](https://buckleupstudios.com/add-a-new-widget-area-to-a-wordpress-theme/)   
+ [Creating Custom Widgets](https://premium.wpmudev.org/blog/create-custom-wordpress-widget)   
+ [More on Custom Widgets](https://www.templatemonster.com/blog/add-widget-areas-to-wordpress-guide/)  

#### WordPress Custom Menus _(Bourbon Chef WP Custom Menus)_  
+ [Simplified Custom Menus](https://premium.wpmudev.org/blog/add-menus-to-wordpress/?utm_expid=3606929-97.J2zL7V7mQbSNQDPrXwvBgQ.0&utm_referrer=https%3A%2F%2Fwww.google.ca%2F)  
+ References to customized post navigation used on single post pages can be found [here](https://developer.wordpress.org/reference/functions/the_post_navigation/) and [here](https://developer.wordpress.org/reference/functions/get_the_post_navigation/).  
#### Cheatsheets
[Theme Guide](https://premium.wpmudev.org/blog/free-wordpress-themes-ultimate-guide/?utm_expid=3606929-97.J2zL7V7mQbSNQDPrXwvBgQ.0)    

#### BOURBON CHEF TO DO's  
~~- Ensure laptop project WordPress install and DB are caught up to desktop project install and DB.~~
~~- How to add custom scripts to WordPress footer.~~
~~- Implement Custom parts in Landing Page to edit from WordPress~~  
~~- Ensure posts look is congruent with theme before going live.~~  

~~[PHP COMPOSER AND THEN THIS LINK](https://github.com/kbariotis/feedly-api)~~  

~~- [Apifier login to Feedly](https://www.youtube.com/watch?v=kkHSsSpY2lk)~~  

[PROJECT](https://www.smashingmagazine.com/2015/04/building-custom-wordpress-archive-page/): New Archive Page  

[PROJECT](https://www.lynda.com/PHP-tutorials/WordPress-Creating-Custom-Plugins-PHP/508212-2.html): Culinaria Feeds  
