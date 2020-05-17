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

// Set custom login logo.
add_action('login_head', function () {
    $args = get_theme_support('plate-login-logo');

    if (empty($args[0])) {
        return;
    }

    $styles = [
        'background-position: center;',
        'background-size: contain;',
        sprintf('background-image: url(%s);', $args[0]),
    ];

    if (count($args) >= 2) {
        $styles[] = sprintf('width: %dpx;', $args[1]);
    }

    echo sprintf('<style> .login h1 a { %s } </style>', implode(' ', $styles));
});

// Set custom login logo url.
add_filter('login_headerurl', function () {
    return get_bloginfo('url');
});
