<?php

/**
 * thoroughbreds Theme Customizer.
 *
 * @package thoroughbreds
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function thoroughbreds_customize_register( $wp_customize ) {


    // reset some stuff
    $wp_customize->remove_section( 'header_image' );
    $wp_customize->remove_section( 'background_image' );
    $wp_customize->remove_section( 'colors' );
    $wp_customize->remove_section( 'static_front_page' );
    $wp_customize->remove_section( 'title_tagline' );

    // *********************************************
    // ****************** General ******************
    // *********************************************
    
    $wp_customize->add_panel( 'logo', array (
        'title' => __( 'Logo, Title & Favicon', 'thoroughbreds' ),
        'description' => __( 'set the logo image, site title, description and site icon favicon', 'thoroughbreds' ),
        'priority' => 10
    ) );
    
    $wp_customize->add_section( 'logo', array (
        'title'                 => __( 'Logo', 'thoroughbreds' ),
        'panel'                 => 'logo',
    ) );
    
    $wp_customize->add_panel( 'general', array (
        'title' => __( 'General', 'thoroughbreds' ),
        'description' => __( 'General settings for your site, such as title, favicon and more', 'thoroughbreds' ),
        'priority' => 10
    ) );


    // *********************************************
    // ****************** Slider *****************
    // *********************************************

    $wp_customize->add_panel( 'slider', array (
        'title'                 => __( 'Slider', 'thoroughbreds' ),
        'description'           => __( 'Customize the slider. thoroughbreds includes 2 slides, and the pro version supports up to 5', 'thoroughbreds' ),
        'priority'              => 10
    ) );
    
    $wp_customize->add_section( 'slide1', array (
        'title'                 => __( 'Slide #1', 'thoroughbreds' ),
        'description'           => __( 'Use the settings below to upload your images, set main callout text and button text & URLs', 'thoroughbreds' ),
        'panel'                 => 'slider',
    ) );
    
    $wp_customize->add_section( 'slide2', array (
        'title'                 => __( 'Slide #2', 'thoroughbreds' ),
        'description'           => __( 'Use the settings below to upload your images, set main callout text and button text & URLs', 'thoroughbreds' ),
        'panel'                 => 'slider',
    ) );

    // 1st slide
    $wp_customize->add_setting( 'featured_image1', array (
        'default'               => get_template_directory_uri() . '/inc/images/thoroughbreds.jpg',
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'esc_url_raw'
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_control1', array (
        'label' =>              __( 'Background Image', 'thoroughbreds' ),
        'section'               => 'slide1',
        'mime_type'             => 'image',
        'settings'              => 'featured_image1',
        'description'           => __( 'Select the image file that you would like to use as the featured images', 'thoroughbreds' ),        
    ) ) );

    $wp_customize->add_setting( 'featured_image1_title', array (
        'default'               => __( 'Welcome to thoroughbreds', 'thoroughbreds' ),
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'thoroughbreds_text_sanitize'

    ) );
    
    $wp_customize->add_control( 'featured_image1_title', array(
        'type'                  => 'text',
        'section'               => 'slide1',
        'label'                 => __( 'Header Text', 'thoroughbreds' ),
        'description'           => __( 'The main heading text, leave blank to hide', 'thoroughbreds' ),
    ) );


    $wp_customize->add_setting( 'slide1_button1_text', array (
        'default'               => __( 'View Features', 'thoroughbreds' ),
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'thoroughbreds_text_sanitize'
    ) );
    
    $wp_customize->add_control( 'slide1_button1_text', array(
        'type'                  => 'text',
        'section'               => 'slide1',
        'label'                 => __( 'Button #1 Text', 'thoroughbreds' ),
        'description'           => __( 'The text for the button, leave blank to hide', 'thoroughbreds' ),
    ) );

    $wp_customize->add_setting( 'slide1_button1_url', array (
        'default'               => '',
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'esc_url_raw'
    ) );
    
    $wp_customize->add_control( 'slide1_button1_url', array(
        'type'                  => 'text',
        'section'               => 'slide1',
        'label'                 => __( 'Button #1 URL', 'thoroughbreds' ),
    ) );
   

    $wp_customize->add_setting( 'slide1_button2_text', array (
        'default'               => __( 'Learn More', 'thoroughbreds' ),
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'thoroughbreds_text_sanitize'
    ) );
    
    $wp_customize->add_control( 'slide1_button2_text', array(
        'type'                  => 'text',
        'section'               => 'slide1',
        'label'                 => __( 'Button #2 Text', 'thoroughbreds' ),
        'description'           => __( 'The text for the button, leave blank to hide', 'thoroughbreds' ),
    ) );

    $wp_customize->add_setting( 'slide1_button2_url', array (
        'default'               => '',
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'esc_url_raw'
    ) );
    
    $wp_customize->add_control( 'slide1_button2_url', array(
        'type'                  => 'text',
        'section'               => 'slide1',
        'label'                 => __( 'Button #2 URL', 'thoroughbreds' ),
    ) );
    
    
    // 2nd slide
    $wp_customize->add_setting( 'featured_image2', array (
        'default'               => get_template_directory_uri() . '/inc/images/thoroughbreds2.jpg',
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'esc_url_raw'
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_control2', array (
        'label' =>              __( 'Background Image', 'thoroughbreds' ),
        'section'               => 'slide2',
        'mime_type'             => 'image',
        'settings'              => 'featured_image2',
        'description'           => __( 'Select the image file that you would like to use as the featured images', 'thoroughbreds' ),        
    ) ) );

    $wp_customize->add_setting( 'featured_image2_title', array (
        'default'               => __( 'Welcome to thoroughbreds', 'thoroughbreds' ),
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'thoroughbreds_text_sanitize'
    ) );
    
    $wp_customize->add_control( 'featured_image2_title', array(
        'type'                  => 'text',
        'section'               => 'slide2',
        'label'                 => __( 'Header Text', 'thoroughbreds' ),
        'description'           => __( 'The main heading text, leave blank to hide', 'thoroughbreds' ),
    ) );

    $wp_customize->add_setting( 'slide2_button1_text', array (
        'default'               => __( 'View Features', 'thoroughbreds' ),
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'thoroughbreds_text_sanitize'
    ) );
    
    $wp_customize->add_control( 'slide2_button1_text', array(
        'type'                  => 'text',
        'section'               => 'slide2',
        'label'                 => __( 'Button #1 Text', 'thoroughbreds' ),
        'description'           => __( 'The text for the button, leave blank to hide', 'thoroughbreds' ),
    ) );

    $wp_customize->add_setting( 'slide2_button1_url', array (
        'default'               => '',
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'esc_url_raw'
    ) );
    
    $wp_customize->add_control( 'slide2_button1_url', array(
        'type'                  => 'text',
        'section'               => 'slide2',
        'label'                 => __( 'Button #1 URL', 'thoroughbreds' ),
    ) );
    

    $wp_customize->add_setting( 'slide2_button2_text', array (
        'default'               => __( 'Learn More', 'thoroughbreds' ),
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'thoroughbreds_text_sanitize'
    ) );
    
    $wp_customize->add_control( 'slide2_button2_text', array(
        'type'                  => 'text',
        'section'               => 'slide2',
        'label'                 => __( 'Button #2 Text', 'thoroughbreds' ),
        'description'           => __( 'The text for the button, leave blank to hide', 'thoroughbreds' ),
    ) );

    $wp_customize->add_setting( 'slide2_button2_url', array (
        'default'               => '',
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'esc_url_raw'
    ) );
    
    $wp_customize->add_control( 'slide2_button2_url', array(
        'type'                  => 'text',
        'section'               => 'slide2',
        'label'                 => __( 'Button #2 URL', 'thoroughbreds' ),
    ) );
    
    
    // *********************************************
    // ****************** Homepage *****************
    // *********************************************
    $wp_customize->add_panel( 'homepage', array (
        'title'                 => __( 'Frontpage', 'thoroughbreds' ),
        'description'           => __( 'Customize the appearance of your homepage', 'thoroughbreds' ),
        'priority'              => 10
    ) );

    $wp_customize->add_section( 'homepage_callouts', array (
        'title'                 => __( 'Icon Callouts', 'thoroughbreds' ),
        'panel'                 => 'homepage',
    ) );

    $wp_customize->add_section( 'homepage_widget', array (
        'title'                 => __( 'Homepage Widget', 'thoroughbreds' ),
        'panel'                 => 'homepage',
    ) );

    $wp_customize->add_section( 'blog_layout', array (
        'title'                 => __( 'Blog Layout', 'thoroughbreds' ),
        'panel'                 => 'appearance',
    ) );

    $wp_customize->add_section( 'site_search', array (
        'title'                 => __( 'Site Search Icon', 'thoroughbreds' ),
        'panel'                 => 'appearance',
    ) );
    
    // Widget
    $wp_customize->add_setting( 'homepage_widget_background', array (
        'default'               => get_template_directory_uri() . '/inc/images/widget.jpg',
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'esc_url_raw'
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_control5', array (
        'label' =>              __( 'Widget Background', 'thoroughbreds' ),
        'section'               => 'homepage_widget',
        'mime_type'             => 'image',
        'settings'              => 'homepage_widget_background',
        'description'           => __( 'Select the image file that you would like to use as the background image. You can change the contents of this Widget from <strong>Appearance - Widgets</strong>', 'thoroughbreds' ),        
    ) ) );
    

    $wp_customize->add_section( 'homepage_overlay', array (
        'title'                 => __( 'Overlay', 'thoroughbreds' ),
        'description'           => __( 'The overlay appears after the user clicks the icon on the bottom-right of the slider', 'thoroughbreds' ),
        'panel'                 => 'homepage',
    ) );

    $wp_customize->add_section( 'static_front_page', array (
        'title' => __( 'Static Front Page', 'thoroughbreds' ),
        'panel' => 'homepage',
    ) );
    
    $wp_customize->add_section( 'title_tagline', array (
        'title' => __( 'Site Title, Tagline & Favicon', 'thoroughbreds' ),
        'panel' => 'logo',
    ) );
    
    $wp_customize->add_setting( 'overlay_bool', array (
        'default'               => 'on',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'thoroughbreds_on_off_sanitize'
    ) );
    
   $wp_customize->add_control( 'overlay_bool', array(
        'label'   => __( 'Enable Homepage Overlay Widget', 'thoroughbreds' ),
        'section' => 'homepage_overlay',
        'type'    => 'radio',
        'choices'    => array(
            'on'    => __( 'Show', 'thoroughbreds' ),
            'off'    => __( 'Hide', 'thoroughbreds' )
        )
    ));

    $wp_customize->add_setting( 'overlay_icon', array (
        'default'               => 'fa fa-question-circle',
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'thoroughbreds_icon_sanitize'
    ) );
    
   $wp_customize->add_control( 'overlay_icon', array(
        'label'   => __( 'Overlay Trigger Icon', 'thoroughbreds' ),
        'section' => 'homepage_overlay',
        'type'    => 'select',
        'choices'    => thoroughbreds_icons()
    ));
   
    $wp_customize->add_setting( 'blog_style', array (
        'default'               => 'tiles',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'thoroughbreds_blogstyle_sanitize'
    ) );
    
   $wp_customize->add_control( 'blog_style', array(
        'label'   => __( 'Select the blog layout you prefer', 'thoroughbreds' ),
        'section' => 'blog_layout',
        'type'    => 'radio',
        'choices'    => array(
            'stacked'    => __( 'Stacked', 'thoroughbreds' ),
            'tiles'    => __( 'Tiles', 'thoroughbreds' )
        )
    ));
   
    $wp_customize->add_setting( 'show_search', array (
        'default'               => 'on',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'thoroughbreds_on_off_sanitize'
    ) );
    
   $wp_customize->add_control( 'show_search', array(
        'label'   => __( 'Toggle the search icon in the menu', 'thoroughbreds' ),
        'section' => 'site_search',
        'type'    => 'radio',
        'choices'    => array(
            'on'    => __( 'On', 'thoroughbreds' ),
            'off'    => __( 'Off', 'thoroughbreds' )
        )
    ));
    
    
   // **************************************************
   // ********************* Callouts *******************
   // **************************************************

    // callouts setting
    $wp_customize->add_setting('callout_bool', array(
        'default' => 'on',
        'transport' => 'refresh',
        'sanitize_callback' => 'thoroughbreds_on_off_sanitize'
    ));

    $wp_customize->add_control('callout_bool', array(
        'label' => __('Display Icon Callouts on Frontpage', 'thoroughbreds'),
        'section' => 'homepage_callouts',
        'type' => 'radio',
        'choices' => array(
            'on' => __('Show', 'thoroughbreds'),
            'off' => __('Hide', 'thoroughbreds')
        )
    ));
    // Callout #1
    $wp_customize->add_setting('callout1_icon', array(
        'default' => 'fa fa-laptop',
        'transport' => 'postMessage',
        'sanitize_callback' => 'thoroughbreds_icon_sanitize'
    ));

    $wp_customize->add_control('callout1_icon', array(
        'label' => __('Callout #1: Select Icon', 'thoroughbreds'),
        'section' => 'homepage_callouts',
        'type' => 'select',
        'choices' => thoroughbreds_icons()
    ));

    $wp_customize->add_setting('callout1_title', array(
        'default' => 'Responsive',
        'transport' => 'postMessage',
        'sanitize_callback' => 'thoroughbreds_text_sanitize'
    ));

    $wp_customize->add_control('callout1_title', array(
        'type' => 'text',
        'section' => 'homepage_callouts',
        'label' => __('Callout #1: Title', 'thoroughbreds'),
        'description' => __('Set the callout title text', 'thoroughbreds'),
    ));

    $wp_customize->add_setting('callout1_href', array(
        'default' => '#',
        'transport' => 'postMessage',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('callout1_href', array(
        'type' => 'text',
        'section' => 'homepage_callouts',
        'label' => __('Callout #1: Link', 'thoroughbreds'),
        'description' => __('Set the callout link URL', 'thoroughbreds'),
    ));

    $wp_customize->add_setting('callout1_text', array(
        'default' => __('thoroughbreds is a carefully designed and developed theme that you can use to make your site stand out', 'thoroughbreds'),
        'transport' => 'postMessage',
        'sanitize_callback' => 'thoroughbreds_text_sanitize'
    ));

    $wp_customize->add_control('callout1_text', array(
        'type' => 'textarea',
        'section' => 'homepage_callouts',
        'label' => __('Callout #1: Description', 'thoroughbreds'),
        'description' => __('Set the callout detail text', 'thoroughbreds'),
    ));

    // Callout #2
    $wp_customize->add_setting('callout2_icon', array(
        'default' => 'fa fa-magic',
        'transport' => 'postMessage',
        'sanitize_callback' => 'thoroughbreds_icon_sanitize'
    ));

    $wp_customize->add_control('callout2_icon', array(
        'label' => __('Callout #2: Select Icon', 'thoroughbreds'),
        'section' => 'homepage_callouts',
        'type' => 'select',
        'choices' => thoroughbreds_icons()
    ));

    $wp_customize->add_setting('callout2_title', array(
        'default' => __('Customizable', 'thoroughbreds'),
        'transport' => 'postMessage',
        'sanitize_callback' => 'thoroughbreds_text_sanitize'
    ));

    $wp_customize->add_control('callout2_title', array(
        'type' => 'text',
        'section' => 'homepage_callouts',
        'label' => __('Callout #2: Title', 'thoroughbreds'),
        'description' => __('Set the callout title text', 'thoroughbreds'),
    ));
    
    $wp_customize->add_setting('callout2_href', array(
        'default' => '#',
        'transport' => 'postMessage',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('callout2_href', array(
        'type' => 'text',
        'section' => 'homepage_callouts',
        'label' => __('Callout #2: Link', 'thoroughbreds'),
        'description' => __('Set the callout link URL', 'thoroughbreds'),
    ));

    $wp_customize->add_setting('callout2_text', array(
        'default' => __('thoroughbreds is easy to use and customize without having to touch code', 'thoroughbreds'),
        'transport' => 'postMessage',
        'sanitize_callback' => 'thoroughbreds_text_sanitize'
    ));

    $wp_customize->add_control('callout2_text', array(
        'type' => 'textarea',
        'section' => 'homepage_callouts',
        'label' => __('Callout #2: Description', 'thoroughbreds'),
        'description' => __('Set the callout detail text', 'thoroughbreds'),
    ));

    // Callout #3
    $wp_customize->add_setting('callout3_icon', array(
        'default' => 'fa fa-shopping-cart',
        'transport' => 'postMessage',
        'sanitize_callback' => 'thoroughbreds_icon_sanitize'
    ));

    $wp_customize->add_control('callout3_icon', array(
        'label' => __('Callout #3: Select Icon', 'thoroughbreds'),
        'section' => 'homepage_callouts',
        'type' => 'select',
        'choices' => thoroughbreds_icons()
    ));

    $wp_customize->add_setting('callout3_title', array(
        'default' => __('WooCommerce', 'thoroughbreds'),
        'transport' => 'postMessage',
        'sanitize_callback' => 'thoroughbreds_text_sanitize'
    ));

    $wp_customize->add_control('callout3_title', array(
        'type' => 'text',
        'section' => 'homepage_callouts',
        'label' => __('Callout #3: Title', 'thoroughbreds'),
        'description' => __('Set the callout title text', 'thoroughbreds'),
    ));
    
    $wp_customize->add_setting('callout3_href', array(
        'default' => '#',
        'transport' => 'postMessage',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('callout3_href', array(
        'type' => 'text',
        'section' => 'homepage_callouts',
        'label' => __('Callout #3: Link', 'thoroughbreds'),
        'description' => __('Set the callout link URL', 'thoroughbreds'),
    ));

    $wp_customize->add_setting('callout3_text', array(
        'default' => __('thoroughbreds supports WooCommerce to build an online shopping site', 'thoroughbreds'),
        'transport' => 'postMessage',
        'sanitize_callback' => 'thoroughbreds_text_sanitize'
    ));

    $wp_customize->add_control('callout3_text', array(
        'type' => 'textarea',
        'section' => 'homepage_callouts',
        'label' => __('Callout #3: Description', 'thoroughbreds'),
        'description' => __('Set the callout detail text', 'thoroughbreds'),
    ));
    
    // *********************************************
    // ****************** Apperance *****************
    // *********************************************
    $wp_customize->add_panel( 'appearance', array (
        'title'                 => __( 'Appearance', 'thoroughbreds' ),
        'description'           => __( 'Customize your site colros, fonts and other appearance settings', 'thoroughbreds' ),
        'priority'              => 10
    ) );
    

    
    $wp_customize->add_section( 'color', array (
        'title'                 => __( 'Skin Color', 'thoroughbreds' ),
        'panel'                 => 'appearance',
    ) );
    
    $wp_customize->add_section( 'font', array (
        'title'                 => __( 'Fonts', 'thoroughbreds' ),
        'panel'                 => 'appearance',
    ) );
    
    // Logo Bool
    $wp_customize->add_setting( 'logo_bool', array (
        'default'               => 'on',
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'thoroughbreds_on_off_sanitize'
    ) );

    $wp_customize->add_control( 'logo_bool', array(
        'type'                  => 'radio',
        'section'               => 'logo',
        'label'                 => __( 'Display Logo', 'thoroughbreds' ),
        'description'           => __( 'If you do not use a logo, the site title will be displayed', 'thoroughbreds' ),  
        'choices'               => array(
            'on'    => __( 'Show', 'thoroughbreds' ),
            'off'    => __( 'Hide', 'thoroughbreds' )
        )
    ) );
    
    // Logo Image
    $wp_customize->add_setting( 'logo', array (
        'default'               => get_template_directory_uri() . '/inc/images/logo.png',
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'esc_url_raw'
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_control4', array (
        'label' =>              __( 'Logo', 'thoroughbreds' ),
        'section'               => 'logo',
        'mime_type'             => 'image',
        'settings'              => 'logo',
        'description'           => __( 'Image for your site', 'thoroughbreds' ),        
    ) ) );
    


    
    $wp_customize->add_setting( 'theme_color', array (
        'default'               => 'green',
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'thoroughbreds_theme_color_sanitize'
    ) );
    
    $wp_customize->add_control( 'theme_color', array(
        'type'                  => 'radio',
        'section'               => 'color',
        'label'                 => __( 'Theme Skin Color', 'thoroughbreds' ),
        'description'           => __( 'Select the theme main color', 'thoroughbreds' ),
        'choices'               => array(
            'green'             => __( 'Green', 'thoroughbreds' ),
            'blue'              => __( 'Blue', 'thoroughbreds' ),
            'red'               => __( 'Red', 'thoroughbreds' ),
            'pink'              => __( 'Pink', 'thoroughbreds' ),
            'yellow'            => __( 'Yellow', 'thoroughbreds' ),
            'darkblue'          => __( 'Dark Blue', 'thoroughbreds' ),
        )
        
    ) );
    
    $wp_customize->add_setting( 'header_font', array (
        'default'               => 'Raleway, sans-serif',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'thoroughbreds_font_sanitize'
    ) );
    
    $wp_customize->add_control( 'header_font', array(
        'type'                  => 'select',
        'section'               => 'font',
        'label'                 => __( 'Headers Font', 'thoroughbreds' ),
        'description'           => __( 'Applies to the slider header, callouts headers, post page & widget titles etc..', 'thoroughbreds' ),
        'choices'               => thoroughbreds_fonts()
        
    ) );
    
    $wp_customize->add_setting( 'theme_font', array (
        'default'               => 'Raleway, sans-serif',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'thoroughbreds_font_sanitize'
    ) );
    
    $wp_customize->add_control( 'theme_font', array(
        'type'                  => 'select',
        'section'               => 'font',
        'label'                 => __( 'General font for the site body', 'thoroughbreds' ),
        'choices'               => thoroughbreds_fonts()
        
    ) );
    
    
    $wp_customize->add_setting( 'menu_font_size', array (
        'default'               => '14px',
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'thoroughbreds_font_size_sanitize'
    ) );
    
    $wp_customize->add_control( 'menu_font_size', array(
        'type'                  => 'select',
        'section'               => 'font',
        'label'                 => __( 'Menu Font Size', 'thoroughbreds' ),
        'choices'               => thoroughbreds_font_sizes()
        
    ) );
    
    $wp_customize->add_setting( 'theme_font_size', array (
        'default'               => '14px',
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'thoroughbreds_font_size_sanitize'
    ) );
    
    $wp_customize->add_control( 'theme_font_size', array(
        'type'                  => 'select',
        'section'               => 'font',
        'label'                 => __( 'Content Font Size', 'thoroughbreds' ),
        'choices'               => thoroughbreds_font_sizes()
        
    ) );
    
    
    // *********************************************
    // ****************** Footer *****************
    // *********************************************
    $wp_customize->add_panel( 'footer', array (
        'title'                 => __( 'Footer', 'thoroughbreds' ),
        'description'           => __( 'Customize the site footer', 'thoroughbreds' ),
        'priority'              => 10
    ) );
    
    $wp_customize->add_section( 'footer_background', array (
        'title'                 => __( 'Footer Background', 'thoroughbreds' ),
        'panel'                 => 'footer',
    ) );
    
    $wp_customize->add_setting( 'footer_background_image', array (
        'default'               => get_template_directory_uri() . '/inc/images/footer.jpg',
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'esc_url_raw'
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_control3', array (
        'label' =>              __( 'Footer Background Image ( Parallax )', 'thoroughbreds' ),
        'section'               => 'footer_background',
        'mime_type'             => 'image',
        'settings'              => 'footer_background_image',
        'description'           => __( 'Select the image file that you would like to use as the footer background. You can change the contents of this Widget from <strong>Appearance - Widgets</strong>', 'thoroughbreds' ),        
    ) ) );
    
    $wp_customize->add_section( 'footer_text', array (
        'title'                 => __( 'Copyright Text', 'thoroughbreds' ),
        'panel'                 => 'footer',
    ) );
    
    $wp_customize->add_setting( 'copyright_text', array (
        'default'               => __( 'Copyright Company Name', 'thoroughbreds' ) . date( 'Y' ),
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'thoroughbreds_text_sanitize'
    ) );
    
    $wp_customize->add_control( 'copyright_text', array(
        'type'                  => 'text',
        'section'               => 'footer_text',
        'label'                 => __( 'Copyright Text', 'thoroughbreds' )
        
    ) );
    
    $wp_customize->add_section( 'social_links', array (
        'title'                 => __( 'Social Icons & Links', 'thoroughbreds' ),
        'panel'                 => 'footer',
    ) );
    
    $wp_customize->add_setting( 'facebook_url', array (
        'default'               => '#',
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'esc_url_raw'
    ) );
    
    $wp_customize->add_control( 'facebook_url', array(
        'type'                  => 'text',
        'section'               => 'social_links',
        'label'                 => __( 'Facebook URL', 'thoroughbreds' )
        
    ) );
    
    $wp_customize->add_setting( 'gplus_url', array (
        'default'               => '#',
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'esc_url_raw'
    ) );
    
    $wp_customize->add_control( 'gplus_url', array(
        'type'                  => 'text',
        'section'               => 'social_links',
        'label'                 => __( 'Google Plus URL', 'thoroughbreds' )
        
    ) );
    
    $wp_customize->add_setting( 'instagram_url', array (
        'default'               => '#',
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'esc_url_raw'
    ) );
    
    $wp_customize->add_control( 'instagram_url', array(
        'type'                  => 'text',
        'section'               => 'social_links',
        'label'                 => __( 'Instagram URL', 'thoroughbreds' )
        
    ) );
    
    $wp_customize->add_setting( 'linkedin_url', array (
        'default'               => '#',
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'esc_url_raw'
    ) );
    
    $wp_customize->add_control( 'linkedin_url', array(
        'type'                  => 'text',
        'section'               => 'social_links',
        'label'                 => __( 'Linkedin URL', 'thoroughbreds' )
        
    ) );
    
    $wp_customize->add_setting( 'pinterest_url', array (
        'default'               => '#',
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'esc_url_raw'
    ) );
    
    $wp_customize->add_control( 'pinterest_url', array(
        'type'                  => 'text',
        'section'               => 'social_links',
        'label'                 => __( 'Pinterest URL', 'thoroughbreds' )
        
    ) );
    
    $wp_customize->add_setting( 'twitter_url', array (
        'default'               => '#',
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'esc_url_raw'
    ) );
    
    $wp_customize->add_control( 'twitter_url', array(
        'type'                  => 'text',
        'section'               => 'social_links',
        'label'                 => __( 'Twitter URL', 'thoroughbreds' )
        
    ) );
    
    // *********************************************
    // ****************** Social Icons *****************
    // *********************************************
    $wp_customize->add_panel( 'social', array (
        'title'                 => __( 'Social', 'thoroughbreds' ),
        'description'           => __( 'Social Icons, Links & Location', 'thoroughbreds' ),
        'priority'              => 10
    ) );
   
    
    $wp_customize->get_setting( 'blogname' )->transport             = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport      = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport     = 'postMessage';
    $wp_customize->get_setting( 'featured_image1' )->transport      = 'postMessage';
    $wp_customize->get_setting( 'featured_image2' )->transport      = 'postMessage';
    $wp_customize->get_setting( 'callout1_icon' )->transport      = 'postMessage';
//    $wp_customize->get_setting( 'header_font' )->transport      = 'postMessage';
    
}

add_action( 'customize_register', 'thoroughbreds_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */

