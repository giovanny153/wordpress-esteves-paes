<?php
/**
 * Template para renderizar o Épico Links
 *
 * @package   Uf_Epico
 * @since     1.0.0
 * @license   GPL-2.0+
 *
 */

if( ! empty($atts['link_url'])){ ?>

<ul class="<?php echo esc_attr( $custom_id ); ?>-list">

    <?php $i = 1; foreach( ( array ) $groups['link_url'] as $increment => $context ) { ?>

    <li class="<?php echo esc_attr( $custom_id ); ?>-item">

        <a class="<?php echo esc_attr( $context['icon'] ); ?>" id="<?php echo esc_attr( $custom_id ) . $i++; ?>" title="<?php echo esc_attr( $context['link_text'] ); ?>" <?php echo ( ( 0 == $atts[ 'target' ] ) ? 'target="_blank" rel="noopener noreferrer"' : '' )  ?> href="<?php echo esc_url( $context['link_url'] ); ?>"><?php echo esc_html( $context['link_text'] ); ?></a>

    </li>

    <?php } ?>

</ul>

<?php } ?>