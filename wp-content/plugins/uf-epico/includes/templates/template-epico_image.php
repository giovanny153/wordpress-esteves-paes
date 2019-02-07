<?php
/**
 * Template para renderizar o Épico Image
 *
 * @package   Uf_Epico
 * @since     1.0.0
 * @license   GPL-2.0+
 *
 */
?>
<div class="<?php echo esc_attr( $custom_id ); ?>"  id="ei-<?php echo esc_attr( $custom_id ); ?>">

    <?php if ( ! empty( $atts[ 'img_title' ] ) ) { ?>

        <h4 class="widgettitle"><?php echo balancetags( $atts['img_title'] ); ?></h4>

    <?php } ?>

    <?php if ( ! empty( $atts[ 'img_src' ] ) ) { ?>

    <a class="<?php echo esc_attr( $custom_id ); ?>-img-link" id="<?php echo esc_attr( $custom_id ); ?>" <?php echo ( 0 == $atts[ 'target' ] ? 'target="_blank"' : '' ); ?> <?php echo ( 0 == $atts[ 'link_attribute' ] ? 'rel="nofollow noopener noreferrer"' : 'rel="noopener noreferrer"' ); ?> href="<?php echo ( ! empty( $atts[ 'img_url' ] ) ? esc_url( $atts[ 'img_url' ] ) : '' ); ?>"><img class="<?php echo esc_attr( $custom_id ); ?>-img" src="<?php echo esc_url( $atts[ 'img_src' ] ); ?>" alt="<?php echo ( ! empty( $atts[ 'img_alt' ] ) ? esc_attr( $atts[ 'img_alt' ] ) : __( 'Image', 'uf-epico' ) ); ?>" itemprop="image" /></a>

    <?php } ?>

</div>