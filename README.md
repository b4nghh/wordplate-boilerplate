# WordPlate Boilerplate
The website is built with a mordern WP development stack (WordPlate).

## Features
- Sass for stylesheets
- Modern JavaScript
- Laravel Mix for compiling assets and concatenating and minifying files
- Browsersync for synchronized browser testing
- Blade as a templating engine
- Bootstrap 4

## Requirements
Make sure all dependencies have been installed before moving on:

- WordPress >= 5.4
- PHP >= 7.2.0 (with php-mbstring enabled)
- Composer
- Node.js >= 8.0.0
- Yarn

## Theme setup
Edit `public/theme/sitename/app/setup.php` to enable or disable theme features, setup navigation menus, post thumbnail sizes, and sidebars.

## Theme development
- Setup vhost with a domain (for example: `sitename.test`)
- Update `BROWSER_SYNC_HOST` to the same value with the domain above (`http://sitename.test`)
- `composer install` - Install PHP packages
- `npm install` - Install Node packages
- `npm run watch` — Compile assets when file changes are made, start Browsersync session
- `npm run dev` — Compile and optimize the files in your assets directory
- `npm run prod` — Compile assets for production
