<?php
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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'site6' );

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
define( 'AUTH_KEY',         'AX{TeVXF6>oJ$}!ysT_{p^C$_9HAo)=utui8Z^=E|e2}bpmlmTPx5:FY?Nr b-|7' );
define( 'SECURE_AUTH_KEY',  '{>)Jjd Q.6O,`Z2]Y>gOa!s+hxFdGA?3/)XN{bZt+AlbyzivJ*QzF9Zz}_Y+-(/2' );
define( 'LOGGED_IN_KEY',    '=a>&id*X?!H!oUrbD)c;{QNeQ3tvwOOpJ<X!/#N9J`tDu6~`u-k@p5zIABJ@e %$' );
define( 'NONCE_KEY',        'sZ=Y3$@Y#=Z=Q{q{Qr&Q`qNfXa,]ZVuMWqWspi_3I^C:_^o`ZM1i8y3,}lcCmpU!' );
define( 'AUTH_SALT',        'f.JJx!-J2b7Vd&a?{gB`p7kDi!E}7y/^-@xvbdCI*Z3h<X.l^(W_-ah%Yth9fNl9' );
define( 'SECURE_AUTH_SALT', 'h7DpP Fn.I:QhV{C23A2Z|Re*eilaZf0yUYZfIBwd$-|0:BoJN]Wh.v=|ajm@dq(' );
define( 'LOGGED_IN_SALT',   '5l )oe!rUhhrt{?|CsCl}TBK4fpkMO%oD]/t6B=}3h.o!Ah3`Y~}F)2^F0.s@Yrw' );
define( 'NONCE_SALT',       ']@Q!8ijvcojLq.j}G%o9`jBXfqwGrmtQn*r/zNABa],Eke)f{7eR$DsX]$3k4=%y' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
