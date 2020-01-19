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
define( 'DB_NAME', 'aula' );

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
define( 'AUTH_KEY',         'v8?EN_nM:G`rm$lP;Q{1xxv9{~933P);pD&(^U2em=h?2I9tXbX<jkcT,tW:1Ry.' );
define( 'SECURE_AUTH_KEY',  '9IgqU2 f$*$m:KOxz,JYu/#%[}O_j{Mr20<E];c`ph;;dVDR:5s~oCQ}Q;:Srqi9' );
define( 'LOGGED_IN_KEY',    '5IUTuDp)=~;uWJ2<![9yVAR02[2r<1!/(V!#eJ:ZKH!_r8O%aDPhFFhnu&yYI,la' );
define( 'NONCE_KEY',        '@=zg|TFY$/~I)KSZgi`W+?[p>~*!fA>u-]#$^<$6jM1A|?>&z23ZSG$:~e^5U/E~' );
define( 'AUTH_SALT',        ']tMGHvdOyPqFiGrOf0L?cBtm<pOR-oS$~eekp0D{y(7iDYFnL^$tksK/OdYh;_Bm' );
define( 'SECURE_AUTH_SALT', 'Q:mqHX[BomeuB.nrZA4&of|L(ZGF;h){=X8@6/oUID)S7bpd%3k&M^n#{2]TW37<' );
define( 'LOGGED_IN_SALT',   'Arf#IPkl.VJ:jjrgK{Q?n<BiLCmDer%QH/&$ru0*E[xvd;!K>ZQ77-KZ)!USf#Y-' );
define( 'NONCE_SALT',       '(poqpgKmu/7?%cY2yfPTUs;JMNlDX12,.%[IjnPc!pLqH/{u^ZfG~!2)B1i:X-Fe' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
