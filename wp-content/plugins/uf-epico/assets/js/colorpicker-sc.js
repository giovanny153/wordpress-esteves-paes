// Campos de seleção de cor
// Licence GPL2+
(function ($) {
	"use strict";

		$(function() {
			if ( $( ".uf_epico_colorpicker" ).length ) {
				$('.uf_epico_colorpicker').wpColorPicker({
					palettes: ['#FFFFFF', '#F9F5EE', '#00D0CF', '#FF7443','#3F4F55', '#5F7781', '#009CFF', '#FFAD00', '#6E83F7', '#00C29A'],
					width: 310,
				});
			}
		});

}(jQuery));
