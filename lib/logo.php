<?php
/**
 * Returns a custom logo, linked to home.
 *
 * @since 4.5.0
 *
 * @param array $args Optional. Arguments
 * @param int $blog_id Optional. ID of the blog in question. Default is the ID of the current blog.
 * @return string Custom logo markup.
 */
function az_get_custom_logo( $args = [], $blog_id = 0 ) {

    $defaults = [
        'class' => 'custom-logo'
    ];

    $classes = isset( $args['class'] ) ? $args['class'] . ' ' . $defaults['class'] : $defaults['class'];

    $html = '';

    if ( is_multisite() && (int) $blog_id !== get_current_blog_id() ) {
        switch_to_blog( $blog_id );
    }

    $custom_logo_id = get_theme_mod( 'custom_logo' );

    // We have a logo. Logo is go.
    if ( $custom_logo_id ) {
        $html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
            esc_url( home_url( '/' ) ),
            wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                'class'    => $classes,
                'itemprop' => 'logo',
            ) )
        );
    }

    // If no logo is set but we're in the Customizer, leave a placeholder (needed for the live preview).
    elseif ( is_customize_preview() ) {
        $html = sprintf( '<a href="%1$s" class="custom-logo-link" style="display:none;"><img class="custom-logo"/></a>',
            esc_url( home_url( '/' ) )
        );
    }

    if ( is_multisite() && ms_is_switched() ) {
        restore_current_blog();
    }

    /**
     * Filters the custom logo output.
     *
     * @since 4.5.0
     * @since 4.6.0 Added the `$blog_id` parameter.
     *
     * @param string $html    Custom logo HTML output.
     * @param int    $blog_id ID of the blog to get the custom logo for.
     */
    return apply_filters( 'get_custom_logo', $html, $blog_id );
}

