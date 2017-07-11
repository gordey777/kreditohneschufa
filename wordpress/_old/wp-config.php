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
define('DB_NAME', 'autismre_kredit');

/** MySQL database username */
define('DB_USER', 'autismre_admin');

/** MySQL database password */
define('DB_PASSWORD', 'maxxtro2008');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '/l4^>N?3#7[2ncQwJ{64lO(/a_5g)DFI*Tez~kpMC)>H%Kp,7zamB8Nmw3enn,Lr');
define('SECURE_AUTH_KEY',  'Mw+^X}J$0af5wC>|rn:xz&(QjhS(tYi(S:Z_Q$f_Yf_A_ pE.Nt; +nyyaLxscet');
define('LOGGED_IN_KEY',    '/vTJ&8=WYQQHi-$FqUYegCaOb4Zhr(~ay**[$9*iA#5,]1BA9I{!O>jF,JFi^5L<');
define('NONCE_KEY',        'Qh~MYl~<@*#p0nN[QoK ^U:a/in-:Tx&L@|D~Ucg#SA>%l{z]G{<+E]b6WXj+wDc');
define('AUTH_SALT',        '}n4rc`}9C-bC$J-!PDLjn)jGG;(J%;2R(u4A0N`)=/(!5Z!}*(}xJ.n>mUu/@5-k');
define('SECURE_AUTH_SALT', 'bO<}YB&fvNO~6%8}=k,1Y,}S;w.B|uEf}%;mZ<-MRBx3$%6jj6>G44& MqhYkdD;');
define('LOGGED_IN_SALT',   ')^]<8QRJ`5E&P>~QfCV*TMT5,v8DNnCuFhss3s$_f>`2?1xccqQcz69!|&cL;LOu');
define('NONCE_SALT',       ',?l]hQ,>TJbvhJ9&!,=*9?~xePGlt%[8Xn!%6HQSZHH?vNr&+w2x]Zd?_X{ECyY$');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
