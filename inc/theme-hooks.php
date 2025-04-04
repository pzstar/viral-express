<?php

/**
 * The header for our theme.
 *
 * @package Viral Express
 */

function viral_express_body_classes($classes) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }

    $sidebar_layout = '';

    $enable_frontpage = get_theme_mod('viral_express_enable_frontpage', true);

    if (is_front_page() && $enable_frontpage) {
        $classes[] = 'ht-enable-frontpage';
    }

    if (is_singular('page')) {
        $sidebar_layout = get_theme_mod('viral_express_page_layout', 'right-sidebar');
    } elseif (is_singular('post')) {
        $sidebar_layout = get_theme_mod('viral_express_post_layout', 'right-sidebar');
    } elseif (viral_express_is_woocommerce_activated() && is_woocommerce()) {
        $sidebar_layout = get_theme_mod('viral_express_shop_layout', 'right-sidebar');
    } elseif (is_archive() && !is_home() && !is_search()) {
        $sidebar_layout = get_theme_mod('viral_express_archive_layout', 'right-sidebar');
    } elseif (is_home()) {
        $sidebar_layout = get_theme_mod('viral_express_home_blog_layout', 'right-sidebar');
    } elseif (is_search()) {
        $sidebar_layout = get_theme_mod('viral_express_search_layout', 'right-sidebar');
    } else {
        $sidebar_layout = 'right-sidebar';
    }

    $classes[] = 'ht-' . $sidebar_layout;

    $sticky_header = get_theme_mod('viral_express_sticky_header', 'off');
    $top_header = get_theme_mod('viral_express_top_header', 'on');
    $website_layout = get_theme_mod('viral_express_website_layout', 'wide');
    $header_style = get_theme_mod('viral_express_mh_layout', 'header-style5');
    $sidebar_style = get_theme_mod('viral_express_sidebar_style', 'sidebar-style6');
    $sticky_sidebar = get_theme_mod('viral_express_sticky_sidebar', true);
    $image_hover_effect = get_theme_mod('viral_express_image_hover_effect', 'circle');
    $block_title_style = get_theme_mod('viral_express_block_title_style', 'style3');
    if (is_singular('post')) {
        $post_layout = get_theme_mod('viral_express_single_layout', 'layout7');
        $classes[] = 'ht-single-' . $post_layout;
    }

    $classes[] = 'ht-top-header-' . $top_header;

    if ($sticky_header == 'on') {
        $classes[] = 'ht-sticky-header';
    }

    if ($sticky_sidebar) {
        $classes[] = 'ht-sticky-sidebar';
    }

    $classes[] = 'ht-' . $website_layout;

    $classes[] = 'ht-' . $header_style;

    $classes[] = 'ht-' . $sidebar_style;

    $classes[] = 'ht-thumb-' . $image_hover_effect;

    $classes[] = 'ht-block-title-' . $block_title_style;

    if (is_archive() || is_home() || is_search()) {
        $blog_layout = get_theme_mod('viral_express_blog_layout', 'layout7');
        $classes[] = 'ht-blog-' . $blog_layout;
    }

    return $classes;
}

add_filter('body_class', 'viral_express_body_classes');

if (!function_exists('viral_express_change_wp_page_menu_args')) {

    function viral_express_change_wp_page_menu_args($args) {
        $args['menu_class'] = 'ht-menu ht-clearfix';
        return $args;
    }

}

add_filter('wp_page_menu_args', 'viral_express_change_wp_page_menu_args');

function viral_express_breadcrumbs() {
    $breadcrumb = get_theme_mod('viral_express_breadcrumb', true);
    if (!$breadcrumb) {
        return;
    }

    $args = array(
        'show_browse' => false,
        'show_on_front' => false,
    );
    breadcrumb_trail($args);
}

add_action('viral_express_breadcrumbs', 'viral_express_breadcrumbs');

function viral_express_convert_to_negative($arg) {
    return ('-' . $arg);
}

