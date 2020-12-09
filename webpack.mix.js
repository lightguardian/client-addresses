const mix = require('laravel-mix');

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

mix
    .js('resources/js/app.js', 'public/assets/js/util.js')
    .sass('resources/sass/app.scss', 'public/assets/css/style.css')

    /*
    INSTALACAO DO BOOTSTRAP E JQUERY
    .sass('node_modules/bootstrap/scss/bootstrap.scss','public/assets/css/bootstrap.css')
    .scripts('node_modules/jquery/dist/jquery.js','public/assets/js/jquery.js')
    .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js','public/assets/js/bootstrap.js')
    */
