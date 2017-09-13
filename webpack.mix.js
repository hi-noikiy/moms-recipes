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

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .browserSync('moms-recipes.app')
    .extract([
        'jquery',
        'axios',
        'vue',
        'lodash',
      ])
      .autoload({
        jquery: ['$', 'window.jQuery', 'jQuery'],
        lodash: ['_', 'window._'],
        vue: ['Vue', 'window.Vue'],
        axios: ['axios', 'window.axios'],
      })
      .disableNotifications();

if (mix.inProduction()) {
    mix.version();
}


