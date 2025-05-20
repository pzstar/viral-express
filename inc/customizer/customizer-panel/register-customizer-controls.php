<?php

if (!class_exists('Viral_Express_Register_Customizer_Controls')) {

    class Viral_Express_Register_Customizer_Controls {

        function __construct() {
            add_action('customize_register', array($this, 'register_customizer_settings'));
            add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_customizer_script'));
            add_action('customize_preview_init', array($this, 'enqueue_customize_preview_js'));
        }

        public function register_customizer_settings($wp_customize) {
            /** Theme Options */
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'customizer-panel/general-settings.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'customizer-panel/color-settings.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'customizer-panel/header-settings.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'customizer-panel/sidebar-settings.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'customizer-panel/home-sections.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'customizer-panel/home-settings.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'customizer-panel/blog-settings.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'customizer-panel/footer-settings.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'customizer-panel/social-settings.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'customizer-panel/typography.php';

            $wp_customize->get_section('static_front_page')->priority = 0;

            $wp_customize->add_setting('viral_express_enable_frontpage', array(
                'sanitize_callback' => 'viral_express_sanitize_text',
                'default' => false,
            ));

            $wp_customize->add_control(new Viral_Express_Toggle_Control($wp_customize, 'viral_express_enable_frontpage', array(
                'section' => 'static_front_page',
                'label' => esc_html__('Enable FrontPage', 'viral-express'),
                'description' => sprintf(esc_html__('Overwrites the homepage displays setting and shows the frontpage for Customizer %s', 'viral-express'), '<a href="javascript:wp.customize.panel(\'viral_express_front_page_panel\').focus()">' . esc_html__('Front Page Sections', 'viral-express') . '</a>') . '<br/><br/>' . esc_html__('Do not enable this option if you want to use Elementor in home page.', 'viral-express')
            )));

            /** For Additional Hooks */
            do_action('viral_express_new_options', $wp_customize);
        }

        public function enqueue_customizer_script() {
            wp_enqueue_script('viral-express-customizer', VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/assets/customizer.js', array('jquery'), VIRAL_EXPRESS_VER, true);
            wp_localize_script('viral-express-customizer', 'viral_express_ajax_data', array(
                'nonce' => wp_create_nonce('viral-express-order-sections')
            ));

            if (is_rtl()) {
                wp_enqueue_style('viral-express-customizer', VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/assets/customizer.rtl.css', array(), VIRAL_EXPRESS_VER);
            } else {
                wp_enqueue_style('viral-express-customizer', VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/assets/customizer.css', array(), VIRAL_EXPRESS_VER);
            }
        }

        public function enqueue_customize_preview_js() {
            wp_enqueue_script('viral-express-customizer-preview', VIRAL_EXPRESS_CUSTOMIZER_URL . 'customizer-panel/assets/customizer-preview.js', array('customize-preview'), VIRAL_EXPRESS_VER, true);
        }

    }

    new Viral_Express_Register_Customizer_Controls();
}
