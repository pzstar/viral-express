<?php

/**
 * Viral Express Theme Customizer
 *
 * @package Viral Express
 */
/* HEADER PANEL */
$wp_customize->remove_control('header_text');
$wp_customize->add_panel('viral_express_header_settings_panel', array(
    'title' => esc_html__('Header Settings', 'viral-express'),
    'priority' => 15
));

$wp_customize->add_setting('viral_express_title_tagline_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Express_Tab_Control($wp_customize, 'viral_express_title_tagline_nav', array(
    'section' => 'title_tagline',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-express'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'custom_logo',
                'blogname',
                'blogdescription',
                'viral_express_hide_title',
                'viral_express_hide_tagline',
                'viral_express_tagline_position',
                'site_icon'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-express'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'viral_express_logo_height',
                'viral_express_logo_padding',
            ),
        )
    ),
)));

$wp_customize->get_section('title_tagline')->panel = 'viral_express_header_settings_panel';
$wp_customize->get_section('title_tagline')->title = esc_html__('Logo & Favicon', 'viral-express');

$wp_customize->add_setting('viral_express_hide_title', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => false,
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_express_hide_title', array(
    'type' => 'checkbox',
    'section' => 'title_tagline',
    'label' => esc_html__('Hide Site Title', 'viral-express')
));

$wp_customize->add_setting('viral_express_hide_tagline', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => false,
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_express_hide_tagline', array(
    'type' => 'checkbox',
    'section' => 'title_tagline',
    'label' => esc_html__('Hide Site Tagline', 'viral-express')
));

$wp_customize->add_setting('viral_express_tagline_position', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => 'ht-tagline-inline-logo',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_express_tagline_position', array(
    'section' => 'title_tagline',
    'type' => 'select',
    'label' => esc_html__('Title/Tagline Position', 'viral-express'),
    'choices' => array(
        'ht-tagline-inline-logo' => esc_html__('Inline With Logo', 'viral-express'),
        'ht-tagline-below-logo' => esc_html__('Below Logo', 'viral-express')
    )
));

$wp_customize->selective_refresh->add_partial('viral_express_hide_title', array(
    'selector' => '#ht-site-branding',
    'render_callback' => 'viral_express_header_logo'
));

$wp_customize->selective_refresh->add_partial('viral_express_hide_tagline', array(
    'selector' => '#ht-site-branding',
    'render_callback' => 'viral_express_header_logo'
));


$wp_customize->add_setting('viral_express_logo_height', array(
    'sanitize_callback' => 'absint',
    'default' => 60,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Range_Slider_Control($wp_customize, 'viral_express_logo_height', array(
    'section' => 'title_tagline',
    'label' => esc_html__('Logo Height(px)', 'viral-express'),
    'description' => esc_html__('The logo height will not increase beyond the header height. Increase the header height first. Logo will appear blur if the image size is small.', 'viral-express'),
    'input_attrs' => array(
        'min' => 40,
        'max' => 200,
        'step' => 1
    )
)));

$wp_customize->add_setting('viral_express_logo_padding', array(
    'sanitize_callback' => 'absint',
    'default' => 15,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Range_Slider_Control($wp_customize, 'viral_express_logo_padding', array(
    'section' => 'title_tagline',
    'label' => esc_html__('Logo Top & Bottom Spacing(px)', 'viral-express'),
    'input_attrs' => array(
        'min' => 0,
        'max' => 100,
        'step' => 1
    )
)));


//TOP HEADER
$wp_customize->add_section('viral_express_top_header_options', array(
    'title' => esc_html__('Top Header', 'viral-express'),
    'panel' => 'viral_express_header_settings_panel'
));

$wp_customize->add_setting('viral_express_top_header_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_express_Tab_Control($wp_customize, 'viral_express_top_header_nav', array(
    'section' => 'viral_express_top_header_options',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-express'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'viral_express_top_header',
                'viral_express_th_disable_mobile',
                'viral_express_top_header_options_heading',
                'viral_express_th_left_display',
                'viral_express_th_right_display',
                'viral_express_top_header_seperator',
                'viral_express_social_link',
                'viral_express_th_menu',
                'viral_express_th_widget',
                'viral_express_th_text',
                'viral_express_th_ticker_title',
                'viral_express_th_ticker_category'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-express'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'viral_express_th_height',
                'viral_express_th_bg_color',
                'viral_express_th_bottom_border_color',
                'viral_express_th_text_color',
                'viral_express_th_anchor_color'
            ),
        )
    ),
)));

