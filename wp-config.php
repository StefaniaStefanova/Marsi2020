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
define( 'DB_NAME', 'marsok_wp_9df2e' );

/** Database username */
define( 'DB_USER', 'marsok_wp_lwqv7' );

/** Database password */
define( 'DB_PASSWORD', 'UDXxfvtvgzh08%0%' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

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
define('AUTH_KEY', '0&)*KsJz-zl]0t#3:Lz76459YR)8+)3MU/2It8PM55n6;8vE%fuYX2&okdo14hP8');
define('SECURE_AUTH_KEY', '!36f&83p3|)g#8c#Nr:6lPW/]4~~cH/OR|*/FI9vgY7pO9aDN8)g)+NCzita8M6u');
define('LOGGED_IN_KEY', '&8YZ%D74f1%Fd:|57zd77sZnHIs4q_%cB[8@K);80_23Y88C|0oT69P6@p15z6Pw');
define('NONCE_KEY', 'G~L7s/-%6~EDAT97%%0JgYxya#%ryA(;+W~d1rmKl#(Ew8d7Pdj49j;+DK0WevZ!');
define('AUTH_SALT', 'Iu6VGNmCZ4:b4#ZZt;c;mb8%_42(m-6d/6W62RASVA!@)(+d8722zqsj1Yt55&5(');
define('SECURE_AUTH_SALT', '20h5rQ%AKJ6xAJCnz7(!+1@D1*F_C!|0hGqS18;:U+e*p9fOv)ufx8w#_07@KpiY');
define('LOGGED_IN_SALT', '%F6&S+u%7!:5TCYq;&Rx2ds[aT@#8ru*Oc#[|0E#4L@dwE@Dp0Qtj0!np(5ODEZ]');
define('NONCE_SALT', '0~4&L0W6i_h0J]Y5dHQWm-%s-v9oGD~OnZc!XHCN2X1VXmnOwm)e3F|J1a:w]g[7');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'IHTeo4RX4_';


/* Add any custom values between this line and the "stop editing" line. */

define('WP_ALLOW_MULTISITE', true);
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

define( 'DISABLE_WP_CRON', true );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
