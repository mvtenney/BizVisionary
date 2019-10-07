<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the cart list product item title.
 *
 * This template can be overridden by copying it to yourtheme/woo-floating-cart/parts/cart/list/product/price.php.
 *
 * Available global vars: $product, $cart_item, $cart_item_key
 *
 * HOWEVER, on occasion we will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @link       http://xplodedthemes.com
 * @since      1.0.0
 *
 * @package    XT_Woo_Floating_Cart
 * @subpackage XT_Woo_Floating_Cart/public/templates/parts
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} 
//var_dump($product);
?>

<div class="xt_woofc-price amount">
<span>$<?= $product->get_price(); ?> Total</span><br>
<?php 
if ( ! empty( $cart_item['is_deposit'] ) ) {
	$deposit_amount = apply_filters( 'woocommerce_deposits_get_deposit_amount', $cart_item['deposit_amount'], $_product );
?>
	<span>$<?= $deposit_amount; ?> Deposit</span>
<?php } ?>

</div>
