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

// Remove menu and submenu items.
add_action('admin_menu', function () {
    $items = get_theme_support('plate-disable-menu')[0];

    foreach ($items as $item) {
        if (
            strpos($item, '?') === false ||
            strpos($item, 'edit.php?post_type=') === 0
        ) {
            remove_menu_page($item);

            continue;
        }

        $path = parse_url($item, PHP_URL_PATH);
        $query = parse_url($item, PHP_URL_QUERY);
        $value = explode('=', $query);

        if (isset($value[1])) {
            $name = $value[1];

            strpos($item, 'admin.php') !== 0 ? remove_submenu_page($path, $name) : remove_menu_page($name);
        }
    }
}, PHP_INT_MAX);
