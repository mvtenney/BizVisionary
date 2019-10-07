<?php
get_template_part('template-parts/get', 'quote');
get_template_part('template-parts/get', 'inquiry');
get_template_part('template-parts/get', 'contact');
?>
<footer class="bv_footer">
   <div class="bv_container">
      <h3>Subscribe and Grow</h3>
      <div class="bv_footer-top">
         <p class="footer-top-left">
            If you have a vision for what your organization or product can represent, I can help you bring it to life. Enter your email address to receive branding briefs, business resources, and invitations to upcoming events. 
         </p>
         <!-- Begin Mailchimp Signup Form -->

         <div class="footer-top-right">
            <div id="mc_embed_signup">
               <form action="/subscribe.php" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                  <div id="mc_embed_signup_scroll">
                     <!-- <label for="mce-EMAIL">Subscribe</label> -->
                     <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                     <div style="position: absolute; left: -5000px;" aria-hidden="true">
                        <input type="text" name="b_075e0e1d5ffc31893867d5869_c137549720" tabindex="-1" value="">
                     </div>
                     <div class="form-messages-subscribe">
                        <!-- Here is where subscription notices go -->
                     </div>
                     <div class="subscribe-fields">
                        <input type="text" name="first_name" placeholder="first name">
                        <input type="text" name="last_name" placeholder="last name">
                        <div class="one-line-subscribe">
                           <input type="email" value="" name="email" class="email" id="mce-EMAIL" placeholder="email address" required>
                           <button type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe"><i class="fas fa-paper-plane"></i></button>
                        </div>
                     </div>
                     
                  </div>
               </form>
            </div>
            <!--End mc_embed_signup-->
         </div>
      </div>

      <div class="bv_footer--full-width">
         <div class="site-footer-links">
            <div class="site-footer-links-col">
               <h3>Get in Touch</h3>

               <?php wp_nav_menu(
                  array(
                     'theme_location' => 'footer-menu1',
                     'menu_class'     => 'main-menu',
                     'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                  )
               ); ?>
            </div>
            <div class="site-footer-links-col">
               <h3>About &amp; Legal</h3>
               <?php wp_nav_menu(
                  array(
                     'theme_location' => 'footer-menu2',
                     'menu_class'     => 'main-menu',
                     'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                  )
               ); ?>
            </div>
            <div class="site-footer-links-col">
               <h3>Resources</h3>
               <?php wp_nav_menu(
                  array(
                     'theme_location' => 'footer-menu3',
                     'menu_class'     => 'main-menu',
                     'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                  )
               ); ?>
            </div>
            <div class="site-footer-links-col">
               <h3>Services</h3>
               <?php wp_nav_menu(
                  array(
                     'theme_location' => 'footer-menu4',
                     'menu_class'     => 'main-menu',
                     'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                  )
               ); ?>
            </div>
         </div>
         <p id="bv-footer-end">&copy; 2010 &ndash; <?= Date('Y'); ?> &bull; BizVisionary &bull; All Rights Reserved</p>
      </div>
   </div>
   <!--  <div class="verticalLine"></div>-->
</footer>
<?php wp_footer(); ?>
</body>

</html>