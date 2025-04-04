<?php

/**
 * Viral Express Theme Customizer
 *
 * @package Viral Express
 */
/* ============FRONT PAGE PANEL============ */
$wp_customize->add_panel('viral_express_front_page_panel', array(
    'title' => esc_html__('Front Page Sections', 'viral-express'),
    'description' => esc_html__('Drag and Drop to Reorder', 'viral-express') . '<img class="viral-express-drag-spinner" src="' . admin_url('/images/spinner.gif') . '">',
    'priority' => 20
));

$wp_customize->add_section(new Viral_Express_Upgrade_Section($wp_customize, 'viral-express-frontpage-notice', array(
    'title' => sprintf(esc_html('Important! Front Page Sections are not enabled. Enable it %1shere%2s.', 'viral-express'), '<a href="javascript:wp.customize.section( \'static_front_page\' ).focus()">', '</a>'),
    'panel' => 'viral_express_front_page_panel',
    'priority' => -99,
    'active_callback' => 'viral_express_check_frontpage'
)));


/* ============MINI NEWS MODULE============ */
$wp_customize->add_section(new Viral_Express_Toggle_Section($wp_customize, 'viral_express_frontpage_mininews_section', array(
    'title' => esc_html__('Mini News Module', 'viral-express'),
    'panel' => 'viral_express_front_page_panel',
    'priority' => viral_express_get_section_position('viral_express_frontpage_mininews_section'),
    'hiding_control' => 'viral_express_frontpage_mininews_section_disable'
)));

$wp_customize->add_setting('viral_express_frontpage_mininews_section_disable', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Express_Switch_Control($wp_customize, 'viral_express_frontpage_mininews_section_disable', array(
    'section' => 'viral_express_frontpage_mininews_section',
    'label' => esc_html__('Disable Section', 'viral-express'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-express'),
        'off' => esc_html__('No', 'viral-express')
    ),
    'class' => 'ht--switch-section',
    'priority' => -1,
)));

$wp_customize->add_setting('viral_express_frontpage_mininews_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Express_Tab_Control($wp_customize, 'viral_express_frontpage_mininews_nav', array(
    'section' => 'viral_express_frontpage_mininews_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-express'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'viral_express_mininews_cat',
                'viral_express_mininews_display_author',
                'viral_express_mininews_display_cat',
                'viral_express_mininews_display_date',
                'viral_express_mininews_post_count_big',
                'viral_express_mininews_post_count',
                'viral_express_mininews_fullwidth',
                'viral_express_mininews_style',
                'viral_express_mininews_image_size',
                'viral_express_mininews_widget_heading',
                'viral_express_mininews_top_widget',
                'viral_express_mininews_bottom_widget'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-express'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'viral_express_mininews_cs_heading',
                'viral_express_mininews_title_color',
                'viral_express_mininews_text_color',
                'viral_express_mininews_link_color',
                'viral_express_mininews_block_color_seperator',
                'viral_express_mininews_overwrite_block_title_color',
                'viral_express_mininews_block_title_color',
                'viral_express_mininews_block_title_background_color',
                'viral_express_mininews_block_title_border_color'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-express'),
            'icon' => 'dashicons dashicons-admin-tools',
            'fields' => array(
                'viral_express_mininews_enable_fullwindow',
                'viral_express_mininews_align_item',
                'viral_express_mininews_fw_seperator',
                'viral_express_mininews_bg_type',
                'viral_express_mininews_bg_color',
                'viral_express_mininews_bg_gradient',
                'viral_express_mininews_bg_image',
                'viral_express_mininews_parallax_effect',
                'viral_express_mininews_bg_video',
                'viral_express_mininews_overlay_color',
                'viral_express_mininews_cs_seperator',
                'viral_express_mininews_padding',
                'viral_express_mininews_margin',
                'viral_express_mininews_seperator0',
                'viral_express_mininews_section_seperator',
                'viral_express_mininews_seperator1',
                'viral_express_mininews_top_seperator',
                'viral_express_mininews_ts_color',
                'viral_express_mininews_ts_height',
                'viral_express_mininews_seperator2',
                'viral_express_mininews_bottom_seperator',
                'viral_express_mininews_bs_color',
                'viral_express_mininews_bs_height'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_express_mininews_cat', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'transport' => 'postMessage',
));

$wp_customize->add_control(new Viral_Express_Taxonomy_Multiple_Checkbox_Control($wp_customize, 'viral_express_mininews_cat', array(
    'label' => esc_html__('Select Category', 'viral-express'),
    'section' => 'viral_express_frontpage_mininews_section',
    'taxonomy' => 'category',
    'description' => esc_html__('All latest post will display if no category is selected', 'viral-express')
)));

$wp_customize->add_setting('viral_express_mininews_display_cat', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'transport' => 'postMessage',
    'default' => true
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_mininews_display_cat', array(
    'section' => 'viral_express_frontpage_mininews_section',
    'label' => esc_html__('Display Category', 'viral-express')
)));

$wp_customize->add_setting('viral_express_mininews_display_author', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'transport' => 'postMessage',
    'default' => true
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_mininews_display_author', array(
    'section' => 'viral_express_frontpage_mininews_section',
    'label' => esc_html__('Display Author', 'viral-express')
)));

$wp_customize->add_setting('viral_express_mininews_display_date', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'transport' => 'postMessage',
    'default' => true
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_mininews_display_date', array(
    'section' => 'viral_express_frontpage_mininews_section',
    'label' => esc_html__('Display Date', 'viral-express')
)));

$wp_customize->add_setting('viral_express_mininews_fullwidth', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'transport' => 'postMessage',
    'default' => false
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_mininews_fullwidth', array(
    'section' => 'viral_express_frontpage_mininews_section',
    'label' => esc_html__('Enable Full Width', 'viral-express')
)));

$wp_customize->add_setting('viral_express_mininews_post_count_big', array(
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage',
    'default' => 5
));

$wp_customize->add_control(new Viral_Express_Range_Slider_Control($wp_customize, 'viral_express_mininews_post_count_big', array(
    'section' => 'viral_express_frontpage_mininews_section',
    'label' => esc_html__('No of Posts In Bigger Screen', 'viral-express'),
    'description' => esc_html__('Displays in the screen bigger than 1400px', 'viral-express'),
    'input_attrs' => array(
        'min' => 4,
        'max' => 10,
        'step' => 1
    )
)));

