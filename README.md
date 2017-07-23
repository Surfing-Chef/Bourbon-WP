# **Bourbon-WP** #
[![GitHub version](https://badge.fury.io/gh/surfing-chef%2Fbourbon-wp.svg)](https://badge.fury.io/gh/surfing-chef%2Fbourbon-wp) v2.7.2

## **CHANGELOG** ##
### **2.6 - Restructured Development Files** ###   
Better organized build, process, development and production structure
  - [x] 2.6.1a migrate structure and files
  - [x] 2.6.2a implement new package.json and gulpfile.js (dev)
  - [x] 2.6.3a implement new gulpfile.js (prod)
  - [x] 2.6.3a move culinary plugin to projects

### **2.7 - Improve Theme's Backend Workflow** ###   
Implement a custom settings and options page as well as installing and implementing the Advanced Custom Fields Pro plugin
- [x] 2.7.1a Create a Custom Settings and Options Page
  - [x] @ ./inc/function-admin.php
  - [Custom Pages, Subpages, Custom Options and the WordPress Settings API](https://www.youtube.com/playlist?list=PLriKzYyLb28kpEnFFi9_vJWPf5-_7d3rX)
  - [x] Add Google Map API to WordPress database via Settings API
- [x] 2.7.2a Implement [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/) plugin
  - [x] display links using ACF repeater field
  - [x] display map using ACF Google Map field
  - [Lynda.com Advanced Custom Fields](https://www.lynda.com/WordPress-tutorials/Welcome/169877/183109-4.html)
  - ACF implemetation instructions for the API can be found [here](https://www.advancedcustomfields.com/resources/google-map/)
  - Use of the Google Maps Field requires a [Google Maps JavaScript API](https://developers.google.com/maps/documentation/javascript/get-api-key)
- [ ] Style and layout ACF *post_links* and *post_map* with SCSS
- [ ] Refine Custom Settings and Options Page

### **2.8 - "Bundle" Theme Dependencies** ###
When a user installs Bourbon-WP, the theme should be packaged with all its plugins, dependencies and installation instructions


### **Projects** ###   
Ideas or thoughts that might be projects for a rainy days...
- [ ] Create a bookmarks widget or page template for chrome bookmarks
- [ ] Learn Webpack and convert gulp workflow
- [ ] Learn React


## TIPS TRICKS AND LINKS ##

### CDN ###
[JSDeliver](http://www.jsdelivr.com/?query=anima): a fast reliable cdn script provider.  

### GIT ###
- [Reminder about .gitignore reset](http://blog.jonathanchannon.com/2012/11/18/gitignore-not-working-fixed/): Sometimes .gitignore isn't working properly.  Here's a fix that usually works.   

### LOCAL EMAIL TESTING ###
- [Test Mail Server Tool](http://www.toolheap.com/test-mail-server-tool/): Small application to test email settings during development on a local machine  

### PHP ###
+ [Auto-Update (cronjob) on a local Windows machine](http://www.businesslegions.com/blog/2014/08/09/create-cron-jobs-wamp/)
  - remember to change directories in the batch file to the folder containing the php file **(9)** to run **before** running the actual php command **(10)**:  
  ```type
    9   cd C:\wamp64\www\Bourbon-WP\wp-content\themes\bourbon-wp\bot
    10  php -f feeds.php
  ```  

### CSS ANIMATION ###
[YouTube Tut on CSS Animation](https://www.youtube.com/watch?v=CBQGl6zokMs): on simple css and jquery implementation on animate.css  
[Animating the moments](https://www.youtube.com/watch?v=GeuNIOuIEDA): DevTips on the Whys of animation  


### THEME PLUGINS ###
- [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/): A better user interface for adding custom fields, or meta data, to WordPress
  - [Documentation](https://www.advancedcustomfields.com/resources/)  
  - [Code Examples](https://www.advancedcustomfields.com/resources/code-examples/)
  - [Lynda.com Tutorial](https://www.lynda.com/WordPress-tutorials/Welcome/169877/183109-4.html)

### WORDPRESS REFERENCE LINKS ###
- [WordPress Developer Resources](https://developer.wordpress.org/)
- [WordPress Codex](https://codex.wordpress.org/)
- [Wpmudev.org - Theme Guide](https://premium.wpmudev.org/blog/free-wordpress-themes-ultimate-guide/?utm_expid=3606929-97.J2zL7V7mQbSNQDPrXwvBgQ.0): The lowdown on wordpress themes.  
- [WordPress.org on The Loop](https://developer.wordpress.org/reference/classes/wp_query/): A great resource for altering The Loop.  
- [Simplified Custom Menus](https://premium.wpmudev.org/blog/add-menus-to-wordpress/?utm_expid=3606929-97.J2zL7V7mQbSNQDPrXwvBgQ.0&utm_referrer=https%3A%2F%2Fwww.google.ca%2F): How to add More Navigation Menus to a WordPress Theme   
- [WordPress.org on post navigation](https://developer.wordpress.org/reference/functions/the_post_navigation/) and [here](https://developer.wordpress.org/reference/functions/get_the_post_navigation/): References for customized post navigation  
- [Easy Custom Widget Areas](https://buckleupstudios.com/add-a-new-widget-area-to-a-wordpress-theme/), [Creating Custom Widgets](https://premium.wpmudev.org/blog/create-custom-wordpress-widget), [More on Custom Widgets](https://www.templatemonster.com/blog/add-widget-areas-to-wordpress-guide/): Three useful links about custom widget implementation  
- [Recent Posts](https://codex.wordpress.org/Function_Reference/wp_get_recent_posts): Retrieve the most recent post     
- [Categories](https://developer.wordpress.org/reference/functions/wp_list_categories/): Display or retrieve the HTML list of categories
- [WordPress.org on arbitrary widgets](https://codex.wordpress.org/Function_Reference/the_widget): References for displaying widgets outside of a sidebar  
- [Responsive Feature Images](https://www.lynda.com/articles/create-responsive-featured-images-wordpress): Great article about WordPress responsive images  
- [PHP in WordPress default Text Widget](http://www.emanueleferonato.com/2011/04/11/executing-php-inside-a-wordpress-widget-without-any-plugin/): Without plugin, run PHP in a standard Text Widget with this function  
- [Comments: *comment-form()*](https://codex.wordpress.org/Function_Reference/comment_form#.24args) and [*wp_list_comments()*](https://codex.wordpress.org/Function_Reference/wp_list_comments): useful links to formatting comment content    
- [Adding tweets to posts](https://en.support.wordpress.com/twitter/twitter-embeds/): super simple  
- [Excerpt From: How to create a Premium WordPress Theme](https://www.youtube.com/watch?v=ViZLtFIcSfo&list=PLriKzYyLb28kpEnFFi9_vJWPf5-_7d3rX)  
- [Understanding and Working with The WordPress Options Table](https://code.tutsplus.com/tutorials/understanding-and-working-with-the-wordpress-options-table--cms-21119)  
- [How to Create a Settings Page in WordPress](https://www.youtube.com/watch?v=B-tvZAC-eik)
- [How to Make a WordPress Admin Options Page (Without Using the Settings API)](https://wpshout.com/wordpress-options-page/)
