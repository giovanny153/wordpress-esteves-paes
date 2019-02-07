<?php
/**
 * Template para renderizar o Épico Pop
 *
 * @package   Uf_Epico
 * @since     1.0.0
 * @license   GPL-2.0+
 *
 */
?>
<div class="<?php echo esc_attr( $custom_id ); ?>" id="ep-<?php echo esc_attr( $custom_id ); ?>" itemscope itemtype="https://schema.org/ItemList">

    <?php if ( isset( $atts['title'] ) ) { ?>

    <h3 class="<?php echo esc_attr( $custom_id ); ?>-title <?php echo esc_attr( $atts['icon'] ); ?>" itemprop="name">

        <?php echo balancetags( $atts['title'] ); ?>

    </h3>

    <meta itemprop="itemListOrder" content="https://schema.org/ItemListOrderDescending" />

    <?php } ?>

    <?php if ( isset( $atts['article'] ) ) { ?>

    <ul class="<?php echo esc_attr( $custom_id ); ?>-list">

        <?php $i = 0; foreach( ( array ) $groups['article'] as $increment => $context ) { $i++; ?>

            <li class="<?php echo esc_attr( $custom_id ); ?>-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">

                <a class="<?php echo esc_attr( $custom_id ); ?>-link" id="<?php echo esc_attr( $custom_id ) . $i; ?>" <?php echo ( ( 0 == $atts[ 'target' ] ) ? 'target="_blank" rel="noopener noreferrer"' : '' )  ?> href="<?php echo esc_url ( get_permalink( $context['article'] ) ); ?>">

                    <span itemprop="name"><?php echo esc_html( get_the_title( $context['article'] ) ); ?></span>

                </a>

                <meta itemprop="url" content="<?php echo esc_url ( get_permalink( $context['article'] ) ); ?>" />

                <meta itemprop="position" content="<?php echo $i; ?>" />

            </li>

        <?php } ?>

    </ul>

    <?php } ?>

</div>