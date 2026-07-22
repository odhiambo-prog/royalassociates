<?php
/**
 * Plugin Name: Royal Associates SMTP
 * Description: Routes all WordPress email (contact form, quote requests, admin
 *              notices) through an authenticated SMTP server so messages are
 *              actually delivered instead of silently dropped by PHP mail().
 * Author:      Royal Associates
 *
 * WHY THIS EXISTS
 * ---------------
 * By default WordPress sends mail with PHP's mail() function from an address
 * like wordpress@royalassociates.co.ke. Because that mail is not authenticated
 * (no SMTP, no SPF/DKIM alignment), receiving servers (Gmail, Outlook, the
 * company mailbox, etc.) usually reject it or drop it into spam — so form
 * submissions never arrive. Sending through a real, authenticated SMTP mailbox
 * fixes deliverability.
 *
 * CONFIGURATION
 * -------------
 * Set these as environment variables (Dokploy) or as constants in wp-config.php.
 * Nothing secret is stored in the repo.
 *
 *   SMTP_HOST      e.g. smtp.gmail.com / mail.royalassociates.co.ke / smtp.zoho.com
 *   SMTP_PORT      587 (TLS/STARTTLS, recommended) or 465 (SSL)
 *   SMTP_USER      the full mailbox login, e.g. info@royalassociates.co.ke
 *   SMTP_PASS      the mailbox password or app-password
 *   SMTP_SECURE    "tls" (default) or "ssl"
 *   SMTP_FROM      From address shown to recipients (defaults to SMTP_USER)
 *   SMTP_FROM_NAME From name (defaults to the site name)
 *
 * Example wp-config.php lines:
 *   define('SMTP_HOST', 'mail.royalassociates.co.ke');
 *   define('SMTP_PORT', 587);
 *   define('SMTP_USER', 'info@royalassociates.co.ke');
 *   define('SMTP_PASS', 'your-mailbox-password');
 *   define('SMTP_SECURE', 'tls');
 *
 * Until these are provided the plugin does nothing (WordPress falls back to its
 * default behaviour), so it is safe to deploy immediately.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Read a setting from a constant first, then an environment variable.
 */
function royal_smtp_setting($key, $default = '') {
    if (defined($key) && constant($key) !== '') {
        return constant($key);
    }
    $env = getenv($key);
    if ($env !== false && $env !== '') {
        return $env;
    }
    return $default;
}

/**
 * Are the minimum SMTP settings present?
 */
function royal_smtp_is_configured() {
    return royal_smtp_setting('SMTP_HOST') !== ''
        && royal_smtp_setting('SMTP_USER') !== ''
        && royal_smtp_setting('SMTP_PASS') !== '';
}

/**
 * Configure PHPMailer to use SMTP for every outgoing message.
 */
add_action('phpmailer_init', function ($phpmailer) {
    if (!royal_smtp_is_configured()) {
        return;
    }

    $host   = royal_smtp_setting('SMTP_HOST');
    $port   = (int) royal_smtp_setting('SMTP_PORT', 587);
    $user   = royal_smtp_setting('SMTP_USER');
    $pass   = royal_smtp_setting('SMTP_PASS');
    $secure = strtolower(royal_smtp_setting('SMTP_SECURE', 'tls'));

    // Guardrail: port 465 is implicit SSL. If someone sets port 465 but leaves
    // SMTP_SECURE at the 'tls' default, the connection typically hangs/fails
    // silently. Coerce to 'ssl' and log so the misconfig is visible.
    if ($port === 465 && $secure !== 'ssl') {
        error_log('[Royal SMTP] SMTP_PORT=465 implies SSL; overriding SMTP_SECURE to "ssl".');
        $secure = 'ssl';
    }

    $phpmailer->isSMTP();
    $phpmailer->Host       = $host;
    $phpmailer->Port       = $port;
    $phpmailer->SMTPAuth   = true;
    $phpmailer->Username   = $user;
    $phpmailer->Password   = $pass;
    // 'tls' -> STARTTLS (usually port 587), 'ssl' -> implicit SSL (port 465).
    $phpmailer->SMTPSecure = ($secure === 'ssl') ? 'ssl' : 'tls';

    // Relax SSL verification for private mail servers that may use self-signed
    // or internal-CA certificates (common for Kenyan hosting SMTP relays).
    $phpmailer->SMTPOptions = array(
        'ssl' => array(
            'verify_peer'       => false,
            'verify_peer_name'  => false,
            'allow_self_signed' => true,
        ),
    );

    // Short timeout so a unreachable SMTP host (firewalled port, DNS failure,
    // etc.) does not block the PHP process for the default 30+ seconds. The
    // form submission response waits for wp_mail to finish, so a long hang
    // makes the AJAX iframe appear stuck / never load.
    $phpmailer->Timeout = 5;
    $phpmailer->Timelimit = 10;

    // Log SMTP debug output at level 1 (client → server) to the error log so
    // connection failures are diagnosable even when the mail server is private.
    $phpmailer->SMTPDebug = 0; // set to 1 to troubleshoot SMTP handshake

    // Send from an address that belongs to the authenticated mailbox so the
    // message passes SPF/DKIM and is not treated as spoofed.
    $from_email = royal_smtp_setting('SMTP_FROM', $user);
    $from_name  = royal_smtp_setting('SMTP_FROM_NAME', get_bloginfo('name'));
    $phpmailer->setFrom($from_email, $from_name, false);
    $phpmailer->Sender = $from_email; // Return-Path / envelope sender
}, 20);

/**
 * Align the WordPress From header with the authenticated mailbox as well, so
 * PHPMailer does not later overwrite it with the default wordpress@ address.
 */
add_filter('wp_mail_from', function ($email) {
    if (!royal_smtp_is_configured()) {
        return $email;
    }
    return royal_smtp_setting('SMTP_FROM', royal_smtp_setting('SMTP_USER'));
}, 20);

add_filter('wp_mail_from_name', function ($name) {
    if (!royal_smtp_is_configured()) {
        return $name;
    }
    return royal_smtp_setting('SMTP_FROM_NAME', get_bloginfo('name'));
}, 20);

/**
 * Log mail failures so delivery problems are diagnosable (visible in the PHP /
 * WP debug log). Does not expose anything to visitors.
 */
add_action('wp_mail_failed', function ($wp_error) {
    if (is_wp_error($wp_error)) {
        error_log('[Royal SMTP] wp_mail failed: ' . $wp_error->get_error_message());
    }
});
