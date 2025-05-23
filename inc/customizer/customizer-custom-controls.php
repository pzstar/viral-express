<?php

if (!class_exists('Viral_Express_Customizer_Custom_Controls')) {

    class Viral_Express_Customizer_Custom_Controls {

        function __construct() {
            add_action('customize_register', array($this, 'register_controls'));
            add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_customizer_script'));
        }

        public function register_controls($wp_customize) {
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/alpha-color-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/background-image-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/color-tab-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/date-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/editor-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/dimensions-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/gallery-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/graident-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/heading-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/icon-selector-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/image-selector-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/multiple-checkbox-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/multiple-select-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/multiple-selectize-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/range-slider-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/repeater-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/responsive-range-slider-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/chosen-select-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/selector-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/separator-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/sortable-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/switch-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/tab-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/text-info-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/text-selector-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/toggle-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/typography/typography-control-class.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/column-control/column-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/preloader-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/upgrade-section.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/upgrade-info.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/toggle-section.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/border-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/box-shadow-control.php';

            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/taxonomy-multiple-checkbox-control.php';
            require VIRAL_EXPRESS_CUSTOMIZER_PATH . 'custom-controls/taxonomy-select-control.php';

            /** Register Control Type */
            $wp_customize->register_control_type('Viral_Express_Color_Tab_Control');
            $wp_customize->register_control_type('Viral_Express_Background_Image_Control');
            $wp_customize->register_control_type('Viral_Express_Tab_Control');
            $wp_customize->register_control_type('Viral_Express_Dimensions_Control');
            $wp_customize->register_control_type('Viral_Express_Responsive_Range_Slider_Control');
            $wp_customize->register_control_type('Viral_Express_Sortable_Control');
            $wp_customize->register_control_type('Viral_Express_Typography_Control');
            $wp_customize->register_control_type('Viral_Express_Icon_Selector_Control');
            $wp_customize->register_control_type('Viral_Express_Border_Control');
            $wp_customize->register_control_type('Viral_Express_Box_Shadow_Control');

            // Register custom section types.
            $wp_customize->register_section_type('Viral_Express_Upgrade_Section');
            $wp_customize->register_section_type('Viral_Express_Toggle_Section');
        }

        public function enqueue_customizer_script() {
            //See customizer-fonts-icon.php file
            $icons = apply_filters('viral_express_register_icon', array());

            if ($icons && is_array($icons)) {
                foreach ($icons as $icon) {
                    if (isset($icon['name']) && isset($icon['url'])) {
                        wp_enqueue_style($icon['name'], $icon['url'], array(), VIRAL_EXPRESS_VER);
                    }
                }
            }

            wp_enqueue_script('selectize', VIRAL_EXPRESS_CUSTOMIZER_URL . 'custom-controls/assets/js/selectize.js', array('jquery'), VIRAL_EXPRESS_VER, true);
            wp_enqueue_script('chosen-jquery', VIRAL_EXPRESS_CUSTOMIZER_URL . 'custom-controls/assets/js/chosen.jquery.js', array('jquery'), VIRAL_EXPRESS_VER, true);
            wp_enqueue_script('wp-color-picker-alpha', VIRAL_EXPRESS_CUSTOMIZER_URL . 'custom-controls/assets/js/wp-color-picker-alpha.js', array('jquery', 'wp-color-picker'), VIRAL_EXPRESS_VER, true);
            wp_enqueue_script('viral-express-customizer-control', VIRAL_EXPRESS_CUSTOMIZER_URL . 'custom-controls/assets/js/customizer-controls.js', array('jquery', 'jquery-ui-datepicker'), VIRAL_EXPRESS_VER, true);

            wp_enqueue_style('selectize', VIRAL_EXPRESS_CUSTOMIZER_URL . 'custom-controls/assets/css/selectize.css', array(), VIRAL_EXPRESS_VER);
            wp_enqueue_style('chosen', VIRAL_EXPRESS_CUSTOMIZER_URL . 'custom-controls/assets/css/chosen.css', array(), VIRAL_EXPRESS_VER);
            if (is_rtl()) {
                wp_enqueue_style('viral-express-customizer-control', VIRAL_EXPRESS_CUSTOMIZER_URL . 'custom-controls/assets/css/customizer-controls.rtl.css', array('wp-color-picker'), VIRAL_EXPRESS_VER);
            } else {
                wp_enqueue_style('viral-express-customizer-control', VIRAL_EXPRESS_CUSTOMIZER_URL . 'custom-controls/assets/css/customizer-controls.css', array('wp-color-picker'), VIRAL_EXPRESS_VER);
            }
        }

    }

    new Viral_Express_Customizer_Custom_Controls();
}



