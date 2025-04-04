<div class="ht-main-content ht-container ht-clearfix">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php echo viral_express_get_schema_attribute('article'); ?>>

        <?php while (have_posts()):
            the_post(); ?>

            <div class="entry-header">
                <?php
                do_action('viral_express_breadcrumbs');

                viral_express_single_category();

                the_title('<h1 class="entry-title">', '</h1>');

                viral_express_single_post_meta();
                ?>
            </div>

            <div class="ht-site-wrapper">

                <div id="primary" class="content-area">

                    <div class="entry-wrapper">

                        <?php get_template_part('template-parts/post-format/content', get_post_format()); ?>

                        <div class="entry-content">
                            <?php
                            the_content();

                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Pages:', 'viral-express'),
                                'after' => '</div>',
                            ));
                            ?>
                        </div><!-- .entry-content -->

                        <?php
                        viral_express_single_tag();
                        ?>

                    </div>

                    <?php
                    viral_express_single_pagination();
                    viral_express_single_comment();
                    ?>
                </div><!-- #primary -->

                <?php get_sidebar(); ?>
            </div>

        <?php endwhile; // End of the loop.   ?>

    </article><!-- #post-## -->
</div>