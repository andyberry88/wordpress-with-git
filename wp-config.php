<?php

define('MAINTENANCE_MODE', false);


/* AFTER FORKING THE REPO DELETE THESE LINES                */
/*  - these are default values I use for testing the repo   */
/*    the values can be set further down                    */

if (empty($_SERVER['SERVER_NAME'])) { $_SERVER['SERVER_NAME'] = "devserver"; }
define('DB_NAME', 'wordpress-with-git');
define('DB_USER', 'wordpressWithGit');
define('DB_PASSWORD', 'aVerySecurePassword');
define('AUTH_KEY',         'Wo~rz<p4K]I*@WXv6XcY[h8Tm$l^]KG&$0N_*gKq:ZQz+sB.Yu/e4mh+-1c24Pbi');
define('SECURE_AUTH_KEY',  ';k9SET{xZTmaPz>q*b`u,?^PP@83a]dhS}eZ[+)yT|(fjAU+fcLcbWB{3&~rY@?/');
define('LOGGED_IN_KEY',    '3<[mFbRq10vS y|TBaJa^|_Bgl,1oW|8.Gj+*p?|!4Iw}i_Es#x29]?B3* jSG=q');
define('NONCE_KEY',        'CZJ5;g`m_$c~w)^7V|.,fB}|jr[-ZAjy;d~g||_To%fpyh/;mTf@_t^=Wc;p*r>:');
define('AUTH_SALT',        'tz32Iw-pmIHX4frZkOqr>Ls%W.u^w8jK8s-Br5zx6Y +x+J+:G>Zj(a~+bph=6Zg');
define('SECURE_AUTH_SALT', 'Szi9NwH0@3s`d>ha!Q5b/KBL)[;Pi5#`=RMbJTq&}6+YIG%eujb2;2L?l>O++TtP');
define('LOGGED_IN_SALT',   '[:eP3-9CWFBU1k?gegs(~)N5+6*gNoKE-SpzXo~W(u:|+S/_Df5n4H(Mj)e&Bgp~');
define('NONCE_SALT',       '[+J`#oq-/~S}TjufSk,}p?/L~?Vsk;)/R0=OoNo{ceAn?KN=S]qgT~lRDR{F11{;');

/* ********************************************************* */


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

if (empty($_SERVER['SERVER_NAME']))
{
    $_SERVER['SERVER_NAME'] = "<YOUR.DOMAIN>";
}

define('WP_SERVER_NAME', $_SERVER['SERVER_NAME']);
define('WP_SITEURL', 'http://' . WP_SERVER_NAME . '/wordpress');
define('WP_HOME',    'http://' . WP_SERVER_NAME);
define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/wp-content');
define('WP_CONTENT_URL', '/wp-content');
define('WP_PLUGIN_DIR', $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins');
define('WP_PLUGIN_URL', '/wp-content/plugins');
define('PLUGINDIR', $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins' );
define('WP_DEFAULT_THEME', '');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', '<DATABASE NAME>');

/** MySQL database username */
define('DB_USER', '<DATABASE USER>');

/** MySQL database password */
define('DB_PASSWORD', '<DATABASE PASSWORD>');

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
define('AUTH_KEY',         '<GENERATE SOME KEYS>');
define('SECURE_AUTH_KEY',  '<GENERATE SOME KEYS>');
define('LOGGED_IN_KEY',    '<GENERATE SOME KEYS>');
define('NONCE_KEY',        '<GENERATE SOME KEYS>');
define('AUTH_SALT',        '<GENERATE SOME KEYS>');
define('SECURE_AUTH_SALT', '<GENERATE SOME KEYS>');
define('LOGGED_IN_SALT',   '<GENERATE SOME KEYS>');
define('NONCE_SALT',       '<GENERATE SOME KEYS>');

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


/**************** Custom config ****************/

/**
 * force direct access when adding plugins
 *   ie. dont try to ftp files
 */
define('FS_METHOD', 'direct');

/** 
 * uploads directory
 */
define( 'UPLOADS', '../wp-content/media' );

/**
 * post revisions
 *  -1 = store every revision
 */
define( 'WP_POST_REVISIONS', -1);

/** 
 * empty trash every 2 weeks
 */
define('EMPTY_TRASH_DAYS', 14 );

/**
 * set php memory
 */
define('WP_MEMORY_LIMIT', '64M');

/**
 * disable wp-cron - we do it ourselves via a cron job
 */
define('DISABLE_WP_CRON', true);


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/wordpress/');


function is_user_logged_in() {
    $loggedin = false;
    foreach ( (array) $_COOKIE as $cookie => $value ) {
        if ( stristr($cookie, 'wordpress_logged_in_') )
            $loggedin = true;
    }
    return $loggedin;
}

if ( MAINTENANCE_MODE && !stristr($_SERVER['REQUEST_URI'], '/wp-admin') 
		&& !stristr($_SERVER['REQUEST_URI'], '/wp-login.php') && !is_user_logged_in() ) {
	if ( file_exists( WP_CONTENT_DIR . '/maintenance.php' ) ) {
		require_once( WP_CONTENT_DIR . '/maintenance.php' );
		die();
	}
}


/** Sets up WordPress vars and included files. */
if ( !defined('LOAD_WP') || LOAD_WP )
{
    require_once(ABSPATH . 'wp-settings.php');
}
