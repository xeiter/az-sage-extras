<?php

add_action( 'vc_before_init', 'tyro_vc_register_quote_shortcode' );

/**
 * Register tyro-quote shortcode in Visual Composer
 */
function tyro_vc_register_quote_shortcode() {

	vc_map( array(
		"name" => __( "Tyro LP Quote", "tyro" ),
		"base" => "tyro-quote",
		"category" => __( "Tyro Widgets", "tyro" ),
		"icon" => get_template_directory_uri() . "/custom-content-elements/icons/tyro-content-elements-quote-icon.png",
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
				"type" => "textarea",
				"holder" => "div",
				"class" => "vc_admin_label admin_label_h2",
				"heading" => __("Quote text"),
				"param_name" => "quote-text",
				"value" => __(""),
				"description" => __("Text of the quote")
			),
			array(
				"type"        => "dropdown",
				"class"       => "",
				"heading"     => __( "Quote width" ),
				"param_name"  => "quote-width",
				"value"       => array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ),
				"std"         => 12,
				"description" => __( "Maximum width that the quote will be using (based on the number of grid columns)" )
				),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "vc_admin_label admin_label_h2",
				"heading" => __("Author"),
				"param_name" => "author",
				"value" => __(""),
				"description" => __("Author of the quote")
			),
		),
	));
}
