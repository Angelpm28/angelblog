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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', '9061205f432437524299a0dc45b1ac1a2c055055c2d628fe');

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
define('AUTH_KEY',         'Dn/ze.;qBwAil3Dy>f3:a$EFE;F}W6hX<V:*=jLd[,;98u:/4T*Js.01|~/|.Y5l');
define('SECURE_AUTH_KEY',  '5&I}|YsL%zfxA8utkGhoB=L~P9Bh~7T k;|Mu[I=}Ga*k=|Fn/8a469fLE<7e_8t');
define('LOGGED_IN_KEY',    'QvQbv-+5xl|TVHP!9co4zG77YD:rQcuJlhj(gIV&;z)k%)5j:zpQ?sslVOU~y*FC');
define('NONCE_KEY',        'RD*nt6;qW}ykCJRKPDB8!Pq`uMrG3^Lo8hxlwm-pY)+;Zh.v+lAd&SVaz77T=BO1');
define('AUTH_SALT',        '+E3q[XcsQ)@,FnUmaI:VidrRh?NUq46*1:x<WC(TZu~_yiSicmyt7|TcXFX%{;]#');
define('SECURE_AUTH_SALT', '}sWChoCl~1)I8_bG|e4VS6<Z1|Iq$iJu!z 2=T&8%+r@by-hX<,76t46~2st^I~M');
define('LOGGED_IN_SALT',   ':#4nrw] KlPV3G;;QP20YnfJey6<%gZ~KIrfBrV><%Gg;Q~y6!F,`>3M3B8CEH|O');
define('NONCE_SALT',       '7>~.7 !o`}OJ1u5c9QYX&h)>ALTaJ<6Nnm9?8-wH8OB<=ePzhEvy-j7tsD$h4T!1');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
