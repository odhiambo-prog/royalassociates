add_action('init', function() {
    // flush_rewrite_rules();
    
    // Check for the special route
    if ($_SERVER['REQUEST_URI'] === '/site-down') {
        error_log('init: Maintenance route triggered');
        file_put_contents(ABSPATH . '.maintenance', '<?php $upgrading = ' . time() . '; ?>');
        wp_die('Site is now in maintenance mode.');
    }
    wp_die('Site is now in maintenance mode.');

    // Optional: route to disable maintenance
    if ($_SERVER['REQUEST_URI'] === '/site-up') {
        if (file_exists(ABSPATH . '.maintenance')) {
            unlink(ABSPATH . '.maintenance');
            wp_die('Maintenance mode disabled.');
        }
    }
});

add_action('muplugins_loaded', function() {
     wp_die('Site is now in maintenance mode.');
    if ($_SERVER['REQUEST_URI'] === '/site-down') {
        error_log('muplugins_loaded: Maintenance route triggered');
        file_put_contents(ABSPATH . '.maintenance', '<?php $upgrading = ' . time() . '; ?>');
        wp_die('Site is now in maintenance mode.');
    }
    
    if (isset($_GET['site_down']) && $_GET['site_down'] === '1') {
    error_log('muplugins_loaded:q-string: Maintenance route triggered');
        file_put_contents(ABSPATH . '.maintenance', '<?php $upgrading = ' . time() . '; ?>');
        wp_die('Site is now in maintenance mode.');
    }
});


