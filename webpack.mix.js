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

if (process.env.NODE_ENV === 'development') {
    mix.webpackConfig({ devtool: "source-map" })
        .sourceMaps();
}

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/dashboard.scss', 'public/css');

mix.js('resources/assets/js/spa.js', 'public/js')
    .sass('resources/assets/sass/spa.scss', 'public/css');

mix.sass('resources/assets/sass/vendor.scss', 'public/css');

mix.extract(['vue', 'axios']);