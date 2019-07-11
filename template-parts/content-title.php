<?php
/**
 * Displays page title
 *
 * @package WordPress
 * @subpackage bizvisionary-2019
 * @since 1.0.0
 */ ?>

<div class="bv_pages-header bv_pages-header--gradient-bg">

<?php 

if ( has_post_thumbnail() ) {
    the_post_thumbnail('full', array( 'class' => 'fullwidth' ));
}

the_title( '<h1 class="bv_pages-title">', '</h1>' ); ?>
</div>