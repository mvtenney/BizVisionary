<?php

/**
 * Template Name: Contact Page
 *
 * @package WordPress
 * @subpackage bizvisionary-2019
 * @since 1.0.0
 */

get_header();
wp_enqueue_script('bizvisionary-modal-js');
?>

<section id="primary" class="content-area">
	<main id="main" class="site-main">

		<div class="bv-contact">
			<div class="bv_container">
				<div class="content-right">
					<h2>LET'S CREATE SOMETHING</h2>
					
					<p>My favorite part about doing what I do is
					getting to interact with other visionaries and
					self-motivated people with big ideas.</p>
					
					<p>I take pride in including my clients in the
					creative process and teaching them what I
					know along the way.</p>
				</div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/contact/10_BW_800.png" alt="">
			</div>
		</div>

		<div class="bv-contact-details">
			<div class="bv-container">

				<div class="contact-method">
					<div class="inner-contact-method">
					<img src="<?php echo get_template_directory_uri(); ?>/images/contact/General_Inquiry-01.png" alt="General Inquiry">
					<a href="#" class="bv_button cta" id="launchSpeakingModal">General Inquiry</a>
					</div>
				</div>

				<div class="contact-method">
					<div class="inner-contact-method">
						<img src="<?php echo get_template_directory_uri(); ?>/images/contact/Schedule_Session-01.png" alt="Schedule a Session">
						<a href="/shop/" class="bv_button cta">Schedule a Session</a>
					</div>
				</div>

				<div class="contact-method">
					<div class="inner-contact-method">
						<img src="<?php echo get_template_directory_uri(); ?>/images/contact/Get_a_Quote-01.png" alt="Get a Quote">
						<a href="#" class="bv_button cta" id="launchQuoteModal">Get a Quote</a>
					</div>
				</div>

			</div>

			<div class="bv-container bottom-row">

				<div class="contact-method">
					<div class="inner-contact-method">
						<img src="<?php echo get_template_directory_uri(); ?>/images/contact/Free_Consultation-01.png" alt="Free Consultation">
						<a href="/product/free-video-consultation/" class="bv_button cta">Free Consultation</a>
					</div>
				</div>

				<div class="contact-method">
					<div class="inner-contact-method">
						<img src="<?php echo get_template_directory_uri(); ?>/images/contact/Speaking-01.png" alt="Speaking">
						<a href="#" class="bv_button cta" id="launchInquiryModal">Speaking</a>
					</div>
				</div>

			</div>
		</div>

		<div class="wsd-modal" id="getInquiryModal">
			<div class="wsd-modal-content">
				<div class="wsd-modal-close btn-x">x</div>
				<?= do_shortcode('[gravityform id=4]'); ?>
			</div>
		</div>

		<div class="wsd-modal" id="getQuoteModal">
			<div class="wsd-modal-content">
				<div class="wsd-modal-close btn-x">x</div>
				<?= do_shortcode('[gravityform id=1]'); ?>
			</div>
		</div>	

		<div class="wsd-modal" id="getSpeakingModal">
			<div class="wsd-modal-content">
				<div class="wsd-modal-close btn-x">x</div>
				<?= do_shortcode('[gravityform id=3]'); ?>
			</div>
		</div>

		<?php while (have_posts()) : the_post(); ?>

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
		echo do_shortcode('[testimonial slug="1151"]');
		?>

	</main><!-- #main -->
</section><!-- #primary -->
<script>
jQuery(document).ready(function(){
	jQuery("#launchQuoteModal").on('click', function(e){
		e.preventDefault();
		modalScript({
			target: '#getQuoteModal',
			right: true
		});
	});

	jQuery("#launchInquiryModal").on('click', function(e){
		e.preventDefault();
		modalScript({
			target: '#getInquiryModal',
			right: true
		});
	});

	jQuery("#launchSpeakingModal").on('click', function(e){
		e.preventDefault();
		modalScript({
			target: '#getSpeakingModal',
			right: true
		});
	});

});
</script>
<?php
get_footer();
