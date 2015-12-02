var gulp = require("gulp");
var shell = require('gulp-shell');
var elixir = require('laravel-elixir');
var themeInfo = require('./theme.json');

var task = elixir.Task;
elixir.extend("stylistPublish", function() {
    new task("stylistPublish", function() {
        return gulp.src("").pipe(shell("php ../../artisan stylist:publish " + themeInfo.name));
    }).watch("**/*.less");
});

elixir(function(mix) {
    mix.sass(['main.scss'], 'assets/css/asgard.css');
    mix.copy('resources/assets/js', 'assets/js').stylistPublish();
});
