<?php

/**
 * Viral Express Theme Customizer
 *
 * @package Viral Express
 */
/* GENERAL SETTINGS PANEL */
$wp_customize->add_panel('viral_express_general_settings_panel', array(
    'title' => esc_html__('General Settings', 'viral-express'),
    'priority' => 1
));

//GENERAL SETTINGS
$wp_customize->add_section('viral_express_general_options_section', array(
    'title' => esc_html__('General Options', 'viral-express'),
    'panel' => 'viral_express_general_settings_panel'
));

//MOVE BACKGROUND AND COLOR SETTING INTO GENERAL SETTING SECTION
$wp_customize->get_control('background_image')->section = 'viral_express_general_options_section';
$wp_customize->get_control('background_color')->section = 'viral_express_general_options_section';
$wp_customize->get_control('background_preset')->section = 'viral_express_general_options_section';
$wp_customize->get_control('background_position')->section = 'viral_express_general_options_section';
$wp_customize->get_control('background_size')->section = 'viral_express_general_options_section';
$wp_customize->get_control('background_repeat')->section = 'viral_express_general_options_section';
$wp_customize->get_control('background_attachment')->section = 'viral_express_general_options_section';

$wp_customize->get_control('background_color')->priority = 20;
$wp_customize->get_control('background_image')->priority = 20;
$wp_customize->get_control('background_preset')->priority = 20;
$wp_customize->get_control('background_position')->priority = 20;
$wp_customize->get_control('background_size')->priority = 20;
$wp_customize->get_control('background_repeat')->priority = 20;
$wp_customize->get_control('background_attachment')->priority = 20;

