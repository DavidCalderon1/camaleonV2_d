var elixir = require('laravel-elixir');

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

elixir(function(mix) {

	mix.copy('node_modules/bootstrap-sass/assets/fonts', 'public/assets/font');

    mix.styles([
      'bootstrap-datepicker3.css',
    ], 'public/assets/css');

    mix.sass([
    	//'controllers.scss',
    	'app.scss',
    ], 'public/assets/css');

    mix.browserify([
        //'jquery.js',
        'app.js',
        'jquery.animateFrm.js',
        'bootstrap-datepicker.js',
        'bootstrap-datepicker.es.min.js',
    ], 'public/assets/js/app.js');

    mix.version(
       [
          'public/assets/css/all.css',
          'public/assets/css/app.css',
          'public/assets/js/app.js'
       ]
    );

});
