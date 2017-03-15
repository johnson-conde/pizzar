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
var bowerAssets = "resources/assets/bower/"
var adminAssets = "resources/assets/admin/"
var appCss = [
  //bowerAssets + "materialize/dist/css/materialize.css",
  bowerAssets + "bootstrap/dist/css/bootstrap.css",
  "public/css/app.css",
];

var appJs = [
    bowerAssets + "jquery/dist/jquery.js",
    bowerAssets + "bootstrap/dist/js/bootstrap.js",
    "public/js/app.js",
];

var adminCss =[
    adminAssets + "css/bootstrap.min.css",
    adminAssets + "css/font-awesome.min.css",
    adminAssets + "css/main.css",
    adminAssets + "css/my-custom-styles.css",
];

var adminJs = [
   adminAssets + "js/jquery/jquery-2.1.0.min.js",
   adminAssets + "js/bootstrap/bootstrap.js",
   adminAssets + "js/plugins/modernizr/modernizr.js",
   adminAssets + "js/plugins/bootstrap-tour/bootstrap-tour.custom.js",
   adminAssets + "js/plugins/jquery-slimscroll/jquery.slimscroll.min.js",
   adminAssets + "js/king-common.js",
   adminAssets + "demo-style-switcher/assets/js/deliswitch.js",
   adminAssets + "js/plugins/stat/jquery.easypiechart.min.js",
   adminAssets + "js/plugins/raphael/raphael-2.1.0.min.js",
   adminAssets + "js/plugins/stat/flot/jquery.flot.min.js",
   adminAssets + "js/plugins/stat/flot/jquery.flot.resize.min.js",
   adminAssets + "js/plugins/stat/flot/jquery.flot.time.min.js",
   adminAssets + "js/plugins/stat/flot/jquery.flot.pie.min.js",
   adminAssets + "js/plugins/stat/flot/jquery.flot.tooltip.min.js",
   adminAssets + "js/plugins/jquery-sparkline/jquery.sparkline.min.js",
   adminAssets + "js/plugins/datatable/jquery.dataTables.min.js",
   adminAssets + "js/plugins/datatable/dataTables.bootstrap.js",
   adminAssets + "js/plugins/jquery-mapael/jquery.mapael.js",
   adminAssets + "js/plugins/raphael/maps/usa_states.js",
   adminAssets + "js/king-chart-stat.js",
   adminAssets + "js/king-table.js",
   adminAssets + "js/king-components.js"
 ];

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .combine(appCss,'public/css/vendor.css')
   .combine(appJs,'public/js/vendor.js')
   .combine(adminCss,'public/css/admin.css')
   .combine(adminJs,'public/js/admin.js')
   .copy(adminAssets + 'fonts','public/fonts', true)
   .copy(adminAssets + 'img','public/img', true)
   .copy(adminAssets + 'ico','public/ico', true);
