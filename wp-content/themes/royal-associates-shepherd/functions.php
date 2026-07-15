<?php
if (!defined('ABSPATH')) exit;

define('ROYAL_SHEPHERD_VERSION', '1.0.0');

function royal_shepherd_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);

    register_nav_menus([
        'primary' => __('Primary Menu', 'royal-shepherd'),
    ]);
}
add_action('after_setup_theme', 'royal_shepherd_setup');

add_filter('show_admin_bar', '__return_false');

function royal_shepherd_document_title($title) {
    global $pageTitle;
    if (!empty($pageTitle)) {
        return $pageTitle;
    }
    return $title;
}
add_filter('pre_get_document_title', 'royal_shepherd_document_title', 999);
add_filter('wpseo_title', 'royal_shepherd_document_title', 999);

/**
 * Prevent WordPress from redirecting /blog/<slug> URLs via redirect_canonical.
 * Without this, WP strips the /blog/ prefix and redirects to /<slug>/, which 404s.
 */
add_filter('redirect_canonical', function ($redirect_url, $requested_url) {
    if (strpos(parse_url($requested_url, PHP_URL_PATH), '/blog/') !== false) {
        return false;
    }
    return $redirect_url;
}, 10, 2);

/**
 * Override template for pages whose URLs conflict with CPT or post archives.
 * e.g. /products/ is hijacked by the "product" CPT, /blog/ by the post archive.
 */
function royal_shepherd_template_override($template) {
    $request = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $theme_dir = get_template_directory();

    $overrides = [
        'products' => $theme_dir . '/page-products.php',
        'blog'     => $theme_dir . '/page-blog.php',
    ];

    if (isset($overrides[$request]) && file_exists($overrides[$request])) {
        return $overrides[$request];
    }

    if (preg_match('#^blog/.+#', $request)) {
        $single = $theme_dir . '/single.php';
        if (file_exists($single)) {
            return $single;
        }
    }

    return $template;
}
add_filter('template_include', 'royal_shepherd_template_override', 99);

/**
 * Auto-create Gravity Forms on admin init if they don't exist.
 */
function royal_shepherd_contact_form_definition() {
    return array(
        'title' => 'Contact Form',
        'description' => '',
        'labelPlacement' => 'top_label',
        'descriptionPlacement' => 'above',
        'button' => array('type' => 'text', 'text' => 'Submit'),
        'fields' => array(
            array('id' => 1, 'type' => 'text', 'label' => 'First name', 'isRequired' => true, 'placeholder' => 'First name*', 'size' => 'large'),
            array('id' => 2, 'type' => 'text', 'label' => 'Last name', 'isRequired' => true, 'placeholder' => 'Last name*', 'size' => 'large'),
            array('id' => 3, 'type' => 'email', 'label' => 'Email', 'isRequired' => true, 'placeholder' => 'Email*', 'size' => 'large'),
            array('id' => 4, 'type' => 'phone', 'label' => 'Phone', 'isRequired' => true, 'placeholder' => 'Phone*', 'size' => 'large'),
            array('id' => 5, 'type' => 'textarea', 'label' => 'Message', 'isRequired' => true, 'placeholder' => 'Message*', 'size' => 'large'),
            array(
                'id' => 6, 'type' => 'checkbox', 'label' => 'Privacy consent', 'isRequired' => true,
                'choices' => array(
                    array('text' => 'By submitting this form, you agree to the processing of your personal data by Royal Associates Insurance Brokers as described in our Privacy Policy.', 'value' => 'Consent given'),
                ),
            ),
        ),
        'notifications' => array(
            array(
                'id' => 'notif_contact', 'to' => 'info@royalassociates.co.ke', 'name' => 'Admin Notification',
                'event' => 'form_submission', 'toType' => 'email',
                'subject' => 'New Contact Form submission from {First name:1} {Last name:2}',
                'message' => '{all_fields}',
            ),
        ),
        'confirmations' => array(
            array(
                'id' => 'confirm_contact', 'name' => 'Default Confirmation', 'type' => 'message',
                'message' => 'Thank you for contacting us. We will get back to you within 48 hours.',
            ),
        ),
    );
}

function royal_shepherd_quote_form_definition() {
    return array(
        'title' => 'Get a Quote',
        'description' => '',
        'labelPlacement' => 'top_label',
        'descriptionPlacement' => 'above',
        'button' => array('type' => 'text', 'text' => 'Submit'),
        'fields' => array(
            array('id' => 1, 'type' => 'text', 'label' => 'First name', 'isRequired' => true, 'placeholder' => 'First name*', 'size' => 'large'),
            array('id' => 2, 'type' => 'text', 'label' => 'Last name', 'isRequired' => true, 'placeholder' => 'Last name*', 'size' => 'large'),
            array('id' => 3, 'type' => 'email', 'label' => 'Email', 'isRequired' => true, 'placeholder' => 'Email*', 'size' => 'large'),
            array('id' => 4, 'type' => 'phone', 'label' => 'Phone', 'isRequired' => true, 'placeholder' => 'Phone*', 'size' => 'large'),
            array('id' => 5, 'type' => 'text', 'label' => 'Product', 'isRequired' => false, 'placeholder' => 'Product', 'size' => 'large', 'cssClass' => 'gf-product-field'),
            array('id' => 6, 'type' => 'textarea', 'label' => 'Message', 'isRequired' => false, 'placeholder' => 'Message (optional)', 'size' => 'large'),
        ),
        'notifications' => array(
            array(
                'id' => 'notif_quote', 'to' => 'info@royalassociates.co.ke', 'name' => 'Admin Notification',
                'event' => 'form_submission', 'toType' => 'email',
                'subject' => 'New Quote request from {First name:1} {Last name:2}',
                'message' => '{all_fields}',
            ),
        ),
        'confirmations' => array(
            array(
                'id' => 'confirm_quote', 'name' => 'Default Confirmation', 'type' => 'message',
                'message' => 'Thank you for your inquiry. Our team will get back to you shortly.',
            ),
        ),
    );
}

function royal_shepherd_create_forms() {
    if (!class_exists('GFAPI') || defined('DOING_AJAX')) return;

    $existing = GFAPI::get_forms();
    $titles = array_map(function($f) { return $f['title']; }, $existing);

    if (!in_array('Contact Form', $titles)) {
        GFAPI::add_form(royal_shepherd_contact_form_definition());
    }
    if (!in_array('Get a Quote', $titles)) {
        GFAPI::add_form(royal_shepherd_quote_form_definition());
    }
}
add_action('admin_init', 'royal_shepherd_create_forms');

/**
 * Serve /assets/* static files from the theme directory.
 * The physical symlink at the WP root handles most cases;
 * this filter serves as a fallback for environments without symlink support.
 */
function royal_shepherd_serve_assets($continue, $wp, $query) {
    $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if (preg_match('#^/assets/(.+)$#', $request, $m)) {
        $file = get_template_directory() . '/assets/' . $m[1];
        if (file_exists($file)) {
            $mime = mime_content_type($file);
            if ($mime) header('Content-Type: ' . $mime);
            readfile($file);
            exit;
        }
    }
    return $continue;
}
add_filter('do_parse_request', 'royal_shepherd_serve_assets', 10, 3);
