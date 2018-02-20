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
define('DB_NAME', 'dyret697_almeida');

/** MySQL database username */
define('DB_USER', 'dyret697_adm');

/** MySQL database password */
define('DB_PASSWORD', '07110814');

/** MySQL hostname */
define('DB_HOST', '216.172.172.25');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'r@2;u=v*]4jtS><,FvG;;[?3NsN@L2[`6MeS1b5Y AxD^WK-RtFIC5i=Ys7Gb!!!');
define('SECURE_AUTH_KEY',  '[2-8ZizKt)x-RQ|%[E5jGAfh6<NLDqR[n7 7c&:^1+-Nb(o$FpISGf4+>vZQQ#WL');
define('LOGGED_IN_KEY',    'psQlksWLt[0Qh44:%zag^Xcqjxn~bv6To~h*,{j,c--w[M]]^YyVA7DCcx~D?APr');
define('NONCE_KEY',        '6%u7xX5;f/C+/i^S@?:@Aj6ug)YUlrp]+L)M1+Q~3a~s]|v2|?k-xv$Q_591bZl;');
define('AUTH_SALT',        'T0|U.5cR6Jsq#;8I-{59o#3f(p]{qjpj3vbL2EgpT_jQ9mFV&iGk{P)VRFA/{#Qh');
define('SECURE_AUTH_SALT', 'J.ZfL|yMRtOrRzCy5STn ?b!*l56Z]4*C`4^W&jZ2F62=7xD[=;je,vV(_FO8GKv');
define('LOGGED_IN_SALT',   '|(hKTaLi=v760&eJ-`B<nSN:+`^&=o*imD,1ys>ha d @&?oKz?^IE^%bk5gZ$2(');
define('NONCE_SALT',       'G[xraaj}>m$=>Bge.^(Zf:WEa+x2>WKQ/;*ZIwWP2PG},:/^(dTV=V~o3,H<$Q ^');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'aadv_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
