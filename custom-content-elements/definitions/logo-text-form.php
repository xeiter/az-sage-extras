<?php

add_action( 'vc_before_init', 'tyro_vc_register_logo_text_form_shortcode' );

/**
 * Register tyro-logo-text-form shortcode in Visual Composer
 */
function tyro_vc_register_logo_text_form_shortcode() {

	$all_forms = RGFormsModel::get_forms( null, 'title' );

	$form_options = array( 'Do not use a form' => '' );
	foreach ( $all_forms as $form ) {
		$form_options[ $form->title ] = $form->id;
	}

	vc_map(
		array(
			"name"   => __( "Tyro LP Logo, Text, Form", "tyro" ),
			"base"   => "tyro-logo-text-form",
			"category" => __( "Tyro Widgets", "tyro" ),
			"icon"   => get_template_directory_uri() . "/custom-content-elements/icons/tyro-content-elements-logo-text-form-icon.png",
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
					"type"        => "attach_image",
					"class"       => "",
					"heading"     => __( "Logo image" ),
					"param_name"  => "logo-image",
					"value"       => __( "" ),
					"description" => __( "Logo that will be used instead of logo" )
				),

				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "vc_admin_label admin_label_h2",
					"heading"     => __( "Heading 1 text" ),
					"param_name"  => "heading-1-text",
					"value"       => __( "" ),
					"description" => __( "Heading 1 that will be displayed in the banner section" )
				),

				array(
					"type"        => "dropdown",
					"class"       => "",
					"heading"     => __( "Heading 1 width" ),
					"param_name"  => "heading-1-width",
					"value"       => array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ),
					"std"         => 12,
					"description" => __( "Maximum width that the &lt;H1&gt; will be using (based on the number of grid columns)" )
				),

				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "vc_admin_label admin_label_h2",
					"heading"     => __( "Heading 2 text" ),
					"param_name"  => "heading-2-text",
					"value"       => __( "" ),
					"description" => __( "Heading 2 that will be displayed in the banner section" )
				),

				array(
					"type"        => "dropdown",
					"class"       => "",
					"heading"     => __( "Heading 2 width" ),
					"param_name"  => "heading-2-width",
					"value"       => array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ),
					"std"         => 12,
					"description" => __( "Maximum width that the &lt;H2&gt; will be using (based on the number of grid columns)" )
				),

				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "vc_admin_label admin_label_h3",
					"heading"     => __( "Heading 3 text" ),
					"param_name"  => "heading-3-text",
					"value"       => __( "" ),
					"description" => __( "Heading 3 that will be displayed in the banner section" )
				),

				array(
					"type"        => "dropdown",
					"class"       => "",
					"heading"     => __( "Heading 3 width" ),
					"param_name"  => "heading-3-width",
					"value"       => array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ),
					"std"         => 12,
					"description" => __( "Maximum width that the &lt;H3&gt; will be using (based on the number of grid columns)" )
				),

				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "vc_admin_label admin_label_h3",
					"heading"     => __( "Paragraph text" ),
					"param_name"  => "p-text",
					"value"       => __( "" ),
					"description" => __( "Paragraph of text that is displayed after the headings and before the form" )
				),

				array(
					"type"        => "dropdown",
					"class"       => "",
					"heading"     => __( "Paragraph width" ),
					"param_name"  => "p-width",
					"value"       => array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ),
					"std"         => 12,
					"description" => __( "Maximum width that the &lt;P&gt; will be using (based on the number of grid columns)" )
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
					"type"        => "dropdown",
					"class"       => "",
					"heading"     => __( "Form" ),
					"param_name"  => "form",
					"value"       => $form_options,
					"description" => __( "Lead conversion form that will be displayed in this component" )
				),

				array(
					"type"        => "checkbox",
					"class"       => "",
					"heading"     => __( "Remove bottom margin", 'tyro' ),
					"param_name"  => "remove-bottom-margin",
					"description" => __( "If this is checked the bottom margin will be set to 0" )
				),

				array(
					"type"        => "attach_image",
					"class"       => "",
					"heading"     => __( "Background image" ),
					"param_name"  => "background-image",
					"value"       => __( "" ),
					"description" => __( "Image used as a background of this component" )
				),

			),
		)
	);
}