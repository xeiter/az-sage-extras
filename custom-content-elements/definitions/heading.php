<?php

add_action( 'vc_before_init', 'tyro_vc_register_heading_shortcode' );

/**
 * Register tyro-heading shortcode in Visual Composer
 */
function tyro_vc_register_heading_shortcode() {

	vc_map( array(
		"name" => __( "Tyro LP Heading", "tyro" ),
		"base" => "tyro-heading",
		"category" => __( "Tyro Widgets", "tyro" ),
		"icon" => get_template_directory_uri() . "/custom-content-elements/icons/tyro-content-elements-heading-icon.png",
		"params" => array(
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Theme", 'tyro'),
				"param_name" => "theme",
				"value" => array(
					'Blue' => 'blue',
					'Orange' => 'orange',
					'Green' => 'green',
				),
				"description" => __( "Choose the theme for this content element", 'tyro' )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "vc_admin_label admin_label_h2",
				"heading" => __("Heading text"),
				"param_name" => "heading-text",
				"value" => __(""),
				"description" => __("Text that describes the heading")
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Level", 'tyro'),
				"param_name" => "level",
				"value" => array(
					'H1' => 'h1',
					'H2' => 'h2',
					'H3' => 'h3',
					'H4' => 'h4',
					'H5' => 'h5',
				),
				"description" => __("Choose the level of the heading", 'tyro')
			),
			array(
				"type" => "checkbox",
				"class" => "",
				"heading" => __("Remove bottom gap", 'tyro'),
				"param_name" => "zero_bottom_padding",
				"description" => __("If this is checked the bottom gap of this section will be reset to 0")
			),
		),
	));
}