<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'trustgua_wp');

/** MySQL database username */
define('DB_USER', 'trustgua_wpuser');

/** MySQL database password */
define('DB_PASSWORD', 'r6uuPGW3Uu');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'ma5R{r+^#[]{p!s&3D8`37+yyL0KF,r&h5}*KI A<~NeY-dVN]We|[uS!rT=DY!i');
define('SECURE_AUTH_KEY',  'vJkw4E~#X4OfE_dONd %f-RYFi8EU:DR~ubV,Gh@zGmad6YT0T-E X+ wUF=)q;I');
define('LOGGED_IN_KEY',    'Ycz=.VpjLjk$HSaSPJjiPWyg5 {-dlhA%<T*TVD=J*AQA%j ]Wk.$U-6A/~zGz*f');
define('NONCE_KEY',        'z.%+1sGgZVW-}PbHyC*U%+T=vJ2i3BrJhonU7zQuM];m}o]6~r|en$C?*9{fS~AS');
define('AUTH_SALT',        'B^-Skns6kzN$wp9^oO4|@= {(~tf|4V PAk+-[sFRHvsI-ax}3|~_5x#oZ7Xpf7*');
define('SECURE_AUTH_SALT', 'rrz-Rb#]$TLI;B/>q=uzV^6kz/ZUN]Nj~V7I=Yuu}+OrK6L4Xbmd}^rZ(HQheL/-');
define('LOGGED_IN_SALT',   'Vh/o-|(M9YhJK|A3w<6iapo9N3T_ Zj+feB62FKNUm,*UrdmCx&<Syuu6S(y+<fv');
define('NONCE_SALT',       '[5,buWQe?,8<|!7b/N+6kGmM pG|/eSGHaTlhSq+B:ESZtr!K|4,-WIz-vJl@.yI');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
