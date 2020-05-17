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

// Remove links from admin toolbar.
add_action('admin_bar_menu', function ($menu) {
    $items = get_theme_support('plate-disable-toolbar')[0];

    foreach ($items as $item) {
        $menu->remove_node($item);
    }
}, 999);
