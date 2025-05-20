<?php

/**
 * Viral Express Theme Customizer
 *
 * @package Viral Express
 */
$wp_customize->add_section('viral_express_blog_options_section', array(
    'title' => esc_html__('Blog/Single Post Settings', 'viral-express'),
    'priority' => 30
));

$wp_customize->add_setting('viral_express_blog_sec_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Express_Tab_Control($wp_customize, 'viral_express_blog_sec_nav', array(
    'section' => 'viral_express_blog_options_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('BLog Page', 'viral-express'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'viral_express_display_frontpage_sections',
                'viral_express_blog_layout',
                'viral_express_blog_cat',
                'viral_express_archive_content',
                'viral_express_archive_excerpt_length',
                'viral_express_archive_readmore',
                'viral_express_blog_display_date_option',
                'viral_express_blog_date',
                'viral_express_blog_author',
                'viral_express_blog_comment',
                'viral_express_blog_category',
                'viral_express_blog_tag',
                'viral_express_blog_upgrade_text'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Single Post', 'viral-express'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'viral_express_single_layout',
                'viral_express_display_date_option',
                'viral_express_single_categories',
                'viral_express_single_seperator1',
                'viral_express_single_author',
                'viral_express_single_date',
                'viral_express_single_comment_count',
                'viral_express_single_reading_time',
                'viral_express_single_seperator2',
                'viral_express_single_tags',
                'viral_express_single_seperator3',
                'viral_express_single_prev_next_post',
                'viral_express_single_comments',
                'viral_express_single_related_heading',
                'viral_express_single_related_post_title',
                'viral_express_single_related_post_style',
                'viral_express_single_related_post_count',
                'viral_express_single_upgrade_text'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_express_blog_layout', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => 'layout7'
));

$wp_customize->add_control(new Viral_Express_Image_Selector_Control($wp_customize, 'viral_express_blog_layout', array(
    'section' => 'viral_express_blog_options_section',
    'label' => esc_html__('Blog & Archive Layout', 'viral-express'),
    'image_path' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/blog-layouts/',
    'image_type' => 'png',
    'choices' => array(
        'layout4' => esc_html__('Layout 1', 'viral-express'),
        'layout7' => esc_html__('Layout 2', 'viral-express')
    )
)));

$wp_customize->add_setting('viral_express_blog_cat', array(
    'sanitize_callback' => 'viral_express_sanitize_text'
));

$wp_customize->add_control(new Viral_Express_Taxonomy_Multiple_Checkbox_Control($wp_customize, 'viral_express_blog_cat', array(
    'label' => esc_html__('Exclude Category', 'viral-express'),
    'section' => 'viral_express_blog_options_section',
    'taxonomy' => 'category',
    'description' => esc_html__('Post with selected category will not display in the blog page', 'viral-express')
)));

$wp_customize->add_setting('viral_express_archive_content', array(
    'default' => 'excerpt',
    'sanitize_callback' => 'viral_express_sanitize_choices'
));

$wp_customize->add_control('viral_express_archive_content', array(
    'section' => 'viral_express_blog_options_section',
    'type' => 'radio',
    'label' => esc_html__('Archive Content', 'viral-express'),
    'choices' => array(
        'full-content' => esc_html__('Full Content', 'viral-express'),
        'excerpt' => esc_html__('Excerpt', 'viral-express')
    )
));

$wp_customize->add_setting('viral_express_archive_excerpt_length', array(
    'sanitize_callback' => 'absint',
    'default' => 100
));

$wp_customize->add_control(new Viral_Express_Range_Slider_Control($wp_customize, 'viral_express_archive_excerpt_length', array(
    'section' => 'viral_express_blog_options_section',
    'label' => esc_html__('Excerpt Length (words)', 'viral-express'),
    'input_attrs' => array(
        'min' => 50,
        'max' => 200,
        'step' => 1
    )
)));

$wp_customize->add_setting('viral_express_archive_readmore', array(
    'default' => esc_html__('Read More', 'viral-express'),
    'sanitize_callback' => 'viral_express_sanitize_text'
));

$wp_customize->add_control('viral_express_archive_readmore', array(
    'section' => 'viral_express_blog_options_section',
    'type' => 'text',
    'label' => esc_html__('Read More Text', 'viral-express')
));

$wp_customize->add_setting('viral_express_blog_display_date_option', array(
    'default' => 'posted',
    'sanitize_callback' => 'viral_express_sanitize_choices'
));

$wp_customize->add_control('viral_express_blog_display_date_option', array(
    'section' => 'viral_express_blog_options_section',
    'type' => 'radio',
    'label' => esc_html__('Display Posted/Updated Date', 'viral-express'),
    'choices' => array(
        'posted' => esc_html__('Posted Date', 'viral-express'),
        'updated' => esc_html__('Updated Date', 'viral-express')
    )
));

$wp_customize->add_setting('viral_express_blog_date', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_blog_date', array(
    'section' => 'viral_express_blog_options_section',
    'label' => esc_html__('Display Posted Date', 'viral-express')
)));

$wp_customize->add_setting('viral_express_blog_author', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_blog_author', array(
    'section' => 'viral_express_blog_options_section',
    'label' => esc_html__('Display Author', 'viral-express')
)));

$wp_customize->add_setting('viral_express_blog_comment', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_blog_comment', array(
    'section' => 'viral_express_blog_options_section',
    'label' => esc_html__('Display Comment', 'viral-express')
)));

$wp_customize->add_setting('viral_express_blog_category', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_blog_category', array(
    'section' => 'viral_express_blog_options_section',
    'label' => esc_html__('Display Category', 'viral-express')
)));

