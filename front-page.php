<?php
get_header();

?>
<script>
    jQuery(document).ready(function(){
        jQuery('.servicesNav li').click(function () {
            var servicesID = jQuery(this).attr('id');
            var thisItem = jQuery('.servicesNav li').index(this);
            
            jQuery('.servicesNav li').removeClass('active');
            jQuery(this).addClass('active');
            
            jQuery('.gridcontent').removeClass('active');
            jQuery(".grid").find( ".gridcontent" ).eq(thisItem).addClass('active');
        });

        //add scroll handler to change opacity on navbar
        jQuery(window).scroll(function() {
            clearTimeout(jQuery.data(this, 'scrollTimer'));
            jQuery('#site-navigation').removeClass('navigation-scroll-stopped');
            jQuery.data(this, 'scrollTimer', setTimeout(function() {
                jQuery('#site-navigation').addClass('navigation-scroll-stopped');
                console.log("Haven't scrolled in 250ms!");
            }, 250));
        });

    });
</script>

<div class="hero">
    <div class="bv_container">
        <div class="herotext">
            <h1><span class="slideIn">Design the business you've always wanted.</span></h1>
            <div class="bv_button__group">
                <a class=" bv_button bv_button__primary bv_button--large">SCHEDULE NOW</a>
                <a class="bv_button bv_button__secondary bv_button--large">Learn More</a>
            </div>  
        </div>
    </div>
    

    <div class="backgroundBackground">
        <div class="inkImg">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%"
            height="100%" viewBox="0 0 1920 1080" xml:space="preserve">
            <g>
                <path
                d="M1756.59,1032c-1.23-29-105-56.72-128.12-50.2-22.93,6.46-45.83,12.8-68.77,19.33s-43.67,13.14-62.17,20a61.19,61.19,0,0,1-9.46,25.75c-5.36,8.36-12.27,11.95-21.18,11.07-13.24-1.4-23.63-9.19-30.75-23.27-7.62-14.07-18-22-31.18-23.28-14-1.51-34.24,1.91-60.62,10.39-8.27,10.39-18.6,19.21-31.46,23.24-18.82,5.91-42-1.3-50.15-20.27a30.14,30.14,0,0,1,1.5-26.91c4.84-8.59,13-14.45,21.73-18.73q-9.69-35.48-36.31-44.41a281.93,281.93,0,0,0-62.23-13.28c-.26,0-.52,0-.77-.05l0,0c-9.44,9.77-12.51,23.21-16,35.91-2.83,10.3-6,21.3-13.61,29.18-7.09,7.33-18,12.44-28.26,9.62-11.48-3.16-19-13.37-23.26-24.89a33.06,33.06,0,0,1-5.51-12.68,4.65,4.65,0,0,1-1.07-3.17c.27-17.81,8.2-35.23,22.85-45.65.09-8.71-1.83-20.7-6-36-4.63-18.39-13.66-28.21-26.78-29.52-8.66-1-19.91,0-33.66,3.05s-25,3.89-33.8,3c-26.46-2.87-38.57-13-36.65-30.52a123,123,0,0,1,10.68-39,119.29,119.29,0,0,0,10.95-38.87c1.78-17.6-6-27.42-23.7-29.22-13.3-1.42-28.82-.87-46.9,1.68s-37.94,2.57-60.16.27c2.45-22,15.29-38.41,38.65-49.3,23.57-10.85,36.29-27.31,38.64-49.24,2.32-22.14-2.12-41.44-13.89-58.29-11.53-16.91-34.75-27-70.06-30.73,1-9,6.81-21.7,17.28-38.35,10.83-16.69,16.67-29.38,17.66-38.1-7.38-14.24-15-27.3-22.53-39.14-7.9-12-11.09-22.4-10.12-31,1.4-13.35,13.89-25.35,37.24-36.21S944.92,317,947.35,295s-5.36-33.93-23-35.81-25.27-14-22.87-35.81c1.37-13.25,6.78-21.52,16-25a243.63,243.63,0,0,1,34.44-9.77l.79-.19c-.83-19.26-1.39-41.39,14.27-52.9a276.72,276.72,0,0,1,28.6-57.16c.5-.77,1-1.54,1.53-2.31,5.32-16.73,15.46-31.46,31-39.35A393.16,393.16,0,0,1,1066.48.32l.38-.32H0V1080H1798.3C1772,1077.15,1758.07,1061.24,1756.59,1032Z"
                style="fill: #222" />
                <path
                d="M1920,831.26V1080H1798.3l13.73-5.33.94-6.47a197.34,197.34,0,0,0-32.29-73.55c-15.32-21.68-8.39-66.63,15.52-81.81,23.72-15.32,50.08-32.56,78.75-51.66Q1898.58,845.28,1920,831.26Z"
                style="fill: #222" />
            </g>
            </svg>
        </div>
    </div>
