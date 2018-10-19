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

define('DB_NAME', 'i4409757_wp1');



/** MySQL database username */

define('DB_USER', 'i4409757_wp1');



/** MySQL database password */

define('DB_PASSWORD', 'T.HACHAVv4FE4LPNimY84');



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

define('AUTH_KEY',         'BmXke9d9Svdj2v2BDZVxNOFsSM0yoJ28YT2Rb1Kap5VpD485qD2yJO9pt7Uz3m8n');

define('SECURE_AUTH_KEY',  'ro0MhPnTZd5XJd92n4hf4tsjjiDsEKdvteTduL4RCTYNRKLYmFTMkVA0thF5ldj7');

define('LOGGED_IN_KEY',    'prmTM8fwfXrpnPXrcfmckElNV1pythfbwLawElfQEdlNjICIdnbkYEyErclY2tDs');

define('NONCE_KEY',        'RCOI10kMQpmww9mlXTqCcJQKNpa6OwsOezQQcgcwhhswy5rsLIIYoRRklpORRqfS');

define('AUTH_SALT',        '6mvhXRh290ZZAoXCFQcpfrpB1umWfVfjBuUWbAfjUMpxqUHAfaoqGHg5P8M6h4c5');

define('SECURE_AUTH_SALT', 'KIEjSzmMthiY79CuQbEIpCBwrItDibGUpBf57nQLpKqGDNxNZHxVltCVOMKxluUU');

define('LOGGED_IN_SALT',   'Vg4ersynq0sMKMFIzn6f6M3n28pzYQEa76dipH6OeU5hpJrwK5mIxjEGMuXiYAwj');

define('NONCE_SALT',       'hTnpsXBW8bw2st8ksAHfGeFkda9p0FfCZ22QvCw7RCtb2urObytSh8Y1S3n9PjFT');



/**

 * Other customizations.

 */

define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');



/**

 * Turn off automatic updates since these are managed upstream.

 */

define('AUTOMATIC_UPDATER_DISABLED', true);





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

/* set max memory limit */

define( 'WP_MEMORY_LIMIT', '128M' );
define( 'WP_MAX_MEMORY_LIMIT', '300M' );

// set time limit for content importing

set_time_limit(300);


/** Absolute path to the WordPress directory. */

if ( !defined('ABSPATH') )

	define('ABSPATH', dirname(__FILE__) . '/');



/** Sets up WordPress vars and included files. */

require_once(ABSPATH . 'wp-settings.php');

