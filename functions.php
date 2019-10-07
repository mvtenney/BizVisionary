<?php
//add_theme_support( 'post-thumbnails' );
//Loads theme styles and scripts

function bizvisionary_scripts()
{
    wp_enqueue_style('bizvisionary-reset', get_theme_file_uri('/CSS/reset.css'), array(), wp_get_theme()->get('Version'));
    // wp_enqueue_style('bizvisionary-base', get_theme_file_uri('/CSS/base.css'), array(), wp_get_theme()->get('Version'));
    wp_enqueue_style('bizvisionary-modal', get_theme_file_uri('/CSS/wsd-modal-style.css'), array(), wp_get_theme()->get('Version'));
    wp_enqueue_style('bizvisionary-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    wp_enqueue_style('bizvisionary-elementor', get_theme_file_uri('/CSS/elementor.css'), array(), wp_get_theme()->get('Version'));
    wp_enqueue_style('bizvisionary-gutenberg', get_theme_file_uri('/CSS/gutenberg.css'), array(), wp_get_theme()->get('Version'));
    wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/efbfa885c4.js');
    //wp_enqueue_script( 'bizvisionary-priority-menu', get_theme_file_uri( '/js/priority-menu.js' ), array(), '1.1', true );
    wp_enqueue_script('bizvisionary-modal-js', get_theme_file_uri('/js/wsd-modal-script.js'), array('jquery'), false, true);
    wp_enqueue_script('bizvisionary-ui-scripts', get_theme_file_uri('/js/bv_ui_script.js'), array('jquery'), 1.1, true);

    wp_enqueue_script('particles-js', 'https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js', [], false, true);
    wp_enqueue_style('particles-js', get_theme_file_uri('/CSS/particle.css'), array(), wp_get_theme()->get('Version'));
    wp_enqueue_script('particles-settings-js', get_theme_file_uri('/js/particlesJS-settings.js'), array('particles-js'), false, true);
}
add_action('wp_enqueue_scripts', 'bizvisionary_scripts');



add_action('gform_enqueue_scripts_1',  __NAMESPACE__ .  '\\dequeue_gf_stylesheets', 11);
function dequeue_gf_stylesheets()
{
    wp_dequeue_style('gforms_datepicker_css');
}

register_nav_menus(
    array(
        'menu-1' => __('Primary', 'bizvisionary-2019'),
        //'top' => __( 'Specials', 'twentynineteen' ),
        'social-menu' => __('Social Links Menu', 'bizvisionary-2019'),
        'footer-menu1' => __('Footer-contact', 'bizvisionary-2019'),
        'footer-menu2' => __('Footer-legal', 'bizvisionary-2019'),
        'footer-menu3' => __('Footer-resources', 'bizvisionary-2019'),
        'footer-menu4' => __('Footer-general', 'bizvisionary-2019'),
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
function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');
function woocommerce_subcats_from_parentcat_by_ID($parent_cat_ID, $numOfProducts = 3)
{
    $args = array(
        'hierarchical' => 1,
        'show_option_none' => '',
        'hide_empty' => 0,
        'parent' => $parent_cat_ID,
        'taxonomy' => 'product_cat'
    );

    $subcats = get_categories($args);

    $productsNav = '';
    $productsContent = [];
    $productFirst = true;
    $catDesc = [];
    foreach ($subcats as $sc) {
        $catDesc[] = $sc->category_description;
        //get product nav
        $link = get_term_link($sc->slug, $sc->taxonomy);

        if ($productFirst) {
            $productsNav .= '<li class="active">' . $sc->name . '</li>';
        } else {
            $productsNav .= '<li>' . $sc->name . '</li>';
        }

        $productFirst = false;
        $productContent = [];

        //get product info
        $args = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => $numOfProducts,
            'tax_query' => [[
                'taxonomy'         => 'product_cat',
                'field'            => 'slug', // Or 'term_id' or 'name'
                'terms'            => $sc->slug, // A slug term
                // 'include_children' => false // or true (optional)
            ]]
        );

        $loop = new WP_Query($args);

        if ($loop->have_posts()) {
            while ($loop->have_posts()) : $loop->the_post();
                $product = wc_get_product($loop->post->ID);
                $productContent[] =
                    '<li>' .
                    '<div><h5>' . $product->get_attribute('hours') . ' Hour Session</h5>' .
                    '<h3>' . $product->get_name() . '</h3>' .
                    '</div><p>' . $product->get_short_description() . '</p>' .
                    '<a href="' . get_permalink($loop->post->ID) . '" class="bv_button bv_button__primary bv_button--small" >Schedule Now</a>' .
                    '</li>';
            endwhile;
        } else {
            $productContent[] = __('No products found');
        }
        wp_reset_postdata();
        $productsContent[] = $productContent;
    }

    $products = [
        'productsNav' => $productsNav,
        'productsContent' => $productsContent,
        'categoryDescription' => $catDesc
    ];
    return $products;
}

function woocommerce_products_by_cat($cat_ID, $numOfProducts = 3)
{
    $term = get_term_by('id', $cat_ID, 'product_cat');
    //get product info
    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'orderby'   => 'title',
        'posts_per_page' => $numOfProducts,
        'tax_query' => [[
            'taxonomy'         => 'product_cat',
            'field'            => 'term_id', // Or 'term_id' or 'name'
            'terms'            => $cat_ID, // A slug term
            'include_children' => true // or true (optional)
        ]]
    );
    $featured_query = new WP_Query($args);
    $productContent = [];

    if ($featured_query->have_posts()) {
        while ($featured_query->have_posts()) : $featured_query->the_post();
            $product = get_product($featured_query->post->ID);
            $productContent[$product->get_id()] = [
                $product->get_name(),
                $product->get_attribute('hours'),
                $product->get_short_description(),
            ];
        endwhile;
    } else {
        $productContent[] = __('No products found');
    }

    wp_reset_query();
    $products = [
        'categoryName' => $term->name,
        'categoryDescription' => category_description($cat_ID),
        'productsContent' => $productContent,
    ];
    return $products;
}

/* Register Categories for Pages */
function bv_add_page_cats()
{
    register_taxonomy_for_object_type('post_tag', 'page');
    register_taxonomy_for_object_type('category', 'page');
}
add_action('init', 'bv_add_page_cats');



// /*product descriptions */
// function woocommerce_taxonomy_archive_description() {
//     if ( is_tax( array( 'product_cat', 'product_tag' ) ) && get_query_var( 'paged' ) == 0 ) {
//         $description = wpautop( do_shortcode( term_description() ) );
//         if ( $description ) {
//             echo '<div class="term-description">' . $description . '</div>';
//         }
//     }
// }
// Creating a Services Custom Post Type
function bv_services_custom_post_type()
{
    $labels = array(
        'name'                => __('Services'),
        'singular_name'       => __('Service'),
        'menu_name'           => __('Services'),
        'parent_item_colon'   => __('Parent Service'),
        'all_items'           => __('All Services'),
        'view_item'           => __('View Service'),
        'add_new_item'        => __('Add New Service'),
        'add_new'             => __('Add New'),
        'edit_item'           => __('Edit Service'),
        'update_item'         => __('Update Service'),
        'search_items'        => __('Search Service'),
        'not_found'           => __('Not Found'),
        'not_found_in_trash'  => __('Not found in Trash')
    );
    $args = array(
        'label'               => __('services'),
        'description'         => __('Services'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
        'public'              => true,
        'hierarchical'        => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'has_archive'         => true,
        'can_export'          => true,
        'exclude_from_search' => false,
        'yarpp_support'       => true,
        'taxonomies'           => array('post_tag'),
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
    register_post_type('services', $args);
}
add_action('init', 'bv_services_custom_post_type', 0);

//Let us create Taxonomy for Custom Post Type
add_action('init', 'bv_create_services_custom_taxonomy', 0);

//create a custom taxonomy name it "type" for your posts
function bv_create_services_custom_taxonomy()
{

    $labels = array(
        'name' => _x('Types', 'taxonomy general name'),
        'singular_name' => _x('Type', 'taxonomy singular name'),
        'search_items' =>  __('Search Types'),
        'all_items' => __('All Types'),
        'parent_item' => __('Parent Type'),
        'parent_item_colon' => __('Parent Type:'),
        'edit_item' => __('Edit Type'),
        'update_item' => __('Update Type'),
        'add_new_item' => __('Add New Type'),
        'new_item_name' => __('New Type Name'),
        'menu_name' => __('Types'),
    );

    register_taxonomy('types', array('services'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'type'),
    ));
}

//WP AJAX Call for Checkout Modal

function add_service_to_cart()
{
    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);

    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id);

    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity) && 'publish' === $product_status) {

        do_action('woocommerce_ajax_added_to_cart', $product_id);

        if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
            wc_add_to_cart_message(array($product_id => $quantity), true);
        }

        WC_AJAX::get_refreshed_fragments();
    } else {

        $data = array(
            'error' => true,
            'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id)
        );

        // echo wp_send_json($data);

    }
    echo do_shortcode("[woocommerce_cart]");
    wp_die();
}

