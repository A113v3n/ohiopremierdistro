<?php
define( 'WP_CACHE', true );
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u481966938_xR9uC' );

/** Database username */
define( 'DB_USER', 'u481966938_QwXlg' );

/** Database password */
define( 'DB_PASSWORD', '9ckWrZs7Pq' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'g1PEM?{c/`U0Q83H_+HZ#2{&3Da(D#m/+V%vzz-o@kw|={!]@tnU(x/,)L}2HH$%' );
define( 'SECURE_AUTH_KEY',   '&B 6[%?}w:0JNh>y$T6d;.SAaZ?bfWT!0^N0wx#w_/##Y+816|p)W#n|**%e9*8T' );
define( 'LOGGED_IN_KEY',     'Z*4=)kHfgc9u7Xe!DC5z`$g2r]>b0P1sE7i`H%|j3tpBW[tE~`I=K*h-`:03F)kM' );
define( 'NONCE_KEY',         'R?+:l4~xr|-Z GE8:8m~gVwLwumjWykt!RLC81ENN1jg 9|D!R:jfFD#|JicjRt$' );
define( 'AUTH_SALT',         'gm0Lc0yA$O[| :<kOWHl5i>]BKj(bNa,Rx!Ri^[(0Ld+FmXrMCmfRF^vQ&u&_>bC' );
define( 'SECURE_AUTH_SALT',  ')Omre>V:~yPh&pbhA(ZXWxbIf[MrNuUApd]?A&GtThRl=UU@/{>.rVt{M2[6n1v[' );
define( 'LOGGED_IN_SALT',    '/?kr2oXFT>b&e*<X%Nci%wu.R^Er(je1X|Y-HZD>B^SN.UXeuhMw9B(v&)3G=[/-' );
define( 'NONCE_SALT',        'VaXCk(e{/!ERE~kOknF3a,wV=, ^owOQb]@j=mmipbk9Ye Ux=qt4g+@5o;(b0pR' );
define( 'WP_CACHE_KEY_SALT', '5^@(/8<j-7/*>qf^XRZdI.Ku<,9kYz!Z1><~rTb55L@D<8g L/E:@-12a*4Yz_VU' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */



define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
