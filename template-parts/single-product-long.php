<?php
/**
 * Displays single product Long description call to action
 *
 * @package WordPress
 * @subpackage bizvisionary-2019
 * @since 1.0.0
 */
$upload_dir = wp_upload_dir();
?>


<div class="shop">
   <div class="WkBkPitchIntro">
      <div class="wkBkPitch1">
         <div class="bv_container">
            <?php $bdw = wc_get_product(193);?>

            <h3 id="mastercollection"><?=$bdw->get_name()?></h3>
            <div class="bv_grid-col--two">
               <div>
                  <p>Answer the questions that a business coach would ask, learn to think like your ideal customer, use the industry tested surveys and business tools that marketing firms use to develop a marketing plan on your own without the cost of hiring a fully staffed agency!</p>
                  <p>Work through the master collection of brand development workshops by yourself or with your business partners. If you need help answering the questions and coming up with concepts, schedule some sessions with BizVisionary to guide you through the workshops in person.</p>
               </div>
               <div class="longDesc"><?= $bdw->get_description() ?></div>
            </div>
            
         </div>
      </div>
   </div>
   <div class="bv_container products">
      <div class="products-desc">
         <div class="bv_grid-col--two fifty-fifty">
            <div class="products-img">
               <img alt="brand development workshop" src="<?= $upload_dir['baseurl'] . '/2019/06/Workbook_Img-e1561596990639.png' ?>">
            </div>
            <div class="product-desc-group">
               <?= $bdw->get_short_description() ?>
               <a class="bv_button cta" href="/cart/?add-to-cart=193">Get the Workshop $<?= $bdw->get_price() ?></a>
            </div>
         </div>
      </div>
   </div>
   
</div>

<!--   <a class="bv_button cta" href="/cart<?=$bdw->add_to_cart_url()?>">Get the Workshop</a>-->