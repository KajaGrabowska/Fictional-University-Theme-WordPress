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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'E+YdhZ3/zgArDZruSKcTf7YxGF71kfCH2amAE5S0QiIuM8FnwUus0F16Dx/MxoRXFaSV8+1dLdbaWLwNUxvvpg==');
define('SECURE_AUTH_KEY',  'NA13soqoKzC6WZdZleFee0OedhmRtvwtgD1AL9RRBjCNeWLOIfP1DRbzBHJyPHpx0gQ1mwLTw+dPHoEacVEgWw==');
define('LOGGED_IN_KEY',    '7KQoSXm9iNpHySZhjKPRoekYFrvamPWBzxODe1mFcStlShNTWapC/hrI1AbU4aOUyKTUr4TKW1kb5MxXP7ty8g==');
define('NONCE_KEY',        'bTlTvlvuz868lzUCKYhO+FTKk4yKiBaVGSJiIRsESkdOmIJ1r4b1z2815zzoe5X07Y0Sa/49xAK/eaC9SJpYyw==');
define('AUTH_SALT',        '2qqaq0Gff+jZ6OQNEDujmyakulUp1O6Eyw1kUokFeZBvZ0UkgTYQfdrhHnGVO4smuGqQx7V0bsOX2MIVaqC/WQ==');
define('SECURE_AUTH_SALT', 'bh0WxRBRNPciq4N4YWi1jSZQlyo/vff5aL6S21D0ENypJLx4XAyjs0dr2xSa8gWjiS+PDFSYeoW3lG91JuhY8Q==');
define('LOGGED_IN_SALT',   'lsLBPYcBY0KlYG3Oz6QP8NqslksTlEHWXwz2fjIVMrtW6EWI/3Yk1QG/hMth8BDmd76Zbnu69G7XyaUVFj4Ajg==');
define('NONCE_SALT',       '9MNihgrabWmhlmNgzo73UULG5rSvsC6OOzpB0FdZDMzhtfAVyEjnyJofhLLwQKqMa70m3W88Z0mbI5mGVlhSYA==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
