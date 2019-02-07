( function( $ ){
	"use strict";

	$(function () {
		function initColorPicker( widget ) {
			widget.find( '.uf_epico_colorpicker' ).wpColorPicker( {
				change: _.throttle( function() { // Para o personalizador
					$(this).trigger( 'change' );
				}, 500 ),
				palettes: ['#FFFFFF', '#F9F5EE', '#00D0CF', '#FF7443','#3F4F55', '#5F7781', '#009CFF', '#FFAD00', '#6E83F7', '#00C29A'],
				width: 310,
			});
		}

		function onFormUpdate( event, widget ) {
			initColorPicker( widget );
		}

		$( document ).on( 'widget-added widget-updated', onFormUpdate );

		$( document ).ready( function() {
			$( '#widgets-right .widget:has(.uf_epico_colorpicker)' ).each( function () {
				initColorPicker( $( this ) );
			});
		});
	});
}( jQuery ) );
