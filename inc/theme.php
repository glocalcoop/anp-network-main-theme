<?php

# Theme setup
add_action( 'after_setup_theme', 'anp_theme_setup', 5 );

# Register custom image sizes.
add_action( 'init', 'anp_theme_register_image_sizes', 5 );

# Register custom menus.
add_action( 'init', 'anp_theme_register_menus', 5 );

# Register custom layouts.
//add_action( 'hybrid_register_layouts', 'anp_theme_register_layouts' );

# Register sidebars.
add_action( 'widgets_init', 'anp_theme_register_sidebars', 5 );

# Add custom scripts and styles
add_action( 'wp_enqueue_scripts', 'anp_theme_enqueue_scripts', 5 );
add_action( 'wp_enqueue_scripts', 'anp_theme_enqueue_styles',  5 );


/**
 * Sets up the ANP Main Network theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */

if ( ! function_exists( 'anp_theme_setup' ) ) {

    // Register Theme Features
    function anp_theme_setup()  {

        // Add theme support for Post Formats
        $formats = array( 'gallery', 'image', 'video', 'link', 'aside', );
        add_theme_support( 'post-formats', $formats );  

        // Add theme support for Semantic Markup
        $markup = array( 'search-form' );
        add_theme_support( 'html5', $markup );  

        add_theme_support( 'menus' );

        // Add theme support for custom header
        add_theme_support( 'custom-header' );

        // Add theme support for Translation
        load_theme_textdomain( 'glocal', get_template_directory() . '/library/language' );  

        // Loop Pagination
        // Provides a template tag for adding pagination to multi-post pages (e.g., archives, blog, search)
        // http://themehybrid.com/docs/hybrid-core-extensions
        add_theme_support( 'loop-pagination' );
    }

}


/**
 * Register custom image sizes for the theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function anp_theme_register_image_sizes() {

    add_image_size( 'bones-thumb-600', 600, 150, true );
    add_image_size( 'bones-thumb-300', 300, 100, true );
    add_image_size( 'bones-thumb-150', 150, 150, true );

}

/**
 * Register nav menu locations.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function anp_theme_register_menus() {
    register_nav_menu( 'primary',    esc_html_x( 'Primary',    'nav menu location', 'anp-main-theme' ) );
    register_nav_menu( 'secondary',  esc_html_x( 'Secondary',  'nav menu location', 'anp-main-theme' ) );
    register_nav_menu( 'subsidiary', esc_html_x( 'Subsidiary', 'nav menu location', 'anp-main-theme' ) );
}

/**
 * Register layouts.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function anp_theme_register_layouts() {

    hybrid_register_layout( '1c',   array( 'label' => esc_html__( '1 Column',                     'anp-main-theme' ), 'image' => '%s/images/layouts/1c.png'   ) );
    hybrid_register_layout( '2c-l', array( 'label' => esc_html__( '2 Columns: Content / Sidebar', 'anp-main-theme' ), 'image' => '%s/images/layouts/2c-l.png' ) );
    hybrid_register_layout( '2c-r', array( 'label' => esc_html__( '2 Columns: Sidebar / Content', 'anp-main-theme' ), 'image' => '%s/images/layouts/2c-r.png' ) );
}

/**
 * Register sidebars.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */

 function anp_theme_register_sidebars() {

    hybrid_register_sidebar(
        array(
            'id'          => 'sidebar1',
            'name'        => esc_html_x( 'Primary', 'sidebar', 'anp-main-theme' ),
            'description' => esc_html__( '', 'anp-main-theme' )
        )
    );

    hybrid_register_sidebar(
        array(
            'id'          => 'home-modules',
            'name'        => esc_html_x( 'Homepage Modules', 'sidebar', 'anp-main-theme' ),
            'description' => esc_html__( 'Modules for the Homepage', 'anp-main-theme' )
        )
    );

    hybrid_register_sidebar(
        array(
            'id'          => 'footer1',
            'name'        => esc_html_x( 'Footer 1', 'anp-main-theme' ),
            'description' => esc_html_x( 'First footer widget area.', 'anp-main-theme' )
        )
    );

    hybrid_register_sidebar(
        array(
            'id'          => 'footer2',
            'name'        => esc_html_x( 'Footer 2', 'anp-main-theme' ),
            'description' => esc_html_x( 'Second footer widget area.', 'anp-main-theme' )
        )
    );

    hybrid_register_sidebar(
        array(
            'id'          => 'footer3',
            'name'        => esc_html_x( 'Footer 3', 'anp-main-theme' ),
            'description' => esc_html_x( 'Third footer widget area.', 'anp-main-theme' )
        )
    );

    hybrid_register_sidebar(
        array(
            'id'          => 'footer4',
            'name'        => esc_html_x( 'Footer 4', 'anp-main-theme' ),
            'description' => esc_html_x( 'Fourth footer widget area.', 'anp-main-theme' )
        )
    );

    hybrid_register_sidebar(
        array(
            'id' => 'social',
            'name' => __( 'Social Widget', 'anp-main-theme' ),
            'description' => __( 'Widget area for social links.', 'anp-main-theme' )
        )
    );

}

/**
 * Load scripts for the front end.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function anp_theme_enqueue_scripts() {

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

    wp_register_script( 'responsive-slider-script', get_template_directory_uri() . '/assets/boxslider/jquery.bxslider.min.js', array( 'jquery' ), '', true );

    wp_register_script( 'slider-init', get_template_directory_uri() . '/assets/scripts/sliderInit.js', array( 'jquery' ), '', true );

    wp_register_script( 'isotope-script', get_template_directory_uri() . '/assets/scripts/isotope.pkgd.min.js', array( 'jquery' ), '', true );

    wp_enqueue_script( 'responsive-slider-script' );
    wp_enqueue_script( 'slider-init' );
    wp_enqueue_script( 'isotope-script' );

    
}

/**
 * Load stylesheets for the front end.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function anp_theme_enqueue_styles() {

    // Load one-five base style.
    wp_enqueue_style( 'hybrid-one-five' );

    // Load gallery style if 'cleaner-gallery' is active.
    if ( current_theme_supports( 'cleaner-gallery' ) )
        wp_enqueue_style( 'hybrid-gallery' );

    // Load parent theme stylesheet if child theme is active.
    if ( is_child_theme() )
        wp_enqueue_style( 'hybrid-parent' );

    // Load active theme stylesheet.
    wp_enqueue_style( 'hybrid-style' );


    wp_register_style( 'responsive-slider-stylesheet', get_template_directory_uri() . '/assets/boxslider/jquery.bxslider.css');

    wp_enqueue_style( 'responsive-slider-stylesheet' );

    wp_register_style( 'anp-civicrm', get_template_directory_uri() . '/assets/styles/plugins/civicrm.css');

    wp_enqueue_style( 'anp-civicrm' );

}

