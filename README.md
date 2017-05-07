# Bourbon-WP (aka Bourbon-Chef-Site-2.5)
> This branch refines the README documentation: It will outline deployment specific details, links to remember, and WordPress settings to implement from the local development environment to a remote hosted site.

> **TOO SAD!** I can't believe LuckyPeach.com is done May 1.  And just as heart-breaking is the last publication occurs this fall.

## **TODO**
- Create a bookmarks page template to display my bookmarks as links
- Add animation:  start with [Animate.css](https://github.com/daneden/animate.css)  

### 1. SITEMAP
1. ***primary*** < LOGO _(home)_ >< CULINARIA >< PROJECTS >< CODING >< ABOUT >< CONTACTS >  
2. ***alt main*** < HOME >< CULINARIA >< PROJECTS >< CODING >< ABOUT >< CONTACTS >  

### 2. DEPLOYMENT TO SURFING-CHEF.COM
- install [Remote-FTP](https://atom.io/packages/remote-ftp) into Atom for ease of use. [Tutorial reminder](https://www.youtube.com/watch?v=YmSD2O85wx0)   
- [Filezilla](https://filezilla-project.org/)  

### 2.1 New Pages
- Create the following pages after deleting existing versions:
  - Culinaria > Template: Categorized Page    
  - Coding > Template: Categorized Page    
  - Projects  > Template: Categorized Page   
  - About > Template: Categorized Page    
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
- Drag and drop the default WP *text widget* to the *Culinaria Feeds* widget area: *Dashboard > Appearance > Widgets* and set the title
- Copy and paste *html* and *PHP* into _**Culinary Feeds > text widget**_ from [Culinaria Feed Gallery](https://gist.github.com/Surfing-Chef/3db8facc6c6807e5ffa23d79735c35df#file-culinaria-feed-gallery)  

### 2.4. WORDPRESS WIDGETS THAT BOURBON-WP USES
- [Simple Image Sizes](https://en-ca.wordpress.org/plugins/simple-image-sizes/): (1) Install and activate. (2)  Navigate to `Settings > Media`. (3) Create, modify or reference image sizes. (4) Click `**Regenerate Thumbnails**` to ensure changes.  Se the link below for a great guide to saetting up feature images in WordPress.  
- [Formidable Forms](https://en-ca.wordpress.org/plugins/planso-forms/) plug-in to create contact form and PHP shortcode to place directly into php page templates or shortcode for WordPress pages or posts.  
  - Created contact form using the template offered, used only 5 generated fields plus submit button
    - Refined the auto-generated *classes*: navigate to Settings tab: Form Settings > Customize HTML  
      - **Name** - replaced non-braced classes with _contact-name_  
      - **Email** - cleared default and added class _contact-email_
      - **Subject** - cleared default and added class _contact-subject_
      - **Message** - cleared default and added class _contact-message_  
      - **Captcha** - cleared default and added class _contact-captcha_  
      - **Aftyer Fields** - blank
      - **Submit** - cleared default and added class _contact-submit_  
  - Used the shortcode generated by the plugin from the Build tab: top-right corner "Form Shortcodes" ***show***
  - Use Formidable styling: in the created Contact Form, navigate to Settings tab: General > Styling & Buttons > Style Template: select _Formidable Style(default)_

### 3. TIPS TRICKS AND LINKS

#### LOCAL EMAIL TESTING
- [Test Mail Server Tool](http://www.toolheap.com/test-mail-server-tool/): Small application to test email settings during development on a local machine  

#### PHP
+ [Auto-Update (cronjob) on a local Windows machine](http://www.businesslegions.com/blog/2014/08/09/create-cron-jobs-wamp/)
  - remember to change directories in the batch file to the folder containing the php file **(9)** to run **before** running the actual php command **(10)**:  
  ```type
    9   cd C:\wamp64\www\Bourbon-WP\wp-content\themes\bourbon-wp\bot
    10  php -f feeds.php
  ```  

#### WORDPRESS REFERENCE LINKS
- [Wpmudev.org - Theme Guide](https://premium.wpmudev.org/blog/free-wordpress-themes-ultimate-guide/?utm_expid=3606929-97.J2zL7V7mQbSNQDPrXwvBgQ.0): The lowdown on wordpress themes.  
- [WordPress.org on The Loop](https://developer.wordpress.org/reference/classes/wp_query/): A great resource for altering The Loop.  
- [Simplified Custom Menus](https://premium.wpmudev.org/blog/add-menus-to-wordpress/?utm_expid=3606929-97.J2zL7V7mQbSNQDPrXwvBgQ.0&utm_referrer=https%3A%2F%2Fwww.google.ca%2F): How to add More Navigation Menus to a WordPress Theme   
- [WordPress.org on post navigation](https://developer.wordpress.org/reference/functions/the_post_navigation/) and [here](https://developer.wordpress.org/reference/functions/get_the_post_navigation/): References for customized post navigation  
- [Easy Custom Widget Areas](https://buckleupstudios.com/add-a-new-widget-area-to-a-wordpress-theme/), [Creating Custom Widgets](https://premium.wpmudev.org/blog/create-custom-wordpress-widget), [More on Custom Widgets](https://www.templatemonster.com/blog/add-widget-areas-to-wordpress-guide/): Three useful links about custom widget implementation  
- [Recent Posts](https://codex.wordpress.org/Function_Reference/wp_get_recent_posts): Retrieve the most recent post     
- [Categories](https://developer.wordpress.org/reference/functions/wp_list_categories/): Display or retrieve the HTML list of categories
- [WordPress.org on arbitrary widgets](https://codex.wordpress.org/Function_Reference/the_widget): References for displaying widgets outside of a sidebar  
- [Responsive Feature Images](https://www.lynda.com/articles/create-responsive-featured-images-wordpress): Great article about WordPress responsive images  
- [Reminder about .gitignore reset](http://blog.jonathanchannon.com/2012/11/18/gitignore-not-working-fixed/): Sometimes .gitignore isn't working properly.  Here's a fix that usually works.   
- [PHP in WordPress default Text Widget](http://www.emanueleferonato.com/2011/04/11/executing-php-inside-a-wordpress-widget-without-any-plugin/): Without plugin, run PHP in a standard Text Widget with this function  

### 4. BOURBON CHEF TO DO's  
[PROJECT](https://www.lynda.com/PHP-tutorials/WordPress-Creating-Custom-Plugins-PHP/508212-2.html): Culinaria Feeds  
