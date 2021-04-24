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
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/index.scss', 'public/css')
    .sass('resources/sass/common.scss', 'public/css')
    .sass('resources/sass/empleados/empleados.scss', 'public/css/empleados')
    .sass('resources/sass/auth/login.scss', 'public/css/auth')
    .copy('resources/sql/mesa_ayuda.sql', 'public/sql/mesa_ayuda.sql')
    .copy('resources/js/empleado.js', 'public/js/empleado.js')
    .copy('resources/img/no_file.png', 'public/img/no_file.png')
    .browserSync('127.0.0.1:8000');
