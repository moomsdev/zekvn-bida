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
define( 'AUTH_KEY',          'v?t/(9iC64 7H-ZI379w0LTGaH#RgJTba.M1$wFYD9?{;?L[c( gtA*8={uF8x]a' );
define( 'SECURE_AUTH_KEY',   'Vr{JrA?Ld!LqQw4vsJY2J t^0vFK!L(zFI_lzM,rFiJ[=R Pmi]vmj0v* O.QZ^k' );
define( 'LOGGED_IN_KEY',     'ImZ}VDV7 H7J`1qsuQLNhGaG;JxrT{C/D%BogZ]z_wbXNWKK$v4)1A_:lf2ff3ta' );
define( 'NONCE_KEY',         '~lw4^5L2Ku1W3F-h#2bE(Qs`Qoh@j$U]h~e66^zr>)6oEB%cdQ:NAvd-+y[P:,eP' );
define( 'AUTH_SALT',         '2f[]JCQr12iX.1!WZ&H,RJ1;B^q};Kw1R#d Fw.605}z|??k2$UaJWsOVK,c(,5Z' );
define( 'SECURE_AUTH_SALT',  'BpI[j$?JAB#L+,2@OsA,Mq*tuXH>3 3v:S90!Ou@SYQ<DnAJXJQJVPlZiN:Bt&Q!' );
define( 'LOGGED_IN_SALT',    '5)oz&gkh l8+E5~Rn2E66=z5XVPs^_,~UVhURv94/5y2MGwdDum/#oX%nj@*:tn ' );
define( 'NONCE_SALT',        'XUt1ht-]=I/M.uEAFH ECE-LpIHNm1_Z4,$god~Dk>&}/Gg&,|J!x:m)eCxMPS,`' );
define( 'WP_CACHE_KEY_SALT', 'Ek)2d&0i{2vr_F_-YeOA_:7vnkfG*e%9u-,;H54dGGNT?]v]K=o;wez.B~l1]i9%' );


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
