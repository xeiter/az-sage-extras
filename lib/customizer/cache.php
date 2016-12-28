<?php

/**
 * @file caching.php
 *
 * Customizer section for caching settings
 *
 */

if ( class_exists( 'Kirki' ) ) {

    $prefix = 'az_';

    Kirki::add_config( 'az_sage_extras', array(
        'capability' => 'edit_theme_options',
        'option_type' => '',
    ));

    // Define section
    Kirki::add_section ( $prefix . 'caching_section', array(
        'title' => __('Caching section'),
        'panel' => '', // Not typically needed.
        'description' => __('Define theme\'s caching settings'),
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));

    Kirki::add_field( $prefix . 'config', array(

        'type' => 'toggle',
        'label' => esc_attr__('Post elements caching', 'az'),
        'section' => $prefix . 'caching_section',
        'priority' => 10,
        'default' => 1,
        'settings' => $prefix . 'post_elements_caching',
        
    ));

}
