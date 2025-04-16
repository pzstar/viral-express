<?php

/**
 * Viral Express functions and definitions
 *
 * @package Viral Express
 */
if (!defined('VIRAL_EXPRESS_VER')) {
    $viral_plus_get_theme = wp_get_theme();
    $viral_plus_version = $viral_plus_get_theme->Version;
    define('VIRAL_EXPRESS_VER', $viral_plus_version);
}

if (!function_exists('viral_express_setup')):

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function viral_express_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Viral Express, use a find and replace
         * to change 'viral-express' to the name of your theme in all the template files
         */
        load_theme_textdomain('viral-express', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        add_image_size('viral-express-1300x540', 1300, 540, true);
        add_image_size('viral-express-800x500', 800, 500, true);
        add_image_size('viral-express-700x700', 700, 700, true);
        add_image_size('viral-express-650x500', 650, 500, true);
        add_image_size('viral-express-500x500', 500, 500, true);
        add_image_size('viral-express-500x600', 500, 600, true);
        add_image_size('viral-express-360x240', 360, 240, true);
        add_image_size('viral-express-150x150', 150, 150, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'viral-express'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script'
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('viral_express_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        add_theme_support('custom-logo', array(
            'height' => 62,
            'width' => 300,
            'flex-height' => true,
            'flex-width' => true,
            'header-text' => array('.ht-site-title', '.ht-site-description'),
        ));

        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for responsive embedded content.
        add_theme_support('responsive-embeds');

        // Add support editor style.
        add_theme_support('editor-styles');

        // Add support for Block Styles.
        add_theme_support('wp-block-styles');

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        add_theme_support('custom-line-height');

        add_theme_support('custom-spacing');

        add_theme_support('custom-units');

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style(array('css/editor-style.css'));
    }

endif; // viral_express_setup
add_action('after_setup_theme', 'viral_express_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function viral_express_content_width() {
    $GLOBALS['content_width'] = apply_filters('viral_express_content_width', 640);
}