//TOP HEADER SETTINGS
$wp_customize->add_setting('viral_express_top_header', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => 'on'
));

$wp_customize->add_control(new Viral_Express_Switch_Control($wp_customize, 'viral_express_top_header', array(
    'section' => 'viral_express_top_header_options',
    'label' => esc_html__('Enable Top Header', 'viral-express'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-express'),
        'off' => esc_html__('No', 'viral-express')
    )
)));

$wp_customize->add_setting('viral_express_th_height', array(
    'sanitize_callback' => 'absint',
    'default' => 45,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Range_Slider_Control($wp_customize, 'viral_express_th_height', array(
    'section' => 'viral_express_top_header_options',
    'label' => esc_html__('Top Header Height', 'viral-express'),
    'input_attrs' => array(
        'min' => 5,
        'max' => 100,
        'step' => 1
    )
)));

$wp_customize->add_setting('viral_express_th_bg_color', array(
    'default' => '#f97c00',
    'sanitize_callback' => 'viral_express_sanitize_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Alpha_Color_Control($wp_customize, 'viral_express_th_bg_color', array(
    'label' => esc_html__('Top Header Background', 'viral-express'),
    'section' => 'viral_express_top_header_options'
)));

$wp_customize->add_setting('viral_express_th_bottom_border_color', array(
    'default' => '',
    'sanitize_callback' => 'viral_express_sanitize_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Alpha_Color_Control($wp_customize, 'viral_express_th_bottom_border_color', array(
    'label' => esc_html__('Top Header Bottom Border Color', 'viral-express'),
    'description' => esc_html__('Leave Empty to Hide Border', 'viral-express'),
    'section' => 'viral_express_top_header_options'
)));

$wp_customize->add_setting('viral_express_th_text_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_express_th_text_color', array(
    'section' => 'viral_express_top_header_options',
    'label' => esc_html__('Text Color', 'viral-express')
)));

$wp_customize->add_setting('viral_express_th_anchor_color', array(
    'default' => '#EEEEEE',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_express_th_anchor_color', array(
    'section' => 'viral_express_top_header_options',
    'label' => esc_html__('Anchor(Link) Color', 'viral-express')
)));

$wp_customize->add_setting('viral_express_th_disable_mobile', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => false,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_th_disable_mobile', array(
    'section' => 'viral_express_top_header_options',
    'label' => esc_html__('Disable in Mobile', 'viral-express')
)));

$wp_customize->add_setting('viral_express_top_header_options_heading', array(
    'sanitize_callback' => 'viral_express_sanitize_text'
));

$wp_customize->add_control(new Viral_Express_Heading_Control($wp_customize, 'viral_express_top_header_options_heading', array(
    'section' => 'viral_express_top_header_options',
    'label' => esc_html__('Top Header Content', 'viral-express')
)));

$wp_customize->add_setting('viral_express_th_left_display', array(
    'default' => 'social',
    'sanitize_callback' => 'viral_express_sanitize_choices',
));

$wp_customize->add_control('viral_express_th_left_display', array(
    'section' => 'viral_express_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Display in Left Header', 'viral-express'),
    'choices' => array(
        'social' => esc_html__('Social Icons', 'viral-express'),
        'menu' => esc_html__('Menu', 'viral-express'),
        'text' => esc_html__('HTML Text', 'viral-express'),
        'none' => esc_html__('None', 'viral-express')
    )
));

$wp_customize->add_setting('viral_express_th_right_display', array(
    'default' => 'text',
    'sanitize_callback' => 'viral_express_sanitize_choices',
));

$wp_customize->add_control('viral_express_th_right_display', array(
    'section' => 'viral_express_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Display in Right Header', 'viral-express'),
    'choices' => array(
        'social' => esc_html__('Social Icons', 'viral-express'),
        'menu' => esc_html__('Menu', 'viral-express'),
        'text' => esc_html__('HTML Text', 'viral-express'),
        'none' => esc_html__('None', 'viral-express')
    )
));

