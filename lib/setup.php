<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

add_theme_support('custom-logo', [
    // whatever settings
    // 'height' => 150,
    // 'width' => 150,
    'flex-width' => true,
]);

/**
 * Theme assets - extras
 */
function assets_extras() {
    wp_enqueue_script( 'az-debug-js', Assets\asset_path( '../az-sage-extras/assets/scripts/debug.js' ), [ 'jquery' ], null, true );
}