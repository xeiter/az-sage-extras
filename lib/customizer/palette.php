<?php

/**
 * @file palette.php
 *
 * Customizer section for controlling palette section
 *
 */

if ( class_exists( 'Kirki' ) ) {

    $prefix = 'az_';

    Kirki::add_config('az_sage_extras', array(
        'capability' => 'edit_theme_options',
        'option_type' => '',
    ));

    // Define section
    Kirki::add_section($prefix . 'palette_section', array(
        'title' => __('Theme palette section'),
        'panel' => '', // Not typically needed.
        'description' => __('Define theme\'s colour palette'),
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));

    Kirki::add_field($prefix . 'config', array(

        'type' => 'repeater',
        'label' => esc_attr__('Theme colours', 'az'),
        'section' => $prefix . 'palette_section',
        'priority' => 10,
        'settings' => $prefix . 'palette_colours',
        'row_label' => array(
            'type' => 'text',
            'value' => 'Colour'
        ),

        'fields' => array(

            'colour_name' => array(
                'type' => 'text',
                'label' => esc_attr__('Name this colour', 'az'),
                'description' => esc_attr__('This name will be used as a reference in all our Customizer settings', 'az'),
                'default' => '',
            ),

            'colour' => array(
                'type' => 'color',
                'settings' => $prefix . 'palette_colour_1',
                'description' => __(''),
                'label' => __('Set up the primary colour', 'az'),
                'section' => $prefix . 'palette_section',
                'default' => '#FFFFFF',
                'priority' => 10,
                'alpha' => true
            ),


        )
    ));

    /**
     * Write the new values for element's Sass variables into the .scss file
     *
     * @param array $wp_customize
     */
    function az_palette_rewrite_sass_variables($wp_customize)
    {

        $colours = get_theme_mod('az_palette_colours');

        $updated_colours = [];
        foreach ($colours as $colour) {
            $temp = [];
            $temp['colour_reference'] = 'colour-' . to_dashed($colour['colour_name']);
            $temp['colour_name'] = $colour['colour_name'];
            $temp['colour'] = $colour['colour'];
            $updated_colours[] = $temp;
        }

        // List of variables that will be written into _variables_customizer.scss file of current element

        // Generate an array with variables' values
        $variables_array = [];

        foreach ($updated_colours as $colour) {
            $variables_array[] = '$' . $colour['colour_reference'] . ': ' . $colour['colour'] . ';';
        }

        $variables_array[] = "";

        foreach ($updated_colours as $colour) {
            $variables_array[] = '.' . $colour['colour_reference'] . ' { color: $' . $colour['colour_reference'] . '; }';
        }

        $variables_array[] = "";

        foreach ($updated_colours as $colour) {
            $variables_array[] = '.background-' . $colour['colour_reference'] . ' { background-color: $' . $colour['colour_reference'] . '; }';
        }

        $variables_array[] = "";

        foreach ($updated_colours as $colour) {
            $variables_array[] = '.svg-' . $colour['colour_reference'] . ' { fill: $' . $colour['colour_reference'] . '; }';
        }

        $variables_array[] = "";

        foreach ($updated_colours as $colour) {
            $variables_array[] = '.border-' . $colour['colour_reference'] . ' {border-color: $' . $colour['colour_reference'] . '; }';
        }

        $variables_array[] = "";

        foreach ($updated_colours as $colour) {
            $variables_array[] = '.theme-' . $colour['colour_reference'] . ' .themed-text { color: $' . $colour['colour_reference'] . '; }';
            $variables_array[] = '.theme-' . $colour['colour_reference'] . ' .themed-underline {     border-bottom: 7px solid $' . $colour['colour_reference'] . '; }';
            $variables_array[] = '.theme-' . $colour['colour_reference'] . ' .themed-background a { color: $colour-white; }';
            $variables_array[] = '.theme-' . $colour['colour_reference'] . ' .themed-background { background-color: $' . $colour['colour_reference'] . '; }';
            $variables_array[] = '.theme-' . $colour['colour_reference'] . ' .themed-svg { fill: $' . $colour['colour_reference'] . '; }';
            $variables_array[] = '.theme-' . $colour['colour_reference'] . ' .themed-svg-logo .path_separator { fill: $' . $colour['colour_reference'] . '; }';
        }

        // Write updated variables in Sass file
        file_put_contents(__DIR__ . '/../../../assets/styles/common/_variables_customizer_palette.scss', implode("\n", $variables_array));
    }

    add_action('customize_save_after', 'az_palette_rewrite_sass_variables', 100);

}


