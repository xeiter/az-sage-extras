(function($) {

  var UTIL = {
    loadEvents: function() {

      // Output the queued up debug variables
      if ( typeof debug !== 'undefined' ) {
        console.log( debug.variables );
      }

    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery);
