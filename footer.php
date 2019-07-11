</div>
</div>
<footer class="bv_footer">
   <div class="bv_container">
      <div class="bv_footer--half">
             <h3>About Bizvisionary </h3>
          <p>  I understand the concerns, goals and budgets of entrepreneurs so I cater my services to the strivers who want to market themselves professionally and effectively but can’t afford to hire a fully staffed marketing agency.</p>
         
      </div>
      <!-- <div class="verticalLine"></div>-->
      <!-- Begin Mailchimp Signup Form -->
      <div class="bv_footer--half">
         <div id="mc_embed_signup">
            <form action="https://gmail.us3.list-manage.com/subscribe/post?u=075e0e1d5ffc31893867d5869&amp;id=c137549720" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
               <div id="mc_embed_signup_scroll">
                  <label for="mce-EMAIL">Subscribe</label>
                  <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
                  <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                  <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_075e0e1d5ffc31893867d5869_c137549720" tabindex="-1" value=""></div>
                  <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="bv_button__primary--signup" ></div>
               </div>
            </form>
         </div>
         <!--End mc_embed_signup-->
         <div class="site-footer-connect">
<?php wp_nav_menu(
               array(
                   'theme_location' => 'social-menu',
                   'menu_class'     => 'main-menu',
                   'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
               )
               ); ?>
         </div>
      </div>
   
   <div class="bv_footer--full-width">
      <div class="site-footer-links">
          <div class="site-footer-links-col">
          <h3>Contact</h3>
       
            <?php wp_nav_menu(
               array(
                   'theme_location' => 'footer-menu1',
                   'menu_class'     => 'main-menu',
                   'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
               )
               ); ?>
               </div>
               <div class="site-footer-links-col">
<h3>Disclosures</h3>
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
            </div>
            </div>
   <!--  <div class="verticalLine"></div>-->
</footer>
<?php wp_footer(); ?>
</body>
</html>