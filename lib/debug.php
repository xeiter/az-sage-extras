<?php

/**
 * Output a value of a PHP variable into browser's console
 *
 * @param mixed $data
 * @param string $variable_name
 */
function dump( $data, $variable_name  = null ) {

    // Get global with all script registratons
    global $wp_scripts;

    // Check if variable name has been passed and set a random one if not
    if ( ! $variable_name) {
        $variable_name = substr( base_convert( md5( time() ), 16, 32 ), 0, 12 );
    }

    // Get existing localized data
    $existing_data_json = $wp_scripts->get_data( 'sage/js', 'data' );
    $variables_array = array();

    // Check if there were other calls to print variable values
    if ( $existing_data_json ) {

        // Convert from JSON into PHP objects
        $existing_data = json_decode( str_replace( 'var debug = ', '', substr( $existing_data_json, 0, -1 ) ), true );

        // Save it for outputting via wp_localize_script
        $variables_array = $existing_data['variables'];

        // Clear the data so we can re-attach it with the new variable
        $wp_scripts->registered['sage/js']->extra['data'] = null;

    }

    // Add a new variable to be output via wp_localize_script
    $variables_array[ $variable_name . ' (' . gettype( $data )  . ')' ] = $data;

    // Localize the script with new data
    $localized_array = array(
        'variables' =>  $variables_array
    );

    wp_localize_script( 'sage/js', 'debug', $localized_array );

}

/**
 * Output the value of the variable
 *
 * @param mixed $variable
 * @param bool $stop_execution
 */
function dump_php( $variable, $stop_execution = true ) {

    echo '<pre>';

    if ( is_bool( $variable ) ) {
        var_dump( $variable );
    } else {
        print_r( $variable );
    }

    echo '</pre>';

    if ( $stop_execution ) {
        exit;
    }

}