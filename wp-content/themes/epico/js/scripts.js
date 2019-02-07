
/**
 * JQuery Shared Count Plugin
 * http://docs.sharedcount.com/
 */

// Obtem os contadores no serviço Shared Count
jQuery.sharedCount = function(url, fn) {

    url        = encodeURIComponent(url || location.href);
    var domain = '//api.sharedcount.com/v1.0/';
    var apikey = epico_js_vars.scApiKey; // Chave de API do serviço sharedcount.com
    var arg    = {
      data: {
        url : url,
        apikey : apikey
      },
        url: domain,
        cache: true,
        dataType: 'json'
    };

    if ('withCredentials' in new XMLHttpRequest) {
        arg.success = fn;
    }

    else {
        var cb = 'sc_' + url.replace(/\W/g, '');
        window[cb] = fn;
        arg.jsonpCallback = cb;
        arg.dataType += 'p';
    }
    return jQuery.ajax(arg);
};

// Adiciona os números de compartilhamento
( function ($) {
    "use strict";

    $( function() {

        // Confere se a opção de apresentar os contadores de compartilhamento está ativada no painel
        if ( epico_js_vars.scApiKey && ( epico_js_vars.totalCount == 1 || epico_js_vars.partialCount == 1 ) && ( epico_js_vars.facebookButton == 1 || epico_js_vars.twitterButton == 1 || epico_js_vars.pinterestButton == 1 ) ) {

            // Apresenta os contadores de compartilhamento do Facebook e Pinterest pelo serviço Shared Count
            $.sharedCount( location.href, function( data ){

                var facebookCount  = data.Facebook.total_count;

                var pinterestCount = data.Pinterest;

                if ( epico_js_vars.facebookButton == 1 && facebookCount != '0' && epico_js_vars.partialCount == 1 ) {
                    $( '<span class="social-likes__counter social-likes__counter_facebook">' + data.Facebook.total_count + '</span>' ).insertAfter( 'a.social-likes__button_facebook' );
                }

                if ( epico_js_vars.pinterestButton == 1 && pinterestCount != '0' && epico_js_vars.partialCount == 1 ) {
                    $( '<span class="social-likes__counter social-likes__counter_pinterest">' + data.Pinterest + '</span>').insertAfter( 'a.social-likes__button_pinterest' );
                }

                // Obtém e apresenta os contadores de compartilhamento do Twitter pelo serviço New Share Counts
                $.getJSON( 'https://jsoon.digitiminimi.com/twitter/count.json?url="' + location.href + '"?callback=?', function( data ) {

                    var twitterCount = data.count >= 0 ? data.count : '0';

                    var totalCount   = +facebookCount + +pinterestCount + +twitterCount;

                    if ( epico_js_vars.twitterButton == 1 && twitterCount > '0' && epico_js_vars.partialCount == 1 ) {
                        $( '<span class="social-likes__counter social-likes__counter_twitter">' + twitterCount  + '</span>' ).insertAfter( 'a.social-likes__button_twitter' );
                    }

                    if ( totalCount != 0 && epico_js_vars.totalCount == 1 && epico_js_vars.facebookButton == 1 && epico_js_vars.pinterestButton == 1 && epico_js_vars.twitterButton == 1 ) {
                        $( '<p class="social-total-shares"><span class="total-number">' + totalCount + '</span></p>' ).insertAfter( 'ul.social-likes' );
                    }
                });

            });
        }

        // Abre o pop-up de compartilhamento ao clicar no botão da rede social
        $( 'a.social-likes__button:not(a.social-likes__button_whatsapp)').click( function( e ) {

            e.preventDefault();

            var $link   = $( this );
            var href    = $link.attr( 'href' );
            var network = $link.attr( 'data-network' );

            var networks = {
                facebook  : { popup_width : 600, popup_height : 359 },
                twitter   : { popup_width : 600, popup_height : 250 },
                pinterest : { popup_width : 740, popup_height : 550 },
                linkedin  : { popup_width : 650, popup_height : 500 },
            };

            var socialPopup = function( network ) {

              var userAgent = navigator.userAgent,
                  mobile = function() {
                    return /\b(iPhone|iP[ao]d)/.test(userAgent) ||
                      /\b(iP[ao]d)/.test(userAgent) ||
                      /Android/i.test(userAgent) ||
                      /Mobile/i.test(userAgent);
                  },
                  screenX      = typeof window.screenX     != 'undefined' ? window.screenX     : window.screenLeft,
                  screenY      = typeof window.screenY     != 'undefined' ? window.screenY     : window.screenTop,
                  outerWidth   = typeof window.outerWidth  != 'undefined' ? window.outerWidth  : document.documentElement.clientWidth,
                  outerHeight  = typeof window.outerHeight != 'undefined' ? window.outerHeight : document.documentElement.clientHeight - 22,
                  targetWidth  = mobile() ? null : networks[network].popup_width,
                  targetHeight = mobile() ? null : networks[network].popup_height,
                  V            = screenX < 0 ? window.screen.width + screenX : screenX,
                  left         = parseInt( V + ( outerWidth - targetWidth) / 2, 10 ),
                  right        = parseInt( screenY + ( outerHeight - targetHeight ) / 2.5, 10),
                  features     = [];

              if ( targetWidth !== null ) {
                features.push( 'width=' + targetWidth );
              }

              if ( targetHeight !== null ) {
                features.push( 'height=' + targetHeight );
              }

              features.push( 'left=' + left );
              features.push( 'top=' +  right );
              features.push( 'toolbar=no, location=no, directories=no, status=no, menubar=no, copyhistory=no, scrollbars=yes, resizable=yes');

              var newWindow = window.open( href, networks[network], features.join(',') );

              if ( window.focus ) {
                newWindow.focus();
              }

              return newWindow;
            }

            socialPopup( network );
        });
    });

}(jQuery));


