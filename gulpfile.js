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
    mix
        .sass([
            'app.scss',
            '../../../bower_components/sweetalert2/src/sweetalert2.scss',
            '../../../bower_components/angular-material/angular-material.scss',
        ])
        .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap','public/css/fonts')
        .copy('bower_components/bootstrap-theme-cirrus/dist/css','public/css/bootstrap-theme-cirrus')
        .scripts([
            '../../../bower_components/angular/angular.min.js',
            '../../../bower_components/jquery/jquery.min.js',
            '../../../bower_components/bootstrap/dist/js/bootstrap.min.js',
            '../../../bower_components/angular-aria/angular-aria.min.js',
            '../../../bower_components/angular-animate/angular-animate.min.js',
            '../../../bower_components/angular-material/angular-material.min.js',
            '../../../bower_components/sweetalert2/dist/sweetalert2.min.js',
            'app.js',
            'deleter.js',
            '*',
        ], 'public/js/app.js');
});