add_action('wp_ajax_nopriv_add_service_to_cart', 'add_service_to_cart');
add_action('wp_ajax_add_service_to_cart', 'add_service_to_cart');

/* PHP Code on functions.php */

function create_testimonials()
{

    $labels = array(
        'name'                => _x('Testimonials', 'Post Type General Name', 'bizvisionary-2019'),
        'singular_name'       => _x('Testimonial', 'Post Type Singular Name', 'bizvisionary-2019'),
        'menu_name'           => __('Testimonials', 'bizvisionary-2019'),
        'parent_item_colon'   => __('Parent Testimonial', 'bizvisionary-2019'),
        'all_items'           => __('All Testimonials', 'bizvisionary-2019'),
        'view_item'           => __('View Testimonial', 'bizvisionary-2019'),
        'add_new_item'        => __('Add New Testimonial', 'bizvisionary-2019'),
        'add_new'             => __('Add New', 'bizvisionary-2019'),
        'edit_item'           => __('Edit Testimonial', 'bizvisionary-2019'),
        'update_item'         => __('Update Testimonial', 'bizvisionary-2019'),
        'search_items'        => __('Search Testimonial', 'bizvisionary-2019'),
        'not_found'           => __('Not Found', 'bizvisionary-2019'),
        'not_found_in_trash'  => __('Not found in Trash', 'bizvisionary-2019'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('testimonials', 'bizvisionary-2019'),
        'description'         => __('Testimonials', 'bizvisionary-2019'),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array('author', 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields',),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );

    // Registering your Custom Post Type
    register_post_type('testimonials', $args);
}
// Hooking up our function to theme setup
add_action('init', 'create_testimonials', 0);

function add_meta_boxes()
{
    add_meta_box(
        "post_metadata_testimonial_author",
        "Testimonial Author",
        "post_meta_box_testimonial_author",
        "testimonials",
        "side",
        "low"
    );

    add_meta_box(
        "post_metadata_testimonial_position",
        "Position",
        "post_meta_box_testimonial_position",
        "testimonials",
        "side",
        "low"
    );

    add_meta_box(
        "post_metadata_testimonial_organization",
        "Organization",
        "post_meta_box_testimonial_organization",
        "testimonials",
        "side",
        "low"
    );
    add_meta_box(
        "post_metadata_testimonial_shortcode",
        "Shortcode - Mini Testimonial",
        "post_meta_box_testimonial_shortcode",
        "testimonials",
        "side",
        "low"
    );
    add_meta_box(
        "post_metadata_testimonial_shortcode_long",
        "Shortcode - Long Testimonial",
        "post_meta_box_testimonial_shortcode_long",
        "testimonials",
        "side",
        "low"
    );
}

add_action("admin_init", "add_meta_boxes");

function save_testimonial_fields()
{
    global $post;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (get_post_status($post->ID) === 'auto-draft') {
        return;
    }
    update_post_meta($post->ID, "_post_testimonial_shortcode", '[testimonial slug="' . $post->post_name . '" long=false]');
    update_post_meta($post->ID, "_post_testimonial_shortcode_long", '[testimonial slug="' . $post->post_name . '" long=true]');
    update_post_meta($post->ID, "_post_testimonial_author", sanitize_text_field($_POST["_post_testimonial_author"]));
    update_post_meta($post->ID, "_post_testimonial_position", sanitize_text_field($_POST["_post_testimonial_position"]));
    update_post_meta($post->ID, "_post_testimonial_organization", sanitize_text_field($_POST["_post_testimonial_organization"]));
}
add_action('save_post', 'save_testimonial_fields');

function post_meta_box_testimonial_author()
{
    global $post;
    $meta = get_post_meta($post->ID, '_post_testimonial_author');
    $html =
        '<br>
    <input name="_post_testimonial_author" value="' . $meta[0] . '">';
    echo $html;
}

function post_meta_box_testimonial_position()
{
    global $post;
    $meta = get_post_meta($post->ID, '_post_testimonial_position');
    $html = '
        <br>
        <input name="_post_testimonial_position" value="' . $meta[0] . '">
    ';
    echo $html;
}

function post_meta_box_testimonial_organization()
{
    global $post;
    $meta = get_post_meta($post->ID, '_post_testimonial_organization');
    $html = '
        <br>
        <input name="_post_testimonial_organization" value="' . $meta[0] . '">
    ';
    echo $html;
}

function post_meta_box_testimonial_shortcode()
{
    global $post;
    $meta = get_post_meta($post->ID, '_post_testimonial_shortcode');
    $html = '
        <br>
        <p id="_post_testimonial_shortcode">' . $meta[0] . '</p>
    ';
    echo $html;
}

function post_meta_box_testimonial_shortcode_long()
{
    global $post;
    $meta = get_post_meta($post->ID, '_post_testimonial_shortcode_long');
    $html = '
        <br>
        <p id="_post_testimonial_shortcode_long">' . $meta[0] . '</p>
    ';
    echo $html;
}


function display_testimonial_shortcode($atts)
{
    $a = shortcode_atts(array(
        'id' => '',
        'slug' => '',
        'long' => 'true'
    ), $atts);

    $post = get_page_by_path($a['slug'], '', 'testimonials');

    if (!empty($a['slug'])) {
        $id = $post->ID;
    } else if (!empty($a['id'])) {
        $id = $a['id'];
    } else {
        $id = 0;
    }

    $testimonialMeta = get_post_meta($id);

    if ($a['long'] === 'true') {
        $html = '<div class="bv_long-testimonial-section">
            <div class="bv_long-testimonial-container">
                <div class="testimonial-left">
                    <img src="' . get_the_post_thumbnail_url($id) . '" alt="' . $testimonialMeta['_post_testimonial_author'][0] . '">
                    <h2>' . $testimonialMeta['_post_testimonial_author'][0] . '</h2>
                    <h3>' . $testimonialMeta['_post_testimonial_position'][0] . '</h3>
                    <h4>' . $testimonialMeta['_post_testimonial_organization'][0] . '</h4>
                </div>
                <div class="testimonial-right">
                    <p><a href="#" class="testimonial-modal" id="testimonial-modal-' . $id . '">' . get_the_excerpt($id) . '…</a></p>
                </div>
            </div>
        </div>
        ';
    } else {
        $html = '<div class="wp-block-group">
            <div class="wp-block-group__inner-container">
                <div class="wp-block-columns bv_testimonial">
                    <div class="wp-block-column">
                        <figure class="wp-block-image size-thumbnail">
                            <img src="' . get_the_post_thumbnail_url($id) . '" alt="' . $testimonialMeta['_post_testimonial_author'][0] . '">
                        </figure>
                        <h2>' . $testimonialMeta['_post_testimonial_author'][0] . '</h2>
                        <h3>' . $testimonialMeta['_post_testimonial_position'][0] . '</h3>
                        <h4>' . $testimonialMeta['_post_testimonial_organization'][0] . '</h4>
                    </div>
                    <div class="wp-block-column">
                        <blockquote class="wp-block-quote">
                            <p><a href="#" class="testimonial-modal" id="testimonial-modal-' . $id . '">' . get_the_excerpt($id) . '…</a></p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>';
    }

    $testimonialContent = apply_filters('the_content', get_post_field('post_content', $id));

    $html .= '        
        <div class="wsd-modal testimonial-full-modal" id="testimonial-modal-' . $id . '-window">
            <div class="wsd-modal-content">
                <div class="wsd-modal-close btn-x">x</div>
                    <div class="testimonial-full-header">
                ' . get_the_post_thumbnail($id, 'thumbnail') . '
                    <div class="testimonial-full-info">
                        <h2>' . $testimonialMeta['_post_testimonial_author'][0] . '</h2>
                        <h3>' . $testimonialMeta['_post_testimonial_position'][0] . '</h3>
                        <h4>' . $testimonialMeta['_post_testimonial_organization'][0] . '</h4>
                    </div>    
                </div>
                <div class="testimonial-full-body">
                ' . $testimonialContent . '
                </div>
            </div>
        </div>';

    return $html;
};

add_shortcode('testimonial', 'display_testimonial_shortcode');


function create_bv_downloads()
{

    $labels = array(
        'name'                => _x('Free Resources', 'Post Type General Name', 'bizvisionary-2019'),
        'singular_name'       => _x('Free Resource', 'Post Type Singular Name', 'bizvisionary-2019'),
        'menu_name'           => __('Free Resources', 'bizvisionary-2019'),
        'parent_item_colon'   => __('Parent Free Resource', 'bizvisionary-2019'),
        'all_items'           => __('All Free Resources', 'bizvisionary-2019'),
        'view_item'           => __('View Free Resource', 'bizvisionary-2019'),
        'add_new_item'        => __('Add New Free Resource', 'bizvisionary-2019'),
        'add_new'             => __('Add New', 'bizvisionary-2019'),
        'edit_item'           => __('Edit Free Resource', 'bizvisionary-2019'),
        'update_item'         => __('Update Free Resource', 'bizvisionary-2019'),
        'search_items'        => __('Search Free Resource', 'bizvisionary-2019'),
        'not_found'           => __('Not Found', 'bizvisionary-2019'),
        'not_found_in_trash'  => __('Not found in Trash', 'bizvisionary-2019'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('Free Resources', 'bizvisionary-2019'),
        'description'         => __('Free Resources', 'bizvisionary-2019'),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array('author', 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields',),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );

    // Registering your Custom Post Type
    register_post_type('bv_downloads', $args);
}
// Hooking up our function to theme setup
add_action('init', 'create_bv_downloads', 0);

function display_bv_download_shortcode($atts)
{
    $a = shortcode_atts(array(
        'id' => '',
        'slug' => '',
        'left' => 'false',
        'right' => 'false'
    ), $atts);

    $post = get_page_by_path($a['slug'], '', 'bv_downloads');

    if (!empty($a['slug'])) {
        $id = $post->ID;
    } else if (!empty($a['id'])) {
        $id = $a['id'];
    } else {
        $id = 0;
    }

    $bv_downloadContent = apply_filters('the_content', get_post_field('post_content', $id));

    if ($a['left'] === 'true') {
        $html = '
        <div class="wp-block-columns">
            <div class="wp-block-column" style="flex-basis:33.33%">
                <figure class="wp-block-image size-large">
                    <img src="' . get_the_post_thumbnail_url($id) . '" alt="">
                </figure>
            </div>
            <div class="wp-block-column" style="flex-basis:66.66%">
                <h3>' . get_the_title($id) . '</h3>
                ' . $bv_downloadContent . '        
                <div class="wp-block-button is-primary">
                    <a class="wp-block-button__link bv_download-modal" id="bv_download-modal-' . $id . '" href="#no" rel="">Free Digital Version</a>
                </div>
            </div>
        </div>';
    } else {
        $html = '
        <div class="wp-block-columns">
            <div class="wp-block-column" style="flex-basis:66.66%">
                <h3>' . get_the_title($id) . '</h3>
                ' . $bv_downloadContent .'        
                <div class="wp-block-button is-primary">
                    <a class="wp-block-button__link bv_download-modal" id="bv_download-modal-' . $id . '" href="#no" rel="">Free Digital Version</a>
                </div>
            </div>
            <div class="wp-block-column" style="flex-basis:33.33%">
                <figure class="wp-block-image size-large">
                    <img src="' . get_the_post_thumbnail_url($id) . '" alt="">
                </figure>
            </div>
        </div>';
    }

    $html .= '
    
    <div class="wsd-modal bv_download-full-modal" id="bv_download-modal-' . $id . '-window">
        <div class="wsd-modal-content free-download-modal">
            <div class="wsd-modal-close btn-x">x</div>
            
            <h2>' . get_the_title($id) . '</h2>
            <div class="bv_download-content">
                ' . get_the_post_thumbnail($id) . $bv_downloadContent . '
            </div>
            <p id="form-messages-' . $id . '"></p>
            <form class="get-free-download-form" id="bv_download-modal-' . $id . '-form" action="/sendSubscriber.php" data-id="' . $id . '" method="post">
                <div class="bv_50-50">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" placeholder="Enter Your First Name" id="id="bv_download-modal-' . $id . '-firstName" required>
                </div>
                <div class="bv_50-50">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" placeholder="Enter Your Last Name" id="id="bv_download-modal-' . $id . '-lastName" required>
                </div>
                <div class="bv_100">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Enter Your Email Address" id="id="bv_download-modal-' . $id . '-email" class="email" required>
                </div>
                <div class="bv_100">
                    <div class="wp-block-button is-primary">
                        <input type="hidden" name="fileDownload" value="'.get_the_excerpt($id).'">
                        <button type="submit" class="wp-block-button__link">Download Now</button>
                    </div>
                </div>
            </form>

        </div>
    </div>';

    return $html;
};
add_shortcode('bv_download', 'display_bv_download_shortcode');

// disable the magnification zoom in product images
add_action('template_redirect', function () {
    remove_theme_support('wc-product-gallery-zoom');
    remove_theme_support('wc-product-gallery-lightbox');
    remove_theme_support('wc-product-gallery-slider');
}, 100);

//Change WooCommerce Account Page
add_filter('woocommerce_account_menu_items', 'bv_remove_address_my_account', 999);

function bv_remove_address_my_account($items)
{
    unset($items['edit-address']);
    unset($items['payment-methods']);
    return $items;
}

// Print the ex tab content into an existing tab (edit-account in this case)

add_action('woocommerce_account_edit-account_endpoint', 'woocommerce_account_edit_address');
add_action('woocommerce_account_edit-account_endpoint', 'woocommerce_account_payment_methods');
