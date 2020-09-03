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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'technerds_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'hN>DHpKN$*V(I#?zBFVEtItY0P O.X0F-Col[tD!o!{9LC+<?Ocv+~4[|cOvX5jM' );
define( 'SECURE_AUTH_KEY',  '2,yd<j2?I$ $/u}=&|lL&2z8Sf]&KvqRSM)k{ns8<r_FEI)vc9P#6Q@|[EaT?!&~' );
define( 'LOGGED_IN_KEY',    'WfYTtf%GV7.Kz4iq OA(:}9Kgb,-QJDE|y0tYlf}<_0/uq!I61{_HcB&z],0^<!S' );
define( 'NONCE_KEY',        '-8Yr>9tPQq#fRQiL]+Ui |852!*0]O19pNjOHVBOQ|l-w0R|y6f{xcw1:weaMa:k' );
define( 'AUTH_SALT',        'kOz7+6.E,DrNjoErJ.#{{h3-Rq+^^Cu/[`AJw-{CD3EyB<MiaSH`[fu)I`#w5QIw' );
define( 'SECURE_AUTH_SALT', 'Lv{ 0?ebgL<DQU30vtoQ~),PCo2>LbSS}6ta:!tr^Sy0([%ZE@TrKJ.yXt%o  ![' );
define( 'LOGGED_IN_SALT',   'v0Q`bcO+U.t+_F&:pO2@K8w(^Am{g2=($jKfN1m~W}_Vnr^|7`-h(B]enZ6<RS<k' );
define( 'NONCE_SALT',       's=stpw9OHcPDaD@9[*C!s!3/1I|WL[<h+;eZ-adw7UzD%})H!H@G;M/c0_cHBp )' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
