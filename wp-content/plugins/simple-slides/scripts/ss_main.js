jQuery( document ).ready( function( $ ) {
    $( '.simple_slides' ).each( function( i, v ){
        var id = $( v ).attr( 'id' );
        var settings = window[id];
        
        if ( 'object' == typeof settings ) {
            for ( var attr in settings ) {
                if ( ! isNaN( settings[attr] ) )
                    settings[attr] = parseFloat( settings[attr] );
            }   
            
            if ( 'function' == typeof $( v )[settings.f] )
                $( v )[settings.f]( settings );
        }  
    } );
} );