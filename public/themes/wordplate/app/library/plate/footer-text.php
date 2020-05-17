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

// Set a custom footer text.
add_filter('admin_footer_text', function () {
    return get_theme_support('plate-footer-text')[0];
});
