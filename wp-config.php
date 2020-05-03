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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '123456' );

/** MySQL hostname */
define( 'DB_HOST', '172.19.0.2' );

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
define( 'AUTH_KEY',         'o%]Gttos5ms/MLYH+0&%]8mi]#[m7h6~98![O32T,2l6HO5/MGZ6+t9IX+kUSe>G' );
define( 'SECURE_AUTH_KEY',  'B,ve>{`|_AK2@1l ;j%^P+%LIx;]@p-LP&4[.[QFMpB,N}I7y$Z^rk74T|HgY=K#' );
define( 'LOGGED_IN_KEY',    'Y0itCR# 7upY},n3_8NL3>v&9T9,2fV[?1:H/$|S(B=y@[l6`8|G:/4J/K]ts~TA' );
define( 'NONCE_KEY',        'aBKnP#GMki!k!F^8%W0*3/vI8ox,LUpz/ce{kti}]s`6.?QGUg[gwa<nq:ZWG`cv' );
define( 'AUTH_SALT',        'INChb{Z.zL89fH7@v0/,W1:<2;_~93AStb,h1huY0K%:n~cQ-8^kw]T#sHxaZuxy' );
define( 'SECURE_AUTH_SALT', '9u&o+L8(9>Nti]:qcDCgRep$#U[q<%a<l2=an?1PeY}|;; $#&)?0l[`C{;5]*4|' );
define( 'LOGGED_IN_SALT',   'F`IcsrBRo;P5`r}>Um8M#^Nth(<YZzjNep`-#6N6Fj(IiASRhF)}&`+rf /BE0_X' );
define( 'NONCE_SALT',       '~{p8kN<A)DavcR&g|@]*#0;*-,-~Y2Q9r=<)pWHj_X.>e!xrjPA17HC|sW?}UCRq' );

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
