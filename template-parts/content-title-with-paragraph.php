<?php
/**
 * Displays page title
 *
 * @package WordPress
 * @subpackage bizvisionary-2019
 * @since 1.0.0
 */ ?>

<div class="bv_pages-header">

<?php 

if ( has_post_thumbnail() ) {?>
    <div class="page-hero" style="background-image:url(<?= get_the_post_thumbnail_url(); ?>)"><?php the_title( '<h1 class="slideIn">', '</h1>' ); ?></div>
<?php }
?>
</div>
