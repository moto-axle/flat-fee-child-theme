<?php
/**
 * Flat Fee MLS Theme Functions
 *
 * These are primarily sample functions for building a child theme.
 * You should remove or modify everthing below to suit your needs.
 */


if ( !function_exists( 'hji_boulevard_child_scripts' ) ) :
/**
* Overrides main boulevard js file with the child theme file
* To activate this un-comment the add_action below
*/
function hji_boulevard_child_scripts() {

    // properly removes the default boulevard javascript - but isn't
    // necessary if you enqueue your script with the same handle
    wp_dequeue_script( 'hji_theme_scripts' );

    // enqueues the child theme js file - built with grunt
    wp_enqueue_script( 'hji_child_scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js', array( 'jquery' ), '2.0', true );

}
// add_action( 'wp_enqueue_scripts', 'hji_boulevard_child_scripts', 99 );
endif;


/**
 * Changes the output of the compiled css
 * Filters in after the compiler has run
 */
// function hji_theme_hijack_compiler( $css ) {
//     $css = str_replace( '', '', $css );
//     return $css;
// }
// add_filter( 'hji_theme_compiler_output' 'hji_theme_hijack_compiler' );



if ( !function_exists( 'hji_top_header_menu' ) ) :
/**
 * Creates a header area for the top menu above the
 * standard bootstrap header area.
 *
 * This uses an action hook for menu placement.
 * You could also override /templates/header-navbar.php
 */
function hji_top_header_menu() {

    // fail if no menu in position
    if ( !has_nav_menu('header-menu') ) :
        return;
    endif;

    $args = array(
        'theme_location' => 'header-menu',
        'menu_class'     => 'nav nav-pills',
        'items_wrap'     => '<div class="hjitw-top-header"><div class="container"><ul id="%1$s" class="%2$s pull-right">%3$s</ul></div></div>'
    );

    // grab our menu
    $menu = wp_nav_menu( $args );

    // display our new section and menu
    return $menu;
}
// add_action( 'hji_theme_before_navbar_brand', 'hji_top_header_menu' );
endif;


// Registers theme menu area for the above code.
// register_nav_menus(
//     array(
//         'header-menu'   => __( 'Top Header Menu', 'hji_themework' )
//     )
// );

if ( !function_exists( 'hji_new_widgets' ) ) :
/**
 * Override main theme widget areas
 */
function hji_new_widgets() {
  // FSBO

    register_sidebar( array(
    'id'            => 'blvd-fsbo',
    'name'          => __( 'FSBO or Properties/Counties', 'hji-textdomain' ),
    'description'   => __( 'FSBO for states, Properties/Counties for cities' ),
    'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
    'after_widget'  => "</div>",
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));
    register_sidebar( array(
    'id'            => 'blvd-states',
    'name'          => __( 'State List', 'hji-textdomain' ),
    'description'   => __( 'State List Goes Here' ),
    'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
    'after_widget'  => "</div>",
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));
        register_sidebar( array(
    'id'            => 'blvd-cities',
    'name'          => __( 'City List', 'hji-textdomain' ),
    'description'   => __( 'City List Goes Here' ),
    'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
    'after_widget'  => "</div>",
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));

}
add_action( 'widgets_init', 'hji_new_widgets' );
endif;

// Adds a [bloglist] shortcode, so I can embed the menu into the static homepage.
// Note: I originally put it directly into the template, but that didn't work
// with WPtouch.
//add_shortcode('bloglist', function($atts)
//{
//    projects_menu(false);
//});

/**
 * Sets our SCSS constant for the improved build process
 * REQUIRED
 *
 * @since 2.7.0
 */
if ( !defined( 'HJI_BLVD_SCSS' ) ) {
    define( 'HJI_BLVD_SCSS', true );
}


/**
 * Adds child theme scripts
 */
function child_theme_scripts() {
    // we only need this script on the homepage of the main site
    if ( is_front_page() && is_main_site() ) {
        wp_enqueue_script( 'blvd/child-theme', get_stylesheet_directory_uri() . '/assets/js/selectize-custom.js' );
    }
}
add_action( 'wp_enqueue_scripts', 'child_theme_scripts' );


/**
 * Creates the homepage lists for each site on the network
 * If the main site it outputs the states list otherwise
 * it outputs the city list
 */
function outputHomepageDataLists() {
    if ( is_main_site() ) {

        echo npStatesList();

    } else {

        echo npCityList();

    }
}
add_action( 'blvd/dataList', 'outputHomepageDataLists' );


/**
 * Creates the homepage search functionality for each site on the network
 */
function outputStateSearch()
{
    if ( is_main_site() ) {
        echo npStateSearch();
    }
    //else {
    //    echo npCitySearch();
    //}
}
add_action( 'blvd/stateSearch', 'outputStateSearch' );

