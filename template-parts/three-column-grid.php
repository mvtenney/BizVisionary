<?php
/**
 * Displays three column grid
 *
 * @package WordPress
 * @subpackage bizvisionary-2019
 * @since 1.0.0
 */
$upload_dir = wp_upload_dir();
?>

<div class="bv_section--fullwidth">
<div class="bv_section-container">

<h1><?php $category = get_the_category(); 
$parent = get_category($category[0]->category_parent);
echo $parent->slug;?></h1>
<div class="bv_grid-col--three">

<?php $terms = wp_list_categories( array(

'orderby'             => 'name',
'child_of'            => 34,
'title_li' => ''

     ) );
     ?>

<?php
// $categories = get_categories( array(
//     'orderby' => 'name',
//     'child_of'            => 34,
//     'title_li' => '' 
// ) );
 
// foreach( $categories as $category ) {
//     $category_link = sprintf( 
//         '<a href="%1$s" alt="%2$s">%3$s</a>',
//         esc_url( get_category_link( $category->term_id ) ),
//         esc_attr( sprintf( __( ' %s', 'bizvisionary-2019' ), $category->name ) ),
//         esc_html( $category->name )
//     );
//     echo '<h3>' . sprintf( esc_html__( ' %s', 'bizvisionary-2019' ), $category_link ) . '</h3> ';
//     echo '<p>' . sprintf( esc_html__( ' %s', 'bizvisionary-2019' ), $category->description ) . '</p>'; 
// } 
?>



</div>
</div>
</div>