function thoroughbreds_customize_enqueue() {
    
    wp_enqueue_script( 'thoroughbreds-customizer-js', get_template_directory_uri() . '/inc/js/customizer.js', array( 'jquery', 'customize-controls' ), false, true );
    wp_enqueue_style('thoroughbreds-customizer-css', get_template_directory_uri() . '/inc/css/customizer.css', array(), thoroughbreds_VERSION);
}
add_action( 'customize_controls_enqueue_scripts', 'thoroughbreds_customize_enqueue' );

function thoroughbreds_customize_preview_js() {
    wp_enqueue_script( 'thoroughbreds_customizer', get_template_directory_uri() . '/js/customizer.js', array ( 'customize-preview' ), thoroughbreds_VERSION, true );
}

add_action( 'customize_preview_init', 'thoroughbreds_customize_preview_js' );


function thoroughbreds_icons(){
    
    return array( 
        'fa fa-clock' => __( 'Select One', 'thoroughbreds'), 
        'fa fa-500px' => __( ' 500px', 'thoroughbreds'), 
        'fa fa-amazon' => __( ' amazon', 'thoroughbreds'), 
        'fa fa-balance-scale' => __( ' balance-scale', 'thoroughbreds'), 'fa fa-battery-0' => __( ' battery-0', 'thoroughbreds'), 'fa fa-battery-1' => __( ' battery-1', 'thoroughbreds'), 'fa fa-battery-2' => __( ' battery-2', 'thoroughbreds'), 'fa fa-battery-3' => __( ' battery-3', 'thoroughbreds'), 'fa fa-battery-4' => __( ' battery-4', 'thoroughbreds'), 'fa fa-battery-empty' => __( ' battery-empty', 'thoroughbreds'), 'fa fa-battery-full' => __( ' battery-full', 'thoroughbreds'), 'fa fa-battery-half' => __( ' battery-half', 'thoroughbreds'), 'fa fa-battery-quarter' => __( ' battery-quarter', 'thoroughbreds'), 'fa fa-battery-three-quarters' => __( ' battery-three-quarters', 'thoroughbreds'), 'fa fa-black-tie' => __( ' black-tie', 'thoroughbreds'), 'fa fa-calendar-check-o' => __( ' calendar-check-o', 'thoroughbreds'), 'fa fa-calendar-minus-o' => __( ' calendar-minus-o', 'thoroughbreds'), 'fa fa-calendar-plus-o' => __( ' calendar-plus-o', 'thoroughbreds'), 'fa fa-calendar-times-o' => __( ' calendar-times-o', 'thoroughbreds'), 'fa fa-cc-diners-club' => __( ' cc-diners-club', 'thoroughbreds'), 'fa fa-cc-jcb' => __( ' cc-jcb', 'thoroughbreds'), 'fa fa-chrome' => __( ' chrome', 'thoroughbreds'), 'fa fa-clone' => __( ' clone', 'thoroughbreds'), 'fa fa-commenting' => __( ' commenting', 'thoroughbreds'), 'fa fa-commenting-o' => __( ' commenting-o', 'thoroughbreds'), 'fa fa-contao' => __( ' contao', 'thoroughbreds'), 'fa fa-creative-commons' => __( ' creative-commons', 'thoroughbreds'), 'fa fa-expeditedssl' => __( ' expeditedssl', 'thoroughbreds'), 'fa fa-firefox' => __( ' firefox', 'thoroughbreds'), 'fa fa-fonticons' => __( ' fonticons', 'thoroughbreds'), 'fa fa-genderless' => __( ' genderless', 'thoroughbreds'), 'fa fa-get-pocket' => __( ' get-pocket', 'thoroughbreds'), 'fa fa-gg' => __( ' gg', 'thoroughbreds'), 'fa fa-gg-circle' => __( ' gg-circle', 'thoroughbreds'), 'fa fa-hand-grab-o' => __( ' hand-grab-o', 'thoroughbreds'), 'fa fa-hand-lizard-o' => __( ' hand-lizard-o', 'thoroughbreds'), 'fa fa-hand-paper-o' => __( ' hand-paper-o', 'thoroughbreds'), 'fa fa-hand-peace-o' => __( ' hand-peace-o', 'thoroughbreds'), 'fa fa-hand-pointer-o' => __( ' hand-pointer-o', 'thoroughbreds'), 'fa fa-hand-rock-o' => __( ' hand-rock-o', 'thoroughbreds'), 'fa fa-hand-scissors-o' => __( ' hand-scissors-o', 'thoroughbreds'), 'fa fa-hand-spock-o' => __( ' hand-spock-o', 'thoroughbreds'), 'fa fa-hand-stop-o' => __( ' hand-stop-o', 'thoroughbreds'), 'fa fa-hourglass' => __( ' hourglass', 'thoroughbreds'), 'fa fa-hourglass-1' => __( ' hourglass-1', 'thoroughbreds'), 'fa fa-hourglass-2' => __( ' hourglass-2', 'thoroughbreds'), 'fa fa-hourglass-3' => __( ' hourglass-3', 'thoroughbreds'), 'fa fa-hourglass-end' => __( ' hourglass-end', 'thoroughbreds'), 'fa fa-hourglass-half' => __( ' hourglass-half', 'thoroughbreds'), 'fa fa-hourglass-o' => __( ' hourglass-o', 'thoroughbreds'), 'fa fa-hourglass-start' => __( ' hourglass-start', 'thoroughbreds'), 'fa fa-houzz' => __( ' houzz', 'thoroughbreds'), 'fa fa-i-cursor' => __( ' i-cursor', 'thoroughbreds'), 'fa fa-industry' => __( ' industry', 'thoroughbreds'), 'fa fa-internet-explorer' => __( ' internet-explorer', 'thoroughbreds'), 'fa fa-map' => __( ' map', 'thoroughbreds'), 'fa fa-map-o' => __( ' map-o', 'thoroughbreds'), 'fa fa-map-pin' => __( ' map-pin', 'thoroughbreds'), 'fa fa-map-signs' => __( ' map-signs', 'thoroughbreds'), 'fa fa-mouse-pointer' => __( ' mouse-pointer', 'thoroughbreds'), 'fa fa-object-group' => __( ' object-group', 'thoroughbreds'), 'fa fa-object-ungroup' => __( ' object-ungroup', 'thoroughbreds'), 'fa fa-odnoklassniki' => __( ' odnoklassniki', 'thoroughbreds'), 'fa fa-odnoklassniki-square' => __( ' odnoklassniki-square', 'thoroughbreds'), 'fa fa-opencart' => __( ' opencart', 'thoroughbreds'), 'fa fa-opera' => __( ' opera', 'thoroughbreds'), 'fa fa-optin-monster' => __( ' optin-monster', 'thoroughbreds'), 'fa fa-registered' => __( ' registered', 'thoroughbreds'), 'fa fa-safari' => __( ' safari', 'thoroughbreds'), 'fa fa-sticky-note' => __( ' sticky-note', 'thoroughbreds'), 'fa fa-sticky-note-o' => __( ' sticky-note-o', 'thoroughbreds'), 'fa fa-television' => __( ' television', 'thoroughbreds'), 'fa fa-trademark' => __( ' trademark', 'thoroughbreds'), 'fa fa-tripadvisor' => __( ' tripadvisor', 'thoroughbreds'), 'fa fa-tv' => __( ' tv', 'thoroughbreds'), 'fa fa-vimeo' => __( ' vimeo', 'thoroughbreds'), 'fa fa-wikipedia-w' => __( ' wikipedia-w', 'thoroughbreds'), 'fa fa-y-combinator' => __( ' y-combinator', 'thoroughbreds'), 'fa fa-yc' => __( ' yc', 'thoroughbreds'), 'fa fa-adjust' => __( ' adjust', 'thoroughbreds'), 'fa fa-anchor' => __( ' anchor', 'thoroughbreds'), 'fa fa-archive' => __( ' archive', 'thoroughbreds'), 'fa fa-area-chart' => __( ' area-chart', 'thoroughbreds'), 'fa fa-arrows' => __( ' arrows', 'thoroughbreds'), 'fa fa-arrows-h' => __( ' arrows-h', 'thoroughbreds'), 'fa fa-arrows-v' => __( ' arrows-v', 'thoroughbreds'), 'fa fa-asterisk' => __( ' asterisk', 'thoroughbreds'), 'fa fa-at' => __( ' at', 'thoroughbreds'), 'fa fa-automobile' => __( ' automobile', 'thoroughbreds'), 'fa fa-balance-scale' => __( ' balance-scale', 'thoroughbreds'), 'fa fa-ban' => __( ' ban', 'thoroughbreds'), 'fa fa-bank' => __( ' bank', 'thoroughbreds'), 'fa fa-bar-chart' => __( ' bar-chart', 'thoroughbreds'), 'fa fa-bar-chart-o' => __( ' bar-chart-o', 'thoroughbreds'), 'fa fa-barcode' => __( ' barcode', 'thoroughbreds'), 'fa fa-bars' => __( ' bars', 'thoroughbreds'), 'fa fa-battery-0' => __( ' battery-0', 'thoroughbreds'), 'fa fa-battery-1' => __( ' battery-1', 'thoroughbreds'), 'fa fa-battery-2' => __( ' battery-2', 'thoroughbreds'), 'fa fa-battery-3' => __( ' battery-3', 'thoroughbreds'), 'fa fa-battery-4' => __( ' battery-4', 'thoroughbreds'), 'fa fa-battery-empty' => __( ' battery-empty', 'thoroughbreds'), 'fa fa-battery-full' => __( ' battery-full', 'thoroughbreds'), 'fa fa-battery-half' => __( ' battery-half', 'thoroughbreds'), 'fa fa-battery-quarter' => __( ' battery-quarter', 'thoroughbreds'), 'fa fa-battery-three-quarters' => __( ' battery-three-quarters', 'thoroughbreds'), 'fa fa-bed' => __( ' bed', 'thoroughbreds'), 'fa fa-beer' => __( ' beer', 'thoroughbreds'), 'fa fa-bell' => __( ' bell', 'thoroughbreds'), 'fa fa-bell-o' => __( ' bell-o', 'thoroughbreds'), 'fa fa-bell-slash' => __( ' bell-slash', 'thoroughbreds'), 'fa fa-bell-slash-o' => __( ' bell-slash-o', 'thoroughbreds'), 'fa fa-bicycle' => __( ' bicycle', 'thoroughbreds'), 'fa fa-binoculars' => __( ' binoculars', 'thoroughbreds'), 'fa fa-birthday-cake' => __( ' birthday-cake', 'thoroughbreds'), 'fa fa-bolt' => __( ' bolt', 'thoroughbreds'), 'fa fa-bomb' => __( ' bomb', 'thoroughbreds'), 'fa fa-book' => __( ' book', 'thoroughbreds'), 'fa fa-bookmark' => __( ' bookmark', 'thoroughbreds'), 'fa fa-bookmark-o' => __( ' bookmark-o', 'thoroughbreds'), 'fa fa-briefcase' => __( ' briefcase', 'thoroughbreds'), 'fa fa-bug' => __( ' bug', 'thoroughbreds'), 'fa fa-building' => __( ' building', 'thoroughbreds'), 'fa fa-building-o' => __( ' building-o', 'thoroughbreds'), 'fa fa-bullhorn' => __( ' bullhorn', 'thoroughbreds'), 'fa fa-bullseye' => __( ' bullseye', 'thoroughbreds'), 'fa fa-bus' => __( ' bus', 'thoroughbreds'), 'fa fa-cab' => __( ' cab', 'thoroughbreds'), 'fa fa-calculator' => __( ' calculator', 'thoroughbreds'), 'fa fa-calendar' => __( ' calendar', 'thoroughbreds'), 'fa fa-calendar-check-o' => __( ' calendar-check-o', 'thoroughbreds'), 'fa fa-calendar-minus-o' => __( ' calendar-minus-o', 'thoroughbreds'), 'fa fa-calendar-o' => __( ' calendar-o', 'thoroughbreds'), 'fa fa-calendar-plus-o' => __( ' calendar-plus-o', 'thoroughbreds'), 'fa fa-calendar-times-o' => __( ' calendar-times-o', 'thoroughbreds'), 'fa fa-camera' => __( ' camera', 'thoroughbreds'), 'fa fa-camera-retro' => __( ' camera-retro', 'thoroughbreds'), 'fa fa-car' => __( ' car', 'thoroughbreds'), 'fa fa-caret-square-o-down' => __( ' caret-square-o-down', 'thoroughbreds'), 'fa fa-caret-square-o-left' => __( ' caret-square-o-left', 'thoroughbreds'), 'fa fa-caret-square-o-right' => __( ' caret-square-o-right', 'thoroughbreds'), 'fa fa-caret-square-o-up' => __( ' caret-square-o-up', 'thoroughbreds'), 'fa fa-cart-arrow-down' => __( ' cart-arrow-down', 'thoroughbreds'), 'fa fa-cart-plus' => __( ' cart-plus', 'thoroughbreds'), 'fa fa-cc' => __( ' cc', 'thoroughbreds'), 'fa fa-certificate' => __( ' certificate', 'thoroughbreds'), 'fa fa-check' => __( ' check', 'thoroughbreds'), 'fa fa-check-circle' => __( ' check-circle', 'thoroughbreds'), 'fa fa-check-circle-o' => __( ' check-circle-o', 'thoroughbreds'), 'fa fa-check-square' => __( ' check-square', 'thoroughbreds'), 'fa fa-check-square-o' => __( ' check-square-o', 'thoroughbreds'), 'fa fa-child' => __( ' child', 'thoroughbreds'), 'fa fa-circle' => __( ' circle', 'thoroughbreds'), 'fa fa-circle-o' => __( ' circle-o', 'thoroughbreds'), 'fa fa-circle-o-notch' => __( ' circle-o-notch', 'thoroughbreds'), 'fa fa-circle-thin' => __( ' circle-thin', 'thoroughbreds'), 'fa fa-clock-o' => __( ' clock-o', 'thoroughbreds'), 'fa fa-clone' => __( ' clone', 'thoroughbreds'), 'fa fa-close' => __( ' close', 'thoroughbreds'), 'fa fa-cloud' => __( ' cloud', 'thoroughbreds'), 'fa fa-cloud-download' => __( ' cloud-download', 'thoroughbreds'), 'fa fa-cloud-upload' => __( ' cloud-upload', 'thoroughbreds'), 'fa fa-code' => __( ' code', 'thoroughbreds'), 'fa fa-code-fork' => __( ' code-fork', 'thoroughbreds'), 'fa fa-coffee' => __( ' coffee', 'thoroughbreds'), 'fa fa-cog' => __( ' cog', 'thoroughbreds'), 'fa fa-cogs' => __( ' cogs', 'thoroughbreds'), 'fa fa-comment' => __( ' comment', 'thoroughbreds'), 'fa fa-comment-o' => __( ' comment-o', 'thoroughbreds'), 'fa fa-commenting' => __( ' commenting', 'thoroughbreds'), 'fa fa-commenting-o' => __( ' commenting-o', 'thoroughbreds'), 'fa fa-comments' => __( ' comments', 'thoroughbreds'), 'fa fa-comments-o' => __( ' comments-o', 'thoroughbreds'), 'fa fa-compass' => __( ' compass', 'thoroughbreds'), 'fa fa-copyright' => __( ' copyright', 'thoroughbreds'), 'fa fa-creative-commons' => __( ' creative-commons', 'thoroughbreds'), 'fa fa-credit-card' => __( ' credit-card', 'thoroughbreds'), 'fa fa-crop' => __( ' crop', 'thoroughbreds'), 'fa fa-crosshairs' => __( ' crosshairs', 'thoroughbreds'), 'fa fa-cube' => __( ' cube', 'thoroughbreds'), 'fa fa-cubes' => __( ' cubes', 'thoroughbreds'), 'fa fa-cutlery' => __( ' cutlery', 'thoroughbreds'), 'fa fa-dashboard' => __( ' dashboard', 'thoroughbreds'), 'fa fa-database' => __( ' database', 'thoroughbreds'), 'fa fa-desktop' => __( ' desktop', 'thoroughbreds'), 'fa fa-diamond' => __( ' diamond', 'thoroughbreds'), 'fa fa-dot-circle-o' => __( ' dot-circle-o', 'thoroughbreds'), 'fa fa-download' => __( ' download', 'thoroughbreds'), 'fa fa-edit' => __( ' edit', 'thoroughbreds'), 'fa fa-ellipsis-h' => __( ' ellipsis-h', 'thoroughbreds'), 'fa fa-ellipsis-v' => __( ' ellipsis-v', 'thoroughbreds'), 'fa fa-envelope' => __( ' envelope', 'thoroughbreds'), 'fa fa-envelope-o' => __( ' envelope-o', 'thoroughbreds'), 'fa fa-envelope-square' => __( ' envelope-square', 'thoroughbreds'), 'fa fa-eraser' => __( ' eraser', 'thoroughbreds'), 'fa fa-exchange' => __( ' exchange', 'thoroughbreds'), 'fa fa-exclamation' => __( ' exclamation', 'thoroughbreds'), 'fa fa-exclamation-circle' => __( ' exclamation-circle', 'thoroughbreds'), 'fa fa-exclamation-triangle' => __( ' exclamation-triangle', 'thoroughbreds'), 'fa fa-external-link' => __( ' external-link', 'thoroughbreds'), 'fa fa-external-link-square' => __( ' external-link-square', 'thoroughbreds'), 'fa fa-eye' => __( ' eye', 'thoroughbreds'), 'fa fa-eye-slash' => __( ' eye-slash', 'thoroughbreds'), 'fa fa-eyedropper' => __( ' eyedropper', 'thoroughbreds'), 'fa fa-fax' => __( ' fax', 'thoroughbreds'), 'fa fa-feed' => __( ' feed', 'thoroughbreds'), 'fa fa-female' => __( ' female', 'thoroughbreds'), 'fa fa-fighter-jet' => __( ' fighter-jet', 'thoroughbreds'), 'fa fa-file-archive-o' => __( ' file-archive-o', 'thoroughbreds'), 'fa fa-file-audio-o' => __( ' file-audio-o', 'thoroughbreds'), 'fa fa-file-code-o' => __( ' file-code-o', 'thoroughbreds'), 'fa fa-file-excel-o' => __( ' file-excel-o', 'thoroughbreds'), 'fa fa-file-image-o' => __( ' file-image-o', 'thoroughbreds'), 'fa fa-file-movie-o' => __( ' file-movie-o', 'thoroughbreds'), 'fa fa-file-pdf-o' => __( ' file-pdf-o', 'thoroughbreds'), 'fa fa-file-photo-o' => __( ' file-photo-o', 'thoroughbreds'), 'fa fa-file-picture-o' => __( ' file-picture-o', 'thoroughbreds'), 'fa fa-file-powerpoint-o' => __( ' file-powerpoint-o', 'thoroughbreds'), 'fa fa-file-sound-o' => __( ' file-sound-o', 'thoroughbreds'), 'fa fa-file-video-o' => __( ' file-video-o', 'thoroughbreds'), 'fa fa-file-word-o' => __( ' file-word-o', 'thoroughbreds'), 'fa fa-file-zip-o' => __( ' file-zip-o', 'thoroughbreds'), 'fa fa-film' => __( ' film', 'thoroughbreds'), 'fa fa-filter' => __( ' filter', 'thoroughbreds'), 'fa fa-fire' => __( ' fire', 'thoroughbreds'), 'fa fa-fire-extinguisher' => __( ' fire-extinguisher', 'thoroughbreds'), 'fa fa-flag' => __( ' flag', 'thoroughbreds'), 'fa fa-flag-checkered' => __( ' flag-checkered', 'thoroughbreds'), 'fa fa-flag-o' => __( ' flag-o', 'thoroughbreds'), 'fa fa-flash' => __( ' flash', 'thoroughbreds'), 'fa fa-flask' => __( ' flask', 'thoroughbreds'), 'fa fa-folder' => __( ' folder', 'thoroughbreds'), 'fa fa-folder-o' => __( ' folder-o', 'thoroughbreds'), 'fa fa-folder-open' => __( ' folder-open', 'thoroughbreds'), 'fa fa-folder-open-o' => __( ' folder-open-o', 'thoroughbreds'), 'fa fa-frown-o' => __( ' frown-o', 'thoroughbreds'), 'fa fa-futbol-o' => __( ' futbol-o', 'thoroughbreds'), 'fa fa-gamepad' => __( ' gamepad', 'thoroughbreds'), 'fa fa-gavel' => __( ' gavel', 'thoroughbreds'), 'fa fa-gear' => __( ' gear', 'thoroughbreds'), 'fa fa-gears' => __( ' gears', 'thoroughbreds'), 'fa fa-gift' => __( ' gift', 'thoroughbreds'), 'fa fa-glass' => __( ' glass', 'thoroughbreds'), 'fa fa-globe' => __( ' globe', 'thoroughbreds'), 'fa fa-graduation-cap' => __( ' graduation-cap', 'thoroughbreds'), 'fa fa-group' => __( ' group', 'thoroughbreds'), 'fa fa-hand-grab-o' => __( ' hand-grab-o', 'thoroughbreds'), 'fa fa-hand-lizard-o' => __( ' hand-lizard-o', 'thoroughbreds'), 'fa fa-hand-paper-o' => __( ' hand-paper-o', 'thoroughbreds'), 'fa fa-hand-peace-o' => __( ' hand-peace-o', 'thoroughbreds'), 'fa fa-hand-pointer-o' => __( ' hand-pointer-o', 'thoroughbreds'), 'fa fa-hand-rock-o' => __( ' hand-rock-o', 'thoroughbreds'), 'fa fa-hand-scissors-o' => __( ' hand-scissors-o', 'thoroughbreds'), 'fa fa-hand-spock-o' => __( ' hand-spock-o', 'thoroughbreds'), 'fa fa-hand-stop-o' => __( ' hand-stop-o', 'thoroughbreds'), 'fa fa-hdd-o' => __( ' hdd-o', 'thoroughbreds'), 'fa fa-headphones' => __( ' headphones', 'thoroughbreds'), 'fa fa-heart' => __( ' heart', 'thoroughbreds'), 'fa fa-heart-o' => __( ' heart-o', 'thoroughbreds'), 'fa fa-heartbeat' => __( ' heartbeat', 'thoroughbreds'), 'fa fa-history' => __( ' history', 'thoroughbreds'), 'fa fa-home' => __( ' home', 'thoroughbreds'), 'fa fa-hotel' => __( ' hotel', 'thoroughbreds'), 'fa fa-hourglass' => __( ' hourglass', 'thoroughbreds'), 'fa fa-hourglass-1' => __( ' hourglass-1', 'thoroughbreds'), 'fa fa-hourglass-2' => __( ' hourglass-2', 'thoroughbreds'), 'fa fa-hourglass-3' => __( ' hourglass-3', 'thoroughbreds'), 'fa fa-hourglass-end' => __( ' hourglass-end', 'thoroughbreds'), 'fa fa-hourglass-half' => __( ' hourglass-half', 'thoroughbreds'), 'fa fa-hourglass-o' => __( ' hourglass-o', 'thoroughbreds'), 'fa fa-hourglass-start' => __( ' hourglass-start', 'thoroughbreds'), 'fa fa-i-cursor' => __( ' i-cursor', 'thoroughbreds'), 'fa fa-image' => __( ' image', 'thoroughbreds'), 'fa fa-inbox' => __( ' inbox', 'thoroughbreds'), 'fa fa-industry' => __( ' industry', 'thoroughbreds'), 'fa fa-info' => __( ' info', 'thoroughbreds'), 'fa fa-info-circle' => __( ' info-circle', 'thoroughbreds'), 'fa fa-institution' => __( ' institution', 'thoroughbreds'), 'fa fa-key' => __( ' key', 'thoroughbreds'), 'fa fa-keyboard-o' => __( ' keyboard-o', 'thoroughbreds'), 'fa fa-language' => __( ' language', 'thoroughbreds'), 'fa fa-laptop' => __( ' laptop', 'thoroughbreds'), 'fa fa-leaf' => __( ' leaf', 'thoroughbreds'), 'fa fa-legal' => __( ' legal', 'thoroughbreds'), 'fa fa-lemon-o' => __( ' lemon-o', 'thoroughbreds'), 'fa fa-level-down' => __( ' level-down', 'thoroughbreds'), 'fa fa-level-up' => __( ' level-up', 'thoroughbreds'), 'fa fa-life-bouy' => __( ' life-bouy', 'thoroughbreds'), 'fa fa-life-buoy' => __( ' life-buoy', 'thoroughbreds'), 'fa fa-life-ring' => __( ' life-ring', 'thoroughbreds'), 'fa fa-life-saver' => __( ' life-saver', 'thoroughbreds'), 'fa fa-lightbulb-o' => __( ' lightbulb-o', 'thoroughbreds'), 'fa fa-line-chart' => __( ' line-chart', 'thoroughbreds'), 'fa fa-location-arrow' => __( ' location-arrow', 'thoroughbreds'), 'fa fa-lock' => __( ' lock', 'thoroughbreds'), 'fa fa-magic' => __( ' magic', 'thoroughbreds'), 'fa fa-magnet' => __( ' magnet', 'thoroughbreds'), 'fa fa-mail-forward' => __( ' mail-forward', 'thoroughbreds'), 'fa fa-mail-reply' => __( ' mail-reply', 'thoroughbreds'), 'fa fa-mail-reply-all' => __( ' mail-reply-all', 'thoroughbreds'), 'fa fa-male' => __( ' male', 'thoroughbreds'), 'fa fa-map' => __( ' map', 'thoroughbreds'), 'fa fa-map-marker' => __( ' map-marker', 'thoroughbreds'), 'fa fa-map-o' => __( ' map-o', 'thoroughbreds'), 'fa fa-map-pin' => __( ' map-pin', 'thoroughbreds'), 'fa fa-map-signs' => __( ' map-signs', 'thoroughbreds'), 'fa fa-meh-o' => __( ' meh-o', 'thoroughbreds'), 'fa fa-microphone' => __( ' microphone', 'thoroughbreds'), 'fa fa-microphone-slash' => __( ' microphone-slash', 'thoroughbreds'), 'fa fa-minus' => __( ' minus', 'thoroughbreds'), 'fa fa-minus-circle' => __( ' minus-circle', 'thoroughbreds'), 'fa fa-minus-square' => __( ' minus-square', 'thoroughbreds'), 'fa fa-minus-square-o' => __( ' minus-square-o', 'thoroughbreds'), 'fa fa-mobile' => __( ' mobile', 'thoroughbreds'), 'fa fa-mobile-phone' => __( ' mobile-phone', 'thoroughbreds'), 'fa fa-money' => __( ' money', 'thoroughbreds'), 'fa fa-moon-o' => __( ' moon-o', 'thoroughbreds'), 'fa fa-mortar-board' => __( ' mortar-board', 'thoroughbreds'), 'fa fa-motorcycle' => __( ' motorcycle', 'thoroughbreds'), 'fa fa-mouse-pointer' => __( ' mouse-pointer', 'thoroughbreds'), 'fa fa-music' => __( ' music', 'thoroughbreds'), 'fa fa-navicon' => __( ' navicon', 'thoroughbreds'), 'fa fa-newspaper-o' => __( ' newspaper-o', 'thoroughbreds'), 'fa fa-object-group' => __( ' object-group', 'thoroughbreds'), 'fa fa-object-ungroup' => __( ' object-ungroup', 'thoroughbreds'), 'fa fa-paint-brush' => __( ' paint-brush', 'thoroughbreds'), 'fa fa-paper-plane' => __( ' paper-plane', 'thoroughbreds'), 'fa fa-paper-plane-o' => __( ' paper-plane-o', 'thoroughbreds'), 'fa fa-paw' => __( ' paw', 'thoroughbreds'), 'fa fa-pencil' => __( ' pencil', 'thoroughbreds'), 'fa fa-pencil-square' => __( ' pencil-square', 'thoroughbreds'), 'fa fa-pencil-square-o' => __( ' pencil-square-o', 'thoroughbreds'), 'fa fa-phone' => __( ' phone', 'thoroughbreds'), 'fa fa-phone-square' => __( ' phone-square', 'thoroughbreds'), 'fa fa-photo' => __( ' photo', 'thoroughbreds'), 'fa fa-picture-o' => __( ' picture-o', 'thoroughbreds'), 'fa fa-pie-chart' => __( ' pie-chart', 'thoroughbreds'), 'fa fa-plane' => __( ' plane', 'thoroughbreds'), 'fa fa-plug' => __( ' plug', 'thoroughbreds'), 'fa fa-plus' => __( ' plus', 'thoroughbreds'), 'fa fa-plus-circle' => __( ' plus-circle', 'thoroughbreds'), 'fa fa-plus-square' => __( ' plus-square', 'thoroughbreds'), 'fa fa-plus-square-o' => __( ' plus-square-o', 'thoroughbreds'), 'fa fa-power-off' => __( ' power-off', 'thoroughbreds'), 'fa fa-print' => __( ' print', 'thoroughbreds'), 'fa fa-puzzle-piece' => __( ' puzzle-piece', 'thoroughbreds'), 'fa fa-qrcode' => __( ' qrcode', 'thoroughbreds'), 'fa fa-question' => __( ' question', 'thoroughbreds'), 'fa fa-question-circle' => __( ' question-circle', 'thoroughbreds'), 'fa fa-quote-left' => __( ' quote-left', 'thoroughbreds'), 'fa fa-quote-right' => __( ' quote-right', 'thoroughbreds'), 'fa fa-random' => __( ' random', 'thoroughbreds'), 'fa fa-recycle' => __( ' recycle', 'thoroughbreds'), 'fa fa-refresh' => __( ' refresh', 'thoroughbreds'), 'fa fa-registered' => __( ' registered', 'thoroughbreds'), 'fa fa-remove' => __( ' remove', 'thoroughbreds'), 'fa fa-reorder' => __( ' reorder', 'thoroughbreds'), 'fa fa-reply' => __( ' reply', 'thoroughbreds'), 'fa fa-reply-all' => __( ' reply-all', 'thoroughbreds'), 'fa fa-retweet' => __( ' retweet', 'thoroughbreds'), 'fa fa-road' => __( ' road', 'thoroughbreds'), 'fa fa-rocket' => __( ' rocket', 'thoroughbreds'), 'fa fa-rss' => __( ' rss', 'thoroughbreds'), 'fa fa-rss-square' => __( ' rss-square', 'thoroughbreds'), 'fa fa-search' => __( ' search', 'thoroughbreds'), 'fa fa-search-minus' => __( ' search-minus', 'thoroughbreds'), 'fa fa-search-plus' => __( ' search-plus', 'thoroughbreds'), 'fa fa-send' => __( ' send', 'thoroughbreds'), 'fa fa-send-o' => __( ' send-o', 'thoroughbreds'), 'fa fa-server' => __( ' server', 'thoroughbreds'), 'fa fa-share' => __( ' share', 'thoroughbreds'), 'fa fa-share-alt' => __( ' share-alt', 'thoroughbreds'), 'fa fa-share-alt-square' => __( ' share-alt-square', 'thoroughbreds'), 'fa fa-share-square' => __( ' share-square', 'thoroughbreds'), 'fa fa-share-square-o' => __( ' share-square-o', 'thoroughbreds'), 'fa fa-shield' => __( ' shield', 'thoroughbreds'), 'fa fa-ship' => __( ' ship', 'thoroughbreds'), 'fa fa-shopping-cart' => __( ' shopping-cart', 'thoroughbreds'), 'fa fa-sign-in' => __( ' sign-in', 'thoroughbreds'), 'fa fa-sign-out' => __( ' sign-out', 'thoroughbreds'), 'fa fa-signal' => __( ' signal', 'thoroughbreds'), 'fa fa-sitemap' => __( ' sitemap', 'thoroughbreds'), 'fa fa-sliders' => __( ' sliders', 'thoroughbreds'), 'fa fa-smile-o' => __( ' smile-o', 'thoroughbreds'), 'fa fa-soccer-ball-o' => __( ' soccer-ball-o', 'thoroughbreds'), 'fa fa-sort' => __( ' sort', 'thoroughbreds'), 'fa fa-sort-alpha-asc' => __( ' sort-alpha-asc', 'thoroughbreds'), 'fa fa-sort-alpha-desc' => __( ' sort-alpha-desc', 'thoroughbreds'), 'fa fa-sort-amount-asc' => __( ' sort-amount-asc', 'thoroughbreds'), 'fa fa-sort-amount-desc' => __( ' sort-amount-desc', 'thoroughbreds'), 'fa fa-sort-asc' => __( ' sort-asc', 'thoroughbreds'), 'fa fa-sort-desc' => __( ' sort-desc', 'thoroughbreds'), 'fa fa-sort-down' => __( ' sort-down', 'thoroughbreds'), 'fa fa-sort-numeric-asc' => __( ' sort-numeric-asc', 'thoroughbreds'), 'fa fa-sort-numeric-desc' => __( ' sort-numeric-desc', 'thoroughbreds'), 'fa fa-sort-up' => __( ' sort-up', 'thoroughbreds'), 'fa fa-space-shuttle' => __( ' space-shuttle', 'thoroughbreds'), 'fa fa-spinner' => __( ' spinner', 'thoroughbreds'), 'fa fa-spoon' => __( ' spoon', 'thoroughbreds'), 'fa fa-square' => __( ' square', 'thoroughbreds'), 'fa fa-square-o' => __( ' square-o', 'thoroughbreds'), 'fa fa-star' => __( ' star', 'thoroughbreds'), 'fa fa-star-half' => __( ' star-half', 'thoroughbreds'), 'fa fa-star-half-empty' => __( ' star-half-empty', 'thoroughbreds'), 'fa fa-star-half-full' => __( ' star-half-full', 'thoroughbreds'), 'fa fa-star-half-o' => __( ' star-half-o', 'thoroughbreds'), 'fa fa-star-o' => __( ' star-o', 'thoroughbreds'), 'fa fa-sticky-note' => __( ' sticky-note', 'thoroughbreds'), 'fa fa-sticky-note-o' => __( ' sticky-note-o', 'thoroughbreds'), 'fa fa-street-view' => __( ' street-view', 'thoroughbreds'), 'fa fa-suitcase' => __( ' suitcase', 'thoroughbreds'), 'fa fa-sun-o' => __( ' sun-o', 'thoroughbreds'), 'fa fa-support' => __( ' support', 'thoroughbreds'), 'fa fa-tablet' => __( ' tablet', 'thoroughbreds'), 'fa fa-tachometer' => __( ' tachometer', 'thoroughbreds'), 'fa fa-tag' => __( ' tag', 'thoroughbreds'), 'fa fa-tags' => __( ' tags', 'thoroughbreds'), 'fa fa-tasks' => __( ' tasks', 'thoroughbreds'), 'fa fa-taxi' => __( ' taxi', 'thoroughbreds'), 'fa fa-television' => __( ' television', 'thoroughbreds'), 'fa fa-terminal' => __( ' terminal', 'thoroughbreds'), 'fa fa-thumb-tack' => __( ' thumb-tack', 'thoroughbreds'), 'fa fa-thumbs-down' => __( ' thumbs-down', 'thoroughbreds'), 'fa fa-thumbs-o-down' => __( ' thumbs-o-down', 'thoroughbreds'), 'fa fa-thumbs-o-up' => __( ' thumbs-o-up', 'thoroughbreds'), 'fa fa-thumbs-up' => __( ' thumbs-up', 'thoroughbreds'), 'fa fa-ticket' => __( ' ticket', 'thoroughbreds'), 'fa fa-times' => __( ' times', 'thoroughbreds'), 'fa fa-times-circle' => __( ' times-circle', 'thoroughbreds'), 'fa fa-times-circle-o' => __( ' times-circle-o', 'thoroughbreds'), 'fa fa-tint' => __( ' tint', 'thoroughbreds'), 'fa fa-toggle-down' => __( ' toggle-down', 'thoroughbreds'), 'fa fa-toggle-left' => __( ' toggle-left', 'thoroughbreds'), 'fa fa-toggle-off' => __( ' toggle-off', 'thoroughbreds'), 'fa fa-toggle-on' => __( ' toggle-on', 'thoroughbreds'), 'fa fa-toggle-right' => __( ' toggle-right', 'thoroughbreds'), 'fa fa-toggle-up' => __( ' toggle-up', 'thoroughbreds'), 'fa fa-trademark' => __( ' trademark', 'thoroughbreds'), 'fa fa-trash' => __( ' trash', 'thoroughbreds'), 'fa fa-trash-o' => __( ' trash-o', 'thoroughbreds'), 'fa fa-tree' => __( ' tree', 'thoroughbreds'), 'fa fa-trophy' => __( ' trophy', 'thoroughbreds'), 'fa fa-truck' => __( ' truck', 'thoroughbreds'), 'fa fa-tty' => __( ' tty', 'thoroughbreds'), 'fa fa-tv' => __( ' tv', 'thoroughbreds'), 'fa fa-umbrella' => __( ' umbrella', 'thoroughbreds'), 'fa fa-university' => __( ' university', 'thoroughbreds'), 'fa fa-unlock' => __( ' unlock', 'thoroughbreds'), 'fa fa-unlock-alt' => __( ' unlock-alt', 'thoroughbreds'), 'fa fa-unsorted' => __( ' unsorted', 'thoroughbreds'), 'fa fa-upload' => __( ' upload', 'thoroughbreds'), 'fa fa-user' => __( ' user', 'thoroughbreds'), 'fa fa-user-plus' => __( ' user-plus', 'thoroughbreds'), 'fa fa-user-secret' => __( ' user-secret', 'thoroughbreds'), 'fa fa-user-times' => __( ' user-times', 'thoroughbreds'), 'fa fa-users' => __( ' users', 'thoroughbreds'), 'fa fa-video-camera' => __( ' video-camera', 'thoroughbreds'), 'fa fa-volume-down' => __( ' volume-down', 'thoroughbreds'), 'fa fa-volume-off' => __( ' volume-off', 'thoroughbreds'), 'fa fa-volume-up' => __( ' volume-up', 'thoroughbreds'), 'fa fa-warning' => __( ' warning', 'thoroughbreds'), 'fa fa-wheelchair' => __( ' wheelchair', 'thoroughbreds'), 'fa fa-wifi' => __( ' wifi', 'thoroughbreds'), 'fa fa-wrench' => __( ' wrench', 'thoroughbreds'), 'fa fa-hand-grab-o' => __( ' hand-grab-o', 'thoroughbreds'), 'fa fa-hand-lizard-o' => __( ' hand-lizard-o', 'thoroughbreds'), 'fa fa-hand-o-down' => __( ' hand-o-down', 'thoroughbreds'), 'fa fa-hand-o-left' => __( ' hand-o-left', 'thoroughbreds'), 'fa fa-hand-o-right' => __( ' hand-o-right', 'thoroughbreds'), 'fa fa-hand-o-up' => __( ' hand-o-up', 'thoroughbreds'), 'fa fa-hand-paper-o' => __( ' hand-paper-o', 'thoroughbreds'), 'fa fa-hand-peace-o' => __( ' hand-peace-o', 'thoroughbreds'), 'fa fa-hand-pointer-o' => __( ' hand-pointer-o', 'thoroughbreds'), 'fa fa-hand-rock-o' => __( ' hand-rock-o', 'thoroughbreds'), 'fa fa-hand-scissors-o' => __( ' hand-scissors-o', 'thoroughbreds'), 'fa fa-hand-spock-o' => __( ' hand-spock-o', 'thoroughbreds'), 'fa fa-hand-stop-o' => __( ' hand-stop-o', 'thoroughbreds'), 'fa fa-thumbs-down' => __( ' thumbs-down', 'thoroughbreds'), 'fa fa-thumbs-o-down' => __( ' thumbs-o-down', 'thoroughbreds'), 'fa fa-thumbs-o-up' => __( ' thumbs-o-up', 'thoroughbreds'), 'fa fa-thumbs-up' => __( ' thumbs-up', 'thoroughbreds'), 'fa fa-ambulance' => __( ' ambulance', 'thoroughbreds'), 'fa fa-automobile' => __( ' automobile', 'thoroughbreds'), 'fa fa-bicycle' => __( ' bicycle', 'thoroughbreds'), 'fa fa-bus' => __( ' bus', 'thoroughbreds'), 'fa fa-cab' => __( ' cab', 'thoroughbreds'), 'fa fa-car' => __( ' car', 'thoroughbreds'), 'fa fa-fighter-jet' => __( ' fighter-jet', 'thoroughbreds'), 'fa fa-motorcycle' => __( ' motorcycle', 'thoroughbreds'), 'fa fa-plane' => __( ' plane', 'thoroughbreds'), 'fa fa-rocket' => __( ' rocket', 'thoroughbreds'), 'fa fa-ship' => __( ' ship', 'thoroughbreds'), 'fa fa-space-shuttle' => __( ' space-shuttle', 'thoroughbreds'), 'fa fa-subway' => __( ' subway', 'thoroughbreds'), 'fa fa-taxi' => __( ' taxi', 'thoroughbreds'), 'fa fa-train' => __( ' train', 'thoroughbreds'), 'fa fa-truck' => __( ' truck', 'thoroughbreds'), 'fa fa-wheelchair' => __( ' wheelchair', 'thoroughbreds'), 'fa fa-genderless' => __( ' genderless', 'thoroughbreds'), 'fa fa-intersex' => __( ' intersex', 'thoroughbreds'), 'fa fa-mars' => __( ' mars', 'thoroughbreds'), 'fa fa-mars-double' => __( ' mars-double', 'thoroughbreds'), 'fa fa-mars-stroke' => __( ' mars-stroke', 'thoroughbreds'), 'fa fa-mars-stroke-h' => __( ' mars-stroke-h', 'thoroughbreds'), 'fa fa-mars-stroke-v' => __( ' mars-stroke-v', 'thoroughbreds'), 'fa fa-mercury' => __( ' mercury', 'thoroughbreds'), 'fa fa-neuter' => __( ' neuter', 'thoroughbreds'), 'fa fa-transgender' => __( ' transgender', 'thoroughbreds'), 'fa fa-transgender-alt' => __( ' transgender-alt', 'thoroughbreds'), 'fa fa-venus' => __( ' venus', 'thoroughbreds'), 'fa fa-venus-double' => __( ' venus-double', 'thoroughbreds'), 'fa fa-venus-mars' => __( ' venus-mars', 'thoroughbreds'), 'fa fa-file' => __( ' file', 'thoroughbreds'), 'fa fa-file-archive-o' => __( ' file-archive-o', 'thoroughbreds'), 'fa fa-file-audio-o' => __( ' file-audio-o', 'thoroughbreds'), 'fa fa-file-code-o' => __( ' file-code-o', 'thoroughbreds'), 'fa fa-file-excel-o' => __( ' file-excel-o', 'thoroughbreds'), 'fa fa-file-image-o' => __( ' file-image-o', 'thoroughbreds'), 'fa fa-file-movie-o' => __( ' file-movie-o', 'thoroughbreds'), 'fa fa-file-o' => __( ' file-o', 'thoroughbreds'), 'fa fa-file-pdf-o' => __( ' file-pdf-o', 'thoroughbreds'), 'fa fa-file-photo-o' => __( ' file-photo-o', 'thoroughbreds'), 'fa fa-file-picture-o' => __( ' file-picture-o', 'thoroughbreds'), 'fa fa-file-powerpoint-o' => __( ' file-powerpoint-o', 'thoroughbreds'), 'fa fa-file-sound-o' => __( ' file-sound-o', 'thoroughbreds'), 'fa fa-file-text' => __( ' file-text', 'thoroughbreds'), 'fa fa-file-text-o' => __( ' file-text-o', 'thoroughbreds'), 'fa fa-file-video-o' => __( ' file-video-o', 'thoroughbreds'), 'fa fa-file-word-o' => __( ' file-word-o', 'thoroughbreds'), 'fa fa-file-zip-o' => __( ' file-zip-o', 'thoroughbreds'), 'fa fa-circle-o-notch' => __( ' circle-o-notch', 'thoroughbreds'), 'fa fa-cog' => __( ' cog', 'thoroughbreds'), 'fa fa-gear' => __( ' gear', 'thoroughbreds'), 'fa fa-refresh' => __( ' refresh', 'thoroughbreds'), 'fa fa-spinner' => __( ' spinner', 'thoroughbreds'), 'fa fa-check-square' => __( ' check-square', 'thoroughbreds'), 'fa fa-check-square-o' => __( ' check-square-o', 'thoroughbreds'), 'fa fa-circle' => __( ' circle', 'thoroughbreds'), 'fa fa-circle-o' => __( ' circle-o', 'thoroughbreds'), 'fa fa-dot-circle-o' => __( ' dot-circle-o', 'thoroughbreds'), 'fa fa-minus-square' => __( ' minus-square', 'thoroughbreds'), 'fa fa-minus-square-o' => __( ' minus-square-o', 'thoroughbreds'), 'fa fa-plus-square' => __( ' plus-square', 'thoroughbreds'), 'fa fa-plus-square-o' => __( ' plus-square-o', 'thoroughbreds'), 'fa fa-square' => __( ' square', 'thoroughbreds'), 'fa fa-square-o' => __( ' square-o', 'thoroughbreds'), 'fa fa-cc-amex' => __( ' cc-amex', 'thoroughbreds'), 'fa fa-cc-diners-club' => __( ' cc-diners-club', 'thoroughbreds'), 'fa fa-cc-discover' => __( ' cc-discover', 'thoroughbreds'), 'fa fa-cc-jcb' => __( ' cc-jcb', 'thoroughbreds'), 'fa fa-cc-mastercard' => __( ' cc-mastercard', 'thoroughbreds'), 'fa fa-cc-paypal' => __( ' cc-paypal', 'thoroughbreds'), 'fa fa-cc-stripe' => __( ' cc-stripe', 'thoroughbreds'), 'fa fa-cc-visa' => __( ' cc-visa', 'thoroughbreds'), 'fa fa-credit-card' => __( ' credit-card', 'thoroughbreds'), 'fa fa-google-wallet' => __( ' google-wallet', 'thoroughbreds'), 'fa fa-paypal' => __( ' paypal', 'thoroughbreds'), 'fa fa-area-chart' => __( ' area-chart', 'thoroughbreds'), 'fa fa-bar-chart' => __( ' bar-chart', 'thoroughbreds'), 'fa fa-bar-chart-o' => __( ' bar-chart-o', 'thoroughbreds'), 'fa fa-line-chart' => __( ' line-chart', 'thoroughbreds'), 'fa fa-pie-chart' => __( ' pie-chart', 'thoroughbreds'), 'fa fa-bitcoin' => __( ' bitcoin', 'thoroughbreds'), 'fa fa-btc' => __( ' btc', 'thoroughbreds'), 'fa fa-cny' => __( ' cny', 'thoroughbreds'), 'fa fa-dollar' => __( ' dollar', 'thoroughbreds'), 'fa fa-eur' => __( ' eur', 'thoroughbreds'), 'fa fa-euro' => __( ' euro', 'thoroughbreds'), 'fa fa-gbp' => __( ' gbp', 'thoroughbreds'), 'fa fa-gg' => __( ' gg', 'thoroughbreds'), 'fa fa-gg-circle' => __( ' gg-circle', 'thoroughbreds'), 'fa fa-ils' => __( ' ils', 'thoroughbreds'), 'fa fa-inr' => __( ' inr', 'thoroughbreds'), 'fa fa-jpy' => __( ' jpy', 'thoroughbreds'), 'fa fa-krw' => __( ' krw', 'thoroughbreds'), 'fa fa-money' => __( ' money', 'thoroughbreds'), 'fa fa-rmb' => __( ' rmb', 'thoroughbreds'), 'fa fa-rouble' => __( ' rouble', 'thoroughbreds'), 'fa fa-rub' => __( ' rub', 'thoroughbreds'), 'fa fa-ruble' => __( ' ruble', 'thoroughbreds'), 'fa fa-rupee' => __( ' rupee', 'thoroughbreds'), 'fa fa-shekel' => __( ' shekel', 'thoroughbreds'), 'fa fa-sheqel' => __( ' sheqel', 'thoroughbreds'), 'fa fa-try' => __( ' try', 'thoroughbreds'), 'fa fa-turkish-lira' => __( ' turkish-lira', 'thoroughbreds'), 'fa fa-usd' => __( ' usd', 'thoroughbreds'), 'fa fa-won' => __( ' won', 'thoroughbreds'), 'fa fa-yen' => __( ' yen', 'thoroughbreds'), 'fa fa-align-center' => __( ' align-center', 'thoroughbreds'), 'fa fa-align-justify' => __( ' align-justify', 'thoroughbreds'), 'fa fa-align-left' => __( ' align-left', 'thoroughbreds'), 'fa fa-align-right' => __( ' align-right', 'thoroughbreds'), 'fa fa-bold' => __( ' bold', 'thoroughbreds'), 'fa fa-chain' => __( ' chain', 'thoroughbreds'), 'fa fa-chain-broken' => __( ' chain-broken', 'thoroughbreds'), 'fa fa-clipboard' => __( ' clipboard', 'thoroughbreds'), 'fa fa-columns' => __( ' columns', 'thoroughbreds'), 'fa fa-copy' => __( ' copy', 'thoroughbreds'), 'fa fa-cut' => __( ' cut', 'thoroughbreds'), 'fa fa-dedent' => __( ' dedent', 'thoroughbreds'), 'fa fa-eraser' => __( ' eraser', 'thoroughbreds'), 'fa fa-file' => __( ' file', 'thoroughbreds'), 'fa fa-file-o' => __( ' file-o', 'thoroughbreds'), 'fa fa-file-text' => __( ' file-text', 'thoroughbreds'), 'fa fa-file-text-o' => __( ' file-text-o', 'thoroughbreds'), 'fa fa-files-o' => __( ' files-o', 'thoroughbreds'), 'fa fa-floppy-o' => __( ' floppy-o', 'thoroughbreds'), 'fa fa-font' => __( ' font', 'thoroughbreds'), 'fa fa-header' => __( ' header', 'thoroughbreds'), 'fa fa-indent' => __( ' indent', 'thoroughbreds'), 'fa fa-italic' => __( ' italic', 'thoroughbreds'), 'fa fa-link' => __( ' link', 'thoroughbreds'), 'fa fa-list' => __( ' list', 'thoroughbreds'), 'fa fa-list-alt' => __( ' list-alt', 'thoroughbreds'), 'fa fa-list-ol' => __( ' list-ol', 'thoroughbreds'), 'fa fa-list-ul' => __( ' list-ul', 'thoroughbreds'), 'fa fa-outdent' => __( ' outdent', 'thoroughbreds'), 'fa fa-paperclip' => __( ' paperclip', 'thoroughbreds'), 'fa fa-paragraph' => __( ' paragraph', 'thoroughbreds'), 'fa fa-paste' => __( ' paste', 'thoroughbreds'), 'fa fa-repeat' => __( ' repeat', 'thoroughbreds'), 'fa fa-rotate-left' => __( ' rotate-left', 'thoroughbreds'), 'fa fa-rotate-right' => __( ' rotate-right', 'thoroughbreds'), 'fa fa-save' => __( ' save', 'thoroughbreds'), 'fa fa-scissors' => __( ' scissors', 'thoroughbreds'), 'fa fa-strikethrough' => __( ' strikethrough', 'thoroughbreds'), 'fa fa-subscript' => __( ' subscript', 'thoroughbreds'), 'fa fa-superscript' => __( ' superscript', 'thoroughbreds'), 'fa fa-table' => __( ' table', 'thoroughbreds'), 'fa fa-text-height' => __( ' text-height', 'thoroughbreds'), 'fa fa-text-width' => __( ' text-width', 'thoroughbreds'), 'fa fa-th' => __( ' th', 'thoroughbreds'), 'fa fa-th-large' => __( ' th-large', 'thoroughbreds'), 'fa fa-th-list' => __( ' th-list', 'thoroughbreds'), 'fa fa-underline' => __( ' underline', 'thoroughbreds'), 'fa fa-undo' => __( ' undo', 'thoroughbreds'), 'fa fa-unlink' => __( ' unlink', 'thoroughbreds'), 'fa fa-angle-double-down' => __( ' angle-double-down', 'thoroughbreds'), 'fa fa-angle-double-left' => __( ' angle-double-left', 'thoroughbreds'), 'fa fa-angle-double-right' => __( ' angle-double-right', 'thoroughbreds'), 'fa fa-angle-double-up' => __( ' angle-double-up', 'thoroughbreds'), 'fa fa-angle-down' => __( ' angle-down', 'thoroughbreds'), 'fa fa-angle-left' => __( ' angle-left', 'thoroughbreds'), 'fa fa-angle-right' => __( ' angle-right', 'thoroughbreds'), 'fa fa-angle-up' => __( ' angle-up', 'thoroughbreds'), 'fa fa-arrow-circle-down' => __( ' arrow-circle-down', 'thoroughbreds'), 'fa fa-arrow-circle-left' => __( ' arrow-circle-left', 'thoroughbreds'), 'fa fa-arrow-circle-o-down' => __( ' arrow-circle-o-down', 'thoroughbreds'), 'fa fa-arrow-circle-o-left' => __( ' arrow-circle-o-left', 'thoroughbreds'), 'fa fa-arrow-circle-o-right' => __( ' arrow-circle-o-right', 'thoroughbreds'), 'fa fa-arrow-circle-o-up' => __( ' arrow-circle-o-up', 'thoroughbreds'), 'fa fa-arrow-circle-right' => __( ' arrow-circle-right', 'thoroughbreds'), 'fa fa-arrow-circle-up' => __( ' arrow-circle-up', 'thoroughbreds'), 'fa fa-arrow-down' => __( ' arrow-down', 'thoroughbreds'), 'fa fa-arrow-left' => __( ' arrow-left', 'thoroughbreds'), 'fa fa-arrow-right' => __( ' arrow-right', 'thoroughbreds'), 'fa fa-arrow-up' => __( ' arrow-up', 'thoroughbreds'), 'fa fa-arrows' => __( ' arrows', 'thoroughbreds'), 'fa fa-arrows-alt' => __( ' arrows-alt', 'thoroughbreds'), 'fa fa-arrows-h' => __( ' arrows-h', 'thoroughbreds'), 'fa fa-arrows-v' => __( ' arrows-v', 'thoroughbreds'), 'fa fa-caret-down' => __( ' caret-down', 'thoroughbreds'), 'fa fa-caret-left' => __( ' caret-left', 'thoroughbreds'), 'fa fa-caret-right' => __( ' caret-right', 'thoroughbreds'), 'fa fa-caret-square-o-down' => __( ' caret-square-o-down', 'thoroughbreds'), 'fa fa-caret-square-o-left' => __( ' caret-square-o-left', 'thoroughbreds'), 'fa fa-caret-square-o-right' => __( ' caret-square-o-right', 'thoroughbreds'), 'fa fa-caret-square-o-up' => __( ' caret-square-o-up', 'thoroughbreds'), 'fa fa-caret-up' => __( ' caret-up', 'thoroughbreds'), 'fa fa-chevron-circle-down' => __( ' chevron-circle-down', 'thoroughbreds'), 'fa fa-chevron-circle-left' => __( ' chevron-circle-left', 'thoroughbreds'), 'fa fa-chevron-circle-right' => __( ' chevron-circle-right', 'thoroughbreds'), 'fa fa-chevron-circle-up' => __( ' chevron-circle-up', 'thoroughbreds'), 'fa fa-chevron-down' => __( ' chevron-down', 'thoroughbreds'), 'fa fa-chevron-left' => __( ' chevron-left', 'thoroughbreds'), 'fa fa-chevron-right' => __( ' chevron-right', 'thoroughbreds'), 'fa fa-chevron-up' => __( ' chevron-up', 'thoroughbreds'), 'fa fa-exchange' => __( ' exchange', 'thoroughbreds'), 'fa fa-hand-o-down' => __( ' hand-o-down', 'thoroughbreds'), 'fa fa-hand-o-left' => __( ' hand-o-left', 'thoroughbreds'), 'fa fa-hand-o-right' => __( ' hand-o-right', 'thoroughbreds'), 'fa fa-hand-o-up' => __( ' hand-o-up', 'thoroughbreds'), 'fa fa-long-arrow-down' => __( ' long-arrow-down', 'thoroughbreds'), 'fa fa-long-arrow-left' => __( ' long-arrow-left', 'thoroughbreds'), 'fa fa-long-arrow-right' => __( ' long-arrow-right', 'thoroughbreds'), 'fa fa-long-arrow-up' => __( ' long-arrow-up', 'thoroughbreds'), 'fa fa-toggle-down' => __( ' toggle-down', 'thoroughbreds'), 'fa fa-toggle-left' => __( ' toggle-left', 'thoroughbreds'), 'fa fa-toggle-right' => __( ' toggle-right', 'thoroughbreds'), 'fa fa-toggle-up' => __( ' toggle-up', 'thoroughbreds'), 'fa fa-arrows-alt' => __( ' arrows-alt', 'thoroughbreds'), 'fa fa-backward' => __( ' backward', 'thoroughbreds'), 'fa fa-compress' => __( ' compress', 'thoroughbreds'), 'fa fa-eject' => __( ' eject', 'thoroughbreds'), 'fa fa-expand' => __( ' expand', 'thoroughbreds'), 'fa fa-fast-backward' => __( ' fast-backward', 'thoroughbreds'), 'fa fa-fast-forward' => __( ' fast-forward', 'thoroughbreds'), 'fa fa-forward' => __( ' forward', 'thoroughbreds'), 'fa fa-pause' => __( ' pause', 'thoroughbreds'), 'fa fa-play' => __( ' play', 'thoroughbreds'), 'fa fa-play-circle' => __( ' play-circle', 'thoroughbreds'), 'fa fa-play-circle-o' => __( ' play-circle-o', 'thoroughbreds'), 'fa fa-random' => __( ' random', 'thoroughbreds'), 'fa fa-step-backward' => __( ' step-backward', 'thoroughbreds'), 'fa fa-step-forward' => __( ' step-forward', 'thoroughbreds'), 'fa fa-stop' => __( ' stop', 'thoroughbreds'), 'fa fa-youtube-play' => __( ' youtube-play', 'thoroughbreds'), 'fa fa-500px' => __( ' 500px', 'thoroughbreds'), 'fa fa-adn' => __( ' adn', 'thoroughbreds'), 'fa fa-amazon' => __( ' amazon', 'thoroughbreds'), 'fa fa-android' => __( ' android', 'thoroughbreds'), 'fa fa-angellist' => __( ' angellist', 'thoroughbreds'), 'fa fa-apple' => __( ' apple', 'thoroughbreds'), 'fa fa-behance' => __( ' behance', 'thoroughbreds'), 'fa fa-behance-square' => __( ' behance-square', 'thoroughbreds'), 'fa fa-bitbucket' => __( ' bitbucket', 'thoroughbreds'), 'fa fa-bitbucket-square' => __( ' bitbucket-square', 'thoroughbreds'), 'fa fa-bitcoin' => __( ' bitcoin', 'thoroughbreds'), 'fa fa-black-tie' => __( ' black-tie', 'thoroughbreds'), 'fa fa-btc' => __( ' btc', 'thoroughbreds'), 'fa fa-buysellads' => __( ' buysellads', 'thoroughbreds'), 'fa fa-cc-amex' => __( ' cc-amex', 'thoroughbreds'), 'fa fa-cc-diners-club' => __( ' cc-diners-club', 'thoroughbreds'), 'fa fa-cc-discover' => __( ' cc-discover', 'thoroughbreds'), 'fa fa-cc-jcb' => __( ' cc-jcb', 'thoroughbreds'), 'fa fa-cc-mastercard' => __( ' cc-mastercard', 'thoroughbreds'), 'fa fa-cc-paypal' => __( ' cc-paypal', 'thoroughbreds'), 'fa fa-cc-stripe' => __( ' cc-stripe', 'thoroughbreds'), 'fa fa-cc-visa' => __( ' cc-visa', 'thoroughbreds'), 'fa fa-chrome' => __( ' chrome', 'thoroughbreds'), 'fa fa-codepen' => __( ' codepen', 'thoroughbreds'), 'fa fa-connectdevelop' => __( ' connectdevelop', 'thoroughbreds'), 'fa fa-contao' => __( ' contao', 'thoroughbreds'), 'fa fa-css3' => __( ' css3', 'thoroughbreds'), 'fa fa-dashcube' => __( ' dashcube', 'thoroughbreds'), 'fa fa-delicious' => __( ' delicious', 'thoroughbreds'), 'fa fa-deviantart' => __( ' deviantart', 'thoroughbreds'), 'fa fa-digg' => __( ' digg', 'thoroughbreds'), 'fa fa-dribbble' => __( ' dribbble', 'thoroughbreds'), 'fa fa-dropbox' => __( ' dropbox', 'thoroughbreds'), 'fa fa-drupal' => __( ' drupal', 'thoroughbreds'), 'fa fa-empire' => __( ' empire', 'thoroughbreds'), 'fa fa-expeditedssl' => __( ' expeditedssl', 'thoroughbreds'), 'fa fa-facebook' => __( ' facebook', 'thoroughbreds'), 'fa fa-facebook-f' => __( ' facebook-f', 'thoroughbreds'), 'fa fa-facebook-official' => __( ' facebook-official', 'thoroughbreds'), 'fa fa-facebook-square' => __( ' facebook-square', 'thoroughbreds'), 'fa fa-firefox' => __( ' firefox', 'thoroughbreds'), 'fa fa-flickr' => __( ' flickr', 'thoroughbreds'), 'fa fa-fonticons' => __( ' fonticons', 'thoroughbreds'), 'fa fa-forumbee' => __( ' forumbee', 'thoroughbreds'), 'fa fa-foursquare' => __( ' foursquare', 'thoroughbreds'), 'fa fa-ge' => __( ' ge', 'thoroughbreds'), 'fa fa-get-pocket' => __( ' get-pocket', 'thoroughbreds'), 'fa fa-gg' => __( ' gg', 'thoroughbreds'), 'fa fa-gg-circle' => __( ' gg-circle', 'thoroughbreds'), 'fa fa-git' => __( ' git', 'thoroughbreds'), 'fa fa-git-square' => __( ' git-square', 'thoroughbreds'), 'fa fa-github' => __( ' github', 'thoroughbreds'), 'fa fa-github-alt' => __( ' github-alt', 'thoroughbreds'), 'fa fa-github-square' => __( ' github-square', 'thoroughbreds'), 'fa fa-gittip' => __( ' gittip', 'thoroughbreds'), 'fa fa-google' => __( ' google', 'thoroughbreds'), 'fa fa-google-plus' => __( ' google-plus', 'thoroughbreds'), 'fa fa-google-plus-square' => __( ' google-plus-square', 'thoroughbreds'), 'fa fa-google-wallet' => __( ' google-wallet', 'thoroughbreds'), 'fa fa-gratipay' => __( ' gratipay', 'thoroughbreds'), 'fa fa-hacker-news' => __( ' hacker-news', 'thoroughbreds'), 'fa fa-houzz' => __( ' houzz', 'thoroughbreds'), 'fa fa-html5' => __( ' html5', 'thoroughbreds'), 'fa fa-instagram' => __( ' instagram', 'thoroughbreds'), 'fa fa-internet-explorer' => __( ' internet-explorer', 'thoroughbreds'), 'fa fa-ioxhost' => __( ' ioxhost', 'thoroughbreds'), 'fa fa-joomla' => __( ' joomla', 'thoroughbreds'), 'fa fa-jsfiddle' => __( ' jsfiddle', 'thoroughbreds'), 'fa fa-lastfm' => __( ' lastfm', 'thoroughbreds'), 'fa fa-lastfm-square' => __( ' lastfm-square', 'thoroughbreds'), 'fa fa-leanpub' => __( ' leanpub', 'thoroughbreds'), 'fa fa-linkedin' => __( ' linkedin', 'thoroughbreds'), 'fa fa-linkedin-square' => __( ' linkedin-square', 'thoroughbreds'), 'fa fa-linux' => __( ' linux', 'thoroughbreds'), 'fa fa-maxcdn' => __( ' maxcdn', 'thoroughbreds'), 'fa fa-meanpath' => __( ' meanpath', 'thoroughbreds'), 'fa fa-medium' => __( ' medium', 'thoroughbreds'), 'fa fa-odnoklassniki' => __( ' odnoklassniki', 'thoroughbreds'), 'fa fa-odnoklassniki-square' => __( ' odnoklassniki-square', 'thoroughbreds'), 'fa fa-opencart' => __( ' opencart', 'thoroughbreds'), 'fa fa-openid' => __( ' openid', 'thoroughbreds'), 'fa fa-opera' => __( ' opera', 'thoroughbreds'), 'fa fa-optin-monster' => __( ' optin-monster', 'thoroughbreds'), 'fa fa-pagelines' => __( ' pagelines', 'thoroughbreds'), 'fa fa-paypal' => __( ' paypal', 'thoroughbreds'), 'fa fa-pied-piper' => __( ' pied-piper', 'thoroughbreds'), 'fa fa-pied-piper-alt' => __( ' pied-piper-alt', 'thoroughbreds'), 'fa fa-pinterest' => __( ' pinterest', 'thoroughbreds'), 'fa fa-pinterest-p' => __( ' pinterest-p', 'thoroughbreds'), 'fa fa-pinterest-square' => __( ' pinterest-square', 'thoroughbreds'), 'fa fa-qq' => __( ' qq', 'thoroughbreds'), 'fa fa-ra' => __( ' ra', 'thoroughbreds'), 'fa fa-rebel' => __( ' rebel', 'thoroughbreds'), 'fa fa-reddit' => __( ' reddit', 'thoroughbreds'), 'fa fa-reddit-square' => __( ' reddit-square', 'thoroughbreds'), 'fa fa-renren' => __( ' renren', 'thoroughbreds'), 'fa fa-safari' => __( ' safari', 'thoroughbreds'), 'fa fa-sellsy' => __( ' sellsy', 'thoroughbreds'), 'fa fa-share-alt' => __( ' share-alt', 'thoroughbreds'), 'fa fa-share-alt-square' => __( ' share-alt-square', 'thoroughbreds'), 'fa fa-shirtsinbulk' => __( ' shirtsinbulk', 'thoroughbreds'), 'fa fa-simplybuilt' => __( ' simplybuilt', 'thoroughbreds'), 'fa fa-skyatlas' => __( ' skyatlas', 'thoroughbreds'), 'fa fa-skype' => __( ' skype', 'thoroughbreds'), 'fa fa-slack' => __( ' slack', 'thoroughbreds'), 'fa fa-slideshare' => __( ' slideshare', 'thoroughbreds'), 'fa fa-soundcloud' => __( ' soundcloud', 'thoroughbreds'), 'fa fa-spotify' => __( ' spotify', 'thoroughbreds'), 'fa fa-stack-exchange' => __( ' stack-exchange', 'thoroughbreds'), 'fa fa-stack-overflow' => __( ' stack-overflow', 'thoroughbreds'), 'fa fa-steam' => __( ' steam', 'thoroughbreds'), 'fa fa-steam-square' => __( ' steam-square', 'thoroughbreds'), 'fa fa-stumbleupon' => __( ' stumbleupon', 'thoroughbreds'), 'fa fa-stumbleupon-circle' => __( ' stumbleupon-circle', 'thoroughbreds'), 'fa fa-tencent-weibo' => __( ' tencent-weibo', 'thoroughbreds'), 'fa fa-trello' => __( ' trello', 'thoroughbreds'), 'fa fa-tripadvisor' => __( ' tripadvisor', 'thoroughbreds'), 'fa fa-tumblr' => __( ' tumblr', 'thoroughbreds'), 'fa fa-tumblr-square' => __( ' tumblr-square', 'thoroughbreds'), 'fa fa-twitch' => __( ' twitch', 'thoroughbreds'), 'fa fa-twitter' => __( ' twitter', 'thoroughbreds'), 'fa fa-twitter-square' => __( ' twitter-square', 'thoroughbreds'), 'fa fa-viacoin' => __( ' viacoin', 'thoroughbreds'), 'fa fa-vimeo' => __( ' vimeo', 'thoroughbreds'), 'fa fa-vimeo-square' => __( ' vimeo-square', 'thoroughbreds'), 'fa fa-vine' => __( ' vine', 'thoroughbreds'), 'fa fa-vk' => __( ' vk', 'thoroughbreds'), 'fa fa-wechat' => __( ' wechat', 'thoroughbreds'), 'fa fa-weibo' => __( ' weibo', 'thoroughbreds'), 'fa fa-weixin' => __( ' weixin', 'thoroughbreds'), 'fa fa-whatsapp' => __( ' whatsapp', 'thoroughbreds'), 'fa fa-wikipedia-w' => __( ' wikipedia-w', 'thoroughbreds'), 'fa fa-windows' => __( ' windows', 'thoroughbreds'), 'fa fa-wordpress' => __( ' wordpress', 'thoroughbreds'), 'fa fa-xing' => __( ' xing', 'thoroughbreds'), 'fa fa-xing-square' => __( ' xing-square', 'thoroughbreds'), 'fa fa-y-combinator' => __( ' y-combinator', 'thoroughbreds'), 'fa fa-y-combinator-square' => __( ' y-combinator-square', 'thoroughbreds'), 'fa fa-yahoo' => __( ' yahoo', 'thoroughbreds'), 'fa fa-yc' => __( ' yc', 'thoroughbreds'), 'fa fa-yc-square' => __( ' yc-square', 'thoroughbreds'), 'fa fa-yelp' => __( ' yelp', 'thoroughbreds'), 'fa fa-youtube' => __( ' youtube', 'thoroughbreds'), 'fa fa-youtube-play' => __( ' youtube-play', 'thoroughbreds'), 'fa fa-youtube-square' => __( ' youtube-square', 'thoroughbreds'), 'fa fa-ambulance' => __( ' ambulance', 'thoroughbreds'), 'fa fa-h-square' => __( ' h-square', 'thoroughbreds'), 'fa fa-heart' => __( ' heart', 'thoroughbreds'), 'fa fa-heart-o' => __( ' heart-o', 'thoroughbreds'), 'fa fa-heartbeat' => __( ' heartbeat', 'thoroughbreds'), 'fa fa-hospital-o' => __( ' hospital-o', 'thoroughbreds'), 'fa fa-medkit' => __( ' medkit', 'thoroughbreds'), 'fa fa-plus-square' => __( ' plus-square', 'thoroughbreds'), 'fa fa-stethoscope' => __( ' stethoscope', 'thoroughbreds'), 'fa fa-user-md' => __( ' user-md', 'thoroughbreds'), 'fa fa-wheelchair' => __( ' wheelchair', 'thoroughbreds') );
    
    
    
}

