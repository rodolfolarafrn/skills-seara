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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          '8cqU!;N1j@zM^4n,viMnm&m1_-$M8jyRzH?SJ3H+Kq/Auq<9k:;8M24u2l];1Huc' );
define( 'SECURE_AUTH_KEY',   'D.EbO8NFjV0yGkp8LI$PF[ixSgUU7dLn5aVXj5RSk?~21HC9LMAiO*dm{`C8k3_*' );
define( 'LOGGED_IN_KEY',     '<=P<|J 4MwMF4ta0;Jg*WJ@7r<~|z{g;MvX]ynI2erG#o^GNihL);eynO#^Fi9J>' );
define( 'NONCE_KEY',         '0~R&~KF0$x=j-S,XYVzkKJd$OK^OQxhw-1qtc>,kjESmA%T+ yL)bSU-0^J#KJb7' );
define( 'AUTH_SALT',         '`cDyom^{((+Y5vFM%>~Uur03[F<7KkL&qQ*gKZ!kxyWzPH~~P1NivL>>rGD%m +`' );
define( 'SECURE_AUTH_SALT',  '%x|SL?V!crE`PS;Qk^AW3<8hb?}T$D%#+d4$clS8Ql*%Xa{4nF8$7P@x<H,:NwmN' );
define( 'LOGGED_IN_SALT',    '#cy/0_JDIin^Ue4yw.+%li/oN_8u+J~jo>QIx2bV7;):^$aeS@UKRGCUJ<yQ,^2C' );
define( 'NONCE_SALT',        'q%/x#;QQZNmr-`2Lr[nQQ`,#w0Uwac2C0i4@1Ksj2Bd/qxv.^0MyTIRx1tWwpG8I' );
define( 'WP_CACHE_KEY_SALT', '>xVtRWK< 5|; Wl0VHjhv-bQLiA_Qg{XxLZ`cwzp/&>Tbzonl$u$fE,D( 9rbOul' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
