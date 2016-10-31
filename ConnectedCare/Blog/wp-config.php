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
define('DB_NAME', 'site519_wp');

/** MySQL database username */
define('DB_USER', 'site519_wp_user');

/** MySQL database password */
define('DB_PASSWORD', 'Sw3eTz9LVYjkPAqk');

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
define('AUTH_KEY',         '=Ny3I?U@xSJvXeuK~ro%%IZ!:t8{!I]Tr0S,JH4q(_p6o)0NZ!j/^/{f7l.I0009');
define('SECURE_AUTH_KEY',  'tXUz&I_{RZaxw!k/ :UM)9dv[.9=G^JdQZW?Nh.F${)k5%im9t$wkfLP#XR,G59Q');
define('LOGGED_IN_KEY',    '6J1rrTSw2a@8ho;g}AiN{|:O`j4Db8`7{fI`GM_jk`/fOH[xvMXl O]|WEMvKb%W');
define('NONCE_KEY',        'Mgr<^Cr37/p0w7W|#zTCxb;ARR2zyA^ys6>V/K@KqLg0-@udNHyJc`*i+X;~U],`');
define('AUTH_SALT',        'HA[PL,~*Q1FLR5QM6,Ss18vNj&A7|*CE$Sp/.@<? ,i%lkj;H|ptYR!o=U,*Fn2I');
define('SECURE_AUTH_SALT', 'ZBXM[|IesJMkH;c_[BSeedJNY x;>5u5}w[w#.KO_y -jB5W_<;8iZ%)#k!A0MaA');
define('LOGGED_IN_SALT',   ',ebw/5HG|`;k#(q8~Jq+,?K}HS3Qi7vqm?o!Aj}HZ!Z#=Em(uu$[2a1j=!~-d=4G');
define('NONCE_SALT',       ';;1K9+]{-Awiq5rK2A)LOYUThcBkYi_`MjDA%/ :0`[F-%tpaOz{ 54@v/Jg<nxo');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp';

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