function thoroughbreds_fonts(){
    
    $font_family_array = array(
        'Arial, Helvetica, sans-serif'          => 'Arial',
        'Arial Black, Gadget, sans-serif'       => 'Arial Black',
        'Courier New, monospace'                => 'Courier New',
        'Lobster Two, cursive'                  => 'Lobster - Cursive',
        'Georgia, serif'                        => 'Georgia',
        'Impact, Charcoal, sans-serif'          => 'Impact',
        'Lucida Console, Monaco, monospace'     => 'Lucida Console',
        'Lucida Sans Unicode, Lucida Grande, sans-serif' => 'Lucida Sans Unicode',
        'MS Sans Serif, Geneva, sans-serif'     => 'MS Sans Serif',
        'MS Serif, New York, serif'             => 'MS Serif',
        'Open Sans, sans-serif'                 => 'Open Sans',
        'Source Sans Pro, sans-serif'           => 'Source Sans Pro',
        'Lato, sans-serif'                      => 'Lato',
        'Tahoma, Geneva, sans-serif'            => 'Tahoma',
        'Times New Roman, Times, serif'         => 'Times New Roman',
        'Trebuchet MS, sans-serif'              => 'Trebuchet MS',
        'Verdana, Geneva, sans-serif'           => 'Verdana',
        'Raleway, sans-serif'                   => 'Raleway',
    );
    
    
    return $font_family_array;
}

