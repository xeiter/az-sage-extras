<?php

add_action( 'vc_before_init', 'tyro_vc_register_banner_section_shortcode' );

/**
 * Register banner section shortcode in Visual Composer
 */
function tyro_vc_register_banner_section_shortcode() {
	vc_map( array(
		"name" => __( "Tyro LP CTA Banner Section", "tyro" ),
		"base" => "tyro-banner-section",
		"category" => __( "Tyro Widgets", "tyro" ),
		"icon" => get_template_directory_uri() . "/custom-content-elements/icons/tyro-content-elements-cta-button-section-icon.png",
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
				"type" => "checkbox",
				"class" => "",
				"heading" => __("Invert the theme?", 'tyro'),
				"param_name" => "inverted-theme",
				"description" => __("If this is checked the background colour will be transparent and other element will inherit the style of the selected theme")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "vc_admin_label admin_label_h2",
				"heading" => __("Heading text"),
				"param_name" => "heading-text",
				"value" => __(""),
				"description" => __("Heading that will be displayed in the banner section")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "vc_admin_label admin_label_h2",
				"heading" => __("Heading text 2"),
				"param_name" => "heading-text-2",
				"value" => __(""),
				"description" => __("Heading that will be displayed in the banner section")
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Secondary text"),
				"param_name" => "secondary-text",
				"value" => __(""),
				"description" => __("Text that will be displayed between the heading and the button")
			),
			array(
				"type" => "vc_link",
				"class" => "",
				"heading" => __("Button URL"),
				"param_name" => "button-url",
				"value" => __("/contact/visitors"),
				"description" => __("The button will link to this URL")
			),
			array(
				"type" => "checkbox",
				"class" => "",
				"heading" => __("Remove bottom gap", 'tyro'),
				"param_name" => "remove-bottom-margin",
				"description" => __("If this is checked the bottom gap of this section will be reset to 0")
			),
			array(
				"type" => "checkbox",
				"class" => "",
				"heading" => __("Center content", 'tyro'),
				"param_name" => "center-content",
				"description" => __("If this is checked the content within this component will be centered")
			)

		),
	) );
}
