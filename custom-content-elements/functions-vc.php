<?php

// Include all definitions of custom content elements
foreach (glob( get_template_directory() . '/custom-content-elements/definitions/*.php' ) as $definition ) {
    if ( file_exists( $definition ) ) {
        require_once $definition;
    }
}

class WPBakeryShortCode_LandingPages extends WPBakeryShortCode {}