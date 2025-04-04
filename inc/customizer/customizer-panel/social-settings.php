<?php

/**
 * Viral Express Theme Customizer
 *
 * @package Viral Express
 */
//SOCIAL SETTINGS
$wp_customize->add_section('viral_express_social_section', array(
    'title' => esc_html__('Social Links', 'viral-express')
));

$wp_customize->add_setting('viral_express_social_icons', array(
    'sanitize_callback' => 'viral_express_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'icon' => 'icofont-facebook',
            'link' => '#',
            'enable' => 'on'
        ),
        array(
            'icon' => 'icofont-x-twitter',
            'link' => '#',
            'enable' => 'on'
        ),
        array(
            'icon' => 'icofont-instagram',
            'link' => '#',
            'enable' => 'on'
        ),
        array(
            'icon' => 'icofont-youtube',
            'link' => '#',
            'enable' => 'on'
        )
    ))
));

$wp_customize->add_control(new Viral_Express_Repeater_Control($wp_customize, 'viral_express_social_icons', array(
    'label' => esc_html__('Add Social Link', 'viral-express'),
    'section' => 'viral_express_social_section',
    'box_label' => esc_html__('Social Links', 'viral-express'),
    'add_label' => esc_html__('Add New', 'viral-express'),
), array(
    'icon' => array(
        'type' => 'icon',
        'label' => esc_html__('Select Icon', 'viral-express'),
        'default' => 'icofont-facebook'
    ),
    'link' => array(
        'type' => 'text',
        'label' => esc_html__('Add Link', 'viral-express'),
        'default' => ''
    ),
    'enable' => array(
        'type' => 'switch',
        'label' => esc_html__('Enable', 'viral-express'),
        'switch' => array(
            'on' => 'Yes',
            'off' => 'No'
        ),
        'default' => 'on'
    )
)));
