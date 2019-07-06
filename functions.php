<?php 

//Loads theme styles and scripts
function bizvisionary_scripts() {
    wp_enqueue_style( 'bizvisionary-reset', get_theme_file_uri('reset.css'), array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'bizvisionary-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/efbfa885c4.js'); 
	//wp_enqueue_script( 'bizvisionary-priority-menu', get_theme_file_uri( '/js/priority-menu.js' ), array(), '1.1', true );	
}
add_action( 'wp_enqueue_scripts', 'bizvisionary_scripts' );

register_nav_menus(
    array(
        'menu-1' => __( 'Primary', 'bizvisionary-2019' ),
        //'top' => __( 'Specials', 'twentynineteen' ),
        'social-menu' => __( 'Social Links Menu', 'bizvisionary-2019' ),
        'footer-menu1' => __( 'Footer-contact', 'bizvisionary-2019' ),
        'footer-menu2' => __( 'Footer-legal', 'bizvisionary-2019' ),
        'footer-menu3' => __( 'Footer-resources', 'bizvisionary-2019' ),
        'footer-menu4' => __( 'Footer-general', 'bizvisionary-2019' ),
    )
);

/**
 * Add support for core custom logo.
 *
 * @link https://codex.wordpress.org/Theme_Logo
 */
add_theme_support(
    'custom-logo',
    array(
        'height'      => 67,
        'width'       => 200,
        'flex-width'  => false,
        'flex-height' => false,
    )
);