/*
 * DoubleTapToGo.js by Osvaldas Valutis, www.osvaldas.info
 * Available for use under the MIT License
 */

;(function( $, window, document, undefined )
{
    $.fn.doubleTapToGo = function( params )
    {
        if( !( 'ontouchstart' in window ) &&
            !navigator.msMaxTouchPoints &&
            !navigator.userAgent.toLowerCase().match( /windows phone os 7/i ) ) return false;

        this.each( function()
        {
            var curItem = false;

            $( this ).on( 'click', function( e )
            {
                var item = $( this );
                if( item[ 0 ] != curItem[ 0 ] )
                {
                    e.preventDefault();
                    curItem = item;
                }
            });

            $( document ).on( 'click touchstart MSPointerDown', function( e )
            {
                var resetItem = true,
                    parents   = $( e.target ).parents();

                for( var i = 0; i < parents.length; i++ )
                    if( parents[ i ] == curItem[ 0 ] )
                        resetItem = false;

                if( resetItem )
                    curItem = false;
            });
        });
        return this;
    };
})( jQuery, window, document );

/*! http://mths.be/placeholder v2.0.8 by @mathias */
(function(e,t,n){function c(e){var t={};var r=/^jQuery\d+$/;n.each(e.attributes,function(e,n){if(n.specified&&!r.test(n.name)){t[n.name]=n.value}});return t}function h(e,t){var r=this;var i=n(r);if(r.value==i.attr("placeholder")&&i.hasClass("placeholder")){if(i.data("placeholder-password")){i=i.hide().next().show().attr("id",i.removeAttr("id").data("placeholder-id"));if(e===true){return i[0].value=t}i.focus()}else{r.value="";i.removeClass("placeholder");r==d()&&r.select()}}}function p(){var e;var t=this;var r=n(t);var i=this.id;if(t.value==""){if(t.type=="password"){if(!r.data("placeholder-textinput")){try{e=r.clone().attr({type:"text"})}catch(s){e=n("<input>").attr(n.extend(c(this),{type:"text"}))}e.removeAttr("name").data({"placeholder-password":r,"placeholder-id":i}).bind("focus.placeholder",h);r.data({"placeholder-textinput":e,"placeholder-id":i}).before(e)}r=r.removeAttr("id").hide().prev().attr("id",i).show()}r.addClass("placeholder");r[0].value=r.attr("placeholder")}else{r.removeClass("placeholder")}}function d(){try{return t.activeElement}catch(e){}}var r=Object.prototype.toString.call(e.operamini)=="[object OperaMini]";var i="placeholder"in t.createElement("input")&&!r;var s="placeholder"in t.createElement("textarea")&&!r;var o=n.fn;var u=n.valHooks;var a=n.propHooks;var f;var l;if(i&&s){l=o.placeholder=function(){return this};l.input=l.textarea=true}else{l=o.placeholder=function(){var e=this;e.filter((i?"textarea":":input")+"[placeholder]").not(".placeholder").bind({"focus.placeholder":h,"blur.placeholder":p}).data("placeholder-enabled",true).trigger("blur.placeholder");return e};l.input=i;l.textarea=s;f={get:function(e){var t=n(e);var r=t.data("placeholder-password");if(r){return r[0].value}return t.data("placeholder-enabled")&&t.hasClass("placeholder")?"":e.value},set:function(e,t){var r=n(e);var i=r.data("placeholder-password");if(i){return i[0].value=t}if(!r.data("placeholder-enabled")){return e.value=t}if(t==""){e.value=t;if(e!=d()){p.call(e)}}else if(r.hasClass("placeholder")){h.call(e,true,t)||(e.value=t)}else{e.value=t}return r}};if(!i){u.input=f;a.value=f}if(!s){u.textarea=f;a.value=f}n(function(){n(t).delegate("form","submit.placeholder",function(){var e=n(".placeholder",this).each(h);setTimeout(function(){e.each(p)},10)})});n(e).bind("beforeunload.placeholder",function(){n(".placeholder").each(function(){this.value=""})})}})(this,document,jQuery);

