'use strict';
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    notify = require('gulp-notify'),
    minifyCSS = require('gulp-minify-css'),
    rename = require("gulp-rename"),
    uglify = require('gulp-uglify'),
    shell = require('gulp-shell'),
    concat = require('gulp-concat'),
    copy = require('gulp-copy'),
    cache = require('gulp-cache'),
    imagemin = require('gulp-imagemin'),
    themeInfo = require('./theme.json');

// Sass
var sass_path = './resources/sass/**/*.scss',
    vendor = './resources/vendor';
gulp.task('sass', function () {
    gulp.src('./resources/sass/*.scss')
        .pipe(sass())
        .pipe(notify({
            'title': 'Css',
            'message': 'Sass compiled'
        }))
        .pipe(gulp.dest('./assets/css'))
        .pipe(minifyCSS())
        .pipe(rename(function (path) {
            path.basename += ".min";
            path.extname = ".css"
        }))
        .pipe(gulp.dest('./assets/css/dist/'))
        .pipe(notify({
            'title': 'Css',
            'message': 'Css Minified!'
        }));
});
gulp.task('concat-css', ['sass'], function () {
    return gulp.src([
        vendor + '/font-awesome/css/font-awesome.min.css',
        vendor + '/bxslider-4/dist/jquery.bxslider.css',
        './resources/css/vendor/prism.css',
        vendor + '/skel/dist/skel.css',
        './assets/css/dist/main.min.css'
    ])
        .pipe(minifyCSS())
        .pipe(concat('all.min.css'))
        .pipe(gulp.dest('./assets/css/dist/'))
        .pipe(shell("php ../../artisan stylist:publish " + themeInfo.name))
        .pipe(notify({
            'title': 'Css',
            'message': 'Css files concatenated'
        }));
});

// Javascript
var js_path = './resources/js/*.js';
gulp.task('scripts', function() {
    return gulp.src([
        vendor + '/jquery/dist/jquery.js',
        vendor + '/jquery.scrollTo/jquery.scrollTo.min.js',
        vendor + '/jquery.localScroll/jquery.localScroll.min.js',
        './resources/js/vendor/jquery.bxslider.min.js',
        //'./resources/js/vendor/jquery.dropotron.min.js',
        './resources/js/vendor/jquery.scrollgress.min.js',
        './resources/js/vendor/prism.js',
        //vendor + '/lodash/dist/lodash.min.js',
        vendor + '/skel/dist/skel.min.js',
        './resources/js/vendor/skel-layers.min.js',
        './resources/js/*.js'
    ])
        .pipe(uglify())
        .pipe(concat('all.min.js'))
        .pipe(gulp.dest('./assets/js/dist'))
        .pipe(shell("php ../../artisan stylist:publish " + themeInfo.name))
        .pipe(notify({
            'title' : 'Scripts',
            'message' : 'Js combined and minified'
        }));
});

// Copy
gulp.task('copies', function() {
    return gulp.src('./resources/vendor/font-awesome/fonts/**/*')
        .pipe(gulp.dest('./assets/fonts'));
});

// Images
gulp.task('images', function(){
    gulp.src('./resources/images/**/*')
        .pipe(cache(imagemin({ optimizationLevel: 6, progressive: true, interlaced: true })))
        .pipe(gulp.dest('./assets/images/'));
});

// Publish all assets
gulp.task('stylist', ['copies', 'scripts', 'sass', 'concat-css'], shell.task([
    "php ../../artisan stylist:publish " + themeInfo.name
]))

// File watchers
gulp.task('watch-sass', function () {
    gulp.watch(sass_path, ['sass', 'concat-css']);
});
gulp.task('watch-js', function() {
    gulp.watch(js_path, ['scripts']);
});

gulp.task('default', ['concat-css', 'watch-sass', 'watch-js', 'images', 'stylist']);
gulp.task('compile', ['sass', 'concat-css', 'scripts', 'stylist']);
