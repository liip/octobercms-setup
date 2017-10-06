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

mix.setResourceRoot('/themes/liip/assets/');
mix.setPublicPath('themes/liip/assets/');

// Styles
mix.sass('themes/liip/assets/scss/app.scss', 'css/app.min.css');
mix.styles([
    'modules/system/assets/css/framework.extras.css'
], 'themes/liip/assets/css/framework.extras.min.css');

// Scripts
mix.scripts([
    'themes/liip/assets/js/app.js'
], 'themes/liip/assets/js/app.min.js');
mix.scripts([
    'modules/system/assets/js/framework.js',
    'modules/system/assets/js/framework.extras.js'
], 'themes/liip/assets/js/framework.extras.min.js');

// Directly copy assets
mix.copy('node_modules/jquery/dist/jquery.min.js', 'themes/liip/assets/js/jquery.min.js');
