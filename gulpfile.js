const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

require('laravel-elixir-webpack-official');
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
var paths = {   
    'jquery': './resources/assets/bower_components/jquery/',   
    'bootstrapvalidator': './resources/assets/bower_components/bootstrap-validator/',
    'bootstrap': './resources/assets/bower_components/bootstrap-sass-official/assets/'
}
elixir(mix => {
    mix.sass('app.scss')
       .webpack('app.js')
       .scripts([
            paths.jquery + "dist/jquery.js",
            paths.jquery + "dist/jquery.infiniteScroll.js",
            paths.bootstrap + "javascripts/bootstrap.js",
            paths.bootstrapvalidator + "dist/validator.js",
        ], 'public/js/all.js');
});