/**
 * Javascript-Equal-Height-Responsive-Rows
 * https://github.com/Sam152/Javascript-Equal-Height-Responsive-Rows
 */
(function($){$.fn.equalHeight=function(){var heights=[];$.each(this,function(i,element){$element=$(element);var element_height;var includePadding=($element.css('box-sizing')=='border-box')||($element.css('-moz-box-sizing')=='border-box');if(includePadding){element_height=$element.innerHeight();}else{element_height=$element.height();}
    heights.push(element_height);});this.height(Math.max.apply(window,heights));return this;};$.fn.equalHeightGrid=function(columns){var $tiles=this;$tiles.css('height','auto');for(var i=0;i<$tiles.length;i++){if(i%columns===0){var row=$($tiles[i]);for(var n=1;n<columns;n++){row=row.add($tiles[i+n]);}
    row.equalHeight();}}
    return this;};$.fn.detectGridColumns=function(){var offset=0,cols=0;this.each(function(i,elem){var elem_offset=$(elem).offset().top;if(offset===0||elem_offset==offset){cols++;offset=elem_offset;}else{return false;}});return cols;};$.fn.responsiveEqualHeightGrid=function(){var _this=this;function syncHeights(){var cols=_this.detectGridColumns();_this.equalHeightGrid(cols);}
    $(window).bind('resize load',syncHeights);syncHeights();return this;};})(jQuery);


