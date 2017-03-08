const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
var bower_assets = "resources/assets/bower/"
var app_css = [
  //bower_assets + "materialize/dist/css/materialize.css",
  bower_assets + "bootstrap/dist/css/bootstrap.css",
  "public/css/app.css",
];

var app_js = [
  bower_assets + "jquery/dist/jquery.js",
  bower_assets + "bootstrap/dist/js/bootstrap.js",
  "public/js/app.js",
];

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .combine(app_css,'public/css/vendor.css')
   .combine(app_js,'public/js/vendor.js');
