<?php
/*
Author: Pea, Glocal
URL: http://glocal.coop
*/

/*
 * Theme Features
 */

if ( ! function_exists( 'anp_theme_features' ) ) {

	// Register Theme Features
	function anp_theme_features()  {

		// Add theme support for Post Formats
		$formats = array( 'gallery', 'image', 'video', 'link', 'aside', );
		add_theme_support( 'post-formats', $formats );	

		// Add theme support for Semantic Markup
		$markup = array( 'search-form', );
		add_theme_support( 'html5', $markup );	

		// Add theme support for custom header
		add_theme_support( 'custom-header' );

		// Add theme support for Translation
		load_theme_textdomain( 'glocal', get_template_directory() . '/library/language' );	

		// Loop Pagination
		// Provides a template tag for adding pagination to multi-post pages (e.g., archives, blog, search)
		// http://themehybrid.com/docs/hybrid-core-extensions
		add_theme_support( 'loop-pagination' );
	}

	// Hook into the 'after_setup_theme' action
	add_action( 'after_setup_theme', 'anp_theme_features' );

}

/*
 * Thumbnail sizes
 */

add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
add_image_size( 'bones-thumb-150', 150, 150, true );

/*
 * WP Menus
 */

add_theme_support( 'menus' );


?>
