<?php

/**
 * Template Name: Resources Page
 *
 * @package WordPress
 * @subpackage bizvisionary-2019
 * @since 1.0.0
 */

get_header();
get_template_part('template-parts/file', 'downloads');
wp_enqueue_script('particles-js');
wp_enqueue_style('particles-js');
wp_enqueue_script('particles-settings-js', get_theme_file_uri('/js/particlesJS-settings.js'), array('particles-js'), false, true);

?>
<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        /* Start the Loop */
        while (have_posts()) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-content">
                    <?php
                        the_content();

                        wp_link_pages(
                            array(
                                'before' => '<div class="page-links">' . __('Pages:', 'bizvisionary-2019'),
                                'after'  => '</div>',
                            )
                        );
                        ?>
                </div><!-- .entry-content -->
            </article>
        <?php

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) {
                comments_template();
            }

        endwhile; // End of the loop.
        ?>
    </main>
</section>
<script>
    jQuery(document).ready(function() {
        jQuery('canvas').prependTo('#particles-js');
    });
</script>
<?php // get_template_part('template-parts/single-product', 'long'); 
?>
<?php get_footer(); ?>