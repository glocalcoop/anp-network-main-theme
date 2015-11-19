<?php
/*
Author: Pea, Glocal
URL: htp://glocal.coop
*/

/************* FUNCTION TO CHECK IF PLUGINS ARE ACTIVE ***************/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/************* INCLUDE NEEDED FILES ***************/

/**
 * Core functions
 */

require_once( trailingslashit( get_template_directory() ) . 'inc/bones.php' ); 

/**
 * Enqueue styles/scripts
 */

require_once( trailingslashit( get_template_directory() ) . 'inc/enqueue.php' );

/**
 * Custom functions
 */

require_once( trailingslashit( get_template_directory() ) . 'inc/custom-functions.php' );

/**
 * Theme options
 */

require_once( trailingslashit( get_template_directory() ) . 'inc/theme-options.php' );

/**
 * Helpers
 */

require_once( trailingslashit( get_template_directory() ) . 'inc/extras.php' );

/**
 * Helpers
 */

require_once( trailingslashit( get_template_directory() ) . 'inc/helpers.php' );

/**
 * Admin
 */

// require_once( trailingslashit( get_template_directory() ) . 'inc/admin.php' );


/************* COMMENT LAYOUT *********************/




/************* REMOVE UNWANTED THEME SUPPORT OPTIONS *****************/
// http://codex.wordpress.org/Function_Reference/add_theme_support
// http://codex.wordpress.org/Function_Reference/remove_theme_support

function glocal_custom_theme_support() {

	// Turn off support for custom background
	remove_theme_support( 'custom-background' );

	// Turn on support for custom header image
	add_theme_support( 'custom-header', array(
		'header-text' => false
	) );

}
add_action( 'after_setup_theme', 'glocal_custom_theme_support', 60 );



?>
