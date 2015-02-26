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
define('DB_NAME', 'greengeeks');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 't35t1ng');

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
define('AUTH_KEY',         'y<Uuz`PRg|`Gl@a>QiVavU1/cN;e}cWkqN3bKN-?{L-^_%SJZ+|6|33bA:+Z&8Ls');
define('SECURE_AUTH_KEY',  '7{ D;PVYC%]J)F1QWwz>%Vi^gRM`(rLR_jR]qoI`28+NOX*Rjl7nYa|4_]<N1g2w');
define('LOGGED_IN_KEY',    'u3kJ%8-;@tG77c=W MDf<{/wl+u>Rx_)_wusHpe2rsk.*;Kp-,5RYrvY26H)i7-Q');
define('NONCE_KEY',        'G)#NaNrh`]-b|iT`Y$l_X?(|lvg-u`)@Rjg#;$ViJutOYrVjVh|=UcK~Iw8O-<pM');
define('AUTH_SALT',        'XL}AE@>:1h0Q:`u/gvCV,:20[qOuRa1ol^8$=cW#2Ru;C@b}QD`kyybCDyH_?r84');
define('SECURE_AUTH_SALT', 'W0Lbe 5fyQkS-aK`gS2%v:d(O[BDW+Z|a(I3qQnhSD{tuH3HfbV@--b*?1$Kkel+');
define('LOGGED_IN_SALT',   'XTZZExXmB!nSw41X:,L;_2$iqs kJbGp_w-,1t10yX T59%t%<vu:-4mPogOy:-V');
define('NONCE_SALT',       'QOn0(|^4Wd~[e:>jh(A$LjX,[15.*qig.#bVUTkm%+YJ-1vucuGwb[ED<-dS[JZ^');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

// set to UK English
define ('WPLANG', 'en_GB');

// temp localhost updates
define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