$wp_customize->add_setting('viral_express_mininews_post_count', array(
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage',
    'default' => 3
));

$wp_customize->add_control(new Viral_Express_Range_Slider_Control($wp_customize, 'viral_express_mininews_post_count', array(
    'section' => 'viral_express_frontpage_mininews_section',
    'label' => esc_html__('No of Posts', 'viral-express'),
    'description' => esc_html__('Displays in the screen smaller than 1400px', 'viral-express'),
    'input_attrs' => array(
        'min' => 2,
        'max' => 6,
        'step' => 1
    )
)));

$wp_customize->add_setting('viral_express_mininews_style', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => 'style1',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Selector_Control($wp_customize, 'viral_express_mininews_style', array(
    'section' => 'viral_express_frontpage_mininews_section',
    'label' => esc_html__('Mini News Style', 'viral-express'),
    'class' => 'ht--full-width',
    'options' => array(
        'style1' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/mini-news/style1.png',
        'style2' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/mini-news/style2.png'
    )
)));

$wp_customize->add_setting('viral_express_mininews_image_size', array(
    'default' => 'viral-express-150x150',
    'transport' => 'postMessage',
    'sanitize_callback' => 'viral_express_sanitize_choices'
));

$wp_customize->add_control('viral_express_mininews_image_size', array(
    'section' => 'viral_express_frontpage_mininews_section',
    'type' => 'select',
    'label' => esc_html__('Image Size', 'viral-express'),
    'choices' => viral_express_get_image_sizes()
));

$wp_customize->selective_refresh->add_partial("viral_express_mininews_fullwidth", array(
    'selector' => ".ht-mininews-container",
    'render_callback' => "viral_express_frontpage_mininews_content",
    'container_inclusive' => false
));

$wp_customize->selective_refresh->add_partial("viral_express_mininews_cat", array(
    'selector' => ".ht-mininews-container",
    'render_callback' => "viral_express_frontpage_mininews_content",
    'container_inclusive' => false
));

$wp_customize->selective_refresh->add_partial("viral_express_mininews_display_cat", array(
    'selector' => ".ht-mininews-container",
    'render_callback' => "viral_express_frontpage_mininews_content",
    'container_inclusive' => false
));

$wp_customize->selective_refresh->add_partial("viral_express_mininews_display_author", array(
    'selector' => ".ht-mininews-container",
    'render_callback' => "viral_express_frontpage_mininews_content",
    'container_inclusive' => false
));

$wp_customize->selective_refresh->add_partial("viral_express_mininews_display_date", array(
    'selector' => ".ht-mininews-container",
    'render_callback' => "viral_express_frontpage_mininews_content",
    'container_inclusive' => false
));

$wp_customize->selective_refresh->add_partial("viral_express_mininews_post_count_big", array(
    'selector' => ".ht-mininews-container",
    'render_callback' => "viral_express_frontpage_mininews_content",
    'container_inclusive' => false
));

$wp_customize->selective_refresh->add_partial("viral_express_mininews_post_count", array(
    'selector' => ".ht-mininews-container",
    'render_callback' => "viral_express_frontpage_mininews_content",
    'container_inclusive' => false
));

$wp_customize->selective_refresh->add_partial("viral_express_mininews_style", array(
    'selector' => ".ht-mininews-container",
    'render_callback' => "viral_express_frontpage_mininews_content",
    'container_inclusive' => false
));

$wp_customize->selective_refresh->add_partial("viral_express_mininews_top_widget", array(
    'selector' => ".ht-mininews-container",
    'render_callback' => "viral_express_frontpage_mininews_content",
    'container_inclusive' => false
));

$wp_customize->selective_refresh->add_partial("viral_express_mininews_bottom_widget", array(
    'selector' => ".ht-mininews-container",
    'render_callback' => "viral_express_frontpage_mininews_content",
    'container_inclusive' => false
));

$wp_customize->selective_refresh->add_partial("viral_express_mininews_image_size", array(
    'selector' => ".ht-mininews-container",
    'render_callback' => "viral_express_frontpage_mininews_content",
    'container_inclusive' => false
));

/* ============FRONT PAGE SLIDER SECTION============ */
$wp_customize->add_section(new Viral_Express_Toggle_Section($wp_customize, 'viral_express_frontpage_slider1_section', array(
    'title' => esc_html__('Slider Module', 'viral-express'),
    'panel' => 'viral_express_front_page_panel',
    'priority' => viral_express_get_section_position('viral_express_frontpage_slider1_section'),
    'hiding_control' => 'viral_express_frontpage_slider1_section_disable'
)));

$wp_customize->add_setting('viral_express_frontpage_slider1_section_disable', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Express_Switch_Control($wp_customize, 'viral_express_frontpage_slider1_section_disable', array(
    'section' => 'viral_express_frontpage_slider1_section',
    'label' => esc_html__('Disable Section', 'viral-express'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-express'),
        'off' => esc_html__('No', 'viral-express')
    ),
    'class' => 'ht--switch-section',
    'priority' => -1,
)));


