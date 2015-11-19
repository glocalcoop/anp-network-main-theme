<?php
/*
Author: Pea, Glocal
URL: http://glocal.coop
*/

/*
 * Theme Options
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


/*
 * Sidebars
 */

if(! function_exists( 'anp_register_sidebars' ) ) {

	function bones_anp_register_sidebar() {
		register_sidebar(array(
			'id' => 'sidebar1',
			'name' => __( 'Primary', 'anp-main-theme' ),
			'description' => __( 'First (primary) sidebar.', 'anp-main-theme' ),
			'before_widget' => '<div id="%1$s" class="widget primary %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'id' => 'home-modules',
			'name' => __( 'Homepage Modules', 'anp-main-theme' ),
			'description' => __( 'Modules for the Homepage', 'anp-main-theme' ),
			'before_widget' => '<article id="%1$s" class="module row %2$s">',
			'after_widget' => '</article>',
			'before_title' => '<h2 class="module-heading">',
			'after_title' => '</h2>',
		));
		register_sidebar(array(
			'id' => 'home-sidebar',
			'name' => __( 'Home Sidebar', 'anp-main-theme' ),
			'description' => __( 'A homepage widget area.', 'anp-main-theme' ),
			'before_widget' => '<div id="%1$s" class="home-sidebar">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="module-heading">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'id' => 'footer1',
			'name' => __( 'Footer 1', 'anp-main-theme' ),
			'description' => __( 'First footer widget area.', 'anp-main-theme' ),
			'before_widget' => '<div id="%1$s" class="widget footer-widget-1 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'id' => 'footer2',
			'name' => __( 'Footer 2', 'anp-main-theme' ),
			'description' => __( 'Second footer widget area.', 'anp-main-theme' ),
			'before_widget' => '<nav id="%1$s" class="widget footer-widget-2 %2$s">',
			'after_widget' => '</nav>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'id' => 'footer3',
			'name' => __( 'Footer 3', 'anp-main-theme' ),
			'description' => __( 'Third footer widget area.', 'anp-main-theme' ),
			'before_widget' => '<div id="%1$s" class="widget footer-widget-3 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'id' => 'footer4',
			'name' => __( 'Footer 4', 'anp-main-theme' ),
			'description' => __( 'Fourth footer widget area.', 'anp-main-theme' ),
			'before_widget' => '<div id="%1$s" class="widget footer-widget-4 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'id' => 'social',
			'name' => __( 'Social Widget', 'anp-main-theme' ),
			'description' => __( 'Widget area for social links.', 'anp-main-theme' ),
			'before_widget' => '<div id="%1$s" class="social-links %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));

	} // don't remove this bracket!

}

?>
