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

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');

mix.copy('resources/assets/admin/img', 'public/assets/admin/img');
mix.copy('resources/assets/admin/vendors', 'public/assets/admin/vendors');
mix.copy('resources/assets/admin/css/theme.css', 'public/assets/admin/css/theme.css');
mix.copy('resources/assets/admin/css/theme-rtl.css', 'public/assets/admin/css/theme-rtl.css');
mix.copy('resources/assets/admin/css/user.css', 'public/assets/admin/css/user.css');
mix.copy('resources/assets/admin/css/user-rtl.css', 'public/assets/admin/css/user-rtl.css');
mix.copy('resources/assets/admin/js/config.js', 'public/assets/admin/js/config.js');
mix.copy('resources/assets/admin/js/flatpickr.js', 'public/assets/admin/js/flatpickr.js');

mix.scripts([
    // 'resources/assets/admin/js/config.js',
    // 'resources/assets/admin/js/echart-example.js',
    // 'resources/assets/admin/js/echarts-example.js',
    // 'resources/assets/admin/js/emoji-button.js',
    // 'resources/assets/admin/js/flatpickr.js',
    'resources/assets/admin/js/theme.js',
], 'public/assets/admin/js/admin.js');
