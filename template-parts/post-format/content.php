<?php
$viral_express_image_size = 'viral-express-800x500';

$viral_express_sidebar_layout = get_theme_mod('viral_express_post_layout', 'right-sidebar');
$viral_express_post_layout = get_theme_mod('viral_express_single_layout', 'layout7');

if ($viral_express_sidebar_layout == 'no-sidebar' || $viral_express_sidebar_layout == 'no-sidebar-narrow' || $viral_express_post_layout == 'layout7') {
    $viral_express_image_size = 'viral-express-1300x540';
}

if (has_post_thumbnail() && ($viral_express_post_layout !== 'layout3' && $viral_express_post_layout !== 'layout4' && $viral_express_post_layout !== 'layout5' && $viral_express_post_layout !== 'layout6')) {
    ?>
    <figure class="single-entry-link">
        <?php echo get_the_post_thumbnail(get_the_ID(), $viral_express_image_size); ?>
    </figure>
    <?php
}