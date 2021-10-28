<?php

/**
 * 
 * thoroughbreds WordPress Theme
 * 
 * This file contains most of the work done by thoroughbreds
 * It's pretty straight forward, feel free to edit if you're comfortable with basic PHP
 * 
 * If you got here, thank you for using this theme ! Hack away at it as you see fit.
 * Please take a minute to leave us a review on WordPress.org
 * 
 * 
 */


function thoroughbreds_scripts() {

    wp_enqueue_style('thoroughbreds-style', get_stylesheet_uri() );

    wp_enqueue_script('thoroughbreds-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);

    wp_enqueue_script('thoroughbreds-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }


    if ( 'Raleway, sans-serif' == get_theme_mod('header_font', 'Raleway, sans-serif') || 'Raleway, sans-serif' == get_theme_mod('theme_font', 'Raleway, sans-serif') )
        wp_enqueue_style('thoroughbreds-font-raleway', '//fonts.googleapis.com/css?family=Raleway:400,300,600', array(), thoroughbreds_VERSION);

    if ( 'Lato, sans-serif' == get_theme_mod('header_font', 'Raleway, sans-serif') || 'Lato, sans-serif' == get_theme_mod('theme_font', 'Raleway, sans-serif') )
        wp_enqueue_style('thoroughbreds-font-lato', '//fonts.googleapis.com/css?family=Lato:400,700,300', array(), thoroughbreds_VERSION);

    if ( 'Source Sans Pro, sans-serif' == get_theme_mod('header_font', 'Raleway, sans-serif') || 'Source Sans Pro, sans-serif' == get_theme_mod('theme_font', 'Raleway, sans-serif') )
        wp_enqueue_style('thoroughbreds-font-source', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700,300', array(), thoroughbreds_VERSION);

    if ( 'Open Sans, sans-serif' == get_theme_mod('header_font', 'Raleway, sans-serif') || 'Open Sans, sans-serif' == get_theme_mod('theme_font', 'Raleway, sans-serif') )
        wp_enqueue_style('thoroughbreds-font-opensans', '//fonts.googleapis.com/css?family=Open+Sans:400,300,600', array(), thoroughbreds_VERSION);

    if ( 'Lobster Two, cursive' == get_theme_mod('header_font', 'Raleway, sans-serif') || 'Lobster Two, cursive' == get_theme_mod('theme_font', 'Raleway, sans-serif') )
        wp_enqueue_style('thoroughbreds-font-lobster', '//fonts.googleapis.com/css?family=Lobster+Two:400,700', array(), thoroughbreds_VERSION);


    wp_enqueue_style('thoroughbreds-font-cursive', '//fonts.googleapis.com/css2?family=Sacramento&display=swap', array(), thoroughbreds_VERSION);

    wp_enqueue_style('thoroughbreds-bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.css', array(), thoroughbreds_VERSION);
    // wp_enqueue_style('thoroughbreds-bulma', get_template_directory_uri() . '/inc/css/bulma.min.css', array(), thoroughbreds_VERSION);

    wp_enqueue_style('thoroughbreds-bootstrap-grid', get_template_directory_uri() . '/inc/css/bootstrap-grid.min.css', array(), thoroughbreds_VERSION);
    wp_enqueue_style('thoroughbreds-bootstrap-theme', get_template_directory_uri() . '/inc/css/bootstrap-theme.min.css', array(), thoroughbreds_VERSION);
    wp_enqueue_style('thoroughbreds-fontawesome', get_template_directory_uri() . '/inc/css/font-awesome.css', array(), thoroughbreds_VERSION);
    wp_enqueue_style('thoroughbreds-main-style', get_template_directory_uri() . '/dist/assets/css/bundle.css', array(), thoroughbreds_VERSION);
    wp_enqueue_style('thoroughbreds-camera-style', get_template_directory_uri() . '/inc/css/camera.css', array(), thoroughbreds_VERSION);
    wp_enqueue_style('thoroughbreds-animations', get_template_directory_uri() . '/inc/css/animate.css', array(), thoroughbreds_VERSION);
    wp_enqueue_style('thoroughbreds-slicknav', get_template_directory_uri() . '/inc/css/slicknav.min.css', array(), thoroughbreds_VERSION);
    wp_enqueue_style('thoroughbreds-template', get_template_directory_uri() . '/inc/css/temps/' . esc_attr(get_theme_mod('theme_color', 'green')) . '.css', array(), thoroughbreds_VERSION);

    wp_enqueue_script('thoroughbreds-sticky', get_template_directory_uri() . '/inc/js/sticky.min.js', array('jquery'), thoroughbreds_VERSION, true);
    wp_enqueue_script('thoroughbreds-easing', get_template_directory_uri() . '/inc/js/easing.js', array('jquery'), thoroughbreds_VERSION, true);
    wp_enqueue_script('thoroughbreds-camera', get_template_directory_uri() . '/inc/js/camera.js', array('jquery'), thoroughbreds_VERSION, true);
    wp_enqueue_script('thoroughbreds-parallax', get_template_directory_uri() . '/inc/js/parallax.min.js', array('jquery'), thoroughbreds_VERSION, true);
    wp_enqueue_script('thoroughbreds-carousel', get_template_directory_uri() . '/inc/js/owl.carousel.min.js', array('jquery'), thoroughbreds_VERSION, true);
    wp_enqueue_script('thoroughbreds-slicknav', get_template_directory_uri() . '/inc/js/slicknav.min.js', array('jquery'), thoroughbreds_VERSION, true);
    wp_enqueue_script('thoroughbreds-wow', get_template_directory_uri() . '/inc/js/wow.js', array('jquery'), thoroughbreds_VERSION, true);
    wp_enqueue_script('thoroughbreds-script', get_template_directory_uri() . '/inc/js/script.js', array('jquery', 'jquery-ui-core', 'jquery-masonry'), thoroughbreds_VERSION);
}

add_action('wp_enqueue_scripts', 'thoroughbreds_scripts');

function thoroughbreds_widgets_init() {

    register_sidebar(array(
        'name' => esc_html__('Right Sidebar', 'thoroughbreds'),
        'id' => 'sidebar-right',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Left Sidebar', 'thoroughbreds'),
        'id' => 'sidebar-left',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Shop Sidebar ( WooCommerce )', 'thoroughbreds'),
        'id' => 'sidebar-shop',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));


    register_sidebar(array(
        'name' => esc_html__('Footer', 'thoroughbreds'),
        'id' => 'sidebar-footer',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s col-sm-4">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Slider Overlay', 'thoroughbreds'),
        'id' => 'sidebar-overlay',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s col-sm-6">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Homepage', 'thoroughbreds'),
        'id' => 'sidebar-homepage',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s col-sm-12">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'thoroughbreds_widgets_init');



function thoroughbreds_do_left_sidebar( $args ) {
    
    if( get_theme_mod( 'sidebar_location', 'right' ) == 'none' ) :
        return;
    endif;
    
    if( $args[0] == 'frontpage' && get_theme_mod('home_sidebar') == 'off' )
        return;
    
    if( $args[0] == 'page' && get_theme_mod('page_sidebar') == 'off' )
        return;
    
    if( $args[0] == 'single' && get_theme_mod('single_sidebar') == 'off' )
        return;
    
    
    
    if( get_theme_mod( 'sidebar_location', 'right' ) == 'left' ) :
        
        echo '<div class="col-sm-4" id="thoroughbreds-sidebar">' .
        get_sidebar() . '</div>';
        
    endif;
    
    
}
add_action('thoroughbreds-sidebar-left', 'thoroughbreds_do_left_sidebar');

function thoroughbreds_do_right_sidebar( $args ) {
    
    if( get_theme_mod( 'sidebar_location', 'right' ) == 'none' ) :
        return;
    endif;
    
    if( $args[0] == 'frontpage' && get_theme_mod('home_sidebar') == 'off' )
        return;
    
    if( $args[0] == 'page' && get_theme_mod('page_sidebar') == 'off' )
        return;
    
    if( $args[0] == 'single' && get_theme_mod('single_sidebar') == 'off' )
        return;
    
    
    
    if( get_theme_mod( 'sidebar_location', 'right' ) == 'right' ) :
        
        echo '<div class="col-sm-4" id="thoroughbreds-sidebar">';
    
        get_sidebar();
        
        echo '</div>';
        
    endif;
    
    
}
add_action('thoroughbreds-sidebar-right', 'thoroughbreds_do_right_sidebar');

function thoroughbreds_main_width(){
    
    $width = 12;
    
    if( is_active_sidebar('sidebar-left') && is_active_sidebar('sidebar-right') ) :
        
        $width = 6;
        
    elseif( is_active_sidebar('sidebar-left') || is_active_sidebar('sidebar-right') ) :
        $width = 9;
    else:
        $width = 12;
    endif;
    
    
    return $width;
}


function thoroughbreds_get_image() {

    echo wp_get_attachment_url($POST['id']);

    exit();
}

add_action('wp_ajax_thoroughbreds_get_image', 'thoroughbreds_get_image');

function thoroughbreds_customize_nav($items) {

    if( get_theme_mod( 'show_search', 'on' ) == 'on' ) :
    $items .= '<li class="menu-item"><a class="thoroughbreds-search" href="#search" role="button" data-toggle="modal"><span class="fa fa-search"></span></a></li>';
    endif;
    
    if( class_exists( 'WooCommerce' ) ) :
        $items .= '<li><a class="thoroughbreds-cart" href="' . ( function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : WC()->cart->get_cart_url() ) . '"><span class="fa fa-shopping-cart"></span> ' . WC()->cart->get_cart_total() . '</a></li>';
    endif;
    
    
    
    return $items;
}

add_filter('wp_nav_menu_items', 'thoroughbreds_customize_nav');


function thoroughbreds_custom_css() {
    ?>
    <style type="text/css">


        body{
            font-size: <?php echo esc_attr( get_theme_mod( 'theme_font_size', '14px') ); ?>;
            font-family: <?php echo esc_attr( get_theme_mod( 'theme_font', 'Raleway, sans-serif' ) ); ?>;

        }
        h1,h2,h3,h4,h5,h6,.slide2-header,.slide1-header,.thoroughbreds-title, .widget-title,.entry-title, .product_title{
            font-family: <?php echo esc_attr( get_theme_mod('header_font', 'Raleway, sans-serif' ) ); ?>;
        }
        
        ul.thoroughbreds-nav > li.menu-item a{
            font-size: <?php echo esc_attr( get_theme_mod('menu_font_size', '14px' ) ); ?>;
        }
        
    </style>
    <?php
}

add_action('wp_head', 'thoroughbreds_custom_css');


function thoroughbreds_custom_js() { 
    
    
    if( get_theme_mod( 'blog_style', 'tiles' ) === 'tiles' ) :
    
    ?>
    <script type="text/javascript">
    jQuery(document).ready( function($) {
        $('.thoroughbreds-blog-content').imagesLoaded(function () {
            $('.thoroughbreds-blog-content').masonry({
                itemSelector: '.thoroughbreds-blog-post',
                gutter: 0,
                transitionDuration: 0,
            }).masonry('reloadItems');
        });
    });
    </script>
    <?php else : ?>
    <style>.thoroughbreds-blog-post{ width: 100% !important }</style>
    <?php 
    endif;
}

add_action('wp_head', 'thoroughbreds_custom_js');


function thoroughbreds_render_homepage() { ?>

    <div id="thoroughbreds-jumbotron">

        <div id="thoroughbreds-slider" class="hero">

            <div id="slide1" data-thumb="<?php echo esc_url( get_theme_mod('featured_image1', get_template_directory_uri() . '/inc/images/thoroughbreds.jpg' ) ); ?>" data-src="<?php echo esc_url( get_theme_mod( 'featured_image1', get_template_directory_uri() . '/inc/images/thoroughbreds.jpg' ) ); ?>">

                <div class="overlay">
                    <div class="row">
                        
                        <div class="col-sm-6 parallax">
                            <h2 class="header-text animated slideInDown slide1-header"><?php echo esc_attr( get_theme_mod( 'featured_image1_title', __( 'Welcome to thoroughbreds', 'thoroughbreds' )  ) ); ?></h2>
                            
                            <?php if( get_theme_mod( 'slide1_button1_text', 'True' ) ) : ?>
                            <a href="<?php echo esc_url( get_theme_mod( 'slide1_button1_url', '#') ); ?>"
                               class="thoroughbreds-button primary large animated flipInX slide1_button1 delay3">
                                <?php echo esc_attr( get_theme_mod( 'slide1_button1_text', __( 'View Features', 'thoroughbreds' )  ) ); ?>
                            </a>
                            <?php endif; ?>

                            <?php if( get_theme_mod( 'slide1_button2_text', 'True' ) ) : ?>
                            <a href="<?php echo esc_url( get_theme_mod( 'slide1_button2_url', '#') ); ?>"
                               class="thoroughbreds-button default large animated flipInX slide1_button2 delay3">
                                <?php echo esc_attr( get_theme_mod( 'slide1_button2_text', __( 'Learn More', 'thoroughbreds' )  ) ); ?>
                            </a>
                            <?php endif; ?>
                            
                        </div>
                        <div class="col-sm-6">

                        </div>

                    </div>
                </div>                    

            </div>                

            <div id="slide2" data-thumb="<?php echo esc_url(get_theme_mod('featured_image2', get_template_directory_uri() . '/inc/images/thoroughbreds2.jpg')); ?>" data-src="<?php echo esc_url(get_theme_mod('featured_image2', get_template_directory_uri() . '/inc/images/thoroughbreds2.jpg')); ?>">

                <div class="overlay">
                    
                    <div class="row">
                        
                        <div class="col-sm-6 parallax">
                            <h2 class="header-text animated slideInDown slide2-header"><?php echo esc_attr( get_theme_mod( 'featured_image2_title', __( 'Welcome to thoroughbreds', 'thoroughbreds' )  ) ); ?></h2>
                            
                            <?php if( get_theme_mod( 'slide2_button1_text', 'True' ) ) : ?>
                            <a href="<?php echo esc_url( get_theme_mod( 'slide2_button1_url', '#') ); ?>"
                               class="thoroughbreds-button primary large animated flipInX slide2_button1 delay3">
                                <?php echo esc_attr( get_theme_mod( 'slide2_button1_text', __( 'View Features', 'thoroughbreds' )  ) ); ?>
                            </a>
                            <?php endif; ?>

                            <?php if( get_theme_mod( 'slide2_button2_text', 'True' ) ) : ?>
                            <a href="<?php echo esc_url( get_theme_mod( 'slide2_button2_url', '#') ); ?>"
                               class="thoroughbreds-button default large animated flipInX slide2_button2 delay3">
                                <?php echo esc_attr( get_theme_mod( 'slide2_button2_text', __( 'Learn More', 'thoroughbreds' )  ) ); ?>
                            </a>
                            <?php endif; ?>
                            
                        </div>
                        <div class="col-sm-6">

                        </div>

                    </div>
                </div>                    

            </div>                

        </div>
        
        <?php if( get_theme_mod( 'overlay_bool', 'on' ) == 'on' ) : ?>
        <div id="thoroughbreds-overlay-trigger">

            <div class="overlay-widget">
                <div class="row">
                    <?php if (is_active_sidebar('sidebar-overlay')) : ?>
                        <?php dynamic_sidebar('sidebar-overlay'); ?>
                    <?php endif; ?>
                </div>
            </div>

            <span class="<?php echo esc_attr( get_theme_mod( 'overlay_icon', 'fa fa-plus' ) ); ?> animated rotateIn delay3"></span>
            
        </div>

        <div class="slider-bottom">
            <div>
                <span class="fa fa-chevron-down scroll-down animated slideInUp delay-long"></span>
            </div>
        </div>
        <?php endif; ?>
        
    </div>

    <div class="clear"></div>

    <?php if( get_theme_mod('callout_bool', 'on' ) == 'on' ) : ?>

    <div id="thoroughbreds-featured">

        <div class="col-sm-4 featured-box featured-box1" data-target="<?php echo esc_url( get_theme_mod( 'callout1_href', '#' ) ); ?>">

            <div class="reveal animated fadeInUp reveal">

                <div class="thoroughbreds-icon">
                    <span class="<?php echo esc_attr(get_theme_mod('callout1_icon', __('fa fa-laptop', 'thoroughbreds'))); ?>"></span>
                </div>

                <h3 class="thoroughbreds-title"><?php echo esc_attr(get_theme_mod('callout1_title', __('Responsive', 'thoroughbreds'))); ?></h3>

                <p class="thoroughbreds-desc"><?php echo esc_attr(get_theme_mod('callout1_text', __('thoroughbreds looks amazing on desktop and mobile devices.', 'thoroughbreds'))); ?></p>

            </div>

        </div>

        <div class="col-sm-4 featured-box featured-box2" data-target="<?php echo esc_url( get_theme_mod( 'callout2_href', '#' ) ); ?>">

            <div class="reveal animated fadeInUp delay1">

                <div class="thoroughbreds-icon">
                    <span class="<?php echo esc_attr(get_theme_mod('callout2_icon', __('fa fa-magic', 'thoroughbreds'))); ?>"></span>
                </div>

                <h3 class="thoroughbreds-title"><?php echo esc_attr(get_theme_mod('callout2_title', __('Customizable', 'thoroughbreds'))); ?></h3>

                <p class="thoroughbreds-desc"><?php echo esc_attr(get_theme_mod('callout2_text', __('thoroughbreds is easy to use and customize without having to touch code', 'thoroughbreds'))); ?></p>

            </div>

        </div>

        <div class="col-sm-4 featured-box featured-box3" data-target="<?php echo esc_url( get_theme_mod( 'callout3_href', '#' ) ); ?>">

            <div class="reveal animated fadeInUp delay2">

                <div class="thoroughbreds-icon">
                    <span class="<?php echo esc_attr(get_theme_mod('callout3_icon', __('fa fa-shopping-cart', 'thoroughbreds'))); ?>"></span>
                </div>

                <h3 class="thoroughbreds-title"><?php echo esc_attr(get_theme_mod('callout3_title', __('WooCommerce', 'thoroughbreds'))); ?></h3>

                <p class="thoroughbreds-desc"><?php echo esc_attr(get_theme_mod('callout3_text', __('thoroughbreds supports WooCommerce to build an online shopping site', 'thoroughbreds'))); ?></p>

            </div>
        </div>

    </div>
  <?php endif; ?>
    
   
    
    <?php get_sidebar('homepage'); ?>

    
    <?php
}

add_action( 'thoroughbreds_homepage', 'thoroughbreds_render_homepage' );


function thoroughbreds_render_footer(){ ?>
    
    <div class="thoroughbreds-footer" class="parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_attr( get_theme_mod('footer_background_image', get_template_directory_uri() . '/inc/images/footer.jpg' ) ); ?>">

    </div>
    
    <div class="clear"></div>
    
    <div class="site-info">
        
        <div class="row">
            
            <div class="thoroughbreds-copyright">
                <?php echo esc_attr( get_theme_mod( 'copyright_text', __( 'Copyright Company Name 2015', 'thoroughbreds' ) ) ); ?>
            </div>
            
            <div id="authica-social">
                
                <?php if( get_theme_mod( 'facebook_url', 'http://facebook.com' ) != '' ) : ?>
                <a href="<?php echo esc_url( get_theme_mod( 'facebook_url', 'http://facebook.com' ) ); ?>" target="_BLANK" class="thoroughbreds-facebook">
                    <span class="fa fa-facebook"></span>
                </a>
                <?php endif; ?>
                
                
                <?php if( get_theme_mod( 'gplus_url', 'http://gplus.com' ) != '' ) : ?>
                <a href="<?php echo esc_url( get_theme_mod( 'gplus_url', 'http://gplus.com' ) ); ?>" target="_BLANK" class="thoroughbreds-gplus">
                    <span class="fa fa-google-plus"></span>
                </a>
                <?php endif; ?>
                
                <?php if( get_theme_mod( 'instagram_url', 'http://instagram.com' ) != '' ) : ?>
                <a href="<?php echo esc_url( get_theme_mod( 'instagram_url', 'http://instagram.com' ) ); ?>" target="_BLANK" class="thoroughbreds-instagram">
                    <span class="fa fa-instagram"></span>
                </a>
                <?php endif; ?>
                
                <?php if( get_theme_mod( 'linkedin_url', 'http://linkedin.com' ) != '' ) : ?>
                <a href="<?php echo esc_url( get_theme_mod( 'linkedin_url', 'http://linkedin.com' ) ); ?>" target="_BLANK" class="thoroughbreds-linkedin">
                    <span class="fa fa-linkedin"></span>
                </a>
                <?php endif; ?>
                
                
                <?php if( get_theme_mod( 'pinterest_url', 'http://pinterest.com' ) != '' ) : ?>
                <a href="<?php echo esc_url( get_theme_mod( 'pinterest_url', 'http://pinterest.com' ) ); ?>" target="_BLANK" class="thoroughbreds-pinterest">
                    <span class="fa fa-pinterest"></span>
                </a>
                <?php endif; ?>
                
                <?php if( get_theme_mod( 'twitter_url', 'http://twitter.com' ) ) : ?>
                <a href="<?php echo esc_url( get_theme_mod( 'twitter_url', 'http://twitter.com' ) ); ?>" target="_BLANK" class="thoroughbreds-twitter">
                    <span class="fa fa-twitter"></span>
                </a>
                <?php endif; ?>
                
            </div>

            <?php $menu = wp_nav_menu( array ( 
                'theme_location'    => 'footer', 
                'menu_id'           => 'footer-menu', 
                'menu_class'        => 'thoroughbreds-footer-nav' ,

                ) ); ?>
            <br>
            
        </div>
        
        <div class="scroll-top alignright">
            <span class="fa fa-chevron-up"></span>
        </div>
        

        
    </div><!-- .site-info -->
    
    
<?php }
add_action( 'thoroughbreds_footer', 'thoroughbreds_render_footer' );

// Changing excerpt more
function new_excerpt_more($more) {
    global $post;
    return '… <a href="'. get_permalink($post->ID) . '">' . 'Read More &raquo;' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


class thoroughbreds_recent_posts_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'thoroughbreds_recent_posts_widget', __('thoroughbreds Recent Articles', 'thoroughbreds'), array('description' => __('Use this widget to display the thoroughbreds Recent Posts.', 'thoroughbreds'),)
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget($args, $instance) {
        
        if( isset( $instance['title'] ) ) :
            $title = apply_filters('widget_title', $instance['title'] );
        else : 
            $title = '';
        endif;
        

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];
        
        echo thoroughbreds_recent_posts();

    }

    // Widget Backend
    public function form($instance) {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Recent Articles', 'thoroughbreds');
        }
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'thoroughbreds'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />             
        </p>
        <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }

}

add_action('widgets_init', 'thoroughbreds_load_widget');
function thoroughbreds_load_widget() {
    register_widget('thoroughbreds_recent_posts_widget');
}

function thoroughbreds_recent_posts() {
    $args = array(
        'numberposts' => '6',
        'post_status' => 'publish',
    );
    ?>
    <div id="thoroughbreds_recent_posts">
        <?php $recent_posts = wp_get_recent_posts($args);
        foreach ($recent_posts as $post) { ?>
            <div class="col-sm-4 thoroughbreds-single-post">
                <div>
                    <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post['ID'])); ?>
                    <img src="<?php echo $url; ?> " title="<?php echo $post['post_title']; ?>"/>
                    <div class="overlay">
                        <a href="<?php echo get_permalink($post['ID']) ?>" class="title"><?php echo $post['post_title']; ?></a>
                        <br>
                        <br>
                        <div class="center">
                            <a href="<?php echo get_permalink($post['ID']) ?>" class=""><i class="fa fa-external-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
    <?php } ?>
        <?php wp_reset_postdata(); ?>
    </div>
<?php
}

add_filter( 'get_the_archive_title', function ($title) {    
    if ( is_category() ) {    
            $title = single_cat_title( '', false );    
        } elseif ( is_tag() ) {    
            $title = single_tag_title( '', false );    
        } elseif ( is_author() ) {    
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;    
        } elseif ( is_tax() ) { //for custom post types
            $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
        } elseif (is_post_type_archive()) {
            $title = post_type_archive_title( '', false );
        }
    return $title;    
});

