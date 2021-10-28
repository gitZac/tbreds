<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package thoroughbreds
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        
        <!-- <div id="thoroughbreds-search" class="noshow">
            
            <div class="row">
                
                <span class="fa fa-search"></span>
                
                <?php //get_search_form( ); ?>
                
                <span class="fa fa-close"></span>
       
                
                
            </div>
            
        </div> -->
        
        <div id="page" class="hfeed site">

            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'thoroughbreds'); ?></a>

            <header id="masthead" class="site-header" role="banner">

                <div id="thoroughbreds-header" class="frontpage<?php //echo is_front_page() ? 'frontpage' : ''; ?>">

                    <div class="header-inner">

                        <div class="row row--full-width">
                            <div class="col-xs-5">
                                <div class="thoroughbreds-branding">
                                    <div class="site-branding">
                                        <div id="thoroughbreds-logo" class="<?php echo get_theme_mod('logo_bool', 'on' ) == 'on' ? 'show' : 'hidden'; ?>">
                                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                                <img src="<?php echo get_theme_mod( 'logo', get_template_directory_uri() . '/inc/images/logo.png' ) ?>" title="<?php bloginfo('name'); ?>" />
                                            </a>
                                        </div>
                                            <h1 class="site-title <?php echo get_theme_mod('logo_bool', 'on' ) == 'off' ? 'show' : 'hidden'; ?>">
                                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                                            </h1>

                                            <p class="site-description <?php echo get_theme_mod('logo_bool', 'on' ) == 'off' ? 'show' : 'hidden'; ?>">
                                                <?php bloginfo('description'); ?>
                                            </p>
                                            
                                        <?php //endif; ?>
                                        
                                    </div><!-- .site-branding -->

                                </div>

                            </div>
                            <div class="col-xs-7">
                                <div class="thoroughbreds-header-menu">

                                    <?php if( class_exists( 'WooCommerce' ) ) : ?>
                                    
                                        <div class="thoroughbreds-mobile-cart">

                                            <a class="thoroughbreds-cart" href="<?php echo function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : WC()->cart->get_cart_url(); ?>"><span class="fa fa-shopping-cart"></span> <?php echo WC()->cart->get_cart_total(); ?></a>

                                        </div>
                                    
                                    <?php endif; ?>
                                    
                                    
                                    <nav id="site-navigation" class="main-navigation" role="navigation">
                                        
                                        <?php
                                        
                                        if( has_nav_menu( 'primary' ) ) :
                                            
                                            $menu = wp_nav_menu(array(
                                                'theme_location' => 'primary',
                                                'menu_id' => 'primary-menu',
                                                'menu_class' => 'thoroughbreds-nav',
                                            ));
                                        else :
                                            
                                            echo '<div id="thoroughbreds-add-menu"><a class="thoroughbreds-cart" href="' . admin_url( 'nav-menus.php' ) . '">' . __( 'Add a Primary Menu', 'thoroughbreds' ) . '</a></div>';
                                        
                                        endif;
                                        

                                        ?>


                                    </nav><!-- #site-navigation -->

                                    
                                </div>
                            </div>





                        </div>
                    </div>
                </div>

            </header><!-- #masthead -->

            <div id="content" class="site-content">
