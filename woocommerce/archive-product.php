<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
//do_action( 'woocommerce_before_main_content' );

?>
<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php //get_template_part('template-parts/content', 'title'); ?>
		<div class="bv_products_area  bv_container">
			<h2>Define Your Brand</h2>
			<?= do_shortcode('[products columns="4" limit="-1" category="define"]');?>
			<h2>Captivate Your Audience</h2>
			<?= do_shortcode('[products columns="4" limit="-1" category="captivate"]');?>
			<h2>Promote Your Message</h2>
			<?= do_shortcode('[products columns="4" limit="-1" category="promote"]');?>
			<h2>Other Resources</h2>
			<?= do_shortcode('[products columns="4" limit="-1" category="consultations, physical-publication"]');?>
		</div>
<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );
?>
</main> 
</section>
<?php
get_footer(  );
