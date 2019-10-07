<?php

/**
 * Template Name: Brand Development Workshop
 *
 * @package WordPress
 * @subpackage bizvisionary-2019
 * @since 1.0.0
 */

get_header();
wp_enqueue_script('particles-js');
wp_enqueue_style('particles-js');
wp_enqueue_script('particles-js-settings');
wp_enqueue_script('bizvisionary-modal-js');
$upload_dir = wp_upload_dir();
get_template_part('template-parts/get', 'quote');
?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php //get_template_part('template-parts/content', 'title'); ?>
        <div class="bv_pages-header">
            <div class="page-hero" style="background-image:url(<?= get_the_post_thumbnail_url(); ?>)">
                <div class="hero-text">
                    <h1 class="slideIn">CRAFT A BRAND</h1>
                    <p>THAT ALLOWS YOU TO LIVE WHAT YOU LOVE TO DO.</p>
                </div>
            </div>
        </div>
        <?php
        /* Start the Loop */
        while (have_posts()) : the_post(); ?>
        <div class="bv_container">
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

        $discoverySessions = woocommerce_products_by_cat(39, -1);
        $strategySessions = woocommerce_products_by_cat(40, -1);
        $rebrandingSessions = $discoverySessions + $strategySessions;
        //var_dump($discoverySessions['productsContent'])
        ?>

        <div class="sessionsLeft discoverySessions">
            <div class="bv_container">
                <div class="sessionsContent">

                    <h2>Discovery Sessions</h2>

                    <p>Work face to face with me to add meaning to your message and value to your products. Marketing advice and workshops will develop your vision, refine your mission and improve your offering as you are introduced to BizVisionary’s inner circle of trusted strategic partners.</p>

                    <div class="bv_button__group">
                        <a class="bv_button bv_button__primary bv_button--large" href="#" id="discovery-checkout">Schedule now</a>
                        <a class="bv_button bv_button__secondary bv_button--large bv_get-quote-button" href="#">Get A Quote</a>
                    </div>

                    <div class="wsd-modal" id="discoverySessionsModal">
                        <div class="wsd-modal-content">
                            <div class="wsd-modal-close"></div>

                            <div class="select-session">
                                <h2><?= $discoverySessions["categoryName"]; ?></h2>
                                <!-- <p> <?php // $discoverySessions["categoryDescription"]; ?></p> -->
                                <?php foreach ($discoverySessions['productsContent'] as $session => $value) {
                                    $product = wc_get_product( $session );
                                    ?>
                                    <a href="<?= get_permalink( $product->get_id() ); ?>"  id="Discovery-<?= $session ?>" class="sessionItem">
                                        <h2><?= $value[0]; ?></h2>
                                        <h3><?= $value[1]; ?> Hours | $<?=$product->get_price();?></h3>
                                        <p><?= $value[2]; ?></p>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="sessionsRight rebrandingSessions">
            <div class="sessionsContent">
                <h2>Rebranding</h2>
                <p>Re-target your audience to promote your message more effectively and start drawing the type of customers you really want to work with. It's never too late to redefine your company’s message and change the way you are perceived by those you are trying to reach. </p>
                <p>When you’re ready to start pursuing larger audiences the small details in the look and feel of your company’s image start to matter a lot more. Together we’ll add consistency and organization to all the ways your company interacts with the world. </p>

                <div class="bv_button__group">
                    <a class="bv_button bv_button__primary bv_button--large" href="<?= get_permalink( 1123 ) ?>">Free Consultation</a>
                    <a class="bv_button bv_button__secondary bv_button__secondary--is-blue bv_button--large bv_get-quote-button" href="#">Get A Quote</a>
                </div>

            </div>
        </div>

        <div class="sessionsLeft strategySessions">
            <div class="sessionsContent">
                <h2>Strategy Sessions</h2>
                <p>Develop your sales funnel and media plan to reach more people in more meaningful ways. I use tested marketing tools and exercises to re-target your ideal customers and re-focus your business. We’ll analyze your audience and competitors to identify the best ways to position your company in the market.</p>
                
                <div class="bv_button__group is-center">
                    <a class="bv_button bv_button__primary bv_button--large" href="#Schedule-now">Schedule now</a>
                    <a class="bv_button bv_button__secondary bv_button__secondary--is-blue bv_button--large bv_get-quote-button" href="#">Get A Quote</a>
                </div>
                
                <div class="wsd-modal" id="strategySessionsModal">
                    <div class="wsd-modal-content">
                        <div class="wsd-modal-close"></div>

                        <div class="select-session">
                            <h1><?= $strategySessions["categoryName"]; ?></h1>
                            <!-- <p><?php // $strategySessions["categoryDescription"]; ?></p> -->
                            <?php foreach ($strategySessions['productsContent'] as $session => $value) {
                                $product = wc_get_product( $session );
                                ?>
                                <a href="<?= get_permalink( $product->get_id() ); ?>" class="sessionItem" id="Strategy-<?= $session ?>" data-product-id="<?= $session ?>">
                                    <h2><?= $value[0]; ?></h2>
                                    <h3><?= $value[1]; ?> Hours | $<?=$product->get_price();?></h3>
                                    <p><?= $value[2]; ?></p>
                                </a>
                            <?php } ?>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>
        <?php echo do_shortcode("[testimonial slug='neil-waldrop']"); ?>
         <div class="bv-process">
            <div class="bv_container">
                <img src="<?php echo get_template_directory_uri(); ?>/images/10BW[4156].png" alt="">
                <div class="content-right">
                    <h2>The Process</h2>
                    <p>Any consultant must first understand the problem before he can offer a specialized solution. My clients receive curriculum and prompts BEFORE we meet. 
                        This allows me to assess your problems ahead of time so we can be more effective with our session.</p>
                    <p>Many times, the homework brings ideas to the surface that we can explore in our time together.</p>
                    <div class="bv_button__group">
                        <a href="#" class="bv_button cta bv_get-quote-button">Get A Quote</a> <a href="#" class="bv_button secondary">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bv-process-details">
            <div class="bv-container">
                <div class="step">
                    <h3>Step 1</h3>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/process/step-1.png" alt="">
                    <h4>Select Curriculum</h4>
                    <p>Pay the standard down payment to download easy to digest homework on the topic of your choosing.</p>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/images/process/arrow.png" alt="">
                <div class="step">
                    <h3>Step 2</h3>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/process/step-2.png" alt="">
                    <h4>Finish Homework</h4>
                    <p>Complete the simple prompts and worksheets on your own time. I’ll assess your answers BEFORE we meet.</p>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/images/process/arrow.png" alt="">
                <div class="step">
                    <h3>Step 3</h3>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/process/step-3.png" alt="">
                    <h4>Meet with BizVisionary</h4>
                    <p>Now that I have a better understanding of your problem, we can make the most of our time.</p>
                </div>
            </div>
            <a href="/shop/" class="bv_button cta">Select Programming</a>
        </div>
        <?php echo do_shortcode("[testimonial slug='karen-scott']"); ?>
        <div class="video-container">
            <video autoplay muted id="myVideo">
                <source src="<?php echo $upload_dir['baseurl'] . '/2019/08/Build-Own-Brand-Video.mp4'?>" type="video/mp4">
            </video>
            <div class="video-overlay">
                <h1>INVEST YOUR TIME SAVE YOUR MONEY</h1>
            </div>
        </div>

    </main>
</section>

<?php get_template_part('template-parts/single-product', 'long'); ?>

<script>
//Get Quote Modal 

    jQuery(document).ready(function() {
        jQuery('.longDesc p').remove();
        jQuery('.page-hero').attr('id', 'particles-js');

        jQuery('.discoverySessions .bv_button__primary').on('click', function(e) {
            e.preventDefault();
            console.log('modal clicked open');
            modalScript({
                "target": "#discoverySessionsModal",
                "right": true
            });
        });

        // jQuery('.rebrandingSessions .bv_button__primary').on('click', function(e) {
        //     e.preventDefault();
        //     console.log('modal clicked open');
        //     modalScript({
        //         "target": "#rebrandingSessionsModal",
        //         "right": true
        //     });
        // });

        jQuery('.strategySessions .bv_button__primary').on('click', function(e) {
            e.preventDefault();
            console.log('modal clicked open');
            modalScript({
                "target": "#strategySessionsModal",
                "right": true
            });
        });

        

        

    //     jQuery(document).on('click', '.sessionItem', function (e) {
    //     e.preventDefault();
 
    //     var $thisbuttonID = jQuery(this).attr('id'),
    //         $thisbutton = jQuery('#'+ $thisbuttonID),
    //         session = $thisbutton.parent('.select-session'),
    //         $form = $thisbutton.closest('form.cart'),
    //         id = $thisbutton.attr('data-product-id'),
    //         product_qty = 1,
    //         product_id = id;

    //     var data = {
    //         action: 'add_service_to_cart',
    //         product_id: product_id,
    //         product_sku: '',
    //         quantity: product_qty,
    //     };
 
    //     jQuery(document.body).trigger('adding_to_cart', [$thisbutton, data]);
 
    //     jQuery.ajax({
    //         type: 'post',
    //         url: "<?php //echo admin_url( 'admin-ajax.php' ); ?>",
    //         data: data,
    //         beforeSend: function (response) {
    //             $thisbutton.removeClass('added').addClass('loading');
    //         },
    //         complete: function (response) {
    //             $thisbutton.addClass('added').removeClass('loading');
    //         },
    //         success: function (response) {
    //             session.html(response);
    //             if (response.error & response.product_url) {
    //                 window.location = response.product_url;
    //                 return;
    //             } else {
    //                 jQuery(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);
    //             }

    //             jQuery(document).on('click', '.checkout-button', function(e){
    //                 e.preventDefault();
    //                 /* JS Code to be called on modal open callback*/
    //                 var wp_ajax_url="<?php //echo admin_url( 'admin-ajax.php' ); ?>"
    //                 var data = {
    //                     action: 'getCheckoutPageContent'
    //                 };

    //                 jQuery.post( wp_ajax_url, data, function(content) {
    //                     console.log($thisbutton)
    //                     console.log(content);
    //                     session.html(content);
    //                 });
    //             })

    //         },
    //     });
 
    //     return false;
    // });

        // var acc = document.getElementsByClassName("is-accordion");
        // var i;

        // for (i = 0; i < acc.length; i++) {
        //     acc[i].addEventListener("click", function() {
        //         this.classList.toggle("active");
        //         var panel = this.nextElementSibling;
        //         if (panel.style.display === "block") {
        //             panel.style.display = "none";
        //         } else {
        //             panel.style.display = "block";
        //         }
        //     });
        // }
    });
</script>


<?php get_footer(); ?>