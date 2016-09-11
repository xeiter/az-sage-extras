<?php

add_action( 'vc_before_init', 'tyro_vc_register_footer_shortcode' );

/**
 * Register tyro-footer shortcode in Visual Composer
 */
function tyro_vc_register_footer_shortcode() {

	vc_map( array(
		"name" => __( "Tyro LP Footer", "tyro" ),
		"base" => "tyro-footer",
		"category" => __( "Tyro Widgets", "tyro" ),
		"icon" => get_template_directory_uri() . "/custom-content-elements/icons/tyro-content-elements-footer-icon.png",
		"params" => array(
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "vc_admin_label admin_label_h2",
				"heading" => __("Footer text"),
				"param_name" => "content",
				"description" => __("Text of the footer")
			),
			array(
				"type" => "textarea_raw_html",
				"holder" => "div",
				"class" => "vc_admin_label admin_label_h2",
				"heading" => __("OLD (Footer text)"),
				"param_name" => "footer-text",
				"description" => __("OLD - do not use")
			),
		),
	));
}