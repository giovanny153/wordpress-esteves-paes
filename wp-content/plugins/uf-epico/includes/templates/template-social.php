<?php
/**
 * Template para renderizar o Épico Social
 *
 * @package   Uf_Epico
 * @since     1.0.0
 * @license   GPL-2.0+
 *
 */

// Define a classe CSS para alinhamento dos conteúdo do widget
$alignment = 0 == $atts[ 'alignment' ] ? ' uf-center' : ( 1 == $atts[ 'alignment' ] ? ' uf-left' : ' uf-right' );
?>

<div class="uf_epicosocial es-<?php echo esc_attr( $custom_id ) . $alignment; ?>" id="es-<?php echo esc_attr( $custom_id ); ?>">

    <?php if( isset( $atts[ 'title' ] ) ) { ?>

    <h3 class="<?php echo esc_attr( $custom_id ); ?>-title">

        <?php echo balancetags( $atts[ 'title' ] ); ?>

    </h3>

    <?php } ?>

    <ul class="<?php echo esc_attr( $custom_id ); ?>-list">

    <?php $i = 1; foreach( ( array ) $groups[ 'social' ] as $increment => $context ) { ?>

        <?php if ( 1 == $context[ 'social' ] ) { ?>

            <li class="<?php echo esc_attr( $custom_id ); ?>-item"><a title="Facebook" class="fa fa-facebook" <?php echo ( 0 == $atts[ 'target' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' )  ?> id="<?php echo esc_attr( $custom_id ) . $i++; ?>" href="<?php echo ( ! empty( $context[ 'social_link' ] ) ? esc_url( $context[ 'social_link' ] )  : '#' ); ?>"></a></li>

        <?php } ?>


        <?php if ( 2 == $context[ 'social' ] ) { ?>

            <li class="<?php echo esc_attr( $custom_id ); ?>-item"><a  title="YouTube" class="fa fa-youtube-play" <?php echo ( 0 == $atts[ 'target' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' )  ?> id="<?php echo esc_attr( $custom_id ) . $i++; ?>" href="<?php echo ( ! empty( $context[ 'social_link' ] ) ? esc_url( $context[ 'social_link' ] )  : '#' ); ?>"></a></li>

        <?php } ?>

        <?php if ( 4 == $context[ 'social' ] ) { ?>

            <li class="<?php echo esc_attr( $custom_id ); ?>-item"><a title="Twitter" class="fa fa-twitter" <?php echo ( 0 == $atts[ 'target' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' )  ?> id="<?php echo esc_attr( $custom_id ) . $i++; ?>" href="<?php echo ( ! empty( $context[ 'social_link' ] ) ? esc_url( $context[ 'social_link' ] )  : '#' ); ?>"></a></li>

        <?php } ?>


            <?php if ( 5 == $context[ 'social' ] ) { ?>

        <li class="<?php echo esc_attr( $custom_id ); ?>-item"><a title="Linkedin" class="fa fa-linkedin" <?php echo ( 0 == $atts[ 'target' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' )  ?> id="<?php echo esc_attr( $custom_id ) . $i++; ?>" href="<?php echo ( ! empty( $context[ 'social_link' ] ) ? esc_url( $context[ 'social_link' ] )  : '#' ); ?>"></a></li>

            <?php } ?>


        <?php if ( 6 == $context[ 'social' ] ) { ?>

            <li class="<?php echo esc_attr( $custom_id ); ?>-item"><a title="Flickr" class="fa fa-flickr" <?php echo ( 0 == $atts[ 'target' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' )  ?> id="<?php echo esc_attr( $custom_id ) . $i++; ?>" href="<?php echo ( ! empty( $context[ 'social_link' ] ) ? esc_url( $context[ 'social_link' ] )  : '#' ); ?>"></a></li>

        <?php } ?>


        <?php if ( 7 == $context[ 'social' ] ) { ?>

            <li class="<?php echo esc_attr( $custom_id ); ?>-item"><a title="Foursquare" class="fa fa-foursquare" <?php echo ( 0 == $atts[ 'target' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' )  ?> id="<?php echo esc_attr( $custom_id ) . $i++; ?>" href="<?php echo ( ! empty( $context[ 'social_link' ] ) ? esc_url( $context[ 'social_link' ] )  : '#' ); ?>"></a></li>

        <?php } ?>

        <?php if ( 8 == $context[ 'social' ] ) { ?>

            <li class="<?php echo esc_attr( $custom_id ); ?>-item"><a title="Pinterest" class="fa fa-pinterest" <?php echo ( 0 == $atts[ 'target' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' )  ?> id="<?php echo esc_attr( $custom_id ) . $i++; ?>" href="<?php echo ( ! empty( $context[ 'social_link' ] ) ? esc_url( $context[ 'social_link' ] )  : '#' ); ?>"></a></li>

        <?php } ?>

        <?php if ( 9 == $context[ 'social' ] ) { ?>

            <li class="<?php echo esc_attr( $custom_id ); ?>-item"><a title="Instagram" class="fa fa-instagram" <?php echo ( 0 == $atts[ 'target' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' )  ?> id="<?php echo esc_attr( $custom_id ) . $i++; ?>" href="<?php echo ( ! empty( $context[ 'social_link' ] ) ? esc_url( $context[ 'social_link' ] )  : '#' ); ?>"></a></li>

        <?php } ?>

        <?php if ( 10 == $context[ 'social' ] ) { ?>

            <li class="<?php echo esc_attr( $custom_id ); ?>-item"><a title="Soundcloud" class="fa fa-soundcloud" <?php echo ( 0 == $atts[ 'target' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' )  ?> id="<?php echo esc_attr( $custom_id ) . $i++; ?>" href="<?php echo ( ! empty( $context[ 'social_link' ] ) ? esc_url( $context[ 'social_link' ] )  : '#' ); ?>"></a></li>

        <?php } ?>

        <?php if ( 11 == $context[ 'social' ] ) { ?>

            <li class="<?php echo esc_attr( $custom_id ); ?>-item"><a title="Slideshare" class="fa fa-slideshare" <?php echo ( 0 == $atts[ 'target' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' )  ?> id="<?php echo esc_attr( $custom_id ) . $i++; ?>" href="<?php echo ( ! empty( $context[ 'social_link' ] ) ? esc_url( $context[ 'social_link' ] )  : '#' ); ?>"></a></li>

        <?php } ?>

        <?php if ( 12 == $context[ 'social' ] ) { ?>

            <li class="<?php echo esc_attr( $custom_id ); ?>-item"><a title="Snapchat" class="fa fa-snapchat-ghost" <?php echo ( 0 == $atts[ 'target' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' )  ?> id="<?php echo esc_attr( $custom_id ) . $i++; ?>" href="<?php echo ( ! empty( $context[ 'social_link' ] ) ? esc_url( $context[ 'social_link' ] )  : '#' ); ?>"></a></li>

        <?php } ?>


        <?php if ( 13 == $context[ 'social' ] ) { ?>

            <li class="<?php echo esc_attr( $custom_id ); ?>-item"><a title="Twitch" class="fa fa-twitch" <?php echo ( 0 == $atts[ 'target' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' )  ?> id="<?php echo esc_attr( $custom_id ) . $i++; ?>" href="<?php echo ( ! empty( $context[ 'social_link' ] ) ? esc_url( $context[ 'social_link' ] )  : '#' ); ?>"></a></li>

        <?php } ?>


        <?php if ( 14 == $context[ 'social' ] ) { ?>

            <li class="<?php echo esc_attr( $custom_id ); ?>-item"><a title="RSS" class="fa fa-rss" <?php echo ( 0 == $atts[ 'target' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' )  ?> id="<?php echo esc_attr( $custom_id ) . $i++; ?>" href="<?php echo ( ! empty( $context[ 'social_link' ] ) ? esc_url( $context[ 'social_link' ] )  : '#' ); ?>"></a></li>

        <?php } ?>

        <?php if ( 15 == $context[ 'social' ] ) { ?>

            <li class="<?php echo esc_attr( $custom_id ); ?>-item"><a title="Slack" class="fa fa-slack" <?php echo ( 0 == $atts[ 'target' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' )  ?> id="<?php echo esc_attr( $custom_id ) . $i++; ?>" href="<?php echo ( ! empty( $context[ 'social_link' ] ) ? esc_url( $context[ 'social_link' ] )  : '#' ); ?>"></a></li>

        <?php } ?>

    <?php } ?>

    </ul>

</div>