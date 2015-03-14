<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
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
define('AUTH_KEY',         '5Vx[Ee$v[E&~c;-f,X7:%dQDD7|;8Yl-ajc<i2,ui:*kApAM<${q5erKazm^)5NL');
define('SECURE_AUTH_KEY',  'J|~NxBqP(IP|+~=&+PDW%srvEa*VMX?j%tsfl,`T hk)^;Q|OFrEnhX@=:n[Lp+W');
define('LOGGED_IN_KEY',    'qLsz0|jbZB*%OVR%w`AUb6K$o@4j@+ZLQ^pQc3sZ0RZ+PNs:{)MW^>$k]5|Bu_E{');
define('NONCE_KEY',        ');,&w(|zcbO6~F*g=~xVxxsGE#z`J:2W3,-]@aJeK&}B3XvC#R=)0fC@G:i)+5xo');
define('AUTH_SALT',        '+Q18i| >|@cX#NX=U2PUvAmL-Ql!1)o=EV-+&lP9R/lel^9l9{2[{pQ~fD;4Kw_$');
define('SECURE_AUTH_SALT', 'Y`t0Q5AB&U/=g#gLE+8Nj8fOEyZeX8<2lqryI~L^t#+F1t[g-13-6vA?B[kN:eS~');
define('LOGGED_IN_SALT',   '.BNBrFN~9/vqgA#r3_5dg;qD)&Rwb+,W|eDRy^SD-U,NOA<9@Uqfy.QhDi6sZZc>');
define('NONCE_SALT',       'D=2DQGXFQ(a]eq<4IE+Pe=-E@t#&y@m}-+|Us15i#1?Vb>Pc~.27f3-bMDAq/hSO');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