$wp_customize->add_setting('viral_express_top_header_seperator', array(
    'sanitize_callback' => 'viral_express_sanitize_text'
));

$wp_customize->add_control(new Viral_Express_Separator_Control($wp_customize, 'viral_express_top_header_seperator', array(
    'section' => 'viral_express_top_header_options'
)));

$wp_customize->add_setting('viral_express_social_link', array(
    'sanitize_callback' => 'viral_express_sanitize_text'
));

$wp_customize->add_control(new Viral_Express_Text_Info_Control($wp_customize, 'viral_express_social_link', array(
    'label' => esc_html__('Social Icons', 'viral-express'),
    'section' => 'viral_express_top_header_options',
    'description' => sprintf(esc_html__('Add your %s here', 'viral-express'), '<a href="#" target="_blank">Social Icons</a>')
)));

$wp_customize->add_setting('viral_express_th_menu', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
));

$wp_customize->add_control('viral_express_th_menu', array(
    'section' => 'viral_express_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Select Menu', 'viral-express'),
    'choices' => viral_express_menu_choice()
));

$wp_customize->add_setting('viral_express_th_text', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => 'California, TX 70240 | (1800) 456 7890',
));

$wp_customize->add_control(new Viral_Express_Editor_Control($wp_customize, 'viral_express_th_text', array(
    'section' => 'viral_express_top_header_options',
    'label' => esc_html__('Html Text', 'viral-express'),
    'include_admin_print_footer' => true
)));


//MAIN HEADER
$wp_customize->add_section('viral_express_main_header_options', array(
    'title' => esc_html__('Main Header', 'viral-express'),
    'panel' => 'viral_express_header_settings_panel'
));

$wp_customize->add_setting('viral_express_main_header_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Express_Tab_Control($wp_customize, 'viral_express_main_header_nav', array(
    'section' => 'viral_express_main_header_options',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-express'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'viral_express_sticky_header',
                'viral_express_mh_layout',
                'viral_express_mh_show_search',
                'viral_express_mh_show_cart',
                'viral_express_mh_show_social',
                'viral_express_mh_show_offcanvas',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-express'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'viral_express_mh_header_bg',
                'viral_express_mh_bg_color',
                'viral_express_mh_bg_color_mobile',
                'viral_express_mh_height',
                'viral_express_mh_border',
                'viral_express_mh_button_color',
                'viral_express_mh_border_sep_start',
                'viral_express_mh_border_color',
                'viral_express_toggle_button_color',
            ),
        )
    ),
)));

//MAIN HEADER SETTINGS
$wp_customize->add_setting('viral_express_sticky_header', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Express_Switch_Control($wp_customize, 'viral_express_sticky_header', array(
    'section' => 'viral_express_main_header_options',
    'label' => esc_html__('Enable Sticky Header', 'viral-express'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-express'),
        'off' => esc_html__('No', 'viral-express')
    )
)));

//HEADER LAYOUTS
$wp_customize->add_setting('viral_express_mh_layout', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => 'header-style5'
));

$wp_customize->add_control(new Viral_Express_Selector_Control($wp_customize, 'viral_express_mh_layout', array(
    'section' => 'viral_express_main_header_options',
    'label' => esc_html__('Header Layout', 'viral-express'),
    'class' => 'ht--full-width',
    'options' => array(
        'header-style5' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/headers/header-5.png',
        'header-style6' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/headers/header-6.png',
    )
)));

$wp_customize->add_setting('viral_express_mh_height', array(
    'sanitize_callback' => 'absint',
    'default' => 65,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Range_Slider_Control($wp_customize, 'viral_express_mh_height', array(
    'section' => 'viral_express_main_header_options',
    'label' => esc_html__('Header Height', 'viral-express'),
    'input_attrs' => array(
        'min' => 50,
        'max' => 200,
        'step' => 1
    )
)));

$wp_customize->add_setting('viral_express_mh_show_search', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_mh_show_search', array(
    'section' => 'viral_express_main_header_options',
    'label' => esc_html__('Show Search Button', 'viral-express')
)));

$wp_customize->add_setting('viral_express_mh_show_cart', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => false
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_mh_show_cart', array(
    'section' => 'viral_express_main_header_options',
    'label' => esc_html__('Show Cart Button', 'viral-express'),
    'active_callback' => 'viral_express_is_woocommerce_activated'
)));

