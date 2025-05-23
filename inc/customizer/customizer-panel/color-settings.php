<?php

/**
 * Viral Express Theme Customizer
 *
 * @package Viral Express
 */
$wp_customize->get_section('colors')->title = esc_html__('Color Settings', 'viral-express');
$wp_customize->get_section('colors')->priority = 10;

//COLOR SETTINGS
$wp_customize->add_setting('viral_express_template_color', array(
    'default' => '#f97c00',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 1
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_express_template_color', array(
    'section' => 'colors',
    'label' => esc_html__('Theme Primary Color', 'viral-express')
)));

$wp_customize->add_setting('viral_express_color_section_seperator1', array(
    'sanitize_callback' => 'viral_express_sanitize_text'
));

$wp_customize->add_control(new Viral_Express_Separator_Control($wp_customize, 'viral_express_color_section_seperator1', array(
    'section' => 'colors'
)));

$wp_customize->add_setting('viral_express_color_content_info', array(
    'sanitize_callback' => 'viral_express_sanitize_text'
));

$wp_customize->add_control(new Viral_Express_Text_Info_Control($wp_customize, 'viral_express_color_content_info', array(
    'section' => 'colors',
    'label' => esc_html__('Content Colors', 'viral-express'),
    'description' => esc_html__('This settings apply only in the single posts (ie page and post detail pages only)', 'viral-express')
)));

$wp_customize->add_setting('viral_express_content_header_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_express_content_header_color', array(
    'section' => 'colors',
    'label' => esc_html__('Content Header Color(H1, H2, H3, H4, H5, H6)', 'viral-express')
)));

$wp_customize->add_setting('viral_express_content_text_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_express_content_text_color', array(
    'section' => 'colors',
    'label' => esc_html__('Content Text Color', 'viral-express')
)));

$wp_customize->add_setting('viral_express_content_link_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_express_content_link_color', array(
    'section' => 'colors',
    'label' => esc_html__('Content Link Color', 'viral-express')
)));

$wp_customize->add_setting('viral_express_content_link_hov_color', array(
    'default' => '#f97c00',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_express_content_link_hov_color', array(
    'section' => 'colors',
    'label' => esc_html__('Content Link Hover Color', 'viral-express'),
)));

$wp_customize->add_setting('viral_express_color_section_seperator2', array(
    'sanitize_callback' => 'viral_express_sanitize_text'
));

$wp_customize->add_control(new Viral_Express_Separator_Control($wp_customize, 'viral_express_color_section_seperator2', array(
    'section' => 'colors'
)));

$wp_customize->add_setting('viral_express_color_upgrade_text', array(
    'sanitize_callback' => 'viral_express_sanitize_text'
));

$wp_customize->add_control(new Viral_Express_Upgrade_Info_Control($wp_customize, 'viral_express_color_upgrade_text', array(
    'section' => 'colors',
    'label' => esc_html__('For more options,', 'viral-express'),
    'choices' => array(
        esc_html__('Color Tag for each category', 'viral-express'),
    ),
    'priority' => 100,
    'upgrade_text' => esc_html__('Upgrade to Pro', 'viral-express'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/?utm_source=wordpress&utm_medium=viral-express-link&utm_campaign=viral-express-upgrade',
    'active_callback' => 'viral_express_is_upgrade_notice_active'
)));