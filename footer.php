<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Viral Express
 */
?>

</div><!-- #content -->

<?php
$viral_express_footer_col = get_theme_mod('viral_express_footer_col', 'col-3-1-1-1');
$viral_express_footer_copyright = get_theme_mod('viral_express_footer_copyright', esc_html__('&copy; 2025. All Rights Reserved.', 'viral-express'));
$viral_express_footer_array = explode('-', $viral_express_footer_col);
$count = count($viral_express_footer_array);
$footer_col = $count - 2;
?>

<footer id="ht-colophon" class="ht-site-footer <?php echo esc_attr($viral_express_footer_col) ?>" <?php echo viral_express_get_schema_attribute('footer'); ?>>

    <?php if (viral_express_check_active_footer()) { ?>
        <div class="ht-main-footer">
            <div class="ht-container">
                <div class="ht-main-footer-wrap ht-clearfix">
                    <?php
                    for ($i = 1; $i <= $footer_col; $i++) {
                        if (is_active_sidebar('viral-express-footer' . $i)) {
                            ?>
                            <div class="ht-footer ht-footer<?php echo absint($i); ?>">
                                <?php dynamic_sidebar('viral-express-footer' . $i); ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (!empty($viral_express_footer_copyright)) { ?>
        <div class="ht-bottom-footer">
            <div class="ht-container">
                <div class="ht-site-info">
                    <?php echo do_shortcode($viral_express_footer_copyright); ?>
                </div><!-- #site-info -->
            </div>
        </div>
    <?php } ?>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php
$enable_st = get_theme_mod('viral_express_backtotop', 1);

if ($enable_st) {
    ?>
    <div id="ht-back-top" class="ht-st-right ht-st-stacked"><i class="arrow_up"></i></div>
    <?php
}

wp_footer();
?>
</body>

</html>