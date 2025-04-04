<?php

/**
 * Viral Express Theme Customizer
 *
 * @package Viral Express
 */
//LAYOUT OPTIONS
$wp_customize->add_section('viral_express_layout_options_section', array(
    'title' => esc_html__('Sidebar Settings', 'viral-express'),
    'priority' => 16
));

$wp_customize->add_setting('viral_express_sidebar_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Express_Tab_Control($wp_customize, 'viral_express_sidebar_nav', array(
    'section' => 'viral_express_layout_options_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Layouts', 'viral-express'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'viral_express_sticky_sidebar',
                'viral_express_page_layout',
                'viral_express_post_layout',
                'viral_express_archive_layout',
                'viral_express_home_blog_layout',
                'viral_express_search_layout',
                'viral_express_shop_layout'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Styles', 'viral-express'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'viral_express_sticky_sidebar',
                'viral_express_sidebar_style',
                'viral_express_content_widget_title_color'
            ),
        )
    ),
)));

$wp_customize->add_setting('viral_express_sticky_sidebar', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_sticky_sidebar', array(
    'section' => 'viral_express_layout_options_section',
    'label' => esc_html__('Sticky Sidebar', 'viral-express'),
    'description' => esc_html__('The sidebar will stick at the top on scrolling', 'viral-express')
)));

$wp_customize->add_setting('viral_express_page_layout', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new Viral_Express_Selector_Control($wp_customize, 'viral_express_page_layout', array(
    'section' => 'viral_express_layout_options_section',
    'label' => esc_html__('Page Layout', 'viral-express'),
    'class' => 'ht--one-forth-width',
    'description' => esc_html__('Applies to all the General Pages and Portfolio Pages.', 'viral-express'),
    'options' => array(
        'right-sidebar' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/sidebar-layouts/right-sidebar.png',
        'left-sidebar' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/sidebar-layouts/left-sidebar.png',
        'no-sidebar' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/sidebar-layouts/no-sidebar.png',
        'no-sidebar-narrow' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/sidebar-layouts/no-sidebar-narrow.png'
    )
)));

$wp_customize->add_setting('viral_express_post_layout', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new Viral_Express_Selector_Control($wp_customize, 'viral_express_post_layout', array(
    'section' => 'viral_express_layout_options_section',
    'label' => esc_html__('Post Layout', 'viral-express'),
    'class' => 'ht--one-forth-width',
    'description' => esc_html__('Applies to all the Posts.', 'viral-express'),
    'options' => array(
        'right-sidebar' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/sidebar-layouts/right-sidebar.png',
        'left-sidebar' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/sidebar-layouts/left-sidebar.png',
        'no-sidebar' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/sidebar-layouts/no-sidebar.png',
        'no-sidebar-narrow' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/sidebar-layouts/no-sidebar-narrow.png'
    )
)));

$wp_customize->add_setting('viral_express_archive_layout', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new Viral_Express_Selector_Control($wp_customize, 'viral_express_archive_layout', array(
    'section' => 'viral_express_layout_options_section',
    'label' => esc_html__('Archive Page Layout', 'viral-express'),
    'class' => 'ht--one-forth-width',
    'description' => esc_html__('Applies to all Archive Pages.', 'viral-express'),
    'options' => array(
        'right-sidebar' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/sidebar-layouts/right-sidebar.png',
        'left-sidebar' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/sidebar-layouts/left-sidebar.png',
        'no-sidebar' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/sidebar-layouts/no-sidebar.png',
        'no-sidebar-narrow' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/sidebar-layouts/no-sidebar-narrow.png'
    )
)));

$wp_customize->add_setting('viral_express_home_blog_layout', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new Viral_Express_Selector_Control($wp_customize, 'viral_express_home_blog_layout', array(
    'section' => 'viral_express_layout_options_section',
    'label' => esc_html__('Blog Page Layout', 'viral-express'),
    'class' => 'ht--one-forth-width',
    'description' => esc_html__('Applies to Blog Page.', 'viral-express'),
    'options' => array(
        'right-sidebar' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/sidebar-layouts/right-sidebar.png',
        'left-sidebar' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/sidebar-layouts/left-sidebar.png',
        'no-sidebar' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/sidebar-layouts/no-sidebar.png',
        'no-sidebar-narrow' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/sidebar-layouts/no-sidebar-narrow.png'
    )
)));

$wp_customize->add_setting('viral_express_search_layout', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new Viral_Express_Selector_Control($wp_customize, 'viral_express_search_layout', array(
    'section' => 'viral_express_layout_options_section',
    'label' => esc_html__('Search Page Layout', 'viral-express'),
    'class' => 'ht--one-forth-width',
    'description' => esc_html__('Applies to Search Page.', 'viral-express'),
    'options' => array(
        'right-sidebar' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/sidebar-layouts/right-sidebar.png',
        'left-sidebar' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/sidebar-layouts/left-sidebar.png',
        'no-sidebar' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/sidebar-layouts/no-sidebar.png',
        'no-sidebar-narrow' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/sidebar-layouts/no-sidebar-narrow.png'
    )
)));

$wp_customize->add_setting('viral_express_content_widget_title_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_express_content_widget_title_color', array(
    'section' => 'viral_express_layout_options_section',
    'label' => esc_html__('Sidebar Widget Title Color', 'viral-express')
)));