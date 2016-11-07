const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass('app.scss')
       .webpack('app.js');

    mix.styles([
        'bootstrap.css',
        'select2.css',
        'AdminLTE.css',
        '_all-skins.css',
        'ionicons.css'
    ]);

    mix.scripts([
        'jquery.js',
        'bootstrap.js',
        'select2.js',
        'icheck.js',
        'admin-lte-app.js'
    ]);
});
