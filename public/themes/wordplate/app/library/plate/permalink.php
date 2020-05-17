<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/plate
 */

declare(strict_types=1);

// Set default permalink structure.
add_action('admin_init', function () {
    global $wp_rewrite;

    $pattern = get_theme_support('plate-permalink')[0];

    $wp_rewrite->set_permalink_structure($pattern);
});
