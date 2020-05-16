<?php

declare(strict_types=1);

add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails');

    add_theme_support('title-tag');

    register_nav_menus([
        'navigation' => __('Navigation', 'wordplate'),
    ]);
});

add_filter('jpeg_quality', function () {
    return 100;
}, 10, 2);

collect(['helpers', 'setup', 'filters', 'admin'])
    ->each(function ($file) {
        $file = "app/{$file}.php";

        if (! locate_template($file, true, true)) {
            wp_die(
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'wordplate'), $file)
            );
        }
    });
