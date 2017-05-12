// REQUIRED
var gulp        = require('gulp'),
    sass        = require('gulp-sass'),
    browserSync = require('browser-sync').create(),
    uglify = require('gulp-uglify'),
    cleanCSS = require('gulp-clean-css'),
    plumber = require('gulp-plumber'),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps  = require('gulp-sourcemaps'),
    concat = require('gulp-concat'),
    del = require('del'),
    rename = require('gulp-rename'),
    imagemin = require('gulp-imagemin');

// DEVELOPMENT TASKS
//////// Tasks used in development environment ////////
// Scripts Task - tasks related to js
gulp.task('scripts', function(){
  gulp.src(['src/js/**/*.js', '!src/js/**/*min.js'])
  .pipe(plumber())
  .pipe(concat('script.min.js'))
  .pipe(gulp.dest('src/js'))
  .pipe(uglify())
  .pipe(gulp.dest('src/js'))
  .pipe(browserSync.stream());
});

// Sass Task - development css - nested/readable/mapped
gulp.task('sassDev', function() {
  gulp.src('src/scss/**/*.scss')
  .pipe(plumber())
  .pipe(sourcemaps.init())
    .pipe(sass({sourceComments: 'map', sourceMap: 'sass', outputStyle: 'expanded'}))
    .pipe(autoprefixer('last 2 versions'))
  .pipe(sourcemaps.write())
  .pipe(gulp.dest('src/css/'))
  .pipe(sass({sourceComments: 'map', sourceMap: 'sass', outputStyle: 'compressed'}))
  .pipe(gulp.dest('./'))
  .pipe(browserSync.stream());
});

// Sass Task - deployment css - nested/readable/mapped
gulp.task('sassDep', ['sassDev'], function() {
  gulp.src('./style.css')
  .pipe(plumber())
    .pipe(cleanCSS())
    .pipe(rename({suffix: '.min'}))
    .pipe(autoprefixer('last 2 versions'))
  .pipe(gulp.dest('./'))
  .pipe(browserSync.stream());
});


// Server Task - Asynchronous browser syncing of assets across multiple devices
gulp.task('serve', function(){
  browserSync.init({
    proxy   : "http://localhost/bourbon-wp"
  });

  gulp.watch('src/js/**/*.js', ['scripts']);
  gulp.watch('src/scss/**/*.scss', ['sassDev']);
  gulp.watch('src/scss/**/*.scss', ['sassDep']);
  gulp.watch('**/*.html').on('change', browserSync.reload);
  gulp.watch('**/*.php').on('change', browserSync.reload);
});

// Default Task
gulp.task('default', ['serve']);

////////////////////////////////////////////////////////
// DEPLOYMENT TASKS
//////// Tasks used to build deployment package ////////
gulp.task('build:cleanfolder', function(){
  return del([
    './bourbon-wp/**/*'
  ]);
});

// create build directory for all theme deployment files
gulp.task('build:copy', ['build:cleanfolder'], function(){
  return gulp.src([
                  './**/*/',
                  '!./src/images/**/*',
                  '!./bourbon-wp',
                  '!./cron.bat',
                  '!./src/scss/**/*',
                  '!./src/css/**/*',
                  '!./README.md',
                  '!./tester*',
                  '!./rtl.css',
                  '!./style.css',
                  '!./package.json',
                  '!./.ftpconfig'
                ])
  .pipe(gulp.dest('./bourbon-wp/'));
});

// minimize images in deployment directory
gulp.task('build:imgMin', ['build:copy'], function(){
    return gulp.src('./src/images/**/*')
        .pipe(imagemin())
        .pipe(gulp.dest('./bourbon-wp/src/images'));
});

// remove unwanted build files and directories
gulp.task('build:remove', ['build:imgMin'], function(done){
  return del([  // list files and directories to delete
    './bourbon-wp/gulpfile.js',
    './bourbon-wp/.git*',
    './bourbon-wp/node_modules',
    './bourbon-wp/src/scss',
    './bourbon-wp/src/css',
    './bourbon-wp/src/js/**/*',
    '!./bourbon-wp/src/js/script.min.js'
  ], done);
});

// main build task
gulp.task('build', ['build:cleanfolder', 'build:copy', 'build:imgMin', 'build:remove']);
