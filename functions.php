<?php
/*
Author: Pea, Glocal
URL: htp://glocal.coop
*/

/************* FUNCTION TO CHECK IF PLUGINS ARE ACTIVE ***************/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/************* INCLUDE NEEDED FILES ***************/


// require_once( trailingslashit( get_template_directory() ) . 'inc/bones.php' );

// Get the template directory and make sure it has a trailing slash.
$hybrid_base_dir = trailingslashit( get_template_directory() );

// Load the Hybrid Core framework and theme files.
require_once( $hybrid_base_dir . 'library/hybrid.php' );
require_once( $hybrid_base_dir . 'inc/theme.php' );

new Hybrid();

/**
 * Custom Functions
 */

require_once( trailingslashit( get_template_directory() ) . 'inc/custom-functions.php' );

/**
 * Enqueue
 */

require_once( trailingslashit( get_template_directory() ) . 'inc/enqueue.php' );

/**
 * Extras
 */

require_once( trailingslashit( get_template_directory() ) . 'inc/extras.php' );

/**
 * Helpers
 */

require_once( trailingslashit( get_template_directory() ) . 'inc/helpers.php' );


/**
 * Customizer
 */

// require_once( trailingslashit( get_template_directory() ) . 'inc/customizer.php' );




?>