function viral_express_remove_category($query) {
    $category = get_theme_mod('viral_express_blog_cat');
    $category_array = explode(',', $category);
    $category_array = array_map('viral_express_convert_to_negative', $category_array);
    $category = implode(',', $category_array);
    if ($query->is_home() && $query->is_main_query()) {
        $query->set('cat', $category);
    }
}

add_action('pre_get_posts', 'viral_express_remove_category');

// Allow HTML in author bio section 
remove_filter('pre_user_description', 'wp_filter_kses');

function viral_express_edit_archive_title($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    }

    return $title;
}

add_filter('get_the_archive_title', 'viral_express_edit_archive_title');

function viral_express_remove_more_link_scroll($link) {
    $link = preg_replace('|#more-[0-9]+|', '', $link);
    return $link;
}

add_filter('the_content_more_link', 'viral_express_remove_more_link_scroll');

function viral_express_move_comment_field_to_bottom($fields) {
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter('comment_form_fields', 'viral_express_move_comment_field_to_bottom');

function viral_express_filter_widget_title_tag($params) {

    $exclude = viral_express_get_default_widgets();
    $enable_frontpage = get_theme_mod('viral_express_enable_frontpage', true);

    if (!in_array($params[0]['id'], $exclude) && (is_page_template('templates/home-template.php') || ($enable_frontpage && is_front_page()))) {
        $params[0]['before_title'] = '<div class="vl-block-header"><h3 class="vl-block-title"><span class="vl-title">';
        $params[0]['after_title'] = '</span></h3></div>';
    }

    $instance = viral_express_get_widget_instance($params[0]['widget_id'], $params[1]['number']);

    if (!isset($instance['title']) || empty($instance['title'])) {
        $before_widget_string = $params[0]['before_widget'];
        $params[0]['before_widget'] = str_replace('widget ', 'widget widget-no-title ', $before_widget_string);
    }

    return $params;
}

add_filter('dynamic_sidebar_params', 'viral_express_filter_widget_title_tag');

function viral_express_get_widget_instance($widget_id, $number) {
    global $wp_registered_widgets;
    $widget_instance = null;
    if (isset($wp_registered_widgets[$widget_id])) {
        $widget = $wp_registered_widgets[$widget_id];
        $widget_instances = get_option($widget['callback'][0]->option_name);
        $widget_instance = $widget_instances[$number];
    }
    return $widget_instance;
}

function viral_express_display_content_widget($content) {
    if (is_single()) {
        ob_start();
        if (is_active_sidebar('viral-express-single-post-before-article')) {
            ?>
            <div class="content-widget-area">
                <?php dynamic_sidebar('viral-express-single-post-before-article'); ?>
            </div>
            <?php
        }

        echo $content;

        if (is_active_sidebar('viral-express-single-post-after-article')) {
            ?>
            <div class="content-widget-area">
                <?php dynamic_sidebar('viral-express-single-post-after-article'); ?>
            </div>
            <?php
        }

        $content = ob_get_contents();
        ob_clean();
    }

    return $content;
}

add_filter('the_content', 'viral_express_display_content_widget');

function viral_express_demo_config($demos) {
    return include get_template_directory() . '/inc/theme-panel/demo-importer/import_config.php';
}

add_action('hdi_import_files', 'viral_express_demo_config');

if (!function_exists('viral_express_add_custom_fonts')) {

    function viral_express_add_custom_fonts($fonts) {
        if (class_exists('Hash_Custom_Font_Uploader_Public')) {
            if (!empty(Hash_Custom_Font_Uploader_Public::get_all_fonts_list())) {
                $new_fonts = array(
                    'label' => esc_html__('Custom Fonts', 'viral-express'),
                    'fonts' => Hash_Custom_Font_Uploader_Public::get_all_fonts_list()
                );
                array_unshift($fonts, $new_fonts);
            }
        }
        return $fonts;
    }

}

add_filter('viral_express_regsiter_fonts', 'viral_express_add_custom_fonts');

