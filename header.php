<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <!--NAVBAR STARTS-->
  <?php if ( has_nav_menu( 'menu-1' ) ) : ?>
    <nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'twentynineteen' ); ?>">
            <?php //fill with customizer stuff ?>
            <div class="topNav">
                <div class="container">
                    <div class="navLeft">Get the Brand Development Workshop 10% off with offer code SPRINGMADNESS</div>
                    <div class="navRight"><a class="xSmallPromo" href="/branding.php">Get the Workshop</a></div>
                </div>
            </div>
            <div class="bottomNav">
                <div class="container">
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
                </div>
            </div>
	</nav><!-- #site-navigation -->
 <?php endif ?>