$wp_customize->add_setting('viral_express_mh_show_social', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => false,
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_mh_show_social', array(
    'section' => 'viral_express_main_header_options',
    'label' => esc_html__('Show Social Icons', 'viral-express')
)));

$wp_customize->add_setting('viral_express_mh_button_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_express_mh_button_color', array(
    'section' => 'viral_express_main_header_options',
    'label' => esc_html__('Buttons Color(Search, Social Icons, Offcanvas Menu)', 'viral-express')
)));

$wp_customize->add_setting('viral_express_mh_bg_color', array(
    'default' => '#f97c00',
    'sanitize_callback' => 'viral_express_sanitize_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Alpha_Color_Control($wp_customize, 'viral_express_mh_bg_color', array(
    'label' => esc_html__('Header Background Color', 'viral-express'),
    'section' => 'viral_express_main_header_options'
)));

$wp_customize->add_setting('viral_express_mh_bg_color_mobile', array(
    'default' => '#f97c00',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_express_mh_bg_color_mobile', array(
    'section' => 'viral_express_main_header_options',
    'label' => esc_html__('Header Bar Background Color(Mobile)', 'viral-express')
)));

$wp_customize->add_setting('viral_express_toggle_button_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_express_toggle_button_color', array(
    'section' => 'viral_express_main_header_options',
    'label' => esc_html__('Mobile Menu Button Color', 'viral-express')
)));

$wp_customize->add_setting('viral_express_mh_border_sep_start', array(
    'sanitize_callback' => 'viral_express_sanitize_text'
));

$wp_customize->add_control(new Viral_Express_Separator_Control($wp_customize, 'viral_express_mh_border_sep_start', array(
    'section' => 'viral_express_main_header_options'
)));

$wp_customize->add_setting('viral_express_mh_border', array(
    'default' => 'ht-no-border',
    'sanitize_callback' => 'viral_express_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_express_mh_border', array(
    'section' => 'viral_express_main_header_options',
    'type' => 'select',
    'label' => esc_html__('Top and Bottom Border Settings', 'viral-express'),
    'choices' => array(
        'ht-no-border' => esc_html__('Disable', 'viral-express'),
        'ht-top-border' => esc_html__('Enable Top Border', 'viral-express'),
        'ht-bottom-border' => esc_html__('Enable Bottom Border', 'viral-express'),
        'ht-top-bottom-border' => esc_html__('Enable Top & Bottom Border', 'viral-express')
    )
));

$wp_customize->add_setting('viral_express_mh_border_color', array(
    'default' => '#EEEEEE',
    'sanitize_callback' => 'viral_express_sanitize_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Alpha_Color_Control($wp_customize, 'viral_express_mh_border_color', array(
    'label' => esc_html__('Border Color', 'viral-express'),
    'section' => 'viral_express_main_header_options'
)));

//MENU SETTINGS
$wp_customize->add_section('viral_express_menu_section', array(
    'title' => esc_html__('Menu Settings', 'viral-express'),
    'panel' => 'viral_express_header_settings_panel'
));


$wp_customize->add_setting('viral_express_menu_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Express_Tab_Control($wp_customize, 'viral_express_menu_nav', array(
    'section' => 'viral_express_menu_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-express'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'viral_express_add_menu',
                'viral_express_mh_menu_hover_style',
                'viral_express_responsive_width'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-express'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'viral_express_mh_bg_color',
                'viral_express_mh_bg_color_mobile',
                'viral_express_mh_height',
                'viral_express_mh_button_color',
                'viral_express_mh_border_sep_start',
                'viral_express_mh_border_color',
                'viral_express_mh_border_sep_end',
                'viral_express_mh_menu_color',
                'viral_express_mh_menu_hover_color',
                'viral_express_mh_menu_hover_bg_color',
                'viral_express_submenu_seperator',
                'viral_express_mh_submenu_bg_color',
                'viral_express_mh_submenu_color',
                'viral_express_mh_submenu_hover_color',
                'viral_express_menuhover_seperator',
                'viral_express_menu_dropdown_padding'
            ),
        ),
        array(
            'name' => esc_html__('Typography', 'viral-express'),
            'icon' => 'dashicons dashicons-edit',
            'fields' => array(
                'menu_typography'
            ),
        ),
    ),
)));

