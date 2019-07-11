<?php
/**
 * Displays single product call to action
 *
 * @package WordPress
 * @subpackage bizvisionary-2019
 * @since 1.0.0
 */
$upload_dir = wp_upload_dir();
?>



<div class="shop">
    <div class="container">
        <h4>Invest your time, save your money</h4>
        <div class="products">
            <div class="products-img">
                <img alt="brand development workshop" src="<?php echo $upload_dir['baseurl'] . '/2019/06/Workbook_Img-e1561596990639.png' ?>">
            </div>
            <div class="products-desc">
            <?php $bdw = wc_get_product(193);
                echo '<h3>'.$bdw->get_name().'</h3>'.
                '<p>'.$bdw->get_description().'</p>'.
                '<a class="button cta" href="/cart'.$bdw->add_to_cart_url().'">Get the Workshop</a>';
            ?>
            </div>
        </div>
    </div>
</div>