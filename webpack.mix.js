const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

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
    .js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [
            tailwindcss('./tailwind.js')
        ]
    })
    .sourceMaps()
    .disableNotifications();

if (mix.inProduction()) {
    mix.version()

    mix.extract([
        'vue',
        'vuex',
        'axios',
        'moment',
        '@fortawesome/fontawesome',
        '@fortawesome/vue-fontawesome',
        "@fortawesome/fontawesome-free-brands",
        "@fortawesome/fontawesome-pro-light",
        "@fortawesome/fontawesome-pro-regular",
        "@fortawesome/fontawesome-pro-solid"
    ]);
}

mix.webpackConfig({
    devServer: {
        contentBase: path.resolve(__dirname, 'public'),
    },
    plugins: [
    ],
    resolve: {
        alias: {
            '~': path.join(__dirname, './resources/assets/js')
        }
    }
})