/*! http://mths.be/placeholder v2.0.8 by @mathias */
;(function(window, document, $) {

    // Opera Mini v7 doesn’t support placeholder although its DOM seems to indicate so
    var isOperaMini = Object.prototype.toString.call(window.operamini) == '[object OperaMini]';
    var isInputSupported = 'placeholder' in document.createElement('input') && !isOperaMini;
    var isTextareaSupported = 'placeholder' in document.createElement('textarea') && !isOperaMini;
    var prototype = $.fn;
    var valHooks = $.valHooks;
    var propHooks = $.propHooks;
    var hooks;
    var placeholder;

    if (isInputSupported && isTextareaSupported) {

        placeholder = prototype.placeholder = function() {
            return this;
        };

        placeholder.input = placeholder.textarea = true;

    } else {

        placeholder = prototype.placeholder = function() {
            var $this = this;
            $this
                .filter((isInputSupported ? 'textarea' : ':input') + '[placeholder]')
                .not('.placeholder')
                .bind({
                    'focus.placeholder': clearPlaceholder,
                    'blur.placeholder': setPlaceholder
                })
                .data('placeholder-enabled', true)
                .trigger('blur.placeholder');
            return $this;
        };

        placeholder.input = isInputSupported;
        placeholder.textarea = isTextareaSupported;

        hooks = {
            'get': function(element) {
                var $element = $(element);

                var $passwordInput = $element.data('placeholder-password');
                if ($passwordInput) {
                    return $passwordInput[0].value;
                }

                return $element.data('placeholder-enabled') && $element.hasClass('placeholder') ? '' : element.value;
            },
            'set': function(element, value) {
                var $element = $(element);

                var $passwordInput = $element.data('placeholder-password');
                if ($passwordInput) {
                    return $passwordInput[0].value = value;
                }

                if (!$element.data('placeholder-enabled')) {
                    return element.value = value;
                }
                if (value == '') {
                    element.value = value;
                    // Issue #56: Setting the placeholder causes problems if the element continues to have focus.
                    if (element != safeActiveElement()) {
                        // We can't use `triggerHandler` here because of dummy text/password inputs :(
                        setPlaceholder.call(element);
                    }
                } else if ($element.hasClass('placeholder')) {
                    clearPlaceholder.call(element, true, value) || (element.value = value);
                } else {
                    element.value = value;
                }
                // `set` can not return `undefined`; see http://jsapi.info/jquery/1.7.1/val#L2363
                return $element;
            }
        };

        if (!isInputSupported) {
            valHooks.input = hooks;
            propHooks.value = hooks;
        }
        if (!isTextareaSupported) {
            valHooks.textarea = hooks;
            propHooks.value = hooks;
        }

        $(function() {
            // Look for forms
            $(document).delegate('form', 'submit.placeholder', function() {
                // Clear the placeholder values so they don't get submitted
                var $inputs = $('.placeholder', this).each(clearPlaceholder);
                setTimeout(function() {
                    $inputs.each(setPlaceholder);
                }, 10);
            });
        });

        // Clear placeholder values upon page reload
        $(window).bind('beforeunload.placeholder', function() {
            $('.placeholder').each(function() {
                this.value = '';
            });
        });

    }

    function args(elem) {
        // Return an object of element attributes
        var newAttrs = {};
        var rinlinejQuery = /^jQuery\d+$/;
        $.each(elem.attributes, function(i, attr) {
            if (attr.specified && !rinlinejQuery.test(attr.name)) {
                newAttrs[attr.name] = attr.value;
            }
        });
        return newAttrs;
    }

    function clearPlaceholder(event, value) {
        var input = this;
        var $input = $(input);
        if (input.value == $input.attr('placeholder') && $input.hasClass('placeholder')) {
            if ($input.data('placeholder-password')) {
                $input = $input.hide().next().show().attr('id', $input.removeAttr('id').data('placeholder-id'));
                // If `clearPlaceholder` was called from `$.valHooks.input.set`
                if (event === true) {
                    return $input[0].value = value;
                }
                $input.focus();
            } else {
                input.value = '';
                $input.removeClass('placeholder');
                input == safeActiveElement() && input.select();
            }
        }
    }

    function setPlaceholder() {
        var $replacement;
        var input = this;
        var $input = $(input);
        var id = this.id;
        if (input.value == '') {
            if (input.type == 'password') {
                if (!$input.data('placeholder-textinput')) {
                    try {
                        $replacement = $input.clone().attr({ 'type': 'text' });
                    } catch(e) {
                        $replacement = $('<input>').attr($.extend(args(this), { 'type': 'text' }));
                    }
                    $replacement
                        .removeAttr('name')
                        .data({
                            'placeholder-password': $input,
                            'placeholder-id': id
                        })
                        .bind('focus.placeholder', clearPlaceholder);
                    $input
                        .data({
                            'placeholder-textinput': $replacement,
                            'placeholder-id': id
                        })
                        .before($replacement);
                }
                $input = $input.removeAttr('id').hide().prev().attr('id', id).show();
                // Note: `$input[0] != input` now!
            }
            $input.addClass('placeholder');
            $input[0].value = $input.attr('placeholder');
        } else {
            $input.removeClass('placeholder');
        }
    }

    function safeActiveElement() {
        // Avoid IE9 `document.activeElement` of death
        // https://github.com/mathiasbynens/jquery-placeholder/pull/99
        try {
            return document.activeElement;
        } catch (exception) {}
    }

}(this, document, jQuery));