//MAIN HEADER SETTINGS
$wp_customize->add_setting('viral_express_add_menu', array(
    'sanitize_callback' => 'viral_express_sanitize_text'
));

$wp_customize->add_control(new Viral_Express_Text_Info_Control($wp_customize, 'viral_express_add_menu', array(
    'section' => 'viral_express_menu_section',
    'description' => sprintf(esc_html__('Add %1$s and configure the below Settings.', 'viral-express'), '<a href="' . admin_url() . '/nav-menus.php" target="_blank">Menu</a>')
)));

$wp_customize->add_setting('viral_express_responsive_width', array(
    'sanitize_callback' => 'absint',
    'default' => 780
));

$wp_customize->add_control(new Viral_Express_Range_Slider_Control($wp_customize, 'viral_express_responsive_width', array(
    'section' => 'viral_express_menu_section',
    'label' => esc_html__('Enable Responsive Menu After(px)', 'viral-express'),
    'description' => esc_html__('Set the value of the screen immediately after the menu item breaks into multiple line.', 'viral-express'),
    'input_attrs' => array(
        'min' => 480,
        'max' => 1200,
        'step' => 10
    )
)));

$wp_customize->add_setting('viral_express_mh_menu_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_express_mh_menu_color', array(
    'section' => 'viral_express_menu_section',
    'label' => esc_html__('Menu Link Color', 'viral-express')
)));

$wp_customize->add_setting('viral_express_mh_menu_hover_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_express_mh_menu_hover_color', array(
    'section' => 'viral_express_menu_section',
    'label' => esc_html__('Menu Link Color - Hover', 'viral-express')
)));

$wp_customize->add_setting('viral_express_mh_menu_hover_bg_color', array(
    'default' => '#f97c00',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_express_mh_menu_hover_bg_color', array(
    'section' => 'viral_express_menu_section',
    'label' => esc_html__('Menu Link Background Color - Hover', 'viral-express')
)));

$wp_customize->add_setting('viral_express_submenu_seperator', array(
    'sanitize_callback' => 'viral_express_sanitize_text'
));

$wp_customize->add_control(new Viral_Express_Separator_Control($wp_customize, 'viral_express_submenu_seperator', array(
    'section' => 'viral_express_menu_section'
)));

$wp_customize->add_setting('viral_express_mh_submenu_bg_color', array(
    'default' => '#F2F2F2',
    'sanitize_callback' => 'viral_express_sanitize_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Alpha_Color_Control($wp_customize, 'viral_express_mh_submenu_bg_color', array(
    'label' => esc_html__('SubMenu Background Color', 'viral-express'),
    'section' => 'viral_express_menu_section'
)));

$wp_customize->add_setting('viral_express_mh_submenu_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_express_mh_submenu_color', array(
    'section' => 'viral_express_menu_section',
    'label' => esc_html__('SubMenu Text/Link Color', 'viral-express')
)));

$wp_customize->add_setting('viral_express_mh_submenu_hover_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_express_mh_submenu_hover_color', array(
    'section' => 'viral_express_menu_section',
    'label' => esc_html__('SubMenu Link Color - Hover', 'viral-express')
)));

$wp_customize->add_setting('viral_express_menuhover_seperator', array(
    'sanitize_callback' => 'viral_express_sanitize_text'
));

$wp_customize->add_control(new Viral_Express_Separator_Control($wp_customize, 'viral_express_menuhover_seperator', array(
    'section' => 'viral_express_menu_section'
)));