$wp_customize->add_setting('viral_express_website_layout', array(
    'default' => 'wide',
    'sanitize_callback' => 'viral_express_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_express_website_layout', array(
    'section' => 'viral_express_general_options_section',
    'type' => 'radio',
    'label' => esc_html__('Website Layout', 'viral-express'),
    'choices' => array(
        'wide' => esc_html__('Wide', 'viral-express'),
        'boxed' => esc_html__('Boxed', 'viral-express'),
        'fluid' => esc_html__('Fluid', 'viral-express')
    )
));


$wp_customize->add_setting('viral_express_fluid_container_width', array(
    'sanitize_callback' => 'absint',
    'default' => 80,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Range_Slider_Control($wp_customize, 'viral_express_fluid_container_width', array(
    'section' => 'viral_express_general_options_section',
    'label' => esc_html__('Website Container Width (%)', 'viral-express'),
    'input_attrs' => array(
        'min' => 20,
        'max' => 100,
        'step' => 1
    )
)));

$wp_customize->add_setting('viral_express_website_width', array(
    'sanitize_callback' => 'absint',
    'default' => 1170,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Range_Slider_Control($wp_customize, 'viral_express_website_width', array(
    'section' => 'viral_express_general_options_section',
    'label' => esc_html__('Website Container Width (px)', 'viral-express'),
    'input_attrs' => array(
        'min' => 900,
        'max' => 1800,
        'step' => 10
    )
)));

$wp_customize->add_setting('viral_express_container_padding', array(
    'sanitize_callback' => 'absint',
    'default' => 40,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Range_Slider_Control($wp_customize, 'viral_express_container_padding', array(
    'section' => 'viral_express_general_options_section',
    'label' => esc_html__('Website Container Padding (px)', 'viral-express'),
    'input_attrs' => array(
        'min' => 10,
        'max' => 200,
        'step' => 5
    )
)));

$wp_customize->add_setting('viral_express_sidebar_width', array(
    'sanitize_callback' => 'absint',
    'default' => 30,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Range_Slider_Control($wp_customize, 'viral_express_sidebar_width', array(
    'section' => 'viral_express_general_options_section',
    'label' => esc_html__('Sidebar Width (%)', 'viral-express'),
    'input_attrs' => array(
        'min' => 20,
        'max' => 50,
        'step' => 1
    )
)));

$wp_customize->add_setting('viral_express_scroll_animation_seperator', array(
    'sanitize_callback' => 'viral_express_sanitize_text'
));

$wp_customize->add_control(new Viral_Express_Separator_Control($wp_customize, 'viral_express_scroll_animation_seperator', array(
    'section' => 'viral_express_general_options_section'
)));

$wp_customize->add_setting('viral_express_background_heading', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
));

$wp_customize->add_control(new Viral_Express_Heading_Control($wp_customize, 'viral_express_background_heading', array(
    'section' => 'viral_express_general_options_section',
    'label' => esc_html__('Background', 'viral-express'),
)));

/* GOOGLE FONT SECTION */
$wp_customize->add_section('viral_express_google_font_section', array(
    'title' => esc_html__('Google Fonts', 'viral-express'),
    'panel' => 'viral_express_general_settings_panel',
    'priority' => 1000
));

$wp_customize->add_setting('viral_express_load_google_font_locally', array(
    'sanitize_callback' => 'viral_express_sanitize_text',
    'default' => 'off',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Switch_Control($wp_customize, 'viral_express_load_google_font_locally', array(
    'section' => 'viral_express_google_font_section',
    'label' => esc_html__('Load Google Fonts Locally', 'viral-express'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-express'),
        'off' => esc_html__('No', 'viral-express')
    ),
    'description' => esc_html__('It is required to load the Google Fonts locally in order to comply with GDPR. However, if your website is not required to comply with Google Fonts then you can check this field off. Loading the Fonts locally with lots of different Google fonts can decrease the speed of the website slightly.', 'viral-express'),
)));

/* SEO SECTION */
$wp_customize->add_section('viral_express_seo_section', array(
    'title' => esc_html__('SEO', 'viral-express'),
    'panel' => 'viral_express_general_settings_panel',
    'priority' => 1000
));

$wp_customize->add_setting('viral_express_schema_markup', array(
    'sanitize_callback' => 'viral_express_sanitize_checkbox',
    'default' => false,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_schema_markup', array(
    'section' => 'viral_express_seo_section',
    'label' => esc_html__('Schema.org Markup', 'viral-express'),
    'description' => esc_html__('Enable Schema.org markup feature for your site. You can disable this option if if you use a SEO plugin.', 'viral-express'),
)));


/* ============PRO FEATURES============ */

$wp_customize->add_section(new Viral_Express_Upgrade_Section($wp_customize, 'viral-express-pro-section', array(
    'priority' => -10,
    //'title' => esc_html__('Christmas & New Year Discount!', 'viral-express'),
    'upgrade_text' => esc_html__('Upgrade to Pro', 'viral-express'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/?utm_source=wordpress&utm_medium=viral-express-customizer-button&utm_campaign=viral-express-upgrade'
)));

$wp_customize->add_section(new Viral_Express_Upgrade_Section($wp_customize, 'viral-express-doc-section', array(
    'title' => esc_html__('Documentation', 'viral-express'),
    'priority' => 1000,
    'upgrade_text' => esc_html__('View', 'viral-express'),
    'upgrade_url' => 'https://hashthemes.com/documentation/viral-mag-documentation/'
)));

$wp_customize->add_section(new Viral_Express_Upgrade_Section($wp_customize, 'viral-express-demo-import-section', array(
    'title' => esc_html__('Import Demo Content', 'viral-express'),
    'priority' => 999,
    'upgrade_text' => esc_html__('Import', 'viral-express'),
    'upgrade_url' => admin_url('admin.php?page=viral-express-welcome')
)));

$viral_pro_features = '<ul class="upsell-features">
	<li>' . esc_html__("14 more demos that can be imported with one click", "viral-express") . '</li>
        <li>' . esc_html__("Elementor compatible - Built your Home Page with Customizer or Elementor whichever you like", "viral-express") . '</li>
	<li>' . esc_html__("50+ magazine blocks for customizer", "viral-express") . '</li>
	<li>' . esc_html__("Customizer home page section reorder", "viral-express") . '</li>
	<li>' . esc_html__("45+ magazine widgets for Elementor", "viral-express") . '</li>
        <li>' . esc_html__("Ajax Tabs and Ajax Paginations for all Elementor widgets", "viral-express") . '</li>
	<li>' . esc_html__("7 header layouts with advanced settings", "viral-express") . '</li>
        <li>' . esc_html__("7 differently designed Blog/Archive layouts", "viral-express") . '</li>
	<li>' . esc_html__("7 differently designed Article/Post layouts", "viral-express") . '</li>
	<li>' . esc_html__("22 custom widgets", "viral-express") . '</li>
	<li>' . esc_html__("GDPR compliance & cookies consent", "viral-express") . '</li>
	<li>' . esc_html__("In-built megaMenu", "viral-express") . '</li>
	<li>' . esc_html__("Advanced typography options", "viral-express") . '</li>
	<li>' . esc_html__("Advanced color options", "viral-express") . '</li>
	<li>' . esc_html__("Preloader option", "viral-express") . '</li>
	<li>' . esc_html__("Advanced blog & article settings", "viral-express") . '</li>
	<li>' . esc_html__("Advanced footer setting", "viral-express") . '</li>
	<li>' . esc_html__("Advanced advertising & monetization options", "viral-express") . '</li>
	<li>' . esc_html__("WooCommerce compatible", "viral-express") . '</li>
	<li>' . esc_html__("Fully multilingual and translation ready", "viral-express") . '</li>
	<li>' . esc_html__("Fully RTL(right to left) languages compatible", "viral-express") . '</li>
        <li>' . esc_html__("Maintenance mode option", "viral-express") . '</li>
        <li>' . esc_html__("Remove footer credit text", "viral-express") . '</li>
	</ul>
	<a class="ht-implink" href="' . admin_url('admin.php?page=viral-express-welcome&section=free_vs_pro') . '" target="_blank">' . esc_html__("Comparision - Free Vs Pro", "viral-express") . '</a>';