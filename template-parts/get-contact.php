<?php
/**
 * Displays Contact form (general inquiry)
 *
 * @package WordPress
 * @subpackage bizvisionary-2019
 * @since 1.0.0
 */ ?>
<div class="wsd-modal" id="get-contact-modal">
    <div class="wsd-modal-content">
        <div class="wsd-modal-close btn-x">x</div>
        <?= do_shortcode('[gravityform id=3 title=true description=true ajax=true]'); ?>
    </div>
</div>
 
<script>
    jQuery(document).ready(function(){
        jQuery('.bv_get-contact-button').on('click', function(e){
            e.preventDefault();
            modalScript({
                "target":"#get-contact-modal",
                "right":true
            });
        });
    });
</script>