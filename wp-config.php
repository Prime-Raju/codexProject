<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cosmic-glitch' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '}Z}/]6b$~+Z1h7bmEYRV1?dBjbM1CtVLE~7G&BTj6!A3@bQX:-y^y=a(|YJDWs*m' );
define( 'SECURE_AUTH_KEY',  'gE>)S@Xv=Xmmigl8Zztk{U/LS;gz]4Y9&7ioI/Hm0iZ(IF|,@?4d=3-_)`Nmhfg9' );
define( 'LOGGED_IN_KEY',    'k;dH^--VY,OJ3Q54.=F)l)KM.]0m/^8W:=+*rrdY(#&`w&r8ikqQ{<>Qh54lgt4r' );
define( 'NONCE_KEY',        'H7n(sCJ:ynkEWrIh*Zbg#^QdAqymDOoA^;/sD[}ot[_]KA*6RMTYaE}W8CBVvw?Q' );
define( 'AUTH_SALT',        'iDjqCAateWGgpy&nM],H /rt3r,E89In.{4r5|e(X4[>nIDs]o9QnZSg|`dBmdYj' );
define( 'SECURE_AUTH_SALT', 'jP;ZWOpArW?sKoB>G&OG!uh|?thXPpn0c%TY2`.qY7h,-Cbw`R+z#-J3K#l=h`_^' );
define( 'LOGGED_IN_SALT',   'r)9DQ;DSDdhRpu^t1S{}#)To<x~}F}{/>?P<rMivhn4.xC?ax^hn2.dTC}qBg#le' );
define( 'NONCE_SALT',       'Pv9nYY?x52~pu7?iBfQ/ECNXuB8,W#pKZF3C#xF;-%1{~|?`OP2jwUfM:^cR{Kn~' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