$wp_customize->add_setting('viral_express_menu_dropdown_padding', array(
    'default' => 0,
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Range_Slider_Control($wp_customize, 'viral_express_menu_dropdown_padding', array(
    'section' => 'viral_express_menu_section',
    'label' => esc_html__('Menu item Top/Bottom Padding', 'viral-express'),
    'description' => sprintf(esc_html__('(in px) Select appropriate number so that the submenu on hover appears just below the header bar. %s', 'viral-express'), '<a href="https://hashthemes.com/articles/menu-top-and-bottom-padding/" target="_blank">' . esc_html__('Detail Article Here', 'viral-express') . '</a>'),
    'input_attrs' => array(
        'min' => 0,
        'max' => 100,
        'step' => 1
    )
)));

// Add the Menu typography
$wp_customize->add_setting('menu_font_family', array(
    'default' => 'Default',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('menu_font_style', array(
    'default' => '400',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('menu_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('menu_text_transform', array(
    'default' => 'uppercase',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('menu_font_size', array(
    'default' => '14',
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('menu_line_height', array(
    'default' => '3',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('menu_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Typography_Control($wp_customize, 'menu_typography', array(
    'label' => esc_html__('Menu Typography', 'viral-express'),
    'description' => esc_html__('Select how you want your menu to appear.', 'viral-express'),
    'section' => 'viral_express_menu_section',
    'settings' => array(
        'family' => 'menu_font_family',
        'style' => 'menu_font_style',
        'text_decoration' => 'menu_text_decoration',
        'text_transform' => 'menu_text_transform',
        'size' => 'menu_font_size',
        'line_height' => 'menu_line_height',
        'letter_spacing' => 'menu_letter_spacing'
    ),
    'input_attrs' => array(
        'min' => 10,
        'max' => 40,
        'step' => 1
    )
)));

//TITLE BAR SETTINGS
$wp_customize->add_section('viral_express_title_bar_section', array(
    'title' => esc_html__('Page Title', 'viral-express'),
    'panel' => 'viral_express_header_settings_panel'
));

$wp_customize->add_setting('viral_express_title_bar_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Express_Tab_Control($wp_customize, 'viral_express_title_bar_nav', array(
    'section' => 'viral_express_title_bar_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-express'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'viral_express_page_title_heading',
                'viral_express_show_title',
                'viral_express_breacrumb_heading',
                'viral_express_breadcrumb'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Typography', 'viral-express'),
            'icon' => 'dashicons dashicons-edit',
            'fields' => array(
                'page_title_typography'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_express_page_title_heading', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Viral_Express_Heading_Control($wp_customize, 'viral_express_page_title_heading', array(
    'section' => 'viral_express_title_bar_section',
    'label' => esc_html__('Page Title', 'viral-express')
)));

$wp_customize->add_setting('viral_express_show_title', array(
    'sanitize_callback' => 'viral_express_sanitize_checkbox',
    'default' => true
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_show_title', array(
    'section' => 'viral_express_title_bar_section',
    'label' => esc_html__('Page Title/SubTitle', 'viral-express'),
    'description' => esc_html__('The title of the page and archives that appears below the menu. It does not apply for post title.', 'viral-express')
)));

$wp_customize->add_setting('viral_express_breacrumb_heading', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Viral_Express_Heading_Control($wp_customize, 'viral_express_breacrumb_heading', array(
    'section' => 'viral_express_title_bar_section',
    'label' => esc_html__('Breadcrumb', 'viral-express')
)));

$wp_customize->add_setting('viral_express_breadcrumb', array(
    'sanitize_callback' => 'viral_express_sanitize_checkbox',
    'default' => true
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_breadcrumb', array(
    'section' => 'viral_express_title_bar_section',
    'label' => esc_html__('BreadCrumb', 'viral-express'),
    'description' => esc_html__('Breadcrumbs are a great way of letting your visitors find out where they are on your site.', 'viral-express')
)));

// Add the Page Title typography
$wp_customize->add_setting('page_title_font_family', array(
    'default' => 'Default',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('page_title_font_style', array(
    'default' => 'Default',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('page_title_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('page_title_text_transform', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('page_title_font_size', array(
    'default' => '40',
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('page_title_line_height', array(
    'default' => '1.3',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('page_title_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('page_title_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Typography_Control($wp_customize, 'page_title_typography', array(
    'label' => esc_html__('Page Title Typography', 'viral-express'),
    'description' => esc_html__('Page/Post/Archive Titles', 'viral-express'),
    'section' => 'viral_express_title_bar_section',
    'settings' => array(
        'family' => 'page_title_font_family',
        'style' => 'page_title_font_style',
        'text_decoration' => 'page_title_text_decoration',
        'text_transform' => 'page_title_text_transform',
        'size' => 'page_title_font_size',
        'line_height' => 'page_title_line_height',
        'letter_spacing' => 'page_title_letter_spacing',
        'color' => 'page_title_color'
    ),
    'input_attrs' => array(
        'min' => 20,
        'max' => 100,
        'step' => 1
    )
)));

