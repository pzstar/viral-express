<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Viral Express
 */

$viral_express_sidebar_layout = "right-sidebar";

if (is_singular('page')) {
    $viral_express_sidebar_layout = get_theme_mod('viral_express_page_layout', 'right-sidebar');
} elseif (is_singular('post')) {
    $viral_express_sidebar_layout = get_theme_mod('viral_express_post_layout', 'right-sidebar');
} elseif (is_archive() && !is_home() && !is_search()) {
    $viral_express_sidebar_layout = get_theme_mod('viral_express_archive_layout', 'right-sidebar');
} elseif (is_home()) {
    $viral_express_sidebar_layout = get_theme_mod('viral_express_home_blog_layout', 'right-sidebar');
} elseif (is_search()) {
    $viral_express_sidebar_layout = get_theme_mod('viral_express_search_layout', 'right-sidebar');
}

if ($viral_express_sidebar_layout == "no-sidebar" || $viral_express_sidebar_layout == "no-sidebar-narrow") {
    return;
}

if (is_active_sidebar('viral-express-right-sidebar')) {
    ?>
    <div id="secondary" class="widget-area" <?php echo viral_express_get_schema_attribute('sidebar'); ?>>
        <div class="theiaStickySidebar">
            <?php dynamic_sidebar('viral-express-right-sidebar'); ?>
        </div>
    </div><!-- #secondary -->
    <?php
}