jQuery( document ).ready( function() {

    /* Adiciona uma classe aos links com imagens. */
    jQuery( 'a' ).has( 'img' ).addClass( 'img-hyperlink' );

    /* Adiciona a classe 'has-posts' a qualquer elemento <td> no calendario que possui posts para aquele determinado dia. */
    jQuery( '.wp-calendar tbody td' ).has( 'a' ).addClass( 'has-posts' );

    /* Adiciona `<span class="wrap">` enclausurando alguns elementos. */
    jQuery(
        '#comments-number, #reply-title, .attachment-meta-title'
    ).wrapInner( '<span class="wrap" />' );

    /* Sobrescreve o <div> do WP que enclausura videos. */
    jQuery( 'div[style*="max-width: 100%"] > video' ).parent().css( 'width', '100%' );

    /* Videos responsivos. */
    jQuery( '.entry object, .entry embed, .entry iframe' ).not( 'embed[style*="display"], [src*="soundcloud.com"],[src*="infogr.am"],[name^="gform_"],iframe.wp-embedded-content,[src*="podbean.com"],[src*="libsyn.com"],[onload*="window.google_iframe"]' ).wrap( '<div class="embed-wrap" />' );

    /* Remove a margem inferior de vídeos quando seguidos de uma legenda */
    jQuery( 'figcaption' ).prev( '.embed-wrap' ).css( 'margin-bottom', '0' );

    /* Alterna informacoes de audio/video quando utilizando o shortcode para audio ou video. */
    jQuery( '.media-info-toggle' ).click(
        function() {
            jQuery( this ).parent().children( '.audio-info, .video-info' ).slideToggle( 'slow' );
            jQuery( this ).toggleClass( 'active' );
        }
    );

    /* Adiciona CSS ao iframe do embed do Instagram */
    jQuery( "iframe[src*='instagram']" ).parent().css( "padding-bottom", "110%" );

    /* Funcao auxiliar – aguarda ate o evento estiver finalizado.  */

    var waitFinalEvent = (function () {
        var timerSticky = {};
        return function (callback, ms, uniqueId) {
            if (!uniqueId) {
                uniqueId = "stickysocialbarid";
            }
            if (timerSticky[uniqueId]) {
                clearTimeout(timerSticky[uniqueId]);
            }
            timerSticky[uniqueId] = setTimeout(callback, ms);
        };
    })();


    /* Altera largura e altura de elementos de acordo com as dimensoes da janela */

    jQuery(window).on('load resize scroll', function () {
        waitFinalEvent(function () {
            var stickySocial = jQuery('#social-bar-sticky.sticky');
            var stickyPar    = stickySocial.parents('article').outerWidth();
            var stickyAviso  = jQuery('.uberaviso-fixed');
            var adminBar     = jQuery('div#wpadminbar');

            if (jQuery(stickyAviso).length || jQuery(stickySocial).length ) {
                stickySocial.css({
                    width: stickyPar,
                    'top': stickyAviso.outerHeight()
                });
                jQuery('body').css({
                    'padding-top': stickyAviso.outerHeight()
                });
            } else {
                stickySocial.css({
                    width: stickyPar
                });
                jQuery('body').css({
                    'padding-top': 0
                });
            }
            if (jQuery(adminBar).length ) {
                stickyAviso.css({
                    'top': adminBar.outerHeight()
                });
                stickySocial.css({
                    width: stickyPar,
                    'top': stickyAviso.outerHeight() + adminBar.outerHeight()
                });
            }
        }, 100, 'stickysocialbarid');
    });


    /* Acao do botao de fechar. */
    jQuery('#social-bar-sticky #social-close').on("click", function (e) {
        e.preventDefault();
        jQuery('#social-bar-sticky').fadeOut(500);
        jQuery('#content .sticky').hide();
    });

    /* Efeito para entrar e sair do modo Zen. */
    jQuery('#zen').click(
        function(event){
            jQuery('.capture-overlay').css('display','none');
            jQuery('body').fadeOut(550, function(){
                jQuery('span#zen').toggleClass('zen-active');
                jQuery('body').toggleClass('zen').fadeIn(550);
            });
            event.stopPropagation();
        });

    /* Ativa o script para acoes touch do menu no mobile. */
    jQuery( function() {
        var subMenu = jQuery( '.menu-item-has-children' );
        if ( subMenu.length )
            subMenu.doubleTapToGo();
    });

    /* Adiciona classes e acoes ao menu e a busca para alterna-las */
    jQuery(window).on('resize', function () {
        var width = jQuery( window ).width();
        if ( 680 >= width ) {
            jQuery( '#menu-primary > ul' ).addClass( 'nav-mobile' );
            jQuery( '#nav .search-form' ).addClass( 'search-mobile' )
        } else {
            jQuery( '#menu-primary > ul' ).removeClass( 'nav-mobile' );
            jQuery( '#nav .search-form' ).removeClass( 'search-mobile' )
        }
    }).resize();

    jQuery( '#menu-primary .nav-mobile, #nav .search-form' ).click(function(event){
        event.stopPropagation();
    });

    jQuery('html').click(function(event){
        jQuery('#menu-primary .nav-mobile, #nav .search-form').css( 'display', 'none' );
        jQuery( '#search-toggle' ).removeClass( 'search-close' );
        jQuery( '#menu-primary .nav-mobile' ).removeClass( 'nav-active' );
    });

    jQuery('#nav-toggle').click(function(event) {
        jQuery( '#menu-primary .nav-mobile' ).fadeToggle( 'slow' );
        jQuery( '#menu-primary .nav-mobile' ).toggleClass( 'nav-active' );
        if (jQuery( '#nav .search-mobile' ).is( ':visible' ) ) {
            jQuery( '#nav .search-mobile' ).fadeToggle( 'slow' );
            jQuery( '#search-toggle' ).toggleClass( 'search-close' );
            jQuery('#nav .search-form input.search-field').blur();
        }
        event.stopPropagation();
    });

    jQuery('#search-toggle').click(function(event) {
        jQuery( '#nav .search-form' ).fadeToggle( 'slow', function() {
            jQuery('#nav .search-form input.search-field').focus();
        });
        jQuery( this ).toggleClass( 'search-close' );
        if (jQuery( '#menu-primary .nav-mobile' ).is( ':visible' ) ) {
            jQuery( '#menu-primary .nav-mobile' ).fadeToggle( 'slow' );
        }
        event.stopPropagation();
    });

    jQuery('.epico-related-posts li').responsiveEqualHeightGrid();
    jQuery('.resize-me > a').responsiveEqualHeightGrid();
    jQuery('input').placeholder();

} );

