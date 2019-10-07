<?php
/**
 * Displays Custom page title
 *
 * @package WordPress
 * @subpackage bizvisionary-2019
 * @since 1.0.0
 */ ?>

<div class="bv_pages-header has-custom-title">

<?php 

if ( has_post_thumbnail() ) {
    the_post_thumbnail('full', array( 'class' => 'fullwidth' ));
}
?>
</div>