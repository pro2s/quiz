const mix = require('laravel-mix');
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
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
mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.vue', '.json'],
        alias: {
            '@': __dirname + '/resources/js'
        },
    },
})

switch(process.env.NODE_ENV) {
    case 'development':
        mix.webpackConfig({
            devtool: "source-map",
        })
        .sourceMaps();
    break;
    case 'stats':
        mix.webpackConfig({
            plugins: [
                new BundleAnalyzerPlugin(),
            ],
        });
    break;
}

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/dashboard.scss', 'public/css');

mix.js('resources/js/spa.js', 'public/js')
    .sass('resources/sass/spa.scss', 'public/css');

mix.sass('resources/sass/vendor.scss', 'public/css');

mix.extract(['vue', 'axios']);