$wp_customize->add_setting('viral_express_frontpage_slider1_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Express_Tab_Control($wp_customize, 'viral_express_frontpage_slider1_nav', array(
    'section' => 'viral_express_frontpage_slider1_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-express'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'viral_express_frontpage_slider1_blocks',
                'viral_express_slider1_widget_heading',
                'viral_express_slider1_top_widget',
                'viral_express_slider1_bottom_widget'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-express'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'viral_express_slider1_cs_heading',
                'viral_express_slider1_title_color',
                'viral_express_slider1_text_color',
                'viral_express_slider1_link_color',
                'viral_express_slider1_block_color_seperator',
                'viral_express_slider1_overwrite_block_title_color',
                'viral_express_slider1_block_title_color',
                'viral_express_slider1_block_title_background_color',
                'viral_express_slider1_block_title_border_color'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-express'),
            'icon' => 'dashicons dashicons-admin-tools',
            'fields' => array(
                'viral_express_slider1_enable_fullwindow',
                'viral_express_slider1_align_item',
                'viral_express_slider1_fw_seperator',
                'viral_express_slider1_bg_type',
                'viral_express_slider1_bg_color',
                'viral_express_slider1_bg_gradient',
                'viral_express_slider1_bg_image',
                'viral_express_slider1_parallax_effect',
                'viral_express_slider1_bg_video',
                'viral_express_slider1_overlay_color',
                'viral_express_slider1_cs_seperator',
                'viral_express_slider1_padding',
                'viral_express_slider1_margin',
                'viral_express_slider1_seperator0',
                'viral_express_slider1_section_seperator',
                'viral_express_slider1_seperator1',
                'viral_express_slider1_top_seperator',
                'viral_express_slider1_ts_color',
                'viral_express_slider1_ts_height',
                'viral_express_slider1_seperator2',
                'viral_express_slider1_bottom_seperator',
                'viral_express_slider1_bs_color',
                'viral_express_slider1_bs_height'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_express_frontpage_slider1_blocks', array(
    'sanitize_callback' => 'viral_express_sanitize_repeater',
    'transport' => 'postMessage',
    'default' => json_encode(array(
        array(
            'title' => '',
            'category' => '',
            'layout' => 'style1',
            'display_cat' => 'yes',
            'display_author' => 'yes',
            'display_date' => 'yes',
            'post_count' => 5,
            'enable' => 'on'
        )
    ))
));

$wp_customize->add_control(new Viral_Express_Repeater_Control($wp_customize, 'viral_express_frontpage_slider1_blocks', array(
    'label' => esc_html__('Slider Blocks', 'viral-express'),
    'section' => 'viral_express_frontpage_slider1_section',
    'box_label' => esc_html__('News Section', 'viral-express'),
    'add_label' => esc_html__('Add Section', 'viral-express'),
), array(
    'title' => array(
        'type' => 'text',
        'label' => esc_html__('Title', 'viral-express'),
        'description' => esc_html__('Optional - Leave blank to hide Title', 'viral-express')
    ),
    'category' => array(
        'type' => 'taxonomycheckbox',
        'label' => esc_html__('Select Category', 'viral-express'),
        'default' => '',
        'taxonomy' => 'category',
        'description' => esc_html__('All latest post will display if no category is selected', 'viral-express')
    ),
    'layout' => array(
        'type' => 'selector',
        'label' => esc_html__('Layouts', 'viral-express'),
        'description' => esc_html__('Select the Block Layout', 'viral-express'),
        'options' => array(
            'style2' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/slider/style2.png',
            'style4' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/slider/style4.png',
        ),
        'default' => 'style2'
    ),
    'display_cat' => array(
        'type' => 'toggle',
        'label' => esc_html__('Display Categories', 'viral-express'),
        'default' => 'yes'
    ),
    'display_author' => array(
        'type' => 'toggle',
        'label' => esc_html__('Display Author', 'viral-express'),
        'default' => 'yes'
    ),
    'display_date' => array(
        'type' => 'toggle',
        'label' => esc_html__('Display Date', 'viral-express'),
        'default' => 'yes'
    ),
    'post_count' => array(
        'type' => 'range',
        'label' => esc_html__('No of Posts', 'viral-express'),
        'options' => array(
            'val' => 5,
            'min' => 1,
            'max' => 20,
            'step' => 1,
            'unit' => ''
        )
    ),
    'enable' => array(
        'type' => 'switch',
        'label' => esc_html__('Enable Section', 'viral-express'),
        'switch' => array(
            'on' => 'Yes',
            'off' => 'No'
        ),
        'default' => 'on'
    )
)));

$wp_customize->selective_refresh->add_partial("viral_express_frontpage_slider1_blocks", array(
    'selector' => ".ht-slider1-container",
    'render_callback' => "viral_express_frontpage_slider1_content",
    'container_inclusive' => false
));

$wp_customize->selective_refresh->add_partial("viral_express_slider1_top_widget", array(
    'selector' => ".ht-slider1-container",
    'render_callback' => "viral_express_frontpage_slider1_content",
    'container_inclusive' => false
));

$wp_customize->selective_refresh->add_partial("viral_express_slider1_bottom_widget", array(
    'selector' => ".ht-slider1-container",
    'render_callback' => "viral_express_frontpage_slider1_content",
    'container_inclusive' => false
));

/* ============FRONT PAGE NEWS SECTION - RIGHT SIDEBAR============ */
$wp_customize->add_section(new Viral_Express_Toggle_Section($wp_customize, 'viral_express_frontpage_leftnews_section', array(
    'title' => esc_html__('News Module - Right Sidebar', 'viral-express'),
    'panel' => 'viral_express_front_page_panel',
    'priority' => viral_express_get_section_position('viral_express_frontpage_leftnews_section'),
    'hiding_control' => 'viral_express_frontpage_leftnews_section_disable'
)));

$wp_customize->add_setting('viral_express_frontpage_leftnews_section_disable', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Express_Switch_Control($wp_customize, 'viral_express_frontpage_leftnews_section_disable', array(
    'section' => 'viral_express_frontpage_leftnews_section',
    'label' => esc_html__('Disable Section', 'viral-express'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-express'),
        'off' => esc_html__('No', 'viral-express')
    ),
    'class' => 'ht--switch-section',
    'priority' => -1,
)));


