<?php

/**
 * The template for displaying all single posts.
 *
 * @package Viral Express
 */
get_header();

$viral_express_single_layout = get_theme_mod('viral_express_single_layout', 'layout7');

do_action('viral_express_before_single_container');

get_template_part('template-parts/single/single', $viral_express_single_layout);

get_footer();
