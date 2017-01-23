const elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass('app.scss')
       .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap','public/css/fonts')
       .copy('bower_components/bootstrap-theme-cirrus/dist/css','public/css/bootstrap-theme-cirrus')
       .copy('bower_components/sweetalert2/dist/sweetalert2.min.css','public/css')
       .scripts([
            '../../../bower_components/angular/angular.min.js',
            '../../../bower_components/jquery/jquery.min.js',
            '../../../bower_components/bootstrap/dist/js/bootstrap.min.js',
            '../../../bower_components/sweetalert2/dist/sweetalert2.min.js',
            'deleter.js',
            'app.js',
        ], 'public/js/app.js');
});
