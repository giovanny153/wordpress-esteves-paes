// Toggles para botões dos widgets
// Licence GPL2+
jQuery(function($){
	$('body').on('click', '.uf_epico-toggle-group-buttons .button', function(){
		var clicked = $(this),
			parent = clicked.parent(),
			input = parent.next();

		parent.find('.button').removeClass('button-primary');
		clicked.addClass('button-primary');
		input.val(clicked.data('value')).trigger('change');
	});
});
