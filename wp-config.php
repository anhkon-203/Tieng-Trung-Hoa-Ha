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

define( 'DB_NAME', "4wordsdb" );


/** MySQL database username */

define( 'DB_USER', "4wordsuser" );


/** MySQL database password */

define( 'DB_PASSWORD', 'ZXSBrm2Fcjkqw@123' );


/** MySQL hostname */

define( 'DB_HOST', "localhost" );


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

define( 'AUTH_KEY',         'I6^JiX,s&C`V{!TSDDj0;[6}Q`vU:iIXa0J4EMz`B||3D[H5*z9n<,pGu^eOT1c!' );

define( 'SECURE_AUTH_KEY',  ',^dt`#<a.*OLF6r{k@f(BZrU#Yx9I]UB:]2.7om{}DYgpn.wicd<f/(}5H]oo/0P' );

define( 'LOGGED_IN_KEY',    '5${n`MQ!<)81@9jfGiU0gm/Y>G(RP]zYYuWU>!Bhfubk1?Z!O!S6:gWMy:]W4gNF' );

define( 'NONCE_KEY',        'XR>zh%<`|Jl{|c[b)}n9ybtj^=}j#>[hh:s{.z%RjhQ,xq8*}t(*$<TI%rcZ7VvP' );

define( 'AUTH_SALT',        '8k/O=PM&cF$C>=*&c:$37*%%LM(&SPauC5z?{1hQZ=JME]JDMI+~dnd+XPpfK)m@' );

define( 'SECURE_AUTH_SALT', 'q}[qTp,]N@Qkj+RE3KY4-7X2b_qK!mlLx@ry ]P~Lz7vY0(5vKP}@jz7JFqxGQ9A' );

define( 'LOGGED_IN_SALT',   'i;8j`:v0ZTi&mb{CM%|19nSi&7P:L-+)4CVTSAu|<]+4oFzv)=SUZjh`x$o$eMpL' );

define( 'NONCE_SALT',       'zb:w&>$_]}yUlXSNv.#k83=BX]wI2B<)@|RvTqE]U J~3 b< N#Z(/atYaap+f{j' );


/**#@-*/


/**

 * WordPress Database Table prefix.

 *

 * You can have multiple installations in one database if you give each

 * a unique prefix. Only numbers, letters, and underscores please!

 */

$table_prefix = 'ws_';


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

define('WPCF7_AUTOP', false );


/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

}


/** Sets up WordPress vars and included files. */

require_once( ABSPATH . 'wp-settings.php' );