$wp_customize->add_setting('viral_express_frontpage_leftnews_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Express_Tab_Control($wp_customize, 'viral_express_frontpage_leftnews_nav', array(
    'section' => 'viral_express_frontpage_leftnews_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-express'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'viral_express_frontpage_leftnews_sticky_sidebar',
                'viral_express_frontpage_leftnews_blocks',
                'viral_express_leftnews_widget_heading',
                'viral_express_leftnews_top_widget',
                'viral_express_leftnews_bottom_widget'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-express'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'viral_express_leftnews_cs_heading',
                'viral_express_leftnews_title_color',
                'viral_express_leftnews_text_color',
                'viral_express_leftnews_link_color',
                'viral_express_leftnews_block_color_seperator',
                'viral_express_leftnews_overwrite_block_title_color',
                'viral_express_leftnews_block_title_color',
                'viral_express_leftnews_block_title_background_color',
                'viral_express_leftnews_block_title_border_color'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-express'),
            'icon' => 'dashicons dashicons-admin-tools',
            'fields' => array(
                'viral_express_leftnews_enable_fullwindow',
                'viral_express_leftnews_align_item',
                'viral_express_leftnews_fw_seperator',
                'viral_express_leftnews_bg_type',
                'viral_express_leftnews_bg_color',
                'viral_express_leftnews_bg_gradient',
                'viral_express_leftnews_bg_image',
                'viral_express_leftnews_parallax_effect',
                'viral_express_leftnews_bg_video',
                'viral_express_leftnews_overlay_color',
                'viral_express_leftnews_cs_seperator',
                'viral_express_leftnews_padding',
                'viral_express_leftnews_margin',
                'viral_express_leftnews_seperator0',
                'viral_express_leftnews_section_seperator',
                'viral_express_leftnews_seperator1',
                'viral_express_leftnews_top_seperator',
                'viral_express_leftnews_ts_color',
                'viral_express_leftnews_ts_height',
                'viral_express_leftnews_seperator2',
                'viral_express_leftnews_bottom_seperator',
                'viral_express_leftnews_bs_color',
                'viral_express_leftnews_bs_height'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_express_frontpage_leftnews_sticky_sidebar', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'transport' => 'postMessage',
    'default' => true
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_frontpage_leftnews_sticky_sidebar', array(
    'section' => 'viral_express_frontpage_leftnews_section',
    'label' => esc_html__('Sticky Sidebar', 'viral-express'),
    'description' => esc_html__('A sidebar will stick at the top on scrolling down', 'viral-express')
)));

$wp_customize->add_setting('viral_express_frontpage_leftnews_blocks', array(
    'sanitize_callback' => 'viral_express_sanitize_repeater',
    'transport' => 'postMessage',
    'default' => json_encode(array(
        array(
            'title' => esc_html__('Title', 'viral-express'),
            'category' => '',
            'layout' => 'style1',
            'display_cat' => 'yes',
            'display_author' => 'yes',
            'display_date' => 'yes',
            'enable' => 'on'
        )
    ))
));

$wp_customize->add_control(new Viral_Express_Repeater_Control($wp_customize, 'viral_express_frontpage_leftnews_blocks', array(
    'label' => esc_html__('News Blocks', 'viral-express'),
    'section' => 'viral_express_frontpage_leftnews_section',
    'settings' => 'viral_express_frontpage_leftnews_blocks',
    'box_label' => esc_html__('News Section', 'viral-express'),
    'add_label' => esc_html__('Add Section', 'viral-express'),
), array(
    'title' => array(
        'type' => 'text',
        'label' => esc_html__('Title', 'viral-express'),
        'default' => esc_html__('Title', 'viral-express'),
        'description' => esc_html__('Optional - Leave blank to hide Title', 'viral-express')
    ),
    'category' => array(
        'type' => 'taxonomycheckbox',
        'label' => esc_html__('Select Category', 'viral-express'),
        'default' => '',
        'taxonomy' => 'category',
        'description' => esc_html__('All latest post will display if no category is selected', 'viral-express')
    ),
    'layout' => array(
        'type' => 'selector',
        'label' => esc_html__('Layouts', 'viral-express'),
        'class' => 'ht--one-third-width',
        'description' => esc_html__('Select the Block Layout', 'viral-express'),
        'options' => array(
            'style1' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/news/style1.png',
            'style2' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/news/style2.png',
            'style3' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/news/style3.png',
            'style8' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/news/style8.png',
            'style9' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/news/style9.png',
            'style10' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/news/style10.png',
        ),
        'default' => 'style1'
    ),
    'display_cat' => array(
        'type' => 'toggle',
        'label' => esc_html__('Display Category', 'viral-express'),
        'default' => 'yes'
    ),
    'display_author' => array(
        'type' => 'toggle',
        'label' => esc_html__('Display Author', 'viral-express'),
        'default' => 'yes'
    ),
    'display_date' => array(
        'type' => 'toggle',
        'label' => esc_html__('Display Date', 'viral-express'),
        'default' => 'yes'
    ),
    'enable' => array(
        'type' => 'switch',
        'label' => esc_attr__('Enable Section', 'viral-express'),
        'switch' => array(
            'on' => 'Yes',
            'off' => 'No'
        ),
        'default' => 'on'
    )
)));

$wp_customize->selective_refresh->add_partial("viral_express_frontpage_leftnews_blocks", array(
    'selector' => ".ht-leftnews-container",
    'render_callback' => "viral_express_frontpage_leftnews_content",
    'container_inclusive' => false
));

