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
define( 'DB_NAME', 'mjpay01_testblock' );

/** Database username */
define( 'DB_USER', 'mjpay01_testblock' );

/** Database password */
define( 'DB_PASSWORD', '3rT(jfS@66' );

/** Database hostname */
define( 'DB_HOST', 'mjpay01.mysql.tools' );

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
define( 'AUTH_KEY',         'q:o*;*8BFf*]Si5L5GWoE`A@X[{)d<V<dBX,g}R/iYyI:bbbjcqr^daH*Z4p}Ev.' );
define( 'SECURE_AUTH_KEY',  'dZ|B3I3/g@`VSsIzW+W)jW[6b^ ((fjR|XgE2R]x]KaF$PztYv+`]<iD$pjNBn/-' );
define( 'LOGGED_IN_KEY',    '@AyGGA?ZZ !oB:;P>_soFtFttT(%+0kc/7l6{$naq=YH^Tzis`l$9KF0TH(D yPO' );
define( 'NONCE_KEY',        ';3Mr4CK7[bBVIW-79EdByh>n$rV;C(^}aAK$d@N917,fhB4[Nl{i|c(E)9EGG&gI' );
define( 'AUTH_SALT',        '$g$.QIf8L0rS3gm?x<W&((3h:B=rU4T!TS~Rn)P=fMF8!MIu_QLP*uL+SXW%`_:w' );
define( 'SECURE_AUTH_SALT', 'nXHJLsXs-Dl3)R}65XzV-x8|k)(G#_;]nE0!^ 6bm?whTtm[4/h.]s`29?4Cl+I=' );
define( 'LOGGED_IN_SALT',   'Kz6N8kY_+w<<?5fmkGa=No[^c!P2sP5v=Oa=!x]Sud1[|wZ`E=Fm?9$*X46=2DoW' );
define( 'NONCE_SALT',       '7K/bC2BUpC}(QF<0^$}S(K8W*H#+)]Hc#JT#EuHx21nVj{i@Pq]S2EV`ZcB95ND3' );

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
