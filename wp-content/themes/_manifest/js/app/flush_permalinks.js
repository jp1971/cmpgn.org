( function( $ ) {

    "use strict";

    $( function() {

        // Listen for click on Flush Permalinks
        $( MFP.button_id ).click( function( e ) {

            e.preventDefault();

            // Store callback method name and nonce field value in an array
            var data = {
                action: MFP.action_id,
                nonce: MFP.nonce
            };

            // AJAX call
            $.post( ajaxurl, data, function( response ) {

                if ( '1' === response ) {
                    alert( MFP.success_msg );
                } else {
                    alert( MFP.error_msg );
                }

            });

        });

    });

}( jQuery ));