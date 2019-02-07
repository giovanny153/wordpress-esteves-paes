// Janela modal do campo de envio de imagem.
// Licence GPL2+

function uf_epico_open_imagemodal( el ) {
	var button = jQuery( el ),
		response,
		preview = button.parent(),
		frame = wp.media( {
			title :  'Selecionar imagem',
			multiple : false,
			library: {
				type: 'image'
			},
			button : {
				text : 'Usar imagem'
			}
	});

	// Executa no `select`.
	frame.on( 'select', function() {
		var objSettings = frame.state().get( 'selection' ).first().toJSON(),
		id = button.parent().parent().find( '.imageid' );

		preview.html( '<span class="remove">&times;</span>' );
		jQuery.each( objSettings.sizes, function( size, opts ) {
			var issel = '';

			preview.append( '<span data-size="' + opts.width + 'x' + opts.height + '" class="sizes ' + size + '">' + size + '</span>' );
		});

		if ( typeof objSettings.sizes.medium !== 'undefined' ) {
			var srcurl  = objSettings.sizes.medium.url,
				sizex   = objSettings.sizes.medium.width,
				sizey   = objSettings.sizes.medium.height,
				setsize = 'medium',
				size    = objSettings.sizes.medium.width + 'x' + objSettings.sizes.medium.height;

			preview.prepend( '<span class="preview">' + size + '</span>' );
			preview.find( '.medium' ).addClass( 'selected' );

		} else {
			var srcurl  = objSettings.sizes.full.url,
				sizex   = objSettings.sizes.full.width,
				sizey   = objSettings.sizes.full.height,
				setsize = 'full',
				size    = objSettings.sizes.full.width + 'x' + objSettings.sizes.full.height;

			preview.prepend( '<span class="preview">' + size + '</span>' );
			preview.find( '.full' ).addClass( 'selected' );
		}

		id.val( objSettings.id + ',' + setsize ).trigger('change');

		if( sizex > sizey ) {
			response = '100% auto';
		} else if( sizex <= sizey ) {
			response = 'auto 100%';
		}

		preview.css( 'background', 'url( ' + srcurl + ') center center / ' + response + ' no-repeat' ).append( '<span class="filechanger-btn uf_epico_media_select changer">Alterar imagem</span>' );
	});

	frame.open();
}

jQuery( function( $ ) {

	// Modais de mídia.
	if( typeof wp !== 'undefined' ) {

		if( typeof wp.media === 'undefined' ){ return; }

		var _custom_media = true,
		_orig_send_attachment = wp.media.editor.send.attachment;

		$( 'body' ).on( 'click', '.image-field-uf-epico .uf_epico_media_select', function() {
			uf_epico_open_imagemodal( this );
		});

		$( 'body' ).on( 'click', '.image-field-uf-epico .remove', function() {
			var box = $( this ).parent();
			box.parent().find( '.imageid' ).val('').trigger('change');

			box.html( '<span class="noselection uf_epico_media_select button">Selecionar imagem</span>' ).removeAttr( 'style' );
		});

		$( 'body' ).on( 'click', '.image-field-uf-epico .sizes', function() {
			var clicked = $( this ),
			field = clicked.parent().parent().find( '.imageid' );
			clicked.parent().find( '.sizes' ).removeClass( 'selected' );
			clicked.parent().find( '.preview' ).html(clicked.data( 'size' ) );
			clicked.addClass( 'selected' );
			field.val(field.val().split(',')[0] + ',' + clicked.html() ).trigger('change');
		});
	}
})