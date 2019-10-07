

<?php
/**
 * Displays Speaking modal
 *
 * @package WordPress
 * @subpackage bizvisionary-2019
 * @since 1.0.0
 */ ?>
<div class="wsd-modal" id="get-inquiry-modal">
    <div class="wsd-modal-content">
        <div class="wsd-modal-close btn-x">x</div>
        <?= do_shortcode('[gravityform id=4 title=true description=true ajax=true]'); ?>
    </div>
</div>
 
<script>
    jQuery(document).ready(function(){
        jQuery('.bv_get-inquiry-button').on('click', function(e){
            e.preventDefault();
            modalScript({
                "target":"#get-inquiry-modal",
                "right":true
            });
        });
    });
</script>