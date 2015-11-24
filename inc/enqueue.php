<?php
/*
Author: Pea, Glocal
URL: http://glocal.coop
*/

/*
 * Enqueue theme scripts and styles
 */

if(! function_exists( 'anp_scripts_and_styles' ) ) {

	function anp_scripts_and_styles() {

		// Load hosted version of jquery for template using isotope only
		if( is_page_template( 'page-directory.php' ) ) {
			// Deregister WP jquery
			wp_deregister_script( 'jquery' );
			// wp_deregister_script( 'jquery-ui-draggable' );

			// Hosted jquery
			// wp_register_script( 'jquery', 'http://code.jquery.com/jquery-latest.js', array(), '', true );
			wp_register_script( 'jquery', 'http://code.jquery.com/jquery-latest.js', false, null);

			// Enqueue style
		    wp_enqueue_script( 'jquery' );
		}

		// Responsive Slider Script
		wp_register_script( 'responsive-slider-script', get_template_directory_uri() . '/assets/boxslider/jquery.bxslider.min.js', array(), '', true );

		// Responsive Slider Styles
		wp_register_style( 'responsive-slider-stylesheet', get_template_directory_uri() . '/assets/boxslider/jquery.bxslider.css');

		// Isotype Script
		wp_register_script( 'isotope-script', get_template_directory_uri() . '/assets/scripts/isotope.pkgd.min.js', array(), '', true );
		
		// Civi Theme Stylesheet
		wp_register_style( 'glocal-civicrm', get_template_directory_uri() . '/assets/styles/plugins/civicrm.css');

		// Main Theme Stylesheet
		//wp_register_style( 'glocal-stylesheet-dev', get_template_directory_uri() . '/style.css');
		wp_register_style( 'glocal-stylesheet', get_template_directory_uri() . '/style.css');
		

		

		// enqueue styles and scripts
	    wp_enqueue_script( 'responsive-slider-script' );
	    wp_enqueue_script( 'isotope-script' );

	    wp_enqueue_style( 'responsive-slider-stylesheet' );
		wp_enqueue_style( 'glocal-civicrm' );
	    //wp_enqueue_style( 'glocal-stylesheet-dev' );
	    wp_enqueue_style( 'glocal-stylesheet' );

	}

	if ( !is_admin() ) add_action( 'wp_enqueue_scripts', 'anp_scripts_and_styles' );

}

?>
