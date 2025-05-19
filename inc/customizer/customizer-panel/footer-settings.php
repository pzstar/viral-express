<?php

/**
 * Viral Express Theme Customizer
 *
 * @package Viral Express
 */
$wp_customize->add_section('viral_express_footer_section', array(
    'title' => esc_html__('Footer Settings', 'viral-express'),
    'priority' => 50
));

$wp_customize->add_setting('viral_express_footer_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Express_Tab_Control($wp_customize, 'viral_express_footer_nav', array(
    'section' => 'viral_express_footer_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-express'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'viral_express_footer_col',
                'viral_express_footer_copyright'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-express'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'viral_express_footer_bg',
                'viral_express_footer_primary_color_heading',
                'viral_express_footer_bg_color',
                'viral_express_footer_border_color',
                'viral_express_footer_title_color',
                'viral_express_footer_text_color',
                'viral_express_footer_anchor_color'
            ),
        )
    ),
)));

$wp_customize->add_setting('viral_express_footer_col', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => 'col-3-1-1-1'
));

$wp_customize->add_control(new Viral_Express_Selector_Control($wp_customize, 'viral_express_footer_col', array(
    'section' => 'viral_express_footer_section',
    'label' => esc_html__('Footer Column', 'viral-express'),
    'class' => 'ht--one-third-width',
    'options' => array(
        'col-1-1' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/footer-columns/col-1-1.jpg',
        'col-2-1-1' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/footer-columns/col-2-1-1.jpg',
        'col-3-1-1-1' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/footer-columns/col-3-1-1-1.jpg',
        'col-4-1-1-1-1' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/footer-columns/col-4-1-1-1-1.jpg',
    )
)));

$wp_customize->add_setting('viral_express_footer_bg_url', array(
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_express_footer_bg_id', array(
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_express_footer_bg_repeat', array(
    'default' => 'no-repeat',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_express_footer_bg_size', array(
    'default' => 'cover',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_express_footer_bg_position', array(
    'default' => 'center-center',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_express_footer_bg_attach', array(
    'default' => 'scroll',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

// Registers example_background control
$wp_customize->add_control(new Viral_Express_Background_Image_Control($wp_customize, 'viral_express_footer_bg', array(
    'label' => esc_html__('Footer Background', 'viral-express'),
    'section' => 'viral_express_footer_section',
    'settings' => array(
        'image_url' => 'viral_express_footer_bg_url',
        'image_id' => 'viral_express_footer_bg_id',
        'repeat' => 'viral_express_footer_bg_repeat', // Use false to hide the field
        'size' => 'viral_express_footer_bg_size',
        'position' => 'viral_express_footer_bg_position',
        'attachment' => 'viral_express_footer_bg_attach'
    )
)));

$wp_customize->add_setting('viral_express_footer_primary_color_heading', array(
    'sanitize_callback' => 'viral_express_sanitize_text'
));

$wp_customize->add_control(new Viral_Express_Heading_Control($wp_customize, 'viral_express_footer_primary_color_heading', array(
    'section' => 'viral_express_footer_section',
    'label' => esc_html__('Primary Color', 'viral-express')
)));

$wp_customize->add_setting('viral_express_footer_bg_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'viral_express_sanitize_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Alpha_Color_Control($wp_customize, 'viral_express_footer_bg_color', array(
    'label' => esc_html__('Footer Background/Overlay Color', 'viral-express'),
    'description' => esc_html__('To use background image, set the opacity of background color to 0', 'viral-express'),
    'section' => 'viral_express_footer_section'
)));

$wp_customize->add_setting('viral_express_footer_title_color', array(
    'default' => '#EEEEEE',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_express_footer_border_color', array(
    'default' => '#444444',
    'sanitize_callback' => 'viral_express_sanitize_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Alpha_Color_Control($wp_customize, 'viral_express_footer_border_color', array(
    'label' => esc_html__('Footer Border Color', 'viral-express'),
    'section' => 'viral_express_footer_section'
)));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_express_footer_title_color', array(
    'section' => 'viral_express_footer_section',
    'label' => esc_html__('Footer Title Color', 'viral-express')
)));

$wp_customize->add_setting('viral_express_footer_text_color', array(
    'default' => '#EEEEEE',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_express_footer_text_color', array(
    'section' => 'viral_express_footer_section',
    'label' => esc_html__('Footer Text Color', 'viral-express')
)));

$wp_customize->add_setting('viral_express_footer_anchor_color', array(
    'default' => '#EEEEEE',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_express_footer_anchor_color', array(
    'section' => 'viral_express_footer_section',
    'label' => esc_html__('Footer Anchor Color', 'viral-express')
)));

$wp_customize->add_setting('viral_express_footer_copyright', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => esc_html__('&copy; 2025. All Rights Reserved.', 'viral-express'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_express_footer_copyright', array(
    'section' => 'viral_express_footer_section',
    'type' => 'textarea',
    'label' => esc_html__('Copyright Text', 'viral-express'),
    'description' => esc_html__('Custom HTMl and Shortcodes Supported. Copy/Paste [display-year] to show current year.', 'viral-express')
));

$wp_customize->add_setting('viral_express_footer_upgrade_text', array(
    'sanitize_callback' => 'viral_express_sanitize_text'
));

$wp_customize->add_control(new Viral_Express_Upgrade_Info_Control($wp_customize, 'viral_express_footer_upgrade_text', array(
    'section' => 'viral_express_footer_section',
    'label' => esc_html__('For more options,', 'viral-express'),
    'choices' => array(
        esc_html__('More footer columns styles with up to 6 columns', 'viral-express'),
        esc_html__('20+ widgets/blocks for footer', 'viral-express'),
    ),
    'priority' => 100,
    'upgrade_text' => esc_html__('Upgrade to Pro', 'viral-express'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/?utm_source=wordpress&utm_medium=viral-express-link&utm_campaign=viral-express-upgrade',
    'active_callback' => 'viral_express_is_upgrade_notice_active'
)));