/**
 * UTMForm.js
 * https://github.com/medius/utm_form
 *
 * Captures UTM Parameters and attach them to forms
 *
 * @version   1.0.4
 * @author    Puru Choudhary
 * @copyright 2015-2018 Puru Choudhary
 * @license   MIT
 */

// Configure input name prefixes necessary for Email Marketing services

if ( 3 == epico_js_vars.uf_email_service ) {         // Aweber
    var source_field_start = 'custom ';
    var source_field_end   = '';
} else if ( 7 == epico_js_vars.uf_email_service ) {  // Get response
    var source_field_start = 'custom_';
    var source_field_end   = '';
} else if ( 13 == epico_js_vars.uf_email_service ) { // Madmimi
    var source_field_start = 'signup[';
    var source_field_end   = ']';
} else if ( 14 == epico_js_vars.uf_email_service ) { // MailRelay
    var source_field_start = 'f_';
    var source_field_end   = '';
} else if ( 16 == epico_js_vars.uf_email_service ) { // Mailee
    var source_field_start = 'dynamic_attributes[';
    var source_field_end   = ']';
} else if ( 17 == epico_js_vars.uf_email_service ) { // Mailpoet
    var source_field_start = 'data[cf_';
    var source_field_end   = ']';
} else if ( 19 == epico_js_vars.uf_email_service ) { // Mautic
    var source_field_start = 'mauticform[';
    var source_field_end   = ']';
} else if ( 22 == epico_js_vars.uf_email_service ) { // Trafficwave
    var source_field_start = 'da_';
    var source_field_end   = '';
} else { // All other email marketing services
    var source_field_start = '';
    var source_field_end   = '';
}

 // UTM Form configuration
  var _uf = _uf || {};
  _uf.domain                     = epico_js_vars.uf_utm_domain;

  _uf.utm_source_field           = source_field_start + epico_js_vars.uf_utm_source   + source_field_end;
  _uf.utm_medium_field           = source_field_start + epico_js_vars.uf_utm_medium   + source_field_end;
  _uf.utm_campaign_field         = source_field_start + epico_js_vars.uf_utm_campaign + source_field_end;
  _uf.utm_content_field          = source_field_start + epico_js_vars.uf_utm_content  + source_field_end;
  _uf.utm_term_field             = source_field_start + epico_js_vars.uf_utm_term     + source_field_end;

  _uf.initial_referrer_field     = source_field_start + epico_js_vars.uf_initial_referrer + source_field_end;
  _uf.last_referrer_field        = source_field_start + epico_js_vars.uf_last_referrer    + source_field_end;
  _uf.initial_landing_page_field = source_field_start + epico_js_vars.uf_initial_landing  + source_field_end;
  _uf.visits_field               = source_field_start + epico_js_vars.uf_visits           + source_field_end;

  _uf.additional_params_map      = { affiliate: source_field_start + epico_js_vars.uf_affiliate + source_field_end };

  _uf.sessionLength              = 1;
  _uf.add_to_form                = 'all';
  _uf.form_query_selector        = 'form.uf-form';


// Main script from this point on.
var UtmCookie;

