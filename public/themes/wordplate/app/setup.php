<?php

// Enqueue and register scripts the right way.
add_action('wp_enqueue_scripts', function () {
    wp_deregister_script('jquery');

    wp_enqueue_style('wordplate', mix('/styles/app.css'));

    wp_register_script('wordplate', mix('/scripts/app.js'), '', '', true);

    wp_enqueue_script('wordplate');
});
