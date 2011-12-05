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
define('DB_NAME', 'bts');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '*zqDDxe#<,@igNs775^9ymRnSZ8G+_W 7^P+i8 L}o,KpZ1xH`Q;@XtKB(nP`r9$');
define('SECURE_AUTH_KEY',  'WIo @Q- =P+`Cvlxm$LO,W])|R+d|`!%<AJ:ogc!Oe+8]e=|8-LC.@*5yW=~D2Fu');
define('LOGGED_IN_KEY',    ';>+u3:nC;CdYuitwDtap-_L33}pjB;]IJ,Gir<y+-r=t9=H<eK]B5mJ|>[UVZH:2');
define('NONCE_KEY',        '>4RlZf1Ck[Ap)75@2/q-0 |S6Qn/w+Tb9WCE$I!3ZcJ^DGKFV+z>by|+/=q 3wp?');
define('AUTH_SALT',        '@I~o41UHhy}ld57K!~M/jp2L5WJwc/)5f.oq`_@F/ps-CRSp,8$nd`4_C;/g@} _');
define('SECURE_AUTH_SALT', 'dJ|*|(uR*Q`0Mf3z71#r[dP,4vD(EhF&WFd3$/$f6=:.+HN01+8x|>[q<Geh&l|o');
define('LOGGED_IN_SALT',   'b5Z0tx*HFOWeyuN}P3DDsi=ZZq=qD0~ymp#[[CBC sX6Im~w&ZI1IpoM.e8`~W6e');
define('NONCE_SALT',       '#tlg>`xv~y=m37o@m**w(,;<,1?uYu%llU/0X*gweXgk 70#f-w@a0.t*#P&!ja-');

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
