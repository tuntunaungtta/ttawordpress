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
define( 'DB_NAME', 'ttawordpress' );

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
define( 'AUTH_KEY',         'kzCbv%M>+^emA[$R];PwmO B]]))Y5)KS]F.7}iTh;EdtEfQ+#.0G0fD(+1WGFnb' );
define( 'SECURE_AUTH_KEY',  '%*SmkQSFPhrA86l11V;stemxzw:YBA&gie$_$-`GFsIum-?)vCNK[KV]IMD:*[1q' );
define( 'LOGGED_IN_KEY',    ';f.%/N/934a2jHT`|hKQJ#5@f|{#GQKa};44gDxybhA )j q(Id@)Eo{Rc{rMb0C' );
define( 'NONCE_KEY',        'QsmWDI;lt$9jFIhxpK!iRt0N2xBM{<o+tQ4yv[^RG>>F*ficx|&%8Xp]/r8>&LpQ' );
define( 'AUTH_SALT',        '=/uNNJjd[5.6Yk0,.F0%=3{t|HU!i6w2iT9R`TH!=PF3>Vs1.H@F2#jBeZD%QGJE' );
define( 'SECURE_AUTH_SALT', 'UOA~]_5%8J):1l_!Aci:L{v5qnx|Ve=Mjf(!.0.Gttuk%]my$L{t~5!Y.fpt0%Md' );
define( 'LOGGED_IN_SALT',   '0VC``Y^=>r)3B`g@pK S)?cR#a_H{i|26gz.f:=;;Nnsw%;PD/HJS Q/C>>_QObq' );
define( 'NONCE_SALT',       'wlhg1,2a{CXH|JXSqc~T;b^S^jT~g`J{+IlMmZ VS.A]51>^]|&kTA6}IokwOOT:' );

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
