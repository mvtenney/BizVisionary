/*
Theme Name: BizVisionary 2019
Theme URI: bizvisionary.com
Author: Michael Tenney
Author URI: http://michaeltenney.com
Description: Theme JS for BizVisionary Site.
Version: 1.4
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: N/A
Text Domain: bizvisionary-2019
*/

jQuery(document).ready(function () {

    // Show Testimonial Modals
    jQuery('.testimonial-modal').on('click', function (e) {
        e.preventDefault();
        modal = "#" + jQuery(this).attr('id') + '-window';
        modalScript({
            "target": modal
        });
    });

    // Show download Modals
    jQuery('.bv_download-modal').on('click', function (e) {
        e.preventDefault();
        console.log('opened modal?');
        modal = "#" + jQuery(this).attr('id') + '-window';
        modalScript({
            "target": modal
        });
    });

    // Show/Hide Meeting Location
    jQuery('.wc-pao-addon-preferred-meeting-location').hide();

    jQuery('.wc-pao-addon-image-swatch').on('click', function () {
        if (jQuery(this).attr('data-value') == 'in-person-1') {
            jQuery('.wc-pao-addon-preferred-meeting-location').show();
        } else if (jQuery(this).attr('data-value') != 'in-person-1') {
            jQuery('.wc-pao-addon-preferred-meeting-location').hide();
        }
    });

    jQuery('.servicesNav li').click(function () {
        var servicesID = jQuery(this).attr('id');
        var thisItem = jQuery('.servicesNav li').index(this);

        jQuery('.servicesNav li').removeClass('active');
        jQuery(this).addClass('active');

        jQuery('.gridcontent').removeClass('active');
        jQuery(".grid").find(".gridcontent").eq(thisItem).addClass('active');
    });

    //add scroll handler to change opacity on navbar
    jQuery(window).scroll(function () {
        clearTimeout(jQuery.data(this, 'scrollTimer'));
        jQuery('#site-navigation').removeClass('navigation-scroll-stopped');
        jQuery.data(this, 'scrollTimer', setTimeout(function () {
            jQuery('#site-navigation').addClass('navigation-scroll-stopped');
            console.log("Haven't scrolled in 250ms!");
        }, 250));
    });


    jQuery("#bv_hamburger").on('click', function () {
        jQuery(this).toggleClass('change');
        jQuery('.menu-menu-1-container').toggleClass('show');
    });

    jQuery('.get-free-download-form').submit(function (event) {
        event.preventDefault();
        var id = jQuery(this).attr('data-id');
        var formMessages = jQuery('#form-messages-' + id);
        var formData = jQuery(this).serialize();

        jQuery.ajax({
            type: 'POST',
            url: jQuery(this).attr('action'),
            data: formData
        })
            .done(function (response) {
                response = JSON.parse(response);
                console.log(response);
                // Make sure that the formMessages div has the 'success' class.
                jQuery(formMessages).removeClass('error');
                jQuery(formMessages).addClass('success');
                window.open(response.fileSent, '_blank');
                // Set the message text.
                jQuery(formMessages).text('Thanks For Downloading!');

                // Clear the form.
                jQuery('bv_download-modal-' + id + '-firstName').val('');
                jQuery('bv_download-modal-' + id + '-lastName').val('');
                jQuery('bv_download-modal-' + id + '-emailName').val('');
            })
            .fail(function (data) {
                // Make sure that the formMessages div has the 'error' class.
                jQuery(formMessages).removeClass('success');
                jQuery(formMessages).addClass('error');

                // Set the message text.
                if (data.responseText !== '') {
                    jQuery(formMessages).text(data.responseText);
                } else {
                    jQuery(formMessages).text('Oops! An error occured and your message could not be sent.');
                }
            });
    });
    
    jQuery('#mc-embedded-subscribe-form').submit(function (e) {
        e.preventDefault();
        var formMessages = jQuery('#form-messages-subscribe');
        var success = jQuery('#mc-embedded-subscribe-form .subscribe-fields');
        var formData = jQuery(this).serialize();

        jQuery.ajax({
            type: 'POST',
            url: '/subscribe.php',
            data: formData
        })
            .done(function (response) {
                // Make sure that the formMessages div has the 'success' class.
                jQuery(formMessages).removeClass('error');
                jQuery(formMessages).addClass('success');
                // Set the message text.
                jQuery(success).html('Thanks For Subscribing!');
            })
            .fail(function (data) {
                // Make sure that the formMessages div has the 'error' class.
                jQuery(formMessages).removeClass('success');
                jQuery(formMessages).addClass('error');

                // Set the message text.
                if (data.responseText !== '') {
                    jQuery(formMessages).text(data.responseText);
                } else {
                    jQuery(formMessages).text('Oops! An error occured and your subscription could not be completed.');
                }
            });
    });

});