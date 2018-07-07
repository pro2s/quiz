let mix = require('laravel-mix');

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

if (process.env.APP_DEBUG) {
    mix.webpackConfig({ devtool: "source-map" })
        .sourceMaps();;
}


mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/spa.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/spa.scss', 'public/css');
    