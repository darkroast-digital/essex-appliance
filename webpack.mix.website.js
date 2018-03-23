let { mix } = require('laravel-mix');

mix.js('resources/assets/theme/js/main.js', 'public/theme/js/app.js')
   .sass('resources/assets/theme/scss/main.scss', 'public/theme/css/app.css')
   .options({
       processCssUrls: false
   })
   .browserSync({
       proxy: 'https://appliance.test/',
       https: true
   });
