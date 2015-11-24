<?php

# Register custom image sizes.
add_action( 'init', 'hybrid_base_register_image_sizes', 5 );

# Register custom menus.
add_action( 'init', 'hybrid_base_register_menus', 5 );

# Register custom layouts.
add_action( 'hybrid_register_layouts', 'hybrid_base_register_layouts' );

# Register sidebars.
add_action( 'widgets_init', 'hybrid_base_register_sidebars', 5 );

# Add custom scripts and styles
add_action( 'wp_enqueue_scripts', 'hybrid_base_enqueue_scripts', 5 );
add_action( 'wp_enqueue_scripts', 'hybrid_base_enqueue_styles',  5 );

/**
 * Registers custom image sizes for the theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function hybrid_base_register_image_sizes() {

    // Sets the 'post-thumbnail' size.
    //set_post_thumbnail_size( 150, 150, true );
}

/**
 * Registers nav menu locations.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function hybrid_base_register_menus() {
    register_nav_menu( 'primary',    esc_html_x( 'Primary',    'nav menu location', 'anp-main-theme' ) );
    register_nav_menu( 'secondary',  esc_html_x( 'Secondary',  'nav menu location', 'anp-main-theme' ) );
    register_nav_menu( 'subsidiary', esc_html_x( 'Subsidiary', 'nav menu location', 'anp-main-theme' ) );
}

/**
 * Registers layouts.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function hybrid_base_register_layouts() {

    hybrid_register_layout( '1c',   array( 'label' => esc_html__( '1 Column',                     'anp-main-theme' ), 'image' => '%s/images/layouts/1c.png'   ) );
    hybrid_register_layout( '2c-l', array( 'label' => esc_html__( '2 Columns: Content / Sidebar', 'anp-main-theme' ), 'image' => '%s/images/layouts/2c-l.png' ) );
    hybrid_register_layout( '2c-r', array( 'label' => esc_html__( '2 Columns: Sidebar / Content', 'anp-main-theme' ), 'image' => '%s/images/layouts/2c-r.png' ) );
}

/**
 * Registers sidebars.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */

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
function hybrid_base_register_sidebars() {

    hybrid_register_sidebar(
        array(
            'id'          => 'primary',
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
function hybrid_base_enqueue_scripts() {

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
function hybrid_base_enqueue_styles() {

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

