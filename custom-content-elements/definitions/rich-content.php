<?php

add_action( 'vc_before_init', 'tyro_vc_register_rich_content_shortcode' );

/**
 * Register tyro-rich-content shortcode in Visual Composer
 */
function tyro_vc_register_rich_content_shortcode() {

	vc_map( array(
		"name" => __( "Tyro LP Rich Content", "tyro" ),
		"base" => "tyro-rich-content",
		"category" => __( "Tyro Widgets", "tyro" ),
		"icon" => get_template_directory_uri() . "/custom-content-elements/icons/tyro-content-elements-rich-content-icon.png",
		"params" => array(
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "vc_admin_label admin_label_h2",
				"heading" => __("Rich text"),
				"param_name" => "content",
				"value" => __(""),
				"description" => __("The content for this element (it may contain HTML markup)")
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "vc_admin_label admin_label_h2",
				"heading" => __("OLD (Rich text)"),
				"param_name" => "rich-text",
				"value" => __(""),
				"description" => __("OLD - do not use")
			),
		),
	));
}