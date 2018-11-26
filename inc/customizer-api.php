<?php

    function dimension_customizer_api_option_create($wp_customize)
    {

        //  =================================
        //  = Default WP Cusotimer Options  = 
        //  =================================

        $wp_customize->add_panel( 'default_options', array(
            'priority'      => 10,
            'capability'    => 'edit_theme_options',
            'title'         => __('Default Options', 'dimension'),
            // 'description'   => __('Customize your theme options.', 'dimension'),
        ));

        /* ADD CUSTOMIZER DEFAULT OPTIONS IN NEW PANEL */
        $wp_customize->get_section('title_tagline')->panel = ( 'default_options' );
        $wp_customize->get_section('colors')->panel = ( 'default_options' );
        $wp_customize->get_section('header_image')->panel = ( 'default_options' );
        $wp_customize->get_section('background_image')->panel = ( 'default_options' );
        $wp_customize->get_section('static_front_page')->panel = ( 'default_options' );
        $wp_customize->get_section('custom_css')->panel = ( 'default_options' );


        //  =================================
        //  = Dimension Theme Options       = 
        //  =================================
        
        $wp_customize->add_panel( 'dimension_options', array(
            'priority'      => 20,
            'capability'    => 'edit_theme_options',
            'title'         => __('Theme Options', 'dimension'),
            'description'   => __('Customize your theme options.', 'dimension'),
        ));


        /*-----------------------------------*/
        /* Logo Options */
        /*-----------------------------------*/
        $wp_customize->add_section( 'dimension_logo_option', array(
            'title'     => __('Logo Option', 'dimension'),
            'priority'  => 10,
            'panel'     => 'dimension_options'
        ));
        
        /* IMAGE LOGO OPTIONS */
        $wp_customize->add_setting( 'dimension_image_logo', array(
            'default'   => '',
            'transport' => 'refresh'
        ));

        $wp_customize->add_control(
           new WP_Customize_Image_Control(
               $wp_customize,
               'dimension_image_logo',
               array(
                   'label'      => __( 'Upload a logo', 'dimension' ),
                   'section'    => 'dimension_logo_option',
                   'settings'   => 'dimension_image_logo'
               )
           )
        );

        /* ICONS LOGO OPTIONS */
        $wp_customize->add_setting( 'dimension_logo_icon_name', array(
            'default'   => '',
            'transport' => 'refresh'
        ));
        $wp_customize->add_control( 'dimension_logo_icon_name', array(
            'label'         => __('Logo Icon Name', 'dimension'),
            'description'   => __( '<em>You can add font-awesome icon\'s name to logo icon. Font-awesome version 4.7.0 has been used. <br><br> Of course, the last name of the icon should be used. ex: ( fa-diamond, fa-bullseye, etc. )</em> you can see more icon name <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">here</a>.', 'dimension' ),
            'section'       => 'dimension_logo_option',
            'setting'       => 'dimension_logo_icon_name',
            'type'          => 'text',
            'input_attrs' => array(
                'placeholder' => __( 'fa-diamond', 'dimension' ),
            ),
        ));


        /*-----------------------------------*/
        /* Social Network Options */
        /*-----------------------------------*/
        $wp_customize->add_section( 'dimension_social_option', array(
            'title'         => __('Social Networks', 'dimension'),
            'description'   => __( 'Hi, This is a <b>practice</b> theme, so more link options are not included, you can add manually if you want.', 'dimension' ),
            'priority'      => 15,
            'panel'         => 'dimension_options'
        ));

        /* Twitter link */
        $wp_customize->add_setting( 'twitter_link', array(
            'default'   => '',
            'transport' => 'refresh'
        ));
        $wp_customize->add_control( 'twitter_link', array(
            'label'     => __('Twitter', 'dimension'),
            'section'   => 'dimension_social_option',
            'setting'   => 'twitter_link',
            'type'      => 'url'
        ));

        /* Facebook link */
        $wp_customize->add_setting( 'fb_link', array(
            'default'   => '',
            'transport' => 'refresh'
        ));
        $wp_customize->add_control( 'fb_link', array(
            'label'     => __('Facebook', 'dimension'),
            'section'   => 'dimension_social_option',
            'setting'   => 'fb_link',
            'type'      => 'url'
        ));


        /* Instagram link */
        $wp_customize->add_setting( 'instagram_link', array(
            'default'   => '',
            'transport' => 'refresh'
        ));
        $wp_customize->add_control('instagram_link', array(
            'label'     => __('Instagram', 'dimension'),
            'section'   => 'dimension_social_option',
            'setting'   => 'instagram_link',
            'type'      => 'url'
        ));


        /* GitHub link */
        $wp_customize->add_setting( 'github_link', array(
            'default'   => '',
            'transport' => 'refresh'
        ));
        $wp_customize->add_control( 'github_link', array(
            'label'     => __('GitHub', 'dimension'),
            'section'   => 'dimension_social_option',
            'setting'   => 'github_link',
            'type'      => 'url'
        ));


        /* GitHub link */
        $wp_customize->add_setting( 'skype_link', array(
            'default'   => '',
            'transport' => 'refresh'
        ));
        $wp_customize->add_control( 'skype_link', array(
            'label'     => __('Skype', 'dimension'),
            'section'   => 'dimension_social_option',
            'setting'   => 'skype_link',
            'type'      => 'text'
        ));



        /*-----------------------------------*/
        /* Footer Options */
        /*-----------------------------------*/
        $wp_customize->add_section( 'dimension_footer_option', array(
            'title'         => __('Footer Options', 'dimension'),
            'description'   => __( '<em>Write your Footer text in here and you can add <strong>html tag.</strong></em>', 'dimension' ),
            'priority'      => 20,
            'panel'         => 'dimension_options'
        ));
        $wp_customize->add_setting( 'dimension_footer_text', array(
            'default'   => '',
            'transport' => 'refresh'
        ));
        $wp_customize->add_control( 'dimension_footer_text', array(
            'label'     => __('Footer Text', 'dimension'),
            'section'   => 'dimension_footer_option',
            'setting'   => 'dimension_footer_text',
            'type'      => 'textarea'
        ));

    }

    add_action( 'customize_register', 'dimension_customizer_api_option_create' );


    /* REMOVE CUSTOMIZER MENUS OPTIONS */
    // function remove_customizer_menus_settings( $wp_customize ){
    //     $wp_customize->remove_panel('nav_menus');
    // }
    // add_action( 'customize_register', 'remove_customizer_menus_settings', 20 );

    // function wpdocs_remove_nav_menus_panel( $components ) {
    //     $i = array_search( 'nav_menus', $components );
    //     if ( false !== $i ) {
    //         unset( $components[ $i ] );
    //     }
    //     return $components;
    // }
    // add_filter( 'customize_loaded_components', 'wpdocs_remove_nav_menus_panel' );