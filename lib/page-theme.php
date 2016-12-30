<?php

namespace Roots\Sage\PageTheme;

/**
 * Get page theme by specified page path
 *
 * @param string $path
 * @return string
 */
function get_page_theme_by_path( $path ) {

    $page = get_page_by_path( $path );

    if ( $page && $page->az_page_colour_theme) {
        return 'theme-' . $page->az_page_colour_theme;
    }

    return '';

}