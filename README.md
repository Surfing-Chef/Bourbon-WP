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
+ changed _src/sass_ to  _src/scss_
+ copied _package.json_ and _gulpfile.js_ from Bourbon-Chef-Site
+ ensured the following files have paths appropriately adjusted (ie _library_ changed to _src_, _app_ changed to _src_, _sass_ changed to _scss_):  
  + gulpfile.js   
  + bones.js
  + all files in _src/js/_  
  + all files in _src/scss/_  

A bare, yet functioning theme is available in a browser at this point.

+ adjusted bones.php.   
From:
```php
// modernizr (without media query polyfill)
wp_register_script( 'bones-modernizr', '', array(), '2.5.3', false );

...


```

To:  
```php
// modernizr (without media query polyfill)
wp_register_script( 'bones-modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array(), '2.5.3', false );

...


```

- run `npm install` from within _bourbon-wp_ theme root
- copy _index.php_ from Bourbon-Chef-Site and rename it landing  
  - will use it as home page when site is appropriately converted into the WordPress structure
