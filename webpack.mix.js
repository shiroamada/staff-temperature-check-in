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
    .sass('resources/sass/app.scss', 'public/css')
    .copy('node_modules/admin-lte/plugins/datatables/',
        'public/vendor/datatables/')
    .copy('node_modules/admin-lte/plugins/datatables-bs4/',
        'public/vendor/datatables-bs4/')
    .copy('node_modules/admin-lte/plugins/jquery/',
        'public/vendor/jquery/')
    .copy('node_modules/admin-lte/plugins/icheck-bootstrap/',
        'public/vendor/icheck-bootstrap/')
    .copy('node_modules/admin-lte/plugins/fontawesome-free/',
        'public/vendor/fontawesome-free/')
    .copy('node_modules/admin-lte/plugins/daterangepicker/',
        'public/vendor/daterangepicker/')
    .copy('node_modules/admin-lte/plugins/select2/',
        'public/vendor/select2/')
    .copy('node_modules/admin-lte/plugins/select2-bootstrap4-theme/',
        'public/vendor/select2-bootstrap4-theme/')
    .copy('node_modules/admin-lte/plugins/bootstrap/',
        'public/vendor/bootstrap/');