$wp_customize->selective_refresh->add_partial("viral_express_frontpage_leftnews_sticky_sidebar", array(
    'selector' => ".ht-leftnews-section",
    'render_callback' => "viral_express_frontpage_leftnews_section",
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial("viral_express_leftnews_top_widget", array(
    'selector' => ".ht-leftnews-section",
    'render_callback' => "viral_express_frontpage_leftnews_section",
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial("viral_express_leftnews_bottom_widget", array(
    'selector' => ".ht-leftnews-section",
    'render_callback' => "viral_express_frontpage_leftnews_section",
    'container_inclusive' => true
));

/* ============FRONT PAGE NEWS SECTION - LEFT SIDEBAR============ */
$wp_customize->add_section(new Viral_Express_Toggle_Section($wp_customize, 'viral_express_frontpage_rightnews_section', array(
    'title' => esc_html__('News Module - Left Sidebar', 'viral-express'),
    'panel' => 'viral_express_front_page_panel',
    'priority' => viral_express_get_section_position('viral_express_frontpage_rightnews_section'),
    'hiding_control' => 'viral_express_frontpage_rightnews_section_disable'
)));

$wp_customize->add_setting('viral_express_frontpage_rightnews_section_disable', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Express_Switch_Control($wp_customize, 'viral_express_frontpage_rightnews_section_disable', array(
    'section' => 'viral_express_frontpage_rightnews_section',
    'label' => esc_html__('Disable Section', 'viral-express'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-express'),
        'off' => esc_html__('No', 'viral-express')
    ),
    'class' => 'ht--switch-section',
    'priority' => -1,
)));

$wp_customize->add_setting('viral_express_frontpage_rightnews_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Express_Tab_Control($wp_customize, 'viral_express_frontpage_rightnews_nav', array(
    'section' => 'viral_express_frontpage_rightnews_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-express'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'viral_express_frontpage_rightnews_sticky_sidebar',
                'viral_express_frontpage_rightnews_blocks',
                'viral_express_rightnews_widget_heading',
                'viral_express_rightnews_top_widget',
                'viral_express_rightnews_bottom_widget'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-express'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'viral_express_rightnews_cs_heading',
                'viral_express_rightnews_title_color',
                'viral_express_rightnews_text_color',
                'viral_express_rightnews_link_color',
                'viral_express_rightnews_block_color_seperator',
                'viral_express_rightnews_overwrite_block_title_color',
                'viral_express_rightnews_block_title_color',
                'viral_express_rightnews_block_title_background_color',
                'viral_express_rightnews_block_title_border_color'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-express'),
            'icon' => 'dashicons dashicons-admin-tools',
            'fields' => array(
                'viral_express_rightnews_enable_fullwindow',
                'viral_express_rightnews_align_item',
                'viral_express_rightnews_fw_seperator',
                'viral_express_rightnews_bg_type',
                'viral_express_rightnews_bg_color',
                'viral_express_rightnews_bg_gradient',
                'viral_express_rightnews_bg_image',
                'viral_express_rightnews_parallax_effect',
                'viral_express_rightnews_bg_video',
                'viral_express_rightnews_overlay_color',
                'viral_express_rightnews_cs_seperator',
                'viral_express_rightnews_padding',
                'viral_express_rightnews_margin',
                'viral_express_rightnews_seperator0',
                'viral_express_rightnews_section_seperator',
                'viral_express_rightnews_seperator1',
                'viral_express_rightnews_top_seperator',
                'viral_express_rightnews_ts_color',
                'viral_express_rightnews_ts_height',
                'viral_express_rightnews_seperator2',
                'viral_express_rightnews_bottom_seperator',
                'viral_express_rightnews_bs_color',
                'viral_express_rightnews_bs_height'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_express_frontpage_rightnews_sticky_sidebar', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'transport' => 'postMessage',
    'default' => true
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_frontpage_rightnews_sticky_sidebar', array(
    'section' => 'viral_express_frontpage_rightnews_section',
    'label' => esc_html__('Sticky Sidebar', 'viral-express'),
    'description' => esc_html__('A sidebar will stick at the top on scrolling down', 'viral-express')
)));

$wp_customize->add_setting('viral_express_frontpage_rightnews_blocks', array(
    'sanitize_callback' => 'viral_express_sanitize_repeater',
    'transport' => 'postMessage',
    'default' => json_encode(array(
        array(
            'title' => esc_html__('Title', 'viral-express'),
            'category' => '',
            'layout' => 'style1',
            'display_cat' => 'yes',
            'display_author' => 'yes',
            'display_date' => 'yes',
            'enable' => 'on'
        )
    ))
));

$wp_customize->add_control(new Viral_Express_Repeater_Control($wp_customize, 'viral_express_frontpage_rightnews_blocks', array(
    'label' => esc_html__('News Blocks', 'viral-express'),
    'section' => 'viral_express_frontpage_rightnews_section',
    'settings' => 'viral_express_frontpage_rightnews_blocks',
    'box_label' => esc_html__('News Section', 'viral-express'),
    'add_label' => esc_html__('Add Section', 'viral-express'),
), array(
    'title' => array(
        'type' => 'text',
        'label' => esc_html__('Title', 'viral-express'),
        'default' => esc_html__('Title', 'viral-express'),
        'description' => esc_html__('Optional - Leave blank to hide Title', 'viral-express')
    ),
    'category' => array(
        'type' => 'taxonomycheckbox',
        'label' => esc_html__('Select Category', 'viral-express'),
        'default' => '',
        'taxonomy' => 'category',
        'description' => esc_html__('All latest post will display if no category is selected', 'viral-express')
    ),
    'layout' => array(
        'type' => 'selector',
        'label' => esc_html__('Layouts', 'viral-express'),
        'class' => 'ht--one-third-width',
        'description' => esc_html__('Select the Block Layout', 'viral-express'),
        'options' => array(
            'style1' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/news/style1.png',
            'style2' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/news/style2.png',
            'style3' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/news/style3.png',
            'style8' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/news/style8.png',
            'style9' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/news/style9.png',
            'style10' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/news/style10.png',
        ),
        'default' => 'style1'
    ),
    'display_cat' => array(
        'type' => 'toggle',
        'label' => esc_html__('Display Category', 'viral-express'),
        'default' => 'yes'
    ),
    'display_author' => array(
        'type' => 'toggle',
        'label' => esc_html__('Display Author', 'viral-express'),
        'default' => 'yes'
    ),
    'display_date' => array(
        'type' => 'toggle',
        'label' => esc_html__('Display Date', 'viral-express'),
        'default' => 'yes'
    ),
    'enable' => array(
        'type' => 'switch',
        'label' => esc_attr__('Enable Section', 'viral-express'),
        'switch' => array(
            'on' => 'Yes',
            'off' => 'No'
        ),
        'default' => 'on'
    )
)));

$wp_customize->selective_refresh->add_partial("viral_express_frontpage_rightnews_blocks", array(
    'selector' => ".ht-rightnews-container",
    'render_callback' => "viral_express_frontpage_rightnews_content",
    'container_inclusive' => false
));

$wp_customize->selective_refresh->add_partial("viral_express_frontpage_rightnews_sticky_sidebar", array(
    'selector' => ".ht-rightnews-section",
    'render_callback' => "viral_express_frontpage_rightnews_section",
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial("viral_express_rightnews_top_widget", array(
    'selector' => ".ht-rightnews-section",
    'render_callback' => "viral_express_frontpage_rightnews_section",
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial("viral_express_rightnews_bottom_widget", array(
    'selector' => ".ht-rightnews-section",
    'render_callback' => "viral_express_frontpage_rightnews_section",
    'container_inclusive' => true
));

/* ============FRONT PAGE CAROUSEL SECTION============ */
$wp_customize->add_section(new Viral_Express_Toggle_Section($wp_customize, 'viral_express_frontpage_carousel1_section', array(
    'title' => esc_html__('Carousel Module', 'viral-express'),
    'panel' => 'viral_express_front_page_panel',
    'priority' => viral_express_get_section_position('viral_express_frontpage_carousel1_section'),
    'hiding_control' => 'viral_express_frontpage_carousel1_section_disable'
)));

$wp_customize->add_setting('viral_express_frontpage_carousel1_section_disable', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Express_Switch_Control($wp_customize, 'viral_express_frontpage_carousel1_section_disable', array(
    'section' => 'viral_express_frontpage_carousel1_section',
    'label' => esc_html__('Disable Section', 'viral-express'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-express'),
        'off' => esc_html__('No', 'viral-express')
    ),
    'class' => 'ht--switch-section',
    'priority' => -1,
)));

$wp_customize->add_setting('viral_express_frontpage_carousel1_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Express_Tab_Control($wp_customize, 'viral_express_frontpage_carousel1_nav', array(
    'section' => 'viral_express_frontpage_carousel1_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-express'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'viral_express_frontpage_carousel1_blocks',
                'viral_express_carousel1_widget_heading',
                'viral_express_carousel1_top_widget',
                'viral_express_carousel1_bottom_widget'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-express'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'viral_express_carousel1_cs_heading',
                'viral_express_carousel1_title_color',
                'viral_express_carousel1_text_color',
                'viral_express_carousel1_link_color',
                'viral_express_carousel1_block_color_seperator',
                'viral_express_carousel1_overwrite_block_title_color',
                'viral_express_carousel1_block_title_color',
                'viral_express_carousel1_block_title_background_color',
                'viral_express_carousel1_block_title_border_color'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-express'),
            'icon' => 'dashicons dashicons-admin-tools',
            'fields' => array(
                'viral_express_carousel1_enable_fullwindow',
                'viral_express_carousel1_align_item',
                'viral_express_carousel1_fw_seperator',
                'viral_express_carousel1_bg_type',
                'viral_express_carousel1_bg_color',
                'viral_express_carousel1_bg_gradient',
                'viral_express_carousel1_bg_image',
                'viral_express_carousel1_parallax_effect',
                'viral_express_carousel1_bg_video',
                'viral_express_carousel1_overlay_color',
                'viral_express_carousel1_cs_seperator',
                'viral_express_carousel1_padding',
                'viral_express_carousel1_margin',
                'viral_express_carousel1_seperator0',
                'viral_express_carousel1_section_seperator',
                'viral_express_carousel1_seperator1',
                'viral_express_carousel1_top_seperator',
                'viral_express_carousel1_ts_color',
                'viral_express_carousel1_ts_height',
                'viral_express_carousel1_seperator2',
                'viral_express_carousel1_bottom_seperator',
                'viral_express_carousel1_bs_color',
                'viral_express_carousel1_bs_height'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_express_frontpage_carousel1_blocks', array(
    'sanitize_callback' => 'viral_express_sanitize_repeater',
    'transport' => 'postMessage',
    'default' => json_encode(array(
        array(
            'title' => '',
            'category' => '',
            'layout' => 'style1',
            'display_cat' => 'yes',
            'display_author' => 'yes',
            'display_date' => 'yes',
            'post_count' => 5,
            'slide_count' => 4,
            'slide_pause' => 5,
            'auto_slide' => 'on',
            'image_size' => 'viral-express-650x500',
            'title_size' => 'vl-small-title',
            'gap' => '20',
            'enable' => 'on'
        )
    ))
));

$wp_customize->add_control(new Viral_Express_Repeater_Control($wp_customize, 'viral_express_frontpage_carousel1_blocks', array(
    'label' => esc_html__('Carousel Blocks', 'viral-express'),
    'section' => 'viral_express_frontpage_carousel1_section',
    'settings' => 'viral_express_frontpage_carousel1_blocks',
    'box_label' => esc_html__('News Section', 'viral-express'),
    'add_label' => esc_html__('Add Section', 'viral-express'),
), array(
    'title' => array(
        'type' => 'text',
        'label' => esc_html__('Title', 'viral-express'),
        'description' => esc_html__('Optional - Leave blank to hide Title', 'viral-express')
    ),
    'category' => array(
        'type' => 'taxonomycheckbox',
        'label' => esc_html__('Select Category', 'viral-express'),
        'default' => '',
        'taxonomy' => 'category',
        'description' => esc_html__('All latest post will display if no category is selected', 'viral-express')
    ),
    'layout' => array(
        'type' => 'selector',
        'label' => esc_html__('Layouts', 'viral-express'),
        'description' => esc_html__('Select the Block Layout', 'viral-express'),
        'options' => array(
            'style2' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/carousel/style2.png',
            'style3' => VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/images/carousel/style3.png',
        ),
        'default' => 'style2'
    ),
    'display_cat' => array(
        'type' => 'toggle',
        'label' => esc_html__('Display Category', 'viral-express'),
        'default' => 'yes'
    ),
    'display_author' => array(
        'type' => 'toggle',
        'label' => esc_html__('Display Author', 'viral-express'),
        'default' => 'yes'
    ),
    'display_date' => array(
        'type' => 'toggle',
        'label' => esc_html__('Display Date', 'viral-express'),
        'default' => 'yes'
    ),
    'post_count' => array(
        'type' => 'range',
        'label' => esc_html__('No of Posts', 'viral-express'),
        'options' => array(
            'val' => 5,
            'min' => 2,
            'max' => 20,
            'step' => 1,
            'unit' => ''
        )
    ),
    'slide_count' => array(
        'type' => 'range',
        'label' => esc_html__('No of slides', 'viral-express'),
        'options' => array(
            'val' => 4,
            'min' => 2,
            'max' => 6,
            'step' => 1,
            'unit' => ''
        )
    ),
    'slide_pause' => array(
        'type' => 'range',
        'label' => esc_html__('Slides Pause Duration(Seconds)', 'viral-express'),
        'options' => array(
            'val' => 5,
            'min' => 4,
            'max' => 20,
            'step' => 1,
            'unit' => ''
        )
    ),
    'auto_slide' => array(
        'type' => 'toggle',
        'label' => esc_html__('Auto Slide', 'viral-express'),
        'default' => 'yes'
    ),
    'image_size' => array(
        'type' => 'select',
        'label' => esc_html__('Image Size', 'viral-express'),
        'options' => viral_express_get_image_sizes(),
        'default' => 'viral-express-650x500'
    ),
    'title_size' => array(
        'type' => 'select',
        'label' => esc_html__('Title Font Size', 'viral-express'),
        'options' => array(
            'vl-small-title' => esc_html__('Normal', 'viral-express'),
            'vl-mid-title' => esc_html__('Medium', 'viral-express'),
            'vl-big-title' => esc_html__('Big', 'viral-express'),
        ),
        'default' => 'vl-small-title'
    ),
    'gap' => array(
        'type' => 'select',
        'label' => esc_html__('Space Between Slides', 'viral-express'),
        'options' => array(
            '0' => esc_html__('No Space', 'viral-express'),
            '10' => esc_html__('10px', 'viral-express'),
            '20' => esc_html__('20px', 'viral-express'),
            '30' => esc_html__('30px', 'viral-express'),
        ),
        'default' => '20'
    ),
    'enable' => array(
        'type' => 'switch',
        'label' => esc_html__('Enable Section', 'viral-express'),
        'switch' => array(
            'on' => 'Yes',
            'off' => 'No'
        ),
        'default' => 'on'
    )
)));

$wp_customize->selective_refresh->add_partial("viral_express_frontpage_carousel1_blocks", array(
    'selector' => ".ht-carousel1-container",
    'render_callback' => "viral_express_frontpage_carousel1_content",
    'container_inclusive' => false
));

$wp_customize->selective_refresh->add_partial("viral_express_carousel1_top_widget", array(
    'selector' => ".ht-carousel1-container",
    'render_callback' => "viral_express_frontpage_carousel1_content",
    'container_inclusive' => false
));

$wp_customize->selective_refresh->add_partial("viral_express_carousel1_bottom_widget", array(
    'selector' => ".ht-carousel1-container",
    'render_callback' => "viral_express_frontpage_carousel1_content",
    'container_inclusive' => false
));

/* ============DESIGN SETTINGS============ */

$home_sections = viral_express_frontpage_sections();

foreach ($home_sections as $home_section) {
    $id = str_replace(array('viral_express_frontpage_', '_section'), array('', ''), $home_section);

    $wp_customize->add_setting("viral_express_{$id}_bg_type", array(
        'default' => 'color-bg',
        'sanitize_callback' => 'viral_express_sanitize_choices',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control("viral_express_{$id}_bg_type", array(
        'section' => "viral_express_frontpage_{$id}_section",
        'type' => 'select',
        'label' => esc_html__('Background Type', 'viral-express'),
        'choices' => array(
            'color-bg' => esc_html__('Color Background', 'viral-express'),
            'image-bg' => esc_html__('Image Background', 'viral-express'),
        ),
        'priority' => 15
    ));

    $wp_customize->add_setting("viral_express_{$id}_bg_color", array(
        'default' => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "viral_express_{$id}_bg_color", array(
        'section' => "viral_express_frontpage_{$id}_section",
        'label' => esc_html__('Background Color', 'viral-express'),
        'priority' => 20
    )));

    $wp_customize->add_setting("viral_express_{$id}_bg_image_url", array(
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_express_{$id}_bg_image_id", array(
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_express_{$id}_bg_image_repeat", array(
        'default' => 'no-repeat',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_express_{$id}_bg_image_size", array(
        'default' => 'cover',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_express_{$id}_bg_position", array(
        'default' => 'center-center',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_express_{$id}_bg_image_attach", array(
        'default' => 'fixed',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Viral_Express_Background_Image_Control($wp_customize, "viral_express_{$id}_bg_image", array(
        'label' => esc_html__('Background Image', 'viral-express'),
        'section' => "viral_express_frontpage_{$id}_section",
        'settings' => array(
            'image_url' => "viral_express_{$id}_bg_image_url",
            'image_id' => "viral_express_{$id}_bg_image_id",
            'repeat' => "viral_express_{$id}_bg_image_repeat", // Use false to hide the field
            'size' => "viral_express_{$id}_bg_image_size",
            'position' => "viral_express_{$id}_bg_position",
            'attachment' => "viral_express_{$id}_bg_image_attach"
        ),
        'priority' => 30
    )));

    $wp_customize->add_setting("viral_express_{$id}_overlay_color", array(
        'default' => 'rgba(255,255,255,0)',
        'sanitize_callback' => 'viral_express_sanitize_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Viral_Express_Alpha_Color_Control($wp_customize, "viral_express_{$id}_overlay_color", array(
        'label' => esc_html__('Background Overlay Color', 'viral-express'),
        'section' => "viral_express_frontpage_{$id}_section",
        'priority' => 45
    )));

    $wp_customize->add_setting("viral_express_{$id}_cs_heading", array(
        'sanitize_callback' => 'viral_express_sanitize_text'
    ));

    $wp_customize->add_control(new Viral_Express_Heading_Control($wp_customize, "viral_express_{$id}_cs_heading", array(
        'section' => "viral_express_frontpage_{$id}_section",
        'label' => esc_html__('Color Settings', 'viral-express'),
        'priority' => 50
    )));

    $wp_customize->add_setting("viral_express_{$id}_title_color", array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "viral_express_{$id}_title_color", array(
        'section' => "viral_express_frontpage_{$id}_section",
        'label' => esc_html__('Section Title Color(H1, H2, H3, H4, H5, H6)', 'viral-express'),
        'priority' => 55
    )));

    $wp_customize->add_setting("viral_express_{$id}_text_color", array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "viral_express_{$id}_text_color", array(
        'section' => "viral_express_frontpage_{$id}_section",
        'label' => esc_html__('Section Text Color', 'viral-express'),
        'priority' => 55
    )));

    $wp_customize->add_setting("viral_express_{$id}_link_color", array(
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "viral_express_{$id}_link_color", array(
        'section' => "viral_express_frontpage_{$id}_section",
        'label' => esc_html__('Section Link Color', 'viral-express'),
        'priority' => 55
    )));

    $wp_customize->add_setting("viral_express_{$id}_block_color_seperator", array(
        'sanitize_callback' => 'viral_express_sanitize_text'
    ));

    $wp_customize->add_control(new Viral_Express_Separator_Control($wp_customize, "viral_express_{$id}_block_color_seperator", array(
        'section' => "viral_express_frontpage_{$id}_section",
        'priority' => 55
    )));

    $wp_customize->add_setting("viral_express_{$id}_overwrite_block_title_color", array(
        'sanitize_callback' => 'viral_express_sanitize_text',
        'default' => false,
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, "viral_express_{$id}_overwrite_block_title_color", array(
        'section' => "viral_express_frontpage_{$id}_section",
        'priority' => 55,
        'label' => esc_html__('OverWrite Block Title Colors', 'viral-express')
    )));

    $wp_customize->add_setting("viral_express_{$id}_block_title_color", array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "viral_express_{$id}_block_title_color", array(
        'section' => "viral_express_frontpage_{$id}_section",
        'priority' => 55,
        'label' => esc_html__('Block Title Color', 'viral-express')
    )));

    $wp_customize->add_setting("viral_express_{$id}_block_title_background_color", array(
        'default' => '#f97c00',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "viral_express_{$id}_block_title_background_color", array(
        'section' => "viral_express_frontpage_{$id}_section",
        'priority' => 55,
        'label' => esc_html__('Block Title Background Color', 'viral-express')
    )));

    $wp_customize->add_setting("viral_express_{$id}_block_title_border_color", array(
        'default' => '#f97c00',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "viral_express_{$id}_block_title_border_color", array(
        'section' => "viral_express_frontpage_{$id}_section",
        'priority' => 55,
        'label' => esc_html__('Block Title Border Color', 'viral-express')
    )));

    $wp_customize->add_setting("viral_express_{$id}_cs_seperator", array(
        'sanitize_callback' => 'viral_express_sanitize_text'
    ));

    $wp_customize->add_control(new Viral_Express_Separator_Control($wp_customize, "viral_express_{$id}_cs_seperator", array(
        'section' => "viral_express_frontpage_{$id}_section",
        'priority' => 80
    )));

    $wp_customize->add_setting("viral_express_{$id}_padding_top", array(
        'sanitize_callback' => 'viral_express_sanitize_number_blank',
        'default' => 20,
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_express_{$id}_padding_bottom", array(
        'sanitize_callback' => 'viral_express_sanitize_number_blank',
        'default' => 20,
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_express_{$id}_tablet_padding_top", array(
        'sanitize_callback' => 'viral_express_sanitize_number_blank',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_express_{$id}_tablet_padding_bottom", array(
        'sanitize_callback' => 'viral_express_sanitize_number_blank',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_express_{$id}_mobile_padding_top", array(
        'sanitize_callback' => 'viral_express_sanitize_number_blank',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_express_{$id}_mobile_padding_bottom", array(
        'sanitize_callback' => 'viral_express_sanitize_number_blank',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Viral_Express_Dimensions_Control($wp_customize, "viral_express_{$id}_padding", array(
        'section' => "viral_express_frontpage_{$id}_section",
        'label' => esc_html__('Top & Bottom Paddings (px)', 'viral-express'),
        'settings' => array(
            'desktop_top' => "viral_express_{$id}_padding_top",
            'desktop_bottom' => "viral_express_{$id}_padding_bottom",
            'tablet_top' => "viral_express_{$id}_tablet_padding_top",
            'tablet_bottom' => "viral_express_{$id}_tablet_padding_bottom",
            'mobile_top' => "viral_express_{$id}_mobile_padding_top",
            'mobile_bottom' => "viral_express_{$id}_mobile_padding_bottom",
        ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 400,
            'step' => 1,
        ),
        'priority' => 85
    )));

    $wp_customize->add_setting("viral_express_{$id}_margin_top", array(
        'sanitize_callback' => 'viral_express_sanitize_number_blank',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_express_{$id}_margin_bottom", array(
        'sanitize_callback' => 'viral_express_sanitize_number_blank',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_express_{$id}_tablet_margin_top", array(
        'sanitize_callback' => 'viral_express_sanitize_number_blank',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_express_{$id}_tablet_margin_bottom", array(
        'sanitize_callback' => 'viral_express_sanitize_number_blank',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_express_{$id}_mobile_margin_top", array(
        'sanitize_callback' => 'viral_express_sanitize_number_blank',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_express_{$id}_mobile_margin_bottom", array(
        'sanitize_callback' => 'viral_express_sanitize_number_blank',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Viral_Express_Dimensions_Control($wp_customize, "viral_express_{$id}_margin", array(
        'section' => "viral_express_frontpage_{$id}_section",
        'label' => esc_html__('Top & Bottom Margin (px)', 'viral-express'),
        'settings' => array(
            'desktop_top' => "viral_express_{$id}_margin_top",
            'desktop_bottom' => "viral_express_{$id}_margin_bottom",
            'tablet_top' => "viral_express_{$id}_tablet_margin_top",
            'tablet_bottom' => "viral_express_{$id}_tablet_margin_bottom",
            'mobile_top' => "viral_express_{$id}_mobile_margin_top",
            'mobile_bottom' => "viral_express_{$id}_mobile_margin_bottom",
        ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 400,
            'step' => 1,
        ),
        'priority' => 85
    )));

    $wp_customize->selective_refresh->add_partial("viral_express_{$id}_bg_type", array(
        'selector' => "#ht-{$id}-section",
        'render_callback' => "viral_express_frontpage_{$id}_section",
        'container_inclusive' => true
    ));

    $wp_customize->selective_refresh->add_partial("viral_express_{$id}_parallax_effect", array(
        'selector' => "#ht-{$id}-section",
        'render_callback' => "viral_express_frontpage_{$id}_section",
        'container_inclusive' => true
    ));

    $wp_customize->selective_refresh->add_partial("viral_express_{$id}_section_seperator", array(
        'selector' => "#ht-{$id}-section",
        'render_callback' => "viral_express_frontpage_{$id}_section",
        'container_inclusive' => true
    ));

    $wp_customize->selective_refresh->add_partial("viral_express_{$id}_top_seperator", array(
        'selector' => "#ht-{$id}-section",
        'render_callback' => "viral_express_frontpage_{$id}_section",
        'container_inclusive' => true
    ));

    $wp_customize->selective_refresh->add_partial("viral_express_{$id}_bottom_seperator", array(
        'selector' => "#ht-{$id}-section",
        'render_callback' => "viral_express_frontpage_{$id}_section",
        'container_inclusive' => true
    ));
}