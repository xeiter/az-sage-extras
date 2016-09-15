<?php
/**
 * @file bootstrap.php
 *
 * Hooks up all required files to the stock Sage theme
 */

// Extras

$extra_includes = [

    'az-sage-extras/lib/setup.php', // Debugging helpers
    'az-sage-extras/lib/debug.php', // Debugging helpers
    'az-sage-extras/lib/featured.php', // Working with featured images

    'az-sage-extras/lib/customizer/hero.php', // Include hero Customizer section
    'az-sage-extras/lib/customizer/palette.php', // Include palette Customizer section
    'az-sage-extras/lib/settings/theme.php', // Include theme settings

    'az-sage-extras/vendor/include-kirki.php', // Include Kirki plugin

];

foreach ( $extra_includes as $file ) {

    if ( ! $filepath = locate_template( $file ) ) {
        trigger_error( sprintf( __( 'Error locating %s for inclusion', 'sage' ), $file ), E_USER_ERROR );
    }

    require_once $filepath;
}
unset( $file, $filepath );