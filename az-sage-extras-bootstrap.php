<?php
/**
 * @file bootstrap.php
 *
 * Hooks up all required files to the stock Sage theme
 */

// Extras

$extra_includes = [

    'az-sage-extras/lib/setup.php', // Debugging helpers
    'az-sage-extras/lib/extras.php', // Extra helpers
    'az-sage-extras/lib/debug.php', // Debugging helpers
    'az-sage-extras/lib/featured.php', // Working with featured images
    'az-sage-extras/lib/logo.php', // Working with custom logo
    'az-sage-extras/lib/customizer/palette.php', // Include palette Customizer section
    'az-sage-extras/lib/customizer/copyright.php', // Include copyright Customizer section

    'az-sage-extras/vendor/include-kirki.php', // Include Kirki plugin
    'az-elements/widgets.php', // Include registration of widgets

];

// Load all elements' Customizer settings
$elements = scandir( __DIR__ . '/../az-elements' );

foreach ( $elements as $element ) {
    if ( !in_array( $element, [ '.', '..' ] ) ) {
        $customizer_settings_file = '/az-elements/' . $element . '/customizer/' . $element . '.php';
        if ( file_exists( __DIR__ . '/..' . $customizer_settings_file ) ) {
            $extra_includes[] = $customizer_settings_file;
        }
    }
}

foreach ( $extra_includes as $file ) {

    if ( ! $filepath = locate_template( $file ) ) {
        // trigger_error( sprintf( __( 'Error locating %s for inclusion', 'sage' ), $file ), E_USER_ERROR );
    }

    require_once $filepath;
}
unset( $file, $filepath );