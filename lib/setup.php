<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme assets - extras
 */
function assets_extras() {
    wp_enqueue_script('sage/js/debug', Assets\asset_path('scripts/debug.js'), ['jquery'], null, true);
}