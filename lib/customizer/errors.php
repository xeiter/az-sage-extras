<?php

/**
 * @file error.php
 *
 * Customizer section for defining content for the 404 page
 *
 */

if ( class_exists( 'Kirki' ) ) {

    $prefix = 'az_';

    Kirki::add_config( 'az_sage_extras', array(
        'capability' => 'edit_theme_options',
        'option_type' => '',
    ));

    // Define section
    Kirki::add_section ( $prefix . 'errors_section', array(
        'title' => __('Theme errors section'),
        'panel' => '', // Not typically needed.
        'description' => __('Define theme\'s error messages'),
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));

    Kirki::add_field( $prefix . 'config', array(

        'type' => 'textarea',
        'label' => esc_attr__('404 error message', 'az'),
        'section' => $prefix . 'errors_section',
        'priority' => 10,
        'settings' => $prefix . 'error_404_message',
        
    ));

}
