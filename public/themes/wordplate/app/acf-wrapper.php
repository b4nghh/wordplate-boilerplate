<?php

declare(strict_types=1);

// include ACF files
foreach (scandir(stylesheet_path('app/acf-fields')) as $filename) {
    $path = stylesheet_path('app/acf-fields') . '/' . $filename;
    if (is_file($path)) {
        require_once $path;
    }
}
