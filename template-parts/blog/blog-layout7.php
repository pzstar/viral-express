<?php
/**
 * Template part for displaying posts.
 *
 * @package Viral Express
 */
$viral_express_archive_content = get_theme_mod('viral_express_archive_content', 'excerpt');
$viral_express_blog_date = get_theme_mod('viral_express_blog_date', true);
$viral_express_blog_author = get_theme_mod('viral_express_blog_author', true);
$viral_express_blog_comment = get_theme_mod('viral_express_blog_comment', true);
$viral_express_blog_category = get_theme_mod('viral_express_blog_category', true);
$viral_express_blog_tag = get_theme_mod('viral_express_blog_tag', true);
$viral_express_archive_excerpt_length = get_theme_mod('viral_express_archive_excerpt_length', '100');
$viral_express_archive_readmore = get_theme_mod('viral_express_archive_readmore', esc_html__('Read More', 'viral-express'));
$viral_express_sidebar_layout = 'right-sidebar';
$viral_express_is_updated_date = get_theme_mod('viral_express_blog_display_date_option', 'posted') == 'updated' ? true : false;

if (is_archive() && !is_home() && !is_search()) {
    $viral_express_sidebar_layout = get_theme_mod('viral_express_archive_layout', 'right-sidebar');
} elseif (is_home()) {
    $viral_express_sidebar_layout = get_theme_mod('viral_express_home_blog_layout', 'right-sidebar');
} elseif (is_search()) {
    $viral_express_sidebar_layout = get_theme_mod('viral_express_search_layout', 'right-sidebar');
}

if ($viral_express_sidebar_layout == 'no-sidebar' || $viral_express_sidebar_layout == 'no-sidebar-narrow') {
    $image_size = 'viral-express-1300x540';
} else {
    $image_size = 'viral-express-800x500';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(array('viral-express-hentry', 'blog-layout7')); ?> <?php echo viral_express_get_schema_attribute('article'); ?>>

    <div class="ht-post-wrapper ht-clearfix">
        <?php if ('post' == get_post_type() && ($viral_express_blog_date || $viral_express_blog_author || $viral_express_blog_comment)): ?>
            <div class="ht-post-info">
                <?php
                $avatar = get_avatar(get_the_author_meta('ID'), 48);
                $post_date = $viral_express_is_updated_date ? get_the_modified_date('d') : get_the_date('d');
                $post_month = $viral_express_is_updated_date ? get_the_modified_date('M') : get_the_date('M');
                $post_year = $viral_express_is_updated_date ? get_the_modified_date('Y') : get_the_date('Y');

                $author = sprintf(
                    esc_html_x('By %s', 'post author', 'viral-express'), '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
                );
                if ($viral_express_blog_date) {
                    ?>
                    <div class="ht-post-date">
                        <div class="ht-month"><?php echo $post_month; ?></div>
                        <div class="ht-day"><?php echo $post_date; ?></div>
                        <div class="ht-year"><?php echo $post_year; ?></div>
                    </div>
                    <?php
                }
                if ($viral_express_blog_comment) {
                    echo viral_express_comment_link();
                }

                if ($viral_express_blog_author) {
                    echo $avatar;
                    echo '<div class="entry-author">' . $author . '</div>';
                }
                ?>

            </div><!-- .entry-meta -->
        <?php endif; ?>


        <div class="ht-post-content">
            <?php if (has_post_thumbnail()): ?>
                <figure class="entry-figure">
                    <?php
                    $viral_express_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $image_size);
                    ?>
                    <a href="<?php the_permalink(); ?>">
                        <div class="entry-thumb-container">
                            <img src="<?php echo esc_url($viral_express_image[0]); ?>" alt="<?php echo esc_attr(get_the_title()) ?>">
                        </div>
                    </a>
                </figure>
            <?php endif; ?>

            <header class="entry-header">
                <?php the_title(sprintf('<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>

                <?php if ('post' == get_post_type() && ($viral_express_blog_category || $viral_express_blog_tag)) { ?>
                    <div class="entry-meta">
                        <?php
                        if ($viral_express_blog_category) {
                            echo viral_express_entry_category();
                        }

                        if ($viral_express_blog_tag) {
                            echo viral_express_entry_tag();
                        }
                        ?>
                    </div>
                <?php } ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php
                if ($viral_express_archive_content == 'excerpt') {
                    echo wp_trim_words(strip_shortcodes(get_the_content()), $viral_express_archive_excerpt_length);
                } else {
                    the_content();
                }
                ?>
            </div><!-- .entry-content -->

            <?php if ($viral_express_archive_content == 'excerpt') { ?>
                <div class="entry-readmore">
                    <a href="<?php the_permalink(); ?>"><?php echo $viral_express_archive_readmore; ?></a>
                </div>
            <?php } ?>
        </div>
    </div>
</article><!-- #post-## -->