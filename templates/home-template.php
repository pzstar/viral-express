<?php
/**
 * Template Name: Home Page
 *
 * @package Viral Express
 */

get_header();

$sections = viral_express_frontpage_sections();

foreach ($sections as $section) {
    $section();
}

get_footer();
