<?php
/**
 * Global Theme Customizer.
 *
 * @package Global
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function global_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	require_once get_template_directory() . '/inc/wp-customize-class.php';

    //----------------Header Option Panel-----------------

    $wp_customize->add_panel( 'global_header_option', array(
        'capability' 		  => 'edit_theme_options',
        'priority' 			  => 15,
        'title'				  => esc_html__( 'Header', 'global' ),
    ) );

    //top header section
    $wp_customize->add_section( 'global_top_nav_section', array(
        'priority'          	 =>  1,
        'title'             	 =>  esc_html__('Top Header', 'global'),
        'panel'             	 =>  'global_header_option'
    ) );

    $wp_customize->add_setting( 'global_tav_nav_first_heading', array(
        'sanitize_callback'	     =>  'global_sanitize_text'
    ) );

    $wp_customize->add_control(new Global_Customize_Heading($wp_customize, 'global_tav_nav_first_heading', array(
        'settings'		=> 'global_tav_nav_first_heading',
        'section'		=> 'global_top_nav_section',
        'label'			=> esc_html__( ' Notice Options ', 'global' ),
    ) ) );

    $wp_customize->add_setting( 'global_top_nav_checkbox', array(
        'default' 				 =>  '',
        'capability' 			 =>  'edit_theme_options',
        'sanitize_callback' 	 =>  'global_checkbox_sanitize'
    ) );

    $wp_customize->add_control( 'global_top_nav_checkbox', array(
        'type' 				     =>  'checkbox',
        'label' 			     =>  esc_html__( 'Enable Top Header', 'global' ),
        'settings' 			     =>  'global_top_nav_checkbox',
        'section' 			     =>  'global_top_nav_section',
    ) );

    $wp_customize->add_setting( 'global_date_checkbox', array(
        'default' 				 =>  '',
        'capability' 			 =>  'edit_theme_options',
        'sanitize_callback' 	 =>  'global_checkbox_sanitize'
    ) );

    $wp_customize->add_control( 'global_date_checkbox', array(
        'type' 				     =>  'checkbox',
        'label' 			     =>  esc_html__( 'Enable Date', 'global' ),
        'settings' 			     =>  'global_date_checkbox',
        'section' 			     =>  'global_top_nav_section',
    ) );

    $wp_customize->add_setting( 'global_notice_title', array(
        'default'                =>  'Notice Board',
        'capability'             =>  'edit_theme_options',
        'sanitize_callback'	     =>  'global_sanitize_text'
    ) );

    $wp_customize->add_control( 'global_notice_title', array(
        'type' 				     =>  'text',
        'label'                  =>  esc_html__('Notice Title', 'global'),
        'settings' 			     =>  'global_notice_title',
        'section'                =>  'global_top_nav_section',
    ) );

    $wp_customize->add_setting( 'global_tav_nav_second_heading', array(
        'sanitize_callback'	     =>  'global_sanitize_text'
    ) );

    $wp_customize->add_control( new Global_Customize_Heading($wp_customize, 'global_tav_nav_second_heading', array(
        'settings'		        => 'global_tav_nav_second_heading',
        'section'		        => 'global_top_nav_section',
        'label'			        => esc_html__( ' Social Link Option ', 'global' ),
    ) ) );

    $wp_customize->add_setting( 'global_social_link_checkbox', array(
        'default' 				 =>  '',
        'capability' 			 =>  'edit_theme_options',
        'sanitize_callback' 	 =>  'global_checkbox_sanitize'
    ) );

    $wp_customize->add_control( 'global_social_link_checkbox', array(
        'type' 				     =>  'checkbox',
        'label' 			     =>  esc_html__( 'Enable Social Link', 'global' ),
        'settings' 			     =>  'global_social_link_checkbox',
        'section' 			     =>  'global_top_nav_section',
    ) );

    $wp_customize->add_setting( 'global_facebook_link', array(
        'default'			    => 'https://facebook.com',
        'sanitize_callback'     => 'esc_url_raw'
    ) );

    $wp_customize->add_control( 'global_facebook_link', array(
        'settings'		        => 'global_facebook_link',
        'section'		        => 'global_top_nav_section',
        'type'			        => 'url',
        'label'	                => esc_html__( 'Facebook Url', 'global' )
    ) );

    $wp_customize->add_setting( 'global_twitter_link', array(
        'default'			    => 'https://twitter.com',
        'sanitize_callback'     => 'esc_url_raw'
    ) );

    $wp_customize->add_control( 'global_twitter_link', array(
        'settings'		        => 'global_twitter_link',
        'section'		        => 'global_top_nav_section',
        'type'			        => 'url',
        'label'	                => esc_html__( 'Twitter Url', 'global' )
    ) );

    $wp_customize->add_setting( 'global_google_plus_link',array(
        'default'			    => 'https://googleplus.com',
        'sanitize_callback'     => 'esc_url_raw'
    ) );

    $wp_customize->add_control( 'global_google_plus_link', array(
        'settings'		        => 'global_google_plus_link',
        'section'		        => 'global_top_nav_section',
        'type'			        => 'url',
        'label'	                => esc_html__( 'GooglePlus Url', 'global' )
    ) );

    $wp_customize->add_setting( 'global_youtube_link',array(
        'default'			    => 'https://youtube.com',
        'sanitize_callback'     => 'esc_url_raw'
    ) );

    $wp_customize->add_control( 'global_youtube_link', array(
        'settings'		        => 'global_youtube_link',
        'section'		        => 'global_top_nav_section',
        'type'			        => 'url',
        'label'	                => esc_html__( 'Youtube Url', 'global' )
    ) );

    $wp_customize->add_setting( 'global_instagram_link',array(
        'default'			    => 'https://instagram.com',
        'sanitize_callback'     => 'esc_url_raw'
    ) );

    $wp_customize->add_control( 'global_instagram_link', array(
        'settings'		        => 'global_instagram_link',
        'section'		        => 'global_top_nav_section',
        'type'			        => 'url',
        'label'	                => esc_html__( 'Instagram Url', 'global' )
    ) );

    $wp_customize->add_setting( 'global_linkedin_link',array(
        'default'			    => 'https://linkedin.com',
        'sanitize_callback'     => 'esc_url_raw'
    ) );

    $wp_customize->add_control( 'global_linkedin_link', array(
        'settings'		        => 'global_linkedin_link',
        'section'		        => 'global_top_nav_section',
        'type'			        => 'url',
        'label'	                => esc_html__( 'Linkedin Url', 'global' )
    ) );

    $wp_customize->add_setting( 'global_pinterest_link',array(
        'default'			    => 'https://pinterest.com',
        'sanitize_callback'     => 'esc_url_raw'
    ) );

    $wp_customize->add_control( 'global_pinterest_link', array(
        'settings'		        => 'global_pinterest_link',
        'section'		        => 'global_top_nav_section',
        'type'			        => 'url',
        'label'	                => esc_html__( 'Pinterest Url', 'global' )
    ) );

    $wp_customize->add_setting( 'global_tumblr_link',array(
        'default'			    => 'https://tumblr.com',
        'sanitize_callback'     => 'esc_url_raw'
    ) );

    $wp_customize->add_control( 'global_tumblr_link', array(
        'settings'		        => 'global_tumblr_link',
        'section'		        => 'global_top_nav_section',
        'type'			        => 'url',
        'label'	                => esc_html__( 'Tumblr Url', 'global' )
    ) );

    $wp_customize->add_setting( 'global_tav_nav_third_heading', array(
        'sanitize_callback'	     =>  'global_sanitize_text'
    ) );

    $wp_customize->add_control( new Global_Customize_Heading($wp_customize, 'global_tav_nav_third_heading', array(
        'settings'		        => 'global_tav_nav_third_heading',
        'section'		        => 'global_top_nav_section',
        'label'			        => esc_html__( ' Search Option ', 'global' ),
    ) ) );

    $wp_customize->add_setting( 'global_search_checkbox', array(
        'default' 				 =>  '',
        'capability' 			 =>  'edit_theme_options',
        'sanitize_callback' 	 =>  'global_checkbox_sanitize'
    ) );

    $wp_customize->add_control( 'global_search_checkbox', array(
        'type' 				     =>  'checkbox',
        'label' 			     =>  esc_html__( 'Enable Search', 'global' ),
        'settings' 			     =>  'global_search_checkbox',
        'section' 			     =>  'global_top_nav_section',
    ) );

    $wp_customize->get_section( 'title_tagline'  )->panel  = 'global_header_option';

    $wp_customize->get_section( 'header_image' )->panel  = 'global_header_option';

    // logo and site title position options
    $wp_customize->add_setting( 'global_header_logo_placement', array(
        'default'               =>  'header_text_only',
        'capability'            =>  'edit_theme_options',
        'sanitize_callback'     =>  'global_sanitize_radio'
    ) );

    $wp_customize->add_control( 'global_header_logo_placement', array(
        'type'                  =>  'radio',
        'priority'              =>  20,
        'label'                 =>  esc_html__('Choose the option that you want from below.', 'global'),
        'setting'               =>  'global_header_logo_placement',
        'section'               =>  'title_tagline',
        'choices'               =>  array(
            'header_logo_only'  =>  esc_html__('Header Logo Only', 'global'),
            'header_text_only'  =>  esc_html__('Header Text Only', 'global'),
            'show_both'         =>  esc_html__('Show Both', 'global'),
            'disable'           =>  esc_html__('Disable', 'global')
        ) ) );

    //sticky menu
    $wp_customize->add_section( 'global_sticky_menu_section', array(
        'priority'          	 =>  25,
        'title'             	 =>  esc_html__('Sticky Menu', 'global'),
        'panel'             	 =>  'global_header_option'
    ) );

    $wp_customize->add_setting( 'global_sticky_menu', array(
        'default' 				 =>  '',
        'capability' 			 =>  'edit_theme_options',
        'sanitize_callback' 	 =>  'global_checkbox_sanitize'
    ) );

    $wp_customize->add_control( 'global_sticky_menu', array(
        'type' 				     =>  'checkbox',
        'label' 			     =>  esc_html__( 'Disable Sticky Menu', 'global' ),
        'settings' 			     =>  'global_sticky_menu',
        'section' 			     =>  'global_sticky_menu_section'
    ) );

	//General Option---
	$wp_customize->add_panel( 'general_panel', array(
		'capability' 		  =>  'edit_theme_options',
		'priority' 			  =>  10,
		'title'				  =>  esc_html__( 'General', 'global' ),
	) );

	// Breadcrumbs
	$wp_customize->add_section( 'global_breadcrumbs_activate_settings', array(
        'priority'              =>  1,
        'title'                 =>  esc_html__('Activate Breadcrumbs', 'global'),
        'panel'                 =>  'general_panel'
	) );

	$wp_customize->add_setting( 'global_breadcrumbs_activate', array(
        'default'               => 1,
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'global_checkbox_sanitize'
	) );

	$wp_customize->add_control( 'global_breadcrumbs_activate', array(
        'type'                  =>  'checkbox',
        'label'                 =>  esc_html__('Check to activate breadcrumbs', 'global'),
        'section'               =>  'global_breadcrumbs_activate_settings',
        'settings'              =>  'global_breadcrumbs_activate'
	) );

	$wp_customize->add_section( 'global_default_sidebar_section', array(
        'priority'              =>  15,
        'title'                 =>  esc_html__('Default Sidebar Settings', 'global'),
        'panel'                 =>  'general_panel'
	) );

	$wp_customize->add_setting( 'global_default_sidebar_setting', array(
        'default'               =>  esc_html__('right-sidebar', 'global'),
        'capability'            =>  'edit_theme_options',
        'sanitize_callback'     =>  'global_sanitize_text'
	) );

	$wp_customize->add_control( new Global_Image_Radio_Control($wp_customize, 'global_default_sidebar_setting', array(
        'type'                  =>  'radio',
        'label'                 =>  esc_html__('Select default layout for default pages.', 'global'),
        'section'               =>  'global_default_sidebar_section',
        'settings'              =>  'global_default_sidebar_setting',
        'choices'               =>  array(
            'right-sidebar'               =>  global_IMAGES_ADMIN_URL . '/right-sidebar.png',
            'left-sidebar'                =>  global_IMAGES_ADMIN_URL . '/left-sidebar.png',
            'no-sidebar-content-centered' =>  global_IMAGES_ADMIN_URL . '/no-sidebar-content-centered-layout.png',
            'no-sidebar-full-width'       =>  global_IMAGES_ADMIN_URL . '/no-sidebar-full-width-layout.png'
        ) ) ) );

	// site layout setting
	$wp_customize->add_section( 'global_site_layout_section', array(
        'priority'              =>  20,
        'title'                 =>  esc_html__( 'Site Layout', 'global' ),
        'panel'                 =>  'general_panel'
	) );

	$wp_customize->add_setting( 'global_site_layout', array(
        'default'               =>  'wide',
        'capability'            =>  'edit_theme_options',
        'sanitize_callback'     =>  'global_sanitize_radio'
	) );

	$wp_customize->add_control( 'global_site_layout', array(
        'type'                 =>  'radio',
        'priority'             =>  10,
        'label'                =>  esc_html__('Choose your site layout. The change is reflected in whole site.', 'global'),
        'section'              =>  'global_site_layout_section',
        'setting'              =>  'global_site_layout',
        'choices'              =>  array(
            'box'              =>  esc_html__('Boxed layout', 'global'),
            'wide'             =>  esc_html__('Wide layout', 'global')
    ) ) );

    //--------------Front Page Option Panel--------------

    $wp_customize->add_panel( 'global_front_page_option', array(
        'capability' 		  => 'edit_theme_options',
        'priority' 			  => 15,
        'title'				  => esc_html__( 'Front Page ', 'global' ),
    ) );

    //banner section
	$wp_customize->add_section( 'global_banner_section', array(
        'priority'          	=>  5,
        'title'             	=>  esc_html__('Main Slider ', 'global'),
        'panel'                 => 'global_front_page_option'
	) );

    $wp_customize->add_setting( 'global_banner_heading', array(
        'sanitize_callback'	     =>  'global_sanitize_text'
    ) );

    $wp_customize->add_control( new Global_Customize_Heading($wp_customize, 'global_banner_heading', array(
        'settings'		        => 'global_banner_heading',
        'section'		        => 'global_banner_section',
        'label'			        => esc_html__( 'Banner Title & Page', 'global' ),
        'priority'              =>  1
    ) ) );

	$wp_customize->add_setting( 'global_banner_checkbox', array(
        'default' 				=>  '',
        'capability' 			=>  'edit_theme_options',
        'sanitize_callback' 	=>  'global_checkbox_sanitize'
	) );

	$wp_customize->add_control( 'global_banner_checkbox', array(
        'type' 				    =>  'checkbox',
        'label' 			    =>  esc_html__( 'Enable slider', 'global' ),
        'settings' 			    =>  'global_banner_checkbox',
        'section' 			    =>  'global_banner_section',
         'priority'             =>  4
	) );

    for( $i = 1; $i <= 4; $i++ ) {
        $wp_customize->add_setting( 'global_slide'.$i, array(
            'capability'            => 'edit_theme_options',
            'sanitize_callback'     => 'global_sanitize_integer'
        ) );

        $wp_customize->add_control( 'global_slide'.$i, array(
            'label'                 =>  esc_html__( 'Slide' , 'global' ).$i,
            'section'               =>  'global_banner_section',
            'settings'              =>  'global_slide'.$i,
            'type'                  =>  'dropdown-pages',
            'priority'              =>  $i+5
        ) );
    }

    $wp_customize->add_setting( 'global_read_more_button', array(
        'default'                =>  'Read More',
        'capability'             =>  'edit_theme_options',
        'sanitize_callback'	     =>  'global_sanitize_text'
	) );

	$wp_customize->add_control( 'global_read_more_button', array(
        'type' 				     =>  'text',
        'label'                  =>  esc_html__('Type to change the  button text learn more.', 'global'),
        'settings' 			     =>  'global_read_more_button',
        'section'                =>  'global_banner_section',
        'priority'               =>  20
	) );

    //featured page section
    $wp_customize->add_section( 'global_featured_page_section', array(
        'priority'          	 =>  15,
        'title'             	 =>  esc_html__(' Featured Page ', 'global'),
        'panel'                  => 'global_front_page_option'
    ) );

    $wp_customize->add_setting( 'global_featured_page_heading', array(
        'sanitize_callback'	     =>  'global_sanitize_text'
    ) );

    $wp_customize->add_control( new Global_Customize_Heading($wp_customize, 'global_featured_page_heading', array(
        'settings'		        => 'global_featured_page_heading',
        'section'		        => 'global_featured_page_section',
        'label'			        => esc_html__( 'Featured Title & Page', 'global' ),
        'priority'              =>  1
    ) ) );

    $wp_customize->add_setting( 'global_featured_page_checkbox', array(
        'default' 				=>  '',
        'capability' 			=>  'edit_theme_options',
        'sanitize_callback' 	=>  'global_checkbox_sanitize'
    ) );

    $wp_customize->add_control( 'global_featured_page_checkbox', array(
        'type' 				    =>  'checkbox',
        'label' 			    =>  esc_html__( 'Enable Featured Page', 'global' ),
        'settings' 			    =>  'global_featured_page_checkbox',
        'section' 			    =>  'global_featured_page_section',
        'priority'              =>  4
    ) );

    $wp_customize->add_setting( 'global_feature_page', array(
        'default'               => '',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'global_sanitize_integer'
    ) );

    $wp_customize->add_control( 'global_feature_page', array(
        'label'                 => esc_html__( 'Add Page here ' , 'global' ),
        'section'               => 'global_featured_page_section',
        'type'                  => 'dropdown-pages',
    ) );

    //call to action
    $wp_customize->add_section( 'global_call_to_action_section', array(
        'priority'          	 =>  20,
        'title'             	 =>  esc_html__(' Call To Page ', 'global'),
        'panel'                  => 'global_front_page_option'
    ) );

    $wp_customize->add_setting( 'global_call_to_action_heading', array(
        'sanitize_callback'	     =>  'global_sanitize_text'
    ) );

    $wp_customize->add_control( new Global_Customize_Heading($wp_customize, 'global_call_to_action_heading', array(
        'settings'		        => 'global_call_to_action_heading',
        'section'		        => 'global_call_to_action_section',
        'label'			        => esc_html__( 'Call to Page Option', 'global' ),
        'priority'              =>  1
    ) ) );

    $wp_customize->add_setting( 'global_call_to_action_checkbox', array(
        'default' 				=>  '',
        'capability' 			=>  'edit_theme_options',
        'sanitize_callback' 	=>  'global_checkbox_sanitize'
    ) );

    $wp_customize->add_control( 'global_call_to_action_checkbox', array(
        'type' 				    =>  'checkbox',
        'label' 			    =>  esc_html__( 'Enable Call To Page', 'global' ),
        'settings' 			    =>  'global_call_to_action_checkbox',
        'section' 			    =>  'global_call_to_action_section',
        'priority'              =>  4
    ) );

    $wp_customize->add_setting('global_call_to_page', array(
        'default'            => '',
        'capability'         => 'edit_theme_options',
        'sanitize_callback'  => 'global_sanitize_integer'
    ) );

    $wp_customize->add_control('global_call_to_page',
        array(
            'label'    => esc_html__( 'Call To Action ' , 'global' ),
            'section'  => 'global_call_to_action_section',
            'setting'  => 'global_call_to_page',
            'type'     => 'dropdown-pages',
        )
    );


    // our service section
    $wp_customize->add_section( 'global_service_page_section', array(
        'priority'          	 =>  20,
        'title'             	 =>  esc_html__(' Services ', 'global'),
        'panel'                  => 'global_front_page_option'
    ) );

    $wp_customize->add_setting( 'global_service_header', array(
        'sanitize_callback'	     =>  'global_sanitize_text'
    ) );

    $wp_customize->add_control(new Global_Customize_Heading($wp_customize, 'global_service_header', array(
        'settings'		=> 'global_service_header',
        'section'		=> 'global_service_page_section',
        'label'			=> esc_html__( 'Title, Button text & Enable Option', 'global' ),
        'priority'               =>  1
    ) ) );

    $wp_customize->add_setting( 'global_service_checkbox', array(
        'default' 				=>  '',
        'capability' 			=>  'edit_theme_options',
        'sanitize_callback' 	=>  'global_checkbox_sanitize'
    ) );

    $wp_customize->add_control( 'global_service_checkbox', array(
        'type' 				    =>  'checkbox',
        'label' 			    =>  esc_html__( 'Enable Service', 'global' ),
        'settings' 			    =>  'global_service_checkbox',
        'section' 			    =>  'global_service_page_section',
        'priority'              =>  2
    ) );

    $wp_customize->add_setting( 'global_service_page_title', array(
        'capability'             =>  'edit_theme_options',
        'sanitize_callback'	     =>  'global_sanitize_text'
    ) );

    $wp_customize->add_control( 'global_service_page_title', array(
        'type' 				     =>  'text',
        'label'                  =>  esc_html__('Title.', 'global'),
        'settings' 			     =>  'global_service_page_title',
        'section'                =>  'global_service_page_section',
        'priority'               =>  3
    ) );

    $wp_customize->add_setting( 'global_service_page_button', array(
        'capability'             =>  'edit_theme_options',
        'sanitize_callback'	     =>  'global_sanitize_text'
    ) );

    $wp_customize->add_control( 'global_service_page_button', array(
        'type' 				     =>  'text',
        'label'                  =>  esc_html__('Button text', 'global'),
        'settings' 			     =>  'global_service_page_button',
        'section'                =>  'global_service_page_section',
        'priority'               =>  4
    ) );


    for( $i = 1; $i <= 6; $i++ ) {

        $wp_customize->add_setting( 'global_service_page_header'.$i, array(
            'sanitize_callback'	     =>  'global_sanitize_text'
        ) );

        $wp_customize->add_control(new Global_Customize_Heading($wp_customize, 'global_service_page_header '.$i, array(
            'label'			=> esc_html__( 'Page & Icon Option', 'global' ).$i,
            'settings'		=> 'global_service_page_header'.$i,
            'section'		=> 'global_service_page_section',
            'priority'      =>  $i+5
        ) ) );

        $wp_customize->add_setting('global_service_icon'.$i.'', array(
            'default' => 'fa fa-heart',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'global_sanitize_text',
            'transport' => 'postMessage'
        ));
        //Icon link
        $link_url = esc_url( 'http://fontawesome.io/cheatsheet/' );
        $link = 'Select object icon <a href="'.$link_url.'" target="_blank">from here</a>';

        $wp_customize->add_control( 'global_service_icon'.$i.'', array(
            'type' => 'text',
            'label' => esc_html__( ' Service icon', 'global').$i,
            'description' => $link,
            'section' => 'global_service_page_section',
            'setting' => 'global_service_icon'.$i.'',
            'priority'      =>  $i+5
        ));

        $wp_customize->add_setting('global_service_page'.$i, array(
                'default'            => '',
                'capability'         => 'edit_theme_options',
                'sanitize_callback'  => 'global_sanitize_integer'
        ) );

        $wp_customize->add_control( 'global_service_page'.$i, array(
                'label'    => esc_html__( 'Add Page here ' , 'global' ).$i,
                'section'  => 'global_service_page_section',
                'setting' => 'global_service_page'.$i,
                'type'     => 'dropdown-pages',
                'priority' =>  $i+5
        ) );
    }

    //portfolio section
    $wp_customize->add_section( 'global_portfolio_section', array(
        'priority'          	 =>  25,
        'title'             	 =>  esc_html__(' Portfolio ', 'global'),
        'panel'                  => 'global_front_page_option'
    ) );

    $wp_customize->add_setting( 'global_portfolio_heading', array(
        'sanitize_callback'	     =>  'global_sanitize_text'
    ) );

    $wp_customize->add_control( new Global_Customize_Heading($wp_customize, 'global_portfolio_heading', array(
        'settings'		        => 'global_portfolio_heading',
        'section'		        => 'global_portfolio_section',
        'label'			        => esc_html__( 'Portfolio Option', 'global' ),
        'priority'              =>  1
    ) ) );

    $wp_customize->add_setting( 'global_portfolio_checkbox', array(
        'default' 				=>  '',
        'capability' 			=>  'edit_theme_options',
        'sanitize_callback' 	=>  'global_checkbox_sanitize'
    ) );

    $wp_customize->add_control( 'global_portfolio_checkbox', array(
        'type' 				    =>  'checkbox',
        'label' 			    =>  esc_html__( 'Enable Portfolio', 'global' ),
        'settings' 			    =>  'global_portfolio_checkbox',
        'section' 			    =>  'global_portfolio_section',
        'priority'              =>  4
    ) );

    $wp_customize->add_setting( 'global_portfolio_title', array(
        'capability'             =>  'edit_theme_options',
        'sanitize_callback'	     =>  'global_sanitize_text'
    ) );

    $wp_customize->add_control( 'global_portfolio_title', array(
        'type' 				     =>  'text',
        'label'                  =>  esc_html__('Type to change the  title of portfolio.', 'global'),
        'settings' 			     =>  'global_portfolio_title',
        'section'                =>  'global_portfolio_section',
        'priority'               =>  5
    ) );

    $wp_customize->add_setting( 'global_portfolio_category', array(
        'default'             =>  '',
        'capability'          =>  'edit_theme_options',
        'sanitize_callback'   =>  'global_sanitize_text'
    ) );

    $wp_customize->add_control( new Global_Category_Dropdown_Custom_Control($wp_customize, 'global_portfolio_category', array(
        'label'                =>  esc_html__('Choose category for Protoflio.', 'global'),
        'settings' 			   =>  'global_portfolio_category',
        'section'              =>  'global_portfolio_section',
        'priority'             =>  10
    ) ) );

    $wp_customize->add_setting(	'global_portfolio_no_of_posts', array(
        'default' 			   =>  '6',
        'capability' 		   =>  'edit_theme_options',
        'sanitize_callback'	   =>  'global_sanitize_integer'
    ) );

    $wp_customize->add_control(	'global_portfolio_no_of_posts', array(
        'type'                  =>  'radio',
        'priority'              =>  20,
        'label'                 =>  esc_html__('Blog number of posts.', 'global'),
        'settings' 			   =>  'global_portfolio_no_of_posts',
        'section' 			   =>  'global_portfolio_section',
        'choices'               =>  array(
            6  =>  esc_html__('6 Post', 'global'),
            9  =>  esc_html__('9 Post', 'global'),
        ) ) );

    //team section
    $wp_customize->add_section( 'global_team_section', array(
        'title'             	 =>  esc_html__(' Team ', 'global'),
        'panel'                  => 'global_front_page_option',
        'priority'          	 =>  30
    ) );

    $wp_customize->add_setting( 'global_team_title_heading', array(
        'sanitize_callback'	     =>  'global_sanitize_text'
    ) );

    $wp_customize->add_control( new Global_Customize_Heading($wp_customize, 'global_team_title_heading', array(
        'settings'		        => 'global_team_title_heading',
        'section'		        => 'global_team_section',
        'label'			        => esc_html__( 'Title & Enable Option', 'global' ),
        'priority'          	=>  1,
    ) ) );

    $wp_customize->add_setting( 'global_team_checkbox', array(
        'default' 				=>  '',
        'capability' 			=>  'edit_theme_options',
        'sanitize_callback' 	=>  'global_checkbox_sanitize'
    ) );

    $wp_customize->add_control( 'global_team_checkbox', array(
        'type' 				    =>  'checkbox',
        'label' 			    =>  esc_html__( 'Enable Team Member', 'global' ),
        'settings' 			    =>  'global_team_checkbox',
        'section' 			    =>  'global_team_section',
        'priority'              =>  4
    ) );

    $wp_customize->add_setting( 'global_team_title', array(
        'capability'             =>  'edit_theme_options',
        'sanitize_callback'	     =>  'global_sanitize_text'
    ) );

    $wp_customize->add_control( 'global_team_title', array(
        'type' 				     =>  'text',
        'label'                  =>  esc_html__('Change Team title', 'global'),
        'settings' 			     =>  'global_team_title',
        'section'                =>  'global_team_section',
    ) );


    for( $i = 1; $i <= 6; $i++ ) {

        $wp_customize->add_setting( 'global_team_member_heading'.$i, array(
            'sanitize_callback'	     =>  'global_sanitize_text'
        ) );

        $wp_customize->add_control(new Global_Customize_Heading($wp_customize, 'global_team_member_heading'.$i, array(
            'settings'		=> 'global_team_member_heading'.$i,
            'section'		=> 'global_team_section',
            'label'			=> esc_html__( 'Team Member ', 'global' ).$i,
        ) ) );

        $wp_customize->add_setting('global_team_designation'.$i,
            array(
                'sanitize_callback' => 'global_sanitize_text'
            )
        );

        $wp_customize->add_control(
            'global_team_designation'.$i,
            array(
                'settings'		=> 'global_team_designation'.$i,
                'section'		=> 'global_team_section',
                'type'			=> 'text',
                'label'			=> esc_html__( 'Team Member Designation', 'global' )
            ));

        $wp_customize->add_setting('global_page_team_member'.$i, array(
                'default'            => '',
                'capability'         => 'edit_theme_options',
                'sanitize_callback'  => 'global_sanitize_integer'
            )
        );

        $wp_customize->add_control('global_page_team_member'.$i,
            array(
                'label'    => esc_html__( 'Choose Page For Team' , 'global' ).$i,
                'section'  => 'global_team_section',
                'setting'  => 'global_page_team_member'.$i,
                'type'     => 'dropdown-pages',
            )
        );

        $wp_customize->add_setting('global_team_facebook'.$i,
            array(
                'default'			=> 'https://facebook.com',
                'sanitize_callback' => 'esc_url_raw'
            )
        );

        $wp_customize->add_control('global_team_facebook'.$i,
            array(
                'settings'		=> 'global_team_facebook'.$i,
                'section'		=> 'global_team_section',
                'type'			=> 'url',
                'label'	        => esc_html__( 'Facebook Url', 'global' )
            )
        );

        $wp_customize->add_setting('global_team_twitter'.$i,
            array(
                'default'			=> 'https://twitter.com',
                'sanitize_callback' => 'esc_url_raw'
            )
        );

        $wp_customize->add_control('global_team_twitter'.$i,
            array(
                'settings'		=> 'global_team_twitter'.$i,
                'section'		=> 'global_team_section',
                'type'			=> 'url',
                'label'	        => esc_html__( 'Twitter Url', 'global' )
            )
        );

        $wp_customize->add_setting('global_team_google_plus'.$i,
            array(
                'default'			=> 'https://googleplus.com',
                'sanitize_callback' => 'esc_url_raw'
            )
        );

        $wp_customize->add_control('global_team_google_plus'.$i,
            array(
                'settings'		=> 'global_team_google_plus'.$i,
                'section'		=> 'global_team_section',
                'type'			=> 'url',
                'label'	        => esc_html__( 'GooglePlus Url', 'global' )
            )
        );

    }

    //blog section
    $wp_customize->add_section( 'global_blog_section', array(
        'priority'          	 =>  40,
        'title'             	 =>  esc_html__(' Blog ', 'global'),
        'panel'                  => 'global_front_page_option'
    ) );

    $wp_customize->add_setting( 'global_blog_heading', array(
        'sanitize_callback'	     =>  'global_sanitize_text'
    ) );

    $wp_customize->add_control( new Global_Customize_Heading($wp_customize, 'global_blog_heading', array(
        'settings'		        => 'global_blog_heading',
        'section'		        => 'global_blog_section',
        'label'			        => esc_html__( 'Blog Option', 'global' ),
        'priority'              =>  1
    ) ) );

    $wp_customize->add_setting( 'global_blog_checkbox', array(
        'default' 				=>  '',
        'capability' 			=>  'edit_theme_options',
        'sanitize_callback' 	=>  'global_checkbox_sanitize'
    ) );

    $wp_customize->add_control( 'global_blog_checkbox', array(
        'type' 				    =>  'checkbox',
        'label' 			    =>  esc_html__( 'Enable Blog', 'global' ),
        'settings' 			    =>  'global_blog_checkbox',
        'section' 			    =>  'global_blog_section',
        'priority'              =>  4
    ) );

    $wp_customize->add_setting( 'global_blog_title', array(
        'capability'             =>  'edit_theme_options',
        'sanitize_callback'	     =>  'global_sanitize_text'
    ) );

    $wp_customize->add_control( 'global_blog_title', array(
        'type' 				     =>  'text',
        'label'                  =>  esc_html__('Type to change the  title of blog.', 'global'),
        'settings' 			     =>  'global_blog_title',
        'section'                =>  'global_blog_section',
        'priority'               =>  5
    ) );

    $wp_customize->add_setting( 'global_blog_category', array(
        'default'             =>  '',
        'capability'          =>  'edit_theme_options',
        'sanitize_callback'   =>  'global_sanitize_text'
    ) );

    $wp_customize->add_control( new Global_Category_Dropdown_Custom_Control($wp_customize, 'global_blog_category', array(
        'label'                =>  esc_html__('Choose category for Blog.', 'global'),
        'settings' 			   =>  'global_blog_category',
        'section'              =>  'global_blog_section',
        'priority'             =>  10
    ) ) );

    $wp_customize->add_setting(	'global_blog_no_of_posts', array(
        'default' 			   =>  3,
        'capability' 		   =>  'edit_theme_options',
        'sanitize_callback'	   =>  'global_sanitize_integer'
    ) );

    $wp_customize->add_control(	'global_blog_no_of_posts', array(
        'type'                  =>  'radio',
        'priority'              =>  20,
        'label'                 =>  esc_html__('Blog number of posts.', 'global'),
        'settings' 			   =>  'global_blog_no_of_posts',
        'section' 			   =>  'global_blog_section',
        'choices'               =>  array(
            3  =>  esc_html__('3 Post', 'global'),
            6  =>  esc_html__('6 Post', 'global'),
            9  =>  esc_html__('9 Post', 'global'),
        ) ) );

    //global counter
    $wp_customize->add_section( 'global_counter_section', array(
        'title'             	 =>  esc_html__(' Counter ', 'global'),
        'panel'                  => 'global_front_page_option',
        'priority'          	 =>  25
    ) );

    $wp_customize->add_setting( 'global_counter_heading', array(
        'sanitize_callback'	     =>  'global_sanitize_text'
    ) );

    $wp_customize->add_control( new Global_Customize_Heading($wp_customize, 'global_counter_heading', array(
        'settings'		        => 'global_counter_heading',
        'section'		        => 'global_counter_section',
        'label'			        => esc_html__( 'Section background image and enable option ', 'global' ),
        'priority'          	=>  1,
    ) ) );

    $wp_customize->add_setting( 'global_counter_checkbox', array(
        'default' 				=>  '',
        'capability' 			=>  'edit_theme_options',
        'sanitize_callback' 	=>  'global_checkbox_sanitize'
    ) );

    $wp_customize->add_control( 'global_counter_checkbox', array(
        'type' 				    =>  'checkbox',
        'label' 			    =>  esc_html__( 'Enable Counter', 'global' ),
        'settings' 			    =>  'global_counter_checkbox',
        'section' 			    =>  'global_counter_section',
        'priority'              =>  4
    ) );

    $wp_customize->add_setting( 'global_background_image', array(
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'esc_url_raw'
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'global_background_image', array(
        'label'                 => esc_html__('Upload background  image for counter', 'global'),
        'section'               => 'global_counter_section',
        'settings'              => 'global_background_image',
    ) ) );

    for($i=1; $i <= 4; $i++ ){
        $wp_customize->add_setting( 'global_counter_heading'.$i, array(
            'sanitize_callback'	     =>  'global_sanitize_text'
        ) );

        $wp_customize->add_control( new Global_Customize_Heading($wp_customize, 'global_counter_heading'.$i, array(
            'settings'		        => 'global_counter_heading'.$i,
            'section'		        => 'global_counter_section',
            'label'			        => esc_html__( 'Counter Option ', 'global' ).$i,
        ) ) );

        $wp_customize->add_setting( 'global_counter'.$i.'_title', array(
            'capability'             =>  'edit_theme_options',
            'sanitize_callback'	     =>  'global_sanitize_text'
        ) );

        $wp_customize->add_control( 'global_counter'.$i.'_title', array(
            'type' 				     =>  'text',
            'label'                  =>  esc_html__('Counter Title ', 'global').$i,
            'settings' 			     =>  'global_counter'.$i.'_title',
            'section'                =>  'global_counter_section',
        ) );
        $wp_customize->add_setting( 'global_counter_value'.$i.'_title', array(
            'capability'             =>  'edit_theme_options',
            'sanitize_callback' => 'absint'
        ) );

        $wp_customize->add_control( 'global_counter_value'.$i.'_title', array(
            'type' 				     =>  'number',
            'label'                  =>  esc_html__('Counter Value', 'global').$i,
            'settings' 			     =>  'global_counter_value'.$i.'_title',
            'section'                =>  'global_counter_section',
        ) );

        $wp_customize->add_setting('global_counter_icon'.$i.'', array(
            'default' => 'fa fa-heart',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'global_sanitize_text',
            'transport' => 'postMessage'
        ));
        //Icon link
        $link_url = esc_url( 'http://fontawesome.io/cheatsheet/' );
        $link = 'Select object icon <a href="'.$link_url.'" target="_blank">from here</a>';

        $wp_customize->add_control( 'global_counter_icon'.$i.'', array(
            'type' => 'text',
            'label' => esc_html__( 'Counter icon', 'global').$i,
            'description' => $link,
            'section' => 'global_counter_section',
            'setting' => 'global_counter_icon'.$i.'',
        ));
    }


	//footer option---
	$wp_customize->add_panel( 'global_footer_option',	array(
		'capabitity'      	   =>  'edit_theme_options',
		'description'    	   =>  esc_html__('Footer options settings here', 'global'),
		'priority' 		 	   =>  25,
		'title' 		 	   =>  esc_html__( 'Footer', 'global' )
	) );




	// Footer Background Color Setting
	$wp_customize->add_section( 'global_footer_background_color_section', array(
        'priority'          	=>  10,
        'title'             	=>  esc_html__('Background Color', 'global'),
        'panel'                 => 'global_footer_option'
	) );

	$wp_customize->add_setting( 'global_footer_background_color',array(
        'default'               => '#141414',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'global_hex_color_sanitize',
        'sanitize_js_callback'  => 'global_color_escaping_sanitize'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'global_footer_background_color',array(
        'label'                 => esc_html__( 'Choose a background color for footer', 'global' ),
        'section'               => 'global_footer_background_color_section',
        'setting'               => 'global_footer_background_color'
	) ) );

	//contact option---
	$wp_customize->add_section( 'global_contact_section', array(
        'priority'              =>  30,
        'title'                 =>  esc_html__('Contact Us', 'global'),
	));

	$wp_customize->add_setting( 'global_contact_title', array(
        'default'               =>  '',
        'capability'            =>  'edit_theme_options',
        'sanitize_callback'     =>  'sanitize_text_field'
	));

	$wp_customize->add_control( 'global_contact_title', array(
        'type'                  =>  'text',
        'label'                 =>  esc_html__('Contact form title', 'global'),
        'section'               =>  'global_contact_section',
        'settings'              =>  'global_contact_title'
	));

	// contact us google map
	$wp_customize->add_setting( 'global_contact_map', array(
        'default'               =>  '',
        'capability'            =>  'edit_theme_options',
        'sanitize_callback'     =>  'global_sanitize_googlemaps'
	));

	$wp_customize->add_control( 'global_contact_map', array(
        'type'                  =>  'textarea',
        'label'                 =>  esc_html__('Contact info Map', 'global'),
        'section'               =>  'global_contact_section',
        'settings'              =>  'global_contact_map'
	));

	$wp_customize->add_setting( 'global_contact_shortcode', array(
        'default'                =>  '',
        'capability'             =>  'edit_theme_options',
        'sanitize_callback'      =>  'sanitize_text_field'
	));

	$wp_customize->add_control( 'global_contact_shortcode', array(
        'type'                  => 'text',
        'label'                 => esc_html__('Contact form Short code', 'global'),
        'section'               => 'global_contact_section',
        'settings'              => 'global_contact_shortcode'
	) );




	//Accessories option
	$wp_customize->add_panel( 'global_accessories_option',	array(
		'capabitity'      	   =>  'edit_theme_options',
		'description'    	   =>  esc_html__('Accessories options settings here', 'global'),
		'priority' 		 	   =>  35,
		'title' 		 	   =>  esc_html__( 'Accessories', 'global' )
	) );

    $wp_customize->get_section( 'colors' )->panel  =  'global_accessories_option';

    $wp_customize->get_section( 'background_image'  )->panel  = 'global_accessories_option';

    $wp_customize->get_section( 'static_front_page' )->panel  = 'global_accessories_option';

	$wp_customize->add_section( 'global_accessories_custom_coder_section', array(
		'priority'          	 =>  5,
		'title'             	 =>  esc_html__('Custom Coder', 'global'),
		'panel'             	 =>  'global_accessories_option'
	) );

	$wp_customize->add_setting( 'global_accessories_custom_css_textarea', array(
        'default'                =>  '<style> </style> ',
        'capability'             =>  'edit_theme_options',
        'sanitize_callback'	     =>  'global_sanitize_text'
	) );
	$wp_customize->add_control( 'global_accessories_custom_css_textarea', array(
        'type' 				     =>  'textarea',
        'label'                  =>  esc_html__('Type your custom css.', 'global'),
        'settings' 			     =>  'global_accessories_custom_css_textarea',
        'section'                =>  'global_accessories_custom_coder_section',
	) );

	$wp_customize->add_setting( 'global_accessories_custom_js_textarea', array(
        'default'                =>  '<script> </script>',
        'capability'             =>  'edit_theme_options',
        'sanitize_callback'	     =>  'global_sanitize_text'
	) );
	$wp_customize->add_control( 'global_accessories_custom_js_textarea', array(
        'type' 				     =>  'textarea',
        'label'                  =>  esc_html__('Type your Custom js.', 'global'),
        'settings' 			     =>  'global_accessories_custom_js_textarea',
        'section'                =>  'global_accessories_custom_coder_section',
	) );

    // Sanitize Text
    function global_sanitize_text( $string ) {
        global $allowedtags;
        return wp_kses( $string , $allowedtags );
    }

	//sanitize checkbox function
	function global_checkbox_sanitize( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}

    // Sanitize Integer
    function global_sanitize_integer( $number, $setting ) {
        // Ensure $number is an absolute integer (whole number, zero or greater).
        $number = absint( $number );

        // If the input is an absolute integer, return it; otherwise, return the default
        return ( $number ? $number : $setting->default );
    }

	// radio sanitization
	function global_sanitize_radio($input, $setting)
	{
		// Ensuring that the input is a slug.
		$input = sanitize_key($input);
		// Get the list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control($setting->id)->choices;
		// If the input is a valid key, return it, else, return the default.
		return (array_key_exists($input, $choices) ? $input : $setting->default);
	}

	function global_hex_color_sanitize( $color ) {
		return sanitize_hex_color( $color );
	}
	// Escape Color
	function global_color_escaping_sanitize( $input ) {
		$input = esc_attr($input);
		return $input;
	}

    function global_sanitize_googlemaps($input)
    {
        global $global_allowedposttags;
        $global_allowedposttags_iframe = global_map_allowed_tags($global_allowedposttags);

        $output = wp_kses( $input, $global_allowedposttags_iframe);
        return $output;
    }

}
add_action( 'customize_register', 'global_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function global_customize_preview_js() {
	wp_enqueue_script( 'global_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'global_customize_preview_js' );
