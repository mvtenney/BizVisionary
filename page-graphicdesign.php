<?php

/**
 * Template Name: Graphic Design Page
 * 
 * @package WordPress
 * @subpackage bizvisionary-2019
 * @since 1.0.0
 */

get_header();
wp_enqueue_script('particles-js');
wp_enqueue_style('particles-js');
wp_enqueue_script('particles-settings-js', get_theme_file_uri('/js/particlesJS-settings.js'), array('particles-js'), false, true);
wp_enqueue_script('bizvisionary-modal-js');
wp_enqueue_script('simpleParallax', 'https://cdn.jsdelivr.net/npm/simple-parallax-js@5.1.0/dist/simpleParallax.min.js', array(), false, false);
get_template_part('template-parts/get', 'quote');
?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        get_template_part('template-parts/content', 'title');
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

        <div id="custom-1">
            <div class="service-icons">
                <div>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icons/Personal Customer Service-01.png" alt="">
                    <h3>PERSONAL</h3>
                    <p>CUSTOMER SERVICE</p>
                </div>
                <div>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icons/Design Concept Accuracy-01.png" alt="">
                    <h3>DESIGN</h3>
                    <p>CONCEPT ACCURACY</p>
                </div>
                <div>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icons/Deadline Oriented-01.png" alt="">
                    <h3>DEADLINE</h3>
                    <p>ORIENTED</p>
                </div>
                <div>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icons/Thorough Design Consulting-01.png" alt="">
                    <h3>THOROUGH</h3>
                    <p>DESIGN CONSULTING</p>
                </div>
                <div>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icons/Propper Formatting-01.png" alt="">
                    <h3>PROPER FORMATTING</h3>
                    <p>FOR PRINT & DIGITAL MEDIA</p>
                </div>
                <div>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icons/Patience In Design Process-01.png" alt="">
                    <h3>PATIENCE</h3>
                    <p>IN DESIGN PROCESS</p>
                </div>
                <div>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icons/Accessibility-01.png" alt="">
                    <h3>ACCESSIBILITY</h3>
                    <p>& STRONG COMMUNICATION</p>
                </div>
            </div>



            <div id="parallaxLogos" class="parallaxLogos">
                <h1 class="parallaxHeading">Your Logo<br><span>is Your</span><br><span>Handshake</span></h1>
                <img class="layer-1 rellax" src="<?php echo get_template_directory_uri(); ?>/images/BACK_logos-01.png" alt="" width="100%">
                <img id="parallaxPaul" src="<?php echo get_template_directory_uri(); ?>/images/2E_BW.png" alt="" height="80vh" />
                <img class="layer-2 rellax" src="<?php echo get_template_directory_uri(); ?>/images/FRONT_logos-01.png" alt="" width="100%">
            </div>
        </div>
        <div class="bbbd-splat">
            <h2>Make a name for yourself</h2>
            <div>
                <p>Summarize your company's business philosophy into a personalized and unforgettable image and message made with signals that generate the right feelings and associations in your target audience's eyes.</p>
                <img src="<?php echo get_template_directory_uri(); ?>/images/splat_bubble.png" alt="">
                <!-- schedule and quote buttons here -->
            </div>
        </div>

    </main><!-- #main -->
</section><!-- #primary -->
<?= do_shortcode('[testimonial slug="tyler-carpenter" long="true"]'); ?>
<script>
    // Also can pass in optional settings block
    jQuery(document).ready(function() {
        jQuery('#custom-1').prependTo(jQuery('#append-custom-1'));
        //jQuery('.bv_testimonial').attr('id', 'particles-js');

        var parallax = document.querySelectorAll('.layer-1');
        var parallax2 = document.querySelectorAll('.layer-2');

        new simpleParallax(parallax, {
            delay: 0,
            orientation: 'down right',
            scale: 0.7,
            overflow: true
        });

        new simpleParallax(parallax2, {
            delay: 0,
            orientation: 'up right',
            scale: 1.2,
            overflow: true
        });


    });
</script>
<?php
get_footer();