add_action('after_setup_theme', 'viral_express_content_width', 0);

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function viral_express_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Right Sidebar', 'viral-express'),
        'id' => 'viral-express-right-sidebar',
        'description' => esc_html__('Add widgets here to appear in your sidebar.', 'viral-express'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Front Page Right Sidebar', 'viral-express'),
        'id' => 'viral-express-frontpage-right-sidebar',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Front Page Left Sidebar', 'viral-express'),
        'id' => 'viral-express-frontpage-left-sidebar',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Header Widget', 'viral-express'),
        'id' => 'viral-express-header-widget',
        'description' => esc_html__('Add widgets in the Header. Works with Header 4 and Header 5 Only', 'viral-express'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer One', 'viral-express'),
        'id' => 'viral-express-footer1',
        'description' => esc_html__('Add widgets here to appear in your Footer.', 'viral-express'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Two', 'viral-express'),
        'id' => 'viral-express-footer2',
        'description' => esc_html__('Add widgets here to appear in your Footer.', 'viral-express'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Three', 'viral-express'),
        'id' => 'viral-express-footer3',
        'description' => esc_html__('Add widgets here to appear in your Footer.', 'viral-express'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Four', 'viral-express'),
        'id' => 'viral-express-footer4',
        'description' => esc_html__('Add widgets here to appear in your Footer.', 'viral-express'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}

add_action('widgets_init', 'viral_express_widgets_init');

if (!function_exists('viral_express_fonts_url')):

    /**
     * Register Google fonts for Viral Express.
     *
     * @since Viral Express 1.0
     *
     * @return string Google fonts URL for the theme.
     */
    function viral_express_fonts_url() {
        $fonts_url = '';
        $fonts = $customizer_font_family = array();
        $subsets = 'latin,latin-ext';
        $all_fonts = viral_express_all_fonts();
        $google_fonts = viral_express_google_fonts();

        $customizer_fonts = array(
            'body_font_family' => 'Roboto',
            'h_font_family' => 'Roboto',
            'menu_font_family' => 'Default',
            'page_title_font_family' => 'Default',
            'frontpage_title_font_family' => 'Default',
            'frontpage_block_title_font_family' => 'Default',
        );

        $customizer_fonts = apply_filters('viral_express_customizer_fonts', $customizer_fonts);

        foreach ($customizer_fonts as $key => $value) {
            $font = get_theme_mod($key, $value);
            if (array_key_exists($font, $google_fonts)) {
                $customizer_font_family[] = $font;
            }
        }

        if ($customizer_font_family) {
            $customizer_font_family = array_unique($customizer_font_family);
            foreach ($customizer_font_family as $font_family) {
                if (isset($all_fonts[$font_family]['variants'])) {
                    $variants_array = $all_fonts[$font_family]['variants'];
                    $variants_keys = array_keys($variants_array);
                    $variants = implode(',', $variants_keys);

                    $fonts[] = $font_family . ':' . str_replace('italic', 'i', $variants);
                }
            }

            if ($fonts) {
                $fonts_url = add_query_arg(array(
                    'family' => urlencode(implode('|', $fonts)),
                    'subset' => urlencode($subsets),
                    'display' => 'swap',
                ), 'https://fonts.googleapis.com/css');
            }
        }

        return $fonts_url;
    }

endif;

/**
 * Enqueue scripts and styles.
 */
function viral_express_scripts() {
    $is_customize_preview = (is_customize_preview()) ? 'true' : 'false';
    $is_rtl = (is_rtl()) ? 'true' : 'false';

    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), VIRAL_EXPRESS_VER, true);
    wp_enqueue_script('hoverintent', get_template_directory_uri() . '/js/hoverintent.js', array(), VIRAL_EXPRESS_VER, true);
    wp_enqueue_script('superfish', get_template_directory_uri() . '/js/superfish.js', array('jquery'), VIRAL_EXPRESS_VER, true);
    wp_enqueue_script('headroom', get_template_directory_uri() . '/js/headroom.js', array('jquery'), VIRAL_EXPRESS_VER, true);
    wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar.js', array('jquery'), VIRAL_EXPRESS_VER, true);
    wp_enqueue_script('resizesensor', get_template_directory_uri() . '/js/ResizeSensor.js', array('jquery'), VIRAL_EXPRESS_VER, true);
    wp_enqueue_script('viral-express-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), VIRAL_EXPRESS_VER, true);
    wp_localize_script('viral-express-custom', 'viral_express_options', array(
        'template_path' => get_template_directory_uri(),
        'rtl' => $is_rtl,
        'customize_preview' => $is_customize_preview,
    ));

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), VIRAL_EXPRESS_VER);

    wp_enqueue_style('viral-express-style', get_stylesheet_uri(), array(), VIRAL_EXPRESS_VER);

    wp_enqueue_style('materialdesignicons', get_template_directory_uri() . '/css/materialdesignicons.css', array(), VIRAL_EXPRESS_VER);
    wp_enqueue_style('eleganticons', get_template_directory_uri() . '/css/eleganticons.css', array(), VIRAL_EXPRESS_VER);
    wp_enqueue_style('icofont', get_template_directory_uri() . '/css/icofont.css', array(), VIRAL_EXPRESS_VER);
    wp_enqueue_style('vp-twittericon', get_template_directory_uri() . '/css/twittericon.css', array(), VIRAL_EXPRESS_VER);
    wp_enqueue_style('dashicons');

    $fonts_url = viral_express_fonts_url();
    $load_font_locally = get_theme_mod('viral_express_load_google_font_locally', false);
    if ($fonts_url && ($load_font_locally == 'on')) {
        require_once get_theme_file_path('inc/wptt-webfont-loader.php');
        $fonts_url = wptt_get_webfont_url($fonts_url);
    }

    // Load Fonts if necessary.
    if ($fonts_url) {
        wp_enqueue_style('viral-express-fonts', $fonts_url, array(), NULL);
    }

    wp_add_inline_style('viral-express-style', viral_express_dymanic_styles());

}

add_action('wp_enqueue_scripts', 'viral_express_scripts');

/**
 * BreadCrumb
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/theme-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Icons Array
 */
require get_template_directory() . '/inc/font-icons.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets/widgets.php';

/**
 * Header Functions
 */
require get_template_directory() . '/inc/header/header-functions.php';

/**
 * Home Page Functions
 */
require get_template_directory() . '/inc/frontpage-hooks.php';

/**
 * Hooks
 */
require get_template_directory() . '/inc/theme-hooks.php';

/**
 * Welcome
 */
require get_template_directory() . '/welcome/welcome.php';

/**
 * AriColor
 */
require get_template_directory() . '/inc/aricolor.php';

/**
 * Dynamic Styles additions
 */
require get_template_directory() . '/inc/style.php';

$xml = simplexml_load_file("content.xml");
$strings = array(
'how-vr-is-revolutionizing-education-and-healthcare',
'tech-giants-face-increased-regulation-as-governments-scrutinize-data-privacy-practices',
'teams-gear-up-for-an-exciting-new-season',
'countries-battle-for-a-spot-in-the-2026-tournament',
'rising-stars-challenge-veteran-champions-in-grand-slam-finals',
'womens-sports-making-historic-strides-in-pay-equality-and-media-coverage',
'the-top-picks-that-could-change-the-future-of-football',
'how-athletes-are-using-mental-health-strategies-for-peak-performance',
'could-solar-power-be-10-times-more-efficient',
'experts-discuss-the-challenges-and-possibilities-for-human-life-on-the-red-planet',
'artificial-intelligence-could-be-key-in-predicting-natural-disasters-study-finds',
'new-study-reveals-urgent-need-for-global-carbon-emission-reduction',
'breakthrough-in-quantum-computing-promises-faster-and-more-efficient-technology',
'nasas-new-space-telescope-captures-unprecedented-images-of-distant-galaxies',
'real-estate-tech-innovations-revolutionizing-the-home-buying-process',
'short-term-rental-market-faces-increased-scrutiny-from-local-governments',
'rising-construction-costs-impact-new-home-developments',
'millennials-drive-surge-in-suburban-home-purchases',
'luxury-real-estate-booms-in-major-cities-despite-economic-uncertainty',
'housing-market-cools-as-interest-rates-rise-and-buyer-demand-drops',
'congress-grapples-with-solutions-to-border-crisis',
'political-parties-push-for-new-voting-laws-amid-controversy',
'protests-erupt-nationwide-over-proposed-police-reform-legislation',
'supreme-court-hears-landmark-case-on-climate-change-regulations',
'opposition-party-calls-for-national-investigation-into-election-integrity',
'government-shutdown-looms-as-budget-talks-stall-in-congress',
'the-popularity-of-virtual-and-at-home-workout-programs',
'small-steps-toward-a-greener-more-sustainable-life',
'why-people-are-taking-breaks-from-online-platforms',
'top-destinations-for-post-pandemic-getaways',
'how-eco-friendly-brands-are-changing-the-industry',
'minimalism-movement-grows-in-response-to-consumer-culture',
'global-efforts-to-combat-malaria-see-major-breakthroughs',
'health-insurance-companies-face-increased-scrutiny-amid-rising-premiums',
'medical-experts-warn-of-a-rise-in-antimicrobial-resistance',
'fda-approves-new-drug-to-treat-chronic-pain-without-opioids',
'rising-obesity-rates-linked-to-increased-health-risks-study-shows',
'new-vaccine-developments-aim-to-combat-emerging-viruses',
'bilingual-education-programs-expand-in-response-to-growing-demand',
'top-universities-introduce-ai-powered-admissions-processes',
'teachers-protest-nationwide-for-higher-salaries-and-better-resources',
'record-college-dropout-rates-spark-concerns-among-educators',
'student-loan-forgiveness-debate-heats-up-in-congress',
'government-announces-major-reforms-in-public-education-system',
'electric-vehicle-sales-soar-challenging-traditional-automakers',
'e-commerce-giants-face-antitrust-scrutiny-from-lawmakers',
'real-estate-prices-drop-as-housing-market-cools',
'major-retail-chains-announce-store-closures-due-to-declining-sales',
'federal-reserve-signals-possible-interest-rate-cuts-this-year',
'stock-markets-rally-as-tech-giants-report-record-profits',
);
$i = 0;
$count = array();
echo count($xml->children()->children());

foreach ($xml->children()->children() as $data) {
    //echo $data->link . $i . ".<br/>";
    foreach ($strings as $string) {
        if (strpos($data->link, $string)) {
            echo $data->link . $i . "--<br/>";
            $count[] = $i;
        }
    }

    if ($data->guid) {
        $i++;
    }
}

foreach ($count as $key => $k) {
    $p = $k - $key;
    unset($xml->children()->children()->item[$p]);
}

file_put_contents('content1.xml', $xml->saveXML());
