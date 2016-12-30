(function ($) {

    var SVG = {
        redisplaySVGs: function () {

            /**
             * In order for this to work, the SVG files must have the following CSS applied initially:
             *
             * .svg { visibility: hidden; }
             */

            jQuery(document).on("svg.loaded", function () {
                jQuery("svg").css("visibility", "initial");
            });

        }
    };

    // Display processed SVG files
    $(document).ready(SVG.redisplaySVGs);

})(jQuery);
