<?php

add_action('after_setup_theme', function () {
    require_if_theme_supports('plate-disable-dashboard', __DIR__ . '/plate/disable-dashboard.php');
    require_if_theme_supports('plate-disable-menu', __DIR__ . '/plate/disable-menu.php');
    require_if_theme_supports('plate-disable-toolbar', __DIR__ . '/plate/disable-toolbar.php');
    require_if_theme_supports('plate-footer-text', __DIR__ . '/plate/footer-text.php');
    require_if_theme_supports('plate-login-logo', __DIR__ . '/plate/login-logo.php');
    require_if_theme_supports('plate-permalink', __DIR__ . '/plate/permalink.php');
}, 100);

// Disable sidebar menu items.
add_theme_support('plate-disable-menu', [
    'edit-comments.php', // comments
    'index.php', // dashboard
    // 'upload.php', // media
]);

// Disable meta boxes in editor.
add_theme_support('plate-disable-editor', [
    'commentsdiv',
    'commentstatusdiv',
    'linkadvanceddiv',
    'linktargetdiv',
    'linkxfndiv',
    'postcustom',
    'postexcerpt',
    'revisionsdiv',
    'slugdiv',
    'sqpt-meta-tags',
    'trackbacksdiv',
    //'categorydiv',
    //'tagsdiv-post_tag',
]);

// Disable dashboard widgets.
add_theme_support('plate-disable-dashboard', [
    'dashboard_activity',
    'dashboard_incoming_links',
    'dashboard_plugins',
    'dashboard_recent_comments',
    'dashboard_primary',
    'dashboard_quick_press',
    'dashboard_recent_drafts',
    'dashboard_secondary',
    // 'dashboard_right_now',
]);

// Disable links from admin toolbar.
add_theme_support('plate-disable-toolbar', [
    'archive',
    'comments',
    'wp-logo',
    'edit',
    'appearance',
    'view',
    'new-content',
    'updates',
    'search',
]);

// Disable dashboard tabs.
add_theme_support('plate-disable-tabs', ['help']);

// Set custom permalink structure.
add_theme_support('plate-permalink', '/%postname%/');

// Set custom login logo.
// add_theme_support('plate-login-logo', asset('assets/images/logo.png'));

// Set custom footer text.
add_theme_support('plate-footer-text', 'Thank you for creating with <a href="https://wordplate.github.io">WordPlate</a>.');
