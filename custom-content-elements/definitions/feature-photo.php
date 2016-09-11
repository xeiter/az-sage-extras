<?php

add_action( 'vc_before_init', 'tyro_vc_register_feature_photo_shortcode' );

/**
 * Register tyro-feature shortcode in Visual Composer
 */
function tyro_vc_register_feature_photo_shortcode() {

	vc_map( array(
		"name" => __( "Tyro LP Feature (With Photo)", "tyro" ),
		"base" => "tyro-feature-photo",
		"category" => __( "Tyro Widgets", "tyro" ),
		"icon" => get_template_directory_uri() . "/custom-content-elements/icons/tyro-content-elements-feature-photo-icon.png",
		"params" => array(
			array(
				"type"        => "attach_image",
				"class"       => "",
				"heading"     => __( "Image" ),
				"param_name"  => "feature-image",
				"value"       => __( "" ),
				"description" => __( "Image that will be display as the feature image" )
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "vc_admin_label admin_label_h2",
				"heading" => __("Feature description"),
				"param_name" => "content",
				"value" => __(""),
				"description" => __("Text that describes the feature")
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "vc_admin_label admin_label_h2",
				"heading" => __("OLD (Feature description)"),
				"param_name" => "feature-text",
				"value" => __(""),
				"description" => __("OLD - do not use")
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Order of the elements", 'tyro'),
				"param_name" => "order",
				"value" => array(
					'Image, Text' => 'image-text',
					'Text, Image' => 'text-image',
				),
				"description" => __("Choose whether the image will be displayed before the description or afterwards", 'tyro')
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Background colour", 'tyro'),
				"param_name" => "background-colour",
				"value" => array(
						'Transparent' => 'transparent',
						'Blue tint' => 'blue-tint',
				),
				"description" => __("This colour will be used as a background colour for the whole feature section", 'tyro')
			),
		),
	));
}