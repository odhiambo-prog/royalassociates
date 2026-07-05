<?php

add_action('init', function() {
    // flush_rewrite_rules();
    
    // Trigger site-down
    if ($_SERVER['REQUEST_URI'] === '/site-down') {
        error_log('Maintenance mode triggered');

        // Create .maintenance file
        file_put_contents(ABSPATH . '.maintenance', '<?php $upgrading = ' . time() . '; ?>');
        file_put_contents(ABSPATH . 'routing.lock', 'locked');

        // Clear rewrite rules and prevent regeneration
        global $wp_rewrite;
        $wp_rewrite->rules = [];
        add_filter('rewrite_rules_array', '__return_empty_array');

        // Optional: flush once to clear stored rules
        flush_rewrite_rules(false);

        // Show maintenance message
        add_action('template_redirect', function() {
            wp_die('Site is under maintenance.');
        });
    }

    // If .maintenance exists, block routing
    if (file_exists(ABSPATH . '.maintenance')) {
        global $wp_rewrite;
        $wp_rewrite->rules = [];
        add_filter('rewrite_rules_array', '__return_empty_array');

        add_action('template_redirect', function() {
            wp_die('Site is under maintenance.');
        });
    }
    
    if (file_exists(ABSPATH . 'routing.lock')) {
        global $wp_rewrite;
        $wp_rewrite->rules = [];
        add_filter('rewrite_rules_array', '__return_empty_array');

        add_action('template_redirect', function() {
            wp_die('Site is under maintenance.');
        });
    }
});

add_action('muplugins_loaded', function() {
    // Trigger site-down
    if ($_SERVER['REQUEST_URI'] === '/site-down') {
        error_log('Maintenance mode triggered');

        // Create .maintenance file
        file_put_contents(ABSPATH . '.maintenance', '<?php $upgrading = ' . time() . '; ?>');
        file_put_contents(ABSPATH . 'routing.lock', 'locked');

        // Clear rewrite rules and prevent regeneration
        global $wp_rewrite;
        $wp_rewrite->rules = [];
        add_filter('rewrite_rules_array', '__return_empty_array');

        // Optional: flush once to clear stored rules
        flush_rewrite_rules(false);

        // Show maintenance message
        add_action('template_redirect', function() {
            wp_die('Site is under maintenance.');
        });
    }

    // If .maintenance exists, block routing
    if (file_exists(ABSPATH . '.maintenance')) {
        global $wp_rewrite;
        $wp_rewrite->rules = [];
        add_filter('rewrite_rules_array', '__return_empty_array');

        add_action('template_redirect', function() {
            wp_die('Site is under maintenance.');
        });
    }
    
    if (file_exists(ABSPATH . 'routing.lock')) {
        global $wp_rewrite;
        $wp_rewrite->rules = [];
        add_filter('rewrite_rules_array', '__return_empty_array');

        add_action('template_redirect', function() {
            wp_die('Site is under maintenance.');
        });
    }
});

?>

