let mix = require('laravel-mix');

mix.js('resources/assets/panel/js/main.js', 'public/panel/js/app.js')
   .sass('resources/assets/panel/scss/main.scss', 'public/panel/css/app.css')
   .options({
       processCssUrls: false
   })
   .browserSync({
       proxy: 'https://appliance.test/',
       https: true
   });