$wp_customize->add_setting('viral_express_blog_tag', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_blog_tag', array(
    'section' => 'viral_express_blog_options_section',
    'label' => esc_html__('Display Tag', 'viral-express')
)));

$wp_customize->add_setting('viral_express_blog_upgrade_text', array(
    'sanitize_callback' => 'viral_express_sanitize_text'
));

$wp_customize->add_control(new Viral_Express_Upgrade_Info_Control($wp_customize, 'viral_express_blog_upgrade_text', array(
    'section' => 'viral_express_blog_options_section',
    'label' => esc_html__('For more options,', 'viral-express'),
    'choices' => array(
        esc_html__('7 differently designed archive page layouts', 'viral-express'),
        esc_html__('More advanced customization options', 'viral-express')
    ),
    'priority' => 100,
    'upgrade_text' => esc_html__('Upgrade to Pro', 'viral-express'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/?utm_source=wordpress&utm_medium=viral-express-link&utm_campaign=viral-express-upgrade',
    'active_callback' => 'viral_express_is_upgrade_notice_active'
)));

$wp_customize->add_setting('viral_express_single_layout', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => 'layout7'
));

$wp_customize->add_control(new Viral_Express_Image_Selector_Control($wp_customize, 'viral_express_single_layout', array(
    'section' => 'viral_express_blog_options_section',
    'label' => esc_html__('Single Post Layout', 'viral-express'),
    'description' => esc_html__('This option can be overwritten in single page settings.', 'viral-express'),
    'image_path' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/single-layouts/',
    'image_type' => 'png',
    'choices' => array(
        'layout2' => esc_html__('Layout 1', 'viral-express'),
        'layout7' => esc_html__('Layout 2', 'viral-express')
    )
)));

$wp_customize->add_setting('viral_express_display_date_option', array(
    'default' => 'posted',
    'sanitize_callback' => 'viral_express_sanitize_choices'
));

$wp_customize->add_control('viral_express_display_date_option', array(
    'section' => 'viral_express_blog_options_section',
    'type' => 'radio',
    'label' => esc_html__('Display Posted/Updated Date', 'viral-express'),
    'choices' => array(
        'posted' => esc_html__('Posted Date', 'viral-express'),
        'updated' => esc_html__('Updated Date', 'viral-express')
    )
));

$wp_customize->add_setting('viral_express_single_categories', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_single_categories', array(
    'section' => 'viral_express_blog_options_section',
    'label' => esc_html__('Display Categories', 'viral-express')
)));

$wp_customize->add_setting('viral_express_single_seperator1', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Separator_Control($wp_customize, 'viral_express_single_seperator1', array(
    'section' => 'viral_express_blog_options_section',
)));

$wp_customize->add_setting('viral_express_single_author', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_single_author', array(
    'section' => 'viral_express_blog_options_section',
    'label' => esc_html__('Display Author', 'viral-express')
)));

$wp_customize->add_setting('viral_express_single_date', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_single_date', array(
    'section' => 'viral_express_blog_options_section',
    'label' => esc_html__('Display Posted Date', 'viral-express')
)));

$wp_customize->add_setting('viral_express_single_comment_count', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_single_comment_count', array(
    'section' => 'viral_express_blog_options_section',
    'label' => esc_html__('Display Comment Count', 'viral-express')
)));

$wp_customize->add_setting('viral_express_single_reading_time', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_single_reading_time', array(
    'section' => 'viral_express_blog_options_section',
    'label' => esc_html__('Display Reading Time', 'viral-express')
)));

$wp_customize->add_setting('viral_express_single_seperator2', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Separator_Control($wp_customize, 'viral_express_single_seperator2', array(
    'section' => 'viral_express_blog_options_section',
)));

$wp_customize->add_setting('viral_express_single_tags', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_single_tags', array(
    'section' => 'viral_express_blog_options_section',
    'label' => esc_html__('Display Tags', 'viral-express')
)));

$wp_customize->add_setting('viral_express_single_seperator3', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Separator_Control($wp_customize, 'viral_express_single_seperator3', array(
    'section' => 'viral_express_blog_options_section',
)));

$wp_customize->add_setting('viral_express_single_prev_next_post', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_single_prev_next_post', array(
    'section' => 'viral_express_blog_options_section',
    'label' => esc_html__('Display Prev/Next Post', 'viral-express')
)));

$wp_customize->add_setting('viral_express_single_comments', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_single_comments', array(
    'section' => 'viral_express_blog_options_section',
    'label' => esc_html__('Display Comments', 'viral-express')
)));

$wp_customize->add_setting('viral_express_single_upgrade_text', array(
    'sanitize_callback' => 'viral_express_sanitize_text'
));

$wp_customize->add_control(new Viral_Express_Upgrade_Info_Control($wp_customize, 'viral_express_single_upgrade_text', array(
    'section' => 'viral_express_blog_options_section',
    'label' => esc_html__('For more options,', 'viral-express'),
    'choices' => array(
        esc_html__('7 differently designed single page layouts', 'viral-express'),
        esc_html__('Sticky social share buttons', 'viral-express'),
        esc_html__('Display related posts', 'viral-express'),
        esc_html__('More advanced customization options', 'viral-express'),
    ),
    'priority' => 100,
    'upgrade_text' => esc_html__('Upgrade to Pro', 'viral-express'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/?utm_source=wordpress&utm_medium=viral-express-link&utm_campaign=viral-express-upgrade',
    'active_callback' => 'viral_express_is_upgrade_notice_active'
)));