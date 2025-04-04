<?php

/**
 * Viral Express Theme Customizer
 *
 * @package Viral Express
 */
$wp_customize->add_section('viral_express_frontpage_settings', array(
    'title' => esc_html__('Front Page Settings', 'viral-express'),
    'priority' => 25
));

$wp_customize->add_setting('viral_express_frontpage_settings_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Express_Tab_Control($wp_customize, 'viral_express_frontpage_settings_nav', array(
    'section' => 'viral_express_frontpage_settings',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-express'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'viral_express_block_title_style',
                'viral_express_block_title_end',
                'viral_express_display_time_ago',
                'viral_express_lazy_load',
                'viral_express_image_hover_effect'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-express'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'viral_express_block_title_color',
                'viral_express_block_title_background_color',
                'viral_express_block_title_border_color',
                'viral_express_block_title_end',
                'viral_express_placeholder_image',
                'viral_express_frontpage_section_spacing'
            ),
        ),
        array(
            'name' => esc_html__('Typography', 'viral-express'),
            'icon' => 'dashicons dashicons-edit',
            'fields' => array(
                'frontpage_block_title_typography',
                'frontpage_title_typography'
            ),
        )
    ),
)));

$wp_customize->add_setting('viral_express_block_title_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_express_block_title_color', array(
    'section' => 'viral_express_frontpage_settings',
    'label' => esc_html__('Block Title Color', 'viral-express')
)));

$wp_customize->add_setting('viral_express_block_title_background_color', array(
    'default' => '#f97c00',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_express_block_title_background_color', array(
    'section' => 'viral_express_frontpage_settings',
    'label' => esc_html__('Block Title Background Color', 'viral-express')
)));

$wp_customize->add_setting('viral_express_block_title_border_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_express_block_title_border_color', array(
    'section' => 'viral_express_frontpage_settings',
    'label' => esc_html__('Block Title Border Color', 'viral-express')
)));

$wp_customize->add_setting('viral_express_display_time_ago', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => false
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_display_time_ago', array(
    'section' => 'viral_express_frontpage_settings',
    'label' => esc_html__('Display Post Date as Time Ago', 'viral-express'),
    'description' => esc_html__('Turn on this option to display time ago instead of date.', 'viral-express')
)));

$wp_customize->add_setting('viral_express_frontpage_section_spacing', array(
    'default' => 40,
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Range_Slider_Control($wp_customize, 'viral_express_frontpage_section_spacing', array(
    'section' => 'viral_express_frontpage_settings',
    'label' => esc_html__('Spacing Between Repeater Section', 'viral-express'),
    'description' => esc_html__('(in px) Ajust the spacing between the sections.', 'viral-express'),
    'input_attrs' => array(
        'min' => 0,
        'max' => 100,
        'step' => 1
    )
)));


// Add the Frontpage Block Title typography
$wp_customize->add_setting('frontpage_block_title_font_family', array(
    'default' => 'Default',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('frontpage_block_title_font_style', array(
    'default' => 'Default',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('frontpage_block_title_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('frontpage_block_title_text_transform', array(
    'default' => 'uppercase',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('frontpage_block_title_font_size', array(
    'default' => '20',
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('frontpage_block_title_line_height', array(
    'default' => '1.1',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('frontpage_block_title_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Typography_Control($wp_customize, 'frontpage_block_title_typography', array(
    'label' => esc_html__('Front Page Block Title Typography', 'viral-express'),
    'description' => esc_html__('Select how you want your frontpage block title to appear.', 'viral-express'),
    'section' => 'viral_express_frontpage_settings',
    'settings' => array(
        'family' => 'frontpage_block_title_font_family',
        'style' => 'frontpage_block_title_font_style',
        'text_decoration' => 'frontpage_block_title_text_decoration',
        'text_transform' => 'frontpage_block_title_text_transform',
        'size' => 'frontpage_block_title_font_size',
        'line_height' => 'frontpage_block_title_line_height',
        'letter_spacing' => 'frontpage_block_title_letter_spacing'
    ),
    'input_attrs' => array(
        'min' => 12,
        'max' => 40,
        'step' => 1
    )
)));

// Add the Frontpage Title typography
$wp_customize->add_setting('frontpage_title_font_family', array(
    'default' => 'Default',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('frontpage_title_font_style', array(
    'default' => 'Default',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('frontpage_title_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('frontpage_title_text_transform', array(
    'default' => 'capitalize',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('frontpage_title_font_size', array(
    'default' => '16',
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('frontpage_title_line_height', array(
    'default' => '1.3',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('frontpage_title_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Typography_Control($wp_customize, 'frontpage_title_typography', array(
    'label' => esc_html__('Front Page Post Title Typography', 'viral-express'),
    'description' => esc_html__('Select how you want your frontpage post title to appear.', 'viral-express'),
    'section' => 'viral_express_frontpage_settings',
    'settings' => array(
        'family' => 'frontpage_title_font_family',
        'style' => 'frontpage_title_font_style',
        'text_decoration' => 'frontpage_title_text_decoration',
        'text_transform' => 'frontpage_title_text_transform',
        'size' => 'frontpage_title_font_size',
        'line_height' => 'frontpage_title_line_height',
        'letter_spacing' => 'frontpage_title_letter_spacing'
    ),
    'input_attrs' => array(
        'min' => 12,
        'max' => 40,
        'step' => 1
    )
)));
