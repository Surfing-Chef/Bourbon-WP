// REQUIRED
var gulp        = require('gulp'),
    sass        = require('gulp-sass'),
    browserSync = require('browser-sync').create(),
    uglify = require('gulp-uglify'),
    plumber = require('gulp-plumber'),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps  = require('gulp-sourcemaps'),
    concat = require('gulp-concat'),
    del = require('del'),
    rename = require('gulp-rename'),
    babel = require('gulp-babel'),
    imagemin = require('gulp-imagemin');

// DEVELOPMENT TASKS
// Scripts Task - tasks related to js
gulp.task('scripts', function(){
  gulp.src(['process/js/**/*.js',
            '!process/js/customizer.js',
            '!process/js/jquery.viewportchecker.min.js',
            '!process/js/navigation.js',
            '!process/js/skip-link-focus-fix.js'
          ])
  .pipe(plumber())
  .pipe(babel({
            presets: ['es2015']
        }))
  .pipe(concat('scripts.js'))
  .pipe(gulp.dest('./js'))
  .pipe(browserSync.stream());

  gulp.src(['process/js/customizer.js',
            'process/js/jquery.viewportchecker.min.js',
            'process/js/navigation.js',
            'process/js/skip-link-focus-fix.js'
          ])
  .pipe(plumber())
  .pipe(babel({
            presets: ['es2015']
        }))
  .pipe(gulp.dest('./js'))
  .pipe(browserSync.stream());
});


// Sass Task - development css - nested/readable/mapped
gulp.task('sassDev', function() {
  gulp.src('process/sass/**/*.scss')
  .pipe(plumber())
  .pipe(sourcemaps.init())
    .pipe(sass({sourceComments: 'map', sourceMap: 'sass', outputStyle: 'expanded'}))
    .pipe(autoprefixer('last 2 versions'))
  .pipe(sourcemaps.write())
  .pipe(gulp.dest('./'))

  .pipe(browserSync.stream());
});

// Server Task - Asynchronous browser syncing of assets across multiple devices
gulp.task('serve', function(){
  browserSync.init({
    proxy   : "http://localhost/bourbon-wp" // update this path to project root
  });

  gulp.watch('process/js/**/*.js', ['scripts']);
  gulp.watch('process/sass/**/*.scss', ['sassDev']);
  gulp.watch('**/*.html').on('change', browserSync.reload);
  gulp.watch('**/*.php').on('change', browserSync.reload);
});

// Default Task
gulp.task('default', ['serve']);


// PRODUCTIONS TASKS
// delete previous production build
gulp.task('prod:cleanfolder', function(){
  return del([
    'build/**/*'
  ]);
});

// minimize images
gulp.task('prod:imgMin', ['prod:cleanfolder'], function(){
    return gulp.src('./img/**/*')
        .pipe(imagemin())
        .pipe(gulp.dest('build/img'));
});

// minify css
gulp.task('prod:sass', ['prod:cleanfolder'], function() {
  gulp.src('process/sass/style.scss')
  .pipe(plumber())
  .pipe(sass({outputStyle: 'compressed'}))
  .pipe(gulp.dest('build/'));
});

// uglify and mangle js
gulp.task('prod:scripts', ['prod:sass'], function(){
  gulp.src([
            './js/**/*.js',
            '!./js/customizer.js',
            '!./js/jquery.viewportchecker.min.js',
            '!./js/navigation.js',
            '!./js/skip-link-focus-fix.js'
          ])
  .pipe(plumber())
  .pipe(concat('scripts.js'))
  .pipe(uglify())
  .pipe(gulp.dest('build/js'));

  gulp.src([
            './js/customizer.js',
            './js/jquery.viewportchecker.min.js',
            './js/navigation.js',
            './js/skip-link-focus-fix.js'
          ])
  .pipe(plumber())
  .pipe(gulp.dest('build/js'));

});

// copy development files not requiring processing
gulp.task('prod:copy', ['prod:imgMin'], function(){
  return gulp.src([
                  './**/*/',
                  '!./build{,/**}',
                  '!./js{,/**}',
                  '!./img{,/**}',
                  '!./node_modules{,/**}',
                  '!./process{,/**}',
                  '!./src{,/**}',
                  '!./.*',
                  '!./gulpfile.js',
                  '!./package.json',
                  '!./package-lock.json',
                  '!./README.md',
                  '!./style.css',
                  '!./cron.bat'
                ])
  .pipe(gulp.dest('./build'));
});

// main build task
gulp.task('build', ['prod:cleanfolder', 'prod:imgMin', 'prod:sass', 'prod:scripts', 'prod:copy']);
