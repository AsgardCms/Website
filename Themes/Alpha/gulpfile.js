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
    themeInfo = require('./theme.json');

// Sass
var sass_path = './resources/scss/**/*.scss',
    vendor = './resources/vendor';
gulp.task('sass', function () {
    gulp.src('./resources/scss/*.scss')
        .pipe(sass())
        .pipe(notify({
            'title': 'Css',
            'message': 'Sass compiled'
        }))
        .pipe(gulp.dest('./assets/css'))
        .pipe(minifyCSS({keepBreaks: false}))
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
        vendor + '/prism/prism.css',
        vendor + '/prism/prism-dark.css',
        vendor + '/skel/dist/skel.css',
        './assets/css/dist/main.min.css'
    ])
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
        vendor + '/jquery.scrollwatch/jquery.scrollwatch.min.js',
        vendor + '/bxslider-4/dist/jquery.bxslider.min.js',
        vendor + '/jquery.scrollTo/jquery.scrollTo.min.js',
        vendor + '/jquery.localScroll/jquery.localScroll.min.js',
        vendor + '/scrollgress/build/scrollgress.min.js',
        vendor + '/lodash/dist/lodash.min.js',
        vendor + '/prism/prism.js',
        vendor + '/skel/dist/skel.min.js',
        './resources/js/vendor/jquery.dropotron.min.js',
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
        .pipe(gulp.dest('./assets/css/fonts'));
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

gulp.task('default', ['concat-css', 'watch-sass', 'watch-js', 'stylist']);
gulp.task('compile', ['sass', 'concat-css', 'scripts', 'stylist']);
