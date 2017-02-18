#Bourbon-WP (aka Bourbon-Chef-Site-2.0)

##1. INITIALIZE
###a. Fresh WordPress install  
###b. Import [Test Data](http://wptest.io/). ([GitHub link](https://github.com/poststatus))  

##2. TESTED 3 STARTER/BLANK THEMES  

###a. [Bones](http://themble.com/bones/) starter theme. ([GitHub link](https://github.com/eddiemachado/bones))  
No need for test as it is an out of the box theme.  It has no frontend development packages or dependencies.  It's syntax, markup and symantic layout will be something I will surely reference.

###b. [HTML5 Blank](http://html5blank.com/) starter theme. ([GitHub link](https://github.com/toddmotto/html5blank))  
Easy to follow set up instructions. Note the following...   

####Issue:
Livereload not working.  

####Solution:  
Inserted the following snippet just before the closing body tag in footer.php in the theme root:  `<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>`


###c. [Some-like-it-neat](https://github.com/digisavvy/some-like-it-neat)  
Easy to follow set up instructions. Note the following...  

####Issue:  
```console
module.js:471
    throw err;
    ^

Error: Cannot find module 'jshint/src/cli'
    at Function.Module._resolveFilename (module.js:469:15)
    at Function.Module._load (module.js:417:25)
    at Module.require (module.js:497:17)
    at require (internal/module.js:20:19)
    at Object.<anonymous> (C:\wamp64\www\Bourbon-WP\wp-content\themes\some-like-it-neat\node_modules\gulp-jshint\src\extract.js:1:79)
    at Module._compile (module.js:570:32)
    at Object.Module._extensions..js (module.js:579:10)
    at Module.load (module.js:487:32)
    at tryModuleLoad (module.js:446:12)
    at Function.Module._load (module.js:438:3)
```
####Solution:  
Updated package.json. `npm install --save-dev jshint gulp-jshint`

####Issue:  
BrowserSync working ([thanks for the 3001 test (issue #65)](https://github.com/digisavvy/some-like-it-neat/issues/65)) but page not loading.  
####Solution:  
Ensured both the `var project` and `var url` were correct, and the same in my case.  Maybe an issue with running WAMP?  

###3. Bourbon-Chef-Site Implementation
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
    + Added the class _nav-menu_ to each item (click **Screen Options** tab at top of screen to show the **CSS Classes** option)
  + Selected _Landing Menu_ and _The Main Menu_ under **Menu Settings**
  + Installed [Menu Image](https://wordpress.org/plugins/menu-image/)
  + Uploaded a logo to WordPress and used it as image on _logo_ menu item
  + Added a dark, transparent background to navigation
  + Added the following script just after _TweenMax_ CDN loads in footer of _landing.php_ and just before `<?php wp_footer(); ?>` in _footer.php_:  
  ```html5blank
  <script>var templateDir = "<?php bloginfo('template_directory') ?>";</script>
  ```
    + This allows darksky.js and apifier.js to dynamically access the template directory path.
- scss-style layout parts:
  - header
    - navigation
    - parallax
  - main content
  - footer

  ####Notes and Links
  - [link](https://wordimpress.com/adding-custom-classes-to-wordpress-wp_nav_menu/)
