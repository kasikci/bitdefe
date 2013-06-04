<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bitdefe');

/** MySQL database username */
define('DB_USER', 'bitdefe');

/** MySQL database password */
define('DB_PASSWORD', 'B1td3f3@st');

/** MySQL hostname */
define('DB_HOST', 'bitdefe.db.7958300.hostedresource.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'ade)eT*%FZ7|tIR?FFe>%H} 0pa&v-w%hV`YyK-6~k;Vk#^r^+K&yp]`}.w,KUg.');
define('SECURE_AUTH_KEY',  'p_(o_}e#t|ZB$>k6)SZ!&+8p$4I;BhF#@a<WJsVtl*$mZ8wgR+Euu={`f!1on)Ik');
define('LOGGED_IN_KEY',    'ex+Uqa)QXLG;|~8P)g27-+X)*2!t2sd@47|DMhFB8`ZEQ-K.4|c;a1|gTA4_dLv7');
define('NONCE_KEY',        '}Pm2&&.e|]@|^1erdl=7XMh~+Io+-,paU~nA`RZ[sTwuSiV/)4cM+6Hx]d[BUoU1');
define('AUTH_SALT',        'Z!-E-Lrq!]H{fB-( zeR6%+sD)8b-v[ySoA=KoCX<+~E2eP4fJ!lU(%LJAHienxP');
define('SECURE_AUTH_SALT', '|c_yuXHpRT}R+LCcCiW!t|bXG&1Yq,#F4~W7jtX%M4=6@s|-t=g*OO}8$9:[by7:');
define('LOGGED_IN_SALT',   'ZKI2Kc>B2[>~>ON?*V_WsCj^h+|%xf}a9p>EXi9u(JN@ri+{ZD6D?-Up+F80Q1<h');
define('NONCE_SALT',       'aO`%]lkb(u$DQ14<>)IQpl7r@,H<n01|#Hc(Sg:2&iYpn!eMl}H>)w>gXxikULrl');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
