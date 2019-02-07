<?php
/**
 *
 * Scripts para o Épico Capture (versão widget)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */
?>
( function ($) {
    "use strict";

    $( function () {

        var capture         = $( '#cw-<?php echo esc_attr( $custom_id ); ?>' );
        var capture_sidebar = $( '.epico-sidebar #after-primary' ).find( '#cw-<?php echo esc_attr( $custom_id ); ?>' ).last();

        if ( $( '#cw-<?php echo esc_attr( $custom_id); ?>:visible' ).length ) {

            $( window ).on( 'resize', function() {
                if( $( window ).width() > 700 && $( '#cw-<?php echo esc_attr( $custom_id); ?>.fw' ).width() < 550 ) {
                    $( '#cw-<?php echo esc_attr( $custom_id); ?>.fw' ).css( 'min-height','500px' ).addClass( 'ol' );
                    $( '#cw-<?php echo esc_attr( $custom_id); ?>.fw .capture-overlay' ).show();
                } else {
                    $( '#cw-<?php echo esc_attr( $custom_id); ?> .capture-overlay' ).hide();
                }
            } ).trigger( 'resize' );
        }

    <?php if ( true == $atts[ 'bkg_img' ] ) { ?>

        function convertHexa( hex, opacity ) {
            var hex = hex.replace( '#','' );
            var r   = parseInt( hex.substring( 0,2 ), 16 );
            var g   = parseInt( hex.substring( 2,4 ), 16 );
            var b   = parseInt( hex.substring( 4,6 ), 16 );

            var result = 'rgba(' + r + ',' + g + ',' + b + ',' + opacity/100+' )';
            return result;
        }

        <?php if ( 1 == $atts[ 'overlay' ] ) { ?>

        if ( capture.length ) {

            capture.css(
                    'background','-webkit-linear-gradient(' + convertHexa( "<?php echo sanitize_hex_color( $atts['overlay_color'] ); ?>", 80 ) + ',' + convertHexa( "<?php echo sanitize_hex_color( $atts['overlay_color'] ); ?>", 70 ) + '), url(<?php echo esc_url( $atts['bkg_img'] ); ?>) 50%'
                ).css(
                    'background','linear-gradient(' + convertHexa("<?php echo sanitize_hex_color( $atts['overlay_color'] ); ?>", 80) + ',' + convertHexa( "<?php echo sanitize_hex_color( $atts['overlay_color'] ); ?>",70) + '), url(<?php echo esc_url( $atts['bkg_img'] ); ?>) 50%'
                ).css(
                    'background-size','cover'
                );
        }

        <?php } else { ?>

        if ( capture.length ) {

            capture.css( { 'background' : 'transparent url(<?php echo esc_url( $atts['bkg_img'] ); ?>) 50%', 'background-size' : 'cover' } );
        }

        <?php } ?>

    <?php } ?>

    <?php if ( '1' == $atts[ 'gdpr' ] ) { ?>

        $( '#cw-<?php echo esc_attr( $custom_id ); ?> .uf-gdpr label' ).click( function() {
            $( this ).closest('.uf-gdpr').toggleClass( 'checked' );
        });

    <?php } ?>

    <?php if ( 2 == $atts[ 'sidebar' ] ) { ?>

        <?php if ( 1 == $atts[ 'sticky' ] ) { ?>

            if ( capture_sidebar.length ) {

                var $footerHeight    = $( '#footer' ).height();
                var $sidebarFooter   = $( '#sidebar-subsidiary' ).height()

                 capture_sidebar.hcSticky({
                    top: 78,
                    bottomEnd: $footerHeight + $sidebarFooter + 100,
                    wrapperClassName: 'sticky',
                    responsive: true,
                    offResolutions: [-1020],
                    stickTo: 'document',
                });

                $( '#zen' ).on( 'click', function (e){
                    e.preventDefault();
                    capture_sidebar.hcSticky('stop');
                });
            }
        <?php } ?>

        $( '.capture-close', capture ).on( 'click', function (e) {
            e.preventDefault();
            capture.fadeOut( 500 );
        });

        if ( capture.length ) {

            $( window ).on( 'resize', function () {
                if ( capture.width() < 260 ) {
                    capture.addClass( 'tiny-sidebar' );
                } else {
                    capture.removeClass( 'tiny-sidebar' );
                }
            }).trigger( 'resize' );
        }

        <?php } ?>

        <?php if ( 1 == $atts[ 'modal_video' ] && ! empty( $atts[ 'video_url' ] ) ) {

            // Identifica o provedor de video
            $video_url = wp_parse_url( $atts[ 'video_url' ] );

            // Obtém o ID do vídeo
            $video_id  = self::epico_get_id_from_url( esc_url( $atts[ 'video_url' ] ) );

            // Obtém o nome do domínio do blog
            $urlparts  = parse_url( site_url() );
            $domain    = $urlparts[ 'host' ]; ?>

            // Ativa o lightbox de vídeo
            $( ".uf-icon [data-video-id='<?php echo esc_attr( $video_id); ?>']" ).modalVideo({
                channel    : "<?php echo ( strpos( $video_url[ 'host' ], 'vimeo.com' ) !== false ? 'vimeo' : 'youtube' ); ?>",
                classNames : {
                    modalVideo : "uf-modal-video",
                    modalVideoClose : "uf-modal-video-close",
                    modalVideoBody : "uf-modal-video-body",
                    modalVideoInner : "uf-modal-video-inner",
                    modalVideoIframeWrap : "uf-modal-video-movie-wrap",
                    modalVideoCloseBtn : "uf-modal-video-close-btn",
                    },
                aria : {
                    openMessage : "<?php _e( 'You just openned the modal video', 'uf_epico' ); ?>",
                    dismissBtnMessage : "<?php _e( 'Close the modal by clicking here', 'uf_epico' ); ?>",
                    },
                <?php if ( strpos( $video_url[ 'host' ], 'vimeo.com' ) !== false ) { // Vimeo ?>

                vimeo : {
                    <?php echo ( 2 == $atts[ 'autoplay' ] ? 'autoplay : false,' : 'autoplay : true,' ); ?>

                    <?php echo ( 2 == $atts[ 'showinfo' ] ? 'byline : false, portrait : false, title : false,' : 'byline : true, portrait : true, title : true,' ); ?>

                    <?php echo ( 1 == $atts[ 'loop' ] ? 'loop : true,' : 'loop : false,' ); ?>

                    <?php echo 'color : "FFFFFF",'; ?>

                    <?php echo 'api : true,'; ?>

                    }, <?php } else { // Youtube ?>

                youtube : {
                    <?php echo 'version : 3,'; ?>

                    <?php echo ( 2 == $atts[ 'nocookie' ] ? 'nocookie : true,' : 'nocookie : false,' ); ?>

                    <?php echo ( 2 == $atts[ 'autoplay' ] ? 'autoplay : 0,'  : 'autoplay : 1,' ); ?>

                    <?php echo ( 1 == $atts[ 'branding' ] ? 'modestbranding : 1,' : 'modestbranding : 0,' ); ?>

                    <?php echo ( 1 == $atts[ 'related' ] ? 'rel : 1,' : 'rel : 0,' ); ?>

                    <?php echo ( 2 == $atts[ 'controls' ] ? 'controls : 0,' : 'controls : 1,' ); ?>

                    <?php echo ( 2 == $atts[ 'fullscreen' ] ? 'fs : 0,' : 'fs : 1,' ); ?>

                    <?php echo ( 2 == $atts[ 'cc_load_policy' ] ? 'cc_load_policy : 0,' : 'cc_load_policy : 1,' ); ?>

                    <?php echo ( 2 == $atts[ 'loop' ] ? '' : 'loop : 1,
                    playlist : "' . $video_id . '",' ); ?>

                    <?php echo ( 2 == $atts[ 'showinfo' ] ? 'showinfo : 0,' : 'showinfo : 1,' ); ?>

                    <?php echo ( 0 == $atts[ 'videostart' ] || empty( $atts[ 'videostart' ] ) ? 'start : 0,' : 'start : ' . absint( $atts[ 'videostart' ] ) . ',' ) , ( empty ( $atts[ 'videoend' ] ) ? '' : 'end : ' . absint( $atts[ 'videoend' ] ) . ',' ); ?>

                    <?php echo 'origin : "' , $domain , '",'; ?>

                    <?php echo 'widget_referrer : "' , home_url( add_query_arg( array(), $wp->request ) ) , '",'; ?>

                    <?php echo 'hl : "' , get_locale() , '"'; ?>

                    } <?php } ?>

            }); <?php } ?>
    });
}(jQuery));