<?php
/**
 * The header for our theme.
 *
 * @package Viral Express
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>

    <body id="ht-body" <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <?php
        do_action('viral_express_before_page');
        ?>
        <div id="ht-page">
            <a class="skip-link screen-reader-text" href=" #ht-content"><?php esc_html_e('Skip to content', 'viral-express'); ?></a>
            <?php
            do_action('viral_express_header');
            ?>
            <div id="ht-content" class="ht-site-content ht-clearfix">