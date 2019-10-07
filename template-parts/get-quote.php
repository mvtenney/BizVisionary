<?php
/**
 * Displays quote form modal
 *
 * @package WordPress
 * @subpackage bizvisionary-2019
 * @since 1.0.0
 */ ?>
<div class="wsd-modal" id="get-quote-modal">
    <div class="wsd-modal-content">
        <div class="wsd-modal-close btn-x">x</div>
        <?= do_shortcode('[gravityform id=1 title=true description=true ajax=true]'); ?>
    </div>
</div>
 
<script>
    jQuery(document).ready(function(){
        jQuery('.bv_get-quote-button').on('click', function(e){
            e.preventDefault();
            modalScript({
                "target":"#get-quote-modal",
                "right":true
            });
        });
    });
</script>