</div>

<!--MISSION STATEMENT SECTION START -->
<div class="mission-statement">
    <div class="about-me-text-mini">
        <h2>I <abbr style="color:#59B9E5; font-weight:bold; text-transform:uppercase;" title="support. equip. educate.">See</abbr> What Your Business Can Be</h2>
        <p> I partner with entrepreneurs and business owners to launch & grow their marketing efforts.
            I <span style="color:#59B9E5; font-weight:bold; text-transform:uppercase;" title="see">Support, Equip</span> and <span style="color:#59B9E5; font-weight:bold; text-transform:uppercase;" title="see">Educate</span> through strategy sessions, media development, creative design and brand development workshops.
        </p>
        <a class="bv_link" href="/branding.php">About Me</a>
    </div>
</div>
<!--MISSION STATEMENT SECTION END -->

<div class="newbiz" id="newbiz">
    <div class="bv_container">

        <h4>Choose your own programming</h4>
        <p class="programming-paragraph">Schedule a session to receive your interactive curriculum with worksheets, prompts and surveys. The curriculum will help assess your business, pinpoint your problems and get you to start thinking about possible solutions. When you complete your homework, we’ll be on the same page and ready to maximize our time together. </p>
        
        <?php
            $workshops = woocommerce_subcats_from_parentcat_by_ID(27);
            $workshopsInfo;
            $firstWorkshop = true;
            
            foreach ($workshops['productsContent'] as $workshopContentGroup){
                if ($firstWorkshop) {
                    $workshopsInfo .= '<div class="gridcontent active">';
                    $firstWorkshop = false;
                } else {
                    $workshopsInfo .= '<div class="gridcontent">';
                }
                $workshopsInfo .= '<ul class="gridtext">';
                foreach ($workshopContentGroup as $workshopContent){
                    $workshopsInfo .= $workshopContent; 
                }
                $workshopsInfo .= '</ul>';
                $workshopsInfo .= '</div>';
            }   
        ?>
        <div class="servicesNav">
            <ul>
                <?php echo $workshops['productsNav']; ?>
            </ul>
        </div>
    
        <div class="serviceslist">
            <div class="grid">
            <?php echo $workshopsInfo ?>
            </div>
        </div>

    </div>
</div>

<!--BIZ SHOP MINI SECTION START -->
<?php get_template_part('template-parts/single' , 'product');?>
<!--BIZ SHOP MINI SECTION END -->

<!--SERVICES SECTION START -->
    <!-- <div class="services">
        <h1><a class="button-newbiz" href="#newbiz">Schedule Consultation<br>&smile;</a></h1>
        <div class="verticalLine"></div>
        <h1>Speaking Engagement<br>&smile;</h1>
    </div> -->


<!--MISSION STATEMENT SECTION START -->
<div class="why-choose">
    <div class="bv_container">
    <div class="why-choose-text-mini">
        <h2>Why Choose BizVisionary</h2>
        <p>I understand the concerns, goals and budgets of entrepreneurs so I cater my services to the strivers who want to market themselves professionally and effectively but can’t afford to hire a fully staffed marketing agency. I will assess your marketing needs and show you the tools, platforms, and the known strategies to reach more people in more meaningful ways. 

</p><p>My results-driven sessions include marketing exercises, brainstorming, advice and educational resources in order to develop your vision, pricing structure, marketing processes and procedures for years to come. But I don’t stop there. 

</p><p>I execute all stages of design for professional logos, pamphlets, flyers, business cards, trade show material, product packaging, and digital media to spread your message with consistency and organization.
</p>
        <a class="link" href="/branding.php">Schedule Consultation</a>
        <a class="link" href="/branding.php">Schedule Speaking Event</a>
    </div>
</div>
</div>
<!--MISSION STATEMENT SECTION END -->



<?php
get_footer();
?>