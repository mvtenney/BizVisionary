<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo get_bloginfo('name');?> | Business Developer</title>
 
    <?php wp_head(); ?>
  
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <!--NAVBAR STARTS-->
  <?php if ( has_nav_menu( 'menu-1' ) ) : ?>
    <nav id="site-navigation" class="main-navigation navigation-scroll-stopped" aria-label="<?php esc_attr_e( 'Top Menu', 'twentynineteen' ); ?>">
            <?php //fill with customizer stuff ?>
            <div class="bv_nav--top">
                <div class="bv_container nowrap">
                    <div class="bv_nav--top-left"><p>Hello <?php
                        $current_user = wp_get_current_user();
                        if (is_user_logged_in()){
                            echo $current_user->first_name;
                        } ?>!</p></div>
                    <div class="bv_nav--top-right">
                        
                        <a class="" href="/my-account/">My Account</a>
                        <?php if (is_user_logged_in()) : ?>
                            <a href="<?php echo wp_logout_url(get_permalink()); ?>">Sign Out</a>
                        <?php else : ?>
                            <a href="<?php echo wp_login_url(get_permalink()); ?>">Sign In</a>
                        <?php endif;?>
                        <a class="" href="/cart/">Cart</a> 
                    </div>
                </div>
            </div>
            <div class="bv_nav--bottom">
                <div class="bv_nav--container">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_class'     => 'main-menu',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    )
                );
                ?>
                    <div id="bv_hamburger">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                </div>
            </div>
	</nav><!-- #site-navigation -->
 <?php endif ?>