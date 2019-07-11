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

function woocommerce_subcats_from_parentcat_by_ID($parent_cat_ID)
{
    $args = array(
    'hierarchical' => 1,
    'show_option_none' => '',
    'hide_empty' => 0,
    'parent' => $parent_cat_ID,
    'taxonomy' => 'product_cat'
    );

    $subcats = get_categories($args);
    
    $productsNav;
    $productsContent = [];
    $productFirst = true;

    foreach ($subcats as $sc) {

        //get product nav
        $link = get_term_link($sc->slug, $sc->taxonomy);

        if ($productFirst) {
            $productsNav .= '<li class="active">'.$sc->name.'</li>';
        } else {
            $productsNav .= '<li>'.$sc->name.'</li>';
        }
        
        $productFirst = false;
        $productContent = [];
        
        //get product info
        $args = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => 3,
            'tax_query' => array( array(
                'taxonomy'         => 'product_cat',
                'field'            => 'slug', // Or 'term_id' or 'name'
                'terms'            => $sc->slug, // A slug term
                // 'include_children' => false // or true (optional)
            ))
        );

        $loop = new WP_Query( $args );
        
        if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) : $loop->the_post();
            $product = wc_get_product( $loop->post->ID );
            $productContent[] = 
            '<li>'.
                '<h5>'.$product->get_attribute('hours').' Hours</h5>' .
                '<h3>'.$product->get_name().'</h3>'.
                '<p>'.$product->get_short_description().'</p>'.
            '</li>';            
            endwhile;
        } else {
            $productContent[] = __( 'No products found' );
        }
        wp_reset_postdata();
        $productsContent[] = $productContent;
    }

    $products = [
        'productsNav' => $productsNav, 
        'productsContent' => $productsContent
    ];
    return $products;    
}


/* Register Categories for Pages */


function bv_add_page_cats(){
    register_taxonomy_for_object_type('post_tag', 'page');
    register_taxonomy_for_object_type('category', 'page'); 
}
add_action( 'init', 'bv_add_page_cats' );