function thoroughbreds_font_sizes(){
    
    $font_size_array = array(
        '10px' => '10 px',
        '12px' => '12 px',
        '14px' => '14 px',
        '16px' => '16 px',
        '18px' => '18 px',
        '20px' => '20 px',
    );
    
    return $font_size_array;
    
}



function thoroughbreds_font_sanitize( $input ) {
    
    $valid_keys = thoroughbreds_fonts();
    
    if (array_key_exists($input, $valid_keys)) {
        return $input;
    } else {
        return '';
    }
    
}

function thoroughbreds_font_size_sanitize( $input ) {
    
    $valid_keys = thoroughbreds_font_sizes();
    
    if (array_key_exists($input, $valid_keys)) {
        return $input;
    } else {
        return '';
    }
    
}

function thoroughbreds_icon_sanitize( $input ) {
    
    $valid_keys = thoroughbreds_icons();
    
    if (array_key_exists($input, $valid_keys)) {
        return $input;
    } else {
        return '';
    }
    
}

function thoroughbreds_text_sanitize( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function thoroughbreds_slider_transition_sanitize($input) {
    $valid_keys = array(
        'true' => __('Fade', 'thoroughbreds'),
        'false' => __('Slide', 'thoroughbreds'),
    );
    if (array_key_exists($input, $valid_keys)) {
        return $input;
    } else {
        return '';
    }
}

function thoroughbreds_radio_sanitize_enabledisable($input) {
    $valid_keys = array(
        'enable' => __('Enable', 'thoroughbreds'),
        'disable' => __('Disable', 'thoroughbreds')
    );
    if (array_key_exists($input, $valid_keys)) {
        return $input;
    } else {
        return '';
    }
}

function thoroughbreds_radio_sanitize_yesno($input) {
    $valid_keys = array(
        'yes' => __('Yes', 'thoroughbreds'),
        'no' => __('No', 'thoroughbreds')
    );
    if (array_key_exists($input, $valid_keys)) {
        return $input;
    } else {
        return '';
    }
}

// checkbox sanitization
function thoroughbreds_checkbox_sanitize($input) {
    if ($input == 1) {
        return 1;
    } else {
        return '';
    }
}

//integer sanitize
function thoroughbreds_integer_sanitize($input) {
    return intval($input);
}


function thoroughbreds_sidebar_sanitize($input) {
    
    $valid = array(
        'none'              => __( 'No Sidebar', 'thoroughbreds'),
        'right'             => __( 'Right', 'thoroughbreds'),
        'left'              => __( 'Left', 'thoroughbreds'),
    );
    
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
    
    
}

function thoroughbreds_on_off_sanitize($input) {
    $valid = array(
        'on'    => __( 'Show', 'thoroughbreds' ),
        'off'    => __( 'Hide', 'thoroughbreds' )
    );

    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

function thoroughbreds_blogstyle_sanitize($input) {
    $valid = array(
        'stacked'    => __( 'Stacked', 'thoroughbreds' ),
        'tiles'    => __( 'Tiles', 'thoroughbreds' )
    );

    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

function thoroughbreds_theme_color_sanitize($input) {
    $valid = array(
        'green'             => __( 'Green', 'thoroughbreds' ),
        'blue'              => __( 'Blue', 'thoroughbreds' ),
        'red'               => __( 'Red', 'thoroughbreds' ),
        'pink'              => __( 'Pink', 'thoroughbreds' ),
        'yellow'            => __( 'Yellow', 'thoroughbreds' ),
        'darkblue'          => __( 'Dark Blue', 'thoroughbreds' ),
    );

    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

