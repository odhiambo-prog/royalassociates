<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
/*define('DB_NAME', 'royalassociatesc_new');*/

/** MySQL database username */
/*define('DB_USER', 'royalassociatesc_honcho');*/

/** MySQL database password */
/*define('DB_PASSWORD', '}%Puv!;Fb^p9');*/

/** MySQL hostname */
/*define('DB_HOST', 'localhost');*/

/** Database Charset to use in creating database tables. */
/*define('DB_CHARSET', 'utf8mb4');*/

/** The Database Collate type. Don't change this if in doubt. */
/*define('DB_COLLATE', '');*/

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ']uXq6t)L1:,^y46:Of2pZG&>mBi1ro:-h,;A17QpOtVz/S$N$v3w[Oi%5koRz!).');
define('SECURE_AUTH_KEY',  ')dg`TNoaS*w-ShlJJtz7S$>LuD7S&5 j!yz]4XVwFwH#`.)p-o[/?Sum9+o,B<(W');
define('LOGGED_IN_KEY',    'L@smKw~&?BMrXh:PN%MmI!%*tuIUOnaY)kWw Kz=X(6Z|(MZvdq&Mmw?.+:+BTyz');
define('NONCE_KEY',        'kq`/uX 8>$sa?HEGqIX>3-G[&bm:in!Xw8tjtwD0qsMkf4Ld 9v$:wOU667K[]|8');
define('AUTH_SALT',        'Ji;VU-#9~Ilo78+HW}@(czhpW7RN9(T_V`eNUWyP3 *RlTk]l{lCT?F%eRI$OJ>F');
define('SECURE_AUTH_SALT', '|z%zD4x>HMmd<+*9R_~q{h}Mid26[vZ:87qnjd@:V32A[(A?#>|gOdvn+)l|wlyl');
define('LOGGED_IN_SALT',   '2O()KMdY]Us&|7qo1Y]#0dE{?4L691_:CN4/}cersfFD5Q}K8{orG|Op:jjc]*N>');
define('NONCE_SALT',       '<S,rTdE/[+U<iQ%umU~>D$P)Sm@Sm*C4+TGHR2kze0WkePz_U7|2Cwx8:Z2[!~[u');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */

// Enable WP_DEBUG mode
define('WP_DEBUG', true);

// Enable Debug logging to the /wp-content/debug.log file
define('WP_DEBUG_LOG', true);

// Disable display of errors and warnings 
define('WP_DEBUG_DISPLAY', false);
@ini_set('display_errors', 0);

error_reporting(E_ALL);
// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define('SCRIPT_DEBUG', true);

/* That's all, stop editing! Happy blogging. */
define('WP_MEMORY_LIMIT', '64M');
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

// Include for ddev-managed settings in wp-config-ddev.php.
$ddev_settings = dirname(__FILE__) . '/wp-config-ddev.php';
if (is_readable($ddev_settings) && !defined('DB_USER')) {
    require_once($ddev_settings);
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