UtmCookie = (function() {
  function UtmCookie(options) {
    if (options == null) {
      options = {};
    }
    this._cookieNamePrefix = '_uc_';
    this._domain = options.domain;
    this._sessionLength = options.sessionLength || 1;
    this._cookieExpiryDays = options.cookieExpiryDays || 365;
    this._additionalParams = options.additionalParams || [];
    this._utmParams = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'];
    this.writeInitialReferrer();
    this.writeLastReferrer();
    this.writeInitialLandingPageUrl();
    this.setCurrentSession();
    if (this.additionalParamsPresentInUrl()) {
      this.writeAdditionalParams();
    }
    if (this.utmPresentInUrl()) {
      this.writeUtmCookieFromParams();
    }
    return;
  }

  UtmCookie.prototype.createCookie = function(name, value, days, path, domain, secure) {
    var cookieDomain, cookieExpire, cookiePath, cookieSecure, date, expireDate;
    expireDate = null;
    if (days) {
      date = new Date;
      date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
      expireDate = date;
    }
    cookieExpire = expireDate != null ? '; expires=' + expireDate.toGMTString() : '';
    cookiePath = path != null ? '; path=' + path : '; path=/';
    cookieDomain = domain != null ? '; domain=' + domain : '';
    cookieSecure = secure != null ? '; secure' : '';
    document.cookie = this._cookieNamePrefix + name + '=' + escape(value) + cookieExpire + cookiePath + cookieDomain + cookieSecure;
  };

  UtmCookie.prototype.readCookie = function(name) {
    var c, ca, i, nameEQ;
    nameEQ = this._cookieNamePrefix + name + '=';
    ca = document.cookie.split(';');
    i = 0;
    while (i < ca.length) {
      c = ca[i];
      while (c.charAt(0) === ' ') {
        c = c.substring(1, c.length);
      }
      if (c.indexOf(nameEQ) === 0) {
        return c.substring(nameEQ.length, c.length);
      }
      i++;
    }
    return null;
  };

  UtmCookie.prototype.eraseCookie = function(name) {
    this.createCookie(name, '', -1, null, this._domain);
  };

  UtmCookie.prototype.getParameterByName = function(name) {
    var regex, regexS, results;
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    regexS = '[\\?&]' + name + '=([^&#]*)';
    regex = new RegExp(regexS);
    results = regex.exec(window.location.search);
    if (results) {
      return decodeURIComponent(results[1].replace(/\+/g, ' '));
    } else {
      return '';
    }
  };

  UtmCookie.prototype.additionalParamsPresentInUrl = function() {
    var j, len, param, ref;
    ref = this._additionalParams;
    for (j = 0, len = ref.length; j < len; j++) {
      param = ref[j];
      if (this.getParameterByName(param)) {
        return true;
      }
    }
    return false;
  };

  UtmCookie.prototype.utmPresentInUrl = function() {
    var j, len, param, ref;
    ref = this._utmParams;
    for (j = 0, len = ref.length; j < len; j++) {
      param = ref[j];
      if (this.getParameterByName(param)) {
        return true;
      }
    }
    return false;
  };

  UtmCookie.prototype.writeCookie = function(name, value) {
    this.createCookie(name, value, this._cookieExpiryDays, null, this._domain);
  };

  UtmCookie.prototype.writeAdditionalParams = function() {
    var j, len, param, ref, value;
    ref = this._additionalParams;
    for (j = 0, len = ref.length; j < len; j++) {
      param = ref[j];
      value = this.getParameterByName(param);
      this.writeCookie(param, value);
    }
  };

  UtmCookie.prototype.writeUtmCookieFromParams = function() {
    var j, len, param, ref, value;
    ref = this._utmParams;
    for (j = 0, len = ref.length; j < len; j++) {
      param = ref[j];
      value = this.getParameterByName(param);
      this.writeCookie(param, value);
    }
  };

  UtmCookie.prototype.writeCookieOnce = function(name, value) {
    var existingValue;
    existingValue = this.readCookie(name);
    if (!existingValue) {
      this.writeCookie(name, value);
    }
  };

  UtmCookie.prototype._sameDomainReferrer = function(referrer) {
    var hostname;
    hostname = document.location.hostname;
    return referrer.indexOf(this._domain) > -1 || referrer.indexOf(hostname) > -1;
  };

  UtmCookie.prototype._isInvalidReferrer = function(referrer) {
    return referrer === '' || referrer === void 0;
  };

  UtmCookie.prototype.writeInitialReferrer = function() {
    var value;
    value = document.referrer;
    if (this._isInvalidReferrer(value)) {
      value = 'direct';
    }
    this.writeCookieOnce('referrer', value);
  };

  UtmCookie.prototype.writeLastReferrer = function() {
    var value;
    value = document.referrer;
    if (!this._sameDomainReferrer(value)) {
      if (this._isInvalidReferrer(value)) {
        value = 'direct';
      }
      this.writeCookie('last_referrer', value);
    }
  };

  UtmCookie.prototype.writeInitialLandingPageUrl = function() {
    var value;
    value = this.cleanUrl();
    if (value) {
      this.writeCookieOnce('initial_landing_page', value);
    }
  };

  UtmCookie.prototype.initialReferrer = function() {
    return this.readCookie('referrer');
  };

  UtmCookie.prototype.lastReferrer = function() {
    return this.readCookie('last_referrer');
  };

  UtmCookie.prototype.initialLandingPageUrl = function() {
    return this.readCookie('initial_landing_page');
  };

  UtmCookie.prototype.incrementVisitCount = function() {
    var cookieName, existingValue, newValue;
    cookieName = 'visits';
    existingValue = parseInt(this.readCookie(cookieName), 10);
    newValue = 1;
    if (isNaN(existingValue)) {
      newValue = 1;
    } else {
      newValue = existingValue + 1;
    }
    this.writeCookie(cookieName, newValue);
  };

  UtmCookie.prototype.visits = function() {
    return this.readCookie('visits');
  };

  UtmCookie.prototype.setCurrentSession = function() {
    var cookieName, existingValue;
    cookieName = 'current_session';
    existingValue = this.readCookie(cookieName);
    if (!existingValue) {
      this.createCookie(cookieName, 'true', this._sessionLength / 24, null, this._domain);
      this.incrementVisitCount();
    }
  };

  UtmCookie.prototype.cleanUrl = function() {
    var cleanSearch;
    cleanSearch = window.location.search.replace(/utm_[^&]+&?/g, '').replace(/&$/, '').replace(/^\?$/, '');
    return window.location.origin + window.location.pathname + cleanSearch + window.location.hash;
  };

  return UtmCookie;

})();

