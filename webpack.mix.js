const mix = require('laravel-mix');

require('dotenv').config();
require('laravel-mix-purgecss');
require('laravel-mix-copy-watched');

const theme = process.env.WP_THEME;
const themePath = `public/themes/${theme}/assets`;

mix.setResourceRoot('../');
mix.setPublicPath(`public/themes/${theme}/assets`);
mix.browserSync({
  proxy: process.env.BROWSER_SYNC_HOST,
});

mix.js('resources/assets/scripts/app.js', 'scripts')
  .sass('resources/assets/styles/app.scss', 'styles')
  .purgeCss({
    whitelist: require('purgecss-with-wordpress').whitelist,
    whitelistPatterns: require('purgecss-with-wordpress').whitelistPatterns,
   });

mix.copyWatched('resources/assets/images/**', themePath + '/images')
  .copyWatched('resources/assets/fonts/**', themePath + '/fonts');

mix.autoload({
  jquery: ['$', 'window.jQuery'],
});

if (mix.inProduction()) {
  mix.version();
}
