<?php
/**
 * Template para renderizar o Épico Autor
 *
 * @package   Uf_Epico
 * @since     1.0.0
 * @license   GPL-2.0+
 *
 */
?>
<div class="<?php echo esc_attr( $custom_id ); ?>" id="<?php echo esc_attr( $custom_id ); ?>">

	<?php if ( isset( $atts['img_src'] ) ) { ?>

		<a class="<?php echo esc_attr( $custom_id ); ?>-img-link" <?php echo( ( 0 == $atts['target'] ) ? 'target="_blank" rel="noopener noreferrer"' : '' ) ?>
		   href="<?php echo esc_url( $atts['button_url'] ); ?>">
		   <img class="<?php echo esc_attr( $custom_id ); ?>-img" src="<?php echo esc_url( $atts['img_src'] ); ?>" alt="<?php echo esc_attr( $atts['img_alt'] ); ?>"/></a>

	<?php } ?>

	<?php if ( isset( $atts['title'] ) ) { ?>

		<h3 class="<?php echo esc_attr( $custom_id ); ?>-title">

			<?php echo balanceTags( $atts['title'] ); ?>

		</h3>

	<?php } ?>

	<?php if ( isset( $atts['intro_p'] ) ) { ?>

		<p class="<?php echo esc_attr( $custom_id ); ?>-intro"><?php echo balanceTags( $atts['intro_p'] ); ?></p>

	<?php } ?>

	<?php if ( isset( $atts['button_txt'] ) ) { ?>

		<a class="<?php echo esc_attr( $custom_id ); ?>-button"
		   id="<?php echo esc_attr( $custom_id ); ?>-button" <?php echo( ( 0 == $atts['target'] ) ? 'target="_blank" rel="noopener noreferrer"' : '' ) ?>
		   href="<?php echo esc_url( $atts['button_url'] ); ?>"><?php echo esc_html( $atts['button_txt'] ); ?></a>

	<?php } ?>

</div>