var UtmForm, _uf;

UtmForm = (function() {
  function UtmForm(options) {
    if (options == null) {
      options = {};
    }
    this._utmParamsMap = {};
    this._utmParamsMap.utm_source   = options.utm_source_field           || 'USOURCE';
    this._utmParamsMap.utm_medium   = options.utm_medium_field           || 'UMEDIUM';
    this._utmParamsMap.utm_campaign = options.utm_campaign_field         || 'UCAMPAIGN';
    this._utmParamsMap.utm_content  = options.utm_content_field          || 'UCONTENT';
    this._utmParamsMap.utm_term     = options.utm_term_field             || 'UTERM';
    this._additionalParamsMap       = options.additional_params_map      || {};
    this._initialReferrerField      = options.initial_referrer_field     || 'IREFERRER';
    this._lastReferrerField         = options.last_referrer_field        || 'LREFERRER';
    this._initialLandingPageField   = options.initial_landing_page_field || 'ILANDPAGE';
    this._visitsField               = options.visits_field               || 'VISITS';
    this._addToForm                 = options.add_to_form                || 'all';
    this._formQuerySelector         = options.form_query_selector        || 'form';
    this.utmCookie = new UtmCookie({
      domain: options.domain,
      sessionLength: options.sessionLength,
      cookieExpiryDays: options.cookieExpiryDays,
      additionalParams: Object.getOwnPropertyNames(this._additionalParamsMap)
    });
    this.addAllFields();
  }

  UtmForm.prototype.addAllFields = function() {
    var allForms, i, len;
    allForms = document.querySelectorAll(this._formQuerySelector);
    if (this._addToForm === 'none') {
      len = 0;
    } else if (this._addToForm === 'first') {
      len = Math.min(1, allForms.length);
    } else {
      len = allForms.length;
    }
    i = 0;
    while (i < len) {
      this.addAllFieldsToForm(allForms[i]);
      i++;
    }
  };

  UtmForm.prototype.addAllFieldsToForm = function(form) {
    var fieldName, param, ref, ref1;
    if (form && !form._utm_tagged) {
      form._utm_tagged = true;
      ref = this._utmParamsMap;
      for (param in ref) {
        fieldName = ref[param];
        this.addFormElem(form, fieldName, this.utmCookie.readCookie(param));
      }
      ref1 = this._additionalParamsMap;
      for (param in ref1) {
        fieldName = ref1[param];
        this.addFormElem(form, fieldName, this.utmCookie.readCookie(param));
      }
      this.addFormElem(form, this._initialReferrerField, this.utmCookie.initialReferrer());
      this.addFormElem(form, this._lastReferrerField, this.utmCookie.lastReferrer());
      this.addFormElem(form, this._initialLandingPageField, this.utmCookie.initialLandingPageUrl());
      this.addFormElem(form, this._visitsField, this.utmCookie.visits());
    }
  };

  UtmForm.prototype.addFormElem = function(form, fieldName, fieldValue) {
    this.insertAfter(this.getFieldEl(fieldName, fieldValue), form.lastChild);
  };

  UtmForm.prototype.getFieldEl = function(fieldName, fieldValue) {
    var fieldEl;
    fieldEl = document.createElement('input');
    fieldEl.type = 'hidden';
    fieldEl.name = fieldName;
    fieldEl.value = decodeURIComponent(fieldValue);// Decodifica URLs que foram codificadas no cookie
    return fieldEl;
  };

  UtmForm.prototype.insertAfter = function(newNode, referenceNode) {
    return referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
  };

  return UtmForm;

})();

// Use only if the option is activated on the theme panel
if ( epico_js_vars.uf_utm_processor == 1 ) {
    _uf = window._uf || {};
    window.UtmForm = new UtmForm(_uf);
}
