<?php
/**
 * Template Name: About Page
 *
 * @package WordPress
 * @subpackage bizvisionary-2019
 * @since 1.0.0
 */

get_header();
wp_enqueue_script('particles-js');
wp_enqueue_style('particles-js');
wp_enqueue_script('particles-settings-js', get_theme_file_uri( '/js/particlesJS-settings.js' ), array('particles-js'), false, true);
?>
 
	<section id="primary" class="content-area">
		<main id="main" class="site-main">
       
        <?php //get_template_part('template-parts/content' , 'title');?>
			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
?>              
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content">
                            <?php
                            the_content();

                            wp_link_pages(
                                array(
                                    'before' => '<div class="page-links">' . __( 'Pages:', 'bizvisionary-2019' ),
                                    'after'  => '</div>',
                                )
                            );
                            ?>
                        </div><!-- .entry-content -->
                    </article>
					<?php

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
    </section><!-- #primary -->
    <script>
    jQuery('document').ready(function (){
        jQuery('.particles-js-canvas-el').prependTo('#particles-js');
    });
    </script>
    <?php //get_template_part('template-parts/three-column' , 'grid');?>
    <?php //get_template_part('template-parts/single' , 'product');?>
<?php
get_footer();