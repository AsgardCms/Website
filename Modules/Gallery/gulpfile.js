var gulp = require('gulp');
var shell = require('gulp-shell');
var elixir = require('laravel-elixir');

var Task = elixir.Task;

elixir.extend('laroute', function(message) {
    new Task('laroute', function() {
        return gulp
            .src('')
            .pipe(shell('php ../../artisan laroute:generate'))
            .pipe(new elixir.Notification('Laroute generated!'));
    }).watch('Http/routes.php');
});


elixir(function(mix) {
    mix.laroute();

    //mix.browserify('main.js');
    //
    //mix.browserSync({
    //    proxy: 'asgardcms.app',
    //    open: false
    //});
});
