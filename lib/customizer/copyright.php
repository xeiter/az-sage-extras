<?php

/**
 * @file copyright.php
 *
 * Customizer section for controlling copyright section
 *
 */

if ( class_exists( 'Kirki' ) ) {

    $prefix = 'az_';

    Kirki::add_config('az_sage_extras', array(
        'capability' => 'edit_theme_options',
        'option_type' => '',
    ));

    // Define section
    Kirki::add_section($prefix . 'copyright_section', array(
        'title' => __('Copyright section'),
        'panel' => '', // Not typically needed.
        'description' => __('Define copyright text'),
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));

    // Copyright text
    Kirki::add_field($prefix . 'config', array(

        'type' => 'textarea',
        'label' => esc_attr__('Copyright text', 'az'),
        'section' => $prefix . 'copyright_section',
        'priority' => 10,
        'settings' => $prefix . 'copyright_text',

    ));

    // Company Number
    Kirki::add_field($prefix . 'config', array(

        'type' => 'text',
        'label' => esc_attr__('Company number', 'az'),
        'section' => $prefix . 'copyright_section',
        'priority' => 10,
        'settings' => $prefix . 'company_number',

    ));

    // Vat Number
    Kirki::add_field($prefix . 'config', array(

        'type' => 'text',
        'label' => esc_attr__('VAT number', 'az'),
        'section' => $prefix . 'copyright_section',
        'priority' => 10,
        'settings' => $prefix . 'vat_number',

    ));

    // Footer logo
    Kirki::add_field($prefix . 'config', array(

        'type' => 'image',
        'label' => esc_attr__('Copyright logo', 'az'),
        'section' => $prefix . 'copyright_section',
        'priority' => 10,
        'settings' => $prefix . 'copyright_logo',

    ));

}


