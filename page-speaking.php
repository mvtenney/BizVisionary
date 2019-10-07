<?php
/**
 * Template Name: Speaking Page
 *
 * @package WordPress
 * @subpackage bizvisionary-2019
 * @since 1.0.0
 */

get_header();
wp_enqueue_script('bizvisionary-modal-js');
wp_enqueue_script('particles-js');
wp_enqueue_style('particles-js');
wp_enqueue_script('particles-settings-js', get_theme_file_uri( '/js/particlesJS-settings.js' ), array('particles-js'), false, true);
get_template_part('template-parts/get', 'inquiry');
?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php 
        get_template_part('template-parts/content', 'title-with-paragraph'); 
        /* Start the Loop */
        while (have_posts()) :
            the_post();
            ?> <div class="bv_container">
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
            </div>
            <?php

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) {
                comments_template();
            }

        endwhile; // End of the loop.
        ?>
   
        </div>

        <div class="wsd-modal" id="getSpeakingModal">
			<div class="wsd-modal-content">
				<div class="wsd-modal-close btn-x">x</div>
				<?= do_shortcode('[gravityforms id=4]'); ?>
			</div>
        </div>

    </main>
</section>

<script>
    jQuery(document).ready(function(){
        jQuery("#launchSpeakingModal").on('click', function(e){
            e.preventDefault();
            modalScript({
                target: '#getSpeakingModal',
                right: true
            });
        });
    });
</script>

<section id="bv_pre-footer">

</section>

<?php get_footer(); ?>