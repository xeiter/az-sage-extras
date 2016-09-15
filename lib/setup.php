<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme assets - extras
 */
function assets_extras() {
    wp_enqueue_script( 'az-debug-js', Assets\asset_path( '../az-sage-extras/assets/scripts/debug.js' ), [ 'jquery' ], null, true );
}